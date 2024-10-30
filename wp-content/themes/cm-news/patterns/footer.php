<?php
/**
 * Title: Footer
 * Slug: cm-news/footer
 * Categories: cm-news-footer
 * Block Types: core/group, core/columns, core/image, core/cover, core/text, core/paragraph, codemanas/theme
 * @package cm-news
 * @since 1.0.0
 */
?>

<!-- wp:group {"tagName":"footer","metadata":{"categories":["cm-news-footer"],"patternName":"cm-news/footer","name":"Footer"},"align":"full","backgroundColor":"background-2","layout":{"type":"default"}} -->
<footer class="wp-block-group alignfull has-background-2-background-color has-background"><!-- wp:group {"backgroundColor":"secondary","layout":{"type":"default"}} -->
    <div class="wp-block-group has-secondary-background-color has-background"><!-- wp:spacer -->
        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"24px","left":"24px"}}}} -->
            <div class="wp-block-columns alignwide"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:site-title {"level":2,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}}},"textColor":"secondary-text"} /-->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="margin-top:24px"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}}},"textColor":"secondary-text"} -->
                        <p class="has-secondary-text-color has-text-color has-link-color"><?php echo __( 'Your source for the lifestyle news. This demo is crafted specifically to exhibit the use of the theme as a lifestyle site. Visit our main page for more.', 'cm-news' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}},"spacing":{"padding":{"top":"8px","bottom":"8px"}}},"textColor":"secondary-text"} -->
                        <p class="has-secondary-text-color has-text-color has-link-color" style="padding-top:8px;padding-bottom:8px"><?php echo __( "We're social, connect with us:", 'cm-news' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:social-links {"iconColor":"secondary-text","iconColorValue":"#FDFDFD","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"8px"},"margin":{"top":"12px"}}}} -->
                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:12px"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                            <!-- wp:social-link {"url":"#","service":"pinterest"} /-->

                            <!-- wp:social-link {"url":"#","service":"instagram"} /--></ul>
                        <!-- /wp:social-links --></div>
                    <!-- /wp:group --></div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}}},"textColor":"secondary-text"} -->
                    <h4 class="wp-block-heading has-secondary-text-color has-text-color has-link-color"><?php echo __( 'Popular Posts', 'cm-news' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="margin-top:24px;padding-right:0;padding-left:0"><!-- wp:query {"queryId":7,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                        <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"default","columnCount":3}} -->
                            <!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                            <div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"56px","height":"48px"} /-->

                                <!-- wp:post-title {"level":6,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"400"}},"textColor":"secondary-text"} /--></div>
                            <!-- /wp:group -->
                            <!-- /wp:post-template --></div>
                        <!-- /wp:query --></div>
                    <!-- /wp:group --></div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}}},"textColor":"secondary-text"} -->
                    <h4 class="wp-block-heading has-secondary-text-color has-text-color has-link-color"><?php echo __( 'Recent Posts', 'cm-news' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="margin-top:24px;padding-right:0;padding-left:0"><!-- wp:query {"queryId":7,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                        <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"default","columnCount":3}} -->
                            <!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                            <div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"56px","height":"48px"} /-->

                                <!-- wp:post-title {"level":6,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"400"}},"textColor":"secondary-text"} /--></div>
                            <!-- /wp:group -->
                            <!-- /wp:post-template --></div>
                        <!-- /wp:query --></div>
                    <!-- /wp:group --></div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}}},"textColor":"secondary-text"} -->
                    <h4 class="wp-block-heading has-secondary-text-color has-text-color has-link-color"><?php echo __( 'Categories', 'cm-news' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="margin-top:24px;padding-right:0;padding-left:0"><!-- wp:tag-cloud {"numberOfTags":15,"taxonomy":"category","smallestFontSize":"14px","largestFontSize":"14px","className":"is-style-cm-news-tag-cloud","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0"}}}} /--></div>
                    <!-- /wp:group --></div>
                <!-- /wp:column --></div>
            <!-- /wp:columns --></div>
        <!-- /wp:group -->

        <!-- wp:spacer {"height":"var:preset|spacing|50"} -->
        <div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer --></div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px"}}},"backgroundColor":"secondary-2","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-secondary-2-background-color has-background" style="padding-top:24px;padding-bottom:24px"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"secondary-text"} -->
        <p class="has-text-align-center has-secondary-text-color has-text-color has-link-color"><?php echo __( '© 2024 CM News. All Right Reserved. Codemanas | Powered By WordPress', 'cm-news' ); ?></p>
        <!-- /wp:paragraph --></div>
    <!-- /wp:group --></footer>
<!-- /wp:group -->