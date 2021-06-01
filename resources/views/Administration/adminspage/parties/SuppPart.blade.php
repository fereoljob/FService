@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Suppression <span class="target">(Parties)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormPartSupp" method="POST">
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
                        <td><label for="parties"><strong>Partie :</strong></label></td>
                        <td><select name="parties" data-toggle="tooltip" data-placement="left" title="nom matière-type-semestre-niveau">
                            @foreach ($parties as $partie)
                                <option value={{ $partie->id_partie }}>{{ $partie->nom_matiere."-".$partie->nom_type_enseignement."-".$partie->nom_semestre."-".$partie->nom_niveau }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('categorie') {{ $message }} @enderror</span>
                </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-danger">Supprimer</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@if (isset($succes))
<script type='text/javascript' >
    alert('Suppression Reussie');
</script>"
@endif
@endsection
