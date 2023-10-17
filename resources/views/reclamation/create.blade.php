@extends("layouts2.template")
@section('contenu')

@if($errors->any())
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@endif
<form action="{{route('reclamation.store')}}" method="post" enctype="multipart/form-data">
    @csrf


<label for="title">title</label>
<input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') border-danger @enderror" id="title" required>
@error('title')
<div class="text text-danger">{{$message}}</div>
@enderror

<label for="description">description</label>
<input type="text" name="description" id="description" value="{{old('description')}}" class="form-control @error('description') border-danger @enderror" required>
@error('description')
<div class="text text-danger">{{$message}}</div>
@enderror






<button>Valider</button>
</form>
@endsection
