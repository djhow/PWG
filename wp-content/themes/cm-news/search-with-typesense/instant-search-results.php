<?php
/*
 * tmpl-cmswt-Result-itemTemplate--[post-type-slug]
 * for different templates for different post types add the post type slug instead of [post-type-slug] as the id
 * example tmpl-cm-typesense-shortcode-page-search-results or tmpl-cm-typesense-shortcode-book-search-results
 */

 add_filter( 'cm_tsfwc_attribute_facet_skip', 'mytheme_hide_attribute_facet' );

function mytheme_hide_attribute_facet() {
    return ['book-author'];
}
?>
<script type="text/html" id="tmpl-cmswt-Result-itemTemplate--default">
    <# if(data.taxonomy === undefined){ #>
    <div class="hit-header">
        <# var imageHTML = '';
        if(data.post_thumbnail_html !== undefined && data.post_thumbnail_html !== ''){
        imageHTML = data.post_thumbnail_html
        }else if(data.post_thumbnail !== undefined && data.post_thumbnail !== ''){
        imageHTML = `<img src="${data.post_thumbnail}"
                          alt="${data.post_title}"
                          class="ais-Hit-itemImage"
        />`
        }
        else{
        imageHTML = `<img src="<?php echo esc_url( CODEMANAS_TYPESENSE_THUMBNAIL_IMAGE_URL ) ?>"
                          alt="${data.post_title}"
                          class="ais-Hit-itemImage"
        />`
        }
        #>
        <# if(imageHTML !== ''){ #>
        <a href="{{{data._highlightResult.permalink.value}}}" class="hit-header--link" rel="nofollow noopener">{{{imageHTML}}}</a>
        <# } #>
    </div>
    <# } #>
    <div class="hit-content">
    <# if ( Object.keys(data.formatted.cats).length > 0 ) { #>
            <div class="cm-news hit-cats">
                <# for ( let key in data.formatted.cats ) { #>
                <div class="hit-cat taxonomy-category"><a href="{{{data.formatted.cats[key]}}}">{{{key}}}</a></div>
                <# } #>
            </div>
            <# } #>
        <# if(data._highlightResult.permalink !== undefined ) { #>
        <a href="{{{data._highlightResult.permalink.value}}}" class="hit-contentLink" rel="nofollow noopener"><h5 class="title">
                {{{data.formatted.post_title}}}</h5></a>
        <# } #>
        <# if( data.post_type === 'post' ) { #>
            <div class="wp-block-group is-nowrap is-layout-flex wp-container-core-group-is-layout-19 wp-block-group-is-layout-flex">
                <div style="font-size:12px;font-style:normal;font-weight:400;" class="has-link-color has-text-color has-cm-text-color is-style-cm-news-author-with-icon wp-block-post-author has-roboto-font-family wp-elements-624821713b977a71f3bb6c1cf8a96acd">
                    <div class="wp-block-post-author__content">
                        <p class="wp-block-post-author__name">admin</p>
                    </div>
                </div>
                
    <div style="font-size:12px;font-style:normal;font-weight:400;" class="has-link-color has-text-color has-cm-text-color is-style-cm-news-date-with-icon wp-block-post-date wp-elements-6e1d59f23a4ba4b070027ddc731588bb"><time datetime="2024-07-10T06:08:51+00:00">July 10, 2024</time></div></div>
        <# } #>
        <div class="hit-description">{{{data.formatted.post_content}}}</div>
        <div class="hit-link">
            <a href="{{data.permalink}}"><?php _e( 'Read More...', 'cm-news' ); ?></a>
        </div>
    </div>
</script>