<?php

namespace Modules\Task\App\Livewire\Modals;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Task\App\Http\Requests\CreateTaskRequest;
use Modules\Task\App\Models\Task;

class Create extends Component
{
    public $task;

    #[Validate]
    public $name;

    public $priority;

    protected $listeners = [
        'refresh' => '$refresh',
        'edit.task' => 'edit',
    ];

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

        $this->name = $task->name;
        $this->priority = $task->priority;
    }

    public function save()
    {
        $this->validate();

        if ($this->task) {
            $this->update();

            session()->flash('status', 'Task updated successfully.');
        } else {
            Task::firstOrCreate(['name' => $this->name]);

            session()->flash('status', 'Task created successfully.');
        }

        $this->dispatch('close');
        $this->close();
        $this->dispatch('refresh');
    }

    public function update()
    {
        $this->task->update(['name' => $this->name, 'priority' => $this->priority]);
    }

    public function close()
    {
        $this->reset();
    }
}
