@extends('layouts.app')

@section('title', 'My Tasks - Personal Task Manager')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">My Tasks</h1>
    <span class="text-sm text-gray-500">Total Tasks: {{ $tasks->count() }}</span>
</div>

@if($tasks->isEmpty())
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 text-center text-gray-500">
        No tasks available yet. Click "+ Add Task" to get started.
    </div>
@else
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                    <th class="p-4">Task Name</th>
                    <th class="p-4">Description</th>
                    <th class="p-4">Due Date</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($tasks as $task)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 font-semibold {{ $task->status === 'Completed' ? 'line-through text-gray-400' : 'text-gray-800' }}">
                            {{ $task->task_name }}
                        </td>
                        <td class="p-4 text-gray-600 text-sm max-w-xs truncate">
                            {{ $task->description ?? 'N/A' }}
                        </td>
                        <td class="p-4 text-sm text-gray-500">
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No deadline' }}
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $task->status === 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex items-center justify-center space-x-3">
                                <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection