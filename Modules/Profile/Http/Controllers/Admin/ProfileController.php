<?php namespace Modules\Profile\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Profile\Entities\Profile;
use Modules\Profile\Repositories\ProfileRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\User\Entities\Sentinel\User;

class ProfileController extends AdminBaseController
{
    /**
     * @var ProfileRepository
     */
    private $profile;

    public function __construct(ProfileRepository $profile)
    {
        parent::__construct();

        $this->profile = $profile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
      $users = User::all();

      foreach ($users as $user) {
        if (!$user->profile)
        {
          $profile = new Profile;
          $profile->user_id = $user->id;
          $profile->save();
        }
      }


        $profiles = $this->profile->all();

        return view('profile::admin.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('profile::admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->profile->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('profile::profiles.title.profiles')]));

        return redirect()->route('admin.profile.profile.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Profile $profile
     * @return Response
     */
    public function edit(Profile $profile)
    {
        return view('profile::admin.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Profile $profile
     * @param  Request $request
     * @return Response
     */
    public function update(Profile $profile, Request $request)
    {
        $profile->estado_cuenta = $request->get('estado_cuenta');
        $profile->fecha_vencimiento = $request->get("fecha_vencimiento");
        $profile->save();

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('profile::profiles.title.profiles')]));

        return redirect()->route('admin.profile.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Profile $profile
     * @return Response
     */
    public function destroy(Profile $profile)
    {
        $this->profile->destroy($profile);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('profile::profiles.title.profiles')]));

        return redirect()->route('admin.profile.profile.index');
    }
}
