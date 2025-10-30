<nav class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3 d-none d-md-block">
                    <h5 class="brand-name m-0">Dapur Ibu</h5>
                </div>

                <div class="col-md-5 my-auto">
                    <form role="search">
                        <div class="input-group">
                            <input type="search" placeholder="Cari riwayat pesanan..." class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search text-danger"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 text-end my-auto">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-book"></i> Booking
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-block">
                            <a class="btn btn-outline-light login-btn" href="#">
                                <i class="fa fa-user"></i> Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sub-navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-md-none" href="#">Dapur Ibu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
</nav>