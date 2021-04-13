<?php
add_action( 'cmb2_admin_init', 'tegeria_metabox' );
if(!function_exists('tegeria_metabox'))
{
	function tegeria_metabox(){
		$prefix = '_';
                $front_page_ID = get_option('page_on_front');
                $home_who_meta = new_cmb2_box( array(
                        'id'            => $prefix . 'home_who_metabox',
                        'title'         => esc_html__( 'Who we are section', 'blog' ),
                        'object_types'  => array( 'page' ),
                        //'show_on'      => array( 'key' => 'id', 'value' => array( $front_page_ID ) ),
                        'context'    => 'normal',
                        'priority'   => 'high',			
                ) );
                $home_who_meta->add_field( array(
                        'name'       => esc_html__( 'Heading', 'blog' ),
                        'desc'       => esc_html__( 'Enter Heading', 'blog' ),
                        'id'         => $prefix . 'home_who_heading',
                        'type'       => 'text',
                        'show_on_cb' => 'yourprefix_hide_if_no_cats'
                ) );
                $home_who_meta->add_field( array(
                        'name'       => esc_html__( 'Short Description', 'blog' ),
                        'desc'       => esc_html__( 'Enter short description', 'blog' ),
                        'id'         => $prefix . 'home_who_short_desc',
                        'type'       => 'textarea',
                        'show_on_cb' => 'yourprefix_hide_if_no_cats'
                ) );
                
	}
}
?>