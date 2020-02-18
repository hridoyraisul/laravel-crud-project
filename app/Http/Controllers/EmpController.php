<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp=Employee::all();
        return view('emp.emplist',compact('emp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emp.addemp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:20',
            'salary' => 'required',
            'degree' => 'required',
        ]);
        $emp= new Employee;
        $emp->name=$request->name;
        $emp->salary=$request->salary;
        $emp->degree=$request->degree;
        $emp->save();
        return redirect()->back();
        // if ($emp) {
        //     return redirect()->U('/employee');
        // }
        // else{
        //     return redirect()->back();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=Employee::findorfail($id);
        if ($emp) {
            return view('emp.empview', compact('emp'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp=Employee::findorfail($id);
        if ($emp) {
            return view('emp.editemp', compact('emp'));
        }else{
            return redirect()->back();
        }
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
        $validator = $request->validate([
            'name' => 'required|max:20',
            'salary' => 'required',
            'degree' => 'required',
        ]);
        $emp=Employee::findorfail($id);
        $emp->name=$request->name;
        $emp->salary=$request->salary;
        $emp->degree=$request->degree;
        $emp->save();
        return redirect()->to('/employee/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp=Employee::findorfail($id);
        $emp->delete();
        if ($emp) {
            return redirect()->back();
        }
    }
}
