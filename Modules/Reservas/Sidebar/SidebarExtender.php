<?php namespace Modules\Reservas\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) 
        {
            $group->item("Reservas", function (Item $item) 
            {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(/* append */);

                $item->item('Dias', function (Item $item) 
                {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.reservas.dia.create');
                    $item->route('admin.reservas.dia.index');
                    $item->authorize($this->auth->hasAccess('reservas.dias.index'));
                });

                $item->item('Horarios', function (Item $item) 
                {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.reservas.horario.create');
                    $item->route('admin.reservas.horario.index');
                    $item->authorize($this->auth->hasAccess('reservas.horarios.index'));
                });

                $item->item('Reservas', function (Item $item) 
                {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->route('admin.reservas.reserva.index');
                    $item->authorize($this->auth->hasAccess('reservas.reservas.index'));
                });
                



            });
        });

        return $menu;
    }
}
