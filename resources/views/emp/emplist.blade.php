@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{URL::to('/employee/create')}}" class="btn btn-danger">Add New Employee</a>

                <table border="2">
                    <tr>
                    <th>ID No</th>
                    <th>Employee Name</th>
                    <th>Action</th>
                    </tr>
                    @foreach($emp as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>         
                        <td>
                            <a href="{{URL::to('/employee/'.$cat->id.'/edit/')}}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{URL::to('/employee/'.$cat->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="submit">Delete</button>
                            </form>
                            <a href="{{URL::to('/employee/'.$cat->id)}}" class="btn btn-sm btn-success">View</a>
                        </td>
                    </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@stop
