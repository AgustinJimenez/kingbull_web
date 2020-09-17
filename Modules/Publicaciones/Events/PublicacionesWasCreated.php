<?php

namespace Modules\Publicaciones\Events;

use Modules\Publicaciones\Entities\Publicaciones;
use Modules\Media\Contracts\StoringMedia;

class PublicacionWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Noticia
     */
    public $publicacion;

    public function __construct($publicacion, array $data)
    {
        $this->data = $data;

        $this->publicacion = $publicacion;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->publicacion;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}