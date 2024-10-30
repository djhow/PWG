<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
$course_id = get_the_ID();
//$golf_course = new PWG_GolfCourse($course_id);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (! is_front_page()) : ?>
		<header class="entry-header alignwide">
			<?php get_template_part('template-parts/header/entry-header'); ?>
			<?php twenty_twenty_one_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php elseif (has_post_thumbnail()) : ?>
		<header class="entry-header alignwide">
			<?php twenty_twenty_one_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php

		the_content();
		$display_options = [
			'show_hole_names' => true,
			'show_tees' => ['yellow'],
			'show_si' => false,
			'show_totals' => true
		];
		// Wrap in a div for styling
		echo '<div class="golf-course-wrapper">';

		// Display the scorecard
		echo PWG_GolfCourse::render_scorecard($course_id, $display_options);

		echo '</div>';


		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__('Page %', 'twentytwentyone'),
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer default-max-width">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					esc_html__('Edit %s', 'twentytwentyone'),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->