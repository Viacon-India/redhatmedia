<?php
/*
 * Template Name: Contact Template
 */
get_header();
while ( have_posts() ) : the_post();
?>

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

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12 about-text">          

            <?php the_content(); ?>	    
            
          </div>
          <div class="col-md-8 col-md-offset-2">
          	<div class="contact-page-form">
            		<?php echo do_shortcode('[contact-form-7 id="76" title="Contact form 1"]'); ?>
            	</div>
          </div>
        </div>
      </div>
    </section>

   

<?php endwhile;
get_footer();
