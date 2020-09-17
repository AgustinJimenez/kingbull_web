<?php namespace Modules\Wod\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;
use DateTime;
use Modules\Media\Image\Facade\Imagy;

class Wod extends Model
{
    use MediaRelation;

    protected $table = 'wod__wods';
    protected $fillable = [
        'titulo',
        'resumen',
        'contenido',
    ];

    protected $appends = ['fecha','imagen'];

    public function getFechaAttribute()
    {
        $date = $this->attributes['created_at'];
        $dateObject = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $dateObject->format('d-m-Y');
    }

    public function getImagenAttribute()
    {
        if ($this->files()->first()){
            //return $this->files()->first()->path->getUrl();
            return Imagy::getThumbnail($this->files()->first()->path, 'bigThumb');
        }else{
            return "";
        }
    }

    public function getContenidoAttribute()
    {
        $contenido = $this->attributes['contenido'];
        $contenido = strip_tags($contenido);
        return $contenido;
    }

    public function scopeCreatedAtDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    }
}
