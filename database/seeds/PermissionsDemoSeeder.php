<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'settings']);
        // Permission::create(['name' => 'create agents']);
        // Permission::create(['name' => 'delete agents']);
        // Permission::create(['name' => 'view properties']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        // $role1->givePermissionTo('settings');
        // $role1->givePermissionTo('create agents');
        // $role2 = Role::create(['name' => 'agents']);
        // $role2->givePermissionTo('view properties');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        // create demo users
        $user = User::create([
            'first_name' => 'Example User',
            'email' => 'test@example.com',
            'password' => bcrypt("123456"),
        ]);
        $user->assignRole($role1);

        // $user = User::create([
        //     'first_name' => 'Example Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt("123456"),
        // ]);
        // $user->assignRole($role2);

        $user = User::create([
            'first_name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'password' => bcrypt("123456"),
        ]);
        $user->assignRole($role3);
    }
}
