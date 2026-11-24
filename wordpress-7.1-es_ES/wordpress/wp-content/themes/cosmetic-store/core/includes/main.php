<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_cosmetic_store_dismissed_notice_handler', 'cosmetic_store_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function cosmetic_store_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function cosmetic_store_deprecated_hook_admin_notice() {
    // Check if it's been dismissed...
    if ( ! get_option( 'dismissed-get_started', false ) ) {
        $current_screen = get_current_screen();

        // Check screen ID correctly
        if ( 
            $current_screen && 
            $current_screen->id !== 'appearance_page_cosmetic-store-guide-page' &&
            $current_screen->id !== 'appearance_page_cosmeticstore-wizard'
        ) {
            $cosmetic_store_comments_theme = wp_get_theme();
            ?>
            <div class="cosmetic-store-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="cosmetic-store-notice">
                    <div class="cosmetic-store-notice-content">
                        <div class="cosmetic-store-notice-heading">
                            <h2>
                                <?php esc_html_e('Thanks For Installing ', 'cosmetic-store'); ?>
                                <?php echo esc_html( $cosmetic_store_comments_theme ); ?>
                                <?php esc_html_e('Theme', 'cosmetic-store'); ?>
                            </h2>
                            <p>
                                <?php
                                /* translators: %s: theme name */
                                printf(
                                    esc_html__("%s is now installed and ready to use. We've provided some links to get you started.", 'cosmetic-store'),
                                    $cosmetic_store_comments_theme
                                );
                                ?>
                            </p>
                        </div>
                        <div class="diplay-flex-btn">
                            <a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=cosmetic-store-guide-page' ) ); ?>">
                                <?php echo esc_html__('GET STARTED', 'cosmetic-store'); ?>
                            </a>
                            <a target="_blank" class="button button-primary" href="<?php echo esc_url( COSMETIC_STORE_BUY_NOW ); ?>">
                                <?php echo esc_html__('GO TO PREMIUM', 'cosmetic-store'); ?>
                            </a>
                            <a class="button button-primary import" href="<?php echo esc_url( admin_url( 'themes.php?page=cosmeticstore-wizard' ) ); ?>">
                                <?php echo esc_html__('ONE CLICK DEMO IMPORTER', 'cosmetic-store'); ?>
                            </a>
                        </div>
                    </div>
                    <div class="cosmetic-store-notice-img">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/notification.png' ); ?>" alt="<?php esc_attr_e('logo', 'cosmetic-store'); ?>">
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'cosmetic_store_deprecated_hook_admin_notice' );


add_action( 'admin_menu', 'cosmetic_store_getting_started' );
function cosmetic_store_getting_started() {
	add_theme_page( esc_html__('Get Started', 'cosmetic-store'), esc_html__('Get Started', 'cosmetic-store'), 'edit_theme_options', 'cosmetic-store-guide-page', 'cosmetic_store_test_guide');
}

function cosmetic_store_admin_enqueue_scripts() {
	wp_enqueue_style( 'cosmetic-store-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'cosmetic-store-admin-script', get_template_directory_uri() . '/js/cosmetic-store-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'cosmetic-store-admin-script', 'cosmetic_store_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'cosmetic_store_admin_enqueue_scripts' );

if ( ! defined( 'COSMETIC_STORE_DOCS_FREE' ) ) {
define('COSMETIC_STORE_DOCS_FREE',__('https://demo.misbahwp.com/docs/cosmetic-store-free-docs/','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_DOCS_PRO' ) ) {
define('COSMETIC_STORE_DOCS_PRO',__('https://demo.misbahwp.com/docs/cosmetic-store-pro-docs','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_BUY_NOW' ) ) {
define('COSMETIC_STORE_BUY_NOW',__('https://www.misbahwp.com/products/cosmetic-store-WordPress-theme','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_SUPPORT_FREE' ) ) {
define('COSMETIC_STORE_SUPPORT_FREE',__('https://WordPress.org/support/theme/cosmetic-store','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_REVIEW_FREE' ) ) {
define('COSMETIC_STORE_REVIEW_FREE',__('https://WordPress.org/support/theme/cosmetic-store/reviews/#new-post','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_DEMO_PRO' ) ) {
define('COSMETIC_STORE_DEMO_PRO',__('https://demo.misbahwp.com/cosmetic-store/','cosmetic-store'));
}
if( ! defined( 'COSMETIC_STORE_THEME_BUNDLE' ) ) {
define('COSMETIC_STORE_THEME_BUNDLE',__('https://www.misbahwp.com/products/WordPress-bundle','cosmetic-store'));
}

function cosmetic_store_test_guide() { 
	$theme = wp_get_theme();?>
	<div class="wrap" id="main-page">
		<div class="demo-import-box">
			<h4><?php echo esc_html__('Import homepage demo in just one click.','cosmetic-store'); ?></h4>
			<p><?php echo esc_html__('Get started with the WordPress theme installation','cosmetic-store'); ?></p>
			<a class="button button-primary import" href="themes.php?page=cosmeticstore-wizard"><?php echo esc_html__('ONE CLICK DEMO IMPORTER','cosmetic-store'); ?></a>
		</div>
		<div id="lefty">
            <div id="lefty-up">
                <div id="description">
                    <h3><?php esc_html_e('Welcome! Thank you for choosing ','cosmetic-store'); ?><?php echo esc_html( $theme ); ?>  <span><?php esc_html_e('Version: ', 'cosmetic-store'); ?><?php echo esc_html($theme['Version']);?></span></h3>
                    <div id="description-insidee">
                        <?php
                            $theme = wp_get_theme();
                            echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $theme->get( 'Description' ) ) ) );
                        ?>
                    </div>
                    <div id="admin_links">
                        <h3><?php esc_html_e('Unlock More Features With Premium Version','cosmetic-store'); ?></h3>
                        <div id="admin_inside_links">
                            <a href="<?php echo esc_url( COSMETIC_STORE_BUY_NOW ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Get Premium', 'cosmetic-store' ) ?></a>
                            <a href="<?php echo esc_url( COSMETIC_STORE_DEMO_PRO ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Live Demo', 'cosmetic-store' ); ?> </a>
                            <a class="blue-button-1" href="<?php echo esc_url( COSMETIC_STORE_DOCS_PRO ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Pro Documentation', 'cosmetic-store' ) ?></a>
                            <a class="blue-button-2" href="<?php echo esc_url( COSMETIC_STORE_THEME_BUNDLE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'View All Themes', 'cosmetic-store' ) ?></a>
                        </div>
                    </div>
                </div>
                <div id="theme-img">
					
                    <img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
                    <div id="img-btm-box">
                        <h3 class="bundle-box-title"><?php esc_html_e('Get This Premium Theme at Flat 20% OFF','cosmetic-store'); ?></h3>
                        <div class="bundle-info">
                            <div class="bundle-left">
                                <p class="coupon-text"><?php esc_html_e('Use Coupon Code:','cosmetic-store'); ?></p>
                                <p class="coupon-code"><?php esc_html_e('HEAT20','cosmetic-store'); ?></p>
                            </div>
                            <div class="bundle-right">
                                <a class="white-button" href="<?php echo esc_url( COSMETIC_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Buy Now $40', 'cosmetic-store' ) ?><span><?php esc_html_e( '$60', 'cosmetic-store' ) ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="lefty-down">
                <div id="admin_links">
                    <h3><?php esc_html_e('Important Links','cosmetic-store'); ?></h3>
                    <p id="description-insidee"><?php esc_html_e('Below are some Important Link, Customize your theme, Get Support, and If you are stuck somewhere get help with the documentation','cosmetic-store'); ?></p>
                    <div id="admin_inside_links">
                        <a href="<?php echo esc_url( COSMETIC_STORE_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Cosmetic Store Documentation', 'cosmetic-store' ) ?></a>
                        <a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize Theme', 'cosmetic-store' ); ?> </a>
                        <a class="blue-button-1" href="<?php echo esc_url( COSMETIC_STORE_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Get Support', 'cosmetic-store' ) ?></a>
                        <a class="blue-button-2" href="<?php echo esc_url( COSMETIC_STORE_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review Theme', 'cosmetic-store' ) ?></a>
                    </div>
                </div>
            </div>
		</div>

		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle bundle"><?php esc_html_e( 'Get All Themes', 'cosmetic-store' ); ?></h3>
				<div class="insidee theme-bundle">
					<img width="100%" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/bundle-image.png' ); ?>" alt="<?php esc_attr_e('logo', 'cosmetic-store'); ?>">
					<p class="offer"><?php esc_html_e('Get 110+ Perfect WordPress Theme In A Single Package at just $89.','cosmetic-store'); ?></p>
					<p class="coupon"><?php esc_html_e('Get Our Theme Pack of 110+ WordPress Themes At 20% Off ','cosmetic-store'); ?><span><?php esc_html_e('"HEAT20"','cosmetic-store'); ?></span></p>
				<div id="admin_pro_linkss">
					<a class="blue-button-1" href="<?php echo esc_url( COSMETIC_STORE_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Buy All Themes - $89', 'cosmetic-store' ) ?></a>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','cosmetic-store'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','cosmetic-store'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','cosmetic-store'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>
<?php } ?>
