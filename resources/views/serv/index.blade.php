@extends("layouts2.template")
@section('contenu')
<form action="" class="col-9">
    <div class="form-group">
        <input type="search" name="search" id="" class="form-control" placeholder="Search by name ">
    </div>
    <button class="btn btn-primary">Search</button>
    <a href="{{url('/service')}}">
    <button class="btn btn-primary">back to list</button>
    </a>
</form>
<table class="table table-striped table-dark">
    <thead>
        <th>Nom</th>
        <th>spc</th>
    </thead>

    <tbody>
@forelse ($services as $service)
        <tr>
            <td>{{$service->nom}}</td>
            <td>
                {{$service->spc}}

               
            </td>
        </tr>
@empty
<tr><th colspan="2">aucun enregistrement trouvé</th></tr>
@endforelse


    </tbody>
</table>
<div class="form-group">
    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" onclick='window.print()'>
        Imprimer<i class="fas fa-download"></i> 
        
          </button>
    </div>
@endsection
