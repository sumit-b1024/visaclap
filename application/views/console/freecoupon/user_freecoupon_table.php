<table class="table table-bordered text-nowrap border-bottom" id="user_view_freecoupan_tbl">
              <thead>
                 <tr>
                    <th style="width:20%;"> amount </th>
                    <th style="width:80%;"> date </th>
                 </tr>
              </thead>
              <tbody>
                 <?php
                

                 foreach($get_user_franchise_freecoupon as $view){ ?>
                   <tr>
                      <td><?= $view->amount ?></td>
                      <td><?= $view->created_at ?></td>
             </tr>
          <?php  } ?>
       </tbody>
    </table>