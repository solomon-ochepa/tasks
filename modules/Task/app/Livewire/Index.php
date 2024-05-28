<?php

namespace Modules\Task\App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Project\App\Models\Project;
use Modules\Task\App\Models\Task;

class Index extends Component
{
    use WithPagination;

    public int $limit = 5;

    public $open = false;

    public $search = '';

    public $filter_project = '';

    public $show_trashed = false;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        $query = Task::query()
            ->when($this->search, fn ($query) => $query->where('name', 'like', '%' . $this->search . '%'))
            ->when($this->filter_project, fn ($query) => $query->where('project_id', $this->filter_project))
            ->when($this->show_trashed, fn ($query) => $query->onlyTrashed())
            ->orderBy('priority')
            ->orderBy('name');

        $data = [];
        $data['tasks'] = $query->paginate($this->limit);
        $data['projects'] = Project::all();

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

    public function sort($sort)
    {
        $sort = array_column($sort, 'value', 'order');

        Task::order($sort);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingProject()
    {
        $this->resetPage();
    }

    public function updatingShowTrashed()
    {
        $this->resetPage();
    }
}
