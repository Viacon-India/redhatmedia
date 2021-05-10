<?php ////// NEW SINGLE PAGE
get_header();
?>

<?php if (have_posts()) :
    while (have_posts()) : the_post();

        /* $postid = get_the_ID();        
        if (function_exists('setPostViews')) {
            setPostViews($postid);            
        }
        
        $author_id = get_the_author_meta('ID');
        $date = get_the_date();
        $term_list = wp_get_post_terms( $postid, 'news-cat', array( 'fields' => 'all' ) ); */
        
        $postid = get_the_ID();
        
        if (function_exists('setPostViews')) {
            setPostViews($postid);
            
        }
        
        $author_id = get_the_author_meta('ID');
        $author_fname = get_the_author_meta('first_name', $author_id);
        $author_lname = get_the_author_meta('last_name', $author_id);
        $featured_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        $date = get_the_date();
        $author_display_name = get_the_author();
        $cats = get_the_category($postid);   
        $first_cat = $cats[0]; ?>    


    <article class="-section pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">

                    <section class="news-banner">
                        <?php echo get_the_post_thumbnail(get_the_ID(),'single-blog-thumbnail',array('class' => 'banner-img'));
                        ?>       
                    </section>
                
                    <div class="article">

                        <section class="article-header">
                            <h1 class="article-title"><?php echo get_the_title(); ?></h1>
                            <?php /* ?>
                            <div class="mata-section">
                                <div class="mata-left">
                                    <span class="nation text-nowrap"><span class="label">Category:</span>
                                        <a href="<?php echo get_category_link($term_list[0]->term_id); ?>"><?php echo $term_list[0]->name; ?></a>
                                    </span>
                                    <span class="mata-date text-nowrap"><span class="label">Posted on:</span> <?php the_date(); ?></span>
                                </div>
                            </div>
                            <?php */ ?>
                            
                            
                            <div class="mata-section">
                                <div class="mata-left">
                                    <span class="nation text-nowrap"><span class="label">Category:</span>
                                        <a href="<?php echo get_category_link($first_cat->term_id); ?>"><?php echo $first_cat->name; ?></a>
                                    </span>
                                    <span class="mata-name text-nowrap"><span class="label">By:</span>
                                        <a href="<?php echo get_author_posts_url($author_id); ?>">
                                            <?php if (!empty($author_fname)) {
                                                echo $author_fname . ' ' . $author_lname;
                                            } else {
                                                echo get_the_author();
                                            } ?>
                                        </a>
                                    </span>
                                    <span class="mata-date text-nowrap"><span class="label">Posted on:</span> <?php the_date(); ?></span>
                                </div>
                            </div>

                        </section>

                        <section class="article-content">
                            
                            <?php the_content(); ?>

                        </section>
                        
                        <div class="tag-list">
                            <?php
                            $tag_list = get_the_tag_list('<ul><li>', '</li><li>', '</li></ul>');

                            if ($tag_list && !is_wp_error($tag_list)) {
                                echo $tag_list;
                            }
                            ?>
                        </div>
					
                    </div> 
                    
                    <div class="article">

                        <section class="single-post-blog">
                            <?php if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif; ?>
                        </section>
						
                    </div>
                    
                </div>              

                <div class="col-md-3">
                    <?php //get_template_part( 'template-parts/content', 'news-sidebar');?>
                    <?php get_template_part( 'template-parts/content', 'sidebar');?>
                </div>

            </div>
        </div>
    </article>


<?php
endwhile;
endif;

    if ($cats) {
        $first_cat = $cats[0]->term_id;
        $related_args = array(
                'category__in' => array($first_cat), 
                'post__not_in' => array($postid), 
                'posts_per_page' => 2, 
                'caller_get_posts' => 1
        );
        $related_query = new WP_Query($related_args);

        if ($related_query->have_posts()) { ?>

            <main class="main news-temp">
                <div class="posts-section">
                    <section class="news-blog blog">
                        <div class="container">
                            <div class="row">
                                <div class="red-hat-media-blog">
                                    <div class="col-md-3">
                                        <div class="link-wrapper mb-2 mb-md-0 ">
                                            <h1><a class="link dash">Related Blogs</a></h1>
                                        </div>
                                    </div>
                                </div>
    			
                                <?php while ($related_query->have_posts()) : $related_query->the_post();
            
                                    get_template_part( 'template-parts/content', 'related-card-loop');
                                        
                                endwhile; ?>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
			
			                    
        <?php }
    }




get_footer();