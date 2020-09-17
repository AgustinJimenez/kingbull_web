<style type="text/css">
	.inner-addon 
	{
	   position: relative;
	}

	.inner-addon .glyphicon 
	{
	   color:#007f4f ;
	   position: absolute;
	   padding: 10px;
	   cursor: pointer;
	}

	.left-addon .glyphicon  { left:  0px;}
	.right-addon .glyphicon { right: 0px;}

	.left-addon input  { padding-left:  30px; }
	.right-addon input { padding-right: 30px; }
</style>
<div class="row container-fluid" style="display:none;">
	<div class="col-md-2">
		{!! Form::normalInput('usuario', "Usuario: ", $errors, null, array("class" => "form-control usuario ")) !!}
	</div>
	<div class="col-md-2">
		<label for="fecha_desde">Fecha Desde: </label>
		<div class="inner-addon right-addon">
			<i class="glyphicon glyphicon-trash " onclick="$(this).next('input').val(''); table.draw();" style="color:#3c8dbc;"></i>
			<input class="form-control fecha_desde" placeholder="Fecha Desde: " name="fecha_desde" type="text" value="{{ $fecha_formated }}" id="fecha_desde">
        </div> 
	</div>
	<div class="col-md-2 inner-addon">
		<label for="fecha_desde">Fecha Hasta: </label>
		<div class="inner-addon right-addon">
			<input class="form-control fecha_hasta" placeholder="Fecha Hasta: " name="fecha_hasta" type="text" value="{{ $fecha_formated }}" id="fecha_hasta">
        	<i class="glyphicon glyphicon-trash " onclick="$(this).prev('input').val('');  table.draw();" style="color:#3c8dbc;"></i>   
        </div>     
	</div>

	<div class="col-md-2">
		{!! Form::normalSelect("horario_id", "Horario: ", $errors, $horarios,(object)[ "horario_id" => $horario_id]) !!} 
	</div>

	<div class="col-md-2">
		{!! Form::normalSelect("estado", "Estado: ", $errors, array("" => "--", "reservado" => "Reservado", 'eliminado' => "Eliminado"),(object)[ "estado" => $estado]) !!} 
	</div>
</div>
<div class="text-center">
	<h2>{{ $fecha_nombre }} | {{ $desde_hasta }}</h2>
</div>
