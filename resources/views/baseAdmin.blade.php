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
                            <div class="col-md-6 text-center"><i class="fa fa-user "></i> nom prenom</div>
                            <div class="col-md-6"><a href=#><button class="btn btn-primary" >Deconnexion</button></a></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 aside bg-dark" style="color:white">
                        <h3 class="mt-3 perso">Gestion Super Administrateur</h3>
                        <ul class="uliste text-center mt-4" >
                            <li><a href=#>Ajouter</a></li>
                            <li><a href=#>Suppression</a></li>
                            <li><a href=#>Modifier/Maj</a></li>
                        </ul>
                        <br/>
                        <h3 class="mt-3 perso">Gestion Administrateur</h3>
                        <ul class="uliste text-center" >
                            <li><a href=#>Ajouter</a></li>
                            <li><a href=#>Suppression</a></li>
                            <li><a href=#>Modifier/Maj</a></li>
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
                <form action=# method="GET">
                    <div class="form-group">
                        <label for="table"><span style="font-size: 2rem">Liste</span></label>
                        <select name="table" class="form-control col-md-4   ">
                            <option value="Admin">Administrateur</option>
                            <option value="SuperAdmin">Super Administrateur</option>
                        </select>
                    </div>
                    <input type="submit" value="Afficher" name="consulter" class="btn btn-primary"/>
                </form>
            </div>
            <div class="container">
                <div class="contenu2">

                </div>
            </div>
        </div>
    </body>
</html>