<?php // xdebug($supplier); ?>
<style type="text/css">
	.help-block{
		color: #e23e3d;
	}
	.input-container input {
		border: none;
		box-sizing: border-box;
		outline: 0;
		padding: .75rem;
		position: relative;
		width: 100%;
	}

	
	.loader {
		border: 16px solid #f3f3f3;
		border-radius: 50%;
		border-top: 16px solid blue;
		border-right: 16px solid green;
		border-bottom: 16px solid red;
		width: 50px;
		height: 50px;
		-webkit-animation: spin 2s linear infinite;
		animation: spin 2s linear infinite;
	}
	.error{color:#e23e3d;margin-bottom: 0;}
</style>
<?php

if($this->session->userdata('user_role') == User_role::FRANCHISE){
	$walletuser =  $this->session->userdata('user_id');
}else if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
	$walletuser =  $this->session->userdata('franchise_id');
}

$wallet =  $this->setting_model->get_wallet($walletuser);
 ?>
<div class="row">
	<div class="col-md-12 col-xl-12">

		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h3 class="card-title pull-left"><?= $title?></h3>
				<h3 class="card-title pull-right">Price : <?=number_format($totalcost); ?> <?=$pricePassenger["Currency"]; ?></h3>
				<input type="hidden" name="ticketprice" id="ticketprice" value="<?=$totalcost; ?>">
				<input type="hidden" name="userwallet" id="userwallet" value="<?=$wallet->balance; ?>">
			</div>

			<div class="card-body">
				<?php if($status == 1) { 
					$adult = $pricePassenger['PassengerBreakup']['ADT']['PassengerCount'];
					$children = $pricePassenger['PassengerBreakup']['CHD']['PassengerCount'];
					$infant = $pricePassenger['PassengerBreakup']['INF']['PassengerCount'];
					
					$appreference = $this->setting_model->get_string(4)."-".$this->setting_model->get_numeric_string(6)."-".$this->setting_model->get_numeric_string(6);

					?>
					<form class="form-horizontal booking_form validate-form" id="booking_form" method="post">

						<input type="hidden" name="rtoken" value="<?= $ResultToken; ?>" />
						<input type="hidden" name="from" value="<?= $from; ?>" />
						<input type="hidden" name="to" value="<?= $to; ?>" />
						<input type="hidden" name="appreference" value="<?= $appreference; ?>" />
						<input type="hidden" name="bookingdate" value="<?= $newbookingdate; ?>" />
						<input type="hidden" name="trip" value="<?= $trip; ?>" />
						<?php if($adult != "" && $adult > 0) { 
							for($i = 0;$i < $adult; $i++){
								?>

								<div class="row">
									<div class="col-md-1"><b>Adult<?=$i+1?></b></div>	
									<div class="col-sm-1 col-md-1">
										<div class="form-group">
											<select name="name_title[]" id="" class="form-control select2-show-search form-select">
												<option value="Mr">Mr</option>
												<option value="Ms">Ms</option>
												<option value="Miss">Miss</option>
												<option value="Mrs">Mrs</option>
												<option value="Mstr">Mstr</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3 col-md-2">
										<div class="form-group">
											<p ><input type="text" name="first_name[]" id="first_name<?=$i?>" class="form-control first_name" placeholder="Enter First Name" value=""/>
											</p>
										</div>
									</div>
									<div class="col-sm-3 col-md-2">
										<div class="form-group">
											<p><input type="text" name="last_name[]" id="last_name" class="form-control" placeholder="Enter Last Name" value=""/></p>
										</div>
									</div>
									<div class="col-sm-3 col-md-2">
										<div class="form-group">
											<p><input class="form-control" id="birthdate" name="date_of_birth[]" placeholder="Select birth date" onfocus="(this.type = 'date')"  type="text"></p>
										</div>
									</div>
									<div class="col-sm-3 col-md-2">
										<div class="form-group">
											<p><input type="text" name="address[]" id="pincode" class="form-control" placeholder="Enter address" value=""/></p>
										</div>
									</div>
									<div class="col-sm-3 col-md-2">
										<div class="form-group">
											<p><input type="text" name="pincode[]" id="pincode" class="form-control" placeholder="Enter pincode" value=""/></p>
										</div>
									</div>
								</div>  
								<?php if($flighttype == "International"){ ?>
									<div class="row">
										<div class="col-sm-3 col-md-2">&nbsp;</div>
										<div class="col-sm-3 col-md-3">
											<div class="form-group">
												<p ><input type="text" name="passport_no[]" id="passport_no<?=$i?>" class="form-control passport_no" placeholder="Passport Number" value=""/>
												</p>
											</div>
										</div>
										<div class="col-sm-3 col-md-3">
											<div class="form-group">
												<p>
													<select class="form-control" name="passenger_passport_issuing_country[]" id="passenger_passport_issuing_country<?=$i?>">
														<option value="">Please Select Country</option>
														<?php foreach($country as $value){ ?>
															<option value="<?=$value->name?>"><?=$value->name?></option>
														<?php } ?>	
													</select>	
												</p>
											</div>
										</div>
										<div class="col-sm-3 col-md-3">
											<div class="form-group">
												<p><input class="form-control passenger_passport_expiry_day" id="passenger_passport_expiry_day" name="passenger_passport_expiry_day[]" placeholder="Date of Expire" type="text" onfocus="(this.type = 'date')"></p>
											</div>
										</div>
									</div>	
								<?php }   ?>
								<input class="form-control" id="type" name="type[]" value="ADT" type="hidden">
							<?php } } ?>
							<?php if($children != "" && $children > 0) { 
								for($i = 0;$i < $children; $i++){
									?>

									<div class="row">
										<div class="col-md-1"><b>Child<?=$i+1?></b></div>	
										<div class="col-sm-1 col-md-1">
											<div class="form-group">
												<select name="name_title[]" id="" class="form-control select2-show-search form-select">
													<option value="Mr">Mr</option>
													<option value="Ms">Ms</option>
													<option value="Miss">Miss</option>
													<option value="Mrs">Mrs</option>
													<option value="Mstr">Mstr</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3 col-md-2">
											<div class="form-group">
												<p><input type="text" name="first_name[]" id="first_name<?=$i?>" class="form-control first_name" placeholder="Enter First Name" value=""/></p>
											</div>
										</div>
										<div class="col-sm-3 col-md-2">
											<div class="form-group">
												<p><input type="text" name="last_name[]" id="last_name" class="form-control" placeholder="Enter Last Name" value=""/></p>
											</div>
										</div>
										<div class="col-sm-3 col-md-2">
											<div class="form-group">
												<p><input class="form-control" id="birthdate" name="date_of_birth[]" placeholder="Select birth date" onfocus="(this.type = 'date')"  type="text"></p>
											</div>
										</div>
										<div class="col-sm-3 col-md-2">
											<div class="form-group">
												<p><input type="text" name="address[]" id="pincode" class="form-control" placeholder="Enter address" value=""/></p>
											</div>
										</div>
										<div class="col-sm-3 col-md-2">
											<div class="form-group">
												<p><input type="text" name="pincode[]" id="pincode" class="form-control" placeholder="Enter pincode" value=""/></p>
											</div>
										</div>
									</div> 
									<?php if($flighttype == "International"){ ?>
										<div class="row">
											<div class="col-sm-3 col-md-2">&nbsp;</div>
											<div class="col-sm-3 col-md-3">
												<div class="form-group">
													<p ><input type="text" name="passport_no[]" id="passport_no<?=$i?>" class="form-control passport_no" placeholder="Passport Number" value=""/>
													</p>
												</div>
											</div>
											<div class="col-sm-3 col-md-3">
												<div class="form-group">
													<p>
														<select class="form-control" name="passenger_passport_issuing_country[]" id="passenger_passport_issuing_country<?=$i?>">
															<option value="">Please Select Country</option>
															<?php foreach($country as $value){ ?>
																<option value="<?=$value->name?>"><?=$value->name?></option>
															<?php } ?>	
														</select>	
													</p>
												</div>
											</div>
											<div class="col-sm-3 col-md-3">
												<div class="form-group">
													<p><input class="form-control passenger_passport_expiry_day" id="passenger_passport_expiry_day" name="passenger_passport_expiry_day[]" placeholder="Date of Expire" type="text" onfocus="(this.type = 'date')"></p>
												</div>
											</div>
										</div>	
									<?php }   ?>
									<input class="form-control" id="type" name="type[]" value="CHD" type="hidden">   
								<?php } } ?>
								<?php if($infant != "" && $infant > 0) { 
									for($i = 0;$i < $infant; $i++){
										?>

										<div class="row">
											<div class="col-md-1"><b>Infant<?=$i+1?></b></div>	
											<div class="col-sm-1 col-md-1">
												<div class="form-group">
													<select name="name_title[]" id="" class="form-control select2-show-search form-select">
														<option value="Mr">Mr</option>
														<option value="Ms">Ms</option>
														<option value="Miss">Miss</option>
														<option value="Mrs">Mrs</option>
														<option value="Mstr">Mstr</option>
													</select>
												</div>
											</div>
											<div class="col-sm-3 col-md-2">
												<div class="form-group">
													<p><input type="text" name="first_name[]" id="first_name<?=$i?>" class="form-control first_name" placeholder="Enter First Name" value=""/></p>
												</div>
											</div>
											<div class="col-sm-3 col-md-2">
												<div class="form-group">
													<p><input type="text" name="last_name[]" id="last_name" class="form-control" placeholder="Enter Last Name" value=""/></p>
												</div>
											</div>
											<div class="col-sm-3 col-md-2">
												<div class="form-group">
													<p><input class="form-control" id="birthdate" name="date_of_birth[]" placeholder="Select birth date" onfocus="(this.type = 'date')"  type="text"></p>
												</div>
											</div>
											<div class="col-sm-3 col-md-2">
												<div class="form-group">
													<p><input type="text" name="address[]" id="pincode" class="form-control" placeholder="Enter address" value=""/></p>
												</div>
											</div>
											<div class="col-sm-3 col-md-2">
												<div class="form-group">
													<p><input type="text" name="pincode[]" id="pincode" class="form-control" placeholder="Enter pincode" value=""/></p>
												</div>
											</div>
										</div>   
										<?php if($flighttype == "International"){ ?>
											<div class="row">
												<div class="col-sm-3 col-md-2">&nbsp;</div>
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<p ><input type="text" name="passport_no[]" id="passport_no<?=$i?>" class="form-control passport_no" placeholder="Passport Number" value=""/>
														</p>
													</div>
												</div>
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<p>
															<select class="form-control" name="passenger_passport_issuing_country[]" id="passenger_passport_issuing_country<?=$i?>">
																<option value="">Please Select Country</option>
																<?php foreach($country as $value){ ?>
																	<option value="<?=$value->name?>"><?=$value->name?></option>
																<?php } ?>	
															</select>	
														</p>
													</div>
												</div>
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<p><input class="form-control passenger_passport_expiry_day" id="passenger_passport_expiry_day" name="passenger_passport_expiry_day[]" placeholder="Date of Expire" type="text" onfocus="(this.type = 'date')"></p>
													</div>
												</div>
											</div>	
										<?php }   ?>
										<input class="form-control" id="type" name="type[]" value="INF" type="hidden">  
									<?php } } ?>

									<h2>CONTACT DETAILS</h2>
									<div class="row">
										<div class="col-sm-3">
											<input type="text" class="form-control numberonly" name="contactnumber" placeholder="Enter Phone Number" />
										</div> 
										<div class="col-sm-3">
											<input type="email" class="form-control" name="contactemail" placeholder="Enter Email" />
										</div> 
									</div>	

									<div class="row">
										<div class="col-sm-6 col-md-4">
											<button type="button" class="btn btn-primary mt-4 mb-0" id="submit_btn">
												Book Now
											</button>
											
											<center><div class="loader" style="display: none"></div></center>
										</div>
									</div>
								</div>
							</form>
						<?php }else{ ?>
							<h2>
								<!-- <?=$message;?> -->
								<?php 
								$url = base_url()."franchise/bookflight"; 
								redirect($url); 
								?>
							</h2>
						<?php } ?>	
					</div>
				</div>

			</div>
		</div>


	</script>
	<script src="<?= base_url() ?>/assets/plugins/sweet-alert/sweetalert.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/sweet-alert.js"></script>

	<script type="text/javascript">

		function goBack() {
			var continue_to = base_url + 'supplier';
			window.location = continue_to;
		}

		$(document).ready(function() {

			 $('.numberonly').keypress(function (e) {    
    
                var charCode = (e.which) ? e.which : event.keyCode    
    
                if (String.fromCharCode(charCode).match(/[^0-9]/g))    
    
                    return false;                        
    
            });  
			
// $(function(){
			var dtToday = new Date();

			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate();
			var year = dtToday.getFullYear();
			if(month < 10)
				month = '0' + month.toString();
			if(day < 10)
				day = '0' + day.toString();

			var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);


			$('.passenger_passport_expiry_day').attr('min', maxDate);
// });

			$('.birthdate').datepicker();

			$.validator.addMethod("first_name", function (value, element) {
				var flag = true;
				$("[name^=first_name]").each(function (i, j) {
					$(this).parent('p').find('label.error').remove();
					$(this).parent('p').find('label.error').remove();                        
					if ($.trim($(this).val()) == '') {
						flag = false;
						$(this).parent('p').append('<label  id="" class="error">Please Enter First Name</label>');
					}
				});
				return flag;
			}, "");
			$.validator.addMethod("last_name", function (value, element) {
				var flag = true;
				$("[name^=last_name]").each(function (i, j) {
					$(this).parent('p').find('label.error').remove();
					$(this).parent('p').find('label.error').remove();                        
					if ($.trim($(this).val()) == '') {
						flag = false;
						$(this).parent('p').append('<label  id="" class="error">Please Enter Last Name</label>');
					}
				});
				return flag;
			}, "");
			$.validator.addMethod("pincode", function (value, element) {
				var flag = true;
				$("[name^=pincode]").each(function (i, j) {
					$(this).parent('p').find('label.error').remove();
					$(this).parent('p').find('label.error').remove();                        
					if ($.trim($(this).val()) == '') {
						flag = false;
						$(this).parent('p').append('<label  id="" class="error">Please Enter pincode</label>');
					}
				});
				return flag;
			}, "");

			<?php if($flighttype == "International"){ ?>
				$.validator.addMethod("passport_no", function (value, element) {
					var flag = true;
					$("[name^=passport_no]").each(function (i, j) {
						$(this).parent('p').find('label.error').remove();
						$(this).parent('p').find('label.error').remove();                        
						if ($.trim($(this).val()) == '') {
							flag = false;
							$(this).parent('p').append('<label  id="" class="error">Please Enter Passport No</label>');
						}
					});
					return flag;
				}, "");
				$.validator.addMethod("passenger_passport_issuing_country", function (value, element) {
					var flag = true;
					$("[name^=passenger_passport_issuing_country]").each(function (i, j) {
						$(this).parent('p').find('label.error').remove();
						$(this).parent('p').find('label.error').remove();                        
						if ($.trim($(this).val()) == '') {
							flag = false;
							$(this).parent('p').append('<label  id="" class="error">Please Select</label>');
						}
					});
					return flag;
				}, "");
				$.validator.addMethod("passenger_passport_expiry_day", function (value, element) {
					var flag = true;
					$("[name^=passenger_passport_expiry_day]").each(function (i, j) {
						$(this).parent('p').find('label.error').remove();
						$(this).parent('p').find('label.error').remove();                        
						if ($.trim($(this).val()) == '') {
							flag = false;
							$(this).parent('p').append('<label  id="" class="error">Please select Date of Expire</label>');
						}
					});
					return flag;
				}, "");

			<?php } ?>


			$.validator.addMethod("date_of_birth", function (value, element) {
				var flag = true;
				$("[name^=date_of_birth]").each(function (i, j) {
					$(this).parent('p').find('label.error').remove();
					$(this).parent('p').find('label.error').remove();                        
					if ($.trim($(this).val()) == '') {
						flag = false;
						$(this).parent('p').append('<label  id="" class="error">Please select date of birth</label>');
					}
				});
				return flag;
			}, "");
			$(document).on('click','#submit_btn',function(e){

				var ticketprice = $("#ticketprice").val();
				var userwallet = $("#userwallet").val();
				console.log(ticketprice);
				console.log(userwallet);
				if(parseInt(userwallet) > parseInt(ticketprice)){ 
					$('#booking_form').submit();
				}else{ 
					Swal.fire('error!', "Please Check Your Balance", 'error')	
				}
			});

			$("#booking_form").validate({
				ignore: '',
				rules: {

					"first_name[]": {
						first_name:true
					},
					"last_name[]": {
						last_name:true
					},
					"pincode[]": {
						pincode:true
					},			
					"date_of_birth[]": {
						date_of_birth:true
					},
					"contactnumber": {
						required:true,
						number: true
					},
					"contactemail": {
						required:true,
						email: true,
					},
					<?php if($flighttype == "International"){ ?>			
						"passport_no[]": {
							passport_no:true
						},
						"passenger_passport_issuing_country[]": {
							passenger_passport_issuing_country:true
						},	
						"passenger_passport_expiry_day[]": {
							passenger_passport_expiry_day:true
						},		
					<?php } ?>
				},
				messages : {
					"contactnumber": {
						required:"Please Enter Number"
					},
					"contactemail": {
						required:"Please Enter Email"
					},
				},
			});
			var continue_to = base_url + 'franchise/flightreport/viewticket/';
			$(document).on('submit','.booking_form',function(e){
				e.preventDefault();
				if($(this).valid()){
					$.ajax({
						type: 'POST',
						url: base_url + 'franchise/bookflight/submitflight',
						data: $('#booking_form').serializeArray(),
						dataType: 'json',
						beforeSend: function(){
							$(".loader").show();
						},
						success: function(data) {
							$(".loader").hide();
							if(data == ""){
								Swal.fire("error!", "Error ", "warning").then(function(){
									location.reload();
								});
							}
							if(data.status == "error"){

								Swal.fire("error!", data.message, "warning").then(function(){
					                   location.reload();
								});
							}else{

								Swal.fire("success !", data.message, "success").then(function(){
									window.location = continue_to+data.dataid;
								});
							}

						}
					});

				}

			});
		});
	</script>