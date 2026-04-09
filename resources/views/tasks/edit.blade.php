@extends('layouts.app')

@section('content')
    <h2>Edit Task</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $task->title }}" class="form-control mb-2">

        <textarea name="description" class="form-control mb-2">{{ $task->description }}</textarea>

        <select name="status" class="form-control mb-2">
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
