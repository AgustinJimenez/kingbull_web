<style type="text/css" media="screen">
  .lista-horarios
  {
    max-height: 150px;
    min-height: 150px;
    overflow: auto;
  }  
  .lista
  {
    min-height: 50px;
  }
</style>
@foreach ($dias as $dia)
	<div class="list-group col-md-3">
	  <span href="#" class="list-group-item active">
	    <b>{{ $dia['detallado']['dia']." ".$dia['detallado']['nro_dia']."/".$dia['detallado']['mes'] }}</b> 
	  </span>
	  <div class="lista-horarios">

	    @foreach ($dia['reservas'] as $key => $reservas_by_horario)
	      <span href="#" class="list-group-item text-center horario">
	        {{ $reservas_by_horario->first()->horario->desde . " - " . $reservas_by_horario->first()->horario->hasta }}
	        <a class="badge pull-right" style="background-color: red;" href="{{ route('admin.reservas.reserva.usuarios_reservas', array('state' => 'eliminado',  'date' => $reservas_by_horario->first()->fecha, 'schedule' => $reservas_by_horario->first()->horario_id, 'dia_id' => $reservas_by_horario->first()->horario->dia->id) ) }}">{{ $reservas_by_horario->where('estado', 'eliminado')->count() }}</a>
	        <a class="badge pull-right" style="background-color: #2E8B57;" href="{{ route('admin.reservas.reserva.usuarios_reservas', array('state' => 'reservado', 'date' => $reservas_by_horario->first()->fecha, 'schedule' => $reservas_by_horario->first()->horario_id, 'dia_id' => $reservas_by_horario->first()->horario->dia->id) ) }}">{{ $reservas_by_horario->where('estado', 'reservado')->count() }}</a>
	      </span> 
	    @endforeach

	  </div>
	</div>
@endforeach