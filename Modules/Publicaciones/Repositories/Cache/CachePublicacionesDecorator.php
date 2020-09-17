<?php namespace Modules\Publicaciones\Repositories\Cache;

use Modules\Publicaciones\Repositories\PublicacionesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePublicacionesDecorator extends BaseCacheDecorator implements PublicacionesRepository
{
    public function __construct(PublicacionesRepository $publicaciones)
    {
        parent::__construct();
        $this->entityName = 'publicaciones.publicaciones';
        $this->repository = $publicaciones;
    }
}
