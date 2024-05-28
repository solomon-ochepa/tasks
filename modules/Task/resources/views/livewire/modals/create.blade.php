<div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75" x-cloak x-show="open">
    <div class="w-1/2 rounded-lg bg-white p-4">
        <h2 class="mb-3 border-b pb-1 text-xl font-semibold">
            <i class="fas fa-edit"></i>
            {{ $task ? __('Edit Task') : __('Create Task') }}
        </h2>

        <form wire:submit="save">
            <div class="my-3 space-y-3">
                <div class="flex items-center space-x-3">
                    <div class="w-full">
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                            placeholder="{{ __('Name') }}" type="text" wire:model.blur="form.name">
                        @error('form.name')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col items-center space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
                    <div class="w-full sm:w-2/3">
                        <select
                            class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                            wire:model.blur="form.project_id">
                            <option value="">Select project</option>
                            @foreach ($projects ?? [] as $project)
                                <option value="{{ $project->slug }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                        @error('form.project_id')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/3">
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                            min="0" placeholder="{{ __('Priority') }}" step="1" type="number"
                            wire:model="form.priority">
                        @error('form.priority')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-3 flex justify-end border-t pt-3">
                <button @click="open = false" class="rounded-md bg-gray-400 px-4 py-2 text-white" type="button"
                    wire:click="close">
                    <i aria-hidden="true" class="fa fa-times-circle"></i>
                    {{ __('Cancel') }}
                </button>
                <button class="ml-2 rounded-md bg-blue-600 px-4 py-2 text-white" type="submit">
                    <i aria-hidden="true" class="fa fa-paper-plane"></i>
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
</div>
