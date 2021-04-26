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
        <div class="container-fluid bg-dark tete">
            <div class="btn-group open mt-3">
                <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> {{ $infoConnexionUser->nom }} {{ $infoConnexionUser->prenom}}</a>
                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                </a>
                <ul class="dropdown-menu">
                  <li><a href="logout"><i class="fa fa-power-off"aria-hidden="true"></i> Déconnecter</a></li>
                </ul>
              </div>
        </div>
    </body>
</html>