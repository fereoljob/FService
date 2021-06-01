@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Matières)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormMatMod" method="POST">
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
                        <td><label for="id_matiere"><strong>Matière :</strong></label></td>
                        <td><select name="id_matiere"  >
                            @foreach ($matieres as $mats)
                                <option value={{ $mats->id_matiere }} >{{ $mats->nom_matiere }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_matiere') {{ $message }} @enderror</span>
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
<form action="ModificationMat" method="post" >
@csrf
<table class="mt-3">
    <th>Nom</th>
    <th>Semestre</th>
    <th>Responsable</th>
    <th>Département</th>
        <tr>
            <td><input type='text' name='nom' value="{{ $modification[0]->nom_matiere }}"  /></td>
            <td><select name="semestres" id="semestres" data-toggle="tooltip" data-placement="left" >
                @foreach ($semestres as $sem)
                    <option value={{ $sem->id_semestre }} >{{ $sem->nom_semestre }}</option>
                @endforeach</select></td>
                <td><select name="professeurs" id="professeurs" data-toggle="tooltip" data-placement="left" >
                    @foreach ($professeurs as $prof)
                        <option value={{ $prof->id_professeur }} >{{ $prof->nom_professeur." ".$prof->prenom_professeur }}</option>
                    @endforeach</select></td>
            <td><select name="departements" id="departements" >
                @foreach ($departements as $departement)
                    <option value= {{ $departement->id_departement }} > {{ $departement->nom_departement }}</option>
                @endforeach
                </select></td>
            <input type="hidden" name="id_matiere" value={{ $modification[0]->id_matiere }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<a href="ModMat" ><button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button></a>
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
