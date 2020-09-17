<?php namespace Modules\Reservas\Repositories\Cache;

use Modules\Reservas\Repositories\DiaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDiaDecorator extends BaseCacheDecorator implements DiaRepository
{
    public function __construct(DiaRepository $dia)
    {
        parent::__construct();
        $this->entityName = 'reservas.dias';
        $this->repository = $dia;
    }
}
