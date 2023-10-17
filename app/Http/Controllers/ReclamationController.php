<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\ReclamationController;

class ReclamationController extends Controller
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
            $reclamations=Reclamation::where('title','LIKE', $search)->get();}
            else{
                $reclamations=Reclamation::all();
            }
       
            return view('reclamation.index',compact('reclamations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees=Employee::all();
        return view('reclamation.create',compact('employees'));
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
          'title' => 'required',
           'description' => 'required',
           'employee_id' => 'required|numeric',
         ]);

         $inputs=$request->all();
         Reclamation::create($inputs);
         return redirect()->route('reclamation.index')
         ->with('success','Un projet est enregistré avec succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show(Reclamation $reclamation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamation $reclamation)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reclamation $reclamation)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reclamation $reclamation)
    {
        $reclamation->delete();
        return redirect()->route('reclamation.index')
        ->with('success','Une reclamation est supprimé avec succes!');
    }
}
