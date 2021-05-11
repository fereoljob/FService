@extends('baseAdmin')
@section('contenu')
<div class="card card-form mt-4 ">
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
                    <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary" >Supprimer</button></td>
                </tr>
            </div>
            </table>
        </form>
    </div>
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
        else if(valeur=='supadmin')
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
        else
        {
            for(var enf of enfants) if(enf.nodeName=="OPTION") enf.parentNode.removeChild(enf);
        }
    }
    monselect.addEventListener('change',listing);
</script>
@endsection