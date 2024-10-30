<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<div id="skip-content">
  <?php if (get_theme_mod('eco_nature_zone_slider_section_setting', false) != '') { ?>
    <section id="top-slider">
      <div class="main-slider">
        <div class="slider-main-box">
          <?php $eco_nature_zone_slide_pages = array();
          for ( $eco_nature_zone_count = 1; $eco_nature_zone_count <= 3; $eco_nature_zone_count++ ) {
            $eco_nature_zone_mod = intval( get_theme_mod( 'eco_nature_zone_top_slider_page' . $eco_nature_zone_count ));
            if ( 'page-none-selected' != $eco_nature_zone_mod ) {
              $eco_nature_zone_slide_pages[] = $eco_nature_zone_mod;
            }
          }
          if( !empty($eco_nature_zone_slide_pages) ) :
            $eco_nature_zone_args = array(
              'post_type' => 'page',
              'post__in' => $eco_nature_zone_slide_pages,
              'orderby' => 'post__in'
            );
            $eco_nature_zone_query = new WP_Query( $eco_nature_zone_args );
            if ( $eco_nature_zone_query->have_posts() ) :
              $i = 1;
            ?>
            <div class="owl-carousel" role="listbox">
              <?php  while ( $eco_nature_zone_query->have_posts() ) : $eco_nature_zone_query->the_post(); ?>
                <div class="slide-box">
                  <?php if (has_post_thumbnail()) { ?><img class="sider-img" src="<?php the_post_thumbnail_url('full'); ?>" /><?php } else { ?><img class="sider-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" /> <?php } ?>
                  <div class="slider-inner-box">
                    <?php if(get_theme_mod('eco_nature_zone_slider_short_heading') != ''){ ?>
                      <h5 class="slider-short mb-2"><?php echo esc_html(get_theme_mod('eco_nature_zone_slider_short_heading')); ?></h5>
                    <?php }?>
                    <h1 class="mb-2"><?php the_title(); ?></h1>
                    <p class="content"><?php echo esc_html( wp_trim_words( get_the_content(),15 )); ?></p>
                    <div class="slide-btn mt-4">
                      <?php if ( get_theme_mod('eco_nature_zone_slider_button') != "" || get_theme_mod('eco_nature_zone_slider_button_url') != ""  ) {?>
                        <a href="<?php echo esc_url(get_theme_mod('eco_nature_zone_slider_button_url')); ?>" class="talk-btn"><?php echo esc_html(get_theme_mod('eco_nature_zone_slider_button')); ?><i class="fas fa-leaf ms-2"></i></a>
                      <?php }?>
                      <a href="<?php the_permalink(); ?>" class="read-btn"><?php esc_html_e('Read More','eco-nature-zone'); ?><i class="fas fa-leaf ms-2"></i></a>
                    </div>
                  </div>
                </div>
              <?php $i++; endwhile;
              wp_reset_postdata();?>
            </div>
            <div class="slider-indicators"></div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <div class="scroll-text">
            <a href="#about-section"><?php esc_html_e('Scroll Down', 'eco-nature-zone'); ?></a>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php if (get_theme_mod('eco_nature_zone_about_section_setting', false) != '') { ?>
    <section id="about-section" class="featured py-5">
      <div class="container">
        <div class="row">
          <div class="<?php if (get_theme_mod( 'eco_nature_zone_about_right_image' ) != '') { ?>col-lg-8 col-md-12<?php } else { ?>col-lg-12 col-md-12<?php }?>">
            <?php if(get_theme_mod('eco_nature_zone_about_us_title') != ''){ ?>
              <h5 class="main-title mb-2"><?php echo esc_html(get_theme_mod('eco_nature_zone_about_us_title')); ?></h5>
            <?php }?>
            <?php if(get_theme_mod('eco_nature_zone_about_us_heading') != ''){ ?>
              <h3 class="main-heading mb-3"><?php echo esc_html(get_theme_mod('eco_nature_zone_about_us_heading')); ?></h3>
            <?php }?>

            <div class="row">
              <?php if (get_theme_mod( 'eco_nature_zone_about_left_image' ) != '') { ?>
                <div class="col-lg-4 col-md-4">
                  <img class="about-img" src="<?php echo esc_url( get_theme_mod( 'eco_nature_zone_about_left_image' )); ?>">
                </div>
              <?php }?>
              <div class="<?php if (get_theme_mod( 'eco_nature_zone_about_left_image' ) != '') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-12 col-md-12<?php }?> pt-4">
                <?php if(get_theme_mod('eco_nature_zone_about_us_content') != ''){ ?>
                  <p class="mb-3"><?php echo esc_html(get_theme_mod('eco_nature_zone_about_us_content')); ?></p>
                <?php }?>
                <?php if(get_theme_mod('eco_nature_zone_about_feature_image_1') != '' || get_theme_mod('eco_nature_zone_about_feature_heading_1') != '' || get_theme_mod('eco_nature_zone_about_feature_image_2') != '' || get_theme_mod('eco_nature_zone_about_feature_heading_2') != ''){ ?>
                  <div class="row">
                    <?php if(get_theme_mod('eco_nature_zone_about_feature_image_1') != '' || get_theme_mod('eco_nature_zone_about_feature_heading_1') != ''){ ?>
                      <div class="col-lg-6 col-md-6 col-sm-6 align-self-center about-feature">
                        <div class="row">
                          <?php if(get_theme_mod('eco_nature_zone_about_feature_image_1') != ''){ ?>
                            <div class="col-lg-4 col-md-3 col-sm-4">
                              <img class="about-icon" src="<?php echo esc_url( get_theme_mod( 'eco_nature_zone_about_feature_image_1' )); ?>">
                            </div>
                          <?php }?>
                          <div class="<?php if(get_theme_mod('eco_nature_zone_about_feature_image_1') != ''){ ?>col-lg-8 col-md-9 col-sm-8<?php } else {?> col-lg-12 col-md-12 <?php }?>">
                            <?php if(get_theme_mod('eco_nature_zone_about_feature_heading_1') != ''){ ?>
                              <h4><?php echo esc_html(get_theme_mod('eco_nature_zone_about_feature_heading_1')); ?></h4>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    <?php }?>
                    <?php if(get_theme_mod('eco_nature_zone_about_feature_image_2') != '' || get_theme_mod('eco_nature_zone_about_feature_heading_2') != ''){ ?>
                      <div class="col-lg-6 col-md-6 col-sm-6 align-self-center about-feature">
                        <div class="row">
                          <?php if(get_theme_mod('eco_nature_zone_about_feature_image_2') != ''){ ?>
                            <div class="col-lg-4 col-md-3 col-sm-4">
                              <img class="about-icon" src="<?php echo esc_url( get_theme_mod( 'eco_nature_zone_about_feature_image_2' )); ?>">
                            </div>
                          <?php }?>
                          <div class="<?php if(get_theme_mod('eco_nature_zone_about_feature_image_2') != ''){ ?>col-lg-8 col-md-9 col-sm-8<?php } else {?> col-lg-12 col-md-12 <?php }?>">
                            <?php if(get_theme_mod('eco_nature_zone_about_feature_heading_2') != ''){ ?>
                              <h4><?php echo esc_html(get_theme_mod('eco_nature_zone_about_feature_heading_2')); ?></h4>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    <?php }?>
                  </div>
                <?php }?>
                <?php if(get_theme_mod('eco_nature_zone_about_us_button_url') != '' || get_theme_mod('eco_nature_zone_about_us_button_text') != ''){ ?>
                  <div class="about-btn mt-4 pt-2">
                    <a href="<?php echo esc_url(get_theme_mod('eco_nature_zone_about_us_button_url')); ?>"><?php echo esc_html(get_theme_mod('eco_nature_zone_about_us_button_text')); ?><i class="fas fa-leaf ms-2"></i></a>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
          <?php if (get_theme_mod( 'eco_nature_zone_about_right_image' ) != '') { ?>
            <div class="col-lg-4 col-md-12 right-img">
              <img class="about-img" src="<?php echo esc_url( get_theme_mod( 'eco_nature_zone_about_right_image' )); ?>">
            </div>
          <?php }?>
        </div>
      </div>
    </section>
  <?php }?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>