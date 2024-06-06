<div class="portlet light bordered custom-formv">
    <div class="portlet-title">
        <div class="caption">
            <button class="btn btn-outline yellow-gold tooltips goBack" data-container="body" data-placement="bottom" data-original-title="Back"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></button>
            <span class="caption-subject font-blue-hoki bold uppercase"><?= $title; ?></span>
        </div>
        <div class="close-formv">
            <a href="javascript:;" class="goBack">
				<img src="<?= asset_url(); ?>layouts/img/close-form.png">
			</a>
        </div>
    </div>

    <div class="portlet-body form">
        <form id="media_form" class="form-horizontal well" method="post" enctype="multipart/form-data">
            <div class="form-body">

                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label">Media For</label>
                        <div class="icheck-inline">
                            <label>
                                <input type="radio" name="type" value="<?= Media_type::HOTEL; ?>" class="icheck" data-radio="iradio_square-orange"> Hotel
                            </label>
                        </div>
                        <span id="error_resolution_method_id" class="small text-danger"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 hotel-div">
                        <label class="control-label">Hotel*</label>
                        <select name="hotel" id="hotel" class="form-control select2-allow-clear" data-placeholder="Choose hotel">
                            <option></option>
                            <?php foreach($_hotel as $hotel) :
                            $selected = ((!empty($hotel->meta_id) && $hotel->meta_id == $edit->meta_id) ? 'selected' : '');  ?>
                                <option value="<?= $hotel->meta_id; ?>" <?= $selected; ?>>
                                    <?= ucfirst($hotel->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <span id="error_hotel" class="small text-danger"></span>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-md-4">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn green btn-file">
                                <span class="fileinput-new"> 
                                    <i class="fa fa-file-image-o"></i> Select images
                                </span>
                                <span class="fileinput-exists"> Change </span>
                                <input id="image" type="file" name="images[]" accept="image/x-png, image/jpeg" multiple> </span>
                            <span class="fileinput-filename"> </span> &nbsp;
                            <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> <br>
                            <small id="error_type">Only these formats are allowed : jpeg, jpg, png</small><br>
                            <small id="error_size">Upload file size up to 2 MB</small><br>
                            <span id="error_file" class="small text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-2 col-md-9">
                        <span class="text-success" id="success_msg"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <button type="button" id="submit_btn" class="btn yellow-gold"><i class="fa fa-check"></i> Save </button>
                        <button type="button" class="btn default goBack">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('.goBack').click(function() {
        window.location.href = base_url + 'console/settings';
    });

    $(document).ready(function() {
        var continue_to = base_url + 'console/settings';

        $('input').on('ifChecked', function(event){
            var type = $('input[name=type]:checked').val();
            if(type == 1) {
                $('.hotel-div').addClass('hide');
                $('.destination-div').removeClass('hide');
            } else {
                $('.destination-div').addClass('hide');
                $('.hotel-div').removeClass('hide');
            }
        });

        $('body').on('click', '.remove-row', function() {
            var button_id = $(this).parents('.parent').attr("id");
            $('#' + button_id).remove();
        });

        $('body').on('blur change', '#destination', function() {
            $('#error_destination').html('').hide();
            if($(this).val().trim() == '') {
                $('#error_destination').html('Please choose destination').show();
            }
        });

        $('body').on('blur change', '#hotel', function() {
            $('#error_hotel').html('').hide();
            if($(this).val().trim() == '') {
                $('#error_hotel').html('Please choose hotel').show();
            }
        });

        /* file upload */
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

        $('#submit_btn').click(function(event) {
            event.preventDefault();
            var isValid = 1;

            var type = $('input[name=type]:checked').val();
            if(type == 1) {
                if ($('#destination').val().trim() == '') {
                    isValid = 0;
                    $('#error_destination').html('Please choose destination').show();
                }
            } else {
                if ($('#hotel').val().trim() == '') {
                    isValid = 0;
                    $('#error_hotel').html('Please choose hotel').show();
                }
            }
            
            if($('#image').val() == '') {
                isValid = 0;
                $('#error_file').html('Choose file').show();
            } else if($('#image').val() != '') { 
                var fileExtension = ['jpeg', 'jpg', 'png'];
                var fileSize = 0;
                fileSize = $("#image")[0].files[0].size;

                if(fileSize > 2097152) 
                {
                    isValid = 0;
                    $('#error_size').css("color", "red");
                } 
                else if ($.inArray($('#image').val().split('.').pop().toLowerCase(), fileExtension) == -1) 
                {
                    isValid = 0;
                    $('#error_type').css("color", "red");
                }
            }

            if (isValid) {
                submit_form();
            }
        });

        function submit_form() {
            //$('#submit_btn').html('<span class="fa fa-check"></span> Saving...').attr("disabled", "disabled");
            $(this).attr('disabled','disabled').html('<i class="fa fa-spinner fa-spin"></i> Processing....');
            $.ajax({
                type: 'POST',
                url: base_url + 'console/settings/ajaxAddMedia',
                data: new FormData($("#media_form")[0]),
                processData: false, 
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    setTimeout(function() {
                        if(data.status == 'success') {
                            quick_swal("success", "File Uploaded Successfully...");
                        } else {
                            quick_swal("warning", "Oops!!! Something went wrong. Please try again.");
                        }
                    }, 500);
                    setTimeout(function() {
                        window.location = continue_to;
                    }, 1500);
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

        $('body').on('click', '.delete', function() {
            var id = $(this).data('id');
            var this_ = $(this);
            var curval = $('#deleted_id').val();
            swal({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: 'yellow-gold',
                cancelButtonColor: '#e35b5a',
                confirmButtonText: 'Yes, delete it!',
                confirmButtonClass: 'btn yellow-gold btn-outline',
                cancelButtonClass: 'btn btn-outline'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'console/settings/delete_itinerary',
                        data: {
                            'id': id
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.status == 'success') {
                                swal('Deleted!', 'It has been deleted successfully.', 'success');
                                var tags = this_.map(function() {
                                    return result.deleted_id || undefined
                                }).get();
                                tags.push(curval)

                                $('#deleted_id').val(tags);

                                this_.parents('.parent').addClass('hide');
                            } else {
                                quick_swal("warning", "Error! Unable to complete process.");
                            }
                        },
                        error: function(result) {
                            quick_swal("warning", "Error! Unable to complete process.");
                        }
                    })
                }
            });
        });
    });
</script>