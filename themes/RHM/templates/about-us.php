<?php
/*
 * Template Name: About Template
 */
get_header();
global $redhatm;
?>

<?php 
$_home_who_heading = get_post_meta( get_the_ID(), '_home_who_heading', true );
$_home_who_short_desc = get_post_meta( get_the_ID(), '_home_who_short_desc', true );

$_home_program_details_page_dropdown = get_post_meta( get_the_ID(), '_home_program_details_page_dropdown', true );

?>

    <div class="about">
      <div class="container">
        <div class="row">
        <?php //while ( have_posts() ) : the_post(); ?>
          <div class="col-md-12 about-text">
            <h1><span><?php the_title(); ?></span></h1>
            <?php the_content(); ?>
            <a href="<?php echo home_url('/contact-me'); ?>" class="blue-butn-outline" rel="">Contact Me</a>            
          </div>
         <?php //endwhile; ?>
          <!-- <div class="col-md-4">
            <ul>
              <?php if (!empty($redhatm['instagram_url'])) { ?>
              <li class="instagram">
                <a href="<?php echo esc_url($redhatm['instagram_url']); ?>" target="_blank" rel="nofollow">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/instagram-brands.svg" alt="instagram-logo" />
                  <span class="sr-only">Instagram</span></a
                >
              </li>
              <?php } if (!empty($redhatm['linkedin_url'])) { ?>
              <li class="liked-in">
                <a href="<?php echo esc_url($redhatm['linkedin_url']); ?>" target="_blank" rel="nofollow">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin-in-brands.svg" alt="Linkedin-logo"
                /></a>
              </li>
              <?php } if (!empty($redhatm['twitter_url'])) { ?>
              <li class="twitter">
                <a href="<?php echo esc_url($redhatm['twitter_url']); ?>" target="_blank" rel="nofollow">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/twitter-brands.svg" alt="twitter-logo"
                /></a>
              </li>
              <?php } if (!empty($redhatm['facebook_url'])) { ?>
              <li class="facebook">
                <a href="<?php echo esc_url($redhatm['facebook_url']); ?>" target="_blank" rel="nofollow">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/facebook-f-brands.svg" alt="facebook-logo"
                /></a>
              </li>
              <?php } ?>
            </ul>
          </div> -->
        </div>
      </div>
    </div>  


<?php 
get_footer();
