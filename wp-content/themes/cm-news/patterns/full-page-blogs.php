<?php
/**
 * Title: Full Page Blogs
 * Slug: cm-news/full-page
 * Categories: cm-news-fullPage, query
 * Block Types: core/group, core/columns, core/image, core/cover, core/text, core/paragraph, codemanas/page
 * @package cm-news
 * @since 1.0.0
 */
?>
<!-- wp:group {"tagName":"main","align":"full","backgroundColor":"body-color","layout":{"type":"default"}} -->
<main class="wp-block-group alignfull has-body-color-background-color has-background"><!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"center"}} -->
    <div class="wp-block-group alignwide"><!-- wp:spacer {"height":"60px"} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:heading {"textAlign":"left","level":5,"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2","className":"is-style-cm-news-section-title"} -->
        <h5 class="wp-block-heading alignwide has-text-align-left is-style-cm-news-section-title has-text-2-color has-text-color has-link-color"><?php echo __( 'Blogs', 'cm-news' ); ?></h5>
        <!-- /wp:heading -->

        <!-- wp:spacer {"height":"36px"} -->
        <div style="height:36px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:query {"queryId":3,"query":{"perPage":"12","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
        <div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"grid","columnCount":4}} -->
            <!-- wp:group {"style":{"border":{"radius":"4px","style":"solid","width":"1px"}},"borderColor":"cm-border","backgroundColor":"background-2","className":"cm-news-overflow-hidden","layout":{"type":"constrained"}} -->
            <div class="wp-block-group cm-news-overflow-hidden has-border-color has-cm-border-border-color has-background-2-background-color has-background" style="border-style:solid;border-width:1px;border-radius:4px"><!-- wp:group {"className":"cm-news-img-cat__wrapper","layout":{"type":"constrained"}} -->
                <div class="wp-block-group cm-news-img-cat__wrapper"><!-- wp:post-featured-image {"isLink":true,"width":"","height":"170px","style":{"spacing":{"margin":{"right":"0","left":"0"}}}} /-->

                    <!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|accent-text"}}}},"textColor":"accent-text"} /--></div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"backgroundColor":"light-color","layout":{"type":"default"}} -->
                <div class="wp-block-group has-light-color-background-color has-background" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:post-author {"showAvatar":false,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text","className":"is-style-cm-news-author-with-icon","fontFamily":"roboto"} /-->

                        <!-- wp:post-date {"style":{"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text","className":"is-style-cm-news-date-with-icon"} /--></div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"level":5,"isLink":true,"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"8px","bottom":"8px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2"} /-->

                    <!-- wp:post-excerpt {"moreText":"Read More...","excerptLength":15,"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"cm-text"} /--></div>
                <!-- /wp:group --></div>
            <!-- /wp:group -->
            <!-- /wp:post-template -->

            <!-- wp:spacer {"height":"36px"} -->
            <div style="height:36px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:query-pagination {"paginationArrow":"chevron","showLabel":false,"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"text-2"} -->
            <!-- wp:query-pagination-previous /-->

            <!-- wp:query-pagination-numbers {"midSize":1} /-->

            <!-- wp:query-pagination-next /-->
            <!-- /wp:query-pagination --></div>
        <!-- /wp:query -->

        <!-- wp:spacer {"height":"var:preset|spacing|40"} -->
        <div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer --></div>
    <!-- /wp:group --></main>
<!-- /wp:group -->