<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Recupera tutti i tipi di progetto esistenti dal database
        $types = Type::all();

        // Crea 10 progetti e associa un tipo casuale a ciascuno di essi
        Project::factory()->count(10)->create()->each(function ($project) use ($types) {
            // Recupera un tipo casuale dalla collezione dei tipi
            $type = $types->random();

            // Associa il tipo al progetto
            $project->type_id = $type->id;
            $project->save();
        });
    }
}