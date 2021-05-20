@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Status)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormStatMod" method="POST">
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
                        <td><label for="infostatus"><strong>Status :</strong></label></td>
                        <td><select name="infostatus" data-toggle="tooltip" data-placement="left" title="(nom du statut (nombre heure - nombre heure max)">
                            @foreach ($status as $stat)
                                <option value={{ $stat->id_statut }} >{{ $stat->nom_statut." (".$stat->nbre_heure." - ".$stat->nbre_heure_max.")" }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('infostatus') {{ $message }} @enderror</span>
                </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-success">Modifier</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@endsection