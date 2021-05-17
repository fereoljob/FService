@extends('Utilisateur/gabarit_profile')
@section('contenu')
<hr class="separation"/>
            <div class="table-wrapper mt-5">
                <table class="table_licence_gene" cellspacing="1" cellpadding="1" id="table_master" >
                    <tr id="niv">
                       <th rowspan="3"> Scolarité </th>
                    </tr>
                    <tr class="sem">
                    </tr>
                    <tr class="mat">
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
                        $("#niveau").append('<option>Niveau </option>');
                        $("#niv").append('<th rowspan="3" > Scolarité </th>');
                        for(var i=0; i< res.niveau_etudes.length; i++){
                            console.log(res.niveau_etudes[i]);
                            $("#niveau").append('<option >'+res.niveau_etudes[i]+'</option>');
                            $("#niv").append('<th colspan="4">'+res.niveau_etudes[i]+'</th>');
                        }
                            for(var j=0; j<res.semestres.length; j++){
                                $(".sem").append('<td colspan="2">'+res.semestres[j]+'</td>')
                            }
                            for(var k=0; k<res.matieres.length; k++){
                                $(".mat").append('<td>'+res.matieres[k]+'</td>')
                            }
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
