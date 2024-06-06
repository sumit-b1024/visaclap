 <table class="table table-bordered text-nowrap border-bottom" id="notification_data">
           <thead>
             <tr>
             <th class="wd-15p border-bottom-0">Description</th>
             <th class="wd-15p border-bottom-0">Date</th>
           </tr>
        </thead>
        <tbody>
           <?php
           $index = 1;
           foreach($fetch_notification as $view){ ?>
              <tr><input type="hidden" name="noteid[]" value="<?=$view->id; ?>">
               <td><?= $view->description; ?></td>
               <td><?= date("d-m-Y",strtotime($view->created_at)); ?></td>
               </tr>
    <?php  } ?>
 </tbody>
</table>