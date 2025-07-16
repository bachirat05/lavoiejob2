<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'Consulter membre',
            'Consulter projet',
            'Consulter fonction',
            'Consulter mode',
            'Consulter client',
            'Consulter candidat',
            'Consulter dossier',
            'Consulter contrat',
            'Consulter suggestion',
            'Consulter affectation',
            'Consulter reclamation',
            'Consulter offre',
            'Consulter evenement',
            'Ajouter membre',
            'Ajouter projet',
            'Ajouter fonction',
            'Ajouter mode',
            'Ajouter client',
            'Ajouter candidat',
            'Ajouter dossier',
            'Ajouter contrat',
            'Ajouter suggestion',
            'Ajouter affectation',
            'Ajouter reclamation',
            'Ajouter offre',
            'Ajouter evenement',
            'Modifier membre',
            'Modifier projet',
            'Modifier fonction',
            'Modifier mode',
            'Modifier client',
            'Modifier candidat',
            'Modifier dossier',
            'Modifier contrat',
            'Modifier suggestion',
            'Modifier affectation',
            'Modifier reclamation',
            'Modifier offre',
            'Modifier evenement',
            'Supprimer membre',
            'Supprimer projet',
            'Supprimer fonction',
            'Supprimer mode',
            'Supprimer client',
            'Supprimer candidat',
            'Supprimer dossier',
            'Supprimer contrat',
            'Supprimer suggestion',
            'Supprimer affectation',
            'Supprimer reclamation',
            'Supprimer offre',
            'Supprimer evenement',

            'Modifier statut_blackliste',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles and assign permissions
        $superAdmin = Role::firstOrCreate(['name' => 'superAdmin']);
        $superAdmin->syncPermissions(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions([
            'Consulter fonction',
            'Consulter mode',
            'Consulter client',
            'Consulter candidat',
            'Consulter dossier',
            'Consulter contrat',
            'Consulter suggestion',
            'Consulter affectation',
            'Consulter reclamation',
            'Consulter offre',
            'Consulter evenement',

            'Ajouter fonction',
            'Ajouter mode',
            'Ajouter client',
            'Ajouter candidat',
            'Ajouter dossier',
            'Ajouter contrat',
            'Ajouter suggestion',
            'Ajouter affectation',
            'Ajouter reclamation',
            'Ajouter offre',
            'Ajouter evenement',

            'Modifier fonction',
            'Modifier mode',
            'Modifier client',
            'Modifier candidat',
            'Modifier dossier',
            'Modifier contrat',
            'Modifier suggestion',
            'Modifier affectation',
            'Modifier reclamation',
            'Modifier offre',
            'Modifier evenement',

            'Supprimer fonction',
            'Supprimer mode',
            'Supprimer client',
            'Supprimer candidat',
            'Supprimer dossier',
            'Supprimer contrat',
            'Supprimer suggestion',
            'Supprimer affectation',
            'Supprimer reclamation',
            'Supprimer offre',
            'Supprimer evenement',
        ]);

        $membre = Role::firstOrCreate(['name' => 'membre']);
        $membre->syncPermissions([
            'Consulter client',
            'Consulter candidat',
            'Consulter dossier',
            'Consulter suggestion',
            'Consulter affectation',
            'Consulter reclamation',
            'Consulter offre',
            'Consulter evenement',

            'Ajouter client',
            'Ajouter candidat',
            'Ajouter dossier',
            'Ajouter suggestion',
            'Ajouter affectation',
            'Ajouter reclamation',
            'Ajouter offre',
            'Ajouter evenement',


            'Modifier client',
            'Modifier candidat',
            'Modifier dossier',
            'Modifier suggestion',
            'Modifier affectation',
            'Modifier reclamation',
            'Modifier offre',
            'Modifier evenement',

        ]);

        $particulier = Role::firstOrCreate(['name' => 'particulier']);
        $particulier->syncPermissions([
            'Ajouter reclamation',
        ]);

        $entreprise = Role::firstOrCreate(['name' => 'entreprise']);
        $entreprise->syncPermissions([
            'Ajouter reclamation',
        ]);

        $candidat = Role::firstOrCreate(['name' => 'candidat']);
        $candidat->syncPermissions([
            'Ajouter reclamation',
        ]);
    }
}
