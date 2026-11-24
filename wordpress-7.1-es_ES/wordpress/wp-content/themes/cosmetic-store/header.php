<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cosmetic-store' ); ?></a>

<?php if(get_theme_mod('cosmetic_store_site_loader',false)!= ''){ ?>
    <?php if(get_theme_mod( 'cosmetic_store_preloader_type','four-way-loader') == 'four-way-loader'){ ?>
	    <div class="cssloader">
	    	<div class="sh1"></div>
	    	<div class="sh2"></div>
	    	<h1 class="lt"><?php esc_html_e( 'loading',  'cosmetic-store' ); ?></h1>
	    </div>
    <?php }else if(get_theme_mod( 'cosmetic_store_preloader_type') == 'cube-loader') {?>
		<div class="cssloader">
    		<div class="loader-main ">
				<div class="triangle35b"></div>
				<div class="triangle35b"></div>
				<div class="triangle35b"></div>
			</div>
    	</div>
    <?php }?>
<?php }?>

<div class="main-header-box">
	<div class="top-header text-center text-md-start py-2 wow fadeInDown">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-4 align-self-center top-info-box">
					<?php if ( get_theme_mod('cosmetic_store_free_delivery_link') || get_theme_mod('cosmetic_store_free_delivery_text') ) : ?>
						<a href="<?php echo esc_url( get_theme_mod('cosmetic_store_free_delivery_link' ) ); ?>" ><?php echo esc_html( get_theme_mod('cosmetic_store_free_delivery_text' ) ); ?></a><span class="ms-2">|</span>
					<?php endif; ?>
					<?php if ( get_theme_mod('cosmetic_store_live_chat_link') || get_theme_mod('cosmetic_store_live_chat_text') ) : ?>
						<a href="<?php echo esc_url( get_theme_mod('cosmetic_store_live_chat_link' ) ); ?>" ><?php echo esc_html( get_theme_mod('cosmetic_store_live_chat_text' ) ); ?></a><span class="ms-2">|</span>
					<?php endif; ?>
					<?php if ( get_theme_mod('cosmetic_store_track_order_link') || get_theme_mod('cosmetic_store_track_order_text') ) : ?>
						<a href="<?php echo esc_url( get_theme_mod('cosmetic_store_track_order_link' ) ); ?>" ><?php echo esc_html( get_theme_mod('cosmetic_store_track_order_text' ) ); ?></a>
					<?php endif; ?>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-4 align-self-center">
		    		<div class="logo text-center">
			    		<div class="logo-image me-3">
			    			<?php the_custom_logo(); ?>
				    	</div>
				    	<div class="logo-content">
					    	<?php
					    		if ( get_theme_mod('cosmetic_store_display_header_title', true) == true ) :
						      		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
						      			echo esc_attr(get_bloginfo('name'));
						      		echo '</a>';
						      	endif;

						      	if ( get_theme_mod('cosmetic_store_display_header_text', false) == true ) :
					      			echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
					      		endif;
				    		?>
						</div>
					</div>
			   	</div>
				<div class="col-lg-5 col-md-4 col-sm-4 align-self-center">
					<?php $cosmetic_store_settings = get_theme_mod( 'cosmetic_store_social_links_settings' ); ?>
					<div class="social-links text-center text-md-start text-lg-end py-2 py-md-0">
						<?php if ( is_array($cosmetic_store_settings) || is_object($cosmetic_store_settings) ){ ?>
							<span class="me-3"><?php esc_html_e( 'Connect with us  ','cosmetic-store' ); ?></span>
					    	<?php foreach( $cosmetic_store_settings as $cosmetic_store_setting ) { ?>
						        <a href="<?php echo esc_url( $cosmetic_store_setting['link_url'] ); ?>">
						            <i class="<?php echo esc_attr( $cosmetic_store_setting['link_text'] ); ?> me-3"></i>
						        </a>
					    	<?php } ?>
						<?php } ?>
						<?php if ( get_theme_mod('cosmetic_store_myaccount_link') ) : ?>
							<a href="<?php echo esc_url( get_theme_mod('cosmetic_store_myaccount_link' ) ); ?>" class="myacunt-url"><i class="fas fa-user-circle me-2"></i><?php esc_html_e('My Account','cosmetic-store'); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="<?php if( get_theme_mod( 'cosmetic_store_sticky_header', false) != '') { ?>sticky-header<?php } else { ?>close-sticky main-menus<?php } ?>">
	<header id="site-navigation" class="header text-center text-md-start wow fadeInDown">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-2 col-sm-12 col-2 align-self-center">
					<div class="top-menu-wrapper">
					    <div class="navigation_header">
					        <div class="toggle-nav mobile-menu">
					            <button onclick="cosmetic_store_openNav()">
					                <span class="dashicons dashicons-menu"></span>
					            </button>
					        </div>
					        <div id="mySidenav" class="nav sidenav">
					            <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'cosmetic-store' ); ?>">
					                <?php {
					                    wp_nav_menu(
					                        array(
					                            'theme_location' => 'main-menu',
					                            'container_class' => 'navi clearfix navbar-nav',
					                            'menu_class'     => 'menu clearfix',
					                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					                            'fallback_cb'    => 'wp_page_menu',
					                        )
					                    );
					                } ?>
					            </nav>
					            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="cosmetic_store_closeNav()">
					                <span class="dashicons dashicons-no"></span>
					            </a>
					        </div>
					    </div>
					</div>
				</div>
				<div class="col-lg-6 col-md-10 col-sm-12 col-10 align-self-center pb-md-3 pb-lg-0">
					<div class="row">
						<div class="col-lg-7 col-md-8 col-sm-7 align-self-center pr-md-0">
					        <?php if(class_exists('woocommerce')){ ?>
					          <form method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
					            <label class="screen-reader-text" for="woocommerce-product-search-field"><?php esc_html_e('Search for:', 'cosmetic-store'); ?></label>
					            <input type="search" id="woocommerce-product-search-field" class="search-field " placeholder="<?php echo esc_html('Search Here','cosmetic-store'); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
					            <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
					            <input type="hidden" name="post_type" value="product"/>
					          </form>
					        <?php }?>
				       	</div>
				       	<div class="col-lg-5 col-md-4 col-sm-5 align-self-center pl-md-0">
					        <?php if(class_exists('woocommerce')){ ?>
					          	<button class="product-btn"><?php echo esc_html_e('All Categories','cosmetic-store'); ?><i class="fas fa-chevron-down"></i></button>
					          	<div class="product-cat">
									<?php
										$cosmetic_store_args = array(
											'orderby'    => 'title',
											'order'      => 'ASC',
											'hide_empty' => 0,
											'parent'  => 0
										);
										$product_categories = get_terms( 'product_cat', $cosmetic_store_args );
										$cosmetic_store_count = count($product_categories);
									if ( $cosmetic_store_count > 0 ){
										foreach ( $product_categories as $product_category ) {
										$product_cat_id   = $product_category->term_id;
										$cat_link = get_category_link( $product_cat_id );
										if ($product_category->category_parent == 0) { ?>
										<li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
										<?php
									}
									echo esc_html( $product_category->name ); ?></a><i class="fas fa-chevron-right ms-3"></i></li>
									<?php } } ?>
					          	</div>
					        <?php }?>
					    </div>
			       </div>
				</div>
			</div>
		</div>
	</header>
</div>
</div>
<?php if ( get_theme_mod('cosmetic_store_feature_text1') || get_theme_mod('cosmetic_store_feature_text2') || get_theme_mod('cosmetic_store_feature_text3') ) : ?>
	<div class="features py-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
					<?php if ( get_theme_mod('cosmetic_store_feature_text1')) : ?>
						<p class="mb-0"><i class="fas fa-gift me-3"></i><?php echo esc_html( get_theme_mod('cosmetic_store_feature_text1' ) ); ?></p>
					<?php endif; ?>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
					<?php if ( get_theme_mod('cosmetic_store_feature_text2')) : ?>
						<p class="mb-0"><i class="fas fa-truck me-3"></i><?php echo esc_html( get_theme_mod('cosmetic_store_feature_text2' ) ); ?></p>
					<?php endif; ?>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
					<?php if ( get_theme_mod('cosmetic_store_feature_text3')) : ?>
						<p class="mb-0"><i class="fas fa-comment-alt me-3"></i><?php echo esc_html( get_theme_mod('cosmetic_store_feature_text3' ) ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
