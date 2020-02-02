@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{route('show.post')}}" class="btn btn-info">Show All Post</a>

                <div>
                    @foreach($pt as $pst)
                    <ol>
                        Post no: {{$pst->id}}<br>
                        Post Title: {{$pst->title}}<br>
                        Picture:<br>
                        <img src="{{ URL::to($pst->image) }}" style="height: 340px;"><br><br>
                        <a href="{{URL::to('view/post/'.$pst->id)}}" class="btn btn-sm btn-success">View Full Post</a><br><br>
                    </ol>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@stop