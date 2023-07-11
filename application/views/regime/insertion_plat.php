<form method="post" action="<?php echo base_url('regime/Regime/inserer_plat_regime');?>">

</form>


<div class="container">

    <!-- Tokony hoe apoitra eto ny anaran'ilay izy rehefa azo ampidirina -->

    <div class="row">
        <div class="col-8 offset-2 p-4 my-box">
            <div class="my-box-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-down-right-circle-fill" viewBox="0 0 16 16">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm5.904-2.803a.5.5 0 1 0-.707.707L9.293 10H6.525a.5.5 0 0 0 0 1H10.5a.5.5 0 0 0 .5-.5V6.525a.5.5 0 0 0-1 0v2.768L5.904 5.197z"/>
                </svg>  <span style="float: right;">Les plats à ajouter</span>
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

        <!-- Button trigger modal -->

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

    </div>