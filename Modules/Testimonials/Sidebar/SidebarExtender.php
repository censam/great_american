<?php namespace Modules\Testimonials\Sidebar;

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
            $group->item(trans('Testimonials'), function (Item $item) {
                $item->icon('fa fa-commenting-o');
                $item->weight(10);
                $item->append('admin.testimonials.testimonials.create');
                $item->route('admin.testimonials.testimonials.index');
                $item->authorize(
                    $this->auth->hasAccess('testimonials.testimonials.index')
                );
                // $item->item(trans('testimonials::testimonials.title.testimonials'), function (Item $item) {
                //     $item->icon('fa fa-commenting-o');
                //     $item->weight(0);
                //     $item->append('admin.testimonials.testimonials.create');
                //     $item->route('admin.testimonials.testimonials.index');
                //     $item->authorize(
                //         $this->auth->hasAccess('testimonials.testimonials.index')
                //     );
                // });
// append

            });
        });

        return $menu;
    }
}
