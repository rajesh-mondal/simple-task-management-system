<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tasks = Task::latest()->paginate( 10 );
        return view( 'tasks.index', compact( 'tasks' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'tasks.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $request->validate( [
            'title'       => 'required|max:255',
            'description' => 'nullable|max:1000',
            'status'      => 'required|in:pending,in_progress,completed',
        ] );

        Task::create( $request->all() );

        return redirect()->route( 'tasks.index' )->with( 'success', 'Task created!' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Task $task ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Task $task ) {
        return view( 'tasks.edit', compact( 'task' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Task $task ) {
        $request->validate( [
            'title'       => 'required|max:255',
            'description' => 'nullable|max:1000',
            'status'      => 'required|in:pending,in_progress,completed',
        ] );

        $task->update( $request->all() );

        return redirect()->route( 'tasks.index' )->with( 'success', 'Task updated!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Task $task ) {
        $task->delete();
        return redirect()->route( 'tasks.index' )->with( 'success', 'Task deleted!' );
    }

    public function deleteAll() {
        Task::truncate();

        return redirect()->route( 'tasks.index' )->with( 'success', 'All tasks deleted!' );
    }
}
