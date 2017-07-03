@extends('layouts.app')

@section('HTMLTitle')
Inbox
@endsection

@section("content")

    <div class="contrainer-fluid">
            <nav class='rows'>
            
            <ul id="mytabs" class='nav nav-tabs'>
                <li><a   href="{{route('inbox.index',1)}}">My inbox</a></li>
                <li><a   href="{{route('inbox.new')}}">New Message</a></a></li>
            </ul>
        </nav>
    </div>
    <div class="row visible-md visible-lg" id="inbox-container">
        
        <div class='col-md-4 iboxside'>
          
            <ul class="nav">
                @if(count($inboxes) >= 1)
                    @foreach($inboxes as $inbox)
                    <li>  <a href="#"><img src="/images/newyork.jpg">
                       <span class="uname">{{ $inbox->callusers->first_name }} {{ $inbox->callusers->last_name }} </span>
                    </a></li>
                    @endforeach
                @else
                    <li><a href='{{ route("inbox.new") }}'>{{ count($inboxes)}}</a></li>
                @endif
                
            </ul>
       
        </div>
        <div class="col-md-8" id='msgtexts'>
            <div id="msgarea">
                @foreach($messages as $message)
                    @if(\Auth::user()->id == $message->msg_to)
                        <div class="to">{!! $message->message !!}</div>
                        <div class="date">{{ $message->created_at }}</div>
                    @elseif(\Auth::user()->id == $message->msg_from)
                        <div class="from">{!! $message->message !!}</div>
                        <div class="date">{{ $message->created_at }}</div>
                    @endif
                @endforeach
            </div>
            <div id="msgform">
                {!! Form::open([route('message.store',1)]) !!}
                    {!! Form::textarea('msginput',null,[]) !!}
                    {!! Form::submit('Send Message',['id' => 'ibsub', 'class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
@endsection