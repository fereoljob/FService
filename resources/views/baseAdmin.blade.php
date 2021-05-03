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
    <body class="admin">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row bg-dark one" style="color:white; font-size:25px;">
                    <div class=" col-sm-3 col-md-3 mt-4 text-center" style="border-bottom: thick double white; border-right:thick double white"><i class=""></i><span class="adm">Administration</span></div>
                    <div class="col-sm-9 col-md-9 mt-4" style="border-bottom:thick double white">
                        <div class="row">
                            <div class="col-md-6 text-center"><i class="fa fa-user "></i> {{$infoConnexionUser->nom }}  {{ $infoConnexionUser->prenom }}</div>
                            <div class="col-md-6"><a href="logout"><button class="btn btn-primary" >Deconnexion</button></a></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 aside bg-dark" style="color:white">
                        <h3 class="mt-3 perso">Gestion Admin/Super Admin</h3>
                        <ul class="uliste text-center mt-4" >
                            <li><a href="Ajout">Ajouter</a></li>
                            <li><a href="Supp">Suppression</a></li>
                            <li><a href="Modi">Modifier</a></li>
                        </ul>
                        <h3 class="mt-3 perso">Gestion Départements</h3>
                        <ul class="uliste text-center mt-4" >
                            <li><a href="AjoutDep">Ajouter</a></li>
                            <li><a href="SuppDep">Suppression</a></li>
                            <li><a href="ModiDep">Modifier</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="container">
                            @yield('contenu')
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-5 aff">
                <div class="row col-md-12">
                    <div class="col-md-12 contenu1">
                        @yield('contenu1')
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row col-md-12">
                    <div class="col-md-12 contenu2">
                        @yield('contenu2')
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>