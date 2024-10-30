<?php
/**
 * Eco Nature Zone Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Eco Nature Zone
 */

if ( ! defined( 'ECO_NATURE_ZONE_URL' ) ) {
    define( 'ECO_NATURE_ZONE_URL', esc_url( 'https://www.themagnifico.net/products/nature-wordpress-theme', 'eco-nature-zone') );
}
if ( ! defined( 'ECO_NATURE_ZONE_TEXT' ) ) {
    define( 'ECO_NATURE_ZONE_TEXT', __( 'Eco Nature Pro','eco-nature-zone' ));
}
if ( ! defined( 'ECO_NATURE_ZONE_BUY_TEXT' ) ) {
    define( 'ECO_NATURE_ZONE_BUY_TEXT', __( 'Buy Eco Nature Pro','eco-nature-zone' ));
}

use WPTRT\Customize\Section\Eco_Nature_Zone_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Eco_Nature_Zone_Button::class );

    $manager->add_section(
        new Eco_Nature_Zone_Button( $manager, 'eco_nature_zone_pro', [
            'title'       => esc_html( ECO_NATURE_ZONE_TEXT,'eco-nature-zone' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'eco-nature-zone' ),
            'button_url'  => esc_url( ECO_NATURE_ZONE_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'eco-nature-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'eco-nature-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eco_nature_zone_customize_register($wp_customize){

    // Pro Version
    class Eco_Nature_Zone_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( ECO_NATURE_ZONE_BUY_TEXT,'eco-nature-zone' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function eco_nature_zone_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('eco_nature_zone_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'eco_nature_zone_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'eco-nature-zone' ),
        'section'        => 'title_tagline',
        'settings'       => 'eco_nature_zone_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('eco_nature_zone_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'eco_nature_zone_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'eco-nature-zone' ),
        'section'        => 'title_tagline',
        'settings'       => 'eco_nature_zone_theme_description',
        'type'           => 'checkbox',
    )));

    //Logo
    $wp_customize->add_setting('eco_nature_zone_logo_max_height',array(
        'default'   => '80',
        'sanitize_callback' => 'eco_nature_zone_sanitize_number_absint'
    ));
    $wp_customize->add_control('eco_nature_zone_logo_max_height',array(
        'label' => esc_html__('Logo Width','eco-nature-zone'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // General Settings
     $wp_customize->add_section('eco_nature_zone_general_settings',array(
        'title' => esc_html__('General Settings','eco-nature-zone'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('eco_nature_zone_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'eco_nature_zone_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'eco-nature-zone' ),
        'section'        => 'eco_nature_zone_general_settings',
        'settings'       => 'eco_nature_zone_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'eco_nature_zone_preloader_bg_color', array(
        'default' => '#49AF45',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'eco_nature_zone_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','eco-nature-zone'),
        'section' => 'eco_nature_zone_general_settings',
        'settings' => 'eco_nature_zone_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'eco_nature_zone_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'eco_nature_zone_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','eco-nature-zone'),
        'section' => 'eco_nature_zone_general_settings',
        'settings' => 'eco_nature_zone_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'eco_nature_zone_preloader_dot_2_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'eco_nature_zone_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','eco-nature-zone'),
        'section' => 'eco_nature_zone_general_settings',
        'settings' => 'eco_nature_zone_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('eco_nature_zone_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'eco_nature_zone_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'eco-nature-zone' ),
        'section'        => 'eco_nature_zone_general_settings',
        'settings'       => 'eco_nature_zone_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('eco_nature_zone_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'eco_nature_zone_sanitize_choices'
    ));
    $wp_customize->add_control('eco_nature_zone_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'eco_nature_zone_general_settings',
        'choices' => array(
            'Right' => __('Right','eco-nature-zone'),
            'Left' => __('Left','eco-nature-zone'),
            'Center' => __('Center','eco-nature-zone')
        ),
    ) );

    // Product Columns
    $wp_customize->add_setting( 'eco_nature_zone_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'eco_nature_zone_sanitize_select',
    ) );

    $wp_customize->add_control('eco_nature_zone_products_per_row', array(
       'label' => __( 'Product per row', 'eco-nature-zone' ),
       'section'  => 'eco_nature_zone_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    //Top Header
    $wp_customize->add_section('eco_nature_zone_top_header',array(
        'title' => esc_html__('Top Header Option','eco-nature-zone')
    ));

    $wp_customize->add_setting('eco_nature_zone_location',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_location',array(
        'label' => esc_html__('Location','eco-nature-zone'),
        'section' => 'eco_nature_zone_top_header',
        'setting' => 'eco_nature_zone_location',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('eco_nature_zone_email',array(
        'label' => esc_html__('Email Address','eco-nature-zone'),
        'section' => 'eco_nature_zone_top_header',
        'setting' => 'eco_nature_zone_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_phone',array(
        'default' => '',
        'sanitize_callback' => 'eco_nature_zone_sanitize_phone_number'
    ));
    $wp_customize->add_control('eco_nature_zone_phone',array(
        'label' => esc_html__('Phone Number','eco-nature-zone'),
        'section' => 'eco_nature_zone_top_header',
        'setting' => 'eco_nature_zone_phone',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_header_search_setting', array(
        'default' => false,
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'eco_nature_zone_header_search_setting',array(
        'label'          => __( 'Show Search Icon', 'eco-nature-zone' ),
        'section'        => 'eco_nature_zone_top_header',
        'settings'       => 'eco_nature_zone_header_search_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('eco_nature_zone_header_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_header_button',array(
        'label' => esc_html__('Header Button Text','eco-nature-zone'),
        'section' => 'eco_nature_zone_top_header',
        'setting' => 'eco_nature_zone_header_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_header_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_header_button_url',array(
        'label' => esc_html__('Header Button Url','eco-nature-zone'),
        'section' => 'eco_nature_zone_top_header',
        'setting' => 'eco_nature_zone_header_button_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('eco_nature_zone_social_icons',array(
        'title' => esc_html__('Social Icons','eco-nature-zone'),
    ));

    $wp_customize->add_setting('eco_nature_zone_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('eco_nature_zone_facebook_url',array(
        'label' => esc_html__('Facebook link','eco-nature-zone'),
        'section' => 'eco_nature_zone_social_icons',
        'setting' => 'eco_nature_zone_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('eco_nature_zone_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('eco_nature_zone_twitter_url',array(
        'label' => esc_html__('Twitter link','eco-nature-zone'),
        'section' => 'eco_nature_zone_social_icons',
        'setting' => 'eco_nature_zone_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('eco_nature_zone_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('eco_nature_zone_linkedin_url',array(
        'label' => esc_html__('Linkedin link','eco-nature-zone'),
        'section' => 'eco_nature_zone_social_icons',
        'setting' => 'eco_nature_zone_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('eco_nature_zone_instagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('eco_nature_zone_instagram_url',array(
        'label' => esc_html__('Instagram link','eco-nature-zone'),
        'section' => 'eco_nature_zone_social_icons',
        'setting' => 'eco_nature_zone_instagram_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('eco_nature_zone_top_slider',array(
        'title' => esc_html__('Slider Settings','eco-nature-zone'),
    ));

    $wp_customize->add_setting('eco_nature_zone_slider_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'eco_nature_zone_slider_section_setting',array(
        'label'          => __( 'Show Slider', 'eco-nature-zone' ),
        'section'        => 'eco_nature_zone_top_slider',
        'settings'       => 'eco_nature_zone_slider_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('eco_nature_zone_slider_background_image' ,array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'eco_nature_zone_slider_background_image' ,array(
            'label' => __('Slider Background Image','eco-nature-zone'),
            'section' => 'eco_nature_zone_top_slider',
            'settings' => 'eco_nature_zone_slider_background_image' 
    )));

    for ( $eco_nature_zone_count = 1; $eco_nature_zone_count <= 3; $eco_nature_zone_count++ ) {

        $wp_customize->add_setting( 'eco_nature_zone_top_slider_page' . $eco_nature_zone_count, array(
            'default'           => '',
            'sanitize_callback' => 'eco_nature_zone_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'eco_nature_zone_top_slider_page' . $eco_nature_zone_count, array(
            'label'    => __( 'Select Slide Page', 'eco-nature-zone' ),
            'description' => __('Slider image size (1400 x 550)','eco-nature-zone'),
            'section'  => 'eco_nature_zone_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('eco_nature_zone_slider_short_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_slider_short_heading',array(
        'label' => esc_html__('Slider Short  Heading','eco-nature-zone'),
        'section' => 'eco_nature_zone_top_slider',
        'setting' => 'eco_nature_zone_slider_short_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_slider_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_slider_button',array(
        'label' => esc_html__('Slider First Button Text','eco-nature-zone'),
        'section' => 'eco_nature_zone_top_slider',
        'setting' => 'eco_nature_zone_slider_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_slider_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_slider_button_url',array(
        'label' => esc_html__('Slider First Button Url','eco-nature-zone'),
        'section' => 'eco_nature_zone_top_slider',
        'setting' => 'eco_nature_zone_slider_button_url',
        'type'  => 'url'
    ));

   // About Us
    $wp_customize->add_section('eco_nature_zone_about_section',array(
        'title' => esc_html__('About Section','eco-nature-zone'),
    ));

    $wp_customize->add_setting('eco_nature_zone_about_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'eco_nature_zone_about_section_setting',array(
        'label'          => __( 'Show About Us', 'eco-nature-zone' ),
        'section'        => 'eco_nature_zone_about_section',
        'settings'       => 'eco_nature_zone_about_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('eco_nature_zone_about_us_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_about_us_title',array(
        'label' => esc_html__('Short Heading','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'setting' => 'eco_nature_zone_about_us_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_about_us_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_about_us_heading',array(
        'label' => esc_html__('Heading','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'setting' => 'eco_nature_zone_about_us_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_about_left_image' ,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'eco_nature_zone_about_left_image' ,array(
        'label' => __('About Left Image','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'settings' => 'eco_nature_zone_about_left_image' 
    )));

    $wp_customize->add_setting('eco_nature_zone_about_right_image' ,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'eco_nature_zone_about_right_image' ,array(
        'label' => __('About Right Image','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'settings' => 'eco_nature_zone_about_right_image' 
    )));

    $wp_customize->add_setting('eco_nature_zone_about_us_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_about_us_content',array(
        'label' => esc_html__('About Content','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'setting' => 'eco_nature_zone_about_us_content',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_about_feature_image_1' ,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'eco_nature_zone_about_feature_image_1' ,array(
        'label' => __('About Feature Image 1','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'settings' => 'eco_nature_zone_about_feature_image_1' 
    )));

    $wp_customize->add_setting('eco_nature_zone_about_feature_heading_1',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_about_feature_heading_1',array(
        'label' => esc_html__('Feature Heading 1','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'setting' => 'eco_nature_zone_about_feature_heading_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_about_feature_image_2' ,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'eco_nature_zone_about_feature_image_2' ,array(
        'label' => __('About Feature Image 2','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'settings' => 'eco_nature_zone_about_feature_image_2' 
    )));

    $wp_customize->add_setting('eco_nature_zone_about_feature_heading_2',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_about_feature_heading_2',array(
        'label' => esc_html__('Feature Heading 2','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'setting' => 'eco_nature_zone_about_feature_heading_2',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_about_us_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_about_us_button_text',array(
        'label' => esc_html__('Button Text','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'setting' => 'eco_nature_zone_about_us_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('eco_nature_zone_about_us_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('eco_nature_zone_about_us_button_url',array(
        'label' => esc_html__('Button Url','eco-nature-zone'),
        'section' => 'eco_nature_zone_about_section',
        'setting' => 'eco_nature_zone_about_us_button_url',
        'type'  => 'text'
    ));

    // Post Settings
     $wp_customize->add_section('eco_nature_zone_post_settings',array(
        'title' => esc_html__('Post Settings','eco-nature-zone'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('eco_nature_zone_post_page_title',array(
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('eco_nature_zone_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'eco-nature-zone'),
        'section'     => 'eco_nature_zone_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'eco-nature-zone'),
    ));

    $wp_customize->add_setting('eco_nature_zone_post_page_meta',array(
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('eco_nature_zone_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'eco-nature-zone'),
        'section'     => 'eco_nature_zone_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'eco-nature-zone'),
    ));

    $wp_customize->add_setting('eco_nature_zone_post_page_thumb',array(
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('eco_nature_zone_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'eco-nature-zone'),
        'section'     => 'eco_nature_zone_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'eco-nature-zone'),
    ));

     $wp_customize->add_setting('eco_nature_zone_post_page_content',array(
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('eco_nature_zone_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'eco-nature-zone'),
        'section'     => 'eco_nature_zone_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'eco-nature-zone'),
    ));

    $wp_customize->add_setting('eco_nature_zone_single_post_page_content',array(
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('eco_nature_zone_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'eco-nature-zone'),
        'section'     => 'eco_nature_zone_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'eco-nature-zone'),
    ));

    // Footer
    $wp_customize->add_section('eco_nature_zone_site_footer_section', array(
        'title' => esc_html__('Footer', 'eco-nature-zone'),
    ));

    $wp_customize->add_setting('eco_nature_zone_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'eco_nature_zone_sanitize_choices'
    ));
    $wp_customize->add_control('eco_nature_zone_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','eco-nature-zone'),
        'section' => 'eco_nature_zone_site_footer_section',
        'choices' => array(
            'Left' => __('Left','eco-nature-zone'),
            'Center' => __('Center','eco-nature-zone'),
            'Right' => __('Right','eco-nature-zone')
        ),
    ) );

    $wp_customize->add_setting('eco_nature_zone_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'eco_nature_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control('eco_nature_zone_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','eco-nature-zone'),
        'section' => 'eco_nature_zone_site_footer_section',
    ));

    $wp_customize->add_setting('eco_nature_zone_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('eco_nature_zone_footer_text_setting', array(
        'label' => __('Replace the footer text', 'eco-nature-zone'),
        'section' => 'eco_nature_zone_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('eco_nature_zone_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'eco_nature_zone_sanitize_choices'
    ));
    $wp_customize->add_control('eco_nature_zone_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','eco-nature-zone'),
        'section' => 'eco_nature_zone_site_footer_section',
        'choices' => array(
            'Left' => __('Left','eco-nature-zone'),
            'Center' => __('Center','eco-nature-zone'),
            'Right' => __('Right','eco-nature-zone')
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'eco_nature_zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Eco_Nature_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'eco_nature_zone_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'eco-nature-zone' ),
        'description' => esc_url( ECO_NATURE_ZONE_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'eco_nature_zone_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function eco_nature_zone_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function eco_nature_zone_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eco_nature_zone_customize_preview_js(){
    wp_enqueue_script('eco-nature-zone-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'eco_nature_zone_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function eco_nature_zone_panels_js() {
    wp_enqueue_style( 'eco-nature-zone-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'eco-nature-zone-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'eco_nature_zone_panels_js' );