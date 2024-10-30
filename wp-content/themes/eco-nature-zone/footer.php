<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eco Nature Zone
 */
do_action('eco_nature_zone_before_footer_content_action');
?>


<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
    		<div class="row">
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		          	<?php if (is_active_sidebar('eco-nature-zone-footer1')) : ?>
                        <?php dynamic_sidebar('eco-nature-zone-footer1'); ?>
                    <?php else : ?>
                        <aside id="search" class="widget" role="complementary" aria-label="firstsidebar">
                            <h5 class="widget-title"><?php esc_html_e( 'About Us', 'eco-nature-zone' ); ?></h5>
                            <div class="textwidget">
                            	<p><?php esc_html_e( 'Nam malesuada nulla nisi, ut faucibus magna congue nec. Ut libero tortor, tempus at auctor in, molestie at nisi. In enim ligula, consequat eu feugiat a.', 'eco-nature-zone' ); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('eco-nature-zone-footer2')) : ?>
                        <?php dynamic_sidebar('eco-nature-zone-footer2'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Useful Links', 'eco-nature-zone' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Home', 'eco-nature-zone' ); ?></li>
                            	<li><?php esc_html_e( 'services', 'eco-nature-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Reviews', 'eco-nature-zone' ); ?></li>
                            	<li><?php esc_html_e( 'About Us', 'eco-nature-zone' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('eco-nature-zone-footer3')) : ?>
                        <?php dynamic_sidebar('eco-nature-zone-footer3'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Information', 'eco-nature-zone' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'FAQ', 'eco-nature-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Site Maps', 'eco-nature-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Privacy Policy', 'eco-nature-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Contact Us', 'eco-nature-zone' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('eco-nature-zone-footer4')) : ?>
                        <?php dynamic_sidebar('eco-nature-zone-footer4'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Get In Touch', 'eco-nature-zone' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Via Carlo Montù 78', 'eco-nature-zone' ); ?><br><?php esc_html_e( '22021 Bellagio CO, Italy', 'eco-nature-zone' ); ?></li>
                            	<li><?php esc_html_e( '+11 6254 7855', 'eco-nature-zone' ); ?></li>
                            	<li><?php esc_html_e( 'support@example.com', 'eco-nature-zone' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
	      	</div>
		</div>
    	<?php if (get_theme_mod('eco_nature_zone_show_hide_copyright', true)) {?>
		        <div class="site-info text-center">
		            <div class="footer-menu-left">
		            	<?php  if( ! get_theme_mod('eco_nature_zone_footer_text_setting') ){ ?>
						    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/', 'eco-nature-zone' ); ?>">
								<?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( 'Proudly powered by %s', 'eco-nature-zone' ), 'WordPress' );
								?>
						    </a>
						    <span class="sep mr-1"> | </span>

						    <span>
				              	<?php
				                /* translators: 1: Theme name,  */
				                printf( esc_html__( ' %1$s ', 'eco-nature-zone' ),'Nature WordPress Theme' );
				              	?>
					          	<?php
					              /* translators: 1: Theme author. */
					              printf( esc_html__( 'by %1$s.', 'eco-nature-zone' ),'TheMagnifico'  );
					            ?>
		        			</span>
						<?php }?>
						<?php echo esc_html(get_theme_mod('eco_nature_zone_footer_text_setting')); ?>
		            </div>
		        </div>
		<?php } ?>
	    <?php if(get_theme_mod('eco_nature_zone_scroll_hide','')){ ?>
	    	<a id="button"><?php esc_html_e('TOP','eco-nature-zone'); ?></a>
	    <?php } ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>