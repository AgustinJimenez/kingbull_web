<?php namespace Modules\Reservas\Repositories\Eloquent;

use Modules\Reservas\Repositories\ReservaRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentReservaRepository extends EloquentBaseRepository implements ReservaRepository
{

	public function get_dias_hoy_hasta_una_semana($detallado = false)
	{
		$dias_semana = $this->get_array_dias();

        for ($day = 0; $day < 7; $day ++) 
        {
            $dia = ($day)?(\Carbon::now())->addDays($day):(\Carbon::now());
            if(  $dias_semana[ $dia->format('l') ] != "Domingo")
            	if($detallado)
            		$dias[] =
            		collect(array
	            	(
	            			'fecha' => $dia->format('Y-m-d'),
	            			'fecha_formated' => $dia->format('d/m/Y'),
	            			'detallado' => collect(array
            								(
            									'dia' => $dias_semana[ $dia->format('l') ], 
            									'nro_dia' => $dia->format('d'),
            									'mes' => $this->get_mes_name_by_number( $dia->format('m') ), 
            									'anio' => $dia->format('Y') 
            								))
	            	));
            	else
                	$dias[] = $dia;
        }
        return collect($dias);
	}

    public function get_dia_by_name( $name )
    {
        return \Dia::where('nombre', 'like', "%" . $this->normalizar( $name ) . "%" )->first();
    }

    public function get_reservas_por_fechas( $fechas_array )
    {
        return \Reserva::select('id', 'profile_id', 'fecha', 'horario_id', 'estado')->orderBy("fecha", "ASC")->whereIn('fecha', $fechas_array)->get()->groupBy('fecha');
    }


	public function get_mes_name_by_number( $number ){return array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")[(int)$number-1];}
    public function get_array_dias(){return array("Sunday" => "Domingo", "Monday" => "Lunes", "Tuesday" => "Martes", "Wednesday" =>"Miércoles", "Thursday" => "Jueves", "Friday" => "Viernes", "Saturday" => "Sábado");}
    public function normalizar ($cadena){return utf8_encode( strtolower( strtr( utf8_decode( $cadena ), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ'), 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr') ) );}
}
