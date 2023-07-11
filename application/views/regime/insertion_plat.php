<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout de plat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="form" id="form-modal">
                            <div class="row text-center">
                                <h3 class="text-center">
                                    Choisir un plat
                                </h3>
                            </div>
                            <div class="my-3">
                                <select id="plat" name="plat" class="form-select">
                                    <?php foreach ($plats as $plat) {?>
                                        <option value="<?php echo $plat->id;?>,<?php echo $plat->designation;?>"><?php echo $plat->designation;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-primary" onclick="ajout_details()" data-bs-dismiss="modal">Ajouter un plat</button>
                    </div>
                </div>
            </div>
        </div>

<form method="post" action="<?php echo base_url('regime/Regime/inserer_plat_regime');?>">
<div class="container">
    <div class="d-flex justify-content-center mt-5" style="height: auto">
        <div class="row mt-5 w-75" style="">
            <div class="my-box p-5">
                <div class="my-box-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-basket3-fill" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
                    </svg>  <span style="float: right;">Aperçu regime(s)</span>
                </div><hr>
                <form action="" class="form" id="general-form">
                <table class="table">
                    <thead>
                        <th> Designation </th>
                    </thead>
                    <tbody id="details-container">
                    </tbody>
                </table>
            </form>

            <div class="col-lg-4  d-flex">

                <i class="fas fa-plus mx-3 btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">

                </i>

                <i class="fas fa-trash mx-3 btn btn-danger" onclick="supprimer_tous_details()">

                </i>

                <i class="fas fa-check-double mx-3 btn btn-success" onclick="validate_regime('<?php echo site_url('regime/Regime/inserer_plat_regime'); ?>', '<?php echo site_url("regime/Regime"); ?>')">
                </i>

            </div>
            </div>
        </div>
    </div>
</div>    



</form>


<div class="container">

    <!-- Tokony hoe apoitra eto ny anaran'ilay izy rehefa azo ampidirina -->


        <!-- Button trigger modal -->


                                    </div>
    </div>