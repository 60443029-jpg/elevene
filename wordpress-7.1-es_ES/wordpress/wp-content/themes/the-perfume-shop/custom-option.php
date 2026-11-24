<?php

    $the_perfume_shop_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $the_perfume_shop_scroll_position = get_theme_mod( 'the_perfume_shop_scroll_top_position','Right');
    if($the_perfume_shop_scroll_position == 'Right'){
        $the_perfume_shop_theme_css .='#button{';
            $the_perfume_shop_theme_css .='right: 20px;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_scroll_position == 'Left'){
        $the_perfume_shop_theme_css .='#button{';
            $the_perfume_shop_theme_css .='left: 20px;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_scroll_position == 'Center'){
        $the_perfume_shop_theme_css .='#button{';
            $the_perfume_shop_theme_css .='right: 50%;left: 50%;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $the_perfume_shop_footer_widget_content_alignment = get_theme_mod( 'the_perfume_shop_footer_widget_content_alignment','Left');
    if($the_perfume_shop_footer_widget_content_alignment == 'Left'){
        $the_perfume_shop_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $the_perfume_shop_theme_css .='text-align: left;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_footer_widget_content_alignment == 'Center'){
        $the_perfume_shop_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $the_perfume_shop_theme_css .='text-align: center;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_footer_widget_content_alignment == 'Right'){
        $the_perfume_shop_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $the_perfume_shop_theme_css .='text-align: right;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $the_perfume_shop_copyright_content_alignment = get_theme_mod( 'the_perfume_shop_copyright_content_alignment','Center');
    if($the_perfume_shop_copyright_content_alignment == 'Left'){
        $the_perfume_shop_theme_css .='.footer-menu-left{';
        $the_perfume_shop_theme_css .='text-align: left !important;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_copyright_content_alignment == 'Center'){
        $the_perfume_shop_theme_css .='.footer-menu-left{';
            $the_perfume_shop_theme_css .='text-align: center !important;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_copyright_content_alignment == 'Right'){
        $the_perfume_shop_theme_css .='.footer-menu-left{';
            $the_perfume_shop_theme_css .='text-align: right !important;';
        $the_perfume_shop_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $the_perfume_shop_width_option = get_theme_mod( 'the_perfume_shop_width_option','Full Width');
    if($the_perfume_shop_width_option == 'Boxed Width'){
        $the_perfume_shop_theme_css .='body{';
            $the_perfume_shop_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $the_perfume_shop_theme_css .='}';
        $the_perfume_shop_theme_css .='.scrollup i{';
            $the_perfume_shop_theme_css .='right: 100px;';
        $the_perfume_shop_theme_css .='}';
        $the_perfume_shop_theme_css .='.page-template-custom-home-page .home-page-header{';
            $the_perfume_shop_theme_css .='padding: 0px 40px 0 10px;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_width_option == 'Wide Width'){
        $the_perfume_shop_theme_css .='body{';
            $the_perfume_shop_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $the_perfume_shop_theme_css .='}';
        $the_perfume_shop_theme_css .='.scrollup i{';
            $the_perfume_shop_theme_css .='right: 30px;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_width_option == 'Full Width'){
        $the_perfume_shop_theme_css .='body{';
            $the_perfume_shop_theme_css .='max-width: 100%;';
        $the_perfume_shop_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $the_perfume_shop_nav_menu = get_theme_mod( 'the_perfume_shop_nav_menu_text_transform','Uppercase');
    if($the_perfume_shop_nav_menu == 'Capitalize'){
        $the_perfume_shop_theme_css .='.main-navigation .menu > li > a{';
            $the_perfume_shop_theme_css .='text-transform:Capitalize;';
        $the_perfume_shop_theme_css .='}';
    }
    if($the_perfume_shop_nav_menu == 'Lowercase'){
        $the_perfume_shop_theme_css .='.main-navigation .menu > li > a{';
            $the_perfume_shop_theme_css .='text-transform:Lowercase;';
        $the_perfume_shop_theme_css .='}';
    }
    if($the_perfume_shop_nav_menu == 'Uppercase'){
        $the_perfume_shop_theme_css .='.main-navigation .menu > li > a{';
            $the_perfume_shop_theme_css .='text-transform:Uppercase;';
        $the_perfume_shop_theme_css .='}';
    }

    $the_perfume_shop_menu_font_size = get_theme_mod( 'the_perfume_shop_menu_font_size');
    if($the_perfume_shop_menu_font_size != ''){
        $the_perfume_shop_theme_css .='.main-navigation .menu > li > a{';
            $the_perfume_shop_theme_css .='font-size: '.esc_attr($the_perfume_shop_menu_font_size).'px;';
        $the_perfume_shop_theme_css .='}';
    }

    $the_perfume_shop_nav_menu_font_weight = get_theme_mod( 'the_perfume_shop_nav_menu_font_weight',500);
    if($the_perfume_shop_menu_font_size != ''){
        $the_perfume_shop_theme_css .='.main-navigation .menu > li > a{';
            $the_perfume_shop_theme_css .='font-weight: '.esc_attr($the_perfume_shop_nav_menu_font_weight).';';
        $the_perfume_shop_theme_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

    $the_perfume_shop_first_color = get_theme_mod('the_perfume_shop_first_color');
    $the_perfume_shop_second_color = get_theme_mod('the_perfume_shop_second_color');

    if ($the_perfume_shop_first_color) {
        $the_perfume_shop_theme_css .= ':root {';
        $the_perfume_shop_theme_css .= '--first-color: ' . esc_attr($the_perfume_shop_first_color) . ' !important;';
        $the_perfume_shop_theme_css .= '} ';
    }

    if ($the_perfume_shop_second_color) {
        $the_perfume_shop_theme_css .= ':root {';
        $the_perfume_shop_theme_css .= '--second-color: ' . esc_attr($the_perfume_shop_second_color) . ' !important;';
        $the_perfume_shop_theme_css .= '} ';
    }

    /*-------------------- Global Second Color -------------------*/

    $the_perfume_shop_global_second_color = get_theme_mod('the_perfume_shop_global_second_color');

    if($the_perfume_shop_global_second_color != false){
        $the_perfume_shop_theme_css .='.top-info hr, .search-form-main input.search-submit, #top-slider .slider-inner-box h3:after, #top-slider button.owl-dot span, .main-navigation .sub-menu, .main-navigation .sub-menu > li > a:hover, .main-navigation .sub-menu > li > a:focus{';
            $the_perfume_shop_theme_css .='background-color: '.esc_attr($the_perfume_shop_global_second_color).';';
        $the_perfume_shop_theme_css .='}';
    }

    if($the_perfume_shop_global_second_color != false){
        $the_perfume_shop_theme_css .='.wish-btn a:hover,.cart-text:hover,.account-btn:hover,.wish-btn i:hover,.cart_no i:hover,.user-btn i:hover, .star-rating span .rating:before, #site-navigation .menu ul li a:hover, .main-navigation .menu > li > a:hover{';
            $the_perfume_shop_theme_css .='color: '.esc_attr($the_perfume_shop_global_second_color).';';
        $the_perfume_shop_theme_css .='}';
    }

    if($the_perfume_shop_global_second_color != false){
        $the_perfume_shop_theme_css .='#top-slider button.owl-dot.active{';
            $the_perfume_shop_theme_css .='border-color: '.esc_attr($the_perfume_shop_global_second_color).';';
        $the_perfume_shop_theme_css .='}';
    }

    if($the_perfume_shop_global_second_color != false){
        $the_perfume_shop_theme_css .='.header-search-wrapper .search-form-main{';
            $the_perfume_shop_theme_css .='border-top-color: '.esc_attr($the_perfume_shop_global_second_color).';';
        $the_perfume_shop_theme_css .='}';
    }

    if($the_perfume_shop_global_second_color != false){
        $the_perfume_shop_theme_css .='.header-search-wrapper .search-form-main:before{';
            $the_perfume_shop_theme_css .='border-bottom-color: '.esc_attr($the_perfume_shop_global_second_color).';';
        $the_perfume_shop_theme_css .='}';
    }

    /*------------------ Footer CSS -------------------*/
    $the_perfume_shop_footer_bg_color = get_theme_mod( 'the_perfume_shop_footer_bg_color');
    if($the_perfume_shop_footer_bg_color != '' ){
        $the_perfume_shop_theme_css .='#colophon {';
            $the_perfume_shop_theme_css .='background-color: '.esc_attr($the_perfume_shop_footer_bg_color).'; ';
        $the_perfume_shop_theme_css .='}';
    }

    $the_perfume_shop_footer_content_color = get_theme_mod( 'the_perfume_shop_footer_content_color');
    if($the_perfume_shop_footer_content_color != ''){
        $the_perfume_shop_theme_css .='#colophon, #colophon a, #colophon h5, #colophon .widget #wp-calendar caption {';
            $the_perfume_shop_theme_css .='color: '.esc_attr($the_perfume_shop_footer_content_color).';';
        $the_perfume_shop_theme_css .='}';
    }

    /*------------------ Copyright CSS -------------------*/
    $the_perfume_shop_copyright_text_color = get_theme_mod( 'the_perfume_shop_copyright_text_color');
    if($the_perfume_shop_copyright_text_color != ''){
        $the_perfume_shop_theme_css .='#colophon .site-info a, #colophon .site-info span {';
            $the_perfume_shop_theme_css .='color: '.esc_attr($the_perfume_shop_copyright_text_color).';';
        $the_perfume_shop_theme_css .='}';
    }


    /*-------------------- Heading typography -------------------*/

    $the_perfume_shop_heading_color = get_theme_mod('the_perfume_shop_heading_color');
    $the_perfume_shop_heading_font_family = get_theme_mod('the_perfume_shop_heading_font_family');
    $the_perfume_shop_heading_font_size = get_theme_mod('the_perfume_shop_heading_font_size');
    if($the_perfume_shop_heading_color != false || $the_perfume_shop_heading_font_family != false || $the_perfume_shop_heading_font_size != false){
        $the_perfume_shop_theme_css .='h1, h2, h3, h4, h5, h6, #latest_post h2, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, .slider-inner-box h1 a, h2.woocommerce-loop-product__title, .article-box h3.entry-title, #colophon h5, .sidebar h5, .latest-project h3, .latest-project h6{';
            $the_perfume_shop_theme_css .='color: '.esc_attr($the_perfume_shop_heading_color).'!important; 
            font-family: '.esc_attr($the_perfume_shop_heading_font_family).'!important;
            font-size: '.esc_attr($the_perfume_shop_heading_font_size).'px !important;';
        $the_perfume_shop_theme_css .='}';
    }

    $the_perfume_shop_paragraph_color = get_theme_mod('the_perfume_shop_paragraph_color');
    $the_perfume_shop_paragraph_font_family = get_theme_mod('the_perfume_shop_paragraph_font_family');
    $the_perfume_shop_paragraph_font_size = get_theme_mod('the_perfume_shop_paragraph_font_size');
    if($the_perfume_shop_paragraph_color != false || $the_perfume_shop_paragraph_font_family != false || $the_perfume_shop_paragraph_font_size != false){
        $the_perfume_shop_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $the_perfume_shop_theme_css .='color: '.esc_attr($the_perfume_shop_paragraph_color).'!important; 
            font-family: '.esc_attr($the_perfume_shop_paragraph_font_family).'!important;
            font-size: '.esc_attr($the_perfume_shop_paragraph_font_size).'px !important;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $the_perfume_shop_product_sale = get_theme_mod( 'the_perfume_shop_woocommerce_product_sale','Right');
    if($the_perfume_shop_product_sale == 'Right'){
        $the_perfume_shop_theme_css .='.woocommerce ul.products li.product .onsale{';
            $the_perfume_shop_theme_css .='left: auto; right: 15px;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_product_sale == 'Left'){
        $the_perfume_shop_theme_css .='.woocommerce ul.products li.product .onsale{';
            $the_perfume_shop_theme_css .='left: 15px; right: auto;';
        $the_perfume_shop_theme_css .='}';
    }else if($the_perfume_shop_product_sale == 'Center'){
        $the_perfume_shop_theme_css .='.woocommerce ul.products li.product .onsale{';
            $the_perfume_shop_theme_css .='right: 50%;left: 50%;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Border Radius -------------------*/

    $the_perfume_shop_woo_product_sale_border_radius = get_theme_mod('the_perfume_shop_woo_product_sale_border_radius');
    if($the_perfume_shop_woo_product_sale_border_radius != false){
        $the_perfume_shop_theme_css .='.woocommerce ul.products li.product .onsale{';
            $the_perfume_shop_theme_css .='border-radius: '.esc_attr($the_perfume_shop_woo_product_sale_border_radius).'px;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------- Woocommerce Product Border Radius -------------------*/

    $the_perfume_shop_woo_product_border_radius = get_theme_mod('the_perfume_shop_woo_product_border_radius', 0);
    if($the_perfume_shop_woo_product_border_radius != false){
        $the_perfume_shop_theme_css .='.woocommerce ul.products li.product a img{';
            $the_perfume_shop_theme_css .='border-radius: '.esc_attr($the_perfume_shop_woo_product_border_radius).'px;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------------- Product Image Box Shadow -------------------*/

    $the_perfume_shop_woo_product_image_box_shadow = get_theme_mod('the_perfume_shop_woo_product_image_box_shadow',0);
    if($the_perfume_shop_woo_product_image_box_shadow != false){
        $the_perfume_shop_theme_css .='.woocommerce ul.products li.product a img{';
            $the_perfume_shop_theme_css .='box-shadow: '.esc_attr($the_perfume_shop_woo_product_image_box_shadow).'px '.esc_attr($the_perfume_shop_woo_product_image_box_shadow).'px '.esc_attr($the_perfume_shop_woo_product_image_box_shadow).'px #cccccc;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------------- Featured Image Border Radius -------------------*/

    $the_perfume_shop_post_page_image_border_radius = get_theme_mod('the_perfume_shop_post_page_image_border_radius', 0);
    if($the_perfume_shop_post_page_image_border_radius != false){
        $the_perfume_shop_theme_css .='.article-box img{';
            $the_perfume_shop_theme_css .='border-radius: '.esc_attr($the_perfume_shop_post_page_image_border_radius).'px;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------------- Post Page Image Box Shadow -------------------*/

    $the_perfume_shop_post_page_image_box_shadow = get_theme_mod('the_perfume_shop_post_page_image_box_shadow',0);
    if($the_perfume_shop_post_page_image_box_shadow != false){
        $the_perfume_shop_theme_css .='.article-box img{';
            $the_perfume_shop_theme_css .='box-shadow: '.esc_attr($the_perfume_shop_post_page_image_box_shadow).'px '.esc_attr($the_perfume_shop_post_page_image_box_shadow).'px '.esc_attr($the_perfume_shop_post_page_image_box_shadow).'px #cccccc;';
        $the_perfume_shop_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $the_perfume_shop_single_post_page_image_box_shadow = get_theme_mod('the_perfume_shop_single_post_page_image_box_shadow',0);
    if($the_perfume_shop_single_post_page_image_box_shadow != false){
        $the_perfume_shop_theme_css .='.single-post .entry-header img{';
            $the_perfume_shop_theme_css .='box-shadow: '.esc_attr($the_perfume_shop_single_post_page_image_box_shadow).'px '.esc_attr($the_perfume_shop_single_post_page_image_box_shadow).'px '.esc_attr($the_perfume_shop_single_post_page_image_box_shadow).'px #cccccc;';
        $the_perfume_shop_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $the_perfume_shop_single_post_page_image_border_radius = get_theme_mod('the_perfume_shop_single_post_page_image_border_radius', 0);
    if($the_perfume_shop_single_post_page_image_border_radius != false){
        $the_perfume_shop_theme_css .='.single-post .entry-header img{';
            $the_perfume_shop_theme_css .='border-radius: '.esc_attr($the_perfume_shop_single_post_page_image_border_radius).'px;';
        $the_perfume_shop_theme_css .='}';
    }