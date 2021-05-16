@extends('Utilisateur/gabarit_profile')
@section('contenu')
<hr class="separation"/>
            <div class="table-wrapper mt-5">
                <table class="table_licence_gene" cellspacing="1" cellpadding="1" id="table_master" >
                    <tr id="niv">
                       <th rowspan="2"> Scolarité </th>
                    </tr>
                    <tr class="sem">
                        <td> Semestre 1 </td>
                        <td> Semestre 2 </td>
                        <td> Semestre 3 </td>
                        <td> Semestre 4 </td>
                        <td> Semestre 5 </td>
                        <td> Semestre 6 </td>
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
                        $("#niveau").append('<option>Niveau </option>');
                        $("#niv").append('<th rowspan="2" > Scolarité </th>');
                        $.each(res, function(key,value){
                            $("#niveau").append('<option value="'+key+'">'+value+'</option>');
                            $("#niv").append('<th colspan="2">'+value+'</th>');
                            $(".sem").append('')
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
