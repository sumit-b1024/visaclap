<div class="portlet light bordered custom-formv">
    <div class="portlet-title">
        <div class="caption">
            <button class="btn btn-outline yellow-gold tooltips" data-container="body" data-placement="bottom" data-original-title="Back" onclick="goBack()"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></button>
            <span class="caption-subject font-blue-hoki bold uppercase"><?= $title; ?></span>
        </div>
		
		<div class="close-formv">
            <a href="javascript:;" onclick="goBack()"><img src="<?= asset_url(); ?>layouts/img/close-form.png" alt=""></a>
        </div>
    </div>
    <div class="portlet-body form">
        <form id="flight_form" method="post" enctype="multipart/form-data" class="form-bordered form-label-stripped">
			
			<div class="row">
				<div class="form-group">
					<label class="control-label col-md-2"></label>
					<div class="col-md-4">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="input-group input-large">
								<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
									<i class="fa fa-file fileinput-exists"></i>&nbsp;
									<span class="fileinput-filename"> </span>
								</div>
								<span class="input-group-addon btn default btn-file">
									<span class="fileinput-new"> Select file </span>
									<span class="fileinput-exists"> Change </span>
									<input id="flight_file" type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> </span>
								<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
							</div>
							<span id="error_flight_file" class="small text-danger"></span>
							<div class="clearfix margin-top-10">
                                <small id="msg_flight_file">Only these formats are allowed : xlsx, xls</small> <br/>
								<a href="<?= asset_url().'sample_flight.xlsx'; ?>" class="bold font-yellow-gold" download> <small>Sample file download</small> </a>
							</div>
						</div>
					</div>
				</div>
            </div>
			
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-2 col-md-9">
						<button type="button" class="btn default" onclick="goBack()">Cancel</button>
                        <button type="submit" class="btn yellow-gold">
                            <i class="fa fa-check"></i> Save
						</button>
                    </div>
                </div>
            </div>
        </form>
		<!-- END FORM-->
    </div>
</div>
<script type="text/javascript">
function goBack() {
	var continue_to = base_url + 'console/supplier';
	window.location = continue_to;
}

$(document).ready(function() {
	var continue_to = base_url + 'console/supplier';
	
	$('input').on('ifChecked', function(event){
		var trip = $('input[name=trip]:checked').val();	
		if(trip == 1) {
			$('#round').addClass('hide');
			$('#sector_rt ,#depart_rt, #pnr_rt, #depart_time_rt, #rt_airline_id, #purchase_rate_rt, #sales_rate_rt').closest('.form-group').removeClass('has-error');
			$('#error_sector_rt ,#error_depart_rt, #error_pnr_rt, #error_depart_time_rt, #error_rt_airline_id, #error_purchase_rate_rt, #error_sales_rate_rt').html('').hide();
		} else {
			$('#round').removeClass('hide');
		}
	});
		
	$('body').on('change click','#airline_id', function() {
		if($(this).val() == 'new') {
			$("#add_airline").removeClass('hide');
		} else {
			$("#add_airline").addClass('hide');
		}
	});
	
	$('body').on('change click','#rt_airline_id', function() {
		if($(this).val() == 'new') {
			$("#add_rt_airline").removeClass('hide');
		} else {
			$("#add_rt_airline").addClass('hide');
		}
	});

	$('input, select').change(function() {
		$(this).closest('.form-group').removeClass('has-error');
	});

	$('#sector').change(function() {
		$('#error_sector').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_sector').html('Please choose sector').show();
			$('#sector').focus();
		}
	});
	
	$('#airline_id').change(function() {
		$('#error_airline_id').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_airline_id').html('Please choose airline').show();
			$('#airline_id').focus();
		} else {
			var airline = $(this).val();
			// $('#loader_airline').show();
			$.ajax({
				type: 'POST',
				url:  base_url + 'console/flight/get_airbus_by_airline',
				data: {'airline':airline},
				dataType: 'json',
				success: function(data)
				{
					// $('#loader_airline').hide();
					$('#airbus_id').html('<option></option>');
					if(data.status == 'success')
					{
						$.each(data.airbus, function(key, val) {
							var airbus_id = val.airbus_id;
							var airbus_no = val.airbus_no;
					   
							$('#airbus_id').append('<option value="'+airbus_id+'">'+airbus_no+'</option>');
						});
						
						setTimeout(function(){
							$('#airbus_id').trigger('change');
						}, 500);
					}
				},
				error: function(data)
				{
					ajax_error_swal(data.status);
				}
			});
		}
	});
	
	$('#supplier_id').change(function() {
		$('#error_supplier_id').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_supplier_id').html('Please choose supplier').show();
			$('#supplier_id').focus();
		}
	});
	
	$('#depart_time_hrs').change(function() {
		if($(this).val() < 0) {
			$(this).val('');
			$(this).focus();
		} if($(this).val() > 23) {
			$(this).val('');
			$(this).focus();
		} if($(this).val()=='') {
			$('#depart_time_min').val('');
			$(this).focus();
		}
	});

	$('#depart_time_min').change(function() {
		if($(this).val() < 0) {
			$(this).val('');
			$(this).focus();
		} if($(this).val() > 59) {
			$(this).val('00');
			$(this).focus();
		}
	});
	
	$('#arrival_time_hrs').change(function() {
		if($(this).val() < 0) {
			$(this).val('');
			$(this).focus();
		} if($(this).val() > 23) {
			$(this).val('');
			$(this).focus();
		} if($(this).val()=='') {
			$('#arrival_time_min').val('');
			$(this).focus();
		}
	});

	$('#arrival_time_min').change(function() {
		if($(this).val() < 0) {
			$(this).val('');
			$(this).focus();
		} if($(this).val() > 59) {
			$(this).val('00');
			$(this).focus();
		}
	});
	
	$('#flight_file').change(function() {
		$('#error_flight_file, #msg_flight_file').html('').hide();
		var fileExtension = ['xlsx', 'xls'];
		if($(this).val() == '') {
			$('#error_flight_file').html('Select file').show();
		} else if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
			var msg = "Only these formats are allowed : "+fileExtension.join(', ');
			$('#msg_flight_file').css("color", "red");
        }
	});
	
	/*** round trip ***/
	$('#rt_airline_id').change(function() {
		$('#error_rt_airline_id').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_rt_airline_id').html('Please choose airline').show();
			$('#rt_airline_id').focus();
		} else {
			var airline = $(this).val();
			// $('#loader_airline_rt').show();
			$.ajax({
				type: 'POST',
				url:  base_url + 'console/flight/get_airbus_by_airline',
				data: {'airline':airline},
				dataType: 'json',
				success: function(data)
				{
					// $('#loader_airline_rt').hide();
					$('#rt_airbus_id').html('<option></option>');
					if(data.status == 'success')
					{
						$.each(data.airbus, function(key, val) {
							var airbus_id = val.airbus_id;
							var airbus_no = val.airbus_no;
					   
							$('#rt_airbus_id').append('<option value="'+airbus_id+'">'+airbus_no+'</option>');
						});
						
						setTimeout(function(){
							$('#rt_airbus_id').trigger('change');
						}, 500);
					}
				},
				error: function(data)
				{
					ajax_error_swal(data.status);
				}
			});
		}
	});
	
	$('#rt_depart_time_hrs').change(function() {
		if($(this).val() < 0) {
			$(this).val('');
			$(this).focus();
		} if($(this).val() > 23) {
			$(this).val('');
			$(this).focus();
		} if($(this).val()=='') {
			$('#rt_depart_time_min').val('');
			$(this).focus();
		}
	});

	$('#rt_depart_time_min').change(function() {
		if($(this).val() < 0) {
			$(this).val('');
			$(this).focus();
		} if($(this).val() > 59) {
			$(this).val('00');
			$(this).focus();
		}
	});
	
	$('#rt_arrival_time_hrs').change(function() {
		if($(this).val() < 0) {
			$(this).val('');
			$(this).focus();
		} if($(this).val() > 23) {
			$(this).val('');
			$(this).focus();
		} if($(this).val()=='') {
			$('#rt_arrival_time_min').val('');
			$(this).focus();
		}
	});

	$('#rt_arrival_time_min').change(function() {
		if($(this).val() < 0) {
			$(this).val('');
			$(this).focus();
		} if($(this).val() > 59) {
			$(this).val('00');
			$(this).focus();
		}
	});
	
	/**** add airlines ****/
	$('#name').change(function() {
		$('#error_name').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_name').html('Please enter airline\'s name').show();
			$('#name').focus();
		}
	});
		
	$('#code').change(function() {
		$('#error_code').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_code').html('Please enter airline\'s code').show();
			$('#code').focus();
		}
	});
	
	$('#airbus_no').change(function() {
		$('#error_airbus_no').html('').hide();
		if($(this).val().trim() == '') {
			$('#error_airbus_no').html('Please enter airbus no').show();
			$('#airbus_no').focus();
		}
	});
	
	$('#flight_form').submit(function(e) {
		var isValid = 1;
		
		/* if($('#sector').val().trim() == '') {
			isValid = 0;
			$('#sector').parents('.form-group').addClass('has-error');
			$('#error_sector').html('Please choose sector').show();
			$('#sector').focus();
		}
		
		if($('#supplier_id').val().trim() == '') {
			isValid = 0;
			$('#supplier_id').parents('.form-group').addClass('has-error');
			$('#error_supplier_id').html('Please choose supplier').show();
			$('#supplier_id').focus();
		} 
		
		if($('#depart_time_hrs').val().trim() == '' || $('#arrival_time_hrs').val().trim() == '') {
			isValid = 0;
			$('#depart_time_hrs').parents('.form-group').addClass('has-error');
			$('#error_time').html('Please enter depart time').show();
		}
		else if(!validateNumber($('#depart_time_hrs').val().trim()) || !validateNumber($('#arrival_time_hrs').val().trim())) 
		{
			isValid = 0;
			$('#depart_time_hrs').parents('.form-group').addClass('has-error');
			$('#error_time').html('Only digit are allowed').show();
		} */
		
		var fileExtension = ['xlsx', 'xlsm', 'xls', 'xltx', 'xltm'];
        if ($.inArray($('#flight_file').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            isValid = 0;
			var msg = "Only these formats are allowed : "+fileExtension.join(', ');
			$('#msg_flight_file').css("color", "red");
        }

		if($('#flight_file').val().trim() == '') {
			isValid = 0;
			$('#flight_file').parents('.form-group').addClass('has-error');
			$('#error_flight_file').html('Select file').show();
		}
		
		/*** round trip ***/
		var trip = $('input[name=trip]:checked').val();
		if(trip	== 2) {
			if($('#rt_depart_time_hrs').val().trim() == '' || $('#rt_arrival_time_hrs').val().trim() == '') {
				isValid = 0;
				$('#rt_depart_time_hrs').parents('.form-group').addClass('has-error');
				$('#error_time').html('Please enter return time').show();
			} else if(!validateNumber($('#rt_depart_time_hrs').val().trim()) || !validateNumber($('#rt_arrival_time_hrs').val().trim())) {
				isValid = 0;
				$('#rt_depart_time_hrs').parents('.form-group').addClass('has-error');
				$('#error_time').html('Only digit are allowed').show();
			}
		}
		
		/**** add airlines ****/
		var airline = $('#airline_id').val();
		if(airline == 'new') {
			if($('#name').val().trim() == '') {
				isValid = 0;
				$('#name').parents('.form-group').addClass('has-error');
				$('#error_name').html('Please enter airline\'s name').show();
				$('#status_name').focus();
			}
			
			if($('#code').val().trim() == '') {
				isValid = 0;
				$('#code').parents('.form-group').addClass('has-error');
				$('#error_code').html('Please enter airline\'s code').show();
				$('#status_code').focus();
			}
			
			if($('#airbus_no').val().trim() == '') {
				isValid = 0;
				$('#airbus_no').parents('.form-group').addClass('has-error');
				$('#error_airbus_no').html('Please enter airbus no').show();
				$('#airbus_no').focus();
			}
		}
		
		if(!isValid) {
			e.preventDefault();
		}
	});

	$(window).bind("pageshow", function() {
		var form = $('form'); 
		form[0].reset();
	});

});
</script>