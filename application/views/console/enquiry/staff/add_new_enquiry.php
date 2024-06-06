<style type="text/css">
	.help-block{
		color: #e23e3d;
	}
</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card" style="box-shadow: -1px -1px 13px !important;">
			<div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div>
			<div class="card-body">
				<form class="form-horizontal" id="enquiry_form" method="post">
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label"> Name <span class="text-red">*</span></label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?= isset($enquiry) && !empty($enquiry->name) ? $enquiry->name : set_value('name'); ?>"/>
								<span id="error_alter_name" class="small text-danger"></span>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label"> Email </label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= isset($_REQUEST["email"]) && !empty($_REQUEST["email"]) ? $_REQUEST["email"] : set_value('email'); ?>">
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label">Mobile</label>
								<input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Enter Mobile No" value="<?= isset($_REQUEST["phone"]) && !empty($_REQUEST["phone"]) ? $_REQUEST["phone"] : set_value('phone'); ?>" >
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<label class="form-label">Follow Up Date <span class="text-red">*</span></label>
							<div class="wd-200 mg-b-30">
								<div class="input-group">
									<div class="input-group-text">
										<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
									</div>
									<input class="form-control follow_up_date" id="follow_up_date" name="follow_up_date" placeholder="MM/DD/YYYY" type="text"  value="<?= isset($enquiry) && !empty($enquiry->follow_up_date) ? date('m/d/Y',strtotime($enquiry->follow_up_date)) : set_value('follow_up_date'); ?>" autocomplete="off" readonly><br>
								</div>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="form-label">Enquiry Type</label>
								<select class="form-control enquiry_type" id="enquiry_type" name="enquiry_type" data-placeholder="Enquiry Type">
									<option value="">Enquiry Type</option>
									<?php foreach ($get_enquiry_type as $key => $value) { ?>
										<option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
									<?php } ?>

								</select>
							</div>
						</div>
						


						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label">Select Language</label>
								<select class="form-control language" id="language" name="language">
									<option value="">Select Language</option>
									<option value="Telugu"  <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "Telugu" ? "selected" : set_value('language'); ?>>Telugu</option>
									<option value="Hindi" <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "Hindi" ? "selected" : set_value('language'); ?>>Hindi</option>
									<option value="English" <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "English" ? "selected" : set_value('language'); ?>>English</option>
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label">Select Description</label>
								<select class="form-control s_description select2-show-search form-select" name="s_description">
									<option value="">Select Description</option>
									<?php
									foreach ($get_descriptions_of_admin as $key => $value) { ?>
										<option value="<?php echo $value->meta_id ?>" <?= isset($enquiry) && $enquiry->s_description == $value->meta_id ? "selected" : set_value('s_description'); ?>><?php echo $value->name; ?></option>
									<?php	} ?>
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label">Select Intersted Country</label>
								<select class="form-control i_country multiple_country " id="i_country" name="i_country[]" multiple value="<?= $enquiry->intersted_country ?>" data-placeholder="Select Intersted Country">
									<option value=""></option>
									<!-- <?php foreach ($get_all_country as $key => $value) { ?>
										<option value="<?= $value->id ?>" <?= (!empty($enquiry) && in_array($value->id,explode(",",$enquiry->intersted_country))) ? "selected" : "" ?> ><?= $value->name.'  ('.$value->sortname.')'; ?></option>
									<?php } ?> -->
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label">Select Visa</label>
								<select class="form-control city select2-show-search form-select" id="visatype" multiple name="visatype[]" data-placeholder="Select Visa">
									
								</select>
							</div>
						</div> 
						

						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="form-label ">Passport No</label>
								<input type="text" class="form-control passport_no" id="passport_no" name="passport_no" placeholder="Enter Passport No" value="<?= isset($enquiry) && !empty($enquiry->passport_no) ? $enquiry->passport_no : set_value('passport_no'); ?>">
							</div>
						</div>

						<!-- <div class="col-sm-6 col-md-6">
							<label class="form-label">Valid From </label>
							<div class="wd-200 mg-b-30">
								<div class="input-group">
									<div class="input-group-text">
										<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
									</div><input class="form-control passport_date" id="p_valid_from" name="p_valid_from" placeholder="MM/DD/YYYY" type="text" value="<?= isset($enquiry) && !empty($enquiry->p_valid_from) ? date('m/d/Y',strtotime($enquiry->p_valid_from)) : ""; ?>">
								</div>
								<span id="error_follow_up_date" class="small text-danger"></span>
							</div>
						</div> -->
						<!-- <div class="col-sm-6 col-md-6">
							<label class="form-label">Valid To</label>
							<div class="wd-200 mg-b-30">
								<div class="input-group">
									<div class="input-group-text">
										<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
									</div><input class="form-control passport_date" id="p_valid_to" name="p_valid_to" placeholder="MM/DD/YYYY" type="text" value="<?= isset($enquiry) && !empty($enquiry->p_valid_to) ? date('m/d/Y',strtotime($enquiry->p_valid_to)) : "" ?>">
								</div>
								<span id="error_follow_up_date" class="small text-danger"></span>
							</div>
						</div> -->

						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="form-label ">Description</label>
								<textarea class="form-control description" name="description" placeholder="Enter Description"><?= isset($enquiry) && !empty($enquiry->description) ? $enquiry->description : set_value('name'); ?></textarea>
							</div>
						</div>

						

					</div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<button type="submit" class="btn btn-primary mt-4 mb-0 enquiry_btn" id="submit_btn">Submit</button>
							<button class="btn btn-primary e_loader mt-4 mb-0" style="display:none" type="button" disabled>
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</button>
							<button type="reset" class="btn btn-danger mt-4 mb-0" onclick="goBack();">Cancel</button>
							<input type="hidden" name="query_id" value="<?= isset($enquiry) && !empty($enquiry->id) ? $enquiry->id :''; ?>">
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

<!-- <script src="<?= base_url() ?>/assets/custom/js/custom_select2.js"></script>
<link href="<?= base_url() ?>/assets/custom/css/custom_select2.css" rel="stylesheet"/> -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.js"></script> -->




<script type="text/javascript">

function get_all_country(){
    $.ajax({
       //url : api_url+"api/visacountry",
       url: base_url + 'franchise/request/getvisacountry',
       type:"GET",
       dataType:"json",
        mode: 'cors',
       success:function(data){
        
        if(data.code != 500){
          $.each(data.message, function (key, val) {
            let selected="";
             
             $("#i_country").append('<option value="'+val.id+'">'+val.name+'</option>');
         });
        }else{
         alert("Please Enter Domain key");
      }
        }
  });
}



				$('.multiple_country').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                });

                $('.multiple_country').on('click', () => {
                    let selectField = document.querySelectorAll('.multiple_country .select2-search__field')
                    selectField.forEach((element, index) => {
                        element.focus();
                    })
                });


                $('.city').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                });

                $('.city').on('click', () => {
                    let selectField = document.querySelectorAll('.select2-search__field')
                    selectField.forEach((element, index) => {
                        element.focus();
                    })
                });

                $('#language').select2();

				$('.enquiry_type').select2();
                $('.s_description').select2();
				$('.enquiry_staff_id').select2();

/* get visa type name */
	$('.i_country').on('change',function(){
		console.log('111');
		var destination = $(this).val();  
		// if(destination){
			$.ajax({
				type:"POST",
				url: base_url + "franchise/reports/get_all_visa_by_country_id",
				data : {destination : destination},
				dataType : 'JSON',
				success:function(data){
					if(data.status != "false"){
					if(data){
						$("#visatype").empty();
						$("#visatype").append('<option value="">Select Visa</option>');
						$.each(data.message,function(key,value){
							
							$("#visatype").append('<option value="'+value.id+'">'+value.name+'</option>');
						});
					}else{
						$("#visatype").empty();
					}
					}else{
						$("#visatype").empty();
					}
				}
			});
		// }else{
		// 	$("#city").empty();
		// }
	});

                
	var continue_to = base_url + 'franchise/reports';
	function goBack() {
		var continue_to = base_url + 'franchise/reports';
		window.location.href =continue_to;
		
	}
	
	$( document ).ready(function() {
	
 get_all_country();

	if ($(".follow_up_date").length > 0) {

                    $('.follow_up_date').datepicker({
                        minDate:new Date(),
                        showOtherMonths: true,
                        selectOtherMonths: true,
                    });
                }
                if ($(".passport_date").length > 0) {
                    $('.passport_date').datepicker({
                        showOtherMonths: true,
                        selectOtherMonths: true,
                    });
                }
});
	$('.i_country').on('change',function(){
		console.log('111');
		var destination = $(this).val();  
		// if(destination){
			$.ajax({
				type:"POST",
				url: base_url + "franchise/reports/get_all_cities_by_country_id",
				data : {destination : destination},
				dataType : 'JSON',
				success:function(data){
					// data = $.parseJSON(res);     
					if(data){
						$("#city").empty();
						$("#city").append('<option>Select City</option>');
						$.each(data,function(key,value){
							$("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
						});
					}else{
						$("#city").empty();
					}
				}
			});
		// }else{
		// 	$("#city").empty();
		// }
	});

	

	$(document).ready(function() {
		
		$('#enquiry_form').validate({
		rules : {
			"name":{
				required: true,
			},
			"follow_up_date" : {
				required: true,
			}
		},
		messages :{
			"name":{
				required: "please enter name",
			},
			"follow_up_date" : {
				required: "please select date",
			}
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
		


		$(document).on('click',"#submit_btn",function(event){
		
			event.preventDefault();
			//$('.enquiry_btn').attr('disabled', 'disabled');
			//$('.enquiry_btn').attr('style','display:none');
			//$('.e_loader').removeAttr('style');
			if($('#enquiry_form').valid()){
				$.ajax({
					type: 'POST',
					url: base_url + 'franchise/enquiry/save_enquiry_data',
					data: $('#enquiry_form').serializeArray(),
					dataType: 'json',
					success: function(data) {
						$('.enquiry_btn').removeAttr('disabled');
						$('.enquiry_btn').removeAttr('style');
						$('.e_loader').attr('style','display:none');
						if(data.status == 'success') {

							//$('#add_edit_form').hide();
							//$("#enquiry_form")[0].reset();
							//$("html, body").animate({ scrollTop: 0 }, "slow");

							// get_process_pool_data();
							// get_all_today_follow_up_data();
							// get_all_yesterday_follow_up_data();
							// get_all_missed_follow_up_data();
							//location.reload(continue_to);
							//window.open('http://www.google.com');
							window.location.href =continue_to
							

						} else {
							Swal.fire("Warning!", "Error! Unable to complete process.", "error");
						}
					}, error: function(data) {
						//$('#submit_btn').removeAttr('disabled');
						Swal.fire("warning","Error! Unable to complete process.","error");

					}
				});
			}
		});

	});
</script>