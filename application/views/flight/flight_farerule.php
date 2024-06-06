
<?php if(!empty($ruledata)){ ?>
    <?php foreach($ruledata as $data){
        echo '<b>'.$data['Origin'].'->'.$data['Destination'].'</b></br>';
        echo $data['FareRules'];
     ?>
     <hr/>
    <?php } ?>    
<?php }else{ ?>
    <h3>Empty</h3>
 <?php } ?>   