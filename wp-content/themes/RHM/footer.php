<?php global $redhatm; ?>
<footer class="last-footer">

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Redhatmedia is a participant in the Amazon Services LLC Associates Program, an Affiliate Advertising Program designed to provide a means for sites to earn advertising fees by advertising and linking to amazon.</p>
            </div>
            <div class="col-md-3 fotr-menu-sec">                
                <h5>Useful Links</h5>
                <?php wp_nav_menu(array('theme_location' => 'secondary_menu')); ?>
            </div>

            <div class="col-md-3 fotr-menu-sec">
                <h5>Categories</h5>
                <?php wp_nav_menu(array('theme_location' => 'cat_links')); ?>
            </div>

            <div class="col-md-2 social-icon fotr-menu-sec">
                <h5>Social Links</h5>
                <ul>
                    <?php if (!empty($redhatm['facebook_url'])) { ?>
                        <li><a href="<?php echo esc_url($redhatm['facebook_url']); ?>" target="_blank"> 
                            <i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                        </li>
                    <?php }
                    if (!empty($redhatm['twitter_url'])) { ?>
                        <li><a href="<?php echo esc_url($redhatm['twitter_url']); ?>" target="_blank"> 
                            <i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                        </li>
                    <?php }
                    if (!empty($redhatm['linkedin_url'])) { ?>
                        <li><a href="<?php echo esc_url($redhatm['linkedin_url']); ?>" target="_blank"> 
                            <i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a></li>
                    <?php }
                    if (!empty($redhatm['instagram_url'])) { ?>
                        <li><a href="<?php echo esc_url($redhatm['instagram_url']); ?>" target="_blank"> 
                            <i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                    <?php } ?>
            </div>

            <!-- <div class="col-md-4 Subscribe-btn">
                <span>Subscribe to Our Newsletter</span>
                <?php //echo do_shortcode('[email-subscribers-form id="1"]'); ?>
            </div> -->
        </div>

    </div>
    <section class="copyright-sec">
            <div class="container">
                <div class="row">                    
                    <div class="col-md-6">
                        <div class="copyright-left-text">
                            <span>© <?php the_date('Y'); ?> Redhatmedia. All Rights Reserved.</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copyright-right-text">
                            <span>Designed and Developed by <a href="https://www.viacon.in/">Viacon</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</footer>



</div>
</div>

<?php $slug = get_queried_object()->post_name; ?>

<?php wp_footer(); ?>

<script>
    jQuery(document).ready(function($) {
		
		$('#new-search').on('click', function() {
			$('#menu-main').toggle(2000);
			$('.header-social-links').toggle(2000);
			 $("#new-search-form").toggle(2000);
		});

		$('#menu-main li:last-child').addClass('subscribe-btn');
		
        $("#new-search").on("click", function() {
           
        });
        
        
        /***************** Alt Text **********************/
        let images = document.getElementsByTagName("img");

        for (var i = 0; i < images.length; i++) addAlt(images[i]);
        
        //adds alt value from file name
        function addAlt(el) {
            if(el.getAttribute("alt")) return;
            
            url = el.src;
            let filename = url.substring(url.lastIndexOf("/") + 1);
            filename = filename
              .split(".")
              .slice(0, -1)
              .join(".");
            
            //console.log(filename);
            
            el.setAttribute("alt", filename);
            console.log("added alt: " + filename);
        }


        /*******************************************/
        $('.bars').on('click', function() {
            $('.bar.b1').toggleClass('rotated');
            $('.bar.b3').toggleClass('rotated');
            $('.menu-container.dark').toggleClass('active');
            $('.menu-btn').toggleClass('active');
            $('header').toggleClass('light');
            $('header').toggleClass('dark');
            $('.bars .b2').toggleClass('middle-menu-line');

            <?php if($slug == 'home' || $slug == 'brand' || $slug == 'about-us' || $slug == 'contact-us') { ?>
                var a = $('header').next('nav').hasClass('active');
                if(a == true) {
                    $('header').removeClass('scrolldown');
                }
            <?php } else { ?>
                $('header').toggleClass('scrolldown');
            <?php } ?>
        });


        <?php if($slug == 'home' || $slug == 'brand' || $slug == 'about-us' || $slug == 'contact-us') { ?>

        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();

            <?php if($slug == 'home') { ?>

            if (scroll >= 400) {

            <?php } else { ?>

            if (scroll >= 210) {

            <?php } ?>

                $("header").addClass("scrolldown");
                $("header").addClass("page-name-active");

                var a = $('header').next('nav').hasClass('active');
                if(a == true) {
                    $('header').removeClass('scrolldown');
                }
            } else {
                $("header").removeClass("scrolldown");
                $("header").removeClass("page-name-active");                
            }
        });

        <?php } else { ?>
            $("header").addClass("scrolldown");
            $("header").addClass("page-name-active");
        <?php } ?>

    });


</script>

</body>

</html>