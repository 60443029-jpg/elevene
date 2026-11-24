<?php
/**
 * The Perfume Shop Theme Customizer
 *
 * @link: https://developer.WordPress.org/themes/customize-api/customizer-objects/
 *
 * @package The Perfume Shop
 */

if ( ! defined( 'THE_PERFUME_SHOP_URL' ) ) {
    define( 'THE_PERFUME_SHOP_URL', esc_url( 'https://www.themagnifico.net/products/perfume-shop-WordPress-theme', 'the-perfume-shop') );
}
if ( ! defined( 'THE_PERFUME_SHOP_TEXT' ) ) {
    define( 'THE_PERFUME_SHOP_TEXT', __( 'The Perfume Shop Pro','the-perfume-shop' ));
}
if ( ! defined( 'THE_PERFUME_SHOP_BUY_TEXT' ) ) {
    define( 'THE_PERFUME_SHOP_BUY_TEXT', __( 'Buy The Perfume Shop Pro','the-perfume-shop' ));
}

use WPTRT\Customize\Section\The_Perfume_Shop_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( The_Perfume_Shop_Button::class );

    $manager->add_section(
        new The_Perfume_Shop_Button( $manager, 'the_perfume_shop_pro', [
            'title'       => esc_html( THE_PERFUME_SHOP_TEXT,'the-perfume-shop' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'the-perfume-shop' ),
            'button_url'  => esc_url( THE_PERFUME_SHOP_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'the-perfume-shop-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'the-perfume-shop-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_perfume_shop_customize_register($wp_customize){

    // Pro Version
    class The_Perfume_Shop_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( THE_PERFUME_SHOP_BUY_TEXT,'the-perfume-shop' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function The_Perfume_Shop_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('the_perfume_shop_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'the-perfume-shop' ),
        'section'        => 'title_tagline',
        'settings'       => 'the_perfume_shop_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('the_perfume_shop_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'the-perfume-shop' ),
        'section'        => 'title_tagline',
        'settings'       => 'the_perfume_shop_theme_description',
        'type'           => 'checkbox',
    )));

    //Logo
    $wp_customize->add_setting('the_perfume_shop_logo_max_height',array(
        'default'   => '80',
        'sanitize_callback' => 'the_perfume_shop_sanitize_number_absint'
    ));
    $wp_customize->add_control('the_perfume_shop_logo_max_height',array(
        'label' => esc_html__('Logo Width','the-perfume-shop'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    // Global Color Settings
     $wp_customize->add_section('the_perfume_shop_global_color_settings',array(
        'title' => esc_html__('Global Color Settings','the-perfume-shop'),
        'priority'   => 28,
    ));

    $wp_customize->add_setting( 'the_perfume_shop_first_color', array(
        'default' => '#163446',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_first_color', array(
        'label' => __('Select Your First Color', 'the-perfume-shop'),
        'description' => __('Change the global color of the theme in one click.', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_global_color_settings',
        'settings' => 'the_perfume_shop_first_color',
    )));

    $wp_customize->add_setting( 'the_perfume_shop_second_color', array(
        'default' => '#B5995A',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_second_color', array(
        'label' => __('Select Your Second Color', 'the-perfume-shop'),
        'description' => __('Change the global color of the theme in one click.', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_global_color_settings',
        'settings' => 'the_perfume_shop_second_color',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_color_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_color_setting', array(
        'section'     => 'the_perfume_shop_global_color_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    //Typography option
    $the_perfume_shop_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'the_perfume_shop_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_heading_color', array(
        'label' => __('Heading Color', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_global_color_settings',
        'settings' => 'the_perfume_shop_heading_color',
    )));

    $wp_customize->add_setting('the_perfume_shop_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices',
    ));
    $wp_customize->add_control( 'the_perfume_shop_heading_font_family', array(
        'section' => 'the_perfume_shop_global_color_settings',
        'label'   => __('Heading Fonts', 'the-perfume-shop'),
        'type'    => 'select',
        'choices' => $the_perfume_shop_font_array,
    ));

    $wp_customize->add_setting('the_perfume_shop_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','the-perfume-shop'),
        'section' => 'the_perfume_shop_global_color_settings',
        'setting' => 'the_perfume_shop_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'the_perfume_shop_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_paragraph_color', array(
        'label' => __('Paragraph Color', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_global_color_settings',
        'settings' => 'the_perfume_shop_paragraph_color',
    )));

    $wp_customize->add_setting('the_perfume_shop_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices',
    ));
    $wp_customize->add_control( 'the_perfume_shop_paragraph_font_family', array(
        'section' => 'the_perfume_shop_global_color_settings',
        'label'   => __('Paragraph Fonts', 'the-perfume-shop'),
        'type'    => 'select',
        'choices' => $the_perfume_shop_font_array,
    ));

    $wp_customize->add_setting('the_perfume_shop_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','the-perfume-shop'),
        'section' => 'the_perfume_shop_global_color_settings',
        'setting' => 'the_perfume_shop_paragraph_font_size',
        'type'  => 'text'
    ));

    // Post Layouts Settings
     $wp_customize->add_section('the_perfume_shop_post_layouts_settings',array(
        'title' => esc_html__('Post Layouts Settings','the-perfume-shop'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('the_perfume_shop_post_layout',array(
        'default' => 'pattern_two_column_right',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control(new The_Perfume_Shop_Image_Radio_Control($wp_customize, 'the_perfume_shop_post_layout', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','the-perfume-shop'),
        'section' => 'the_perfume_shop_post_layouts_settings',
        'choices' => array(
            'pattern_one_column' => esc_url(get_template_directory_uri()).'/assets/images/1column.png',
            'pattern_two_column_right' => esc_url(get_template_directory_uri()).'/assets/images/right-sidebar.png',
            'pattern_two_column_left' => esc_url(get_template_directory_uri()).'/assets/images/left-sidebar.png',
            'pattern_three_column' => esc_url(get_template_directory_uri()).'/assets/images/3column.png',
            'pattern_four_column' => esc_url(get_template_directory_uri()).'/assets/images/4column.png',
            'pattern_grid_post' => esc_url(get_template_directory_uri()).'/assets/images/grid.png',
    ))
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_layout_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_post_layout_setting', array(
        'section'     => 'the_perfume_shop_post_layouts_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    ))); 

    // General Settings
     $wp_customize->add_section('the_perfume_shop_general_settings',array(
        'title' => esc_html__('General Settings','the-perfume-shop'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('the_perfume_shop_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_width_option',array(
        'type' => 'select',
        'section' => 'the_perfume_shop_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','the-perfume-shop'),
            'Wide Width' => __('Wide Width','the-perfume-shop'),
            'Boxed Width' => __('Boxed Width','the-perfume-shop')
        ),
    ) );

    $wp_customize->add_setting('the_perfume_shop_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_general_settings',
        'settings'       => 'the_perfume_shop_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('the_perfume_shop_preloader_type',array(
        'default' => 'Preloader 1',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_preloader_type',array(
        'type' => 'radio',
        'label' => esc_html__('Preloader Type','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'choices' => array(
            'Preloader 1' => __('Preloader 1','the-perfume-shop'),
            'Preloader 2' => __('Preloader 2','the-perfume-shop'),
        ),
    ) );

    $wp_customize->add_setting( 'the_perfume_shop_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'settings' => 'the_perfume_shop_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'the_perfume_shop_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'settings' => 'the_perfume_shop_preloader_dot_1_color',
        'active_callback' => 'the_perfume_shop_preloader1'
    )));

    $wp_customize->add_setting( 'the_perfume_shop_preloader_dot_2_color', array(
        'default' => '#222121',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'settings' => 'the_perfume_shop_preloader_dot_2_color',
        'active_callback' => 'the_perfume_shop_preloader1'
    )));

    $wp_customize->add_setting( 'the_perfume_shop_preloader2_dot_color', array(
        'default' => '#163446',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_preloader2_dot_color', array(
        'label' => esc_html__('Preloader Dot Color','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'settings' => 'the_perfume_shop_preloader2_dot_color',
        'active_callback' => 'the_perfume_shop_preloader2'
    )));

    $wp_customize->add_setting('the_perfume_shop_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_general_settings',
        'settings'       => 'the_perfume_shop_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('the_perfume_shop_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'the_perfume_shop_general_settings',
        'choices' => array(
            'Right' => __('Right','the-perfume-shop'),
            'Left' => __('Left','the-perfume-shop'),
            'Center' => __('Center','the-perfume-shop')
        ),
    ) );

    $wp_customize->add_setting( 'the_perfume_shop_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'settings' => 'the_perfume_shop_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'the_perfume_shop_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'settings' => 'the_perfume_shop_scroll_color'
    )));

    $wp_customize->add_setting('the_perfume_shop_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','the-perfume-shop'),
        'description' => __('Put in px','the-perfume-shop'),
        'section'   => 'the_perfume_shop_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('the_perfume_shop_scroll_border_radius',array(
        'default'   => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_scroll_border_radius',array(
        'label' => __('Scroll Top Border Radius','the-perfume-shop'),
        'description' => __('Put in %','the-perfume-shop'),
        'section'   => 'the_perfume_shop_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('the_perfume_shop_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_general_settings',
        'settings'       => 'the_perfume_shop_sticky_header',
        'type'           => 'checkbox',
    )));

    // Product Columns
    $wp_customize->add_setting( 'the_perfume_shop_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'the_perfume_shop_sanitize_select',
    ) );

    $wp_customize->add_control('the_perfume_shop_products_per_row', array(
       'label' => __( 'Product per row', 'the-perfume-shop' ),
       'section'  => 'the_perfume_shop_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    $wp_customize->add_setting('the_perfume_shop_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_product_per_page',array(
        'label' => __('Product per page','the-perfume-shop'),
        'section'   => 'the_perfume_shop_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number_per_row',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number_per_row',array(
        'label'       => esc_html__('Related Products Column Count', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 4,
        ),
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number',array(
        'label'       => esc_html__('Number of Related Products Per Page', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 10,
        ),
    ));

    $wp_customize->add_setting('the_perfume_shop_related_product_display_setting', array(
        'default' => true,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_related_product_display_setting',array(
        'label'          => __( 'Show Related Products', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_general_settings',
        'settings'       => 'the_perfume_shop_related_product_display_setting',
        'type'           => 'checkbox',
    )));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('the_perfume_shop_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_general_settings',
        'settings'       => 'the_perfume_shop_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('the_perfume_shop_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','the-perfume-shop'),
            'Right Sidebar' => __('Right Sidebar','the-perfume-shop'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('the_perfume_shop_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_general_settings',
        'settings'       => 'the_perfume_shop_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('the_perfume_shop_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','the-perfume-shop'),
        'section' => 'the_perfume_shop_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','the-perfume-shop'),
            'Right Sidebar' => __('Right Sidebar','the-perfume-shop'),
        ),
    ) );

    $wp_customize->add_setting('the_perfume_shop_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_woocommerce_product_sale',array(
        'label'       => esc_html__( 'Woocommerce Product Sale Positions','the-perfume-shop' ),
        'type' => 'radio',
        'section' => 'the_perfume_shop_general_settings',
        'choices' => array(
            'Right' => __('Right','the-perfume-shop'),
            'Left' => __('Left','the-perfume-shop'),
            'Center' => __('Center','the-perfume-shop')
        ),
    ) );

    $wp_customize->add_setting( 'the_perfume_shop_woo_product_sale_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'the_perfume_shop_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'the_perfume_shop_woo_product_sale_border_radius', array(
        'label'       => esc_html__( 'Woocommerce Product Sale Border Radius','the-perfume-shop' ),
        'section'     => 'the_perfume_shop_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'the_perfume_shop_woo_product_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'the_perfume_shop_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'the_perfume_shop_woo_product_border_radius', array(
        'label'       => esc_html__( 'Product Border Radius','the-perfume-shop' ),
        'section'     => 'the_perfume_shop_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 150,
        ),
    ) );

    $wp_customize->add_setting( 'the_perfume_shop_woo_product_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'the_perfume_shop_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'the_perfume_shop_woo_product_image_box_shadow', array(
        'label'       => esc_html__( 'Product Image Box Shadow','the-perfume-shop' ),
        'section'     => 'the_perfume_shop_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'the_perfume_shop_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    //404 Page Settings
    $wp_customize->add_section('the_perfume_shop_404_page_settings',array(
        'title' => esc_html__(' 404 Page Settings','the-perfume-shop')
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_main_heading',array(
        'default'           => __( '¡Ups! Página no encontrada', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_main_heading',array(
        'label' => esc_html__('404 Main Heading','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_main_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_content_1',array(
        'default'           => __( 'No podemos encontrar la página que buscas.', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_content_1',array(
        'label' => esc_html__('404 Main Content 1','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_content_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_text_1',array(
        'default'           => __( 'Parece que no se encontró nada en esta dirección.', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_text_1',array(
        'label' => esc_html__('404 Text 1','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_text_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_content_2',array(
        'default'           => __( '¿Necesitas ayuda?', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_content_2',array(
        'label' => esc_html__('404 Main Content 2','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_content_2',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_text_2',array(
        'default'           => __( 'Intenta buscar lo que necesitas a continuación.', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_text_2',array(
        'label' => esc_html__('404 Text 2','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_text_2',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_404_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_404_setting', array(
        'section'     => 'the_perfume_shop_404_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    //404 Page Settings
    $wp_customize->add_section('the_perfume_shop_404_page_settings',array(
        'title' => esc_html__(' 404 Page Settings','the-perfume-shop')
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_main_heading',array(
        'default'           => __( '¡Ups! Página no encontrada', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_main_heading',array(
        'label' => esc_html__('404 Main Heading','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_main_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_content_1',array(
        'default'           => __( 'No podemos encontrar la página que buscas.', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_content_1',array(
        'label' => esc_html__('404 Main Content 1','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_content_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_text_1',array(
        'default'           => __( 'Parece que no se encontró nada en esta dirección.', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_text_1',array(
        'label' => esc_html__('404 Text 1','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_text_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_content_2',array(
        'default'           => __( '¿Necesitas ayuda?', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_content_2',array(
        'label' => esc_html__('404 Main Content 2','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_content_2',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_404_page_text_2',array(
        'default'           => __( 'Intenta buscar lo que necesitas a continuación.', 'the-perfume-shop' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_404_page_text_2',array(
        'label' => esc_html__('404 Text 2','the-perfume-shop'),
        'section' => 'the_perfume_shop_404_page_settings',
        'setting' => 'the_perfume_shop_404_page_text_2',
        'type'  => 'text'
    ));

    //Header
    $wp_customize->add_section('the_perfume_shop_top_header',array(
        'title' => esc_html__('Top Header Settings','the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_header_search_setting', array(
        'default' => false,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_header_search_setting',array(
        'label'          => __( 'Show Search', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_top_header',
        'settings'       => 'the_perfume_shop_header_search_setting',
        'type'           => 'checkbox',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_top_header_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_top_header_setting', array(
        'section'     => 'the_perfume_shop_top_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    //Menu Settings
    $wp_customize->add_section('the_perfume_shop_menu_settings',array(
        'title' => esc_html__('Menus Settings','the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','the-perfume-shop'),
        'section' => 'the_perfume_shop_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('the_perfume_shop_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','the-perfume-shop'),
        'choices' => array(
            'Uppercase' => __('Uppercase','the-perfume-shop'),
            'Capitalize' => __('Capitalize','the-perfume-shop'),
            'Lowercase' => __('Lowercase','the-perfume-shop'),
        ),
        'section'=> 'the_perfume_shop_menu_settings',
    ));

    $wp_customize->add_setting('the_perfume_shop_nav_menu_font_weight',array(
        'default'=> '500',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','the-perfume-shop'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'the_perfume_shop_menu_settings',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_menu_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_menu_setting', array(
        'section'     => 'the_perfume_shop_menu_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('the_perfume_shop_top_slider',array(
        'title' => esc_html__('Slider Settings','the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_slider_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_slider_section_setting',array(
        'label'          => __( 'Enable Disable Slider', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_top_slider',
        'settings'       => 'the_perfume_shop_slider_section_setting',
        'type'           => 'checkbox',
    )));

    for ( $the_perfume_shop_count = 1; $the_perfume_shop_count <= 3; $the_perfume_shop_count++ ) {

        $wp_customize->add_setting( 'the_perfume_shop_top_slider_page' . $the_perfume_shop_count, array(
            'default'           => '',
            'sanitize_callback' => 'the_perfume_shop_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'the_perfume_shop_top_slider_page' . $the_perfume_shop_count, array(
            'label'    => __( 'Select Slide Page', 'the-perfume-shop' ),
            'section'  => 'the_perfume_shop_top_slider',
            'type'     => 'dropdown-pages'
        ) );

        $wp_customize->add_setting('the_perfume_shop_aditional_content' . $the_perfume_shop_count,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('the_perfume_shop_aditional_content' . $the_perfume_shop_count,array(
            'label' => esc_html__('Add Aditional Content','the-perfume-shop'),
            'section' => 'the_perfume_shop_top_slider',
            'setting' => 'the_perfume_shop_aditional_content' . $the_perfume_shop_count,
            'type'  => 'text'
        ));
    }

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'the_perfume_shop_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_product_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_product_setting', array(
        'section'     => 'the_perfume_shop_product_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    // Product
    $wp_customize->add_section('the_perfume_shop_product_section',array(
        'title' => esc_html__('Product Option','the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_product_section_setting', array(
        'default' => 0,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'the_perfume_shop_product_section_setting',array(
        'label'          => __( 'Enable Disable Product', 'the-perfume-shop' ),
        'section'        => 'the_perfume_shop_product_section',
        'settings'       => 'the_perfume_shop_product_section_setting',
        'type'           => 'checkbox',
    )));
    
    $wp_customize->add_setting('the_perfume_shop_product_section_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_perfume_shop_product_section_heading',array(
        'label' => esc_html__('Product Heading','the-perfume-shop'),
        'section' => 'the_perfume_shop_product_section',
        'setting' => 'the_perfume_shop_product_section_heading',
        'type'  => 'text'
    ));

    if(class_exists('woocommerce')){

        $wp_customize->add_setting('the_perfume_shop_home_product_per_page',array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('the_perfume_shop_home_product_per_page',array(
            'label' => esc_html__('No Of Products','the-perfume-shop'),
            'section' => 'the_perfume_shop_product_section',
            'setting' => 'the_perfume_shop_home_product_per_page',
            'type'  => 'number'
        ));
        
        $the_perfume_shop_args = array(
           'type'                     => 'product',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'term_group',
            'order'                    => 'ASC',
            'hide_empty'               => false,
            'hierarchical'             => 1,
            'number'                   => '',
            'taxonomy'                 => 'product_cat',
            'pad_counts'               => false
        );
        $categories = get_categories( $the_perfume_shop_args );
        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        $wp_customize->add_setting('the_perfume_shop_home_product',array(
            'sanitize_callback' => 'the_perfume_shop_sanitize_select',
        ));
        $wp_customize->add_control('the_perfume_shop_home_product',array(
            'type'    => 'select',
            'choices' => $cats,
            'label' => __('Select Product Category','the-perfume-shop'),
            'section' => 'the_perfume_shop_product_section',
        ));
    }

    // Pro Version
    $wp_customize->add_setting( 'pro_version_product_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'pro_version_product_setting',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('the_perfume_shop_post_settings',array(
        'title' => esc_html__('Post Settings','the-perfume-shop'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('the_perfume_shop_post_page_title',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_post_page_meta',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_post_page_thumb',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting( 'the_perfume_shop_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'the_perfume_shop_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'the_perfume_shop_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Post Page Image Border Radius','the-perfume-shop' ),
        'section'     => 'the_perfume_shop_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'the_perfume_shop_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'the_perfume_shop_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'the_perfume_shop_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Post Page Image Box Shadow','the-perfume-shop' ),
        'section'     => 'the_perfume_shop_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('the_perfume_shop_post_page_content',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_post_page_excerpt_length',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('the_perfume_shop_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('the_perfume_shop_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('the_perfume_shop_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_post_page_pagination',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting( 'the_perfume_shop_blog_pagination_type', array(
        'default'           => 'blog-nav-numbers',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'the_perfume_shop_blog_pagination_type', array(
        'section' => 'the_perfume_shop_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Type', 'the-perfume-shop' ),
        'choices' => array(
            'blog-nav-numbers'  => __( 'Numeric', 'the-perfume-shop' ),
            'next-prev' => __( 'Older/Newer Posts', 'the-perfume-shop' ),
        )
    ));



    $wp_customize->add_setting('the_perfume_shop_single_post_page_content',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_single_post_page_tag',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_single_post_page_tag',array(
        'type'  => 'checkbox',
        'label' => esc_html__('Enable Single Post Page Tag', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting( 'the_perfume_shop_single_post_sidebar_position', array(
        'default'           => 'Right Side',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'the_perfume_shop_single_post_sidebar_position', array(
        'section' => 'the_perfume_shop_post_settings',
        'type' => 'select',
        'label' => __( 'Single Post Sidebar Position', 'the-perfume-shop' ),
        'choices' => array(
            'Right Side' => __( 'Right Side', 'the-perfume-shop' ),
            'Left Side' => __( 'Left Side', 'the-perfume-shop' ),
        )
    ));

    $wp_customize->add_setting('the_perfume_shop_single_post_thumb',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting( 'the_perfume_shop_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'the_perfume_shop_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'the_perfume_shop_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','the-perfume-shop' ),
        'section'     => 'the_perfume_shop_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'the_perfume_shop_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'the_perfume_shop_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'the_perfume_shop_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','the-perfume-shop' ),
        'section'     => 'the_perfume_shop_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('the_perfume_shop_single_post_meta',array(
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_single_post_title',array(
            'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('the_perfume_shop_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'the-perfume-shop'),
        'section'     => 'the_perfume_shop_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('the_perfume_shop_single_post_comment_title',array(
        'label' => __('Add Comment Title','the-perfume-shop'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'the-perfume-shop' ),
        ),
        'section'=> 'the_perfume_shop_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('the_perfume_shop_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('the_perfume_shop_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','the-perfume-shop'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'the-perfume-shop' ),
        ),
        'section'=> 'the_perfume_shop_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'the_perfume_shop_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('the_perfume_shop_page_settings',array(
        'title' => esc_html__('Page Settings','the-perfume-shop'),
        'priority' => 40,
    ));

    $wp_customize->add_setting( 'the_perfume_shop_single_page_sidebar_layout', array(
        'default'           => 'No Sidebar',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'the_perfume_shop_single_page_sidebar_layout', array(
        'section' => 'the_perfume_shop_page_settings',
        'type' => 'select',
        'label' => __( 'Single Page Sidebar Position', 'the-perfume-shop' ),
        'choices' => array(
            'No Sidebar' => __( 'No Sidebar', 'the-perfume-shop' ),
            'Right Side' => __( 'Right Side', 'the-perfume-shop' ),
            'Left Side' => __( 'Left Side', 'the-perfume-shop' ),
        )
    ));



    // Pro Version
    $wp_customize->add_setting( 'pro_version_page_setting', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_page_setting', array(
        'section'     => 'the_perfume_shop_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));
    
    // Footer
    $wp_customize->add_section('the_perfume_shop_site_footer_section', array(
        'title' => esc_html__('Footer', 'the-perfume-shop'),
    ));

    $wp_customize->add_setting('the_perfume_shop_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','the-perfume-shop'),
        'section' => 'the_perfume_shop_site_footer_section',
        'choices' => array(
            'Left' => __('Left','the-perfume-shop'),
            'Center' => __('Center','the-perfume-shop'),
            'Right' => __('Right','the-perfume-shop')
        ),
    ) );

    $wp_customize->add_setting( 'the_perfume_shop_footer_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_footer_bg_color', array(
        'label' => __('Footer Background Color', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_site_footer_section',
        'settings' => 'the_perfume_shop_footer_bg_color',
    )));

    $wp_customize->add_setting( 'the_perfume_shop_footer_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_footer_content_color', array(
        'label' => __('Footer Content Color', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_site_footer_section',
        'settings' => 'the_perfume_shop_footer_content_color',
    )));

    $wp_customize->add_setting('the_perfume_shop_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'the_perfume_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_perfume_shop_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','the-perfume-shop'),
        'section' => 'the_perfume_shop_site_footer_section',
    ));

    $wp_customize->add_setting('the_perfume_shop_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('the_perfume_shop_footer_text_setting', array(
        'label' => __('Replace the footer text', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('the_perfume_shop_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'the_perfume_shop_sanitize_choices'
    ));
    $wp_customize->add_control('the_perfume_shop_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','the-perfume-shop'),
        'section' => 'the_perfume_shop_site_footer_section',
        'choices' => array(
            'Left' => __('Left','the-perfume-shop'),
            'Center' => __('Center','the-perfume-shop'),
            'Right' => __('Right','the-perfume-shop')
        ),
    ) );

    $wp_customize->add_setting( 'the_perfume_shop_copyright_text_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_perfume_shop_copyright_text_color', array(
        'label' => __('Copyright Text Color', 'the-perfume-shop'),
        'section' => 'the_perfume_shop_site_footer_section',
        'settings' => 'the_perfume_shop_copyright_text_color',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer', array(
        'sanitize_callback' => 'The_Perfume_Shop_sanitize_custom_control'
    ));
    $wp_customize->add_control( new The_Perfume_Shop_Customize_Pro_Version ( $wp_customize,'pro_version_footer', array(
        'section'     => 'the_perfume_shop_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'the-perfume-shop' ),
        'description' => esc_url( THE_PERFUME_SHOP_URL ),
        'priority'    => 100
    )));

}
add_action('customize_register', 'the_perfume_shop_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function the_perfume_shop_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function the_perfume_shop_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_perfume_shop_customize_preview_js(){
    wp_enqueue_script('the-perfume-shop-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'the_perfume_shop_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function the_perfume_shop_panels_js() {
    wp_enqueue_style( 'the-perfume-shop-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'the-perfume-shop-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'the_perfume_shop_panels_js' );