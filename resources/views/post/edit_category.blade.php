@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{route('show.category')}}" class="btn btn-info">Show All Category</a>

                <form action="{{url('update/category/'.$cat->id)}}" method="POST">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category Name</label>
                            <input type="text" class="form-control" value="{{$cat->name}}" name="name">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Slug Name</label>
                            <input type="text" class="form-control" value="{{$cat->slug}}" name="slug" >
                        </div>
                    </div>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="detailsButton">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
