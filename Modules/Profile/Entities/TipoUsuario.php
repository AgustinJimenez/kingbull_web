<?php namespace Modules\Profile\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model 
{
	protected $table = 'profile_tipo_usuario';
    protected $fillable = 
    [
    	'nombre',
    	'cantidad'
    ];

    public function getEditRouteAttribute()
    {
    	return route('admin.profile.tipos_usuarios.edit', array($this->id));
    }

    public function getDestroyRouteAttribute()
    {
    	return route( 'admin.profile.tipos_usuarios.destroy', array($this->id));
    }

    public function profiles()
    {
        return $this->hasMany( \Profile::class, "tipo_usuario_id");
    }
}