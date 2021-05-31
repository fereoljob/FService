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
                        $("#semestre").empty();
    $("#niv").empty();
    $(".sem").empty();
    $(".mat").empty();
    $(".partie").empty();
    $(".heures").empty();
    $(".groupe").empty();
    $(".edt").empty();
    $(".details").empty();
    $(".profs").remove();
    $("#niv").append('<th rowspan="4" colspan = "4" > Scolarité </th>');
    $("#semestre").append('<option value="tous" selected="selected" >Tous</option>');
    $.each(res.categories, function(key,value){
        $(".heures").append('<td rowspan = "3" colspan="2">'+value.nom_categorie +'</td>');
    });
    $(".heures").append('<td colspan="2"> Heure </td>');
    $(".groupe").append('<td colspan="2"> Nbr de groupes </td>');
    $(".edt").append('<td colspan="2"> ETD </td>');
    $(".details").append('<td>  </td>');
    $(".details").append('<td> Service </td>');
    $(".details").append('<td> Difference </td>');
    $(".details").append('<td> Charge </td>');
    console.log(res.niveau_etudes);
    $.each(res.niveau_etudes,function(key,value){
        $("#niv").append('<th colspan="'+value.val+'">'+ value.nom_niveau + '</th>');
    });
    $.each(res.semestres, function(key,value){
        $("#semestre").append('<option value="'+ value.id_semestre+'">'+ value.nom_semestre+'</option>');
        $(".sem").append('<td colspan="'+value.val1+'">'+value.nom_semestre+'</td>');
    });
    $.each(res.matieres, function(key,value){
        $(".mat").append('<td colspan= "'+value.val2+'">'+value.nom_matiere+'</td>' )
    });
    $.each(res.parties, function(key,value){
        $(".partie").append('<td>'+value.nom_type_enseignement+'</td>');
    });
    $.each(res.heures, function(key,value){
        $(".heures").append('<td>'+value.nbre_heure+'</td>');
        $(".groupe").append('<td>'+value.nbre_groupe+'</td>');
        $(".edt").append('<td>'+value.mult+'</td>');
    });
    $.each(res.profs, function(key,value){
        let test = "";
        $.each(res.heures, function(key,value2){
            test += "<td  class='editable' id="+value.id_professeur+"-"+value2.id_matiere+"-"+value2.id_partie+" > </td>";
            });
        $("#table_master").append(
            '<tr class="profs prof_2">' +
            '<td>'+ value.nom_professeur + ' ' + value.prenom_professeur +'</td>' +
            '<td  class="valeurs_cal" id='+value.id_professeur+'-'+'service'+'>' + value.service + '</td>' +
            '<td class="valeurs_cal" id='+value.id_professeur+'-'+'difference'+'></td>' +
            '<td class="valeurs_cal" id='+value.id_professeur+'-'+'charge'+'></td>'+
            test +
            '</tr>'
        )
    });
    let mats = res.matieres;
    edition(mats);
                        //AffichageAffect(res);
                       
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
                        $("#semestre").empty();
    $("#niv").empty();
    $(".sem").empty();
    $(".mat").empty();
    $(".partie").empty();
    $(".heures").empty();
    $(".groupe").empty();
    $(".edt").empty();
    $(".details").empty();
    $(".profs").remove();
    $("#niv").append('<th rowspan="4" colspan = "4" > Scolarité </th>');
    $("#semestre").append('<option value="tous" selected="selected" >Tous</option>');
    $.each(res.categories, function(key,value){
        $(".heures").append('<td rowspan = "3" colspan="2">'+value.nom_categorie +'</td>');
    });
    $(".heures").append('<td colspan="2"> Heure </td>');
    $(".groupe").append('<td colspan="2"> Nbr de groupes </td>');
    $(".edt").append('<td colspan="2"> ETD </td>');
    $(".details").append('<td>  </td>');
    $(".details").append('<td> Service </td>');
    $(".details").append('<td> Difference </td>');
    $(".details").append('<td> Charge </td>');
    $.each(res.niveau_etudes,function(key,value){
        $("#niv").append('<th colspan="'+value.val+'">'+ value.nom_niveau + '</th>');
    });
    $.each(res.semestres, function(key,value){
        $("#semestre").append('<option value="'+ value.id_semestre+'">'+ value.nom_semestre+'</option>');
        $(".sem").append('<td colspan="'+value.val1+'">'+value.nom_semestre+'</td>');
    });
    $.each(res.matieres, function(key,value){
        $(".mat").append('<td colspan= "'+value.val2+'">'+value.nom_matiere+'</td>' )
    });
    $.each(res.parties, function(key,value){
        $(".partie").append('<td>'+value.nom_type_enseignement+'</td>');
    });
    $.each(res.heures, function(key,value){
        $(".heures").append('<td>'+value.nbre_heure+'</td>');
        $(".groupe").append('<td>'+value.nbre_groupe+'</td>');
        $(".edt").append('<td>'+value.mult+'</td>');
    });
    $.each(res.profs, function(key,value){
        let test = "";
        $.each(res.heures, function(key,value2){
            test += "<td  class='editable' id="+value.id_professeur+"-"+value2.id_matiere+"-"+value2.id_partie+" > </td>";
            });
        $("#table_master").append(
            '<tr class="profs prof_2">' +
            '<td>'+ value.nom_professeur + ' ' + value.prenom_professeur +'</td>' +
            '<td  class="valeurs_cal" id='+value.id_professeur+'-'+'service'+'>' + value.service + '</td>' +
            '<td class="valeurs_cal" id='+value.id_professeur+'-'+'difference'+'></td>' +
            '<td class="valeurs_cal" id='+value.id_professeur+'-'+'charge'+'></td>'+
            test +
            '</tr>'
        )
    });
    let mats = res.matieres;
    edition(mats);
                        //AffichageAffect(res);
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
                        $("#niv").empty();
    $(".sem").empty();
    $(".mat").empty();
    $(".partie").empty();
    $(".heures").empty();
    $(".groupe").empty();
    $(".edt").empty();
    $(".profs").remove();
    $(".details").empty();
    $("#niv").append('<th rowspan="4" colspan = "4" > Scolarité </th>');
    $.each(res.categories, function(key,value){
        $(".heures").append('<td rowspan = "3" colspan="2">'+value.nom_categorie +'</td>');
    });
    $(".heures").append('<td colspan="2"> Heure </td>');
    $(".groupe").append('<td colspan="2"> Nbr de groupes </td>');
    $(".edt").append('<td colspan="2"> ETD </td>');
    $(".details").append('<td>  </td>');
    $(".details").append('<td> Service </td>');
    $(".details").append('<td> Difference </td>');
    $(".details").append('<td> Charge </td>');
    $.each(res.niveau_etudes,function(key,val){
        $("#niv").append('<th colspan="'+value.val+'">'+ value.nom_niveau + '</th>');
    });
    $.each(res.semestres, function(key,value){
        $(".sem").append('<td colspan="'+value.val1+'">'+value.nom_semestre+'</td>');
    });
    $.each(res.matieres, function(key,value){
        $(".mat").append('<td colspan= "'+value.val2+'">'+value.nom_matiere+'</td>' )
    });
    $.each(res.parties, function(key,value){
        $(".partie").append('<td>'+value.nom_type_enseignement+'</td>');
    });
    $.each(res.heures, function(key,value){
        $(".heures").append('<td>'+value.nbre_heure+'</td>');
        $(".groupe").append('<td>'+value.nbre_groupe+'</td>');
        $(".edt").append('<td>'+value.mult+'</td>');
    });
    $.each(res.profs, function(key,value){
        let test = "";
        $.each(res.heures, function(key,value2){
            test += "<td   class='editable' id="+value.id_professeur+"-"+value2.id_matiere+"-"+value2.id_partie+" > </td>";
            });
        $("#table_master").append(
            '<tr class="profs prof_3">' +
            '<td id='+value.id_professeur+'>'+ value.nom_professeur + ' ' + value.prenom_professeur +'</td>' +
            '<td  class="valeurs_cal" id='+value.id_professeur+'-'+'service'+'>' + value.service + '</td>' +
            '<td class="valeurs_cal" id='+value.id_professeur+'-'+'difference'+'></td>' +
            '<td class="valeurs_cal" id='+value.id_professeur+'-'+'charge'+'></td>'+
            test +
            '</tr>'
        )
    });
    let mats = res.matieres;
    edition(mats);
                        //AffichageAffect(res);
                    }
                }
            });}
        }
    });
    });
</script>
@endsection


