@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Professeurs)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormProfMod" method="POST">
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
                        <td><label for="id_professeur"><strong>Professeur :</strong></label></td>
                        <td><select name="id_professeur"  >
                            @foreach ($professeurs as $profs)
                                <option value={{ $profs->id_professeur }} >{{ $profs->nom_professeur." ".$profs->prenom_professeur  }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_professeur') {{ $message }} @enderror</span>
                </div>
            <tr>
                <td colspan="2" class="text-center"><button type="submit" class="btn btn-success">Modifier</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
@if(isset($modification))
@section('contenu1')
<h4> Changez la valeur des informations à modifier</h4>
<form action="ModificationProf" method="post" >
@csrf
<table class="mt-3">
    <th>Nom</th>
    <th>Prénom</th>
    <th>Service</th>
    <th>Status</th>
    <th>Département</th>
        <tr>
            <td><input type='text' name='nom' value="{{ $modification[0]->nom_professeur }}"  /></td>
            <td><input type="text" name="prenom" value="{{ $modification[0]->prenom_professeur }}" /></td>
            <td><input type="number" name="service" value={{ $modification[0]->service }} /></td>
            <td><select name="status" id="status" data-toggle="tooltip" data-placement="left" title="(nom du statut (nombre heure - nombre heure max)">
                @foreach ($status as $stat)
                    <option value={{ $stat->id_statut }} >{{ $stat->nom_statut." (".$stat->nbre_heure." - ".$stat->nbre_heure_max.")" }}</option>
                @endforeach</select></td>
            <td><select name="departement" id="departements" >
                @foreach ($departements as $departement)
                    <option value= {{ $departement->id_departement }} > {{ $departement->nom_departement }}</option>
                @endforeach
                </select></td>
            <input type="hidden" name="id_professeur" value={{ $modification[0]->id_professeur }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<a href="ModProf" ><button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button></a>
</form>
@php
    echo "<script>";
    echo "let tab =";
    echo json_encode($modification).";";
    echo "</script>";
@endphp
<script>
    let status = document.querySelector("#status");
    let selectStatut = document.createElement("option");
    if(tab.id_statut==null)
    {
        selectStatut.innerHTML="Null";
        selectStatut.selected = "selected";
        status.add(selectStatut);
    }
    else
    {
        selectStatut.value = tab.id_statut;
        selectStatut.selected = "selected";
        selectStatut.innerHTML =
    }
</script>
@endsection
@endif


<div class="contenu1 text-center mt-3">
    @yield('contenu1')
</div>
@if (isset($succes))
<script type='text/javascript' >
    alert('Modification Reussie');
</script>
@endif
<script>

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
