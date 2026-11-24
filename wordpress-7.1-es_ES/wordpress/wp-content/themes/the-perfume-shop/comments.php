<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.WordPress.org/Template_Hierarchy
 *
 * @package The Perfume Shop
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $the_perfume_shop_comments_number = get_comments_number();
            if ( '1' === $the_perfume_shop_comments_number ) {
                /* translators: %s: post title */
                printf( esc_html__( 'Un comentario en &ldquo;%s&rdquo;', 'the-perfume-shop' ), esc_html( get_the_title() ) );
            } else {
                printf(
                    esc_html(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s comentario en &ldquo;%2$s&rdquo;',
                            '%1$s comentarios en &ldquo;%2$s&rdquo;',
                            $the_perfume_shop_comments_number,
                            'comments title',
                            'the-perfume-shop'
                        )
                    ),
                    esc_html( number_format_i18n( $the_perfume_shop_comments_number ) ),
                    esc_html( get_the_title() )
                );
            }
            ?>
        </h2>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Navegación de comentarios', 'the-perfume-shop' ); ?></h2>
                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Comentarios anteriores', 'the-perfume-shop' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Comentarios más recientes', 'the-perfume-shop' ) ); ?></div>
                </div>
            </nav>
        <?php endif; // Check for comment navigation. ?>
        <ul class="comment-list">
            <?php
                wp_list_comments( array( 'callback' => 'the_perfume_shop_comment', 'avatar_size' => 50 ));
            ?>
        </ul>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Navegación de comentarios', 'the-perfume-shop' ); ?></h2>
                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Comentarios anteriores', 'the-perfume-shop' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Comentarios más recientes', 'the-perfume-shop' ) ); ?></div>
                </div>
            </nav>
        <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Los comentarios están cerrados.', 'the-perfume-shop' ); ?></p>
    <?php
    endif; ?>

    <?php
        comment_form( array(
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h2>',
            'title_reply' => esc_html(get_theme_mod('the_perfume_shop_single_post_comment_title',__('Deja una respuesta','the-perfume-shop' )) ),
            'label_submit' => esc_html(get_theme_mod('the_perfume_shop_single_post_comment_btn_text',__('Publicar comentario','the-perfume-shop' )) ),
        ) );
    ?>
</div>