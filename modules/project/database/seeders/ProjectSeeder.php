<?php

namespace Modules\Project\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Project\App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = collect(['General', 'Bug', 'Hotfix', 'Feature', 'Marketing']);

        $projects->each(fn ($project) => Project::firstOrCreate(['name' => $project]));
    }
}
