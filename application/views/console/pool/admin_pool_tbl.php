<table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
              <thead>
                 <tr>
                    <th class="wd-15p border-bottom-0" style='width: 10%;'>Index</th>
                    <th class="wd-15p border-bottom-0" style='width: 10%;'>Name</th>
                    <th class="wd-15p border-bottom-0" style='width: 15%;'>Email</th>
                    <th class="wd-15p border-bottom-0" style='width: 15%;'>Description</th>
                    <th class="wd-15p border-bottom-0" style='width: 10%;'>Follow Up Date</th>
                    <th class="wd-15p border-bottom-0" style='width: 10%;'>Pool Status</th>
                    <th class="wd-15p border-bottom-0" style='width: 15%;'>Record Datess</th>
                    <th class="wd-25p border-bottom-0" style='width: 5%;'>Action</th>
                 </tr>
              </thead>
              <tbody>
               <?php
               $index = 1;
               foreach ($f_pool as $pool)
                  { ?>
                     <tr>
                        <td><?= $index++; ?></td>
                        <td><?= $pool->name; ?></td>
                        <td><?= $pool->email; ?></td>
                        <td><?= $pool->description; ?></td>
                        <td><?= date('d-M-Y',strtotime($pool->follow_up_date)); ?></td>
                        <td><?php if($pool->pool_status == 1){
                           echo 'Process';
                        }else if($pool->pool_status == 2){
                           echo 'Finalize';
                        }else{
                           echo 'Drop';
                        } ?></td>
                        <td><?= date('d-M-Y',strtotime($pool->created_at)); ?></td>

                        <td>
                         <button type="button" class="btn btn-icon btn-primary btn-sm mr-2" title="View" id="view_pool_des" value="<?= $pool->id ?>">
                            <i class="fa fa-eye"></i>
                         </button>
                      </td>
                   </tr>
                   <?php
                }
                ?>
             </tbody>
          </table>