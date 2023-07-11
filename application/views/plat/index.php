<div class="container">
    <div class="d-flex justify-content-center mt-5" style="height: auto">
        <div class="row mt-5 w-75" style="">
            <div class="my-box p-5">
                <div class="my-box-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-basket3-fill" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
                    </svg>  <span style="float: right;">Aperçu regime(s)</span>
                </div><hr>
                <table class="table" id="invoice">
                    <thead>
                        <tr class="product-title">
                            <td scope="col">Designation</td>
                            <td style="text-align: right">Calorie moyenne</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($regimes as $regime) {?>
                        <tr>
                            <td>
                                <?php echo $regime->designation;?>
                            </td>
                            <td style="text-align: right">
                                <?php echo $regime->calorie_moyenne;?>
                            </td>
                        </tr>
    
                    <?php }?>
                    </tbody>
                </table>
                <a href="<?php echo base_url('regime/Regime/insertion')?>">
                    <button type="button" class="btn btn-dark w-100" style="background-color: #ad75b4">
                        Ajouter
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>    

<?php foreach ($plats as $plat) {?>
    <p><?php echo $plat->designation;?></p>
<?php }?>
<a href="<?php echo base_url('plat/Plat/insertion')?>" >Ajout</a>

