<nav class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3 d-none d-md-block">
                    <a href="{{ route('about') }}" class="text-decoration-none text-light">
                        <h5 class="brand-name m-0">Dapur Ibu</h5>
                    </a>
                </div>

                <div class="col-md-5 my-auto">
                    <form role="search">
                        <div class="input-group">
                            <input
                                type="search"
                                placeholder="Cari riwayat pesanan..."
                                class="form-control"
                                style="border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-right: none;"
                            />
                            <button class="btnsearch" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 text-end my-auto">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('preorder*') ? 'active' : '' }}" href="{{ route('preorder') }}">
                                Booking
                            </a>
                        </li>

                        <li class="nav-item d-none d-md-block">
                            @if(Auth::guard('admin')->check())
                                <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light login-btn">
                                        <i class="fa fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            @else
                                <a class="btn btn-outline-light login-btn" href="{{ route('admin.login') }}">
                                    <i class="fa fa-user"></i> Login
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sub-navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-md-none" href="{{ route('home') }}">Dapur Ibu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('menu*') ? 'active' : '' }}" href="{{ route('menu.index') }}">Menu</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="#">Kontak</a></li>
                </ul>

            </div>
        </div>
    </nav>
</nav>