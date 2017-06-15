@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All Blogs</div>

                <div class="panel-body">
                    <div><a class="btn btn-success" href="{{route('admin.blogs.create')}}">Create New Blog</a></div><br>
                    <table class="table table-striped">
                        <tr>
                            <th>Blog ID</th>
                            <th>Username</th>
                            <th>Blog Title</th>
                            <th>Blog Slug</th>
                            <th>Blog Content</th>
                            <th>Blog Status</th>
                            <th>Moderated By</th>
                            <th>Moderated At</th>
                            <th colspan="2">Options</th>
                        </tr>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->callusers->username}}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->slug }}</td>
                                <td>{{ $blog->content }}</td>
                                @if($blog->status == 1)
                                    <td>Blog Active</td>
                                @else
                                    <td>Blog not Active</td>
                                @endif
                                <td>{{ $blog->moderated_by }}</td>
                                <td>{{ $blog->moderated_at }}</td>
                                <td><a href="{{route('admin.blogs.edit',$blog->id)}}">Modify Article</a></td>
                                <td>Delete</td>
                          </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection