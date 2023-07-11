<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('affichage/assets/css/style.css')?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="login-page">
    <div class="form login">
      <form class="register-form" method="post" action="<?=base_url('authentification/Registration/inscription')?>">
        <input type="text" placeholder="nom" name="nom"/>
        <input type="text" placeholder="prenom(s)" name="prenoms"/>
        <input type="text" placeholder="email address" name="mail"/>
        <input type="password" placeholder="mot de passe" name="mot_de_passe"/>
        <input type="password" placeholder="confirmer mot de passe" name="confirmation"/>
        <label for="date_naissance" style="font-weight: 190;">Date de naissance</label>
        <input type="date" name="date_naissance" placeholder="date de naissance" id="date_naissance">
        <button>S'enregistrer</button>
        <p class="message">Deja enregistre? <a href="#">se connecter</a></p>
      </form>
      <form class="login-form" id="login-form" action="<?=base_url('authentification/Login/Connexion_Utilisateur')?>" method="post">
        <input type="email" placeholder="exemple@wholly.online" name="mail" id="mail"/>
        <input type="password" placeholder="mot de passe" name="mot_de_passe" id="mot_de_passe"/>
        <button>login</button>
        <p class="message" id="message">Pas encore enregistre? <a href="#">S'inscrire</a></p>
        <p class="admin" id="admin"><a href="#">Administrateur </a></p>
        <p class="utilisateur" id="utilisateur" style="display:none; "><a href="#">Utilisateur </a></p>
      </form>
    </div>
  </div>

  <script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    
    $('.admin a').click(function(){
      let url = "<?=base_url('authentification/Login/Connexion_Administrateur'); ?>";
      let message = document.getElementById("message");
      let utilisateur = document.getElementById("utilisateur");
      let admin = document.getElementById("admin");

      document.getElementById("mail").value = "admin@gmail.com";
      document.getElementById("mot_de_passe").value = "admin";

      message.style.display = "none";
      admin.style.display = "none";
      utilisateur.style.display = "block";

      document.getElementById("login-form").action = url;
    });

    $('.utilisateur a').click(function(){
      let url = "<?=base_url('authentification/Login/Connexion_Utilisateur'); ?>";
      let message = document.getElementById("message");
      let utilisateur = document.getElementById("utilisateur");
      let admin = document.getElementById("admin");

      document.getElementById("mail").value = "myah@gmail.com";
      document.getElementById("mot_de_passe").value = "myah";

      message.style.display = "block";
      admin.style.display = "block";
      utilisateur.style.display = "none";

      document.getElementById("login-form").action = url; 
    });
    
  </script>
  </body>
</html>