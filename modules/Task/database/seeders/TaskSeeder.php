<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Modules\Project\App\Models\Project;
use Modules\Task\App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = collect([
            ['name' => 'Complete Project Report'],
            ['name' => 'Update Client Presentation'],
            ['name' => 'Plan Marketing Strategy'],
            ['name' => 'Review Team Performance'],
            ['name' => 'Schedule Product Launch'],
            ['name' => 'Organize Workshop Event'],
            ['name' => 'Analyze Sales Data'],
            ['name' => 'Update Website Content'],
            ['name' => 'Develop New Features'],
            ['name' => 'Conduct User Testing'],
        ]);

        $project = Project::firstOrCreate(['name' => 'General']);

        $tasks->each(fn ($task) => Task::firstOrCreate(Arr::add($task, 'project_id', $project->id)));
    }
}
