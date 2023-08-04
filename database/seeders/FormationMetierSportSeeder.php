<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Nullable;

class FormationMetierSportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'libelle' => 'Moniteur sportif',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Moniteur de fitness',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Maître-nageur-sauveteur',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Vendeur d’article de sport au détail',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Gestionnaire d’équipement et installation sportive',
                'description' => '
                    * Médailles et trophées
                    * Poteaux/filets
                    * Ballons
                    * Tenues de sport
                    * Equipements électriques/électroniques
                    * Equipements en bois',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Reporter photographe',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Agent d’accueil',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Stadier',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Contrôleur d’accès dans un EPR',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Opérateur vidéo-surveillance',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'libelle' => 'Opérateur son et lumière',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Agent de maintenance, réparation et entretien de pelouse naturelle/synthétique',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Agent d’entretien et de maintenance de piscine',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Electricien bâtiment',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Electronicien option DEL/LED',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Agent de froid et climatisation',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Agent de froid et climatisation',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Agent de construction métallique /soudure',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'libelle' => 'Plombier',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Menuisier',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Peintre',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Maçon',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Ouvrier pépiniériste spécialisé en plantage de gazon',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Secouriste',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Masseur bien-être/Spa',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Alphabétiseur numérique',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Métier d’art et décoration',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'libelle' => 'Pâtissier',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('digit_parametrage_formation_metier_sports')->insert($data);
    }
}
