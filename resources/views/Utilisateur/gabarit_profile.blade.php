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
        <script src="js/fonction.js" type="text/javascript" ></script>
    </head>
    <body>
        <div class="container-fluid bg-dark padding tete">
            <div class="btn-group open mt-3">
                <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i>  @if (isset($prof))
                    {{ $prof->nom_professeur }} {{ $prof->prenom_professeur }}
                @else
                    Membre_administratif
                @endif</a>
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
                    <div class="row">
                            <div class="col-md-3 troiscol">
                                <label for="categorie"><span class="filtre"> Catégorie :</span></label>
                                <select class="btn btn-secondary" name="categorie" id="categorie">
                                    @foreach($categories as $id=> $categorie )
                                    <option value="{{$id}}"> {{$categorie}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 troiscol">
                                <label for="niveau"><span class="filtre"> Niveau :</span></label>
                                <select class="btn btn-secondary" name="niveau" id="niveau">
                                </select>
                            </div>

                            <div class="col-md-3 troiscol">
                                <label for="Semestres"><span class="filtre"> Semestres :</span></label>
                                <select class="btn btn-secondary" name="Semestres" id="semestre">
                                </select>
                            </div>

                            <div class="col-md-3 troiscol">
                                <label for="vue"><span class="filtre"> Affichage :</span></label>
                                <select class="btn btn-secondary" name="vue" id="affichage">
                                    <option value="Global ">Général</option>
                                    <option value="Personnalisé">Personnalisé</option>
                                </select>
                            </div>
                    </div>
                    <div class="valModAff" style="display:none">
                        <button class="btn btn-primary" id="confirmerVal" >Confirmer modification</button>
                        &nbsp;&nbsp;
                        <button class="btn btn-danger" id="AnnulerVal">Annuler</button>
                    </div>
                </div>
            </div>

            @yield('contenu')
        </div>
    </body>
</html>
