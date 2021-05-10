<?php
get_header();

$all_meta_for_user = get_user_meta( get_the_author_ID() );
  //echo '<pre>';
  //print_r( $all_meta_for_user );
  ?>


<div class="container-fluid header-gap">
	<div class="row">
		<div class="col-md-8 blog-card">
			<header class="page-header">

				<div class="content-title">
					<?php the_archive_title( '<h1 class="page-title" style="font-size: 1.5rem;">', '</h1>' ); ?>
				</div>

				<?php $get_author_gravatar = get_avatar_url(get_the_author_ID(), array('size' => 50)); ?>
				<img src="<?php echo $get_author_gravatar; ?>" srcset="" alt="<?php the_author(); ?>-avatar">				
				
				<?php the_archive_description( '<div class="taxonomy-description"><p>', '</p></div>' ); ?>

				<ul class="post-author-overlay">
					<?php echo $user_ig_link = get_option( 'instagram' );
					$user_tw_link = get_option( 'no_exists_value' ); ?>
					<span>Follow: </span>

					<?php 
					$fb_link = get_user_meta( get_the_author_ID(), 'facebook' , true );
					$tw_link = 'https://twitter.com/'.get_user_meta( get_the_author_ID(), 'twitter' , true );
                    $ins_link = get_user_meta( get_the_author_ID(), 'instagram' , true ); 
					
					if(!empty($ins_link)) { ?>
					<li><a href="<?php echo esc_url($fb_link); ?>" target="_blank">
						<i class="fa fa-facebook"></i></a></li>
					<?php }
					if(!empty($tw_link)) { ?>
					<li><a href="<?php echo esc_url($tw_link); ?>" target="_blank">
						<i class="fa fa-twitter"></i></a></li>
					<?php }
					if(!empty($ins_link)) { ?>
					<li><a href="<?php echo esc_url($ins_link); ?>" target="_blank">
						<i class="fa fa-instagram"></i></a></li>
					<?php } ?>
				</ul>
			</header>

			<section class="blog-sec">
				<div class="">
					<div class="card-bg">
						<ul class="cards">																
							<?php while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'archive-loop');
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


<?php get_footer(); ?>
