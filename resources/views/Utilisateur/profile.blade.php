<!doctype html>
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
    <body>
        <div class="container-fluid bg-dark padding tete">
            <div class="btn-group open mt-3">
                <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> {{ $infoConnexionUser->nom }} {{ $infoConnexionUser->prenom }}</a>
                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                </a>
                <ul class="dropdown-menu">
                  <li><a href="logout"><i class="fa fa-power-off"aria-hidden="true"></i> Déconnecter</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid padding mt-5">
            <div class="Licences col-md-12">
                <div class="row text-center">
                    <h2 class="titresect"><span class="contenu">Licences</span> </h2>
                    <div class="row">
                        <form action="#" class="form-inline lefiltre">
                            <div class="form-group troiscol">
                                <label for="licences"><span class="filtre"> Catégorie :</span></label>
                                <select class="btn btn-secondary" name="categorie" id="categorie">
                                    @foreach ($categoriesnom as $categorie )
                                    <option value="{{$categorie->categorie}}"> {{$categorie->categorie}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group troiscol">
                                <label for="licences"><span class="filtre"> Niveau d'Etudes :</span></label>
                                <select class="btn btn-secondary" name="licence" id="licence">
                                    <option value="Tout"> Tout </option>
                                    @foreach ($licences as $licence){
                                        <option value="{{$licence->nom_niveau}}"> {{$licence->nom_niveau}} </option>
                                    }
                                    @endforeach
                                </select>

                                <select class="btn btn-secondary d-none" name="master" id="master" >
                                    <option value="Tout"> Tout </option>
                                    @foreach ($masters as $master){
                                        <option value="{{$master->nom_niveau}}"> {{$master->nom_niveau}} </option>
                                    }
                                    @endforeach
                                </select>

                                <select class="btn btn-secondary d-none" name="autre" id="autre">
                                    <option value="Tout"> Tout </option>
                                    @foreach ($autres as $autre){
                                        <option value="{{$autre->nom_niveau}}"> {{$autre->nom_niveau}} </option>
                                    }
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group troiscol">
                                <label for="Semestres"><span class="filtre"> Semestres :</span></label>
                                <select class="btn btn-secondary" name="Semestres">
                                </select>
                            </div>

                            <div class="form-group troiscol">
                                <label for="vue"><span class="filtre"> Affichage :</span></label>
                                <select class="btn btn-secondary" name="vue">
                                    <option value="Global ">Global</option>
                                    <option value="Personnalisé">Personnalisé</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="affichage">

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('categorie').addEventListener('change', function() {
            console.log('You selected: ', this.value);

            if(this.value == 'Licences'){
                document.getElementById('licence').classList.remove("d-none");
                document.getElementById('master').classList.add("d-none");
                document.getElementById('autre').classList.add("d-none");
            }
            if(this.value == 'Masters'){
                document.getElementById('licence').classList.add("d-none");
                document.getElementById('autre').classList.add("d-none");
                document.getElementById('master').classList.remove("d-none");
            }
            if(this.value == 'Autres Services'){
                document.getElementById('master').classList.add("d-none");
                document.getElementById('licence').classList.add("d-none");
                document.getElementById('autre').classList.remove("d-none");
            }
            });
       </script>
    </body>
</html>
