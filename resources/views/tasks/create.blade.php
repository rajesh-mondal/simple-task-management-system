@extends('layouts.app')

@section('content')
    <h2>Create Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <input type="text" name="title" class="form-control mb-2" placeholder="Title">

        <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

        <select name="status" class="form-control mb-2">
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
