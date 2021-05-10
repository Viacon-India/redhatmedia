<?php
/* Template Name: Home Page */
get_header();

$myvals = get_post_meta(get_the_ID());
foreach($myvals as $key=>$val) {    
    ${$key} = unserialize($val[0]) ? unserialize($val[0]) : $val[0];
}

?>

<!-- start banner/Header -->
  <header class="header">
    <img src="<?php echo $rhm_banner_img; ?>" alt="banner-img"> 
    <div class="container">
      <div row="row">
        <div class="col-md-8">
          <div class="header-title-warper">
            <h1 class="title">
            <?php if(!empty($rhm_frontpage_banner_heading)) { echo $rhm_frontpage_banner_heading; } ?>
            </h1>
          </div>
          <div class="header-text-warper">            
            <?php if(!empty($rhm_frontpage_banner_cont)) { echo $rhm_frontpage_banner_cont; } ?>
          </div>
          <div class="header-link-warper">
            <a class="link" href="<?php if(!empty($rhm_frontpage_btn_link)) { echo $rhm_frontpage_btn_link; } ?>">
            <?php if(!empty($rhm_frontpage_btn_text)) { echo $rhm_frontpage_btn_text; } ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- start main section  -->
  <main class="main news-temp">
    <section class="about">
      <img class="rh-pseudo" src="<?php echo get_template_directory_uri(); ?>/assets/images/sh-2.png" alt="">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="about-link-wrapper mb-3 mb-md-0">
              <a class="link dash" href="<?php echo home_url('/about-us'); ?>">About Red Hat Media</a>
            </div>
          </div>
          <div class="col-md-9">
            <div class="about-text-wrapper">
              <?php if(!empty($rhm_frontpage_about_us)) { echo $rhm_frontpage_about_us; } ?>
            </div>
          </div>
        </div>

      </div>

    </section>

    <!-- end about sec -->

    <section class="my-companies-multi-section">

      <div class="container">
        <div class="row">

      <?php
      if(!empty($rhm_frontpage_brand_data)) {
        $hcount =0;
        $total_brand = count($rhm_frontpage_brand_data);
        $key = 1;
        foreach($rhm_frontpage_brand_data as $key_val=>$data) {

          
        if($key==1 || $key == 9 || $key == 17) {
           ?>

          <div class="my-companies_wrapper">
            <div class="col-md-3">
              <div class="link-wrapper mb-3 mb-md-0">
                <a class="link dash">
                  <?php if(!empty($rhm_frontpage_brand_heading_data[$hcount]['heading'])) {
                    echo $rhm_frontpage_brand_heading_data[$hcount]['heading'];
                  } ?>
                </a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="caption-text-wrapper">
                <p class="text">
                  <?php if(!empty($rhm_frontpage_brand_heading_data[$hcount]['desc'])) {
                    echo $rhm_frontpage_brand_heading_data[$hcount]['desc'];
                  } ?>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="logo-wrapper">
              <div class="logo-grid-wrapper">

              <?php $hcount++;
              } ?>

                <a href="<?php if(!empty($data['link'])) { echo $data['link']; } ?>" class="logo-card <?php echo $key; ?>" target="_blank">
                  <div class="img-wrapper">
                    <img src="<?php if(!empty($data['img'])) { echo $data['img']; } ?>" alt="<?php if(!empty($data['name'])) { echo $data['name']; } ?>">
                  </div>
                  <div class="logo-content-card">
                    <h2 class="title"><?php if(!empty($data['name'])) { echo $data['name']; } ?></h2>
                    <p class="c-content">
                      <?php if(!empty($data['desc'])) { echo $data['desc']; } ?>
                    </p>
                  </div>
                </a>

                <?php if($key>1 && $key%8  == 0 || $key == $total_brand) { ?>
              </div>
            </div>
          </div>
          <?php } ?>


        <?php $key++; }
        } ?>

        
          <div class="col-md-12">
            <div class="btn-wrapper">
              <a name="" id="" class="btn btn-primary btn-custom-style class-after" href="<?php echo home_url('/brands'); ?>" role="button">SEE ALL OF MY
                COMPANIES AND
                INVESTMENTS</a>
            </div>
          </div>

        </div>
      </div>

    </section>

    <section class="work-with-me-card-and-sec">
      <div class="container">
        <div class="row">

          <div class="work-with-wrapper">
            <div class="col-md-3">
              <div class="link-wrapper mb-3 mb-md-0">
                <a class="link dash" href="">Red Hat Media SEO Services</a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="text-wrapper">                
              <?php if(!empty($rhm_frontpage_service_content)) { echo $rhm_frontpage_service_content; } ?>
              </div>
            </div>
          </div>

          <?php if(!empty($rhm_frontpage_service_data)) {
            foreach($rhm_frontpage_service_data as $key=>$data) { ?>

            <div class="work-with-me-card-wrapper">
              <div class="col-md-5">
                <div class="image-wrapper">
                  <img src="<?php echo $data['img']; ?>" alt="<?php echo $data['name']; ?>-img">
                </div>
              </div>
              <div class="col-md-7">
                <div class="text-sec-wrapper">
                  <div class="title-wrapper">
                    <h2 class="title"><?php echo $data['name']; ?></h2>
                  </div>
                  <div class="text-wrapper"><?php //echo wpautop($data['desc']); ?>
                    <?php echo substr(wpautop($data['desc']),0,600);
                    if($total_ltr_count>$ltr_to_show) { echo '...'; }  ?>
                  </div>
                  <div class="btn-wrapper">
                    <a class="btn btn-primary btn-custom-style " href="<?php echo $data['link']; ?>" role="button">
                      <?php echo $data['link_text']; ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <?php }
          } ?>

        </div>
    </section>

    <div class="posts-section">
        <section class="news-blog blog ">
      <div class="container">
        <div class="row">
          <div class="red-hat-media-blog">
            <div class="col-md-3">
              <div class="link-wrapper mb-2 mb-md-0 ">
                <a class="link dash" href="">Red Hat Media Blog</a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="text-wrappers">                
              <?php if(!empty($rhm_frontpage_blog_content)) { echo $rhm_frontpage_blog_content; } ?>                
              </div>
            </div>
          </div>

          <?php $args=get_posts(array('post_type' => 'post', 'posts_per_page' => 6));
          foreach($args as $post): setup_postdata($post);
          
            get_template_part( 'template-parts/content', 'blog-card1' );          

          endforeach;
          wp_reset_postdata(); ?>


          <div class="col-md-12">
            <div class="blog-button-warper">
              <a name="" id="" class="btn btn-primary btn-custom-style class-after" 
              href="<?php echo home_url('/blogs'); ?>" role="button">see more blog
                posts
              </a>

            </div>
          </div>

        </div>
      </div>
    </section>
    </div>
  </main>

<?php
get_footer();
?>