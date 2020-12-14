<?php
/*
 * Template Name:Newsletter
 */
get_header();
global $redhatm;
?>

<!-- <div class="banner">
    <div class="container">
        <div class="banner-content">
            <h1 class="page-title">My Companies</h1>
            <p class="page-intro">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nostrum officiis voluptatibus laboriosam, dignissimos repellat minus quasi. Eveniet, officiis! Accusamus neque laudantium facere. Adipisci eum cupiditate repellat asperiores, doloribus excepturi.</p>
        </div>
    </div>
</div> -->
<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="title">Exclusive Digital Marketing Advice for Enterprenuers</h1>
                <p class="sec-detail">
                    Enter your email below to get access to my proven digital marketing tips and strategies.
                </p>
                <?php echo do_shortcode('[convertkit form=1096431]'); ?>
            </div>
            <div class="col-md-5">
                <img class="img-fluid" src="https://mashummollah.com/wp-content/uploads/2019/11/newsletter-image.png" alt="Newsletter graphic">
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
