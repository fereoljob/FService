<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FService</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <style >
        .card-login
        {
            max-width:580px;
        }
        .form-label-group > input,
        .form-label-group > label {
            padding: var(--input-padding-y) var(--input-padding-x);
            height: auto;
        }
    </style>
    </head>
    <body class="bg-dark" >
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header ">Connexion</div>
                <div class="card-body">
                    <form method="post" action="#">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEmail">Identifiant :</label>
                                <input type="email" name="inputEmail" class="form-control" placeholder="id ou adresse mail" required="required" autofocus="autofocus" >  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputPassword">Mot de passe :</label>
                                <input type="password" name="inputPassword" class="form-control" placeholder="Mot de passe" required="required" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="souvenir_de_moi" >
                                    Se souvenir
                                </label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" name="envoyer" value="Se connecter" />
                    </form>
                    <div class="text-center">
                        <a class="d-block small" href="mot_de_passe_oublie.php">Mot de passe oublié ?</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>