<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div>
			<div class="card-body">
				<form class="form-horizontal" id="place_form" method="post">
					<div class="row">

						<div class="col-sm-6 col-md-6">
							<div class="form-group input-inside1">
								<label class="form-label">Country <span class="text-red">*</span></label>
								<select class="form-control country form-select " name="country" id="country" data-placeholder="Select Country" >
									<option value="">Select Country</option>
									<?php foreach ($get_all_country as $key => $value) { ?>
										<option value="<?= $value->id ?>" <?= isset($get_country_by_state)  && $value->id == $get_country_by_state->country ?  "selected" : set_value('country'); ?>><?= $value->name ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

							<div class="col-sm-6 col-md-6">
								<div class="form-group input-inside">
									<label class="form-label">Enter City Name <span class="text-red">*</span></label>
									<input type="text" class="form-control" name="city" placeholder="Enter City Name" value="<?= isset($_view) && $_view->name  ? $_view->name : "" ?>">
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-6 col-md-4">
								<button type="submit" class="box-btn fill_primary mt-4 mb-0 enquiry_btn" id="submit_btn">Submit</button>
								<button class="btn btn-primary e_loader mt-4 mb-0" style="display:none" type="button" disabled>
									<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
									Loading...
								</button>
								<a href="<?= base_url('add_place'); ?>" class="box-btn fil_grey mt-4 mb-0">Cancel</a>
								<input type="hidden" name="record_id" value="<?= isset($_view) && !empty($_view->id) ? $_view->id :''; ?>">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#place_form').validate({
				rules:{
					'country':{
						required:true,
					},
					'city':{
						required:true,
					},
				},
				messages : {
					'country':{
						required:"select country",
					},
					'city':{
						required:"enter city name",
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
				},
			});

			$(document).on('submit','#place_form',function(e){
				e.preventDefault();
				if($(this).valid()){
					$.ajax({
						type:"POST",
						url: base_url + "add_place/add_city",
						data : $(this).serialize(),
						dataType : 'json',
						success:function(data){  
							if(data.status == "success"){
								window.location.href = base_url + "add_place";
							}else{
								Swal.fire("Warning!","Error! Unable to complete process.","warning");
							}
						}
					});
				}
			});

			$('#country').change(function(){
				var countryid = $(this).val();  
				if(countryid){
					$.ajax({
						type:"POST",
						url: base_url + "supplier/get_all_states",
						data : {countryid : countryid},
						success:function(res){  
							data = $.parseJSON(res);      
							if(data){
								$("#state").empty();
								$("#city").empty();
								$("#state").append('<option>Select State</option>');
								$.each(data,function(key,value){
									$("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
								});
							}else{
								$("#state").empty();
							}
						}
					});
				}else{
					$("#state").empty();
					$("#city").empty();
				}   
			});
		});
	</script>




