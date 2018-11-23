@extends('my_templates/template')
@section('title') ENCUESTA - UNERG @endsection
@section('footer') Direccion de Informatica - UNERG @endsection

@section('content')
<div class="col-md-12">
 	<a title="Add Widget" class="pull-right" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span> Nueva?</a></li>
 	<div id="col-md-12 pregunta-show">
	 	<div id="alert-info">
	 	</div>
 	</div>
 </div> 
<div class="col-md-12">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Titulo</th>
				<th>Descripcion</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($preguntas as $pregunta)
			<tr>
				<td>{{$pregunta->id}}</td>
				<td>{{$pregunta->question}}</td>
				<td>{{$pregunta->text}}</td>
				<td>
					<div class="form-group">
						<a class="btn btn-info" href="{{route('preguntas.destroy',$pregunta->id)}}">Ver</a>

						<a class="btn btn-info" href="{{route('preguntas.destroy',$pregunta->id)}}">Editar</a>

						<form id="form-rem" action="{{route('preguntas.destroy',$pregunta->id)}}" method="post">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
							<input class="btn btn-info" type="submit" value="Eliminar" id="eliminar"></input>
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<center>{!!$preguntas->render()!!}</center>

<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		<h4 class="modal-title">Nueva Pregunta</h4>
	  </div>
	  <div class="modal-body">
	  	<form action="{{route('preguntas.store')}}" id="form-add" method="post">
	  		@csrf
	  		<input class="form-control" type="text" name="question" placeholder="Titulo de la Pregunta">
	  		<textarea class="form-control" type="text" name="text" placeholder="Detalles o descripcion de la Pregunta"></textarea>
	  		<input class="btn btn-info form-control" type="submit" id="enviar" value="Guardar">
	  </div>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
	<script>
		$('#pregunta-show').hide();
		$(document).ready(function(){
			$('#enviar').click(function(e){
				e.preventDefault();
				var form = $(this).parents('#form-add');
				var url = form.attr('action');
				$('#pregunta-show').show();
				$.post(url, form.serialize(),function(result){
					$('#alert-info').html(result.msj);
				}).fail(function(){
					$('#alert-info').html('<span class="col-md-12 alert alert-success">Ah ocurrido un error inesperado!</span>');
				});
			});
		});

    </script>
@endsection