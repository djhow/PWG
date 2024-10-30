<?php

/**
 * @package PWG
 */
/*
Plugin Name: GolfClub: Play the World of Golf
Plugin URI: https://playtheworldatgolf.com/
Description: Play the world at golf
Version: 1.0
Requires at least: 5.0
Requires PHP: 5.2
Author: djhowdydoo
Author URI: https://playtheworldatgolf.com/wordpress-plugins/
License:
Text Domain: pwg
*/

// Make sure we don't expose any info if called directly
if (! function_exists('add_action')) {
    echo 'Hi there! Out of bounds, drop a shot!';
    die;
}


// Define Constants
define('PWG_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Activation, deactivation and uninstall plugin

class pwg_Plugin
{
    function __construct()
    {

        add_action('plugins_loaded', [$this, 'activate']);
    }


    function activate()
    {
        // generate custom post types
        $this->custom_post_type();
        //flush rewrite rules
        flush_rewrite_rules();
    }

    function custom_post_type()
    {
        require_once(PWG_PLUGIN_DIR . '/inc/custom_posts.php');
    }



    function register()
    {

        require_once(PWG_PLUGIN_DIR . '/classes/PWG_GolfClub.php');
        require_once(PWG_PLUGIN_DIR . '/classes/PWG_GolfCourse.php');

        add_action('wp_enqueue_scripts', [$this, 'enqueue_pwg_scripts',]);

        //add_action('admin_menu', [$this, 'admin_menus']);

        add_action('show_user_profile', [$this, 'add_homeclub_field']);
        add_action('edit_user_profile', [$this, 'add_homeclub_field']);

        add_action('personal_options_update', [$this, 'save_homeclub_field']);
        add_action('edit_user_profile_update', [$this, 'save_homeclub_field']);

        add_action('show_user_profile', [$this, 'add_handicap_field']);
        add_action('edit_user_profile', [$this, 'add_handicap_field']);

        add_action('personal_options_update', [$this, 'save_handicap_field']);
        add_action('edit_user_profile_update', [$this, 'save_handicap_field']);
    }


    function enqueue_pwg_scripts()
    {

        wp_enqueue_style('pwg_style', plugins_url('/assets/css/pwg.css', __FILE__));
        wp_enqueue_script('pwg_js', plugins_url('/assets/js/pwg.js', __FILE__), ['jquery'], '1.0.1', true);


        //wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array('jquery'), '1.12.1', true);
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-autocomplete');

        // Enqueue child theme stylesheet
        $theme = wp_get_theme();
        wp_enqueue_style('child-style', get_stylesheet_uri(), array(), $theme->get('Version'));
        wp_enqueue_style('jquery-ui', plugins_url('/assets/css/jquery-ui.css', __FILE__));
    }


    // Add field to user profile
    function add_handicap_field($user)
    {
?>
        <h3>Handicap</h3>
        <table class="form-table">
            <tr>
                <th><label for="handicap">Golf Handicap</label></th>
                <td>
                    <input type="number" name="handicap" value="<?php echo esc_attr(get_the_author_meta('handicap', $user->ID)); ?>" class="regular-text">
                    <p class="description">Please enter your golf handicap.</p>
                </td>
            </tr>
        </table>
<?php
    }

    // Save handicap field
    function save_handicap_field($user_id)
    {
        if (!current_user_can('edit_user', $user_id)) return false;

        update_user_meta($user_id, 'handicap', $_POST['handicap']);
    }

    // add homeclub field to user profile

    function add_homeclub_field($user)
    {

        $clubs = get_posts(array(
            'post_type' => 'golfclub',
            'numberposts' => -1
        ));

        if ($clubs) {
            echo '<h3>Golf Club</h3>';
            echo '<table class="form-table">';
            echo '<tr>';
            echo '<th><label for="homeclub">Your Home Club</label></th>';

            echo '<td>';
            echo '<select name="homeclub" id="homeclub">';
            echo '<option>Select Your Home Club</option>';

            foreach ($clubs as $club) {
                $selected = get_the_author_meta('homeclub', $user->ID) == $club->ID ? 'selected' : '';
                echo '<option value="' . esc_attr($club->ID) . '" ' . $selected . '>' . esc_html($club->post_title) . '</option>';
            }

            echo '</select>';
            echo '<p class="description">Please select your homeclub.</p>';
            echo '<p class="description">Your homeclub is the club you are a member of or the club you play regularly.</p>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';
        }
    }


    function save_homeclub_field($user_id)
    {

        if (!current_user_can('edit_user', $user_id))
            return false;

        update_user_meta($user_id, 'homeclub', $_POST['homeclub']);
    }

    // Add fields to registration page



    public function pretty_print($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


$pwgPlugin = new pwg_Plugin();
$pwgPlugin->register();
