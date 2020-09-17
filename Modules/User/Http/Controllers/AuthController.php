<?php namespace Modules\User\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Response;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\User\Exceptions\InvalidOrExpiredResetCode;
use Modules\User\Exceptions\UserNotFoundException;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Http\Requests\ResetCompleteRequest;
use Modules\User\Http\Requests\ResetRequest;
use Modules\User\Services\UserRegistration;
use Modules\User\Services\UserResetter;
use Modules\Profile\Entities\Profile;
use Illuminate\Support\Facades\Auth;
use Modules\User\Repositories\UserRepository;

class AuthController extends BasePublicController
{
    use DispatchesJobs;

    protected $user;

    public function __construct(UserRepository $user)
    {
        parent::__construct();

        $this->user = $user;

    }

    public function getLogin()
    {
        return view('user::public.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = (bool) $request->get('remember_me', false);

        $error = $this->auth->login($credentials, $remember);
        if (!$error) {
            flash()->success(trans('user::messages.successfully logged in'));

            return redirect()->intended('/');
        }

        flash()->error($error);

        return redirect()->back()->withInput();
    }

    public function getRegister()
    {
        return view('user::public.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        app(UserRegistration::class)->register($request->all());

        flash()->success(trans('user::messages.account created check email for activation'));

        return redirect()->route('register');
    }

    public function getLogout()
    {
        $this->auth->logout();

        return redirect()->route('login');
    }

    public function getActivate($userId, $code)
    {
        if ($this->auth->activate($userId, $code)) {
            flash()->success(trans('user::messages.account activated you can now login'));

            return redirect()->route('login');
        }
        flash()->error(trans('user::messages.there was an error with the activation'));

        return redirect()->route('register');
    }

    public function getReset()
    {
        return view('user::public.reset.begin');
    }

    public function postReset(ResetRequest $request)
    {
        try {
            app(UserResetter::class)->startReset($request->all());
        } catch (UserNotFoundException $e) {
            flash()->error(trans('user::messages.no user found'));

            return redirect()->back()->withInput();
        }

        flash()->success(trans('user::messages.check email to reset password'));

        return redirect()->route('reset');
    }

    public function getResetComplete()
    {
        return view('user::public.reset.complete');
    }

    public function postResetComplete($userId, $code, ResetCompleteRequest $request)
    {
        try {
            app(UserResetter::class)->finishReset(
                array_merge($request->all(), ['userId' => $userId, 'code' => $code])
            );
        } catch (UserNotFoundException $e) {
            flash()->error(trans('user::messages.user no longer exists'));

            return redirect()->back()->withInput();
        } catch (InvalidOrExpiredResetCode $e) {
            flash()->error(trans('user::messages.invalid reset code'));

            return redirect()->back()->withInput();
        }

        flash()->success(trans('user::messages.password reset'));

        return redirect()->route('login');
    }

    public function apiLogin( Request $request)
    {

        $credentials = 
        [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $error = $this->auth->login($credentials, false);

        if (!$error) 
        {
            $user = $this->user->find($this->auth->id());
            
            $profile_img = Profile::where('user_id', $this->auth->id())->get(['profile_img']);

            $profile_string = '';
            if(!$profile_img->isEmpty())
                $profile_string = $profile_img[0]['profile_img'];
            


            return Response::json
            ([
                'status' => 'OK',
                //'userid' => $this->auth->id(),
                'user_token' => $user->profile->user_token,
                'activo' => $user->isActivated(),
                'nombre' => $user->first_name . ' '. $user->last_name,
                'profile_img' => $profile_string
            ]);
        }

        return Response::json(['status' => 'NOK']);
    }

    public function apiLogout(Request $request){

        $user_id = \Profile::where('user_token', $request['user_token'])->first()->user_id;

        if ($this->auth->id() == $user_id) 
        {
            $this->auth->logout();
            return Response::json(['status' => 'OK']);
        }else{
            return Response::json(['status' => 'NOK']);
        }


    }
}
