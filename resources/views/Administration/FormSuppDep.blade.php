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
            <div class="form-group">
                <label for="id"><strong>id</strong> </label>&nbsp; &nbsp;
                <input type="text" name="id" class="form-control" placeholder="id_departement" autofocus/>
                <span class="text-danger">@error('id') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Soumettre</button>
            </div>
        </form>
    </div>
</div>
@php
    $fic="FormSuppDep";
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
