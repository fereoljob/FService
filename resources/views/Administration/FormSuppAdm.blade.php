@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Suppression <span class="target">(Admins/Super Admins)</span></h3>
    </div>
    <div class="card-body">
        <form action="SuppEnvoi" method="POST">
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
                <input type="text" name="id" class="form-control" placeholder="id utilisateur" autofocus/>
                <span class="text-danger">@error('id') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Soumettre</button>
            </div>
        </form>
    </div>
</div>
@php
    $fic="FormSuppAdm";
@endphp
<h3 class="mt-5">(voir liste  plus bas pour l'id)</h3>
@endsection

@section('contenu1')
<p style="font-size: 25px;font-weight:bold;">Selectionner la liste que vous voulez afficher et cliquez sur le bouton 'Afficher' pour avoir une vue sur son contenu</p>
<form action="listeAdm" method="POST">
    @csrf
    <div class="form-group">
        <label for="table"><span style="font-size: 2rem; font-weight:bold;">Liste</span></label>&nbsp;&nbsp;
        <select name="table" class="form-control col-md-4   ">
            <option value="admin">Administrateur</option>
            <option value="supadmin">Super Administrateur</option>
        </select>
        <input type="hidden" name="fic" value={{ $fic }} />
    </div>
    <button type="submit" class="btn btn-primary">Afficher</button>
</form>
@endsection

@if (isset($liste))
@section('contenu2')
    <table class="text-center mt-3" style="font-size:20px">
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Type d'utilisateur</th>
        @foreach ($liste as $item)
            <tr>
                @foreach ($item as $key=>$ite)
                @if ($key!='password' && $key!='admin' && $key!='supadmin')
                    <td>{{$ite}}</td>
                @endif
                @endforeach
            </tr>
        @endforeach
    </table>
@endsection
    
@endif