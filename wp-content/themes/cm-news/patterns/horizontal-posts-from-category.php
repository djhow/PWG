<?php
/**
 * Title: Horizontal Posts From Category
 * Slug: cm-news/horizontal-posts-from-category
 * Categories: query
 * Block Types: core/query
 */
?>
<!-- wp:group {"metadata":{"categories":["posts"],"patternName":"cm-news/horizontal-posts-from-category","name":"Horizontal Posts From Category"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"body-color","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-body-color-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
    <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"24px","left":"24px"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:heading {"level":5,"className":"is-style-cm-news-section-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2"} -->
                <h5 class="wp-block-heading is-style-cm-news-section-title has-text-2-color has-text-color has-link-color"><?php echo __( 'Sports', 'cm-news' ); ?></h5>
                <!-- /wp:heading -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:24px"><!-- wp:query {"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"default","columnCount":3}} -->
                        <!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"12px"}}}} -->
                        <div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"width":"89px"} -->
                            <div class="wp-block-column" style="flex-basis:89px"><!-- wp:post-featured-image {"isLink":true,"width":"89px","height":"79px"} /--></div>
                            <!-- /wp:column -->

                            <!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"blockGap":"8px"}}} -->
                            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%"><!-- wp:post-title {"level":6,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2","fontSize":"extra-small"} /-->

                                <!-- wp:post-date {"className":"is-style-cm-news-date-with-icon","style":{"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}},"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"400"}},"textColor":"cm-text"} /--></div>
                            <!-- /wp:column --></div>
                        <!-- /wp:columns -->
                        <!-- /wp:post-template --></div>
                    <!-- /wp:query --></div>
                <!-- /wp:group --></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:heading {"level":5,"className":"is-style-cm-news-section-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2"} -->
                <h5 class="wp-block-heading is-style-cm-news-section-title has-text-2-color has-text-color has-link-color"><?php echo __( 'Politics', 'cm-news' ); ?></h5>
                <!-- /wp:heading -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:24px"><!-- wp:query {"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"default","columnCount":3}} -->
                        <!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"12px"}}}} -->
                        <div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"width":"89px"} -->
                            <div class="wp-block-column" style="flex-basis:89px"><!-- wp:post-featured-image {"isLink":true,"width":"89px","height":"79px"} /--></div>
                            <!-- /wp:column -->

                            <!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"blockGap":"8px"}}} -->
                            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%"><!-- wp:post-title {"level":6,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2","fontSize":"extra-small"} /-->

                                <!-- wp:post-date {"className":"is-style-cm-news-date-with-icon","style":{"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}},"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"400"}},"textColor":"cm-text"} /--></div>
                            <!-- /wp:column --></div>
                        <!-- /wp:columns -->
                        <!-- /wp:post-template --></div>
                    <!-- /wp:query --></div>
                <!-- /wp:group --></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:heading {"level":5,"className":"is-style-cm-news-section-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2"} -->
                <h5 class="wp-block-heading is-style-cm-news-section-title has-text-2-color has-text-color has-link-color"><?php echo __( 'Technology', 'cm-news' ); ?></h5>
                <!-- /wp:heading -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:24px"><!-- wp:query {"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"default","columnCount":3}} -->
                        <!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"12px"}}}} -->
                        <div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"width":"89px"} -->
                            <div class="wp-block-column" style="flex-basis:89px"><!-- wp:post-featured-image {"isLink":true,"width":"89px","height":"79px"} /--></div>
                            <!-- /wp:column -->

                            <!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"blockGap":"8px"}}} -->
                            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%"><!-- wp:post-title {"level":6,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2","fontSize":"extra-small"} /-->

                                <!-- wp:post-date {"className":"is-style-cm-news-date-with-icon","style":{"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}},"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"400"}},"textColor":"cm-text"} /--></div>
                            <!-- /wp:column --></div>
                        <!-- /wp:columns -->
                        <!-- /wp:post-template --></div>
                    <!-- /wp:query --></div>
                <!-- /wp:group --></div>
            <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
    <!-- /wp:group -->

    <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
    <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer --></div>
<!-- /wp:group -->