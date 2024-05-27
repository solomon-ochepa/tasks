<?php

namespace Modules\Task\App\Livewire\Modals;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Project\App\Models\Project;
use Modules\Task\App\Http\Requests\CreateTaskRequest;
use Modules\Task\App\Models\Task;

class Create extends Component
{
    public $task;

    public $projects;

    #[Validate]
    public array $form = [];

    protected $listeners = [
        'refresh' => '$refresh',
        'edit.task' => 'edit',
    ];

    public function mount()
    {
        $this->projects = Project::all();
    }

    public function render()
    {
        return view('task::livewire.modals.create');
    }

    public function getRules()
    {
        $request = new CreateTaskRequest($this->task?->only('id') ?? []);

        return $request->rules();
    }

    public function edit(Task $task)
    {
        $this->task = $task;

        $this->form['name'] = $task->name;
        $this->form['priority'] = $task->priority;
        $this->form['project_id'] = $task->project_id;
    }

    public function save()
    {
        $this->validate();

        if ($this->task) {
            $this->update();

            session()->flash('status', 'Task updated successfully.');
        } else {
            Task::firstOrCreate($this->form);

            session()->flash('status', 'Task created successfully.');
        }

        $this->close();
        $this->dispatch('refresh');
    }

    public function update()
    {
        $this->task->update($this->form);
    }

    public function close()
    {
        $this->dispatch('close');
        $this->reset('form');
    }
}
