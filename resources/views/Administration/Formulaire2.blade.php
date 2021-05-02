@extends('baseAdmin')

@section('contenu')
<div class="card card-form mt-5 ">
    <div class="card-header">
        <h3><strong>Formulaire :</strong> Suppression</h3>
    </div>
    <div class="card-body">
        <form action="SuppEnvoi" method="POST">
            @csrf
            <div class="form-group">
                <label for="id"><strong>id</strong> </label>&nbsp; &nbsp;
                <input type="text" name="id" class="form-control" placeholder="id utilisateur" autofocus/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Soumettre</button>
            </div>
        </form>
    </div>
</div>
<h3 class="mt-5">(voir liste  plus bas pour l'id)</h3>
@endsection