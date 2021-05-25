@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Suppression <span class="target">(Niveaux d'études)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormNivSupp" method="POST">
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
                        <td><label for="id_niveau"><strong>Niveau :</strong></label></td>
                        <td><select name="id_niveau"  >
                            @foreach ($niv_etudes as $nivs)
                                <option value={{ $nivs->id_niveau }} >{{ $nivs->nom_niveau }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_niveau') {{ $message }} @enderror</span>
                </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-danger">Supprimer</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@endsection