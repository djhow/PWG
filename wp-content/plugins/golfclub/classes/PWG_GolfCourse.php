<?php

class PWG_GolfCourse
{

    private $id;  // This is the post_ID
    private $club_id;
    private $holes;
    private $tees;
    private $course_stats;

    public function __construct($club_id = null, $course_id = null)
    {
        $this->tees = [
            'blue' => ['color' => '#000080', 'name' => 'Championship'],
            'white' => ['color' => '#FFFFFF', 'name' => 'Medal'],
            'yellow' => ['color' => '#FFD700', 'name' => 'Club'],
            'red' => ['color' => '#FF0000', 'name' => 'Forward']
        ];


        if ($course_id) {
            $this->load_course($course_id);
        } else {
            $post = get_post();
            $id = $post->ID;
            $this->load_course($id);
        }




        // } elseif ($club_id) {
        //     $this->get_courses_by_club($club_id);
        // } elseif (in_the_loop() && get_post_type() === 'golfcourse') {
        //     $this->id = get_the_ID();
        //     $this->load_course($this->id);
        // } else {
        //     $this->initialize_empty_course();
        // }
    }



    private function load_course($id)
    {
        global $wpdb;

        // Load the post data
        $post = get_post($id);
        if (!$post || $post->post_type !== 'golfcourse') {
            throw new Exception('Invalid golf course ID');
        }

        $this->id = $post->ID;

        // Load the course metadata from custom table, including club relationship
        $course_meta = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM wp_golf_courses WHERE course_ID = %d",
            $id
        ));

        if ($course_meta) {
            $this->club_id = $course_meta->club_ID;  // Get club relationship from custom table

            // Load course statistics
            $this->course_stats = [
                'blue' => [
                    'yards' => $course_meta->blue_yards_total,
                    'par' => $course_meta->blue_par_total,
                    'cr' => $course_meta->cr_blue,
                    'sr' => $course_meta->sr_blue
                ],
                'white' => [
                    'yards' => $course_meta->white_yards_total,
                    'par' => $course_meta->white_par_total,
                    'cr' => $course_meta->cr_white,
                    'sr' => $course_meta->sr_white
                ],
                'yellow' => [
                    'yards' => $course_meta->yellow_yards_total,
                    'par' => $course_meta->yellow_par_total,
                    'cr' => $course_meta->cr_yellow,
                    'sr' => $course_meta->sr_yellow
                ],
                'red' => [
                    'yards' => $course_meta->red_yards_total,
                    'par' => $course_meta->red_par_total,
                    'cr' => $course_meta->cr_red,
                    'sr' => $course_meta->sr_red
                ]
            ];
        }

        $this->load_holes();
    }

    /**
     * Gets the course statistics for all tee positions
     * 
     * @return array Array of course statistics by tee color containing:
     *               - yards: Total yardage
     *               - par: Course par
     *               - cr: Course rating
     *               - sr: Slope rating
     */
    public function getCourseStats()
    {
        // If stats haven't been initialized, return empty structure
        if (empty($this->course_stats)) {
            return array_fill_keys(
                array_keys($this->tees),
                ['yards' => 0, 'par' => 0, 'cr' => 0, 'sr' => 0]
            );
        }

        // Validate and ensure all required fields exist for each tee
        $validated_stats = [];
        foreach ($this->course_stats as $tee => $stats) {
            $validated_stats[$tee] = [
                'yards' => isset($stats['yards']) ? (int)$stats['yards'] : 0,
                'par' => isset($stats['par']) ? (int)$stats['par'] : 0,
                'cr' => isset($stats['cr']) ? (float)$stats['cr'] : 0,
                'sr' => isset($stats['sr']) ? (float)$stats['sr'] : 0
            ];
        }

        return $validated_stats;
    }


    private function initialize_empty_course()
    {
        $this->id = null;
        $this->club_id = null;
        $this->setName('');
        $this->setOverview('');
        $this->created_by = get_current_user_id();


        // Initialize empty course statistics
        $this->course_stats = array_fill_keys(
            array_keys($this->tees),
            ['yards' => 0, 'par' => 0, 'cr' => 0, 'sr' => 0]
        );
    }

    public function load_course_by_club_ID($club_id)
    {
        global $wpdb;

        // Load the post data
        $post = get_post($this->id);
        if (!$post || $post->post_type !== 'golfcourse') {
            throw new Exception('Invalid golf course ID');
        }

        $this->id = $post->ID;

        // Load the course metadata from custom table, including club relationship
        $course_meta = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM wp_golf_courses WHERE club_ID = %d AND course_ID = %d",
            $club_id,
            $this->id
        ));

        if ($course_meta) {
            $this->club_id = $course_meta->club_ID;  // Get club relationship from custom table

            // Load course statistics
            $this->course_stats = [
                'blue' => [
                    'yards' => $course_meta->blue_yards_total,
                    'par' => $course_meta->blue_par_total,
                    'cr' => $course_meta->cr_blue,
                    'sr' => $course_meta->sr_blue
                ],
                'white' => [
                    'yards' => $course_meta->white_yards_total,
                    'par' => $course_meta->white_par_total,
                    'cr' => $course_meta->cr_white,
                    'sr' => $course_meta->sr_white
                ],
                'yellow' => [
                    'yards' => $course_meta->yellow_yards_total,
                    'par' => $course_meta->yellow_par_total,
                    'cr' => $course_meta->cr_yellow,
                    'sr' => $course_meta->sr_yellow
                ],
                'red' => [
                    'yards' => $course_meta->red_yards_total,
                    'par' => $course_meta->red_par_total,
                    'cr' => $course_meta->cr_red,
                    'sr' => $course_meta->sr_red
                ]
            ];
        }

        $this->load_holes();
    }

    public function render_scorecard($display_options = [])
    {
        $default_options = [
            'show_hole_names' => true,
            'show_tees' => ['blue', 'white', 'yellow', 'red'],
            'show_si' => true,
            'show_totals' => true
        ];

        $options = array_merge($default_options, $display_options);

        ob_start();
?>
        <div class="golf-scorecard">


            <div class="course-stats">
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th>Tees</th>
                            <th>Par</th>
                            <th>Yards</th>
                            <th>CR</th>
                            <th>SR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($options['show_tees'] as $tee): ?>
                            <tr class="tee-<?php echo esc_attr($tee); ?>">
                                <td><?php echo esc_html($this->tees[$tee]['name']); ?></td>
                                <td><?php echo esc_html($this->course_stats[$tee]['par']); ?></td>
                                <td><?php echo esc_html($this->course_stats[$tee]['yards']); ?></td>
                                <td><?php echo esc_html($this->course_stats[$tee]['cr']); ?></td>
                                <td><?php echo esc_html($this->course_stats[$tee]['sr']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="scorecard-wrapper">
                <?php $this->render_holes_table(1, 9, $options); ?>
                <?php $this->render_holes_table(10, 18, $options); ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * Handles the golf course form submission
     */
    /**
     * Static handler for form submission
     */
    public static function handle_form_submission()
    {
        // Verify nonce
        if (!isset($_POST['golf_course_nonce']) || !wp_verify_nonce($_POST['golf_course_nonce'], 'save_golf_course')) {
            wp_die('Security check failed', 'Security Error', ['response' => 403]);
        }

        // Check user capabilities
        if (!current_user_can('edit_posts')) {
            wp_die('You do not have sufficient permissions', 'Permission Error', ['response' => 403]);
        }

        try {
            // Get course ID if it exists
            $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : null;

            // Create or get course instance
            $course = $course_id ? new PWG_GolfCourse(null, $course_id) : new PWG_GolfCourse();

            // Update course properties
            $course->setName(sanitize_text_field($_POST['course_name']));
            $course->setOverview(sanitize_textarea_field($_POST['course_overview']));

            if (isset($_POST['club_id'])) {
                $course->set_club_id(intval($_POST['club_id']));
            }

            // Process tee statistics
            $tee_stats = [];
            if (isset($_POST['tees']) && is_array($_POST['tees'])) {
                foreach ($_POST['tees'] as $tee => $stats) {
                    $tee_stats[$tee] = [
                        'cr' => floatval($stats['cr']),
                        'sr' => floatval($stats['sr']),
                        'yards' => 0,  // Will be calculated from holes
                        'par' => 0     // Will be calculated from holes
                    ];
                }
            }

            // Process holes data
            $holes_data = [];
            if (isset($_POST['holes']) && is_array($_POST['holes'])) {
                foreach ($_POST['holes'] as $number => $hole_data) {
                    $hole = [
                        'number' => intval($number),
                        'name' => sanitize_text_field($hole_data['name'] ?? ''),
                        'course_ID' => $course->get_id()
                    ];

                    // Process each tee's data for this hole
                    $tees = ['blue', 'white', 'yellow', 'red'];
                    foreach ($tees as $tee) {
                        $yards = isset($hole_data["{$tee}_yards"]) ? intval($hole_data["{$tee}_yards"]) : 0;
                        $par = isset($hole_data["{$tee}_par"]) ? intval($hole_data["{$tee}_par"]) : 0;
                        $si = isset($hole_data["si_{$tee}"]) ? intval($hole_data["si_{$tee}"]) : 0;

                        $hole["{$tee}_yards"] = $yards;
                        $hole["{$tee}_par"] = $par;
                        $hole["si_{$tee}"] = $si;

                        // Add to tee totals
                        if (isset($tee_stats[$tee])) {
                            $tee_stats[$tee]['yards'] += $yards;
                            $tee_stats[$tee]['par'] += $par;
                        }
                    }

                    $holes_data[] = $hole;
                }
            }

            // Update course statistics
            $course->set_course_stats($tee_stats);

            // Save everything
            $course->save();

            // Save holes data
            global $wpdb;
            foreach ($holes_data as $hole_data) {
                $existing_hole = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT hole_ID FROM wp_holes WHERE course_ID = %d AND number = %d",
                        $course->get_id(),
                        $hole_data['number']
                    )
                );

                if ($existing_hole) {
                    $wpdb->update(
                        'wp_holes',
                        $hole_data,
                        ['hole_ID' => $existing_hole->hole_ID]
                    );
                } else {
                    $wpdb->insert('wp_holes', $hole_data);
                }
            }

            // Redirect back to the course with success message
            $redirect_url = add_query_arg(
                ['message' => 'course_updated'],
                get_edit_post_link($course->get_id(), 'url')
            );
            wp_redirect($redirect_url);
            exit;
        } catch (Exception $e) {
            wp_die(
                'Error saving course: ' . esc_html($e->getMessage()),
                'Error',
                ['back_link' => true]
            );
        }
    }



    public function toHTMLForm($options = [])
    {
        if (!current_user_can('edit_posts')) {
            return '<p>You do not have permission to edit courses.</p>';
        }

        $default_options = [
            'show_hole_names' => true,
            'show_tees' => ['blue', 'white', 'yellow', 'red'],
            'show_si' => true,
            'show_totals' => true
        ];

        $options = array_merge($default_options, $options);

        ob_start();
    ?>
        <div class="wrap">
            <h1><?php echo $this->id ? 'Edit Course' : 'Add New Course'; ?></h1>

            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="pwg-course-editor">
                <?php wp_nonce_field('save_golf_course', 'golf_course_nonce'); ?>
                <input type="hidden" name="action" value="save_golf_course">
                <input type="hidden" name="course_id" value="<?php echo esc_attr($this->id); ?>">
                <input type="hidden" name="club_id" value="<?php echo esc_attr($this->club_id); ?>">

                <!-- Course Details Section -->
                <div class="course-details section">
                    <h3>Course Details</h3>
                    <table class="form-table">
                        <tr>
                            <th><label for="course_name">Course Name</label></th>
                            <td>
                                <input type="text" id="course_name" name="course_name"
                                    value="<?php echo esc_attr($this->getName()); ?>"
                                    class="regular-text" required>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="course_overview">Overview</label></th>
                            <td>
                                <textarea id="course_overview" name="course_overview"
                                    rows="4" class="large-text"><?php echo esc_textarea($this->getOverview()); ?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Course Ratings Section -->
                <div class="course-ratings section">
                    <h3>Course Ratings</h3>
                    <table class="form-table">
                        <?php foreach ($options['show_tees'] as $tee): ?>
                            <tr class="tee-<?php echo esc_attr($tee); ?>">
                                <th><?php echo esc_html($this->tees[$tee]['name']); ?> Tees</th>
                                <td>
                                    <label>Course Rating:
                                        <input type="number" step="0.1"
                                            name="tees[<?php echo esc_attr($tee); ?>][cr]"
                                            value="<?php echo esc_attr($this->course_stats[$tee]['cr'] ?? ''); ?>"
                                            class="small-text">
                                    </label>
                                    <label style="margin-left: 20px;">Slope Rating:
                                        <input type="number" step="0.1"
                                            name="tees[<?php echo esc_attr($tee); ?>][sr]"
                                            value="<?php echo esc_attr($this->course_stats[$tee]['sr'] ?? ''); ?>"
                                            class="small-text">
                                    </label>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <!-- Holes Section -->
                <div class="holes-section">
                    <h3>Hole Details</h3>

                    <!-- Front Nine -->
                    <div class="nine-holes">
                        <h4>Front Nine</h4>
                        <?php $this->render_holes_table(1, 9, $options); ?>
                    </div>

                    <!-- Back Nine -->
                    <div class="nine-holes">
                        <h4>Back Nine</h4>
                        <?php $this->render_holes_table(10, 18, $options); ?>
                    </div>
                </div>

                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Course">
                </p>
            </form>
        </div>

        <style>
            .pwg-course-editor .section {
                margin-bottom: 20px;
                padding: 20px;
                background: #fff;
                border: 1px solid #ccd0d4;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .04);
            }

            .pwg-course-editor .holes-table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 10px;
            }

            .pwg-course-editor .holes-table th,
            .pwg-course-editor .holes-table td {
                padding: 8px;
                border: 1px solid #ccd0d4;
                text-align: center;
            }

            .pwg-course-editor .holes-table input[type="number"] {
                width: 60px;
            }

            .pwg-course-editor .holes-table input[type="text"] {
                width: 100%;
            }

            .tee-blue {
                background-color: #e6f3ff;
            }

            .tee-white {
                background-color: #f8f9fa;
            }

            .tee-yellow {
                background-color: #fff9e6;
            }

            .tee-red {
                background-color: #ffe6e6;
            }

            .pwg-course-editor .error {
                border-color: #dc3232;
            }
        </style>

        <script>
            jQuery(document).ready(function($) {
                // Initialize tooltips
                $('.pwg-course-editor [title]').tooltip();

                // Form validation
                $('.pwg-course-editor').on('submit', function(e) {
                    var isValid = true;

                    // Reset previous errors
                    $('.error').removeClass('error');

                    // Validate required fields
                    $(this).find('[required]').each(function() {
                        if (!$(this).val()) {
                            $(this).addClass('error');
                            isValid = false;
                        }
                    });

                    // Validate numeric fields
                    $(this).find('input[type="number"]').each(function() {
                        var val = $(this).val();
                        if (val && (isNaN(val) || val < 0)) {
                            $(this).addClass('error');
                            isValid = false;
                        }
                    });

                    if (!isValid) {
                        e.preventDefault();
                        alert('Please check the form for errors and ensure all required fields are filled correctly.');
                    }
                });

                // Auto-calculate totals
                function updateTotals() {
                    $('.nine-holes').each(function() {
                        var $table = $(this);

                        // Calculate totals for each tee
                        $('.tee-stats', $table).each(function() {
                            var tee = $(this).data('tee');
                            var yards = 0;
                            var par = 0;

                            $(`input[name*="[${tee}_yards]"]`, $table).each(function() {
                                yards += parseInt($(this).val()) || 0;
                            });

                            $(`input[name*="[${tee}_par]"]`, $table).each(function() {
                                par += parseInt($(this).val()) || 0;
                            });

                            $('.total-yards', this).text(yards);
                            $('.total-par', this).text(par);
                        });
                    });
                }

                // Update totals when inputs change
                $('.pwg-course-editor input[type="number"]').on('change', updateTotals);

                // Initial calculation
                updateTotals();
            });
        </script>
    <?php
        return ob_get_clean();
    }

    /**
     * Helper method to render holes table
     */
    private function render_holes_table($start_hole, $end_hole, $options)
    {
    ?>
        <table class="holes-table">
            <thead>
                <tr>
                    <th>Hole</th>
                    <?php if ($options['show_hole_names']): ?>
                        <th>Name</th>
                    <?php endif; ?>
                    <?php foreach ($options['show_tees'] as $tee): ?>
                        <th class="tee-<?php echo esc_attr($tee); ?>">Yards</th>
                        <th class="tee-<?php echo esc_attr($tee); ?>">Par</th>
                        <?php if ($options['show_si']): ?>
                            <th class="tee-<?php echo esc_attr($tee); ?>">SI</th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php for ($hole_num = $start_hole; $hole_num <= $end_hole; $hole_num++):
                    $hole = isset($this->holes[$hole_num - 1]) ? $this->holes[$hole_num - 1] : [];
                ?>
                    <tr>
                        <td><?php echo $hole_num; ?></td>
                        <?php if ($options['show_hole_names']): ?>
                            <td>
                                <input type="text"
                                    name="holes[<?php echo $hole_num; ?>][name]"
                                    value="<?php echo esc_attr($hole['name'] ?? ''); ?>"
                                    placeholder="Hole name">
                            </td>
                        <?php endif; ?>
                        <?php foreach ($options['show_tees'] as $tee): ?>
                            <td>
                                <input type="number" min="0"
                                    name="holes[<?php echo $hole_num; ?>][<?php echo $tee; ?>_yards]"
                                    value="<?php echo esc_attr($hole["{$tee}_yards"] ?? ''); ?>">
                            </td>
                            <td>
                                <input type="number" min="3" max="6"
                                    name="holes[<?php echo $hole_num; ?>][<?php echo $tee; ?>_par]"
                                    value="<?php echo esc_attr($hole["{$tee}_par"] ?? ''); ?>">
                            </td>
                            <?php if ($options['show_si']): ?>
                                <td>
                                    <input type="number" min="1" max="18"
                                        name="holes[<?php echo $hole_num; ?>][si_<?php echo $tee; ?>]"
                                        value="<?php echo esc_attr($hole["si_{$tee}"] ?? ''); ?>">
                                </td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
<?php
    }

    public function save()
    {
        global $wpdb;

        // First save/update the WordPress post
        $post_data = [
            'post_type' => 'golfcourse',
            'post_status' => 'publish',
            'post_title' => $this->getName(),
            'post_content' => $this->getOverview()
        ];

        if ($this->id) {
            $post_data['ID'] = $this->id;
            wp_update_post($post_data);
        } else {
            $this->id = wp_insert_post($post_data);
        }

        // Then save the course metadata and club relationship to custom table
        $data = [
            'course_ID' => $this->id,
            'club_ID' => $this->club_id  // Store club relationship
        ];

        // Add course statistics to data array
        foreach ($this->course_stats as $tee => $stats) {
            $data["{$tee}_yards_total"] = $stats['yards'];
            $data["{$tee}_par_total"] = $stats['par'];
            $data["cr_{$tee}"] = $stats['cr'];
            $data["sr_{$tee}"] = $stats['sr'];
        }

        if ($this->course_exists_in_table($this->id)) {
            $wpdb->update('wp_golf_courses', $data, ['course_ID' => $this->id]);
        } else {
            $wpdb->insert('wp_golf_courses', $data);
        }

        // Save holes
        $this->save_holes();
    }

    /**
     * Checks if a course exists in the custom wp_golf_courses table
     * 
     * @param int $course_id The WordPress post ID of the course
     * @return bool True if course exists in custom table, false otherwise
     * @throws Exception If database query fails
     */
    private function course_exists_in_table($course_id)
    {
        global $wpdb;

        try {
            // Ensure we have a valid ID
            $course_id = absint($course_id);
            if (!$course_id) {
                return false;
            }

            // Query the custom table
            $exists = $wpdb->get_var(
                $wpdb->prepare(
                    "SELECT course_ID 
                 FROM wp_golf_courses 
                 WHERE course_ID = %d 
                 LIMIT 1",
                    $course_id
                )
            );

            // Check for database errors
            if ($wpdb->last_error) {
                throw new Exception('Database error: ' . $wpdb->last_error);
            }

            return !is_null($exists);
        } catch (Exception $e) {
            // Log the error - implement your preferred logging method
            error_log('Error checking course existence: ' . $e->getMessage());
            return false;
        }
    }

    private function save_holes()
    {
        global $wpdb;

        foreach ($this->holes as $hole) {
            $hole_data = [
                'course_ID' => $this->id,
                'number' => $hole['number'],
                'name' => $hole['name'],
                'pro_tip' => $hole['pro_tip'] ?? ''
            ];

            // Add tee-specific data
            foreach ($this->tees as $tee => $tee_info) {
                $hole_data["{$tee}_yards"] = $hole["{$tee}_yards"];
                $hole_data["{$tee}_par"] = $hole["{$tee}_par"];
                $hole_data["si_{$tee}"] = $hole["si_{$tee}"];
            }

            if (isset($hole['hole_ID'])) {
                $wpdb->update('wp_holes', $hole_data, ['hole_ID' => $hole['hole_ID']]);
            } else {
                $wpdb->insert('wp_holes', $hole_data);
            }
        }
    }

    public function delete()
    {
        if (!$this->id) {
            return false;
        }

        global $wpdb;

        // Delete holes first
        $wpdb->delete('wp_holes', ['course_ID' => $this->id]);

        // Delete course
        return $wpdb->delete('wp_golf_courses', ['course_ID' => $this->id]);
    }

    private function load_holes()
    {
        global $wpdb;

        $this->holes = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM wp_holes WHERE course_ID = %d ORDER BY number",
            $this->get_id()
        ), ARRAY_A);
    }

    // Helper method to find courses by club
    public static function get_courses_by_club($club_id)
    {
        global $wpdb;

        $course_ids = $wpdb->get_col($wpdb->prepare(
            "SELECT course_ID FROM wp_golf_courses WHERE club_ID = %d",
            $club_id
        ));

        $courses = [];
        foreach ($course_ids as $course_id) {
            $courses[] = new PWG_GolfCourse($course_id);
        }

        return $courses;
    }
    // Getters and setters
    public function get_club()
    {
        if ($this->club_id) {
            return new PWG_GolfClub($this->club_id);
        }
        return null;
    }
    public function set_club($club_id)
    {
        $this->club_id = $club_id;
    }
    public function get_id()
    {
        return $this->id;
    }
    public function get_club_id()
    {
        return $this->club_id;
    }
    public function set_club_id($club_id)
    {
        $this->club_id = $club_id;
    }
    public function getName()
    {
        return get_the_title($this->id);
    }
    public function setName($name)
    {
        wp_update_post([
            'ID' => $this->id,
            'post_title' => $name
        ]);
    }
    public function getOverview()
    {
        return get_post_field('post_content', $this->id);
    }
    public function setOverview($overview)
    {
        wp_update_post([
            'ID' => $this->id,
            'post_content' => $overview
        ]);
    }
    public function get_holes()
    {
        return $this->holes;
    }
    public function set_holes($holes)
    {
        $this->holes = $holes;
    }
    public function get_course_stats()
    {
        return $this->course_stats;
    }
    public function set_course_stats($stats)
    {
        $this->course_stats = $stats;
    }
}
