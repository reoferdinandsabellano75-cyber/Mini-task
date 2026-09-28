@extends('layout')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-6">Edit Task</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Task Name</label>
            <input type="text" name="task_name" value="{{ old('task_name', $task->task_name) }}" required class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('description', $task->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 outline-none">
                <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Due Date</label>
            <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 outline-none">
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('tasks.index') }}" class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Update Task</button>
        </div>
    </form>
</div>
@endsection