@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{route('write.post')}}" class="btn btn-danger">Add New Post</a>
                <table border="2">
                    <tr>
                        <th>SL. No</th>
                        <th>Category</th>
                        <th>Post Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach($post as $vpost)
                        <tr>
                            <td>{{ $vpost->id }}</td>
                            <td>{{$vpost->name}}</td>
                            <td>{{ $vpost->title }}</td>
                            <td><img src="{{ URL::to($vpost->image) }}" style="height: 40px; width: 70px;"></td>
                            <td>
                                <a href="{{URL::to('edit/post/'.$vpost->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{URL::to('delete/post/'.$vpost->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                <a href="{{URL::to('view/post/'.$vpost->id)}}" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop