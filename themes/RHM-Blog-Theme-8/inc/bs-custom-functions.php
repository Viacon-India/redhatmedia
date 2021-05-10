<?php
/*************************** Add class to wordpress content area **************************************/
if( !function_exists('focus_wysiwyg_buttons') ) {
    function focus_wysiwyg_buttons( $buttons ) {
      $buttons[] = 'styleselect';

      return $buttons;
    }
}
add_filter( 'mce_buttons_2', 'focus_wysiwyg_buttons' );
if( !function_exists('focus_wysiwyg_styles') ) {
    function focus_wysiwyg_styles( $settings ) {    

        $new_styles = array(
            array(  
                'title' => 'Review CTA Section Wrapper ',  
                'block' => 'div',  
                'classes' => 'review-cta-container',
                'wrapper' => true,
            ),  
            array(  
                'title' => 'Review CTA Content Wrapper',  
                'block' => 'div',  
                'classes' => 'text-and-button-container',
                'wrapper' => true,
            ),            
            array(  
                'title' => 'Review CTA Button',  
                'block' => 'a',  
                'classes' => 'btn btn-primary-border',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Pros Container',  
                'block' => 'div',  
                'classes' => 'pros',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Cons Container',  
                'block' => 'div',  
                'classes' => 'cons',
                'wrapper' => true,
            ),
        );

        // Merge old & new styles
        //$settings['style_formats_merge'] = true;

        // Add new styles
        $settings['style_formats'] = json_encode( $new_styles );

        return $settings;
    }
}
add_filter( 'tiny_mce_before_init', 'focus_wysiwyg_styles' );

