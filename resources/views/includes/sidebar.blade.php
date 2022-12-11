<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x: hidden; background-color: #222222; padding: 0px !important;">
    <span class="blankspace">
        <div class="blankspace">
            <a href="{{ route('index') }}" id="link-logo" class="brand-link icone-img link-logo">
                <span class="fa-stack">
                    <img src="https://cdn.icon-icons.com/icons2/2429/PNG/512/github_logo_icon_147285.png" id="img-logo-close" class="brand-image display-none">
                    <img src="https://cdn.icon-icons.com/icons2/2429/PNG/512/github_logo_icon_147285.png}" id="img-logo" class="img-logo pt-1">
                </span>
            </a>
        </div>
    </span>

    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item has-treeview">
                    <a href="{{ route('index') }}" class="nav-link {{ Route::is('index') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link {{ Route::is('') ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            <p>Projetos</p>
                        </a>
                    </li>
                @if(Auth::check())
                    <li class="nav-item has-treeview logout">
                        <form id="logout-form" method="post" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" class="nav-link" onclick="$('#logout-form').submit()">
                                <i class="fas fa-power-off"></i>
                                <p>Sair</p>
                            </a>
                        </form>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- Fim Sidebar Menu -->

    </div>
</aside>
<!-- Fim Sidebar -->
