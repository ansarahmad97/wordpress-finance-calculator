<?php
/*
** Setting Page
*/

/*== not run if accessed directly ==*/
if( ! defined("ABSPATH" ) ) {die("Not Allewed");}
$fcw_setting = get_option('fcw_settings');

$fcw_setting['dp_min'] = !empty($fcw_setting['dp_min']) ? $fcw_setting['dp_min'] : 0;
$fcw_setting['dp_max'] = !empty($fcw_setting['dp_max']) ? $fcw_setting['dp_max'] : 70000;   
$fcw_setting['dp_step'] = !empty($fcw_setting['dp_step']) ? $fcw_setting['dp_step'] : 5000; 

$fcw_setting['mon_min'] = !empty($fcw_setting['mon_min']) ? $fcw_setting['mon_min'] : 12;
$fcw_setting['mon_max'] = !empty($fcw_setting['mon_max']) ? $fcw_setting['mon_max'] : 60;   
$fcw_setting['mon_step'] = !empty($fcw_setting['mon_step']) ? $fcw_setting['mon_step'] : 6; 
$fcw_setting['veh_price'] = !empty($fcw_setting['veh_price']) ? $fcw_setting['veh_price'] : 229000; 

$fcw_setting['top_heading'] = !empty($fcw_setting['top_heading']) ? $fcw_setting['top_heading'] : 'Finance Calculator';
$fcw_setting['first_input'] = !empty($fcw_setting['first_input']) ? $fcw_setting['first_input'] : 'Down Payment';   
$fcw_setting['second_input'] = !empty($fcw_setting['second_input']) ? $fcw_setting['second_input'] : 'Term (months)'; 

$fcw_setting['heading'] = !empty($fcw_setting['heading']) ? $fcw_setting['heading'] : 'HIRE PURCHASE'; 
$fcw_setting['first_row'] = !empty($fcw_setting['first_row']) ? $fcw_setting['first_row'] : 'Vehicle Price'; 
$fcw_setting['second_row'] = !empty($fcw_setting['second_row']) ? $fcw_setting['second_row'] : 'Down Payment'; 
$fcw_setting['third_row'] = !empty($fcw_setting['third_row']) ? $fcw_setting['third_row'] : 'Loan Amount'; 
$fcw_setting['four_row'] = !empty($fcw_setting['four_row']) ? $fcw_setting['four_row'] : 'Term (months)'; 
$fcw_setting['five_row'] = !empty($fcw_setting['five_row']) ? $fcw_setting['five_row'] : 'Monthly Payment'; 

$fcw_setting['bg_clr'] = !empty($fcw_setting['bg_clr']) ? $fcw_setting['bg_clr'] : '#f2f2f2'; 
$fcw_setting['txt_clr'] = !empty($fcw_setting['txt_clr']) ? $fcw_setting['txt_clr'] : '#404040'; 
$fcw_setting['input_bg_clr'] = !empty($fcw_setting['input_bg_clr']) ? $fcw_setting['input_bg_clr'] : '#787878'; 
$fcw_setting['input_fg_clr'] = !empty($fcw_setting['input_fg_clr']) ? $fcw_setting['input_fg_clr'] : '#2b2b2b'; 
$fcw_setting['input_pointer_clr'] = !empty($fcw_setting['input_pointer_clr']) ? $fcw_setting['input_pointer_clr'] : '#2b2b2b'; 
$product_enable = !empty($fcw_setting['single_product']) ? $fcw_setting['single_product'] : 'no'; 

?>

<div class="wrap fcw-wrapper">
    <p class="fcw-form-heading"><?php _e('Calculator Setting', 'fcw'); ?></p>
    <form class="fcw-form-wrapper">
        <input type="hidden" name="action" value="fcw_setting_action">
        <div class="fcw-setting-section">
	    	<p class="fcw-form-sub-heading"><span class="fcw-new-section"></span><?php _e('Input Values', 'fcw'); ?></p>
	        <div class="row">
	            <div class="form-group col-4">
	                <label for=""><?php _e('Min Down Payment:', 'fcw'); ?></label>
	                <input type="number" name="fcw[dp_min]" class="form-control" value="<?php echo $fcw_setting['dp_min'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Max Down Payment:', 'fcw'); ?></label>
	                <input type="number" name="fcw[dp_max]" class="form-control" value="<?php echo $fcw_setting['dp_max'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Step Down Payment:', 'fcw'); ?></label>
	                <input type="number" name="fcw[dp_step]" class="form-control" value="<?php echo $fcw_setting['dp_step'] ?>">
	            </div>
	        </div>
	        <div class="row">
	            <div class="form-group col-4">
	                <label for=""><?php _e('Min Months:', 'fcw'); ?></label>
	                <input type="number" name="fcw[mon_min]" class="form-control" value="<?php echo $fcw_setting['mon_min'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Max Months:', 'fcw'); ?></label>
	                <input type="number" name="fcw[mon_max]" class="form-control" value="<?php echo $fcw_setting['mon_max'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Step Months:', 'fcw'); ?></label>
	                <input type="number" name="fcw[mon_step]" class="form-control" value="<?php echo $fcw_setting['mon_step'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Vehicle Price:', 'fcw'); ?></label>
	                <input type="number" name="fcw[veh_price]" class="form-control" value="<?php echo $fcw_setting['veh_price'] ?>">
	            </div>
	             <div class="form-check col-4">
	                <label for=""><?php _e('Enable on Products:', 'fcw'); ?></label>
	                <input type="checkbox" name="fcw[single_product]" class="form-check-input" value="yes" <?php echo ($product_enable == 'yes') ? 'checked' : ''; ?>>
	            </div>
	        </div>
	    </div>
        <div class="fcw-setting-section">
	    	<p class="fcw-form-sub-heading"><span class="fcw-new-section"></span><?php _e('Form Labels', 'fcw'); ?></p>
	        <div class="row">
	            <div class="form-group col-4">
	                <label for=""><?php _e('Top Heading:', 'fcw'); ?></label>
	                <input type="text" name="fcw[top_heading]" class="form-control" value="<?php echo $fcw_setting['top_heading'] ?>">
	            </div>
	            <div class="form-group col-4">
	               <label for=""><?php _e('First Input:', 'fcw'); ?></label>
	                <input type="text" name="fcw[first_input]" class="form-control" value="<?php echo $fcw_setting['first_input'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Second Input:', 'fcw'); ?></label>
	                <input type="text" name="fcw[second_input]" class="form-control" value="<?php echo $fcw_setting['second_input'] ?>">
	            </div>
	        </div>
	    </div>
        <div class="fcw-setting-section">
	        <p class="fcw-form-sub-heading"><span class="fcw-new-section"></span><?php _e('Price Labels', 'fcw'); ?></p>
	        <div class="row">
	            <div class="form-group col-4">
	                <label for=""><?php _e('Table Heading:', 'fcw'); ?></label>
	                <input type="text" name="fcw[heading]" class="form-control" value="<?php echo $fcw_setting['heading'] ?>">
	            </div>
	            <div class="form-group col-4">
	               <label for=""><?php _e('First Row:', 'fcw'); ?></label>
	                <input type="text" name="fcw[first_row]" class="form-control" value="<?php echo $fcw_setting['first_row'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Second Row:', 'fcw'); ?></label>
	                <input type="text" name="fcw[second_row]" class="form-control" value="<?php echo $fcw_setting['second_row'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Third Row:', 'fcw'); ?></label>
	                <input type="text" name="fcw[third_row]" class="form-control" value="<?php echo $fcw_setting['third_row'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Four Row:', 'fcw'); ?></label>
	                <input type="text" name="fcw[four_row]" class="form-control" value="<?php echo $fcw_setting['four_row'] ?>">
	            </div>
	            <div class="form-group col-4">
	                <label for=""><?php _e('Five Row:', 'fcw'); ?></label>
	                <input type="text" name="fcw[five_row]" class="form-control" value="<?php echo $fcw_setting['five_row'] ?>">
	            </div>
	        </div>
        </div>
        <div class="fcw-setting-section">
	    	<p class="fcw-form-sub-heading"><span class="fcw-new-section"></span><?php _e('Styling', 'fcw'); ?></p>
	        <div class="row">
	            <div class="form-group col-3">
	                <label for=""><?php _e('Wrapper Background:', 'fcw'); ?></label><br>
	                <input type="text" name="fcw[bg_clr]" class="form-control wp-color" value="<?php echo $fcw_setting['bg_clr'] ?>">
	            </div>
	            <div class="form-group col-3">
	                <label for=""><?php _e('Text:', 'fcw'); ?></label><br>
	                <input type="text" name="fcw[txt_clr]" class="form-control wp-color" value="<?php echo $fcw_setting['txt_clr'] ?>">
	            </div>
	            <div class="form-group col-3">
	                <label for=""><?php _e('Input Background:', 'fcw'); ?></label><br>
	                <input type="text" name="fcw[input_bg_clr]" class="form-control wp-color" value="<?php echo $fcw_setting['input_bg_clr'] ?>">
	            </div>
	            <div class="form-group col-3">
	                <label for=""><?php _e('Input Forground:', 'fcw'); ?></label><br>
	                <input type="text" name="fcw[input_fg_clr]" class="form-control wp-color" value="<?php echo $fcw_setting['input_fg_clr'] ?>">
	            </div>
	            <div class="form-group col-3">
	                <label for=""><?php _e('Input Point:', 'fcw'); ?></label><br>
	                <input type="text" name="fcw[input_pointer_clr]" class="form-control wp-color" value="<?php echo $fcw_setting['input_pointer_clr'] ?>">
	            </div>
	            
	        </div>
	    </div>
        <button type="submit" class="fcw-save-btn btn">Save Setting</button>
   </form>  
</div>