<div class="row">
    <div class="col-md-12 col-xl-12">
    
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>

            <div class="card-body">

                <form class="form-horizontal" id="save-offer" class="login100-form">
                    <div class="row">
                        <input type="hidden" name="offer_id" value="<?= isset($edit) && isset($edit->id) ? $edit->id : ""; ?>">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Ad Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control offer_name" name="offer_name" placeholder="Enter Offer name" value="<?= isset($edit) && isset($edit->name) ? $edit->name : set_value('offer_name'); ?>" >
                                <span class="error-text error_offer_name"></span>
                            </div>
                        </div>
                       </div> 


                       <div class="row">
                       <div class="col-md-12">
                        <label class="form-label">Ads Image</label>
                        <?php if(!empty($all_sub_offer)){ 
                          $i = 1;
                          foreach ($all_sub_offer as $key => $val) { ?>

                            <div class="row question_div" style="margin-top: 10px !important;">

                              <input type="hidden" class="form-control sub_offer_id" name="sub_offer_id[]" id="sub_offer_id"  value="<?= $val->id; ?>">


                              <div class="col-md-2">
                                    <input id="image" class="images" type="file" name="images[]" accept="image/x-png, image/jpeg" multiple><br>
                                </div>
                                <div class="col-md-2 editimag">
                                    <image src="<?php echo base_url().$val->image ?>" width="80"/>
                                </div>        
                                <div class="col-sm-6 col-md-5">
                                <div class="form-group">
                                    <input type="text" class="form-control offer_link" name="offer_link[]" placeholder="Enter Link" value="<?= isset($edit) && isset($edit->link) ? $edit->link : set_value('link'); ?>" >
                                    <span class="error-text error_offer_link"></span>
                                </div>
                                </div>
                                <div class="col-sm-1 col-md-1">
                                <button type="button" class="btn btn-danger remove_row" data-master="<?= $edit->id; ?>" value="<?= $val->id; ?>"><i class="fa fa-minus"></i></button>
                              </div>
                            </div>
                            

                            <?php $i++; } } else { ?>
                              <div class="row question_div" style="margin-top: 10px !important;">
                                <input type="hidden" class="form-control" name="sub_offer_id[]" id="sub_offer_id"  value="0">
                                <div class="col-md-5">
                                    <input id="image" class="images" type="file" name="images[]" accept="image/x-png, image/jpeg" multiple><br>
                                    <span id="error_star" class="small text-danger"></span><br>
                                    <span id="error_file" class="small text-danger"></span>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                <div class="form-group">
                                    <input type="text" class="form-control offer_link" name="offer_link[]" placeholder="Enter Link" value="<?= isset($edit) && isset($edit->link) ? $edit->link : set_value('offer_link'); ?>" >
                                    <span class="error-text error_offer_link"></span>
                                </div>
                            </div>
                                <div class="col-sm-1 col-md-1">
                                  <button type="button" class="btn btn-danger remove_row" value="0"><i class="fa fa-minus"></i></button>
                                </div>

                              </div>
                            <?php } ?>
                            <div class="row">
                              <div class="col-sm-4 col-md-4">
                                <button type="button" class="btn btn-success add_more_row" id="add_more_row">Add More</button>
                              </div>
                            </div>
                          </div>
                        </div>

                     
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Offer Date</label>
                            <div class="wd-200 mg-b-30">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                    </div><input class="form-control offer_date" id="offer_date" name="offer_date" placeholder="MM/DD/YYYY" readonly type="text" value="<?= isset($edit) && isset($edit->offer_date) ? $edit->offer_date : set_value('offer_date'); ?>">
                                </div>
                            </div>
                        </div> 
                         </div> 
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" class="box-btn fill_primary mt-4 mb-0 submit_btn">
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
    window.location.href = base_url + 'offer';
});

$(document).ready(function() {

     $(document).on('click','#add_more_row',function(){
    var numberIncr = 0;

    var total_tr = $('.question_div').length + 1;
    var $tr=$(".question_div").last();

    var $clone=$tr.clone();
    $clone.find('.remove_row').val("0");
    $clone.find('.offer_link').val('');
    $clone.find('.editimag').find('img').remove();
     $clone.find('.images').val('');
    $clone.find('.sub_offer_id').val("0");  
    //$clone.find('.things').attr('id','things_'+total_tr);

    $tr.after($clone);

  });



  jQuery(document).on('click', '.remove_row', function() {


                var obj = $(this);
                var total_tr = $('.question_div').length;
                var r_id = $(this).val();
               var masterid =  $(this).attr('data-master');

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
                      url: base_url + "offer/remove_offer_banner",
                      type : "POST",
                      data : {
                        "r_id": r_id,
                      },
                      dataType: 'json',
                      success : function(data){
                        if(data.status == "success")
                        {
                          window.location.href = base_url + 'offer/edit-offer/'+masterid;
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


     $('.offer_date').datepicker({
            dateFormat: 'yy-mm-d',
            
        });

    var continue_to = base_url + 'offer';
    
    $('body').on('change blur', 'input, select, textarea', function() {
        $(this).closest('.form-control').removeClass('is-invalid');
    });


    $('body').on('change blur', '.offer_name', function() {
        $('.error_offer_name').html('').hide();
        $('.offer_name').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.offer_name').addClass('is-invalid');
            $('.error_offer_name').html('Enter Template name').show();
        }
    });
    $('body').on('change blur', '.offer_link', function() {
        $('.error_offer_link').html('').hide();
        $('.offer_link').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.offer_link').addClass('is-invalid');
            $('.error_offer_link').html('Enter Offer Link').show();
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
   
    $('#save-offer').submit(function(e) {
        e.preventDefault();
        var isValid = 1;

        if($('.offer_name').val().trim() == '') {
            isValid = 0;
            $('.offer_name').addClass('is-invalid');
            $('.error_offer_name').html('Enter Offer name').show();
        }

         if($('.offer_link').val().trim() == '') {
            isValid = 0;
            $('.offer_link').addClass('is-invalid');
            $('.error_offer_link').html('Enter Offer Link').show();
        }

        
       

         if (isValid) {
                submit_form();
            }
    });

    function submit_form() {
            $(this).attr('disabled','disabled').html('<i class="fa fa-spinner fa-spin"></i> Processing....');
            $.ajax({
                type: 'POST',
                url: base_url + 'offer/saveoffer',
                data: new FormData($("#save-offer")[0]),
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