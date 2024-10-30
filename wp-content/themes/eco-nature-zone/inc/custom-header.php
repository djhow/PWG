<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Eco Nature Zone
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses eco_nature_zone_header_style()
 */
function eco_nature_zone_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'eco_nature_zone_custom_header_args', array(
		'header-text'            => false,
		'width'                  => 1600,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'eco_nature_zone_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'eco_nature_zone_custom_header_setup' );

if ( ! function_exists( 'eco_nature_zone_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see eco_nature_zone_custom_header_setup().
	 */
	function eco_nature_zone_header_style() {
		$header_text_color = get_header_textcolor(); ?>

		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				#masthead {
					background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat !important;
					background-position: center top !important;
				    background-size: cover !important;
				}
			<?php endif; ?>
		</style>
		
		<?php
	}
endif;