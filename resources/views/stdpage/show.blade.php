@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{route('addstu')}}" class="btn btn-danger">Add New Student</a>

                <table border="2">
                    <tr>
                    <th>ID No</th>
                        <th>Student Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($stu as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>         
                        <td>
                            <a href="{{URL::to('edit/category/'.$cat->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{URL::to('delete/category/'.$cat->id)}}" class="btn btn-sm btn-danger">Delete</a>
                            <a href="{{URL::to('view/category/'.$cat->id)}}" class="btn btn-sm btn-success">View</a>
                        </td>
                    </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@stop
