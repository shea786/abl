@extends('layouts.app')

@section('HTMLTitle')
{{ $blog->title }} | Blog
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <a href="{{ route('blog.show',$blog->slug) }}">{{ $blog->title }}</a>
                </h2>
                <p class="lead">
                    by {{ $blog->callusers->first_name }} {{ $blog->callusers->last_name }}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $blog->created_at }}</p>
                <hr>
                <p>{!! $blog->content !!}</p>
                <br>
                
                <div class="well">
                    <h3>Comments</h3>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($blog->callComments as $comment)
                                <p>{{ $comment->comment }}</p>
                                by {{ $comment->callUsers->username }}
                                <hr>
                            @endforeach
                            <br>
                            @if(Auth::check())
                                {!! Form::open([route('blog.add.comment',$blog->id)]) !!}
                                    {!! Form::label('comment','Comment') !!}
                                    {!! Form::textarea('comment',null,['class' => 'form-control']) !!}
                                    <br>
                                    {!! Form::submit('Add Comment',['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                            @else
                                You must be logged in to submit comments
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection