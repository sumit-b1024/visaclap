          <style>
            .fillupimage{width: 100%;
    max-height:60px;
    min-height: 60px;
    object-fit: contain;}
    .clickupload, .fileupload{cursor: pointer;}
    .border-purple {
    border: 2px solid #8e70d4;
}
.color-purple {
    color: #8e70d4;
}
          </style>
            <form class="userprofile" id="userprofile">
                <div class="message"></div>
                <div>
              <div class="col-md-9 col-12 offset-1 p-2 ">
                <div class="row ">
                  <div class="col-md-4 col-10 mt-2 d-flex align-items-center text-middle">
                    <span class="size-1">Firm Name</span>
                  </div>
                  <div class="col-md-8 col-10 mt-2">
                    <input type="text" class="form-control" name="firm_name" value="<?=$userdetail->firm_name ?>"  placeholder="Firm Name">
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <div>
              <div class="col-md-9 col-12 offset-1 p-2 ">
                <div class="row ">
                  <div class="col-md-4 col-10 mt-2 d-flex align-items-center text-middle">
                    <span class="size-1">Name</span>
                  </div>
                  <div class="col-md-4 col-10 mt-2">
                    <input type="text" class="form-control" name="first_name" value="<?=$userdetail->first_name ?>"  placeholder="First Name">
                  </div>
                  <div class="col-md-4 col-10 mt-2">
                    <input type="text" class="form-control" name="last_name" value="<?=$userdetail->last_name ?>" placeholder="Last Name">
                  </div>
                </div>
              </div>
              <hr>
            </div>

            <div>
              <div class="col-12 col-md-9 offset-1 p-2 ">
                <div class="row ">
                  <div class="col-md-4 col-12 d-flex align-items-center text-middle">
                    <p class="size-1">Email Address</p>
                  </div>
                  <div class="col-md-8 col-10">
                    <input type="email" class="form-control" name="email" value="<?=$userdetail->email ?>" readonly placeholder="Email Address@gmail.com" disabled>
                  </div>
                </div>
              </div>
              <hr>
            </div>

            <div>
              <div class="col-12 col-md-10 offset-1 p-2 ">
                <div class="row">
                  <div class="col-md-4 col-8">
                    Your photo
                    <p style="font-size: 13px;">This Will be displayed on your profile</p>
                  </div>
                  <?php if($userdetail->profile_photo != ""){ ?>
                  <div class="col-2 col-md-1 ">
                    <img src="<?php echo base_url().$userdetail->profile_photo ?>" class="userprofile" style="width:100%">
                  </div>
                <?php } ?>
                  <div class="col-md-6 col-12">
                    <div class="row">
                      
                      <div class="col-10 col-md-10 border p-4 d-block rounded clickupload">
                          <div class="bg-gray p-2 clip-path-circle d-flex justify-content-center align-items-center">
                            <?php if($userdetail->profile_photo != ""){ ?>
                                  <img class="fillupimage" src="<?php echo base_url().$userdetail->profile_photo ?>">
                            <?php }else{ ?>
                                    <img class="fillupimage" src="">
                            <?php } ?>
                        </div>
                        <p class="pl-3 text-center"><label class="color-purple"><b>Click to upload</b></label><br>
                          <span>SVG,PNG,JPG or GIF(max.54x54px)</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <input type="file" id="fileInput" name="profilephoto" accept="image/*" style="display: none;">
                </div>
              </div>
              <hr>
            </div>

            <div>
              <div class="col-12 col-md-9 offset-1 p-2 ">
                <div class="row ">
                  <div class="col-10 col-md-4 d-flex align-items-center text-middle">
                    <p class="size-1"> Address</p>
                  </div>
                  <div class="col-10 col-md-8">
                    <textarea type="email" class="form-control" name="address" placeholder="address"><?=$userdetail->address ?></textarea>
                  </div>
                </div>
              </div>
              <hr>
            </div>

            <div>
              <div class="col-12 col-md-9 offset-1 p-2 ">
                <div class="row ">
                  <div class="col-12 col-md-4 d-flex align-items-center text-middle">
                    <p class="size-1">Mobile Number</p>
                  </div>
                  <div class="col-10 col-md-8">
                    <input type="text" maxlength="10" class="form-control" value="<?=$userdetail->mobile ?>" name="mobile" placeholder="Mobile Number" disabled>
                  </div>
                </div>
              </div>
              <hr>
            </div>

            <div>
              <div class="col-12 col-md-9 offset-1 p-2 ">
                <div class="row">
                  <div class="col-12 col-md-4 d-flex align-items-center text-middle size-1">
                    Country
                  </div>
                  <div class="col-10 col-md-8">
                    <select class="form-control form-select selectcountry mb-1" name="country" disabled>
                    </select>
                    <p  style="font-size: 13px;margin-bottom: 0;">You can't change your country</p>
                  </div>
                </div>
              </div>
              <hr>
            </div>

            <div>
              <div class="col-12 col-md-9 offset-1 p-2 ">
                <div class="row ">
                  <div class="col-12 col-md-4 ">
                    <b>Bio of your company</b>
                    <p style="font-size: 13px;">Write a Short Intoduction</p>
                  </div>
                  <div class="col-10 col-md-8">
                    <textarea class="form-control " id="bio" name="bio"
                      placeholder=""><?=$userdetail->bio ?></textarea>
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <div class="col-12 col-md-9 offset-1 p-2 ">
                <div class="row">
                  <div class="col-12 col-md-4 ">
                    <b>Upload your Documents</b>
                    <p style="font-size: 13px;">pancard, AdharCard, company Regestration document</p>
                  </div>
                  <div class="col-10 col-md-8 fileclick">
                    <div class="row ">
                      <div class="col-12 border p-2 d-block rounded fileupload">
                        <p class="pl-4 text-center"><label class="color-purple"><b>Click to upload</b></label><br>
                          <span>SVG,PNG,JPG or GIF(max.800x400px)</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                   <input type="file" id="documentinput" name="profiledocument[]" multiple accept="image/*, application/pdf, .doc, .docx" style="visibility: hidden;">
          <?php 
              if(!empty($userdocument)) {
                foreach($userdocument as $k=>$v){ 
                  $fileName = basename($v->document_file);
           ?>
                <div class="row mt-3 ">
                  <div class="col-4">
                  </div>
                  <div class="col-10 col-md-8">
                    <div class="row">
                      <div class="col-12 col-md-12  border-purple p-2 d-block rounded ">
                        <div class="row">
                          
                          <div class="col-10">
                          
                              <a href="<?php echo base_url().$v->document_file; ?>" target="_blank" class="openlink"><?=$fileName?></a>
                            
                          </div>
                          <div class="col-1 pl-0">
                            <a href="javascript:void(0)" data-id="<?=$v->id?>" data-table="<?=TBL_USER_DOCUMENT?>" data-row="id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                            <i class="fa fa-trash"></i>
                         </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } }  ?>
              </div>
                  <div class="apply-btns d-block d-md-flex justify-content-md-end">
              <!-- <button class="box-btn" type="reset" data-bs-toggle="modal1" data-bs-target="#step2">Cancel</button> -->
              <button type="submit" id="submit_btn" class="box-btn fill_primary">Submit</button>
            </div>
            <br>
            </div>
          </form>
<script>
    var country = '<?=$userdetail->country ?>';
var continue_to = base_url + 'franchise/globel_setting/viewprofile';
     function get_all_country(){
    $.ajax({
       //url : api_url+"api/visacountry",
       url: base_url + 'franchise/request/getvisacountry',
       type:"GET",
       dataType:"json",
        mode: 'cors',
       success:function(data){
        
        if(data.code != 500){
          $.each(data.message, function (key, val) {
            let selected="";
                if(val.id == country){
                    selected = 'selected';
                }
             $(".selectcountry").append('<option value="'+val.id+'" '+selected+'>'+val.name+'</option>');
             
         });
        }else{
         alert("Please Enter Domain key");
      }
        }
  });
}
  $('.delete_btn').on('click', function() {
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
                  url: base_url + 'franchise/globel_setting/delete_document_data',
                  data:{'table' : table, 'row' : row, 'id' : id},
                  dataType : 'json',
                  success: function(result) {
                     if(result.status == 'success'){
                        Swal.fire("Deleted!", result.message, "success").then(function(){
                           location.reload();
                        });
                     }else{
                        Swal.fire('Warning!', result.message, 'warning')

                     }
                  }
               });
            }

         });

      });
$(document).ready(function(){

    $('.clickupload').on('click', function() {
      $('#fileInput').trigger('click');
    });
    $('.fileclick').on('click', function() {
      $('#documentinput').trigger('click');
    });

   /* $('#fileInput').on('change', function(event) {
      var selectedFile = event.target.files[0];
      console.log('Selected File:', selectedFile.name);
    });
*/
     // Handle file selection
    $('#fileInput').on('change', function(event) {
      var selectedFile = event.target.files[0];
      if (selectedFile) {
        var reader = new FileReader();
        reader.readAsDataURL(selectedFile);
        reader.onloadend = function() {
          $('.fillupimage').attr('src', reader.result);
        };
      }
    });

     $(".alert").delay(4000).slideUp(200, function() {
        $(this).alert('close');
    }); 
    get_all_country();

    $('#submit_btn').click(function(e) {
     e.preventDefault();
     var isValid = 1;

    

 /* var file_nm = $("#turist_att_image").get(0);
  if( typeof file_nm != 'undefined' || file_nm != null ){
     for (var i = 0; i < $("#turist_att_image").get(0).files.length; ++i) {
        var file1=$("#turist_att_image").get(0).files[i].name;
        if(file1){                        
           var file_size=$("#turist_att_image").get(0).files[i].size;
           if(file_size < 20971520){
              var ext = file1.split('.').pop().toLowerCase();                            
              if($.inArray(ext,['jpg','jpeg','gif','png','webp','svg'])===-1){
                 $('#img_error').text("Invalid file extension.please select only 'jpg, jpeg', gif, png, webp, svg' this type of file.");
                 return false;
              }
           }else{
             $('#img_error').text("Image size is too large.upload less than 20 mb.");
             return false;
          }                        
       }
    }
 }*/

 if(isValid) {
   submit_form();
}
});

    function submit_form() {

     var file = $("#fileInput")[0].files[0];
      if (file) {
     var readerl = new FileReader();
     readerl.readAsDataURL(file);
     var imageDataURL = '';
      readerl.onloadend = function() {
       imageDataURL = readerl.result; // Get the data URL of the image
    };
  }
    
     $('#submit_btn').attr('disabled', 'disabled');
     var formdata = new FormData($('#userprofile').get(0));
     $.ajax({
        type: 'POST',
        url: base_url + 'franchise/globel_setting/update_profile',
        data: formdata,
        cache:false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(data) {
           $('#submit_btn').removeAttr('disabled');
           //$('.userprofile').attr('src', imageDataURL);
           //$('.message').html('<div class="alert alert-success in alert-dismissible"><strong> Success! </strong>'+data.message+'</div>');
           Swal.fire("Success!", data.message, "success").then(function(){
               location.reload();
            });
           
        }, error: function(data) {
           $('#submit_btn').removeAttr('disabled');
           $('.message').html('<div class="alert alert-danger in alert-dismissible"><strong> Danger! </strong>'+data.message+'</div>');
        }
        
     });
     /*$('html, body').animate({
                'scrollTop' : $(".message").position().top-50
            }, 1000);*/
           

  }
   });  
</script>
