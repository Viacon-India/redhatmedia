<?php
/* Template Name: Services Page */
get_header();

  $myvals = get_post_meta(get_the_ID());
  foreach($myvals as $key=>$val) {    
      ${$key} = unserialize($val[0]) ? unserialize($val[0]) : $val[0];
  }

  $rhm_frontpage_service_data = get_post_meta(get_option( 'page_on_front' ), 'rhm_frontpage_service_data',true);
  ?>


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

    <section class="work-with-me-card-and-sec">
      <div class="container">
        <div class="row">

          <div class="work-with-wrapper">
            <!-- <div class="col-md-3">
              <div class="link-wrapper mb-3 mb-md-0">
                <a class="link dash" href="">Red Hat Media SEO Services</a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="text-wrapper">                
              <?php //echo $rhm_frontpage_service_content; ?>
              </div>
            </div> -->
          </div>

          <?php foreach($rhm_frontpage_service_data as $key=>$data) { ?>

          <div class="work-with-me-card-wrapper" id="<?php echo str_replace(' ','-', $data['name']); ?>">
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
                <div class="text-wrapper">
                  <?php echo wpautop($data['desc']); ?>
                </div>
                <!-- <div class="btn-wrapper">
                  <a class="btn btn-primary btn-custom-style " href="<?php //echo $data['link']; ?>" role="button">
                    <?php //echo $data['link_text']; ?>
                  </a>
                </div> -->
              </div>
            </div>
          </div>

        <?php } ?>

        </div>
    </section>

  </main>

<?php
get_footer();
?>