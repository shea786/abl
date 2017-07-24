@extends('inbox.index')

@section('HTMLTitle')
New Message
@endsection

@section('msgarea')
    {!! Form::open(['route' => 'inbox.store','class' => 'form-control']) !!}
        <select name="user_id">
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
          @endforeach
        </select>
        {!! Form::submit('Message Them',['class' => 'btn btn-success form-control']) !!}
    {!! Form::close() !!}
@endsection