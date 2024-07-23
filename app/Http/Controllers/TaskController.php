<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query()->orderBy('created_at', 'desc')->get();
        return response($tasks, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = 1;
        $text = $request->input('text');
        $task = Task::create([
            'user_id' => $user_id,
            'task' => $text
        ]);
        return response($task, 201)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::query()->find($id);
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        return 'destroy';
    }
}
