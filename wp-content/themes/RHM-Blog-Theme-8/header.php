<!DOCTYPE html>
<html lang="en">

    <?php global $uri;
    $uri = $_SERVER['REQUEST_URI'];
    $new_url = explode("/", $uri);
    if (strpos($uri, '/search/') !== false) {
        if (!empty($new_url[3]) && !empty($new_url[4])) {
            $searchurl = home_url() . '/' . $new_url[3] . '/' . $new_url[4] . '/?s=' . $new_url[2];
        } else {
            $searchurl = home_url() . '/?s=' . $new_url[2];
        } ?>
        <script>
            window.location.href = "<?php echo $searchurl ?>";
        </script>
    <?php
    } ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">


  <link rel="icon" href="<?php echo abn_option('abn_favicon'); ?>" type="image/gif" sizes="16x16">

  <?php wp_head(); ?>
  <meta property="og:image" content="<?php echo abn_option('abn_favicon'); ?>" />
</head>

<body <?php body_class(); ?>>

  <nav class="nav-bar-custom navbar navbar-expand-lg navbar-dark text-white">
    <div class="container">
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <img class="logo" src="<?php echo abn_option('abn_logo'); ?>" width="150px " alt="RerHad Media">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <?php wp_nav_menu(array(
            'theme_location' => 'top',
            'container' => 'ul',
            'menu_class' => 'navbar-nav m-auto'
        )); ?>
        <!-- end nav menu link  -->
        <ul class="social navbar-nav ml-md-auto">
          <li class="nav-item">
            <a class="nav-link p-2" href="<?php echo abn_option('abn_fb_link'); ?>" target="_blank" rel="noopener" aria-label="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-2" href="<?php echo abn_option('abn_ig_link'); ?>" target="_blank" rel="noopener" aria-label="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-2" href="<?php echo abn_option('abn_tweet_link'); ?>" target="_blank" rel="noopener" aria-label="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-2" href="<?php echo abn_option('abn_pinterest_link'); ?>" target="_blank" rel="noopener" aria-label="">
              <i class="fa fa-pinterest" aria-hidden="true"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-2" href="<?php echo abn_option('abn_linkedin_link'); ?>" target="_blank" rel="noopener" aria-label="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
        <!--End nav social link  -->


      </div>

    </div>
  </nav>

  <!--  end nav bar -->

  