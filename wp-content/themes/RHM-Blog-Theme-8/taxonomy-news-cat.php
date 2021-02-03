<?php
get_header();
?>

<main class="main">
  <div class="posts-section">
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="red-hat-media-blog">
                    <div class="col-md-12">
                      <div class="link-wrapper mb-2 mb-md-0 ">
                          <h1><a class="link dash"><?php the_archive_title(); ?></a></h1>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="text-wrappers">                
                          <p class="text"><?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?></p>                
                      </div>
                    </div>
                </div>

                <div class="col-md-9">
                  <div class="row">                  

                    <?php if (have_posts() ) :
                    
                        while ( have_posts() ) : the_post();

                          get_template_part( 'template-parts/content', 'news-card2' );

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
                    <?php get_template_part( 'template-parts/content', 'news-sidebar');?>
                </div>


                </div>
            </div>
    </section>
  </div>
</main>

					
	
<?php
get_footer(); ?>
