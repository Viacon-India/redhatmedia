<?php
/*Template Name: News Temp */
get_header();
$current_page_ID = get_the_ID();
$posts_per_page = 9;

$google_cat_ID = 11;
$digital_cat_ID = 10;
$social_cat_ID = 12;



$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$blog_array = array(
  'post_type' => 'news',
  'post_status' => 'publish',
  'posts_per_page' => $posts_per_page,
  'paged' => $paged,
  'order'     => 'DESC',
  'orderby'   => 'date',
);
$blog_query = new WP_Query($blog_array);

$myvals = get_post_meta($current_page_ID);
foreach ($myvals as $key => $val) {
  ${$key} = unserialize($val[0]) ? unserialize($val[0]) : $val[0];
}

$popular_args = array(
  'post_type' => 'news',
  'post_status' => 'publish',
  'posts_per_page' => 8,
  'order'     => 'DESC',
  'meta_key' => 'post_views_count',
  'orderby'   => 'meta_value_num'
);
$popular_query = get_posts($popular_args);


$google_arr = get_posts(
  array(
    'posts_per_page' => 4, 'post_type' => 'news',
    'tax_query' => array(
      array(
        'taxonomy' => 'news-cat',
        'field' => 'term_id',
        'terms' => $google_cat_ID
      )
    )
  )
);
$digital_arr = get_posts(
  array(
    'posts_per_page' => 4, 'post_type' => 'news',
    'tax_query' => array(
      array(
        'taxonomy' => 'news-cat',
        'field' => 'term_id',
        'terms' => $digital_cat_ID
      )
    )
  )
);
$social_arr = get_posts(
  array(
    'posts_per_page' => 4, 'post_type' => 'news',
    'tax_query' => array(
      array(
        'taxonomy' => 'news-cat',
        'field' => 'term_id',
        'terms' => $social_cat_ID
      )
    )
  )
);

$categories = get_terms('news-cat', array(
  'hide_empty' => false,
));
?>


<?php if (!empty($rhm_banner_img)) { ?>
  <!-- start banner/Header -->
  <header class="header">
    <img src="<?php echo $rhm_banner_img; ?>" alt="service-banner">
    <div class="container">
      <div row="row">
        <div class="col-md-8">
          <div class="header-title-warper">
            <h1 class="title">
              <?php if (!empty($rhm_banner_heading)) {
                echo $rhm_banner_heading;
              } ?>
            </h1>
          </div>
          <div class="header-text-warper">
            <?php if (!empty($rhm_banner_content)) {
              echo $rhm_banner_content;
            } ?>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php } ?>



<main class="news-temp">
  <section class="news-header">


    <?php if (!empty($popular_query)) { ?>
      <section class="slider-sec">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <a class="barking">
                breaking
              </a>
            </div>
            <div class="col">
              <div class="swiper-custom-container">
                <div class="swiper-container">
                  <div class="swiper-wrapper">

                    <?php foreach ($popular_query as $post) { ?>
                      <div class="swiper-slide">
                        <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
                        <a href="<?php echo get_the_permalink($post->ID); ?>">
                          <?php echo $post->post_title; ?>
                        </a>
                      </div>
                    <?php } ?>

                  </div>
                  <!-- Add Pagination -->
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>

            </div>
          </div>
        </div>
      </section>
    <?php } ?>

    <section class="news-title-sec">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="category-swiper-container">
              <div class="news-title-c-warper swiper-wrapper">
                <div class="swiper-slide">
                  <a class="title-card " href="">
                    <h2 class="c-title">Digital marketing</h2>
                    <img class="c-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/services/a1.png" alt="">
                  </a>
                </div>
                <div class="swiper-slide">
                  <a class="title-card " href="">
                    <h2 class="c-title">Digital marketing</h2>
                    <img class="c-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/services/a1.png" alt="">
                  </a>
                </div>
                <div class="swiper-slide">
                  <a class="title-card " href="">
                    <h2 class="c-title">Digital marketing</h2>
                    <img class="c-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/services/a1.png" alt="">
                  </a>
                </div>
                <div class="swiper-slide">
                  <a class="title-card " href="">
                    <h2 class="c-title">Digital marketing</h2>
                    <img class="c-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/services/a1.png" alt="">
                  </a>
                </div>
                <div class="swiper-slide">
                  <a class="title-card " href="">
                    <h2 class="c-title">Digital marketing</h2>
                    <img class="c-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/services/a1.png" alt="">
                  </a>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <!-- test hare -->
        </div>
      </div>
    </section>


    <div class="container">

      <!---------------------------- News BLOG ------------------------------->
      <div class="row posts-section">


        <?php if (!empty($google_arr)) { ?>
          <section class="news-blog">
            <div class="link-wrapper mb-2 mb-md-0 ">
              <h2><a class="link dash"><span>Google</span></a></h2>
            </div>
            <div class="row">
              <?php foreach ($google_arr as $post) {
                get_template_part('template-parts/content', 'news-card1');
              } ?>
            </div>
          </section>
        <?php } ?>



        <?php if (!empty($digital_arr)) { ?>
          <section class="news-blog">
            <div class="link-wrapper mb-2 mb-md-0 ">
              <h2><a class="link dash"><span>Digital Marketing</span></a></h2>
            </div>
            <div class="row">
              <?php foreach ($digital_arr as $post) {
                get_template_part('template-parts/content', 'news-card1');
              } ?>
            </div>
          </section>
        <?php } ?>

        <?php if (!empty($social_arr)) { ?>
          <section class="news-blog">
            <div class="link-wrapper mb-2 mb-md-0 ">
              <h2><a class="link dash"><span>Social Media</span></a></h2>
            </div>
            <div class="row">
              <?php foreach ($social_arr as $post) {
                get_template_part('template-parts/content', 'news-card1');
              } ?>
            </div>
          </section>
        <?php } ?>

        <!---------------------------- Recent News ------------------------------->
        <section class="recent-news">
          <div class="link-wrapper mb-2 mb-md-0 ">
            <h2><a class="link dash"><span>Recent Posts</span></a></h2>
          </div>
          <div class="row">
            <?php if ($blog_query->have_posts()) :

              $rc = 1;
              while ($blog_query->have_posts()) : $blog_query->the_post();

                if ($rc <= $posts_per_page) {

                  get_template_part('template-parts/content', 'news-card1');
                }

                $rc++;
              endwhile; ?>

              <div class="main-section">
                <div class="container">
                  <div class="cat-pagi">
                    <div class="nav-links">
                      <?php
                      echo paginate_links(array(
                        'format'  => 'page/%#%',
                        'current' => $paged,
                        'total'   => $blog_query->max_num_pages,
                        'mid_size'        => 2,
                        'prev_text'       => __('<< Previous'),
                        'next_text'       => __('Next >>')
                      )); ?>
            <!---------------------------- News BLOG ------------------------------->      
            <div class="row posts-section">
              
                                  
              <?php if ( !empty($google_arr) ) { ?>
                <section class="news-blog">
                  <div class="link-wrapper pl-5 mb-2 mb ">
                    <h2><a class="link dash"><span>Google</span></a></h2>
                  </div>
                  <div class="row">
                    <?php foreach($google_arr as $post) {
                      get_template_part( 'template-parts/content', 'news-card1' );
                    } ?>
                  </div>
                </section>
              <?php } ?>                  
              

                                  
              <?php if ( !empty($digital_arr) ) { ?>
                <section class="news-blog">
                  <div class="link-wrapper pl-5 mb-2 mb ">
                    <h2><a class="link dash"><span>Digital Marketing</span></a></h2>
                  </div>
                  <div class="row">
                    <?php foreach($digital_arr as $post) {
                        get_template_part( 'template-parts/content', 'news-card1' );
                      } ?>
                  </div>
                </section>
              <?php } ?>              
                                  
              <?php if ( !empty($social_arr) ) { ?>
                <section class="news-blog">
                  <div class="link-wrapper pl-5 mb-2 mb ">
                      <h2><a class="link dash"><span>Social Media</span></a></h2>
                  </div>
                  <div class="row">
                    <?php foreach($social_arr as $post) {
                      get_template_part( 'template-parts/content', 'news-card1' );
                    } ?>
                  </div>
                </section>
              <?php } ?>

              <!---------------------------- Recent News -------------------------------> 
              <section class="recent-news">
                <div class="link-wrapper pl-5 mb-2 mb ">
                    <h2><a class="link dash"><span>Recent Posts</span></a></h2>
                </div>
                <div class="row">                    
                  <?php if ( $blog_query->have_posts() ) :  

                    $rc = 1;
                    while ( $blog_query->have_posts() ) : $blog_query->the_post();

                      if($rc <= $posts_per_page) {

                        get_template_part( 'template-parts/content', 'news-card1' );

                      }
                        
                    $rc++;
                    endwhile; ?>
                    
                    <div class="main-section">
                      <div class="container">
                          <div class="cat-pagi">
                              <div class="nav-links">
                                  <?php
                                  echo paginate_links( array(
                                      'format'  => 'page/%#%',
                                      'current' => $paged,
                                      'total'   => $blog_query->max_num_pages,
                                      'mid_size'        => 2,
                                      'prev_text'       => __('<< Previous'),
                                      'next_text'       => __('Next >>')
                                  ) ); ?>
                              </div>
                          </div>
                      </div>
>>>>>>> 45ef34512bd993e7e26ea6f6247e1f9da8c91729
                    </div>
                  </div>
                </div>
              </div>

            <?php else : ?>
              <div class="col-md-12 not-found-sec">
                <h1 class="page-title"><?php _e('Nothing Found', 'rhm'); ?></h1>
                <div><?php _e('Sorry, but nothing found.', 'rhm'); ?></div>
              </div>
            <?php endif; ?>
          </div>
        </section>

      </div>

    </div>
  </section>
</main>



<?php
get_footer(); ?>

<script>
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 4,
    direction: getDirection(),
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

    return direction;
  }
</script>
<script>
  var swiper = new Swiper('.category-swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
</script>