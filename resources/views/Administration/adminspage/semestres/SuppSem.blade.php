@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> suppression <span class="target">(Semestres)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormSemSupp" method="POST">
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
                        <td><label for="id_semestre"><strong>Semestre :</strong></label></td>
                        <td><select name="id_semestre"  >
                            @foreach ($semestre_niv as $sem_niv)
                                <option value={{ $sem_niv->id_semestre }} >{{ $sem_niv->nom_semestre." ".$sem_niv->nom_niveau  }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_semestre') {{ $message }} @enderror</span>
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
