<style>
.image-radio {
    cursor: pointer;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    border: 4px solid transparent;
    margin-bottom: 0;
    outline: 0;
}
.image-radio input[type="radio"] {
    display: none;
}
.image-radio-checked {
    border-color: #4783B0;
}
.image-radio .glyphicon {
  position: absolute;
  color: #4A79A3;
  background-color: #fff;
  padding: 10px;
  top: 0;
  right: 0;
}
.image-radio-checked .glyphicon {
  display: block !important;
 margin: 4px;
}
</style>    
<div class="row row-sm">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
 <div class="alert alert-success alert_box" role="alert" style="display:none;">

                </div>

            <form id="profit_form" class="form-horizontal profit_form" method="POST">
             
             
             <div class="row">
              
               <div class="col-md-4">
                  <div class="input-inside">
                    <label class="form-label">Domestic Flight Profit(%)</label>
                    <input type="text" name="domestic_flight_profit" id="domestic_flight_profit" placeholder="Domestic Flight Profit" maxlength="5" class="form-control" value="<?= isset($view) && isset($view->domestic_flight_profit) ? $view->domestic_flight_profit : set_value('domestic_flight_profit'); ?>" onkeypress="allowNumbersOnly(event)">
                   </div> 
              </div>
              <div class="col-md-4">
                  <div class="input-inside">
                    <label class="form-label">International Flight Profit(%)</label>
                    <input type="text" name="international_flight_profit" id="international_flight_profit" placeholder="International Flight Profit" maxlength="5" class="form-control" value="<?= isset($view) && isset($view->international_flight_profit) ? $view->international_flight_profit : set_value('international_flight_profit'); ?>" onkeypress="allowNumbersOnly(event)">
                   </div> 
              </div>
              
           </div>
            <div class="row">
              
               <div class="col-md-4">
                  <div class="input-inside">
                    <label class="form-label">Domestic Flight Profit Fixed Price</label>
                    <input type="text" name="domestic_flight_profit_fix" id="domestic_flight_profit_fix" placeholder="Domestic Flight Profit" maxlength="5" class="form-control" value="<?= isset($view) && isset($view->domestic_flight_profit_fix) ? $view->domestic_flight_profit_fix : set_value('domestic_flight_profit_fix'); ?>" onkeypress="allowNumbersOnly(event)">
                   </div> 
              </div>
              <div class="col-md-4">
                  <div class="input-inside">
                    <label class="form-label">International Flight Profit Fixed Price</label>
                    <input type="text" name="international_flight_profit_fix" id="international_flight_profit_fix" placeholder="International Flight Profit" maxlength="5" class="form-control" value="<?= isset($view) && isset($view->international_flight_profit_fix) ? $view->international_flight_profit_fix : set_value('international_flight_profit_fix'); ?>" onkeypress="allowNumbersOnly(event)">
                   </div> 
              </div>
              
           </div>

             
           <input type="hidden" name="profit_id" value="<?= isset($view) && isset($view->id) ? $view->id : set_value('domain_name'); ?>">
           <div class="row">
           </div>
           <div class="row">
             <div class="col-sm-6 col-md-4"><br/>
               <button type="submit" id="submit_btn" class="box-btn fill_primary mb-0">
                 Submit
              </button>
              
           </div>
        </div>
     </form>
  </div>
</div>

</div>
</div>

<script>
  
  
 function allowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
        e.preventDefault();
    }
}



$(document).ready(function() {

  $(document).on('submit','.profit_form',function(e){   
   e.preventDefault();
     $.ajax({
                url : base_url + "bookingprofit/save_profit_data",
               type : "POST",
					data : $(this).serializeArray(),
					dataType : "json",
                success : function(data){
                    if(data.status == "success"){
                      location.reload();
                    }else{
                     Swal.fire('Warning!', data.message, 'warning')
                    }
                }
            });
});
});
</script>