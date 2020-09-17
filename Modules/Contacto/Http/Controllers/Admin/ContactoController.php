<?php namespace Modules\Contacto\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Contacto\Entities\Contacto;
use Modules\Contacto\Repositories\ContactoRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Response;

class ContactoController extends AdminBaseController
{
    /**
     * @var ContactoRepository
     */
    private $contacto;

    public function __construct(ContactoRepository $contacto)
    {
        parent::__construct();

        $this->contacto = $contacto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //dd(basename(public_path()));
        $contactos = Contacto::orderBy('id','DESC')->take(1)->get();

        return view('contacto::admin.contactos.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contacto::admin.contactos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->contacto->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('contacto::contactos.title.contactos')]));

        return redirect()->route('admin.contacto.contacto.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contacto $contacto
     * @return Response
     */
    public function edit(Contacto $contacto)
    {
        return view('contacto::admin.contactos.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Contacto $contacto
     * @param  Request $request
     * @return Response
     */
    public function update(Contacto $contacto, Request $request)
    {
        $this->contacto->update($contacto, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('contacto::contactos.title.contactos')]));

        return redirect()->route('admin.contacto.contacto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contacto $contacto
     * @return Response
     */
    public function destroy(Contacto $contacto)
    {
        $this->contacto->destroy($contacto);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('contacto::contactos.title.contactos')]));

        return redirect()->route('admin.contacto.contacto.index');
    }
}
