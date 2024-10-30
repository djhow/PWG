<?php
/**
 * Title: Podcasts Banner
 * Slug: cm-news/podcasts-banner
 * Categories: cm-news-podcasts
 * Block Types: core/group, core/columns, core/image, core/cover, core/text, core/paragraph, codemanas/theme
 * @package cm-news
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["cm-news-podcasts"],"patternName":"cm-news/podcasts-banner","name":"Podcasts Banner"},"align":"full","gradient":"gradient-1","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-gradient-1-gradient-background has-background"><!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:spacer {"height":"var:preset|spacing|50"} -->
        <div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"24px","left":"24px"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"12px"}}} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"fontSize":"54px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.2"},"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}}},"textColor":"secondary-text","fontFamily":"poppins"} -->
                <h2 class="wp-block-heading has-secondary-text-color has-text-color has-link-color has-poppins-font-family" style="font-size:54px;font-style:normal;font-weight:700;line-height:1.2"><?php echo __( 'Best Podcasts for Your Mind', 'cm-news' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}},"typography":{"fontSize":"18px"}},"textColor":"secondary-text"} -->
                <p class="has-secondary-text-color has-text-color has-link-color" style="font-size:18px"><?php echo __( 'Livecast is compatible with the most popular music platforms in the world, including Spotify, SoundClood, Buzzsrpout, Deezer and others', 'cm-news' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"blockGap":"16px","margin":{"top":"24px"}}}} -->
                <div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"secondary-text","textColor":"secondary-2","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-2"}}},"border":{"radius":"100px","style":"solid","width":"1px"},"spacing":{"padding":{"left":"24px","right":"24px","top":"12px","bottom":"12px"}},"typography":{"fontSize":"16px"}},"borderColor":"secondary-text"} -->
                    <div class="wp-block-button has-custom-font-size" style="font-size:16px"><a class="wp-block-button__link has-secondary-2-color has-secondary-text-background-color has-text-color has-background has-link-color has-border-color has-secondary-text-border-color wp-element-button" style="border-style:solid;border-width:1px;border-radius:100px;padding-top:12px;padding-right:24px;padding-bottom:12px;padding-left:24px"><?php echo __( 'Learn More', 'cm-news' ); ?></a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"backgroundColor":"secondary-2","textColor":"secondary-text","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-text"}}},"border":{"radius":"100px","style":"solid","width":"1px"},"spacing":{"padding":{"left":"24px","right":"24px","top":"12px","bottom":"12px"}},"typography":{"fontSize":"16px"}},"borderColor":"secondary-text"} -->
                    <div class="wp-block-button has-custom-font-size" style="font-size:16px"><a class="wp-block-button__link has-secondary-text-color has-secondary-2-background-color has-text-color has-background has-link-color has-border-color has-secondary-text-border-color wp-element-button" style="border-style:solid;border-width:1px;border-radius:100px;padding-top:12px;padding-right:24px;padding-bottom:12px;padding-left:24px"><?php echo __( 'Listen Now', 'cm-news' ); ?></a></div>
                    <!-- /wp:button --></div>
                <!-- /wp:buttons --></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:image {"id":3405,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/girl-with-headphone.png' ) ); ?>" alt="" class="wp-image-3405"/></figure>
                <!-- /wp:image --></div>
            <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->
