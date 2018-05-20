<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
   
    public function index()
    {
       $tasks = Task::all();
       return view('tasks', compact(['tasks']));
    }

    public function create()
    {
        $tasks = Task::all();
        return view('taskAdd', compact(['tasks']));
    }
    
    public function store(Request $request)
    {
        $this->validate(request(), [
            'summary' => 'required | min:3',
            'due_date' => 'required'
        ]);

        $task = Task::create($request->all());
        return redirect('/');
    }

    public function edit($id)
    {
        $taskForEdit = Task::find($id);
        $tasks = Task::all();
        return view('taskEdit', compact(['tasks', 'taskForEdit']));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'summary' => 'required | min:3',
            'due_date' => 'required'
        ]);

        $task = Task::find($id);
        $task->update($request->all());
        return redirect('/');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect('/');
    }

    public function changeStatus($id, $status)
    {
        $task = Task::find($id);
        $task->status = $status;
        $task->save();
        return redirect('/');
    }

    public function sort($sortBy)
    {
        $tasks = Task::orderBy($sortBy, 'ASC')->get();
        return view('tasks', compact(['tasks']));
    }

    public function hide()
    {
        $tasks = Task::where('status', '!=', 'Completed')->get();
        return view('tasks', compact(['tasks']));
    }
}



