<?php namespace Modules\Publicaciones\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Publicaciones\Entities\Publicaciones;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;


class PublicacionesApiController extends AdminBaseController
{
    public function allPub( Request $re ) //   /publicaciones-all
    {
        
        $publicaciones = Publicaciones::with('user')
        ->join('profile__profiles', 'profile__profiles.user_id', '=', 'publicaciones__publicaciones.user_id')
        ->select('publicaciones__publicaciones.*','profile__profiles.profile_img')
        ->orderBy('publicaciones__publicaciones.created_at','DESC')->paginate(5);

        return response()->json($publicaciones);
    }

    public function misPub(Request $re)
    {
        $publicaciones = Publicaciones::with('user')
        ->join('profile__profiles', 'profile__profiles.user_id', '=', 'publicaciones__publicaciones.user_id')
        ->select('publicaciones__publicaciones.*','profile__profiles.profile_img')
        ->where('profile__profiles.user_token', $re['user_token'])
        ->orderBy('publicaciones__publicaciones.created_at', 'DESC')
        ->paginate(5);

        return response()->json($publicaciones);
    }

    public function crearPub(Request $request)
    {
        $pub = Publicaciones::create
        ([
            //'titulo' => $request->input('titulo'),
            //'resumen' => $request->input('resumen'),
            'contenido' => $request->input('contenido'),
            'user_id' => \Profile::where('user_token', $request->get('user_token') )->first()->user_id
        ]);

        if($pub)
            return response()->json(['status' => 'OK']);
        else
            return response()->json(['status' => 'NOK', 'extra' => $pub]);

    }

    public function misPubDetalles($id)
    {
        $pub = Publicaciones::find($id);

        return response()->json($pub);
    }

    public function delete(Request $request)
    {
        $pub = Publicaciones::where('id', $request->input('id'))
            ->delete();
        if ($pub) 
        {
          return  response()->json(['status' => 'OK']);
        } 
        else 
        {
          return  response()->json(['status' => 'NOK']);
        }

    }

    public function uploadImgPub(Request $request)
    {
        $pub_id = $request->input('id');
        if ( $request->hasFile('file') ) 
        {
            $destinationPath = public_path('/assets/media/');
            $file = $request->file('file');
            //$extension = $file->getClientOriginalExtension();
            $file->move($destinationPath,date("Y-m-d H:i:s").'-image.jpg');
            $user_id = \Profile::where('user_token', $request->get('user_token') )->first()->user_id;
            if(Publicaciones::where('id', $pub_id)->exists())
            {
                Publicaciones::where('id', $pub_id)->update
                ([
                    'publi_img' => url('/assets/media').'/'.date("Y-m-d H:i:s").'-image.jpg',
                    'user_id' => $user_id,
                    'contenido' => $request->input('contenido')
                ]);
            }
            else
            {
                Publicaciones::create
                ([
                    'publi_img' => url('/assets/media').'/'.date("Y-m-d H:i:s").'-image.jpg',
                    'user_id' => $user_id,
                    'contenido' => $request->input('contenido')
                ]);
            }
            return response()->json([ 'status' => 'OK' ]);
        }
        else
        {
            return response()->json([ 'status' => 'NOK', 'extra' => $request->all() ]);
        }
        return response()->json([ 'status' => 'NIMAGEN' ]);

    }

}