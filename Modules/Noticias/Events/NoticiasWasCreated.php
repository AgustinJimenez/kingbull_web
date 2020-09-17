<?php

namespace Modules\Noticias\Events;

use Modules\Noticias\Entities\Noticia;
use Modules\Media\Contracts\StoringMedia;

class NoticiaWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Noticia
     */
    public $noticia;

    public function __construct($noticia, array $data)
    {
        $this->data = $data;

        $this->noticia = $noticia;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->noticia;
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