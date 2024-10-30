<?php
/**
 * Eco Nature Zone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Eco Nature Zone
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Eco_Nature_Zone_Loader.php' );

$Eco_Nature_Zone_Loader = new \WPTRT\Autoload\Eco_Nature_Zone_Loader();

$Eco_Nature_Zone_Loader->eco_nature_zone_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Eco_Nature_Zone_Loader->eco_nature_zone_register();

if ( ! function_exists( 'eco_nature_zone_setup' ) ) :

	function eco_nature_zone_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'eco-nature-zone' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('eco-nature-zone-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','eco-nature-zone' ),
	        'footer'=> esc_html__( 'Footer Menu','eco-nature-zone' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'eco_nature_zone_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_eco_nature_zone_dismissable_notice', 'eco_nature_zone_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'eco_nature_zone_setup' );


function eco_nature_zone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eco_nature_zone_content_width', 1170 );
}
add_action( 'after_setup_theme', 'eco_nature_zone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eco_nature_zone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eco-nature-zone' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'eco-nature-zone' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'eco-nature-zone' ),
		'id'            => 'eco-nature-zone-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'eco-nature-zone' ),
		'id'            => 'eco-nature-zone-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'eco-nature-zone' ),
		'id'            => 'eco-nature-zone-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'eco-nature-zone' ),
		'id'            => 'eco-nature-zone-footer4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'eco_nature_zone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eco_nature_zone_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'inter',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'im-fell-doublee-pica-sc',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica+SC&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'eco-nature-zone-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'eco-nature-zone-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'eco-nature-zone-style',$eco_nature_zone_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('eco-nature-zone-theme-custom-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eco_nature_zone_scripts' );

/**
 * Enqueue Preloader.
 */
function eco_nature_zone_preloader() {

  $eco_nature_zone_theme_color_css = '';
  $eco_nature_zone_preloader_bg_color = get_theme_mod('eco_nature_zone_preloader_bg_color');
  $eco_nature_zone_preloader_dot_1_color = get_theme_mod('eco_nature_zone_preloader_dot_1_color');
  $eco_nature_zone_preloader_dot_2_color = get_theme_mod('eco_nature_zone_preloader_dot_2_color');
  $eco_nature_zone_logo_max_height = get_theme_mod('eco_nature_zone_logo_max_height');

  	if(get_theme_mod('eco_nature_zone_logo_max_height') == '') {
		$eco_nature_zone_logo_max_height = '80';
	}

	if(get_theme_mod('eco_nature_zone_preloader_bg_color') == '') {
		$eco_nature_zone_preloader_bg_color = '#49AF45';
	}
	if(get_theme_mod('eco_nature_zone_preloader_dot_1_color') == '') {
		$eco_nature_zone_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('eco_nature_zone_preloader_dot_2_color') == '') {
		$eco_nature_zone_preloader_dot_2_color = '#000000';
	}

	$eco_nature_zone_theme_color_css = '

		.custom-logo-link img{
			max-height: '.esc_attr($eco_nature_zone_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($eco_nature_zone_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($eco_nature_zone_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($eco_nature_zone_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'eco-nature-zone-style',$eco_nature_zone_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'eco_nature_zone_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Menu
 */

require get_template_directory() . '/inc/class-navigation-menu.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


function eco_nature_zone_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function eco_nature_zone_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/*dropdown page sanitization*/
function eco_nature_zone_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function eco_nature_zone_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function eco_nature_zone_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function eco_nature_zone_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'eco_nature_zone_loop_columns');
if (!function_exists('eco_nature_zone_loop_columns')) {
	function eco_nature_zone_loop_columns() {
		$columns = get_theme_mod( 'eco_nature_zone_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

function villa_estate_zone_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer_setting' );
    $wp_customize->remove_control( 'pro_version_footer_setting' );

}
add_action( 'customize_register', 'villa_estate_zone_remove_customize_register', 11 );


// add_action( 'eco_nature_zone_navigation_action','eco_nature_zone_single_post_navigation',30 );
if( !function_exists('eco_nature_zone_content_offcanvas') ):

    // Offcanvas Contents
    function eco_nature_zone_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <i class="fas fa-times"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'eco-nature-zone'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new eco_nature_zone_Menu_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'eco_nature_zone_before_footer_content_action','eco_nature_zone_content_offcanvas',30 );


if ( ! function_exists( 'eco_nature_zone_sub_menu_toggle_button' ) ) :

    function eco_nature_zone_sub_menu_toggle_button( $args, $item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'primary' && isset( $args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';

                // Add the sub menu toggle with Font Awesome icon
                $args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . esc_attr( $toggle_target_string ) . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'eco-nature-zone' ) . '</span><i class="fas fa-chevron-down"></i></span></button>';

            }

            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';

        } elseif ( $args->theme_location == 'primary' ) {

            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = '<i class="fas fa-plus"></i></div>';

            } else {

                $args->before = '';
                $args->after  = '';

            }

        }

        return $args;

    }

endif;

add_filter( 'nav_menu_item_args', 'eco_nature_zone_sub_menu_toggle_button', 10, 3 );

