<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div>                  
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0" style='width: 15%;'>Name</th>
                                <th class="wd-15p border-bottom-0" style='width: 10%;'>Email</th>
                                <th class="wd-15p border-bottom-0" style='width: 10%;'>Mobile</th>
                                <th class="wd-15p border-bottom-0" style='width: 15%;'>Domain Name</th>
                                <th class="wd-15p border-bottom-0" style='width: 10%;'>Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1; 
                            foreach ($view as $supplier)
                            { 
                                $userkey = explode("/",$supplier->target_address);
                                $userdata = $this->setting_model->get_single_user_detail($userkey[5]);
                                ?>
                                <tr>
                                    <td><?= $userdata->email; ?></td>
                                    <td><?= $userdata->email; ?></td>
                                    <td><?= $userdata->mobile; ?></td>
                                    <td><?= $supplier->incoming_address; ?></td>
                                    <td><?= $supplier->target_address; ?></td>
                                   
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