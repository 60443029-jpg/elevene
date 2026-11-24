<?php
/**
 * Displays top header
 *
 * @package The Perfume Shop
 */
?>
<?php
$the_perfume_shop_sticky_header = get_theme_mod('the_perfume_shop_sticky_header');
    $the_perfume_shop_data_sticky = "false";
    if ($the_perfume_shop_sticky_header) {
    $the_perfume_shop_data_sticky = "true";
  }
 ?>
<div class="top-info text-right pt-2" data-sticky="<?php echo esc_attr($the_perfume_shop_data_sticky); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 align-self-center">
				<span class="cart_no text-lg-start text-center">
                    <?php if(class_exists('woocommerce')){ ?>
                        <div class="user-account">
                            <?php if ( is_user_logged_in() ) { ?>
                                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Mi cuenta','the-perfume-shop'); ?>"><i class="fas fa-user me-2"></i></a>
                            <?php }
                            else { ?>
                                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Iniciar sesión / Registrarse','the-perfume-shop'); ?>"><i class="fas fa-sign-in-alt me-2"></i></a>
                            <?php } ?>
                        </div>
                    <?php }?>
                </span>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-7 align-self-center text-center">
				<div class="logo-box">
                    <div class="navbar-brand ">
                        <?php if ( has_custom_logo() ) : ?>
                            <div class="site-logo"><?php the_custom_logo(); ?></div>
                        <?php endif; ?>
                        <?php $the_perfume_shop_blog_info = get_bloginfo( 'name' ); ?>
                            <?php if ( ! empty( $the_perfume_shop_blog_info ) ) : ?>
                                <?php if ( is_front_page() && is_home() ) : ?>
                                    <?php if( get_theme_mod('the_perfume_shop_logo_title_text',true) != ''){ ?>
                                        <h1 class="site-title pt-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    <?php } ?>
                                <?php else : ?>
                                    <?php if( get_theme_mod('the_perfume_shop_logo_title_text',true) != ''){ ?>
                                        <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                    <?php } ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php
                                $the_perfume_shop_description = get_bloginfo( 'description', 'display' );
                                if ( $the_perfume_shop_description || is_customize_preview() ) :
                            ?>
                            <?php if( get_theme_mod('the_perfume_shop_theme_description',false) != ''){ ?>
                                <p class="site-description pb-2"><?php echo esc_html($the_perfume_shop_description); ?></p>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-3 align-self-center text-lg-end text-center">
                <?php if (get_theme_mod('the_perfume_shop_header_search_setting', false) != '') { ?>
                    <span class="head-search">
                        <span class="header-search-wrapper">
                            <span class="search-main">
                                <a href="#"><i class="fa fa-search"></i></a>
                            </span>
                            <div class="search-form-main clearfix">
                                <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="hidden" name="post_type" value="product"> <!-- Set post type to product for WooCommerce products -->
                                    <label>
                                        <input type="search" class="search-field form-control" placeholder="Buscar productos..." value="<?php echo get_search_query(); ?>" name="s">
                                    </label>
                                    <input type="submit" class="search-submit btn btn-primary mt-3" value="Buscar">
                                </form>
                            </div>
                        </span>
                    </span>
                <?php } ?>
                <span class="cart_no">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'carrito de compras','the-perfume-shop' ); ?>"><i class="fas fa-shopping-bag"></i></a>
                    <?php }?>
                </span>
			</div>
		</div>
        <hr>
	</div>
</div>