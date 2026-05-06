<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('jobs.index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/icon.ico') }}" alt="Logo Sampharindo Group">
            <h1 class="sitename">CAREER SAMPHARINDO GROUP</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ Request::is('/') ? '#hero' : route('jobs.index').'#hero' }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ Request::is('/') ? '#about' : route('jobs.index').'#about' }}">Tentang</a></li>
                <li><a href="{{ Request::is('/') ? '#available-jobs' : route('jobs.index').'#available-jobs' }}">Lowongan Kerja</a></li>
                <li><a href="{{ Request::is('/') ? '#gallery' : route('jobs.index').'#gallery' }}">Gallery</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
