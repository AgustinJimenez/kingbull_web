<?php namespace Modules\Reservas\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Reservas\Entities\Dia;
use Modules\Reservas\Repositories\DiaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DiaController extends AdminBaseController
{
    /**
     * @var DiaRepository
     */
    private $dia;

    public function __construct(DiaRepository $dia)
    {
        parent::__construct();

        $this->dia = $dia;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('reservas::admin.dias.index', ['dias' => Dia::orderBy('orden', 'ASC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('reservas::admin.dias.create', ['dia' => new Dia ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->dia->create($request->all());

        flash()->success("Dia creado correctamente.");

        return redirect()->route('admin.reservas.dia.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Dia $dia
     * @return Response
     */
    public function edit(Dia $dia)
    {
        return view('reservas::admin.dias.edit', compact('dia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Dia $dia
     * @param  Request $request
     * @return Response
     */
    public function update(Dia $dia, Request $request)
    {
        $this->dia->update($dia, $request->all());

        flash()->success("Dia actualizado correctamente");

        return redirect()->route('admin.reservas.dia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Dia $dia
     * @return Response
     */
    public function destroy(Dia $dia)
    {
        $this->dia->destroy($dia);

        flash()->success("Dia eliminado correctamente.");

        return redirect()->route('admin.reservas.dia.index');
    }
}
