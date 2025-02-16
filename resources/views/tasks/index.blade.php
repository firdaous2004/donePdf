@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Tasks</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Create Task Button -->
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New Task</a>

        <!-- Filter Form -->
        <form action="{{ route('tasks.index') }}" method="GET" class="mb-6">
            <div class="flex space-x-4">
                <!-- Filter by Title -->
                <div>
                    <label for="title" class="block mb-2">Task Name:</label>
                    <input type="text" id="title" name="title" class="w-full border rounded px-4 py-2" value="{{ request('title') }}" placeholder="Search by task name">
                </div>

                <!-- Filter by Priority -->
                <div>
                    <label for="priority" class="block mb-2">Priority:</label>
                    <select id="priority" name="priority" class="w-full border rounded px-4 py-2">
                        <option value="">All Priorities</option>
                        <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Filter</button>
                </div>
            </div>
        </form>

        <!-- Tasks Table -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">Title</th>
                    <th class="px-4 py-2 border-b">Priority</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $task->title }}</td>
                        <td class="px-4 py-2 border-b">{{ ucfirst($task->priority) }}</td>
                        <td class="px-4 py-2 border-b">
                            <!-- View Button -->
                            <a href="{{ route('tasks.show', $task->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">View</a>

                            <!-- Edit Button -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Confirmation Dialog Script -->
    <script>
        function confirmDelete(event) {
            // Display confirmation dialog
            if (!confirm("Are you sure you want to delete this task?")) {
                // If "Cancel" is clicked, prevent form submission
                event.preventDefault();
            }
        }
    </script>
@endsection
