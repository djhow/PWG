<?php
/**
 *  Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eco Nature Zone
 */

$eco_nature_zone_single_post_page_content =  get_theme_mod( 'eco_nature_zone_single_post_page_content', 1 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <?php if(has_post_thumbnail()) {?>
            <?php the_post_thumbnail(); ?>
        <?php }?>
    </header>
    <div class="meta-info-box my-2">
        <span class="entry-author"><?php esc_html_e('BY','eco-nature-zone'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        <span class="ms-2"><?php echo esc_html(get_the_date()); ?></span>
    </div>
    <div class="entry-content">
        <?php if ($eco_nature_zone_single_post_page_content == 1 ) {?>
            <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'eco-nature-zone'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                esc_html( get_the_title() )
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'eco-nature-zone'),
                'after' => '</div>',
            ));

            the_tags();
            ?>
        <?php }?>
    </div>

</article>