<?php // xdebug($supplier); ?>
<div class="portlet light bordered custom-formv">
    <div class="portlet-title">
        <div class="caption">
            <button class="btn btn-outline yellow-gold tooltips" data-container="body" data-placement="bottom" data-original-title="Back" onclick="goBack()"><i class="fa fa-long-arrow-left" aria-hidden="true"> </i> </button>
            <span class="caption-subject font-blue-hoki bold uppercase"><?= $title; ?></span>
        </div>
		
		<div class="close-formv">
            <a href="javascript:;" onclick="goBack()">
            	<img src="<?= asset_url(); ?>layouts/img/close-form.png" alt="">
            </a>
        </div>
    </div>
    
    <div class="portlet-body form">
        <form id="supplier_form" class="horizontal-form well">
			<div class="form-body">
				<h3 class="form-section m-10">Company Details</h3>
				<div class="row mt-10">
					<!-- <div class="col-md-3">
						<label class="control-label">First Name*</label>
						<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="<?= isset($supplier) && !empty($supplier->first_name) ? $supplier->first_name : set_value('first_name'); ?>"/>
						<span id="error_first_name" class="small text-danger"></span>
					</div>
					
					<div class="col-md-3">
						<label class="control-label">Last Name*</label>
						<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="<?= isset($supplier) && !empty($supplier->last_name) ? $supplier->last_name : set_value('last_name'); ?>"/>
						<span id="error_last_name" class="small text-danger"></span>
					</div>

					<div class="col-md-2">
						<label class="control-label">Code*</label>
						<input type="text" name="code" id="code" class="form-control" placeholder="Code" value="<?= isset($supplier) ? $supplier->code : set_value('code'); ?>" <?= (isset($supplier) && !empty($supplier->code) ? 'disabled' : ''); ?>/>
						<span id="error_code" class="small text-danger"></span>
					</div> -->

					<div class="col-md-6">
						<label class="control-label">Firm Name*</label>
						<input type="text" name="firm_name" id="firm_name" class="form-control" placeholder="Firm Name" value="<?= isset($supplier) && !empty($supplier->firm_name) ? $supplier->firm_name : set_value('firm_name'); ?>"/>
						<span id="error_firm_name" class="small text-danger"></span>
					</div>
					
					<!-- <div class="col-md-3">
						<label class="control-label">Email*</label>
						<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= isset($supplier) && !empty($supplier->email) ? $supplier->email : set_value('email'); ?>">
						<span id="error_email" class="small text-danger"></span>
					</div> -->

					<div class="col-md-3">
						<label class="control-label">Alter Email</label>
						<input type="text" name="alter_email" id="alter_email" class="form-control" placeholder="Alter Email" value="<?= isset($supplier) && !empty($supplier->alter_email) ? $supplier->alter_email : set_value('alter_email'); ?>">
						<span id="error_alter_email" class="small text-danger"></span>
					</div>

					<div class="col-md-3">
						<label class="control-label">PNR Retrieve Email</label>
						<input type="text" name="retrieve_email" id="retrieve_email" class="form-control" placeholder="PNR Retrieve Email" value="<?= isset($supplier) && !empty($supplier->retrieve_email) ? $supplier->retrieve_email : set_value('retrieve_email'); ?>">
						<span id="error_retrieve_email" class="small text-danger"></span>
					</div>
				</div>
			
				<div class="row mt-10">
					<div class="col-md-3">
						<label class="control-label">Website</label>
						<input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?= isset($supplier) && !empty($supplier->website) ? $supplier->website : set_value('website'); ?>">
					</div>

					<div class="col-md-3">
						<label class="control-label">GST No</label>
						<input type="text" name="gst_no" id="gst_no" class="form-control" placeholder="GST No" maxlength="15" value="<?= isset($supplier) && !empty($supplier->gst_no) ? $supplier->gst_no : set_value('gst_no'); ?>">
					</div>
					
					<div class="col-md-3">
						<label class="control-label">Pan No</label>
						<input type="text" name="pan_no" id="pan_no" class="form-control" placeholder="Pan No" maxlength="10" value="<?= isset($supplier) && !empty($supplier->pan_no) ? $supplier->pan_no : set_value('pan_no'); ?>">
					</div>

					<div class="col-md-3">
						<label class="control-label">Note</label>
						<textarea name="note" id="note" class="form-control" placeholder="Note"><?= isset($supplier) && !empty($supplier->note) ? $supplier->note : set_value('note'); ?></textarea>
					</div>
				</div>

				<div class="row mt-10">
					<div class="col-md-3">
						<label class="control-label">Address*</label>
						<textarea name="address" id="address" class="form-control" placeholder="Address"><?= isset($supplier) && !empty($supplier->address) ? $supplier->address : set_value('address'); ?></textarea>
						<span id="error_address" class="small text-danger"></span>
					</div>
					
					<div class="col-md-3">
						<label class="control-label">State*</label>
						<select name="state" id="state" class="form-control select2-allow-clear" data-placeholder="Choose State">
							<option></option>
							<?php foreach($_state as $key => $state) { 
							$selected = (isset($supplier) && isset($supplier->state) && $supplier->state == $key ? 'selected' : '');
							?>
								<option value="<?= $key; ?>" <?= $selected; ?>><?= $state; ?></option>
							<?php } ?>
						</select>
						<span id="error_state" class="small text-danger"></span>
					</div>
						
					<div class="col-md-3">
						<label class="control-label">City*</label>
						<input type="text" name="city" id="city" class="form-control" placeholder="City" value="<?= isset($supplier) && !empty($supplier->city) ? $supplier->city : set_value('city'); ?>">
						<span id="error_city" class="small text-danger"></span>
					</div>

					<div class="col-md-3">
						<label class="control-label">Postal Code*</label>
						<input type="text" name="postal_code" id="postal_code" class="form-control numbers_only" placeholder="Postal Code" maxlength="6" value="<?= isset($supplier) && !empty($supplier->postal_code) ? $supplier->postal_code : set_value('postal_code'); ?>">
						<span id="error_postal_code" class="small text-danger"></span>
					</div>
				</div>

				<h3 class="form-section m-10">Contact No</h3>
				<div class="row">
	                <div class="form-group">
	                    <div class="col-md-12">
							<?php if(isset($_contact) && !empty($_contact)) { ?>
	                        <div class="mt-repeater">
	                            <a href="javascript:;" data-repeater-create class="btn blue-sharp btn-outline btn-sm mt-repeater-add" data-toggle="tooltip" data-placement="left" data-original-title="Add more"> <i class="fa fa-plus"></i> </a>
	                            <?php foreach($_contact as $contact): ?>
	                            <div data-repeater-list="contacts">
	                                <div data-repeater-item class="row">
	                                    <div class="col-md-8 mt-10">
											<input type="text" name="contact" class="form-control contact" placeholder="Contact No" maxlength="10" value="<?= isset($contact) && !empty($contact->contact) ? $contact->contact : set_value('contact'); ?>">
											<span class="small text-danger error_contact"></span>

											<input type="hidden" name="contact_id" value="<?= isset($contact) && !empty($contact->contact_id) ? $contact->contact_id : set_value('contact_id'); ?>">
	                                    </div>
	                                </div>
	                            </div>
	                        <?php endforeach; ?>
	                        </div>
	                    	<?php } else { ?>
	                    	<div class="mt-repeater">
	                            <a href="javascript:;" data-repeater-create class="btn blue-sharp btn-outline btn-sm mt-repeater-add" data-toggle="tooltip" data-placement="left" data-original-title="Add more"> <i class="fa fa-plus"></i> </a>

	                            <div data-repeater-list="contacts">
	                                <div data-repeater-item class="row">
	                                    <div class="col-md-8 mt-10">
											<input type="text" name="contact" class="form-control contact" placeholder="Contact No" maxlength="10">
											<span class="small text-danger error_contact"></span>
	                                    </div>

	                                    <div class="col-md-1 mt-10">
	                                        <label class="control-label">&nbsp;</label>
	                                        <a href="javascript:;" data-repeater-delete class="btn red-sunglo btn-sm btn-outline">
	                                            <i class="fa fa-close"></i>
	                                        </a>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    	<?php } ?>

	                    </div>
	                </div>
	            </div>
			
				<h3 class="form-section m-10">Admin</h3>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label">First Name*</label>
						<input type="text" name="cp_first[]" id="ad_first" class="form-control" placeholder="First Name" value="<?= isset($admin) && !empty($admin->first_name) ? $admin->first_name : set_value('first_name'); ?>" />
						<span id="error_ad_first" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Last Name*</label>
						<input type="text" name="cp_last[]" id="ad_last" class="form-control" placeholder="Last Name" value="<?= isset($admin) && !empty($admin->last_name) ? $admin->last_name : set_value('last_name'); ?>" />
						<span id="error_ad_last" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Contact No*</label>
						<input type="text" name="cp_contact[]" id="ad_contact" class="form-control" placeholder="Contact No" value="<?= isset($admin) && !empty($admin->contact) ? $admin->contact : set_value('contact'); ?>" maxlength="10">
						<span id="error_ad_contact" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Email*</label>
						<input type="text" name="cp_email[]" id="ad_email" class="form-control" placeholder="Email" value="<?= isset($admin) && !empty($admin->email) ? $admin->email : set_value('email'); ?>" <?= isset($admin) && !empty($admin->email) ? 'disabled' : ''; ?>>
						<span id="error_ad_email" class="small text-danger"></span>
					</div>
	
					<input type="hidden" name="cp_email[]" value="<?= isset($admin) && !empty($admin->email) ? $admin->email : set_value('email'); ?>">
					<input type="hidden" name="contact_id[]" value="<?= isset($admin) && !empty($admin->contact_id) ? $admin->contact_id : set_value('contact_id'); ?>">
					<input type="hidden" name="is_contact[]" value="<?= Contact_type::ADMIN ?>">
				</div>

				<h3 class="form-section m-10">Account</h3>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label">First Name*</label>
						<input type="text" name="cp_first[]" id="ac_first" class="form-control" placeholder="First Name" value="<?= isset($account) && !empty($account->first_name) ? $account->first_name : set_value('first_name'); ?>" />
						<span id="error_ac_first" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Last Name*</label>
						<input type="text" name="cp_last[]" id="ac_last" class="form-control" placeholder="Last Name" value="<?= isset($account) && !empty($account->last_name) ? $account->last_name : set_value('last_name'); ?>" />
						<span id="error_ac_last" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Contact No*</label>
						<input type="text" name="cp_contact[]" id="ac_contact" class="form-control" placeholder="Contact No" value="<?= isset($account) && !empty($account->contact) ? $account->contact : set_value('contact'); ?>" maxlength="10">
						<span id="error_ac_contact" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Email*</label>
						<input type="text" name="cp_email[]" id="ac_email" class="form-control" placeholder="Email" value="<?= isset($account) && !empty($account->email) ? $account->email : set_value('email'); ?>">
						<span id="error_ac_email" class="small text-danger"></span>
					</div>
	
					<input type="hidden" name="contact_id[]" value="<?= isset($account) && !empty($account->contact_id) ? $account->contact_id : set_value('contact_id'); ?>">
					<input type="hidden" name="is_contact[]" value="<?= Contact_type::ACCOUNT ?>">
				</div>
			
				<h3 class="form-section m-10">Operator</h3>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label">First Name*</label>
						<input type="text" name="cp_first[]" id="op_first" class="form-control" placeholder="First Name" value="<?= isset($operator) && !empty($operator->first_name) ? $operator->first_name : set_value('first_name'); ?>" />
						<span id="error_op_first" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Last Name*</label>
						<input type="text" name="cp_last[]" id="op_last" class="form-control" placeholder="Last Name" value="<?= isset($operator) && !empty($operator->last_name) ? $operator->last_name : set_value('last_name'); ?>" />
						<span id="error_op_last" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Landline No*</label>
						<input type="text" name="cp_contact[]" id="op_contact" class="form-control" placeholder="Landline No" value="<?= isset($operator) && !empty($operator->contact) ? $operator->contact : set_value('contact'); ?>" maxlength="10">
						<span id="error_op_contact" class="small text-danger"></span>
					</div>
	
					<div class="col-md-3">
						<label class="control-label">Email*</label>
						<input type="text" name="cp_email[]" id="op_email" class="form-control" placeholder="Email" value="<?= isset($operator) && !empty($operator->email) ? $operator->email : set_value('email'); ?>">
						<span id="error_op_email" class="small text-danger"></span>
					</div>
	
					<input type="hidden" name="contact_id[]" value="<?= isset($operator) && !empty($operator->contact_id) ? $operator->contact_id : set_value('contact_id'); ?>">
					<input type="hidden" name="is_contact[]" value="<?= Contact_type::OPERATOR ?>">
				</div>
			
			<!-- <h3 class="form-section m-10">Bank Details</h3>
			<div class="row">
                <div class="form-group">
                    <div class="col-md-12">
					
                        <div class="mt-repeater">
                            <a href="javascript:;" data-repeater-create class="btn blue-sharp btn-outline btn-sm mt-repeater-add" data-toggle="tooltip" data-placement="left" data-original-title="Add more"> <i class="fa fa-plus"></i> </a>

                            <div data-repeater-list="banks">
                                <div data-repeater-item class="row">
                                    <div class="col-md-2">
										<label class="control-label">Account No</label>
										<input type="text" name="account_no[]" class="form-control account_no numbers_only" placeholder="Account No" maxlength="16">
										<span class="small text-danger error_account_no"></span>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label class="control-label">IFSC Code</label>
										<input type="text" name="ifsc_code[]" class="form-control ifsc" placeholder="IFSC Code" maxlength="11">
										<span class="small text-danger error_ifsc"></span>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="control-label">Bank Name</label>
										<input type="text" name="bank_name[]" class="form-control bank_name" placeholder="Bank Name" readonly>
										<span class="small text-danger error_bank_name"></span>
                                    </div>
									
									<div class="col-md-3">
                                        <label class="control-label">Branch</label>
										<input type="text" name="branch[]" class="form-control branch" placeholder="Branch" readonly>
										<span class="small text-danger error_branch"></span>
                                    </div>

                                    <div class="col-md-1 mt-25">
                                        <label class="control-label">&nbsp;</label>
                                        <a href="javascript:;" data-repeater-delete class="btn red-sunglo btn-sm btn-outline">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> -->
			</div>
			
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-9">
						<input type="hidden" name="supplier_id" value="<?= isset($supplier) && !empty($supplier->supplier_id) ? s$supplier->supplier_id:''; ?>">
                        <button type="submit" id="submit_btn" class="btn yellow-gold"> <i class="fa fa-check"></i> Save </button>
						<button type="button" class="btn default" onclick="goBack()">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
		<!-- END FORM-->
		
    </div>
</div>
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
	
	/*$('body').on('blur change', '#code', function() {
		$('#error_code').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_code').html('Please enter code').show();
		} else {
			var code = $(this).val().trim();
			code_exist = false;
			$('#submit_btn').prop("disabled", true);
			$.ajax({
				type: 'POST',
				url:  base_url + 'common/ajax_check_code_exist',
				data: {'code':code},
				dataType: 'json',
				success: function(data) {
					setTimeout(function() {
						$('#submit_btn').prop("disabled", false);
						if(data.code_exist == true) {
							code_exist = true;
							$('#submit_btn').prop("disabled", true);
							$('#code').parents('.form-group').addClass('has-error');
							$('#error_code').html('This code is already exist').show();
						} else {
							$('#submit_btn').prop("disabled", false);
						}
					}, 1000);
				},
				error: function(data)
				{
					ajax_error_swal(data.status);
				}
			});
		}
	});*/

	$('body').on('blur change', '#firm_name', function() {
		$('#error_firm_name').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_firm_name').html('Please enter firm name').show();
		}
	});

	$('body').on('blur change', '#first_name', function() {
		$('#error_first_name').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_first_name').html('Please enter first name').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_first_name').html('Please enter only alphabet').show();
		}
	});
	
	$('body').on('blur change', '#last_name', function() {
		$('#error_last_name').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_last_name').html('Please enter last name').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_last_name').html('Please enter only alphabet').show();
		}
	});
	
	/*$('body').on('blur change', '#email', function() {
		$('#error_email').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_email').html('Please enter email address').show();
		} else if( ! validateEmail($(this).val().trim())) {
			$('#error_email').html('Please enter valid email address').show();
		}
	});*/

	$('body').on('change blur', '#ad_email', function() {
		$('#error_ad_email').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ad_email').html('Please enter valid email address').show();
		} else if( ! validateEmail($(this).val().trim())) {
			$('#error_ad_email').html('Please enter valid email address').show();
		} else {
			var email = $(this).val().trim();
			email_exist = false;
			$('#submit_btn').prop("disabled", true);
			$.ajax({
				type: 'POST',
				url:  base_url + 'common/ajax_check_user_exist',
				data: {'email':email},
				dataType: 'json',
				success: function(data) {
					setTimeout(function() {
						$('#submit_btn').prop("disabled", false);
						if(data.user_exist == true) {
							email_exist = true;
							$('#submit_btn').prop("disabled", true);
							
							$('#ad_email').parents('.form-group').addClass('has-error');
							$('#error_ad_email').html('This email address is already exist').show();
						} else {
							$('#submit_btn').prop("disabled", false);
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
	
	$('body').on('blur change', '#alter_email', function() {
		$('#error_alter_email').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_alter_email').html('Please enter email address').show();
		} else if( ! validateEmail($(this).val().trim())) {
			$('#error_alter_email').html('Please enter valid email address').show();
		}
	});

	$('body').on('change keyup', '.contact',function() {
		$(this).siblings('.error_contact').html('').hide();
		if(! validateNumber($(this).val().trim())) {
			$(this).siblings('.error_contact').html('Only numbers are allowed').show();
		} else if( ! validateMobile($(this).val().trim())) {
			$(this).siblings('.error_contact').html('Please enter 10 digit contact no').show();
		}
    });

    $('body').on('change, blur','#ad_first',function() {
		$('#error_ad_first').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ad_first').html('Please enter first name').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_ad_first').html('Please enter only alphabet').show();
		}
	});

	$('body').on('change, blur','#ad_last',function() {
		$('#error_ad_last').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ad_last').html('Please enter last name').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_ad_last').html('Please enter only alphabet').show();
		}
	});

	$('body').on('change, blur','#ad_contact',function() {
		$('#error_ad_contact').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ad_contact').html('Please enter contact no').show();
		} else if( ! validateNumber($(this).val().trim())) {
			$('#error_ad_contact').html('Only numbers are allowed').show();
		}  else if( ! validateMobile($(this).val().trim())) {
			$('#error_ad_contact').html('Please enter 10 digit contact no').show();
		}
	});
	
	/*$('body').on('change, blur','#ad_email',function() {
		$('#error_ad_email').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ad_email').html('Please enter email address').show();
		} else if( ! validateEmail($(this).val().trim())) {
			$('#error_ad_email').html('Please enter valid email address').show();
		}
	});*/

	$('body').on('change, blur','#ac_first',function() {
		$('#error_ac_first').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ac_first').html('Please enter first name').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_ac_first').html('Please enter only alphabet').show();
		}
	});

	$('body').on('change, blur','#ac_last',function() {
		$('#error_ac_last').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ac_last').html('Please enter last name').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_ac_last').html('Please enter only alphabet').show();
		}
	});

	$('body').on('change, blur','#ac_contact',function() {
		$('#error_ac_contact').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ac_contact').html('Please enter contact no').show();
		} else if( ! validateNumber($(this).val().trim())) {
			$('#error_ac_contact').html('Only numbers are allowed').show();
		}  else if( ! validateMobile($(this).val().trim())) {
			$('#error_ac_contact').html('Please enter 10 digit contact no').show();
		}
	});
	
	$('body').on('change, blur','#ac_email',function() {
		$('#error_ac_email').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_ac_email').html('Please enter email address').show();
		} else if( ! validateEmail($(this).val().trim())) {
			$('#error_ac_email').html('Please enter valid email address').show();
		}
	});

	$('body').on('change, blur','#op_first',function() {
		$('#error_op_first').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_op_first').html('Please enter first name').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_op_first').html('Please enter only alphabet').show();
		}
	});

	$('body').on('change, blur','#op_last',function() {
		$('#error_op_last').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_op_last').html('Please enter last name').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_op_last').html('Please enter only alphabet').show();
		}
	});

	$('body').on('change, blur','#op_contact',function() {
		$('#error_op_contact').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_op_contact').html('Please enter contact no').show();
		} else if( ! validateNumber($(this).val().trim())) {
			$('#error_op_contact').html('Only numbers are allowed').show();
		}  else if( ! validateMobile($(this).val().trim())) {
			$('#error_op_contact').html('Please enter 10 digit contact no').show();
		}
	});
	
	$('body').on('change blur','#op_email',function() {
		$('#error_op_email').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_op_email').html('Please enter email address').show();
		} else if( ! validateEmail($(this).val().trim())) {
			$('#error_op_email').html('Please enter valid email address').show();
		}
	});

	$('body').on('change blur','#address',function() {
		$('#error_address').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_address').html('Please enter address').show();
		}
	});

	$('body').on('change blur','#state',function() {
		$('#error_state').html('').hide();
		if(!$(this).val()) {
			$('#error_state').html('Choose state').show();
		}
	});

	$('body').on('change blur','#city',function() {
		$('#error_city').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_city').html('Please enter city').show();
		} else if(!validateName($(this).val().trim())) {
			$('#error_city').html('Please enter only alphabet').show();
		}
	});

	$('body').on('change blur','#postal_code',function() {
	    $('#error_postal_code').html('').hide();
	    if($('#postal_code').val().length != '6') {
	        $('#error_postal_code').html('Please enter 6 digit postal code').show();
	    } else if(! validateNumber($('#postal_code').val().trim())) {
	        $('#error_postal_code').html('Please enter valid postal code').show();
	    }
	});

	/*$('body').on('change keyup blur', '.account_no',function() {
		$(this).siblings('.error_account_no').html('').hide();
		if($(this).val().trim() == '') {
			$(this).siblings('.error_account_no').html('Please enter account no').show();
		} else if(! validateNumber($(this).val().trim())) {
			$(this).siblings('.error_account_no').html('Only numbers are allowed').show();
		} else if( ! validateAccount($(this).val().trim())) {
			$(this).siblings('.error_account_no').html('Please enter 16 digit account no').show();
		}
    });
	
	$('body').on('change keyup blur', '.ifsc', function() {
	    if(!($(this).val()) && $(this).val().length < 11) {
	    	$(this).siblings('.error_ifsc').html('Please enter 11 digit ifsc code').show();
	    } else if($(this).val().length == 11) {
	        $(this).siblings('.error_ifsc').html('').hide();
	        var iCode = $(this).val().toUpperCase();
	        $.ajax({
                type: 'GET',
                url: 'https://ifsc.razorpay.com/' + iCode,
                success: function(data) {
                    setTimeout(function() {
                        if(data.IFSC == iCode) {
							var branch = data.BRANCH.replace(/[^\x00-\x7F]/g, '');
                            $('.bank_name').val(data.BANK);
                            $('.error_bank_name').hide();
                            $('.branch').val(branch);
                            $('.error_branch').hide();
                        }
                    }, 700);
                }, error: function(data) {
		            $('.error_ifsc').html('Please enter valid ifsc code').show();
                    $('.bank_name, .branch').val('');
                    $('.error_bank_name').html('Please enter bank name').show();
                    $('.error_branch').html('Please enter branch').show();
                }
            });
	    }
	});*/

	$('#submit_btn').click(function(e) {
		e.preventDefault();
		var isValid = 1;
		
		/*if($('#code').val().trim() == '') {
			isValid = 0;
			$('#code').parents('.form-group').addClass('has-error');
			$('#error_code').html('Please enter code').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}*/
 
		if($('#firm_name').val().trim() == '') {
			isValid = 0;
			$('#firm_name').parents('.form-group').addClass('has-error');
			$('#error_firm_name').html('Please enter firm name').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		} /*else if(!validateName($('#firm_name').val().trim())) {
			isValid = 0;
			$('#firm_name').parents('.form-group').addClass('has-error');
			$('#error_firm_name').html('Please enter only alphabet').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}*/

		/*if($('#first_name').val().trim() == '') {
			isValid = 0;
			$('#first_name').parents('.form-group').addClass('has-error');
			$('#error_first_name').html('Please enter first name').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		} else if(!validateName($('#first_name').val().trim())) {
			isValid = 0;
			$('#first_name').parents('.form-group').addClass('has-error');
			$('#error_first_name').html('Please enter only alphabet').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}
		
		if($('#last_name').val().trim() == '') {
			isValid = 0;
			$('#last_name').parents('.form-group').addClass('has-error');
			$('#error_last_name').html('Please enter last name').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		} else if(!validateName($('#last_name').val().trim())) {
			isValid = 0;
			$('#last_name').parents('.form-group').addClass('has-error');
			$('#error_last_name').html('Please enter only alphabet').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}
		
		if($('#email').val().trim() == '') {
			isValid = 0;
			$('#email').parents('.form-group').addClass('has-error');
			$('#error_email').html('Please enter email address').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		} else if( ! validateEmail($('#email').val().trim())) {
			isValid = 0;
			$('#email').parents('.form-group').addClass('has-error');
			$('#error_email').html('Please enter valid email address').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}*/

		if($('#ad_first').val().trim() == '') {
			isValid = 0;
			$('#ad_first').parents('.form-group').addClass('has-error');
			$('#error_ad_first').html('Please enter first name').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		} else if(!validateName($('#ad_first').val().trim())) {
			isValid = 0;
			$('#ad_first').parents('.form-group').addClass('has-error');
			$('#error_ad_first').html('Please enter only alphabet').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}

		if($('#ad_last').val().trim() == '') {
			isValid = 0;
			$('#ad_last').parents('.form-group').addClass('has-error');
			$('#error_ad_last').html('Please enter last name').show();
		} else if(!validateName($('#ad_last').val().trim())) {
			isValid = 0;
			$('#ad_last').parents('.form-group').addClass('has-error');
			$('#error_ad_last').html('Please enter only alphabet').show();
		}

		if($('#ad_contact').val().trim() == '') {
			isValid = 0;
			$('#ad_contact').parents('.form-group').addClass('has-error');
			$('#error_ad_contact').html('Please enter contact no').show();
		} else if( ! validateNumber($('#ad_contact').val().trim())) {
			isValid = 0;
			$('#ad_contact').parents('.form-group').addClass('has-error');
			$('#error_ad_contact').html('Please enter valid contact no').show();
		} else if( ! validateMobile($('#ad_contact').val().trim())) {
			isValid = 0;
			$('#ad_contact').parents('.form-group').addClass('has-error');
			$('#error_ad_contact').html('Please enter 10 digit contact no').show();
		}

		if($('#ad_email').val().trim() == '') {
			isValid = 0;
			$('#ad_email').parents('.form-group').addClass('has-error');
			$('#error_ad_email').html('Please enter email address').show();
		} else if( ! validateEmail($('#ad_email').val().trim())) {
			isValid = 0;
			$('#ad_email').parents('.form-group').addClass('has-error');
			$('#error_ad_email').html('Please enter valid email address').show();
		}

		if($('#ac_first').val().trim() == '') {
			isValid = 0;
			$('#ac_first').parents('.form-group').addClass('has-error');
			$('#error_ac_first').html('Please enter first name').show();
		} else if(!validateName($('#ac_first').val().trim())) {
			isValid = 0;
			$('#ac_first').parents('.form-group').addClass('has-error');
			$('#error_ac_first').html('Please enter only alphabet').show();
		}

		if($('#ac_last').val().trim() == '') {
			isValid = 0;
			$('#ac_last').parents('.form-group').addClass('has-error');
			$('#error_ac_last').html('Please enter last name').show();
		} else if(!validateName($('#ac_last').val().trim())) {
			isValid = 0;
			$('#ac_last').parents('.form-group').addClass('has-error');
			$('#error_ac_last').html('Please enter only alphabet').show();
		}

		if($('#ac_contact').val().trim() == '') {
			isValid = 0;
			$('#ac_contact').parents('.form-group').addClass('has-error');
			$('#error_ac_contact').html('Please enter contact no').show();
		} else if( ! validateNumber($('#ac_contact').val().trim())) {
			isValid = 0;
			$('#ac_contact').parents('.form-group').addClass('has-error');
			$('#error_ac_contact').html('Please enter valid contact no').show();
		} else if( ! validateMobile($('#ac_contact').val().trim())) {
			isValid = 0;
			$('#ac_contact').parents('.form-group').addClass('has-error');
			$('#error_ac_contact').html('Please enter 10 digit contact no').show();
		}

		if($('#ac_email').val().trim() == '') {
			isValid = 0;
			$('#ac_email').parents('.form-group').addClass('has-error');
			$('#error_ac_email').html('Please enter email address').show();
		} else if( ! validateEmail($('#ac_email').val().trim())) {
			isValid = 0;
			$('#ac_email').parents('.form-group').addClass('has-error');
			$('#error_ac_email').html('Please enter valid email address').show();
		}

		if($('#op_first').val().trim() == '') {
			isValid = 0;
			$('#op_first').parents('.form-group').addClass('has-error');
			$('#error_op_first').html('Please enter first name').show();
		} else if(!validateName($('#op_first').val().trim())) {
			isValid = 0;
			$('#op_first').parents('.form-group').addClass('has-error');
			$('#error_op_first').html('Please enter only alphabet').show();
		}

		if($('#op_last').val().trim() == '') {
			isValid = 0;
			$('#op_last').parents('.form-group').addClass('has-error');
			$('#error_op_last').html('Please enter last name').show();
		} else if(!validateName($('#op_last').val().trim())) {
			isValid = 0;
			$('#op_last').parents('.form-group').addClass('has-error');
			$('#error_op_last').html('Please enter only alphabet').show();
		}

		if($('#op_contact').val().trim() == '') {
			isValid = 0;
			$('#op_contact').parents('.form-group').addClass('has-error');
			$('#error_op_contact').html('Please enter contact no').show();
		} else if( ! validateNumber($('#op_contact').val().trim())) {
			isValid = 0;
			$('#op_contact').parents('.form-group').addClass('has-error');
			$('#error_op_contact').html('Please enter valid contact no').show();
		} else if( ! validateMobile($('#op_contact').val().trim())) {
			isValid = 0;
			$('#op_contact').parents('.form-group').addClass('has-error');
			$('#error_op_contact').html('Please enter 10 digit contact no').show();
		}

		if($('#op_email').val().trim() == '') {
			isValid = 0;
			$('#op_email').parents('.form-group').addClass('has-error');
			$('#error_op_email').html('Please enter email address').show();
		} else if( ! validateEmail($('#op_email').val().trim())) {
			isValid = 0;
			$('#op_email').parents('.form-group').addClass('has-error');
			$('#error_op_email').html('Please enter valid email address').show();
		}

		if($('#address').val().trim() == '') {
			isValid = 0;
			$('#address').parents('.form-group').addClass('has-error');
			$('#error_address').html('Please enter address').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}

		if(!$('#state').val()) {
			isValid = 0;
			$('#state').parents('.form-group').addClass('has-error');
			$('#error_state').html('Choose state').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}

		if($('#city').val().trim() == '') {
			isValid = 0;
			$('#city').parents('.form-group').addClass('has-error');
			$('#error_city').html('Please enter city').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		} else if(!validateName($('#city').val().trim())) {
			isValid = 0;
			$('#city').parents('.form-group').addClass('has-error');
			$('#error_city').html('Please enter only alphabet').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}

		if($('#postal_code').val().trim() == '') {
			isValid = 0;
			$('#postal_code').parents('.form-group').addClass('has-error');
			$('#error_postal_code').html('Please enter postal code').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		} else if($('#postal_code').val().length != '6') {
			isValid = 0;
			$('#postal_code').parents('.form-group').addClass('has-error');
			$('#error_postal_code').html('Please enter 6 digit postal code').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		} else if( ! validateNumber($('#postal_code').val().trim())) {
			isValid = 0;
			$('#postal_code').parents('.form-group').addClass('has-error');
			$('#error_postal_code').html('Please enter valid postal code').show();
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}
		
		/*if($('.contact').val().trim() == '') {
			isValid = 0;
			$('.contact').parents('.form-group').addClass('has-error');
			$('.contact').siblings('.error_contact').html('Please enter contact no').show();
		} else if( ! validateNumber($('.contact').val().trim())) {
			isValid = 0;
			$('.contact').parents('.form-group').addClass('has-error');
			$('.contact').siblings('.error_contact').html('Only numbers are allowed').show();
		} else if( ! validateMobile($('.contact').val().trim())) {
			isValid = 0;
			$('.contact').parents('.form-group').addClass('has-error');
			$('.contact').siblings('.error_contact').html('Please enter 10 digit contact no').show();
		}*/

		/*if(isValid) {
			submit_form();
		}*/
		if(isValid) {
			submit_form();
			App.blockUI();
		} else {
			event.preventDefault();
		}
	});

	function submit_form() {
		$('#submit_btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: base_url + 'console/supplier/ajax_add_supplier',
			data: $('#supplier_form').serialize(),
			dataType: 'json',
			success: function(data) {
				$('#submit_btn').removeAttr('disabled');
				setTimeout(function() {
					if(data.status == 'success') {
						quick_swal("success", data.message);
					} else {
						quick_swal("warning", "Error! Unable to complete process.");
					}
				}, 500);
            
				setTimeout(function() {
					window.location = continue_to;
				},  2000);
			}, error: function(data) {
				$('#submit_btn').removeAttr('disabled');
				quick_swal("warning","Error! Unable to complete process.");
			}
		});
	}

	$(window).bind("pageshow", function() {
		var form = $('form'); 
		form[0].reset();
	});

});
</script>