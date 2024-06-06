<style>
 .error{
  color: red;
}
</style>    


<div class="card">
 

 <div class="card-body">
           <div class="table-responsive">
              <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                 <thead>
                    <tr>
                       
              <th width="wd-15p border-bottom-0"> Name </th>
              <th width="wd-15p border-bottom-0"> Mobile </th>
              <th width="wd-15p border-bottom-0"> Enquiry Type </th>
              <th width="wd-15p border-bottom-0"> Follow Up Date </th>
                    </tr>
                 </thead>
                <tbody>
           <?php
           $index = 1;
           foreach($_view as $view){ ?>
              <tr>
               <td><?= $view->name ?></td>
               <td><?= $view->mobile_no ?></td>
              
                <td><?= isset($view->expriry_type_name) && $view->expriry_type_name != "" ? $view->expriry_type_name :"-"; ?></td>
               <td><?= $view->follow_up_date != "0000-00-00" ? date('d-M-Y',strtotime($view->follow_up_date)) : ""; ?></td>
              
       </tr>

    <?php  } ?>
 </tbody>
            </table>
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
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
crossorigin="anonymous"
></script>  

