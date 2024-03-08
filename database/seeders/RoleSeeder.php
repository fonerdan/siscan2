<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleVeterinarian = Role::create(['name' => 'Veterinario']);

        Permission::create(['name' => 'dashboard.index'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'users.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'clients.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'clients.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'clients.edit'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'clients.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'animals.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'animals.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'animals.edit'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'animals.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'payment_commitments.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'payment_commitments.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'payment_commitments.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'payment_commitments.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'clinical_records.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'clinical_records.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'clinical_records.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'clinical_records.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'service_provision_contracts.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'service_provision_contracts.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'service_provision_contracts.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'service_provision_contracts.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'euthanasias.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'euthanasias.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'euthanasias.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'euthanasias.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'anesthesia_surgeries.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'anesthesia_surgeries.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'anesthesia_surgeries.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'anesthesia_surgeries.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'sedation_anesthesias.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'sedation_anesthesias.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'sedation_anesthesias.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'sedation_anesthesias.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'internments.index'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'internments.create'])->syncRoles([$roleAdmin, $roleVeterinarian]);
        Permission::create(['name' => 'internments.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'internments.destroy'])->syncRoles([$roleAdmin]);
    }
}
