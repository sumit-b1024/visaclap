<div class="col-sm-12 col-lg-12">

    <div class="card-body" style="padding:0px;">
        <div class="row">
            <div class="col-sm-4 col-lg-4 col-md-4"><b>Origin Country : </b><?=$origin_country; ?></div>
            <div class="col-sm-4 col-lg-4 col-md-4"><b>Destination Country : </b><?=$destination_country; ?></div>
           <div class="col-lg-4 col-md-4"><b>Visa Type : </b><?=$visa_name; ?> </div>
        </div>
    </br>
        <?php
            for($i = 1;$i<=$no_of_travellers;$i++){
         ?>

        <div class="alert alert-dark" role="alert"><b>Details for Applicant     #<?php echo $i; ?></b></div>
            <?php foreach($form_groups as $group){ ?>
                    <div class="row"><h4 style="text-decoration:underline;"><?php echo ucfirst(str_replace('_', ' ', $group)); ?></h4></div>
                    <?php
                        $group_detail = $main_array[$group][$i];
                        echo '<div class="row">';
                        foreach($group_detail as $sub_detail)
                        {
                            echo '<div class="col-sm-4 col-md-4">
                                    <label class="form-label"><b>'.ucfirst(str_replace("_", " ", $sub_detail->field_name)).'</b>&nbsp;:&nbsp;</label>
                                    <label class="form-label">'.$sub_detail->field_value.'</label>
                            </div>';
                        }  
                        echo '</div>';  
                    ?>

        <?php } ?>
    <?php } ?>
        
    </div>
</div>


