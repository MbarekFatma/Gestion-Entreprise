<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Models\Employee;
use App\Models\Service;

class ProjectController extends Controller
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
            $projects=Project::where('nom','LIKE', $search)->get();}
            else{
                $projects=Project::all();
            }
       
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        return view('project.create',compact('services'));
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
          
            'nom' => 'required',
            'budget' => 'required|numeric',
            'description' => 'required|file|mimes:pdf,xlx',
             'service_id' => 'required|numeric',
            ]);

        $inputs=$request->all();
         //traitement de la file 
         if($description=$request->file('description')){
            $newname=time().'.'.$description->getClientOriginalExtension();
            $description->move('files/',$newname);
            $inputs['description']=$newname;
        }

       
        Project::create($inputs);
        return redirect()->route('project.index')
        ->with('success','Un projet est enregistré avec succes!');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $services=Service::all();
        return view('project.edit',compact('project','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
          
            'nom' => 'required',
            'budget' => 'required|numeric',
            'description' => 'required',
             'service_id' => 'required|numeric',
            ]);
        $project->update($request->all());
        return redirect()->route('project.index')
        ->with('success','Un projet est modifié avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')
        ->with('success','Un projet est supprimé avec succes!');
    }
    public function search(){
        $search_text = $_GET['query'];
        $projects = Project::where('nom','LIKE','%'.$search_text.'%')->get();
       //return view('project.search',compact('projects'));
       return redirect()->route('project.index');


    }
    public function download(Request $request ,$description){
        return response()->download(public_path('files/'.$description));
    }
    public function view($id){
        $projects=Project::find($id);
        return view('project.view',compact('projects'));
    }
}
