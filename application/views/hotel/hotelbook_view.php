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
</style>
<div class="row">
 <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form class="gethotels" name="gethotels" id="gethotels">
               
                <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Select Country</label>
                                <select name="origin"  id="origin" data-placeholder="From" class="origin form-control select2-show-search form-select">
                                    <?php foreach ($get_all_country as $key => $value) { ?>
                                       <option value="<?= $value->id ?>" ><?= $value->name; ?></option>
                                   <?php } ?>

                               </select>  
                               <input type="hidden" name="formcountry"  id="formcountry" value="" />
                            </div>
                        </div>
                         <div class="col-sm-3 col-md-3 to">
                            <label class="form-label">Checkin Date</label>
                            <div class="wd-200 mg-b-30">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                    </div><input class="form-control tosele" id="tosele" name="departureDate" placeholder="MM/DD/YYYY" type="text">
                                </div>
                            </div>
                        </div> 
                         <div class="col-sm-1 col-md-1">
                             <label class="form-label">No Of Nights</label>
                             <select name="NoOfNights"  id="NoOfNights" data-placeholder="ADULTS" class="adults form-control select2-show-search form-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                               </select> 
                        </div>
                        <div class="col-sm-1 col-md-1">
                             <label class="form-label">No Of Rooms</label>
                             <select name="NoOfRooms"  id="NoOfRooms" data-placeholder="ADULTS" class="adults form-control select2-show-search form-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                               </select> 
                        </div>
                        
                        
                  <div class="col-sm-2 col-md-2">
                    <button type="submit" class="btn btn-success sub_btn" style="
                    margin-top: 34px;">Submit</button>
                    <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;margin-top: 34px;">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Loading...
                  </button>
                  <button type="button" class="btn btn-primary reset_btn" style="
                  margin-top: 34px;">Reset</button>
              </div>
</div>

</form>
</div>
</div>
<div class="card">
<div class="card-body">
    <center><div class="loader"></div></center>
   <div class="" id="flight_tbl_rec">
   </div>
 </div> 
 </div>  
</div>
</div>


<script>
    $(document).ready(function() {

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

       
           

        $(document).on('click',".sub_btn",function(event){
        
            event.preventDefault();
           /* var origin = $('#origin').val();
            var destination = $('#destination').val();
            if(origin == destination){

                return;
            }*/
            
            
            if($('#gethotels').valid()){
                $.ajax({
                    type: 'POST',
                    url: base_url + 'hotelbooking/gethoteldata',
                    data: $('#getflights').serializeArray(),
                    beforeSend: function(){
                       $(".loader").show();
                    },
                    success: function(data) {
                            $(".loader").hide();
                           $('#flight_tbl_rec').html("");
                           $('#flight_tbl_rec').html(data);
                           $('#responsive_flight_tbl').DataTable();
                        
                    }
                });
            }
        });


        $('.fromto').hide();

        $('.tosele').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: 'yy-mm-d',
            minDate: 0
        });
        
     $('input[name="select_interview_date"]').daterangepicker({
        opens: 'left',
        });
  });   

    $('input[type=radio][name=trip]').change(function() {
        if (this.value == 'oneway') {
            $('.fromto').hide();
            $('.to').show();
        }
        else if (this.value == 'round') {
            $('.fromto').show();
            $('.to').hide();
           
        }
    });

    $('input[type=radio][name=trip]').change(function() {
        if (this.value == 'oneway') {
            $('.double_seat_fares').removeClass('disabledbutton');
        }
        else if (this.value == 'round') {
            $('.double_seat_fares').addClass('disabledbutton');
            $('#double_Seat_Fares').prop('checked', false);
            $('#regular_fares').prop('checked', true);
        }
    });
</script>    

