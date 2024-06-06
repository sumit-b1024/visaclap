<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <!-- <div class="col-10">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div> -->

                    <div class="col-12 pull-right">
                        <a href="<?= CL_SUPPLIER . '/add_supplier'; ?>" class="box-btn fill_primary pull-right">
                            <i class="fa fa-plus"></i> Add Supplier
                        </a>
                    </div>                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0" >Index</th>
                                <th class="wd-15p border-bottom-0" >Code</th>
                                <th class="wd-15p border-bottom-0" >Firm</th>
                                <th class="wd-20p border-bottom-0" >Contact Person</th>
                                <th class="wd-15p border-bottom-0" >Email</th>
                                <th class="wd-10p border-bottom-0" >Updated On</th>
                                <th class="wd-25p border-bottom-0" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($_list as $supplier)
                            {
                                ?>
                                <tr id="r-<?= $supplier->supplier_id; ?>">
                                    <td><?= $index++; ?></td>
                                    <td><?= $supplier->code; ?></td>
                                    <td><b><?= toPropercase($supplier->firm_name); ?></b></td>
                                    <td><?= toPropercase($supplier->first.' '.$supplier->last); ?></td>
                                    <td><?= strtolower($supplier->alter_email); ?></td>
                                    <td>
                                    <?php
                                        if(!empty($supplier->updated_on) && isset($supplier->updated_on))
                                        {
                                            echo '<small>'.date('d M Y H:i', $supplier->updated_on).'</small><br>';
                                            echo '<small class="bold font-blue-madison">'.toPropercase($supplier->first_name.' '.$supplier->last_name).'</small>';
                                        } 
                                    ?>
                                    </td>
                                    <td>
                                        <a href="<?= ROOT_URL . 'supplier/edit_supplier/' . $supplier->supplier_id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="javascript:;" data-id="<?= $supplier->user_id; ?>" data-table="<?= TBL_SUPPLIER; ?>" data-row="user_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="<?= base_url().'console/supplier/profile/'.$supplier->supplier_id; ?>" class="btn btn-primary btn-sm btn-outline" data-toggle="tooltip" data-placement="bottom" title="View"> <i class="fa fa-eye"></i> </a>
                                        
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
                        url: base_url + 'common/delete_supplier/',
                        data:{'table' : table, 'row' : row, 'id' : id},
                        success: function(result) {
                            if(result == 'success')
                            // Swal.fire('Deleted!', 'Your '+ table +' has been deleted.', 'success')
                        Swal.fire('Deleted!', 'Supplier has been deleted.', 'success')

                            // $('#r-'+id).addClass('d-none');
                        }
                    });
                }

            });

        });

    });
</script>