<?php namespace Modules\Reservas\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Reservas\Entities\Reserva;
use Modules\Reservas\Repositories\ReservaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use DB;
class ReservaController extends AdminBaseController
{
    private $reserva;
    public function __construct(ReservaRepository $reserva)
    {
        parent::__construct();
        $this->reserva = $reserva;
    }
    public function index()
    {
        $dias = $this->reserva->get_dias_hoy_hasta_una_semana( true );
        $reservas = $this->reserva->get_reservas_por_fechas( $dias->lists('fecha') );
        foreach ($dias as $key => $dia)
            $dia->put( "reservas", isset($reservas[$dia["fecha"]])?$reservas[$dia["fecha"]]->groupBy('horario_id'):[] ); 

        return view('reservas::admin.reservas.index', compact('dias') );
    }

    public function usuarios_reservas( Request $re )
    {
        $re['estado'] = $re['state'];
        $re['fecha'] = $re['date'];
        $re['horario_id'] = $re['schedule'];
        $re['fecha_formated'] = $re['date']?\Carbon::createFromFormat("Y-m-d", $re['date'])->format('d/m/Y'):null;
        $re['horarios'] = collect( \Horario::select('id', 'desde', 'hasta')->where('dia_id', $re['dia_id'])->orderBy('desde', 'ASC')->get()->lists('desde_hasta', 'id')->toArray() );
        $tmp[""] = "--";
        foreach ($re['horarios'] as $key => $horario) 
            $tmp[$key] = $horario;
        $re['horarios'] = $tmp;
        $date = \Carbon::createFromFormat('Y-m-d', $re['date']);
        $re['fecha_nombre'] = $this->reserva->get_array_dias()[$date->format('l')] . " ".$date->format('d')." de ".$this->reserva->get_mes_name_by_number( $date->format('m') )." del ".$date->format('Y');
        $re["desde_hasta"] = \Horario::find($re['schedule'])->desde_hasta;
        return view('reservas::admin.reservas.usuarios-reservas', $re->all());
    }

    public function usuarios_reservas_ajax( Request $re )
    {
        $reservas_query = \Reserva::
        whereHas
        (
            'profile', function($profile_query) use ($re)
            {
                $profile_query->whereHas('user', function($user_query) use ($re)
                {
                    if( $re->has('usuario') and trim($re['usuario']) !== "" )
                        $user_query->where( DB::raw('CONCAT( COALESCE(last_name,"")," ",COALESCE(first_name,"")) as full_name'), 'like', "%{$re['usuario']}%");
                });
            }
        )
        ->whereHas
        (
            'horario', function($horario_query) use ($re)
            {
                if( $re->has('horario_id') and trim($re['horario_id']) !== "" )
                    $horario_query->where('id', $re["horario_id"]);
            }
        )
        ->with
        ([
            'profile' => function($profile_query) use ($re)
            {
                $profile_query->with(['user' => function($user_query) use ($re)
                {
                    $user_query->select('id', 'first_name', 'last_name', DB::raw('CONCAT( COALESCE(last_name,"")," ",COALESCE(first_name,"")) as full_name'));
                }])
                ->select('id', "user_id");
            },
            'horario' => function($horario_query) use ($re)
            {
                $horario_query->select('id', 'desde', 'hasta');   
            }
        ])
        ->select('id', 'profile_id', 'fecha', 'horario_id', 'estado');

        if( $re->has('fecha_desde') and trim($re['fecha_desde']) !== "" )
            $reservas_query->where('fecha', '>=', \Carbon::createFromFormat("d/m/Y", $re['fecha_desde'])->format("Y-m-d") );
        if( $re->has('fecha_hasta') and trim($re['fecha_hasta']) !== "" )
            $reservas_query->where('fecha', '<=', \Carbon::createFromFormat("d/m/Y", $re['fecha_hasta'])->format("Y-m-d") );
        if( $re->has('estado') and trim($re['estado']) !== "" )
            $reservas_query->where('estado', $re['estado']);

    //dd($reservas_query->get()->toArray());

        $object = \Datatables::of( $reservas_query )
        ->addColumn('usuario', function ($reserva) use ( $re )
        {
            return $reserva->profile->user->last_name . " " . $reserva->profile->user->first_name;
        })
        ->addColumn('fecha', function ($reserva) use ( $re )
        {
            return \Carbon::createFromFormat("Y-m-d", $reserva->fecha)->format("d/m/Y");
        })
        ->addColumn('horario', function ($reserva) use ( $re )
        {
            return $reserva->horario->desde_hasta;
        })
        ->addColumn('estado', function ($reserva) use ( $re )
        {
            return $reserva->estado;
        })
        ->setRowClass("text-center")
        ->make(true);
        $data = $object->getData(true);
        return response()->json( $data );
    }
















}
