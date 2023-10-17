<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Service;

use Illuminate\Http\Request;

class EmployeeController extends Controller
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
            $employees=Employee::where('nom','LIKE', $search)->get();}
            else{
                $employees=Employee::all(); 
            }
       
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $services=Service::all();
        return view('employee.create',compact('services'));
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
            'prenom' => 'required',
            'adresse' => 'required',
             'service_id' => 'required|numeric',
            ]);

        $inputs=$request->all();

       
        Employee::create($inputs);
        return redirect()->route('employee.index')
        ->with('success','Un employee est enregistré avec succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $services=Service::all();
        return view('employee.edit',compact('employee','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
          
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
             'service_id' => 'required|numeric',
            ]);
        $employee->update($request->all());
        return redirect()->route('employee.index')
        ->with('success','Un produit est modifié avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')
        ->with('success','Un produit est supprimé avec succes!');
    }
}
