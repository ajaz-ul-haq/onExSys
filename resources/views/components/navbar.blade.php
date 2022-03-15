<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Oneline Examination System</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @if(Session::has('email'))
                <li><a href="/exit"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
            @else

            <li><a href="/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            @endif
        </ul>
    </div>
</nav>
