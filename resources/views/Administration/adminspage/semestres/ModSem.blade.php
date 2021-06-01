@extends('baseAdmin2')
@section('contenu')
<div class="card card-form mt-4 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Modification <span class="target">(Semestres)</span></h3>
    </div>
    <div class="card-body">
        <form action="FormSemMod" method="POST">
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
                        <td><label for="id_semestre"><strong>Semestre :</strong></label></td>
                        <td><select name="id_semestre"  >
                            @foreach ($semestre_niv as $sem_niv)
                                <option value={{ $sem_niv->id_semestre }} >{{ $sem_niv->nom_semestre." ".$sem_niv->nom_niveau  }}</option>
                            @endforeach</select></td>
                    </tr>
                    <span class="text-danger">@error('id_semestre') {{ $message }} @enderror</span>
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
<form action="ModificationSem" method="post" >
@csrf
<table class="mt-3">
    <th>Semestre</th>
    <th>Niveau</th>
        <tr>
            <td><input type='text' name='semestre' value="{{ $modification[0]->nom_semestre }}"  /></td>
            <td><select name="niveau" id="niveau" data-toggle="tooltip" data-placement="left" >
                @foreach ($semestre_niv as $sem)
                    <option value={{ $sem->id_semestre }} >{{ $sem->nom_niveau }}</option>
                @endforeach</select></td>
            <input type="hidden" name="id_semestre" value={{ $modification[0]->id_semestre }} />
        </tr>
</table>
<br/>
<button type="submit" class='btn btn-primary'>Valider</button>
<a href="ModSem" ><button type="button" class='btn btn-danger' id="modifi" style="display: none">Annuler</button></a>
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
