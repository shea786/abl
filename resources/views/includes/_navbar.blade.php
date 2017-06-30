        <nav id="navbar" class="navbar">
            <div id="navcontainer" class="container">
                <button type="button" class="navbar-toggle visible-xs-block visible-sm-block" data-toggle="collapse" data-target="#navdrop">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <div class="collapse navbar-collapse drop" id="navdrop">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('default') }}">Home</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Our Portfolio</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                    </ul>
                    
                    <!-- login register options -->
                    <ul class="nav navbar-nav  navbar-right">
                        @if(!Auth::check())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                        @else
                            <!-- dropdown menu-->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account Management
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
                                    <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                                    <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}" id="lo_btn">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <!--end dropdown -->
                        @endif()
                    </ul>
                </div>
            </div>
        </nav>
        
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>