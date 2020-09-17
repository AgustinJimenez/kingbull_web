<?php namespace Modules\Profile\Http\Controllers\Admin;

use Pingpong\Modules\Routing\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TipoUsuarioController extends AdminBaseController 
{

	public function index()
	{
		return view( 'profile::admin.tipo-usuario.index' , ["tipos_usuarios" => \TipoUsuario::select('id', 'nombre', 'cantidad')->get()] );
	}

	public function create()
	{
		return view( 'profile::admin.tipo-usuario.create' , ["tipo_usuario" => new \TipoUsuario()] );
	}

	public function store(Request $re)
	{
		$tipo_usuario = new \TipoUsuario();
		$tipo_usuario->fill($re->tipo_usuario)->save();
		flash()->success("Tipo de usuario creado correctamente.");
		return redirect()->route('admin.profile.tipos_usuarios.index');
	}

	public function edit(\TipoUsuario $tipo_usuario)
	{
		return view( 'profile::admin.tipo-usuario.edit' , compact('tipo_usuario') );
	}

	public function update(Request $re, \TipoUsuario $tipo_usuario)
	{
		$tipo_usuario->fill($re->tipo_usuario)->save();
		flash()->success("Tipo de usuario actualizado correctamente.");
		return redirect()->route('admin.profile.tipos_usuarios.index');
	}

	public function destroy(\TipoUsuario $tipo_usuario)
	{
		$tipo_usuario->delete();
		flash()->success("Tipo de usuario eliminado correctamente.");
		return redirect()->route('admin.profile.tipos_usuarios.index');
	}
}