<style type="text/css">
	.help-block{
		color: #e23e3d;
	}
</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card">
			
			<div class="card-body">
				<form class="form-horizontal" id="pool_status_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-md-12 mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> Select Pool Type <span class="text-red">*</span></label>
								<select class="pool_type form-select" id="pool_type" name="pool_type">
									<option value="">Select Pool Status</option>
									<?php 
									foreach($all_pool_type as $key => $pool){ ?>
										<option value="<?= $key ?>" <?= isset($fetch_record_data) && $fetch_record_data->pool_status == $key ? "selected" : ""  ?>><?= $pool ?></option>
									<?php	} ?>
								</select>
							</div>
						</div>


						<div class="col-sm-12 col-md-12">
							<div class="form-group input-inside">
								<label class="form-label"> Enter Status <span class="text-red">*</span></label>
								<input type="text" name="pool_status" id="pool_status" class="form-control pool_status" placeholder="Enter Status" value="<?= isset($fetch_record_data) && $fetch_record_data->pool_status_info ? $fetch_record_data->pool_status_info : set_value('pool_status')  ?>"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-4 form-btns">
							<button type="submit" class="box-btn fill_primary mt-4 mb-0 enquiry_btn" id="submit_btn">Submit</button>
							<button class="btn btn-primary e_loader mt-4 mb-0" style="display:none" type="button" disabled>
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</button>
							<a href="<?= base_url('pool_master'); ?>" class="box-btn fil_gray mt-4 mb-0">Cancel</a>
							<input type="hidden" name="pool_id" value="<?= isset($fetch_record_data) && !empty($fetch_record_data->id) ? $fetch_record_data->id :''; ?>">
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
	$(document).ready(function() {
		$('#pool_status_form').validate({
			rules : {
				"pool_status":{
					required: true,
				},
				"pool_type":{
					required: true,
				},
			},
			messages :{
				"pool_status":{
					required: "please enter status",
				},
				"pool_type":{
					required: "please select status",
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
		
		$(document).on('submit',"#pool_status_form",function(event){
			event.preventDefault();
			$('#submit_btn').attr('disabled', 'disabled');
			$('.enquiry_btn').attr('style','display:none');
			$('.e_loader').removeAttr('style');
			if($(this).valid()){
				$.ajax({
					type: 'POST',
					url: base_url + 'pool_master/store_pool_master_data',
					data: $(this).serializeArray(),
					dataType: 'json',
					success: function(data) {
						$('#submit_btn').removeAttr('disabled');
						$('.enquiry_btn').removeAttr('style');
						$('.e_loader').attr('style','display:none');
						if(data.status == 'success') {
							Swal.fire("Success!", data.message, "success").then(function(){
								window.location.href = base_url + 'pool_master';
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

