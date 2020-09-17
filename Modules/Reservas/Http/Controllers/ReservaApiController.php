<?php namespace Modules\Reservas\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use DateTime;
class ReservaApiController extends AdminBaseController
{
    public function allReserva( Request $re )
    {
        $dias_semana = $this->get_array_dias();
        $profile = $this->get_user_by_his_token( $re['user_token'] );

        for ($day = 0; $day < 7; $day ++) 
        {
            $dia = ($day)?(\Carbon::now())->addDays($day):(\Carbon::now());
            if(  $dias_semana[ $dia->format('l') ] != "Domingo")
            {
                $reserva = \Reserva::where('profile_id', $profile->id)->where('fecha', $dia->format('Y-m-d') )->where('estado', 'reservado')->first();
                $semana[] =
                [
                    'fecha' => $dia->format('Y-m-d'),
                    'mes' => $this->get_mes_name_by_number( $dia->format('m') ),
                    'nombre_dia' => $dias_semana[ $dia->format('l') ],
                    'nombre_dia_noformat' => $this->normaliza( $dias_semana[ $dia->format('l') ] ),
                    'fecha_dia' => $dia->format('d'),
                    'reservado' => ($reserva)?true:false,
                    'hora_reserva' => ($reserva)?$reserva->horario->desde_hasta:null
                ];
            }
        }
        //dd($semana);
        return response()->json( $semana );
    }

    public function search_dia( Request $re)
    {
        $dia = $this->get_dia_by_his_name( $re['dia_nombre'] );
        return response()->json( $dia );
    }

    public function createReserva(Request $re)
    {
        $profile = \Profile::where('user_token', $re['user_token'] )->select('id')->first();

        if(! $this->usuario_puede_reservar_mas_esta_semana( $profile->id, $re['fecha'] ) )
            return response()->json(['status' => 'NOK', 'message' => 'No puede realizarse mas reservas, ya se alcanzo el maximo de reservas en la semana.']);

        if(! $this->hay_cupo_para_el_horario($re['horario_id']) )
            return response()->json(['status' => 'NOK', 'message' => 'No puede realizarse mas reservas, ya se alcanzo el maximo de reservas en el horario.']);

        \Reserva::where('profile_id', $profile->id)->where('fecha', $re['fecha'])->where('estado', 'reservado')->update(['estado' => 'eliminado']);
        $new_reserva = new \Reserva;
        $new_reserva->profile_id = $profile->id;
        $new_reserva->fecha = $re['fecha'];
        $new_reserva->horario_id = $re['horario_id'];
        $new_reserva->estado = 'reservado';
        $new_reserva->save();
        return response()->json(['status' => 'OK']);
    }

    public function eliminar(Request $re)
    {
        $profile = $this->get_profile_by_token( $re['user_token'] );
        \Reserva::where('profile_id', $profile->id)->where('fecha', $re['fecha'])->where('estado', 'reservado')->update(['estado' => 'eliminado']);
        return response()->json(['status' => 'OK']);
    }










    private function hay_cupo_para_el_horario( $horario_id )
    {
        $horario = \Horario::find($horario_id);
        return ( $horario->reservas->where('estado', 'reservado')->count() < $horario->cantidad_maxima_usuarios);
    }
    private function get_dias_semanas_de_una_fecha( $fecha_nueva_reserva )
    {
        $tmp_fecha_nueva_reserva = $fecha_nueva_reserva;
        $first_day = $last_day = null;
        $week_days = $this->get_array_dias();
        $fecha_nueva_reserva = \Carbon::createFromFormat('Y-m-d', $fecha_nueva_reserva);

        while(!$first_day)
            if( $week_days[ $fecha_nueva_reserva->format('l') ] == "Lunes" )
                $first_day = $fecha_nueva_reserva;
            else
                $fecha_nueva_reserva->subDay();

        $fecha_nueva_reserva = \Carbon::createFromFormat('Y-m-d', $tmp_fecha_nueva_reserva);

        while(!$last_day)
            if( $week_days[ $fecha_nueva_reserva->format('l') ] == "Sábado" )
                $last_day = $fecha_nueva_reserva;
            else
                $fecha_nueva_reserva->addDay();
        return $this->get_dates_betwen_two_dates($first_day->format('Y-m-d'), $last_day->format('Y-m-d'));
    }

    private function get_dates_betwen_two_dates($first_date, $last_date)
    {

        $dates = array();
        $first_date = \Carbon::createFromFormat('Y-m-d', $first_date);
        $last_date = \Carbon::createFromFormat('Y-m-d', $last_date);
        $dates[] = \Carbon::createFromFormat( "Y-m-d", $first_date->format('Y-m-d') );
        while( $first_date->format("Y-m-d") != $last_date->format("Y-m-d") )
        {
            $dates[] = \Carbon::createFromFormat( "Y-m-d", $first_date->addDay()->format('Y-m-d') );
        }
        return collect( $dates );
    }

    private function get_dias_desde_hoy_hasta_una_semana()
    {
        $dias_semana = $this->get_array_dias();
        for ($day = 0; $day < 7; $day ++) 
        {
            $dia = ($day)?(\Carbon::now())->addDays($day):(\Carbon::now());
            if(  $dias_semana[ $dia->format('l') ] != "Domingo")
                $dias[] = $dia;
        }
        return $dias;
    }

    private function usuario_puede_reservar_mas_esta_semana( $profile_id, $fecha_nueva_reserva )
    {
        $dias = $this->get_dias_semanas_de_una_fecha( $fecha_nueva_reserva );

        $cantidad_reservas_esta_semana = \Reserva::where('profile_id', $profile_id)->where('estado', 'reservado')
                                                            ->whereBetween( 'fecha', array($dias->first()->subDay(), $dias->last()) )
                                                            ->count();
        $tipo_usuario = \Profile::find( $profile_id )->tipo_usuario;
        $cantidad_reservas_maxima_de_profile = ($tipo_usuario)?$tipo_usuario->cantidad:0;

//dd($dias[0]->format("d/m/Y")."--".$dias[1]->format("d/m/Y")."--".$dias[2]->format("d/m/Y")."--".$dias[3]->format("d/m/Y")."--".$dias[4]->format("d/m/Y")."--".$dias[5]->format("d/m/Y") );
        return ( $cantidad_reservas_esta_semana < $cantidad_reservas_maxima_de_profile );
    }

    private function get_profile_by_token( $token )
    {
        return \Profile::where("user_token", $token)->first();
    }

    private function get_dia_by_his_name( $name )
    {
        return \Dia::where('nombre', 'like', "%{$name}%")->with('horarios')->select('id', 'nombre')->first();
    }
    private function get_user_by_his_token( $token )
    {
        return \Profile::where('user_token', $token)->with('reservas')->first();
    }

    private function get_mes_name_by_number( $number ){return array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")[(int)$number-1];}
    private function get_array_dias(){return array("Sunday" => "Domingo", "Monday" => "Lunes", "Tuesday" => "Martes", "Wednesday" =>"Miércoles", "Thursday" => "Jueves", "Friday" => "Viernes", "Saturday" => "Sábado");}
    private function normaliza ($cadena){return utf8_encode( strtolower( strtr( utf8_decode( $cadena ), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ'), 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr') ) );}

}