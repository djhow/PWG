<?php
/**
 * Title: 404
 * Slug: cm-news/404
 * Categories: cm-news-fullPage
 * Block Types: core/group, core/columns, core/image, core/cover, core/text, core/paragraph, codemanas/page
 * @package cm-news
 * @since 1.0.0
 */
?>

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group"><!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"width":"20%","layout":{"type":"constrained"}} -->
		<div class="wp-block-column" style="flex-basis:20%"></div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%","layout":{"type":"default"}} -->
		<div class="wp-block-column" style="flex-basis:60%"><!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group"><!-- wp:spacer -->
				<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"10rem"},"elements":{"link":{"color":{"text":"var:preset|color|accent-color"}}}},"textColor":"accent-color","className":"is-style-default"} -->
				<h2 class="wp-block-heading has-text-align-center is-style-default has-accent-color-color has-text-color has-link-color" style="font-size:10rem"><?php echo __( 'OOPS !', 'cm-news' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}},"typography":{"fontSize":"28px","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"12px","bottom":"12px"}}},"textColor":"text-2"} -->
				<p class="has-text-align-center has-text-2-color has-text-color has-link-color" style="padding-top:12px;padding-bottom:12px;font-size:28px;font-style:normal;font-weight:500"><?php echo __( '404 - Page not Found', 'cm-news' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2"} -->
				<p class="has-text-align-center has-text-2-color has-text-color has-link-color"><?php echo __( 'The Page you have been searching is temporarily unavailable', 'cm-news' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"24px"}}}} -->
				<div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo __( 'Go Back', 'cm-news' ); ?></a></div>
					<!-- /wp:button --></div>
				<!-- /wp:buttons -->

				<!-- wp:spacer -->
				<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer --></div>
			<!-- /wp:group --></div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"20%","layout":{"type":"default"}} -->
		<div class="wp-block-column" style="flex-basis:20%"></div>
		<!-- /wp:column --></div>
	<!-- /wp:columns --></main>
<!-- /wp:group -->

