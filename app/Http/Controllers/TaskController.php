<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
        $task = new Task;

        $task->title = $request->title;
        $task->body = $request->body;

        $task->save();

        return redirect('/tasks');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->title = $request->title;
        $task->body = $request->body;

        $task->save();

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}
