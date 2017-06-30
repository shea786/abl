@extends('layouts.app')

@section('HTMLTitle')
Contact Us
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Us</div>

                <div class="panel-body">
                    {!! Form::open([route('contact.store'),'method' => 'POST']) !!}
                        {!! Form::label('name','Name') !!}
                        {!! Form::text('name',null,['class' => 'form-control']) !!}
                        
                        {!! Form::label('email','Email Adddress') !!}
                        {!! Form::email('email',null,['class' => 'form-control']) !!}
                        
                        {!! Form::label('subject','Subject') !!}
                        {!! Form::text('subject',null,['class' => 'form-control']) !!}
                        
                        {!! Form::label('content','Description') !!}
                        {!! Form::textarea('content',null,['class' => 'form-control']) !!}
                        
                        <br>
                        {!! Form::submit('Send',['class' => 'form-control btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
