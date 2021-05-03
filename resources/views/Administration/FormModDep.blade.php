@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Départements)</span></h3>
    </div>
    <div class="card-body">
        <form action="ModDepForm" method="POST">
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
                        <td><label for="id"><strong>id</strong> </label></td><td>
                    <input type="text" name="id" class="form-control" placeholder="id_departement" autofocus/></td>
                    </tr>
                    <span class="text-danger">@error('id') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="nom"><strong>nom</strong> </label></td>
                        <td><input type="text" name="nom" class="form-control" placeholder="Nom" autofocus/></td>
                    </tr>
                    <span class="text-danger">@error('nom') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="responsable"><strong>Responsable</strong></label></td>
                        <td><input type="text" name="responsable" class="form-control" placeholder="id responsable" /></td>
                    </tr>
                    <span class="text-danger">@error('responsable') {{ $message }} @enderror</span>
                </div>
                    <tr>
                    <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary">Soumettre</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
@php
    $fic="FormModDep";
@endphp
<h3 class="mt-5">(voir liste  plus bas pour l'id)</h3>
@endsection

@section('contenu1')
<p style="font-size: 25px;font-weight:bold;">Choisissez la table à afficher et valider</p>
<form action="listeDep" method="POST">
    @csrf
    <div class="form-group">
        <label for="table"><span style="font-size: 2rem; font-weight:bold;">Liste</span></label>&nbsp;&nbsp;
        <select name="table" class="form-control col-md-4   ">
            <option value="Professeur">Professeur</option>
            <option value="Departement">Departement</option>
        </select>
        <input type="hidden" name="fic" value={{ $fic }} />
    </div>
    <button type="submit" class="btn btn-primary">Afficher</button>
</form>
@endsection

@if (isset($liste))
@section('contenu2')
    @if ($infotable=="Professeurs")
    <table class="text-center mt-3" style="font-size:20px">
        <th>Id professeur</th>
        <th>Nom professeur</th>
        <th>Prenom professeur</th>
        <th>id_departement</th>
        @foreach ($liste as $item)
            <tr>
                @foreach ($item as $key=>$ite)
                @if ($key!='service' && $key!='id_statut')
                    <td>{{$ite}}</td>
                @endif
                @endforeach
            </tr>
        @endforeach
    </table>
    @else
    <table class="text-center mt-3" style="font-size:20px">
        <th>Id departement</th>
        <th>Nom departement</th>
        <th>Responsable</th>
        @foreach ($liste as $item)
            <tr>
                @foreach ($item as $ite)
                    <td>{{ $ite }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    @endif
@endsection
    
@endif
