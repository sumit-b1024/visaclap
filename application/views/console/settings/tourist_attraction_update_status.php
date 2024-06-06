<div class="row">
    <div class="col-md-12 col-xl-12">
    
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>

            <div class="card-body">

                <form id="hotel_form" class="form-horizontal well" method="POST">
                    <div class="row">
                        <div class="col-md-9">
                            <label class="form-label">Status <span class="text-red">*</span></label>
                            <select class="form-control select2" name="tourist_attraction_status" id="tourist_attraction_status">
                                <option value="">Select Status</option> 
                            <?php
                            foreach ($tourist_attraction_status as $key => $value) { ?>
                                <option><?=  $value;?></option>
                          <?php  } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" id="submit_btn" class="btn btn-primary mt-4 mb-0">
                                Submit
                            </button>
                            <input type="hidden" name="is_meta" value="<?= isset($view) ? $view->is_meta : $is_meta; ?>">
                            <input type="hidden" name="meta_id" value="<?= isset($view) ? $view->meta_id : ''; ?>">
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
var meta = '<?= $meta ?>';
$('.goBack').click(function() {
    window.location.href = base_url + 'settings/meta/' + meta;
});

$(document).ready(function() {
    var continue_to = base_url + 'settings/meta/' + meta;

    $('input').change(function() {
        $(this).closest('.form-group').removeClass('has-error');
    });

    $('body').on('blur change', '#name', function() {
        $('#error_name').html('').hide();
        if($(this).val().trim() == '') {
            $('#error_name').html('Please enter name').show();
            $('#name').focus();
        }
    });
    
    $('body').on('blur change', '#star', function() {
        $('#error_star').html('').hide();
        if($(this).val().trim() == '') {
            $('#error_star').html('Please enter star').show();
            $('#star').focus();
        }
    });

    $('#submit_btn').click(function(e) {
        e.preventDefault();
        var isValid = 1;
 
        if($('#name').val().trim() == '') {
            isValid = 0;
            $('#name').parents('.form-group').addClass('has-error');
            $('#error_name').html('Please enter name').show();
        }

        if(isValid) {
            submit_form();
        }
    });

    function submit_form() {
        $('#submit_btn').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: base_url + 'settings/ajax-add-hotel',
            data: $('#hotel_form').serialize(),
            dataType: 'json',
            success: function(data) {
                $('#submit_btn').removeAttr('disabled');
                setTimeout(function() {
                    if(data.status == 'success') {
                        quick_swal("success", data.message);
                    } else if(data.status == 'exits') {
                        quick_swal("info", data.message);
                    } else {
                        quick_swal("warning", "Error! Unable to complete process.");
                    }
                }, 500);
            
                setTimeout(function() {
                    window.location = continue_to;
                }, 2500);
            }, error: function(data) {
                $('#submit_btn').removeAttr('disabled');
                quick_swal("warning","Error! Unable to complete process.");
            }
        });
    }

});
</script>