<div class="row">
    <div class="col-md-12 col-xl-12">
    
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>

            <div class="card-body">

                <form class="form-horizontal" id="save-template" class="login100-form">
                    <div class="row">
                        <input type="hidden" name="template_id" value="<?= isset($edit) && isset($edit->id) ? $edit->id : ""; ?>">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control template_name" name="template_name" placeholder="Enter Template name" value="<?= isset($edit) && isset($edit->name) ? $edit->name : set_value('template_name'); ?>" >
                                <span class="error-text error_template_name"></span>
                            </div>
                        </div>
                       </div> 
                       <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control description" placeholder="Description" rows="5"><?= isset($edit) && isset($edit->description) ? $edit->description : set_value('description'); ?></textarea>
                                <span class="error-text error_template_desc"></span>
                            </div>
                        </div>
                        
                    </div>
                     <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Image</label>
                            <input id="image" type="file" name="images" accept="image/x-png, image/jpeg" multiple><br>
                            <span id="error_star" class="small text-danger"></span><br>
                            <small id="error_type">Only these formats are allowed : jpeg, jpg, png</small><br>
                            <small id="error_size">Upload file size up to 2 MB</small><br>
                            <span id="error_file" class="small text-danger"></span>
                            <?php if($edit->image != ""){ ?>
                                <img src="<?php echo base_url().$edit->image; ?>" width="100"/>
                            <?php } ?>    
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" class="btn btn-primary mt-4 mb-0 submit_btn">
                                Submit
                            </button>
                            <input type="hidden" name="user_id" value="<?= isset($edit) && isset($edit->user_id) ? $edit->user_id : set_value('user_id'); ?>" />
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
$('.back_btn').click(function() {
    window.location.href = base_url + 'template';
});

$(document).ready(function() {
    var continue_to = base_url + 'template';
    
    $('body').on('change blur', 'input, select, textarea', function() {
        $(this).closest('.form-control').removeClass('is-invalid');
    });

    
   

    $('body').on('change blur', '.template_name', function() {
        $('.error_template_name').html('').hide();
        $('.template_name').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.template_name').addClass('is-invalid');
            $('.error_template_name').html('Enter Template name').show();
        }
    });
    $('body').on('change blur', '.description', function() {
        $('.error_template_desc').html('').hide();
        $('.template_desc').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.template_desc').addClass('is-invalid');
            $('.error_template_desc').html('Enter Description').show();
        }
    });

   $('#image').change(function() {  
            $('#error_file').html('').hide();
            $('#error_size').css("color", "black");
            $('#error_type').css("color", "black");
            var fp = $("#image");
            var lg = fp[0].files.length;
            var items = fp[0].files;
            var fileSize = 0;
            var fileExtension = ['jpeg', 'jpg', 'png'];
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 2097152) {
                    /* var msg = 'Upload file size up to 50 MB';
                    $('#error_file').html(msg).show(); */
                    $('#error_size').css("color", "red");
                }
            }
            
            if($(this).val() == '') {
                $('#error_file').html('Choose file').show();
            } else if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $('#error_type').css("color", "red");
            }
        });
   
    $('#save-template').submit(function(e) {
        e.preventDefault();
        var isValid = 1;

        if($('.template_name').val().trim() == '') {
            isValid = 0;
            $('.template_name').addClass('is-invalid');
            $('.error_template_name').html('Enter Template name').show();
        }

        if($('.description').val().trim() == '') {
            isValid = 0;
            $('.description').addClass('is-invalid');
            $('.error_template_desc').html('Enter Description').show();
        }

        
       

         if (isValid) {
                submit_form();
            }
    });

    function submit_form() {
            $(this).attr('disabled','disabled').html('<i class="fa fa-spinner fa-spin"></i> Processing....');
            $.ajax({
                type: 'POST',
                url: base_url + 'template/savetemplate',
                data: new FormData($("#save-template")[0]),
                processData: false, 
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                   /* setTimeout(function() {
                        if(data.status == 'success') {
                            quick_swal("success", "Template Uploaded Successfully...");
                        } else {
                            quick_swal("warning", "Oops!!! Something went wrong. Please try again.");
                        }
                    }, 500);
                    setTimeout(function() {
                        window.location = continue_to;
                    }, 1500);*/
                 window.location = continue_to;
                },
                error: function(data)
                {
                    quick_swal("warning", "Error! Unable to complete process.");
                    setTimeout(function() {
                        window.location = continue_to;
                    }, 3000);
                }
            });
        }
});
</script>