<footer class="footer mt-5 text-light" style="background-color: #2c2c2c;">
    <div class="container-fluid py-5">
        <div class="row gy-4 ms-5">

            {{-- Brand dan Deskripsi --}}
            <div class="col-md-4">
                <h5 class="fw-bold mb-2" style="color: #ff7f32">Dapur Ibu</h5>
                <p class="small text-secondary m-0" style="max-width: 70%">
                    Catering rumahan dengan cita rasa spesial seperti masakan ibu sendiri.
                    Fresh dibuat setiap hari & cocok untuk berbagai acara.
                </p>
            </div>

            {{-- Navigasi --}}
            <div class="col-md-4">
                <h6 class="fw-semibold mb-3" style="color: #ff7f32;">Navigasi</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 m-0">
                    <li><a href="{{ route('home') }}" class="footer-link">Beranda</a></li>
                    <li><a href="{{ route('menu.index') }}" class="footer-link">Menu</a></li>
                    <li><a href="{{ route('about') }}" class="footer-link">Tentang Kami</a></li
                    <li><a href="{{ route('preorder') }}" class="footer-link">Booking</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="col-md-4">
                <h6 class="fw-semibold mb-3" style="color: #ff7f32;">Hubungi Kami</h6>
                <p class="small mb-1"><i class="fa fa-phone me-2 text-light"></i>+62 895-3593-80603</p>
                <p class="small mb-1"><i class="fa fa-envelope me-2 text-light"></i>dapuributianaura@gmail.com</p>
                <p class="small mb-3"><i class="fa fa-map-marker-alt me-2 text-light"></i>Griya Kondang Asri BB5/8, Karawang</p>
                <div class="d-flex gap-3">
                    <a href="https://www.instagram.com/dapuributianaura" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="text-center py-3 border-top border-secondary" style="background-color: #ff7f32;">
        <small class="text-light">© 2025 Dapur Ibu — All Rights Reserved.</small>
    </div>
</footer>