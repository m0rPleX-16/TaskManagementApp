<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = auth()->user();
        $tasks = Task::where('user_id', $user->id)->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = auth()->user();

        return view('tasks.create', compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveTaskRequest $request)
    {
        //
    $data = $request->validated();

    $data['user_id'] = auth()->id();
    
    $task = Task::create($data);

    return redirect()->route('tasks.index', $task)->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    $user = auth()->user();

    return view('tasks.index', compact('task', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //

    $user = auth()->user();

    return view('tasks.edit', compact('task', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveTaskRequest $request, Task $task)
    {
    //
    $data = $request->validated();
    
    $task->update($data);

    return redirect()->route('tasks.index', $task)->with('success', 'Task created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
