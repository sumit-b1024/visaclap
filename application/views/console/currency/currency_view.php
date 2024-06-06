<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
             <?php if($this->session->userdata('user_role') == User_role::SUPER_ADMIN){ ?>
            <div class="card-header">
                <div class="row">
                   <!--  <div class="col-10">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div> -->
                   
                        <div class="col-12">
                            <a href="<?= ROOT_URL . '/currency/add_currency'; ?>" class="box-btn fill_primary btn-sm pull-right">
                               <i class="fa fa-plus"></i>  Add Currency
                            </a>
                        </div> 
                </div>
            </div>
             <?php } ?>   
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0" style="width:25%">name</th>
                                <th class="wd-15p border-bottom-0">Date</th>
                                <?php if($this->session->userdata('user_role') == User_role::SUPER_ADMIN){ ?>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($_list as $curid)
                            { 
                                ?>
                                <tr id="r-<?= $curid->id; ?>">

                                    <td><?= $curid->curname; ?></td>
                                    <td><?= date("d-m-Y",strtotime($curid->created_at)); ?></td>
                                    
                                        <td>
                                            <a href="<?= ROOT_URL . 'currency/edit_currency/' . $curid->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="javascript:;" data-id="<?= $curid->id; ?>" data-table="<?= TBL_CURRENCY; ?>" data-row="user_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
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

       $('#new_table').DataTable({
           order: [],
       });


       $(document).on('click', '.delete_btn', function () {
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
                    url: base_url + 'notification/delete/',
                    data:{'table' : table, 'row' : row, 'id' : id},
                    success: function(result) {
                        if(result == 'success')
                            // Swal.fire('Deleted!', 'Your '+ table +' has been deleted.', 'success')
                            Swal.fire('Deleted!', 'Supplier has been deleted.', 'success')

                        $('#r-'+id).addClass('d-none');
                    }
                });
            }

        });

    });

   });
</script>