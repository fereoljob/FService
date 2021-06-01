@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Niveaux d'études)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormNivMod" method="POST">
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
                        <td><label for="id_niveau"><strong>Niveau :</strong></label></td>
                        <td><select name="id_niveau"  >
                            @foreach ($niv_etudes as $nivs)
                                <option value={{ $nivs->id_niveau }} >{{ $nivs->nom_niveau }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_niveau') {{ $message }} @enderror</span>
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
<form action="ModificationNiv" method="post" >
@csrf
<table class="mt-3">
    <th>Nom</th>
    <th>Categorie</th>
    <th>Responsable
        <tr>
            <td><input type='text' name='nom' value="{{ $modification[0]->nom_niveau }}" /></td>
            <td><select name="categorie" id="categories" >
                @foreach ($categories as $categorie)
                    <option value= {{ $categorie->id_categorie }} > {{ $categorie->nom_categorie }}</option>
                @endforeach
                </select></td>
                <td><select name="professeur" id="professeurs" >
                    @foreach ($professeurs as $professeur)
                        <option value= {{ $professeur->id_professeur }} > {{ $professeur->nom_professeur." ". $professeur->prenom_professeur }}</option>
                    @endforeach
                    </select></td>
            <input type="hidden" name="id_niveau" value={{ $modification[0]->id_niveau }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<a href="ModNiv" ><button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button></a>
</form>
@php
    echo "<script>";
    echo "let tab =";
    echo json_encode($modification).";";
    echo "</script>";
@endphp
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
