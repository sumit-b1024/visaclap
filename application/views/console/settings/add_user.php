<div class="row">
    <div class="col-md-12 col-xl-12">
    
        <div class="card">
            <div class="card-body">

                <form class="form-horizontal" id="add-form" class="login100-form" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">Firm Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control firm_name" name="firm_name" placeholder="Enter firm name" value="<?= isset($edit) && isset($edit->firm_name) ? $edit->firm_name : set_value('firm_name'); ?>" >
                                <span class="error-text error_firm_name"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">First Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control first_name" name="first_name" placeholder="Enter first name" value="<?= isset($edit) && isset($edit->first_name) ? $edit->first_name : set_value('first_name'); ?>" >
                                <span class="error-text error_first_name"></span>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-6 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">Last Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control last_name" name="last_name" placeholder="Enter last name" value="<?= isset($edit) && isset($edit->last_name) ? $edit->last_name : set_value('last_name'); ?>" >
                                <span class="error-text error_last_name"></span>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-6 mb-1">
                            <div class="form-group  input-inside">
                                <label class="form-label">Email <span class="text-red">*</span></label>
                                <input type="text" class="form-control email" name="email" placeholder="Enter email" value="<?= isset($edit) && isset($edit->email) ? $edit->email : set_value('email'); ?>" >
                                <span class="error-text error_email"></span>
                                <div id="ajax_loader_email" class="text-info small" style="display:none"><i class="fa fa-spinner fa-spin"></i> Checking...</div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-6 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">Contact No. <span class="text-red">*</span></label>
                                <input type="text" class="form-control numbers_only mobile" name="mobile" placeholder="Enter contact no." maxlength="10" value="<?= isset($edit) && isset($edit->mobile) ? $edit->mobile : set_value('mobile'); ?>" >
                                <span class="error-text error_mobile"></span>
                                <div id="ajax_loader_mobile" class="text-info small" style="display:none"><i class="fa fa-spinner fa-spin"></i> Checking...</div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-md-4 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">Role <span class="text-red">*</span></label>
                                <select class=" form-select role" name="role" data-placeholder="Choose role" <?php if($edit->role != "") { ?> disabled="true" <?php } ?>>
                                    <option value="">Choose role</option>
                                    <?php
                                    if(isset($role) && !empty($role))
                                    {
                                        foreach($role as $key => $value) : 
                                            $selected = (isset($edit) && isset($edit->role) && $edit->role == $key ? 'selected' : '');
                                            ?>
                                            <option value="<?= $key; ?>" <?= $selected; ?>>
                                                <?= toPropercase($value); ?>
                                            </option>
                                            <?php 
                                        endforeach;  
                                    }
                                    ?>
                                </select>
                                <span class="form-text text-danger error_role"></span>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4 mb-1 reference">
                            <div class="form-group input-inside">
                                <label class="form-label">Reference</label>
                                <select class=" form-select referencefield" name="refere_nces" data-placeholder="Choose Reference" <?php if($edit->refere_nces != "") { ?> disabled="disabled" <?php } ?>>
                                    <option value="">Choose Reference</option>
                                    <?php
                                    if(isset($reference) && !empty($reference))
                                    {
                                        foreach($reference as $key => $value) : 
                                            $selected = (isset($edit) && isset($edit->refere_nces) && $edit->refere_nces == $value->user_id ? 'selected' : '');
                                            ?>
                                            <option value="<?= $value->user_id; ?>" <?= $selected; ?>>
                                                <?= $value->first_name." ".$value->last_name; ?>
                                            </option>
                                            <?php 
                                        endforeach;  
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">Address </label>
                                <input type="text" class="form-control address" name="address" placeholder="Enter address" value="<?= isset($edit) && isset($edit->address) ? $edit->address : set_value('address'); ?>" >
                                <span class="error-text error_address"></span>
                            </div>
                        </div>

                        
                        <div class="col-sm-6 col-md-4 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">Country</label>
                                <select class="select2-show-search i_country form-select" name="country" value="" data-placeholder="Select Country" <?php if($edit->country != "") { ?>  disabled="disabled" <?php } ?> >
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                        </div>  
                        <div class="col-sm-6 col-md-4 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">State </label>
                                <input type="text" class="form-control state" name="state" placeholder="Enter state" value="<?= isset($edit) && isset($edit->state) ? $edit->state : set_value('state'); ?>" >
                                <span class="error-text error_state"></span>
                            </div>
                        </div>
                          
                        <div class="col-sm-6 col-md-4 mb-1">
                            <div class="form-group input-inside">
                                <label class="form-label">City </label>
                                <input type="text" class="form-control city" name="city" placeholder="Enter city" value="<?= isset($edit) && isset($edit->city) ? $edit->city : set_value('city'); ?>" >
                                <span class="error-text error_city"></span>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group input-inside">
                                <label class="form-label">Postal Code </label>
                                <input type="text" class="form-control postal_code numbers_only" name="postal_code" placeholder="Enter postal code" maxlength="6" value="<?= isset($edit) && isset($edit->postal_code) ? $edit->postal_code : set_value('postal_code'); ?>" >
                                <span class="error-text error_postal_code"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group input-inside">
                                <label class="form-label">Currency</label>
                                <!-- <input type="text" class="form-control currency char_only" name="currency" placeholder="Enter Currency" maxlength="3" minlength="3"value="<?= isset($edit) && isset($edit->currency) ? $edit->currency : set_value('currency'); ?>" > -->
                                 <select class=" form-select currency" name="currency" data-placeholder="Choose currency" <?php if($edit->cname != "") { ?> disabled="disabled" <?php } ?>>
                                    <option value="">Choose Currency</option>
                                    <?php
                                    if(isset($currency) && !empty($currency))
                                    {
                                        foreach($currency as $key => $value) : 
                                            $selected = (isset($edit) && isset($edit->currency) && $edit->currency == $value->curname ? 'selected' : '');
                                            ?>
                                            <option value="<?= $value->curname; ?>" <?= $selected; ?>>
                                                <?= $value->curname; ?>
                                            </option>
                                            <?php 
                                        endforeach;  
                                    }
                                    ?>
                                </select>


                                <span class="error-text error_currency_code"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" class="box-btn fill_primary mt-4 mb-0 submit_btn">
                                Submit
                            </button>
                            <input type="hidden" name="user_id" value="<?= isset($edit) && isset($edit->user_id) ? $edit->user_id : set_value('user_id'); ?>" />
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">

   var api_url = '<?php echo API_URL ?>';

   var country = '<?=isset($edit) && isset($edit->country) ? $edit->country : "";?>';
   var role = '<?=isset($edit) && isset($edit->role) ? $edit->role : "";?>';

   function get_all_country(){
    $.ajax({
     //url : api_url+"api/visacountry",
     url: base_url + 'settings/getvisacountry',
     type:"GET",
     dataType:"json",
     success:function(data){
      $.each(data.message, function (key, val) {
        let selected="";
                if(val.id == country){
                    selected = 'selected';
                }
       $(".i_country").append('<option value="'+val.id+'" '+selected+' data-id="'+val.id+'">'+val.name+'</option>');
   });
  }
});
}

$('.back_btn').click(function() {
    window.location.href = base_url + 'console/settings';
});

$(document).ready(function() {

    if(role == "3"){
        $('.reference').show();
    }else{
        $('.reference').hide();
    }

     $('body').on('change', '.role', function() {
         var role = $(this).find(":selected").val();
        if(role != "" && role == "3"){
        $('.reference').show();
    }else{
        $('.reference').hide();
    }
    });

    $(".char_only").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    });

      get_all_country();
    var continue_to = base_url + 'console/settings';
    
    $('body').on('change blur', 'input, select', function() {
        $(this).closest('.form-control').removeClass('is-invalid');
    });

    
    $('body').on('change blur', '.role', function() {
        $('.error_role').html('').hide();
        var role = $(this).val();
        if($(this).val().trim() == '') {
            $('.role').addClass('is-invalid');
            $('.error_role').html('Choose role').show();
        }
    });

     $('body').on('change blur', '.currency', function() {
        $('.error_currency_code').html('').hide();
        var role = $(this).val();
        if($(this).val().trim() == '') {
            $('.currency').addClass('is-invalid');
            $('.error_currency_code').html('Choose currency').show();
        }
    });




    $('body').on('change blur', '.firm_name', function() {
        $('.error_firm_name').html('').hide();
        $('.firm_name').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.firm_name').addClass('is-invalid');
            $('.error_firm_name').html('Enter firm name').show();
        }
    });

    $('body').on('change blur', '.first_name', function() {
        $('.error_first_name').html('').hide();
        $('.first_name').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.first_name').addClass('is-invalid');
            $('.error_first_name').html('Enter first name').show();
        }
    });



    $('body').on('change blur', '.last_name', function() {
        $('.error_last_name').html('').hide();
        if($(this).val().trim() == '') {
            $('.error_last_name').html('Enter last name').show();
        }
    });

    



    $('body').on('change blur', '.email', function() {
        $('.error_email').html('').hide();
        if($(this).val().trim() == '') {
            $('.error_email').html('Enter email address').show();
        } else if( ! validateEmail($(this).val().trim())) {
            $('.error_email').html('Enter valid email address').show();
        } else {
                $('#ajax_loader_email').show();
                $('.submit_btn').prop('disabled', false);
                var email = $(this).val().trim();
                $.ajax({
                        type: 'POST',
                        url:  base_url + 'common/ajax-check-user-exist',
                        data: {'email':email},
                        dataType: 'json',
                        success: function(data) {
                            setTimeout(function() {
                                $('#ajax_loader_email').hide();
                                if(data.user_exist == true)
                                {
                                    email_exist = true;
                                    $('.submit_btn').prop('disabled', true);

                                    $('.email').val('');
                                    $('.error_email').html('This email id is already exist').show();
                                } else {
                                    $('.submit_btn').prop('disabled', false);
                                }
                            }, 1000);
                        },
                        error: function(data)
                        {
                            ajax_error_swal(data.status);
                        }
                });
        }
    });

    $('body').on('change blur', '.mobile', function() {
        $('.error_mobile').html('').hide();
        if($('.mobile').val().trim() == '') {
            $('.error_mobile').html('Enter contact no').show();
        } else if(!validateNumber($(this).val().trim())) {
            $('.error_mobile').html('Enter valid contact no').show();
        } else if(!validateMobile($(this).val().trim())) {
            $('.error_mobile').html('Enter 10 digit contact no').show();
        }  else {
                $('#ajax_loader_mobile').show();
                $('.submit_btn').prop('disabled', false);
                var mobile = $(this).val().trim();
                $.ajax({
                        type: 'POST',
                        url:  base_url + 'common/ajax-check-user-exist',
                        data: {'mobile':mobile},
                        dataType: 'json',
                        success: function(data) {
                            setTimeout(function() {
                                $('#ajax_loader_mobile').hide();
                                if(data.user_exist == true)
                                {
                                    email_exist = true;
                                    $('.submit_btn').prop('disabled', true);

                                    $('.mobile').val('');
                                    $('.error_mobile').html('This mobile number is already exist').show();
                                } else {
                                    $('.submit_btn').prop('disabled', false);
                                }
                            },1000);
                        },
                        error: function(data)
                        {
                            ajax_error_swal(data.status);
                        }
                });
        }
    });

    $('.postal_code').change(function() {
        $('.error_postal_code').html('').hide();
        if($('.postal_code').val().trim() == '') {
            $('.error_postal_code').html('Enter postal code').show();
        } else if( ! validateNumber($('.postal_code').val().trim())) {
            $('.error_postal_code').html('Only numbers are allowed').show();
        } else if( ! validateOtp($('.postal_code').val().trim())) {
            $('.error_postal_code').html('Enter 6 digit postal code').show();
        }
    });

    $('#add-form').submit(function(e) {
        var isValid = 1;

        if($('.role').val() == '') {
            isValid = 0;
            $('.role').addClass('is-invalid');
            $('.error_role').html('Choose role').show();
        }

        if($('.currency').val() == '') {
            isValid = 0;
            $('.currency').addClass('is-invalid');
            $('.error_currency_code').html('Choose currency').show();
        }




        if($('.firm_name').val().trim() == '') {
            isValid = 0;
            $('.firm_name').addClass('is-invalid');
            $('.error_firm_name').html('Enter firm name').show();
        }

        if($('.first_name').val().trim() == '') {
            isValid = 0;
            $('.first_name').addClass('is-invalid');
            $('.error_first_name').html('Enter first name').show();
        }

        if($('.last_name').val().trim() == '') {
            isValid = 0;
            $('.last_name').addClass('is-invalid');
            $('.error_last_name').html('Enter last name').show();
        }

        

        if($('.email').val().trim() == '') {
            isValid = 0;
            $('.email').addClass('is-invalid');
            $('.error_email').html('Enter email address').show();
        } else if(! validateEmail($('.email').val().trim())) {
            isValid = 0;
            $('.email').addClass('is-invalid');
            $('.error_email').html('Enter valid email address').show();
        }
        
        if($('.mobile').val().trim() == '') {
            isValid = 0;
            $('.mobile').addClass('is-invalid');
            $('.error_mobile').html('Enter contact no').show();
        } else if(!validateNumber($('.mobile').val().trim())) {
            isValid = 0;
            $('.mobile').addClass('is-invalid');
            $('.error_mobile').html('Enter valid contact no').show();
        } else if(!validateMobile($('.mobile').val().trim())) {
            isValid = 0;
            $('.mobile').addClass('is-invalid');
            $('.error_mobile').html('Enter 10 digit contact no').show();
        }

        if($('.postal_code').val().trim() != '') {
                /*isValid = 0;
                $('.postal_code').addClass('is-invalid');
                $('.error_postal_code').html('Enter postal code').show();
            } else*/ if( ! validateNumber($('.postal_code').val().trim())) {
                isValid = 0;
                $('.postal_code').addClass('is-invalid');
                $('.error_postal_code').html('Enter valid postal code').show();
            } else if( ! validateOtp($('.postal_code').val().trim())) {
                isValid = 0;
                $('.postal_code').addClass('is-invalid');
                $('.error_postal_code').html('Enter 6 digit postal code').show();
            }
        }

        if(!isValid) {
            e.preventDefault();
        } else {
            // Start Block UI
            /*KTApp.blockPage({
                overlayColor: 'red',
                opacity: 0.1,
                state: 'primary' // a bootstrap color
            });

            setTimeout(function() {
                KTApp.unblockPage();
            }, 2000);*/
            // End Block UI
        }
    });

    $(window).bind('pageshow', function() {
        var form = $('form'); 
        form[0].reset();
    });
});
</script>