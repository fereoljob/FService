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
                        <td><label for="type"><strong>Type d'utilisateur</strong></label></td>
                        <td><select name="type" id="sele" class="form-control">
                                <option value="Professeur" selected>Professeur</option>
                                <option value="Membre_administratif">Membre Administratif</option>
                            </select></td>
                    </tr>
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
                    <td><label for="prof"><strong>Professeur</strong></label></td>
                    <td><select class="form-control" id="sele2" name="prof">
                        @foreach($admins as $admin)
                            <option value={{ $admin->id_professeur }}>{{ $admin->nom_professeur }} {{ $admin->prenom_professeur }}</option>
                        @endforeach
                    </select></td>
                </tr>
                <span class="text-danger">@error('prof') {{ $message }} @enderror</span>
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
@php
    echo "<script>";
    echo "let liste =";
    echo json_encode($admins);
    echo ";let liste2 = ";
    echo json_encode(array());
    echo "</script>";
@endphp
<script>
    let monselect = document.querySelector("#sele");
    function listing()
    {
        let monselect = document.querySelector("#sele");
        let monselect2 = document.querySelector("#sele2");
        let valeur = monselect.options[monselect.selectedIndex].value;
        if(valeur=="Professeur")
        {
            for(let i=0;i < monselect2.length; i++)
            {
                monselect2.remove(i);
            }
            for(let li of liste)
            {
                if(li instanceof Object)
                {
                    let opt = document.createElement("option");
                    opt.value = li.id_professeur;
                    opt.innerHTML = li.nom_professeur+" "+li.prenom_professeur;
                    monselect2.appendChild(opt);
                }
            }
        }
        if(valeur=="Membre_administratif")
        {
            for(let i=0;i < monselect2.length; i++)
            {
                monselect2.remove(i);
            }
            for(let li of liste2)
            {
                if(li instanceof Object)
                {
                    let opt = document.createElement("option");
                    opt.value = li.id_professeur;
                    opt.innerHTML = li.nom_professeur+" "+li.prenom_professeur;
                    monselect2.appendChild(opt);
                }
            }
        }
    }
    monselect.addEventListener('change',listing);
</script>
@endsection