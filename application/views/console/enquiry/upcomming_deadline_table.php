<br/><table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                 <thead>
                    <tr>
                       <th width="wd-15p border-bottom-0" style="width:5%"> Index </th>
              <th width="wd-15p border-bottom-0" style="width:5%"> Name </th>
              <th width="wd-15p border-bottom-0" style="width:10%"> Mobile </th>
              <th width="wd-15p border-bottom-0" style="width:14%"> Enquiry Type </th>
              <th width="wd-15p border-bottom-0" style="width:7%"> Biometric Date </th>
              <th width="wd-15p border-bottom-0" style="width:7%"> Interview Date </th>
              <th width="wd-15p border-bottom-0" style="width:5%">Country</th>
              
                    </tr>
                 </thead>
                <tbody>
           <?php
           $index = 1;
           foreach($fetch_upcommingdeadline_filler_data as $view){
             $interview_date = date('d-M-Y',strtotime($view->interview_date));
             $biomatric_date = date('d-M-Y',strtotime($view->biomatric_date));
            ?>
        <tr>
            <td><?= $index++; ?></td>
            <td><?= $view->name ?>

             <a class="single-action view get_deadline_description" href="javascript:void(0)" data-id="<?= $view->id ?>"  data-toggle="tooltip" data-placement="top" title="View Description"><img src="<?php echo base_url('assets/img/eye.svg');  ?>" ></a>
            </td>
            <td><?= $view->mobile_no ?></td>
            <td><?= isset($view->expriry_type_name) && $view->expriry_type_name != "" ? $view->expriry_type_name :"-"; ?></td>
            <td><?= isset($view->biomatric_date) && $view->biomatric_date != "" ? $view->biomatric_date :"-"; ?></td>
            <td><?= isset($view->interview_date) && $view->interview_date != "" ? $view->interview_date :"-"; ?></td>
            <td>
               <?php
          if($view->intersted_country != ""){
                $country = explode(",",$view->intersted_country);
                $allcountryname = array();
                 for($i=0;$i<count($country);$i++){ //echo $country[$i]; exit;
                    $from = $this->setting_model->get_api_country_by_id($country[$i]);
                    $allcountryname[] = $from->countrydata[0]->name;
                  } 
                  echo implode(",", $allcountryname);
                
               }
                ?>

            </td>
       </tr>

    <?php  } ?>
 </tbody>
</table>