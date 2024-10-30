<?php

class PWG_GolfClub
{
    private $id;  // This is the post_ID
    private $address;
    private $contact;
    private $courses = [];
    private $tees = [];
    private $club_post;
    private $errors = [];
    private $course_stats = [];

    public function __construct($id = null, $options = [])
    {
        $default_options = [
            'register_hooks' => true,
            'load_wp_post' => true
        ];
        $options = array_merge($default_options, $options);

        try {
            if ($id !== null) {
                $this->initialize_with_id($id, $options);
            } elseif (in_the_loop() && get_post_type() === 'golfclub') {
                $this->initialize_from_loop();
            } else {
                $this->initialise_empty_club();
            }

            if ($options['register_hooks']) {
                $this->register_hooks();
            }
        } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
            $this->initialise_empty_club();
        }
    }

    private function initialize_with_id($id, $options)
    {
        if (!$this->validate_id($id)) {
            throw new Exception("Invalid golf club ID: {$id}");
        }

        $this->id = $id;

        if ($options['load_wp_post']) {
            $post = get_post($id);
            if ($post && $post->post_type === 'golfclub') {
                $this->club_post = $post;
                $this->load_club($id);
            } else {
                throw new Exception("Invalid golf club post type for ID: {$id}");
            }
        }
    }

    private function initialize_from_loop()
    {
        $this->id = get_the_ID();
        $this->club_post = get_post($this->id);
        $this->load_club($this->id);
    }

    private function validate_id($id)
    {
        return is_numeric($id) && $id > 0;
    }



    private function exists_in_db($id)
    {
        global $wpdb;
        return (bool) $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM wp_golf_clubs WHERE club_ID = %d",
            $id
        ));
    }

    public function load_club($id)
    {
        global $wpdb;

        // Load the post data
        $post = get_post($id);
        if (!$post || $post->post_type !== 'golfclub') {
            throw new Exception('Invalid golf club ID');
        }

        $this->id = $post->ID;
        $this->club_post = $post;


        // Load the additional metadata from custom table
        $club_meta = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM wp_golf_clubs WHERE club_ID = %d",
            $id
        ));

        if ($club_meta) {
            $this->address = [
                'address1' => $club_meta->address_1,
                'address2' => $club_meta->address_2,
                'town_city' => $club_meta->town_city,
                'county' => $club_meta->county,
                'country' => $club_meta->country,
                'postcode' => $club_meta->postcode,
                'gps' => $club_meta->gps,
                'website' => $club_meta->website
            ];

            $this->contact = [
                'phone' => $club_meta->phone,
                'email' => $club_meta->email,
                'facebook' => $club_meta->facebook,
                'twitter' => $club_meta->twitter
            ];
        }

        $this->loadCourses();
    }

    public function initialise_empty_club()
    {
        $this->id = null;
        $this->setName('');
        $this->setAbout('');
        $this->club_post = null;


        // Initialize empty address array with default structure
        $this->address = [
            'address1' => '',
            'address2' => '',
            'town_city' => '',
            'county' => '',
            'country' => '',
            'postcode' => '',
            'gps' => '',
            'website' => ''
        ];

        // Initialize empty contact array with default structure
        $this->contact = [
            'phone' => '',
            'email' => '',
            'facebook' => '',
            'twitter' => ''
        ];

        // Initialize empty courses array
        $this->courses = [];
    }

    /**
     * returns an array of the club creator details
     */
    public function get_club_creator_details()
    {


        $author_id = $this->club_post->post_author;

        return [
            'name' => get_the_author_meta('display_name', $author_id),
            'contact' => get_the_author_meta('user_email', $author_id),
            'role' => get_the_author_meta('roles', $author_id),
            'handicap' => get_the_author_meta('handicap', $author_id),  // Custom meta
            'home_club' => get_the_author_meta('home_club', $author_id),  // Custom meta
            'avatar' => get_avatar($author_id)
        ];
    }

    /**
     * Static method to create or update a golf club
     * 
     * @param array $data Club data
     * @param int|null $club_id Optional club ID for updates
     * @return int|WP_Error Returns club ID on success, WP_Error on failure
     */
    public static function create_or_update_club($data, $club_id = null)
    {
        try {
            // Validate required fields
            $required_fields = ['club_name', 'address_1', 'town_city', 'postcode', 'phone', 'email'];
            foreach ($required_fields as $field) {
                if (empty($data[$field])) {
                    throw new Exception("Missing required field: {$field}");
                }
            }

            // Initialize club object
            $club = new self($club_id);

            // Set basic club properties
            $club->setName(sanitize_text_field($data['club_name']));
            $club->setAbout(sanitize_textarea_field($data['club_about'] ?? ''));

            // Set address information
            $club->setAddress([
                'address1' => sanitize_text_field($data['address_1']),
                'address2' => sanitize_text_field($data['address_2'] ?? ''),
                'town_city' => sanitize_text_field($data['town_city']),
                'county' => sanitize_text_field($data['county'] ?? ''),
                'country' => sanitize_text_field($data['country'] ?? ''),
                'postcode' => sanitize_text_field($data['postcode']),
                'gps' => sanitize_text_field($data['gps'] ?? ''),
                'website' => sanitize_text_field($data['website'] ?? '')
            ]);

            // Set contact information
            $club->setContact([
                'phone' => sanitize_text_field($data['phone']),
                'email' => sanitize_email($data['email']),
                'facebook' => isset($data['facebook']) ? esc_url_raw($data['facebook']) : '',
                'twitter' => isset($data['twitter']) ? esc_url_raw($data['twitter']) : ''
            ]);

            // Save the club
            $club->save();

            return $club->getId();
        } catch (Exception $e) {
            return new WP_Error('club_creation_failed', $e->getMessage());
        }
    }

    /**
     * Outputs the golf club information in HTML5 format.
     *
     * @return string HTML representation of the golf club
     */
    public function toHTML()
    {
        $html = "<article class='golf-club' id='golf-club-{$this->id}'>";
        $html .= "<h2>{$this->getName()}</h2>";

        $html .= "<section class='club-about'>";
        $html .= "<h3>About the Club</h3>";
        $html .= "<p>" . nl2br(htmlspecialchars($this->getAbout())) . "</p>";
        $html .= "</section>";

        $html .= "<section class='club-address'>";
        $html .= "<h3>Address</h3>";
        $html .= "<address>";
        $html .= htmlspecialchars($this->address['address1']) . "<br>";
        if (!empty($this->address['address2'])) {
            $html .= htmlspecialchars($this->address['address2']) . "<br>";
        }
        $html .= htmlspecialchars($this->address['town_city']) . "<br>";
        $html .= htmlspecialchars($this->address['county']) . "<br>";
        $html .= htmlspecialchars($this->address['country']) . "<br>";
        $html .= htmlspecialchars($this->address['postcode']) . "<br>";
        $html .= "<a href='" . htmlspecialchars($this->address['website']) . "' target='_blank'>" . htmlspecialchars($this->address['website']) . "</a><br>";
        $html .= "</address>";
        if (!empty($this->address['gps'])) {
            $html .= "<p>GPS: " . htmlspecialchars($this->address['gps']) . "</p>";
        }
        $html .= "</section>";

        $html .= "<section class='club-contact'>";
        $html .= "<h3>Contact Information</h3>";
        $html .= "<ul>";
        $html .= "<li>Phone: <a href='tel:" . htmlspecialchars($this->contact['phone']) . "'>" . htmlspecialchars($this->contact['phone']) . "</a></li>";
        $html .= "<li>Email: <a href='mailto:" . htmlspecialchars($this->contact['email']) . "'>" . htmlspecialchars($this->contact['email']) . "</a></li>";
        if (!empty($this->contact['facebook'])) {
            $html .= "<li>Facebook: <a href='" . htmlspecialchars($this->contact['facebook']) . "' target='_blank'>Facebook Page</a></li>";
        }
        if (!empty($this->contact['twitter'])) {
            $html .= "<li>Twitter: <a href='" . htmlspecialchars($this->contact['twitter']) . "' target='_blank'>Twitter Profile</a></li>";
        }
        $html .= "</ul>";
        $html .= "</section>";

        // if (!empty($this->courses)) {
        //     $html .= "<section class='club-courses'>";
        //     $html .= "<h3>Golf Courses</h3>";
        //     $html .= "<ul>";
        //     foreach ($this->courses as $course) {
        //         $html .= "<li><a href='#course-" . $course->get_id() . "'>" . htmlspecialchars($course->getName()) . "</a></li>";
        //     }
        //     $html .= "</ul>";
        //     $html .= "</section>";
        // }

        $html .= "</article>";

        return $html;
    }

    /**
     * Outputs an HTML5 form for creating or editing a golf club.
     *
     * @param string $action The form action URL
     * @param string $method The form method (GET or POST)
     * @return string HTML representation of the form
     */
    public function toHTMLForm()
    {
        $html = "<form action='" . esc_url(admin_url('admin-post.php')) . "' method='POST' class='golf-club-form'>";
        $html .= wp_nonce_field('save_golf_club', 'golf_club_nonce', true, false);

        // Add a hidden field for the club ID if it exists
        if ($this->id) {
            $html .= "<input type='hidden' name='club_id' value='" . esc_attr($this->id) . "'>";
        }
        $html .= "<input type='hidden' name='action' value='save_golf_club'>";

        $html .= "<fieldset>";
        $html .= "<legend>Club Details</legend>";

        $html .= "<label for='club_name'>Club Name:</label>";
        $html .= "<input type='text' id='club_name' name='club_name' value='" . esc_attr($this->getName()) . "' required>";

        $html .= "<label for='club_about'>About the Club:</label>";
        $html .= "<textarea id='club_about' name='club_about' rows='5'>" . esc_textarea($this->getAbout()) . "</textarea>";

        $html .= "</fieldset>";

        $html .= "<fieldset>";
        $html .= "<legend>Address</legend>";

        $html .= "<label for='address_1'>Address Line 1:</label>";
        $html .= "<input type='text' id='address_1' name='address_1' value='" . esc_attr($this->address['address1']) . "' required>";

        $html .= "<label for='address_2'>Address Line 2:</label>";
        $html .= "<input type='text' id='address_2' name='address_2' value='" . esc_attr($this->address['address2']) . "'>";

        $html .= "<label for='town_city'>Town/City:</label>";
        $html .= "<input type='text' id='town_city' name='town_city' value='" . esc_attr($this->address['town_city']) . "' required>";

        $html .= "<label for='county'>County:</label>";
        $html .= "<input type='text' id='county' name='county' value='" . esc_attr($this->address['county']) . "'>";

        $html .= "<label for='country'>Country:</label>";
        $html .= "<input type='text' id='country' name='country' value='" . esc_attr($this->address['country']) . "' required>";

        $html .= "<label for='postcode'>Postcode:</label>";
        $html .= "<input type='text' id='postcode' name='postcode' value='" . esc_attr($this->address['postcode']) . "' required>";

        $html .= "<label for='website'>Website:</label>";
        $html .= "<input type='text' id='website' name='website' value='" . esc_attr($this->address['website']) . "' required>";

        $html .= "<label for='gps'>GPS Coordinates:</label>";
        $html .= "<input type='text' id='gps' name='gps' value='" . esc_attr($this->address['gps']) . "'>";

        $html .= "</fieldset>";

        $html .= "<fieldset>";
        $html .= "<legend>Contact Information</legend>";

        $html .= "<label for='phone'>Phone:</label>";
        $html .= "<input type='tel' id='phone' name='phone' value='" . esc_attr($this->contact['phone']) . "' required>";

        $html .= "<label for='email'>Email:</label>";
        $html .= "<input type='email' id='email' name='email' value='" . esc_attr($this->contact['email']) . "' required>";

        $html .= "<label for='facebook'>Facebook:</label>";
        $html .= "<input type='url' id='facebook' name='facebook' value='" . esc_attr($this->contact['facebook']) . "'>";

        $html .= "<label for='twitter'>Twitter:</label>";
        $html .= "<input type='url' id='twitter' name='twitter' value='" . esc_attr($this->contact['twitter']) . "'>";

        $html .= "</fieldset>";

        $html .= "<button type='submit'>Save Golf Club</button>";

        $html .= "</form>";

        return $html;
    }

    function handle_golf_club_form_submission()
    {
        // Verify nonce
        if (!isset($_POST['golf_club_nonce']) || !wp_verify_nonce($_POST['golf_club_nonce'], 'save_golf_club')) {
            wp_die('Security check failed');
        }

        // Check user capabilities
        if (!current_user_can('edit_posts')) {
            wp_die('You do not have sufficient permissions to access this page.');
        }

        $club_id = isset($_POST['club_id']) ? intval($_POST['club_id']) : 0;
        $club = new PWG_GolfClub($club_id);

        // Update club properties based on form data
        $club->setName(sanitize_text_field($_POST['club_name']));
        $club->setAbout(sanitize_textarea_field($_POST['club_about']));
        $club->validateCreatedBy();

        // Update address information
        $club->setAddress([
            'address1' => sanitize_text_field($_POST['address_1']),
            'address2' => sanitize_text_field($_POST['address_2']),
            'town_city' => sanitize_text_field($_POST['town_city']),
            'county' => sanitize_text_field($_POST['county']),
            'country' => sanitize_text_field($_POST['country']),
            'postcode' => sanitize_text_field($_POST['postcode']),
            'gps' => sanitize_text_field($_POST['gps']),
            'website' => sanitize_text_field($_POST['website'])
        ]);

        // Update contact information
        $club->setContact([
            'phone' => sanitize_text_field($_POST['phone']),
            'email' => sanitize_email($_POST['email']),
            'facebook' => esc_url_raw($_POST['facebook']),
            'twitter' => esc_url_raw($_POST['twitter'])
        ]);

        // Save the club
        $club->save();

        // Redirect back to the form or to a success page
        wp_redirect(add_query_arg('updated', 'true', wp_get_referer()));
        exit;
    }

    /**
     * Validates if a user ID is valid
     * 
     * @param mixed $user_id The user ID to validate
     * @param bool $check_exists Whether to verify if user exists in WordPress
     * @param bool $check_capabilities Whether to verify user capabilities
     * @return bool Returns true if valid, false otherwise
     */
    private function isValidUserId($user_id, $check_exists = true, $check_capabilities = false)
    {
        // First check if it's a valid positive integer
        if (!filter_var($user_id, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
            return false;
        }

        if ($check_exists) {
            // Check if user exists in WordPress
            $user = get_userdata($user_id);
            if (!$user) {
                return false;
            }

            if ($check_capabilities) {
                // Check if user has required capabilities
                // Modify these capabilities based on your needs
                $required_caps = ['read', 'edit_posts'];
                foreach ($required_caps as $cap) {
                    if (!user_can($user_id, $cap)) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    /**
     * Validates created_by user ID
     *
     * @throws Exception if no valid user ID can be set
     * @return void
     */
    public function validateCreatedBy()
    {
        $current_user_id = get_current_user_id();

        // If current created_by is valid, we're good
        if ($this->isValidUserId($this->getCreatedBy())) {
            return;
        }

        // If no valid created_by, try to use current user
        if ($this->isValidUserId($current_user_id)) {
            $this->setCreatedBy($current_user_id);
            return;
        }

        // If we get here, we couldn't find a valid user ID
        throw new Exception('No valid user ID available for created_by');
    }

    private function club_exists_in_table()
    {
        global $wpdb;
        return (bool) $wpdb->get_var(
            $wpdb->prepare("SELECT club_ID FROM wp_golf_clubs WHERE club_ID = %d", $this->id)
        );
    }

    public function save()
    {
        global $wpdb;

        // Prepare the post data
        $post_data = [
            'post_type' => 'golfclub',
            'post_status' => 'publish',
            'post_author' => $this->club_post->post_author
        ];

        if ($this->id) {
            $post_data['ID'] = $this->id;
            wp_update_post($post_data);
        } else {
            $this->id = wp_insert_post($post_data);
        }

        // Save the additional metadata to custom table
        $data = [
            'club_ID' => $this->id,
            'address_1' => $this->address['address1'],
            'address_2' => $this->address['address2'],
            'town_city' => $this->address['town_city'],
            'county' => $this->address['county'],
            'country' => $this->address['country'],
            'postcode' => $this->address['postcode'],
            'gps' => $this->address['gps'],
            'website' => $this->address['website'],
            'phone' => $this->contact['phone'],
            'email' => $this->contact['email'],
            'facebook' => $this->contact['facebook'],
            'twitter' => $this->contact['twitter']
        ];

        if ($this->club_exists_in_table()) {
            $wpdb->update('wp_golf_clubs', $data, ['club_ID' => $this->id]);
        } else {
            $wpdb->insert('wp_golf_clubs', $data);
        }
    }

    public function delete()
    {
        if (!$this->id) {
            return false;
        }

        global $wpdb;
        return $wpdb->delete('wp_golf_clubs', ['club_ID' => $this->id]);
    }

    public function loadCourses()
    {
        global $wpdb;

        // Ensure we have a valid club ID
        if (!$this->id) {
            return false;
        }

        // Get all courses for this club - explicitly request ARRAY_A format
        $query = $wpdb->prepare(
            "SELECT * FROM wp_golf_courses WHERE club_ID = %d",
            $this->id
        );

        $course_records = $wpdb->get_results($query, ARRAY_A);


        // Reset courses array
        $this->courses = [];

        // Only process if we have results
        if (is_array($course_records) && !empty($course_records)) {
            //$this->pretty_print($course_records);
            foreach ($course_records as $course_data) {
                try {
                    if (isset($course_data['course_ID'])) {
                        $id = $course_data['course_ID'];
                        $golf_course = new PWG_GolfCourse(null, $id);
                        if ($golf_course) {
                            $this->courses[] = $golf_course;
                        }
                    } else {
                        error_log("Missing course ID in course data: " . print_r($course_data, true));
                    }
                } catch (Exception $e) {
                    // Log error but continue processing other courses
                    error_log("Error loading course ID {$course_data['course_ID']}: " . $e->getMessage());
                }
            }
        }

        return !empty($this->courses);
    }

    public function pretty_print($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
    /**
     * Generates HTML list of links to the club's golf courses
     *
     * @param array $options Optional array of display options
     * @return string HTML unordered list of course links
     */
    public function links_to_courses_html($options = [])
    {
        // Default options
        $defaults = [
            'wrapper_class' => 'pwg-course-links',
            'list_class' => 'pwg-course-list',
            'item_class' => 'pwg-course-item',
            'show_length' => true,  // Show if it's 9 or 18 holes
            'show_par' => true,     // Show the course par
            'show_empty' => true   // Whether to show message when no courses
        ];

        $options = wp_parse_args($options, $defaults);

        // Start building HTML output
        $html = '<div class="' . esc_attr($options['wrapper_class']) . '">';

        // If no courses are found
        if (empty($this->courses)) {
            if ($options['show_empty']) {
                $html .= '<p class="pwg-no-courses">No courses available at this time.</p>';
            }
            $html .= '</div>';
            return $html;
        }

        $html .= '<ul class="' . esc_attr($options['list_class']) . '">';
        $html .= '<h3>Golf Courses</h3>';

        foreach ($this->courses as $course) {
            // Get the WordPress post object for this course
            $course_post = get_post($course->get_id());

            if (!$course_post || $course_post->post_status !== 'publish') {
                continue; // Skip if post doesn't exist or isn't published
            }

            $permalink = get_permalink($course_post);
            if (!$permalink) {
                continue; // Skip if no valid permalink
            }

            $html .= '<li class="' . esc_attr($options['item_class']) . '">';

            // Build the course information
            $course_info = $course->getName();

            // Add optional information if available
            $additional_info = [];

            if ($options['show_length']) {
                $hole_count = count($course->get_holes());
                if ($hole_count > 0) {
                    $additional_info[] = $hole_count . ' holes';
                }
            }

            if ($options['show_par']) {
                $course_stats = $course->getCourseStats();
                if (isset($course_stats['white']['par'])) { // Using white tees as default
                    $additional_info[] = 'Par ' . $course_stats['white']['par'];
                }
            }

            // Add the additional info in parentheses if any exists
            if (!empty($additional_info)) {
                $course_info .= ' (' . implode(', ', $additional_info) . ')';
            }

            $html .= '<a href="' . esc_url($permalink) . '" ';
            $html .= 'title="View ' . esc_attr($course->getName()) . ' course details">';
            $html .= esc_html($course_info);
            $html .= '</a></br>';

            $html .= '</li>';
        }

        $html .= '</ul>';
        $html .= '</div>';

        echo $html;
    }


    /**
     * Shorthand method to echo the course links HTML
     *
     * @param array $options Optional array of display options
     */
    public function render_course_links($options = [])
    {
        echo $this->links_to_courses_html($options);
    }

    public function addCourse(PWG_GolfCourse $course)
    {
        $this->courses[] = $course;
    }

    public function removeCourse(PWG_GolfCourse $course)
    {
        $this->courses = array_filter($this->courses, function ($c) use ($course) {
            return $c->getId() !== $course->getCourseId();
        });
    }

    public function register_hooks()
    {

        add_action('admin_post_save_golf_club', [$this, 'handle_golf_club_form_submission']);
        add_action('admin_post_nopriv_save_golf_club', [$this, 'handle_golf_club_form_submission']);
        add_action('admin_post_save_golf_club', [PWG_GolfClub::class, 'create_or_update_club']);
        add_action('admin_post_nopriv_save_golf_club', [PWG_GolfClub::class, 'create_or_update_clubj']);
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return get_the_title($this->id);
    }
    public function setName($name)
    {
        wp_update_post(['ID' => $this->id, 'post_title' => $name]);
    }

    public function getAbout()
    {
        return get_post_field('post_content', $this->id);
    }
    public function setAbout($about)
    {
        wp_update_post(['ID' => $this->id, 'post_content' => $about]);
    }

    public function getCreatedBy()
    {
        return $this->club_post->post_author;
    }
    public function setCreatedBy($created_by)
    {
        $this->club_post->post_author = $created_by;
    }

    public function getDateCreated()
    {
        return $this->club_post->post_date;
    }
    public function setDateCreated($date_created)
    {
        $this->club_post->post_date = $date_created;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getContact()
    {
        return $this->contact;
    }
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function getCourses()
    {
        return $this->courses;
    }
    public function setCourses($courses)
    {
        $this->courses = $courses;
    }
}
