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
                <li><a href="{{ url('auth/login') }}"><i class="fa fa-sign-in"></i>&nbsp;Signin</a></li>
                <li><a href="{{ url('auth/register') }}"><i class="fa fa-user"></i>&nbsp;Signup</a></li>
            </ul>
        </div>
    </div>
</nav>