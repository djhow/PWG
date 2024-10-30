<?php

/**
 * Template part for displaying match 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$match = new PWG_Match($match_ID = 0, $course_ID = 10);
$match->generateScores();

$players = $match->getPlayers();
foreach ($players as $player) {
	echo '<pre>';
	print_r($player->debug_golfer_meta());
	echo '</pre>';
}
$golfcourse = new PWG_GolfCourse();
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


		// the_content();
		//  echo '<pre>';
		//  print_r($match);
		//  echo '</pre>';
		$player_2 = new PWG_Golfer(get_user_by('id', 2));
		$player_3 = new PWG_Golfer(get_user_by('id', 3));
		$player_4 = new PWG_Golfer(get_user_by('id', 4));
		$match->addPlayer($player_2);
		$match->addPlayer($player_3);
		$match->addPlayer($player_4);
		$match->generateScores();

		$match->show_leaderboard();



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