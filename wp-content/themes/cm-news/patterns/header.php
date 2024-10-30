<?php
/**
 * Title: Header
 * Slug: cm-news/header
 * Categories: cm-news-header
 * Block Types: core/group, core/columns, core/image, core/cover, core/text, core/paragraph, codemanas/theme
 * @package cm-news
 * @since 1.0.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"background","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:0;padding-bottom:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:10px;padding-bottom:10px"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":3188,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/phone.png' ) ); ?>" alt="" class="wp-image-3188"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2"} -->
                    <p class="has-text-2-color has-text-color has-link-color"><?php echo __( '+977-9876543210', 'cm-news' ); ?></p>
                    <!-- /wp:paragraph --></div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":3187,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/mail.png' ) ); ?>" alt="" class="wp-image-3187"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|text-2"}}}},"textColor":"text-2"} -->
                    <p class="has-text-2-color has-text-color has-link-color"><?php echo __( 'info@example.com', 'cm-news' ); ?></p>
                    <!-- /wp:paragraph --></div>
                <!-- /wp:group --></div>
            <!-- /wp:group -->

            <!-- wp:social-links {"iconColor":"cm-text","iconColorValue":"#c0c0c0","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"12px"}}}} -->
            <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                <!-- wp:social-link {"url":"#","service":"pinterest"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /--></ul>
            <!-- /wp:social-links --></div>
        <!-- /wp:group --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"12px","bottom":"12px"}}},"backgroundColor":"secondary","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:12px;padding-bottom:12px"><!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group alignwide"><!-- wp:site-title {"level":2,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}}},"textColor":"secondary-text"} /-->

            <!-- wp:image {"id":3714,"width":"765px","sizeSlug":"full","linkDestination":"none"} -->
            <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/header-advertisement.jpg' ) ); ?>" alt="" class="wp-image-3714" style="width:765px"/></figure>
            <!-- /wp:image --></div>
        <!-- /wp:group --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"secondary-2","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-secondary-2-background-color has-background"><!-- wp:group {"style":{"spacing":{"padding":{"top":"4px","bottom":"4px"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:4px;padding-bottom:4px"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group alignwide"><!-- wp:navigation {"ref":4,"textColor":"secondary-text","icon":"menu","customOverlayTextColor":"#292929","style":{"spacing":{"blockGap":"12px"}}} /-->

            <!-- wp:group {"className":"cm-news-demo-autocomplete","layout":{"type":"constrained"}} -->
            <div class="wp-block-group cm-news-demo-autocomplete"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}},"typography":{"fontSize":"16px"},"layout":{"selfStretch":"fixed","flexSize":"300px"}},"backgroundColor":"secondary-2","textColor":"secondary-text"} /--></div>
            <!-- /wp:group --></div>
        <!-- /wp:group --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->