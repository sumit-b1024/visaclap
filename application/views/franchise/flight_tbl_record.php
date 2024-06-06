<style>
   .accordion-button{background-color:#fff !important;}
   .loader, .m_loader {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid blue;
    border-right: 16px solid green;
    border-bottom: 16px solid red;
    width: 50px;
    height: 50px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
 }
</style>
<?php if($status == 1){ ?>
   <?php if(isset($country_visa) && !empty($country_visa)){ ?>
 <a class="btn btn btn-primary create_batch_btn">View Visa</a> 
 
 <!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="add_batch_modal">
 <div class="modal-dialog modal-xl" role="document">
  <div class="modal-content modal-content-demo">
   <form class="create_batch_form">
    <div class="modal-header">
        <h6 class="modal-title"><b>View Visa</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>

    <div class="modal-body">
        <div class="col-sm-12 col-md-12">
            <div class="row">
              <?php foreach($country_visa as $country_visa){ ?>
               <div class="col-md-4">
                  <div class="card" style="box-shadow: -1px -1px 13px !important;">
                     <div class="card-header">
                        <div class="card-title">
                           <center><?=$country_visa->type_of_visa?><br></center>
                        </div>
                     </div>
                  <div class="card-body">
                     <center>
                        <h1><?=$country_visa->price?></h1>
                        <strong>Valid for <?=$country_visa->visa_validity?></strong><hr>
                        <strong><?=$country_visa->length_of_stay?> Of Stay</strong><hr>
                        <strong>Time to get visa <?=$country_visa->time_to_get_visa?> </strong><hr>
                        <strong>Visa Fee <?=$country_visa->time_to_get_visa?></strong><hr>
                        <strong>Our Service Fees <?=$country_visa->service_charge?></strong><hr>
                        <strong><?=$country_visa->description?></strong>
                     </center>
                  </div>
               </div>
            </div>
         <?php } ?>
         </div>
         </div>
 </div>

 <div class="modal-footer">
    <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div> 
<?php } ?>
 <!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="farerule_model">
 <div class="modal-dialog modal-xl" role="document">
  <div class="modal-content modal-content-demo">
   
    <div class="modal-header">
        <h6 class="modal-title"><b>View FareRule</b></h6>
    </div>

    <div class="modal-body">
         <div class="m_loader" ></div>
        <div class="col-sm-12 col-md-12 notification_div">
            
         </div>
 </div>

 <div class="modal-footer">
    <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div> 
<div class="accordion" id="accordionExample">
   <?php
           $index = 1;
           $i = 0;
           foreach($flight_data as $flightdatarow){

           
         $first = reset($flightdatarow['FlightDetails']['Details'][0]);
         $last = end($flightdatarow['FlightDetails']['Details'][0]);

         
         $stime = date("H:i",strtotime($first['Origin']['DateTime']));
         $etime = date("H:i",strtotime($last['Destination']['DateTime']));

         $scity = $first['Origin']['CityName'];
         $ecity = $last['Destination']['CityName'];

         $sacode = $first['Origin']['AirportCode'];
         $eacode = $last['Destination']['AirportCode'];

         $fflight = $first['FlightNumber'];
         $eflight = $last['FlightNumber'];

         $fcode = $first['ValidatingAirline'];
         $ecode = $last['ValidatingAirline'];

         $fdate = $first['Origin']['DateTime'];
         $endate = $last['Destination']['DateTime'];
         $time1 = new DateTime($stime);
         $time2 = new DateTime($etime);
         $timediff = $time1->diff($time2);
         $hour1 = $timediff->format('%h');
         $minute1 = $timediff->format('%i');

          $bookingdate = date("d M",strtotime($first['Origin']['DateTime']));


         //$scountryname =  $this->setting_model->get_code_by_country_name($sacode);
         //$ecountryname =  $this->setting_model->get_code_by_country_name($eacode);

         
         if($bookingprofit->pper != ""){
            $profit = $bookingprofit->pper;  
            $profitlabel = "per";  
         }else{
            $profit = $bookingprofit->pfix;  
            $profitlabel = "fix";  
         }
         
         
         $BasicFare = $flightdatarow['Price']['TotalDisplayFare'];

         if($profitlabel == 'per'){
            $total = ($BasicFare*$profit)/100;
            $total = $total+$BasicFare;
         }else{
            $total = $BasicFare+$profit;
         }

         if($this->session->userdata('user_role') == User_role::SUPER_ADMIN){
            $totalprice = number_format($flightdatarow['Price']['TotalDisplayFare']) ." ".$flightdatarow['Price']['Currency'];
         }else{
            $totalprice = number_format($total) ." ".$flightdatarow['Price']['Currency'];
         }


          $viaornot = count($flightdatarow['FlightDetails']['Details'][0]); 
          if($viaornot == 2){
             $viacity = $first['Destination']['CityName'];
          }
          if($viaornot == 3){
            $viacity = $first['Destination']['CityName'];
            $v2iacity = $flightdatarow['FlightDetails']['Details'][0][1]['Destination']['CityName'];
          }
          
            ?>
  <div class="accordion-item">
    <div class="accordion-header" id="heading<?=$index?>">
      <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$index?>" aria-expanded="true" aria-controls="collapseOne">
        <div class="row col-md-12">
         <div class="col-md-4">
             <h3><?=$flightdatarow['FlightDetails']['Details'][0][0]['OperatorName'] ?>(<?=$totalprice?>)</h3> 
             <span><?=$fcode?> <?=$fflight?>, <?=$ecode?> <?=$eflight?></span>
         </div>   
         <div class="col-md-2">
               <h3><?=$stime?></h3>  
             <span><?=$scity?></span>
         </div>
         <div class="col-md-3">   
          <span><?=($hour1 > 0) ? $hour1." h": "";?> <?=($minute1 > 0) ? $minute1." m": "";?></span></br>
            <?php  if($viaornot == 2){ ?>
               <span>1 stop in <?=$viacity?></span>
            <?php } ?> 
             <?php  if($viaornot == 3){ ?>
               <span>1 stop in <?=$viacity?></span></br>2 stop in <?=$v2iacity?></span>
            <?php } ?>   
         </div>
         <div class="col-md-3">   
            <h3><?=$etime?></h3>  
             <span><?=$ecity?></span>
             
         </div>
      </div>
      </div>
    </div>

    <div id="collapse<?=$index?>" class="accordion-collapse collapse" aria-labelledby="heading<?=$index?>" data-bs-parent="#accordionExample">
      <div class="accordion-body">
       <div class="col-md-12 hidedata">
            <h3><?=$scity?> to <?=$ecity?> , <?=$bookingdate?></h3>
            <?php foreach($flightdatarow['FlightDetails']['Details'][0] as $root){
              $odate = date("D, d M y",strtotime($root['Origin']['DateTime']));
              $ddate = date("D, d M y",strtotime($root['Destination']['DateTime']));
              $otime = date("H:i",strtotime($root['Origin']['DateTime']));
              $dtime = date("H:i",strtotime($root['Destination']['DateTime']));

              $time1 = new DateTime($root['Origin']['DateTime']);
              $time2 = new DateTime($root['Destination']['DateTime']);
              $timediff = $time1->diff($time2);
              $hour = $timediff->format('%h');
              $minute = $timediff->format('%i');
               
              $ocountryname =  $this->setting_model->get_code_by_country_name($root['Origin']['AirportCode']);
              $dcountryname =  $this->setting_model->get_code_by_country_name($root['Destination']['AirportCode']);
             ?>
            <div class="row">
               <h4><?= $root['OperatorName']."&nbsp;".$root['ValidatingAirline']?> | <?= $root['FlightNumber']?></h4>
               <div class="col-md-4">
                  <h3><?=$otime?> (<?= $root['Origin']['AirportName']?>, <?=$ocountryname->country?>)</h3>
                  <span><?=$odate?></span>
               </div>
               <div class="col-md-4">
                  <h3><?=($hour > 0) ? $hour." h": "";?> <?=($minute > 0) ? $minute." m": "";?> Journey</h3>
               </div>
               <div class="col-md-4">
                  <h3><?=$dtime?> (<?= $root['Destination']['AirportName']?>, <?=$dcountryname->country?>)</h3>
                  <span><?=$ddate?></span>
               </div>
            </div><hr>
         <?php } ?>
            <form name="booking" method="post" id="booking" action="<?=base_url()."franchise/bookflight/updatefarequote" ?>" >
               
               <input type="hidden" name="bookingtoken" value="<?=$flightdatarow['ResultToken']?>" />
               <input type="hidden" name="departureDate" value="<?=$passbookingdate?>" />
               <input type="hidden" name="trip" value="<?=$trip?>" />

               <input type="submit" class="btn btn-primary" name="book_now<?=$index?>" value="Book Now" />
            </form>   
         </div> 

      </div>
    </div>
  </div>
  <a href="javascript:void(0)" class="getfarerule" data-requesttoken="<?=$flightdatarow['ResultToken']?>" style="color:red">Fare Rule </a>
<?php $index++; } ?>
</div>
<?php }else{ ?>
<h2><?php echo $message; ?></h2>   
<?php } ?>   

<script>
    $(document).on('click','.create_batch_btn',function(e){
    e.preventDefault();
    $('#add_batch_modal').modal('toggle');
});


    $(document).on('click','.updatefarequote',function(e){

        var token = $('.updatefarequote').data('requesttoken');
       //$('.notification_div').html('');
      // $('#farerule_model').modal('show');
       $(this).find('#ajax_loader_mobile').show();
       $.ajax({
      url : base_url + 'franchise/bookflight/checkfarequote',
      type : "POST",
      data : {token},  
      beforeSend: function(){
       $('.m_loader').show();
    },
    success : function(data){
      $(this).find('#ajax_loader_mobile').hide();
       
    }
 });
          

      });


     $(document).on('click','.getfarerule',function(e){

        var token = $('.getfarerule').data('requesttoken');
       $('.notification_div').html('');
       $('#farerule_model').modal('show');
       $('.m_loader').show();
       $.ajax({
      url : base_url + 'franchise/bookflight/getfarerule',
      type : "POST",
      data : {token},  
      beforeSend: function(){
       $('.m_loader').show();
    },
    success : function(data){
      console.log(data);
      if(data == 'empty'){ 

      }else{
          $('.m_loader').hide();
          $('.notification_div').html(data);
          //$('#farerule_model').modal('show');
     }  
    }
 });
          

      });

    
   </script>