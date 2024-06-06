<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><mp:Title/> | <?= BASE_FULLNAME ?></title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Animate Css -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <link rel="stylesheet" href="<?php echo base_url('assets/css/perfect-scrollbar.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/flatpickr.min.css'); ?>">

 <!-- <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" /> -->
  <!-- Main Css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />


<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/multi-select-tag.css'); ?>">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="<?php echo base_url('/assets/custom/css/custom_select2.css'); ?>" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo base_url('assets/css/newdesign.css'); ?>" />


<?php
if (isset($extra_css) && is_array($extra_css) && count($extra_css) > 0)
{
      foreach ($extra_css as $cs) :
            echo '<link rel="stylesheet" href="'.base_url().'assets/custom/css/' . $cs . '.css?'.time().'" >';
      endforeach;

}
?>

  <style>
    .tbl-action-wrap .single-action {
    /* background-color: bg-transparent;
    border: 0;
    padding: 2px; */
    margin-right: 2px;
}
tr .bg-transparent
{
  color:#6941C6;
}
#menu1 ul
{
  padding-left: 35px;
}
.step_modal
{
        width: 47% !important;
}
.step-modal-content .twin-grid {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: 1fr 25px 1fr;
    grid-template-columns: 52fr 1fr;
    grid-column-gap: 28px;
}
@media screen and (max-width: 800px)
{
  
.step_modal
{
        width: unset !important;
}
}
  </style>


<script>
  var base_url = '<?= ROOT_URL; ?>';
  <?php
  if(isset($current_url))
  {
    ?>
    var current_url = '<?= $current_url; ?>';
    <?php
  }
  ?>

  var error_report_mail = '<?= error_report_mail('link'); ?>';
  <?php
  if(isset($sess_expiration_time))
  {
    ?>
    var sess_expiration_time = '<?= $sess_expiration_time; ?>';
    <?php
  }
  ?>
</script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
