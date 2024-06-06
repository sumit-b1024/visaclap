// html += "<div class='col-md-4'><div class='card' style='box-shadow: -1px -1px 13px !important;'><div class='card-header'><div class='card-title'><center>"+val.visa_type_name+"<br><span>"+val.country_name+"</span></center></div></div><div class='card-body'><center><h2>"+val.price+"</h2><strong>Valid for "+val.visa_validity+"</strong><hr><strong>"+val.length_of_stay+ " Of Stay</strong><hr><strong>Time to get visa "+val.time_to_get_visa+" Days</strong><hr><strong>Visa Fee 0$</strong><hr><strong>Our Service Fees "+val.service_charge+"</strong><hr><strong>Our Service Fees "+val.description+"</strong></div></div></div>";


	<style>
 .error{
  color: red;
}
</style>
<div class="row row-sm">
 <div class="col-lg-12">
  <div class="row row-sm">
   <div class="col-lg-12">
    <div class="card">
     <div class="card-body">
      <form class="visa_page_report">
       <h4>Select Filter</h4>
       <div class="row">

        <div class="col-sm-3 col-md-3">
         <div class="form-group">
          <label class="form-label">Select Form Country</label>
          <select class="form-control select2-show-search form-select" id="f_country" name="f_country" data-placeholder="Select From Country">
           <option value="">Select Form Country</option>
       </select>
   </div>
</div>
<div class="col-sm-3 col-md-3">
 <div class="form-group">
  <label class="form-label">Select To Country</label>
  <select class="form-control select2-show-search form-select" id="t_country" name="t_country" data-placeholder="Select To Country">
   <option value="">Select To Country</option>
</select>
</div>
</div>

<div class="col-sm-3 col-md-3">
 <button type="button" class="btn btn-success sub_btn" style="
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

<div class="card" >
 <div class="card-header"><b>View Visa</b>
 </div>
 <div class="card-body" id="assd">

 </div>
</div>

</div>
</div>
<script type="text/javascript">
   function get_all_country(){
    $.ajax({
     url : "http://localhost/visa_api/api/visacountry",
     type:"GET",
     dataType:"json",
     success:function(data){
      $.each(data.message, function (key, val) {
       $("#f_country").append('<option value="'+val.id+'">'+val.name+'</option>');
       $("#t_country").append('<option value="'+val.id+'">'+val.name+'</option>');
   });
  }
});
}

$(document).ready(function(){

    $(document).on('click', '.reset_btn',function(e){
     $('#f_country').val(null).trigger("change");
     $('#t_country').val(null).trigger("change");
 });
    get_all_country();

    $('.visa_page_report').validate({
     rules :{
      "f_country" : {
       required : true
   },"t_country" : {
       required : true
   },
},
messages :{
  "f_country" : {
   required : "please select from country"
},"t_country" : {
   required : "please select to country"
},
}
});

    $(document).on('click', '.sub_btn',function(e){
     var from_country = $('#f_country').val();
     var to_country = $('#t_country').val();

     if($('.visa_page_report').valid()){

      $.ajax({
       url : "http://localhost/visa_api/api/visacountry",
       type:"POST",
       data:{from_country,to_country},
       dataType : 'json',
       success:function(data){
        var html = "";
        if(data.message.length >= 1){
         html += "<div class='row'>";
         $.each(data.message, function (key, val) {
            var type_of_visa = val.type_of_visa.split(",");
            var price = val.price.split(",");
            var visa_type_id = val.visa_type_id.split(",");
            var visa_validity = val.visa_validity.split(",");
            var length_of_stay = val.length_of_stay.split(",");
            var time_to_get_visa = val.time_to_get_visa.split(",");
            var entry_type = val.entry_type.split(",");
            var description = val.description.split(",");
            var service_charge = val.service_charge.split(",");
            // var type_of_visa = val.type_of_visa.split(",");
            // html += "<div class='col-md-4'>";
            $.each(type_of_visa,function(i){
                html += "<div class='col-md-4'><div class='card' style='box-shadow: -1px -1px 13px !important;'><div class='card-header'><div class='card-title'><center>"+val.visa_type_name+"<br><span>"+val.country_name+"</span></center></div></div><div class='card-body'><center><h2>"+val.price+"</h2><strong>Valid for "+val.visa_validity+"</strong><hr><strong>"+val.length_of_stay+ " Of Stay</strong><hr><strong>Time to get visa "+val.time_to_get_visa+" Days</strong><hr><strong>Visa Fee 0$</strong><hr><strong>Our Service Fees "+val.service_charge+"</strong><hr><strong>Our Service Fees "+val.description+"</strong></div></div></div>";

            });
            // html += "<div>";


          // html += "<div class='col-md-4'><div class='card' style='box-shadow: -1px -1px 13px !important;'><div class='card-header'><div class='card-title'><center>"+val.visa_type_name+"<br><span>"+val.country_name+"</span></center></div></div><div class='card-body'><center><h2>"+val.price+"</h2><strong>Valid for "+val.visa_validity+"</strong><hr><strong>"+val.length_of_stay+ " Of Stay</strong><hr><strong>Time to get visa "+val.time_to_get_visa+" Days</strong><hr><strong>Visa Fee 0$</strong><hr><strong>Our Service Fees "+val.service_charge+"</strong><hr><strong>Our Service Fees "+val.description+"</strong></div></div></div>";
      });
         html += "</div>";
     }else{
         html += "<span>No Data Found.</span>";
     }
     $('#assd').html(html);
 }
});
  }

});
});
</script>

