<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.WordPress.org/themes/basics/template-hierarchy/
 *
 * @package The Perfume Shop
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Nada encontrado', 'the-perfume-shop' ); ?></h2>
	</header>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( '¿Listo para publicar tu primera entrada? <a href="%1$s">Empieza aquí</a>.', 'the-perfume-shop' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Lo sentimos, nada coincidió con tu búsqueda. Intenta de nuevo con otras palabras clave.', 'the-perfume-shop' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'Parece que no encontramos lo que buscas. Quizás una búsqueda te ayude.', 'the-perfume-shop' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</section>