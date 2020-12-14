<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container-fluid header-gap">
	<div class="row">
		<div class="col-md-8 blog-card">
			<header class="page-header">
        <?php if ( have_posts() ) : ?>
          <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'blog' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        <?php endif; ?>
			</header>

			<section class="blog-sec">
        <div class="">
          <div class="card-bg">
            <ul class="cards">																
              <?php while ( have_posts() ) : the_post();
              
                $post_type = $post->post_type;
                if($post_type == 'post') {
              
                  get_template_part( 'template-parts/content', 'archive-loop' );
      
                }
                
              endwhile; ?>
            </ul>
            <div class="clearfix"></div>
            <div class="row">
              <div class="blog-pagi">
                <div class="nav-links">
                  <?php the_posts_pagination( array(
                    'prev_text'          => __( '<< Previous', 'blog' ),
                    'next_text'          => __( 'Next >>', 'blog' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'blog' ) . ' </span>',
                  ) ); ?>
                </div>
              </div>
            </div>
            
          </div>
        </div>
			</section>
		</div>
		<div class="col-md-4 side-bar-full">

			<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
			
		</div>
	</div>
</div>


<?php
get_footer();