<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TODO Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">TODO Upgration Form</h3>
                <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ old('title', $todo->title) }}" class="w-full border rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <input type="text" name="description" value="{{ old('description', $todo->description) }}" class="w-full border rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Due Datetime</label>
                        <input type="datetime-local" name="due_datetime" value="{{ old('due_datetime', $todo->due_datetime) }}" class="w-full border rounded p-2">
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" class="w-full border rounded p-2">
                    
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
