<?php namespace Modules\Publicaciones\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Publicaciones\Entities\Publicaciones;
use Modules\Publicaciones\Repositories\PublicacionesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Publicaciones\Http\Requests\PublicacionRequest;
use Modules\Publicaciones\Events\PublicacionWasCreated;
use Modules\Media\Repositories\FileRepository;

class PublicacionesController extends AdminBaseController
{
    /**
     * @var PublicacionesRepository
     */
    private $publicaciones;

    public function __construct(PublicacionesRepository $publicaciones)
    {
        parent::__construct();

        $this->publicaciones = $publicaciones;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $publicaciones = $this->publicaciones->all();

        return view('publicaciones::admin.publicaciones.index', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('publicaciones::admin.publicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PublicacionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PublicacionRequest $request)
    {
        $request['user_id'] = $request->user()->id;
        $publicacion = $this->publicaciones->create($request->all());

        event(new PublicacionWasCreated($publicacion, $request->all()));

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('publicaciones::publicaciones.title.publicaciones')]));

        return redirect()->route('admin.publicaciones.publicaciones.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Publicaciones $publicaciones
     * @param FileRepository $FileRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Publicaciones $publicaciones, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen',$publicaciones);
        return view('publicaciones::admin.publicaciones.edit', compact('publicaciones', $imagen));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Publicaciones $publicaciones
     * @param  Request $request
     * @return Response
     */
    public function update(Publicaciones $publicaciones, Request $request)
    {
        $this->publicaciones->update($publicaciones, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('publicaciones::publicaciones.title.publicaciones')]));

        return redirect()->route('admin.publicaciones.publicaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Publicaciones $publicaciones
     * @return Response
     */
    public function destroy(Publicaciones $publicaciones)
    {
        $this->publicaciones->destroy($publicaciones);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('publicaciones::publicaciones.title.publicaciones')]));

        return redirect()->route('admin.publicaciones.publicaciones.index');
    }

}
