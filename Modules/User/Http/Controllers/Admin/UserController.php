<?php namespace Modules\User\Http\Controllers\Admin;

use Modules\Core\Contracts\Authentication;
use Modules\User\Events\UserHasBegunResetProcess;
use Modules\User\Http\Requests\CreateUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Modules\User\Permissions\PermissionManager;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;

class UserController extends BaseUserModuleController
{
    /**
     * @var UserRepository
     */
    private $user;
    /**
     * @var RoleRepository
     */
    private $role;
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @param PermissionManager $permissions
     * @param UserRepository    $user
     * @param RoleRepository    $role
     * @param Authentication    $auth
     */
    public function __construct(
        PermissionManager $permissions,
        UserRepository $user,
        RoleRepository $role,
        Authentication $auth
    ) {
        parent::__construct();

        $this->permissions = $permissions;
        $this->user = $user;
        $this->role = $role;
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->all();

        if(! \TipoUsuario::exists() )
        {
            flash()->error( "Debe de crear algun tipo de usuario primero." );
            return redirect()->route("admin.profile.tipos_usuarios.index");
        }

        $profiles_without_token = \Profile::whereNull('user_token')->get();
        $profiles_without_tipo_usuario_id = \Profile::whereNull('tipo_usuario_id')->get();
        

        if( $profiles_without_token->count() )
            foreach ($profiles_without_token as $key => $profile) 
            {
                $profile->user_token = $this->generate_user_token_for_profile();
                $profile->save();
            }

        if( $profiles_without_tipo_usuario_id->count() )
            foreach ($profiles_without_tipo_usuario_id as $key => $profile) 
            {
                $profile->tipo_usuario_id = \TipoUsuario::first()->id;
                $profile->save();
            }

        $currentUser = $this->auth->check();

        //dd( $users->first()->profile->tipo_usuario->nombre );

        return view('user::admin.users.index', compact('users', 'currentUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tipos_usuarios_array_list = \TipoUsuario::lists('nombre', 'id')->toArray();
        $roles = $this->role->all();
        return view('user::admin.users.create', compact('roles', 'tipos_usuarios_array_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserRequest $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $this->mergeRequestWithPermissions($request);

        $this->user->createWithRoles($data, $request->roles, true);
        $this->update_user_profile(\User::orderBy('id', "DESC")->first(), $data);

        flash(trans('user::messages.user created'));

        return redirect()->route('admin.user.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int      $id
     * @return Response
     */
    public function edit($id)
    {
        if (!$user = $this->user->find($id)) {
            flash()->error(trans('user::messages.user not found'));

            return redirect()->route('admin.user.user.index');
        }
        $roles = $this->role->all();

        $currentUser = $this->auth->check();
        $tipos_usuarios_array_list = \TipoUsuario::lists('nombre', 'id')->toArray();
        return view('user::admin.users.edit', compact('user', 'roles', 'currentUser', 'tipos_usuarios_array_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int               $id
     * @param  UpdateUserRequest $request
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $data = $this->mergeRequestWithPermissions($request);
        $this->user->updateAndSyncRoles($id, $data, $request->roles);
        $this->update_user_profile(\User::find($id), $data);
        flash(trans('user::messages.user updated'));

        return redirect()->route('admin.user.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->user->delete($id);

        flash(trans('user::messages.user deleted'));

        return redirect()->route('admin.user.user.index');
    }

    public function sendResetPassword($user, Authentication $auth)
    {
        $user = $this->user->find($user);
        $code = $auth->createReminderCode($user);

        event(new UserHasBegunResetProcess($user, $code));

        flash(trans('user::auth.reset password email was sent'));

        return redirect()->route('admin.user.user.edit', $user->id);
    }

    private function update_user_profile($user, $data)
    {
        $profile = \Profile::where('user_id', $user->id)->first();
        $profile->tipo_usuario_id = (int)$data['tipo_usuario_id'];
        if(!$profile->user_token)
            $profile->user_token = $this->generate_user_token_for_profile();
        $profile->save();
    }

    private function generate_user_token_for_profile()
    {
        $is_repeated = true;
        while($is_repeated)
        {
            $user_token = str_random(60);
            $is_repeated = \Profile::where('user_token', $user_token)->exists() ;
        }
        return $user_token;
    }





}
