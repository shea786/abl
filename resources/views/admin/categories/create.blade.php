@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Categories</div>

                <div class="panel-body">
                    @include('includes._errors');
                    <div><a class="btn btn-success" href="{{route('admin.categories.create')}}">Create New Category</a></div><br>
                    
                    {!! Form::open([route('admin.categories.store'),'method' => 'post']) !!}
                        {!! Form::label('title','Title: ') !!}
                        {!! Form::text("title",null,['class' => 'form-control']) !!}
                        <br>
                        {!! Form::submit("Create",['class' => 'form-control btn btn-success']) !!} <!-- only user name and array -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection