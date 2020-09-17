<?php namespace Modules\Profile\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Profile extends Model
{
    //use Translatable;

    protected $table = 'profile__profiles';
    //public $translatedAttributes = [];
    protected $fillable = [
        'user_id',
        'tipo_usuario_id',
        'user_token',
        'genero',
        'altura',
        'peso',
        'fran',
        'helen',
        'grace',
        'filthy',
        'fight_gone_bad',
        'sprint',
        'run',
        'clean_jerk',
        'snatch',
        'deadlift',
        'back_squat',
        'max_pull_ups',
        'edad',
        'estado_cuenta',
        'fecha_vencimiento',
        'deadlift',
        'back_squat',
        'front_squat',
        'ohs',
        'snatch',
        'clean',
        'clean_jerk',
        'press',
        'push_press',
        'bench_press',
        'thrusters',
        'max_pull_ups',
        'c2b',
        't2b',
        'mu',
        'bmu',
        'hspu',
        'hsw'
    ];

    public function reservas()
    {
        return $this->hasMany( \Profile::class, 'id', 'profile_id' );
    }

    public function tipo_usuario()
    {
        return $this->belongsTo( \TipoUsuario::class, 'tipo_usuario_id', 'id' );
    }

    public function user()
    {
        $driver = config('asgard.user.users.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }

    public function getFechaVencimientoAttribute()
    {
        $date = $this->attributes['fecha_vencimiento'];
        $dateObject = DateTime::createFromFormat('Y-m-d', $date);
        return $dateObject->format('d-m-Y');
    }

    public function getEstadoCuentaAttribute(){
        $estado_cuenta = $this->attributes['estado_cuenta'];
        if( !empty($estado_cuenta)){
            $estado_cuenta = number_format($estado_cuenta,0 ,"",".");
        }else{
            $estado_cuenta = '';
        }
        return $estado_cuenta;
    }
}
