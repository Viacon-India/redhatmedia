<?php
/* Template Name: Contact Page */
get_header();

    $myvals = get_post_meta(get_the_ID());
    foreach($myvals as $key=>$val) {    
        ${$key} = unserialize($val[0]) ? unserialize($val[0]) : $val[0];
    } ?>

    <?php if(!empty($rhm_banner_img)) { ?>
    <!-- start banner/Header -->
    <header class="header">
        <img src="<?php echo $rhm_banner_img; ?>" alt="contact-banner">
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

    <main class="main">
        <section class="blog contact-page">
            <div class="container">
                <div class="row">        
                    <div class="col-md-12">
                        <?php while (have_posts() ) : the_post();
                            the_Content();
                        endwhile; ?>	        
                    </div>
                </div>
            </div>
        </section>
    </main>
    

<?php
get_footer();
?>