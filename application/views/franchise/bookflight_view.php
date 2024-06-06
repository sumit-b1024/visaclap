<style>

.loader {
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


.customradio .form-control {
  font-family: system-ui, sans-serif;
  font-size: 1rem;
  font-weight: bold;
  line-height: 1.1;
  display: grid;
  grid-template-columns: 1em auto;
  gap: 0.5em;
  cursor: pointer;
}

.customradio .form-control + .form-control {
  margin-top: 1em;
}

.customradio .form-control:focus-within {
  color: var(--form-control-color);
}

.customradio input[type="radio"] {
  /* Add if not using autoprefixer */
  -webkit-appearance: none;
  /* Remove most all native input styles */
  appearance: none;
  /* For iOS < 15 */
  background-color: var(--form-background);
  /* Not removed via appearance */
  margin: 0;

  font: inherit;
  color: currentColor;
  width: 1.15em;
  height: 1.15em;
  border: 0.15em solid currentColor;
  border-radius: 50%;
  transform: translateY(-0.075em);

  display: grid;
  place-content: center;
}

.customradio input[type="radio"]::before {
  content: "";
  width: 0.65em;
  height: 0.65em;
  border-radius: 50%;
  transform: scale(0);
  transition: 120ms transform ease-in-out;
  box-shadow: inset 1em 1em var(--form-control-color);
  /* Windows High Contrast Mode */
  background-color: CanvasText;
}

.customradio input[type="radio"]:checked::before {
  transform: scale(1);
}


.customradio input[type="radio"]:checked{
  outline: max(2px, 0.15em) solid currentColor;
  
}

.customradio input[type="radio"]:checked:focus {
  outline: max(2px, 0.15em) solid currentColor;
  
}

    .double_seat_fares.disabledbutton {
    pointer-events: none;
    opacity: 0.4;
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
<!-- <div class="loading">Loading&#8230;</div> -->
<div class="row">
 <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form class="getflights" name="getflights" id="getflights">
               <?php $fightdata = $this->session->userdata('fightdata');  ?>
                <div class="row customradio">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label form-control" for="Oneway"><input type="radio" name="trip" id="Oneway" value="OneWay" checked="checked"<?php echo (!empty($fightdata) && $fightdata['JourneyType'] == "OneWay") ? "checked" : ""; ?>>&nbsp; Oneway</label>
                        </div>
                    </div>    
                   <!--  <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label form-control" for="round_trip"><input type="radio" name="trip" id="round_trip" value="return" <?php echo (!empty($fightdata) && $fightdata['JourneyType'] == "return") ? "checked" : ""; ?>>&nbsp; Round Trip</label>
                        </div>
                    </div> -->
                </div>    
                <div class="row">
                        <div class="col-sm-3 col-md-3 mb-2">
                            <div class="form-group input-inside">
                                <label class="form-label">From</label>
                                <select name="origin"  id="origin" data-placeholder="From" class="origin form-select">
                                    <!-- <?php foreach ($get_all_airport as $key => $value) { ?>
                                       <option value="<?= $value->code ?>" data-country="<?= $value->country ?>" <?php echo (!empty($fightdata) && $fightdata['Origin'] == $value->code) ? "selected" : ""; ?>><?= $value->airport_name.'  ('.$value->city.') ('.$value->code.') ('.$value->country.')'; ?></option>
                                   <?php } ?> -->

                               </select>  
                               <input type="hidden" name="formcountry"  id="formcountry" value="" />
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 mb-2">
                            <div class="form-group input-inside">
                                <label class="form-label">To</label>
                                <select name="destination"  id="destination" data-placeholder="To" class="destination form-select">
                                   <!--  <?php foreach ($get_all_airport as $key => $value) { ?>
                                       <option value="<?= $value->code ?>" data-country="<?= $value->country ?>" <?php echo (!empty($fightdata) && $fightdata['Destination'] == $value->code) ? "selected" : ""; ?>><?= $value->airport_name.' ('.$value->city.') ('.$value->code.') ('.$value->country.')'; ?></option>
                                   <?php } ?> -->
                               </select> 
                               <input type="hidden" name="tocountry" id="tocountry" value="" /> 
                            </div>
                        </div>
                         <div class="col-sm-3 col-md-3 fromto">
                             <label class="form-label">DEPARTURE-RETURN</label>
                             <div class="wd-200 mg-b-30">
                                <div class="input-group">
                                   <div class="input-group-text">
                                      <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                      <span></span>
                                   </div><input class="form-control select_interview_date" id="select_interview_date" name="select_interview_date" placeholder="DEPARTURE - RETURN" type="text" >
                                   <span></span>
                                </div>
                                <span class="interview_date_error_msg text-red"></span>
                             </div>
                        </div> 
                         <div class="col-sm-3 col-md-3 to input-inside">
                            <label class="form-label">DEPARTURE</label>
                            <div class="wd-200 mg-b-30">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                    </div><input class="form-control tosele" id="tosele" name="departureDate" placeholder="MM/DD/YYYY" readonly type="text" value="<?php echo (!empty($fightdata) && $fightdata['departureDate'] != "") ? $fightdata['departureDate'] : ""; ?>">
                                </div>
                            </div>
                        </div> 
                         <div class="col-sm-1 col-md-1 input-inside1">
                             <label class="form-label">ADULTS</label>
                             <select name="adults"  id="adults" data-placeholder="ADULTS" class="adults form-select">
                                    <option value="1" <?php echo (!empty($fightdata) && $fightdata['AdultCount'] == 1) ? "selected" : ""; ?>>1</option>
                                    <option value="2" <?php echo (!empty($fightdata) && $fightdata['AdultCount'] == 2) ? "selected" : ""; ?>>2</option>
                                    <option value="3" <?php echo (!empty($fightdata) && $fightdata['AdultCount'] == 3) ? "selected" : ""; ?>>3</option>
                                    <option value="4" <?php echo (!empty($fightdata) && $fightdata['AdultCount'] == 4) ? "selected" : ""; ?>>4</option>
                                    <option value="5" <?php echo (!empty($fightdata) && $fightdata['AdultCount'] == 5) ? "selected" : ""; ?>>5</option>
                                    <option value="6" <?php echo (!empty($fightdata) && $fightdata['AdultCount'] == 6) ? "selected" : ""; ?>>6</option>
                                    <option value="7" <?php echo (!empty($fightdata) && $fightdata['AdultCount'] == 7) ? "selected" : ""; ?>>7</option>
                               </select> 
                        </div>
                        <div class="col-sm-1 col-md-1 input-inside1">
                             <label class="form-label">CHILDREN</label>
                             <select name="children"  id="children" data-placeholder="CHILDREN" class="children form-select">
                                    <option>0</option>
                                   <option value="1" <?php echo (!empty($fightdata) && $fightdata['ChildCount'] == 1) ? "selected" : ""; ?>>1</option>
                                    <option value="2" <?php echo (!empty($fightdata) && $fightdata['ChildCount'] == 2) ? "selected" : ""; ?>>2</option>
                                    <option value="3" <?php echo (!empty($fightdata) && $fightdata['ChildCount'] == 3) ? "selected" : ""; ?>>3</option>
                                    <option value="4" <?php echo (!empty($fightdata) && $fightdata['ChildCount'] == 4) ? "selected" : ""; ?>>4</option>
                                    <option value="5" <?php echo (!empty($fightdata) && $fightdata['ChildCount'] == 5) ? "selected" : ""; ?>>5</option>
                               </select> 
                        </div>
                        <div class="col-sm-1 col-md-1 input-inside1">
                             <label class="form-label">INFANTS</label>
                             <select name="infants"  id="infants" data-placeholder="INFANTS" class="infants form-select">
                                    <option>0</option>
                                    <option value="1" <?php echo (!empty($fightdata) && $fightdata['InfantCount'] == 1) ? "selected" : ""; ?>>1</option>
                                    <option value="2" <?php echo (!empty($fightdata) && $fightdata['InfantCount'] == 2) ? "selected" : ""; ?>>2</option>
                                    <option value="3" <?php echo (!empty($fightdata) && $fightdata['InfantCount'] == 3) ? "selected" : ""; ?>>3</option>
                                    <option value="4" <?php echo (!empty($fightdata) && $fightdata['InfantCount'] == 4) ? "selected" : ""; ?>>4</option>
                                    <option value="5" <?php echo (!empty($fightdata) && $fightdata['InfantCount'] == 5) ? "selected" : ""; ?>>5</option>
                               </select> 
                        </div>
                        <div class="col-sm-1 col-md-2 input-inside1">
                             <label class="form-label">CHOOSE TRAVEL CLASS</label>
                             <select name="cabinclass"  id="travelclass" data-placeholder="CHOOSE TRAVEL CLASS" class="travelclass form-select">
                                    <option value="Economy" <?php echo (!empty($fightdata) && $fightdata['CabinClass'] == "Economy") ? "selected" : ""; ?>>Economy</option>
                                    <option value="PremiumEconomy" <?php echo (!empty($fightdata) && $fightdata['CabinClass'] == "PremiumEconomy") ? "selected" : ""; ?>>Premium Economy</option>
                                    <option value="Business" <?php echo (!empty($fightdata) && $fightdata['CabinClass'] == "Business") ? "selected" : ""; ?>>Business</option>
                               </select> 
                        </div>
                        <div class="col-sm-1 col-md-8 input-inside">
                             <label class="form-label">Select A Fare Type</label>
                             <div class="row">
                             <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-label" for="regular_fares"><input type="radio" name="fare_type" id="regular_fares" value="round" checked="checked">Regular Fares</label>
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-label" for="armed_forces_fares"><input type="radio" name="fare_type" id="armed_forces_fares" value="round">Armed Forces Fares</label>
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-label" for="student_fares"><input type="radio" name="fare_type" id="student_fares" value="round">Student Fares</label>
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-label" for="senior_citizen_fares"><input type="radio" name="fare_type" id="senior_citizen_fares" value="round">Senior Citizen Fares</label>
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-label" for="doctors_nurses_fares"><input type="radio" name="fare_type" id="doctors_nurses_fares" value="round">Doctors & Nurses Fares</label>
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="form-group double_seat_fares">
                                    <label class="form-label" for="double_Seat_Fares"><input type="radio" name="fare_type" id="double_Seat_Fares" value="round">Double Seat Fares</label>
                                </div>
                            </div>
                        </div>
                        </div>
                  <div class="col-sm-2 col-md-2 form-btns">
                    <button type="submit" class="box-btn fill_primary sub_btn" style="
                    margin-top: 34px;">Submit</button>
                    <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 34px;">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Loading...
                  </button>
                  <button type="button" class="box-btn fil_gray reset_btn" style="margin-top: 34px;">Reset</button>
              </div>
</div>

</form>
</div>
</div>
    <center><div class="loader"></div></center>
<div class="card flightbody">
<div class="card-body">
   <div class="" id="flight_tbl_rec">
   </div>
 </div> 
 </div>  
</div>
</div>

<script>
    $(document).ready(function() {
        // Call refresh page function after 5000 milliseconds (or 5 seconds).

        setInterval('refreshPage()', 420000);
        
        var selectc = $('#origin');

    selectc.on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
            //selectc.data('select2').$container.addClass('select2-container--open');
        })
    var selectd = $('.destination');

    selectd.on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
            //selectd.data('select2').$container.addClass('select2-container--open');
        })
    });

    function refreshPage() { 
       
        $('.sub_btn').trigger('click');
    }
</script>
<script>
    var seorigin = "<?=$fightdata['Origin']?>";
    var sdestination = "<?=$fightdata['Destination']?>";
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
               // data = $.parseJSON(res);  
                $(".loading").hide();   
      if(data){
         $("#origin, #destination").empty();
         $("#origin, #destination").append('<option value="">Select Airport</option>');
         $.each(data,function(key,value){
            $("#origin, #destination").append('<option data-country="'+value.country+'" value="'+value.code+'">'+value.airport_name+' ('+value.city+')'+' ('+value.code+')'+' ('+value.country+')'+'</option>');
         });
         $('.getflights .origin, .getflights .destination').select2({
                 dropdownParent: $('.getflights'),
                 width: "100%"
              });
         var selectc = $('#origin');

    selectc.on('select2:open', () => {
            //document.querySelector('.select2-search__field').focus();
            selectc.data('select2').$container.addClass('select2-container--open');
        });
     var selectd = $('#destination');

    selectd.on('select2:open', () => {
            //document.querySelector('.select2-search__field').focus();
            selectd.data('select2').$container.addClass('select2-container--open');
        })
    

      }else{
         $("#origin, #destination").empty();
      }
   }
});
}

    $(document).ready(function() {
        $('.flightbody').hide();
        get_airpost_list();
        $(".loader").hide();
       /* $('#getflights').validate({
        rules : {
            "name":{
                required: true,
            },
            "follow_up_date" : {
                required: true,
            }
        },
        messages :{
            "name":{
                required: "please enter name",
            },
            "follow_up_date" : {
                required: "please select date",
            }
        },
        highlight: function (element)
        {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element)
        {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element)
        {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });*/

        $('#origin').on('change', function (e) {
            var origin = $('option:selected',this).data("country");
            
            $('#formcountry').val(origin);
            
        });

         $('#destination').on('change', function (e) {
            var destination = $('option:selected',this).data("country");
            $('#tocountry').val(destination);
            
        });

        $(document).on('click',".showdetail",function(event){
            $(this).parent().AddClass('.moredetail');
         });    

        $(document).on('click',".sub_btn",function(event){
        
            event.preventDefault();
           /* var origin = $('#origin').val();
            var destination = $('#destination').val();
            if(origin == destination){

                return;
            }*/
            console.log(destination);
            
            if($('#getflights').valid()){
                $('#flight_tbl_rec').html('');
                $.ajax({
                    type: 'POST',
                    url: base_url + 'franchise/bookflight/getflightdata',
                    data: $('#getflights').serializeArray(),
                    beforeSend: function(){
                       $(".loader").show();
                    },
                    success: function(data) {
                            $(".loader").hide();
                            
                            $('.flightbody').show();
                           $('#flight_tbl_rec').html("");
                           $('#flight_tbl_rec').html(data);
                           $('#responsive_flight_tbl').DataTable();
                        
                    }
                });
            }
        });


        $('.fromto').hide();

        $('.tosele').datepicker({
            //showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: 'yy-mm-d',
            minDate: 0
        });
        
     $('input[name="select_interview_date"]').daterangepicker({
        opens: 'left',
        });
  });   

    $('input[type=radio][name=trip]').change(function() {
        if (this.value == 'OneWay') {
            $('.fromto').hide();
            $('.to').show();
        }
        else if (this.value == 'return') {
            $('.fromto').show();
            $('.to').hide();
           
        }
    });

    $('input[type=radio][name=trip]').change(function() {
        if (this.value == 'OneWay') {
            $('.double_seat_fares').removeClass('disabledbutton');
        }
        else if (this.value == 'return') {
            $('.double_seat_fares').addClass('disabledbutton');
            $('#double_Seat_Fares').prop('checked', false);
            $('#regular_fares').prop('checked', true);
        }
    });
</script>    

