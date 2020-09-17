<?php namespace Modules\Noticias\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;
use DateTime;
use Modules\Media\Image\Facade\Imagy;

class Noticia extends Model
{
    use MediaRelation;

    protected $table = 'noticias__noticias';
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

    public function getContenidoAttribute()
    {
        $contenido = $this->attributes['contenido'];
        $contenido = strip_tags($contenido);
        return $contenido;
    }

    public function getImagenAttribute()
    {
        if ($this->files()->first()){
            return Imagy::getThumbnail($this->files()->first()->path, 'bigThumb');
            //return $this->files()->first()->path->getUrl();
        }else{
            return "";
        }
    }

    public function scopeCreatedAtDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    }
}
