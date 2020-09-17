<?php namespace Modules\Wod\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Wod\Entities\Wod;
use Modules\Wod\Http\Requests\WodRequest;
use Modules\Wod\Repositories\WodRepository;
use Modules\Media\Repositories\FileRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Wod\Event\WodWasCreated;

class WodController extends AdminBaseController
{
    /**
     * @var WodRepository
     */
    private $wod;

    public function __construct(WodRepository $wod)
    {
        parent::__construct();

        $this->wod = $wod;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $wods = Wod::createdAtDescending()->get();

        return view('wod::admin.wods.index', compact('wods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('wod::admin.wods.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param WodRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WodRequest $request)
    {
        $wod = $this->wod->create($request->all());

        event(new WodWasCreated($wod, $request->all()));

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('wod::wods.title.wods')]));

        return redirect()->route('admin.wod.wod.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Wod $wod
     * @param FileRepository $FileRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Wod $wod, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen',$wod);
        return view('wod::admin.wods.edit', compact('wod', 'imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Wod $wod
     * @param  Request $request
     * @return Response
     */
    public function update(Wod $wod, Request $request)
    {
        $this->wod->update($wod, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('wod::wods.title.wods')]));

        return redirect()->route('admin.wod.wod.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Wod $wod
     * @return Response
     */
    public function destroy(Wod $wod)
    {
        $this->wod->destroy($wod);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('wod::wods.title.wods')]));

        return redirect()->route('admin.wod.wod.index');
    }
}
