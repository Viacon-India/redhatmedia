<?php
function my_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

function new_excerpt_more($more) {
    global $post;
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*****************************************/



add_action('post_submitbox_misc_actions', 'createCustomField');
add_action('save_post', 'saveCustomField');
function createCustomField() {

    $post_id = get_the_ID();
  
    if (get_post_type($post_id) != 'post') {
        return;
    }
  
    $featured_value = get_post_meta($post_id, '_vcon_featured', true);
    $editors_value = get_post_meta($post_id, '_vcon_editors_pick', true);
    wp_nonce_field('my_custom_nonce_'.$post_id, 'my_custom_nonce');
    
    ?>
    <div class="misc-pub-section misc-pub-section-last" style="border-top: 2px solid #ccc">
        <label><input type="checkbox" value="1" <?php checked($featured_value, true, true); ?> name="_vcon_featured" />
            <?php _e('Featured', 'pmg'); ?>
        </label>
    </div>
    <div class="misc-pub-section misc-pub-section-last">
        <label><input type="checkbox" value="1" <?php checked($editors_value, true, true); ?> name="_vcon_editors_pick" />
            <?php _e("Editor's Pick", "pmg"); ?>
        </label>
    </div>
    <?php

}

function saveCustomField($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (
        !isset($_POST['my_custom_nonce']) ||
        !wp_verify_nonce($_POST['my_custom_nonce'], 'my_custom_nonce_'.$post_id)
    ) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }


    if (isset($_POST['_vcon_featured'])) {
        update_post_meta($post_id, '_vcon_featured', $_POST['_vcon_featured']);
    } else {
        delete_post_meta($post_id, '_vcon_featured');
    }
    if (isset($_POST['_vcon_editors_pick'])) {
        update_post_meta($post_id, '_vcon_editors_pick', $_POST['_vcon_editors_pick']);
    } else {
        delete_post_meta($post_id, '_vcon_editors_pick');
    }

}



