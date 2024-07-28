<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('home', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task_name = $request->input('task_name');
        $priority = intval($request->input('priority'));

        $create_task = new Task([
            'task_name' => $task_name,
            'priority' => $priority
        ]);

        // Eloquent Saving here.
        $success = $create_task->save();

        if ($success) {
            $tasks = Task::all();
            return view('home', compact('tasks'));
        }
    }

    public function orderUpdate(Request $request)
    {
        $table_order = $request->input('order');

        foreach ($table_order as $index => $id) {
            DB::table('tasks')
                ->where('id', $id)
                ->update(['priority' => $index + 1]);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);

        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);

        $task->task_name = $request->input('task_name');
        $task->priority = intval($request->input('priority'));

        $success = $task->save();

        if ($success) {
            $tasks = Task::all();
            return view('home', compact('tasks'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return response()->json(['message' => 'Successfully deleted']);
        } else {
            return response()->json(['message' => 'Could not delete task.']);
        }
    }
}
