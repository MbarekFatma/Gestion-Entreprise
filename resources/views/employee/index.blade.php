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
     <a href="{{url('/employee')}}">
    <button class="btn btn-primary">back to list</button>
    </a>
</form>
<table class="table table-striped table-dark">
    <thead>
      
        <th>nom</th>
        <th>prenom</th>
        <th>adresse</th>
        <th>service</th>
        <th>Action</th>
    </thead>

    <tbody>
@forelse ($employees as $employee)
        <tr>
          
            <td>{{$employee->nom}}</td>
            <td>{{$employee->prenom}}</td>
            <td>{{$employee->adresse}}</td>
            <td>{{$employee->service->nom}}</td>
            <td>


                <form action="{{route('employee.destroy',$employee->id)}}" method="post">
                @csrf
                @method('DELETE')
                 <a href="{{route('employee.edit',$employee->id)}}"><button class="btn btn-success" type="button">modifier</button></a>
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
