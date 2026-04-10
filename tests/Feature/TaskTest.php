<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase {
    use RefreshDatabase;

    public function task_list_page_loads() {
        $response = $this->get( '/tasks' );

        $response->assertStatus( 200 );
    }

    public function test_home_redirects_to_tasks() {
        $response = $this->get( '/' );

        $response->assertRedirect( '/tasks' );
    }

    public function user_can_create_task() {
        $response = $this->post( '/tasks', [
            'title'       => 'Test Task',
            'description' => 'Test description',
            'status'      => 'pending',
        ] );

        $this->assertDatabaseHas( 'tasks', [
            'title' => 'Test Task',
        ] );

        $response->assertRedirect( '/tasks' );
    }

    public function validation_fails_when_title_missing() {
        $response = $this->post( '/tasks', [
            'title'  => '',
            'status' => 'pending',
        ] );

        $response->assertSessionHasErrors( 'title' );
    }

    public function user_can_update_task() {
        $task = Task::factory()->create();

        $response = $this->put( "/tasks/{$task->id}", [
            'title'       => 'Updated Task',
            'description' => 'Updated',
            'status'      => 'completed',
        ] );

        $this->assertDatabaseHas( 'tasks', [
            'id'    => $task->id,
            'title' => 'Updated Task',
        ] );

        $response->assertRedirect( '/tasks' );
    }

    public function user_can_delete_task() {
        $task = Task::factory()->create();

        $response = $this->delete( "/tasks/{$task->id}" );

        $this->assertDatabaseMissing( 'tasks', [
            'id' => $task->id,
        ] );
    }
}