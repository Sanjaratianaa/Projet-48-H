<form method="post" action="<?php echo base_url('regime/Regime/inserer_plat_regime');?>">
    <label>Plat</label>
    <select name="id_plat">
        <?php foreach ($plats as $plat) {?>
            <option value="<?php echo $plat->id;?>"><?php echo $plat->designation;?></option>
        <?php }?>
        <input type="submit" value="insert">
    </select>
</form>
