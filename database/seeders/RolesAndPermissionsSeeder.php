<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    
        //truncate tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
        // create the 'admin' role
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
    
        // create permissions for the 'admin' role
        Permission::create(['name' => 'owner', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete', 'guard_name' => 'web']);
    
        // assign all permissions to the 'admin' role
        $adminRole->givePermissionTo(Permission::all());
    }
}
