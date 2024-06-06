<table id="responsive-datatable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Index</th>
            <th>Domain Name</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <?php $index = 1; foreach ($get_all_domain as $key => $value) { ?>
            <tr id="r_<?= $value->id ?>">
                <td><?= $index++; ?></td>
                <td><?= $value->domain_name ?></td>
                <td>
                   <a href="<?= ROOT_URL . 'franchise/domain/edit/'. $value->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:;" data-id="<?= $value->id ?>" data-table="cs_domain" data-row="id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                </td>
            </tr>
        <?php  } ?>
    </tbody>
</table>