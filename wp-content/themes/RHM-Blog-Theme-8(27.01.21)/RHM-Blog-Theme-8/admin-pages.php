<?php
//add_action('admin_menu', 'add_custom_link_into_appearnace_menu');
function add_custom_link_into_appearnace_menu() {
add_theme_page('Install Plugins', 'Install Plugins', 'manage_options', 'install-required-plugins', 'install_required_plugin_page');
}

function install_required_plugin_page() {    

    $plugin_install_table = new crally_Install_Plugin_Table();    
    $plugin_install_table->prepare_items(); ?>

    <h1>Install Plugin</h1>    

    <form id="movies-filter" method="get">
        <!-- For plugins, we also need to ensure that the form posts back to our current page -->
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
        <!-- Now we can render the completed list table -->
        <?php $plugin_install_table->search_box('Search', 'search');?>
        <?php $plugin_install_table->display(); ?>
    </form>
    <?php

}

add_action('admin_menu', 'add_theme_settings_panel');
function add_theme_settings_panel(){
    add_menu_page('Our Theme', 'Our Theme', 'manage_options', 'vc-theme-welcome', 'vc_welcome_func','dashicons-visibility', 4);
    add_submenu_page( 'vc-theme-welcome', 'Plugins', 'Plugins', 'manage_options', 'vc-install-plugin', 'vc_install_plugin_func');
    add_submenu_page( 'vc-theme-welcome', 'Page Templates', 'Page Templates', 'manage_options', 'vc-templates', 'vc_templates_func');
}


function vc_welcome_func(){
        echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Welcome</h2></div>';
}
function vc_install_plugin_func(){
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
    <h2>Install Plugins</h2></div>';

    $plugin_install_table = new crally_Install_Plugin_Table();    
    $plugin_install_table->prepare_items(); ?>

        <!-- <h1>Install Plugin</h1>     -->

        <form id="movies-filter" method="get">
            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            <!-- Now we can render the completed list table -->
            <?php $plugin_install_table->search_box('Search', 'search');?>
            <?php $plugin_install_table->display(); ?>
        </form>
    <?php
}
function vc_templates_func(){
        echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Page Templates</h2></div>';
}