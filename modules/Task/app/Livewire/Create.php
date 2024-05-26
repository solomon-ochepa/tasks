<?php

namespace Modules\Task\App\Livewire;

use Livewire\Component;
use Modules\Task\App\Http\Requests\CreateTaskRequest;
use Modules\Task\App\Models\Task;

class Create extends Component
{
    public $open = false;

    public $name;

    public $priority;

    public function render()
    {
        return view('task::livewire.create');
    }

    public function getRules()
    {
        $request = new CreateTaskRequest();

        return $request->rules();
    }

    public function save()
    {
        $this->validate();

        Task::create([
            'name' => $this->name,
        ]);

        $this->reset(['name', 'priority']);

        $this->open = false;

        $this->dispatch('refresh');
    }
}
