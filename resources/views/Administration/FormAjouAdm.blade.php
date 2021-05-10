@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Ajout <span class="target">(Admins/Super Admins)</span></h3>
    </div>
    <div class="card-body">
        <form action="AjoutEnvoi" method="POST">
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
                        <td><label for="prof"><strong>Nom et prénom</strong></label></td>
                        <td><select class="form-control" name="prof">
                            @foreach($admins as $admin)
                                <option value={{ $admin->id_professeur }}>{{ $admin->nom_professeur }} {{ $admin->prenom_professeur }}</option>
                            @endforeach
                        </select></td>
                    </tr>
                    <span class="text-danger">@error('prof') {{ $message }} @enderror</span>
                </div>
            <div class="form-group">
                <tr>
                    <td><label for="email"><strong>Email</strong></label></td>
                    <td><input type="email" name="email" class="form-control" placeholder="Email" required /></td>
                </tr>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="mdp" ><strong>Mot de passe</strong></label></td>
                    <td><input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required/></td>
                </tr>
                <span class="text-danger">@error('mdp') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="type"><strong>Type d'utilisateur</strong></label></td>
                    <td><select name="type" class="form-control">
                            <option value="Professeur" selected>Professeur</option>
                            <option value="Membre_administratif">Membre Administratif</option>
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
                        <input type="radio" name="admin" value="SuperAdmin" />
                        <strong> Super Administrateur</strong>
                    </label></td>
                </tr>
                <span class="text-danger">@error('admin') {{ $message }} @enderror</span>
            </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary">Soumettre</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@endsection