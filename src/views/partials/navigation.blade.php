<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-xs hidden-sm" href="#">

                Mail Activation Template

            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">DASHBOARD</a></li>
                <li><a href="/overview">OVERVIEW</a></li>
                <li><a href="#pricing">PRICING</a></li>
                <li><a href="#work">WORK</a></li>
                <li><a href="#team">TEAM</a></li>
                <li><a href="#grid">GRID</a></li>
                <li><a href="#contact">CONTACT</a></li>
                @if(Auth::check())
                    <li><a href="/auth/logout">LOGOUT</a></li>
                @endif
                @if(Auth::guest())
                    <li><a href="/auth/register">REGISTER</a></li>
                @endif
            </ul>
        </div>

    </div>
</div>