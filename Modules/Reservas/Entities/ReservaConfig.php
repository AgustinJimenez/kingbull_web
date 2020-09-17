<?php namespace Modules\Reservas\Entities;
use Illuminate\Database\Eloquent\Model;

class ReservaConfig extends Model
{
    protected $table = 'reservas__config';
    protected $fillable = 
    [
    	'default_horario_cantidad_limite'
    ];
}