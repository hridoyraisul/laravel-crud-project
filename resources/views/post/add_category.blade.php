@extends('welcome')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a href="{{route('show.category')}}" class="btn btn-info">Show All Category</a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    <form action="{{route('store.category')}}" method="POST">
        @csrf
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Category Name</label>
                <input type="text" class="form-control" placeholder="Category Name" name="name">
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Slug Name</label>
                <input type="text" class="form-control" placeholder="Slug Name" name="slug" >
            </div>
        </div>


        <div id="success"></div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="detailsButton">Post</button>
        </div>
    </form>
        </div>
    </div>
    </div>
@stop
