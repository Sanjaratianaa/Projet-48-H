<div class="container">
<div class="d-flex justify-content-center mt-5" style="height: auto">
        <div class="row mt-5 w-75" style="">
            <div class="my-box p-5">

                <div class="my-box-title">
                    <center><h3>Listes des Activites</h3></center>
                </div><hr>

                <table class="table" id="invoice">
                    <thead>
                        <tr class="product-title">
                            <td scope="col">Designation</td>
                            <td style="text-align: right">Calorie moyenne</td>
                            <td style="text-align: right">Intensite</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($activites as $activite) {?>
                        <tr>
                            <td>
                                <?php echo $activite->designation;?>
                            </td>
                            <td style="text-align: right">
                                <?php echo $activite->calorie_moyen;?>
                            </td>
                            <td style="text-align: right">
                                <?php echo $activite->id_intensite;?>
                            </td>
                        </tr>
    
                    <?php }?>
                    </tbody>
                </table>
                <a href="<?php echo base_url('activite/Activite/insertion')?>">
                    <button type="button" class="btn btn-dark w-100" style="background-color: #ad75b4">
                        Ajouter
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>