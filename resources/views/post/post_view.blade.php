@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{Route('write.post')}}" class="btn btn-danger">Add New Post</a>
                <a href="{{route('show.post')}}" class="btn btn-info">Show All Post</a>

                <div>
                    <ol>
                        <li>Post No: {{$pt->id}}</li>
                        <li>Post Title: {{$pt->title}}</li>
                        <li>Post Category: {{$pt->name}}</li>
                        <li>Picture:</li>
                        <img src="{{ URL::to($pt->image) }}" style="height: 340px;">
                        <li>Details: {{$pt->details}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop
