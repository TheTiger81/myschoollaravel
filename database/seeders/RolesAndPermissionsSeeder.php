<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $tables = ['roles', 'permissions', 'model_has_permissions', 'model_has_roles', 'role_has_permissions'];
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Crea ruoli
        $adminRole = Role::create(['name' => 'admin']);
        $insegnanteRole = Role::create(['name' => 'insegnante']);
        $managerRole = Role::create(['name' => 'manager']);
        $genitoreRole = Role::create(['name' => 'genitore']);
        $studenteRole = Role::create(['name' => 'studente']);

        // Crea o trova permessi e assegna ai ruoli
        $permessiAdmin = ['owner', 'edit', 'delete', 'view any annuncio'];
        foreach ($permessiAdmin as $permesso) {
            Permission::findOrCreate($permesso, 'web');
        }

        $permessiInsegnante = ['view own annuncio', 'create annuncio', 'update own annuncio'];
        foreach ($permessiInsegnante as $permesso) {
            Permission::findOrCreate($permesso, 'web');
        }

        $permessiManager = ['view any annuncio', 'respond to annuncio'];
        foreach ($permessiManager as $permesso) {
            Permission::findOrCreate($permesso, 'web');
        }

        $permessoVisualizzazione = 'view any annuncio';
        Permission::findOrCreate($permessoVisualizzazione, 'web');

        // Assegna permessi ai ruoli
        $adminRole->givePermissionTo(Permission::all());
        $insegnanteRole->syncPermissions($permessiInsegnante);
        $managerRole->syncPermissions($permessiManager);
        $genitoreRole->givePermissionTo($permessoVisualizzazione);
        $studenteRole->givePermissionTo($permessoVisualizzazione);
    }
}


