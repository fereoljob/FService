@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Ajout </h3>
    </div>
    <div class="card-body">
        <form action="AjouEnvoi" method="POST">
            @csrf
            <table>
            <div class="form-group">
                <tr>
                    <td><label for="nom"><strong>Nom </strong></label></td>
                    <td><input type="text" name="nom" class="form-control" placeholder="Votre nom" required autofocus/></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="prenom"><strong>Prenom</strong></label></td>
                    <td><input type="text" name="prenom" class="form-control" placeholder="Votre prénom" required/></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="email"><strong>Email</strong></label></td>
                    <td><input type="email" name="email" class="form-control" placeholder="Votre email" required /></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="mdp" ><strong>Mot de passe</strong></label></td>
                    <td><input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" required/></td>
                </tr>
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
            <div class="form-groupe">
                <tr><td>
                    <label>
                        <input type="radio" name="admin" value="Admin" />
                       <strong> Administrateur</strong>
                    </label></td><td>
                    <label>
                        <input type="radio" name="admin" value="Super Admin" />
                        <strong> Super Administrateur</strong>
                    </label></td>
                </tr>
            </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary">Soumettre</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@endsection