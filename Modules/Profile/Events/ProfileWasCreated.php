<?php

namespace Modules\Profile\Events;

use Modules\Profile\Entities\Profile;
use Modules\Media\Contracts\StoringMedia;

class ProfileWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Profile
     */
    public $profile;

    public function __construct($profile, array $data)
    {
        $this->data = $data;

        $this->profile = $profile;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->profile;
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