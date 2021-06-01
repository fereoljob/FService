@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Ajout <span class="target">(Semestres)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormSemAjou" method="POST">
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
                        <td><label for="Nom "><strong>Nom :</strong></label></td>
                        <td><input type="text" name="Nom" class="form-control" required/></td>
                    </tr>
                    <span class="text-danger">@error('Nom') {{ $message }} @enderror</span>
                </div>
            <div class="form-group">
                <tr>
                    <td><label for="niveau"><strong>Niveau :</strong></label></td>
                    <td><select name="niveau">
                        @foreach ($niv_etudes as $niv)
                            <option value={{ $niv->id_niveau }}>{{ $niv->nom_niveau }}</option>
                        @endforeach</select></td>
                </tr>
                <span class="text-danger">@error('niveau') {{ $message }} @enderror</span>
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
