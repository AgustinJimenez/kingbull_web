<?php namespace Modules\Contacto\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Contacto\Entities\Contacto;
use Illuminate\Support\Facades\Storage;


use Response;

class ContactoApiController extends AdminBaseController
{
    /**
     * Obtiene el perfil especifico de un usuario
     * @param $id
     * @return mixed
     */
    public function getContacto(  )
    {
        $contactos = Contacto::orderBy('id','DESC')->first();

        return Response::json($contactos);
    }

}
