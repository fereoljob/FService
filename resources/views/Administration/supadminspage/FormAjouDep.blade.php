@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Ajout <span class="target">(Départements)</span></h3>
        
    </div>
    <div class="card-body">
        <form action="AjouDepForm" method="POST">
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
                    <td><label for="nom"><strong>nom :</strong> </label></td>
                    <td><input type="text" name="nom" class="form-control" placeholder="Nom département" autofocus/></td>
                </tr>
                <span class="text-danger">@error('nom') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="responsable"><strong>Responsable :</strong></label></td>
                    <td><select name="responsable">
                        @foreach ($responsables as $responsable)
                            <option value= {{ $responsable->id_professeur}} >{{ $responsable->nom_professeur}} {{ $responsable->prenom_professeur}} </option>
                        @endforeach    
                    </select></td>
                </tr>
                <span class="text-danger">@error('responsable') {{ $message }} @enderror</span>
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