@extends('baseAdmin')

@section('contenu')
	<div class="mt-5">
		<h1> Cliquez sur l'action à executer dans le panneau à gauche pour faire apparaitre un formulaire</h1>
	</div>
	@php
    	$fic="Admin";
	@endphp
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
        @endforeach
@endsection
    
@endif