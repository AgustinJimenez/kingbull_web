<style type="text/css" media="screen">
  .lista-horarios
  {
    max-height: 250px;
    min-height: 250px;
    overflow: auto;
  }  
  .lista
  {
    min-height: 50px;
  }
</style>

<div class="row container-fluid">
  @foreach ($dias as $dia)
    <div class="list-group col-md-2">
      <span href="#" class="list-group-item active">
        <b>{{ $dia->nombre }}</b> 
        <a class="dropdown-toggle dropdown-menu-right" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">
        <span class="glyphicon glyphicon-option-vertical pull-right"></span>
        </a>
        <ul class="dropdown-menu bg-primary">
          <li role="presentation">
            <a role="menuitem" tabindex="-1" href="#" class="text-center agregar btn" dia-id = "{{ $dia->id }}" dia-nombre = "{{ $dia->nombre }}">
              <b>AGREGAR</b>
            </a>
          </li>
        </ul>
      </span>
      <div class="lista-horarios dia-{{ $dia->id }}">
        @foreach ($dia->horarios as $horario)
          <span href="#" class="list-group-item text-center horario">
            <span class="badge pull-left" style="background-color: #337ab7;">{{ $horario->cantidad_maxima_usuarios }}</span>
            {{ $horario->desde . " - " . $horario->hasta }}
            <span class="glyphicon glyphicon-remove-circle pull-right icon-eliminar" aria-hidden="true" style="color:red; display:none;" horario-id="{{ $horario->id }}"></span>
          </span> 
        @endforeach
      </div>
    </div>
  @endforeach

</div>