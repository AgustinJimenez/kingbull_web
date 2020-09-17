<div class="box-body">

  {!! Form::normalInput('estado_cuenta', 'Estado de cuenta (monto)', $errors, $profile) !!}

  <div class='form-group '>
    <label for="fecha_vencimiento">Fecha de vencimiento</label>
    <input id="fecha_vencimiento" class="form-control" placeholder="Fecha de vencimiento" name="fecha_vencimiento" type="text" value="{!! $profile->fecha_vencimiento!!}" id="fecha_vencimiento">
  </div>

</div>
