@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Title Input -->
        <div>
            <label for="title" class="block mb-2">Title:</label>
            <input type="text" id="title" name="title" class="w-full border rounded px-4 py-2" value="{{ old('title') }}" required>
        </div>

        <!-- Description Textarea -->
        <div>
            <label for="description" class="block mb-2">Description:</label>
            <textarea id="description" name="description" rows="4" class="w-full border rounded px-4 py-2" required>{{ old('description') }}</textarea>
        </div>

        <!-- Priority Dropdown -->
        <div>
            <label for="priority" class="block mb-2">Priority:</label>
            <select id="priority" name="priority" class="w-full border rounded px-4 py-2" required>
                <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <!-- Category Dropdown -->
        <div>
            <label for="category_id" class="block mb-2">Category:</label>
            <select id="category_id" name="category_id" class="w-full border rounded px-4 py-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Create Task</button>
        </div>
    </form>
</div>
@endsection