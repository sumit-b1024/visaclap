<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-header">
                <div class="row">
                    <!-- <div class="col-10">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div>
 -->
                    <div class="col-12">
                        <a href="<?= CL_SETTINGS . '/add-category'; ?>" class="box-btn fill_primary pull-right">
                            <i class="fa fa-plus"></i> Add Category
                        </a>
                    </div>                    
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ( $_list as $list )
                            {
                                ?>
                                <tr id="r-<?= $list->id; ?>">
                                    <td><?= toPropercase($list->name); ?></td>
                                    <td><?php if($list->country_image) { ?><image src="<?php echo base_url().$list->country_image ?>" width="60"/><?php }?></td>
                                    <td>
                                       
                                        <a href="javascript:;" data-id="<?= $list->id; ?>" data-table="<?= TBL_CATEGORY; ?>"  class="btn btn-success btn-sm open_country_image_model" title="Image">
                                            <i class="fa fa-image"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>

        </div>
    </div>
</div>
 <div class="modal fade bd-example-modal-lg" data-toggle="modal" id="country_image_model" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content modal-content-demo">
            <form class="country_image" id="country_image" enctype="multipart/form-data">
               <div class="modal-header">
                  <h6 class="modal-title"><b>View Itinerary Images
</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>

               <div class="modal-body ">
                  <div class="col-md-12">
                      <label class="form-label">Country Image</label>
                      <input type="file" name="country_image" id="country_image" class="form-control" accept="image/*" />
                      <span id="img_error" class="small text-danger"></span>
                    </div>
                  <div class="alert alert-danger failed_warn_wap_alert" role="alert" style="display:none">
                  </div>
                  <input type="hidden" class="countryid" name="countryid" value="">
                  <br/>
                  <div class="view_enc_img">
                  </div>
                        
               </div>
               <br>
               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary image_send_btn">Submit</button>
                  <button class="btn btn-primary wap_spinner" type="button" disabled style="display:none;">
                   <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                   Please Wait...
                </button>
             </div>
          </form>
       </div>
    </div>
 </div>
<script>
    $(document).ready(function() {
        
        $('#responsive-datatable').on('click', '.delete_btn', function () {
            var table   =     $(this).data('table');
            var row     =     $(this).data('row');
            var id      =     $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                
                if (result.value)
                {
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'common/delete/',
                        data:{'table' : table, 'row' : row, 'id' : id},
                        success: function(result) {
                            if(result == 'success')
                            Swal.fire('Deleted!', 'Your '+ table +' has been deleted.', 'success')

                            $('#r-'+id).addClass('d-none');
                        }
                    });
                }

            });

        });

        $(document).on('click','.open_country_image_model',function(){
          var record_id = $(this).data('id');
        $('.countryid').val($(this).data('id'));
        $.ajax({
            type: 'POST',
            url: base_url + 'settings/get_country_images/',
            data:{record_id},
            success: function(result) {

                $('.view_enc_img').html("");
                $('.view_enc_img').html(result);
                $('#country_image_model').modal('toggle');
                $('#country_image_model').modal('show');

            }
        });
         
      });


          $(document).on('submit','.country_image',function(e){
        e.preventDefault();

      
      var formdata = new FormData($('#country_image').get(0));
      //form.push({ name: "sub_array", value: sub_array });

      $.ajax({
        url : base_url + 'settings/send_country_image',
        type : "POST",
        data : formdata,
        cache:false,
         contentType: false,
         processData: false,
        dataType: 'json',
        beforeSend: function( jqXHR ) {
         $('.country_send_btn').attr('disabled','disabled');
         $('.wap_spinner').removeAttr('style');
         $('.country_send_btn').attr('style','display:none');
      },
      success : function(data){

        $('.country_send_btn').removeAttr('disabled','disabled');
        $('.country_send_btn').removeAttr('style','display:none');
        $('.wap_spinner').attr('style','display:none');
        if(data.status == "success"){
         $('#country_image_model').modal('toggle');
         
         
         Swal.fire("Success!", data.message, "success").then(function(){
          location.reload();
       });
      }else{
       Swal.fire("Success!", data.message, "success").then(function(){
       });

    }

 }
});
   });

    });
</script>