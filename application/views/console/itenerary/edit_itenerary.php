<style type="text/css">
	.error{
		color: #e23e3d;
	}
</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div>
			<div class="card-body">
				<form class="form-horizontal add_update_itenerary" id="add_update_itenerary" method="post">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="form-group">
								<label class="form-label"> Itenerary Name <span class="text-red">*</span></label>
								<input type="text" name="i_name" class="form-control i_name" placeholder="Enter Itenerary Name" value="<?php echo  isset($_view) && $_view->i_name ? $_view->i_name : ''; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label"> Destination <span class="text-red">*</span></label>
								<select class="form-control select2-show-search destination" name="destination" id="destination" data-placeholder="Select Destination">
									<option value=""></option>
									<?php foreach ($get_all_country as $key => $value) { ?>
										<option value="<?= $value->id ?>" <?= isset($_view) && $value->id == $_view->destination ? "selected" : "" ?>><?= $value->name ?></option>
									<?php 	} ?>
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label class="form-label"> City </label>
								<select class="form-control select2-show-search city" name="city" id="city" data-placeholder="Select Destination" value="<?= $_view->city ?>">
									<option value=""></option>
									<?php foreach ($get_all_cities as $key => $value) { ?>
										<option value="<?= $value->id ?>" <?= isset($_view) && $value->id == $_view->city ? "selected" : "" ?>><?= $value->name ?></option>
									<?php 	} ?>

								</select>
							</div>
						</div>
						<label class="form-label"> Itinerary detail <span class="text-red">*</span></label>
						<?php if(!empty($all_sub_entry)){ 
							$i = 1;
							foreach ($all_sub_entry as $key => $val) { ?>
								<div class="col-sm-12 col-md-12">
									<div class="row question_div" style="margin-top: 10px !important;">

										<input type="hidden" class="form-control" name="p_id[]" id="p_id"  value="<?= $val->id; ?>">

										<div class="col-sm-1 col-md-1">
											<p>
												<input type="text" class="form-control day" name="day[]" placeholder="Day" value="<?= $val->day; ?>">
											</p>
										</div>
										<div class="col-sm-2 col-md-2">
											<p>
												<input type="time" class="form-control time" name="time[]" placeholder="Day" value="<?= $val->time ?>">
											</p>
										</div>
										<div class="col-sm-4 col-md-4" data-placeholder="Select Title">
											<p>
												<select class="form-control select2-show-search title" id="title_<?= $i; ?>" name="title[]" class="title" data-placeholder="Select Title">
													<option value=""></option>
													<?php 
													if(isset($view) && !empty($view)){
														foreach ($view as $key => $value) { ?>
															<option value="<?= $value->meta_id ?>" asdf="<?php echo $value->description ?>" <?= isset($value) && $val->title == $value->meta_id ? "selected" : "" ?>><?= $value->name ?></option>
														<?php  }	} ?>
													</select>
												</p>
											</div>
											<div class="col-sm-4 col-md-4">

												<input type="text" class="form-control detail"  name="detail[]" id="detail_<?= $i; ?>" readonly value="<?= $val->d_description ?>">

											</div>
											<div class="col-sm-1 col-md-1">
												<button type="button" class="btn btn-danger remove_row" value="<?= $val->id; ?>"><i class="fa fa-minus"></i></button>
											</div>
										</div>
									</div>
									<?php $i++; } } else { ?>
										<div class="col-sm-12 col-md-12">
											<div class="row question_div" style="margin-top: 10px !important;">

												<input type="hidden" class="form-control" name="p_id[]" id="p_id"  value="0">
												<div class="col-sm-1 col-md-1">
													<p>
														<input type="text" class="form-control day" name="day[]" placeholder="Day">
													</p>
												</div>
												<div class="col-sm-2 col-md-2">
													<p>
														<input type="time" class="form-control time" name="time[]" placeholder="Day">
													</p>
												</div>
												<div class="col-sm-4 col-md-4" data-placeholder="Select Title">
													<p>
														<select class="form-control select2-show-search title" id="title_1" name="title[]"  data-placeholder="Select Title">
															<option value=""></option>

															<?php 
															if(isset($view) && !empty($view)){
																foreach ($view as $key => $value) { ?>
																	<option value="<?= $value->meta_id ?>" asdf="<?php echo $value->description ?>"><?= $value->name ?></option>
																<?php }	} ?>
															</select>
														</p>
													</div>
													<div class="col-sm-4 col-md-4">
														<input type="text" class="form-control detail"  name="detail[]" id="detail_1" readonly>
													</div>
													<div class="col-sm-1 col-md-1">
														<button type="button" class="btn btn-danger remove_row" value="0"><i class="fa fa-minus"></i></button>
													</div>
												</div>
											</div>
										<?php } ?>
										<div class="row">
											<div class="col-sm-4 col-md-4">
												<button type="button" class="btn btn-success add_more_row" id="add_more_row">Add More</button>
											</div>
										</div>
										<div class="row">
										<label class="form-label"> Inclusions and exclusions</label>
											<div id="summernote" class="note-codable">
												<?= isset($_view) && !empty($_view) ? $_view->description : ""; ?> 
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6 col-md-4">
												<button type="submit" class="btn btn-primary mt-4 mb-0 enquiry_btn submit_btn" id="submit_btn">Submit</button>
												<button class="btn btn-primary e_loader mt-4 mb-0" style="display:none" type="button" disabled>
													<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
													Loading...
												</button>
												<a href="<?= base_url('franchise/itenerary'); ?>" class="btn btn-danger mt-4 mb-0">Cancel</a>
												<input type="hidden" name="query_id" value="<?= isset($_view) && !empty($_view->id) ? $_view->id :''; ?>">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						function get_titles_by_cc() {
							var destination = $('#destination').val();
							var city = $('#city').val();
							if(destination > 0 || city > 0){
								$.ajax({
									type:"POST",
									url: base_url + "franchise/itenerary/get_titles_by_cc",
									data : {destination,city},
									dataType:"json",
									success:function(data){
										if(data){
											$(".title").empty();
											$(".detail").val("");
											$(".title").append('<option value="">Select Title</option>');
											$.each(data,function(key,value){
												$(".title").append('<option value="'+value.meta_id+'" asdf="'+value.description+'">'+value.name+'</option>');
											});
										}else{
											$(".title").empty();
										}
									}
								});
							}
						}

						$(document).ready(function(){

							$(document).on('change','#destination,#city',function(){
								get_titles_by_cc();
							});

							jQuery(document).on('click', '.remove_row', function () {
								var obj = $(this);
								var total_tr = $('.question_div').length;
								var r_id = $(this).val();

								if (total_tr >= 1 && r_id == 0) {
									jQuery(this).closest('.question_div').remove();
								}else if(r_id != 0){
									swal({
										title: "Are you sure?",
										text: "You will not be able recover this record",
										type: "warning",
										showCancelButton: true,
										confirmButtonColor: "#DD6B55",
										confirmButtonText: "Yes delete it!",
										closeOnConfirm: false
									},
									function () {
										$.ajax({
											url: base_url + "franchise/itenerary/remove_itenerary",
											type : "POST",
											data : {
												"r_id": r_id,
											},
											dataType: 'json',
											success : function(data){
												if(data.status == "success")
												{
													window.location.href = base_url + 'franchise/itenerary';
												}else {
													swal({
														title: "error",
														text: "something went wrong",
														type: "error"
													});

												}

											}
										});
									}); 

								}
							});

							$.validator.addMethod("day", function (value, element) {
								var flag = true;
								$("[name^=day]").each(function (i, j) {
									$(this).parent('p').find('label.error').remove();
									$(this).parent('p').find('label.error').remove();                        
									if ($.trim($(this).val()) == '') {
										flag = false;
										$(this).parent('p').append('<label  id="day'+i+'-error" class="error">Day field is required.</label>');
									}
								});
								return flag;
							}, "");
							$.validator.addMethod("time", function (value, element) {
								var flag = true;
								$("[name^=time]").each(function (i, j) {
									$(this).parent('p').find('label.error').remove();
									$(this).parent('p').find('label.error').remove();                        
									if ($.trim($(this).val()) == '') {
										flag = false;
										$(this).parent('p').append('<label  id="time'+i+'-error" class="error">Time field is required.</label>');
									}
								});
								return flag;
							}, "");
							$.validator.addMethod("title", function (value, element) {
								var flag = true;
								$("[name^=title]").each(function (i, j) {
									$(this).parent('p').find('label.error').remove();
									$(this).parent('p').find('label.error').remove();                        
									if ($.trim($(this).val()) == "") {
										flag = false;
										$(this).parent('p').append('<label id="title'+i+'-error" class="error">Title field is required.</label>');
									}
								});
								return flag;
							}, "");
					// $.validator.addMethod("detail", function (value, element) {
					// 	var flag = true;
					// 	$("[name^=detail]").each(function (i, j) {
					// 		$(this).parent('p').find('label.error').remove();
					// 		$(this).parent('p').find('label.error').remove();                        
					// 		if ($.trim($(this).val()) == "") {
					// 			flag = false;
					// 			$(this).parent('p').append('<label id="detail'+i+'-error" class="error">Detail field is required.</label>');
					// 		}
					// 	});
					// 	return flag;
					// }, "");


					$("form").validate({
						ignore: '',
						rules: {
							"day[]": {
								day:true
							},
							"time[]": {
								time:true
							},
							"title[]": {
								title:true
							},
							"i_name": {
								required:true
							},
							"destination": {
								required:true
							},
							// "city": {
							// 	required:true
							// }, 
						},

						messages : {
							"destination": {
								required:"Select Destination"
							},
							// "city": {
							// 	required:"Select City"
							// },
							"i_name": {
								required:"please enter itenerary name"
							},
						},
					});

					/*$(document).on('submit','.add_update_itenerary',function(e){
						e.preventDefault();
						if($(this).valid()){

							$('.submit_btn').attr('disabled','disabled');
							$('.e_loader').removeAttr('style','display:none');
							$('.submit_btn').attr('style','display:none');
							var form_data = []; 
							var description = $('.note-codable').summernote('code');
							var form_data = $(this).serialize();
							form_data.push(form_data);
							//var formData = new FormData(form_data[0]);
							form_data.push({name:'description',value:description});
							$.ajax({
								type:"POST",
								url: base_url + "franchise/itenerary/update_tenerary_data",
								data: form_data,
								contentType: false, 
								processData: false, 
				                dataType: 'json',
								success:function(res){
									$('.submit_btn').removeAttr('disabled','disabled');
									if(res.status == "success"){
										$('.e_loader').attr('style','display:none');
										$('.submit_btn').removeAttr('style','display:none');
											//window.location.href = base_url + 'franchise/itenerary';
										// Swal.fire("Success!", res.msg, "success").then(function(){
										// });
									}else{
										Swal.fire("Warning!", res.msg, "error");

									}
								}
							});
						}

					});*/

					$(document).on('submit','.add_update_itenerary',function(e){
			e.preventDefault();
			var description = $('.note-codable').summernote('code');
			//var form_data = $('#add_update_itenerary');

				//var formData = $(this).serialize();
				var formData = new FormData($('#add_update_itenerary')[0]);
				formData.append('description',description);
				//formData.push({name:'description',value:description});
			if($(this).valid()){
				
				$('#submit_btn').attr('disabled', 'disabled');
				$('.sub_btn').attr('style', 'display: none');
				$('.loader_btn').removeAttr('style', 'display: none');
				$.ajax({
					type: 'POST',
					url: base_url + 'franchise/itenerary/update_tenerary_data',
					data: formData,
					contentType: false, 
					processData: false, 
					dataType: 'json',
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

					$('#destination').on('change',function(){
						var destination = $(this).val();  

						if(destination){
							$.ajax({
								type:"POST",
								url: base_url + "franchise/itenerary/get_all_cities_by_country_id",
								data : {destination : destination},
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
							$("#state").empty();
							$("#city").empty();
						}
					});

					// $(document).on('click','#add_more_row',function(){
					// 	var numberIncr = 0;

					// 	var total_tr = $('.question_div').length;
					// 	var $tr=$(".question_div").last();

					// 	if ($('.select2-show-search').hasClass("select2-hidden-accessible")) {
					// 		$('.select2-show-search').select2('destroy');
					// 	}
					// 	var $clone=$tr.clone();
					// 	$clone.find('.day').val('');
					// 	$clone.find('.time').val('');
					// 	$clone.find('#title').val('');
					// 	$clone.find('#p_id').val("0");
					// 	$clone.find('.remove_row').val("0");
					// 	$clone.find('#detail').val('');

					// 	$tr.after($clone);
					// 	$(".select2-show-search").select2();
					// }); 

					$(document).on('click','#add_more_row',function(){
						var numberIncr = 0;

						var total_tr = $('.question_div').length + 1;
						var $tr=$(".question_div").last();

						if ($('.select2-show-search').hasClass("select2-hidden-accessible")) {
							$('.select2-show-search').select2('destroy');
						}
						var $clone=$tr.clone();
						$clone.find('.day').val('');
						$clone.find('.time').val('');
						$clone.find('#title').val('');
						$clone.find('.detail').val('');
						$clone.find('#p_id').val("0");	
						$clone.find('.remove_row').val("0");	
						$clone.find('.detail').attr('id','detail_'+total_tr);
						$clone.find('.title').attr('id','title_'+total_tr);
						$tr.after($clone);
						$(".select2-show-search").select2();
					});
					$(document).on('change','.title',function(){
						console.log('111');
						var asd = $(this).children("option:selected").attr('asdf');
						var myString = $(this).attr('id').split("_").pop();
						$('#detail_'+myString).val(asd);

					});
				});

			</script>



