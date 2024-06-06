    <!-- <div class="table-responsive"> -->
      <table class="table table-bordered text-nowrap border-bottom bookingsubdetail" id="responsive-datatable">
       <thead>
         <tr>
           
           <th width="wd-15p border-bottom-0"> TicketId </th>
           <th width="wd-15p border-bottom-0"> ticketNo </th>
           <th width="wd-15p border-bottom-0"> Name </th>
         </tr>
       </thead>
       <tbody>
         <?php 
         $i = 1; foreach ($bookingdetail as $key => $value) {  ?>
           <tr>
            
            <td><?=$value->ticketid?></td>
            <td><?=$value->ticketnumber?></td>
            <td><?=$value->firstname." ".$value->lastname?></td>
          </tr>
        <?php } ?>    
      </tbody>
    </table>
    <!-- </div> -->





