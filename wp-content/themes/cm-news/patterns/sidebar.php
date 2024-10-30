<?php
/**
 * Title: Sidebar
 * Slug: cm-news/sidebar
 * Categories: cm-news-sidebar
 * Block Types: core/group, core/columns, core/image, core/cover, core/text, core/paragraph, codemanas/theme
 * @package cm-news
 * @since 1.0.0
 */
?>

<!-- wp:group {"tagName":"aside","style":{"spacing":{"blockGap":"36px"}},"layout":{"type":"default"}} -->
<aside class="wp-block-group"><!-- wp:image {"id":3346,"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/siderbar-ads.jpg' ) ); ?>" alt="" class="wp-image-3346"/></figure>
    <!-- /wp:image -->

    <!-- wp:group {"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:heading {"level":5,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}}},"textColor":"title-color","className":"is-style-cm-news-section-title"} -->
        <h5 class="wp-block-heading is-style-cm-news-section-title has-title-color-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:400"><?php echo __( 'Search Bar', 'cm-news' ); ?></h5>
        <!-- /wp:heading -->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"}}},"className":"cm-news-demo-autocomplete","layout":{"type":"default"}} -->
        <div class="wp-block-group cm-news-demo-autocomplete" style="margin-top:24px"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-text"}}},"typography":{"fontSize":"16px"},"border":{"color":"#F2F2F2","radius":"0px"}},"backgroundColor":"accent-color","textColor":"accent-text"} /--></div>
        <!-- /wp:group --></div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"24px","margin":{"top":"36px","bottom":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group" style="margin-top:36px;margin-bottom:0"><!-- wp:heading {"level":5,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}}},"textColor":"title-color","className":"is-style-cm-news-section-title"} -->
        <h5 class="wp-block-heading is-style-cm-news-section-title has-title-color-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:400"><?php echo __( 'Popular Posts', 'cm-news' ); ?></h5>
        <!-- /wp:heading -->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group" style="margin-top:24px"><!-- wp:query {"queryId":0,"query":{"perPage":"4","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
            <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"default"}} -->
                <!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"12px"},"padding":{"right":"0","left":"0"}}}} -->
                <div class="wp-block-columns is-not-stacked-on-mobile" style="padding-right:0;padding-left:0"><!-- wp:column {"width":"56px"} -->
                    <div class="wp-block-column" style="flex-basis:56px"><!-- wp:post-featured-image {"isLink":true,"width":"56px","height":"48px","style":{"border":{"radius":"0px"}}} /--></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-title {"level":6,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"14px"},"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}}},"textColor":"title-color"} /--></div>
                    <!-- /wp:column --></div>
                <!-- /wp:columns -->
                <!-- /wp:post-template --></div>
            <!-- /wp:query --></div>
        <!-- /wp:group --></div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"24px","padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"border":{"style":"solid","width":"1px"}},"borderColor":"cm-border","backgroundColor":"background-2","layout":{"type":"default"}} -->
    <div class="wp-block-group has-border-color has-cm-border-border-color has-background-2-background-color has-background" style="border-style:solid;border-width:1px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"title-color"} -->
        <h3 class="wp-block-heading has-text-align-center has-title-color-color has-text-color has-link-color" style="font-style:normal;font-weight:500"><?php echo __( 'Contact Us', 'cm-news' ); ?></h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"},"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}}},"textColor":"cm-text"} -->
        <p class="has-text-align-center has-cm-text-color has-text-color has-link-color" style="font-size:16px"><?php echo __( 'In the dynamic world of WordPress, we emerge as a beacon of innovation and excellence.', 'cm-news' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons"><!-- wp:button -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo __( 'VISIT US', 'cm-news' ); ?></a></div>
            <!-- /wp:button --></div>
        <!-- /wp:buttons --></div>
    <!-- /wp:group --></aside>
<!-- /wp:group -->