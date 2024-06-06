
           <table class="table table-bordered text-nowrap border-bottom" id="payment-datatable">
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
                  <td><?=$payment->balance; ?></td>
                  
             </tr>
             <?php
         }
         ?>
     </tbody>
 </table>
