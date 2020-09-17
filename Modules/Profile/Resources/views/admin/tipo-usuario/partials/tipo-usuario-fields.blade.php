<div class="form-group ">
	<label for="nombre">Nombre</label>
	<input class="form-control" placeholder="Nombre" name="tipo_usuario[nombre]" type="text" value="{{ $tipo_usuario->nombre }}" id="nombre" required="required">
</div>
<div class="form-group ">
	<label for="nombre">Cantidad</label>
	<input class="form-control" placeholder="Cantidad" name="tipo_usuario[cantidad]" type="number" value="{{ $tipo_usuario->cantidad?$tipo_usuario->cantidad:0 }}" id="cantidad" min="1" max="100">
</div>
<button type="submit" class="btn btn-primary">GUARDAR</button>