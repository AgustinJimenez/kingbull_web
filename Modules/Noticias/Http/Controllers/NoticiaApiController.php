<?php namespace Modules\Noticias\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Noticias\Entities\Noticia;
use Modules\Noticias\Http\Requests\NoticiaRequest;
use Response;

class NoticiaApiController extends AdminBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        //noticias-all
        $noticias = Noticia::orderBy('created_at','DESC')->paginate(5);

        return Response::json($noticias);
    }
}
