<?php
ob_start();
if(!defined('RHM_DIR')) define('RHM_DIR',get_template_directory());
if(!defined('RHM_URI')) define('RHM_URI',get_template_directory_uri());

add_action( 'after_setup_theme', 'RHM_custom_theme_setup' );
if(!function_exists('RHM_custom_theme_setup')) {

	function RHM_custom_theme_setup() {

		load_theme_textdomain( 'redhatmedia' );
		add_theme_support( 'automatic-feed-links' );		
		add_theme_support( 'title-tag' );		
		add_theme_support( 'custom-logo');		
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 1200, 9999 );

		add_image_size('single-blog-thumbnail', 1440, 522, true );

		add_image_size('blog-sidebar-thumbnail', 80, 80, true );
		add_image_size('blog-card-thumbnail', 560, 390, true);
		add_image_size('news-card-thumbnail', 362, 178, true);
		add_image_size('archive-card-thumbnail', 400, 320, true);
		add_image_size('single-news-thumbnail', 825, 396, true);
		
		
		$GLOBALS['content_width'] = 900;
		
		register_nav_menus( array(
			'top'    => __( 'Primary Menu', 'redhatmedia' ),
			'footer_links' => __( 'Footer Menu', 'redhatmedia' ),
		) );
		
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
		) );

		//add_theme_support( 'post-thumbnails' );
		//set_post_thumbnail_size( 1200, 9999 );	
		
		

		if (!current_user_can('administrator') && !is_admin()) {
		  show_admin_bar(false);
		}

	}
}

if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

if ( file_exists( RHM_DIR.'/theme-setup.php') ) {
	require_once(RHM_DIR.'/theme-setup.php');
}
if ( file_exists( RHM_DIR.'/includes/shortcodes.php') ) {
	require_once(RHM_DIR.'/includes/shortcodes.php');
}

add_action( 'wp_enqueue_scripts', 'RWB_front_scripts' );
if(!function_exists('RWB_front_scripts')) {
	function RWB_front_scripts(){
		global $RWB;
		$version = '5.0.0';
		
		wp_enqueue_style( 'default-css', RHM_URI.'/style.css', array(), $version,'all');
		wp_enqueue_style( 'custom-css', RHM_URI.'/assets/styles/styles.css', array(), $version,'all');
		wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), $version,'all');

		wp_enqueue_script('script-js', RHM_URI.'/assets/scripts/script.js',$version, false, true );
		wp_enqueue_script('slim-js', 'https://code.jquery.com/jquery-3.5.1.slim.min.js',$version, false, true );
		wp_enqueue_script('bootstrap-bundle-js', RHM_URI.'/assets/scripts/bootstrap.bundle.min.js',$version, false, true );
		wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js',$version, false, true );
    }
}

/************************ Widget area ***********************/
add_action( 'widgets_init', 'RHM_widgets_init' );
if(!function_exists('RHM_widgets_init'))
{
	function RHM_widgets_init(){
		register_sidebar( array(
			'name'          => __( 'General Sidebar', 'RWB' ),
			'id'            => 'general_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'RWB' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );		
	}
}
/************************************/


add_filter('wpseo_robots', 'yoast_no_home_noindex', 999);
function yoast_no_home_noindex($string= "") {
	$uri = $_SERVER['REQUEST_URI'];
    if (strpos($uri, '/page/') !== false || strpos($uri, '/search/') !== false) {
        $string= "noindex,nofollow";
    }
    return $string;
}

/************************************* VIEWS *************************************/

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
 
// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


/************************** Search *********************/
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('post'));
    }    
    return $query;
}
add_filter('pre_get_posts','searchfilter');
?>