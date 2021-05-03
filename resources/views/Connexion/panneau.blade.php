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
    <body class="bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="container gen text-center">
                    <h1>Se connecter en tant que </h1>
                </div>
                <div class="container panneau mt-3">
                    <div class="row general">
                        <div class="col-md-6">
                            <a href="feuille" class="a1">{{ $infoConnexionUser->type_user }}</a>
                        </div>
                       <div class="col-md-6">
                           @if($infoConnexionUser->admin==1)
                                <a href="admin" class="a2">Administrateur</a>
                            @else
                                <a href="supadmin" class="a2" >Super Administrateur</a>
                            @endif
                            </a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>