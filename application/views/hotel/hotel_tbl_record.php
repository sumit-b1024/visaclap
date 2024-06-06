<style>
   .hotellist{border: 1px solid #c6c6c6;padding: 16px 10px;margin-bottom: 10px;}
   .hotellist .fa {
      font-size: 24px;
   }
   .hotellist .fa.yellow{
      color:yellow;
          color: yellow;
  
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: #292e4a;
   }
   .imagecss img{width: 100%;
    max-height: 200px;
    object-fit: contain;}
</style>
<?php if($status == 1){ ?>
   

   <?php  foreach($hotel_data as $hotelrow){ ?>
      <div class="row hotellist">
         <div class="col-lg-3 imagecss">
            <img src="<?=$hotelrow["HotelPicture"]?>" />
         </div> 
         <div class="col-lg-7">
            <a href="javascript:void(0)"><h4><?=$hotelrow["HotelName"]?></h4> </a>
            <?php 
            for($i=1;$i <= 5;$i++) { 

               if($hotelrow["StarRating"] >= $i){ ?>

                  <i class='fa fa-star yellow'></i>
              <?php  }else{
               ?>
                  <i class='fa fa-star-o'></i>
             <?php }  } ?>
         </div> 
         <div class="col-lg-2">
            <h4><?=$hotelrow["Price"]["PublishedPrice"]." ".$hotelrow["Price"]["CurrencyCode"]?></h4>
         </div>  
      </div>
   <?php } ?>
</div>
<?php }else{ ?>
<h2><?php echo $message; ?></h2>   
<?php } ?>   

<script>
    $(document).on('click','.create_batch_btn',function(e){
    e.preventDefault();
    $('#add_batch_modal').modal('toggle');
});
   </script>