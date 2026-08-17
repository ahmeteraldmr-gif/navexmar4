<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NAVEXMAR — ' . __t('Türk Boğazları & Liman Hizmetleri A.Ş.', 'Turkish Straits & Port Services Inc.'))</title>
    <meta name="description" content="NAVEXMAR — {{ __t('Türk Boğazları ve Türkiye limanlarında 7/24 profesyonel gemi acenteliği, liman hizmetleri, ikmal ve lojistik.', '24/7 Professional shipping agency, port attendance, bunkering and maritime logistics in Turkish Straits and all ports.') }}">
    
    <!-- Modern Typography Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        :root {
            --navy:       #06182E;
            --navy-light: #0B2545;
            --blue:       #0284C7;
            --blue-hover: #0369A1;
            --cyan:       #38BDF8;
            --sky:        #F0F9FF;
            --white:      #FFFFFF;
            --bg:         #F8FAFC;
            --border:     #E2E8F0;
            --text:       #0F172A;
            --muted:      #64748B;
            --teal:       #10B981;
            --r:          12px;
            --ease:       cubic-bezier(0.4, 0, 0.2, 1);
            --shadow:     0 4px 16px rgba(6, 24, 46, 0.06);
            --shadow-lg:  0 16px 36px rgba(6, 24, 46, 0.12);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            font-size: 0.94rem;
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; }
        img { display: block; max-width: 100%; }

        h1, h2, h3, h4, h5 {
            font-family: 'Outfit', sans-serif;
            line-height: 1.2;
            color: var(--navy);
            letter-spacing: -0.3px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ── TOP BAR ── */
        .topbar {
            background: var(--navy);
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .topbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .topbar-left {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }
        .topbar-item {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
        }
        .topbar-item i { color: var(--cyan); font-size: 0.8rem; }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .topbar-live {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 0.72rem;
            color: #A7F3D0;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            background: rgba(16, 185, 129, 0.12);
            padding: 3px 10px;
            border-radius: 99px;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        .dot-live {
            width: 7px; height: 7px;
            background: #10B981;
            border-radius: 50%;
            animation: pulse-green 1.6s ease-in-out infinite;
        }
        @keyframes pulse-green {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.3); opacity: 0.5; }
        }

        /* Lang Switcher */
        .lang-switcher {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 3px 8px;
            border-radius: 8px;
            font-size: 0.74rem;
            font-weight: 800;
        }
        .lang-btn {
            color: rgba(255, 255, 255, 0.7);
            padding: 2px 8px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        .lang-btn:hover { color: #FFFFFF; }
        .lang-btn.active {
            color: #FFFFFF;
            background: var(--blue);
            box-shadow: 0 2px 6px rgba(2, 132, 199, 0.4);
        }
        .lang-sep { color: rgba(255, 255, 255, 0.25); font-size: 0.7rem; }

        /* ── NAVBAR ── */
        .nav {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 900;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        }
        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .nav-logo-icon {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, var(--navy), #0284C7);
            border-radius: 10px;
            display: grid;
            place-items: center;
            color: white;
            font-size: 1.1rem;
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.35);
        }
        .nav-logo-text {
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            font-size: 1.35rem;
            color: var(--navy);
            letter-spacing: -0.4px;
        }
        .nav-logo-text span { color: var(--blue); }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
        }
        .nav-links a {
            display: block;
            padding: 9px 16px;
            font-size: 0.88rem;
            font-weight: 600;
            color: #334155;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .nav-links a:hover {
            color: var(--blue);
            background: var(--sky);
        }
        .nav-links a.active {
            color: var(--blue);
            font-weight: 700;
            background: var(--sky);
        }

        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue);
            color: white !important;
            padding: 10px 22px;
            border-radius: 10px;
            font-size: 0.86rem;
            font-weight: 700;
            transition: all 0.2s var(--ease);
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.3);
        }
        .nav-cta:hover {
            background: var(--navy);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 24, 46, 0.3);
        }

        .nav-hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none; border: none;
            cursor: pointer; padding: 6px;
        }
        .nav-hamburger span {
            display: block;
            width: 24px; height: 2.5px;
            background: var(--navy); border-radius: 2px;
        }

        /* Mobile drawer */
        .mob-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(6, 24, 46, 0.5); z-index: 1000;
            backdrop-filter: blur(4px);
        }
        .mob-drawer {
            position: fixed; top: 0; right: -320px;
            width: 300px; height: 100%;
            background: var(--white);
            border-left: 1px solid var(--border);
            z-index: 1001;
            transition: right 0.3s var(--ease);
            padding: 28px 24px;
            display: flex; flex-direction: column; gap: 0;
        }
        .mob-drawer.open { right: 0; }
        .mob-overlay.open { display: block; }
        .mob-close {
            background: none; border: none;
            font-size: 1.4rem; color: var(--muted);
            cursor: pointer; align-self: flex-end;
            margin-bottom: 20px;
        }
        .mob-links { list-style: none; display: flex; flex-direction: column; gap: 4px; flex: 1; }
        .mob-links a {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 16px; border-radius: 8px;
            color: var(--text); font-size: 0.92rem; font-weight: 600;
            transition: all 0.2s ease;
        }
        .mob-links a:hover { background: var(--sky); color: var(--blue); }
        .mob-links a i { color: var(--blue); width: 18px; }

        /* ── PAGE HERO BANNER ── */
        .page-hero {
            background: linear-gradient(135deg, #06182E 0%, #0B2545 100%);
            padding: 60px 0 50px;
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(56, 189, 248, 0.12) 0%, transparent 60%);
            pointer-events: none;
        }
        .page-hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--cyan);
            padding: 5px 16px; border-radius: 99px;
            font-size: 0.74rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.8px;
            margin-bottom: 16px;
        }
        .page-hero h1 {
            font-size: clamp(1.6rem, 3vw, 2.4rem);
            font-weight: 800; color: white;
            margin-bottom: 12px; letter-spacing: -0.4px;
        }
        .page-hero p {
            color: rgba(255, 255, 255, 0.75);
            font-size: 0.94rem; max-width: 560px; line-height: 1.65;
        }

        /* ── SECTIONS ── */
        .sec { padding: 72px 0; }
        .sec-alt { background: var(--bg); }
        .sec-label {
            display: inline-flex; align-items: center; gap: 8px;
            color: var(--blue); font-size: 0.74rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 1.4px;
            margin-bottom: 10px;
        }
        .sec-label::before {
            content: ''; display: block;
            width: 18px; height: 3px;
            background: var(--blue); border-radius: 99px;
        }
        .sec-title {
            font-size: clamp(1.4rem, 2.4vw, 2rem);
            font-weight: 800; color: var(--navy);
            letter-spacing: -0.4px; margin-bottom: 10px;
        }
        .sec-sub {
            color: var(--muted); font-size: 0.9rem;
            max-width: 520px; line-height: 1.7;
        }

        /* ── BUTTONS ── */
        .btn-primary {
            display: inline-flex; align-items: center; gap: 9px;
            background: var(--blue); color: white !important;
            padding: 12px 26px; border-radius: 10px;
            font-weight: 700; font-size: 0.88rem;
            border: none; cursor: pointer;
            transition: all 0.2s var(--ease);
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.28);
        }
        .btn-primary:hover {
            background: var(--navy);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(6, 24, 46, 0.3);
        }

        .btn-outline {
            display: inline-flex; align-items: center; gap: 9px;
            background: transparent; color: var(--navy) !important;
            padding: 11px 24px; border-radius: 10px;
            font-weight: 700; font-size: 0.88rem;
            border: 2px solid var(--navy); cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-outline:hover {
            background: var(--navy);
            color: white !important;
            transform: translateY(-2px);
        }

        .btn-outline-white {
            display: inline-flex; align-items: center; gap: 9px;
            background: transparent; color: white !important;
            padding: 11px 24px; border-radius: 10px;
            font-weight: 700; font-size: 0.88rem;
            border: 2px solid rgba(255, 255, 255, 0.5); cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-outline-white:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: white;
            transform: translateY(-2px);
        }

        /* ── FOOTER ── */
        .footer {
            background: #04101F;
            padding: 64px 0 32px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.1fr;
            gap: 44px;
            margin-bottom: 48px;
        }
        .footer-logo {
            display: flex; align-items: center; gap: 12px;
            margin-bottom: 16px;
        }
        .footer-logo-icon {
            width: 40px; height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px; display: grid; place-items: center;
            color: var(--cyan); font-size: 1rem;
        }
        .footer-logo-text {
            font-family: 'Outfit', sans-serif;
            font-weight: 900; font-size: 1.25rem;
            color: white; letter-spacing: -0.3px;
        }
        .footer-logo-text span { color: var(--cyan); }
        .footer-about-p { color: rgba(255, 255, 255, 0.6); font-size: 0.84rem; line-height: 1.7; margin-bottom: 18px; }
        .footer-certs { display: flex; flex-wrap: wrap; gap: 8px; }
        .footer-cert {
            background: rgba(255, 255, 255, 0.06); color: rgba(255, 255, 255, 0.7);
            padding: 4px 12px; border-radius: 6px;
            font-size: 0.7rem; font-weight: 700; border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .footer-col h5 {
            font-family: 'Outfit', sans-serif; font-weight: 800;
            color: white; font-size: 0.92rem;
            margin-bottom: 16px; padding-bottom: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            letter-spacing: 0.3px;
        }
        .footer-nav { list-style: none; }
        .footer-nav li { margin-bottom: 10px; }
        .footer-nav a {
            color: rgba(255, 255, 255, 0.6); font-size: 0.84rem;
            display: inline-flex; align-items: center; gap: 8px;
            transition: color 0.2s ease;
        }
        .footer-nav a:hover { color: var(--cyan); }
        .footer-nav a i { font-size: 0.6rem; color: var(--cyan); }

        .f-contact { display: flex; gap: 10px; align-items: flex-start; margin-bottom: 12px; }
        .f-contact i { color: var(--cyan); font-size: 0.85rem; margin-top: 3px; min-width: 16px; }
        .f-contact span { color: rgba(255, 255, 255, 0.65); font-size: 0.82rem; line-height: 1.5; }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 24px;
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 12px;
        }
        .footer-bottom span { color: rgba(255, 255, 255, 0.45); font-size: 0.78rem; }
        .footer-bottom a { color: rgba(255, 255, 255, 0.45); font-size: 0.78rem; transition: color 0.2s ease; }
        .footer-bottom a:hover { color: white; }

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) {
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
        }
        @media (max-width: 768px) {
            .nav-links, .nav-cta { display: none !important; }
            .nav-hamburger { display: flex; }
            .topbar-right { display: none; }
            .footer-grid { grid-template-columns: 1fr; gap: 28px; }
            .sec { padding: 52px 0; }
            .topbar-left { gap: 14px; }
        }
    </style>

    @yield('styles')
</head>
<body>

{{-- TOP BAR --}}
<div class="topbar">
    <div class="topbar-inner">
        <div class="topbar-left">
            <span class="topbar-item"><i class="fa-solid fa-phone"></i> {{ \App\Models\SiteSetting::get('phone', '+90 212 444 62 83') }}</span>
            <span class="topbar-item"><i class="fa-solid fa-envelope"></i> {{ \App\Models\SiteSetting::get('email', 'ops@navexmar.com') }}</span>
            <span class="topbar-item"><i class="fa-solid fa-tower-broadcast"></i> VHF Ch 16 · 12 · 11</span>
        </div>
        <div class="topbar-right">
            <div class="topbar-live"><span class="dot-live"></span> {{ __t('7/24 Nöbetçi Aktif', '24/7 Duty Active') }}</div>
            
            <div class="lang-switcher">
                <a href="{{ route('lang.switch', 'tr') }}" class="lang-btn {{ app()->getLocale() === 'tr' ? 'active' : '' }}">TR</a>
                <span class="lang-sep">|</span>
                <a href="{{ route('lang.switch', 'en') }}" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
            </div>
        </div>
    </div>
</div>

{{-- NAVBAR --}}
<nav class="nav">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="nav-logo">
            <div class="nav-logo-icon"><i class="fa-solid fa-anchor"></i></div>
            <div class="nav-logo-text">NAVEX<span>MAR</span></div>
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __t('Ana Sayfa', 'Home') }}</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ __t('Hakkımızda', 'About Us') }}</a></li>
            <li><a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'active' : '' }}">{{ __t('Hizmetler', 'Services') }}</a></li>
            <li><a href="{{ route('straits-ports') }}" class="{{ request()->routeIs('straits-ports') ? 'active' : '' }}">{{ __t('Boğazlar & Limanlar', 'Straits & Ports') }}</a></li>
            <li><a href="{{ route('vessels.index') }}" class="{{ request()->routeIs('vessels.*') ? 'active' : '' }}">{{ __t('Filomuz', 'Fleet') }}</a></li>
            <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">{{ __t('Haberler', 'News') }}</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ __t('İletişim', 'Contact') }}</a></li>
        </ul>

        <div style="display:flex;align-items:center;gap:10px;">
            <a href="{{ route('contact') }}" class="nav-cta"><i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Teklif Al', 'Get Quote') }}</a>
            <button class="nav-hamburger" id="navHam" aria-label="Menü">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>

{{-- MOBILE DRAWER --}}
<div class="mob-overlay" id="mobOverlay"></div>
<div class="mob-drawer" id="mobDrawer">
    <button class="mob-close" id="mobClose">&times;</button>
    <div class="nav-logo" style="margin-bottom:16px;">
        <div class="nav-logo-icon"><i class="fa-solid fa-anchor"></i></div>
        <div class="nav-logo-text">NAVEX<span>MAR</span></div>
    </div>
    
    <div class="lang-switcher" style="margin-bottom:16px; align-self:flex-start;">
        <a href="{{ route('lang.switch', 'tr') }}" class="lang-btn {{ app()->getLocale() === 'tr' ? 'active' : '' }}">Türkçe (TR)</a>
        <span class="lang-sep">|</span>
        <a href="{{ route('lang.switch', 'en') }}" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">English (EN)</a>
    </div>

    <ul class="mob-links">
        <li><a href="{{ route('home') }}"><i class="fa-solid fa-house fa-fw"></i> {{ __t('Ana Sayfa', 'Home') }}</a></li>
        <li><a href="{{ route('about') }}"><i class="fa-solid fa-building fa-fw"></i> {{ __t('Hakkımızda', 'About Us') }}</a></li>
        <li><a href="{{ route('services.index') }}"><i class="fa-solid fa-anchor fa-fw"></i> {{ __t('Hizmetler', 'Services') }}</a></li>
        <li><a href="{{ route('straits-ports') }}"><i class="fa-solid fa-compass fa-fw"></i> {{ __t('Boğazlar & Limanlar', 'Straits & Ports') }}</a></li>
        <li><a href="{{ route('vessels.index') }}"><i class="fa-solid fa-ship fa-fw"></i> {{ __t('Filomuz', 'Fleet') }}</a></li>
        <li><a href="{{ route('news.index') }}"><i class="fa-solid fa-newspaper fa-fw"></i> {{ __t('Haberler', 'News') }}</a></li>
        <li><a href="{{ route('contact') }}"><i class="fa-solid fa-phone fa-fw"></i> {{ __t('İletişim', 'Contact') }}</a></li>
    </ul>
    <a href="{{ route('contact') }}" class="btn-primary" style="width:100%;justify-content:center;margin-top:24px;">
        <i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Teklif Al', 'Get Quote') }}
    </a>
</div>

<main>
    @yield('content')
</main>

{{-- FOOTER --}}
<footer class="footer">
    <div class="container">
        <div class="footer-grid">

            <div>
                <div class="footer-logo">
                    <div class="footer-logo-icon"><i class="fa-solid fa-anchor"></i></div>
                    <div class="footer-logo-text">NAVEX<span>MAR</span></div>
                </div>
                <p class="footer-about-p">{{ __t(\App\Models\SiteSetting::get('about_short', 'Türk Boğazları ve Türkiye limanlarında 18 yıllık tecrübemizle armatör ve kiracılara 7/24 profesyonel gemi acenteliği hizmetleri sunuyoruz.'), 'Providing 24/7 professional shipping agency services for shipowners and charterers in the Turkish Straits and all ports of Turkey with 18 years of experience.') }}</p>
                <div class="footer-certs">
                    <span class="footer-cert">BIMCO {{ __t('Üyesi', 'Member') }}</span>
                    <span class="footer-cert">FONASBA</span>
                    <span class="footer-cert">ISO 9001:2015</span>
                    <span class="footer-cert">DTO {{ __t('Üyesi', 'Member') }}</span>
                </div>
            </div>

            <div class="footer-col">
                <h5>{{ __t('Hızlı Bağlantılar', 'Quick Links') }}</h5>
                <ul class="footer-nav">
                    <li><a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Ana Sayfa', 'Home') }}</a></li>
                    <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Hakkımızda', 'About Us') }}</a></li>
                    <li><a href="{{ route('services.index') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Hizmetlerimiz', 'Services') }}</a></li>
                    <li><a href="{{ route('straits-ports') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Boğazlar & Limanlar', 'Straits & Ports') }}</a></li>
                    <li><a href="{{ route('vessels.index') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Filomuz', 'Fleet') }}</a></li>
                    <li><a href="{{ route('news.index') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Haberler', 'News') }}</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('İletişim', 'Contact') }}</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>{{ __t('Hizmetlerimiz', 'Our Services') }}</h5>
                <ul class="footer-nav">
                    <li><a href="{{ route('services.show', 'turk-bogazlari-gecis-acenteligi') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Boğaz Transit Geçişi', 'Straits Transit Agency') }}</a></li>
                    <li><a href="{{ route('services.show', 'gemi-acenteligi-liman-hizmetleri') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Liman Acenteliği', 'Port Agency Services') }}</a></li>
                    <li><a href="{{ route('services.show', 'yakit-ve-kumanya-ikmali') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Bunkering & Kumanya', 'Bunkering & Provisions') }}</a></li>
                    <li><a href="{{ route('services.show', 'murettebat-degisimi-kara-lojistigi') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Mürettebat Değişimi', 'Crew Change Logistics') }}</a></li>
                    <li><a href="{{ route('services.show', 'yuk-ve-konteyner-operasyonlari') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Yük Operasyonları', 'Cargo Operations') }}</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>{{ __t('İletişim', 'Contact Us') }}</h5>
                <div class="f-contact"><i class="fa-solid fa-location-dot"></i><span>{{ \App\Models\SiteSetting::get('address', 'Marport Plaza K:8, Ambarlı Liman Yolu, Avcılar — İstanbul') }}</span></div>
                <div class="f-contact"><i class="fa-solid fa-phone"></i><span>{{ \App\Models\SiteSetting::get('phone', '+90 212 444 62 83') }}</span></div>
                <div class="f-contact"><i class="fa-solid fa-mobile-screen"></i><span>{{ __t('Acil', 'Emergency') }}: {{ \App\Models\SiteSetting::get('mobile', '+90 532 700 90 90') }}</span></div>
                <div class="f-contact"><i class="fa-solid fa-envelope"></i><span>{{ \App\Models\SiteSetting::get('email', 'ops@navexmar.com') }}</span></div>
                <div class="f-contact"><i class="fa-solid fa-tower-broadcast"></i><span>VHF Ch 16 / 12 / 11</span></div>
            </div>

        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} NAVEXMAR {{ __t('Denizcilik ve Liman Hizmetleri A.Ş. Tüm hakları saklıdır.', 'Maritime & Port Services Inc. All rights reserved.') }}</span>
            <a href="{{ route('admin.login') }}"><i class="fa-solid fa-lock"></i> {{ __t('Yönetim Paneli', 'Admin Panel') }}</a>
        </div>
    </div>
</footer>

<script>
    const ham = document.getElementById('navHam');
    const drawer = document.getElementById('mobDrawer');
    const overlay = document.getElementById('mobOverlay');
    const mobClose = document.getElementById('mobClose');
    function openMenu() { drawer.classList.add('open'); overlay.classList.add('open'); document.body.style.overflow='hidden'; }
    function closeMenu() { drawer.classList.remove('open'); overlay.classList.remove('open'); document.body.style.overflow=''; }
    ham?.addEventListener('click', openMenu);
    mobClose?.addEventListener('click', closeMenu);
    overlay?.addEventListener('click', closeMenu);
</script>

@yield('scripts')
</body>
</html>
