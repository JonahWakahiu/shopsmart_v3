<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderator']);
        $user = Role::create(['name' => 'user']);

        $permissions = [
            'categories' => ['create', 'read', 'edit', 'delete'],
            'products' => ['create', 'read', 'edit', 'delete'],
            'orders' => ['create', 'read', 'edit', 'delete'],
            'customers' => ['create', 'read', 'edit', 'delete'],
            'reviews' => ['create', 'read', 'edit', 'delete'],
            'transactions' => ['create', 'read', 'edit', 'delete'],
        ];

        foreach ($permissions as $group => $actions) {
            foreach ($actions as $action) {
                Permission::create(['name' => "{$action} {$group}", 'tag' => $group]);
            }
        }

        $admin->givePermissionTo('create categories', 'read categories', 'edit categories', 'delete categories', 'create products', 'read products', 'edit products', 'delete products', 'create orders', 'read orders', 'edit orders', 'delete orders', 'create customers', 'read customers', 'edit customers', 'delete customers');
        $moderator->givePermissionTo('create categories', 'read categories', 'edit categories', 'create products', 'read products', 'edit products', 'create orders', 'read orders', 'edit orders', 'create customers', 'read customers', 'edit customers');
        $user->givePermissionTo('read products', 'read orders');

    }
}
