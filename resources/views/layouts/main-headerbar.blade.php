<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('years') }}" class="nav-link">السنوات الدراسية</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">

        <!-- maximize -->
        <li class="nav-item">
            {{-- for first way code that in the a tag below : id="fullscreen1" --}}
            <a class="nav-link" data-widget="fullscreen" onclick="openFullscreen()" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                {{-- you can use third way here https://www.youtube.com/watch?v=3FjYcMKZ3SU --}}
            </a>
        </li>



    </ul>
</nav>
<!-- /.navbar -->
