<?php namespace Modules\Reservas\Entities;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas__reservas';
    protected $fillable = 
    [
    	'profile_id',
		'fecha',
		'horario_id',
		'estado'
    ];

    public function profile()
    {
    	return $this->belongsTo( \Profile::class, "profile_id" );
    } 
    public function horario()
    {
        return $this->belongsTo( \Horario::class, 'horario_id' );
    }
}
