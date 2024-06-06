<div class="page">
    <div class="">
        <!-- CONTAINER OPEN -->
        <div class="col col-login mx-auto mt-7">
            <div class="text-center">
                <img src="<?= LOGO; ?>" class="header-brand-img w9" alt="<?= BASE_NAMESMALL; ?>">
            </div>
        </div>

        <div class="container-login100">
            <div class="wrap-login100 p-6">
                <form action="javascript:;" id="login_form" class="login100-form validate-form" method="post">
                    <span class="login100-form-title pb-5">
                        Login
                    </span>

                    <div id="error_form"></div>

                    <div class="panel panel-primary">
                        <div class="panel-body tabs-menu-body p-0 pt-5">
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 form-control ms-0" type="text" placeholder="Email" name="username" id="username">
                                <div class="invalid-feedback error_username"></div>
                            </div>

                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye 
                                    text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 form-control ms-0" type="password" placeholder="Password" name="password" id="password">
                                <div class="invalid-feedback error_password"></div>
                            </div>
                            
                            <div class="container-login100-form-btn">
                                <button type="submit" id="login_btn" class="login100-form-btn btn-primary">
                                    Sign In
                                </button>
                            </div>
                            <!-- <div class="text-center pt-3">
                                <p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ms-1">Sign UP</a></p>
                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
<script type="text/javascript">
$(document).ready(function()
{
    var continue_to = base_url + 'account';

    $(document).bind('keypress', function(e) {
        if(e.keyCode==13) {
            $('#login_btn').trigger('click');
        }
    });

    $('#username').change(function() {
        $('.error_username').hide();
        $(this).parents('.form-group').removeClass('has-error');
        if($(this).val().trim() == '') {
            $(this).parents('.form-group').addClass('has-error');
            $('.error_username').html('Enter email address').show();
        }
    });

    $('#password').change(function() {
        $('.error_password').hide();
        $(this).parents('.form-group').removeClass('has-error');
        if($(this).val() == '') {
            $(this).parents('.form-group').addClass('has-error');
            $('.error_password').html('Enter password').show();
        }
    });

    $('#login_btn').click(function(event) {
        event.preventDefault();
        var is_valid = 1;
        if($('#username').val() == '') {
            is_valid = 0;
            $('.username').parents('.form-group').addClass('has-error');
            $('.error_username').html('Enter email address').show();
        }

        if($('#password').val() == '') {
            is_valid = 0;
            $('#password').parents('.form-group').addClass('has-error');
            $('.error_password').html('Enter password').show();
        }

        if(is_valid) {
            submit_login_form();
        }
    });

    function submit_login_form()
    {
        $('#login_btn').html('<span class="fa fa-spinner fa-spin"></span> Connecting...');
        $.ajax({
            type: 'POST',
            url: base_url + 'account/ajax-login',
            data: $('#login_form').serialize(),
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                $('#error_form').html('').hide();
                if(data.status == 'success') {
                    $('#login_btn').html('<span class="fa fa-check"></span> Sign In Successful...');
                    
                    setTimeout(function() {
                        $('#login_btn').html('<span class="fa fa-spinner fa-spin"></span> Redirecting...');
                    }, 700);

                    setTimeout(function() {
                        window.location = continue_to;
                    }, 1000)
                }

                if(data.status == 'error') {
                    $('#login_btn').html('Sign In');
                    var error_msg;
                    if(data.error_type == 'login') {
                        $('#username').parents('.form-group').addClass('has-error');
                        error_msg = 'Invalid email address !';
                    }
                    if(data.error_type == 'password') {
                        $('#password').parents('.form-group').addClass('has-error');
                        error_msg = 'Invalid password !';
                    }
                    $('#error_form').html('<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">\
                            <div class="alert-icon">\
                                <i class="flaticon-information text-danger"></i>\
                            </div>\
                            <div class="alert-text text-danger font-size-h4">'+ error_msg +'</div>\
                        </div>').show();
                }

                if(data.status == 'fail') {
                    $('#login_btn').html('Sign In');
                    if(data.error_type == 'email_verification') {
                        quick_swal('info','email address verification pending!<br/>Check your mailbox for email varification link.');
                    }
                    if(data.error_type == 'inactive') {
                        quick_swal('info',"Your account is inactive.<br/> Contact site administrator for further assistance.");
                    }
                    if(data.error_type == 'deactivated') {
                        quick_swal('error','Your account has been deactivated.<br/>Contact site administrator for further assistance.');
                    }
                    if(data.error_type == 'deleted') {
                        quick_swal('error','Your account has been blocked.<br/>Contact site administrator for further assistance.');
                    }
                    if(data.error_type == 'no_login_rights') {
                        quick_swal('warning','Your login has been restricted by admin.<br/>Contact site administrator for further assistance.');
                    }
                    if(data.error_type == 'database') {
                        quick_swal();
                    }
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