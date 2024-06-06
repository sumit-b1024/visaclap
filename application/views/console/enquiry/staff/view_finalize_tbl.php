<table class="table table-bordered text-nowrap border-bottom" id="responsive_finalize_pool">
              <thead>
                 <tr>
                    <th width="wd-15p border-bottom-0"> Index </th>
                    <th width="wd-15p border-bottom-0"> Name </th>
                    <th width="wd-15p border-bottom-0"> Mobile </th>
                    <th width="wd-15p border-bottom-0"> Follow Up Date </th>
                    <th width="wd-15p border-bottom-0"> Pool Status </th>
                    
                 </tr>
              </thead>
              <tbody>
                 <?php
                 $index = 1;

                 foreach($fetch_finalize_enquiry_data as $view){ ?>
                   <tr>
                      <td><?= $index++; ?></td>
                      <td><?= $view->name ?></td>
                      <td><?= $view->mobile_no ?></td>
                      <td><?= $view->follow_up_date != "0000-00-00" ? date('d-M-Y',strtotime($view->follow_up_date)) : ""; ?></td>

                      <td>
                        <div class="dropdown">
                         <?php 
                         if($view->pool_status=="1"){
                            $p_status =  "warning";
                         }elseif($view->pool_status=="2"){
                            $p_status =  "success";
                         }else{
                            $p_status =  "danger";
                         }
                         ?>
                         <button type="button" id="pool_chane_i<?= $view->id ?>" class="btn btn-<?= $p_status ?> dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fe fe-stroopwafel me-2 "></i>Change Pool Status
                        </button>
                        <div class="dropdown-menu" >
                         <button type="button" class="btn btn-warning btn-sm change_pool_status"  pool_record_id="<?= $view->id; ?>"  value="1">Process Pool</button>
                         <button type="button" class="btn btn-danger btn-sm change_pool_status" pool_record_id="<?= $view->id; ?>"  value="3">Drop Pool</button>
                      </div>
                   </div>
                </td>
                
             </tr>

          <?php  } ?>
       </tbody>
    </table>
    