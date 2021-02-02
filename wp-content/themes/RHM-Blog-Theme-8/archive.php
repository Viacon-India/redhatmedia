<?php
get_header();

if (function_exists('get_wp_term_image')) {
    $rhm_banner_img = get_wp_term_image(get_queried_object()->term_id);

    if(empty($rhm_banner_img)) {
        $rhm_banner_img = get_template_directory_uri().'/assets/images/header-banner.png';
    }
}
?>



<?php if(!empty($rhm_banner_img)) { ?>
  <!-- start banner/Header -->
  <header class="header">
  <img src="<?php echo $rhm_banner_img; ?>" alt="archive-banner">
    <div class="container">
      <div row="row">
        <div class="col-md-8">
          <div class="header-title-warper">
            <h1 class="title">
              <?php the_archive_title(); ?>
            </h1>
          </div>
          <div class="header-text-warper">            
            <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
          </div>
        </div>          
      </div>
    </div>
  </header>
<?php } ?>

<main class="main">
    <section class="blog">
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                  <div class="row">

                    <?php if (have_posts() ) : ?>   

                        <?php while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'archive-blog-card' );

                        endwhile; ?>


                        <div class="cat-pagi">                        
                          <?php the_posts_pagination( array(
                            'prev_text'          => __( '<< Previous ', 'rhm' ),
                            'next_text'          => __( ' Next >>', 'rhm' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'rhm' ) . ' </span>',
                          ) ); ?>
                        </div>

                    <?php else : ?>
                      <div class="col-md-12 not-found-sec">
                        <h2 class="page-title"><?php _e( 'Nothing Found', 'rhm' ); ?></h2>
                        <div><?php _e( 'Sorry, but nothing found.', 'rhm' ); ?></div>
                      </div>
                    <?php endif; ?>
                  
                  </div>
                </div>
                <div class="col-md-3">

                <?php get_template_part( 'template-parts/content', 'sidebar'); ?>
                </div>


                </div>
            </div>
    </section>
</main>

					
	
<?php
get_footer(); ?>
