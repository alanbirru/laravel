

<h1>{{$modo}} Grupo</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">

<ul>
@foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

</div>

   

@endif


<div class="form-group">   
<label for="semestre">Semestre</label>
<input type="text" class="form-control"  name="semestre" 
value="{{ isset($grupo->semestre)?$grupo->semestre:old('semestre') }}" id="semestre">
</div>

<div class="form-group">
<label for="grupo">Grupo</label>
<input type="text" class="form-control" name="grupo"
 value="{{ isset($grupo->grupo)?$grupo->grupo:old('grupo') }}" id="grupo">
</div>

<div class="form-group">
<label for="turno">Turno</label>
<input type="text" class="form-control" name="turno"
 value="{{ isset($grupo->turno)?$grupo->turno:old('turno') }}" id="turno">
</div>


<input class="btn btn-success" type="submit"
  value="{{ $modo }} Grupo">

<a class="btn btn-primary" href="{{ url('grupo/') }}">Regresar</a> 