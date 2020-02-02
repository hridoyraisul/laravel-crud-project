@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{route('add.category')}}" class="btn btn-danger">Add New Category</a>

                <table border="2">
                    <tr>
                    <th>SL. No</th>
                        <th>Category Name</th>
                        <th>Slug Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($category as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->slug }}</td>
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
