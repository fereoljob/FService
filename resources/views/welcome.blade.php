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
            width:780px;
            height:400px;
        }
        
        .champs1
        {
            width:350px;
            display: inline;
            margin-left:40px;   
        }
        .champs
        {
            width:350px;
            display: inline;
            margin-left:15px;   
        }
        .checkbox
        {
            margin-left:260px;
        }
        .soumis
        {
            margin-left:260px;
        }
    </style>
    </head>
    <body class="bg-dark" >
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <h2><em>Feuilles de Service</em></h2>
	    </div>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	    </button>
        </nav>
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header ">Connexion</div>
                <div class="card-body">
                    <form method="post" action="#">
                        <div class="form-group text-center">
                            <div class="form-label-group">
                                <label for="inputEmail"><strong>Identifiant :</strong></label>
                                <input type="email" name="inputEmail" class="form-control champs1" placeholder="id ou adresse mail" required="required" autofocus="autofocus" >  
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="form-label-group">
                                <label for="inputPassword"><strong>Mot de passe :</strong></label>
                                <input type="password" name="inputPassword" class="form-control champs" placeholder="Mot de passe" required="required" >
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
                        <div class="soumis">
                        <input type="submit" class="btn btn-primary" name="envoyer" value="Se connecter" />
                        </div> 
                    </form>
                    <div >
                    <a class="soumis" href="mot_de_passe_oublie.php">Mot de passe oublié ?</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>