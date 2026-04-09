@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">Task List</h3>

                    <div class="d-flex gap-2">
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                            + Add Task
                        </a>

                        <form action="{{ route('tasks.deleteAll') }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete ALL tasks?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">
                                Delete All
                            </button>
                        </form>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th class="px-3">Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-end px-3">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($tasks as $task)
                                    <tr>

                                        <td class="px-3 fw-semibold">
                                            {{ $task->title }}
                                        </td>

                                        <td class="text-muted">
                                            {{ \Illuminate\Support\Str::words($task->description, 10, '...') }}
                                        </td>

                                        <td>
                                            @php
                                                $status = $task->status;
                                            @endphp

                                            <span
                                                class="badge
                                        @if ($status == 'pending') bg-warning text-dark
                                        @elseif($status == 'in_progress') bg-info text-dark
                                        @elseif($status == 'completed') bg-success @endif">

                                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                                            </span>
                                        </td>

                                        <td class="text-end px-3">

                                            <a href="{{ route('tasks.edit', $task) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                Edit
                                            </a>

                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete this task?')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-outline-danger">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            <h4>No tasks found 🚀</h4>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    @endsection
