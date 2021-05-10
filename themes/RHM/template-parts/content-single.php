<div class="single-post">
	<div class="container">
		<div class="row">
			<div class="col-md-8 ">
			    <div class="blog-card" style="margin-bottom: 25px;">

				<article>
					<div>
						<h1><?php the_title(); ?></h1>
						
						<p class="meta">
							<span><a><i class="fa fa-calendar"></i> <?php the_date(); ?></a></span>
							<span>
								<?php $categories = get_the_category();
								if ( ! empty( $categories ) ) {
								    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"><i class="fa fa-folder" aria-hidden="true"></i> ' . esc_html( $categories[0]->name ) . '</a>';
								} ?>
							</span>
							<span><a><?php echo '<i class="fa fa-eye"></i> '. subh_get_post_view(get_the_ID()); ?></a><span>
						</p>
						<?php /* the_author_posts_link(get_the_ID()); ?> | <?php echo subh_get_post_view(get_the_ID()); */ ?>
						<div class="blog-img">							
							<?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
						</div>
					</div>
					<!-- <footer>
						<?php /*$get_author_gravatar = get_avatar_url(get_the_author_ID(), array('size' => 450)); ?>
						<img src="<?php echo $get_author_gravatar; ?>" srcset="" alt="<?php the_author(); ?>-avatar" style="border-radius: 50px;">
						<p>Author: <?php the_author_posts_link(get_the_ID()); ?> <span><?php the_date(); */ ?></span></p>
					</footer> -->
					<section class="main-content">
						<?php the_content(); ?>						
					</section>
				</article>
			     </div>
			     
			     <div class="single-post-subscribe" style="margin-bottom: 25px;">
				<article>	
					
					<div style="">
					    
					     <script async data-uid="325feb2b69" src="https://fantastic-knitter-3728.ck.page/325feb2b69/index.js"></script>
					</div>
				</article>
			     </div>
			     <div class="blog-card">
				<article>	
					
					<div style="border: 1px solid whitesmoke; padding: 15px;">
						<div class="popular-author-post">
							<div class="media">
								
								<?php $author_id = get_the_author_meta('ID');
								$get_author_gravatar = get_avatar_url(get_the_author_ID(), array('size' => 450)); ?>
								
								<?php ?>								
							   	<div class="post-author">
									<img src="<?php echo $get_author_gravatar; ?>" class="img-fluid" 
										 alt="<?php the_author(); ?>-avatar">
									<!-- <div class="post-author-overlay">
										<ul>
											<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a href="#"><i class="fa fa-youtube"></i></a></li>
											<li><a href="#"><i class="fa fa-skype"></i></a></li>
										</ul>
									</div> -->																	
								</div>
								<?php ?>
								
								<div class="media-body">
									
									<h3 class="heading"> 
									<?php //the_author_posts_link(get_the_ID()); ?>
										<a href="<?php echo get_author_posts_url($author_id, 										                              get_the_author_meta('user_nicename')); ?>"><?php 
										  $author_fname = get_the_author_meta( 'first_name', $author_id );
										  $author_lname = get_the_author_meta( 'last_name', $author_id );
										  if(!empty($author_fname)) { echo $author_fname.' '.$author_lname; }
										  else { the_author(); } ?>
										</a>
									</h3>
									<p><?php echo get_the_author_meta( 'description' ); ?></p>
									
									<ul class="post-author-overlay">
										<?php echo $user_ig_link = get_option( 'instagram' );
										$user_tw_link = get_option( 'no_exists_value' ); ?>
										<span>Follow: </span>
										
											<?php 
											$fb_link = get_user_meta( $author_id, 'facebook' , true );
										    $tw_link = 'https://twitter.com/'.get_user_meta( get_the_author_ID(), 'twitter' , true );
											$ins_link = get_user_meta( $author_id, 'instagram' , true ); 

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
									
								</div>
							</div>
						</div>
					</div>
				</article>
			     </div>
				

			</div>
			
			<div class="col-md-4 side-bar-full">

				<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
				
			</div>

		</div>
	</div>
</div>