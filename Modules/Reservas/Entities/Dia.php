<?php namespace Modules\Reservas\Entities;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = 'reservas__dias';
    protected $fillable = 
    [
    	'nombre',
    	'orden'
    ];

    public function horarios()
    {
    	return $this->hasMany(\Horario::class, 'dia_id')->orderBy('desde', 'ASC');
    }

}
