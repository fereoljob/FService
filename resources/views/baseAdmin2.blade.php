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
        <div>
            <div class="container-fluid">
                <div class="row bg-dark one" style="color:white; font-size:25px;">
                    <div class=" col-sm-3 col-md-2 mt-4 text-center acc" style="border-bottom: thick double white; border-right:thick double white"><a href=admin ><span class="adm">Administration</span></a></div>
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
                        <h3 class="mt-3 perso">Tables</h3>
                        <div class="uliste2 mt-4">
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">Statuts <i class="dropdown-toggle" ></i></a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="AjouStat" class="dropdown-item">Ajouter</a>
                                    <a href="SuppStat" class="dropdown-item">Supprimer</a>
                                    <a href="ModStat" class="dropdown-item">Modifier</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">Professeurs <i class="dropdown-toggle" ></i></a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="AjouProf" class="dropdown-item">Ajouter</a>
                                    <a href="SuppProf" class="dropdown-item">Supprimer</a>
                                    <a href="ModProf" class="dropdown-item">Modifier</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">Niveaux d'études <i class="dropdown-toggle" ></i></a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="AjouNiv" class="dropdown-item">Ajouter</a>
                                    <a href="SuppNiv" class="dropdown-item">Supprimer</a>
                                    <a href="ModNiv" class="dropdown-item">Modifier</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">Catégories <i class="dropdown-toggle" ></i></a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="AjouCat" class="dropdown-item">Ajouter</a>
                                    <a href="SuppCat" class="dropdown-item">Supprimer</a>
                                    <a href="ModCat" class="dropdown-item">Modifier</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">Semestres <i class="dropdown-toggle" ></i></a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="AjouSem" class="dropdown-item">Ajouter</a>
                                    <a href="SuppSem" class="dropdown-item">Supprimer</a>
                                    <a href="ModSem" class="dropdown-item">Modifier</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">Matieres <i class="dropdown-toggle" ></i></a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="AjouMat" class="dropdown-item">Ajouter</a>
                                    <a href="SuppSem" class="dropdown-item">Supprimer</a>
                                    <a href="ModSem" class="dropdown-item">Modifier</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">Type d'enseignements <i class="dropdown-toggle" ></i></a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="AjouTyp" class="dropdown-item">Ajouter</a>
                                    <a href="SuppTyp" class="dropdown-item">Supprimer</a>
                                    <a href="ModTyp" class="dropdown-item">Modifier</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">Parties <i class="dropdown-toggle" ></i></a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="AjouPart" class="dropdown-item">Ajouter</a>
                                    <a href="SuppPart" class="dropdown-item">Supprimer</a>
                                    <a href="ModPart" class="dropdown-item">Modifier</a>
                                </div>
                            </div>
                        </div>
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