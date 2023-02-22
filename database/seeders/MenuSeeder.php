<?php

namespace Indianic\MenuManagement\Database\Seeders;

use App\Events\UserSignup;
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
        \DB::table('menus')->insert(
            [
                [
                    'name' => 'Dashboard',
                    'parent_id' => null,
                    'display_name' => '',
                    'is_external_url' => false,
                    'url' => '',
                    'sort_order' => 1,
                    'icon' => 'chart-bar'
                ],
                [
                    'name' => 'Dashboard',
                    'parent_id' => 1,
                    'display_name' => 'Dashboard',
                    'is_external_url' => false,
                    'url' => 'dashboards/main',
                    'sort_order' => 2,
                    'icon' => ''
                ],
                [
                    'name' => 'Profiles',
                    'parent_id' => null,
                    'display_name' => '',
                    'is_external_url' => false,
                    'url' => '',
                    'sort_order' => 3,
                    'icon' => 'users'
                ],
                [
                    'name' => 'Users',
                    'parent_id' => 3,
                    'display_name' => 'Users',
                    'is_external_url' => false,
                    'url' => 'resources/users',
                    'sort_order' => 4,
                    'icon' => ''
                ],
                [
                    'name' => 'Admin',
                    'parent_id' => 3,
                    'display_name' => 'Admin',
                    'is_external_url' => false,
                    'url' => 'resources/admins',
                    'sort_order' => 5,
                    'icon' => ''
                ],
                [
                    'name' => 'Roles',
                    'parent_id' => 3,
                    'display_name' => 'Roles',
                    'is_external_url' => false,
                    'url' => 'resources/roles',
                    'sort_order' => 6,
                    'icon' => ''
                ],
                [
                    'name' => 'FAQ',
                    'parent_id' => null,
                    'display_name' => '',
                    'is_external_url' => false,
                    'url' => '',
                    'sort_order' => 7,
                    'icon' => 'question-mark-circle'
                ],
                [
                    'name' => 'FAQs',
                    'parent_id' => 7,
                    'display_name' => 'FAQs',
                    'is_external_url' => false,
                    'url' => 'resources/faqs',
                    'sort_order' => 8,
                    'icon' => ''
                ],
                [
                    'name' => 'Categories',
                    'parent_id' => 7,
                    'display_name' => 'Categories',
                    'is_external_url' => false,
                    'url' => 'resources/faq-categories',
                    'sort_order' => 9,
                    'icon' => ''
                ],
                [
                    'name' => 'Website',
                    'parent_id' => null,
                    'display_name' => '',
                    'is_external_url' => false,
                    'url' => '',
                    'sort_order' => 10,
                    'icon' => 'globe-alt'
                ],
                [
                    'name' => 'CMS Pages',
                    'parent_id' => 10,
                    'display_name' => 'CMS Pages',
                    'is_external_url' => false,
                    'url' => 'resources/c-m-s-pages',
                    'sort_order' => 11,
                    'icon' => ''
                ],
                [
                    'name' => 'Email Templates',
                    'parent_id' => 10,
                    'display_name' => 'Email Templates',
                    'is_external_url' => false,
                    'url' => 'resources/email-templates',
                    'sort_order' => 12,
                    'icon' => ''
                ],
                [
                    'name' => 'Settings',
                    'parent_id' => null,
                    'display_name' => '',
                    'is_external_url' => false,
                    'url' => '',
                    'sort_order' => 13,
                    'icon' => 'adjustments'
                ],
                [
                    'name' => 'General',
                    'parent_id' => 13,
                    'display_name' => 'General',
                    'is_external_url' => false,
                    'url' => 'nova-settings/general',
                    'sort_order' => 14,
                    'icon' => ''
                ],
                [
                    'name' => 'Social Media',
                    'parent_id' => 13,
                    'display_name' => 'Social Media',
                    'is_external_url' => false,
                    'url' => 'nova-settings/social-media',
                    'sort_order' => 15,
                    'icon' => ''
                ],
                [
                    'name' => 'Smtp Details',
                    'parent_id' => 13,
                    'display_name' => 'Smtp Details',
                    'is_external_url' => false,
                    'url' => 'nova-settings/smtp-details',
                    'sort_order' => 16,
                    'icon' => ''
                ],
                [
                    'name' => 'Payment Gateway',
                    'parent_id' => 13,
                    'display_name' => 'Payment Gateway',
                    'is_external_url' => false,
                    'url' => 'nova-settings/payment-gateway',
                    'sort_order' => 17,
                    'icon' => ''
                ],
                [
                    'name' => 'Menus',
                    'parent_id' => null,
                    'display_name' => '',
                    'is_external_url' => false,
                    'url' => '',
                    'sort_order' => 18,
                    'icon' => 'menu'
                ],
                [
                    'name' => 'Menus',
                    'parent_id' => 18,
                    'display_name' => 'Menus',
                    'is_external_url' => false,
                    'url' => 'resources/menus',
                    'sort_order' => 19,
                    'icon' => ''
                ],
            ]
        );
    }
}
