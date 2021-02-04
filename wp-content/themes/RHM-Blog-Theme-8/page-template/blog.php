<?php
/*Template Name: Blog */
get_header();
$current_page_ID = get_the_ID();
$posts_per_page = 3;


$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$blog_array = array( 'post_type' => 'post',
    'post_status'=>'publish', 
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'order'     => 'DESC',
    'orderby'   => 'date',
);
$blog_query = new WP_Query($blog_array);

$myvals = get_post_meta($current_page_ID);
  foreach($myvals as $key=>$val) {    
      ${$key} = unserialize($val[0]) ? unserialize($val[0]) : $val[0];
  }
?>


  <?php if(!empty($rhm_banner_img)) { ?>
    <!-- start banner/Header -->
    <header class="header">
      <img src="<?php echo $rhm_banner_img; ?>" alt="service-banner">
      <div class="container">
        <div row="row">
          <div class="col-md-8">
            <div class="header-title-warper">
              <h1 class="title">
                <?php if(!empty($rhm_banner_heading)) { echo $rhm_banner_heading; } ?>
              </h1>
            </div>
            <div class="header-text-warper">            
                <?php if(!empty($rhm_banner_content)) { echo $rhm_banner_content; } ?>
                <?php get_search_form(); ?>
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
                <?php while ( have_posts() ) : the_post();?>
                <div class="red-hat-media-blog">
                    <div class="col-md-3">
                    <div class="link-wrapper mb-2 mb-md-0 ">
                        <h1><a class="link dash"><?php the_title(); ?></a></h1>
                    </div>
                    </div>
                    <div class="col-md-9">
                    <div class="text-wrappers">                
                        <p class="text"><?php the_content(); ?></p>                
                    </div>
                    </div>
                </div>
                <?php endwhile; ?>


                    <?php if ( $blog_query->have_posts() ) : ?>

    

                    <?php $i = 1;
                    while ( $blog_query->have_posts() ) : $blog_query->the_post();
                    
                            if($i <= $posts_per_page) {
                    
                            get_template_part( 'template-parts/content', 'blog-card1' );
                        
                            }
                        
                    $i++;
                    endwhile; ?>

                    <section class="main-section">
                        <div class="container">
                            <div class="cat-pagi">
                                <div class="nav-links">
                                    <?php
                                    echo paginate_links( array(
                                        'format'  => 'page/%#%',
                                        'current' => $paged,
                                        'total'   => $blog_query->max_num_pages,
                                        'mid_size'        => 2,
                                        'prev_text'       => __('<< Previous'),
                                        'next_text'       => __('Next >>')
                                    ) ); ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <?php else : ?>
                        <div class="col-md-12 not-found-sec">
                            <h1 class="page-title"><?php _e( 'Nothing Found', 'rhm' ); ?></h1>
                            <div><?php _e( 'Sorry, but nothing found.', 'rhm' ); ?></div>
                        </div>
                    <?php endif; ?>

                

                </div>
            </div>
    </section>
</main>

<?php
get_footer();