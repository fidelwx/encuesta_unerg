@extends('my_templates/template')
@section('title') ENCUESTA - UNERG @endsection
@section('footer') Direccion de Informatica - UNERG @endsection

@section('content') 
<div class="col-md-12">

	@foreach($preguntas as $pregunta)
	<form id="fencuesta" action="{{route('storeAnswer')}}" method="post" accept-charset="utf-8">
		<h2 align="center">{{$pregunta->question}}</h2>
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<input type="hidden" name="area_id" value="{{Auth::user()->person->area->id}}">
			<input type="hidden" name="poll_id" value="{{$pregunta->id}}">
			<div id="alert-info" class=""></div>
			<div class="form-group">
				<div class="radio">
					<label>	
						<input type="radio" name="radios" value="1" placeholder="">
						Si
					</label>
				</div>
				<div class="radio">
					<label>	
						<input type="radio" name="radios" value="0" placeholder="">
						No
					</label>
				</div>
			</div>
			<label for="respuesta">Comentario</label>
			<input type="text" class="form-control" id="respuesta" name="respuesta" placeholder="Escribe aqui tu comentario aqui...">
		<input class="btn btn-success" id="enviar" name="enviar" type="submit" value="Enviar">
	</form>
	@endforeach
</div>
@endsection
