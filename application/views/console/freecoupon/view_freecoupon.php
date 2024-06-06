<style type="text/css">
  .help-block{
    color: #e23e3d;
  }
  span.select2{width: 100% !important;}
</style>
<div class="row row-sm">
 <div class="col-lg-12">
  <div class="card">
   <div class="card-body">
    <form class="freecoupon_form" id="freecoupon_form"  method="post">
     <div class="row">
      <div class="col-sm-12 col-md-2 mb-1">
            <div class="form-group input-group input-inside">
                <label class="form-label">Country</label>
                <select class="form-control i_country form-select"  name="country"  data-placeholder="Select Country">
                    <option value=""></option>
                </select>
            </div>
        </div> 
     <div class="col-sm-12 col-md-2 mb-1">
       <div class="form-group input-inside input-group">
        <label class="form-label">Select Firm</label>
        <select class="form-control firm_id  form-select" name="firm_id" >
         <option value="">Select Firm</option>
        </select>
       </div>
      </div>

       <div class="col-sm-3 col-md-2 mb-2">
       <div class="form-group  input-inside">
        <label class="form-label">Amount</label>
         <input type="text" class="form-control" name="amount" /> 
       </div>
      </div>
      <div class="col-sm-12 col-md-2 mb-1">
       <div class="form-group input-inside1">
        <label class="form-label">Type</label>
        <select class="form-select form-select" name="type" >
            <option value="">Type</option>
         <option value="<?=Service_type::FREE_COUPON?>">Free Coupon</option>
         <option value="<?=Service_type::HAND_CASH?>">Hand Cash</option>
        </select>
       </div>
      </div>
      <div class="col-sm-3 col-md-3 form-btns mt-4">
       <button type="submit" class="box-btn fill_primary sub_btn" id="submit_btn" style="">Submit</button>
       <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
       </button>
       <button type="button" class="box-btn fil_gray reset_btn">Reset</button>
      </div>
     </div>
    </form>
   </div>
  </div>
<br/>
  <div class="card">
   <div class="card-body">
        <h4>Select Filter</h4>
    <form class="filter_freecoupon_form" id="filter_freecoupon_form">
     <div class="row">
      <div class="col-sm-12 col-md-3 mb-1">
            <div class="form-group  input-inside">
                <label class="form-label">Country</label>
                <select class="form-control filter_i_country form-select"  name="filter_country"  data-placeholder="Select Country">
                    <option value=""></option>
                </select>
            </div>
        </div> 
     <div class="col-sm-12 col-md-3 mb-1">
       <div class="form-group input-inside input-inside">
        <label class="form-label">Select Firm</label>
        <select class="form-control filter_firm_id  form-select " name="firm_id" >
         <option value="">Select Firm</option>
        </select>
       </div>
      </div>
      <div class="col-sm-12 col-md-2 mb-1">
       <div class="form-group input-inside1">
        <label class="form-label">Type</label>
        <select class="form-select form-select" name="type" >
            <option value="">Type</option>
         <option value="<?=Service_type::FREE_COUPON?>">Free Coupon</option>
         <option value="<?=Service_type::HAND_CASH?>">Hand Cash</option>
        </select>
       </div>
      </div>
      
      <div class="col-sm-3 col-md-3 form-btns mt-4">
       
       <button  type="submit" class="box-btn fill_primary upload_file">Filter</button>
       <button class="btn btn-primary spiner_btn"  type="button" disabled style="display: none;">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
       </button>
       <button type="button" class="box-btn fil_gray reset_filter_btn">Reset</button>
      </div>
     </div>
    </form>
   </div>
  </div>

  <br/>
       <div class="table_wrapper">
            <div class="table-responsive" id="freecoupon_tbl">

            </div>
    
        </div>
    <!-- Model For Show Follow Up -->
<div class="modal fade bd-example-modal-lg" id="freecoupon_modal">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title"><b>History Free Coupon</b></h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>

    <div class="modal-body">
        <div class="table_wrapper">
            <div class="table-responsive" id="user_freecoupon_tbl">

            </div>
    
        </div>    
    </div>

 <div class="modal-footer">
    
    <button type="button" class="box-btn fil_gray btn_cancel" data-bs-dismiss="modal">Close</button>
</div>

</div>
</div>
</div>
  
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script>
    function get_freecoupon_report_data(){

    $('.sub_filter_btn').attr('disabled', 'disabled');
    $('.filter_freecoupon_form .spiner_btn').removeAttr('style', 'display: none');
    $('.filter_freecoupon_form .spiner_btn').attr('style', 'margin-top: 0px');
    $('.sub_filter_btn').attr('style', 'display: none');

    $.ajax({
        url : base_url+'/freecoupon/get_freecoupon_report',
        type : "POST",
        data : $('.filter_freecoupon_form').serializeArray(),
        success :function(data){
            $('.sub_filter_btn').removeAttr('disabled', 'disabled');
            $('.filter_freecoupon_form .spiner_btn').attr('style', 'display: none');
            $('.sub_filter_btn').removeAttr('style', 'display: none');
            $('.sub_filter_btn').attr('style', 'margin-top: 0px');
            $('#freecoupon_tbl').html("");
            $('#freecoupon_tbl').html(data);
                //$('#responsive-datatable').DataTable();
                $('#view_freecoupan_tbl').DataTable({});
            }
        });
}

    function get_all_country(){
    $.ajax({
     //url : api_url+"api/visacountry",
     url: base_url + 'settings/getvisacountry',
     type:"GET",
     dataType:"json",
     success:function(data){
      $.each(data.message, function (key, val) {
       
       $(".i_country").append('<option value="'+val.id+'" data-id="'+val.id+'">'+val.name+'</option>');
       $(".filter_i_country").append('<option value="'+val.id+'" data-id="'+val.id+'">'+val.name+'</option>');
       $('.freecoupon_form .i_country').select2({
                 dropdownParent: $('.freecoupon_form'),
                 width: "100%"
              });
        $('.filter_freecoupon_form .filter_i_country').select2({
                 dropdownParent: $('.filter_freecoupon_form'),
                 width: "100%"
              });
   });
  }
});
}


$(document).on('submit','.filter_freecoupon_form',function(e){
      e.preventDefault();
   get_freecoupon_report_data();

});

$(document).on('click', '.get_history_freecoupon',function(e){
e.preventDefault();
var userid = $(this).attr('user_id');
var type = $(this).attr('service_type');
$.ajax({
    url : base_url+'freecoupon/get_user_freecoupon_report',
    type : "POST",
    data : {userid,type},
     
    success :function(data){
         $('#user_freecoupon_tbl').html("");
         $('#user_freecoupon_tbl').html(data);
         $('#user_view_freecoupan_tbl').DataTable({});
    }
});

    $('#freecoupon_modal').modal('toggle');
});    



$(document).on('click', '.reset_filter_btn',function(e){
    $('.filter_freecoupon_form')[0].reset();
    $('.filter_i_country').val(null).trigger("change");
    $('.filter_firm_id').val(null).trigger("change");
    
   
    get_freecoupon_report_data();
});

   $(document).ready(function() {
    


get_freecoupon_report_data();


    var continue_to = base_url + 'freecoupon';
    $('.freecoupon_form .firm_id').select2();
    $('.filter_freecoupon_form .filter_firm_id').select2();

    $('.i_country').on('change',function(){
        console.log('111');
        var destination = $(this).val();  
        // if(destination){
            $.ajax({
                type:"POST",
                url: base_url + "settings/getcountrybyfirm",
                data : {destination : destination},
                dataType : 'JSON',
                success:function(result){
                     
                    if(result.status != "false"){
                    if(result){
                        $(".firm_id").empty();
                        $(".firm_id").append('<option value="">Select Firm</option>');
                        $.each(result.data,function(key,value){

                            $(".firm_id").append('<option value="'+value.user_id+'">'+(value.firm_name ? value.firm_name : "--")+'</option>');
                        });
                        $('.freecoupon_form .firm_id').select2({
                          dropdownParent: $('.freecoupon_form'),
                          width: "100%"
                       });
                    }else{
                        $(".firm_id").empty();
                    }
                    }else{
                        $(".firm_id").empty();
                    }
                }
            });
        // }else{
        //  $("#city").empty();
        // }
    });

     $('.filter_i_country').on('change',function(){
        console.log('111');
        var destination = $(this).val();  
        // if(destination){
            $.ajax({
                type:"POST",
                url: base_url + "settings/getcountrybyfirm",
                data : {destination : destination},
                dataType : 'JSON',
                success:function(result){
                     
                    if(result.status != "false"){
                    if(result){
                        $(".filter_firm_id").empty();
                        $(".filter_firm_id").append('<option value="">Select Firm</option>');
                        $.each(result.data,function(key,value){

                            $(".filter_firm_id").append('<option value="'+value.firm_name+'">'+(value.firm_name ? value.firm_name : "--")+'</option>');
                        });
                        $('.filter_freecoupon_form .filter_firm_id').select2({
                          dropdownParent: $('.filter_freecoupon_form'),
                          width: "100%"
                       });
                    }else{
                        $(".filter_firm_id").empty();
                    }
                    }else{
                        $(".filter_firm_id").empty();
                    }
                }
            });
        // }else{
        //  $("#city").empty();
        // }
    });


     get_all_country();
     var selectc = $('.i_country');

selectc.on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
        //selectc.data('select2').$container.addClass('select2-container--open');
    })

 var filter_freecoupon_form = $('.filter_freecoupon_form');

filter_freecoupon_form.on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
        //selectc.data('select2').$container.addClass('select2-container--open');
    })



var firm_id = $('.firm_id');

firm_id.on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
        //selectc.data('select2').$container.addClass('select2-container--open');
    })
    $('#freecoupon_form').validate({
    rules :{
      "country":{
        required : true
      },"firm_id":{
        required : true
      },"amount":{
        required : true
      },"type":{
        required : true
      },
    },
    messages :{
      "country":{
        required : "Select country"
      }, "firm_id":{
        required : "Select Firm"
      },"amount":{
        required : "Enter Amount"
      },"type":{
        required : "Select Type"
      }

    },
    highlight: function (element)
            {
                $(element).closest('.form-control').addClass('is-invalid');
            },
            unhighlight: function (element)
            {
                $(element).closest('.form-control').removeClass('is-invalid');
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
  });

    

     $('#submit_btn').click(function(e) {
        e.preventDefault();
        var isValid = 1;

         if (isValid) {
                submit_form();
            }else {
            event.preventDefault();
        }
    });

     function submit_form() {
        if($('#freecoupon_form').valid()){
        $('#submit_btn').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: base_url + 'freecoupon/ajax_add_freecoupon',
            data: $('.freecoupon_form').serializeArray(),
            dataType: 'json',
            success: function(data) {
                $('#submit_btn').removeAttr('disabled');
                setTimeout(function() {
                    if(data.status == 'success') {
                        Swal.fire("Success!", data.message,"success");
                    } else {
                        Swal.fire("Warning!", "Error! Unable to complete process.","warning");
                    }
                }, 500);
            
                setTimeout(function() {
                    window.location = continue_to;
                },  2000);
            }, error: function(data) {
                $('#submit_btn').removeAttr('disabled');
                Swal.fire("Warning!","Error! Unable to complete process.","warning");
            }
        });
    }
    }

    $(document).on('click', '.reset_btn',function(e){
     $('.freecoupon_form')[0].reset();
     $('.firm_id').val(null).trigger("change");
     $('.i_country').val(null).trigger("change");
    });
   });
  </script>