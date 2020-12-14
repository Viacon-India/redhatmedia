<?php
get_header(); ?>

<div class="container-fluid header-gap">
	<div class="row">
		<div class="col-md-8 blog-card">
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>

			<section class="blog-sec">
			<div class="container">
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