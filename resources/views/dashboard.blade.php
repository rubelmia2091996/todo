<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TODO Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Basic Form --}}
                <h3 class="text-lg font-semibold mb-4">TODO Creation Form</h3>
                <form action="{{ route('todos.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Title</label>
                        <input type="text" name="title" class="w-full border rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <input type="text" name="description" class="w-full border rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Due Datetime</label>
                        <input type="datetime-local" name="due_datetime" class="w-full border rounded p-2">
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" class="w-full border rounded p-2">
                    
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                </form>

                {{-- Table --}}
                <h3 class="text-lg font-semibold mt-8 mb-4">Store Table</h3>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Sl No.</th>
                            <th class="border p-2">Title</th>
                            <th class="border p-2">Description</th>
                            <th class="border p-2">Due Datetime</th>
                            <th class="border p-2">Email Sent</th>
                            <th class="border p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key=>$item)
                        <tr>
                            <td class="border p-2">{{ $key+1 }}</td>
                            <td class="border p-2">{{ $item->title }}</td>
                            <td class="border p-2">{{ $item->description }}</td>
                            <td class="border p-2">{{ $item->due_datetime }}</td>
                            <td class="border p-2">{{ $item->email_sent }}</td>
                            <td class="border p-2">
                                <a href="{{ route('todos.edit', $item->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('todos.destroy', $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
