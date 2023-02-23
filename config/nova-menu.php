<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Menu
    |--------------------------------------------------------------------------
    */

    'default' => env('CUSTOM_MENU', 'false'),

    /*
    |--------------------------------------------------------------------------
    | Seeder Data
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'groups' => [
        [
            'name' => 'Dashboard',
            'icon' => 'chart-bar',
            'menus' =>  [
                [
                    'name' => 'Dashboard',
                    'display_name' => 'Dashboard',
                    'url' => 'dashboards/main',
                ]
            ]
        ],
        [
            'name' => 'Profiles',
            'icon' => 'users',
            'menus' => [
                [
                    'name' => 'Users',
                    'display_name' => 'Users',
                    'url' => 'resources/users',
                ],
                [
                    'name' => 'Admin',
                    'display_name' => 'Admin',
                    'url' => 'resources/admins'
                ],
                [
                    'name' => 'Roles',
                    'display_name' => 'Roles',
                    'url' => 'resources/roles'
                ]
            ]
        ],
        [
            'name' => 'FAQ',
            'icon' => 'question-mark-circle',
            'menus' => [
                [
                    'name' => 'FAQs',
                    'display_name' => 'FAQs',
                    'url' => 'resources/faqs',
                ],
                [
                    'name' => 'Categories',
                    'display_name' => 'Categories',
                    'url' => 'resources/faq-categories'
                ]
            ]
        ],
        [
            'name' => 'Website',
            'icon' => 'globe-alt',
            'menus' => [
                [
                    'name' => 'CMS Pages',
                    'display_name' => 'CMS Pages',
                    'url' => 'resources/c-m-s-pages',
                ],
                [
                    'name' => 'Email Templates',
                    'display_name' => 'Email Templates',
                    'url' => 'resources/email-templates'
                ]
            ]
        ],
        [
            'name' => 'Settings',
            'icon' => 'adjustments',
            'menus' => [
                [
                    'name' => 'General',
                    'display_name' => 'General',
                    'url' => 'nova-settings/general'
                ],
                [
                    'name' => 'Social Media',
                    'display_name' => 'Social Media',
                    'url' => 'nova-settings/social-media'
                ],
                [
                    'name' => 'Smtp Details',
                    'display_name' => 'Smtp Details',
                    'url' => 'resources/smtp-details',
                ],
                [
                    'name' => 'Payment Gateway',
                    'display_name' => 'Payment Gateway',
                    'url' => 'resources/payment-gateway',
                ]
            ]
        ],
        [
            'name' => 'Menus',
            'icon' => 'menu',
            'menus' => [
                [
                    'name' => 'Menus',
                    'display_name' => 'Menus',
                    'url' => 'resources/menus',
                ]
            ],
        ]
    ]
];
