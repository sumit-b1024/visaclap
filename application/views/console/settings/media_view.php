<div class="page-content-inner">
<div class="card">
    <div class="card-body">
    <div class="row">
        <?php if(isset($_list) && !empty($_list)) { ?>
            <?php foreach ($_list as $list) : ?>
                <div id="media_item_<?= $list->media_id; ?>" class="col-md-6 col-xl-3">
                    <div class="thumbnail c_thumbnail" data-id="<?= $list->media_id; ?>">
                    <a href="javascript:;" data-id="<?= $list->media_id; ?>" data-table="cs_package_meta" data-row="meta_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn c_delete_btn" title="Delete">
                                            <i class="fa fa-trash"></i>
                    </a>
                        <img src="<?= media().''.$list->image; ?>" alt="<?= toPropercase($list->name); ?>">
                        <!-- <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title"><?= toPropercase($list->name); ?></div>
                                    <div class="cbp-l-caption-desc">Remove</div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <div class="alert alert-danger">
                <strong>No found!</strong> Photos not available
            </div>
        <?php } ?>
        </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('body').on('click', '.delete_btn', function (){
        var pk    = $(this).data('id');
        var image = $(this).data('image');
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: 'yellow-gold',
            cancelButtonColor: '#e35b5a',
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: 'btn yellow-gold btn-outline',
            cancelButtonClass: 'btn btn-outline'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: base_url + 'common/media-delete/',
                    data:{'table' : 'media', 'pk' : pk, 'id' : 'media_id', 'image' : image},
                    success: function(result) {
                        if(result == 'success')
                        Swal.fire('Deleted!', 'Image has been deleted.', 'success');
                        setTimeout(function() {
                            $('#media_item_'+pk).hide();
                        }, 500);
                    }
                })
            }
        });
    });
});
</script>