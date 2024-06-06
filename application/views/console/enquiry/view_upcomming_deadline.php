  <style>
    .tbl-action-wrap .single-action {
    /* background-color: bg-transparent;
    border: 0;
    padding: 2px; */
    margin-right: 2px;
}
.table-query-wrap {
    margin-bottom: -14px;
}
tr .bg-transparent
{
  color:#6941C6;
}
.btn-success {
    color: #fff;
    background: #13bfa6 !important;
    border-color: #35b9a6;
}
#menu1 ul
{
  padding-left: 35px;
}
.table tbody td
{
    padding: 19px 15px;
}
.me-3 {
    margin-right: 17rem!important;
}
.mb
{
    margin: 52px !important;
}
.modal-body {
    padding: 8px;
}
.modal-title1
{
  font-weight: bold;
}
.cmn-blk
{
  background-color:white;
}
@media screen and (max-width: 800px)
{
  
.modal
{
  width: 163%;
}
}
  </style>

  
      <h6 class="primary-title1 mb-0" style="    color: #575757;">Select Filter </h6><br>
           <div class="row cmn-blk">
             
          <div class="col-6 col-sm-2 mb-2">
             <button type="button" class="box-btn btn-success next15" style="margin-top: 24px;">Next 15 days</button>
          </div>
          <div class="col-6 col-sm-2">
             <button type="button" class="box-btn btn-success next30" style="margin-top: 24px;">Next 30 days</button>
          </div>  
          <div class="col-12 col-sm-3 input-inside mb-2">
           <label class="d-block">Start Date</label>
           
             <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                        </div><input class="form-control passport_date" id="enquiry_from" name="enquiry_from" placeholder="MM/DD/YYYY" type="text" readonly="readonly">
                    </div> 
         </div>

         <div class="col-12 col-sm-3 input-inside mb-2">
           <label class="d-block">To date</label>
             <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                        </div><input class="form-control passport_date" id="enquiry_to" name="enquiry_to" placeholder="MM/DD/YYYY" type="text" readonly="readonly">
                    </div> 
         </div>
        
           
             
      <div class="col-12 col-md-2">
       <button type="submit" class="box-btn fill_primary sub_btn" style="
       margin-top: 25px;">Submit</button>
       <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 25px;">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
      </button>
      <button type="button" class="box-btn fil_grey reset_btn" style="
      margin-top: 25px;">Reset</button>
    </div>

      </div>
         <div class="table-responsive upcommingdeadline_data"></div>
         <!-- Model For Show Description -->
   <div class="modal fade bd-example-modal-lg" id="view_deadline_description">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content modal-content-demo">
            <form class="">
               <div class="modal-header">
                  <h6 class="modal-title"><b>Deadline Description</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               </div>
               
               <div class="modal-body display_deadline_description">
               </div>

               <div class="modal-footer">
                  <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
crossorigin="anonymous"
></script>  
<script>

  $('.passport_date').datepicker({
      selectOtherMonths: true,
    });
  $(document).ready(function() {


    $(document).on('click','.get_deadline_description',function(){
            var dead_id = $(this).data('id');
            $.ajax({
             type: 'POST',
             url: base_url + 'franchise/request/fetch_deadline_description',
             data:{'dead_id' : dead_id},
             dataType : 'JSON',
             success : function(data){
               $('.display_deadline_description').html("");
               $('.display_deadline_description').html(data.message);
               $('#view_deadline_description').modal('toggle');
            }
         });
         });

/*flatpickr("#enquiry_from", {});
    flatpickr("#enquiry_to", {});*/

get_upcomming_deadline_records();

      });
  function get_upcomming_deadline_records(days){ 
    
      var enquiry_from = $("#enquiry_from").val();
      var enquiry_to = $("#enquiry_to").val();
      var daysval = "";
      
      if(days == ""){
         daysval = "";
      }else{
         daysval = days;
      }
      $.ajax({
         type:"POST",
         url: base_url + "franchise/enquiry/upcommingdeadlinefillerdata",
         data : {days : daysval,enquiry_from : enquiry_from,enquiry_to : enquiry_to},
         beforeSend: function(){
                $(".t_loader").show();
             },
         success:function(res){
            $(".t_loader").hide();
            $('.upcommingdeadline_data').html(res);
            $('.upcommingdeadline_data #responsive-datatable').DataTable();
         }
      });
   }

   
   $(document).on('click', '.next15',function(e){
      get_upcomming_deadline_records('+15'); 
   });
   $(document).on('click', '.next30',function(e){
      get_upcomming_deadline_records('+30'); 
   });
   $(document).on('click', '.sub_btn',function(e){
      get_upcomming_deadline_records(); 
   });
  
  </script>  