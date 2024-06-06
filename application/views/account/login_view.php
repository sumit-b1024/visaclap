<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>" />
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
    <div class="log-in">
      <div class="sign-up">
        <div class="section" data-animate-on-scroll>
          <div class="header-navigation">
            <img class="logo-icon" alt="" src="<?php echo base_url('assets/public/vughylogo.svg'); ?>" />
          </div>
          <div class="para">
            <div class="frame">
              <div class="container" data-animate-on-scroll>
                <!-- slide show start -->
                <div class="content mySlides" data-animate-on-scroll>
                  <div class="stars">
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
                  </div>
                  <div class="text">
                    Create beautiful travel itineraries with just a few clicks.
                    Our intuitive interface makes it easy for you to add
                    activities, accommodations, and transportation details to your
                    itinerary.
                  </div>
                  <div class="quote-attribution">
                    <div class="avatar one">
                      <img
                        class="avatar-company-icon"
                        alt=""
                        src="<?php echo base_url('assets/public/-avatar-company-icon@2x.png'); ?>"
                      />
                    </div>
                    <div class="text-and-supporting-text">
                      <div class="text1">Lori Bryson</div>
                      <div class="supporting-text">
                        Product Designer, Sisyphus
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="content mySlides" data-animate-on-scroll>
                  <div class="stars">
                   <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
                  </div>
                  <div class="text">
                    Create beautiful travel itineraries with just a few clicks.
                    Our intuitive interface makes it easy for you to add
                    activities, accommodations, and transportation details to your
                    itinerary.
                  </div>
                  <div class="quote-attribution">
                    <div class="avatar two">
                      <img
                        class="avatar-company-icon"
                        alt=""
                        src="<?php echo base_url('assets/public/-avatar-company-icon@2x.png'); ?>"
                      />
                    </div>
                    <div class="text-and-supporting-text">
                      <div class="text1">Lori Bryson</div>
                      <div class="supporting-text">
                        Product Designer, Sisyphus
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="content mySlides" data-animate-on-scroll>
                  <div class="stars">
                     <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
  
                    <img class="star-icon" alt="" src="<?php echo base_url('assets/public/star-icon.svg'); ?>" />
                  </div>
                  <div class="text">
                    Create beautiful travel itineraries with just a few clicks.
                    Our intuitive interface makes it easy for you to add
                    activities, accommodations, and transportation details to your
                    itinerary.
                  </div>
                  <div class="quote-attribution">
                    <div class="avatar three">
                      <img
                        class="avatar-company-icon"
                        alt=""
                        src="<?php echo base_url('assets/public/-avatar-company-icon@2x.png'); ?>"
                      />
                    </div>
                    <div class="text-and-supporting-text">
                      <div class="text1">Lori Bryson</div>
                      <div class="supporting-text">
                        Product Designer, Sisyphus
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- slide show end -->
                <!-- pagination buttons -->
                <div class="pagination">
                  <button class="button prev" id="prev" onclick="plusSlides(-1)">
                    <img
                      class="star-icon"
                      alt=""
                      src="<?php echo base_url('assets/public/chevronleft.svg'); ?>"
                    />
                  </button>
                  <div class="pagination-dot-group">
                    <div class="pagination-dot-indicator dot" onclick="currentSlide(1)"></div>
                    <div class="pagination-dot-indicator1 dot " onclick="currentSlide(2)"></div>
                    <div class="pagination-dot-indicator1 dot" onclick="currentSlide(3)"></div>
                    <!-- <div class="pagination-dot-indicator4"></div>
                    <div class="pagination-dot-indicator4"></div>
                    <div class="pagination-dot-indicator4"></div>
                    <div class="pagination-dot-indicator4"></div>
                    <div class="pagination-dot-indicator4"></div>
                    <div class="pagination-dot-indicator4"></div> -->
                  </div>
                  <button class="button next" id="next" onclick="plusSlides(1)">
                    <img
                      class="star-icon"
                      alt=""
                      src="<?php echo base_url('assets/public/chevronright.svg'); ?>"
                    />
                  </button>
                </div>
               
              </div>
            </div>
          </div>
          <div class="footer" data-animate-on-scroll>
            <div class="helpuntitleduicom">© Vughy</div>
            <div class="row">
              <img class="mail-01-icon" alt="" src="<?php echo base_url('assets/public/mail01.svg'); ?>" />

              <div class="helpuntitleduicom"></div>
            </div>
          </div>
        </div>
        <div class="section1">
          <div class="header-navigation Logoreverse">
            <img class="logo-icon" alt="" src="<?php echo base_url('assets/public/vughyLogo.svg'); ?>" />
          </div>
          <div class="container1" data-animate-on-scroll>
            <div class="content1">
              <div class="text-and-supporting-text1">
                <div class="text3">Welcome back</div>
                <div class="supporting-text1">
                  Welcome back! Please enter your details.
                </div>
                <div id="error_form"></div>
              </div>
              
                <form action="javascript:;" id="login_form" class="content2" method="post">
                <div class="form">
                  <div class="input-field">
                    <div class="input-field">
                      <div class="label">Email</div>
                      <input class="input100 border-start-0 form-control ms-0 input" type="text" placeholder="Enter your email" name="username" id="username">
                      <div class="invalid-feedback error_username"></div>
                    </div>
                    <div class="hint-text">
                      This is a hint text to help user.
                    </div>
                  </div>
                  <div class="input-field">
                    <div class="input-field">
                      <div class="label">Password</div>
                      <input class="input1" type="password" required id="password" name="password" placeholder="Enter your password" />
                      <div class="invalid-feedback error_password"></div>
                    </div>
                    <div class="hint-text">
                      This is a hint text to help user.
                    </div>
                  </div>
                </div>
                <div class="row1">
                  <div class="checkbox">
                    <div class="input2">
                      <input class="checkbox-base" name="remember_me" type="checkbox" />
                    </div>
                    <div class="text-and-supporting-text2">
                      <div class="text4">Remember for 30 days</div>
                      <div class="hint-text">
                        Save my login details for next time.
                      </div>
                    </div>
                  </div>
                  <div class="button2">
                    <img
                      class="placeholder-icon"
                      alt=""
                      src="<?php echo base_url('assets/public/placeholder.svg'); ?>"
                    />

                   <!--  <button class="text5" id="forgotBtn">
                      Forgot password
                    </button> -->
                    <a href="<?php echo base_url() ?>account/forgotpassword" class="text5" id="forgotBtn">Forgot password</a>
                    <img
                      class="placeholder-icon"
                      alt=""
                      src="<?php echo base_url('assets/public/placeholder.svg'); ?>"
                    />
                  </div>
                </div>
                <div class="actions">
                  <button type="submit" class="button3" id="login_btn">
                    
                    <img
                      class="placeholder-icon"
                      alt=""
                      src="<?php echo base_url('assets/public/placeholder1.svg'); ?>"
                    />

                    <div class="text6">Sign in</div>
                    <img
                      class="placeholder-icon"
                      alt=""
                      src="<?php echo base_url('assets/public/placeholder1.svg'); ?>"
                    />
                  </button>
                  <button class="social-button-groups" autofocus>
                    <button class="social-button" id="GBtn">
                      <img
                        class="social-icon"
                        alt=""
                        src="<?php echo base_url('assets/public/social-icon.svg'); ?>"
                      />

                      <div class="text7">Sign in with Google</div>
                    </button>
                    <div class="social-button1">
                      <img
                        class="social-icon"
                        alt=""
                        src="<?php echo base_url('assets/public/social-icon1.svg'); ?>"
                      />

                      <div class="text7">Sign in with Facebook</div>
                    </div>
                    <div class="social-button1">
                      <img
                        class="social-icon"
                        alt=""
                        src="<?php echo base_url('assets/public/social-icon2.svg'); ?>"
                      />

                      <div class="text7">Sign in with Apple</div>
                    </div>
                    <div class="social-button1">
                      <img
                        class="social-icon"
                        alt=""
                        src="<?php echo base_url('assets/public/social-icon3.svg'); ?>"
                      />

                      <div class="text7">Sign in with Twitter</div>
                    </div>
                  </button>
                </div>
              </form>
              <div class="row2">
                <div class="helpuntitleduicom">Don’t have an account?</div>
                <div class="button4">
                  <img
                    class="placeholder-icon"
                    alt=""
                    src="<?php echo base_url('assets/public/placeholder2.svg'); ?>"
                  />

                  <button class="text5" id="SignUpBtn">Sign up</button>
                  <img
                    class="placeholder-icon"
                    alt=""
                    src="<?php echo base_url('assets/public/placeholder.svg'); ?>"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
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
        $(this).parents('.input-field').removeClass('has-error');
        if($(this).val().trim() == '') {
            $(this).parents('.input-field').addClass('has-error');
            $('.error_username').html('Enter email address').show();
        }
    });

    $('#password').change(function() {
        $('.error_password').hide();
        $(this).parents('.input-field').removeClass('has-error');
        if($(this).val() == '') {
            $(this).parents('.input-field').addClass('has-error');
            $('.error_password').html('Enter password').show();
        }
    });

    $('#login_btn').click(function(event) {
        event.preventDefault();
        var is_valid = 1;
        if($('#username').val() == '') {
            is_valid = 0;
            $('.username').parents('.input-field').addClass('has-error');
            $('.error_username').html('Enter email address').show();
        }

        if($('#password').val() == '') {
            is_valid = 0;
            $('#password').parents('.input-field').addClass('has-error');
            $('.error_password').html('Enter password').show();
        }

        if(is_valid) {
            submit_login_form();
        }
    });

    function submit_login_form()
    {
        $('#login_btn').html('<div class="text6">Connecting...</div>');
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
                    $('#login_btn').html('<div class="text6">Sign in</div>');
                    var error_msg;
                    if(data.error_type == 'login') {
                        $('#username').parents('.input-field').addClass('has-error');
                        error_msg = 'Invalid email address !';
                    }
                    if(data.error_type == 'password') {
                        $('#password').parents('.input-field').addClass('has-error');
                        error_msg = 'Invalid password !';
                    }
                    $('#error_form').html('<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">\
                            <div class="alert-icon">\
                                <i class="flaticon-information text-danger"></i>\
                            </div>\
                            <div class="alert-text text-danger font-size-h4 text-red">'+ error_msg +'</div>\
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
  <script>

      var text12 = document.getElementById("SignUpBtn");
      if (text12) {
        text12.addEventListener("click", function (e) {
          // Please sync "Sign Up" to the project
        });
      }
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


      // slide show
      let slideIndex = 1;
      showSlides(slideIndex);

      // Next/previous controls
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      // Thumbnail image controls
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
      }
      </script>