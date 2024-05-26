<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="mb-4 border-b pb-3 text-xl font-bold">{{ __('Tasks') }}</h2>

                <ul class="space-y-3">
                    @foreach ($tasks as $task)
                        <li class="flex items-center space-x-3">
                            <div class="h-3 w-3 rounded-full bg-blue-500"></div>
                            <span class="">{{ $task->name }}</span>
                        </li>
                    @endforeach
                </ul>

                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</div>
