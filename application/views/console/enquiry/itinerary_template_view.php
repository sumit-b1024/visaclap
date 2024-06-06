<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>

<table class='table table-bordered'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>First</th>
      <th scope='col'>Last</th>
      <th scope='col'>Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='row'>1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope='row'>2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope='row'>3</th>
      <td colspan='2'>Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>












  


<table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>First</th>
      <th scope='col'>Last</th>
      <th scope='col'>Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='row'>1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope='row'>2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope='row'>3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


<div class='col-sm-12 col-lg-12'>
    <div class='card'>
        <div class='card-header'>
            <h3 class='card-title'>List Of All Iteratory</h3>
        </div>
        <div class='card-body'>
            <div class=''>
                <ul class='list-group'>
                    <li class='list-group-item'>
                        Destination 
                        <span class='badgetext badge bg-default rounded-pill'><?= $fetch_itenerary_details->c_name; ?></span>
                    </li>
                    <li class='list-group-item'>
                     City
                     <span class=' badgetext badge bg-default rounded-pill'><?= $fetch_itenerary_details->city_nm; ?></span>
                 </li>
             </ul>
         </div>
     </div>
 </div>
 </div>

 </body>
</html>

<div class="col-sm-12 col-lg-12">
    <div class="card">
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
 </div>

 <div class="card">
        <div class="card-body">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Day</th>
          <th scope="col">Turist Place</th>
          <th scope="col">Description</th>
          <th scope="col">Image</th>
      </tr>
  </thead>
  <tbody>
    <?php 
    if(!empty($fetch_destinations_data)){
    foreach ($fetch_destinations_data as $key => $value) { ?>
    <tr>
      <th><?php echo $value->day; ?></th>
      <td><?php echo $value->turist_place; ?></td>
      <td><?php echo $value->turist_description; ?></td>
      <td><?php 
        $fetch_all_images = $this->setting_model->fetch_all_turist_imgs($value->meta_id);
        if(!empty($fetch_all_images)){ 
            foreach ($fetch_all_images as $key => $value) { ?>
            <img src="<?php echo base_url($value->img_name); ?>" class="img-bordered" height="50px" width="50px">
           <?php }
            ?>
       <?php }else{
        echo 'No Image Dound.'; 
       }

       ?></td>
  </tr>  
    <?php } }else{ ?>
        <tr><td>No Data Found.</td></tr>

    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>