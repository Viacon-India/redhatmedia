<?php
add_action( 'init', 'multiple_post_type_init' );
if(!function_exists('multiple_post_type_init')){
	function multiple_post_type_init() {

		$posttype_arrayvalues = array(
			array('name' => 'Seen On', 'slug' => 'seen_on', 'icon' => 'dashicons-visibility'),
			array('name' => 'Testimonials', 'slug' => 'testimonials', 'icon' => 'dashicons-testimonial'),
		);
		
		foreach($posttype_arrayvalues as $posttype_value) {
			multiple_post_type_func($posttype_value['name'], $posttype_value['slug'], $posttype_value['icon']);
		}

	}
}

function multiple_post_type_func($name, $slug, $icon) {
	$labels = array(
		'name'               => _x( $name, $name, 'blog' ),
		'singular_name'      => _x( $name, $name, 'blog' ),
		'menu_name'          => _x( $name, 'admin menu', 'blog' ),
		'name_admin_bar'     => _x( $name, 'add new on admin bar', 'blog' ),
		'add_new'            => _x( 'Add New', $slug, 'blog' ),
		'add_new_item'       => __( 'Add New '.$name, 'blog' ),
		'new_item'           => __( 'New '.$name, 'blog' ),
		'edit_item'          => __( 'Edit '.$name, 'blog' ),
		'view_item'          => __( 'View'.$name, 'blog' ),
		'all_items'          => __( 'All '.$name, 'blog' ),
		'search_items'       => __( 'Search '.$name, 'blog' ),
		'parent_item_colon'  => __( 'Parent '.$name.':', 'blog' ),
		'not_found'          => __( 'No '.$name.' found.', 'blog' ),
		'not_found_in_trash' => __( 'No '.$name.' found in Trash.', 'blog' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'blog' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $slug ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => $icon,
		'supports'           => array( 'title','editor','thumbnail','author','comments')
	);

	register_post_type( $slug, $args );			
	
}
?>