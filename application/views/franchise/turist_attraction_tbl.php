<table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
            <thead>
                <tr>
                    <th width="wd-15p border-bottom-0"> Name </th>
                    <?php
                    if(isset($title) && in_array($title, ['Hotel', 'Tourist Attraction']))
                    {
                        ?>
                        <th width="wd-15p border-bottom-0"> Star </th>
                        <?php
                        if(isset($title) && in_array($title, ['Hotel']))
                        {
                            ?>
                            <th width="wd-15p border-bottom-0"> Category </th>
                            <th width="wd-15p border-bottom-0"> Sales Rate </th>
                            <th width="wd-15p border-bottom-0"> Purchase Rate </th>
                            <th width="wd-15p border-bottom-0"> Address </th>
                            <?php
                        }
                        ?>
                        <th width="wd-15p border-bottom-0"> Country </th>
                        <th width="wd-15p border-bottom-0"> City </th>
                        <th width="wd-15p border-bottom-0"> Status </th>
                        <?php
                    }
                    else
                    {
                        ?>
                        <th width="wd-15p border-bottom-0"> Created on </th>
                        <?php
                    }
                    ?>
                    <th width="wd-15p border-bottom-0"> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_view as $view):
                    ?>
                    <tr id='r-<?= $view->meta_id; ?>'>
                        <td> 
                            <?php
                            if(isset($title) && $title == 'Destination' || $title == 'Hotel')
                            {
                                ?>
                                <a href="<?= base_url('settings/get-media').'/'.$view->meta_id; ?>">
                                    <?= toPropercase(decode($view->name)); ?>
                                </a>
                                <?php
                            }
                            else
                            {
                                echo toPropercase(decode($view->name));
                            }
                            ?>
                        </td>
                        <?php
                        if(isset($title) && in_array($title, ['Hotel', 'Tourist Attraction']))
                        {
                            ?>
                            <td><?= $view->star; ?> Star</td>
                            <?php
                            if(isset($title) && in_array($title, ['Hotel']))
                            {
                                ?>
                                <td><?= Hotel_category::getValue($view->room_category); ?></td>
                                <td><?= number_format($view->sales_rate, 0); ?></td>
                                <td><?= number_format($view->room_price, 0); ?></td>
                                <td><?= toPropercase($view->address); ?></td>
                                <?php
                            }
                            ?>
                            <td><?= toPropercase($view->country); ?></td>
                            <td><?= toPropercase($view->city); ?></td>
                            <td id="status_<?=$view->meta_id ?>"><?= ($view->is_status == "1") ? "Deactive" : "Active" ?></td>
                            <?php
                        }
                        else
                        {
                            ?>
                            <td><?= date('d M Y H:i', $view->created_on); ?></td>
                            <?php
                        }
                        ?>
                        <td>
                            <?php if($view->is_local_or_global == "1"){ ?>
                                <a href="<?= ROOT_URL . 'franchise/settings/edit-meta/' . $meta .'/'. $view->meta_id; ?>" class="btn btn-icon btn-warning btn-sm mr-2" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="javascript:;" data-id="<?= $view->meta_id; ?>" data-table="<?= TBL_PACKAGE_META; ?>" data-row="meta_id" class="btn btn-icon btn-danger btn-sm mr-2 delete_btn" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            <?php } ?>

                            <?php if(isset($title) && in_array($title, ['Tourist Attraction']))
                            { ?>

                                <a class="btn btn-secondary btn-sm view_all_tour_images"  href="javascript:void(0)" value="<?= $view->meta_id ?>"  data-toggle="tooltip" data-placement="top" title="View Enquiry Image">
                                 <i class="fa fa-eye"></i>
                             </a>

                         <?php  } ?>
                     </td>
                 </tr>
                 <?php
             endforeach;
             ?>
         </tbody>
     </table>