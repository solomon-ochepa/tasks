<?php

namespace Modules\Task\App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Task\App\Models\Task;

class Index extends Component
{
    use WithPagination;

    public int $limit = 3;

    public function render()
    {
        $data = [];
        $data['tasks'] = Task::orderBy('priority')->orderBy('name')->paginate($this->limit);

        return view('task::livewire.index', $data);
    }
}
