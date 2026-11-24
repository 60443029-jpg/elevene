<?php get_header(); ?>

<div id="content">
  <div class="feature-header">
      <div class="feature-post-thumbnail">
         <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            else:
              ?>
              <div class="slider-alternate">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
              </div>
              <?php
            endif;
          ?>
        <h1 class="post-title feature-header-title"><?php the_title(); ?></h1>
        <?php if ( get_theme_mod('cosmetic_store_breadcrumb_enable',true) ) : ?>
          <div class="bread_crumb text-center">
            <?php cosmetic_store_breadcrumb();  ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <div class="container">
    <div class="row">
      <?php if(get_theme_mod('cosmetic_store_single_post_sidebar_layout', 'Right Sidebar') == 'Right Sidebar'){ ?>
      <div class="col-lg-9 col-md-8 mt-5">
        <?php
          while ( have_posts() ) :

            the_post();
            get_template_part( 'template-parts/content', 'post');

            wp_link_pages(
              array(
                'before' => '<div class="cosmetic-store-pagination">',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>'
              )
            );

            comments_template();
          endwhile;
        ?>
      <!-- Related Posts -->
      <div class="related-posts">
          <h3 class="py-2"><?php esc_html_e('Related Posts:-', 'cosmetic-store'); ?></h3>
          <div class="row">
              <?php
              $cosmetic_store_categories = get_the_category();
              if ($cosmetic_store_categories) {
                  $cosmetic_store_category_ids = array();
                  foreach ($cosmetic_store_categories as $category) {
                      $cosmetic_store_category_ids[] = $category->term_id;
                  }
                  
                  $cosmetic_store_related_args = array(
                      'category__in' => $cosmetic_store_category_ids,
                      'post__not_in' => array(get_the_ID()),
                      'posts_per_page' => 3,
                      'orderby' => 'random'
                  );
                  
                  $cosmetic_store_related_query = new WP_Query($cosmetic_store_related_args);
                  
                  if ($cosmetic_store_related_query->have_posts()) {
                      while ($cosmetic_store_related_query->have_posts()) {
                          $cosmetic_store_related_query->the_post(); ?>
                          <div class="col-lg-4 col-md-6 related-post-item py-2">
                              <div class="related-post-thumbnail">
                                <?php get_template_part( 'template-parts/content', get_post_format() ); ?> 
                              </div>
                          </div>
                      <?php }
                      wp_reset_postdata();
                  } else {
                      echo '<p>' . esc_html__('No related posts found.', 'cosmetic-store') . '</p>';
                  }
              }
              ?>
          </div>
      </div>
      <!-- End Related Posts -->
      </div>
      <div class="col-lg-3 col-md-4">
        <?php get_sidebar(); ?>
      </div>
      <?php } elseif(get_theme_mod('cosmetic_store_single_post_sidebar_layout', 'Right Sidebar') == 'Left Sidebar'){ ?>
      <div class="col-lg-3 col-md-4">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-lg-9 col-md-8 mt-5">
        <?php
          while ( have_posts() ) :

            the_post();
            get_template_part( 'template-parts/content', 'post');

            wp_link_pages(
              array(
                'before' => '<div class="cosmetic-store-pagination">',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>'
              )
            );

            comments_template();
          endwhile;
        ?>
      <!-- Related Posts -->
      <div class="related-posts">
          <h3 class="py-2"><?php esc_html_e('Related Posts:-', 'cosmetic-store'); ?></h3>
          <div class="row">
              <?php
              $cosmetic_store_categories = get_the_category();
              if ($cosmetic_store_categories) {
                  $cosmetic_store_category_ids = array();
                  foreach ($cosmetic_store_categories as $category) {
                      $cosmetic_store_category_ids[] = $category->term_id;
                  }
                  
                  $cosmetic_store_related_args = array(
                      'category__in' => $cosmetic_store_category_ids,
                      'post__not_in' => array(get_the_ID()),
                      'posts_per_page' => 3,
                      'orderby' => 'random'
                  );
                  
                  $cosmetic_store_related_query = new WP_Query($cosmetic_store_related_args);
                  
                  if ($cosmetic_store_related_query->have_posts()) {
                      while ($cosmetic_store_related_query->have_posts()) {
                          $cosmetic_store_related_query->the_post(); ?>
                          <div class="col-lg-4 col-md-6 related-post-item py-2">
                              <div class="related-post-thumbnail">
                                <?php get_template_part( 'template-parts/content', get_post_format() ); ?> 
                              </div>
                          </div>
                      <?php }
                      wp_reset_postdata();
                  } else {
                      echo '<p>' . esc_html__('No related posts found.', 'cosmetic-store') . '</p>';
                  }
              }
              ?>
          </div>
      </div>
      <!-- End Related Posts -->
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>