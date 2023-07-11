<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('affichage/assets/css/style.css')?>">
    <link rel="stylesheet" href="<?=base_url('affichage/assets/css/parallax.css')?>">
    <link rel="stylesheet" href="<?=base_url('affichage/assets/css/accueil.css')?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php $this->load->view('template/Header') ?>
    <?php $this->load->view($contenu) ?>
    <?php $this->load->view('template/Footer') ?>
</body>
<script>
        function Nav() {
            var width = document.getElementById("mySidenav").style.width;
            if (width === "0px" || width == "") {
                document.getElementById("mySidenav").style.width = "250px";
                $('.animated-icon').toggleClass('open');
            }
            else {
                document.getElementById("mySidenav").style.width = "0px";
                $('.animated-icon').toggleClass('open');
            }
            }
    </script>
<script src="<?=base_url('assets/js/app.js')?>"></script>
</html>