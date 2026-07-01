<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with("category")->get();
        return response()->json([
            'success' => true,
            'data' => $tasks
        ]);
    }

    
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }

    
    public function show(string $id)
    {
        $task = Task::with("category")->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }

    
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }

    
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ]);
    }
}