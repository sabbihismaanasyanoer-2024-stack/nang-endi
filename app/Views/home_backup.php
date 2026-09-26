<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NANG ENDI? — Surabaya City Guide</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background: #e9dfcf;
            color: #241b15;
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* =========================================
           NAVBAR
        ========================================= */

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 82px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;

            color: white;

            transition:
                background .4s ease,
                color .4s ease,
                box-shadow .4s ease;
        }

        .navbar.scrolled {
            background: rgba(233, 223, 207, .94);
            color: #241b15;
            backdrop-filter: blur(12px);
            box-shadow: 0 1px 0 rgba(36, 27, 21, .15);
        }

        .logo {
            font-family: "Space Grotesk", sans-serif;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .logo span {
            font-weight: 400;
        }

        .nav-menu {
            display: flex;
            gap: 38px;
            list-style: none;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .nav-menu a {
            position: relative;
        }

        .nav-menu a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -7px;
            width: 0;
            height: 1px;
            background: currentColor;
            transition: width .3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        /* =========================================
           HERO
        ========================================= */

        .hero {
            min-height: 100vh;
            position: relative;
            isolation: isolate;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            padding: 0 7% 100px;
            color: white;
            isolation: isolate;
        }

        .hero-bg {
            position: absolute;
            inset: -12%;
            z-index: -3;

            background-image:
                url("/assets/images/hero-surabaya.jpg");

            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;

            transform: translate3d(0, 0, 0) scale(1.12);
            will-change: transform;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            z-index: -2;
            pointer-events: none;

            background:
                linear-gradient(
                    180deg,
                    rgba(25, 17, 11, .55) 0%,
                    rgba(25, 17, 11, .18) 42%,
                    rgba(25, 17, 11, .82) 100%
                );
        }

        .hero-content {
            max-width: 900px;
            position: relative;
            z-index: 2;
        }

        .eyebrow {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .hero-title {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(80px, 13vw, 190px);
            line-height: .78;
            letter-spacing: -9px;
            font-weight: 700;
            margin-bottom: 42px;
        }

        .hero-title em {
            font-style: italic;
            font-weight: 400;
        }

        .hero-description {
            max-width: 460px;
            font-size: 17px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;
            gap: 18px;
            background: #241b15;
            color: white;
            padding: 16px 22px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            transition: .3s ease;
        }

        .hero-button:hover {
            background: #5a3d28;
            transform: translateY(-3px);
        }

        .scroll-label {
            position: absolute;
            right: 7%;
            bottom: 40px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            writing-mode: vertical-rl;
        }

        /* =========================================
           INTRO STRIP
        ========================================= */

        .intro-strip {
            background: #c6a982;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-bottom: 1px solid #241b15;
        }

        .intro-item {
            padding: 32px 30px;
            border-right: 1px solid rgba(36, 27, 21, .3);
        }

        .intro-item:last-child {
            border-right: none;
        }

        .intro-number {
            font-family: "Space Grotesk", sans-serif;
            font-size: 14px;
            margin-bottom: 14px;
        }

        .intro-item h3 {
            font-family: "Space Grotesk", sans-serif;
            font-size: 19px;
            margin-bottom: 8px;
        }

        .intro-item p {
            font-size: 13px;
            line-height: 1.5;
            opacity: .75;
        }

        /* =========================================
           GENERAL SECTION
        ========================================= */

        .section {
            padding: 110px 7%;
            border-bottom: 1px solid #241b15;
        }

        .section-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 45px;
        }

        .section-title {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(55px, 8vw, 110px);
            line-height: .82;
            letter-spacing: -5px;
        }

        .section-subtitle {
            max-width: 300px;
            font-size: 14px;
            line-height: 1.6;
        }

        .view-all {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 1px solid currentColor;
            padding-bottom: 5px;
        }

        /* =========================================
           EVENTS
        ========================================= */

        .event-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .event-card {
            min-height: 430px;
            background: #f3ecdf;
            border: 1px solid #241b15;
            display: flex;
            flex-direction: column;
            transition: transform .35s ease;
            overflow: hidden;
        }

        .event-card:hover {
            transform: translateY(-8px);
        }

        .event-image {
            height: 210px;
            background: #9c8062;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 55px;
        }

        .event-content {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .event-category {
            font-size: 10px;
            letter-spacing: 2px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .event-title {
            font-family: "Space Grotesk", sans-serif;
            font-size: 25px;
            line-height: 1;
            margin-bottom: auto;
        }

        .event-info {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid rgba(36,27,21,.3);
            font-size: 12px;
            line-height: 1.7;
        }

        /* =========================================
           PLACES
        ========================================= */

        .places-section {
            background: #2d2119;
            color: #f2e8d7;
        }

        .places-section .section-heading {
            border-bottom: 1px solid rgba(242,232,215,.3);
            padding-bottom: 35px;
        }

        .place-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .place-card {
            min-height: 370px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(242,232,215,.4);
            display: flex;
            align-items: flex-end;
            padding: 30px;
            background: #604936;
            transition: transform .35s ease;
        }

        .place-card:hover {
            transform: scale(.985);
        }

        .place-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    180deg,
                    transparent 30%,
                    rgba(0,0,0,.75) 100%
                );
        }

        .place-card-content {
            position: relative;
            z-index: 2;
        }

        .place-card h3 {
            font-family: "Space Grotesk", sans-serif;
            font-size: 38px;
            line-height: .95;
            margin-bottom: 12px;
        }

        .place-card p {
            font-size: 13px;
            max-width: 300px;
            opacity: .8;
        }

        /* =========================================
           MAP
        ========================================= */

        .map-section {
            min-height: 650px;
            position: relative;
            overflow: hidden;
            background: #d8c8ad;
        }

        .map-content {
            position: relative;
            z-index: 3;
            max-width: 450px;
        }

        .map-title {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(60px, 8vw, 110px);
            line-height: .8;
            letter-spacing: -5px;
            margin-bottom: 30px;
        }

        .map-description {
            max-width: 350px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .map-background {
            position: absolute;
            right: -5%;
            top: 5%;
            width: 65%;
            height: 90%;
            opacity: .45;
            background:
                repeating-linear-gradient(
                    25deg,
                    transparent 0,
                    transparent 45px,
                    rgba(36,27,21,.15) 46px,
                    transparent 47px
                ),
                repeating-linear-gradient(
                    115deg,
                    transparent 0,
                    transparent 70px,
                    rgba(36,27,21,.15) 71px,
                    transparent 72px
                );
            transform: rotate(-8deg);
        }

        .map-pin {
            position: absolute;
            z-index: 4;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #6b4429;
            border: 3px solid #f0e5d2;
            box-shadow: 0 0 0 5px rgba(107,68,41,.2);
        }

        .pin-one {
            right: 35%;
            top: 32%;
        }

        .pin-two {
            right: 48%;
            top: 58%;
        }

        .pin-three {
            right: 24%;
            top: 63%;
        }

        /* =========================================
           CTA
        ========================================= */

        .cta {
            padding: 140px 7%;
            background: #c5a37a;
            text-align: center;
        }

        .cta h2 {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(60px, 10vw, 140px);
            line-height: .8;
            letter-spacing: -6px;
            margin-bottom: 35px;
        }

        .cta p {
            max-width: 500px;
            margin: 0 auto 35px;
            line-height: 1.6;
        }

        /* =========================================
           FOOTER
        ========================================= */

        footer {
            background: #241b15;
            color: #e9dfcf;
            padding: 70px 7% 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 50px;
            padding-bottom: 70px;
        }

        .footer-logo {
            font-family: "Space Grotesk", sans-serif;
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .footer-description {
            max-width: 280px;
            font-size: 13px;
            line-height: 1.6;
            opacity: .65;
        }

        .footer-column h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .footer-column a {
            display: block;
            font-size: 13px;
            margin-bottom: 10px;
            opacity: .65;
        }

        .footer-column a:hover {
            opacity: 1;
        }

        .copyright {
            border-top: 1px solid rgba(233,223,207,.2);
            padding-top: 25px;
            font-size: 11px;
            opacity: .5;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 900px) {

            .nav-menu {
                gap: 15px;
            }

            .hero-title {
                letter-spacing: -5px;
            }

            .intro-strip {
                grid-template-columns: repeat(2, 1fr);
            }

            .intro-item:nth-child(2) {
                border-right: none;
            }

            .event-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 0 5%;
            }

            .nav-menu {
                display: none;
            }

            .hero {
                padding: 0 5% 70px;
            }

            .hero-title {
                font-size: 75px;
                letter-spacing: -5px;
            }

            .section {
                padding: 80px 5%;
            }

            .section-heading {
                display: block;
            }

            .section-subtitle {
                margin-top: 25px;
            }

            .event-grid,
            .place-grid {
                grid-template-columns: 1fr;
            }

            .intro-strip {
                grid-template-columns: 1fr;
            }

            .intro-item {
                border-right: none;
                border-bottom: 1px solid rgba(36,27,21,.3);
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .map-background {
                width: 100%;
                right: -20%;
            }
        }

    </style>
</head>

<body>

<!-- =========================================
     NAVBAR
========================================= -->

<nav class="navbar" id="navbar">

    <a href="/" class="logo">
        NANG ENDI?<span> — Surabaya City Guide</span>
    </a>

    <ul class="nav-menu">
        <li><a href="#home">Home</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="#places">Places</a></li>
        <li><a href="#map">Map</a></li>
    </ul>

</nav>


<!-- =========================================
     HERO
========================================= -->

<section class="hero" id="home">

    <div class="hero-bg" id="heroBg"></div>

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <div class="eyebrow">
            Discover Surabaya Differently
        </div>

        <h1 class="hero-title">
            NANG<br>
            <em>ENDI?</em>
        </h1>

        <p class="hero-description">
            Tempat buat cari tahu ada apa di Surabaya.
            Event, tempat nongkrong, ruang kreatif,
            sampai hidden gems — semuanya di satu tempat.
        </p>

        <a href="#events" class="hero-button">
            Explore Surabaya
            <span>→</span>
        </a>

    </div>

    <div class="scroll-label">
        Scroll to explore ↓
    </div>

</section>


<!-- =========================================
     QUICK INFO
========================================= -->

<section class="intro-strip">

    <div class="intro-item">
        <div class="intro-number">01</div>
        <h3>Event Terbaru</h3>
        <p>
            Temukan event seru yang sedang
            dan akan berlangsung di Surabaya.
        </p>
    </div>

    <div class="intro-item">
        <div class="intro-number">02</div>
        <h3>Tempat Terbaik</h3>
        <p>
            Rekomendasi tempat menarik
            dari yang populer sampai hidden gems.
        </p>
    </div>

    <div class="intro-item">
        <div class="intro-number">03</div>
        <h3>Surabaya on Map</h3>
        <p>
            Jelajahi event dan tempat
            melalui peta interaktif.
        </p>
    </div>

    <div class="intro-item">
        <div class="intro-number">04</div>
        <h3>Local Community</h3>
        <p>
            Ruang untuk menemukan,
            berbagi, dan ikut meramaikan Surabaya.
        </p>
    </div>

</section>


<!-- =========================================
     EVENTS
========================================= -->

<section class="section" id="events">

    <div class="section-heading">

        <div>
            <h2 class="section-title">
                WHAT'S<br>
                HAPPENING?
            </h2>
        </div>

        <div class="section-subtitle">
            <p>
                Event yang sedang dan akan
                happening di Surabaya.
            </p>

            <br>

            <a href="/events" class="view-all">
                See all events →
            </a>
        </div>

    </div>


    <div class="event-grid">

        <?php if (!empty($events)): ?>

            <?php foreach (array_slice($events, 0, 4) as $event): ?>

                <a
                    href="/events/<?= esc($event['slug']) ?>"
                    class="event-card"
                >

                    <div class="event-image">
                        <?php if (!empty($event['image'])): ?>

                            <img
                                src="<?= esc($event['image']) ?>"
                                alt="<?= esc($event['title']) ?>"
                                style="
                                    width:100%;
                                    height:100%;
                                    object-fit:cover;
                                "
                            >

                        <?php else: ?>

                            ✦

                        <?php endif; ?>
                    </div>

                    <div class="event-content">

                        <div class="event-category">
                            EVENT
                        </div>

                        <h3 class="event-title">
                            <?= esc($event['title']) ?>
                        </h3>

                        <div class="event-info">

                            <?php if (!empty($event['date_start'])): ?>
                                📅
                                <?= date('d M Y', strtotime($event['date_start'])) ?>
                                <br>
                            <?php endif; ?>

                            <?php if (!empty($event['location'])): ?>
                                📍
                                <?= esc($event['location']) ?>
                            <?php endif; ?>

                        </div>

                    </div>

                </a>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="event-card">
                <div class="event-image">✦</div>
                <div class="event-content">
                    <div class="event-category">EVENT</div>
                    <h3 class="event-title">
                        Belum ada event
                    </h3>
                </div>
            </div>

        <?php endif; ?>

    </div>

</section>


<!-- =========================================
     PLACES
========================================= -->

<section class="section places-section" id="places">

    <div class="section-heading">

        <h2 class="section-title">
            EXPLORE<br>
            PLACES
        </h2>

        <div class="section-subtitle">
            Temukan tempat-tempat menarik
            dari yang hits sampai tersembunyi.
            <br><br>

            <a href="/places" class="view-all">
                See all places →
            </a>
        </div>

    </div>


    <div class="place-grid">

        <a href="/places" class="place-card">

            <div class="place-card-content">

                <h3>
                    Café &<br>
                    Coffee
                </h3>

                <p>
                    Tempat nyaman buat nongkrong,
                    kerja, atau sekadar menikmati kopi.
                </p>

            </div>

        </a>


        <a href="/places" class="place-card">

            <div class="place-card-content">

                <h3>
                    Heritage<br>
                    & Culture
                </h3>

                <p>
                    Jelajahi sejarah dan budaya
                    Kota Pahlawan.
                </p>

            </div>

        </a>


        <a href="/places" class="place-card">

            <div class="place-card-content">

                <h3>
                    Creative<br>
                    Space
                </h3>

                <p>
                    Ruang kreatif untuk berkarya
                    dan berkolaborasi.
                </p>

            </div>

        </a>


        <a href="/places" class="place-card">

            <div class="place-card-content">

                <h3>
                    Hidden<br>
                    Gems
                </h3>

                <p>
                    Tempat-tempat kecil yang
                    mungkin belum pernah kamu tahu.
                </p>

            </div>

        </a>

    </div>

</section>


<!-- =========================================
     MAP
========================================= -->

<section class="section map-section" id="map">

    <div class="map-background"></div>

    <div class="map-pin pin-one"></div>
    <div class="map-pin pin-two"></div>
    <div class="map-pin pin-three"></div>

    <div class="map-content">

        <h2 class="map-title">
            SURABAYA<br>
            ON MAP
        </h2>

        <p class="map-description">
            Lihat event dan tempat menarik
            di Surabaya dalam satu peta.
            Cari tahu apa yang ada di sekitar kamu.
        </p>

        <a href="/map" class="hero-button">
            Open Map →
        </a>

    </div>

</section>


<!-- =========================================
     CTA
========================================= -->

<section class="cta">

    <h2>
        NANG<br>
        ENDI?
    </h2>

    <p>
        Karena Surabaya bukan cuma tempat
        yang kamu lewati. Ada banyak hal
        yang bisa kamu temukan.
    </p>

    <a href="#events" class="hero-button">
        Start Exploring →
    </a>

</section>


<!-- =========================================
     FOOTER
========================================= -->

<footer>

    <div class="footer-grid">

        <div>

            <div class="footer-logo">
                NANG ENDI?
            </div>

            <p class="footer-description">
                Surabaya City Guide untuk menemukan
                event, tempat, dan cerita menarik
                di Kota Pahlawan.
            </p>

        </div>


        <div class="footer-column">

            <h4>Explore</h4>

            <a href="/events">Events</a>
            <a href="/places">Places</a>
            <a href="/map">Map</a>

        </div>


        <div class="footer-column">

            <h4>About</h4>

            <a href="#">Tentang Kami</a>
            <a href="#">Kontak</a>
            <a href="#">Community</a>

        </div>


        <div class="footer-column">

            <h4>Follow</h4>

            <a href="#">Instagram</a>
            <a href="#">TikTok</a>
            <a href="#">X / Twitter</a>

        </div>

    </div>


    <div class="copyright">
        © 2026 NANG ENDI? — Surabaya City Guide
    </div>

</footer>


<!-- =========================================
     PARALLAX SCRIPT
========================================= -->

<script>

    const heroBg = document.getElementById("heroBg");
    const navbar = document.getElementById("navbar");

    let ticking = false;

    function updatePageOnScroll() {
        const scrollY = window.scrollY || window.pageYOffset;

        /*
         * Efek parallax:
         * background bergerak lebih lambat daripada isi halaman.
         * Hero hanya bergerak selama area hero masih terlihat.
         */
        if (heroBg) {
            const heroHeight = document.querySelector(".hero")?.offsetHeight || window.innerHeight;
            const parallaxY = Math.min(scrollY * 0.22, heroHeight * 0.22);

            heroBg.style.transform =
                `translate3d(0, ${parallaxY}px, 0) scale(1.12)`;
        }

        /*
         * Navbar berubah ketika mulai scroll.
         */
        if (navbar) {
            navbar.classList.toggle("scrolled", scrollY > 60);
        }

        ticking = false;
    }

    window.addEventListener("scroll", () => {
        if (!ticking) {
            window.requestAnimationFrame(updatePageOnScroll);
            ticking = true;
        }
    }, { passive: true });

    updatePageOnScroll();

</script>

</body>
</html>