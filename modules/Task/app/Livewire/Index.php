<?php

namespace Modules\Task\App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Task\App\Models\Task;

class Index extends Component
{
    use WithPagination;

    public int $limit = 5;

    public $open = false;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        $data = [];
        $data['tasks'] = Task::orderBy('priority')->orderBy('name')->paginate($this->limit);

        return view('task::livewire.index', $data);
    }

    public function edit($id)
    {
        $this->dispatch('edit.task', $id);

        $this->open = true;
    }

    public function delete(Task $task)
    {
        $task->delete();

        $this->dispatch('refresh');
    }

    #[On('close')]
    public function close()
    {
        $this->open = false;
    }
}
