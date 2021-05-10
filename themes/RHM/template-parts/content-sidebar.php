<aside class="sidebar">
					
	<section class="search-bar">
		<?php get_search_form(); ?>
	</section>	

	

	<section class="resorce">
		<h2>Latest Resource</h2>
		<ul>
			<?php $popular = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page'=> 3,
				'orderby' => 'date',
				'order' => 'DESC'
			));
			while ($popular->have_posts()) : $popular->the_post(); ?>			

				<li>
					<img src="<?php the_post_thumbnail_url('sidebar-thumbnail'); ?>" alt="<?php the_title(); ?>" />
					<a href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>					
				</li>

			<?php endwhile; wp_reset_postdata(); ?>
		
		</ul>
	</section>

	<section class="resorce">
		<h2>Categories</h2>
		<ul>
			<?php $categories = get_categories();
			foreach($categories as $category) { ?>
				<li>
					<a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
				</li>
			<?php } ?>		
		</ul>
	</section>

	<section class="image-sec">
		<img src="<?php echo get_template_directory_uri(); ?>/images/single page/img1.png" alt="" srcset="">
	</section>

	<section class="resorce">
		<h2>Popular Posts</h2>
		<ul>
			<?php $popular = new WP_Query(array( //based on views
				'post_type' => 'post',
				'posts_per_page'=> 3,
				'orderby' => 'meta_value',
				'meta_key' => 'post_views_count',
				'order' => 'DESC'
			));
			while ($popular->have_posts()) : $popular->the_post(); ?>			

				<li>
					<img src="<?php the_post_thumbnail_url('sidebar-thumbnail'); ?>" alt="<?php the_title(); ?>" />
					<a href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>					
				</li>

			<?php endwhile; wp_reset_postdata(); ?>
		
		</ul>
	</section>

</aside>