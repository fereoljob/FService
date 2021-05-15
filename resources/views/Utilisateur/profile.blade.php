@extends('Utilisateur/gabarit_profile')
@section('contenu')
    <table class="table_licence_gene d-none" cellspacing="1" cellpadding="1" id="table_master" >
        <tr id="niv">
            <th> Scolarité </th>
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
                        $("#niveau").append('<option>Niveau </option>');
                        $.each(res, function(key,value){
                            $("#niveau").append('<option value="'+key+'">'+value+'</option>');
                            $("#niv").append('<th>'+value+'</th>');
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
