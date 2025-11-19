<header id="header" class="header sticky-top">

  <div class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">HukumDesa@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div><!-- End Top Bar -->

  <div class="branding d-flex align-items-cente">

    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">BinaDesa</h1>
      </a>

<nav id="navmenu" class="navmenu">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
        </li>

        <!-- PRODUK HUKUM -->
        <li class="dropdown">
            <a href="#">
                <span>Produk Hukum</span>
                <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>

            <ul>
                <li>
                    <a href="{{ route('jenis-dokumen.index') }}">
                        Jenis Dokumen
                    </a>
                </li>

                <li>
                    <a href="{{ route('kategori-dokumen.index') }}">
                        Kategori Dokumen
                    </a>
                </li>

                <li>
                    <a href="{{ route('dokumen-hukum.index') }}">
                        Dokumen Hukum
                    </a>
                </li>

                <li>
                    <a href="{{ route('riwayat-perubahan.index') }}">
                        Riwayat Perubahan
                    </a>
                </li>

                <li>
                    <a href="{{ route('lampiran-dokumen.index') }}">
                        Lampiran Dokumen
                    </a>
                </li>
            </ul>
        </li>

        <!-- MENU PROFILE DESA (opsional) -->
     

        <!-- AUTH -->
      @guest
    <li>
        <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
    </li>
    <li>
        <a href="{{ route('register') }}" class="hover:text-blue-600">Register</a>
    </li>
@endguest

@auth
    <li class="font-semibold text-gray-700">
        Halo, {{ auth()->user()->name }}
    </li>

    <li>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-600 hover:text-red-800">
                Logout
            </button>
        </form>
    </li>
@endauth

    </ul>

    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>



    </div>

  </div>

</header>
