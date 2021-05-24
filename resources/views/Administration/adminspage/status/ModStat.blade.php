@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Status)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormStatMod" method="POST">
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
                        <td><label for="infostatus"><strong>Status :</strong></label></td>
                        <td><select name="infostatus" data-toggle="tooltip" data-placement="left" title="(nom du statut (nombre heure - nombre heure max)">
                            @foreach ($status as $stat)
                                <option value={{ $stat->id_statut }} >{{ $stat->nom_statut." (".$stat->nbre_heure." - ".$stat->nbre_heure_max.")" }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('infostatus') {{ $message }} @enderror</span>
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
<form action="ModificationStat" method="post" >
@csrf
<table class="mt-3">
    <th>Nom</th>
    <th>Nombre heure</th>
    <th>Nombre heure max
        <tr>
            <td><input type='text' name='nom' value={{ $modification[0]->nom_statut }}  /></td>
            <td><input type="number" name="nbre_heure" value={{ $modification[0]->nbre_heure }} /></td>
            <td><input type="number" name="nbre_heure_max" value={{ $modification[0]->nbre_heure_max }} /></td>
            <input type="hidden" name="id_statut" value={{ $modification[0]->id_statut }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<a href="ModStat" ><button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button></a>
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

