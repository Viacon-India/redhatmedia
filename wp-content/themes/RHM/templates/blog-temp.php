<?php
/*
 * Template Name:Blog Template
 */
get_header();
global $redhatm;
?>

<?php
$_home_who_heading = get_post_meta(get_the_ID(), '_home_who_heading', true);
$_home_who_short_desc = get_post_meta(get_the_ID(), '_home_who_short_desc', true);

$_home_program_details_page_dropdown = get_post_meta(get_the_ID(), '_home_program_details_page_dropdown', true);

?>
<!-- <div class="banner">
  <div class="container">
    <div class="col-md-12">
      <h1>Exclusive Digital Marketing Advice for Enterprenuers</h1>
      <p>
        Enter your email below to get access to my proven digital marketing tips and strategies
      </p>
      <ul>
        <li>
          	<?php echo do_shortcode('[convertkit form=1096431]'); ?>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="logo-ban">

    <?php global $post;
    $seen_arr = get_posts(array('post_type' => 'seen_on', 'posts_per_page' => -1, 'order' => 'DESC'));
    foreach ($seen_arr as $posts) : setup_postdata($posts); ?>

      <a href="#"> <?php echo get_the_post_thumbnail($posts->ID, 'home-page-testimonial'); ?> </a>

    <?php endforeach;
    wp_reset_postdata(); ?>

    </div>
  </div>
</div> -->
<div class="banner">
    <div class="container">
        <div class="banner-content">
            <h1>Exclusive Digital Marketing Advice for Enterprenuers</h1>
            <p>
                Enter your email below to get access to my proven digital marketing tips and strategies
            </p>

            <ul>
                <li>
                    <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
                </li>
            </ul>

        </div>
        <!-- </div>

      <div class="container"> -->
        <div class="logo-ban">

            <?php global $post;
            $seen_arr = get_posts(array('post_type' => 'seen_on', 'posts_per_page' => -1, 'order' => 'DESC'));
            foreach ($seen_arr as $posts) : setup_postdata($posts); ?>

                <a href="#"> <?php echo get_the_post_thumbnail($posts->ID, 'home-page-testimonial'); ?> </a>

            <?php endforeach;
            wp_reset_postdata(); ?>

        </div>
    </div>
</div>

<section class="blog-sec">
    <div class="container">
        <div class="card-bg">
            <ul class="cards">

                <?php
                $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                $args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 6, 'paged' => $paged, 'order' => 'DESC');
                $the_query = new WP_Query($args); ?>


                <?php if ($the_query->have_posts()) :
                    $i = 1;
                    while ($the_query->have_posts()) : $the_query->the_post();

                        get_template_part('template-parts/content', 'loop');

                        $i++;
                    endwhile;
                endif; ?>

            </ul>

            <div class="blog-pagi">
                <div class="nav-links">
                    <?php
                    echo paginate_links(array(
                        'format'  => 'page/%#%',
                        'current' => $paged,
                        'total'   => $the_query->max_num_pages,
                        'mid_size'        => 2,
                        'prev_text'       => __('&laquo; Previous'),
                        'next_text'       => __('Next &raquo;')
                    )); ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
get_footer();
?>