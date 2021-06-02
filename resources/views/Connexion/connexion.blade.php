<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FService</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    </head>
    <body class="bg-dark" >
        <div class="container">
            <div class="text-center">
                <h1 class="titre">Feuilles de Services</h1>
            </div>
        </div>
        <div class="container">
            <div class="card card-login mx-auto">
                <div class="card-header "><h3>Connexion</h3></div>
                <div class="card-body">
                <form method="post" action="{{ route('Connex.verif') }}">
                    @csrf
                    <div class="resultats" >
                        @if(Session::get('Echec'))
                            <div class="alert alert-danger">
                                {{ Session::get('Echec') }}
                            </div>
                        @endif
                    </div>
                        <div class="form-group text-center">
                            <div class="form-label-group">
                                <label for="inputEmail"><strong>Identifiant :</strong></label>
                                <input type="email" name="inputEmail" class="form-control champs1" placeholder="Adresse mail" required="required" autofocus="autofocus" > 
                                <span class="text-danger">@error('inputEmail') {{ $message }} @enderror</span> 
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="form-label-group">
                                <label for="inputPassword"><strong>Mot de passe :</strong></label>
                                <input type="password" name="inputPassword" class="form-control champs" placeholder="Mot de passe" required="required" >
                                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="soumis">
                            <input type="submit" class="btn btn-primary" name="envoyer" value="Se connecter" />
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>