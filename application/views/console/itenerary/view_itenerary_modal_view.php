<div class="col-sm-12 col-lg-12">
    <!-- <div class="card" style="box-shadow: -1px -1px 13px !important;">
        <div class="card-header">
            <h3 class="card-title">List Of All Iteratory</h3>
        </div>
        <div class="card-body">
            <div class="">
                <ul class="list-group">
                    <li class="list-group-item">
                        Destination 
                        <span class="badgetext badge bg-default rounded-pill"><?= $fetch_itenerary_details->c_name; ?></span>
                    </li>
                    <li class="list-group-item">
                     City
                     <span class=" badgetext badge bg-default rounded-pill"><?= $fetch_itenerary_details->city_nm; ?></span>
                 </li>
             </ul>
         </div>
     </div>
 </div> -->
 <div class="row">
    <div class="col-sm-5 col-lg-5 col-md-5"></div>
    <div class="col-sm-4 col-lg-4 col-md-4">

       <h1><?php echo $fetch_itenerary_details->i_name; ?></h1>
   </div>
   <div class="col-lg-5 col-md-5"></div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th width="20%">Day</th>
              <th>Turist Place</th>
              <th>Description</th>
              <th>Time</th>
              <th>Image</th>
          </tr>
      </thead>
      <tbody>
        <?php 
        if(!empty($fetch_destinations_data)){
            $day =array();
            foreach ($fetch_destinations_data as $key => $value) { 
                if(!in_array($value->day,$day)){
                   $day[] = $value->day;
                   $printday = $value->day;
                   }else{
                   $printday = "";
                   }
                ?>
                
                <tr>
                  
                  <td><?=$printday?></td>
                  <td><?php echo $value->turist_place; ?></td>
                  <td><?php echo $value->turist_description; ?></td>
                  <td><?php echo $value->time; ?></td>
                 
                 <td><?php 
                  $fetch_all_images = $this->setting_model->fetch_all_turist_imgs($value->meta_id);
                  if(!empty($fetch_all_images)){ ?>
                        <img src="<?php echo base_url($fetch_all_images->img_name); ?>" class="img-bordered" height="50px" width="50px">
                    
                <?php }else{
                    echo 'No Image Found.'; 
                } ?></td>
                <!-- <div class="line-6"></div> -->
            </tr> 
        <?php } }else{ ?>
            <tr><td>No Data Found.</td></tr>    
        <?php } ?>
    </tbody>
</table>
</div>
</div>
</div>

