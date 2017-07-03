@extends('layouts.app')

@section('HTMLTitle')
Inbox
@endsection

@section("content")
    <div class="contrainer-fluid">
            <nav class='rows'>
            <ul id="mytabs" class='nav nav-tabs'>
                <li><a class="tablink" href="{{route('inbox.index')}}">My inbox</a></li>
                <li><a class="tablink" href="{{route('inbox.new')}}">New Message</a></a></li>
            </ul>
        </nav>
    </div>
    <div class="row visible-md visible-lg" id="inbox-container">
        
        <div class='col-md-4 iboxside'>
       
            <ul class="nav">
                <li>  <a href="#"><img src="/images/newyork.jpg">
                   <span class="uname">Asif ali</span>
                    </a></li>
                    
                    <li>  <a href="#"><img src="/images/newyork.jpg">
                   <span class="uname">John DOe</span>
                    </a></li>
                    <li>  <a href="#"><img src="/images/newyork.jpg">
                   <span class="uname">mr peter sire</span>
                    </a></li>
                    <li>  <a href="#"><img src="/images/newyork.jpg">
                   <span class="uname">SMelly buger mcguinnes</span>
                    </a></li>
                    <li>  <a href="#"><img src="/images/newyork.jpg">
                   <span class="uname">SMelly buger mcguinnes's brother</span>
                    </a></li>
                    <li>  <a href="#"><img src="/images/newyork.jpg">
                   <span class="uname">Martin Bamber</span>
                    </a></li>
          
            </ul>
       
        </div>
           <div class="col-md-8" id='msgtexts'>
               <div id="msgarea"></div>
                <div id="msgform">
                    <form>
                    <textarea name="msginput"></textarea>
                    <br>
                    <input id="ibsub" type="submit" value="Send Message" class="btn-success btn"/>
                    </form>
                </div>
               
           </div>

</div>

@endsection