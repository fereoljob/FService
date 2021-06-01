@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Suppression <span class="target">(Type d'enseignements)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormTypSupp" method="POST">
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
                        <td><label for="type"><strong>Type d'enseignement :</strong></label></td>
                        <td><select name="type"  data-toggle="tooltip" data-placement="top" title="Type d'enseignement - coefficient">
                            @foreach ($type as $ty)
                                <option value={{ $ty->id_type_enseignement }}>{{ $ty->nom_type_enseignement." - ".$ty->coefficient }}</option>
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
