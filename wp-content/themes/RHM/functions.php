<?php
if (!session_id()) {
    session_start();
}

if (!defined('BLOG_DIR')) define('BLOG_DIR', get_template_directory());
if (!defined('BLOG_URI')) define('BLOG_URI', get_template_directory_uri());

if (file_exists(BLOG_DIR . '/includes/config.php')) {
    require_once(BLOG_DIR . '/includes/config.php');
}
if (file_exists(BLOG_DIR . '/includes/post-type.php')) {
    require_once(BLOG_DIR . '/includes/post-type.php');
}
if (file_exists(BLOG_DIR . '/instruction.php')) {
    require_once(BLOG_DIR . '/instruction.php');
}

add_action('after_setup_theme', 'dbm_setup');
if (!function_exists('dbm_setup')) {
    function dbm_setup()
    {
        load_theme_textdomain('blog');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');


        add_image_size('home-page-testimonial', 250, 250, true);
        add_image_size('blog-thumbnail', 550, 300, true);
        add_image_size('single-poost-thumbnail', 960, 550, true);
        add_image_size('sidebar-thumbnail', 50, 50, true);

        $GLOBALS['content_width'] = 900;

        register_nav_menus(array(
            'top'    => __('Primary Menu', 'blog'),
            'secondary_menu' => __('Useful Links', 'blog'),
            //'niche_menu' => __('Niche Menu', 'blog'),
            'cat_links' => __( 'Category Links', 'blog' ),
        ));
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
        ));
        //disable admin bar for all user other than administrator
        if (!current_user_can('administrator') && !is_admin()) {
            show_admin_bar(false);
        }
    }
}

add_action('wp_enqueue_scripts', 'dbm_front_scripts');
if (!function_exists('dbm_front_scripts')) {
    function dbm_front_scripts()
    {
        global $redhatm;

        wp_enqueue_style('default-style', BLOG_URI . '/style.css', array(), false, 'all');
        wp_enqueue_style('theme-style', BLOG_URI. '/css/theme.css',array(), false,'all');
        wp_enqueue_style('custom-style', BLOG_URI. '/css/custom-css.css',array(), false,'all');
        
        wp_enqueue_style('slick', '//cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css',array(), false,'all');
		wp_enqueue_style('font-awsome-css', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',array(), false,'all');
        wp_enqueue_style('slick-theme', '//cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css',array(), false,'all');
        wp_enqueue_style('bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css',array(), false,'all');

        wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css',array(), false,'all');

        // wp_enqueue_style('second-style', BLOG_URI. '/css/style.css',array(), false,'all');
        // if(is_single() || is_category() || is_author() || is_search()) {
        // 	wp_enqueue_style('single-style', BLOG_URI. '/css/single-page.css',array(), false,'all');
        // }
        
        // wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
        // wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css', false, "5.11.2");


        wp_enqueue_style('roboto-font-2', 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&display=swap', array(), false, 'all');
        wp_enqueue_style('nunito', 'https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700&display=swap', array(), false, 'all');

        wp_enqueue_script('jquery');
        wp_enqueue_script('slim-js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array('jquery'), false, true);
        wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), false, true);
        wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), false, true);

        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js', array('jquery'), false, true);
        
        wp_enqueue_script('swiper-js', "https://unpkg.com/swiper/swiper-bundle.min.js", array('jquery'), false, true);

        wp_enqueue_script('script-js', BLOG_URI . '/js/script.js', array('jquery'), false, true);

        /* wp_localize_script('custom-js', 'imObj', array(
                        'ajaxurl' =>admin_url('admin-ajax.php'),
                )); */
    }
}

add_action('widgets_init', 'redhatm_widgets_init');
if (!function_exists('redhatm_widgets_init')) {
    function redhatm_widgets_init()
    {
        register_sidebar(array(
            'name'          => __('General Sidebar', 'blog'),
            'id'            => 'general_sidebar',
            'description'   => __('Add widgets here to appear in your sidebar.', 'blog'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => __('Single Page Sidebar', 'blog'),
            'id'            => 'single_sidebar',
            'description'   => __('Add widgets here to appear in your sidebar.', 'blog'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}

add_filter('cmb2_sanitize_text', 'cmb2_sanitize_text_callback', 10, 2);
function cmb2_sanitize_text_callback($override_value, $value) {
    return $value;
}

/*************************************/

function switch_stylesheet_src($src, $handle) {

    $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'switch_stylesheet_src', 10, 2);

/****************************************/


function alter_comment_form_fields($fields) {
    $fields['author'] = '<div class="row"><div class="col-md-6"><p class="comment-form-author">' . '<!--<label for="author">' . __('Name *') . '</label>--> ' . ($req ? '<span class="required">*</span>' : '') .
        '<input id="author" name="author" type="text" placeholder="Enter your name" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p></div>';
    $fields['email'] = '<div class="col-md-6"><p class="comment-form-email"><!--<label for="email">' . __('Email *') . '</label>--> ' . ($req ? '<span class="required">*</span>' : '') .
        '<input id="email" name="email" type="text" placeholder="Enter your email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p></div>
					</div>';

    return $fields;
}
add_filter('comment_form_default_fields', 'alter_comment_form_fields');
function wp34731_move_comment_field_to_bottom($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = '<p class="comment-form-comment">
		<textarea id="comment" name="comment" cols="60" rows="6" placeholder="write your comment here..." aria-required="true"></textarea>
	</p>';
    return $fields;
}
add_filter('comment_form_fields', 'wp34731_move_comment_field_to_bottom');


/**************** VIEW ******************/

function subh_get_post_view($postID) {
    $count_key = 'post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 View';
    }
    return $count . ' Views';
}
function subh_set_post_view($postID) {
    $count_key = 'post_views_count';
    $count     = (int) get_post_meta($postID, $count_key, true);
    if ($count < 1) {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    } else {
        $count++;
        update_post_meta($postID, $count_key, (string) $count);
    }
}
function subh_posts_column_views($defaults) {
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function subh_posts_custom_column_views($column_name, $id) {
    if ($column_name === 'post_views') {
        echo subh_get_post_view(get_the_ID());
    }
}
add_filter('manage_posts_columns', 'subh_posts_column_views');
add_action('manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2);

//add_shortcode('recent_posts', 'recent_posts_func');
if (!function_exists('recent_posts_func')) {
    function recent_posts_func()
    { ?>
    <div class="sidebar-recent-posts">
        <h2>Recent Posts</h2>
        <ul>
            <?php global $post;
                    $top_stories = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC'));
                    foreach ($top_stories as $post) : setup_postdata($post); ?>
                <?php $featured_image = get_the_post_thumbnail_url(); ?>
                <li>
                    <?php if (empty($featured_image)) {
                                    $featured_image = get_template_directory_uri() . '/images/default-image.jpg'; ?>
                        <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" />
                    <?php } else { ?>
                        <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" />
                    <?php } ?>

                    <div class="">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <?php $title = strip_tags(get_the_title());
                                        echo substr($title, 0, 40); ?>...
                        </a>
                    </div>
                </li>
            <?php endforeach;
                    wp_reset_postdata(); ?>
        </ul>
    </div>
<?php }
}

function custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="' . get_permalink($post->ID) . '"> ...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');



/******************* Single page subscription form *****************/
//add_shortcode('subscription_form', 'subscription_form_func');
if (!function_exists('subscription_form_func')) {
    function subscription_form_func() { ?>

    <div class="subscription-popup" data-toggle="modal" data-target="#mySubscribeModal">Subscribe from here.</div>
    <div class="modal fade" id="mySubscribeModal" role="dialog" style="margin-top: 145px;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <img src="https://cdn0.iconfinder.com/data/icons/comics-style-vol-2/128/email-512.png" style="width: 168px;
float: left;">
                    <div class="new-sbscription-form" style="float:right;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p>Subsribe from here.</p>
                        <hr>
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>

                        <!-- <div class="clearfix"><button type="submit" class="signupbtn">Subscribe</button></div> -->
                        <?php echo do_shortcode('[convertkit form=1100865]'); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
<?php }
} 


add_action ('wp_head','hook_inHeader');
function hook_inHeader() {
    ?>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7L9ML7HSDR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'G-7L9ML7HSDR');
    </script>
    
    <?php
}

function my_custom_post_type_add_func() {

  $post_type = array(
    array( 'name' => 'Brand', 'slug' => 'brand'),
  );

  foreach($post_type as $posttype) {      

    $labels = array(
        'name'               => _x( $posttype['name'] , $posttype['name'] ),
        'singular_name'      => _x( $posttype['name'] , $posttype['name'] ),
        'add_new'            => _x( 'Add New', $posttype['slug'] ),
        'add_new_item'       => __( 'Add New '.$posttype['name'] ),
        'edit_item'          => __( 'Edit '.$posttype['name'] ),
        'new_item'           => __( 'New '.$posttype['name'] ),
        'all_items'          => __( 'All '.$posttype['name'] ),
        'view_item'          => __( 'View '.$posttype['name'] ),
        'search_items'       => __( 'Search '.$posttype['name'] ),
        'not_found'          => __( 'No '.$posttype['name'].' found' ),
        'not_found_in_trash' => __( 'No '.$posttype['name'].' found in the Trash' ),
        'menu_name'          => $posttype['name']
    );
    
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'   => false,
        'rewrite' => array(
            'with_front' => false
        )
    );

    register_post_type( $posttype['slug'], $args );

  }

}
add_action( 'init', 'my_custom_post_type_add_func' );


add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
function create_subjects_hierarchical_taxonomy() { 
 
  $labels = array(
    'name' => _x( 'Niches', 'taxonomy general name' ),
    'singular_name' => _x( 'Niche', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Niches' ),
    'all_items' => __( 'All Niches' ),
    'parent_item' => __( 'Parent Niche' ),
    'parent_item_colon' => __( 'Parent Niche:' ),
    'edit_item' => __( 'Edit Niche' ), 
    'update_item' => __( 'Update Niche' ),
    'add_new_item' => __( 'Add New Niche' ),
    'new_item_name' => __( 'New Niche Name' ),
    'menu_name' => __( 'Niches' ),
  );    

  register_taxonomy('niches',array('brand'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'niche' ),
  ));
 
}

if (!function_exists('get_custom_content')) {
    function get_custom_content($ontent, $count) {

        $total_ltr_count = strlen($ontent);
        $newcont = substr($ontent,0,$count);

        if($total_ltr_count > $count) {
            echo $newcont. '...';
        } else {
            echo $newcont;
        }

    }
}

?>