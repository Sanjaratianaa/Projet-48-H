

<div class="row" style="z-index: 6;">
    <div class="col-1 d-flex justify-content-center">
        <div id="mySidenav" class="sidenav">
            <a href="<?=site_url('regime/Regime')?>" class="hover-underline-animation">Regime</a>
            <a href="<?=site_url('plat/Plat')?>" class="hover-underline-animation">Plat</a>
            <a href="<?=site_url('activite/Activite')?>" class="hover-underline-animation">Activite</a>
            <a href="<?=site_url('authentification/Login/deconnexion')?>" class="hover-underline-animation">Deconnexion</a>
        </div>
    </div>
</div>
<!--Navbar-->
<nav class="navbar navbar-light bg-light" style="color: #ad75b4; box-shadow: 0px 0px 8px #888888; position: fixed; width: 100%; z-index: 6;">
    <!-- Collapse button -->
    <button class="navbar-toggler hamburger-button" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation" onclick="Nav()" style="z-index: 2">
        <div class="animated-icon"><span></span><span></span><span></span></div>
    </button>
    <!-- Navbar brand -->
    <div class="mx-auto order-0">
        <a class="navbar-brand" style="color: #5f3763" href="<?=site_url('Accueil')?>">PROJET 48 H - connecte en tant que <span style="text-decoration: underline"><?=$_SESSION['administrateur']->mail?></span></a>
    </div>
</nav>
