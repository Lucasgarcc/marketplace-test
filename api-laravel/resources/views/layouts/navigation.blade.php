<nav class="navbar navbar-expand-lg navbar-dark navbar-shell sticky-top border-bottom border-white border-opacity-10">
    <div class="container py-2">
        <a class="navbar-brand d-inline-flex align-items-center gap-3" href="{{ route('dashboard') }}">
            <x-application-logo />
            <div>
                <div class="text-uppercase small fw-semibold text-white-50">Marketplace Lab</div>
                <div class="fw-bold text-white">Mercado Livre Studio</div>
            </div>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#marketNavbar" aria-controls="marketNavbar" aria-expanded="false" aria-label="Alternar navegacao">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="marketNavbar">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile.*') ? 'active fw-semibold' : '' }}" href="{{ route('profile.edit') }}">
                        Perfil
                    </a>
                </li>
            </ul>

            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-3">
                <div class="text-lg-end small">
                    <div class="fw-semibold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-white-50">{{ Auth::user()->email }}</div>
                </div>

                <div class="d-flex gap-2">
                    <a class="btn btn-light btn-sm rounded-pill px-3" href="{{ route('profile.edit') }}">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm rounded-pill px-3">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
