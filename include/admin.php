<?php
 
/*==== Direct access not allowed ====*/
if( ! defined('ABSPATH' ) ){ exit; }

function fcw_admin_menu(){
    add_menu_page( __('Finance Calculator', 'fcw'), __('Finance Calculator','fcw'), 'manage_options','fcw_menu_page', 'wcf_setting_callback', 'dashicons-calculator', 21);
}

function wcf_setting_callback(){

	wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
	wp_enqueue_style('fcw-bootstrap', FCW_URL."/assets/css/bootstrap.css");
    wp_enqueue_style('fcw-style-css', FCW_URL."/assets/css/admin.css");
    wp_enqueue_script('fcw-admin-js', FCW_URL."/assets/js/admin.js", array('jquery'),'1.0', true);
	fcw_load_templates('admin/setting.php');
}

function fcw_admin_setting_callback(){
	if($_POST['fcw']){
        if(update_option('fcw_settings', $_POST['fcw'])){
            wp_send_json(array('status' => 'success'));
        }
    }
}