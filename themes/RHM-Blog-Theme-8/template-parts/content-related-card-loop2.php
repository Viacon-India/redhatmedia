<div class="col-md-12">
	<div class="blog-card-wrapper">
		<div class="blog-c-card">
			<a href="<?php echo get_the_permalink($post->ID); ?>">
				<div class="c-card-img-wrapper">
					<?php echo get_the_post_thumbnail($post->ID,'blog-card-thumbnail'); ?>
				</div>
			</a>
		</div>
		<div class="blog-c-card">
			<div class="c-card-text-wrapper">
				<div class="date-time-wrapper">
					<h2 class="date-title">
						<?php the_date(); ?>
					</h2>
				</div>
				<div class="c-title-wrapper">
					<a href="<?php echo get_the_permalink($post->ID); ?>">
						<h2 class="c-title"><?php get_limited_title_func(get_the_title(), 60); ?></h2>
					</a>
				</div>
				<div class="c-text-wrapper">
					<p class="c-text">
					<?php get_limited_content_func(get_the_content(),150); ?>
					</p>
				</div>
				<div class="c-link-wrapper">
					<a href="<?php echo get_the_permalink($post->ID); ?>" class="c-link">continue reading</a>
				</div>
			</div>
		</div>
	</div>
</div>