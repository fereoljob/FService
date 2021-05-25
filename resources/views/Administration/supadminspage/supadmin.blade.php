@extends('baseAdmin')

@section('contenu')
	<div class="container-fluid">
		<div class="row jumbotron mt-5">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
				<p class="lead"> <i class="fas fa-exclamation-circle"></i>&nbsp; &nbsp; Cliquez sur l'action à executer dans le panneau à gauche pour faire apparaitre un formulaire</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div >
			<div class="utilisateur">
				<button class='btn btn-secondary' id='utilisateurs' >Afficher les utilisateurs</button>
				<button class="btn btn-primary" style="display:none" id="cacher" > Cacher</button>
			</div>
			<div class="affiUser mt-3 contenu1 text-center" style="display: none">
				<table>
					<thead>
						<th>Nom et prénom</th>
						<th>Statut</th>
					</thead>
					<tbody>
						@foreach ($utilisateurs as $utilisateur)
							<tr>
								<td>{{ $utilisateur->nom_professeur." ".$utilisateur->prenom_professeur }}</td>
								<td>{{ $utilisateur->type_user }}</td>
							</tr>
						@endforeach
						@foreach ($membres as $utilisateur)
							<tr>
								<td>{{ $utilisateur->email }}</td>
								<td>{{ $utilisateur->type_user }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="mt-5">
			<div class="departement">
				<button class='btn btn-secondary' id='departements'  >Afficher les departements</button>
				<button class="btn btn-primary" style="display:none" id="cacher1" > Cacher</button>
			</div>
			<div class="affidep mt-3 text-center contenu1" style="display:none" >
				<table>
					<thead>
						<th>Nom</th>
						<th>Responsable</th>
					</thead>
					<tbody>
						@foreach ($departements as $dep)
							<tr>
								<td>{{ $dep->nom_departement }}</td>
								<td>{{ $dep->nom_professeur." ".$dep->prenom_professeur }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		let users = document.querySelector("#utilisateurs");
		users.addEventListener('click',function(){
			let divU = document.querySelector(".affiUser");
			divU.style.display ="inline-block";
			let bout = document.querySelector("#cacher");
			bout.style.display ="inline";
		});
		let bouton  = document.querySelector("#cacher");
		bouton.addEventListener('click',function(e){
			let divU = document.querySelector(".affiUser");
			divU.style.display = "none";
			e.target.style.display ="none";

		});
		let dep = document.querySelector("#departements");
		dep.addEventListener('click',function(){
			let divD = document.querySelector(".affidep");
			divD.style.display ="inline-block";
			let bout1 = document.querySelector("#cacher1");
			bout1.style.display ="inline";
		});
		let bouton1  = document.querySelector("#cacher1");
		bouton1.addEventListener('click',function(e){
			let divD = document.querySelector(".affidep");
			divD.style.display = "none";
			e.target.style.display ="none";

		});
	</script>
@endsection