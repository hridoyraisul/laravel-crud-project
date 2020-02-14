<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{
    public function addStudent(){
    	return view('stdpage.addstu');
    }
    public function insertStudent(Request $request){
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
        	 $notification=array(
                'messege'=>'Successfully Student Info Inserted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('addstu')->with($notification);   
        }else{
        	  $notification=array(
                'messege'=>'Something went wrong!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);   
        }
    }
    public function showStudent(){
    	$stu=Student::all();
    	return view('stdpage.show', compact('stu'));
    }
}
