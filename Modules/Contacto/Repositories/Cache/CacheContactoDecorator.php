<?php namespace Modules\Contacto\Repositories\Cache;

use Modules\Contacto\Repositories\ContactoRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheContactoDecorator extends BaseCacheDecorator implements ContactoRepository
{
    public function __construct(ContactoRepository $contacto)
    {
        parent::__construct();
        $this->entityName = 'contacto.contactos';
        $this->repository = $contacto;
    }
}
