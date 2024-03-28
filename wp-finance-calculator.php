<?php 
/*
Plugin Name: WooCommerce Installment Calculator
Description: WordPress plugin for WooCommerce products, enabling users to select down payment and monthly duration options, easily integrated with shortcodes for universal application across your website
Version: 1.0
Author: Ansar Ahmed
Text Domain: fcw
*/

/*===== Direct access not allowed ======*/
if( ! defined('ABSPATH' ) ){ exit; }

define('FCW_PATH', untrailingslashit(plugin_dir_path( __FILE__ )) );
define('FCW_URL', untrailingslashit(plugin_dir_url( __FILE__ )) );
define('FCW_VERSION', 1.0 );

/* ======= plugin includes ======= */
if( file_exists( dirname(__FILE__).'/include/helpers.php' )) include_once dirname(__FILE__).'/include/helpers.php';
if( file_exists( dirname(__FILE__).'/include/admin.php' )) include_once dirname(__FILE__).'/include/admin.php';

class WP_Finance_Calculator {
    
    private static $ins = null;
    function __construct() {

        add_action('admin_menu', 'fcw_admin_menu');
        add_shortcode('fcw_calculator', 'wcf_helpers_calculator_callback');
        add_action('wp_ajax_fcw_setting_action', 'fcw_admin_setting_callback');

        $fcw_setting = get_option('fcw_settings');
        $product_enable = !empty($fcw_setting['single_product']) ? $fcw_setting['single_product'] : 'no'; 
        if($product_enable == 'yes'){
            add_action( 'woocommerce_before_add_to_cart_button', 'fcw_helpers_single_product_page');
        }
    }
    
    public static function get_instance() {
        is_null(self::$ins) && self::$ins = new self;
        return self::$ins;
    }
}

add_action('plugins_loaded', 'fcw_start');
function fcw_start() {
    return WP_Finance_Calculator::get_instance();
}