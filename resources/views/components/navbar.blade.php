<style>
    /* === NAVBAR STYLE IMPROVED === */
    .navbar-custom {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 12px 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        max-width: 100%;
    }

    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand,
    .navbar-custom .dropdown-toggle,
    .navbar-custom .dropdown-item {
        color: #192077;
        font-weight: 500;
        transition: all 0.3s ease;
        margin: 0 2px;
        padding: 8px 12px;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .dropdown-item:hover {
        color: #192077 !important;
        background: rgba(25, 32, 119, 0.1) !important;
        transform: translateY(-1px);
    }

    .btn-login {
        background: linear-gradient(135deg, #192077 0%, #2a3a9e 100%);
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(25, 32, 119, 0.3);
    }

    .btn-login:hover {
        background: linear-gradient(135deg, #2a3a9e 0%, #192077 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(25, 32, 119, 0.4);
        color: white;
    }

    /* === NEW LOGOUT BUTTON STYLES === */
    .btn-logout {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        margin: 8px 0;
    }

    .btn-logout:hover {
        background: linear-gradient(135deg, #c82333 0%, #dc3545 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-logout-sidebar {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
        border-radius: 8px;
        padding: 12px 16px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 8px;
        width: calc(100% - 16px);
    }

    .btn-logout-sidebar:hover {
        background: linear-gradient(135deg, #c82333 0%, #dc3545 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
        color: white;
        text-decoration: none;
    }

    /* === SIDEBAR STYLE IMPROVED === */
    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: linear-gradient(180deg, #10316B 0%, #0a2a5a 100%);
        overflow-y: auto;
        padding-top: 1rem;
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
    }

    .sidebar .nav-link {
        color: #f1f1f1;
        border-radius: 8px;
        padding: 12px 16px;
        margin: 4px 8px;
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .sidebar .nav-link::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: #4e73df;
        transform: scaleY(0);
        transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover::before {
        transform: scaleY(1);
    }

    .sidebar .nav-link:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        transform: translateX(5px);
    }

    .sidebar .nav-item .collapse .nav-link {
        padding-left: 2rem;
        background: rgba(255, 255, 255, 0.05);
        margin: 2px 8px;
        font-size: 0.9rem;
    }

    .sidebar .nav-item .collapse .nav-link:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .sidebar .badge {
        font-size: 0.7rem;
        padding: 4px 8px;
        border-radius: 12px;
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    }

    /* === ICON STYLING === */
    .bi {
        transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover .bi {
        transform: scale(1.1);
    }

    /* === COLLAPSE ANIMATION === */
    .collapse {
        transition: all 0.3s ease;
    }

    .sidebar .nav-link[aria-expanded="true"] .bi-chevron-down {
        transform: rotate(180deg);
    }

    /* === SCROLLBAR STYLING === */
    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);php
        border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }
</style>

@if (Auth::check() && Auth::user()->role == 'admin')
    <div class="p-4 sm:ml-64">
        <aside class="sidebar">
            <ul class="nav flex-column px-3">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link d-flex align-items-center">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        href="#ecommerceMenu" role="button" aria-expanded="false" aria-controls="ecommerceMenu">
                        <span><i class="bi bi-cart3 me-2"></i> Data Master</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <div class="collapse" id="ecommerceMenu">
                        <ul class="nav flex-column ms-3 mt-2">
                            <li><a href="{{ route('admin.approve.index') }}" class="nav-link">Detail </a></li>
                            {{-- <li><a href="#" class="nav-link">Document</a></li>
                            <li><a href="#" class="nav-link">Kelulusan</a></li> --}}
                            <li><a href="{{ route('admin.jurusans.index') }}" class="nav-link">jurusan</a></li>
                            <li><a href="{{ route('admin.rayons.index') }}" class="nav-link">Rayon</a></li>
                            <li><a href="{{ route('admin.rombles.index') }}" class="nav-link">Rombel</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center">
                        <i class="bi bi-kanban me-2"></i>
                        <span class="badge bg-secondary ms-auto">Pro</span>
                    </a>
                </li>

                <!-- NEW LOGOUT BUTTON -->
                <li class="nav-item mt-4">
                    <a href="{{ route('logout') }}" class="btn-logout-sidebar">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>

            </ul>
        </aside>
    </div>

@elseif(Auth::check() && Auth::user()->role == 'user')
    <div class="p-4 sm:ml-64">
        <aside class="sidebar">
            <ul class="nav flex-column px-3">
                <li class="nav-item">
                    <a href="{{ route('user.home') }}" class="nav-link d-flex align-items-center">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        href="#ecommerceMenu" role="button" aria-expanded="false" aria-controls="ecommerceMenu">
                        <span><i class="bi bi-cart3 me-2"></i> Data Master</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <div class="collapse" id="ecommerceMenu">
                        <ul class="nav flex-column ms-3 mt-2">
                            <li><a href="{{ route('user.datasiswas.index') }}" class="nav-link">Data Siswa</a></li>
                            <li><a href="{{ route('user.documents.index') }}" class="nav-link">Document</a></li>
                            <li><a href="{{route('user.datakeluargas.index')}}" class="nav-link">Data Keluarga</a></li>
                            {{-- <li><a href="#" class="nav-link">Kelulusan</a></li> --}}
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center">
                        <i class="bi bi-kanban me-2"></i>
                        <span class="badge bg-secondary ms-auto">Pro</span>
                    </a>
                </li>

                <!-- NEW LOGOUT BUTTON -->
                <li class="nav-item mt-4">
                    <a href="{{ route('logout') }}" class="btn-logout-sidebar">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>

            </ul>
        </aside>
    </div>

@else
    <nav class="navbar navbar-expand-lg navbar-custom" style="max-width: 100%">
        <div class="container">
            <a class="navbar-brand me-2" href="#">
                <img src="https://smkwikrama.sch.id/assets2/wikrama-logo.png" height="60" alt="SMK Wikrama Logo"
                    loading="lazy" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse align-items-center" id="navbarButtonsExample">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('Home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Project</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Major</a></li>
                </ul>

                <div class="d-flex align-items-center">
                    @if (Auth::check())
                        <!-- NEW LOGOUT BUTTON FOR NAVBAR -->
                        <a href="{{ route('logout') }}" class="btn-logout">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    @else
                        <a href="{{ route('signup') }}" class="btn-login me-3 text-white">
                            <i class="fas fa-user-plus me-2"></i> Sign Up
                        </a>
                        <a href="{{ route('login') }}" class="btn-login text-white">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>

@endif
