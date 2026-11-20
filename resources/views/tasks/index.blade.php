
@extends('layouts.app')

@section('title', 'Task List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">My Tasks</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        + Create New Task
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Task List</h5>
    </div>

    <div class="card-body">
        @forelse ($tasks as $task)

            <div class="border rounded p-3 mb-3">
                <h5 class="fw-bold">{{ $task->title }}</h5>

                <p class="text-muted mb-2">
                    {{ $task->description }}
                </p>

                <span class="badge bg-info text-dark">
                    {{ $task->status }}
                </span>

                <p class="mt-2 mb-2">
                    <strong>Due Date:</strong>
                    {{ $task->due_date ?? 'Not set' }}
                </p>

                <a href="{{ route('tasks.show', $task->id) }}"
                   class="btn btn-sm btn-info">View</a>

                <a href="{{ route('tasks.edit', $task->id) }}"
                   class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('tasks.destroy', $task->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </div>

        @empty
            <div class="text-center py-5">
                <h5 class="text-muted">No tasks found</h5>
                <p>Create your first task to get started.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection

