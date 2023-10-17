@extends("layouts2.template")
@section('contenu')
@if(Session::has('success'))
<div class="alert alert-success">
    <p>{{Session::get('success')}}</p>
</div>
@endif
<form action="" class="col-9">
    <div class="form-group">
        <input type="search" name="search" id="" class="form-control" placeholder="Search by name ">
    </div>
    <button class="btn btn-primary">Search</button>
    <a href="{{url('/task')}}">
    <button class="btn btn-primary">back to list</button>
    </a>
</form>

<table class="table table-striped table-dark">
    <thead>
      
        <th>Nom</th>
      
        <th>Description</th>
        <th>project</th>
        <th>employee</th>
        <th>Action</th>
    </thead>

    <tbody>
@forelse ($tasks as $task)
        <tr>
          
            <td>{{ $task->nom}}</td>
            <td>{{ $task->description}}</td>
           
            <td>{{ $task->project->nom}}</td>
            <td>{{ $task->employee->nom}}</td>
            <td>

                <form action="{{route('task.destroy',$task->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                     <a href="{{route('task.edit',$task->id)}}"><button class="btn btn-success" type="button">modifier</button></a>
                     <button class="btn btn-danger" onclick="return confirm('etes vous sure de supprimer?')">supprimer</button>
                </form>
              
            </td>
        </tr>
@empty
<tr><th colspan="6">aucun enregistrement trouvé</th></tr>
@endforelse


    </tbody>
</table>
<div class="form-group">
    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" onclick='window.print()'>
        Imprimer<i class="fas fa-download"></i> 
        
          </button>
    </div>
@endsection
