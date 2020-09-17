<?php namespace Modules\Reservas\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Reservas\Entities\Reserva;
use Modules\Reservas\Repositories\ReservaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ReservaController extends AdminBaseController
{
    /**
     * @var ReservaRepository
     */
    private $reserva;

    protected $table_reservas = "reservas__reservas";

    public function __construct(ReservaRepository $reserva)
    {
        parent::__construct();

        $this->reserva = $reserva;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fechaHoy = date('d-m-Y');
        //dd($fechaHoy);
        //$reservas = $this->reserva->all();
        $reservas = DB::table($this->table_reservas)
            ->select(DB::raw('id, fecha, sum(reservar = true) AS total'))
            ->where('reservar', true)
            ->where('fecha', '>=', $fechaHoy)
            ->groupBy('fecha')
            ->get();

        //dd($reservas);

        return view('reservas::admin.reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('reservas::admin.reservas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->reserva->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('reservas::reservas.title.reservas')]));

        return redirect()->route('admin.reservas.reserva.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Reserva $reserva
     * @return Response
     */
    public function edit(Reserva $reserva)
    {
        return view('reservas::admin.reservas.edit', compact('reserva'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Reserva $reserva
     * @param  Request $request
     * @return Response
     */
    public function update(Reserva $reserva, Request $request)
    {
        $this->reserva->update($reserva, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('reservas::reservas.title.reservas')]));

        return redirect()->route('admin.reservas.reserva.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Reserva $reserva
     * @return Response
     */
    public function destroy(Reserva $reserva)
    {
        $this->reserva->destroy($reserva);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('reservas::reservas.title.reservas')]));

        return redirect()->route('admin.reservas.reserva.index');
    }
}
