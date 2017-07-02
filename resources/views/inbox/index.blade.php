@extends('layouts.app')

@section('HTMLTitle')
Inbox
@endsection

@section("content")
<div class="row">
    <div class="container-fluid" id="inbox-container">
        <div class='col-md-3'>
            <ul>
                <li>
                    <a href="#">
                        <img class="img-circle" src="/images/newyork.jpg"/>
                        <span>Asif Al the dummer bamber</span>
                    </a>
                </li>
            </ul>
        </div>
            
        <div class='col-md-9'>
            <div id="messages">
                <div class="messageFromMe">
                    This Message is from me
                </div>
                <div class="messageNotFromMe">
                    This message is not from me
                </div>
            </div>
            {!! Form::open() !!}
                {!! Form::text('message',null,['placeholder' => 'Type Message', 'class' => 'form-control']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection