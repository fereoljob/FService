@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Ajout <span class="target">(Professeurs)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormProfAjou" method="POST">
            @csrf
            <div class="resultats">
                @if (Session::get('Echec'))
                    <div class="alert alert-danger">
                        {{ Session::get('Echec') }}
                    </div>
                @endif
            </div>
            <table>
                <div class="form-group">
                    <tr>
                        <td><label for="Nom "><strong>Nom :</strong></label></td>
                        <td><input type="text" name="Nom" class="form-control" required/></td>
                    </tr>
                    <span class="text-danger">@error('Nom') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="Prenom"><strong>Prénom :</strong></label></td>
                        <td><input type="text" name="Prenom" class="form-control" required /></td>
                    </tr>
                    <span class="text-danger">@error('Prenom') {{ $message }} @enderror</span>
                </div>
            <div class="form-group">
                <tr>
                    <td><label for="service"><strong>Service :</strong></label></td>
                    <td><input type="number" name="service" class="form-control" required /></td>
                </tr>
                <span class="text-danger">@error('service') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="status"><strong>Status :</strong></label></td>
                    <td><select name="status" data-toggle="tooltip" data-placement="left" title="(nom du statut (nombre heure - nombre heure max)">
                        @foreach ($status as $stat)
                            <option value={{$stat->id_statut }}>{{ $stat->nom_statut." (".$stat->nbre_heure." - ".$stat->nbre_heure_max.")" }}</option>
                        @endforeach</select></td>
                </tr>
                <span class="text-danger">@error('status') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="departement"><strong>Département :</strong></label></td>
                    <td><select name="departement">
                        @foreach ($departements as $dep)
                            <option value={{$dep->id_departement }}>{{ $dep->nom_departement }}</option>
                        @endforeach</select></td>
                </tr>
                <span class="text-danger">@error('departement') {{ $message }} @enderror</span>
            </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary">Ajouter</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@endsection