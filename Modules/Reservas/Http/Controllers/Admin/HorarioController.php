<?php namespace Modules\Reservas\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Reservas\Entities\Horario;
use Modules\Reservas\Repositories\HorarioRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
class HorarioController extends AdminBaseController
{
    /**
     * @var HorarioRepository
     */
    private $horario;

    public function __construct(HorarioRepository $horario)
    {
        parent::__construct();

        $this->horario = $horario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $horarios = \Horario::orderBy('desde', 'ASC')->get(['desde', 'hasta', 'dia_id'])->toArray();
        $dias = $this->index_dia_query()->get();
        $config = \ReservaConfig::first();
        if(!$config)
            $config = \ReservaConfig::create();
/*
        while($horarios)
            foreach ($dias as $key_dia => $dia) 
            {
                foreach ($horarios as $key_horarios => $horario) 
                    if($dia->id == $horario['dia_id'])
                    {
                        $new_horarios[] = $horarios[$key_horarios];
                        unset( $horarios[$key_horarios] );
                    }

                $new_horarios[] = array( 'desde' => "cambio", 'hasta' => "cambio", 'dia_id' => "cambio" );
            }
*/
        return view('reservas::admin.horarios.index', compact('dias'/*, 'new_horarios'*/, 'config') );
    }
    private function index_dia_query()
    {
        return \Dia::orderBy('orden', 'asc');
    }
    public function index_ajax(Request $re)
    {
        $horarios_query = \Horario::orderBy('desde', 'ASC')->select();
        $horarios = \Horario::orderBy('desde', 'ASC')->get(['desde', 'hasta', 'dia_id'])->toArray();

        $object = \Datatables::of( $horarios_query )
        ->setRowClass(function ($tabla) 
        {
            return "text-center";
        });
        foreach ($this->index_dia_query()->get() as $key => $dia)
            $object->addColumn( $dia->id, function ($tabla) use ( $dia, $horarios )
            {
                /*
                foreach ($horarios as $index => $horario) 
                {
                    if( $horario['dia_id'] == $dia->id )
                    {
                        $target = $horarios[$index];
                        unset($horarios[$index]);
                        break;
                    }
                }
                if($target)
                    return $target;
                else 
                    return null;
                */

                
                if( $dia->id == $tabla->dia_id )
                    return $tabla->desde . " - " . $tabla->hasta;
                else
                    return null;
                
            });
        return $object->make( true );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('reservas::admin.horarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $re)
    {
        $other_horario = \Horario::where('dia_id', $re['dia_id'])
        ->where('desde', '>', $re['desde'])
        ->where('hasta', '<', $re['hasta'])
        ->orWhere(function ($query) use ( $re )
        {
            $query
            ->where('dia_id', $re['dia_id'])
            ->where('desde', $re['desde'])
            ->where('hasta', $re['hasta'])
            ->orWhere(function ($query) use ( $re )
            {
                $query
                ->where('dia_id', $re['dia_id'])
                ->where('desde', '<=', $re['desde'])
                ->where('hasta', '>', $re['hasta'])
                ->orWhere(function ($query) use ( $re )
                {
                    $query
                    ->where('dia_id', $re['dia_id'])
                    ->where('desde', '<', $re['desde'])
                    ->where('hasta', '>=', $re['hasta'])
                    ->orWhere(function ($query) use ( $re )
                    {
                        $query
                        ->where('dia_id', $re['dia_id'])
                        ->where('desde', '=', $re['desde'])
                        ->where('hasta', '>=', $re['hasta'])
                        ->orWhere(function ($query) use ( $re )
                        {
                            $query
                            ->where('dia_id', $re['dia_id'])
                            ->where('desde', '=', $re['desde'])
                            ->where('hasta', '<=', $re['hasta']);
                        });
                    });
                });
            });
        })
        ->first();
        $desde_hasta_diff = \Carbon::createFromFormat('H:i', $re['desde'])->diffInMinutes( \Carbon::createFromFormat('H:i', $re['hasta']), false );
        if( $desde_hasta_diff < 0 )//endif
            return response()->json([ 'status' => 'NOK', 'message' => "Desde no debe de ser menor a Hasta"]);

        if($other_horario)//endif
            return response()->json([ 'status' => 'NOK', 'message' => "El horario ingresado coincide con otro registrado en el dia '{$other_horario->dia->nombre}' [ {$other_horario->desde} - {$other_horario->hasta} ]"]);
        else
        {
            $horario = new \Horario;
            $horario->fill( $re->all() )
            ->save()
            ;
            return response()->json([ 'status' => 'OK', 'message' => "Horario creado correctamente.", 'desde' => $horario->desde, 'hasta' => $horario->hasta, 'dia_id' => $horario->dia_id, 'horario_id' => $horario->id, 'cantidad_maxima_usuarios' => $horario->cantidad_maxima_usuarios ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Horario $horario
     * @return Response
     */
    public function edit(Horario $horario)
    {
        return view('reservas::admin.horarios.edit', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Horario $horario
     * @param  Request $request
     * @return Response
     */
    public function update(Horario $horario, Request $request)
    {
        $this->horario->update($horario, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('reservas::horarios.title.horarios')]));

        return redirect()->route('admin.reservas.horario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Horario $horario
     * @return Response
     */
    public function destroy(Horario $horario)
    {
        $this->horario->destroy($horario);
        flash()->success("Horario eliminado correctamente");
        return redirect()->route('admin.reservas.horario.index');
    }

    public function update_cantidad_maxima_usuarios_horario(Request $re)
    {
        \ReservaConfig::first()->fill( $re->all() )->save();
    }

    public function get_cantidad_usuarios_default()
    {
        return response()->json
        ([
            "cantidad" => \ReservaConfig::select('default_horario_cantidad_limite')->first()->default_horario_cantidad_limite
        ]);
    }
}
