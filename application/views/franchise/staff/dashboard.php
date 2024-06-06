<?php echo add_edit_form_part(); ?>
<style type="text/css">
   .t_loader, .m_loader, .y_loader, .loader {
     border: 16px solid #f3f3f3;
     border-radius: 50%;
     border-top: 16px solid blue;
     border-right: 16px solid green;
     border-bottom: 16px solid red;
     width: 50px;
     height: 50px;
     -webkit-animation: spin 2s linear infinite;
     animation: spin 2s linear infinite;
  }
</style>
<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card" style="box-shadow: -1px -1px 13px !important;">
         <div class="card-header">
            <div class="row">
              <div class="col-9">
               <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <div class="col-3">
               <!-- <a href="javascript;" class="btn btn-info btn-sm pull-right open_my_form_form" data-control="enquiry" data-mathod="add"><i class="fa fa-plus"></i>
                Add
             </a> -->
          </div>                    
       </div>
    </div>
 </div>

 <div class="card" style="box-shadow: -1px -1px 13px !important;">
  <div class="card-body">
   <div class="alert alert-warning" role="alert">
      <center><b>* Process Pool *</b></center>
   </div>
   <center><div class="loader"></div></center>
   <div class="table-responsive" id="process_pool_div">
   </div>
   <br>
</div>
</div>





</div>
</div>

<script>
   function get_process_pool_data(){
      $.ajax({
         url : base_url + 'franchise/staff/dashboard/fetch_process_pool_data',
         type : "POST",
         beforeSend: function(){
          $(".loader").show();
       },
       success : function(data){
          $(".loader").hide();
          $('#process_pool_div').html("");
          $('#process_pool_div').html(data);
          $('#responsive_process_pool').DataTable();
       }
    });
   }

   $(document).ready(function(){
      get_process_pool_data();
   });


</script>

