<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x: hidden; background-color: #222222; padding: 0px !important;">
    <span class="blankspace">
        <div class="blankspace">
            <a href="{{ route('index') }}" id="link-logo" class="brand-link icone-img link-logo logo-switch">
                <span class="fa-stack">
                    <img src="https://cdn.icon-icons.com/icons2/2429/PNG/512/github_logo_icon_147285.png" id="img-logo-close" class="brand-image display-none">
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
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('projects') }}" class="nav-link {{ Route::is('projects') ? 'active' : '' }}">
                        <i class="fa-solid fa-diagram-project"></i>
                        <p>Projetos</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Fim Sidebar Menu -->
    </div>
</aside>
<!-- Fim Sidebar -->
