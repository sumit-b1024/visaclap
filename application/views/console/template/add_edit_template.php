<style>
	.help-block{
		color:#e23e3d;
	}
</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card">
			<!-- <div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div> -->
			<div class="card-body">
				<form class="form-horizontal template_form" id="template_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-md-12 input-inside mb-2">
							<div class="form-group">
								<label class="form-label">Name  <span class="text-red">*</span></label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?= isset($get_template_data) && !empty($get_template_data->name) ? $get_template_data->name : set_value('name'); ?>"   />
								<span id="error_alter_name" class="small text-danger"></span>
							</div>
						</div>

						<!-- <div class="col-sm-12 col-md-12">

						<div class="form-group">
							<label class="form-label"><b>Select Variables</b></label>
							<div class="checkbox_div" style="display: inline-flex !important;">
								<label class="custom-control custom-checkbox-md">
									<input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="1">
									<span class="custom-control-label" style="padding: 7px;">First Name</span>
								</label>

								<label class="custom-control custom-checkbox-md">
									<input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="2">
									<span class="custom-control-label" style="padding: 7px;">Last Name</span>
								</label>

								<label class="custom-control custom-checkbox-md">
									<input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="3">
									<span class="custom-control-label" style="padding: 7px;">Enquiry Type</span>
								</label>

								<label class="custom-control custom-checkbox-md">
									<input type="checkbox" class="custom-control-input never_expiry" name="itinerary_star[]" id="never_expiry" value="4">
									<span class="custom-control-label" style="padding: 7px;">Intersted Country</span>
								</label>
							</div>
						</div>
						<div class="alert alert-danger failed_warn" role="alert" style="display:none">
						</div>
					</div> -->

					<!-- <div class="col-sm-12 col-md-12">
						<div class="form-group">
							<label class="form-label">Description  <span class="text-red">*</span></label>
							<textarea class="form-control" name="description" placeholder="Description" ><?= isset($get_template_data) && !empty($get_template_data->description) ? $get_template_data->description : set_value('description'); ?></textarea>
							<span id="error_alter_email" class="small text-danger" ></span>
						</div>
					</div> -->
					<div class="col-sm-12 col-md-12 input-inside mb-2">
					<label class="form-label"> Description
						<span style="color: red;">*</span></label>
						<div id="summernote" class="note-codable">
							<?= isset($get_template_data) && !empty($get_template_data) ? $get_template_data->description : ""; ?> 
						</div>
					</div>

					<div class="col-sm-12 col-md-12 input-inside">
								<label class="form-label"> Select Tag</label>
								<?php
							if( isset($_tag) && !empty($_tag) )
							{
								foreach($_tag as $tag) : ?>
									<a class="btn btn-primary selecttag" data-name="<?=$tag->name; ?>" style="width: auto;margin-left: 13px;"><?=$tag->name; ?></a>
							<?php		
								endforeach;
							}
							?>	
						</div>
					<div class="col-sm-6 col-md-6 input-inside ">
						<label class="form-label">Expiry date</label>
						<div class="wd-200 mg-b-30">
							<div class="input-group">
								<div class="input-group-text">
									<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
								</div><input class="form-control expiry_date" id="expiry_date" name="expiry_date"  placeholder="MM/DD/YYYY" type="text" value="<?= isset($get_template_data) && !empty($get_template_data->expiry_date) ? date('m/d/Y',strtotime($get_template_data->expiry_date)) : set_value('expiry_date'); ?>" readonly>
							</div>
							<span id="error_follow_up_date" class="small text-danger"></span>
						</div>
					</div>
					<div class="col-sm-4 col-md-4 input-inside mt-4">
						<label class="custom-control custom-checkbox-md checkbox-wrap">
							<input type="checkbox" class="custom-control-input checkbox" id="never_expiry" name="never_expiry" value="1" <?= isset($get_template_data) && !empty($get_template_data->is_expiry) && $get_template_data->is_expiry == "1" ? "checked" 
							: ""; ?>>
							<span class="checkbox" style="top: 8px;"></span>
						</label>
						<label class="form-label" for="never_expiry">Never Expiry</label>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-sm-6 col-md-4">
						<button type="submit" class="box-btn fill_primary mt-4 mb-0 sub_btn" >Submit</button>
						<button class="btn btn-primary mt-4 mb-0 loader_btn" type="button" disabled style="display:none"> 
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
							Loading...
						</button>
						<a href="<?php echo base_url('franchise/template'); ?>" class="box-btn fil_grey mt-4 mb-0">Cancel</a>
						<input type="hidden" name="template_id" value="<?= isset($get_template_data) && !empty($get_template_data->id) ? $get_template_data->id :''; ?>">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click','.selecttag',function(){
		       var tagname = $(this).data('name');
		      $('#summernote').summernote('editor.focus');
		      $('#summernote').summernote('editor.insertText','{{'+tagname+'}}');
		      console.log(tagname);
		    });
		function goBack() {
			var continue_to = base_url + 'franchise/enquiry';
			window.location = continue_to;
		}
		$('.expiry_date').datepicker({
			minDate:new Date(),
			showOtherMonths: true,
			selectOtherMonths: true,
		});

		$('.template_form').validate({
			rules:{
				"name" : {
					required:true
				},
				"description":{
					required:true
				},
			},
			messages:{
				"name" : {
					required:"please enter name"
				},
				"description":{
					required:"please enter description"
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

		$(document).on('submit','.template_form',function(e){
			e.preventDefault();
			var description = $('.note-codable').summernote('code');
			var form_data = $('#template_form');

				var formData = new FormData(form_data[0]);
				formData.append('description',description);
			if($(this).valid()){
				if($("input[type=checkbox]").prop("checked") == true){
					$('#error_follow_up_date').text("");
				} else {
					if($('#expiry_date').val() == ""){
						$('#error_follow_up_date').text('Please Select Date');
						return false;
					}
				}
				$('#submit_btn').attr('disabled', 'disabled');
				$('.sub_btn').attr('style', 'display: none');
				$('.loader_btn').removeAttr('style', 'display: none');
				$.ajax({
					type: 'POST',
					url: base_url + 'franchise/template/save_template_data',
					data: formData,
					dataType: 'json',
					contentType: false, 
					processData: false, 
					success: function(data) {
						$('#submit_btn').removeAttr('disabled', 'disabled');
						$('.loader_btn').attr('style', 'display: none');
						$('.sub_btn').removeAttr('style', 'display: none');
					// setTimeout(function() {
						if(data.status == 'success') {
							/*Swal.fire("Success!", data.message, "success").then(function(){
								// location.reload();
								window.location.href = base_url + 'franchise/template';
							});*/
							window.location.href = base_url + 'franchise/template';
						} else {
							Swal.fire("Warning!", "Error! Unable to complete process.", "error");
						}
					// }, 500);
				}
			});
			}
		});
	});
</script>