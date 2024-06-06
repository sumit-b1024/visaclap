<style type="text/css">
	.help-block{
		color: #e23e3d;
	}
</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card">
			<div class="card-body">
				<form class="form-horizontal" id="pwd_reset_form" method="post">
					<div class="row">
						<div class="col-sm-6 col-md-6 input-inside">
							<label class="form-label"> Password <span class="text-red">*</span></label>
							<div class="wrap-input100 validate-input input-group" id="Password-toggle">
								<a href="javascript:void(0)" class="input-group-text bg-white text-muted toggle-cpassword">
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								<input class="input100 border-start-0 form-control ms-0" type="password" placeholder="Password" name="password" id="password">
								<div class="invalid-feedback error_password" style="display: none;"></div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 input-inside">
							<label class="form-label"> Retype Password <span class="text-red">*</span></label>
							<div class="wrap-input100 validate-input input-group" id="Password-toggle2">
								<a href="javascript:void(0)" class="input-group-text bg-white text-muted toggle-password">
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								<input class="input100 border-start-0 form-control ms-0" type="password" placeholder="Retype Password" name="c_password" id="c_password">
								<div class="invalid-feedback error_password" style="display: none;"></div>
							</div>
						</div>

						<input type="hidden" id="user_role" value="<?= $this->session->userdata('user_role'); ?>">

					</div>

					<div class="row">
						<div class="col-sm-6 col-md-4">
							<button type="submit" class="mt-3 box-btn fill_primary enquiry_btn" id="submit_btn">Submit</button>
							<button class="btn btn-primary e_loader mt-4 mb-0" style="display:none" type="button" disabled>
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>
<script type="text/javascript">
	$(document).ready(function(){
		 $(".toggle-password").click(function() {
    // Find the password input field using its ID
    var passwordField = $("#c_password");
    

    // Toggle the password visibility by changing the input type attribute
    if (passwordField.attr("type") === "password") {
      passwordField.attr("type", "password");
    } else {
      passwordField.attr("type", "text");
    }

    // Toggle the eye icon by changing the class "fa-eye" to "fa-eye-slash" and vice versa
    $(this).find("i").toggleClass("fa-eye fa-eye-slash");
  });

		 $(".toggle-cpassword").click(function() { 
    // Find the password input field using its ID
    var password = $("#password");

    
    // Toggle the password visibility by changing the input type attribute
    if (password.attr("type") === "password") {
      password.attr("type", "password");
    } else {
      password.attr("type", "text");
    }

    // Toggle the eye icon by changing the class "fa-eye" to "fa-eye-slash" and vice versa
    $(this).find("i").toggleClass("fa-eye fa-eye-slash");
  });




		$('#pwd_reset_form').validate({
			rules : {
				password : {
					required : true,
					minlength : 6
				},
				c_password : {
					required : true,
					minlength : 6,
					equalTo : "#password"
				}
			},
			messages : {
				password: {
					required : 'Please enter password'
				},
				c_password:
				{
					required : 'Please enter confirm password',
					equalTo: 'Password does not match'
				},
			},
			highlight: function (element)
			{
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function (element)
			{
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorElement: 'span',
			errorClass: 'help-block',
			errorPlacement: function (error, element)
			{
				if (element.parent('.input-group').length) {
					error.insertAfter(element.parent());
				} else {
					error.insertAfter(element);
				}
			}
		});

		$(document).on('submit','#pwd_reset_form',function(e){
			e.preventDefault();
			if($('#pwd_reset_form').validate()){
				$('#submit_btn').attr('disabled', 'disabled');
				$('.enquiry_btn').attr('style','display:none');
				$('.e_loader').removeAttr('style');

				var user_role = $('#user_role').val();
				if(user_role == 1){
					var url = 'reset_pwd/update_user_password';
				}else{
					var url = 'franchise/reset_pwd/update_user_password';
				}
				$.ajax({
					url: base_url + url,
					type : "POST",
					data : $(this).serializeArray(),
					dataType : "JSON",
					success: function(data){
						$('#submit_btn').removeAttr('disabled');
						$('.enquiry_btn').removeAttr('style');
						$('.e_loader').attr('style','display:none');
						if(data.status == "success"){
							Swal.fire("Success!", data.message, "success").then(function(){
								//window.location.href = base_url + 'dashboard';
								location.reload();
							});
						}else{
							Swal.fire("Warning!", "Error! Unable to complete process.", "error");
						}
					}
				});
			}
		});
	});
</script>



