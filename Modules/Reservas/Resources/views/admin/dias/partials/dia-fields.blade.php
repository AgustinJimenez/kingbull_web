<div class="box-body">
    <p>
        <div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" placeholder="Nombre" name="nombre" type="text" maxlength="60" size="60" value="{{ $dia->nombre }}" id="nombre" required="required">
		</div>
		<div class="form-group">
			<label for="nombre">Orden</label>
			<input class="form-control" placeholder="Orden" name="orden" type="number" min="0" max="300" value="{{ $dia->orden }}" id="orden" required="required">
		</div>
    </p>
</div>
<script type="text/javascript" charset="utf-8">
	$("#nombre").focus();
</script>