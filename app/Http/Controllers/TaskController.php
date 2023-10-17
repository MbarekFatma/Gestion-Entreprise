<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $search =$request ['search']??"";
        if($search !=""){
          $tasks=Task::where('nom','LIKE', $search)->get();}
            else{
                $tasks=Task::all();
            }
      
            return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects=Project::all();
        $employees=Employee::all();
        return view('task.create',compact('projects','employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:tasks|min:3|max:150',
          
            'description' => 'required',
           
            'project_id' => 'required|numeric',
            'employee_id' => 'required|numeric',
            ]);

        $inputs=$request->all();

       

        Task::create($inputs);
        return redirect()->route('task.index')
        ->with('success','Un produit est enregistré avec succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $projects=Project::all();
        $employees=Employee::all();
        return view('task.edit',compact('task','projects'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'nom' => 'required|unique:tasks|min:3|max:150',
            'description' => 'required',
            'project_id' => 'required|numeric',
            'employee_id' => 'required|numeric',
            ]);
        $task->update($request->all());
        return redirect()->route('task.index')
        ->with('success','Un produit est modifié avec succes!');

  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')
        ->with('success','Un produit est supprimé avec succes!');
    }
}
