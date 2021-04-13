<?php
add_action( 'cmb2_init', 'abn_resource_meta' );
function abn_resource_meta() {

	echo get_the_ID();

	$prefix = 'rhm_frontpage_';
	$rhm_frontpage_meta = new_cmb2_box( array( 
		'id'           => 'rhm_frontpage_meta',
		'title'        => 'Banner, About & Blog Details',
		'object_types' => array( 'page' ), // post type
		'show_on'   => array( 'key' => 'id', 'value' => array( get_option( 'page_on_front' ) ) ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	) );

	$rhm_frontpage_meta->add_field( array(
        'name' => 'Banner Heading',
		'type' => 'wysiwyg',
		'id'   => $prefix.'banner_heading',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );
	$rhm_frontpage_meta->add_field( array(
        'name' => 'Banner Content',
		'type' => 'wysiwyg',
		'id'   => $prefix.'banner_cont',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );
	$rhm_frontpage_meta->add_field( array(
		'name' => 'Button Text',
		'type' => 'text',
		'id'   => $prefix.'btn_text',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );
	$rhm_frontpage_meta->add_field( array(
		'name' => 'Button Link',
		'type' => 'text_url',
		'id'   => $prefix.'btn_link',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );

	$rhm_frontpage_meta->add_field( array(
        'name' => 'About Us',
		'type' => 'wysiwyg',
		'id'   => $prefix.'about_us',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );	

	$rhm_frontpage_meta->add_field( array(
        'name' => 'Blog Content',
		'type' => 'wysiwyg',
		'id'   => $prefix.'blog_content',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );
}

add_action( 'cmb2_init', 'abn_service_meta' );
function abn_service_meta() {

	$prefix = 'rhm_frontpage_service_';
	$rhm_frontpage_service = new_cmb2_box( array( 
		'id'           => 'rhm_frontpage_service_metadata',
		'title'        => 'Service Details',
		'object_types' => array( 'page' ), // post type
		'show_on'   => array( 'key' => 'id', 'value' => array( get_option( 'page_on_front' ) ) ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	) );

	$rhm_frontpage_service->add_field( array(
        'name' => 'Service Content',
		'type' => 'wysiwyg',
		'id'   => $prefix.'content',
		'attributes' => array(
			'style'		=>'width:100%;'
		)
	) );
	
	$rhm_frontpage_service_id = $rhm_frontpage_service->add_field( array(
        'id'          => $prefix .'data',
        'type'        => 'group',
        'description' => esc_html__( 'Service ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Service {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Service', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Service', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $rhm_frontpage_service->add_group_field( $rhm_frontpage_service_id, array(
        'name'       => esc_html__( 'Name', 'cmb2' ),
        'id'         => 'name',
        'type'       => 'text',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
	) );
	$rhm_frontpage_service->add_group_field( $rhm_frontpage_service_id, array(
        'name'       => esc_html__( 'Description', 'cmb2' ),
        'id'         => 'desc',
        'type'       => 'wysiwyg',
		'attributes'  => array(
			'style'		=>'width:500px; height:200px;'
		)
    ) );

	$rhm_frontpage_service->add_group_field( $rhm_frontpage_service_id, array(
    	'name'       => esc_html__( 'Image', 'cmb2' ),
        'id'         => 'img',
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
	$rhm_frontpage_service->add_group_field( $rhm_frontpage_service_id, array(
        'name'       => esc_html__( 'Button Text', 'cmb2' ),
        'id'         => 'link_text',
        'type'       => 'text',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
	) );
	$rhm_frontpage_service->add_group_field( $rhm_frontpage_service_id, array(
        'name'       => esc_html__( 'Link', 'cmb2' ),
        'id'         => 'link',
        'type'       => 'text_url',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
	) );
}



add_action( 'cmb2_init', 'abn_brand_meta' );
function abn_brand_meta() {

	$prefix = 'rhm_frontpage_brand_';
	$rhm_frontpage_brand = new_cmb2_box( array( 
		'id'           => 'rhm_frontpage_brand_metadata',
		'title'        => 'Brand Details',
		'object_types' => array( 'page' ), // post type
		'show_on'   => array( 'key' => 'id', 'value' => array( get_option( 'page_on_front' ) ) ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	) );

	$rhm_frontpage_brandheading_id = $rhm_frontpage_brand->add_field( array(
        'id'          => $prefix .'heading_data',
        'type'        => 'group',
        'description' => esc_html__( 'Heading ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Heading {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Heading', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Heading', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $rhm_frontpage_brand->add_group_field( $rhm_frontpage_brandheading_id, array(
        'name'       => esc_html__( 'Heading', 'cmb2' ),
        'id'         => 'heading',
        'type'       => 'text',
		'attributes'  => array(
			'style'		=>'width:100%;'
		)
	) );
	$rhm_frontpage_brand->add_group_field( $rhm_frontpage_brandheading_id, array(
        'name'       => esc_html__( 'Content', 'cmb2' ),
        'id'         => 'desc',
        'type'       => 'wysiwyg',
		'attributes'  => array(
			'style'		=>'width:100%;'
		)
    ) );
	
	$rhm_frontpage_brand_id = $rhm_frontpage_brand->add_field( array(
        'id'          => $prefix .'data',
        'type'        => 'group',
        'description' => esc_html__( 'Brand ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Brand {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Brand', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Brand', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $rhm_frontpage_brand->add_group_field( $rhm_frontpage_brand_id, array(
        'name'       => esc_html__( 'Name', 'cmb2' ),
        'id'         => 'name',
        'type'       => 'text',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
	) );
	$rhm_frontpage_brand->add_group_field( $rhm_frontpage_brand_id, array(
        'name'       => esc_html__( 'Description', 'cmb2' ),
        'id'         => 'desc',
        'type'       => 'textarea',
		'attributes'  => array(
			'style'		=>'width:500px; height:200px;'
		)
    ) );

	$rhm_frontpage_brand->add_group_field( $rhm_frontpage_brand_id, array(
    	'name'       => esc_html__( 'Image', 'cmb2' ),
        'id'         => 'img',
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
	$rhm_frontpage_brand->add_group_field( $rhm_frontpage_brand_id, array(
        'name'       => esc_html__( 'Link', 'cmb2' ),
        'id'         => 'link',
        'type'       => 'text_url',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
	) );
}