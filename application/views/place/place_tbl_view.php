<table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                 <thead>
                    <tr>
                       <th class="wd-15p border-bottom-0" style="width:10%">Index</th>
                       <th class="wd-15p border-bottom-0" style="width:80%">Name</th>
                       <th class="wd-25p border-bottom-0" style="width:10%">Action</th>
                    </tr>
                 </thead>
                 <tbody>
                   <?php
                   $index = 1;
                   foreach($_view as $view )
                   {
                      ?>
                      <tr>
                         <td><?= $index++; ?></td>
                         <td><?= $view->name; ?></td>
                         <td>
                            <a href="<?= ROOT_URL . 'add_place/edit_place/' . $view->id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                               <i class="fa fa-pencil"></i>
                            </a>
                            <a href="javascript:;" data-id="<?= $view->id; ?>"  data-row="user_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                               <i class="fa fa-trash"></i>
                            </a>
                         </td>
                      </tr>
                      <?php
                   }
                   ?>
                </tbody>
             </table>