<?php
function abn_review_cat_meta() {

	$prefix = 'review_cat_';
	$review_meta = new_cmb2_box( array( 
		'id'               => $prefix . 'edit', 
		'title'            => esc_html__( 'Category Metabox', 'cmb2' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'reviews'),
	) );
	$review_meta->add_field( array(
        'name' => 'Short Description',
		'type' => 'textarea',
		'id'   => $prefix.'short_desc',
		'attributes' => array(
			'style'		=>'width:540px;'
		)
	) );
	$review_meta->add_field( array(
        'name' => 'Summary',
		'type' => 'textarea',
		'id'   => $prefix.'summary',
		'attributes' => array(
			'style'		=>'width:540px;'
		)
	) );
	$review_meta->add_field( array(
		'name' => 'What we have Considered',
		'type' => 'wysiwyg',
		'id'   => $prefix.'consider',
		'attributes' => array(
			'style'		=>'width:540px; height:200px;'
		)
	) );

	$review_meta_id = $review_meta->add_field( array(
        'id'          => $prefix .'faq',
        'type'        => 'group',
        'description' => esc_html__( 'FAQ ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'FAQ {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another FAQ', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove FAQ', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $review_meta->add_group_field( $review_meta_id, array(
        'name'       => esc_html__( 'Question', 'cmb2' ),
        'id'         => $prefix.'question',
        'type'       => 'text',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
	) );
	$review_meta->add_group_field( $review_meta_id, array(
        'name'       => esc_html__( 'Answer', 'cmb2' ),
        'id'         => $prefix.'answer',
        'type'       => 'wysiwyg',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
    ) );
}
add_action( 'cmb2_init', 'abn_review_cat_meta' );



/***************************** BEST REVIEW *********************************/
/********************* Best Review Meta (Single Review list) *******************/
function abn_best_review_banner_meta(){
	$prefix = 'best_review_bnr_';
	
	$best_bnr_data = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'Banner Section', 'cmb2' ),
		'object_types'  => array( 'reviews' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	$best_bnr_data->add_field( 		
		array(
			'name' => __('Banner Description', 'cmb2'),
			'id' => $prefix.'desc',
			'default' => '',
			'type'    => 'wysiwyg',		 
	 	)
	);
	$best_bnr_data->add_field( 		
		array(
			'name' => __('Before the Table Content', 'cmb2'),
			'id' => $prefix.'short_desc',
			'default' => '',
			'type'    => 'wysiwyg',		 
	 	)
	);


}
add_action( 'cmb2_init', 'abn_best_review_banner_meta' );

/********************* Best Review Meta (Single Review list) *******************/
function abn_best_review_list_meta(){
	$prefix = 'best_review_list_';

	$args = array(
		'numberposts' => -1,
		'post_type'   => 'review'
	);	
	$review_posts = get_posts( $args );
	global $getPosts;
	$getPosts = array();
	foreach($review_posts as $post) {
		$reviewArray[$post->ID]=$post->post_title;
	}

	$best_list = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'Review List Section', 'cmb2' ),
		'object_types'  => array( 'reviews' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );

	$best_list_id = $best_list->add_field( array(
        'id'          => $prefix .'review',
        'type'        => 'group',
        'description' => esc_html__( 'Review Section (Table data) ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Review {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Review', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Review', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $best_list->add_group_field( $best_list_id, array(
		'name'             => 'Choose review',
		'desc'             => 'Select a Review',
		'id'               => $prefix.'review',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => $reviewArray,
	) );
	
	$best_list->add_group_field( $best_list_id, array(
		 'name' => __('Short Description', 'cmb2'),
		 'desc' => 'Short description(195 words)',
		 'id' => $prefix.'review_desc',
		 'default' => '',
		 'type'    => 'wysiwyg',
		 'attributes'  => array(
		     'style' =>'height: 200px;'
		 )
	 ) );


}
add_action( 'cmb2_init', 'abn_best_review_list_meta' );

/********************* Best Review Meta (Summary) *******************/
function abn_best_review_summary_meta(){
	$prefix = 'best_review_summary_';
	$best_summ = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'Summary Section', 'cmb2' ),
		'object_types'  => array( 'reviews' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	$best_summ->add_field( 		
		array(
		 'name' => __('Summary', 'cmb2'),
		 'desc' => __('Summary', 'cmb2'),
		 'id' => $prefix.'data',
		 'default' => '',
		 'type'    => 'wysiwyg',
		 
	 )
	);
}
add_action( 'cmb2_init', 'abn_best_review_summary_meta' );

/********************* Best Review Meta (What We have considered) *******************/
/* function abn_best_review_consider_meta(){
	$prefix = 'best_review_cosider_';
	$best_summ = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'Consider Section', 'cmb2' ),
		'object_types'  => array( 'reviews' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	$best_summ->add_field( 		
		array(
		 'name' => __('What we have considered', 'cmb2'),
		 'id' => $prefix.'data',
		 'default' => '',
		 'type'    => 'wysiwyg',
		 
	 )
	);
}
add_action( 'cmb2_init', 'abn_best_review_consider_meta' ); */

/********************* Best Review Meta (FAQ) *******************/
function abn_best_review_faq_meta(){
	$prefix = 'best_review_faq_';
	$best_review = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'FAQ Section', 'cmb2' ),
		'object_types'  => array( 'reviews' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	/* $best_review->add_field( 		
		array(
		 'name' => __('FAQ Short Description', 'cmb2'),
		 'desc' => __('FAQ Short Description', 'cmb2'),
		 'id' => $prefix.'short_desc',
		 'default' => '',
		 'type'    => 'textarea',		 
	 )
	); */
	$best_review_id = $best_review->add_field( array(
        'id'          => $prefix .'faqdata',
        'type'        => 'group',
        'description' => esc_html__( 'FAQ Section (Enter all FAQ here) ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'FAQ {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another FAQ', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove FAQ', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $best_review->add_group_field( $best_review_id, array(
        'name'       => esc_html__( 'FAQ Title', 'cmb2' ),
        'id'         => $prefix.'title',
        'type'       => 'text',
		'attributes'  => array(
			'placeholder' => 'Enter FAQ Title', 'style' =>'width:500px;'
		)
	) );
	$best_review->add_group_field( $best_review_id, array(
        'name'       => esc_html__( 'FAQ Description', 'cmb2' ),
        'id'         => $prefix.'desc',
        'type'       => 'wysiwyg',
		'attributes'  => array(
			'placeholder' => 'Enter FAQ Description', 'style' =>'width:500px;'
		)
    ) );
}
add_action( 'cmb2_init', 'abn_best_review_faq_meta' );

/****************** Best review (Conclusion) *********************/
function abn_best_review_conclusion_meta(){
	$prefix = 'best_review_conclusion_';
	$best_summ = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'Conclusion Section', 'cmb2' ),
		'object_types'  => array( 'reviews' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	$best_summ->add_field( 		
		array(
		 'name' => __('Conclusion', 'cmb2'),
		 'id' => $prefix.'data',
		 'default' => '',
		 'type'    => 'wysiwyg',
		 //'wpautop' => true,
		 
	 )
	);
}
add_action( 'cmb2_init', 'abn_best_review_conclusion_meta' );

/************************ SINGLE REVIEW ***********************/

/********************* Review Meta (Banner) *******************/
function abn_review_meta(){
	$prefix = 'review_mata_';
	$review_dtls = new_cmb2_box( array(
		'id'            => $prefix . 'pro_metabox',
		'title'         => __( 'Banner Section', 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	$review_dtls->add_field( 		
		array(
		 'name' => __('Banner Description', 'cmb2'),
		 //'desc' => __('Banner Description', 'cmb2'),
		 'id' => $prefix.'bnr_desc',
		 'default' => '',
		 'type'    => 'textarea',		 
	 )
	);
	$review_dtls->add_field( 		
		array(
			'name' => __('Banner Text', 'cmb2'),
			'id' => $prefix.'bnr_text',
			'default' => '',
			'type'    => 'text',
			'attributes'  => array(
				'placeholder' => 'Ranked 1st from 3627 Web Hosting', 'style' =>'width:500px;'
			)			
		)
	);
	$review_dtls->add_field( 		
		array(
			'name' => __('Main Website Link', 'cmb2'),
			'id' => $prefix.'web_live_link',
			'default' => '',
			'type'    => 'text_url',
			'attributes'  => array(
				'placeholder' => 'https://www.google.com', 'style' =>'width:500px;'
			)
			
	 )
	);
	$review_dtls->add_field( 		
		array(
		 'name' => __('Main Website Link', 'cmb2'),
		 'id' => $prefix.'web_live_link',
		 'default' => '',
		 'type'    => 'text_url',
		 'attributes'  => array(
			'placeholder' => 'https://www.google.com', 'style' =>'width:500px;'
		 )
		 
	 )
	);
	/* $review_dtls->add_field( 		
		array(
			'name' => __('Buttom Line', 'cmb2'),
			'id' => $prefix.'buttom_line',
			'default' => '',
			'type'    => 'wysiwyg',		 
	 	)
	); */

}
add_action( 'cmb2_init', 'abn_review_meta' );



/********************* Review Banner right side *******************/
function abn_review_banner_felem_meta(){
    
	$prefix = 'review_mata_';
	$review_felem_dtls = new_cmb2_box( array(
		'id'            => $prefix . 'banner_first_metabox',
		'title'         => __( 'Banner Pricing', 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	/* $review_felem_dtls->add_field( 		
		array(
			'name' => __('Heading', 'cmb2'),
			'id' => $prefix.'first_etext',
			'default' => 'Pricing',
			'type'    => 'text',		 
	 	)
	); */
	$review_felem_dtls_id = $review_felem_dtls->add_field( array(
        'id'          => $prefix .'first_elem',
        'type'        => 'group',
        'description' => esc_html__( 'Pricing Details', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Pricing {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another First Element', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove First Element', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );
    $review_felem_dtls->add_group_field( $review_felem_dtls_id, array(
        'name'       => esc_html__( 'Title', 'cmb2' ),
        'id'         => $prefix.'first_elem_title',
        'type'       => 'text',
		'attributes'  => array(
			'style' =>'width:500px;'
		)
	) );
	$review_felem_dtls->add_group_field( $review_felem_dtls_id, array(
        'name'       => esc_html__( 'Value', 'cmb2' ),
        'id'         => $prefix.'first_elem_value',
        'type'       => 'text',
		'attributes'  => array(
			'style' =>'width:500px;'
		)
	) );
	
}
add_action( 'cmb2_init', 'abn_review_banner_felem_meta' );

/********************* Review Banner right side *******************/
function abn_review_banner_selem_meta(){
    
	$prefix = 'review_mata_';
	$review_selem_dtls = new_cmb2_box( array(
		'id'            => $prefix . 'banner_second_metabox',
		'title'         => __( 'Server locations Section', 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );	

	/* $review_selem_dtls->add_field( 		
		array(
			'name' => __('Heading', 'cmb2'),
			'id' => $prefix.'second_etext',
			'default' => 'Server locations',
			'type'    => 'text',		 
	 	)
	); */
	$review_selem_dtls_id = $review_selem_dtls->add_field( array(
        'id'          => $prefix .'second_elem',
        'type'        => 'group',
        'description' => esc_html__( 'Server locations Details', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Server location {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );
    $review_selem_dtls->add_group_field( $review_selem_dtls_id, array(
        'name'       => esc_html__( 'Title', 'cmb2' ),
        'id'         => $prefix.'second_elem_title',
        'type'       => 'text',
		'attributes'  => array(
			'style' =>'width:500px;'
		)
	) );
	
	$review_selem_dtls->add_group_field( $review_selem_dtls_id, array(
        'name'             => 'Choose Flag',
    	'id'               => $prefix.'flag',
    	'type'             => 'select',
    	'show_option_none' => true,
    	'options'          => get_flag_by_country_name(),
    	'attributes'  => array(
			'style' =>'width:500px;'
		)
	) );
	
	/* $review_selem_dtls->add_group_field( $review_dtls2_id, array(
        'name'       => esc_html__( 'Second Element Value', 'cmb2' ),
        'id'         => $prefix.'second_elem_value',
        'type'       => 'text',
		'attributes'  => array(
			'placeholder' => 'Enter Second Element Value', 'style' =>'width:500px;'
		)
	) ); */

}
add_action( 'cmb2_init', 'abn_review_banner_selem_meta' );

/********************* Review Meta (Buttom) *******************/
/*function abn_review_overview_meta(){
	$prefix = 'review_overview_mata_';
	$review_dtls = new_cmb2_box( array(
		'id'            => $prefix . 'overview_pro_metabox',
		'title'         => __( 'Overview Section', 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	$review_dtls->add_field( 		
		array(
			'name' => __('Description', 'cmb2'),
			'id' => $prefix.'desc',
			'default' => '',
			'type'    => 'wysiwyg',		 
	 	)
	);

}
add_action( 'cmb2_init', 'abn_review_overview_meta' ); */

/********************* Best Review Meta (Single Review list) *******************/
function abn_review_meta_rating(){
	$prefix = 'ratings_';

	$rating = new_cmb2_box( array(
		'id'            => $prefix . 'rate_metabox',
		'title'         => __( 'Content Body', 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );

	$rating_id = $rating->add_field( array(
        'id'          => $prefix .'static_rating',
        'type'        => 'group',
        'description' => esc_html__( 'Main Content Section', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Section {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Rating', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Review', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );
    $rating->add_group_field( $rating_id, array(
        'name'       => esc_html__( 'Title', 'cmb2' ),
        'id'         => $prefix.'title',
        'type'       => 'text',
		'attributes'  => array(
			'placeholder' => 'Enter Rating Title', 'style' =>'width:500px;'
		)
	) );
	$rating->add_group_field( $rating_id,  array(
		'name' => __('Rating', 'cmb2'),
		'desc' => __('Rating', 'cmb2'),
		'id' => $prefix.'value',
		'default' => '',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'min' => '0',
			'max' => '5',
			'step' => '0.1',
			'placeholder' => 'Rating (out of 5)',
			'style'		=>'width:430px;'
		)
	));
	/* $rating->add_group_field( $rating_id, array(
        'name'       => esc_html__( 'Icon', 'cmb2' ),
        'id'         => $prefix.'icon',
        'type'       => 'text',
		'attributes'  => array(
			'placeholder' => 'Enter Rating Icon', 'style' =>'width:500px;'
		)
	) ); */
	$rating->add_group_field( $rating_id, array(
        'name'       => esc_html__( 'Content Layout', 'cmb2' ),
        'id'         => $prefix.'desc',
        'type'       => 'wysiwyg',
		'attributes'  => array(
			'placeholder' => 'Enter Rating Descripion', 'style' =>'width:500px;'
		)
	) );


}
add_action( 'cmb2_init', 'abn_review_meta_rating' );


/********************* Review Meta (Buttom) *******************/
function abn_review_buttom_meta(){
	$prefix = 'review_buttom_mata_';
	$review_dtls = new_cmb2_box( array(
		'id'            => $prefix . 'btm_pro_metabox',
		'title'         => __( 'Buttom Section', 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
	$review_dtls->add_field( 		
		array(
			'name' => __('Buttom Line', 'cmb2'),
			'id' => $prefix.'buttom_line',
			'default' => '',
			'type'    => 'wysiwyg',		 
	 	)
	);

}
add_action( 'cmb2_init', 'abn_review_buttom_meta' );

/************************* Single Review FAQ *********************/
function abn_single_review_faq_meta(){
	$prefix = 'review_faq_mata_';
	$review_faq_dtls = new_cmb2_box( array(
		'id'            => $prefix . 'data',
		'title'         => __( 'FAQ', 'cmb2' ),
		'object_types'  => array( 'review' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true
	) );
    $faq_meta_id = $review_faq_dtls->add_field( array(
        'id'          => $prefix .'faqdata',
        'type'        => 'group',
        'description' => esc_html__( 'FAQ ', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'FAQ {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another FAQ', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove FAQ', 'cmb2' ),
            'sortable'      => true,
        ),
    ) );	
    $review_faq_dtls->add_group_field( $faq_meta_id, array(
        'name'       => esc_html__( 'Question', 'cmb2' ),
        'id'         => $prefix.'question',
        'type'       => 'text',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
	) );
	$review_faq_dtls->add_group_field( $faq_meta_id, array(
        'name'       => esc_html__( 'Answer', 'cmb2' ),
        'id'         => $prefix.'answer',
        'type'       => 'wysiwyg',
		'attributes'  => array(
			'style'		=>'width:500px;'
		)
    ) );
}
add_action( 'cmb2_init', 'abn_single_review_faq_meta' );

