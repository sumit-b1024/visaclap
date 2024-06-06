<table class="table table-bordered text-nowrap border-bottom" id="view_freecoupan_tbl">
              <thead>
                 <tr>
                    <th width="wd-15p border-bottom-0"> Firmname </th>
                    <th width="wd-15p border-bottom-0"> Email </th>
                    <th width="wd-15p border-bottom-0"> Mobile </th>
                    <th width="wd-15p border-bottom-0"> Total Amount </th>
                    <th width="wd-15p border-bottom-0">Action</th>
                    
                 </tr>
              </thead>
              <tbody>
                 <?php
                

                 foreach($get_franchise_freecoupon as $view){ ?>
                   <tr>
                      <td><?= $view->firm_name ?></td>
                      <td><?= $view->email ?></td>
                      <td><?= $view->mobile ?></td>
                      <td><?= $view->amount ?></td>
                      <td><button type="button" class="btn btn-danger btn-sm get_history_freecoupon" user_id="<?= $view->user_id; ?>" service_type="<?= $view->service_type; ?>">View</button></td>
             </tr>
          <?php  } ?>
       </tbody>
    </table>