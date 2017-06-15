<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('default') }}">{{ config('app.name') }}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('home.index') }}">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="{{ route('blog.index') }}">Blog</a></li>
         <li><a href="#">Tutorials</a></li>
      </ul>
      
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
      <ul class="nav navbar-nav navbar-right">
          @if(!Auth::check())
         <li><a href="{{ route('login') }}">Login</a></li>
         <li><a href="{{ route('register') }}">Register</a></li>
          
          @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Panel <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
            <li><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
            <li role="separator" class="divider"></li>
            <li>
                <a href="{{ route('logout') }}" id="lo_btn" >Logout</a>
            </li>
         </ul>
        </li>
        @endif()
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
