@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
                <a href="{{route('show.category')}}" class="btn btn-info">Show All Category</a>

                <div>
                    <ol>
                        <li>Category Name: {{$cat->name}}</li>
                        <li>Category Slug: {{$cat->slug}}</li>
                        <li>Created at: {{$cat->created_at}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop
