@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Users</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <form action="{{ route('admin.users.markApprove',$user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="submit" name='submit' class="btn btn-success" value="Approve">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.users.markReject',$user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="submit" name='submit' class="btn btn-danger" value="Reject">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection