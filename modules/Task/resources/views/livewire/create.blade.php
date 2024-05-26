<div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75" x-cloak x-show="open">
    <div class="w-1/2 rounded-lg bg-white p-6">
        <h2 class="mb-4 text-xl font-semibold">{{ __('Create Task') }}</h2>

        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="name">{{ __('Name') }}</label>
                <input class="mt-1 block w-full border-gray-300 shadow-sm" id="name" type="text"
                    wire:model="name" />
                @error('name')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="priority">{{ __('Priority') }}</label>
                <input class="mt-1 block w-full border-gray-300 shadow-sm" id="priority" type="number"
                    wire:model="priority" />
                @error('priority')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button @click="open = false" class="rounded-md bg-gray-400 px-4 py-2 text-white"
                    type="button">{{ __('Cancel') }}</button>
                <button class="ml-2 rounded-md bg-blue-600 px-4 py-2 text-white"
                    type="submit">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>
