//permet de rendre éditable la ligne du prof connecté et les colonnes des matières dont il est responsable
function edition(mats)
{
    let id_prof = leprof.id_professeur;
    let editables = $(".editable");
    $.each(editables,function(key,value){
        let id = (editables[key].attributes["id"].value).split('-');
        if(id[0]==id_prof)
        {
            let inp = document.createElement("input");
            inp.type = "Number";
            inp.style.width = "70px";
            inp.step = "0.25";
            inp.min = "0.25";
            inp.name = id;
            inp.id = "editable2";
            editables[key].replaceChild(inp,editables[key].childNodes[0]);
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
                    inp.step = "0.25";
                    inp.min = "0.25";
                    inp.name = id_mat;
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