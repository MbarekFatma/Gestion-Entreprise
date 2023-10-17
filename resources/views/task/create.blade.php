@extends("layouts2.template")
@section('contenu')

@if($errors->any())
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@endif
<form action="{{route('task.store')}}" method="post" enctype="multipart/form-data">
    @csrf



<label for="nom">Nom </label>
<input type="text" name="nom" value="{{old('nom')}}" class="form-control @error('nom') border-danger @enderror" id="nom" required>
@error('nom')
<div class="text text-danger">{{$message}}</div>
@enderror





<label for="description">Description</label>
<input type="text" name="description" id="description" value="{{old('description')}}" class="form-control @error('description') border-danger @enderror" required>
@error('description')
<div class="text text-danger">{{$message}}</div>
@enderror

<label for="project_id">project</label>
<select name="project_id" id="project_id" class="form-control @error('project_id') border-danger @enderror" required>
    <option value="">--- choisir un service ----</option>
@foreach ($projects as $project)
     <option value="{{$project->id}}" @if($project->id==old('project_id')) selected @endif>{{$project->nom}}</option>
@endforeach
</select>
@error('project_id')
<div class="text text-danger">{{$message}}</div>
@enderror

<label for="employee_id">project</label>
<select name="employee_id" id="employee_id" class="form-control @error('employee_id') border-danger @enderror" required>
    <option value="">--- choisir un service ----</option>
@foreach ($employees as $employee)
     <option value="{{$employee->id}}" @if($employee->id==old('employee_id')) selected @endif>{{$employee->nom}}</option>
@endforeach
</select>
@error('employee_id')
<div class="text text-danger">{{$message}}</div>
@enderror

<button>Valider</button>
</form>
@endsection