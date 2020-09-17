<?php namespace Modules\Reservas\Repositories\Cache;

use Modules\Reservas\Repositories\HorarioRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheHorarioDecorator extends BaseCacheDecorator implements HorarioRepository
{
    public function __construct(HorarioRepository $horario)
    {
        parent::__construct();
        $this->entityName = 'reservas.horarios';
        $this->repository = $horario;
    }
}
