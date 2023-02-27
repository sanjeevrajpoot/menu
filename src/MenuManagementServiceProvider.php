<?php

namespace Indianic\MenuManagement;

use Illuminate\Http\Request;
use Indianic\MenuManagement\Nova\Resources\Menu;
use Indianic\MenuManagement\Policies\MenuPolicy;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Indianic\MenuManagement\Models\Menu as ModelsMenu;

class MenuManagementServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setModulePermissions();

        Gate::policy(\Indianic\MenuManagement\Models\Menu::class, MenuPolicy::class);

        Nova::serving(function (ServingNova $event) {

            Nova::resources([
                Menu::class,
            ]);
        });

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([__DIR__ . '/../config' => config_path()], 'menu-management-config');

        if (config('nova-menu.default') === true) {
            $this->customMenu();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/nova-menu.php',
            'nova-menu',
        );
    }

    /**
     * Set Menu Management module permissions
     *
     * @return void
     */
    private function setModulePermissions()
    {
        $existingPermissions = config('nova-permissions.permissions');

        //Menu management permissions
        $existingPermissions['view menu-management'] = [
            'display_name' => 'View menu management',
            'description'  => 'Can view menu management',
            'group'        => 'Menu Management'
        ];

        $existingPermissions['create menu-management'] = [
            'display_name' => 'Create menu management',
            'description'  => 'Can create menu management',
            'group'        => 'Menu Management'
        ];

        $existingPermissions['update menu-management'] = [
            'display_name' => 'Update menu management',
            'description'  => 'Can update menu management',
            'group'        => 'Menu Management'
        ];

        \Config::set('nova-permissions.permissions', $existingPermissions);
    }

    /**
     * Get the menu item that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function customMenu()
    {

        $menuItems = ModelsMenu::where('parent_id', null)
            ->with(['menus' => function ($query) {
                $query->orderBy('sort_order', 'ASC');
            }])
            ->orderBy('sort_order', 'ASC')
            ->get();

        Nova::mainMenu(function (Request $request) use ($menuItems) {
            $items = [];
            foreach ($menuItems as $key => $value) {
                $sectionItems = [];
                if (count($value->menus) > 0) {
                    if (count($value->menus) > 1) {
                        foreach ($value->menus as $k => $v) {
                            if ($v->is_external_url == false) {
                                $sectionItems[] =  MenuItem::link($v->display_name, $v->url);
                            } else {
                                $sectionItems[] =  MenuItem::externalLink($v->display_name, $v->url)->openInNewTab();
                            }
                        }
                        $items[] = MenuSection::make(
                            $value->name,
                            $sectionItems
                        )->icon($value->icon)->collapsable();
                    } else {
                        if ($value->menus[0]->is_external_url == false) {
                            $items[] =  MenuSection::make($value->menus[0]->display_name)
                                ->path($value->menus[0]->url)
                                ->icon($value->icon);
                        } else {
                            $items[] =  MenuSection::make(
                                $value->name,
                                [
                                    MenuItem::externalLink($value->menus[0]->display_name, $value->menus[0]->url)
                                        ->openInNewTab()
                                ]
                            )->icon($value->icon)->collapsable();
                        }
                    }
                }
            }

            return [collect($items)];
        });
    }
}
