<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return redirect()->route( 'tasks.index' );
} );

Route::delete( '/tasks/delete-all', [TaskController::class, 'deleteAll'] )->name( 'tasks.deleteAll' );

Route::resource( 'tasks', TaskController::class );