
@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

<a href="{{ url('grupo/create') }}" class="btn btn-success">Registrar nuevo grupo</a> 

<table class="table table-light">

    <thead>
        <tr>
            <th>#</th>
            <th>Semestre</th>
            <th>Grupo</th>
            <th>Turno</th>
        </tr>
    </thead>


    <tbody>
        @foreach($grupos as $grupo)
        <tr>
            <td>{{$grupo->id}}</td>
            <td>{{$grupo->semestre}}</td>
            <td>{{$grupo->grupo}}</td>
            <td>{{$grupo->turno}}</td>

            <td>
              
            <a href="{{ url('/grupo/'.$grupo->id.'/edit') }}" class="btn btn-warning">
                    Editar
            </a>
             |

            <form action="{{ url('/grupo/'.$grupo->id) }}" class="d-inline" method="post">
            @csrf 
            {{method_field('DELETE')}}
            <input class="btn btn-danger" type="submit" onclick="return confirm('Seguro que quieres borrar?')" 
            value="Borrar">
            </form>


            </td>
        </tr>
       @endforeach
    </tbody>
</table>
</div>
@endsection