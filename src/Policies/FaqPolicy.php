<?php
namespace Indianic\MenuManagement\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MenuPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any menu management.
     *
     * @param Admin $user
     * @return bool
     */
    public function viewAny(Admin $user): bool
    {
        return $user->hasPermissionTo('view menu-management');
    }

    /**
     * Determine whether the user can view the menu management.
     *
     * @param Admin $user
     * @return bool
     */
    public function view(Admin $user): bool
    {
        return $user->hasPermissionTo('view menu-management');
    }

    /**
     * Determine whether the user can create menu management.
     *
     * @param Admin $user
     * @return bool
     */
    public function create(Admin $user): bool
    {
        return ( $user->hasPermissionTo('update menu-management'));
    }

    /**
     * Determine whether the user can update the menu management.
     *
     * @param Admin $user
     * @return bool
     */
    public function update(Admin $user): bool
    {
        return $user->hasPermissionTo('update menu-management');
    }

    /**
     * Determine whether the user can delete the menu management.
     *
     * @return Response|bool
     */
    public function delete(): Response|bool
    {
        return $user->hasPermissionTo('delete menu-management');
    }
}
