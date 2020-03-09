var form = $('#member-registration');

$('#btn-continue').on('click', function () {

    var $captcha = $('#recaptcha'),
               response = grecaptcha.getResponse();

    if (response.length === 0) {
        if (!$captcha.hasClass("has-error")) {
            $captcha.addClass("has-error");
        }
        return false;
    }

    $('#btn-continue').html('Please wait').prop('disabled', true);
    $.post('Register', { action: 'member-validation', PhoneNumber: $('#PhoneNumber').val(), IDNumber: $('#IDNumber').val() })
    .done(function (res) {
        if (res.status == true) {
            $('.display-on').hide();
            $('.display-none').show();
        }
        else {
            $('#btn-continue').html('Continue').prop('disabled', false);
            swal('status', res.Message, 'error');
        }
    });
});

$('#btn-signup').on('click',function () {

    if ($('#member-registration').valid() == false) {
        return false;
    }

    $('#btn-signup').html('Please wait..').prop('disabled', true);

    $.post('', { action: 'account-registration', UserName: $('#Username').val(), Password: $('#Password').val(), ConfirmPassword: $('#ConfirmPassword').val() })

    .done(function (res) {
        if (res.status == true) {
            $('.register-content').html(res.Message);
        }
        else {
            swal('status', res.Message, 'info');
            $('#btn-signup').html('Sign Up').prop('disabled', false);
        }
    });

    return false;
});