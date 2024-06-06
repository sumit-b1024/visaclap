<table class="table table-bordered text-nowrap border-bottom" id="user_tbl">
    <thead>
        <tr>
            <th class="wd-15p border-bottom-0">Username</th>
            <th class="wd-15p border-bottom-0">Mobile</th>
            <th class="wd-20p border-bottom-0">Email</th>
            <th class="wd-15p border-bottom-0">Role</th>
            <th class="wd-15p border-bottom-0">Status</th>
            <th class="wd-10p border-bottom-0">Created On</th>
            <th class="wd-25p border-bottom-0">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $_list as $list )
        {
            ?>
            <tr id="r-<?= $list->user_id; ?>">
                <td><?= toPropercase($list->first_name .' '. $list->last_name); ?></td>
                <td><?= $list->mobile; ?></td>
                <td><?= $list->email; ?></td>
                <td><?= User_role::getValue($list->role); ?></td>
                <td id="status_<?= $list->user_id ?>">
                    <?php if($list->user_status == "2"){
                       echo "Deactive";   
                   }else if($list->user_status == "1")   {
                    echo "Active";
                }else{
                    echo "Inactive";
                }
            ?></td>

            <td><?= date('d M Y H:i', $list->created_on); ?></td>
            <td>
                <button id="ia-<?= $list->user_id; ?>" data-id="<?= $list->user_id; ?>" data-row="meta_id" data-table="<?= TBL_USERS; ?>" class="btn btn-icon btn-primary btn-sm mr-2 update_user_status" title="Status" data-status="<?php echo $list->user_status ?>">
                    <i class="fa fa-refresh"></i>
                </button>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>