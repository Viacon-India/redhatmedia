<?php $featured_image = get_the_post_thumbnail_url();
if(empty($featured_image)) {
	$featured_image= get_template_directory_uri().'/images/default-image.jpg';
} ?>
<div class="col-md-12 blog-listing">
	<a href="<?php echo get_the_permalink(); ?>"><img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="" /></a>	
	<div class="blog-cont">
		<a href="<?php echo get_the_permalink(); ?>"><h5 class="card-title mt-1"><?php the_title(); ?></h5></a>
		<div class="card-text">
			<p><?php $content = strip_tags(get_the_content());
			echo substr($content,0,240 ); ?>...</p>
		</div>
	</div>
</div>