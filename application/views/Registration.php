<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <title>Document</title>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <h4>Registration Page</h4>
            <form method="post" action="<?= base_url('authentification/Registration/Connexion'); ?>">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Please your Name!">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Please your email!">
                </div>
                <div class="form-group">
                    <label for="mot-de-passe">Mot de passe</label>
                    <input type="text" class="form-control" name="mot-de-passe" placeholder="Please your password!">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'mot-de-passe') : '' ?></span>
                </div>
                <div class="form-group">
                    <label for="confirmation">Confirmation du mot de passe</label>
                    <input type="text" class="form-control" name="confirmation" placeholder="Please confirm your password!">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'confirmation') : '' ?></span>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                </div>
                <a href="<?= site_url('authentification/Login')?>">I have an account</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>