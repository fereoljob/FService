@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Suppression <span class="target">(Départements)</span></h3>
    </div>
    <div class="card-body">
        <form action="SuppDepForm" method="POST">
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
                <td><label for="id"><strong>Nom département :</strong> </label></td>
                <td><select name="id" >
                    @foreach ($departements as $departement)
                        <option value= {{ $departement->id_departement }} > {{ $departement->nom_departement }}</option>
                    @endforeach
                </select></td>
                <span class="text-danger">@error('id') {{ $message }} @enderror</span>
                </tr>
            </div>
            <div class="form-group"><tr>
                <td colspan="2" class="text-center" ><button type="submit" class="btn btn-danger" >Supprimer</button></td></tr>
            </div>
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
