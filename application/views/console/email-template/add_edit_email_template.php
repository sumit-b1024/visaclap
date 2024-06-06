<div class="row">
	<div class="col-md-12 col-xl-12">

		<div class="card">
			<!-- <div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div> -->

			<div class="card-body">

				<form class="form-horizontal email_template_form" id="email_template_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-md-12 input-inside mb-2">
							<div class="form-group">
								<label class="form-label"> Name <span class="text-red">*</span></label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?= isset($get_template_data) && !empty($get_template_data->name) ? $get_template_data->name : set_value('name'); ?>"  required />
								<span id="error_alter_name" class="small text-danger"></span>

							</div>
						</div>

						<div class="col-sm-12 col-md-12 input-inside mb-2">
							<label class="form-label"> Description
								<span style="color: red;">*</span></label>
								<div id="summernote" class="note-codable">
									<?= isset($get_template_data) && !empty($get_template_data) ? $get_template_data->description : ""; ?> 
								</div>
								
								<span id="error_description_date" class="small text-danger"></span>
							</div>
							<div class="col-sm-12 col-md-12">
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
							<div class="col-sm-6 col-md-6 input-inside">
								<label class="form-label">Expiry date <span class="text-red">*</span></label>
								<div class="wd-200 mg-b-30">
									<div class="input-group">
										<div class="input-group-text">
											<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
										</div><input class="form-control expiry_date" id="expiry_date" name="expiry_date" readonly placeholder="MM/DD/YYYY" type="text" value="<?= isset($get_template_data) && !empty($get_template_data->expiry_date) ? date('m/d/Y',strtotime($get_template_data->expiry_date)) : set_value('expiry_date'); ?>" >
									</div>
									<span id="error_follow_up_date" class="small text-danger"></span>
								</div>
							</div>

							<div class="col-sm-6 col-md-6 input-inside mt-4">
								<label class="custom-control custom-checkbox-md checkbox-wrap">
									<input type="checkbox" class="custom-control-input never_expiry checkbox" name="never_expiry" id="never_expiry" value="1" <?= isset($get_template_data) && !empty($get_template_data->is_expiry) && $get_template_data->is_expiry == "1" ? "checked" 
									:""  ?>>
									<span class="checkbox" style="top: 8px;"></span>
								</label>
								<label class="form-label" for="never_expiry">Never Expiry</label>
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-sm-6 col-md-4">
								<button type="submit" class="box-btn fill_primary mt-4 mb-0" >Submit</button>
								<a href="<?php echo base_url('franchise/email_template'); ?>" class="box-btn fil_grey mt-4 mb-0">Cancel</a>
								<input type="hidden" name="template_id" id="template_id" value="<?= isset($get_template_data) && !empty($get_template_data->id) ? $get_template_data->id :''; ?>">
							</div>
						</div>
					</form>

				</div>
			</div>

		</div>
	</div>

	<script type="text/javascript">
		$(document).on('click','.selecttag',function(){
			var tagname = $(this).data('name');
			$('#summernote').summernote('editor.focus');
			$('#summernote').summernote('editor.insertText','{{'+tagname+'}}');
			console.log(tagname);
		});

		$(document).ready(function() {

			function goBack() {
				var continue_to = base_url + 'franchise/email_template';
				window.location = continue_to;
			}

			$('.expiry_date').datepicker({
				minDate:new Date(),
				showOtherMonths: true,
				selectOtherMonths: true,
			});
			
			$(document).on('submit','.email_template_form',function(e){
				e.preventDefault();

				var expiry_date = $('.expiry_date').val();


				if ($('.never_expiry').prop('checked')==false){ 
					if(expiry_date == ""){
						$('#error_follow_up_date').text('Select Date');
						return false;
					}else{
						$('#error_follow_up_date').text('');
					}
				}


				var description = $('#summernote').summernote('code');
				
				if(description == ""){
						$('#error_description_date').text('Please enter description');
						return false;
					}else{
						$('#error_description_date').text('');
					}

				var form_data = $('#email_template_form');

				var formData = new FormData(form_data[0]);
				formData.append('description',description);

				$('#submit_btn').attr('disabled', 'disabled');
				$.ajax({
					type: 'POST',
					url: base_url + 'franchise/email_template/store_email_template_data',
					data: formData,
					contentType: false, 
					processData: false, 
					dataType : "json",
					success: function(data) {
						if(data.status == 'success') {
							/*Swal.fire("Success!", data.message, "success").then(function(){
								location.reload();
								window.location.href = base_url + 'franchise/email_template';
							});*/
							window.location.href = base_url + 'franchise/email_template';
						} else {
							Swal.fire("Warning!", "Error! Unable to complete process.", "error");

						}
					}
				});
			});
		});
	</script>