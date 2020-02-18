@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{url('/employee/create/')}}" class="btn btn-danger">Add New Employee</a>
                <a href="{{url('/employee/')}}" class="btn btn-info">Show All Employee</a>

                <div>
                    <ol>
                        <li>Employee ID: {{$emp->id}}</li>
                        <li>Employee Name: {{$emp->name}}</li>
                        <li>Salary: {{$emp->salary}}</li>
                        <li>Degree: {{$emp->degree}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop
