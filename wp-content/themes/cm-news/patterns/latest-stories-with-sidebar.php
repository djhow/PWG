<?php
/**
 * Title: Latest Stories With Sidebar
 * Slug: cm-news/latest-stories-with-sidebar
 * Categories: query
 * Block Types: core/query
 */
?>

<!-- wp:group {"align":"full","backgroundColor":"body-color","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-body-color-background-color has-background"><!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"center"}} -->
    <div class="wp-block-group alignwide"><!-- wp:spacer {"height":"60px"} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:heading {"textAlign":"left","level":5,"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}}},"textColor":"title-color","className":"is-style-cm-news-section-title"} -->
        <h5 class="wp-block-heading alignwide has-text-align-left is-style-cm-news-section-title has-title-color-color has-text-color has-link-color"><?php echo __( 'Latest Stories', 'cm-news' ); ?></h5>
        <!-- /wp:heading -->

        <!-- wp:spacer {"height":"36px"} -->
        <div style="height:36px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"24px","left":"24px"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"width":"70%"} -->
            <div class="wp-block-column" style="flex-basis:70%"><!-- wp:query {"queryId":3,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
                <div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"default","columnCount":4}} -->
                    <!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"style":"solid","width":"1px"}},"borderColor":"cm-border","backgroundColor":"background-2"} -->
                    <div class="wp-block-columns has-border-color has-cm-border-border-color has-background-2-background-color has-background" style="border-style:solid;border-width:1px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"width":"30%"} -->
                        <div class="wp-block-column" style="flex-basis:30%"><!-- wp:post-featured-image {"isLink":true,"width":"","height":"180px","style":{"spacing":{"margin":{"right":"0","left":"0"}}}} /--></div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"100%"} -->
                        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:100%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"},"blockGap":"7px"}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|accent-text"}}},"spacing":{"margin":{"top":"3px","bottom":"3px"}}},"textColor":"accent-text"} /-->

                                <!-- wp:post-title {"level":5,"isLink":true,"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"8px","bottom":"0px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}}},"textColor":"title-color"} /-->

                                <!-- wp:group {"style":{"spacing":{"blockGap":"12px","margin":{"top":"12px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                                <div class="wp-block-group" style="margin-top:12px"><!-- wp:post-author {"showAvatar":false,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text","className":"is-style-cm-news-author-with-icon","fontFamily":"roboto"} /-->

                                    <!-- wp:post-date {"style":{"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text","className":"is-style-cm-news-date-with-icon"} /--></div>
                                <!-- /wp:group -->

                                <!-- wp:post-excerpt {"moreText":"Read More...","excerptLength":15,"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-color"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"cm-text"} /--></div>
                            <!-- /wp:group --></div>
                        <!-- /wp:column --></div>
                    <!-- /wp:columns -->
                    <!-- /wp:post-template --></div>
                <!-- /wp:query --></div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"33%"} -->
            <div class="wp-block-column" style="flex-basis:33%"><!-- wp:template-part {"slug":"sidebar","area":"uncategorized"} /--></div>
            <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->