<?php namespace Modules\Reservas\Entities;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Reserva extends Model
{
    protected $table = 'reservas__reservas';
    protected $fillable = [
        'fecha',
        'reservar',
        'user_id'
    ];

    public function user()
    {
        $driver = config('asgard.user.users.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }

//    public function getFechaAttribute()
//    {
//        $date = $this->attributes['fecha'];
//
//
//        $dateObject = DateTime::createFromFormat('Y-m-d H:i:s', $date);
//        dd($dateObject);
//        return $dateObject->format('d-m-Y');
//    }
}
