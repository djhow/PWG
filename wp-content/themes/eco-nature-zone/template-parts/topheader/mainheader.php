<?php
/**
 * Displays main header
 *
 * @package Eco Nature Zone
 */
?>

<div class=" header-box">
    <div class="row m-0">
        <div class="col-xl-9 col-lg-8 col-md-8 align-self-center">
            <?php get_template_part('template-parts/navigation/nav'); ?>
        </div>
        <div class="col-lg-1 col-md-1 px-0 align-self-center">
            <?php if (get_theme_mod('eco_nature_zone_header_search_setting', false) != '') { ?>
                <span class="head-search">
                    <span class="header-search-wrapper">
                        <span class="search-main">
                            <a href="#"><span><?php echo esc_html('Search', 'eco-nature-zone'); ?></span> <i class="fa fa-search"></i></a>
                            
                        </span>
                        <div class="search-form-main clearfix">
                            <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <input type="hidden" name="post_type" value="post"> <!-- Set post type to product for WooCommerce products -->
                                <label>
                                    <input type="search" class="search-field form-control" placeholder="Search for Post..." value="<?php echo get_search_query(); ?>" name="s">
                                </label>
                                <input type="submit" class="search-submit btn btn-primary mt-3" value="Search">
                            </form>
                        </div>
                    </span>
                </span>
            <?php } ?>
        </div>
        <div class=" col-xl-2 col-lg-3 col-md-3 text-md-end align-self-center">
            <?php if ( get_theme_mod('eco_nature_zone_header_button') != "" || get_theme_mod('eco_nature_zone_header_button_url') != ""  ) {?>
                <span class="head-btn"><a href="<?php echo esc_url(get_theme_mod('eco_nature_zone_header_button_url')); ?>"><?php echo esc_html(get_theme_mod('eco_nature_zone_header_button')); ?></a></span>
            <?php }?>
        </div>
    </div>
</div>
