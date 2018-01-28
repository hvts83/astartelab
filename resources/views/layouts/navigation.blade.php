<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <span class="clear">
                          <span class="block m-t-xs">
                              <strong class="font-bold">{{ Auth::user()->nombre . " " .  Auth::user()->apellido }}</strong>
                          </span> <span class="text-muted text-xs block">Opciones <b class="caret"></b></span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                      <li><a href="{{ url('/profile') }}" >Perfil</a></li>
                      <li><a href="#" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="logo-element">
                    L
                </div>
            </li>
            <li class="{{ isActiveRoute('main') }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Main view</span></a>
            </li>
            <li class="{{ isActiveRoute('minor') }}">
                <a href="{{ url('/minor') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Minor view</span> </a>
            </li>
        </ul>

    </div>
</nav>
