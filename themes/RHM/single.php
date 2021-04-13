<?php
get_header(); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();

	subh_set_post_view(get_the_ID());
	//echo subh_get_post_view(get_the_ID());

	get_template_part( 'template-parts/content', 'single' );

	?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 blog-card" style="margin-top: 50px !important; margin-bottom: 40px;">
				<?php if ( comments_open() || get_comments_number() ) {
					comments_template();
				} ?>
			</div>
		</div>
	</div>

	<?php // End of the loop.
endwhile;
?>
<?php get_footer(); ?>
