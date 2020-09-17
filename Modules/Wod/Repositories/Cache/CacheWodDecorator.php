<?php namespace Modules\Wod\Repositories\Cache;

use Modules\Wod\Repositories\WodRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheWodDecorator extends BaseCacheDecorator implements WodRepository
{
    public function __construct(WodRepository $wod)
    {
        parent::__construct();
        $this->entityName = 'wod.wods';
        $this->repository = $wod;
    }
}
