jQuery(function($) { 

    var currency = 'USD';
    var total_price = 0;
    var left_down_price = 0;
    var instalment = 0;

    $(document).ready(function(e){
        total_price = parseFloat(fcw_vars.veh_price);
        jQuery('.fcw_veh_price').html(currency+' '+total_price.toLocaleString());
        jQuery('.fcw_loan_price').html(currency+' '+total_price.toLocaleString());

        left_down_price = Number(total_price) - Number(fcw_vars.dp_min);
        var instalment = calculate_monthly_instalment(left_down_price, parseInt(fcw_vars.mon_min));
        // console.log(instalment);

        $('.fcw_instalment').html(currency+' '+instalment.toLocaleString());

    });

    $("#fcw_down_payment").asRange({
        namespace: 'asRange',
        skin: null,
        max: fcw_vars.dp_max,
        min: parseInt(fcw_vars.dp_min),
        value:parseInt(fcw_vars.dp_min),
        step: fcw_vars.dp_step,
        limit: true,
        range: false,
        direction: 'h', 
        keyboard: true,
        replaceFirst: false, 
        tip: true,
        scale: true,
      
        format: function format(value) {

            left_down_price = Number(total_price) - Number(parseInt(value));
            var months = $('#fcw_terms_month span.asRange-tip').html();
            instalment = calculate_monthly_instalment(left_down_price, parseInt(months));
            $('.fcw_instalment').html(currency+' '+instalment);
            jQuery('.fcw-down-payment span.fcw_dp_silder').html('USD '+parseInt(value).toLocaleString())
            jQuery('.fcw_down_price').html(currency+' '+parseInt(value).toLocaleString())
            jQuery('.fcw_loan_price').html(currency+' '+left_down_price.toLocaleString());
            return value;
        }
    });

    $("#fcw_terms_month").asRange({
        namespace: 'asRange',
        skin: null,
        max: fcw_vars.mon_max,
        min: parseInt(fcw_vars.mon_min),
        value: fcw_vars.mon_min,
        step: fcw_vars.mon_step,
        limit: true,
        range: false,
        direction: 'h', 
        keyboard: true,
        replaceFirst: false, 
        tip: true,
        scale: true,
      
        format: function format(value) {

            var total_down_price = $('#fcw_down_payment span.asRange-tip').html();
            left_down_price = Number(total_price) - Number(parseInt(total_down_price));
            instalment = calculate_monthly_instalment(left_down_price, parseInt(value));
            $('.fcw_instalment').html(currency+' '+instalment.toLocaleString());

            jQuery('.fcw-terms-month span.fcw_tm_silder').html(value+ ' Months')
            jQuery('.fcw_month').html(value)
            return value;
        }
    });
});

function calculate_monthly_instalment(loanAmount, months){
    // console.log(loanAmount, months);
    var interestRate = 2.99;
    var r = interestRate / 1200;
    var monthlyPayment = loanAmount * r / (1 - (Math.pow(1/(1 + r), months)));
    return monthlyPayment.toFixed(2);
}