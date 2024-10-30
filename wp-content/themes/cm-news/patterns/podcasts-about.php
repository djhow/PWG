<?php
/**
 * Title: Podcasts About
 * Slug: cm-news/podcasts-about
 * Categories: cm-news-podcasts
 * Block Types: core/group, core/columns, core/image, core/cover, core/text, core/paragraph, codemanas/theme
 * @package cm-news
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["cm-news-podcasts"],"patternName":"cm-news/podcasts-about","name":"Podcasts About"},"align":"full","backgroundColor":"body-color","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-body-color-background-color has-background"><!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide"><!-- wp:spacer {"height":"var:preset|spacing|50"} -->
        <div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"24px","left":"24px"}}}} -->
        <div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":3395,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/podcast-about-img.png' ) ); ?>" alt="" class="wp-image-3395"/></figure>
                <!-- /wp:image --></div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"fontSize":"54px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.4"},"elements":{"link":{"color":{"text":"var:preset|color|title-color"}}}},"textColor":"title-color","fontFamily":"poppins"} -->
                <h2 class="wp-block-heading has-title-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:54px;font-style:normal;font-weight:700;line-height:1.4"><?php echo __( 'Best Podcasts for Your Mind', 'cm-news' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|cm-text"}}},"typography":{"fontSize":"18px"}},"textColor":"cm-text"} -->
                <p class="has-cm-text-color has-text-color has-link-color" style="font-size:18px"><?php echo __( 'Livecast is compatible with the most popular music platforms in the world, including Spotify, SoundClood, Buzzsrpout, Deezer and others', 'cm-news' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"blockGap":"16px","margin":{"top":"24px"}}}} -->
                <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"title-color","textColor":"light-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"border":{"radius":"100px","style":"solid","width":"1px"},"spacing":{"padding":{"left":"24px","right":"24px","top":"12px","bottom":"12px"}},"typography":{"fontSize":"16px"}},"borderColor":"background"} -->
                    <div class="wp-block-button has-custom-font-size" style="font-size:16px"><a class="wp-block-button__link has-light-color-color has-title-color-background-color has-text-color has-background has-link-color has-border-color has-background-border-color wp-element-button" style="border-style:solid;border-width:1px;border-radius:100px;padding-top:12px;padding-right:24px;padding-bottom:12px;padding-left:24px"><?php echo __( 'Learn More', 'cm-news' ); ?></a></div>
                    <!-- /wp:button --></div>
                <!-- /wp:buttons --></div>
            <!-- /wp:column --></div>
        <!-- /wp:columns -->

        <!-- wp:spacer {"height":"var:preset|spacing|50"} -->
        <div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->
