@extends('layouts.app')

@section('HTMLTitle')
Create New Blog | Blogs | Admin Panel
@endsection

@section('HTMLScripts')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ta3z78kpximxjbabkk7xlncz7h0ob04gxn5d796dfc6mr2sl"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Categories</div>

                <div class="panel-body">
                    @include('includes._errors');
                    <div><a class="btn btn-success" href="{{route('admin.blogs.create')}}">Create New Blog</a></div><br>
                    
                    {!! Form::open([route('admin.blogs.store'),'method' => 'post']) !!}
                        {!! Form::label('title','Title: ') !!}
                        {!! Form::text("title",null,['class' => 'form-control']) !!}
                        
                        {!! Form::label('slug','Slug: ') !!}
                        {!! Form::text('slug',null,['class' => 'form-control']) !!}
                        
                        @foreach ($categories as $category)
                            {{ Form::label('categories', $category->title) }}
                            {{ Form::checkbox('categories[]', $category->id,false) }}
                        @endforeach
                        <br>
                        
                        {!! Form::label('content','Content Of Blog: ') !!}
                        {!! Form::textarea('content',null,['class' => 'form-control']) !!}
                        <br>
                        {!! Form::submit("Create",['class' => 'form-control btn btn-success']) !!} <!-- only user name and array -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection