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
            <table>
            <div class="form-group">
                <tr>
                    <td><label for="type"><strong>Role</strong></label></td>
                    <td><select class="form-control" name="type">
                        <option value="admin" selected>Admin</option>
                        <option value="supadmin">Super Admin</option>
                    </select></td>
                </tr>
                <span class="text-danger">@error('type') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="prof"><strong>Nom et prenom</strong></label></td>
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
                    <td><button type="submit" class="btn btn-primary" >Supprimer</button></td>
                </tr>
            </div>
        </form>
    </div>
</div>
@endsection