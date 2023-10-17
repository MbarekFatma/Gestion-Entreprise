@extends("layouts2.template")
@section('contenu')

@if($errors->any())
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@endif
<form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
    @csrf



<label for="nom">Nom Employee</label>
<input type="text" name="nom" value="{{old('nom')}}" class="form-control @error('nom') border-danger @enderror" id="nom" required>
@error('nom')
<div class="text text-danger">{{$message}}</div>
@enderror



<label for="prenom">Prenom Employee</label>
<input type="text" name="prenom" value="{{old('prenom')}}" class="form-control @error('prenom') border-danger @enderror" id="prenom" required>
@error('prenom')
<div class="text text-danger">{{$message}}</div>
@enderror

<label for="adresse">Adresse Employee</label>
<input type="text" name="adresse" id="adresse" value="{{old('adresse')}}" class="form-control @error('adresse') border-danger @enderror" required>
@error('adresse')
<div class="text text-danger">{{$message}}</div>
@enderror

<label for="service_id">Service</label>
<select name="service_id" id="service_id" class="form-control @error('service_id') border-danger @enderror" required>
    <option value="">--- choisir un service ----</option>
@foreach ($services as $service)
     <option value="{{$service->id}}" @if($service->id==old('service_id')) selected @endif>{{$service->nom}}</option>
@endforeach
</select>
@error('service_id')
<div class="text text-danger">{{$message}}</div>
@enderror

<button>Valider</button>
</form>
@endsection
