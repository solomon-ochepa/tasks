<div class="py-12" x-data="{ open: @entangle('open') }">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{-- Header --}}
                <div class="mb-3 flex items-center justify-between border-b py-4 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">{{ __('Tasks') }}</h2>

                    <nav>
                        <ul class="flex space-x-4">
                            <li>
                                <a @click="open = true" class="" href="javascript://#" type="button">
                                    <i aria-hidden="true" class="fa fa-plus-circle fa-xl"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                {{-- Search & Filters --}}
                <div class="mb-4 flex flex-col space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
                    <input
                        class="w-full rounded-md border-gray-300 bg-white px-3 py-2 text-gray-900 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 sm:w-2/3"
                        placeholder="{{ __('Search tasks...') }}" type="text"
                        wire:model.live.debounce.300ms="search" />

                    <select
                        class="w-full rounded-md border-gray-300 bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 sm:w-1/3"
                        wire:model.live="filter_project">
                        <option value="">{{ __('All Projects') }}</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>

                    <label class="flex items-center space-x-2">
                        <input class="rounded shadow-sm focus:ring focus:ring-opacity-50" type="checkbox"
                            wire:model.live="show_trashed" />
                        <span>{{ __('Trashed') }}</span>
                    </label>
                </div>

                {{-- Tasks --}}
                <ul class="space-y-3" wire:sortable="sort">
                    @foreach ($tasks as $task)
                        @php $trashed = $task->trashed(); @endphp
                        <li class="flex items-center justify-between space-x-3" wire:key="task-{{ $task->id }}"
                            wire:sortable.item="{{ $task->id }}">
                            <div class="flex flex-col items-start" wire:sortable.handle>
                                <div class="flex items-center space-x-3">
                                    <div class="h-3 w-3 rounded-full bg-blue-500"></div>
                                    <span class="">{{ $task->name }}</span>
                                </div>
                                <div class="ms-6 text-xs text-gray-500 dark:text-gray-400">
                                    {{ $task->created_at->format('M d, Y H:i') }}</div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <button class="text-gray-600 hover:text-gray-900" type="button"
                                    wire:click="edit(@js($task->id))">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="p-2 text-red-600 hover:text-red-900" type="button"
                                    wire:click="delete(@js($task->id))">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>

                {{-- Pagination --}}
                {{ $tasks->links() }}
            </div>
        </div>
    </div>

    <!-- Create / Edit Task Modal -->
    <livewire:task::modals.create />
</div>
