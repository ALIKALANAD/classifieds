<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                <span class="sr-only">Classifieds</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand">Classifieds</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())
                    <li>
                        <a href="#"><i class="fa fa-plus"></i>&nbsp;New</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('user/posts') }}">Posts</a></li>
                            <li><a href="{{ url('user/profile') }}">Profile</a></li>
                            <li><a href="{{ url('user/settings') }}">Settings</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('auth/logout') }}"><i class="fa-sign-out"></i>&nbsp;Signout</a></li>
                @else
                    <li><a href="{{ url('auth/login') }}"><i class="fa fa-sign-in"></i>&nbsp;Signin</a></li>
                    <li><a href="{{ url('auth/register') }}"><i class="fa fa-user"></i>&nbsp;Signup</a></li>
                @endif


            </ul>
        </div>
    </div>
</nav>