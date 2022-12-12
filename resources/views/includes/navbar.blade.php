<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}"><img src="https://cdn.icon-icons.com/icons2/2429/PNG/512/github_logo_icon_147285.png" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Serviços</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">Sobre o Produto</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Time</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Exemplos</a></li>
                @if (Auth::check())
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="nav-item">
                        <form id="logout-form" method="post" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" class="nav-link" onclick="$('#logout-form').submit()">
                                <p>Sair</p>
                            </a>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#loginModal">Login</a></li>
                @endif
{{--            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> --}}

            </ul>
        </div>
    </div>
</nav>

<!-- Login modal popup-->
<div class="portfolio-modal modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('storage/img/close-icon.svg')}}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                        {{-- Login with GitHub --}}
                        <div class="flex items-center justify-end mt-4">
                            <a class="btn" href="{{ url('auth/github') }}"
                                style="background: #313131; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                                Login with GitHub
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>