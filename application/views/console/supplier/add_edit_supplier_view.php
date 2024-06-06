<?php // xdebug($supplier); ?>
<style type="text/css">
	.help-block{
		color: #e23e3d;
	}
</style>
<div class="row">
    <div class="col-md-12 col-xl-12">
    
        <div class="card">
            

            <div class="card-body">

                <form class="form-horizontal supplier_form" id="add-form" class="login100-form validate-form" method="post">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Firm Name <span class="text-red">*</span></label>
                                <input type="text" name="firm_name" id="firm_name" class="form-control" placeholder="Firm Name" value="<?= isset($supplier) && !empty($supplier->firm_name) ? $supplier->firm_name : set_value('firm_name'); ?>"/>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Alter Email <span class="text-red">*</span></label>
								<input type="email" name="alter_email" id="alter_email" class="form-control" placeholder="Alter Email" value="<?= isset($supplier) && !empty($supplier->alter_email) ? $supplier->alter_email : set_value('alter_email'); ?>">
								<span id="error_alter_email" class="small text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">PNR Retrieve Email</label>
								<input type="email" name="retrieve_email" id="retrieve_email" class="form-control" placeholder="PNR Retrieve Email" value="<?= isset($supplier) && !empty($supplier->retrieve_email) ? $supplier->retrieve_email : set_value('retrieve_email'); ?>">
								<span id="error_retrieve_email" class="small text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Contact Number</label>
								<input type="number" name="contact_number" id="contact_number" class="form-control" placeholder="Contact Number" value="<?= isset($supplier) && !empty($supplier->contact_number) ? $supplier->contact_number : set_value('contact_number'); ?>">
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">GST No</label>
								<input type="text" name="gst_no" id="gst_no" class="form-control" placeholder="GST No" maxlength="15" value="<?= isset($supplier) && !empty($supplier->gst_no) ? $supplier->gst_no : set_value('gst_no'); ?>">
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Pan No</label>
								<input type="text" name="pan_no" id="pan_no" class="form-control" placeholder="Pan No" maxlength="10" value="<?= isset($supplier) && !empty($supplier->pan_no) ? $supplier->pan_no : set_value('pan_no'); ?>">
                            </div>
                        </div>

                         <div class="col-sm-12 col-md-12 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Website</label>
								<input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?= isset($supplier) && !empty($supplier->website) ? $supplier->website : set_value('website'); ?>">
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-12 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Note</label>
								<textarea name="note" id="note" class="form-control" placeholder="Note"><?= isset($supplier) && !empty($supplier->note) ? $supplier->note : set_value('note'); ?></textarea>
                            </div>
                        </div>
                    
                        <div class="col-sm-8 col-md-8 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Address <span class="text-red">*</span></label>
                                <input type="text" class="form-control address" name="address" placeholder="Enter address" value="<?= isset($supplier) && isset($supplier->address) ? $supplier->address : set_value('address'); ?>" >
                                <span class="error-text error_address"></span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Country <span class="text-red">*</span></label>
                                <!-- <input type="text" class="form-control country" name="country" placeholder="Enter country" value="<?= isset($edit) && isset($edit->country) ? $edit->country : set_value('country'); ?>" >
                                <span class="error-text error_country"></span> -->
                                <select class="form-control country form-select " name="country" id="country" data-placeholder="Select Country">
                                	<option></option>
                                	<?php foreach ($country_array as $key => $value) { ?>
                                	<option value="<?= $value->id ?>" <?= isset($supplier) && isset($supplier->country) && $value->id == $supplier->country ?  "selected" : set_value('country'); ?>><?= $value->name ?></option>
                                	<?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">City <span class="text-red">*</span></label>
                                <select class="form-control state form-select city" name="city" id="city" data-placeholder="Select City">
                                	<option></option>
                                	<?php
                                	if(isset($supplier) && !empty($get_city)){
                                	 foreach ($get_city as $key => $value) { ?>
                                	<option value="<?= $value->id ?>" <?= isset($supplier) && isset($supplier->city) && $value->id == $supplier->city ?  "selected" : set_value('city'); ?>><?= $value->name ?></option>
                                	<?php } } ?>
                                </select>

                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-4 mb-2">
                            <div class="input-inside">
                                <label class="form-label">Postal Code </label>
                                <input type="text" class="form-control postal_code numbers_only" name="postal_code" placeholder="Enter postal code" maxlength="6" value="<?= isset($supplier) && isset($supplier->postal_code) ? $supplier->postal_code : set_value('postal_code'); ?>" >
                                <span class="error-text error_postal_code"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4 form-btns">
                            <button type="submit" class="box-btn fill_primary mt-3 mb-0" id="submit_btn">
                                Submit
                            </button>
                            <input type="hidden" name="supplier_id" value="<?= isset($supplier) && !empty($supplier->supplier_id) ? $supplier->supplier_id :''; ?>">
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js">
	
</script>
<script src="<?= base_url() ?>/assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/sweet-alert.js"></script>

<script type="text/javascript">
function goBack() {
	var continue_to = base_url + 'supplier';
	window.location = continue_to;
}

$(document).ready(function() {
	var continue_to = base_url + 'supplier';

	$('input').change(function() {
		$(this).closest('.form-group').removeClass('has-error');
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
		}else{
			$("#city").empty();
		}   
	});

	

	$('#add-form').validate({
		rules :{
			"firm_name":{
				required : true
			},"alter_email":{
				required : true
			},"address":{
				required : true
			},"country":{
				required : true
			},"state":{
				required : true
			},"city":{
				required : true
			}
		},
		messages :{
			"firm_name":{
				required : "Enter firm name"
			},"alter_email":{
				required : "Enter alter email"
			},"address":{
				required : "Enter address"
			},"country":{
				required : "Select Country"
			},"state":{
				required : "Select State"
			},"city":{
				required : "Select City"
			},

		},
		highlight: function (element)
            {
                $(element).closest('.form-control').addClass('is-invalid');
            },
            unhighlight: function (element)
            {
                $(element).closest('.form-control').removeClass('is-invalid');
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
	
	

	$('#submit_btn').click(function(e) {
		e.preventDefault();
		var isValid = 1;
		
		
		if(isValid) {
			submit_form();
			App.blockUI();
		} else {
			event.preventDefault();
		}
	});

	function submit_form() {
		if($('#add-form').valid()){
		$('#submit_btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: base_url + 'supplier/ajax_add_supplier',
			data: $('.supplier_form').serializeArray(),
			dataType: 'json',
			success: function(data) {
				$('#submit_btn').removeAttr('disabled');
				setTimeout(function() {
					if(data.status == 'success') {
						Swal.fire("Success!", data.message,"success");
					} else {
						Swal.fire("Warning!", "Error! Unable to complete process.","warning");
					}
				}, 500);
            
				setTimeout(function() {
					window.location = continue_to;
				},  2000);
			}, error: function(data) {
				$('#submit_btn').removeAttr('disabled');
				Swal.fire("Warning!","Error! Unable to complete process.","warning");
			}
		});
	}
	}

	$(window).bind("pageshow", function() {
		var form = $('form'); 
		form[0].reset();
	});

});
</script>