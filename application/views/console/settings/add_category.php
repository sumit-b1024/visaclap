<div class="row">
    <div class="col-md-12 col-xl-12">
    
        <div class="card">
           <!--  <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>
 -->
            <div class="card-body">

                <form class="form-horizontal" id="add-form" class="login100-form validate-form" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 input-inside">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control name" name="name" placeholder="Enter category name" value="<?= isset($edit) && isset($edit->name) ? $edit->name : set_value('name'); ?>" >
                                <span class="error-text error_name"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <button type="submit" class="box-btn fill_primary mt-3 submit_btn">
                                Submit
                            </button>
                            <input type="hidden" name="category_id" value="<?= isset($edit) && isset($edit->category_id) ? $edit->category_id : set_value('category_id'); ?>" />
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
$('.back_btn').click(function() {
    window.location.href = base_url + 'settings';
});

$(document).ready(function() {
    var continue_to = base_url + 'settings';
    
    $('body').on('change blur', 'input, select', function() {
        $(this).closest('.form-control').removeClass('is-invalid');
    });

    $('body').on('change blur', '.name', function() {
        $('.error_name').html('').hide();
        $('.name').removeClass('is-invalid');
        if($(this).val().trim() == '') {
            $('.name').addClass('is-invalid');
            $('.error_name').html('Enter category name').show();
        }
    });

    $('#add-form').submit(function(e) {
        var isValid = 1;

        if($('.name').val().trim() == '') {
            isValid = 0;
            $('.name').addClass('is-invalid');
            $('.error_name').html('Enter category name').show();
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