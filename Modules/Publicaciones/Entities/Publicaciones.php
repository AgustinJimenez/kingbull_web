<?php namespace Modules\Publicaciones\Entities;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Publicaciones extends Model
{
    protected $table = 'publicaciones__publicaciones';
    protected $fillable = [
        'titulo',
        'resumen',
        'contenido',
        'user_id',
        'publi_img'
    ];

    public function user()
    {
        $driver = config('asgard.user.users.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }

    public function getCreatedAtAttribute() //getFechaAttribute()
    {
        $date = $this->attributes['created_at'];
        $dateObject = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $dateObject->format('d-m-Y');
    }

    public function getImagenAttribute()
    {
        if ($this->files()->first()){
            return $this->files()->first()->path->getUrl();
        }else{
            return "";
        }
    }

    public function scopeCreatedAtDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    }
}
