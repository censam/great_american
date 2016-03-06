<?php namespace Modules\News\Sidebar;

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
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('Latest News'), function (Item $item) {
                $item->icon('fa fa-newspaper-o');
                $item->append('admin.news.news.create');
                $item->route('admin.news.news.index');
                $item->weight(10);
                $item->authorize(
                    $this->auth->hasAccess('news.news.index')
                );
// append

            });
        });

        return $menu;
    }
}
