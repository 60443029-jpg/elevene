(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-the_perfume_shop_options-';
		
		// Label
		function the_perfume_shop_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'the_perfume_shop_global_color' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'the_perfume_shop_scroll_hide' || id === 'the_perfume_shop_preloader_hide' || id === 'the_perfume_shop_sticky_header' || id === 'the_perfume_shop_products_per_row'  || id === 'the_perfume_shop_width_option' || id === 'the_perfume_shop_woo_product_border_radius' )  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'the_perfume_shop_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'the_perfume_shop_woocommerce_product_sale' || id === 'the_perfume_shop_woocommerce_related_product_show_hide') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'the_perfume_shop_social_icon_setting' || id === 'the_perfume_shop_facebook_icon' || id === 'the_perfume_shop_twitter_icon' || id === 'the_perfume_shop_intagram_icon'|| id === 'the_perfume_shop_linkedin_icon'|| id === 'the_perfume_shop_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'the_perfume_shop_topbar_phone_text' || id === 'the_perfume_shop_header_search_setting' || id === 'the_perfume_shop_header_button_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Slider

			if ( id === 'the_perfume_shop_slider_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Product

			if ( id === 'the_perfume_shop_product_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'the_perfume_shop_footer_widget_content_alignment' || id === 'the_perfume_shop_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Settings

			if ( id === 'the_perfume_shop_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'the_perfume_shop_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Settings

			if ( id === 'the_perfume_shop_single_post_page_content' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-the_perfume_shop_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		the_perfume_shop_customizer_label( 'custom_logo', 'Logo Setup' );
		the_perfume_shop_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		the_perfume_shop_customizer_label( 'the_perfume_shop_global_color', 'Global Color' );

		// General Setting
		the_perfume_shop_customizer_label( 'the_perfume_shop_preloader_hide', 'Preloader' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_scroll_hide', 'Scroll To Top' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_products_per_row', 'woocommerce Setting' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_woocommerce_product_sale', 'Woocommerce Product Sale' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_width_option', 'Site Width Layouts' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_sticky_header', 'Sticky Header' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_woo_product_border_radius', 'Woocommerce Product Border Radius' );


		// Colors
		the_perfume_shop_customizer_label( 'the_perfume_shop_theme_color', 'Theme Color' );
		the_perfume_shop_customizer_label( 'background_color', 'Colors' );
		the_perfume_shop_customizer_label( 'background_image', 'Image' );

		//Header Image
		the_perfume_shop_customizer_label( 'header_image', 'Header Image' );

		// Social Icon
		the_perfume_shop_customizer_label( 'the_perfume_shop_social_icon_setting', 'Social Icon' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_facebook_icon', 'Facebook' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_twitter_icon', 'Twitter' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_intagram_icon', 'Intagram' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_linkedin_icon', 'Linkedin' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_pintrest_icon', 'Pintrest' );

		// Header
		the_perfume_shop_customizer_label( 'the_perfume_shop_topbar_phone_text', 'Phone Number' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_header_search_setting', 'Search Icon' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_header_button_text', 'Header Button' );

		//Slider
		the_perfume_shop_customizer_label( 'the_perfume_shop_slider_section_setting', 'Slider' );

		//Product
		the_perfume_shop_customizer_label( 'the_perfume_shop_product_section_setting', 'Product Option' );

		//Footer
		the_perfume_shop_customizer_label( 'the_perfume_shop_footer_widget_content_alignment', 'Footer' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_show_hide_copyright', 'Copyright' );

		//Post setting
		the_perfume_shop_customizer_label( 'the_perfume_shop_post_page_title', 'Post Settings' );

		//Single post setting
		the_perfume_shop_customizer_label( 'the_perfume_shop_single_post_page_content', 'Single Post Settings' );
		the_perfume_shop_customizer_label( 'the_perfume_shop_single_post_comment_title', 'Single Post Comment' );
	

	});

})( jQuery );
