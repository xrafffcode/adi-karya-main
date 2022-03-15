<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">Adi Karya</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link {{ Request::url() == url('/') ? 'active' : ' ' }}">Home</a>
            <a href="/about" class="nav-item nav-link {{ Request::url() == url('/about') ? 'active' : ' ' }}">About</a>
            <a href="/product"
                class="nav-item nav-link {{ Request::url() == url('/product') ? 'active' : ' ' }}">Product</a>
            <a href="/contact"
                class="nav-item nav-link {{ Request::url() == url('/contact') ? 'active' : ' ' }}">Contact US</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Bahasa</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="feature.html" class="dropdown-item">ID</a>
                    <a href="quote.html" class="dropdown-item">EN</a>
                </div>
            </div>

        </div>
        <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Buy Product<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->
