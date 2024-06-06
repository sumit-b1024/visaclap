

   <div class="table_wrapper">
    <div class="table-responsive">
     <table class="table table-bordered text-nowrap border-bottom" id="reffranchise-datatable">
      <thead>
       <tr>
        <th class="wd-15p border-bottom-0" style='width: 20%;'>Username</th>
        <th class="wd-15p border-bottom-0" style='width: 10%;'>Firm Name</th>
        <th class="wd-15p border-bottom-0" style='width: 10%;'>Mobile</th>
        <th class="wd-20p border-bottom-0" style='width: 20%;'>Email</th>
        
        <th class="wd-10p border-bottom-0" style='width: 10%;'>Created On</th>
        
       </tr>
      </thead>
      <tbody>
       <?php
       foreach ( $get_ref_franch as $list )
       {
        ?>
        <tr id="r-<?= $list->user_id; ?>">
         <td>
          <?php 
          if($list->role == User_role::FRANCHISE_STAFF){  
           $get_franchise_name =  $this->setting_model->get_franchise_name_by_franch_staff($list->created_by);
           // print_r($get_franchise_name);
           echo toPropercase($list->first_name .' '. $list->last_name).' <b>('.$get_franchise_name->first_name.''.$get_franchise_name->last_name.')</b>'; 

           }else{ 
           echo toPropercase($list->first_name .' '. $list->last_name);
          } ?>
          </td>
          <td><?= $list->firm_name; ?></td>
          <td><?= $list->mobile; ?></td>
          <td><?= $list->email; ?></td>
          

          <td><?= date('d M Y', $list->created_on); ?></td>
          
         </tr>  
         <?php
        }
        ?>
       </tbody>
      </table>
     </div>
    </div>
 