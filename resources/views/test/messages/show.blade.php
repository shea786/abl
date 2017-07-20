@extends('test.messages.index')

@section('HTMLTitle')
Test Inbox
@endsection

@section('msgarea')
    @foreach($messages as $message)
        @if($message->user_id == Auth::user()->id)
            <div class='from'>{{ $message->message }}</div>
        @else
            <div class='to'>{{ $message->message }}</div>
        @endif
    @endforeach
@endsection

@section('msgform')
    @php
        if($inboxx->user_one == Auth::user()->id){
            $friend_id = $inboxx->user_two;
        }else{
            $friend_id = $inboxx->user_one;
        }
    @endphp
    {!! Form::open([route('test.messages.post',$friend_id)]) !!}
        {!! Form::text('iid',$inboxx->id,[]) !!}
        {!! Form::textarea('msginput',null,['id' => 'msginput','cols' => '50','rows' => '10']) !!}
        {!! Form::submit('Send Message',['id' => 'ibsub','class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection