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
						<div class="col-sm-6 col-md-6 mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> Name <span class="text-red">*</span></label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?= isset($enquiry) && !empty($enquiry->name) ? $enquiry->name : set_value('name'); ?>"/>
								<span id="error_alter_name" class="small text-danger"></span>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> Email</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= isset($enquiry->email) && !empty($enquiry->email) ? $enquiry->email : set_value('email'); ?>">
							</div>
						</div>

						<div class="col-sm-6 col-md-6 mb-1">
							<div class="form-group input-inside">
								<label class="form-label">Mobile</label>
								<input type="text" name="mobile_no" id="mobile_no" class="form-control mobile_no"   placeholder="Enter Mobile No" value="<?= isset($enquiry) && !empty($enquiry->mobile_no) ? $enquiry->mobile_no : set_value('mobile_no'); ?>" >
								<span class="error-text error_mobile"></span>
                                <div id="ajax_loader_mobile" class="text-info small" style="display:none"><i class="fa fa-spinner fa-spin"></i> Checking...</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 input-inside mb-1">
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
						
						<div class="col-sm-12 col-md-12 mb-1">
							<div class="form-group input-inside">
								<label class="form-label">Enquiry Type</label>
								<select class="form-control enquiry_type select2-show-search" id="enquiry_type" name="enquiry_type" data-placeholder="Enquiry Type">
									<option value="">Enquiry Type</option>
									<?php foreach ($get_enquiry_type as $key => $value) { ?>
										<option value="<?= $value->meta_id ?>" <?= isset($enquiry) && !empty($enquiry->enquiry_type) && $enquiry->enquiry_type == $value->meta_id ? "selected" : set_value('enquiry_type'); ?>><?= $value->name ?></option>
									<?php } ?>

								</select>
							</div>
						</div>
						


						<div class="col-sm-6 col-md-6 mb-1">
							<div class="form-group input-inside">
								<label class="form-label">Select Language</label>
								<select class="language form-select" name="language">
									<option value="">Select Language</option>
									<option value="Telugu"  <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "Telugu" ? "selected" : set_value('language'); ?>>Telugu</option>
									<option value="Hindi" <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "Hindi" ? "selected" : set_value('language'); ?>>Hindi</option>
									<option value="English" <?= isset($enquiry) && !empty($enquiry->language) && $enquiry->language == "English" ? "selected" : set_value('language'); ?>>English</option>
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="form-group input-inside">
								<label class="form-label">Select Description</label>
								<select class=" s_description form-select" name="s_description">
									<option value="">Select Description</option>
									<?php
									foreach ($get_descriptions_of_admin as $key => $value) { ?>
										<option value="<?php echo $value->meta_id ?>" <?= isset($enquiry) && $enquiry->s_description == $value->meta_id ? "selected" : set_value('s_description'); ?>><?php echo $value->name; ?></option>
									<?php	} ?>
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="form-group input-inside">
								<label class="form-label">Select Intersted Country</label>
								<select class="form-control  select2-show-search  i_country multiple_country" id="i_country" name="" value="<?= $enquiry->intersted_country ?>" data-placeholder="Select Intersted Country">
									
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 selectvisa" style="display:none;">
							<div class="form-group input-inside">
								<label class="form-label">Select Visa</label>
								<select class="form-control city select2-show-search form-select" id="visatype" name="visatype" data-placeholder="Select Visa">
									
								</select>
							</div>
						</div> 

						<!-- <div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label">City</label>
								<select class="form-control city select2-show-search form-select" id="city" multiple name="city[]" data-placeholder="Select City">
									<?php foreach ($get_country_city as $key => $value) { ?>
										<option value="<?= $value->id ?>" <?= (!empty($enquiry) && in_array($value->id,explode(",",$enquiry->city))) ? "selected" : "" ?> ><?= $value->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div> -->

						<!-- <div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="form-label ">Passport No</label>
								<input type="text" class="form-control passport_no" id="passport_no" name="passport_no" placeholder="Enter Passport No" value="<?= isset($enquiry) && !empty($enquiry->passport_no) ? $enquiry->passport_no : set_value('passport_no'); ?>">
							</div>
						</div> -->

						
						
						<div class="col-sm-12 col-md-12 mb-1">
							<div class="form-group input-inside">
								<label class="form-label ">Description</label>
								<textarea class="form-control description" name="description" placeholder="Enter Description"><?= isset($enquiry) && !empty($enquiry->description) ? $enquiry->description : set_value('name'); ?></textarea>
							</div>
						</div>

						<div class="col-sm-12 col-md-12 mb-3">
							<div class="form-group input-inside">
								<label class="form-label ">Assign Enquiry To Staff</label>
								<select class="enquiry_staff_id form-select"  name="enquiry_staff_id" value="<?= $enquiry->intersted_country ?>" data-placeholder="Select Staff">
									<option value="">Select Staff</option>
									<?php 
									foreach ($get_all_staff_data as $key => $value) { ?>
										<option value="<?= $value->user_id ?>" <?= isset($enquiry) && $enquiry->enquiry_staff_id == $value->user_id ? "selected" : ""; ?>><?= $value->first_name ?></option>
									<?php 	} ?>
								</select>
							</div>
						</div>

						  <div class="row">
							 <div class="repeater">
							    <div data-repeater-list="enq_docu" class="mb-2">
							    	<?php if(!empty($enquiry_document)){ 
							    		foreach($enquiry_document as $edk => $edv){
							    		?>
							      <div data-repeater-item class="mb-1" id="<?=isset($edv->id) ? $edv->id: "";?>">
							      	<div class="row">
							      		<div class="col-5 input-inside">
							      			<input type="hidden" id="spid" name="spid" value="<?=isset($edv->id) ? $edv->id: "";?>" /> 
							        		<input type="text" class="form-control" name="docname" placeholder="Enter Document Name" value="<?=isset($edv->doc_name) ? $edv->doc_name: "";?>" />
							      		</div>
							      		<div class="col-4">
							      			<input type="file" class="form-control" name="docfile"/>
							      		</div>
							      		<div class="col-1">
							      			<?php 
							      			if (file_exists($edv->doc_file)) { 
							      				 $image_info = getimagesize($edv->doc_file);
							      				 	if ($image_info !== false) { 
							      			 ?>
							      					<img style="width:100%" src="<?php echo base_url().$edv->doc_file; ?>" class="openlink" />
							      				<?php }else{ ?>
							      					<a href="<?php echo base_url().$edv->doc_file; ?>" target="_blank" class="openlink">View File</a>
							      				<?php } } ?>
							      		</div>	
							      		<div class="col-2">
							        		<button type="button" class="btn btn-danger pull-right remove_row removeupdaterow" data-id="<?=isset($edv->id) ? $edv->id: "";?>"><i class="fa fa-trash"></i></button>
							      		</div>		
							      	</div>
							      </div>
							    	<?php } } else{ ?>
							    		<div data-repeater-item class="mb-1">
								      	<div class="row">
								      		<div class="col-5 input-inside">
								      			<input type="hidden" id="spid" name="spid" value="" /> 
								        		<input type="text" class="form-control" name="docname" placeholder="Enter Document Name" />
								      		</div>
								      		<div class="col-5">
								      			<input type="file" class="form-control" name="docfile"/>
								      		</div>
								      		<div class="col-2">
								        		<button type="button" class="btn btn-danger pull-right" data-repeater-delete><i class="fa fa-trash"></i></button>
								      		</div>		
								      	</div>
								      </div>
							    	<?php } ?>
							    </div>
							    <button type="button" class="box-btn fill_primary" data-repeater-create>Add</button>
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
							<button type="reset" class="box-btn fil_gray mt-4 mb-0">Cancel</button>
							<input type="hidden" name="query_id" value="<?= isset($enquiry) && !empty($enquiry->id) ? $enquiry->id :''; ?>">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- <script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script> -->

<!-- 
<script src="<?php echo base_url('/assets/custom/js/custom_select2.js'); ?>"></script>
<link href="<?php echo base_url('/assets/custom/css/custom_select2.css'); ?>" rel="stylesheet"/> -->

<?php $countryid =  $enquiry->intersted_country;?>
<?php $visaid =  $enquiry->visa_id;?>
<script type="text/javascript">
	
	function goBack() {
		var continue_to = base_url + 'franchise/enquiry';
		window.location = continue_to;
	}
	var countryid = "<?php echo $countryid; ?>";
	var visaid = "<?php echo $visaid; ?>";
	
	 function get_all_country(){
    $.ajax({
       //url : api_url+"api/visacountry",
       url: base_url + 'franchise/request/getvisacountry',
       type:"GET",
       dataType:"json",
        mode: 'cors',
       success:function(data){
        var countryidarray = countryid.split(',');
        if(data.code != 500){
          $.each(data.message, function (key, val) {
            let selected="";
              if(jQuery.inArray(val.id, countryidarray) != -1) {
                    selected = 'selected';
                }
             $(".i_country").append('<option value="'+val.id+'" '+selected+'>'+val.name+'</option>');
         });
        }else{
         alert("Please Enter Domain key");
      }
        }
  });
}

	/* get city name */
	/*$('.i_country').on('change',function(){
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
						$.each(data.message,function(key,value){
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
	});*/


jQuery(document).on('click', '.remove_row', function() {
               
               var dataid =  $(this).attr('data-id');  

               Swal.fire({
                      title: "Are you sure?",
                    text: "You will not be able recover this record",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes delete it!",
                    closeOnConfirm: false
               }).then(function (result) {
                     if (result.value)
                     {
                      $.ajax({
                      url: base_url + "franchise/enquiry/remove_enq_doc",
                      type : "POST",
                      data : {
                        "dataid": dataid,
                      },
                      dataType: 'json',
                      success : function(data){
                        if(data.status == "success")
                        {
                         $('#'+dataid).slideUp();
                        }else {
                          swal({
                            title: "error",
                            text: "something went wrong",
                            type: "error"
                          });

                        }

                      }
                    });


                }

          });	



              
  });

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
					 var visaidarray = visaid.split(','); 

					if(data.status != "false"){
					if(data){
						$("#visatype").empty();
						$("#visatype").append('<option value="">Select Visa</option>');
						$.each(data.message,function(key,value){
							let selected="";
				              if(jQuery.inArray(value.id, visaidarray) != -1) {
				                    selected = 'selected';
				                }
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
	function geteditvisa(country){
		var destination = country;
		$.ajax({
				type:"POST",
				url: base_url + "franchise/reports/get_all_visa_by_country_id",
				data : {destination : destination,editvisa : 'editvisa'},
				dataType : 'JSON',
				success:function(data){
					 var visaidarray = visaid.split(','); 
					if(data.status != "false"){
					if(data){
						$("#visatype").empty();
						$("#visatype").append('<option value="">Select Visa</option>');
						$.each(data.message,function(key,value){
							let selected="";
				              if(jQuery.inArray(value.id, visaidarray) != -1) {
				                    selected = 'selected';
				                }
							$("#visatype").append('<option value="'+value.id+'" '+selected+'>'+value.name+'</option>');
						});
					}else{
						$("#visatype").empty();
					}
					}else{
						$("#visatype").empty();
					}
				}
			});	
	}
	$('#enquiry_form').validate({
		rules : {
			"name":{
				required: true,
			},
			"follow_up_date" : {
				required: true,
			},
			"enquiry_type" : {
				required: true,
			},
			"i_country[]" : {
				required: true,
			}
		},
		messages :{
			"name":{
				required: "please enter name",
			},
			"follow_up_date" : {
				required: "please select date",
			},
			"enquiry_type" : {
				required: "please select type",
			},
			"i_country[]" : {
				required: "please select country",
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
	  $('body').on('change blur', '.mobile_no', function() {
        $('.error_mobile').html('').hide();
        if($('.mobile_no').val().trim() == '') {
            $('.error_mobile').html('Enter contact no').show();
            return;
        } else if(!validateNumber($(this).val().trim())) {
            $('.error_mobile').html('Enter valid contact no').show();
            return;
        }  else {
                $('#ajax_loader_mobile').show();
                $('.submit_btn').prop('disabled', false);
                var mobile = $(this).val().trim();
                var query_id = $("input[name=query_id]").val();
                $.ajax({
                        type: 'POST',
                        url:  base_url + 'franchise/enquiry/ajax_enquiry_number_exist',
                        data: {'mobile':mobile,'query_id':query_id},
                        dataType: 'json',
                        success: function(data) { 
                            setTimeout(function() {
                                $('#ajax_loader_mobile').hide();
                                if(data.user_exist == true)
                                {
                                    email_exist = true;
                                    $('.submit_btn').prop('disabled', true);

                                    $('.mobile_no').val('');
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
	  $('body').on('change', '.enquiry_type', function() {
		var enquiry_type = $("#enquiry_type option:selected").val();
		
	  	if(enquiry_type == '32'){
	  		//$('.i_country').prop('multiple', false);
	  		$('.multiple_country ').select2({
			    multiple: false,
			  });
	  		$('.i_country').attr('name', 'i_country');
	  		$('.selectvisa').show();
	  	}else{
	  		//$('.i_country').prop('multiple', true);
	  		//$('.i_country').attr('multiple', 'multiple');
	  		$('.multiple_country ').select2({
			    multiple: true,
			  });
	  		$('.i_country').attr('name', 'i_country[]');
	  		$('.selectvisa').hide();
	  	}
	  });
	  
	$(document).ready(function() {
		var enquirytype = '<?= isset($enquiry) && !empty($enquiry->enquiry_type) ? '32' : set_value('enquiry_type'); ?>';
		// $('select').select2();
		if(enquirytype == '32'){
			$('.multiple_country ').select2({
			    multiple: false,
			    minimumResultsForSearch: 1,
			    maximumSelectionLength: 10
			  });
	  		$('.i_country').attr('name', 'i_country');
			$('.selectvisa').show();
		}else{
			$('.multiple_country ').select2({
			    multiple: true,
			    minimumResultsForSearch: 1,
			    maximumSelectionLength: 15
			  });
	  		$('.i_country').attr('name', 'i_country[]');
			$('.selectvisa').hide();
		}
		 get_all_country();
		 geteditvisa(countryid);

		$(document).on('click',"#submit_btn",function(event){
		
			event.preventDefault();
			//$('.enquiry_btn').attr('disabled', 'disabled');
			//$('.enquiry_btn').attr('style','display:none');
			//$('.e_loader').removeAttr('style');
			if($('#enquiry_form').valid()){
			$('.enquiry_btn').attr('disabled', 'disabled');
			$('.enquiry_btn').attr('style','display:none');
			$('.e_loader').removeAttr('style');
			var form = $('#enquiry_form')[0];
			var formdata = new FormData(form);
				$.ajax({
					type: 'POST',
					url: base_url + 'franchise/enquiry/save_enquiry_data',
					data: formdata,
					cache:false,
	        contentType: false,
	        processData: false,
					dataType: 'json',
					success: function(data) {
						$('.enquiry_btn').removeAttr('disabled');
						$('.enquiry_btn').removeAttr('style');
						$('.e_loader').attr('style','display:none');
						if(data.status == 'success') {

							$('#add_edit_form').hide();
							$("#enquiry_form")[0].reset();
							$("html, body").animate({ scrollTop: 0 }, "slow");

							// get_process_pool_data();
							// get_all_today_follow_up_data();
							// get_all_yesterday_follow_up_data();
							// get_all_missed_follow_up_data();
							location.reload();

						} else {
							Swal.fire("Warning!", "Error! Unable to complete process.", "error");
						}
					}, error: function(data) {
						$('#submit_btn').removeAttr('disabled');
						Swal.fire("warning","Error! Unable to complete process.","error");

					}
				});
			}
		});

	});
</script>