@extends('baseAdmin')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Suppression <span class="target">(Utilisateurs)</span></h3>
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
                        <option value="Professeurs" >Professeur</option>
                        <option value="admins" >Administrateurs</option>
                        <option value="supadmins">Super Administrateurs</option>
                        <option value="Membre_administratif">Membre Administratif</option>
                    </select></td>
                </tr>
                <span class="text-danger">@error('type') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td><label for="prof"><strong>Professeur</strong></label></td>
                    <td><select id="sele2" class="form-control" name="prof">
                        @foreach($professeurs as $professeur)
                            <option value={{ $professeur->email }}>{{ $professeur->nom_professeur }} {{ $professeur->prenom_professeur }}</option>
                        @endforeach
                        @foreach ($membres as $membre)
                            <option value= {{ $membre->email }} > Membre Administratif ({{ $membre->email }})</option>
                        @endforeach
                    </select></td>
                </tr>
                <span class="text-danger">@error('prof') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <tr>
                    <td colspan="2" class="text-center"><button type="submit" class="btn btn-danger" >Supprimer</button></td>
                </tr>
            </div>
            </table>
        </form>
    </div>
</div>
@php
    echo "<script>";
    echo "let professeurs =";
    echo json_encode($professeurs);
    echo ";let membres=";
    echo json_encode($membres);
    echo ";let admins=";
    echo json_encode($admins);
    echo ";let supadmins=";
    echo json_encode($supadmins).";";
    echo "</script>";
@endphp
@if (isset($succes))
<script type='text/javascript' >
    alert('Suppression Reussie');
</script>
@endif
<script>
    let select1 = document.querySelector("#sele");
    function Filtrer()
    {
        let select1= document.querySelector("#sele");
        let select2 = document.querySelector("#sele2");
        let valeur = select1.options[select1.selectedIndex].value;
        if(valeur=='Tous')
        {
            for(let i = select2.length-1; i>=0 ;i--)
            {
                select2.remove(i);
            }
            for(professeur of professeurs)
            {
                if(professeur instanceof Object)
                {
                    let opt = document.createElement("option");
                    opt.value=professeur.email;
                    opt.innerHTML= professeur.nom_professeur+" "+professeur.prenom_professeur;
                    select2.add(opt);
                }
            }
            for(membre of membres)
            {
                if(membre instanceof Object)
                {
                    let opt = document.createElement("option");
                    opt.value = membre.email;
                    opt.innerHTML = "Membre Administratif("+membre.email+")";
                    select2.add(opt);
                }
            }
        }
        else if(valeur=="Professeurs")
        {
            for(let i = select2.length-1; i>=0 ;i--)
            {
                select2.remove(i);
            }
            for(professeur of professeurs)
            {
                if(professeur instanceof Object)
                {
                    let opt = document.createElement("option");
                    opt.value=professeur.email;
                    opt.innerHTML= professeur.nom_professeur+" "+professeur.prenom_professeur;
                    select2.add(opt);
                }
            }
        }
        else if(valeur=="Membre_administratif")
        {
            for(let i = select2.length-1; i>=0 ;i--)
            {
                select2.remove(i);
            }
            for(membre of membres)
            {
                if(membre instanceof Object)
                {
                    let opt = document.createElement("option");
                    opt.value = membre.email;
                    opt.innerHTML = "Membre Administratif("+membre.email+")";
                    select2.add(opt);
                }
            }
        }
        else if(valeur=="admins")
        {
            for(let i = select2.length-1; i>=0 ;i--)
            {
                select2.remove(i);
            }
            for(admin of admins)
            {
                if(admin instanceof Object)
                {
                    let opt = document.createElement("option");
                    opt.value=admin.email;
                    opt.innerHTML= admin.nom_professeur+" "+admin.prenom_professeur;
                    select2.add(opt);
                }
            }
        }
        else if(valeur=="supadmins")
        {
            for(let i = select2.length-1; i>=0 ;i--)
            {
                select2.remove(i);
            }
            for(supadmin of supadmins)
            {
                if(supadmin instanceof Object)
                {
                    let opt = document.createElement("option");
                    opt.value=supadmin.email;
                    opt.innerHTML= supadmin.nom_professeur+" "+supadmin.prenom_professeur;
                    select2.add(opt);
                }
            }
        }
    }
    select1.addEventListener("change",Filtrer);
</script>
@endsection