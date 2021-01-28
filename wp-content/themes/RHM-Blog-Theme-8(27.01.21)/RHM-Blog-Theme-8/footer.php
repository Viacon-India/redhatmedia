<?php $branddata = get_post_meta( get_option( 'page_on_front' ), 'rhm_frontpage_brand_data' ); ?>

<!-- start footer  -->
<footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-link-wrapper">

          <?php wp_nav_menu(array(
            'theme_location' => 'footer_links',
            'container' => 'ul',
            'menu_class' => 'link-sec',
          )); ?>
          </div>
          <div class="footer-about">
            <div class="about-title-wrapper">
              <h2 class="title">About red hat media</h2>
            </div>
            <div class="footer-about-text-wrapper">

            <?php echo abn_option('abn_footer_about_us'); ?>
              
            </div>
            <div class="brand-link-wrapper">
              <h3 class="brand-title">
                Our Brands: <span>Very well</span>
              </h3>

              <?php foreach($branddata[0] as $data) { ?>
                <a class="brand-link" target="_blank" href="<?php echo $data['link']; ?>"> <?php echo $data['name']; ?> </a>
              <?php } ?>

            </div>
            <div class="copy-wright-wrapper">
              <a href="">TRUST e Terms of Use </a>|
              <a href="">Privacy Policy </a>|
              <a href="">Data Security Inquiries</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- <script src="<?php //echo get_template_directory_uri(); ?>/assets/scripts/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="<?php //echo get_template_directory_uri(); ?>/assets/scripts/bootstrap.bundle.min.js"></script> -->


  <?php wp_footer(); ?>

  <script>
    jQuery(document).ready(function($) {
      $('#menu-header-menu li').addClass('nav-item');
      $('#menu-header-menu li a').addClass('nav-link');

      $('footer .link-sec li').addClass('link-sec-li');
      //$('.footer-about-text-wrapper').wrapInner('<p calss="text"></p>');
    })
  </script>

  </body>

</html>


         
