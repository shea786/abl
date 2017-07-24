@extends('inbox.index')

@section('HTMLTitle')
    @php
        if($inboxx->user_one == Auth::user()->id){
            $friend_id = $inboxx->callUserTwo;
        }else{
            $friend_id = $inboxx->callUserOne;
        }
    @endphp
{{ $friend_id->first_name }} {{ $friend_id->first_name }} | Inbox
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
    {!! Form::open([route('inbox.messages.post',$inboxx->id)]) !!}
        {!! Form::textarea('msginput',null,['id' => 'msginput','cols' => '50','rows' => '10']) !!}
        {!! Form::submit('Send Message',['id' => 'ibsub','class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection