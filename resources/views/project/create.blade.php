@extends("layouts2.template")
@section('contenu')

@if($errors->any())
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@endif
<form action="{{route('project.store')}}" method="post" enctype="multipart/form-data">
    @csrf



<label for="nom">Nom Projet</label>
<input type="text" name="nom" value="{{old('nom')}}" class="form-control @error('nom') border-danger @enderror" id="nom" required>
@error('nom')
<div class="text text-danger">{{$message}}</div>
@enderror



<label for="budget"> Budget Projet</label>
<input type="number" name="budget" value="{{old('budget')}}" class="form-control @error('budget') border-danger @enderror" id="budget" required>
@error('budget')
<div class="text text-danger">{{$message}}</div>
@enderror

<label for="description">Description</label>
<input type="file" name="description" id="description" value="{{old('description')}}" class="form-control @error('description') border-danger @enderror" required>
@error('description')
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