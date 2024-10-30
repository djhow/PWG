<?php
/**
 * Title: Hero Query
 * Slug: cm-news/hero-query
 * Categories: query
 * Block Types: core/query
 */
?>

<!-- wp:group {"align":"full","backgroundColor":"body-color","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-body-color-background-color has-background"><!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide"><!-- wp:spacer {"height":"24px"} -->
        <div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"24px","left":"24px"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:query {"queryId":51,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                <div class="wp-block-query"><!-- wp:post-template -->
                    <!-- wp:group {"style":{"border":{"radius":"4px","style":"solid","width":"1px"}},"borderColor":"cm-border","backgroundColor":"background-2","className":"cm-news-overflow-hidden","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group cm-news-overflow-hidden has-border-color has-cm-border-border-color has-background-2-background-color has-background" style="border-style:solid;border-width:1px;border-radius:4px"><!-- wp:group {"className":"cm-news-img-cat__wrapper","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group cm-news-img-cat__wrapper"><!-- wp:post-featured-image {"isLink":true,"width":"","height":"400px","style":{"spacing":{"margin":{"right":"0","left":"0"}}}} /-->

                            <!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|accent-text"}}}},"textColor":"accent-text"} /--></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"12px","left":"12px","right":"12px"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group" style="padding-top:20px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                            <div class="wp-block-group"><!-- wp:post-author {"showAvatar":false,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text","className":"is-style-cm-news-author-with-icon","fontFamily":"roboto"} /-->

                                <!-- wp:post-date {"style":{"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text","className":"is-style-cm-news-date-with-icon"} /--></div>
                            <!-- /wp:group -->

                            <!-- wp:post-title {"level":4,"isLink":true, "style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"30px"},"spacing":{"padding":{"top":"12px","bottom":"12px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}}},"textColor":"title-color"} /-->

                            <!-- wp:post-excerpt {"moreText":"Read More...","excerptLength":62,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"cm-text"} /--></div>
                        <!-- /wp:group --></div>
                    <!-- /wp:group -->
                    <!-- /wp:post-template --></div>
                <!-- /wp:query --></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:query {"queryId":3,"query":{"perPage":"4","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
                <div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"grid","columnCount":2}} -->
                    <!-- wp:group {"style":{"border":{"radius":"4px","style":"solid","width":"1px"}},"borderColor":"cm-border","backgroundColor":"background-2","className":"cm-news-overflow-hidden","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group cm-news-overflow-hidden has-border-color has-cm-border-border-color has-background-2-background-color has-background" style="border-style:solid;border-width:1px;border-radius:4px"><!-- wp:group {"className":"cm-news-img-cat__wrapper","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group cm-news-img-cat__wrapper"><!-- wp:post-featured-image {"isLink":true,"width":"","height":"160px","style":{"spacing":{"margin":{"right":"0","left":"0"}}}} /-->

                            <!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|accent-text"}}}},"textColor":"accent-text"} /--></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                            <div class="wp-block-group"><!-- wp:post-author {"showAvatar":false,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text","className":"is-style-cm-news-author-with-icon","fontFamily":"roboto"} /-->

                                <!-- wp:post-date {"style":{"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text","className":"is-style-cm-news-date-with-icon"} /--></div>
                            <!-- /wp:group -->

                            <!-- wp:post-title {"level":5,"isLink":true,"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"8px","bottom":"8px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}}},"textColor":"title-color"} /-->

                            <!-- wp:post-excerpt {"moreText":"Read More...","excerptLength":15,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"cm-text"} /--></div>
                        <!-- /wp:group --></div>
                    <!-- /wp:group -->
                    <!-- /wp:post-template --></div>
                <!-- /wp:query --></div>
            <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->