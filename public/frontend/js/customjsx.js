//start menu cart dynamic with scroll
$(window).scroll(function() {
    if ($(this).scrollTop() >= 180) { //height mapping
        $("#dynamic_cart_display").css({
            'display': 'block'
        });
    } else {
        $("#dynamic_cart_display").css({
            'display': 'none'
        });
    }
}); //menu cart dynamic with scroll end

//customer registration
$(document).on('click', '.register-btn', function(e) {
    e.preventDefault();
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var password = $("#password").val();
    if (name == '') {
        $(".name_err").html('Name Cannot Be Empty!');
        return;
    } else {
        $(".name_err").html('');
    }
    if (email == '') {
        $(".email_err").html('Email Cannot Be Empty!');
        return;
    } else {
        $(".email_err").html('');
    }
    if (phone == '') {
        $(".phone_err").html('Phone Cannot Be Empty!');
        return;
    } else {
        $(".phone_err").html('');
    }
    if (password == '') {
        $(".password_err").html('Password Cannot Be Empty!');
        return;
    } else {
        $(".password_err").html('');
    }
    if (password.length < 4) {
        $(".password_err").html('Sorry! minimum password length is 4');
        return;
    } else {
        $(".password_err").html('');
    }
    $(".register-btn").attr('disabled', true);
    $.ajax({
        url: "/customer/register",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            name: name,
            email: email,
            phone: phone,
            password: password
        },
        datatype: "JSON",
        beforeSend: function() {
            $(".register-btn").html('<b>Please Wait...</b>');
        },
        success: function(data) {
            $(".register-btn").attr('disabled', false);
            if (data.status == 'success') { //data save
                $("#name").val('');
                $("#email").val('');
                $("#phone").val('');
                $("#password").val(''); //reset value
                $("#register_form").css({
                    'display': 'none'
                });
                $("#codeverify_form").css({
                    'display': 'block'
                });
            } else if (data.status == 'error') { //error occure
                $(".alert_message").html('<b class="text-danger line-height-custom">Sorry! Phone number or email already exists. Please use reset password option or login with OTP.</b>');
                $(".register-btn").html('<b>Register Now</b>');
                setTimeout(() => { //reset message field
                    $('.alert_message').html('');
                }, 8000);
            }
        }
    });
});
//customer Code verification
$(document).on('click', '.otp-verify-btn', function(e) {
    e.preventDefault();
    var otp_code = $("#otp_code").val();
    if (otp_code == '') {
        $(".code_err").html('Code Cannot Be Empty!');
        return;
    } else {
        $(".code_err").html('');
    }
    $.ajax({
        url: "/customer/otp-verify",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            otp_code: otp_code
        },
        datatype: "JSON",
        success: function(data) {
            if (data.status == 'success') { //data save
                $(".alert_message").html('<b class="text-success">Registration Completed . Try to Login.</b>');
                setTimeout(() => { //reset message field
                    $('.alert_message').html('');
                }, 8000);
                window.location.href = "/checkout/index";
            } else if (data.status == 'error') { //error occure
                $(".alert_message").html('<b class="text-danger">Invalid OTP Code.Try again.</b>');
                setTimeout(() => { //reset message field
                    $('.alert_message').html('');
                }, 8000);
            }
        }
    });
});
//cusstomer login
$(document).on('click', '.login-btn', function(e) {
    e.preventDefault();
    var login_email = $("#singin-email").val();
    var login_pass = $("#singin-password").val();
    if (login_email == '') {
        $(".login_email_err").html('Email or Phone Cannot Be Empty!');
        return;
    } else {
        $(".login_email_err").html('');
    }
    if (login_pass == '') {
        $(".login_pass_err").html('Password Cannot Be Empty!');
        return;
    } else {
        $(".login_pass_err").html('');
    }
    $.ajax({
        url: "/customer/doLogin",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            login_email: login_email,
            login_pass: login_pass
        },
        datatype: "JSON",
        success: function(data) {
            if (data.status == 'success') { //data save
                window.location.href = "/checkout/index";
            } else if (data.status == 'error') { //error occure
                $(".alert_message").html('<b class="text-danger">Invalid Credentials.Try again.</b>');
                setTimeout(() => { //reset message field
                    $('.alert_message').html('');
                }, 8000);
            }
        }
    });
});
//otp login function
$(document).on('click', '.otp-login-btn', function() {
    $(".login-form").slideToggle();
    $(".otp-phone-number").slideToggle();
});
//send otp
$(document).on('click', '.send-otp', function() {
    $(".send-otp").attr('disabled', true);
    var phone = $("#otp-phone").val();
    if (phone == '') {
        $(".otp_phone_err").html('Phone Number Cannot Be Empty!');
        $(".send-otp").attr('disabled', false);
        return;
    } else {
        if (phone.length < 10) {
            $(".otp_phone_err").html('Invalid Phone Number!');
            $(".send-otp").attr('disabled', false);
            return;
        } else {
            $(".otp_phone_err").html('');
        }
    }
    $.ajax({
        url: "/customer/send-otp",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            phone: phone,
        },
        datatype: "JSON",
        beforeSend: function() {
            $(".send-otp").html('<b>Please Wait...</b>');
        },
        success: function(data) {
            if (data.status == 'success') { //data save
                $(".otp-phone-number").hide();
                $("#login-otp-phone1").val(phone);
                $(".login-code-submisstion-form").slideDown();
            }
        }
    });
});
//login witn otp and phone number
$(document).on('click', '.login-with-otp-btn', function(e) {
    e.preventDefault();
    var varify_otp = $("#login-otp-code").val();
    var userPhone = $("#login-otp-phone1").val();
    if (varify_otp == '') {
        $(".otp_code_err2").html('Code Cannot Be Empty!');
        return;
    } else {
        $(".otp_code_err2").html('');
    }
    $.ajax({
        url: "/customer/login-with-otp",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            varify_otp: varify_otp,
            userPhone: userPhone
        },
        datatype: "JSON",
        success: function(data) {
            if (data.status == 'success') { //data save
                $(".alert_message").html('<b class="text-success">Congrats ! Registration Completed.</b>');
                setTimeout(() => { //reset message field
                    $('.alert_message').html('');
                }, 8000);
                window.location.href = "/checkout/index";
            } else if (data.status == 'error') { //error occure
                $(".alert_message").html('<b class="text-danger">Invalid OTP Code.Try again.</b>');
                setTimeout(() => { //reset message field
                    $('.alert_message').html('');
                }, 8000);
            }
        }
    });
});
//forgot password display layout
$(document).on("click", ".forgot-passwords1", function() {
    $(".login-form").hide();
    $(".forgot-password-form").slideDown();
});
//forgot password send mail
$(document).on("click", ".forgot-password-btn", function() {
    var forgote_email = $("#forgote-email").val();
    if (forgote_email == '') {
        $(".forgote_email_err").html('Email Cannot Be Empty!');
        return;
    } else {
        $(".forgote_email_err").html('');
    }
    $(".forgot-password-btn").attr('disabled', true);
    $.ajax({
        url: "/forgot-password/send-email",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            forgote_email: forgote_email,
        },
        datatype: "JSON",
        beforeSend: function() {
            $(".forgot-password-btn").html('<b>Please Wait...</b>');
        },
        success: function(data) {
            if (data.status == 'success') { //data save
                $(".forgot-password-btn").attr('disabled', false);
                $(".forgot-password-btn").html('<b>Reset Password</b>');
                $(".alert_message").html('<b class="text-success">Email has been sent.Please check your email.</b>');
                setTimeout(() => { //reset message field
                    $('.alert_message').html('');
                }, 8000);
                $("#forgote-email").val('');
            }
            if (data.status == 'error') { //data save
                $(".forgot-password-btn").attr('disabled', false);
                $(".forgot-password-btn").html('<b>Reset Password</b>');
                $(".alert_message").html('<b class="text-danger">No Account Found With That Email.</b>');
                setTimeout(() => { //reset message field
                    $('.alert_message').html('');
                }, 8000);
            }
        }
    });
});

//desktop app bar remove
$(document).on("click", "#desktop-app-bar-close", function() {
    $(".header-desktop-app-bar").slideUp(400, function() {
        $(this).remove();
    });
});

//mobile app bar remove
$(document).on("click", ".mobile-app-bar-close", function() {
    $(".header-mobile-app-bar").remove();
});

// <!-- App link bar -->
$(document).ready(function() {
    if (window.innerWidth < 992) {
        $('.header-mobile-app-bar').removeClass('d-none');
        $('.header-desktop-app-bar').remove();
        $(".footer-app-link").attr('href', 'https://cutt.ly/EBnLOpM');
    } else {
        $('.header-desktop-app-bar').removeClass('d-none');
        $('.header-mobile-app-bar').remove();
        $(".footer-app-link").attr('href', '/app/download-app');
    }
});
