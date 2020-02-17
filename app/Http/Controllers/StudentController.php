<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{
    public function create(){
    	return view('stdpage.addstu');
    }
    public function store(Request $request){
    	$validatedData = $request->validate([
            'name' => 'required|max:20',
            'phone' => 'required|unique:students|max:12',
            'email' => 'required|unique:students',
        ]);
        $student = new Student;
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();
        if ($student) {
               return Redirect()->route('addstu');   
        }else{
               return Redirect()->back();   
        }
    }
    public function index(){
    	$stu=Student::all();
    	return view('stdpage.show', compact('stu'));
    }
    public function show($id){
    	$stud=Student::findorfail($id);
    	if ($stud) {
               return view('stdpage.view', compact('stud'));   
        }else{
               return Redirect()->back();   
        }
    }
    public function destroy($id){
    	$stud=Student::findorfail($id);
    	$stud->delete();
    	if ($stud) {
    		return Redirect()->back();
    	}
    }
    public function edit($id){
    	$stud=Student::findorfail($id);
    	return view('stdpage.edit',compact('stud'));
    }
    public function update(Request $request,$id){
    	$validatedData = $request->validate([
            'name' => 'required|max:20',
            'phone' => 'required|max:12',
            'email' => 'required',
        ]);
        $student=Student::findorfail($id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();
        if ($student) {
               return Redirect()->route('showstu');   
        }else{
               return Redirect()->back();   
        }

    }
}
