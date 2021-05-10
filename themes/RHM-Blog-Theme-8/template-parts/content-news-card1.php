<div class="col-md-4">
	<div class="news-card-wrapper">
		<a href="<?php echo get_the_permalink($post->ID); ?>" >
			<div class="blog-img-card">
				<?php echo get_the_post_thumbnail($post->ID,'news-card-thumbnail'); ?>
			</div>
		</a>
		<div class="blog-c-card">
			<div class="c-card-text-wrapper">				
				<div class="c-title-wrapper">
					<span class="date"> <?php echo get_the_date( 'F j, Y' ); ?></span>
					<h2 class="c-title">
						<a href="<?php echo get_the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</div>
			</div>
			<div class="c-link-wrapper">
				<a href="<?php echo get_the_permalink($post->ID); ?>" class="c-link">continue reading</a>
			</div>
		</div>
	</div>
</div>