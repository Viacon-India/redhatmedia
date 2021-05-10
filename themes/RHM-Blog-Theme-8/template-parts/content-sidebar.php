<aside class="aside-bar">
	<div class="sidebar-search">
		<?php get_search_form(); ?>
	</div>
	<div class="social-media-section custom-widget">
		<h5 class="asid-content-title">Subscribe To Our Newsletter</h5>
		<?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>			
	</div>
	<div class="also-read-sec custom-widget">		
		<div class="social-media-section">
			<?php //echo do_shortcode('[get_our_recent_posts]'); ?>

			<?php $recent_argss = array(
			'post_type' => 'post',
			'post_status'=>'publish', 
			'posts_per_page' => 8,
			'orderby' => 'date',
			'order'     => 'DESC',
			);
			$recent_q = get_posts($recent_argss); ?>

			<?php if (!empty($recent_q)) { ?>

				<div class="header-banner-aside-content">
					<h5 class="asid-content-title">Recent Posts</h5>
					<div class="scroll-asid">
					<ul class="asid-ul">
						<?php foreach($recent_q as $post) { ?>            
							<li class="asid-li">
							<span class="left-span image-test">
								<?php echo get_the_post_thumbnail($post->ID,'blog-sidebar-thumbnail'); ?>
							</span>
							<a class="asid-link" href="<?php echo get_the_permalink($post->ID); ?>">                        
								<?php echo $post->post_title; ?>
							</a>
							</li>              
						<?php } ?>
					</ul>
					</div>
				</div>

			<?php } ?>


		</div>
	</div>
	<div class="popular-posts custom-widget">
		<div class="social-media-section">
			<?php echo do_shortcode('[get_popular_posts]'); ?>
		</div>
	</div>
</aside>