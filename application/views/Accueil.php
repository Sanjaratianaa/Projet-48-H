<div class="modal fade" id="tierModal_1" tabindex="-1" aria-labelledby="tierModalLabel_1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-4" style="border-radius:0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tierModalLabel_1" style="font-weight: 300;">Information de profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=site_url('information/Profil/insertion')?>" method="get">
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="form-group col-6">
                            <label for="inputPU">Poids (Kg)</label>
                            <input type="number" name="poids" class="form-control" id="inputPU" value="0">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputQt">Taille (Cm)</label>
                            <input type="number" name="taille" class="form-control" id="inputQt" value="0">
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="genre">Genre</label>
                        <select name="genre" class="form-select" id="genre">
                            <?php foreach ($genres as $genre) { ?>
                                <option value="<?=$genre->id?>"><?=$genre->designation?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label for="frequence">Frequence d'activite sportive</label>
                        <input type="number" class="form-control" name="frequence" id="frequence">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="boutton">
                        <b>Soumettre</b> 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tierModal_2" tabindex="-1" aria-labelledby="tierModalLabel_1" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
        <div class="modal-content p-4" style="border-radius:0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tierModalLabel_2" style="font-weight: 300;">Information de profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>

            </div>
        </div>
    </div>
</div>

<div class="parallax" style="background-image: url('<?=base_url('affichage/assets/img/flat-lay-salad-weights.jpg')?>'); min-height: 900px; ">
        <div class="container my-5">
            <div class="row">
                <div class="col-7 offset-1 p-5" style="color: white; margin-top: 25vh; background-color: #ffffffbd;"">
                    <div class="row">
                        <div class="title-text">
                            <h1 style="font-weight: 600; ">
                                E-DIET, <?=$profile?>
                            </h1><hr style="border-top: 10px solid #ad75b4;">
                            <h1>
                                l'ultime <b>programme</b> pour atteindre vos <strong>objectifs</strong> de la manière la plus <b>optimale</b> !
                            </h1>
                            <h1>
                                Rien à en redire !
                            </h1>
                            <a href="#objectif">
                                <button type="button" class="anim" style="float: right;">
                                    <span class="box">
                                        Essayer !
                                    </span> 
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="row">

                        <div class="col-8 offset-3 p-4 my-box" style="margin-top: 30vh;">
                            <?php if($profile){ ?>
                                <div class="first-info">
                                    Vous êtes nouveau ?
                                    <hr>
                                    <button class="cssbuttons-io-button w-100 mt-4" type="submit" data-bs-toggle="modal" data-bs-target="#tierModal_1"> Premier profil
                                        <div class="icon">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                                        </div>
                                    </button>
                                </div>
                            <?php } ?>
                            <?php if(!$profile){?>
                                <div class="first-info">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span>Poids:</span>
                                            <span style="float: right"><?=$profil->poids?> Kg</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>Sexe:</span>
                                            <span style="float: right"><?=$profil->sexe?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>Taille:</span>
                                            <span style="float: right"><?=$profil->taille?> cm</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>Age:</span>
                                            <span style="float: right"><?=$profil->age?> ans</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span legend="frequence d'activite sportive">fréquence:</span>
                                            <span style="float: right"><?=$profil->frequence_activite?> / semaine</span>
                                        </li>
                                    </ul>
                                    <button class="cssbuttons-io-button w-100 mt-4" type="submit" data-bs-toggle="modal" data-bs-target="#tierModal_1"> Mettre a jour
                                        <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                                        </div>
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div style="height: 300px;display: flex; align-items: center;">
        <div class="container">
            <div class="row" id="objectif">
                <div class="my-box w-80 m-auto p-5" style="color: #5f3763; text-align: center; font-size: 1.5em; background-color: transparent; box-shadow: none;">
                    <p class="citation" style="color: #5f3763;">« La meilleure manière de se lancer, c'est d'arrêter de parler et commencer à agir. »</p>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax" style="background-image: url('<?=base_url('affichage/assets/img/438099.jpg')?>'); min-height: 400px; display: flex; align-items: center;">
        <div class="container">
            <div class="row w-75 m-auto">
                <div class="p-4 my-box my-5">
                    <div class="my-box-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ad75b4" class="bi bi-arrow-down-right-circle-fill" viewBox="0 0 16 16">
                          <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm5.904-2.803a.5.5 0 1 0-.707.707L9.293 10H6.525a.5.5 0 0 0 0 1H10.5a.5.5 0 0 0 .5-.5V6.525a.5.5 0 0 0-1 0v2.768L5.904 5.197z"/>
                        </svg>  <span style="float: right;">Ce que vous recherchez !</span>
                      </div><hr>
                    <div class="form">
                        <form class="register-form" action="<?=site_url('regime/Regime/regime_recherche_imc')?>" method="get">
                            <button class="cssbuttons-io-button w-100 mt-4" type="submit" > <span>Atteindre votre poid ideal !</span>
                                <div class="icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                                </div>
                            </button>
                            <p class="message" style="font-weight: normal; font-size: 20px">Ou tenter de  <a><span style="color: #ad75b4">Perdre / Gagner des Kilos</span></a></p>
                        </form>
                        <form class="login-form" action="<?=site_url('regime/Regime/regime_recherche')?>" method="get">
                            <input type="text" placeholder="Objectif, exemple -10kg..." name="objectif" class="form-control">
                            <button class="cssbuttons-io-button w-100 mt-4" type="submit" > <span>Essayer !</span>
                                <div class="icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                                </div>
                            </button>
                            <p class="message" style="font-weight: normal; font-size: 20px">Ne souhaiteriez vous pas <a><span style="color: #ad75b4" >Atteindre votre IMC ?</span></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row"></div>
    </div>
    <div class="row p-5 d-flex justify-content-center">
        <div style="text-align: center; color: #ad75b4">
            <h1 style="text-decoration: underline">Suggestion de regime</h1>
        </div>
        <?php if(isset($_SESSION['regime_optimal'], $_SESSION['regime_plats'], $_SESSION['regime_categories'])){ ?>             
            <div class="w-75 p-5 my-box">
                <div class="my-box-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#5f3763" class="bi bi-basket3-fill" viewBox="0 0 16 16">
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
                </svg>  <span style="float: right;"><?=$_SESSION['regime_optimal']->designation;?></span>
                </div><hr>
                <table class="table" id="invoice">
                <thead>
                    <tr class="product-index product-title">
                    <td scope="col"><strong style="color: #5f3763">Plat(s) :</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['regime_plats'] as $plat) { ?>
                        <tr class="product-index">
                            <td>
                                <span class="box" style="width: 300px">
                                    <t style="font-weight: normal; text-decoration: underline;">
                                        <?=$plat->designation?>
                                    </t>
                                </span>
                            </td>
                            <td colspan="2"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php foreach($_SESSION['regime_categories'][$plat->id] as $cat){ ?>
                        <tr class="product-index">
                            <td></td>
                            <td></td>
                            <td style="text-align: left">- <?=$cat->designation_categorie?></td>
                            <td></td>
                            <td style="text-align: left"><?=$cat->pourcentage?> %</td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
                <thead>
                    <tr class="product-index product-title">
                    <td scope="col"><strong style="color: #5f3763">Activites physique(s) 1h par jour au choix :</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['activites'] as $activite) { ?>
                        <tr class="product-index">
                            <td>
                            </td>
                            <td></td>
                            <td style="text-align: left">
                                - <?=$activite->designation?>
                            </td>
                            <td></td>
                            <td style="text-align: left">
                                <?=$activite->calorie_moyen?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
      <script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
  </script>