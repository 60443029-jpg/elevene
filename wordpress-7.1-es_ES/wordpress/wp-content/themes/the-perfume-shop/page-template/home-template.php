<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
<?php if (get_theme_mod( 'the_perfume_shop_slider_section_setting','' )) { ?>
  <section id="top-slider">
    <div class="container">
      <?php $the_perfume_shop_slide_pages = array();
        for ( $the_perfume_shop_count = 1; $the_perfume_shop_count <= 3; $the_perfume_shop_count++ ) {
          $the_perfume_shop_mod = intval( get_theme_mod( 'the_perfume_shop_top_slider_page' . $the_perfume_shop_count ));
          if ( 'page-none-selected' != $the_perfume_shop_mod ) {
            $the_perfume_shop_slide_pages[] = $the_perfume_shop_mod;
          }
        }
        if( !empty($the_perfume_shop_slide_pages) ) :
          $the_perfume_shop_args = array(
            'post_type' => 'page',
            'post__in' => $the_perfume_shop_slide_pages,
            'orderby' => 'post__in'
          );
          $the_perfume_shop_query = new WP_Query( $the_perfume_shop_args );
          if ( $the_perfume_shop_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="owl-carousel" role="listbox">
          <?php  while ( $the_perfume_shop_query->have_posts() ) : $the_perfume_shop_query->the_post(); ?>
            <div class="slide-box">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 align-self-center">
                  <div class="slider-inner-box">
                    <h3 class="mb-5"><?php the_title(); ?></h3>
                    <span class="slide-btn1 mt-4">
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('Descubrir','the-perfume-shop'); ?></a>
                    </span>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 align-self-center">
                   <?php if (has_post_thumbnail()) { ?><img class="sider-img" src="<?php the_post_thumbnail_url('full'); ?>" /><?php } else { ?><div class="slide-bg"></div> <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 align-self-center slide-content">
                  <p class="content mb-4"><?php echo esc_html( wp_trim_words( get_the_content(), esc_attr(get_theme_mod('the_perfume_shop_slider_excerpt_length', 20)) )); ?></p>
                  <?php if( get_theme_mod('the_perfume_shop_aditional_content' .$i) !="" ) {?>
                    <p class="content"><?php echo esc_html(get_theme_mod('the_perfume_shop_aditional_content' .$i)); ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
      </div>
  </section>
<?php }?>

<?php if (get_theme_mod( 'the_perfume_shop_product_section_setting','' )) { ?>
  <section id="product" class="py-5">
    <div class="container">
      <div class="heading text-center">
        <?php if ( get_theme_mod('the_perfume_shop_product_section_heading') != "" ) {?>
          <h3 class="main_heading m-3"><?php echo esc_html(get_theme_mod('the_perfume_shop_product_section_heading')); ?>
          </h3>
        <?php }?>
      </div>
    </div>
      <div class="product-box pt-5">
        <div class="container">
          <div class="owl-carousel product-home-box">
            <?php
            if ( class_exists( 'WooCommerce' ) ) {
              $the_perfume_shop_args = array(
                'post_type' => 'product',
                'posts_per_page' => get_theme_mod('the_perfume_shop_home_product_per_page', 4),
                'product_cat' => get_theme_mod('the_perfume_shop_home_product'),
                'order' => 'ASC'
              );
              $loop = new WP_Query( $the_perfume_shop_args );
              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="products-box">
                  <div class="product-image">
                    <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"> <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?></a>
                  </div>
                  <div class="product-content pt-3 text-center">
                    <div class="heading-box">
                      <div class="product-heading"><h3 class="mb-2"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3></div>
                      <div class="rating">
                        <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                      </div>
                    </div>
                    <div class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> m-0"><?php echo $product->get_price_html(); ?></div>
                    <div class="cart-btn mt-3 mb-2"><?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?></div>
                  </div>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>