@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Roles</div>

                <div class="panel-body">
                    {!! Form::open([route('admin.roles.addUserStore',$slug)]) !!}
                        {!! Form::label('user','User to add:') !!}
                        {!! Form::select('user', $users, null,['class' => 'form-control'] ) !!}
                        
                        {!! Form::submit('Submit',['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection