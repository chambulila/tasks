<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Cartegor;
use App\Priorit;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Cartegor::all();
        $priorities = Priorit::all();
        return view('task.create', compact('category', 'priorities'));
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
        ]);
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->priorit_id = $request->priority;
        $task->cartegor_id = $request->category;
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
        ]);
        $d = Task::find($id)->update($request->all());
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
}
