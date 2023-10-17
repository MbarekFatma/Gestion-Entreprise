@extends("layouts2.template")
@section('contenu')
<form action="{{route('task.update',$task->id)}}" method="post">
    @csrf
@method('PUT')


<label for="nom">Nom </label>
<input type="text" name="nom" value="{{$task->nom}}" class="form-control" id="nom" required>

<label for="description">Description</label>
<input type="text" name="adresse" value="{{$task->description}}" class="form-control" id="adresse" required>



<label for="project_id">Project</label>
<select name="project_id" id="service_id" class="form-control" required>
@foreach ($projects as $project)
     <option value="{{$project->id}}" @if($project->id==$project->project_id) selected @endif>{{$project->nom}}</option>
@endforeach
</select>

<button>Valider</button>
</form>
@endsection