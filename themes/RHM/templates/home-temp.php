<?php
/*
 * Template Name:Home Template
 */
get_header();
global $redhatm;
?>

<?php
$_home_who_heading = get_post_meta(get_the_ID(), '_home_who_heading', true);
$_home_who_short_desc = get_post_meta(get_the_ID(), '_home_who_short_desc', true);
$_home_program_details_page_dropdown = get_post_meta(get_the_ID(), '_home_program_details_page_dropdown', true);

?>



<div class="home-banner">
    <!-- <img src="<?php echo home_url(); ?>/wp-content/uploads/2020/12/rhm-banner-1-min.png" > -->

    <video loop="loop" width="100%" height="100%" preload autoplay muted style="object-fit:cover">
      <source src="<?php echo home_url(); ?>/wp-content/uploads/2020/12/1496943820.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <!-- <h1 class="hero-intro"></h1> -->
    <!-- <div data-aos="fade-up" class="text-container mt-3">
      <a href="#subscription-form" id="subscription-btn" class="btn-round pulse" rel="modal:open">Subscribe</a>
    </div> -->   

    <div class="container">
        <div class="banner-content">

            <!--<h1>Exclusive Digital Marketing Advice for Enterprenuers</h1>-->
            <!-- <p>
                Enter your email below to get access to my proven digital marketing tips and strategies
            </p> -->
           
              <div class="mt-inner">
                Proven Digital Marketing <br>Strategies To Help You <br>Get More<br>
                <?php echo get_post_meta(get_the_ID(), 'banner_heading', true); ?>
              </div>
        </div>

    </div>
</div>




<section class="home-about-sec about odd-background">
    <div class="container justify-content-center about-text">
      <div class="home-about-content">
          <h2 class="sec-title">Who we are</h2>
              <div data-aos="zoom-in" class="div aos-init aos-animate">
                  <p>We are a 360-degree Boutique Digital Marketing Company in India that loves to take on Challenges and strive forward.</p>
                  <p>Here, we help connect brands to their audiences in the most creative and technologically advanced manner possible. We believe that there is a world beyond best practices, a world where narratives and stories powered by great content, matters.</p>
                  <p>Ours is an interesting story of helping brands build narratives around themselves. We have become experts in the art of helping brands garner real revenues from the digital platforms.</p>
              </div>
      </div>
      <!--/ HOME ABOUT CONTENT -->
    </div>
</section>

<section class="home-brands even-background blog-sec">
    <div class="container card-bg">
      <div class="row">
        <div class="col-md-12">
          <div class="title-sec">
            <h2 class="sec-title">
              Our Brands
            </h2>
          </div>

          <div class="swiper-container">
            <div class="swiper-wrapper">


            <?php $lastposts = get_posts( array(
                'posts_per_page' => 8,
                'post_type' => 'brand',
            ) );

            if ( $lastposts ) {
                foreach ( $lastposts as $post ) : setup_postdata( $post );

                    $website_link = get_field( 'website_link', $post->ID ); ?>

                    <div class="swiper-slide">
                        <div class="ifrem-warapper">
                          <div class="ifrem-card">
                            <?php the_post_thumbnail( 'full', array('class' => 'attachment-blog-thumbnail size-blog-thumbnail wp-post-image')); ?>
                            <div class="title">
                                <a href="<?php echo $website_link; ?>" target="_blank">
                                    <?php the_title(); ?>
                                </a>
                                <!-- <p><?php //get_custom_content($post->post_content, 120 ); ?></p> -->                                
                            </div>

                          </div>
                        </div>
                    </div>

                    <?php
                endforeach; 
                wp_reset_postdata();
            }
            ?>



            </div>

            <!-- <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div> -->
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>

      <div class="all-post">
        <a href="<?php echo home_url('/brand'); ?>" class="btn card_btn">View All Brands</a>
      </div>

    </div>
</section>



<section class="newsletter-sec">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="text-container">
                  <h2>Get Best Service</h2>
                  <p>Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled.</p>
                  <a class="btn card_btn" href="">Get Our Services</a>
              </div>
          </div>
      </div>
  </div>    
</section>


<section class="odd-background blog-sec ">
    <div class="container">
        <div class="card-bg">
            <h2 class="sec-title">Latest Blogs</h2>
            <ul class="cards">

                <?php global $post;
                $blog_posts = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'order' => 'DESC'));
                //print_r($blog_posts);
                foreach ($blog_posts as $posts) : setup_postdata($posts); ?>

                    <li class="cards_item">
                        <div class="card">
                            <div class="card_image"><a href="<?php echo get_the_permalink($posts->ID); ?>"><?php echo get_the_post_thumbnail($posts->ID,'blog-thumbnail'); ?></a></div>
                            <div class="card_content">
                                <h2 class="card_title"><a href="<?php echo get_the_permalink($posts->ID); ?>"><?php echo $posts->post_title; ?></a></h2>
                                <a class="btn btn-outline-dark mt-2" href="<?php echo get_the_permalink($posts->ID); ?>">Read More</a>
                            </div>
                        </div>
                    </li>

                <?php endforeach;
                wp_reset_postdata(); ?>

            </ul>
            <div class="all-post">
                <a href="<?php echo home_url('/blog'); ?>" class="btn card_btn">View All Posts</a>
            </div>

        </div>
    </div>
</section>


<?php
get_footer();
?>

<script>
  /*var swiper = new Swiper(".swiper-container", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 3,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  }); */
  var sliderSelector = '.swiper-container',
    options = {
      init: false,
      loop: true,
      speed:800,
      slidesPerView: "auto", // or 'auto'
      // spaceBetween: 10,
      centeredSlides : true,
      effect: 'coverflow', // 'cube', 'fade', 'coverflow',
      coverflowEffect: {
        rotate: 50, // Slide rotate in degrees
        stretch: 0, // Stretch space between slides (in px)
        depth: 100, // Depth offset in px (slides translate in Z axis)
        modifier: 1, // Effect multipler
        slideShadows : true, // Enables slides shadows
      },
      pagination: {
          el: ".swiper-pagination",
      },
      // Events
      on: {
        imagesReady: function(){
          this.el.classList.remove('loading');
        }
      }
    };
    var mySwiper = new Swiper(sliderSelector, options);
    
    // Initialize slider
    mySwiper.init();
</script>