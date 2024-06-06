 <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>


  <!-- Plugin JS -->
  <script src="<?php echo base_url('assets/js/perfect-scrollbar.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/flatpickr.js'); ?>"></script>

  <!-- Custom JS -->
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/multi-select-tag.js'); ?>"></script>


<!-- CUSTOM JS -->
<!-- <script src="js/custom.js"></script>
<script src="js/custom1.js"></script>

<script src='custom/js/custom.js'></script>
<script src='custom/js/common.js'></script> -->

<!-- <script src='custom/js/custom_for_all.js'></script> -->



<!-- <script src="<?php echo base_url('assets/plugins/sweet-alert/sweetalert.min.js'); ?>"></script> -->

<script src="<?php echo base_url('assets/js/sweetalert.js'); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>



<?php
if (isset($extra_js) && is_array($extra_js) && count($extra_js) > 0)
{
      foreach ($extra_js as $js) :
            echo '<script src="'.base_url().'assets/custom/js/' . $js . '.js?'.time().'" ></script>';
      endforeach;

}
?>

<script type="text/javascript">
     
if (typeof $.fn.DataTable !== 'undefined' && $.fn.DataTable.isDataTable('table')) {
  $.extend(true, $.fn.dataTable.defaults, {
    "language": {
      "paginate": {
        "previous": "< Prev",
        "next": "Next >"
      }
    }
  });
}

/*$(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    })*/

</script>
<!-- <script src="<?php echo base_url('/assets/custom/js/custom_select2.js'); ?>"></script> -->
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<!-- <script src="<?php echo base_url('/assets/custom/js/select2.js'); ?>"></script> -->
<script src="<?php echo base_url('/assets/custom/js/select2.full.min.js'); ?>"></script>



