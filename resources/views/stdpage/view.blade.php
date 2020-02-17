@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{Route('addstu')}}" class="btn btn-danger">Add New Post</a>
                <a href="{{route('showstu')}}" class="btn btn-info">Show All Post</a>

                <div>
                    <ol>
                        <li>Student ID: {{$stud->id}}</li>
                        <li>Student Name: {{$stud->name}}</li>
                        <li>Picture:</li>
                        <img src="{{ URL::to($stud->image) }}" style="height: 340px;">
                        <li>Email: {{$stud->email}}</li>
                        <li>Phone No: {{$stud->phone}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop
