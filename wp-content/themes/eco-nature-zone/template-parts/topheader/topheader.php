<?php
/**
 * Displays top header
 *
 * @package Eco Nature Zone
 */
?>

<div class="top-header py-2">
    <div class="row m-0">
        <div class="col-lg-6 col-md-7">
            <div class="left-side">
                <?php if(get_theme_mod('eco_nature_zone_location') != '' ){ ?>
                    <div class="location">
                        <i class="fas fa-map-marker-alt me-2"></i><span><?php echo esc_html(get_theme_mod('eco_nature_zone_location','')); ?></span>
                    </div>
                <?php }?>
                <?php if(get_theme_mod('eco_nature_zone_email') != '' ){ ?>
                    <div class="email">
                        <i class="far fa-envelope me-2"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('eco_nature_zone_email','')); ?>"><?php echo esc_html(get_theme_mod('eco_nature_zone_email','')); ?></a>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="col-lg-6 col-md-5">
            <div class="right-side text-end">
                <?php if(get_theme_mod('eco_nature_zone_phone') != '' ){ ?>
                    <div class="phone">
                        <i class="fas fa-phone me-2"></i><a href="tel:<?php echo esc_attr(get_theme_mod('eco_nature_zone_phone','')); ?>"><?php echo esc_html(get_theme_mod('eco_nature_zone_phone','')); ?></a>
                    </div>
                <?php }?>
                <?php if( get_theme_mod( 'eco_nature_zone_facebook_url') != '' || get_theme_mod( 'eco_nature_zone_twitter_url') != '' || get_theme_mod( 'eco_nature_zone_linkedin_url') != '' || get_theme_mod( 'eco_nature_zone_instagram_url') != '') { ?>
                    <div class="social-media">
                        <?php if( get_theme_mod( 'eco_nature_zone_facebook_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'eco_nature_zone_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        <?php } ?>
                        <?php if( get_theme_mod( 'eco_nature_zone_twitter_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'eco_nature_zone_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
                        <?php } ?>
                        <?php if( get_theme_mod( 'eco_nature_zone_linkedin_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'eco_nature_zone_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
                        <?php } ?>
                        <?php if( get_theme_mod( 'eco_nature_zone_instagram_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'eco_nature_zone_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>