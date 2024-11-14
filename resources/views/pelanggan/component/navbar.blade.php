<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #025464;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="assets/images/LOGO.png" alt="AtoZ Logo" style="width: 40px; height: 40px; margin-right: 10px;">
            <span style="font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 1.5rem;">AtoZ</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page"
                        href="/" style="font-family: 'Montserrat', sans-serif;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'shop' ? 'active' : '' }}" href="/shop" style="font-family: 'Montserrat', sans-serif;">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'contact' ? 'active' : '' }}" href="/contact" style="font-family: 'Montserrat', sans-serif;">Contact Us</a>
                </li>
                @auth
                    <div class="dropdown">
                        <a class="d-flex align-items-center text-links text-white" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                            <img src="{{ asset('storage/user/' . Auth::user()->foto) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="">
                            <div class="d-flex flex-column text-white ms-2">
                                <p class="m-0" style="font-weight: 700; font-size:14px;">{{ Auth::user()->name }}</p>
                                <p class="m-0" style="font-size:12px">{{ Auth::user()->email }}</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="logout_pelanggan">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <li class="nav-item">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" style="font-family: 'Montserrat', sans-serif;">
                            Login | Register
                        </button>
                    </li>
                @endauth
                <li class="nav-item">
                    <div class="notif position-relative">
                        <a href="/transaksi" class="fs-5 nav-link {{ Request::path() == 'transaksi' ? 'active' : '' }}">
                            <i class="fa fa-bag-shopping"></i>
                        </a>
                        @if ($count)
                            <div class="circle position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $count }}
                            </div>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <div class="notif">
                        <a href="/checkOut" class="fs-5 nav-link {{ Request::path() == 'checkOut' ? 'active' : '' }}">
                            <i class="fa fa-cash-register"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<script>
    $(".text-links").click(function(e) {
        e.preventDefault();
        var $linksLogin = $("#links-login");
        if ($linksLogin.hasClass("activeLogin")) {
            $linksLogin.removeClass("activeLogin");
        } else {
            $linksLogin.addClass("activeLogin");
        }
    });
</script>

