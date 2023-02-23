Step 1: sail composer config repositories.menu-management vcs https://gitlab.indianic.com/packages/nova/menus.git

Step: 2: run this command
sail composer require indianic/menu-management

Step 3: run this command
sail php artisan migrate

Step 4: sail composer require outl1ne/nova-sortable

Step 5: sail php artisan vendor:publish --tag=menu-management-config
