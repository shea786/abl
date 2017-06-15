@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Categories</div>

                <div class="panel-body">
                    <div><a class="btn btn-success" href="{{route('admin.categories.create')}}">Create New Category</a></div><br>
                    <table class="table table-striped">
                        <tr>
                            <th>Category id</th>
                              <th>user id</th>
                            <th>Category title</th>
                             <th>Category Status</th>
                            <th colspan="2">Options</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->callusers->username}}</td>
                                <td>{{ $category->title }}</td>
                                @if($category->status == 1)
                                <td>Category Active</td>
                                @else
                                <td>Category not Active</td>
                                @endif
                                <td><a href="{{route('admin.categories.edit',$category->id)}}">Modify Article</a></td>
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