<table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
         <thead>
           <tr>
             <th class="wd-15p border-bottom-0">Name</th>
             <th class="wd-15p border-bottom-0">email</th>
             <th class="wd-15p border-bottom-0">Phone</th>
             <th class="wd-15p border-bottom-0">Pnr</th>

             <th class="wd-15p border-bottom-0">Booking Date</th>
             <th class="wd-15p border-bottom-0">View</th>
          </tr>
       </thead>
       <tbody>
        <?php
        $index = 1;
        foreach ($bookingflightlist as $bookigndata) 
        {
          ?>
          <tr id="">
            <td><?= $bookigndata->fullname; ?></td>
            <td><?= $bookigndata->book_email; ?></td>
            <td><?= $bookigndata->book_phone; ?></td>
            <td><?= $bookigndata->pnr; ?></td>
            <td><?= $bookigndata->booking_date; ?></td>
            <td>
                  <a class="btn btn-secondary btn-sm get_booking_details" href="javascript:void(0)" value="<?=$bookigndata->id?>" data-toggle="tooltip" data-placement="top" title="View Booking detail"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-secondary  btn-sm" href="<?php echo base_url()."franchise/flightreport/viewticket/".$bookigndata->id ?>" data-toggle="tooltip" data-placement="top" title="View Ticket">View Ticket</a>
                 
            </td>
         </tr>
         <?php
      }
      ?>
   </tbody>
</table>