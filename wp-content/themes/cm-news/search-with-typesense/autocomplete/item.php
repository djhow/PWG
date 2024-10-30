<script type="text/html" id="tmpl-cm-autocomplete">
    <div class="aa-ItemWrapper">
        <div class="aa-ItemContent">
            <div class="aa-ItemIcon aa-ItemIcon--alignTop">
                <# if ( data.document.post_thumbnail !== '' && data.document.post_thumbnail !== undefined ) { #>
                <img
                        src="{{{data.document.post_thumbnail}}}"
                        alt="{{data.document.post_title}}"
                        width="40"
                        height="40"
                />
                <# } else { #>
                <img
                        src="<?php echo esc_url( plugins_url( 'assets/placeholder.jpg', CODEMANAS_TYPESENSE_FILE_PATH ) ); ?>"
                        alt="{{data.document.post_title}}"
                        width="40"
                        height="40"
                />
                <# } #>

            </div>
            <div class="aa-ItemContentBody">
            <# if ( data.document.category && data.document.category.length ) { #>
                <div class="aa-ItemCategories">  
                        <# data.document.category.forEach(function(cat) { #>
                            <span>{{cat}}</span>
                        <# }); #>
                </div>
                <# } #>
                <div class="aa-ItemContentTitle">
                    {{{data.formatted.post_title}}}
                </div>
                <div class="aa-ItemAuthorDateTime">
                <div class="aa-ItemAuthor">
                    <span>{{data.document.post_author}}</span> 
                </div>
                <div class="aa-ItemDateTime">
                    <span>{{data.document.post_date}}</span> 
                    <span>{{data.document.post_time}}</span> 
                </div>
                        </div>
               
                <div class="aa-ItemContentDescription">
                    {{data.formatted.sliced_content}}
                </div>
                <div class="aa-ReadMoreLink">
                    <a href="{{data.document.permalink}}" target="_blank">Read More....</a>
                </div>
                
               
            </div>

        </div>
    </div>
</script>