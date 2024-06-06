<?php // xdebug($supplier); ?>
<style type="text/css">
	.help-block{
		color: #e23e3d;
	}
</style>
<div class="row">
    <div class="col-md-12 col-xl-12">
    
        <div class="card">
           <!--  <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div> -->

            <div class="card-body">

                <form class="form-horizontal notification_form" id="add-form" class="login100-form validate-form" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Notification</label>
								<input name="curname" id="curname" class="form-control" placeholder="Curname" value="<?= isset($cur) && !empty($cur->curname) ? $cur->curname : set_value('curname'); ?>" />
                            </div>
                        </div> 
                        
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" class="box-btn fill_primary mt-2 mb-0" id="submit_btn">Submit</button>
                            <input type="hidden" name="id" value="<?= isset($cur) && !empty($cur->id) ? $cur->id :''; ?>">
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
	var continue_to = base_url + 'currency';
	window.location = continue_to;
}

$(document).ready(function() {
	var continue_to = base_url + 'currency';

	$('input').change(function() {
		$(this).closest('.form-group').removeClass('has-error');
	});

	$('#add-form').validate({
		rules :{
			"curname":{
				required : true
			}
		},
		messages :{
			"curname":{
				required : "Enter Curname"
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
			url: base_url + 'currency/ajax_add_currency',
			data: $('.notification_form').serializeArray(),
			dataType: 'json',
			success: function(data) {
				$('#submit_btn').removeAttr('disabled');
				/*setTimeout(function() {
					if(data.status == 'success') {
						Swal.fire("Success!", data.message,"success");
					} else {
						Swal.fire("Warning!", "Error! Unable to complete process.","warning");
					}
				}, 500);*/
            
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