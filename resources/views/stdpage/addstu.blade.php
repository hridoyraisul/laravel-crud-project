@extends('welcome')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a href="{{route('showstu')}}" class="btn btn-info">Show All Student</a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<h2>Insert Student Info</h2>
    <form action="{{route('insertstu')}}" method="POST">
        @csrf
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Student Name</label>
                <input type="text" class="form-control" placeholder="Enter Student Name" name="name">
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Students Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter Phone number" name="phone" >
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Students Email</label>
                <input type="text" class="form-control" placeholder="Enter Email Adress" name="email" >
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="detailsButton">Add Student</button>
        </div>
    </form>
        </div>
    </div>
    </div>
@stop
