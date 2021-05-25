@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Suppression <span class="target">(Professeurs)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormProfSupp" method="POST">
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
                        <td><label for="id_professeur"><strong>Professeur :</strong></label></td>
                        <td><select name="id_professeur"  >
                            @foreach ($professeurs as $profs)
                                <option value={{ $profs->id_professeur }} >{{ $profs->nom_professeur." ".$profs->prenom_professeur  }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_professeur') {{ $message }} @enderror</span>
                </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-danger">Supprimer</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@endsection