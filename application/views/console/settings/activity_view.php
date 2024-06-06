<?php // xdebug($_list); ?>
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div>

                    <div class="col-2">
                        <a href="<?= CL_SETTINGS . '/add-activity'; ?>" class="btn btn-info btn-sm pull-right">
                            Add Activity
                        </a>
                    </div>                    
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Activity Name</th>
                                <th class="wd-15p border-bottom-0">Category</th>
                                <th class="wd-20p border-bottom-0">Country</th>
                                <th class="wd-15p border-bottom-0">City</th>
                                <th class="wd-10p border-bottom-0">Price</th>
                                <th class="wd-10p border-bottom-0">Created On</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ( $_list as $list )
                            {
                                ?>
                                <tr id="r-<?= $list->activity_id; ?>">
                                    <td><?= toPropercase($list->name); ?></td>
                                    <td><?= toPropercase($list->category); ?></td>
                                    <td><?= toPropercase($list->country); ?></td>
                                    <td><?= toPropercase($list->city); ?></td>
                                    <td><?= $list->currency_symbol .' '. number_format($list->price, 2); ?></td>
                                    <td><?= date('d M Y H:i', $list->created_on); ?></td>
                                    <td>
                                        <a href="<?= ROOT_URL . 'settings/edit-activity/' . $list->activity_id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <a href="javascript:;" data-id="<?= $list->activity_id; ?>" data-table="<?= TBL_ACTIVITY; ?>" data-row="activity_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        
        $('#responsive-datatable').on('click', '.delete_btn', function () {
            var table   =     $(this).data('table');
            var row     =     $(this).data('row');
            var id      =     $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                
                if (result.value)
                {
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'common/delete/',
                        data:{'table' : table, 'row' : row, 'id' : id},
                        success: function(result) {
                            if(result == 'success')
                            Swal.fire('Deleted!', 'Your '+ table +' has been deleted.', 'success')

                            $('#r-'+id).addClass('d-none');
                        }
                    });
                }

            });

        });

    });
</script>