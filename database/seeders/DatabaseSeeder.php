<?php

namespace Database\Seeders;

use App\Models\Projet;
use App\Models\Status;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserProjet;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RolesAndPermissionsSeeder::class);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@lavoiejob.ma',
        ]);

        UserInfo::create([
            'user_id' => $user->id,
            'reference' => 1,
        ]);
        
        $user->assignRole('superAdmin');

        $projetsData = [
    ['name' => 'PRO PRO', 'avatar_url' => 'projets/logos/2z23TBKUxCHCuhnXpSHF6LcLLisdnsN7Xcpz7vFZ.png'],
    ['name' => 'Yallah Nkhedmo', 'avatar_url' => 'projets/logos/HF890dwFaXoKcGkkwPpyZtmrlW0Az6CCLFncfNZj.png'],
    ['name' => 'Lalla Lghalia', 'avatar_url' => 'projets/logos/lHt0e8mT6hhe1VzckinKt6Waau7P3sOtA6e4wnHh.png'],
    ['name' => 'Idolab', 'avatar_url' => 'projets/logos/57X5yDbASnQuNoPLoQAVJwxKEVyn3eOacTz7RmqS.png'],
];

foreach ($projetsData as $data) {
    $projet = Projet::create($data);

    UserProjet::create([
        'user_id' => $user->id,
        'projet_id' => $projet->id,
    ]);
}




        $statuses = [
            ['name' => 'prospect', 'label' => 'Prospect', 'type' => 'global', 'color' => '#9ca3af'], // gray
            ['name' => 'à_qualifier', 'label' => 'À qualifier', 'type' => 'global', 'color' => '#eab308'], // amber
            ['name' => 'contact_établi', 'label' => 'Contact établi', 'type' => 'global', 'color' => '#3b82f6'], // blue
            ['name' => 'rappel_programmé', 'label' => 'Rappel programmé', 'type' => 'global', 'color' => '#2563eb'], // deeper blue
            ['name' => 'injoignable', 'label' => 'Injoignable', 'type' => 'global', 'color' => '#ef4444'], // red

            ['name' => 'en_attente_documents', 'label' => 'En attente de documents', 'type' => 'candidat', 'color' => '#f97316'], // orange
            ['name' => 'en_cours_de_traitement', 'label' => 'En cours de traitement', 'type' => 'global', 'color' => '#10b981'], // green
            ['name' => 'en_négociation', 'label' => 'En négociation', 'type' => 'client', 'color' => '#0ea5e9'], // sky blue

            ['name' => 'validé', 'label' => 'Validé', 'type' => 'global', 'color' => '#22c55e'], // green
            ['name' => 'disponible', 'label' => 'Disponible', 'type' => 'candidat', 'color' => '#84cc16'], // lime
            ['name' => 'mission_en_cours', 'label' => 'Mission en cours', 'type' => 'candidat', 'color' => '#06b6d4'], // cyan
            ['name' => 'en_pause', 'label' => 'En pause', 'type' => 'candidat', 'color' => '#f59e0b'], // yellow

            ['name' => 'placé', 'label' => 'Placé', 'type' => 'candidat', 'color' => '#0d9488'], // teal
            ['name' => 'client_actif', 'label' => 'Client actif', 'type' => 'client', 'color' => '#16a34a'], // emerald
            ['name' => 'client_fidèle', 'label' => 'Client fidèle', 'type' => 'client', 'color' => '#4ade80'], // light green

            ['name' => 'à_recontacter_plus_tard', 'label' => 'À recontacter plus tard', 'type' => 'global', 'color' => '#a78bfa'], // violet
            ['name' => 'abandonné', 'label' => 'Abandonné', 'type' => 'global', 'color' => '#9ca3af'], // gray
            ['name' => 'rejeté', 'label' => 'Rejeté', 'type' => 'candidat', 'color' => '#f87171'], // light red
            ['name' => 'blacklisté', 'label' => 'Blacklisté', 'type' => 'global', 'color' => '#7f1d1d'], // dark red
            ['name' => 'bloqué', 'label' => 'Bloqué', 'type' => 'global', 'color' => '#991b1b'], // dark red
            ['name' => 'perdu', 'label' => 'Perdu', 'type' => 'client', 'color' => '#6b7280'], // gray
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }


        

    }
}
