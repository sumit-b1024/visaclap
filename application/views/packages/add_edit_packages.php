<style type="text/css">
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}.error{color: red;}
</style>
<script>
    var base_url = "<?= base_url(); ?>";
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <a href="<?= base_url('api/cred/logout_user'); ?>">Logout</a>
</div>
</nav>
<div class="container-fluid px-1 py-5 mx-auto">
    <h3><center>Create New Packages</center></h3>
    <div class="row">
        <div class="col-6 text-center">
            <div class="card">
                <h5 class="text-center mb-4">Add Packages</h5>

                <div class="alert alert-success alert_box" role="alert" style="display:none;">

                </div>

                <form class="form-card add_edit_form_submit">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Package Name<span class="text-danger"> *</span></label> <input type="text" id="package_name" name="package_name" placeholder="Enter package name"> </div>


                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label">Per Minute Request<span class="text-danger"> *</span></label> <input type="number" id="p_per_minute" name="p_per_minute" placeholder="Enter minute request allow" min="1"> </div>
                    </div>
                    <input type="hidden" name="record_id" id="record_id">
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-12"> <button type="submit" class="btn-block btn-primary">Submit</button> </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6 text-center">
            <div class="card">
                <h5 class="text-center mb-4">View Packages</h5>

                <div class="view_tbl"></div>
            </div>
        </div>
    </div>
</div>


<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script type="text/javascript">

    $('#example').DataTable();
    function get_all_packages(){
       $.post( "<?php echo base_url('api/packages/get_all_packages'); ?>", function( data ){
        $('.view_tbl').html("");
        $('.view_tbl').html(data);
        $('#example').DataTable();
    });
   }
   $(document).ready(function(){
    get_all_packages();

    $('.add_edit_form_submit').validate({
        rules : {
            "package_name" : {
                required: true,
            },
            "p_per_minute" : {
                required: true,
            }

        },
        messages : {
         "package_name" : {
            required: "enter package name",
        },
        "p_per_minute" : {
            required: "enter package request per minute",
        }

    },
});
    $(document).on('click','.delete_brn',function(e){

        var r_id = $(this).val(); 

        swal({
          title: "Are you sure?",
          text: "But you will still be able to retrieve this file.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, archive it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
      },
      function(isConfirm){
          if (isConfirm) {
            $.ajax({
                url : base_url + "api/packages/remove_packages",
                type : "POST",
                data : {r_id},
                dataType : "json",
                success : function(data){
                    if(data.status == "success"){
                        swal("Success", "Package removed successfully", "error");
                        get_all_packages(); 
                    }else{
                        swal("Cancelled", data.msg, "error");
                    }
                }
            });

        } else {
            swal("Cancelled", "Your Data Is Safe", "error");
        }
    });

    });
    $(document).on('click','.edit_btn',function(e){
        var p_name = $(this).attr('p_name');
        var request_per_minute = $(this).attr('request_per_minute');
        var r_id = $(this).attr('r_id');

        $('#package_name').val(p_name);
        $('#p_per_minute').val(request_per_minute);
        $('#record_id').val(r_id);
        
    });
    $(document).on('submit','.add_edit_form_submit',function(e){
        e.preventDefault();
        if($(this).valid()){
            $.ajax({
                url : base_url + "api/packages/store_packages",
                type : "POST",
                data : $(this).serializeArray(),
                dataType : "json",
                success : function(data){
                    if(data.status == "success"){
                        $('.add_edit_form_submit')[0].reset();
                        $('#record_id').val("");
                        $('.alert_box').removeAttr('style');
                        $(".alert_box").text(data.msg);
                        get_all_packages();
                    }else{
                        $('.alert_box').removeAttr('style');
                        $('.alert_box').text(data.msg);

                    }
                }
            });
        }

    });
});
</script>