<style type="text/css">
	.error{
		color: #e23e3d;
	}
</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card">
			<!-- <div class="card-header">
				<h3 class="card-title"><?= $title; ?></h3>
			</div> -->
			<div class="card-body">
				<form class="form-horizontal add_update_itenerary" id="add_update_itenerary" method="post">
					<div class="row">
						<div class="col-sm-12 col-md-12 input-inside mb-1">
							<div class="form-group">
								<label class="form-label"> Itenerary Name <span class="text-red">*</span></label>
								<input type="text" name="i_name" class="form-control i_name" placeholder="Enter Itenerary Name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6  mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> Destination <span class="text-red">*</span></label>
								<select class="form-select select2-show-search destination" name="destination" id="destination" data-placeholder="Select Destination">
									<option value=""></option>
									<?php foreach ($get_all_country as $key => $value) { ?>
										<option value="<?= $value->id ?>"><?= $value->name ?></option>
									<?php 	} ?>
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 mb-1">
							<div class="form-group input-inside">
								<label class="form-label"> City </label>
								<select class="form-select city" name="city" id="city" data-placeholder="Select City">
									<option value=""></option>
								</select>
							</div>
						</div>

						<div class="col-sm-12 col-md-12 input-inside mb-1">
							<label class="form-label"> Itenerary detail <span class="text-red">*</span></label>

							<div class="row question_div" style="margin-top: 5px !important;">
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
										</select>
									</p>
								</div>
								<div class="col-sm-4 col-md-4">
									
									<input type="text" class="form-control detail"  name="detail[]" id="detail_1" readonly >
								</div>

								<div class="col-sm-1 col-md-1">
									<button type="button" class="btn btn-danger remove_row"><i class="fa fa-minus"></i></button>
								</div>

							</div><br>
							<div class="row">
								<div class="col-sm-4 col-md-4">
									<button type="button" class="btn btn-success add_more_row" id="add_more_row">Add More</button>
								</div>
							</div>
							<hr>
						</div>
						<div class="col-md-12 input-inside ">
					<label class="form-label"> Inclusions and exclusions</label>
						<div id="summernote" class="note-codable"></div>
					</div>
						<div class="row">
							<div class="col-sm-6 col-md-4">
								<button type="submit" class="box-btn fill_primary mt-4 mb-0 enquiry_btn submit_btn" id="submit_btn">Submit</button>
								<button class="btn btn-primary e_loader mt-4 mb-0" style="display:none" type="button" disabled>
									<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
									Loading...
								</button>
								<a href="<?= base_url('franchise/itenerary'); ?>" class="box-btn fil_grey mt-4 mb-0">Cancel</a>

								<input type="hidden" name="query_id" value="<?= isset($enquiry) && !empty($enquiry->id) ? $enquiry->id :''; ?>">
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

		function get_country_change(){
			var destination = $('#destination').val();  
				// console.log(destination);
				if(destination){
					$.ajax({
						type:"POST",
						url: base_url + "franchise/itenerary/get_all_cities_by_country_ids",
						data : {destination : destination},
						success:function(res){
							data = $.parseJSON(res);      
							if(data){
								$("#city").empty();
								$("#city").append('<option value="">Select City</option>');
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
			}

			$(document).ready(function(){

				$(document).on('change','#destination',function(){
					get_titles_by_cc();
					get_country_change();
				});

				$(document).on('change','#city',function(){
					get_titles_by_cc();
				// get_country_change();
			});


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
					$clone.find('.detail').attr('id','detail_'+total_tr);
					$clone.find('.title').attr('id','title_'+total_tr);
					$tr.after($clone);
					$(".select2-show-search").select2();
				});
				$(document).on('change','.title',function(){
					var asd = $(this).children("option:selected").attr('asdf');
					var myString = $(this).attr('id').split("_").pop();
					$('#detail_'+myString).val(asd);

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
					},

					messages : {
						"destination": {
							required:"Select Destination"
						},
						"i_name": {
							required:"Please enter itenerary name"
						},
					},
				});

				$(document).on('submit','.add_update_itenerary',function(e){
					e.preventDefault();
						var description = $('.note-codable').summernote('code');
			//var form_data = $('#add_update_itenerary');

				var formData = new FormData($('#add_update_itenerary')[0]);
				formData.append('description',description);

					if($(this).valid()){
						$('.submit_btn').attr('disabled','disabled');
						$('.e_loader').removeAttr('style','display:none');
						$('.submit_btn').attr('style','display:none');

						$.ajax({
							type:"POST",
							url: base_url + "franchise/itenerary/store_tenerary_data",
							data: formData,
							contentType: false, 
							processData: false, 
							dataType: 'json',
							success:function(res){
								$('.submit_btn').removeAttr('disabled','disabled');
								if(res.status == "success"){
									$('.e_loader').attr('style','display:none');
									$('.submit_btn').removeAttr('style','display:none');
									window.location.href = base_url + 'franchise/itenerary';
								// Swal.fire("Success!", res.msg, "success").then(function(){
								// });
							}else{
								Swal.fire("Warning!", res.msg, "error");
							}
						}
					});
					}

				});

			// $('#destination').on('change',function(){
			// 	$(document).on('change','#destination',function(e){

			// });
			jQuery(document).on('click', '.remove_row', function() {
				var total_tr = $('.question_div').length;
				if(total_tr > 1) 
				{
					jQuery(this).closest('.question_div').remove();
					return false;
				}

			});
		});

	</script>



