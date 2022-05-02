
@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{ url('/grupo/') }}" method="post">

    @csrf
    @include('grupo.form', ['modo'=>'Crear'] );


</form>
</div>
@endsection