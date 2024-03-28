<?php
 
/*==== Direct access not allowed ====*/
if( ! defined('ABSPATH' ) ){ exit; }

function fcw_pa($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function fcw_load_templates( $template_name, $vars = null) {
    if( $vars != null && is_array($vars) ){
        extract( $vars );
    }

    $default_path =  FCW_PATH . "/templates/{$template_name}";
    if( file_exists( $default_path ) ){
        require ( $default_path );

    }else {
        die( "Error while loading file {$default_path}" );
    }
}

function wcf_helpers_calculator_callback($attr){
    $fcw_setting = get_option('fcw_settings');
    $fcw_setting['dp_min']  = !empty($fcw_setting['dp_min']) ? $fcw_setting['dp_min'] : 0;
    $fcw_setting['dp_max']  = !empty($fcw_setting['dp_max']) ? $fcw_setting['dp_max'] : 70000;   
    $fcw_setting['dp_step'] = !empty($fcw_setting['dp_step']) ? $fcw_setting['dp_step'] : 5000; 

    $fcw_setting['mon_min']   = !empty($fcw_setting['mon_min']) ? $fcw_setting['mon_min'] : 12;
    $fcw_setting['mon_max']   = !empty($fcw_setting['mon_max']) ? $fcw_setting['mon_max'] : 60;   
    $fcw_setting['mon_step']  = !empty($fcw_setting['mon_step']) ? $fcw_setting['mon_step'] : 6; 
    $fcw_setting['veh_price'] = !empty($fcw_setting['veh_price']) ? $fcw_setting['veh_price'] : 229000; 

    $product_enable = !empty($fcw_setting['single_product']) ? $fcw_setting['single_product'] : 'no'; 

    $price = !empty($attr['price']) ? $attr['price'] : $fcw_setting['veh_price'] ; 

    global $post;
    $width = '50%';
    if(is_product() && $product_enable == 'yes'){
        $product_id = $post->ID;
        $_product = wc_get_product( $product_id );
        $price = $_product->get_regular_price();
        $width = '100%';
    }

    wp_enqueue_style('fcw-style-css', FCW_URL."/assets/css/style.css");
    wp_enqueue_style('fcw-rangeslider-css', FCW_URL."/assets/rangeslider/rangeslider.css");
    wp_enqueue_script('fcw-rangeslider-js', FCW_URL."/assets/rangeslider/rangeslider.js");
    wp_enqueue_script('fcw-script-js', FCW_URL."/assets/js/script.js", array('jquery'),'1.0', true);
    wp_localize_script('fcw-script-js', 'fcw_vars', 
        array(
        'dp_min'   => $fcw_setting['dp_min'], 
        'dp_max'   => $fcw_setting['dp_max'], 
        'dp_step'  => $fcw_setting['dp_step'], 
        'mon_min'  => $fcw_setting['mon_min'], 
        'mon_max'  => $fcw_setting['mon_max'], 
        'mon_step' => $fcw_setting['mon_step'], 
        'veh_price' => $price, 
    ));

    ob_start();
    fcw_load_templates('frontend/calculator.php', array('width' => $width));
    return $template = ob_get_clean();

}

function fcw_helpers_single_product_page(){
    if(is_product()){
        echo do_shortcode('[fcw_calculator]');
    }
}