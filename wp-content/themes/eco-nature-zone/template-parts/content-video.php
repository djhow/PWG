<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eco Nature Zone
 */
$eco_nature_zone_post_page_title =  get_theme_mod( 'eco_nature_zone_post_page_title', 1 );
$eco_nature_zone_post_page_meta =  get_theme_mod( 'eco_nature_zone_post_page_meta', 1 );
$eco_nature_zone_post_page_content =  get_theme_mod( 'eco_nature_zone_post_page_content', 1 );
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<div class="col-lg-6 col-md-6 col-sm-6">
  <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the video file.
        if ( ! empty( $video ) ) {
          foreach ( $video as $video_html ) {
            echo '<div class="entry-video">';
              echo $video_html;
            echo '</div>';
          }
        };
      };
    ?> 
    <div class="serv-cont">
      <?php if ($eco_nature_zone_post_page_meta == 1 ) {?>
        <div class="meta-info-box my-2">
          <span class="entry-author"><?php esc_html_e('BY','eco-nature-zone'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
          <span class="ms-2"><?php echo esc_html(get_the_date()); ?></span>
        </div>
      <?php }?>
      <div class="post-summery">
        <?php if ($eco_nature_zone_post_page_title == 1 ) {?>
          <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
        <?php }?>
        <?php if ($eco_nature_zone_post_page_content == 1 ) {?>
          <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
        <?php }?>
        <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','eco-nature-zone'); ?></a>
      </div>
    </div>
  </article>
</div>