@extends('layouts.app')

@section('HTMLTitle')
Inbox
@endsection

@section('content')
    <div class="row visible-md visible-lg" id="inbox-container">
        <div class='col-md-4 iboxside'>
            <ul class="nav">
                @if(count($inboxes) >= 1)
                    @foreach($inboxes as $inbox)
                    <li>
                        @php
                            if($inbox->callUserOne->id != Auth::user()->id){
                                $user = $inbox->callUserOne;
                            }else{
                                $user = $inbox->callUserTwo;
                            }
                        @endphp
                        <a class="profile_link" href="{{ route('inbox.messages,get',$inbox->id) }}"><img src="/images/newyork.jpg">
                           <span class="uname">{{ $user->first_name }} {{ $user->last_name }} </span>
                        </a>
                    </li>
                    @endforeach
                @else
                    <li>
                        <a class="profile_link" href="#"><img src="/images/newyork.jpg">
                           <span class="uname">No Inboxes Found </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        
        
        
        <div class="col-md-8" id='msgtexts'>
            <div id="msgarea">
                @yield('msgarea')
            </div>
            <div id="msgform">
                @yield('msgform')
            </div>
        </div>
    </div>
@endsection