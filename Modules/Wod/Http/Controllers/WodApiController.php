<?php namespace Modules\Wod\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Wod\Entities\Wod;
use Modules\Wod\Http\Requests\WodRequest;
use Response;

class WodApiController extends AdminBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $wod = Wod::orderBy('created_at','DESC')->paginate(5);

        return Response::json($wod);
    }

}