@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Ajout <span class="target">(Parties)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormPartAjou" method="POST">
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
                        <td><label for="id_matiere"><strong>Matière :</strong></label></td>
                        <td><select name="id_matiere"  data-toggle="tooltip" data-placement="top" title="matiere - semestre - niveau" >
                            @foreach ($matieres as $mats)
                                <option value={{ $mats->id_matiere }} >{{ $mats->nom_matiere." - ".$mats->nom_semestre." - ".$mats->nom_niveau }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_matiere') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="type"><strong>Type d'enseignement :</strong></label></td>
                        <td><select name="type"  data-toggle="tooltip" data-placement="top" title="Type d'enseignement - coefficient">
                            @foreach ($type as $ty)
                                <option value={{ $ty->id_type_enseignement }}>{{ $ty->nom_type_enseignement." - ".$ty->coefficient }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('categorie') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="Nbre_heure"><strong>Nombre d'heure :</strong></label></td>
                        <td><input type="number" name="Nbre_heure" class="form-control" /></td>
                    </tr>
                    <span class="text-danger">@error('Nbre_heure') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="Nbre_grp"><strong>Nombre de groupe :</strong></label></td>
                        <td><input type="number" name="Nbre_grp" class="form-control" /></td>
                    </tr>
                    <span class="text-danger">@error('Nbre_grp') {{ $message }} @enderror</span>
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
