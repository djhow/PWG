(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-eco_nature_zone_options-';
		
		// Label
		function eco_nature_zone_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'eco_nature_zone_scroll_hide' || id === 'eco_nature_zone_preloader_hide' || id === 'eco_nature_zone_sticky_header' || id === 'eco_nature_zone_products_per_row' || id === 'eco_nature_zone_scroll_top_position' || id === 'eco_nature_zone_products_per_row')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'eco_nature_zone_facebook_icon' || id === 'eco_nature_zone_twitter_icon' || id === 'eco_nature_zone_intagram_icon'|| id === 'eco_nature_zone_linkedin_icon'|| id === 'eco_nature_zone_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'eco_nature_zone_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'eco_nature_zone_phone' || id === 'eco_nature_zone_location' || id === 'eco_nature_zone_email' || id === 'eco_nature_zone_header_search_setting' || id === 'eco_nature_zone_header_button' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Slider

			if ( id === 'eco_nature_zone_slider_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Services

			if ( id === 'eco_nature_zone_services_heading' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'eco_nature_zone_footer_widget_content_alignment' || id === 'eco_nature_zone_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Settings

			if ( id === 'eco_nature_zone_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Settings

			if ( id === 'eco_nature_zone_single_post_page_content' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-eco_nature_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		eco_nature_zone_customizer_label( 'custom_logo', 'Logo Setup' );
		eco_nature_zone_customizer_label( 'site_icon', 'Favicon' );

		// General Setting
		eco_nature_zone_customizer_label( 'eco_nature_zone_preloader_hide', 'Preloader' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_scroll_hide', 'Scroll To Top' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_scroll_top_position', 'Scroll to top Position' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_products_per_row', 'woocommerce Setting' );

		// Colors
		eco_nature_zone_customizer_label( 'eco_nature_zone_theme_color', 'Theme Color' );
		eco_nature_zone_customizer_label( 'background_color', 'Colors' );
		eco_nature_zone_customizer_label( 'background_image', 'Image' );

		// Social Icon
		eco_nature_zone_customizer_label( 'eco_nature_zone_facebook_icon', 'Facebook' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_twitter_icon', 'Twitter' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_intagram_icon', 'Intagram' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_linkedin_icon', 'Linkedin' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_pintrest_icon', 'Pintrest' );

		//Header Image
		eco_nature_zone_customizer_label( 'header_image', 'Header Image' );

		// Header
		eco_nature_zone_customizer_label( 'eco_nature_zone_phone', 'Phone' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_location', 'Location' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_email', 'Email' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_header_search_setting', 'Search Header' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_header_button', 'Header Button' );

		//Slider
		eco_nature_zone_customizer_label( 'eco_nature_zone_slider_section_setting', 'Slider' );

		//Services
		eco_nature_zone_customizer_label( 'eco_nature_zone_services_heading', 'Services' );

		//Footer
		eco_nature_zone_customizer_label( 'eco_nature_zone_footer_widget_content_alignment', 'Footer' );
		eco_nature_zone_customizer_label( 'eco_nature_zone_show_hide_copyright', 'Copyright' );

		//Post setting
		eco_nature_zone_customizer_label( 'eco_nature_zone_post_page_title', 'Post Settings' );

		//Single post setting
		eco_nature_zone_customizer_label( 'eco_nature_zone_single_post_page_content', 'Single Post Settings' );
	

	});

})( jQuery );
