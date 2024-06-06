
<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
          <form class="pool_page_report">
           <h4>Select Filter</h4>
           <div class="row">

            <div class="col-sm-12 col-md-2">
             <div class="form-group">
               <label class="form-label">Origin Country</label>
               <select class="form-control select2-show-search origin_country_id" name="origin_country_id" id="origin_country_id" data-placeholder="Select Country">
                  <option value=""></option>
                  <?php foreach ($get_all_country as $key => $value) { ?>
                     <option value="<?= $value->name ?>"><?= $value->name ?></option>
                  <?php    } ?>
               </select>
            </div>
         </div>
         <div class="col-sm-12 col-md-2">
             <div class="form-group">
               <label class="form-label">Destination Country</label>
               <select class="form-control select2-show-search destination_country_id" name="destination_country_id" id="destination_country_id" data-placeholder="Select Country">
                  <option value=""></option>
                  <?php foreach ($get_all_country as $key => $value) { ?>
                     <option value="<?= $value->name ?>"><?= $value->name ?></option>
                  <?php    } ?>
               </select>
            </div>
         </div>
          <div class="col-sm-12 col-md-3">
             <div class="form-group">
               <label class="form-label">Visa Type</label>
               <select class="form-control select2-show-search visa_type" name="visa_type" id="visa_type" data-placeholder="Select Visa Type">
                  <option value=""></option>
               </select>
            </div>
         </div>
         <?php if($this->session->userdata('user_role') == User_role::FRANCHISE){ ?>
          <div class="col-sm-12 col-md-2">
                     <div class="form-group">
                        <label class="form-label ">Assign Enquiry To Staff</label>
                        <select class="form-control staff_id select2-show-search form-select"  id="staff_id" name="staff_id" value="" data-placeholder="Select Staff">
                           <option value="">Select Staff</option>
                           <?php 
                           foreach ($get_all_staff_data as $key => $value) { ?>
                              <option value="<?= $value->user_id ?>"><?= $value->first_name ?></option>
                           <?php    } ?>
                        </select>
                     </div>
                  </div>
         <?php } ?>         
         <div class="col-sm-3 col-md-2 ">
               <div class="form-group">
                   <label class="form-label">Deadline</label>
                    <div class="input-group">

                       <div class="input-group-text">
                          <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                       </div><input class="form-control select_visa_date pull-right" name="select_visa_date" placeholder="MM/DD/YYYY" type="text" readonly>
                    </div>
                    <span class="interview_date_error_msg text-red"></span>
                 </div>
              </div> 
      
     <div class="col-sm-2 col-md-1" style="margin-top: 35px;">
        <button type="button" class="btn btn-primary reset_btn">Reset</button>
     </div>
  </div>
</form>
</div>
</div>

<br/>
<div class="card">

  

   <div class="card-body">
      <div class="table-responsive application_div">

      </div>
   </div>
   <!-- Model For Show Follow Up -->
   <div class="modal fade bd-example-modal-lg" id="view_application_preview">
      <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content modal-content-demo">
            <form class="">
               <input type="hidden" name="record_id" id="record_id">
               <div class="modal-header">
                  <h6 class="modal-title"><b>Application Visa</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>
               
               <div class="modal-body application_preview_div">
               </div>

               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
</div>

<script>
   var api_url = '<?php echo API_URL ?>';
   function get_all_country(){
    $.ajax({
     //url : api_url+"api/visacountry",
     url: base_url + 'franchise/request/getvisacountry',
     type:"GET",
     dataType:"json",
     success:function(data){
      if(data.code != 500){
         $.each(data.message, function (key, val) {
          $("#origin_country_id").append('<option value="'+val.name+'" data-id="'+val.id+'">'+val.name+'</option>');
          $("#destination_country_id").append('<option value="'+val.name+'" data-id="'+val.id+'">'+val.name+'</option>');
         });
      }else{
         alert("Please Enter Domain key");
      }   

  }
});
}
function get_all_visatype(destination_country_id,origin_country_id){
   $("#visa_type").html('');
   $("#visa_type").append('<option value=""></option>');
    $.ajax({
     //url : api_url+"api/visatype",
     url: base_url + 'franchise/request/getallvisatype',
     type:"POST",
     data : {destination_country_id : destination_country_id,origin_country_id : origin_country_id},
     dataType:"json",
     success:function(data){
      $.each(data.visatype, function (key, val) {
       $("#visa_type").append('<option value="'+key+'">'+val+'</option>');
   });
  }
});
}
   function get_application_tbl_records(){ 
      var origin_country_id = $('#origin_country_id').val();
      var destination_country_id = $('#destination_country_id').val();
      var staff_id = $('#staff_id').val();
      var visa_type = $('#visa_type').val();
      $.ajax({
         type:"POST",
         url: base_url + "franchise/request/get_visaapplication_tbl_records",
         data : {visa_type : visa_type,origin_country_id : origin_country_id,destination_country_id : destination_country_id,staff_id : staff_id},
         beforeSend: function(){
                $(".t_loader").show();
             },
         success:function(res){
            $(".t_loader").hide();
            $('.application_div').html(res);
            $('.application_div #responsive-datatable').DataTable({
                    order: [[0, 'asc']]
                });
         }
      });
   }
  
function get_application_bydate_tbl_records(start,end){
      var startdate = start;
      var enddate = end;
      var origin_country_id = $('#origin_country_id').val();
      var destination_country_id = $('#destination_country_id').val();
      var staff_id = $('#staff_id').val();
      var visa_type = $('#visa_type').val();
      $.ajax({
         type:"POST",
         url: base_url + "franchise/request/get_visaapplication_tbl_records",
         data : {visa_type:visa_type,startdate:startdate,enddate:enddate,origin_country_id : origin_country_id,destination_country_id : destination_country_id,staff_id : staff_id},
          beforeSend: function(){
                $(".t_loader").show();
             },
         success:function(res){
             $(".t_loader").hide();
            $('.application_div').html(res);
            $('.application_div #responsive-datatable').DataTable({
                    order: [[4, 'desc']],
                });
         }
      });

}
  
 

   $(document).ready(function() {

      $('input[name="select_visa_date"]').daterangepicker({
    opens: 'left',
    locale: {
      format: 'DD/M/YYYY'
    }
  }, function(start, end, label) {
    //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    get_application_bydate_tbl_records(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
  });

      get_all_country();
      
      get_application_tbl_records();

      $(document).on('click','.view_application',function(){
            var group_id = $(this).data('id');
            $.ajax({
             type: 'POST',
             url: base_url + 'franchise/request/fetch_visaapplication_data_groupby',
             data:{'group_id' : group_id},

             success : function(data){
               $('.application_preview_div').html("");
               $('.application_preview_div').html(data);
               $('#view_application_preview').modal('toggle');
            }
         });
         });

      $('#origin_country_id').on('change',function(){
         var origin_country_id = $(this).val();  
         var destination_country_id = $('#destination_country_id option:selected').data('id');
         var origin_country_id1 = $('#origin_country_id option:selected').data('id');
         if(origin_country_id){
            get_application_tbl_records();
         }
         if(destination_country_id && origin_country_id1){
           get_all_visatype(destination_country_id,origin_country_id1);
         } 

      });
      $('#destination_country_id').on('change',function(){
         var destination_country_id = $(this).val();  
         var origin_country_id = $('#origin_country_id option:selected').data('id');
         var destination_country_id1 = $('#destination_country_id option:selected').data('id');
         
         if(destination_country_id){
            get_application_tbl_records();
         }
         if(destination_country_id1 && origin_country_id){
            get_all_visatype(destination_country_id1,origin_country_id);
         } 

      });
      $('#staff_id').on('change',function(){
         var staff_id = $(this).val();  
         if(staff_id){
            get_application_tbl_records();
         }

      });
       $('#visa_type').on('change',function(){
         var visa_type = $(this).val();  
         if(visa_type){
            get_application_tbl_records();
         }
      });

         $(document).on('click', '.reset_btn',function(e){
            $('.origin_country_id').val(null).trigger("change");
             $('.destination_country_id').val(null).trigger("change");
             $('.visa_type').html('').trigger("change");
             $('.staff_id').html('').trigger("change");

            get_application_tbl_records();
         });
         
      });
   </script>