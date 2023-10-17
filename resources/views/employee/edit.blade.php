@extends("layouts2.template")
@section('contenu')
<form action="{{route('employee.update',$employee->id)}}" method="post">
    @csrf
@method('PUT')


<label for="nom">Nom employee</label>
<input type="text" name="nom" value="{{$employee->nom}}" class="form-control" id="nom" required>
<label for="prenom">Prenom employee</label>
<input type="text" name="prenom" value="{{$employee->nom}}" class="form-control" id="prenom" required>


<label for="adresse">Adresse</label>
<input type="text" name="adresse" value="{{$employee->adresse}}" class="form-control" id="adresse" required>



<label for="service_id">Service</label>
<select name="service_id" id="service_id" class="form-control" required>
@foreach ($services as $service)
     <option value="{{$service->id}}" @if($service->id==$employee->service_id) selected @endif>{{$service->nom}}</option>
@endforeach
</select>

<button>Valider</button>
</form>
@endsection
