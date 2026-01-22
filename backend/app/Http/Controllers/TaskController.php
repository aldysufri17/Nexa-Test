<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->status;
        $sort   = $request->sort;

        $query  = Task::query();

        $query->when($status, function ($q, $status) {
            $q->where('status', $status);
        });

        if ($sort == 'deadline') {
            $query->orderBy('deadline', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return response()->json($query->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status'    => 'required|in:todo,progress,done',
            'deadline'  => 'nullable|date',
        ]);

        $task = Task::create([
            'user_id'       => auth('api')->id(),
            'title'         => $request->title,
            'description'   => $request->description,
            'status'        => $request->status,
            'deadline'      => $request->deadline,
        ]);

        return response()->json($task, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'status'    => 'required|in:todo,progress,done',
            'deadline'  => 'nullable|date',
        ]);

        $task->update($request->only([
            'title',
            'description',
            'status',
            'deadline',
        ]));

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);

        return response()->json(['success' => true]);
    }
}
