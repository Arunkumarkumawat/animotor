<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ settings('site_name') }}</title>
    <meta name="description" content="ANI Motors marketplace for standard car hire, PHV/PCO private hire vehicles, and executive chauffeur services. Compare trusted suppliers and book with confidence."/>
    <link rel="stylesheet" href="{{ asset('assets/home.css') }}">
    <link rel="shortcut icon" href="{{ settings('favicon') }}">
    
    @yield('style')
    {!! settings('head_section') !!}
</head>

<body>
    <svg class="sr-only" xmlns="http://www.w3.org/2000/svg">
        <symbol id="i-bolt" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M13 2L3 14h7l-1 8 12-14h-7l-1-6z"/>
        </symbol>
        <symbol id="i-shield" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2l8 4v6c0 5-3.5 9.5-8 10-4.5-.5-8-5-8-10V6l8-4z"/>
            <path d="M9 12l2 2 4-5"/>
        </symbol>
        <symbol id="i-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 21s7-4.5 7-11a7 7 0 10-14 0c0 6.5 7 11 7 11z"/>
            <path d="M12 10a2 2 0 100-4 2 2 0 000 4z"/>
        </symbol>
        <symbol id="i-calendar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="5" width="18" height="16" rx="2"/>
            <path d="M16 3v4M8 3v4M3 11h18"/>
        </symbol>
        <symbol id="i-clock" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 7v6l4 2"/>
        </symbol>
        <symbol id="i-user" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21a8 8 0 10-16 0"/>
            <circle cx="12" cy="7" r="4"/>
        </symbol>
        <symbol id="i-car" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 13l2-6h14l2 6"/>
            <path d="M5 13h14"/>
            <path d="M7 17h0M17 17h0"/>
            <path d="M5 13v6M19 13v6"/>
        </symbol>
        <symbol id="i-briefcase" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="7" width="18" height="14" rx="2"/>
            <path d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
            <path d="M3 13h18"/>
        </symbol>
        <symbol id="i-crown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 8l4 4 5-7 5 7 4-4"/>
            <path d="M5 21h14l2-10H3l2 10z"/>
        </symbol>
        <symbol id="i-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 6L9 17l-5-5"/>
        </symbol>
        <symbol id="i-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h12"/>
            <path d="M13 6l6 6-6 6"/>
        </symbol>
        <symbol id="i-search" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="7"/>
            <path d="M21 21l-4.3-4.3"/>
        </symbol>
        <symbol id="i-warning" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 9v4"/>
            <path d="M12 17h.01"/>
            <path d="M10.3 3h3.4L22 20H2L10.3 3z"/>
        </symbol>
        <symbol id="i-money" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            <path d="M14 9.5c0-1-1-2-2.5-2S9 8.2 9 9.3 10 11 12 11s3 .7 3 2-1 2.2-2.7 2.2S9 14.4 9 13.3"/>
            <path d="M12 7v10"/>
        </symbol>
        <symbol id="i-headset" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 12a8 8 0 0116 0"/>
            <path d="M4 12v5a2 2 0 002 2h2v-7H6a2 2 0 00-2 2z"/>
            <path d="M20 12v5a2 2 0 01-2 2h-2v-7h2a2 2 0 012 2z"/>
            <path d="M12 19a2 2 0 01-2-2h4a2 2 0 01-2 2z"/>
        </symbol>
        <symbol id="i-flame" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22c4 0 7-3 7-7 0-2-1-4-3-6-1 2-2 3-4 4 0-3-2-6-5-8 0 2-1 4-2 5-1 1-2 3-2 5 0 4 3 7 9 7z"/>
        </symbol>
        <symbol id="i-building" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 22V7l9-4 9 4v15"/>
            <path d="M9 22V12h6v10"/>
            <path d="M7 10h.01M7 14h.01M17 10h.01M17 14h.01"/>
        </symbol>
        <symbol id="i-doc" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
            <path d="M14 2v6h6"/>
            <path d="M8 13h8M8 17h8M8 9h3"/>
        </symbol>
        <symbol id="i-star" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2l3 7 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1 3-7z"/>
        </symbol>
        <symbol id="i-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 9l6 6 6-6"/>
        </symbol>
    </svg>
    
    @include('frontpage.partials.layout.header_home')
    
    @yield('content')

    @include('frontpage.partials.layout.footer_home')
    @stack('scripts')
</body>
</html>