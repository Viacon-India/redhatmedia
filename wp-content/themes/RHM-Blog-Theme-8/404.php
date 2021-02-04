<?php
 get_header();
?>

<main class="main">
    <section class="blog">
        <div class="container">
            <div class="row blog-card-wrapper">					
				<div class="col-md-12">
					<div class="blog-c-card">						
						<div class="c-card-text-wrapper">
							<div class="c-title-wrapper">
								<h1 class="c-title">Error : </span> 404</h1>								
							</div>
							<p class="c-text">You may have mis-typed the URL or the page has been removed.</p>
							<div class="c-link-wrapper">
								<a href="<?php echo home_url(); ?>" class="c-link">Home</a>			
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
	get_footer();
?>