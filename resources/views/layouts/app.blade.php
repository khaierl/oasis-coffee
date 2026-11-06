<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', "Oasis' Coffee")</title>

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --ink:#32170d;
            --coffee:#472115;
            --tan:#d6b184;
            --cream:#fbf7f0;
            --line:#eadbc7;
            --muted:#7d6658;
        }

        * {
            box-sizing:border-box;
        }

        html {
            scroll-behavior:smooth;
        }

        body {
            margin:0;
            color:var(--ink);
            background:var(--cream);
            font-family:Arial, Helvetica, sans-serif;
            line-height:1.55;
        }

        h1,h2,h3,p {
            margin-top:0;
        }

        h1,h2,h3,.brand-name {
            font-family:Georgia, 'Times New Roman', serif;
        }

        a {
            color:inherit;
            text-decoration:none;
        }

        img {
            display:block;
            max-width:100%;
        }

        .shell {
            width:min(1180px, calc(100% - 40px));
            margin:auto;
        }

        /* =========================
           NAVBAR
        ========================= */

        .topbar {
            background:var(--ink);
            color:#fff;
            position:sticky;
            top:0;
            z-index:50;
            box-shadow:0 2px 14px #200b0540;
        }

        .navbar {
            min-height:76px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:22px;
        }

        .brand {
            display:flex;
            align-items:center;
            gap:10px;
            min-width:max-content;
        }

        .brand img {
            width:38px;
            height:38px;
            object-fit:contain;
            border-radius:50%;
        }

        .brand-name {
            font-size:18px;
            font-weight:700;
            letter-spacing:-.4px;
        }

        .brand small {
            display:block;
            color:#dbc1a3;
            font-size:7px;
            letter-spacing:1.65px;
            margin-top:-4px;
        }

        .navlinks {
            display:flex;
            align-items:center;
            gap:19px;
            font-size:11px;
            font-weight:700;
            text-transform:uppercase;
            letter-spacing:.25px;
        }

        .navlinks a {
            color:#fff8ef;
            opacity:.92;
        }

        .navlinks a:hover,
        .navlinks a.active {
            color:#e4bc8a;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn {
            display:inline-flex;
            justify-content:center;
            align-items:center;
            border:0;
            cursor:pointer;
            padding:12px 20px;
            border-radius:3px;
            font-weight:700;
            font-size:12px;
            transition:.2s ease;
        }

        .btn-tan {
            background:var(--tan);
            color:var(--ink);
        }

        .btn-tan:hover {
            background:#e8c89f;
            transform:translateY(-1px);
        }

        .btn-dark {
            background:var(--ink);
            color:#fff;
        }

        .btn-dark:hover {
            background:#61311e;
        }

        .btn-outline {
            border:1px solid #8a6550;
            color:var(--ink);
        }

        /* =========================
           GENERAL
        ========================= */

        .eyebrow {
            color:#b98959;
            letter-spacing:3px;
            font-size:10px;
            font-weight:700;
            text-transform:uppercase;
        }

        .section {
            padding:78px 0;
        }

        .section-title {
            font-size:42px;
            line-height:1.08;
            margin:8px 0 0;
        }

        .text-muted {
            color:var(--muted);
        }

        /* =========================
           PAGE HERO
        ========================= */

        .page-hero {
            background:var(--ink);
            color:#fff;
            padding:54px 0 48px;
        }

        .page-hero p {
            color:#d4ae81;
            margin-bottom:10px;
        }

        .page-hero h1 {
            margin:0;
            font-size:42px;
        }

        .page-hero .lead {
            max-width:585px;
            color:#f0e1d2;
            margin:14px 0 0;
            font-size:14px;
        }

        /* =========================
           HOME HERO
        ========================= */

        .hero {
            background:
                linear-gradient(
                    90deg,
                    #301408e8 0%,
                    #301408d8 51%,
                    #30140885 100%
                ),
                url('{{ asset('images/hero.jpg') }}') center/cover;

            min-height:510px;
            color:#fff;
            display:flex;
            align-items:center;
        }

        .hero-inner {
            width:min(1180px, calc(100% - 40px));
            margin:auto;
            padding:58px 0;
        }

        .hero-copy {
            max-width:570px;
        }

        .hero h1 {
            font-size:60px;
            line-height:1.02;
            margin:12px 0 16px;
        }

        .hero h1 em {
            color:#e0b37e;
            font-weight:inherit;
        }

        .hero p {
            color:#f2e4d6;
            max-width:500px;
            font-size:15px;
        }

        .hero-stats {
            display:grid;
            grid-template-columns:repeat(2, 1fr);
            gap:9px;
            margin-top:28px;
            max-width:430px;
        }

        .stat {
            border:1px solid #b1835f66;
            padding:16px;
            background:#3b1c10a6;
            border-radius:4px;
        }

        .stat strong {
            display:block;
            font:700 26px Georgia,serif;
            color:#e4bc8a;
        }

        .stat span {
            color:#f5e7da;
            font-size:10px;
        }

        /* =========================
           CARDS
        ========================= */

        .feature-head {
            display:flex;
            align-items:end;
            justify-content:space-between;
            gap:20px;
            margin-bottom:28px;
        }

        .text-link {
            font-size:13px;
            font-weight:700;
            color:#7a452c;
        }

        .text-link:hover {
            text-decoration:underline;
        }

        .cards {
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        }

        .card {
            background:#fff;
            border:1px solid #eee1d4;
            border-radius:5px;
            overflow:hidden;
            box-shadow:0 5px 16px #4823130e;
        }

        .card-img {
            width:100%;
            height:210px;
            object-fit:cover;
            background:#e6d8c6;
        }

        .card-body {
            padding:17px;
        }

        .tag {
            display:inline-block;
            color:#9b6e43;
            background:#f5e7d5;
            padding:3px 7px;
            border-radius:10px;
            font-size:9px;
            font-weight:700;
        }

        .card h3 {
            font-size:20px;
            margin:10px 0 5px;
        }

        .card p {
            font-size:12px;
            color:var(--muted);
            margin-bottom:12px;
        }

        .price {
            font-size:13px;
            font-weight:800;
        }

        .blank {
            border:1px dashed #c9ae90;
            padding:32px;
            border-radius:5px;
            color:var(--muted);
            text-align:center;
        }

        /* =========================
           CTA
        ========================= */

        .cta {
            background:#d5b080;
            text-align:center;
            padding:60px 20px;
        }

        .cta h2 {
            font-size:32px;
            margin-bottom:8px;
        }

        .cta p {
            color:#715241;
            font-size:13px;
            margin-bottom:22px;
        }

        /* =========================
           ABOUT
        ========================= */

        .two-col {
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:48px;
            align-items:center;
        }

        .about-photo {
            height:400px;
            width:100%;
            object-fit:cover;
            border-radius:5px;
            background:#dfcfbc;
        }

        .copy h2 {
            font-size:38px;
            line-height:1.1;
            margin:10px 0 18px;
        }

        .copy p {
            color:var(--muted);
            font-size:14px;
        }

        .info-grid {
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:16px;
        }

        .info-card {
            padding:22px;
            border-radius:5px;
            background:#fff;
            border:1px solid #eee1d4;
        }

        .info-card h3 {
            font-size:21px;
            margin:0 0 9px;
        }

        .info-card p {
            color:var(--muted);
            font-size:12px;
            margin:0;
        }

        /* =========================
           MENU
        ========================= */

        .filters {
            display:flex;
            gap:8px;
            flex-wrap:wrap;
            margin:25px 0;
        }

        .filter {
            padding:7px 13px;
            border-radius:16px;
            border:1px solid #d9c0a3;
            font-size:11px;
            background:#fffaf4;
        }

        .filter.active {
            background:var(--ink);
            color:#fff;
            border-color:var(--ink);
        }

        .menu-grid {
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        }

        /* =========================
           GALLERY
        ========================= */

        .gallery-grid {
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:14px;
        }

        .gallery-item {
            overflow:hidden;
            border-radius:4px;
            min-height:205px;
            position:relative;
            background:#ddcfbd;
        }

        .gallery-item img {
            width:100%;
            height:100%;
            min-height:205px;
            object-fit:cover;
            transition:.25s;
        }

        .gallery-item:hover img {
            transform:scale(1.04);
        }

        .gallery-label {
            position:absolute;
            bottom:0;
            left:0;
            right:0;
            padding:18px 14px 12px;
            color:#fff;
            background:linear-gradient(transparent,#1c0a04c9);
            font-size:13px;
            font-weight:700;
        }

        /* =========================
           TEAM
        ========================= */

        .team-grid {
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        }

        .member img {
            height:260px;
            width:100%;
            object-fit:cover;
            background:#e4d4c1;
        }

        .member .card-body {
            border-top:0;
        }

        .member h3 {
            margin:0;
            font-size:21px;
        }

        .member .role {
            color:#a16d43;
            font-size:11px;
            font-weight:700;
            margin:4px 0 9px;
        }

        /* =========================
           CONTACT
        ========================= */

        .contact-grid {
            display:grid;
            grid-template-columns:.9fr 1.1fr;
            gap:50px;
        }

        .contact-list {
            display:grid;
            gap:20px;
            margin-top:26px;
        }

        .contact-row {
            display:flex;
            gap:13px;
        }

        .contact-icon {
            width:34px;
            height:34px;
            display:grid;
            place-items:center;
            background:#f0dfcb;
            color:#6b3b25;
            border-radius:50%;
            font-size:14px;
            flex:none;
        }

        .contact-row strong {
            display:block;
            font-size:13px;
        }

        .contact-row span,
        .contact-row a {
            font-size:13px;
            color:var(--muted);
        }

        .form-card {
            padding:30px;
            background:#fff;
            border:1px solid #eddfd0;
            box-shadow:0 12px 32px #47211514;
            border-radius:5px;
        }

        .form-card h2 {
            font-size:28px;
            margin-bottom:6px;
        }

        .form-grid {
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:15px;
        }

        .field {
            display:grid;
            gap:6px;
        }

        .field.full {
            grid-column:1/-1;
        }

        .field label {
            font-weight:700;
            font-size:11px;
        }

        .field input,
        .field textarea {
            width:100%;
            border:1px solid #dbcab7;
            border-radius:3px;
            padding:11px 12px;
            background:#fffcf8;
            outline:0;
            font:inherit;
            font-size:13px;
        }

        .field textarea {
            min-height:125px;
            resize:vertical;
        }

        .field input:focus,
        .field textarea:focus {
            border-color:#9d6c47;
            box-shadow:0 0 0 3px #d9b4864d;
        }

        .alert {
            padding:12px 14px;
            border-radius:3px;
            margin:0 0 16px;
            font-size:13px;
        }

        .alert.success {
            background:#dcf5e4;
            color:#176538;
        }

        .alert.error {
            background:#fee2e2;
            color:#9b1c1c;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background:#1d0c06;
            color:#f7e9db;
        }

        .footer-grid {
            display:grid;
            grid-template-columns:1.6fr 1fr 1fr;
            gap:44px;
            padding:48px 0;
        }

        .footer-grid h3 {
            font-size:16px;
            margin:0 0 12px;
        }

        .footer-grid p,
        .footer-grid a {
            display:block;
            color:#cdb7a3;
            font-size:12px;
            margin:5px 0;
        }

        /* =========================
           SOCIAL ICONS
        ========================= */

       .socials {
            display:flex;
            gap:10px;
            margin-top:16px;
        }

        .socials a {
            width:38px;
            height:38px;
            display:flex;
            align-items:center;
            justify-content:center;
            border:1px solid #d3b18e;
            border-radius:50%;
            color:#8a5a3c;
            font-size:16px;
            margin:0;
            transition:.2s ease;
        }

        .socials a:hover {
            background:#d6b184;
            color:#32170d;
            border-color:#d6b184;
            transform:translateY(-2px);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width:820px) {

            .navlinks {
                gap:11px;
                flex-wrap:wrap;
                justify-content:flex-end;
                font-size:9px;
            }

            .navbar {
                padding:12px 0;
            }

            .navlinks .reserve {
                display:none;
            }

            .hero {
                min-height:460px;
            }

            .hero h1 {
                font-size:46px;
            }

            .cards,
            .menu-grid,
            .team-grid {
                grid-template-columns:repeat(2,1fr);
            }

            .two-col,
            .contact-grid {
                grid-template-columns:1fr;
                gap:28px;
            }

            .footer-grid {
                grid-template-columns:1fr 1fr;
            }

            .section {
                padding:56px 0;
            }
        }

        @media (max-width:540px) {

            .shell,
            .hero-inner {
                width:min(100% - 28px, 1180px);
            }

            .brand-name {
                font-size:15px;
            }

            .navlinks {
                display:none;
            }

            .hero h1 {
                font-size:39px;
            }

            .section-title,
            .page-hero h1 {
                font-size:34px;
            }

            .cards,
            .menu-grid,
            .gallery-grid,
            .team-grid,
            .info-grid,
            .footer-grid,
            .form-grid {
                grid-template-columns:1fr;
            }

            .feature-head {
                align-items:start;
                flex-direction:column;
            }

            .hero-stats {
                max-width:100%;
            }

            .page-hero {
                padding:42px 0;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
         NAVBAR
    ========================= --}}

    <nav class="topbar">
        <div class="shell navbar">

            <a href="{{ route('home') }}" class="brand">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Oasis' Coffee logo"
                >

                <span class="brand-name">
                    Oasis' Coffee
                    <small>EST. 2026 · JAKARTA SELATAN</small>
                </span>

            </a>

            <div class="navlinks">

                <a
                    class="{{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}"
                >
                    Home
                </a>

                <a
                    class="{{ request()->routeIs('about') ? 'active' : '' }}"
                    href="{{ route('about') }}"
                >
                    About
                </a>

                <a
                    class="{{ request()->routeIs('menu') ? 'active' : '' }}"
                    href="{{ route('menu') }}"
                >
                    Menu
                </a>

                <a
                    class="{{ request()->routeIs('gallery') ? 'active' : '' }}"
                    href="{{ route('gallery') }}"
                >
                    Gallery
                </a>

                <a
                    class="{{ request()->routeIs('team') ? 'active' : '' }}"
                    href="{{ route('team') }}"
                >
                    Team
                </a>

                <a
                    class="{{ request()->routeIs('contact*') ? 'active' : '' }}"
                    href="{{ route('contact') }}"
                >
                    Contact
                </a>

                <a
                    class="btn btn-tan reserve"
                    href="{{ route('contact') }}"
                >
                    Reserve a Seat
                </a>

            </div>

        </div>
    </nav>


    {{-- =========================
         ISI HALAMAN
    ========================= --}}

    @yield('content')


    {{-- =========================
         FOOTER
    ========================= --}}

    <footer>

        <div class="shell footer-grid">

            {{-- BRAND --}}
            <div>

                <h3>Oasis' Coffee</h3>

                <p>
                    A sanctuary for those who believe a great cup of coffee
                    is the start of every good story.
                </p>

                {{-- SOCIAL MEDIA --}}
                <div class="socials">

                    {{-- INSTAGRAM --}}
                    <a
                        href="{{ $contact->instagram ?? '#' }}"
                        target="_blank"
                        rel="noopener"
                        title="Instagram"
                    >
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    {{-- TIKTOK --}}
                    <a
                        href="{{ $contact->tiktok ?? '#' }}"
                        target="_blank"
                        rel="noopener"
                        title="TikTok"
                    >
                        <i class="fa-brands fa-tiktok"></i>
                    </a>

                    {{-- WHATSAPP --}}
                    <a
                        href="{{ isset($contact) && $contact->whatsapp
                            ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $contact->whatsapp)
                            : '#' }}"
                        target="_blank"
                        rel="noopener"
                        title="WhatsApp"
                    >
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                </div>

            </div>


            {{-- NAVIGATE --}}
            <div>

                <h3>Navigate</h3>

                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('menu') }}">Menu</a>
                <a href="{{ route('gallery') }}">Gallery</a>
                <a href="{{ route('team') }}">Team</a>
                <a href="{{ route('contact') }}">Contact</a>

            </div>


            {{-- HOURS --}}
            <div>

                <h3>Hours</h3>

                <p>
                    Monday - Friday<br>
                    07:00 - 22:00
                </p>

                <p>
                    Saturday - Sunday<br>
                    08:00 - 23:00
                </p>

            </div>

        </div>


        <div class="shell copyright">
            © {{ date('Y') }} Oasis' Coffee · Jakarta Selatan · All rights reserved
        </div>

    </footer>

</body>
</html>