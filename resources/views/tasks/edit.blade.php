
@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white py-3">
                <h4 class="mb-0 fw-bold">Edit Task</h4>
            </div>

            <div class="card-body p-4">

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title', $task->title) }}"
                            required
                        >

                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="4"
                        >{{ old('description', $task->description) }}</textarea>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>

                        <select name="status" class="form-select" required>
                            <option value="Pending"
                                {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="In Progress"
                                {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>
                                In Progress
                            </option>

                            <option value="Completed"
                                {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>
                    </div>

                    <!-- Due Date -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Due Date</label>

                        <input
                            type="date"
                            name="due_date"
                            class="form-control"
                            value="{{ old('due_date', $task->due_date) }}"
                        >
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary">
                        Update Task
                    </button>

                    <a href="{{ route('tasks.index') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection

