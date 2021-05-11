@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-4 ">
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
                        <td><label for="type"><strong>Role</strong></label></td>
                        <td><select id="sele" class="form-control" name="type">
                            <option value="Tous" selected >Tous</option>
                            <option value="Professeur" >Professeur</option>
                            <option value="admin" >Admin</option>
                            <option value="supadmin">Super Admin</option>
                            <option value="Membre_administratif">Membre Administratif</option>
                        </select></td>
                    </tr>
                    <span class="text-danger">@error('type') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="prof"><strong>Professeur</strong></label></td>
                        <td><select id="sele2" class="form-control" name="prof">
                            @foreach($admins as $admin)
                                <option value={{ $admin->id_professeur }}>{{ $admin->nom_professeur }} {{ $admin->prenom_professeur }}</option>
                            @endforeach
                        </select></td>
                    </tr>
                    <span class="text-danger">@error('prof') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <tr>
                        <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary" >Modifier</button></td>
                    </tr>
                </div>
                </table>
        </form>
    </div>
</div>
@if(isset($tab))
@section('contenu1')
<h4> Cliquez dans les colonnes pour editer leur contenu et modifier les champs</h4>
<form action="Modifier" method="post" id="formmodif">
<table class="mt-3">
    <th>Email</th>
    <th>Mot de passe</th>
    <th>Admin</th>
    <th>Super Admin</th>
        <tr>
            <td><input type='text' name='email' value={{ $tab->email }}  /></td>
            <td><input type="text" name="Mdp" value = {{ $tab->password }}  /></td>
            <td><input type='number' name="admin" max='1' min='0' value= {{ $tab->admin }}  /></td>
            <td><input type='number' max='1' name="supadmin" min='0' value= {{ $tab->supadmin }} /></td>
            <input type="hidden" name="id_professeur" value={{ $tab->id_professeur }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button>
</form>
@endsection    
@endif

<div class="contenu1 text-center mt-3">
    @yield('contenu1')
</div>
@php
    echo "<script>";
    echo "let liste =";
    echo json_encode($Admins);
    echo ";let liste2=";
    echo json_encode($supadmins);
    echo "</script>";
@endphp
<script>
    let monselect = document.querySelector("#sele");
    let monselect2 = document.querySelector("#sele2");

    function listing()
    {
        let monselect = document.querySelector("#sele");
        let monselect2 = document.querySelector("#sele2");
        let valeur = monselect.options[monselect.selectedIndex].value;
        let enfants = monselect2.childNodes;
        for(var enf of enfants) if(enf.nodeName=="OPTION") enf.parentNode.removeChild(enf);
        if(valeur=='admin')
        {
            for(var enf of enfants) if(enf.nodeName=="OPTION") enf.parentNode.removeChild(enf);
            for(var li of liste)
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
        if(valeur=='supadmin')
        {
            for(var enf of enfants) if(enf.nodeName=="OPTION") enf.parentNode.removeChild(enf);
            for(var li of liste2)
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
    let formmod = document.querySelectorAll("#formmodif input");
    for(var enf of formmod)
    {
        enf.addEventListener('change',function(){
            let bumodi = document.querySelector("#modifi");
            bumodi.style.display="inline";
        });
    }
</script>
@endsection