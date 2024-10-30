<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eco Nature Zone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open();} else { do_action( 'wp_body_open' ); } ?>

<?php if(get_theme_mod('eco_nature_zone_preloader_hide','')){ ?>
    <div class="loading">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
<?php } ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#skip-content"><?php esc_html_e('Skip to content', 'eco-nature-zone'); ?></a>
    <header id="masthead" class="site-header navbar-dark">
        <div class="row me-0">
            <div class="col-lg-3 col-md-12 px-0">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $eco_nature_zone_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $eco_nature_zone_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('eco_nature_zone_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('eco_nature_zone_logo_title_text',true) != ''){ ?>
                                    <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $eco_nature_zone_description = get_bloginfo( 'description', 'display' );
                            if ( $eco_nature_zone_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('eco_nature_zone_theme_description',false) != ''){ ?>
                            <p class="site-description pb-2"><?php echo esc_html($eco_nature_zone_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 px-0">
                <?php get_template_part('template-parts/topheader/topheader'); ?>
                <?php get_template_part('template-parts/topheader/mainheader'); ?>
            </div>
        </div>
    </header>