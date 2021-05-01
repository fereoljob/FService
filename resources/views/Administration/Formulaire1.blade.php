@extends('SupAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3>Formulaire : {{ $action }} {{ $target  }}</h3>
    </div>
    <div class="card-body">
        <form action={{ $action }} method="POST">
            <table>
            <div class="form-group">
                <tr>
                    <td><label for="nom">Nom </label></td>
                    <td><input type="text" name="nom" class="form-control" placeholder="Votre nom" autofocus/></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="prenom">Prenom</label></td>
                    <td><input type="text" name="prenom" class="form-control" placeholder="Votre prénom"/></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" class="form-control" placeholder="Votre email" /></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="mdp" >Mot de passe</label></td>
                    <td><input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" /></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="type">Type d'utilisateur</label></td>
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
        <input type="hidden" name="action" value={{ $action }} />
        <input type="hidden" name="target" value= {{ $target }} />
        </form>
    </div>
</div>
@endsection