@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Matières)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormMatMod" method="POST">
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
                        <td><select name="id_matiere"  >
                            @foreach ($matieres as $mats)
                                <option value={{ $mats->id_matiere }} >{{ $mats->nom_matiere }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_matiere') {{ $message }} @enderror</span>
                </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-success">Modifier</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@endsection