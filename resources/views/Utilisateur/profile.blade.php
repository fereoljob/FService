@extends('Utilisateur/gabarit_profile')
@section('contenu')
<hr class="separation"/>
<div class="generation  mt-5">
    <table  cellspacing="1" cellpadding="1" id="table_master" >
        <tr id="niv"></tr>
        <tr class="sem"></tr>
        <tr class="mat"></tr>
        <tr class="partie"></tr>
        <tr class="heures"></tr>
        <tr class ="groupe"></tr>
        <tr class ="edt"></tr>
        <tr class="details"></tr>
    </table>
</div>
@php
    if(isset($prof))
    {
        echo "<script>";
        echo "let leprof=";
        echo json_encode($prof);
        echo ";";
        echo "</script>";
    } 
    else
    {
        echo "<script>";
        echo "let leprof";
        echo ";";
        echo "</script>";
    }
@endphp

<script type="text/javascript">
    let lesSelect =  document.querySelector("#categorie").options;
    let laval = lesSelect[lesSelect.selectedIndex].value;
    $(document).ready(function(){
        $('#categorie').change(function(){
        var categorieID = $(this).val();
        if(categorieID){
            $.ajax({
                type:"GET",
                url:"/Categorie/?id_categorie="+categorieID,
                success: function(res){
                    if(res){
                        traitementCat(res);
                        let mats = res.matieres;
                        edition(mats);
                        AffichageAffect(res);
                       
                    }else{
                        $("#niveau").empty();
                    }
                }
               
            });
        }else{
            $("#niveau").empty();
            $("#semestre").empty();
        }
    });
    $("#categorie").trigger("change",[laval]);
    $('#niveau').change(function(){
        var niveauID = $(this).val();
        if(niveauID){
            if(niveauID=="tous")
            {
                $("#categorie").trigger("change",[laval]);
                $("#semestre").empty();
            }
            else
            {
                $.ajax({
                type:"GET",
                url:"/niveauEtude/?id_niveau="+niveauID,
                success: function(res){
                    if(res){
                        traitementNiv(res);
                        let mats = res.matieres;
                        edition(mats);
                        AffichageAffect(res);
                    }else{
                        $("#semestre").empty();
                    }
                }
            });}
        }else{
            $("#semestre").empty();
        }
    });
    $('#semestre').change(function(){
        var semestreID = $(this).val();
        if(semestreID){
            if(semestreID=="tous")
            {
                let lesSelect2 =  document.querySelector("#niveau").options;
                let laval2 = lesSelect2[lesSelect2.selectedIndex].value;
                $("#niveau").trigger("change",[laval2]);
            }
            else
            {
                $.ajax({
                type:"GET",
                url:"/Semestre/?id_semestre="+semestreID,
                success: function(res){
                    if(res){
                        traitementSem(res);
                        let mats = res.matieres;
                        edition(mats);
                        AffichageAffect(res);
                    }
                }
            });}
        }
    });
    });
</script>
@endsection 