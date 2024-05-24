<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Task\App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = collect([
            [
                'name' => 'Complete Project Report',
                'priority' => 3,
            ],
            [
                'name' => 'Update Client Presentation',
                'priority' => 2,
            ],
            [
                'name' => 'Plan Marketing Strategy',
                'priority' => 5,
            ],
            [
                'name' => 'Review Team Performance',
                'priority' => 1,
            ],
            [
                'name' => 'Schedule Product Launch',
                'priority' => 4,
            ],
            [
                'name' => 'Organize Workshop Event',
                'priority' => 2,
            ],
            [
                'name' => 'Analyze Sales Data',
                'priority' => 3,
            ],
            [
                'name' => 'Update Website Content',
                'priority' => 1,
            ],
            [
                'name' => 'Develop New Features',
                'priority' => 4,
            ],
            [
                'name' => 'Conduct User Testing',
                'priority' => 5,
            ],
        ]);

        $tasks->each(fn ($task) => Task::firstOrCreate($task));
    }
}
