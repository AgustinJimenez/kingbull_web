<?php namespace Modules\Noticias\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Noticias\Entities\Noticia;
use Modules\Noticias\Repositories\NoticiaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Noticias\Http\Requests\NoticiaRequest;
use Modules\Media\Repositories\FileRepository;
use Modules\Noticias\Events\NoticiaWasCreated;
class NoticiaController extends AdminBaseController
{
    /**
     * @var NoticiaRepository
     */
    private $noticia;

    public function __construct(NoticiaRepository $noticia)
    {
        parent::__construct();

        $this->noticia = $noticia;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $noticias = Noticia::createdAtDescending()->get();

        return view('noticias::admin.noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('noticias::admin.noticias.create', compact('imagen'));
    }

    /**
     * Store a newly created resource in storage.
     * @param NoticiaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NoticiaRequest $request)
    {
        $noticia = $this->noticia->create($request->all());

        event(new NoticiaWasCreated($noticia, $request->all()));

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('noticias::noticias.title.noticias')]));

        return redirect()->route('admin.noticias.noticia.index');
    }

    /**
     * @param Noticia $noticia
     * @param FileRepository $FileRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Noticia $noticia, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen',$noticia);
        return view('noticias::admin.noticias.edit', compact('noticia', 'imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Noticia $noticia
     * @param  Request $request
     * @return Response
     */
    public function update(Noticia $noticia, Request $request)
    {
        $this->noticia->update($noticia, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('noticias::noticias.title.noticias')]));

        return redirect()->route('admin.noticias.noticia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Noticia $noticia
     * @return Response
     */
    public function destroy(Noticia $noticia)
    {
        $this->noticia->destroy($noticia);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('noticias::noticias.title.noticias')]));

        return redirect()->route('admin.noticias.noticia.index');
    }
}
