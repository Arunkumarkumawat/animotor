<style>
  .brand-logo {
    width: 42px;
    height: 42px;
    background: #2f65ff;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .brand-logo i {
    color: white;
    font-size: 20px;
  }

  .nav-link {
    color: #1d1d1d !important;
    font-weight: 500;
    margin: 0 14px;
  }

  .lang-flag {
    width: 26px;
    height: auto;
    margin-left: 8px;
  }

  .btn-signin {
    background: #2f65ff;
    padding: 8px 24px;
    color: white;
    border-radius: 10px;
    font-weight: 500;
    border: none;
  }
</style>

<nav class="navbar py-2 bg-white shadow-sm">
  <div class="container d-flex align-items-center justify-content-between">

    <!-- Left: Logo -->
    <div class="d-flex align-items-center">
      <div class="brand-logo me-2">
        <i class="bi bi-car-front-fill"></i>
      </div>
      <div>
        <h5 class="mb-0 fw-bold">ANI Motors</h5>
        <small class="text-muted">Car Rental Marketplace</small>
      </div>
    </div>

    <!-- Middle: Navigation -->
    <ul class="navbar-nav flex-row d-none d-md-flex">
      <li class="nav-item"><a class="nav-link" href="#">Browse Cars</a></li>
      <li class="nav-item"><a class="nav-link" href="#">How It Works</a></li>
      <li class="nav-item"><a class="nav-link" href="#">List your car</a></li>
    </ul>

    <!-- Right: Language + Sign in -->
    <div class="d-flex align-items-center">
      <i class="bi bi-globe2 fs-5"></i>
      <img src="https://flagcdn.com/w20/gb.png" class="lang-flag" alt="UK Flag">
      @auth
        <a href="{{ route('logout') }}" class="btn btn-signin ms-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      @else
        <a href="{{ route('login') }}" class="btn btn-signin ms-3">Sign In</a>
      @endauth
    </div>

  </div>
</nav>