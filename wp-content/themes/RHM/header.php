<?php
global $redhatm;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<script src="https://cdn-in.pagesense.io/js/mashummollah/8a20bf66d8a94d9ea86dd3cc0224fac3.js"></script>
    <meta name="p:domain_verify" content="0592bbee40cf3a30b4b8431e67216209"/>
    <!-- <meta name="title" content="Blog" />
      <meta name="description" content="Page description. No longer than 155 characters." /> -->

    <!-- Twitter Card data -->
    <!-- <meta name="twitter:card" value="summary" /> -->

    <!-- Open Graph data -->
    <!-- <meta property="og:title" content="Blog title" />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="http://www.example.com/" />
      <meta property="og:image" content="http://localhost/blog_new/wp-content/uploads/2019/09/logo_png_transparent_814286.png" />
      <meta property="og:description" content="Description Here" />

    <title><?php //echo get_bloginfo( 'name' ); 
            ?></title> -->

    <?php if (!empty($redhatm['favicon']['url'])) { ?>
        <link rel="icon" href="<?php echo $redhatm['favicon']['url']; ?>" />
    <?php } /* ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" />
    <?php if(is_single()) { ?>
        <link href="<?php echo get_template_directory_uri(); ?>/css/single-page.css" rel="stylesheet" />
    <?php } */ ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- <link href="https://redcollar.digital/resources/css/styles.css" rel="stylesheet" /> -->

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.png" />
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.png" />
    <meta name="twitter:site" content="@mashum_mollah" />
    
    <?php
    // including scss compiler
    // https://scssphp.github.io/scssphp/docs/

    require_once 'libs/scssphp-1.0.4/scss.inc.php';

    use ScssPhp\ScssPhp\Compiler;

    function getCSS($files)
    {
        try {
            $scss = new Compiler();
            // $scss->setImportPaths('css/');

            $scssContent = "";

            foreach ($files as $file) {
                $scssContent .= file_get_contents($file);
            }

            // echo "<style clas='log'>/*".$scssContent."*/</style>";

            $css = $scss->compile($scssContent);
            echo "<style class='from-scss'>" . $css . "</style>";
        } catch (\Exception $e) {
            echo '';
            syslog(LOG_ERR, 'scssphp: Unable to compile content');
            // echo "/*".LOG_ERR.'scssphp: Unable to compile content'."*/";
        }
    }
    ?>
    
    <?php wp_head(); ?>

    <?php
    getCSS([
        get_stylesheet_directory_uri() . '/css/common.scss',
        get_stylesheet_directory_uri() . '/css/single-page.scss',
        get_stylesheet_directory_uri() . '/css/style.scss'
        ]);
        // echo "<end-scss/>";
    ?>

    <script src="https://clientcdn.pushengage.com/core/1d752d586d808504c2c7fdff06c8fd15.js"></script>
    <script>
        _pe.subscribe();
    </script>
</head>

<body <?php body_class(); ?>>

    <a id="goto-top-button">➤</a>


    <?php //wp_nav_menu(array('theme_location' => 'top', 'container' => 'ul', 'menu_class' => 'navbar-nav')); ?>

    

                    

    <?php $slug = get_queried_object()->post_name; ?>

    <header class="light">
        <div class="top-header">    
            <a href="<?php echo home_url(); ?>" class="logo inner-link link-active" data-animation="simple"></a>
            <div class="page-names">
                    <div class="page-name item <?php if($slug == 'brand') { echo 'active'; } ?>" data-id="projects">brand</div>
                    <div class="page-name item <?php if($slug == 'home') { echo 'active'; } ?>" data-id="contacts">home</div>
                    <div class="page-name item <?php if($slug == 'about-us') { echo 'active'; } ?>" data-id="about">about</div>                
                    <div class="page-name item <?php if($slug == 'contact-us') { echo 'active'; } ?>" data-id="contacts">contact</div>
                <a href="<?php echo home_url(); ?>/brand/" class="page-name close-name item inner-link link-active" data-id="close" data-animation="close">All Brand</a>
            </div>
            <div class="menu-btn" id="menu-btn">
                <div class="menu-circle-wrap">
                    <div class="wave"></div>
                    <svg class="menu-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="52" height="52" viewBox="0 0 52 52">
                        <path d="M1,26a25,25 0 1,0 50,0a25,25 0 1,0 -50,0"></path>
                    </svg>
                </div>
                <div class="bars">
                    <div class="bar b1"></div>
                    <div class="bar b2"></div>
                    <div class="bar b3"></div>
                </div>
            </div>
        </div>
    </header>



    <nav class="menu-container dark hide-decor" id="menu-container">
        <div class="bg">
            <div class="svg-text" data-default="menu" data-id="svg-text-i-1" style="height: 193px;">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="1349" height="193" viewBox="0 0 1349 193">
                <g><path d="M65 700h144l224 -335l213 335h140v-700h-155v420l-182 -279h-41l-188 282v-423h-155v700z" transform="scale(0.14846153846153845, -0.14846153846153845) translate(480.93264248704673, -1000)"></path><path d="M65 700h535v-145h-380v-130h355v-140h-355v-140h389v-145h-544v700z" transform="scale(0.14846153846153845, -0.14846153846153845) translate(3067.1757124352334, -1000)"></path><path d="M555 0l-339 415v-415h-151v700h119l340 -416v416h151v-700h-120z" transform="scale(0.14846153846153845, -0.14846153846153845) translate(5382.530440414508, -1000)"></path><path d="M665 300q0 -82 -25.5 -140.5t-67.5 -95.5t-95.5 -54t-108.5 -17q-63 0 -119.5 19.5t-99.5 59t-68.5 98t-25.5 136.5v394h155v-376q0 -41 10 -75.5t30 -59t49.5 -38t68.5 -13.5q76 0 109 49t33 133v380h155v-400z" transform="scale(0.14846153846153845, -0.14846153846153845) translate(7823.066580310882, -1000)"></path></g>
                </svg>
            </div>
            <div class="border" style="opacity: 0.2;">
                <div class="b-1" style="background-color: #2b353c;"></div>
                <div class="b-2" style="background-color: #2b353c;"></div>
                <div class="b-3" style="background-color: #2b353c;"></div>
                <div class="b-4" style="background-color: #2b353c;"></div>
            </div>
           
            <div class="imgs-bg">
                <div class="menu-img" data-id="l1" style="background-image:url('https://redcollar.digital/resources/images/menu/menu-1.jpg')"></div>
                <div class="menu-img active" data-id="l2" style="background-image:url('https://redcollar.digital/resources/images/menu/menu-2.jpg')"></div>
                <div class="menu-img" data-id="l3" style="background-image:url('https://redcollar.digital/resources/images/menu/menu-3.jpg')"></div>
            </div>
            <div class="imgs-fg">
                <div class="menu-img" data-id="l1" style="background-image:url('/https://redcollar.digital/esources/images/menu/menu-1.jpg')"></div>
                <div class="menu-img active" data-id="l2" style="background-image:url('https://redcollar.digital/resources/images/menu/menu-2.jpg')"></div>
                <div class="menu-img" data-id="l3" style="background-image:url('https://redcollar.digital/resources/images/menu/menu-3.jpg')"></div>
            </div>
        </div>

        <div class="wrapper">
            <div class="items">
                <nav class="menu-cell">
                    <a href="<?php echo home_url(); ?>/brand/" class="item menu-link inner-link <?php if($slug == 'home') { echo 'link-active'; } ?>" data-scroll="true" data-id="l1" data-animation="menu">
                      <span class="i-link">Home</span>
                    </a>
                    <a href="<?php echo home_url(); ?>/brand/" class="item menu-link inner-link <?php if($slug == 'brand') { echo 'link-active'; } ?>" data-scroll="true" data-id="l1" data-animation="menu">
                      <span class="i-link">Brand</span>
                    </a>
                    <a href="<?php echo home_url(); ?>/about-us/" class="item menu-link inner-link <?php if($slug == 'about-us') { echo 'link-active'; } ?>" data-scroll="false" data-id="l2" data-animation="menu">
                      <span class="i-link">About</span>
                    </a>
                    <a href="<?php echo home_url(); ?>/contact-us/" class="item menu-link inner-link <?php if($slug == 'contact-us') { echo 'link-active'; } ?>" data-scroll="false" data-id="l3" data-animation="menu">
                      <span class="i-link">Contact</span>
                    </a>
                </nav>
            </div>
        </div>

        <div class="social">            
        
            <?php if (!empty($redhatm['facebook_url'])) { ?>
                <a href="<?php echo esc_url($redhatm['facebook_url']); ?>" class="item ln wave-container" target="_blank" rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i>
                    <span class="wave"></span>
                </a>                
            <?php }
            if (!empty($redhatm['twitter_url'])) { ?>
                <a href="<?php echo esc_url($redhatm['twitter_url']); ?>" class="item ln wave-container" target="_blank" rel="nofollow"><i class="fa fa-twitter" aria-hidden="true"></i>
                    <span class="wave"></span>
                </a>
            <?php }
            if (!empty($redhatm['linkedin_url'])) { ?>
                <a href="<?php echo esc_url($redhatm['linkedin_url']); ?>"  class="item ln wave-container" target="_blank" rel="nofollow"><i class="fa fa-linkedin" aria-hidden="true"></i>
                    <span class="wave"></span>
                </a>
            <?php }
            if (!empty($redhatm['instagram_url'])) { ?>          
                <a href="<?php echo esc_url($redhatm['instagram_url']); ?>"  class="item ln wave-container" target="_blank" rel="nofollow"><i class="fa fa-instagram" aria-hidden="true"></i>
                    <span class="wave"></span>
                </a>
            <?php } ?>
            
        </div>
    </nav>


<style>

.menu-container .svg-text {
    z-index: 6;
    -webkit-transition: opacity 0.6s;
    -o-transition: opacity 0.6s;
    transition: opacity 0.6s;
}


.svg-text {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    color: #ffffff;
    width: 100%;
    margin: auto;
    z-index: 2;
    font-family: 'Stem Web', sans-serif;
    font-weight: 700;
    font-size: 36px;
    height: 200px;
    text-transform: uppercase;
        opacity: 0.15;
}
.dark {
    color: #fcfcfc;
}
   
.menu-container .social {
    position: absolute;
    left: 4.3%;
    bottom: 19px;
    margin-left: -7px;
    z-index: 10;
    display: none;
}
.dark a:not(.logo):not(.menu-link) {
    color: #e9e9e9;
    transition: color 0.3s;
}
.social .item {
    position: relative;
    display: inline-block;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 2px solid transparent;
    margin: 0 7px;
    margin-top: 3px;
    margin-bottom: 3px;
}
.social .item.wave-container .wave {
    box-shadow: 0px 0px 0px 0px #5f6a72;
}
.wave-container .wave {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0px;
    top: 0px;
    border-radius: 50%;
    -ms-transform: scale(1);
    transform: scale(1);
    box-shadow: 0px 0px 0px 0px #5f6a72;
}
.menu-container nav .item.link-active span {
    color: #ee394e;
}
.menu-container nav .item span {
    transition: all 0.2s;
}
.touch-undetected .menu-container nav a:hover {
    color: #ffffff;
}
.menu-container nav .item {
    position: relative;
    display: block;
    width: 215px;
    font-weight: 700;
    font-family: 'Poppins';
    font-size: 42px;
    color: #ffffff;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    padding-top: 15px;
    margin-top: 0px;
}
.menu-container .menu-cell {
    display: table-cell;
    vertical-align: middle;
}
.menu-container .items {
    position: absolute;
    display: table;
    top: 0;
    bottom: 0;
    height: 90%;
    left: 8%;
}
.menu-container .wrapper {
    position: relative;
    height: 100%;
    z-index: 7;
    display: grid;
    place-content: center;
    background: #cccccc14;
    margin-top: 20vh;
    margin-bottom: 20vh;
}

.wrapper {
    position: relative;
    width: 85%;
    margin: 0 auto;
    /* outline: 1px solid rgba(0, 0, 0, 0.2); */
}
        
.menu-container.active {
    width: 100%;
    opacity: 1;
    -webkit-transition: 0.2s opacity, 0s width linear 0s;
    -o-transition: 0.2s opacity, 0s width linear 0s;
    transition: 0.2s opacity, 0s width linear 0s;
}
.dark {
    color: #fcfcfc;
}
.menu-container {
    position: fixed;
    width: 0;
    height: 100%;
    left: 0;
    top: 0;
    opacity: 0;
    z-index: 80;
    background: #1b2126;
    overflow: hidden;
    -webkit-transition: 0.2s opacity, 0s width linear 0.2s;
    -o-transition: 0.2s opacity, 0s width linear 0.2s;
    transition: 0.2s opacity, 0s width linear 0.2s;
}

        

.page-wrapper {
    position: relative;
    overflow: hidden;
/*  height: 100%;*/
    min-width: 320px;
}
.csstransitions .page-wrapper {
    opacity: 0;
    -webkit-transition: opacity 0.6s;
    transition: opacity 0.6s;
}
.csstransitions .page-wrapper.load-complete-once {
    opacity: 1;
}
.wrapper {
    position: relative;
    width: 85%;
    margin: 0 auto;
/*  outline: 1px solid rgba(0, 0, 0, 0.2);*/
}
@media screen and (min-width: 1000px) {
    .wrapper {
        width: 76%;
    }
}

.bg-fallback {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 0;
    display: none;
}
.bg-fallback div {
    height: 100%;
    width: 100%;
    background-size: 100% auto;
    background-size: cover;
    background-position: center;
}

.touch-detected .bg-fallback {
    display: block;
}

.sidebar {
    right: 7.6%;
    margin-right: 106px;
    top: 0;
    position: fixed;
    height: 100%;
    width: 0px;
    z-index: 40;
}
.sidenav {
    display: none;
    position: absolute;
    width: 0;
/*  overflow: hidden;*/
    height: 100%;
    right: 0;
    top: 0;
    opacity: 0;
    -webkit-transition: opacity 0.3s, width 0s linear 0.3s;
    transition: opacity 0.3s, width 0s linear 0.3s;
    pointer-events: none;
}
.sidenav.visible {
    opacity: 1;
    -webkit-transition: opacity 0.3s ease 0.4s, width 0s linear 0s;
    transition: opacity 0.3s ease 0.4s, width 0s linear 0s;
    width: 72px;
    pointer-events: auto;
}
@media screen and (min-width: 1000px) {
    .sidenav {
        display: block;
    }
}
.sidenav .sidenav-inner {
    position: absolute;
    top: 29%;
    bottom: 200px;
    width: 72px;
}
.sidenav .sidenav-tp {
    position: absolute;
    width: 1px;
    top: 100px;
    bottom: 71%;
    left: 0;
    right: 0;
    margin: auto;
    background: #ee394e;
}
.sidenav .sidenav-bt {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 170px;
}
.sidenav .item {
    position: relative;
    height: 20%;
    cursor: pointer;
}
.sidenav .item .name {
    position: absolute;
    width: 200%;
    top: 50%;
    margin-top: -8px;
    left: -50%;
    font-family: 'Stem Web', sans-serif;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    text-align: center;
    z-index: 1;
    opacity: 0;
    transition: all 0.3s;
    cursor: pointer;
/*  -ms-transform: scale(0.9);
    transform: scale(0.9);*/
}
.sidenav .item:not(.active):hover .name {
    transition: all 0.3s ease 0.2s;
    opacity: 1;
    -ms-transform: scale(1);
    transform: scale(1);
}
.sidenav .item.active {
    cursor: default;
}
.sidenav .item:after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    width: 15px;
    height: 1px;
    margin: auto;
    background: #30373c;
    opacity: 0.3;
    -webkit-transition: all 0.3s cubic-bezier(.21,.51,.51,1);
    transition: all 0.3s cubic-bezier(.21,.51,.51,1);
}
.sidenav .item:not(.active):hover:after {
    opacity: 0 !important;
}
.touch-undetected .sidenav .item:not(.active):hover:after {
    width: 72px;
}
.sidenav .item.active:after {
    width: 72px;
    background: #ee394e;
    opacity: 1;
}
.sidenav .item.viewed:after {
    background: #ee394e;
    opacity: 1;
}
.sidenav .item.viewed .name {
    color: #ee394e;
}
</style>

