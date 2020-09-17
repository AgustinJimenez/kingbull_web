<?php

namespace Modules\Wod\Event;

use Modules\Wod\Entities\Wod;
use Modules\Media\Contracts\StoringMedia;

class WodWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Wod
     */
    public $wod;

    public function __construct($wod, array $data)
    {
        $this->data = $data;

        $this->wod = $wod;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->wod;
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