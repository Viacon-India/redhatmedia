<?php
/*
 * Template Name: Brand Template
 */
get_header();
global $redhatm;
?>

<!-- <div class="banner">
    <div class="container">
        <div class="banner-content">
            <h1 class="page-title">My Companies</h1>
            <p class="page-intro">In the past couple of years, I have built commercial and financial entities that are aimed at solving Digital Marketing problems in a simple, effective and affordable fashion. I do not believe that expertise needs to be expensive in order to be successful. You simply find a lacunae and plug it with experience, knowledge and skills. </p>
        </div>
    </div>
</div> -->
<?php /* ?>
<section class="brand-page">
    <div class="container">
    
    	<h1 class="page-title" style="display: none;">Our Websites</h1>

        <?php
		$categories = get_terms( 'niches', array(
		    'hide_empty' => true,
		    'orderby' => 'date',
		    'order' => 'DESC'
		) );
		?>

        <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">

        	<?php $cf = 1;
        	foreach ( $categories as $category ) { ?>
	          <li class="nav-item">
	            <a class="nav-link <?php if($cf == 1) { echo 'active'; } ?>" id="<?php echo $category->slug; ?>-tab-just" data-toggle="tab" href="#<?php echo $category->slug; ?>-just" role="tab" aria-controls="<?php echo $category->slug; ?>-just"
	              aria-selected="true"><?php echo $category->name; ?></a>
	          </li>
	        <?php 
	        $cf++;
	    	} ?>

        </ul>
        <div class="tab-content pt-5" id="myTabContentJust">        	

        	<?php $cs = 1;
        	foreach ( $categories as $category ) { ?>

	          <div class="tab-pane fade show <?php if($cs == 1) { echo 'active'; } ?>" id="<?php echo $category->slug; ?>-just" role="tabpanel" aria-labelledby="<?php echo $category->slug; ?>-tab-just">

	          	<div class="blog-sec">
    				<div class="card-bg">

			          	<ul class="cards">

				            <?php $lastposts = get_posts( array(
							    'posts_per_page' => 4,
							    'post_type' => 'brand',
							    'tax_query' => array(
								    array(
								      'taxonomy' => 'niches',
								      'field' => 'id',
								      'terms' => $category->term_id
								    )
								)
							) );

							if ( $lastposts ) {
							    foreach ( $lastposts as $post ) : setup_postdata( $post ); ?>

							    	<?php $website_link = get_field( 'website_link', $post->ID );

							    	$fb_link = get_field( 'facebook_link', $post->ID );
					            	$tw_link = get_field( 'twitter_link', $post->ID );
					            	$insta_link = get_field( 'instagram_link', $post->ID );
					            	$pin_link = get_field( 'pinterest_link', $post->ID );
					            	$linkedin_link = get_field( 'linkedin_link', $post->ID );

					            	 ?>

							        <li class="cards_item">
									    <div class="card">
									        <div class="card_image">
									        	<?php the_post_thumbnail( 'full', array('class' => 'attachment-blog-thumbnail size-blog-thumbnail wp-post-image')); ?>
									        </div>
									        <div class="card_content">
									            <h2 class="card_title">
									            	<a href="<?php echo $website_link; ?>" target="_blank">
									            		<?php the_title(); ?>									            
									            	</a>		
									            </h2>
									            <div class="sociallinks">
									            	
									            	<?php if(!empty($fb_link)) { ?>
										            	<a href="<?php echo $fb_link; ?>" target="_blank">
										            		<i class="fa fa-facebook"></i>
										            	</a>
										            <?php } if(!empty($tw_link)) { ?>
										            	<a href="<?php echo $tw_link; ?>" target="_blank">
										            		<i class="fa fa-twitter"></i>
										            	</a>
										            <?php } if(!empty($insta_link)) { ?>
										            	<a href="<?php echo $insta_link; ?>" target="_blank">
										            		<i class="fa fa-instagram"></i>
										            	</a>
										            <?php } if(!empty($pin_link)) { ?>
										            	<a href="<?php echo $pin_link; ?>" target="_blank">
										            		<i class="fa fa-pinterest"></i>
										            	</a>
										            <?php } if(!empty($linkedin_link)) { ?>
										            	<a href="<?php echo $linkedin_link; ?>" target="_blank">
										            		<i class="fa fa-linkedin"></i>
										            	</a>
										            <?php } ?>
									            </div>
									            <div class="card_text">
									            	<?php get_custom_content($post->post_content, 100 ); ?>
									            </div>
									            <?php if(!empty($website_link)) { ?>
									            	<a class="btn card_btn" href="<?php echo $website_link; ?>" target="_blank">
										            	View Website <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>

										            </a>
									        	<?php } ?>
									        </div>
									    </div>
									</li>

							    <?php
							    endforeach; 
							    wp_reset_postdata();
							}
							?>
						</ul>

					</div>
    			</div>
	            	            

	          </div>

	        <?php 
	        $cs++;
	    	} ?>

	    	<!-- <a href="<?php //echo esc_url( get_category_link( $category->term_id ) ); ?>" class="btn btn-primary">View All </a> -->	    	

        </div>

    </div>
</section>
<?php */ ?>

<?php $banner_image = get_field('banner_image', get_the_ID());
?>

<div class="inner-header overlay-dark" style='background: url("<?php echo $banner_image; ?>"); '>
	<!-- <img src="http://saharango1993.com/wp-content/uploads/2019/11/contact-bg.jpg"> -->
  <div class="container pt-30 pb-30">
    <!-- Section Content -->
    <div class="section-content text-center">
      <div class="row"> 
        <div class="col-md-12 text-center">
          <div class="title">
	    		<h1><?php the_title(); ?></h1>
	      </div>
          <ol class="breadcrumb text-center mt-10 white">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="javascript:void(0);" class="active"><?php the_title(); ?></a></li>            
          </ol>
        </div>
      </div>
    </div>
  </div>      
</div>

<style>


</style>



<section class="brand-page inner-page">
    <div class="container">   
    	

      	<div class="blog-sec">
			<div class="card-bg">

	          	<ul class="cards">

		            <?php $lastposts = get_posts( array(
					    'posts_per_page' => -1,
					    'post_type' => 'brand',
					    'orderby' => 'date',
					    'order' => 'DESC'
					) );

					if ( $lastposts ) {
					    foreach ( $lastposts as $post ) : setup_postdata( $post ); ?>

					    	<?php $website_link = get_field( 'website_link', $post->ID );

					    	$fb_link = get_field( 'facebook_link', $post->ID );
			            	$tw_link = get_field( 'twitter_link', $post->ID );
			            	$insta_link = get_field( 'instagram_link', $post->ID );
			            	$pin_link = get_field( 'pinterest_link', $post->ID );
			            	$linkedin_link = get_field( 'linkedin_link', $post->ID );

			            	 ?>

					        <li class="cards_item">
							    <div class="card">
							        <div class="card_image">
							        	<?php the_post_thumbnail( 'full', array('class' => 'attachment-blog-thumbnail size-blog-thumbnail wp-post-image')); ?>
							        	<h2 class="card_title">
							            	<a href="<?php echo $website_link; ?>" target="_blank">
							            		<?php the_title(); ?>									            
							            	</a>		
							            </h2>
							        </div>
							        <div class="card_content">							            
							            <div class="sociallinks">							            	
							            	<?php if(!empty($fb_link)) { ?>
								            	<a href="<?php echo $fb_link; ?>" target="_blank">
								            		<i class="fa fa-facebook"></i>
								            	</a>
								            <?php } if(!empty($tw_link)) { ?>
								            	<a href="<?php echo $tw_link; ?>" target="_blank">
								            		<i class="fa fa-twitter"></i>
								            	</a>
								            <?php } if(!empty($insta_link)) { ?>
								            	<a href="<?php echo $insta_link; ?>" target="_blank">
								            		<i class="fa fa-instagram"></i>
								            	</a>
								            <?php } if(!empty($pin_link)) { ?>
								            	<a href="<?php echo $pin_link; ?>" target="_blank">
								            		<i class="fa fa-pinterest"></i>
								            	</a>
								            <?php } if(!empty($linkedin_link)) { ?>
								            	<a href="<?php echo $linkedin_link; ?>" target="_blank">
								            		<i class="fa fa-linkedin"></i>
								            	</a>
								            <?php } ?>
							            </div>
							            <div class="card_text">
							            	<?php //get_custom_content($post->post_content, 100 );
							            	echo $post->post_content; ?>
							            </div>
							            <?php if(!empty($website_link)) { ?>
							            	<a class="brand-btn" href="<?php echo $website_link; ?>" target="_blank">
								            	View Website <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
								            </a>
							        	<?php } ?>
							        </div>
							    </div>
							</li>

					    <?php
					    endforeach; 
					    wp_reset_postdata();
					}
					?>
				</ul>

			</div>
		</div>

	    <!-- <a href="<?php //echo esc_url( get_category_link( $category->term_id ) ); ?>" class="btn btn-primary">View All </a> -->	    	

        </div>

    </div>
</section>




<?php
get_footer();
