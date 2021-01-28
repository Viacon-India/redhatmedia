<?php global $rhm;

  $fb_url = $rhm['facebook_url'];
  $tw_url = $rhm['twitter_url'];
  $linked_url = $rhm['linkedin_url'];
  $insta_url = $rhm['instaram_url'];
  ?>

    <!-- *****************footer-sec***************** -->
    <footer class="footer-sec">
        <section class="subscription-sec">
            <div class="container">

                <ul class="socil-medi-cont">
                  <?php if (!empty($fb_url)) { ?>
                    <li class="socil-me-li">
                      <a class="socil-icon" rel="nofollow" href="">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    </li>
                  <?php }
                  if (!empty($tw_url)) { ?>
                    <li class="socil-me-li">
                      <a class="socil-icon" rel="nofollow" href="">
                        <i class="fab fa-instagram"></i>
                      </a>
                    </li>
                  <?php }
                  if (!empty($linked_url)) { ?>
                    <li class="socil-me-li">
                      <a class="socil-icon" rel="nofollow" href="">
                        <i class="fab fa-linkedin"></i>
                      </a>
                    </li>
                  <?php }
                  if (!empty($insta_url)) { ?>
                    <li class="socil-me-li">
                      <a class="socil-icon" rel="nofollow" href="">
                        <i class="fab fa-instagram"></i>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
                
                <div class="sub-from-sec">
                    <!-- <input type="email" class="sub-from-input" name="" value="" placeholder="Email Newsletter">
                    <input type="submit" class="sub-from-submit" value="SUBSCRIBE">                 -->
                    <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>              
                    <div class="sub-from-checkbox">
                        <label class="sub-from-chk-lebel" for="">By Submitting this form. You are agreeing the 
                          terms of the <a href="<?php home_url(); ?>/privacy-policy" target="_blank">privacy policy</a>
                        </label>
                    </div>
                </div>

            </div>
        </section>
        <section class="footer-main-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a class="foot-logo" href="<?php echo home_url(); ?>">
                            <img src="<?php echo $rhm['logo']['url']; ?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-2">
                        <div class="foot-col-card">
                            <h5 class="foot-col-taitel"><a href="">BIG STORY</a></h5>
                            <?php wp_nav_menu(array(
                              'theme_location' => 'footer_links',
                              'container' => 'ul',
                              'menu_class' => 'foot-col-ul',
                            )); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="foot-col-card">
                            <h5 class="foot-col-taitel"><a href="">Videos</a></h5>
                            <?php wp_nav_menu(array(
                              'theme_location' => 'footer_links',
                              'container' => 'ul',
                              'menu_class' => 'foot-col-ul',
                            )); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="foot-col-card">
                            <h5 class="foot-col-taitel"><a href="">SECTIONS</a></h5>
                            <?php wp_nav_menu(array(
                              'theme_location' => 'footer_links',
                              'container' => 'ul',
                              'menu_class' => 'foot-col-ul',
                            )); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="foot-col-card">
                            <h5 class="foot-col-taitel"><a href="">TRENDING TOPICS</a></h5>
                            <?php wp_nav_menu(array(
                              'theme_location' => 'footer_links',
                              'container' => 'ul',
                              'menu_class' => 'foot-col-ul',
                            )); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="foot-col-card">
                            <h5 class="foot-col-taitel"><a href="">@THEQUINT</a></h5>
                            <?php wp_nav_menu(array(
                              'theme_location' => 'footer_links',
                              'container' => 'ul',
                              'menu_class' => 'foot-col-ul',
                            )); ?>
                            <?php wp_nav_menu(array(
                              'theme_location' => 'footer_links',
                              'container' => 'ul',
                              'menu_class' => 'foot-col-ul',
                            )); ?>
                        </div>
                    </div>
                </div>

                <section class="copy-right">
                    <p>© <?php echo the_date('Y'); ?> - TheContentRely. All Rights Reserved.</p>                
                    <p>Designed and Developed By <a href="">viacon</a></p>
                </section>

            </div>

        </section>
    </footer>
    

    <?php wp_footer(); ?>

      <script>
        jQuery(document).ready(function($) {

          let images = document.getElementsByTagName("img");
          for (var i = 0; i < images.length; i++) addAlt(images[i]);
          //adds alt value from file name
          function addAlt(el) {
            if (el.getAttribute("alt")) return;

            url = el.src;
            let filename = url.substring(url.lastIndexOf("/") + 1);
            filename = filename
              .split(".")
              .slice(0, -1)
              .join(".");

            el.setAttribute("alt", filename);
            //console.log("added alt: " + filename);
          }

          /********************************************/
          $('a').each(function() { //External link open in new tab
            var a = new RegExp('/' + window.location.host + '/');
            if (this.href && !a.test(this.href)) {
              $(this).click(function(event) {
                event.preventDefault();
                event.stopPropagation();
                window.open(this.href, '_blank');
              });
            }
          });
          /******** Header forms**********/
          $('#open-search i').on('click', function() {
            $('.search-form').show();
            $('#open-search, .header-subscribe').hide();
          });
          $('#close-search i').on('click', function() {
            $('.search-form').hide();
            $('#open-search, .header-subscribe').show();
          });
          
          /****************** Menu ***************/
          $('.header-top .header-left-links li').addClass('header-left-links-li');
          $('.header-top .header-left-links li a').addClass('header-left-links-a');
          $('.footer-main-sec ul.foot-col-ul li a').addClass('oswald');

          /******************** Mega Menu **********************/
          $('#navbarSupportedcontent li').addClass('nav-item');
          $('#navbarSupportedcontent li a').addClass('upper nav-link');
          $('body.blog .artical-content p').addClass('blog-latter'); 
                    

          $('.dropdown-menu').on('click', function(e) {
            e.stopPropagation();
          });

          $('.dropdown-menu .list-links li a').click(function(e) {
            e.preventDefault();
            $('.dropdown-menu .defaultshow, .show-dat').hide();
            var d = $(this).data('name');
            var defaultid = $('#' + d + '-post').parents(".dropdown-menu").find('.defaultShow').attr("id");
            console.log(defaultid);
            $('#' + defaultid).hide();
            $('#' + d + '-post').show();
          });

          $('.dropdown-menu li a').click(function() {
            $('.dropdown-menu.show').find('li').removeClass('active-data');
            $(this).closest('li').addClass('active-data');
          });

          $('.nav-item i').click(function() {
            $('.dropdown-menu').removeClass('show');
            $(this).next().toggleClass('show');
          });


          $('li.nav-item > a').click(function() {
            $('li.nav-item.show > a').not(this).closest('li').prev('a').removeClass('open');

            if ($(this).closest('li').prev('a').hasClass("open"))
              $(this).closest('li').prev('a').removeClass('open');
            else
              $(this).closest('li').prev('a').addClass('open');
          });
          /******************** Mega Menu End **********************/


          $('.single .expand p').hide();
          $('.single .expand h2').on('click', function() {
            $(this).next('p').toggle('slow');
          });

        });
      </script>

    </body>
</html>