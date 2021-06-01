@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Ajout <span class="target">(Matières)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormMatAjou" method="POST">
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
                        <td><label for="Nom"><strong>Nom :</strong></label></td>
                        <td><input type="text" name="Nom" class="form-control" /></td>
                    </tr>
                    <span class="text-danger">@error('Nom') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="id_semestre"><strong>Semestre :</strong></label></td>
                        <td><select name="id_semestre"  >
                            @foreach ($semestre_niv as $sem_niv)
                                <option value={{ $sem_niv->id_semestre }} >{{ $sem_niv->nom_semestre." ".$sem_niv->nom_niveau  }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_semestre') {{ $message }} @enderror</span>
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
@if (isset($succes))
<script type='text/javascript' >
    alert('insertion Reussie');
</script>"
@endif
@endsection
