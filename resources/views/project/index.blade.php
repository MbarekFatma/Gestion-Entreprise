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
    <a href="{{url('/project')}}">
    <button class="btn btn-primary">back to list</button>
    </a>
</form>

<table class="table table-striped table-dark">
    <thead>
      
        <th>Nom</th>
        <th>Budget</th>
        <th>Description</th>
        <th>service</th>
        <th>Download</th>
        <th>View</th>
        <th>Action</th>
    </thead>

    <tbody>
@forelse ($projects as $project)
        <tr>
          
            <td>{{$project->nom}}</td>
            <td>{{$project->budget}}</td>
            <td>{{ $project->description}}  </td>
            <td>{{$project->service->nom}}</td>
           <td><a href="{{url('/download',$project->description)}}"> Download </a></td>
           <td><a href="{{url('/view', $project->id)}}"> view</a></td>
            <td>


                <form action="{{route('project.destroy',$project->id)}}" method="post">
                @csrf
                @method('DELETE')
                 <a href="{{route('project.edit',$project->id)}}"><button class="btn btn-success" type="button">modifier</button></a>
                 <button class="btn btn-danger" onclick="return confirm('etes vous sure de supprimer?')">supprimer</button>
            </form>
            </td>
        </tr>
@empty
<tr><th colspan="6">aucun enregistrement trouvé</th></tr>
@endforelse


    </tbody>
</table>
@endsection
