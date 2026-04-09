@extends('layouts.app')

@section('content')
    <h2>Task List</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
        </div>

        <form action="{{ route('tasks.deleteAll') }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete ALL tasks?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger">Delete All</button>
        </form>

    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ \Illuminate\Support\Str::words($task->description, 12, '...') }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $task->status)) }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirmDelete()"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
