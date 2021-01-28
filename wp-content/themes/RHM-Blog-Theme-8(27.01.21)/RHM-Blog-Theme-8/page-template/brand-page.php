<?php
/* Template Name: Brands Page */
get_header();


  $myvals = get_post_meta(get_the_ID());
  foreach($myvals as $key=>$val) {    
      ${$key} = unserialize($val[0]) ? unserialize($val[0]) : $val[0];
  }
  $rhm_frontpage_brand_data = $rhm_frontpage_service_data = get_post_meta(get_option( 'page_on_front' ), 'rhm_frontpage_brand_data',true);
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
   

    <section class="my-companies-multi-section">

      <div class="container">
        <div class="row">

          <div class="col-md-12">
              <div class="logo-wrapper">
                <div class="logo-grid-wrapper">

                  <?php
                  if(!empty($rhm_frontpage_brand_data)) {
                    $hcount =0;
                    $total_brand = count($rhm_frontpage_brand_data);
                    foreach($rhm_frontpage_brand_data as $key=>$data) { ?>

        
                    <a href="<?php echo $data['link']; ?>" class="logo-card <?php echo $key; ?>">
                      <div class="img-wrapper">
                        <img src="<?php echo $data['img']; ?>" alt="<?php echo $data['name']; ?>">
                      </div>
                      <div class="logo-content-card">
                        <h2 class="title"><?php echo $data['name']; ?></h2>
                        <p class="c-content">
                        <?php echo $data['desc']; ?>
                        </p>
                      </div>
                    </a>

                    <?php }
                  } ?>

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