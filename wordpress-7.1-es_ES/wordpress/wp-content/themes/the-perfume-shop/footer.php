<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.WordPress.org/themes/basics/template-files/#template-partials
 *
 * @package The Perfume Shop
 */
do_action('the_perfume_shop_before_footer_content_action');
?>

<footer id="colophon" class="site-footer border-top">
		    <div class="container">
		    	<?php
		    	$tps_page = function( $slug ) {
		    		$p = get_page_by_path( $slug );
		    		return $p ? get_permalink( $p ) : home_url( '/' );
		    	};
		    	$tps_home_url  = get_permalink( get_option( 'page_on_front' ) ) ? get_permalink( get_option( 'page_on_front' ) ) : home_url( '/' );
		    	$tps_shop_url  = get_permalink( get_option( 'woocommerce_shop_page_id' ) );
		    	$tps_about     = $tps_page( 'about' );
		    	$tps_contact   = $tps_page( 'contact' );
		    	$tps_faq       = $tps_page( 'preguntas-frecuentes' );
		    	$tps_reviews   = $tps_page( 'opiniones' );
		    	$tps_sitemap   = $tps_page( 'mapa-del-sitio' );
		    	$tps_privacy   = get_option( 'wp_page_for_privacy_policy' ) ? get_permalink( get_option( 'wp_page_for_privacy_policy' ) ) : $tps_page( 'politica-privacidad' );
		    	?>
		    	<div class="footer-column">
		    		<div class="row">
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				          	<?php if (is_active_sidebar('the-perfume-shop-footer1')) : ?>
		                        <?php dynamic_sidebar('the-perfume-shop-footer1'); ?>
		                    <?php else : ?>
		                        <aside id="search" class="widget" role="complementary" aria-label="firstsidebar">
		                            <h5 class="widget-title"><?php esc_html_e( 'Sobre Nosotros', 'the-perfume-shop' ); ?></h5>
		                            <div class="textwidget">
		                            	<p><?php esc_html_e( 'En ELEVENE curamos perfumería de alta gama y joyería fina para damas y caballeros. Fragancias y piezas exclusivas elegidas para resaltar tu elegancia, sofisticación e identidad.', 'the-perfume-shop' ); ?></p>
		                            </div>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('the-perfume-shop-footer2')) : ?>
		                        <?php dynamic_sidebar('the-perfume-shop-footer2'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Enlaces Útiles', 'the-perfume-shop' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><a href="<?php echo esc_url( $tps_home_url ); ?>"><?php esc_html_e( 'Inicio', 'the-perfume-shop' ); ?></a></li>
		                            	<li><a href="<?php echo esc_url( $tps_shop_url ); ?>"><?php esc_html_e( 'Catálogo', 'the-perfume-shop' ); ?></a></li>
		                            	<li><a href="<?php echo esc_url( $tps_reviews ); ?>"><?php esc_html_e( 'Opiniones', 'the-perfume-shop' ); ?></a></li>
		                            	<li><a href="<?php echo esc_url( $tps_about ); ?>"><?php esc_html_e( 'Sobre Nosotros', 'the-perfume-shop' ); ?></a></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('the-perfume-shop-footer3')) : ?>
		                        <?php dynamic_sidebar('the-perfume-shop-footer3'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Información', 'the-perfume-shop' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><a href="<?php echo esc_url( $tps_faq ); ?>"><?php esc_html_e( 'Preguntas Frecuentes', 'the-perfume-shop' ); ?></a></li>
		                            	<li><a href="<?php echo esc_url( $tps_sitemap ); ?>"><?php esc_html_e( 'Mapa del Sitio', 'the-perfume-shop' ); ?></a></li>
		                            	<li><a href="<?php echo esc_url( $tps_privacy ); ?>"><?php esc_html_e( 'Política de Privacidad', 'the-perfume-shop' ); ?></a></li>
		                            	<li><a href="<?php echo esc_url( $tps_contact ); ?>"><?php esc_html_e( 'Contáctanos', 'the-perfume-shop' ); ?></a></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('the-perfume-shop-footer4')) : ?>
		                        <?php dynamic_sidebar('the-perfume-shop-footer4'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Contacto', 'the-perfume-shop' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><a target="_blank" rel="noopener" href="<?php echo esc_url( 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( 'Jirón Asillo, Azángaro, Puno, Perú' ) ); ?>">Jirón Asillo<br>Azángaro, Puno, Perú</a></li>
		                            	<li><a href="tel:+51912858033">+51 912 858 033</a></li>
		                            	<li><a target="_blank" rel="noopener" href="<?php echo esc_url( 'https://wa.me/51912858033' ); ?>">WhatsApp: 912 858 033</a></li>
		                            	<li><a href="mailto:anniecalcina647@gmail.com">anniecalcina647@gmail.com</a></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
			      	</div>
				</div>
		    	<?php if (get_theme_mod('the_perfume_shop_show_hide_copyright', true)) {?>
				        <div class="site-info text-center">
				            <div class="footer-menu-left">
				            	<?php  if( ! get_theme_mod('the_perfume_shop_footer_text_setting') ){ ?>
								    <a target="_blank" href="<?php echo esc_url('https://WordPress.org/', 'the-perfume-shop' ); ?>">
										<?php
										/* translators: %s: CMS name, i.e. WordPress. */
										printf( esc_html__( 'Hecho con %s', 'the-perfume-shop' ), 'WordPress' );
										?>
								    </a>
								    <span class="sep mr-1"> | </span>

								    <span>
								    	<a target="_blank" href="<?php echo esc_url( 'https://www.themagnifico.net/products/free-perfume-WordPress-theme'); ?>">
							              	<?php
							                /* translators: 1: Theme name,  */
							                printf( esc_html__( ' %1$s ', 'the-perfume-shop' ),'Tema Perfume WordPress' );
							              	?>
						              	</a>
							          	<?php
							              /* translators: 1: Theme author. */
							              printf( esc_html__( 'por %1$s.', 'the-perfume-shop' ),'TheMagnifico'  );
							            ?>
				        			</span>
								<?php }?>
								<?php echo esc_html(get_theme_mod('the_perfume_shop_footer_text_setting')); ?>
				            </div>
				        </div>
				<?php } ?>
			    <?php if (get_theme_mod('the_perfume_shop_scroll_hide', true)) {?>
			    	<a href="#" id="button"><?php esc_html_e('ARRIBA','the-perfume-shop'); ?></a>
			    <?php } ?>
		    </div>
		</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>