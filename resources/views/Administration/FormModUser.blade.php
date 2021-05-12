@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification  <span class="target">(Utilisateurs)</span></h3>
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
                        <td colspan="2" class="text-center"><button type="submit" id="bouton" class="btn btn-primary" >Modifier</button></td>
                    </tr>
                </div>
                </table>
        </form>
    </div>
</div>
@if(isset($tab))
@section('contenu1')
<h4> Changez la valeur des informations à modifier</h4>
<form action="ValidationMod" method="post" id="formmodif">
<table class="mt-3">
    <th>Email</th>
    <th>Mot de passe</th>
    <th>Admin</th>
    <th>Super Admin</th>
        <tr>
            <td><input type='text' name='email' value={{ $tab->email }}  /></td>
            <td><input type="text" name="Mdp" value = {{ $tab->password }}  /></td>
            <td><input type=radio name="admin" id="une" value=1  /> Oui &nbsp; &nbsp; <input type="radio" id="deux" name="admin" value=0 /> Non</td>
            <td><input type=radio name="supadmin" id="trois" value=1 /> Oui  &nbsp; &nbsp; <input type="radio" id="quatre" name="supadmin" value=0 /> Non</td>
            <input type="hidden" name="id_user" value={{ $tab->id_user }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<a href="Modi" ><button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button></a>
</form>
@php
    echo "<script>";
    echo "let tab =";
    echo json_encode($tab).";";
    echo "</script>";
@endphp
<script>
    let rad1 = document.querySelector("#une");
    let rad2 = document.querySelector("#deux");
    let rad3 = document.querySelector("#trois");
    let rad4 = document.querySelector("#quatre");
    if(tab.admin==1)
        rad1.checked=true;
    else
        rad2.checked=true;
    if(tab.supadmin==1)
        rad3.checked=true;
    else
        rad4.checked=true;

</script>
@endsection    
@endif

<div class="contenu1 text-center mt-3">
    @yield('contenu1')
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
    alert('Modification Reussie');
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
    let lesinput = document.querySelectorAll(".contenu1 input");
    for(lesinpu of lesinput)
    {
        lesinpu.addEventListener("change",function(e){
            let monbou = document.querySelector("#modifi");
            monbou.style.display="inline";
        });
    }
</script>
@endsection