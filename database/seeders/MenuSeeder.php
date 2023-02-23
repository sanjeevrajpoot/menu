<?php

namespace Indianic\MenuManagement\Database\Seeders;

use App\Events\UserSignup;
use Indianic\MenuManagement\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = config('nova-menu.groups');

        $sortOrder = 1;
        if (count($groups) > 0) {
            foreach ($groups as $value) {
                Menu::firstOrCreate([
                    'name'         => $value['name'],
                    'display_name' => null,
                    'parent_id' => null,
                    'is_external_url' => false,
                    'url' => null,
                    'sort_order' => $sortOrder,
                    'icon' => $value['icon']
                ])->id;

                if (!empty($value['menus']) && count($value['menus']) > 0) {
                    foreach ($value['menus'] as $k => $menu) {
                        Menu::firstOrCreate([
                            'name'         => $menu['name'],
                            'display_name' => $menu['display_name'],
                            'parent_id' => $sortOrder,
                            'is_external_url' => false,
                            'url' => $menu['url'],
                            'sort_order' => $sortOrder,
                            'icon' => null
                        ])->id;
                    }
                    $sortOrder = $sortOrder + count($value['menus']);
                }
                $sortOrder++;
            }
        }
    }
}
