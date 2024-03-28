jQuery(function($) {

    /*== Augusta From ==*/
    $('.fcw-form-wrapper').on('submit',function(e){
        e.preventDefault();
        $('.fcw-save-btn').html('<span class="spinner-border spinner-border-sm"></span> Loading...');

        var data = $(this).serialize();
        $.post(ajaxurl, data, function(resp){
            if (resp.status == 'success') {
                $('.fcw-save-btn').html('Setting Save Successfully!');
                setTimeout(window.location.reload(), 2000);
            }
        });
    });
    
    if($('input.wp-color').length){
        $('.wp-color').wpColorPicker();
    }
});