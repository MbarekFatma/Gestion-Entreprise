@extends("layouts2.template")
@section('contenu')
<form action="{{route('project.update',$project->id)}}" method="post">
    @csrf
@method('PUT')


<label for="nom">Nom Project</label>
<input type="text" name="nom" value="{{$project->nom}}" class="form-control" id="nom" required>
<label for="budget"> Budget Project</label>
<input type="Number" name="prenom" value="{{$project->nom}}" class="form-control" id="budget" required>


<label for="description">Description</label>
<input type="text" name="description" value="{{$project->description}}" class="form-control" id="description" required>



<label for="service_id">Service</label>
<select name="service_id" id="service_id" class="form-control" required>
@foreach ($services as $service)
     <option value="{{$service->id}}" @if($service->id==$project->service_id) selected @endif>{{$service->nom}}</option>
@endforeach
</select>

<button>Valider</button>
</form>
@endsection
