
    <?php foreach ($regimes as $regime) {?>
        <p><?php echo $regime->designation;?></p>
    <?php }?>
    <a href="<?php echo base_url('regime/Regime/insertion')?>" >Ajout</a>

