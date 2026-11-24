<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.WordPress.org/Creating_an_Error_404_Page
 *
 * @package The Perfume Shop
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="container site-main">
        <section class="error-404 not-found text-center">
            <div class="theme-area-headlines">
                <h2 class="theme-area-title mb-5">
                    <?php echo esc_html( get_theme_mod( 'the_perfume_shop_404_page_main_heading', __( '¡Ups! Página no encontrada', 'the-perfume-shop' ) ) ); ?>
                </h2>
            </div>
        </section>
        <section class="page-content text-center mb-5 pb-5">
            <div class="other-page-content">
                <div class="not-found-pagetext">
                    <h2><?php echo esc_html( get_theme_mod( 'the_perfume_shop_404_page_content_1', __( 'No podemos encontrar la página que buscas.', 'the-perfume-shop' ) ) ); ?></h2>
                    <p>
                        <?php echo esc_html( get_theme_mod( 'the_perfume_shop_404_page_text_1', __( 'Parece que no se encontró nada en esta dirección.', 'the-perfume-shop' ) ) ); ?>
                        <a href="<?php echo esc_url( home_url() ); ?>">
                            <?php esc_html_e( 'Volver al inicio', 'the-perfume-shop' ); ?>
                        </a>
                    </p>
                </div>
            </div>
            <div class="not-found-pagetext-main">
                <div class="not-found-pagetext">
                    <h2><?php echo esc_html( get_theme_mod( 'the_perfume_shop_404_page_content_2', __( '¿Necesitas ayuda?', 'the-perfume-shop' ) ) ); ?></h2>
                    <p><?php echo esc_html( get_theme_mod( 'the_perfume_shop_404_page_text_2', __( 'Intenta buscar lo que necesitas a continuación.', 'the-perfume-shop' ) ) ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>