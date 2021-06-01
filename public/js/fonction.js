//permet de rendre éditable la ligne du prof connecté et les colonnes des matières dont il est responsable
function edition(mats)
{
    if(leprof!=null)
    {
        let id_prof = leprof.id_professeur;
        let editables = $(".editable");
        if(leprof.id_professeur==leprof.responsable_departement)
        {   
            $.each(editables,function(key,value){
                let inp = document.createElement("input");
                inp.type = "Number";
                inp.style.width = "70px";
                inp.step = "0.001";
                inp.min = "0.001";
                inp.name = editables[key].attributes["id"].value;
                inp.id = "editable2";
                let id = (editables[key].attributes["id"].value).split('-');
                if(id[3]==0)
                {
                    editables[key].replaceChild(inp,editables[key].childNodes[0]);
                }
                else
                {
                    let p = document.createElement("p");
                    p.innerHTML = "<span> Verrouillé </span>";
                    editables[key].appendChild(p);
                }
                editables[key].replaceChild(inp,editables[key].childNodes[0]);
                editables[key].style.borderColor = "blue";
                editables[key].style.boxShadow= "2px 2px 2px 2px  rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6)";
                editables[key].style.outline = "0 none";
            });
        }
        else
        {
            $.each(editables,function(key,value){
                let id = (editables[key].attributes["id"].value).split('-');
                if(id[0]==id_prof)
                {
                    let inp = document.createElement("input");
                    inp.type = "Number";
                    inp.style.width = "70px";
                    inp.step = "0.001";
                    inp.min = "0.001";
                    inp.name = editables[key].attributes["id"].value;
                    inp.id = "editable2";
                    if(id[3]==0)
                {
                    editables[key].replaceChild(inp,editables[key].childNodes[0]);
                }
                else
                {
                    let p = document.createElement("p");
                    p.innerHTML = "<span> Verrouillé </span>";
                    editables[key].appendChild(p);
                }
                    editables[key].style.borderColor = "blue";
                    editables[key].style.boxShadow= "2px 2px 2px 2px  rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6)";
                    editables[key].style.outline = "0 none";
                }
            });
            $.each(mats,function(key,value){
                if(value.responsable_matiere==leprof.id_professeur)
                {
                    $.each(editables,function(key2,value2){
                        let id_mat = (editables[key2].attributes["id"].value).split('-');
                        if(id_mat[1]==mats[key].id_matiere)
                        {
                            let inp = document.createElement("input");
                            inp.type = "Number";
                            inp.style.width = "70px";
                            inp.step = "0.001";

                            inp.min = "0.001";
                            inp.name = editables[key2].attributes["id"].value;
                            inp.id = "editable2";
                            editables[key2].replaceChild(inp,editables[key2].childNodes[0]);
                            editables[key2].style.borderColor = "blue";
                            editables[key2].style.boxShadow= "2px 2px 2px 2px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6)";
                            editables[key2].style.outline = "0 none";
                        }
                    });
                }
            });
        }
    }
}
function ModAffectation(res,tabmodifer)
{
    let editables2 = document.querySelectorAll("#editable2");
    $.each(editables2,function(key,value){
        value.addEventListener('change',function(e){
            let obj = {"name":e.target.name,"value":e.target.value};
            tabmodifer[e.target.name] = obj;
            let valider = document.querySelector(".valModAff");
            valider.style.display = "inline";   
        });
    });
    let valider = document.querySelector("#confirmerVal")
    let Annuler = document.querySelector("#AnnulerVal");
    Annuler.addEventListener('click',function(){
        tabmodifer = [];
        let lediv = document.querySelector(".valModAff");
        lediv.style.display="none";
        let editables2 = document.querySelectorAll("#editable2");
        $.each(editables2,function(key,value){
            editables2[key].value = "";
        })
        AffichageAffect(res);
    });
    valider.addEventListener('click',function()
    {
        let chaine = "";
        for(let tab in tabmodifer)
        {
            chaine+=JSON.stringify(tabmodifer[tab])+" ";
        }
        $.ajax({
            type:"GET",
            url:"/EnregistrerAff/?tabmodifer="+chaine,
            success: function(res){
                if(res)
                {
                    alert("Modification reussie");
                }
                else
                {
                    alert("Echec de la modification");
                }
            }
        });
        let lediv = document.querySelector(".valModAff");
        lediv.style.display="none";
        AffichageAffect(res);
    });
}
function traitementCat(res)
{
    $("#niveau").empty();
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
    $("#niveau").append('<option value="tous" selected="selected" >Tous</option>');
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
        $("#niveau").append('<option value="'+ value.id_niveau +'">'+value.nom_niveau+'</option>');
        $("#niv").append('<th colspan="'+value.val+'">'+value.nom_niveau+'</th>');
    });
     $.each(res.semestres,function(key,value){
        $(".sem").append('<td colspan="'+value.val1+'">'+value.nom_semestre+'</td>');
    });
        $.each(res.matieres,function(key,value){
        $(".mat").append('<td colspan="'+value.val2+'">'+value.nom_matiere+'</td>');
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

            test += "<td  class='editable' id="+value.id_professeur+"-"+value2.id_matiere+"-"+value2.id_partie+"-"+value2.mat_verrouille+" > </td>";
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
}
function traitementNiv(res)
{
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
            test += "<td  class='editable' id="+value.id_professeur+"-"+value2.id_matiere+"-"+value2.id_partie+"-"+value2.mat_verrouille+" > </td>";
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
}
function traitementSem(res)
{
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
            test += "<td  class='editable' id="+value.id_professeur+"-"+value2.id_matiere+"-"+value2.id_partie+"-"+value2.mat_verrouille+" > </td>";
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
}
function AffichageAffect(res)
{
    $.each(res.affectations,function(key,value){
        let lidmat = null;
        let mat_verrouillee = null
        for(part of res.parties)
        {
            if(part.id_partie==value.id_partie)
            {
                lidmat = part.id_matiere;
                mat_verrouillee = part.mat_verrouille;
                break;
            }
        }
        let Checkid = value.id_professeur+"-"+lidmat+"-"+value.id_partie+"-"+mat_verrouillee;
        let letd = document.getElementById(Checkid);
        if(letd!=null)
        {
            if(letd.childElementCount==0)
            {
                letd.innerText=value.nbre_groupe_prof;
            }
            else
            {
                let leinput = document.getElementsByName(Checkid);
                leinput[0].value = value.nbre_groupe_prof;
            }
        }
        
    });
}
