<div class="py-12" x-data="{ open: @entangle('open') }">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mb-3 flex items-center justify-between border-b py-4 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">{{ __('Tasks') }}</h2>

                    <div class="hidden sm:block">
                        <nav>
                            <ul class="flex space-x-4">
                                <li>
                                    <a @click="open = true" class="" href="javascript://#" type="button"><i
                                            aria-hidden="true" class="fa fa-plus-circle"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="sm:hidden">
                        <button class="block text-gray-600 hover:text-gray-900 focus:outline-none" type="button">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6h16M4 12h16m-7 6h7" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <ul class="space-y-3">
                    @foreach ($tasks as $task)
                        @php $trashed = $task->trashed(); @endphp
                        <li class="flex items-center justify-between space-x-3">
                            <div class="flex flex-col items-start">
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

                {{ $tasks->links() }}
            </div>
        </div>
    </div>

    <!-- Create / Edit Task Modal -->
    <livewire:task::modals.create />
</div>
