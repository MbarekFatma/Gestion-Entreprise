@extends("layouts2.template")
@section('contenu')

@if($errors->any())
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@endif
<form action="{{route('calendar.store')}}" method="post" enctype="multipart/form-data">
    @csrf



<label for="title">title</label>
<input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') border-danger @enderror" id="title" required>
@error('title')
<div class="text text-danger">{{$message}}</div>
@enderror



<label for="start"> start</label>
<input type="date" name="start" value="{{old('start')}}" class="form-control @error('start') border-danger @enderror" id="start" required>
@error('start')
<div class="text text-danger">{{$message}}</div>
@enderror

<label for="end">end</label>
<input type="date" name="end" id="end" value="{{old('end')}}" class="form-control @error('end') border-danger @enderror" required>
@error('end')
<div class="text text-danger">{{$message}}</div>
@enderror


<button>Valider</button>
</form>
@endsection