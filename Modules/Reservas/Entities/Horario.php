<?php namespace Modules\Reservas\Entities;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'reservas__horarios';
    protected $fillable = 
    [
    	'desde',
    	'hasta',
        'cantidad_maxima_usuarios',
    	'dia_id'
    ];

    public function dia()
    {
        return $this->belongsTo(\Dia::class, 'dia_id');
    }

    public function reservas()
    {
        return $this->hasMany( \Reserva::class, 'horario_id' );
    }

    public function getDesdeHastaAttribute()
    {
        return $this->desde . " - " . $this->hasta;
    }
    public function setDesdeAttribute($value)
    {
        $this->attributes['desde'] = \Carbon::createFromFormat('H:i', $value)->format("H:i:s");
    }
    public function setHastaAttribute($value)
    {
        $this->attributes['hasta'] = \Carbon::createFromFormat('H:i', $value)->format("H:i:s");
    }
    public function getDesdeAttribute()
    {
    	return \Carbon::createFromFormat('H:i:s', $this->attributes['desde'])->format("H:i");
    }

    public function reservado( $profile_id, $fecha_desde, $fecha_hasta)
    {
        if(!$profile_id)
            dd("falta param profile id en funcion reservado de entidad horario en modulo reservas.");

        return \Reserva::where("profile_id", $profile_id)->where('horario_id', $this->id)->whereBetween('fecha', array($fecha_desde, $fecha_hasta))->where('estado', 'reservado')->exists();
    }

    public function getHastaAttribute()
    {
        return \Carbon::createFromFormat('H:i:s', $this->attributes['hasta'])->format("H:i");
    }

}
