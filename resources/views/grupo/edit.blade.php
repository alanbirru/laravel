

@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/grupo/'.$grupo->id ) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('grupo.form', ['modo'=>'Editar']);

</form>
</div>
@endsection