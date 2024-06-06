
<div class="row">
	<div class="col-md-12 col-xl-12">

		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div>

			<div class="card-body">

				<form class="form-horizontal email_cred_form" id="email_cred_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="form-label"> Email <span class="text-red">*</span></label>
								<input type="email" name="u_email" id="u_email" class="form-control" placeholder="Enter Email" required value="<?= isset($ger_old_info->email) && $ger_old_info  ? $ger_old_info->email : "";  ?>" />
							</div>
						</div>

						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="form-label"> Client Id <span class="text-red">*</span></label>
								<textarea class="form-control" name="client_id" placeholder="Enter Client Id" required ><?= isset($ger_old_info->client_id) && $ger_old_info  ? $ger_old_info->client_id : "";  ?></textarea>
							</div>
						</div>
						<div class="col-sm-12 col-md-12">
							<label class="form-label">Client Secret <span class="text-red">*</span></label>
							<div class="wd-200 mg-b-30">
								<div class="form-group">
									<textarea class="form-control" name="client_secret" placeholder="Enter Client Secret" required><?= isset($ger_old_info->client_secret) && $ger_old_info  ? $ger_old_info->client_secret : "";  ?></textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-4">
							<button type="submit" class="btn btn-primary mt-4 mb-0 sub_btn" id="submit_btn" >Submit</button>

							<button class="btn btn-primary loader_btn mt-4 mb-0" type="button" disabled  style="display:none">
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</button>

							<a href="<?php echo base_url('franchise/credencials'); ?>" class="btn btn-danger mt-4 mb-0">Cancel</a>
							<input type="hidden" name="record_id" value="<?= isset($ger_old_info->id) && $ger_old_info  ? $ger_old_info->id : "";  ?>">
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<style>
	.error{
		color:#e82646 !important;
	}
</style>

<script type="text/javascript">

	$(document).ready(function() {
		$('.email_cred_form').validate({
			rules:{
				"u_email" : {
					required : true,
				},"client_secret" : {
					required : true,
				},
				"client_id" : {
					required : true,
				},
			},
			messages: {
				"u_email" : {
					required : "please enter email",
				},"client_secret" : {
					required : "please enter client secret",
				},
				"client_id" : {
					required : "please enter client id",
				},

			}
		});
		$(document).on('submit','.email_cred_form',function(e){
			e.preventDefault();
			if($(this).valid()){

				$('#submit_btn').attr('disabled', 'disabled');
				$('.sub_btn').attr('style', 'display:none');
				$('.loader_btn').removeAttr('style', 'display:none');

				$.ajax({
					type: 'POST',
					url: base_url + 'franchise/credencials/store_email_temp_data',
					data: $(this).serializeArray(),
					dataType: 'json',
					success: function(data) {
						$('#submit_btn').removeAttr('disabled');
						$('.loader_btn').attr('style', 'display:none');
						$('.sub_btn').removeAttr('style', 'display:none');

						if(data.status == 'success') {
							/*Swal.fire("Success!", data.message, "success").then(function(){
								window.location.href = base_url + 'franchise/credencials';
							});*/
							window.location.href = base_url + 'franchise/credencials';
						}else if(data.status == 'exist'){
							Swal.fire("Warning!", data.message, "error").then(function(){
							});

						} else {
							Swal.fire("Warning!", "Error!."+data.message, "error");
						}
					}
				});

			}
		});
	});
</script>