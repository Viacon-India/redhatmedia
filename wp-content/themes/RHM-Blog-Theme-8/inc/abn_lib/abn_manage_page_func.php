<?php

/* if ( file_exists( dirname( __FILE__ ) . '/abn_manage_review_page_func.php' ) ) {
	require_once dirname( __FILE__ ) . '/abn_manage_review_page_func.php';
} */
if ( file_exists( dirname( __FILE__ ) . '/abn_manage_front_page_func.php' ) ) {
	require_once dirname( __FILE__ ) . '/abn_manage_front_page_func.php';
}



/****************************** Banner ******************************/
add_action( 'cmb2_init', 'abn_common_banner_meta' );
function abn_common_banner_meta() {

	$prefix = 'rhm_banner_';
	$rhm_banner = new_cmb2_box( array( 
		'id'           => $prefix.'_metadata',
		'title'        => 'Banner',
		'object_types' => array( 'page' ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	) );
	$rhm_banner->add_field( array(
		'name'       => esc_html__( 'Image', 'cmb2' ),
        'id'         => $prefix.'img',
		'type'    => 'file',
		'options' => array(
			'url' => true,
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File'
		),
		'query_args' => array(
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
			),
		),
		'preview_size' => 'large',
	) );
	$rhm_banner->add_field( array(
        'name' => 'Banner Heading',
        'desc' => '(Note: For inner pages only, not for the front page)',
		'type' => 'text',
		'id'   => $prefix.'heading',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );
	$rhm_banner->add_field( array(
        'name' => 'Banner Content',
        'desc' => '(Note: For inner pages only, not for the front page)',
		'type' => 'wysiwyg',
		'id'   => $prefix.'content',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );
}


/*********************** /////////////// NEWS //////////////// ***************************/

/********** News post type and category ***********/
function abn_news() {
	$labels = array(
	  'name'               => _x( 'News', 'post type general name' ),
	  'singular_name'      => _x( 'News', 'post type singular name' ),
	  'add_new'            => _x( 'Add New News','News' ),
	  'add_new_item'       => __( 'Add New News' ),
	  'edit_item'          => __( 'Edit News' ),
	  'new_item'           => __( 'New News' ),
	  'all_items'          => __( 'All News' ),
	  'view_item'          => __( 'View News' ),
	  'search_items'       => __( 'Search News' ),
	  'not_found'          => __( 'No News found' ),
	  'not_found_in_trash' => __( 'No News found in the Trash' ), 
	  'parent_item_colon'  => '',
	  'menu_name'          => 'News'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds our News',
	  'public'        => true,
	  'menu_position' => 21,
	  'supports'      => array( 'title', 'editor', 'thumbnail' ),
	  'rewrite' => array('slug' => 'news', 'with_front' => false),
	  'has_archive' => false,
	);
	register_post_type( 'news', $args ); 
}
add_action( 'init', 'abn_news');
  
function abn_news_cat()
{
	  $labels = array(
		  'name' => _x( 'News Category', 'taxonomy general name' ),
		  'singular_name' => _x( 'About News Category', 'taxonomy singular name' ),
		  'search_items' =>  __( 'Search Category' ),
		  'popular_items' => __( 'Popular Category' ),
		  'all_items' => __( 'All Category' ),
		  'parent_item' => __( 'Parent Category' ),
		  'parent_item_colon' => __( 'Parent:' ),
		  'edit_item' => __( 'Edit Category' ),
		  'update_item' => __( 'Update' ),
		  'add_new_item' => __( 'Add New Category' ),
		  'new_item_name' => __( 'New Category Name' ),
		  );
		  register_taxonomy('cat',array('news'), array(
		  'hierarchical' => true,
		  'labels' => $labels,
		  'show_ui' => true,
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'cat'),
	  ));
  
}
add_action( 'init', 'abn_news_cat', 0 );