@extends('Utilisateur/gabarit_profile')
@section('contenu')
<hr class="separation"/>
            <div class="table-wrapper mt-5">
                <table class="table_licence_gene" cellspacing="1" cellpadding="1" id="table_master" >
                    <tr id="niv">
                       <th rowspan="4" colspan="2"> Scolarité </th>
                    </tr>
                    <tr class="sem">
                    </tr>
                    <tr class="mat">
                    </tr>
                    <tr class="partie">
                    </tr>
                    <tr class="heures">
                        <td rowspan="3"> Licence </td>
                        <td> Heure </td>
                    </tr>
                    <tr class = "groupe">
                        <td> nbr de groupes </td>
                    </tr>
                    <tr class = "edt">
                        <td> edt </td>
                    </tr>
                    <tr class="details">
                        <td> </td>
                        <td> Service </td>
                        <td> Difference </td>
                        <td> Charge </td>
                    <tr>
                </table>
            </div>
<script type="text/javascript">
    $('#categorie').change(function(e){
        var categorieID = e.target.value;
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
                        $("#niveau").append('<option>Niveau </option>');
                        $("#niv").append('<th rowspan="4" colspan = "2" > Scolarité </th>');
                        $(".heures").append('<td rowspan = "3">'+e.target.value+'</td>');
                        $(".heures").append('<td> Heure </td>');
                        $(".groupe").append('<td> nbr de groupes </td>');
                        $(".edt").append('<td> edt </td>');
                        $(".details").append('<td>  </td>');
                        $(".details").append('<td> Service </td>');
                        $(".details").append('<td> Difference </td>');
                        $(".details").append('<td> Charge </td>');

                        $.each(res.niveau_etudes[0].niveau_etudes,function(key,value){
                            $("#niveau").append('<option value="">'+value.niveau_etudes.nom_niveau+'</option>');
                            $("#niv").append('<th colspan="'+value.niveau_etudes.val+'">'+value.niveau_etudes.nom_niveau+'</th>');

                        });
                        $.each(res.semestres,function(key,value){
                            console.log(key);
                            $(".sem").append('<td colspan="'+value+'">'+key+'</td>');
                        });
                        $.each(res.matieres,function(key,value){
                            console.log(key);
                            $(".mat").append('<td colspan="'+value+'">'+key+'</td>');
                            $(".details").append('<td> </td>');
                        });
                        $.each(res.parties, function(key,value){
                            $(".partie").append('<td colspan="">'+value+'</td>')
                        });
                        $.each(res.heures, function(key,value){
                            $(".heures").append('<td>'+key+'</td>');
                            $(".groupe").append('<td>'+value+'</td>');

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
    $('#niveau').on('change',function(){
        var niveauID = $(this).val();
        if(niveauID){
            $.ajax({
                type:"GET",
                url:"{{url('semestres')}}?id_niveau="+niveauID,
                success: function(res){
                    if(res){
                        $("#semestre").empty();
                        $("#semestre").append('<option>Semestre</option>');
                        $.each(res,function(key,value){
                            $("#semestre").append('<option value="'+key+'">'+value+'</option>');
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
