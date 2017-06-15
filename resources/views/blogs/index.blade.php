@extends('layouts.app')

@section('HTMLTitle')
Blog
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- First Blog Post -->
                @foreach ($blogs as $blog)
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
                    <a class="btn btn-primary" href="{{ route('blog.show',$blog->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    
                    <hr>
                @endforeach
                <!-- END First Blog Post END -->
                
                
                {{ $blogs->links() }}

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!-- /.row -->
        <hr>
    </div>
    <!-- /.container -->
@endsection