@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Users</div>

                <div class="panel-body">
                    <a href="{{ route('admin.roles.addUser',$role->slug) }}" class="btn btn-success">Add User to {{ $role->name }}</a>
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                        @foreach($role->users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach()
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection