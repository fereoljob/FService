@extends('baseAdmin2')

@section('contenu')
	<div class="container-fluid">
		<div class="row jumbotron mt-5">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
				<p class="lead"> <i class="fas fa-exclamation-circle"></i>&nbsp; &nbsp; Cliquez dans le panneau à gauche pour éffectuer une action sur une table</p>
			</div>
		</div>
	</div>
	<div class="container-fluid">
        <p style="font-size:25px">Consulter les differentes tables ici.</p>
        <div class="row">
            <select name="table"  class="monselect" >
                <option value="status">Status</option>
                <option value="professeurs">Professeurs</option>
                <option value="niv_etudes">Niveaux d'études</option>
                <option value="categories">Categories</option>
                <option value="semestres">Semestres</option>
                <option value="matieres">Matieres</option>
                <option value="type_enseignements">Type d'enseignements</option>
                <option value="parties">Parties</option>
                <option value="affectations">Affectations</option>
            </select>&nbsp; &nbsp; &nbsp;
            <button class="btn btn-secondary affichage">Afficher</button>
        </div>
        <div >
            <div class="tableau">
            </div>
            <div class="status contenu1 text-center mt-3" style="display: none">
                <br/>
                <button class="btn btn-danger" id="status">Cacher</button>
                <br/>
                <table>
                    <caption>Status</caption>
                    <thead>
                        <th>Nom</th>
                        <th>Nombre heure</th>
                        <th>Nombre heure max</th>
                    </thead>
                    <tbody>
                        @foreach ($status as $stat)
                            <tr>
                                <td>{{ $stat->nom_statut }}</td>
                                <td>{{ $stat->nbre_heure }}</td>
                                <td>{{ $stat->nbre_heure_max }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="professeurs contenu1 text-center mt-3" style="display: none">
                <br/>
                <button class="btn btn-danger" id="professeurs">Cacher</button>
                <br/>
                <table>
                    <caption>Professeurs</caption>
                    <thead>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Département</th>
                    </thead>
                    <tbody>
                        @foreach ($professeurs as $profs)
                            <tr>
                                <td>{{ $profs->nom_professeur }}</td>
                                <td>{{ $profs->prenom_professeur }}</td>
                                <td>{{ $profs->service }}</td>
                                <td>{{ $profs->nom_statut ?? '' }}</td>
                                <td>{{ $profs->nom_departement ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="niv_etudes contenu1 text-center mt-3" style="display: none">
                <br/>
                <button class="btn btn-danger" id="niv_etudes">Cacher</button>
                <br/>
                <table>
                    <caption>Niveau d'études</caption>
                    <thead>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Responsable</th>
                    </thead>
                    <tbody>
                        @foreach ($niv_etudes as $niv)
                            <tr>
                                <td>{{ $niv->nom_niveau }}</td>
                                <td>{{ $niv->nom_categorie ?? '' }}</td>
                                <td>{{ $niv->nom_professeur ?? '' }} {{ $niv->prenom_professeur ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="categories contenu1 text-center mt-3" style="display: none">
                <br/>
                <button class="btn btn-danger" id="categories">Cacher</button>
                <br/>
                <table>
                    <caption>Categories</caption>
                    <thead>
                        <th>Nom</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $cat->nom_categorie }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="semestres contenu1 text-center mt-3" style="display: none">
                <br/> 
                <button class="btn btn-danger" id="semestres">Cacher</button>
                <br/>
                <table>
                    <caption>Semestres</caption>
                    <thead>
                        <th>Nom</th>
                        <th>Niveau</th>
                    </thead>
                    <tbody>
                        @foreach ($semestres as $sem)
                            <tr>
                                <td>{{ $sem->nom_semestre }}</td>
                                <td>{{ $sem->nom_niveau }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="matieres contenu1 text-center mt-3" style="display: none">
                <br/>
                <button class="btn btn-danger" id="matieres">Cacher</button>
                <br/>
                <table>
                    <caption>Matières</caption>
                    <thead>
                        <th>Intitulé</th>
                        <th>Semestre</th>
                        <th>Responsable</th>
                        <th>Departement</th>
                    </thead>
                    <tbody>
                        @foreach ($matieres as $mat)
                            <tr>
                                <td>{{ $mat->nom_matiere }}</td>
                                <td>{{ $mat->nom_semestre }}</td>
                                <td>{{ $mat->nom_professeur." ".$mat->prenom_professeur }}</td>
                                <td>{{ $mat->nom_departement }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="type_enseignements contenu1 text-center mt-3" style="display: none">
                <br/>
                <button class="btn btn-danger" id="type_enseignements">Cacher</button>
                <br/>
                <table>
                    <caption>Type d'enseignements</caption>
                    <thead>
                        <th>Nom</th>
                        <th>Coefficient</th>
                    </thead>
                    <tbody>
                        @foreach ($type_enseignements as $type)
                            <tr>
                                <td>{{ $type->nom_type_enseignement }}</td>
                                <td>{{ $type->coefficient }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="parties contenu1 text-center mt-3" style="display: none" >
                <br/>
                <button class="btn btn-danger" id="parties">Cacher</button>
                <br/>
                <table>
                    <caption>Parties</caption>
                    <thead>
                        <th>Matière</th>
                        <th>Type</th>
                        <th>Nombre d'heure</th>
                        <th>Nombre de groupe</th>
                    </thead>
                    <tbody>
                        @foreach ($parties as $part)
                            <tr>
                                <td>{{ $part->nom_matiere }}</td>
                                <td>{{ $part->nom_type_enseignement }}</td>
                                <td>{{ $part->nbre_heure }}</td>
                                <td>{{ $part->nbre_groupe }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="affectations contenu1 text-center mt-3" style="display: none" >
                <br/>
                <button class="btn btn-danger" id="affectations">Cacher</button>
                <br/>
                <table>
                    <caption>Affectations</caption>
                    <thead>
                        <th>Partie</th>
                        <th>Professeur</th>
                        <th>Nombre de groupe </th>
                    </thead>
                    <tbody>
                        @foreach ($affectations as $aff)
                            <td>{{ $aff->nom_partie }}</td>
                            <td>{{ $aff->nom_professeur." ".$aff->prenom_professeur }}</td>
                            <td>{{ $aff->nbre_group_prof }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
	</div>
	<script>
        let boutonAffi = document.querySelector(".affichage");
        boutonAffi.addEventListener('click',function(){
            let Leselect = document.querySelector(".monselect");
            let val = Leselect.options[Leselect.selectedIndex].value;
            let div = document.querySelector("."+val);
            let contenant = document.querySelector(".tableau");
            contenant.insertBefore(div,contenant.firstChild);
            div.style.display="inline";
            let bout = document.querySelector("button[id="+val+"]");
            bout.addEventListener('click',function(){
                div.style.display="none";
            });
        });
    </script>
@endsection