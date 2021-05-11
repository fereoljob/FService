@extends('Utilisateur.gabarit_profile')
@section('contenu')
<hr class="separation"/>
<div class="table-wrapper mt-5">
    <table class="table_licence_gene" cellspacing="1" cellpadding="1" id="table_lic" >
    </table>

    <table class="table_licence_gene d-none" cellspacing="1" cellpadding="1" id="table_master" >
    </table>
</div>
<script>
    document.getElementById('categorie').addEventListener('change', function() {
   console.log('You selected: ', this.value)
   if(this.value == 'Licences'){
       document.getElementById('licence').classList.remove("d-none");
       document.getElementById('table_lic').classList.remove("d-none");
       document.getElementById('master').classList.add("d-none");
       document.getElementById('autre').classList.add("d-none");
   }
   if(this.value == 'Masters'){
       document.getElementById('licence').classList.add("d-none");
       document.getElementById('autre').classList.add("d-none");
       document.getElementById('master').classList.remove("d-none");
   }
   if(this.value == 'Autres Services'){
       document.getElementById('master').classList.add("d-none");
       document.getElementById('licence').classList.add("d-none");
       document.getElementById('autre').classList.remove("d-none");
   }
   });
   document.getElementById('licence').addEventListener('change', function(){
       console.log('You selected: ', this.value)
       if(this.value == 'Tout'){
           document.getElementById('licence1').classList.remove("d-none");
           document.getElementById('licence2').classList.add("d-none");
           document.getElementById('licence3').classList.add("d-none");
           document.getElementById('master1').classList.add("d-none");
           document.getElementById('master2').classList.add("d-none");
       }
       if(this.value == 'L1 MPCIE'){
           document.getElementById('licence1').classList.remove("d-none");
           document.getElementById('licence2').classList.add("d-none");
           document.getElementById('licence3').classList.add("d-none");
           document.getElementById('master1').classList.add("d-none");
           document.getElementById('master2').classList.add("d-none");
       }
       if(this.value == 'L2 MPCIE'){
           document.getElementById('licence1').classList.add("d-none");
           document.getElementById('licence2').classList.remove("d-none");
           document.getElementById('licence3').classList.add("d-none");
           document.getElementById('master1').classList.add("d-none");
           document.getElementById('master2').classList.add("d-none");
       }
       if(this.value == 'L3 Informatique'){
           document.getElementById('licence1').classList.add("d-none");
           document.getElementById('licence2').classList.add("d-none");
           document.getElementById('licence3').classList.remove("d-none");
           document.getElementById('master1').classList.add("d-none");
           document.getElementById('master2').classList.add("d-none");
       }
   });
   document.getElementById('master').addEventListener('change', function(){
       console.log('You selected: ', this.value)
       if(this.value == 'Tout'){
           document.getElementById('licence1').classList.remove("d-none");
           document.getElementById('licence2').classList.add("d-none");
           document.getElementById('licence3').classList.add("d-none");
           document.getElementById('master1').classList.add("d-none");
           document.getElementById('master2').classList.add("d-none");
       }
       if(this.value == 'M1 Informatique'){
           document.getElementById('licence1').classList.add("d-none");
           document.getElementById('licence2').classList.add("d-none");
           document.getElementById('licence3').classList.add("d-none");
           document.getElementById('master1').classList.remove("d-none");
           document.getElementById('master2').classList.add("d-none");
       }
       if(this.value == 'M2 Informatique'){
           document.getElementById('licence1').classList.add("d-none");
           document.getElementById('licence2').classList.add("d-none");
           document.getElementById('licence3').classList.add("d-none");
           document.getElementById('master1').classList.add("d-none");
           document.getElementById('master2').classList.remove("d-none");
       }
   });

</script>
@endsection
