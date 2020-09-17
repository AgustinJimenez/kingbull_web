<?php namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Profile\Entities\Profile;
use Modules\User\Repositories\UserRepository;
use Response;
class ProfileApiController extends AdminBaseController
{
    /**
     * @var UserRepository
     */
    private $user;


    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Obtiene todos los perfiles de los usuarios
     * @return mixed
     */
    public function allProfile()
    {
        $profile = Profile::with('user')->get();

        foreach($profile as $value)
        {
            $value->genero = ($value->genero == null ? '' : $value->genero);
            $value->altura = ($value->altura == null ? '' : $value->altura);
            $value->peso = ($value->peso == null ? '' : $value->peso);
            $value->fran = ($value->fran == null ? '' : $value->fran);
            $value->helen = ($value->helen == null ? '' : $value->helen);
            $value->grace = ($value->grace == null ? '' : $value->grace);
            $value->filthy = ($value->filthy == null ? '' : $value->filthy);
            $value->fight_gone_bad = ($value->fight_gone_bad == null ? '' : $value->fight_gone_bad);
            $value->sprint = ($value->sprint == null ? '' : $value->sprint);
            $value->run = ($value->run == null ? '' : $value->run);
            $value->clean_jerk = ($value->clean_jerk == null ? '' : $value->clean_jerk);
            $value->snatch = ($value->snatch == null ? '' : $value->snatch);
            $value->deadlift = ($value->deadlift == null ? '' : $value->deadlift);
            $value->back_squat = ($value->back_squat == null ? '' : $value->back_squat);
            $value->max_pull_ups = ($value->max_pull_ups == null ? '' : $value->max_pull_ups);
            $value->edad = ($value->edad == null ? '' : $value->edad);
        }

        return response()->json($profile);
    }

    /**
     * Obtiene el perfil especifico de un usuario
     * @param $id
     * @return mixed
     */
    public function getProfile(Request $re)
    {
        $profile = Profile::with('user')->where('user_token', $re['user_token'])->first();

        if(!is_null($profile)) 
        {

            $profile->genero = ($profile->genero == null ? '' : $profile->genero);
            $profile->altura = ($profile->altura == null ? '' : $profile->altura);
            $profile->peso = ($profile->peso == null ? '' : $profile->peso);
            $profile->fran = ($profile->fran == null ? '' : $profile->fran);
            $profile->helen = ($profile->helen == null ? '' : $profile->helen);
            $profile->grace = ($profile->grace == null ? '' : $profile->grace);
            $profile->filthy = ($profile->filthy == null ? '' : $profile->filthy);
            $profile->fight_gone_bad = ($profile->fight_gone_bad == null ? '' : $profile->fight_gone_bad);
            $profile->sprint = ($profile->sprint == null ? '' : $profile->sprint);
            $profile->run = ($profile->run == null ? '' : $profile->run);
            $profile->clean_jerk = ($profile->clean_jerk == null ? '' : $profile->clean_jerk);
            $profile->snatch = ($profile->snatch == null ? '' : $profile->snatch);
            $profile->deadlift = ($profile->deadlift == null ? '' : $profile->deadlift);
            $profile->back_squat = ($profile->back_squat == null ? '' : $profile->back_squat);
            $profile->max_pull_ups = ($profile->max_pull_ups == null ? '' : $profile->max_pull_ups);
            $profile->edad = ($profile->edad == null ? '' : $profile->edad);
            //nuevos campos
            $profile->front_squat = $profile->front_squat?$profile->front_squat:"";
            $profile->ohs = $profile->ohs?$profile->ohs:"";
            $profile->clean = $profile->clean?$profile->clean:"";
            $profile->press = $profile->press?$profile->press:"";
            $profile->push_press = $profile->push_press?$profile->push_press:"";
            $profile->bench_press = $profile->bench_press?$profile->bench_press:"";
            $profile->thrusters = $profile->thrusters?$profile->thrusters:"";
            $profile->c2b = $profile->c2b?$profile->c2b:"";
            $profile->t2b = $profile->t2b?$profile->t2b:"";
            $profile->mu = $profile->mu?$profile->mu:"";
            $profile->bmu = $profile->bmu?$profile->bmu:"";
            $profile->hspu = $profile->hspu?$profile->hspu:"";
            $profile->hsw = $profile->hsw?$profile->hsw:"";
        }
        else
        {
            return response()->json(["msg" => "No hay perfil"]);
        }
        //dd($profile);
        return response()->json($profile);
    }

    public function createOrUpdateProfile(Request $request)
    {
        $user_token = $request->input('user_token');

        if(Profile::where('user_token', $user_token)->exists())
        {
            Profile::where('user_token', $user_token)->update( $request->all() );

            return Response::json(['status' => 'OK']);
        }
        else
        {
            Profile::create
            ([
                'genero' => $request->input('genero'),
                'altura' => $request->input('altura'),
                'peso' => $request->input('peso'),
                'fran' => $request->input('fran'),
                'helen' => $request->input('helen'),
                'grace' => $request->input('grace'),
                'filthy' => $request->input('filthy'),
                'fight_gone_bad' => $request->input('fight_gone_bad'),
                'sprint' => $request->input('sprint'),
                'run' => $request->input('run'),
                'clean_jerk' => $request->input('clean_jerk'),
                'snatch' => $request->input('snatch'),
                'deadlift' => $request->input('deadlift'),
                'back_squat' => $request->input('back_squat'),
                'max_pull_ups' => $request->input('max_pull_ups'),
                'edad' => $request->input('edad'),
                'user_token' => generate_user_token_for_profile()
            ]);

            $user = $this->user->find($user_token);
            $user->first_name = $request->input('nombre');
            $user->save();
            return Response::json(['status' => 'OK']);

        }

        return Response::json(['status' => 'NOK']);

    }

    public function uploadProfileImg(Request $request)
    {
        $user_token = $request->input('user_token');
        if ($request->hasFile('file')) 
        {
            $destinationPath = public_path('/assets/media/');
            $file = $request->file('file');
            $file->move($destinationPath,date("Y-m-d H").'__'.$file->getClientOriginalName());

            if(Profile::where('user_token', $user_token)->exists())
            {
                Profile::where('user_token', $user_token)->update([
                    'profile_img' => url('/assets/media').'/'.date("Y-m-d H").'__'.$file->getClientOriginalName()
                ]);
                return response()->json(['status' => 'OK', 'msg' => 'Entro en actualizar profile']);
            }
            else
            {
                dd("profileapicontroller line 170 on uploadProfileImg function");
                //$profile = new Profile;
                //$profile->profile_img = url('/assets/media').'/'.date("Y-m-d H").'__'.$file->getClientOriginalName();
                //$profile->user_id = $user_id;
                //$profile->save();

                return response()->json(['status' => 'OK', 'msg' => 'Entro en crear profile']);
            }
        }

        return response()->json(['status' => 'NOK']);
    }

    private function generate_user_token_for_profile()
    {
        $is_repeated = true;
        while($is_repeated)
        {
            $user_token = str_random(60);
            $is_repeated = ( \Profile::where('user_token', $user_token)->count() )?true:false;
        }
        return $user_token;
    }
}
