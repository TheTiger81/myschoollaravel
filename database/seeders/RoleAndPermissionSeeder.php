<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crea o trova i permessi
        $manageCanteen = Permission::findOrCreate('manage canteen');
        $manageCommunications = Permission::findOrCreate('manage communications');
        $viewCanteenMenu = Permission::findOrCreate('view canteen menu');
        $manageEverything = Permission::findOrCreate('manage everything');

        // Crea o trova i ruoli
        $roleAdmin = Role::findOrCreate('admin');
        $roleTeacher = Role::findOrCreate('insegnante');
        $roleParent = Role::findOrCreate('genitore');
        $roleStudent = Role::findOrCreate('studente');

        // Assegna i permessi ai ruoli
        // Aggiornamento ruolo Admin con 'manage everything'
        $roleAdmin->syncPermissions($manageEverything);

        // Aggiornamento ruolo Insegnante
        if (!$roleTeacher->hasPermissionTo($manageCommunications)) {
            $roleTeacher->givePermissionTo($manageCommunications);
        }

        // Aggiornamento ruolo Genitore
        if (!$roleParent->hasPermissionTo($viewCanteenMenu)) {
            $roleParent->givePermissionTo($viewCanteenMenu);
        }

        // Aggiornamento ruolo Studente
        if (!$roleStudent->hasPermissionTo($viewCanteenMenu)) {
            $roleStudent->givePermissionTo($viewCanteenMenu);
        }

        // Aggiungi qui ulteriori permessi e assegnazioni in base alle necessità
    }
}




