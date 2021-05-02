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
                            <li><a href="Ajout">Ajouter</a></li>
                            <li><a href="Supp">Suppression</a></li>
                            <li><a href="Modi">Modifier</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="container">
                            @yield('contenu')
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5 aff">
                <p style="font-size: 25px;font-weight:bold;">Selectionner la liste que vous voulez afficher et cliquez sur le bouton 'Afficher' pour avoir une vue sur son contenu</p>
                <form action="listeAdm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="table"><span style="font-size: 2rem; font-weight:bold;">Liste</span></label>&nbsp;&nbsp;
                        <select name="table" class="form-control col-md-4   ">
                            <option value="admin">Administrateur</option>
                            <option value="supadmin">Super Administrateur</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Afficher</button>
                </form>
            </div>
            <div class="container">
                <div id="contenu2" class="contenu2">
                    @yield('contenu2')
                </div>
            </div>
        </div>
    </body>
</html>