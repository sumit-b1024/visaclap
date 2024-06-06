<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/checkEmail.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/global.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/newdesign.css'); ?>" />
    
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
    />
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script>
      var base_url = '<?= ROOT_URL; ?>';
    </script>
  </head>
  <body>
<div class="forgot-password" data-animate-on-scroll>
     
      <div class="header-navigation">
        <img class="logo-icon" alt="" src="<?php echo base_url('assets/public/vughylogo.svg'); ?>" />
      </div>
      <div class="content forgotform">
        <div class="header">
          <img class="featured-icon" alt="" src="<?php echo base_url('assets/public/featured-icon.svg'); ?>" />

          <div class="text-and-supporting-text">
            <div class="text">Forgot password?</div>
            <div class="supporting-text">
              No worries, we’ll send you reset instructions.
            </div>
          </div>
           <div id="error_form"></div>
        </div>
        <form action="javascript:;" id="forgt_password" class="forgt_password text-and-supporting-text" method="post">
        <div class="content1">
          <div class="form">
            <div class="input-field">
              <div class="input-field">
                <div class="label">Email</div>
                <input class="input" type="email" name="email" id="username" placeholder="Enter your email" required />
                <div class="invalid-feedback error_username"></div>
              </div>
              <div class="hint-text">This is a hint text to help user.</div>
            </div>
          </div>
          <button type="submit" class="button" id="resetBtn">
            <img
              class="placeholder-icon"
              alt=""
              src="<?php echo base_url('assets/public/placeholder.svg'); ?>"
            />

            <div class="text1">Reset password</div>
            <img
              class="placeholder-icon"
              alt=""
              src="<?php echo base_url('assets/public/placeholder.svg'); ?>"
            />
          </button>
        </div>
      </form>
        <button class="button1" id="backLoginBtn">
          <img class="arrow-left-icon" alt="" src="<?php echo base_url('assets/public/arrowleft.svg'); ?>" />

          <a href="<?php echo base_url() ?>account"><div class="text2">Back to log in</div></a>
          <img
            class="placeholder-icon"
            alt=""
            src="<?php echo base_url('assets/public/placeholder1.svg'); ?>"
          />
        </button>
      </div>
      <div class="content forgotsucess">
        <div class="header">
          <img class="featured-icon" alt="" src="<?php echo base_url('assets/public/email.svg'); ?>" />

          <div class="text-and-supporting-text">
            <div class="text">Check your email</div>
            <div class="supporting-text">
              We sent a password reset link to <span class="ereplce">olivia@untitledui.com</span>
            </div>
          </div>
        </div>
        <div class="content1">
          <button class="button" id="resetBtn">

            <div class="text1">Open email app</div>
          </button>
          <div class="supporting-text">
            Didn’t receive the email? <span class="resendEmailClick">Click to resend</span>
          </div>
        </div>
        <button class="button1" id="backLoginBtn">
          <img class="arrow-left-icon" alt="" src="<?php echo base_url('assets/public/arrowleft.svg'); ?>" />

          <a href="<?php echo base_url() ?>account"><div class="text2">Back to log in</div></a>
          <img
            class="placeholder-icon"
            alt=""
            src="<?php echo base_url('assets/public/placeholder1.svg'); ?>"
          />
        </button>
      </div>
    </div>

      <script type="text/javascript">
$(document).ready(function()
{
    var continue_to = base_url + 'account';
    $('.forgotsucess').hide();
    $(document).bind('keypress', function(e) {
        if(e.keyCode==13) {
            $('#resetBtn').trigger('click');
        }
    });

    $('#username').change(function() {
        $('.error_username').hide();
        $(this).parents('.input-field').removeClass('has-error');
        if($(this).val().trim() == '') {
            $(this).parents('.input-field').addClass('has-error');
            $('.error_username').html('Enter email address').show();
        }
    });

    $('#resetBtn').click(function(event) {
        event.preventDefault();
        var is_valid = 1;
        if($('#username').val() == '') {
            is_valid = 0;
            $('.username').parents('.input-field').addClass('has-error');
            $('.error_username').html('Enter email address').show();
        }

        

        if(is_valid) {
            submit_login_form();
        }
    });

    function submit_login_form()
    {
        $('#resetBtn').html('<div class="text6">Connecting...</div>');
        $.ajax({
            type: 'POST',
            url: base_url + 'account/ajax-forgot',
            data: $('#forgt_password').serialize(),
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                $('#error_form').html('').hide();
                $('.ereplce').html('');
                if(data.status == 'success') {
                    $('.forgotsucess').show();
                    $('.forgotform').hide();

                    $('.ereplce').html(data.data);
                     $('#error_form').html('<div class="alert alert-sucess alert-white alert-shadow gutter-b" role="alert">\
                            <div class="alert-icon">\
                                <i class="flaticon-information text-danger"></i>\
                            </div>\
                            <div class="invalid-feedback alert-text text-danger font-size-h4">Please Check your email</div>\
                        </div>').show();
                    
                    /*setTimeout(function() {
                        $('#resetBtn').html('<span class="fa fa-spinner fa-spin"></span> Redirecting...');
                    }, 700);

                    setTimeout(function() {
                        window.location = continue_to;
                    }, 1000)*/
                }

                if(data.status == 'error') {
                    $('#resetBtn').html('<div class="text6">Sign in</div>');
                    var error_msg;
                    if(data.error_type == 'login') {
                        $('#username').parents('.input-field').addClass('has-error');
                        error_msg = 'Invalid email address !';
                    }
                    
                    $('#error_form').html('<div class="alert alert-error alert-white alert-shadow gutter-b" role="alert">\
                            <div class="alert-icon">\
                                <i class="flaticon-information text-danger"></i>\
                            </div>\
                            <div class="invalid-feedback alert-text text-danger font-size-h4">'+ error_msg +'</div>\
                        </div>').show();
                }

            }, error: function(data) {
                $('#login_btn').html('Sign In');
                quick_swal(data.status);
            }
        });
    }
    // end login form
});
</script>
    <script>
      var scrollAnimElements = document.querySelectorAll("[data-animate-on-scroll]");
      var observer = new IntersectionObserver(
        (entries) => {
          for (const entry of entries) {
            if (entry.isIntersecting || entry.intersectionRatio > 0) {
              const targetElement = entry.target;
              targetElement.classList.add("animate");
              observer.unobserve(targetElement);
            }
          }
        },
        {
          threshold: 0.15,
        }
      );
      
      for (let i = 0; i < scrollAnimElements.length; i++) {
        observer.observe(scrollAnimElements[i]);
      }
      </script>