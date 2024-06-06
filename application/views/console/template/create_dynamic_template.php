<style>
	.help-block{
		color:#e23e3d;
	}
</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div>
			<div class="card-body">
				<form class="form-horizontal template_form" id="template_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="form-label">Select Template  <span class="text-red">*</span></label>
								<select class="form-control email_template_id select2-show-search form-select" name="email_template_id" id="email_template_id" required style="width:100% !important;">
					                  <option value="">Select Template</option>
					                  <?php foreach ($get_whatsup_template_data as $key => $value) { ?>
					                     <option value="<?= $value->id ?>"><?= $value->name ?></option>
					                  <?php } ?>
					               </select>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label"> Name <span class="text-red">*</span></label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?= isset($enquiry) && !empty($enquiry->name) ? $enquiry->name : set_value('name'); ?>"/>
								<span id="error_alter_name" class="small text-danger"></span>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label"> Last Name </label>
								<input type="text" name="lname" id="lname" class="form-control" placeholder="Lname" value=""/>
								
							</div>
						</div>

				</div>
				<br>

				<div class="row">
					<div class="col-sm-6 col-md-4">
						<button type="submit" class="btn btn-primary mt-4 mb-0 sub_btn" >Submit</button>
						<button class="btn btn-primary mt-4 mb-0 loader_btn" type="button" disabled style="display:none"> 
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
							Loading...
						</button>
						<a href="<?php echo base_url('franchise/template'); ?>" class="btn btn-danger mt-4 mb-0">Cancel</a>
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
		function goBack() {
			var continue_to = base_url + 'franchise/enquiry';
			window.location = continue_to;
		}
		

		$('.template_form').validate({
			rules:{
				"name" : {
					required:true
				},
				
			},
			messages:{
				"name" : {
					required:"please enter name"
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
			if($(this).valid()){
				
				$('#submit_btn').attr('disabled', 'disabled');
				$('.sub_btn').attr('style', 'display: none');
				$('.loader_btn').removeAttr('style', 'display: none');
				$.ajax({
					type: 'POST',
					url: base_url + 'franchise/template/generate_dynamic_template',
					data: $(this).serializeArray(),
					dataType: 'json',
					success: function(data) {
						$('#submit_btn').removeAttr('disabled', 'disabled');
						$('.loader_btn').attr('style', 'display: none');
						$('.sub_btn').removeAttr('style', 'display: none');
					// setTimeout(function() {
						if(data.status == 'success') {
							Swal.fire("Success!", data.message, "success").then(function(){
								// location.reload();
								window.location.href = base_url + 'franchise/template';
							});
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