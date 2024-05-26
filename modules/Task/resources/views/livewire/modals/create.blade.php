<div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75" x-cloak x-show="open">
    <div class="w-1/2 rounded-lg bg-white p-6">
        <h2 class="mb-4 text-xl font-semibold border-b pb-1">
            <i class="fas fa-edit"></i>
            {{ __('Create Task') }}
        </h2>

        <form wire:submit.prevent="save">
            <div class="mb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10/12">
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                            placeholder="{{ __('Name') }}" type="text" wire:model.blur="name">
                        @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-2/12">
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                            placeholder="{{ __('Priority') }}" type="number" wire:model="priority">
                        @error('priority')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end border-t pt-1">
                <button @click="open = false" wire:click="close" class="rounded-md bg-gray-400 px-4 py-2 text-white" type="button">
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
