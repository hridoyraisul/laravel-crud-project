@extends('welcome')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a href="{{URL::to('/employee')}}" class="btn btn-info">Show All Employee</a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<h2>Insert Employee Info</h2>
    <form action="{{URL::to('/employee')}}" method="POST">
        @csrf
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Employee Name</label>
                <input type="text" class="form-control" placeholder="Enter Employee Name" name="name">
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Salary</label>
                <input type="text" class="form-control" placeholder="Enter Salary" name="salary" >
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Degree</label>
                <input type="text" class="form-control" placeholder="Enter Degree" name="degree" >
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="detailsButton">Add Employee</button>
        </div>
    </form>
        </div>
    </div>
    </div>
@stop
