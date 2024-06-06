<div class="row row-sm">
   <div class="col-lg-12">
     <div class="card">
       <div class="card-body">
         <form class="enquiry_page_report">
           
           <div class="row">
          <div class="col-sm-2 col-md-2 input-inside">
           <label class="form-label">From</label>
           <div class="wd-200 mg-b-30">
             <div class="input-group">
               <div class="input-group-text">
                 <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
               </div><input class="form-control passport_date" id="enquiry_from" name="from" placeholder="MM/DD/YYYY" type="text" readonly>
             </div>
           </div>
         </div>

         <div class="col-sm-2 col-md-2 input-inside">
           <label class="form-label">To</label>
           <div class="wd-200 mg-b-30">
             <div class="input-group">
               <div class="input-group-text">
                 <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
               </div><input class="form-control passport_date" id="enquiry_to" name="to" placeholder="MM/DD/YYYY" type="text" readonly>
             </div>
           </div>
         </div>
       
      <div class="col-sm-3 col-md-3 mt-4">
       <button type="submit" class="box-btn fill_primary sub_btn" style="
       margin-top:0px;">Submit</button>
       <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 0px;">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
      </button>
      <button type="button" class="box-btn fil_gray reset_btn">Reset</button>
      <button class="exportdata btn btn-success">Export data</button>
    </div>
 </div>
</form>
</div>
</div><br/>
      <div class="card">
     <div class="card-body">
        <div class="table-responsive paymentdatatable">
          <!--  <table class="table table-bordered text-nowrap border-bottom" id="payment-datatable">
              <thead>
                 <tr>
                    <th class="wd-15p border-bottom-0">Amount</th>
                    <th class="wd-15p border-bottom-0">Type</th>
                    <th class="wd-15p border-bottom-0">Service Type</th>
                    <th class="wd-15p border-bottom-0">Customer Mobile</th>
                    <th class="wd-15p border-bottom-0">Date</th>
                    <th class="wd-15p border-bottom-0">Balance</th>
                </tr>
            </thead>
            <tbody>
             <?php
             $index = 1;
             $balance = 0;
             foreach($get_passbook_history as $payment )
             {
                ?>
                <tr>
                   <td><?=$payment->amount; ?></td>
                   <td><?=$payment->ptype; ?></td>
                   <td><?=$payment->servisetype; ?>&nbsp;<?php if($payment->service_type == Service_type::VISA){ echo "(FOR ".$visa[0]." TO ".$visa[1].")"; } ?><?php if($payment->service_type == Service_type::FLIGHT){ echo "(".$flightname->origin." TO ".$flightname->destination.")"; } ?></td>
                   <td><?=$payment->contact; ?></td>
                   <td><?= date("d-m-Y H:i:s",strtotime($payment->created_at)); ?></td>
                  <td><?=$balance; ?></td>
                  
             </tr>
             <?php
         }
         ?>
     </tbody>
 </table> -->
</div>
</div>

</div>
</div>
</div>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>




<script type="text/javascript">
    $(document).ready(function () {
    $('#payment-datatable').DataTable( {
  "ordering": false
});

get_passbook_history();

     });


    $('.passport_date').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
    });

    $(document).on('submit', '.enquiry_page_report',function(e){
    e.preventDefault();
    get_passbook_history();
  });

     $(document).on('click', '.exportdata',function(e){
      $.ajax({
        url : base_url+'franchise/globel_setting/exportpassbook',
        type : "POST",
        data : $('.enquiry_page_report').serializeArray(),
        success :function(data){

                var blob = new Blob([data]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'data.csv';
                link.click();
            }
        });
  });

    function get_passbook_history(){

    $('.sub_btn').attr('disabled', 'disabled');
    $('.spiner_btn').removeAttr('style', 'display: none');
    $('.spiner_btn').attr('style', 'margin-top: 0px');
    $('.sub_btn').attr('style', 'display: none');

    $.ajax({
        url : base_url+'franchise/globel_setting/getpassbookrecord',
        type : "POST",
        data : $('.enquiry_page_report').serializeArray(),
        success :function(data){
            $('.sub_btn').removeAttr('disabled', 'disabled');
            $('.spiner_btn').attr('style', 'display: none');
            $('.sub_btn').removeAttr('style', 'display: none');
            $('.sub_btn').attr('style', 'margin-top: 0px');
            $('.paymentdatatable').html("");
            $('.paymentdatatable').html(data);
                //$('#responsive-datatable').DataTable();
                $('#payment-datatable').DataTable( {
  "ordering": false
});
            }
        });
}
$(document).on('click', '.reset_btn',function(e){
    $('.enquiry_page_report')[0].reset();
   get_passbook_history(); 
});
</script>