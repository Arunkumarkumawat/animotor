<div class="nav">
    <div class="container">
        <div class="nav-inner">
            <a class="brandMark" href="#top">
                <div class="logo" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M4 14l2-6h12l2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 14h12" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M7 18h0M17 18h0" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div>{{ settings('site_name') }}</div>
            </a>

            <div class="nav-links" aria-label="Top links">
                <div class="chip">
                    <svg class="mini-ico"><use href="#i-shield"/></svg>
                    <b>Verified suppliers</b> • Secure payments
                </div>

                <a class="small-link" href="#how" aria-label="How it works">How it works</a>
                <a class="small-link" href="#join" aria-label="Join as a business">Join as a business</a>
                <a class="small-link" href="#about" aria-label="About ANI Motors">About</a>

                <button class="btn secondary" onclick="scrollToId('offers')">
                    <svg class="ico"><use href="#i-flame"/></svg>
                    Deals
                </button>
                @auth
                <a class="btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
                @else
                <a class="btn" href="{{ route('login') }}">
                    Login
                </a>
                @endauth
            </div>
        </div>
    </div>
</div>

<div id="top" class="anchor"></div>