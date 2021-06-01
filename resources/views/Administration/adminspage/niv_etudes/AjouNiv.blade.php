@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Ajout <span class="target">(Niveaux d'études)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormNivAjou" method="POST">
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
                    <td><label for="categorie"><strong>Catégorie :</strong></label></td>
                    <td><select name="categorie">
                        @foreach ($categories as $cat)
                            <option value={{ $cat->id_categorie }}>{{ $cat->nom_categorie }}</option>
                        @endforeach</select></td>
                </tr>
                <span class="text-danger">@error('categorie') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="responsable"><strong>Responsable :</strong></label></td>
                    <td><select name="responsable">
                        @foreach ($professeurs as $profs)
                            <option value={{ $profs->id_professeur }}>{{ $profs->nom_professeur." ".$profs->prenom_professeur }}</option>
                        @endforeach</select></td>
                </tr>
                <span class="text-danger">@error('responsable') {{ $message }} @enderror</span>
            </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary">Ajouter</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@if (isset($succes))
<script type='text/javascript' >
    alert('insertion Reussie');
</script>"
@endif
@endsection
