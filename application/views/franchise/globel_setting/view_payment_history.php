<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">
     <div class="card-body">
        <div class="table-responsive">
           <table class="table table-bordered text-nowrap border-bottom" id="payment-datatable">
              <thead>
                 <tr>
                    <th class="wd-15p border-bottom-0">Amount</th>
                    <th class="wd-15p border-bottom-0">Pay Id</th>
                    <th class="wd-25p border-bottom-0">Pay Order Id</th>
                    <th class="wd-25p border-bottom-0">Order Id</th>
                    <th class="wd-15p border-bottom-0">Method</th>
                    <th class="wd-20p border-bottom-0">Number</th>
                    <th class="wd-20p border-bottom-0">Pay Date</th>
                    <th class="wd-20p border-bottom-0">Status</th>
                </tr>
            </thead>
            <tbody>
             <?php
             $index = 1;
             foreach($get_payment_history as $payment )
             {
               if($payment->status == 'captured'){
                  $status = '<div class="d-inline p-1 bg-success text-white rounded-1">Complete</div>';
               }else{
                  $status = '<div class="d-inline p-1 bg-danger text-white rounded-1">Failed</div>';
               }
                ?>
                <tr>
                   <td><?=$payment->amount; ?></td>
                   <td><?=$payment->pay_id; ?></td>
                   <td><?= $payment->order_id; ?></td>
                   <td><?= $payment->merchant_order_id; ?></td>
                   <td><?= ucfirst($payment->payment_method); ?></td>
                   <td><?= $payment->use_number; ?></td>
                   <td><?= date("d-m-Y H:i:s",$payment->pay_date); ?></td>
                   <td><?= $status; ?>&nbsp;<a class="btn btn-primary btn-sm billprint" data-pid='<?=$payment->id; ?>'><i class="fa fa-print"></i></a></td>
                  
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
<script type="text/javascript">
    $(document).ready(function () {
    $('#payment-datatable').DataTable({"ordering": false});


    
     });
    $(document).on('click', '.billprint',function(e){
      var payuser = $(this).attr('data-pid');
      $.ajax({
        url : base_url+'franchise/globel_setting/generatepdf',
        type : "POST",
        data:{'pid' : payuser},
         xhrFields: {
            responseType: 'blob' // Set the response type to 'blob'
         },
        success :function(response){
         
             var d = new Date($.now());
               var ans = d.getDate()+"-"+(d.getMonth()+1)+"-"+d.getFullYear()+" "+d.getHours();

            const link = document.createElement('a');
            link.href = URL.createObjectURL(response);
            link.download = ans+'.pdf';

            // Trigger the click event to start the download
            link.click();

            // Cleanup the temporary anchor element
            URL.revokeObjectURL(link.href);
            }
        });
    });   
</script>