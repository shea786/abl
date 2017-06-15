@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Categories</div>

                <div class="panel-body">
                    <div><a class="btn btn-success" href="{{route('admin.categories.create')}}">Create New Category</a></div><br>
                    
                    <!-- The issue is in the route, you need to pass though the ID to the updateg route -->
                    
                    {!! Form::open([route('admin.categories.update',$category->id),'method' => 'post']) !!}
                        {!! Form::label('title','Title: ') !!}
                        {!! Form::text("title",$category->title,['class' => 'form-control']) !!}
                        <br>
                        {!! Form::submit("edit",['class' => 'form-control btn btn-success']) !!} <!-- only user name and array -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection