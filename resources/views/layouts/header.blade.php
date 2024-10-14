<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Akademik TI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mahasiswa">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dosen">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/prodi">Prodi</a>
                    </li>
                </ul>
                @php
                $searchRoutes = [
                    'mahasiswa' => '/mahasiswa',
                    'dosen' => '/dosen',
                    'prodi' => '/prodi',
                    'user' => '/user'
                ];
                $currentRoute = Request::path();
                $currentSearchRoute = $searchRoutes[explode('/', $currentRoute)[0]] ?? '/';
            @endphp
                <form class="d-flex" role="search" action="{{ $currentSearchRoute }}" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success me-2" type="submit">Search</button>
                </form>
                <form action="/login" class="d-flex" role="login">
                    <button class="btn btn-outline-success me-2" type="submit">Login</button>
                </form>
                <form action="/register" class="d-flex" role="login">
                    <button class="btn btn-outline-success" type="submit">Register</button>
                </form>
            </div>
        </div>
    </nav>
</header>
