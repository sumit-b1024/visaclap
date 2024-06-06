<?php // xdebug($edit); ?>
<div class="row">
    <div class="col-md-12 col-xl-12">
    
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>

            <div class="card-body">

                <form class="form-horizontal" id="add-form" class="login100-form validate-form" method="post">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control name" name="name" placeholder="Enter activity name" value="<?= isset($edit) && isset($edit->name) ? $edit->name : set_value('name'); ?>" >
                                <span class="error-text error_name"></span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category <span class="text-red">*</span></label>
                                 <!-- <label class="form-label">Category <span class="text-red">*</span></label> -->
                                <select class="form-control select2-show-search form-select category" name="category" data-placeholder="Choose category">
                                    <option></option>
                                    <?php
                                    if(isset($_category) && !empty($_category))
                                    {
                                        foreach($_category as $value) : 
                                            $selected = (isset($edit) && isset($edit->category) && $edit->category == $value->category_id ? 'selected' : '');
                                            ?>
                                            <option value="<?= $value->category_id; ?>" <?= $selected; ?>>
                                                <?= toPropercase($value->name); ?>
                                            </option>
                                            <?php 
                                        endforeach;  
                                    }
                                    ?>
                                </select>
                                <span class="form-text text-danger error_category"></span>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Country <span class="text-red">*</span></label>
                                <select class="form-control select2-show-search form-select country" name="country" data-placeholder="Choose country">
                                    <option></option>
                                    <?php
                                    if(isset($_countries) && !empty($_countries))
                                    {
                                        foreach($_countries as $value) : 
                                            $selected = (isset($edit) && isset($edit->country) && $edit->country == $value->id ? 'selected' : '');
                                            ?>
                                            <option value="<?= $value->id; ?>" <?= $selected; ?>>
                                                <?= toPropercase($value->name); ?>
                                            </option>
                                            <?php 
                                        endforeach;  
                                    }
                                    ?>
                                </select>
                                <span class="form-text text-danger error_country"></span>
                                <div id="ajax_loader_country" class="text-info small d-none"><i class="fa fa-spinner fa-spin"></i> Checking...</div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">City <span class="text-red">*</span></label>
                                <select class="form-control select2-show-search form-select city" name="city" data-placeholder="Choose city">
                                    <option></option>
                                    <?php
                                    if(isset($_cities) && !empty($_cities))
                                    {
                                        foreach($_cities as $value) : 
                                            $selected = (isset($edit) && isset($edit->city) && $edit->city == $value->id ? 'selected' : '');
                                            ?>
                                            <option value="<?= $value->id; ?>" <?= $selected; ?>>
                                                <?= toPropercase($value->name); ?>
                                            </option>
                                            <?php 
                                        endforeach;  
                                    }
                                    ?>
                                </select>
                                <span class="form-text text-danger error_city"></span>
                            </div>
                        </div>
                       <!--  <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">City <span class="text-red">*</span></label>
                                <select class="form-control select2-show-search form-select city" name="city" data-placeholder="Choose city">
                                    <option></option>
                                    <?php
                                    if(isset($_cities) && !empty($_cities))
                                    {
                                        foreach($_cities as $value) : 
                                            $selected = (isset($edit) && isset($edit->city) && $edit->city == $value->id ? 'selected' : '');
                                            ?>
                                            <option value="<?= $value->id; ?>" <?= $selected; ?>>
                                                <?= toPropercase($value->name); ?>
                                            </option>
                                            <?php 
                                        endforeach;  
                                    }
                                    ?>
                                </select>
                                <span class="form-text text-danger error_city"></span>
                            </div>
                        </div> -->
                        
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Price </label>
                                <input type="text" class="form-control amount_only price" name="price" placeholder="Enter price" maxlength="10" value="<?= isset($edit) && isset($edit->price) ? $edit->price : set_value('price'); ?>" >
                                <span class="error-text error_price"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" class="btn btn-primary mt-4 mb-0 submit_btn">
                                Submit
                            </button>
                            <input type="hidden" name="activity_id" value="<?= isset($edit) && isset($edit->activity_id) ? $edit->activity_id : set_value('activity_id'); ?>" />
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
$('.back_btn').click(function() {
    window.location.href = base_url + 'console/settings';
});

$(document).ready(function() {
    var continue_to = base_url + 'console/settings';
    
    $('body').on('change blur', 'input, select', function() {
        $(this).closest('.form-control').removeClass('is-invalid');
    });
    
    $('body').on('change blur', '.name', function() {
        $('.error_name').html('').hide();
        $('.name').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.name').addClass('is-invalid');
            $('.error_name').html('Enter name').show();
        }
    });

    $('body').on('change blur', '.category', function() {
        $('.error_category').html('').hide();
        var role = $(this).val();

        if($(this).val().trim() == '') {
            $('.category').addClass('is-invalid');
            $('.error_category').html('Choose category').show();
        }
    });

    $('body').on('change blur', '.country', function() {
        $('.error_country').html('').hide();
        var role = $(this).val();

        if($(this).val().trim() == '') {
            $('.country').addClass('is-invalid');
            $('.error_country').html('Choose country').show();
        } /*else {
            var country = $(this).val().trim();
            $('#ajax_loader_country').removeClass('d-none');
            // clear data
            $('.ctm_s2_ar').html('').select2({data: {id:null, text: null}});
            
            $.ajax({
                type: 'POST',
                url:  base_url + 'common/ajaxGC',
                data: {'country' : country},
                dataType: 'json',
                success: function(data) {
                    setTimeout(function() {
                        $('#ajax_loader_country').addClass('d-none');
                        if(data.status == 'success') {

                            $('.ctm_s2_ar').select2({
                                allowClear: true,
                                data: data.city
                            });
                            
                        } else {
                            $('.ctm_s2_ar').html('').select2({data: {id:null, text: null}});
                        }
                    }, 1000);
                }, error: function(data) {
                    ajax_error_swal(data.status);
                }
            });
        }*/
    });

    $('body').on('change blur', '.city', function() {
        $('.error_city').html('').hide();
        var role = $(this).val();

        if($(this).val().trim() == '') {
            $('.city').addClass('is-invalid');
            $('.error_city').html('Choose city').show();
        }
    });

    $('body').on('change blur', '.price', function() {
        $('.error_price').html('').hide();
        if( $(this).val().trim() != '' && !validateNumber($(this).val().trim()) ) {
            $('.error_price').html('Enter valid price').show();
        }
    });

    $('#add-form').submit(function(e) {
        var isValid = 1;

        if($('.name').val().trim() == '') {
            isValid = 0;
            $('.name').addClass('is-invalid');
            $('.error_name').html('Enter name').show();
        }

        if($('.category').val() == '') {
            isValid = 0;
            $('.category').addClass('is-invalid');
            $('.error_category').html('Choose category').show();
        }

        if($('.country').val() == '') {
            isValid = 0;
            $('.country').addClass('is-invalid');
            $('.error_country').html('Choose country').show();
        }

        if($('.city').val() == '') {
            isValid = 0;
            $('.city').addClass('is-invalid');
            $('.error_city').html('Choose city').show();
        }
        
        if( $('.price').val().trim() != '' && !validateNumber($('.price').val().trim()) ) {
            isValid = 0;
            $('.price').addClass('is-invalid');
            $('.error_price').html('Enter valid price').show();
        }

        if(!isValid) {
            e.preventDefault();
        } else {
            // Start Block UI
            /*KTApp.blockPage({
                overlayColor: 'red',
                opacity: 0.1,
                state: 'primary' // a bootstrap color
            });

            setTimeout(function() {
                KTApp.unblockPage();
            }, 2000);*/
            // End Block UI
        }
    });

    $(window).bind('pageshow', function() {
        var form = $('form'); 
        form[0].reset();
    });
});
</script>