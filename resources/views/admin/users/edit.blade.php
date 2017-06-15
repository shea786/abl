@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User {{ $user->username }}</div>

                <div class="panel-body">
                    {!! Form::open([route('admin.users.update',$user->id), 'Method' => 'POST']) !!}
                        {!! Form::label('first_name','First Name') !!}
                        {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                        
                        {!! Form::label('last_name','Last Name') !!}
                        {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                        
                        {!! Form::label('email','Email') !!}
                        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                        
                        <br>
                        {!! Form::submit('Edit user',['class' => 'form-control btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection