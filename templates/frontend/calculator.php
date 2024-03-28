<?php


/*== not run if accessed directly ==*/
if( ! defined("ABSPATH" ) ) {die("Not Allewed");}

$fcw_setting = get_option('fcw_settings');
$fcw_setting['top_heading']  = !empty($fcw_setting['top_heading']) ? $fcw_setting['top_heading'] : 'Finance Calculator';
$fcw_setting['first_input']  = !empty($fcw_setting['first_input']) ? $fcw_setting['first_input'] : 'Down Payment';   
$fcw_setting['second_input'] = !empty($fcw_setting['second_input']) ? $fcw_setting['second_input'] : 'Term (months)'; 

$fcw_setting['heading']    = !empty($fcw_setting['heading']) ? $fcw_setting['heading'] : 'HIRE PURCHASE'; 
$fcw_setting['first_row']  = !empty($fcw_setting['first_row']) ? $fcw_setting['first_row'] : 'Vehicle Price'; 
$fcw_setting['second_row'] = !empty($fcw_setting['second_row']) ? $fcw_setting['second_row'] : 'Down Payment'; 
$fcw_setting['third_row']  = !empty($fcw_setting['third_row']) ? $fcw_setting['third_row'] : 'Loan Amount'; 
$fcw_setting['four_row']   = !empty($fcw_setting['four_row']) ? $fcw_setting['four_row'] : 'Term (months)'; 
$fcw_setting['five_row']   = !empty($fcw_setting['five_row']) ? $fcw_setting['five_row'] : 'Monthly Payment'; 

$fcw_setting['bg_clr']  = !empty($fcw_setting['bg_clr']) ? $fcw_setting['bg_clr'] : '#f2f2f2'; 
$fcw_setting['txt_clr'] = !empty($fcw_setting['txt_clr']) ? $fcw_setting['txt_clr'] : '#404040'; 
$fcw_setting['input_bg_clr'] = !empty($fcw_setting['input_bg_clr']) ? $fcw_setting['input_bg_clr'] : '#787878'; 
$fcw_setting['input_fg_clr'] = !empty($fcw_setting['input_fg_clr']) ? $fcw_setting['input_fg_clr'] : '#2b2b2b'; 
$fcw_setting['input_pointer_clr'] = !empty($fcw_setting['input_pointer_clr']) ? $fcw_setting['input_pointer_clr'] : '#2b2b2b'; 

?>
<style>
    .fcw-calculator-wrapper{
        background : <?php echo $fcw_setting['bg_clr']; ?>;
    }
    .fcw-calculator-wrapper label, .fcw-calculator-wrapper span, .fcw-calculator-wrapper td{
        color : <?php echo $fcw_setting['txt_clr']; ?> !important;
    }
    .fcw-down-payment .asRange,
    .fcw-terms-month .asRange{
        background-color: <?php echo $fcw_setting['input_bg_clr']; ?>;
    }
    .fcw-down-payment .asRange .asRange-selected,
    .fcw-terms-month .asRange .asRange-selected{
        background-color: <?php echo $fcw_setting['input_fg_clr']; ?>;
    }
    .fcw-down-payment .asRange .asRange-pointer:before,
    .fcw-terms-month .asRange .asRange-pointer:before{
        background-color: <?php echo $fcw_setting['input_pointer_clr']; ?>;
    }
</style>
<section class="fcw-calculator-wrapper">
    <h3 class="fcw-title">
        <span><?php _e($fcw_setting['top_heading'], 'fcw') ?></span>
    </h3>
    <div class="fcw-down-payment">
        <label><?php _e($fcw_setting['first_input'], 'fcw') ?></label>
        <span class="fcw_dp_silder"></span>
        <div id="fcw_down_payment"></div>
    </div>
    <div class="fcw-terms-month">
        <label><?php _e($fcw_setting['second_input'], 'fcw') ?></label>
        <span class="fcw_tm_silder"></span>
        <div id="fcw_terms_month"></div>
    </div>
    <div class="fcw-finance-table">
        <table cellspacing="0" cellpadding="0" class="table display table-striped table-bordered">
            <thead>
                <tr>
                    <th><span><?php _e($fcw_setting['heading'], 'fcw') ?></span></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="fcw-cash-price">
                    <td class="heading"><span><?php _e($fcw_setting['first_row'], 'fcw') ?></span></td>
                    <td class="fcw_veh_price"></td>
                </tr>
                <tr class="fcw-deposit">
                    <td class="heading"><span><?php _e($fcw_setting['second_row'], 'fcw') ?></span></td>
                    <td class="fcw_down_price"></td>
                </tr>
                <tr class="fcw-loan-amount">
                    <td class="heading"><span><?php _e($fcw_setting['third_row'], 'fcw') ?></span></td>
                    <td class="fcw_loan_price"></td>
                </tr>
                <tr class="fcw-term">
                    <td class="heading"><span><?php _e($fcw_setting['four_row'], 'fcw') ?></span></td>
                    <td class="fcw_month"></td>
                </tr>
                <tr class="fcw-monthly-amount">
                    <td class="heading"><span><?php _e($fcw_setting['five_row'], 'fcw') ?></span></td>
                    <td class="fcw_instalment"></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>