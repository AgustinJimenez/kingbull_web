<?php namespace Modules\Profile\Sidebar;

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
            $group->item(trans('Cuotas'), function (Item $item) 
            {
                $item->icon('fa fa-copy');
                $item->weight(5);
                $item->authorize( true );

                $item->item(trans('Cuotas'), function (Item $item) 
                {
                    $item->icon('fa fa-copy');
                    $item->weight(1);
                    $item->append('admin.profile.profile.create');
                    $item->route('admin.profile.profile.index');
                    $item->authorize(
                        $this->auth->hasAccess('profile.profiles.index')
                    );
                });

                

            });
        });

        return $menu;
    }
}
