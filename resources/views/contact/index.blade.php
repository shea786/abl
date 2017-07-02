@extends('layouts.app')

@section('HTMLTitle')
Contact Us
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
                    
                <div class="panel-body">
                    If you have any queries please fill out the contact form or call us on the number below
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Form</div>

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
        
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Contact information</div>
                
                <div class="panel-body">
                    <div>
                        Call Us: <a href="tel:">N/A</a>
                        <br>
                        Email Us: <a href="mailto:admin@cititech.tech">admin@cititech.tech</a>
                        <br>
                    </div>
                    
                    <hr>
                    <div id="contactMaps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77875.64936026215!2d-1.5849572205772033!3d52.413670858509796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870b151656e22b7%3A0x4f660f5564f0689!2sCoventry!5e0!3m2!1sen!2suk!4v1499002659088" allowfullscreen>
                        </iframe>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
