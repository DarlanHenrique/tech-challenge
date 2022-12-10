<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x: hidden; background-color: #222222; padding: 0px !important;">
    <span class="blankspace">
        <div class="blankspace">
            <a href="{{ route('inicio') }}" id="link-logo" class="brand-link icone-img link-logo">
                <span class="fa-stack">
                    <img src="{{ asset('img/sidebar-logo-fechada.png') }}" id="img-logo-close" class="brand-image display-none">
                    <img src="{{ asset('img/sidebar-logo.png') }}" id="img-logo" class="img-logo pt-1">
                </span>
            </a>
        </div>
    </span>

    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item has-treeview">
                    <a href="{{ route('inicio') }}" class="nav-link {{ Route::is('inicio') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <p>Início</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{  Route::is('resultados') ? 'menu-open' : '' }} || {{  Route::is('twitter') ? 'menu-open' : '' }} || {{  Route::is('consulta') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <p>
                            Análises das redes sociais
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('twitter') }}" class="nav-link {{  Route::is('twitter') ? 'active' : '' }} || {{  Route::is('consulta') ? 'active' : '' }}">
                                <i class="pl-3 fab fa-twitter"></i>
                                <p>Twitter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview  {{ Route::is('derivados') ? 'menu-open' : '' }} || {{ Route::is('glossario') ? 'menu-open' : '' }} || {{ Route::is('newsletter') ? 'menu-open' : '' }} || {{  Route::is('news') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>
                            Sobre o projeto
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('derivados') }}" class="nav-link {{  Route::is('derivados') ? 'active' : '' }}">
                                <i class="pl-3 fas fa-tasks"></i>
                                <p>Análise de lácteos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('glossario') }}" class="nav-link {{  Route::is('glossario') ? 'active' : '' }}">
                                <i class="pl-3 fas fa-spell-check"></i>
                                <p>Glossário</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('newsletter') }}" class="nav-link {{  Route::is('newsletter') ? 'active' : '' }} || {{  Route::is('news') ? 'active' : '' }}">
                                <i class="pl-3 fas fa-newspaper"></i>
                                <p>Newsletter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Route::is('equipe') ? 'menu-open' : '' }} || {{ Route::is('publicacoes') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-university"></i>
                        <p>
                            Institucional
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="{{ route('equipe') }}" class="nav-link {{  Route::is('equipe') ? 'active' : '' }}">
                                <i class="pl-3 fas fa-users fa-sm"></i>
                                <p>
                                    Equipe
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('publicacoes') }}" class="nav-link {{  Route::is('publicacoes') ? 'active' : '' }}">
                                <i class="pl-3 fas fa-book-open fa-sm"></i>
                                <p>
                                    Trabalhos publicados
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(Auth::check())
                    <li class="nav-item has-treeview  {{ Route::is('glossarios.*') ? 'menu-open' : '' }} || {{ Route::is('newsletters.*') ? 'menu-open' : '' }} || {{ Route::is('publicacaos.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user"></i>
                            <p>
                                Área administrativa
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                                <a href="{{ route('glossarios.index') }}" class="nav-link {{  Route::is('glossarios.*') ? 'active' : '' }}">
                                    <i class="pl-3 fas fa-spell-check"></i>
                                    <p>Administração do glossario</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('newsletters.index') }}" class="nav-link {{  Route::is('newsletters.*') ? 'active' : '' }}">
                                    <i class="pl-3 fas fa-newspaper"></i>
                                    <p>Administração de newsletter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('publicacaos.index') }}" class="nav-link {{  Route::is('publicacaos.*') ? 'active' : '' }}">
                                    <i class="pl-3 fas fa-book-open fa-sm"></i>
                                    <p>Administração das publicações</p>
                                </a>
                            </li>
                        </ul>
                    </li>
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
