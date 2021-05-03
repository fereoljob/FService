@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification  <span class="target">(Admins/Super Admins)</span></h3>
    </div>
    <div class="card-body">
        <form action="ModiEnvoi" method="POST">
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
                        <td><label for="id"><strong>id</strong> </label></td>
                        <td><input type="text" name="id" class="form-control" placeholder="id utilisateur" autofocus/></td>
                    </tr>
                    <span class="text-danger">@error('nom') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="nom"><strong>Nom </strong></label></td>
                        <td><input type="text" name="nom" class="form-control" placeholder="Nom" autofocus/></td>
                    </tr>
                    <span class="text-danger">@error('nom') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="prenom"><strong>Prenom</strong></label></td>
                        <td><input type="text" name="prenom" class="form-control" placeholder="Prénom"/></td>
                    </tr>
                    <span class="text-danger">@error('prenom') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="email"><strong>Email</strong></label></td>
                        <td><input type="email" name="email" class="form-control" placeholder="Email" /></td>
                    </tr>
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="mdp" ><strong>Mot de passe</strong></label></td>
                        <td><input type="password" name="mdp" class="form-control" placeholder="Mot de passe" /></td>
                    </tr>
                    <span class="text-danger">@error('mdp') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="type"><strong>Type d'utilisateur</strong></label></td>
                        <td><select name="type" class="form-control">
                                <option value="Professeur" selected>Professeur</option>
                                <option value="membre_Administratif">Membre Administratif</option>
                                <option value="Chef_departement">Chef département</option>
                                <option value="responsable_matiere">Responsable matiere</option>
                                <option value="responsable_annee">Responsable année</option>
                            </select></td>
                    </tr>
                </div>
                <tr>
                    <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary">Soumettre</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
@php
    $fic = "FormModAdm";
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