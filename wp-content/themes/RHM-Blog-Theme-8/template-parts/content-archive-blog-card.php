<div class="col-md-12">
	<div class="blog-card-wrapper">
		<div class="blog-c-card">
			<div class="c-card-img-wrapper">
				<?php echo get_the_post_thumbnail($post->ID,'archive-card-thumbnail'); ?>
			</div>
		</div>
		<div class="blog-c-card">
			<div class="c-card-text-wrapper">
				<div class="date-time-wrapper">
				<h2 class="date-title">
					<?php the_date(); ?>
				</h2>
				</div>
				<div class="c-title-wrapper">
				<h2 class="c-title"><?php the_title();//get_limited_title_func(get_the_title(), 40); ?></h2>
				</div>
				<div class="c-text-wrapper">
				<p class="c-text">
					<?php get_limited_content_func(get_the_content(),150); ?>
				</p>
				</div>
				<div class="c-link-wrapper">
				<a href="<?php echo get_the_permalink(); ?>" class="c-link">continue reading</a>
				</div>
			</div>
		</div>
	</div>
</div>