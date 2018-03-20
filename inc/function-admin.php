 <?php
/*
@package premiumtheme
======================
ADMIN PAGE
======================

*/

function custom_add_admin_page(){
    //Create Admin Page
    add_menu_page('Theme Options', 'Premium theme', 'manage_options', 'premium_theme', 'premium_theme_create_page', 'dashicons-admin-generic', 110 );
    //Create SubMenu Pages
    add_submenu_page('premium_theme', 'Theme Options', 'General', 'manage_options', 'premium_theme', 'premium_theme_create_page');
    add_submenu_page('premium_theme', 'Theme CSS Options', 'Custom CSS', 'manage_options', 'premium_theme_css', 'premeium_theme_css_page');
    //Activate Custom Settings
    add_action('admin_init', 'sunset_custom_settings');
}

add_action('admin_menu', 'custom_add_admin_page');

function premium_theme_create_page(){
    require_once(get_template_directory().'/inc/templates/general-admin.php');
}

function premeium_theme_css_page(){
    echo '<h1>Premium Theme Custom CSS</h1>';
}

function sunset_custom_settings(){
    register_setting('theme-settings-group', 'font_name');
    add_settings_section('theme-main-menu-options', 'Homepage Options', 'theme_main_menu_options', 'premium_theme');
    add_settings_field('mainmenu-options', 'Font Name', 'theme_main_menu_font', 'premium_theme', 'theme-main-menu-options');
}

function theme_general_options(){
    echo 'Here you can edit the homepage!';
}

function theme_main_menu_font(){
    echo '<input type="text" name="main_menu_font" value="" />';
}