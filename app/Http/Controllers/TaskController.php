<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Cartegor;
use App\Priorit;
use App\Status;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Cartegor::all();
        $priority = Priorit::all();
        $tasks = Task::all();
        // dd($tasks);
        return view('task.index', compact('tasks', 'category', 'priority'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Cartegor::all();
        $status = Status::all();
        $priorities = Priorit::all();
        return view('task.create', compact('category', 'priorities', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'status_id' => ['required', 'string'],
        ]);
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->priorit_id = $request->priority;
        $task->cartegor_id = $request->category;
        $task->status_id = $request->status_id;
        $task->save();

        return redirect()->route('task.index')->with('task_saved', 'Task added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::FindOrFail($id);
        $category = Cartegor::all();
        $priorities = Priorit::all();
        // dd($task);
        return view('task.edit', compact('task', 'category', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],
            'priorit_id' => ['required', 'string'],
            'status_id' => ['required', 'string'],
        ]);
        Task::find($id)->update($request->all());
        return redirect()->route('task.index')->with('updated', 'data updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return back()->with('deleted', 'Task deleted successful!');
        
    }
    public function task_sort_category($id)
    {
        $category = Cartegor::all();
        $tasks = Task::where('cartegor_id', $id)->get();
        return view('task.task-sort-category', compact('tasks', 'category'));
    }
    public function task_sort_priority($id)
    {
        $category = Cartegor::all();
        $tasks = Task::where('priorit_id', $id)->get();
        return view('task.task-sort-priority', compact('tasks', 'category'));
    }

    
}
