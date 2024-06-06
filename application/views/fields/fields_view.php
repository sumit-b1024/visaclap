<style>
   
.post-outer {
        /*background: #f5f5f5;*/
        padding: 5px 10px;
        border-bottom: solid 1px #CFCFCF;
        margin-top: 5px;
    }
    .post-title {
       /* background: #a7d4d2;*/
        padding: 5px;
        color: #304d49;
        margin: 0px;
        cursor: move;
    }
    
    .post-desc {
        line-height: 15px !important;
        font-size: 12px;
        padding: 10px;
        margin: 0px;
    }
    .panel-default {
        margin-bottom: 100px;
    }
    .post-data-list {
        max-height: 374px;
        overflow-y: auto;
    }
    .radio-inline {
        font-size: 20px;
        color: #c36928;
    }
    .progress, .progress-bar{ height: 40px; line-height: 40px; display: none; }

    #post_list li
   {
    box-shadow: 0 0 10px rgb(0 0 0 / 30%);
    background: #fff;
    margin-top: 9px;
    border-radius: 4px;
   }
   #post_list li.ui-state-highlight {
    padding: 20px;
    background-color: #eaecec;
    border: 1px dotted #ccc;
    cursor: move;
    margin-top: 12px;
    }

    .btn_move{
        display: inline-block;
        cursor: move;
        background: #ededed;
        border-radius: 2px;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
    }
</style>
<div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
      <i class="fa fa-fw fa-check-circle"></i>
      <strong> Success ! </strong> <span class="success-message"> Fields Order has been updated successfully </span>
   </div>
   <div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
      <i class="fa fa-fw fa-times-circle"></i>
      <strong> Note !</strong> <span class="warning-message"> Empty list can't be Process </span>
   </div>
<div class="row row-sm">
 <div class="col-lg-12">
  <div class="card">  
   <div class="card-header">
    <div class="row">
     <div class="col-9">
      <h3 class="card-title">All FIelds</h3>
     </div>
     <div class="col-3">
     </div>                    
    </div>
   </div>
   <div class="card-body">
      <ul class="list-unstyled" id="post_list">
         <?php 
         $mainlabel = array();
         foreach ($allfields as $key => $value) {
          if(!in_array($value->form_group,$mainlabel)){
            $mainlabel[] = $value->form_group;
            echo '<h1>'.$value->form_group.'</h1>';
          }  
          ?>
            <li data-post-id="<?php echo $value->id; ?>">
               <div class="post-outer">
                     <div class="row">
                        <div class="col-md-6">
                           <h5 class="post-title"><?=$value->label_name?></h5>
                        </div>
                     </div>
                  </div>   
               </li>
         <?php } ?> 
      </ul>     
    </div>
   </div>
  </div>
 </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
 <script>
   $(document).ready(function(){
      $(".alert-danger").hide();
                  $(".alert-success").hide();
      var  formid = '<?=$this->uri->segment(3) ?>';
      $("#post_list" ).sortable({
         placeholder : "ui-state-highlight",
         update  : function(event, ui)
         {
            var post_order_ids = new Array();
            $('#post_list li').each(function(){
               post_order_ids.push($(this).data("post-id"));
            });
            $.ajax({
               url: base_url + 'fieldarrange/order_update',
               method:"POST",
               data:{post_order_ids:post_order_ids,formid:formid},
               success:function(data)
               {
                if(data){
                  $(".alert-danger").hide();
                  $(".alert-success").show();
                }else{
                  $(".alert-success").hide();
                  $(".alert-danger").show();
                }
               }
            });
         }
      });
   });
</script>
 <script>


  $(document).ready(function() {

    $(document).ready(function() {




      $(document).on('click', '.delete_btn', function () {
         var id = $(this).data('id');
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
                 url: base_url + 'template/remove_template',
                 data:{'id' : id},
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

   });

  });
 </script>

