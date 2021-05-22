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
                        <td rowspan="3" colspan="2"> Licence </td>
                        <td colspan="2"> Heure </td>
                    </tr>
                    <tr class = "groupe">
                        <td colspan="2"> nbr de groupes </td>
                    </tr>
                    <tr class = "edt">
                        <td colspan="2"> edt </td>
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
                        $(".heures").append('<td rowspan = "3" colspan="2"> Licence</td>');
                        $(".heures").append('<td colspan="2"> Heure </td>');
                        $(".groupe").append('<td colspan="2"> nbr de groupes </td>');
                        $(".edt").append('<td colspan="2"> edt </td>');
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
        var niveauID = $(this).val();
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
                        $(".heures").append('<td rowspan = "3" colspan="2"> Licence</td>');
                        $(".heures").append('<td colspan="2"> Heure </td>');
                        $(".groupe").append('<td colspan="2"> nbr de groupes </td>');
                        $(".edt").append('<td colspan="2"> edt </td>');
                        $(".details").append('<td>  </td>');
                        $(".details").append('<td> Service </td>');
                        $(".details").append('<td> Difference </td>');
                        $(".details").append('<td> Charge </td>');
                        $.each(res.niveau_etudes,function(key,value){
                            console.log(value.val);
                            $("#niv").append('<th colspan="'+value.val+'">'+ value.nom_niveau + '</th>');
                            //$("#semestre").append('<option>'+ value.nom_semestre+'</option>');
                        });
                        $.each(res.semestres, function(key,value){
                            $("#semestre").append('<option>'+ value.nom_semestre+'</option>');
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
</script>
@endsection
