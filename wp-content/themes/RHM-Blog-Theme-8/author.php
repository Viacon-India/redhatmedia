<?php
get_header();
$author_id = get_the_author_meta('ID');
$author_fname = get_the_author_meta('first_name', $author_id);
$author_lname = get_the_author_meta('last_name', $author_id);


?>

<main class="main">
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="red-hat-media-blog">
                    <div class="col-md-3">
                      <div class="link-wrapper mb-2 mb-md-0 ">
                          <h1><a class="link dash">
                            <?php if (!empty($author_fname)) {
                                echo ' Author: '.$author_fname . ' ' . $author_lname;
                            } else {
                                echo ' Author: '.get_the_author();
                            } ?>
                          </a></h1>
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="text-wrappers">                
                          <p class="text"><?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?></p>                
                      </div>
                    </div>
                </div>

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
