<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element"> <span>
            <img alt="image" class="img-circle" src="{{ asset('img/astartelogo.png') }}" style="width:  64px; height:  auto;">
           </span>
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear">
              <span class="block m-t-xs">
                <strong class="font-bold">Astarté</strong>
              </span>
              <span class="text-muted text-xs block">
                Laboratorio de Patología
              </span>
            </span>
          </a>
          </div>
            <div class="logo-element">
                ALP
            </div>
        </li>

        <?php use App\Services\Menu; ?>
        {!! Menu::create() !!}

      </ul>
    </div>
</nav>
