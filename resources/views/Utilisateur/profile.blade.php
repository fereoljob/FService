@extends('Utilisateur/gabarit_profile')
@section('contenu')
<hr class="separation"/>
            <div class="table-wrapper mt-5">
                <table class="table_licence_gene" cellspacing="1" cellpadding="1" id="table_master" >
                    <tr id="niv">
                       <th rowspan="4" colspan="4"> Scolarité </th>
                    </tr>
                    <tr class="sem">
                    </tr>
                    <tr class="mat">
                    </tr>
                    <tr class="partie">
                    </tr>
                    <tr class="heures">
                        <td rowspan="3" colspan="2"> Licences </td>
                        <td colspan="2"> Heure </td>
                    </tr>
                    <tr class = "groupe">
                        <td colspan="2"> Nbr de groupes </td>
                    </tr>
                    <tr class = "edt">
                        <td colspan="2"> EDT </td>
                    </tr>
                    <tr class="details">
                        <td> </td>
                        <td> Service </td>
                        <td> Difference </td>
                        <td> Charge </td>
                    </tr>
                    <tr class="prof">
                    </tr>
                </table>
            </div>
<script type="text/javascript">
    $('#categorie').change(function(){
        var categorieID = $(this).val();
        if(categorieID){
            $.ajax({
                type:"GET",
                url:"{{url('niveauEtudes')}}?id_categorie="+categorieID,
                success: function(res){
                    if(res){
                        $("#niveau").empty();
                        $("#niv").empty();
                        $(".sem").empty();
                        $(".mat").empty();
                        $(".partie").empty();
                        $(".heures").empty();
                        $(".groupe").empty();
                        $(".edt").empty();
                        $(".details").empty();
                        $(".prof").empty();
                        $("#niveau").append('<option>Niveau </option>');
                        $("#niv").append('<th rowspan="4" colspan = "4" > Scolarité </th>');
                        $.each(res.categories, function(key,value){
                            console.log(value.nom_categorie);
                            $(".heures").append('<td rowspan = "3" colspan="2">'+value.nom_categorie +'</td>');
                        });
                        $(".heures").append('<td colspan="2"> Heure </td>');
                        $(".groupe").append('<td colspan="2"> nbr de groupes </td>');
                        $(".edt").append('<td colspan="2"> EDT </td>');
                        $(".details").append('<td>  </td>');
                        $(".details").append('<td> Service </td>');
                        $(".details").append('<td> Difference </td>');
                        $(".details").append('<td> Charge </td>');
                        $.each(res.niveau_etudes,function(key,value){
                            //console.log(value.id_niveau);
                            $("#niveau").append('<option value="'+ value.id_niveau +'">'+value.nom_niveau+'</option>');
                            $("#niv").append('<th colspan="'+value.val+'">'+value.nom_niveau+'</th>');

                        });
                        $.each(res.semestres,function(key,value){
                            //console.log(value.id_semestre);
                            $(".sem").append('<td colspan="'+value.val1+'">'+value.nom_semestre+'</td>');
                        });
                       $.each(res.matieres,function(key,value){
                            //console.log(value.id_matiere);
                            $(".mat").append('<td colspan="'+value.val2+'">'+value.nom_matiere+'</td>');
                        });
                         $.each(res.parties, function(key,value){
                             //console.log(value.type_enseignement)
                            $(".partie").append('<td>'+value.nom_type_enseignement+'</td>');
                        });
                        $.each(res.heures, function(key,value){
                            $(".heures").append('<td>'+value.nbre_heure+'</td>');
                            $(".groupe").append('<td>'+value.nbre_groupe+'</td>');
                            $(".edt").append('<td> </td>');
                            $(".details").append('<td> </td>');
                        });
                        $.each(res.profs, function(key,value){
                            $(".prof").append('<tr>'+
                                '<td>'+ value.nom_professeur + ' ' + value.prenom_professeur +'</td>' +
                                '</tr>');
                        });

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
    $('#niveau').change(function(){
        var categorieID = $('#categorie').val();
        var niveauID = $(this).val();
        console.log(niveauID);
        if(niveauID){
            $.ajax({
                type:"GET",
                url:"{{url('semestres')}}?id_niveau="+niveauID,
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
                        $("#niv").append('<th rowspan="4" colspan = "4" > Scolarité </th>');
                        $("#semestre").append('<option>Semestre</option>');
                        $.each(res.categories, function(key,value){
                            console.log(value.nom_categorie);
                            $(".heures").append('<td rowspan = "3" colspan="2">'+value.nom_categorie +'</td>');
                        });
                        $(".heures").append('<td colspan="2"> Heure </td>');
                        $(".groupe").append('<td colspan="2"> Nbr de groupes </td>');
                        $(".edt").append('<td colspan="2"> EDT </td>');
                        $(".details").append('<td>  </td>');
                        $(".details").append('<td> Service </td>');
                        $(".details").append('<td> Difference </td>');
                        $(".details").append('<td> Charge </td>');
                        $.each(res.niveau_etudes,function(key,value){
                           // console.log(value.val);
                            $("#niv").append('<th colspan="'+value.val+'">'+ value.nom_niveau + '</th>');
                            //$("#semestre").append('<option>'+ value.nom_semestre+'</option>');
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
                            $(".edt").append('<td> </td>');
                            $(".details").append('<td> </td>');
                        });
                    }else{
                        $("#semestre").empty();
                    }
                }
            });
        }else{
            $("#semestre").empty();
        }
    });

    $('#semestre').change(function(){
        var semestreID = $(this).val();
       // console.log(semestreID);
        if(semestreID){
            $.ajax({
                type:"GET",
                url:"{{url('affichage')}}?id_semestre="+semestreID,
                success: function(res){
                    if(res){
                        $("#affichage").empty();
                        $("#niv").empty();
                        $(".sem").empty();
                        $(".mat").empty();
                        $(".partie").empty();
                        $(".heures").empty();
                        $(".groupe").empty();
                        $(".edt").empty();
                        $(".details").empty();
                        $("#niv").append('<th rowspan="4" colspan = "4" > Scolarité </th>');
                        $("#affichage").append('<option>Affichage</option>');
                        $.each(res.categories, function(key,value){
                            console.log(value.nom_categorie);
                            $(".heures").append('<td rowspan = "3" colspan="2">'+value.nom_categorie +'</td>');
                        });
                        $(".heures").append('<td colspan="2"> Heure </td>');
                        $(".groupe").append('<td colspan="2"> Nbr de groupes </td>');
                        $(".edt").append('<td colspan="2"> EDT </td>');
                        $(".details").append('<td>  </td>');
                        $(".details").append('<td> Service </td>');
                        $(".details").append('<td> Difference </td>');
                        $(".details").append('<td> Charge </td>');
                        $.each(res.niveau_etudes,function(key,value){

                            $("#niv").append('<th colspan="'+value.val+'">'+ value.nom_niveau + '</th>');
                        });
                        $.each(res.semestres, function(key,value){
                            $(".sem").append('<td colspan="'+value.val1+'">'+value.nom_semestre+'</td>');
                        });
                        $.each(res.matieres, function(key,value){
                            $(".mat").append('<td colspan= "'+value.val2+'">'+value.nom_matiere+'</td>' )
                        });
                        $.each(res.parties, function(key,value){
                            console.log(value.nom_type_enseignement);
                            $(".partie").append('<td>'+value.nom_type_enseignement+'</td>');
                        });
                        $.each(res.heures, function(key,value){
                            $(".heures").append('<td>'+value.nbre_heure+'</td>');
                            $(".groupe").append('<td>'+value.nbre_groupe+'</td>');
                            $(".edt").append('<td> </td>');
                            $(".details").append('<td> </td>');
                        });
                    }else{
                        $("#affichage").empty();
                    }
                }
            });
        }else{
            $("#affichage").empty();
        }
    });
</script>
@endsection
