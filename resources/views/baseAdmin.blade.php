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
        <div >
            <div class="container-fluid">
                <div class="row bg-dark one" style="color:white; font-size:25px;">
                    <div class=" col-sm-3 col-md-2 mt-4 text-center acc" style="border-bottom: thick double white; border-right:thick double white"><a href=supadmin ><span class="adm">Administration</span></a></div>
                    <div class="col-sm-9 col-md-10 mt-4" style="border-bottom:thick double white">
                        <div class="row">
                            <div class="col-md-6 text-center"><i class="fa fa-user "></i> {{$prof->nom_professeur }}  {{ $prof->prenom_professeur }}</div>
                            <div class="col-md-6"><a href="logout"><button class="btn btn-primary" >Deconnexion</button></a></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 aside bg-dark" style="color:white">
                        <h5 class="mt-3 perso">Gestion Utilisateurs</h5>
                        <ul class="uliste text-center mt-4" >
                            <li><a href="Ajout">Ajouter</a></li>
                            <li><a href="Supp">Suppression</a></li>
                            <li><a href="Modi">Modifier</a></li>
                        </ul>
                        <h5 class="mt-3 perso">Gestion Départements</h5>
                        <ul class="uliste text-center mt-4" >
                            <li><a href="AjoutDep">Ajouter</a></li>
                            <li><a href="SuppDep">Suppression</a></li>
                            <li><a href="ModiDep">Modifier</a></li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <div class="container-fluid contenu">
                            @yield('contenu')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>