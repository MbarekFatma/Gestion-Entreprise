@extends("layouts2.template")
@section('contenu')
@if(Session::has('success'))
<div class="alert alert-success">
    <p>{{Session::get('success')}}</p>
</div>
@endif
{{ $projects->nom}}
{{ $projects->budget}}
<iframe  width="400" height="400" src="/files/{{ $projects->description}}"></iframe>
@endsection