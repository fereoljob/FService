@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Départements)</span></h3>
    </div>
    <div class="card-body">
        <form action="ModDepForm" method="POST">
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
                        <td><label for="id"><strong>Nom département :</strong> </label></td>
                        <td><select name="id" >
                        @foreach ($departements as $departement)
                            <option value= {{ $departement->id_departement }} > {{ $departement->nom_departement }}</option>
                        @endforeach
                        </select></td>
                        <span class="text-danger">@error('id') {{ $message }} @enderror</span>
                    </tr>
                </div>
                <div class="form-group"><tr>
                    <td colspan="2" class="text-center" ><button type="submit" class="btn btn-success" >Modifier</button></td></tr>
                </div>
            </table>
        </form>
    </div>
</div>
@if(isset($tab))
@section('contenu1')
<h4> Changez la valeur des informations à modifier</h4>
<form action="ModificationDep" method="post" >
@csrf
<table class="mt-3">
    <th>Nom</th>
    <th>Responsable</th>
        <tr>
            <td><input type='text' name='nom' value={{ $tab[0]->nom_departement }}  /></td>
            <td><select id ="responsable" name="responsable">
                @foreach ($responsables as $responsable)
                    <option value= {{ $responsable->id_professeur}} >{{ $responsable->nom_professeur}} {{ $responsable->prenom_professeur}} </option>
                @endforeach    
            </select></td>
            <input type="hidden" name="id_departement" value={{ $tab[0]->id_departement }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<a href="ModiDep" ><button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button></a>
</form>
@php
    echo "<script>";
    echo "let tab =";
    echo json_encode($tab).";";
    echo "</script>";
@endphp
<script>
    let respon = document.querySelector("#responsable");
    let op = document.createElement("option");
    op.value=tab[0].responsable_departement;
    op.innerHTML = tab[0].nom_professeur+" "+tab[0].prenom_professeur;
    op.selected="selected";
    respon.add(op);
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