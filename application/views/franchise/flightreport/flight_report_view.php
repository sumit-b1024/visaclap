
<!-- BASIC MODAL For Add Follow Up -->
<style type="text/css">
   .t_loader, .m_loader, .y_loader, .loader {
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
 .alert {
  background-color: #337CFF;
  color: white;
}

/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>

<!-- Model For Show Interview -->
<!-- <div class="loading">Loading&#8230;</div> -->

<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
          <form class="pool_page_report">
           <div class="row">
           <?php  if($this->session->userdata('user_role') == User_role::FRANCHISE){ ?>
               <div class="col-sm-12 col-md-2 ">
                  <div class="form-group input-inside">
                     <label class="form-label ">Staff</label>
                     <select class="staff_id form-select"  id="staff_id" name="staff_id" value="" data-placeholder="Select Staff">
                        <option value="">Select Staff</option>
                        <?php 
                        foreach ($get_all_staff_data as $key => $value) { ?>
                           <option value="<?= $value->user_id ?>"><?= $value->first_name ?></option>
                        <?php    } ?>
                     </select>
                  </div>
               </div>
            <?php  } ?>
            <div class="col-sm-3 col-md-3 input-inside">
             <div class="form-group">
              <label class="form-label">From</label>
              <select name="origin"  id="origin" data-placeholder="From" class="origin  form-select">
                
                  <!-- <?php foreach ($get_all_airport as $key => $value) { ?>
                     <option value="<?= $value->code ?>" data-country="<?= $value->country ?>" <?php echo (!empty($fightdata) && $fightdata['Origin'] == $value->code) ? "selected" : ""; ?>><?= $value->airport_name.'  ('.$value->city.') ('.$value->code.') ('.$value->country.')'; ?></option>
                  <?php } ?> -->

               </select>  
               <input type="hidden" name="formcountry"  id="formcountry" value="" />
            </div>
         </div>
         <div class="col-sm-3 col-md-3 input-inside">
          <div class="form-group">
           <label class="form-label">To</label>
           <select name="destination"  id="destination" data-placeholder="To" class="destination form-select">
           <!--  <option value="">Select<option> 
               <?php foreach ($get_all_airport as $key => $value) { ?>
                  <option value="<?= $value->code ?>" data-country="<?= $value->country ?>" <?php echo (!empty($fightdata) && $fightdata['Destination'] == $value->code) ? "selected" : ""; ?>><?= $value->airport_name.' ('.$value->city.') ('.$value->code.') ('.$value->country.')'; ?></option>
               <?php } ?>
            </select>  -->
            <input type="hidden" name="tocountry" id="tocountry" value="" /> 
         </div>
      </div>

      <div class="col-sm-3 col-md-3 input-inside">
         <div class="form-group">
           <label class="form-label">Booking Date</label>
           <div class="input-group">

             <div class="input-group-text">
                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
             </div><input class="form-control select_booking_date pull-right" name="select_booking_date" placeholder="MM/DD/YYYY" type="text" readonly>
          </div>
          <span class="interview_date_error_msg text-red"></span>
       </div>
    </div>
    <div class="col-sm-2 col-md-1 form-btns" style="margin-top: 25px;">
     <button type="button" class="box-btn fil_grey reset_btn">Reset</button>
  </div>
</div>
</form>
</div>
</div>
<br/>
<div class="row">
  <div class="col-lg-12">
     <div class="card">
       <div class="card-body">
          <form class="detail_search">
            <div class="row input-inside">

             <div class="col-sm-2 col-md-2">
                <div class="form-group">
                   <label class="form-label">Email</label>
                   <input class="form-control email" id="email" name="email" placeholder="Email" type="text">
                </div>
             </div>
             <div class="col-sm-2 col-md-2">
                <div class="form-group">
                   <label class="form-label">Number</label>
                   <input class="form-control number" id="number" name="number" placeholder="Number" type="text">
                </div>
             </div>
             <div class="col-sm-3 col-md-3 form-btns">
                <button type="submit" class="box-btn fill_primary sub_detail_btn" style="
                margin-top: 25px;">Submit</button>
                <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 25px;">
                 <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                 Loading...
              </button>
              <button type="button" class="box-btn fil_grey reset_btn_detail" style="
              margin-top: 25px;">Reset</button>
           </div>
        </div> 
     </form>  
  </div>
</div>
</div> 
</div>
<br/>
<div class="card">

   <div class="card-header">
      <div class="row">
         <div class="col-7">
            <h3 class="card-title"><?= $title; ?></h3>
         </div>

      </div>
   </div>

   <div class="card-body ">
    <div class="table-responsive bookingrecord">

    </div>
 </div>

</div>

<!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="view_bookingdetail_model">
   <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content modal-content-demo">
         <form class="">
            <input type="hidden" name="record_id" id="record_id">
            <div class="modal-header">
               <h6 class="modal-title"><b>View All Follow  Up</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body details_body">
            </div>

            <div class="modal-footer">
               <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>

</div>
</div>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>
<script>



   $("#number").autocomplete({
      source: function (request, response) {
        $.ajax({
          url: base_url + 'franchise/bookflight/get_booking_auto_by_number',
          data: {"term" : request.term,"status" : status},
          dataType: "json",
          type: "POST",
          async: true, 
          success: function (data) {
            if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
               initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['mobile_no'],
                  };
               }));

            }
         }
      });
     },

  });

   $("#email").autocomplete({
      source: function (request, response) {
        $.ajax({
          url: base_url + 'franchise/bookflight/get_booking_auto_by_email',
          data: {"term" : request.term,"status" : status},
          dataType: "json",
          type: "POST",
          async: true, 
          success: function (data) {
            if(!data.length){
               // google.maps.event.addDomListener(window, 'place_changed', initialize);
               // jQuery('#name').on('input', function() {
               initialize();
               // });

            }else{
               response($.map(data, function (item) {
                  return {
                     label: item['email'],
                  };
               }));

            }
         }
      });
     },

  });

   $(document).on('submit', '.detail_search',function(e){
     e.preventDefault();


     get_booking_detail_data();
  });

   function get_booking_detail_data(){

     $('.sub_btn_detail').attr('disabled', 'disabled');
     $('.spiner_btn_detail').removeAttr('style', 'display: none');
     $('.spiner_btn_detail').attr('style', 'margin-top: 35px');
     $('.sub_btn_detail').attr('style', 'display: none');

     $.ajax({
       url : base_url+'franchise/flightreport/generate_booking_detail_report',
       type : "POST",
       data : $('.detail_search').serializeArray(),
       success :function(data){
         $('.sub_btn_detail').removeAttr('disabled', 'disabled');
         $('.spiner_btn_detail').attr('style', 'display: none');
         $('.sub_btn_detail').removeAttr('style', 'display: none');
         $('.sub_btn_detail').attr('style', 'margin-top: 35px');
         $('.bookingrecord').html("");
         $('.bookingrecord').html(data);
         $('#responsive-datatable').DataTable({
           order: [[4, 'desc']],
        });
      }
   });
  }

  function get_booking_data(){
   var staff = $('#staff_id').val();
   var origin = $('#origin').val();
   var destination = $('#destination').val();

   $.ajax({
      type:"POST",
      url: base_url + "franchise/flightreport/get_flight_booking",
      data : {staff : staff,origin : origin,destination : destination},
      success:function(res){
         $('.bookingrecord').html(res);
         $('#responsive-datatable').DataTable({
           order: [[4, 'desc']],
        });
      }
   });
}

function get_booking_data_by_date(start,end){
   var startdate = start;
   var enddate = end;
   var staff = $('#staff_id').val();
   var origin = $('#origin').val();
   var destination = $('#destination').val();
   $.ajax({
      type:"POST",
      url: base_url + "franchise/flightreport/get_flight_booking",
      data : {startdate:startdate,enddate:enddate,staff : staff,origin : origin,destination : destination},
      success:function(res){
       $('.bookingrecord').html(res);
       $('#responsive-datatable').DataTable({
        order: [[4, 'desc']],
     });
    }
 });

}

 //$('.origin').on('change',function(){
// $(document).on("change",".origin",function(){
//    console.log('111');
//    var termname = $(this).val();  
//       // if(destination){
//    $.ajax({
//       type:"POST",
//       url: base_url + "settings/get_all_airportlist",
//       data : {termname : termname},
//       dataType : 'JSON',
//       success:function(data){
//                // data = $.parseJSON(res);     
//          if(data){
//             $("#origin").empty();
//             $("#origin").append('<option>Select City</option>');
//             $.each(data,function(key,value){
//                $("#origin").append('<option value="'+value.code+'">'+value.airport_name+'</option>');
//             });
//          }else{
//             $("#origin").empty();
//          }
//       }
//    });
//       // }else{
//       //    $("#city").empty();
//       // }
// });

function get_airpost_list(){
 $.ajax({
   type:"POST",
   url: base_url + "franchise/flightreport/get_all_airportlist",
   // data : {termname : termname},
   dataType : 'JSON',
   beforeSend: function(){
                 $(".loading").show();
     },
   success:function(data){
              $(".loading").hide();    
      if(data){
         $("#origin, #destination").empty();
         $("#origin, #destination").append('<option value="">Select Airport</option>');
         $.each(data,function(key,value){
            $("#origin, #destination").append('<option value="'+value.code+'">'+value.airport_name+' ('+value.city+')'+' ('+value.code+')'+' ('+value.country+')'+'</option>');
         });
         $('.pool_page_report #origin, .pool_page_report #destination ').select2({
                 dropdownParent: $('.pool_page_report'),
                 width: "100%"
              });
         var origin = $('#origin');
    origin.on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
     var destination = $('#destination');
    destination.on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    })
      }else{
         $("#origin, #destination").empty();
      }
   }
});
}


$(document).on('click', '.get_booking_details', function () {
 var id  =  $(this).attr('value');
 $.ajax({
  type: 'POST',
  url: base_url + 'franchise/flightreport/bookingfulldetail',
  data:{'id' : id},
  success: function(result) {
   $('.follow_up_body').html("");
         // $('.follow_up_body').html("data");
   $('.details_body').html(result);
   $('.bookingsubdetail').DataTable();
   $('#view_bookingdetail_model').modal('show');

         // $('#responsive-datatable').DataTable();
}
});

});
$(document).on('click', '.reset_btn_detail',function(e){
  $('.detail_search')[0].reset();
  get_booking_data(); 
});

$(document).ready(function() {

get_airpost_list();

   get_booking_data();



   $('input[name="select_booking_date"]').daterangepicker({
     opens: 'left',
     locale: {
      format: 'DD/M/YYYY'
   }
}, function(start, end, label) {
             //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  get_booking_data_by_date(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
});

   


   $(document).on('change','#staff_id',function(){
      get_booking_data();
   });
   $(document).on('change','#origin',function(){
      get_booking_data();
   });
   $(document).on('change','#destination',function(){
      get_booking_data();
   });
   $(document).on('change','#select_booking_date',function(){
      get_booking_data();
   });

   $(document).on('click', '.reset_btn',function(e){
     $('.staff_id').val(null).trigger("change");
     $('.origin').val(null).trigger("change");
     $('.destination').val(null).trigger("change");
     $('.select_visa_date').val(null).trigger("change");
  });

});
</script>