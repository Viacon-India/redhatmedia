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
			<?php echo do_shortcode('[get_our_recent_posts]'); ?>
		</div>
	</div>
	<div class="popular-posts custom-widget">
		<div class="social-media-section">
			<?php echo do_shortcode('[get_popular_posts]'); ?>
		</div>
	</div>
</aside>