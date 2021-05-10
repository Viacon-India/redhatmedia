<?php ////// OLD NEWS SINGLE PAGE
get_header();
?>

<?php if (have_posts()) :
    while (have_posts()) : the_post();

        $postid = get_the_ID();        
        if (function_exists('setPostViews')) {
            setPostViews($postid);            
        }
        
        $author_id = get_the_author_meta('ID');
        $date = get_the_date();
        $term_list = wp_get_post_terms( $postid, 'news-cat', array( 'fields' => 'all' ) ); ?>    


    <article class="-section pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">

                    <section class="news-banner">
                        <?php echo get_the_post_thumbnail(get_the_ID(),'single-news-thumbnail',array('class' => 'banner-img'));
                        ?>       
                    </section>
                
                    <div class="article">

                        <section class="article-header">
                            <h1 class="article-title"><?php echo get_the_title(); ?></h1>
                            <div class="mata-section">
                                <div class="mata-left">
                                    <span class="nation text-nowrap"><span class="label">Category:</span>
                                        <a href="<?php echo get_category_link($term_list[0]->term_id); ?>"><?php echo $term_list[0]->name; ?></a>
                                    </span>
                                    <span class="mata-date text-nowrap"><span class="label">Posted on:</span> <?php the_date(); ?></span>
                                </div>
                            </div>

                        </section>

                        <section class="article-content">
                            
                            <?php the_content(); ?>

                        </section>
					
                    </div>                   
                    
                </div>              

                <div class="col-md-3">
                    <?php get_template_part( 'template-parts/content', 'news-sidebar');?>
                </div>

            </div>
        </div>
    </article>


<?php
endwhile;
endif;

    if ($term_list) {
        $related_args = array( 
                'post__not_in' => array($postid), 
                'posts_per_page' => 2, 
                'caller_get_posts' => 1,
                'post_type' => 'news',
                'tax_query' => array(
                    array(
                      'taxonomy' => 'news-cat',
                      'field' => 'id',
                      'terms' => $term_list[0]->term_id,
                      'operator'=> 'IN' 
                    )
                )
        );
        $related_query = new WP_Query($related_args);

       

        if ($related_query->have_posts()) { ?>

            <div class="posts-section">
                <section class="blog">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="link-wrapper mb-2 mb-md-0 ">
                                    <h2 class="title-header">Related News</h2>
                                </div>
                            </div>
			
                            <?php while ($related_query->have_posts()) : $related_query->the_post();
                            
                                get_template_part( 'template-parts/content', 'news-card1' );
                                    
                            endwhile; ?>
                        </div>
                    </div>
                </section>
            </div>
			
			                    
        <?php }
    }




get_footer();