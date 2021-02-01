<?php
get_header();

$myvals = get_post_meta(get_the_ID());
foreach($myvals as $key=>$val) {    
    ${$key} = unserialize($val[0]) ? unserialize($val[0]) : $val[0];
}

while ( have_posts() ) : the_post(); ?>
	
<?php if(!empty($rhm_banner_img)) { ?>
<!-- start banner/Header -->
<header class="header" style='
  background: url("<?php echo $rhm_banner_img; ?>"); 
  object-fit: cover;
  background-size: cover;
  background-position: right;'>
  
    <div class="container">
      <div row="row">
        <div class="col-md-8">
          <div class="header-title-warper">
            <h1 class="title">
              <?php echo $rhm_banner_heading; ?>
            </h1>
          </div>
          <div class="header-text-warper">            
          <?php echo $rhm_banner_content; ?>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php } ?>

  <!-- start main section  -->
  <main class="main">
    <section class="about">
      <!-- <img class="rh-pseudo" src="<?php //echo get_template_directory_uri(); ?>/assets/images/sh-2.png" alt=""> -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="about-text-wrapper">
              <div class="text"><?php the_content(); ?></div>
          </div>
        </div>

      </div>

    </section>
  </main>

<?php
endwhile;

get_footer();
?>