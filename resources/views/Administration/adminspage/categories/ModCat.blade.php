@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Categories)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormCatMod" method="POST">
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
                        <td><label for="categorie"><strong>Catégorie :</strong></label></td>
                        <td><select name="categorie">
                            @foreach ($categories as $cat)
                                <option value={{ $cat->id_categorie }}>{{ $cat->nom_categorie }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('categorie') {{ $message }} @enderror</span>
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
<form action="ModificationCat" method="post" >
@csrf
<table class="mt-3">
    <th>Nom</th>
        <tr>
            <td><input type='text' name='nom' value="{{ $modification[0]->nom_categorie }}"  /></td>
            <input type="hidden" name="id_categorie" value={{ $modification[0]->id_categorie }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<a href="ModCat" ><button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button></a>
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
