@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification</h3>
    </div>
    <div class="card-body">
        <form action="SuppEnvoi" method="POST">
            @csrf
            <table>
                <div class="form-group">
                    <tr>
                        <td><label for="id"><strong>id</strong> </label></td>
                        <td><input type="text" name="id" class="form-control" placeholder="id utilisateur" autofocus/></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="nom"><strong>Nom </strong></label></td>
                        <td><input type="text" name="nom" class="form-control" placeholder="Nom" autofocus/></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="prenom"><strong>Prenom</strong></label></td>
                        <td><input type="text" name="prenom" class="form-control" placeholder="Prénom"/></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="email"><strong>Email</strong></label></td>
                        <td><input type="email" name="email" class="form-control" placeholder="Email" /></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="mdp" ><strong>Mot de passe</strong></label></td>
                        <td><input type="password" name="mdp" class="form-control" placeholder="Mot de passe" /></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="type"><strong>Type d'utilisateur</strong></label></td>
                        <td><select name="type" class="form-control">
                                <option value="Professeur">Professeur</option>
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
<h3 class="mt-5">(voir liste  plus bas pour l'id)</h3>
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