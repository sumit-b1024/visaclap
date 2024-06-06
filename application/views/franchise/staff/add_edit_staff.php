<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card">
			<div class="card-body">
				<form class="form-horizontal add_staff_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-md-12 mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> Name <span class="text-red">*</span></label>
								<input type="text" name="s_name" class="form-control s_name" placeholder="Enter Name" value="<?php echo isset($old_data) && $old_data->first_name ? $old_data->first_name : ""; ?>">
							</div>
						</div>

						<div class="col-sm-12 col-md-12 mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> Email <span class="text-red">*</span></label>
								<input type="email" name="s_email" class="form-control s_email" placeholder="Enter Email" value="<?php echo isset($old_data) && $old_data->email ? $old_data->email : ""; ?>" autocomplete="no-fill">
								 <span class="error-text error_email"></span>
                                <div id="ajax_loader_email" class="text-info small" style="display:none"><i class="fa fa-spinner fa-spin"></i> Checking...</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> Mobile <span class="text-red">*</span></label>
								<input type="number" name="s_mobile" class="form-control numbers_only s_mobile num" placeholder="Enter Mobile" maxlength="10"  min="0" value="<?php echo isset($old_data) && $old_data->mobile ? $old_data->mobile : ""; ?>">
								 <span class="error-text error_mobile"></span>
                                <div id="ajax_loader_mobile" class="text-info small" style="display:none"><i class="fa fa-spinner fa-spin"></i> Checking...</div>
							</div>
						</div>

						<div class="col-sm-12 col-md-12 mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> Password </label>
								<input type="password" name="s_password" class="form-control s_password" placeholder="Enter Password">
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<button type="submit" class="box-btn fill_primary mt-4 enquiry_btn submit_btn" id="submit_btn">Submit</button>
							<button class="btn btn-primary e_loader mt-4 mb-0" style="display:none" type="button" disabled>
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</button>
							<a href="<?= base_url('franchise/add_franchise_staff'); ?>" class="box-btn fil_gray mt-4 mb-0">Cancel</a>

							<input type="hidden" name="record_id" value="<?= isset($old_data) && !empty($old_data->user_id) ? $old_data->user_id :''; ?>">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$(".num").keypress(function() {
			if ($(this).val().length == $(this).attr("maxlength")) {
				return false;
			}
		});
		$('body').on('change blur', '.s_email', function() {
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

                                    $('.s_email').val('');
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
		$('body').on('change blur', '.s_mobile', function() {
        $('.error_mobile').html('').hide();
        if($('.s_mobile').val().trim() == '') {
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

                                    $('.s_mobile').val('');
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
		$('.add_staff_form').validate({
			rules: {
				's_name' :{
					required: true,
				},'s_email':{
					required: true,
				},'s_mobile':{
					required: true,
				},
			},messages:{
				's_name' :{
					required: "please enter name",
				},'s_email':{
					required: "please enter email",
				},'s_mobile':{
					required: "please enter mobile no",
				},
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});

		$(document).on('submit','.add_staff_form',function(e){
			e.preventDefault();

			if($(this).valid()){
				$('.submit_btn').attr('disabled', 'disabled');
				$('.e_loader').removeAttr('style','display:none');
				$('.submit_btn').attr('style','display:none');
				$.ajax({
					url: base_url + "franchise/add_franchise_staff/store",
					type : "POST",
					data : $(this).serializeArray(),
					dataType : "json",
					success : function(data){
						$('.submit_btn').removeAttr('disabled', 'disabled');
						$('.e_loader').attr('style','display:none');
						$('.submit_btn').removeAttr('style','display:none');
						if(data.status == "success"){
							/*Swal.fire("Success!", data.message, "success").then(function(){
								window.location.href = base_url + 'franchise/add_franchise_staff';
							});*/
							window.location.href = base_url + 'franchise/add_franchise_staff';
						}else{
							Swal.fire("Warning!", data.message, "warning").then(function(){
							});
						}
					}
				});

			}


		})
	});
</script>



