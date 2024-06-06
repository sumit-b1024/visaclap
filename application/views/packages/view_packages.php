<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Index</th>
            <th>Name</th>
            <th>Request Limit</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <?php $index = 1; foreach ($get_all_pkg as $key => $value) { ?>
            <tr>
                <td><?= $index++; ?></td>
                <td><?= $value->package_name ?></td>
                <td><?= $value->request_per_minute ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm edit_btn" r_id="<?= $value->id ?>" p_name="<?= $value->package_name?>" request_per_minute="<?= $value->request_per_minute?>"><span class="fa fa-edit"></span></button> 
                    <button type="button" class="btn btn-danger btn-sm delete_brn" value="<?= $value->id ?>"><span class="fa fa-trash"></span></button> 
                </td>
            </tr>
        <?php  } ?>
    </tbody>
</table>