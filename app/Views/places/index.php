<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Explore Places — NANG ENDI?</title>


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

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f1ede5;

            color: #171717;

            overflow-x: hidden;
        }


        a {
            color: inherit;
            text-decoration: none;
        }


        /* ==================================================
           BACKGROUND GRID
        ================================================== */

        body::before {

            content: "";

            position: fixed;

            inset: 0;

            z-index: -5;

            background-image:

                linear-gradient(
                    rgba(23,23,23,.045) 1px,
                    transparent 1px
                ),

                linear-gradient(
                    90deg,
                    rgba(23,23,23,.045) 1px,
                    transparent 1px
                );

            background-size:
                42px 42px;

            pointer-events: none;
        }


        body::after {

            content: "";

            position: fixed;

            width: 650px;
            height: 650px;

            right: -280px;
            top: 180px;

            border:
                1px solid
                rgba(23,23,23,.07);

            border-radius: 50%;

            box-shadow:

                0 0 0 70px
                rgba(23,23,23,.025),

                0 0 0 140px
                rgba(23,23,23,.018),

                0 0 0 210px
                rgba(23,23,23,.012);

            z-index: -4;

            pointer-events: none;
        }


        /* ==================================================
           NAVBAR
        ================================================== */

        nav {

            height: 80px;

            padding:
                0 7%;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom:
                1px solid #171717;

            background:
                rgba(241,237,229,.92);

            backdrop-filter:
                blur(10px);

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .logo {

            font-size: 28px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .nav-menu {

            display: flex;

            gap: 30px;

            list-style: none;

            font-size: 12px;

            font-weight: 800;

            text-transform: uppercase;
        }


        .nav-menu a {

            padding-bottom: 5px;

            border-bottom:
                1px solid transparent;

            transition: .2s ease;
        }


        .nav-menu a:hover {

            border-bottom-color:
                #171717;
        }


        /* ==================================================
           PAGE
        ================================================== */

        .page {

            max-width: 1200px;

            margin: auto;

            padding:
                75px 7% 100px;
        }


        /* ==================================================
           HERO
        ================================================== */

        .hero {

            position: relative;

            min-height: 430px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            border-bottom:
                1px solid #171717;

            overflow: hidden;
        }


        .hero::before {

            content: "SURABAYA";

            position: absolute;

            right: -20px;

            top: 20px;

            font-size:
                clamp(
                    100px,
                    17vw,
                    220px
                );

            font-weight: 900;

            letter-spacing: -12px;

            color:
                rgba(23,23,23,.035);

            pointer-events: none;
        }


        .hero::after {

            content: "";

            position: absolute;

            right: 7%;

            bottom: 55px;

            width: 130px;

            height: 130px;

            border:
                1px solid
                rgba(23,23,23,.25);

            border-radius: 50%;

            box-shadow:

                0 0 0 20px
                rgba(23,23,23,.035),

                0 0 0 40px
                rgba(23,23,23,.025);
        }


        .eyebrow {

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 2px;

            margin-bottom: 20px;

            position: relative;

            z-index: 2;
        }


        h1 {

            font-size:
                clamp(
                    65px,
                    9vw,
                    112px
                );

            line-height: .82;

            letter-spacing: -7px;

            margin-bottom: 30px;

            position: relative;

            z-index: 2;
        }


        .intro {

            max-width: 620px;

            font-size: 15px;

            line-height: 1.7;

            position: relative;

            z-index: 2;
        }


        /* ==================================================
           HERO MINI META
        ================================================== */

        .hero-meta {

            position: absolute;

            right: 0;

            bottom: 38px;

            display: flex;

            align-items: center;

            gap: 12px;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .hero-dot {

            width: 8px;

            height: 8px;

            border-radius: 50%;

            background: #171717;

            box-shadow:
                0 0 0 5px
                rgba(23,23,23,.08);
        }


        /* ==================================================
           CATEGORY GRID
        ================================================== */

        .places-grid {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 18px;

            margin-top: 28px;
        }


        /* ==================================================
           PLACE CARD
        ================================================== */

        .place-card {

            min-height: 500px;

            padding: 38px;

            border:
                1px solid #171717;

            display: flex;

            flex-direction: column;

            justify-content: flex-end;

            position: relative;

            overflow: hidden;

            isolation: isolate;

            transition:
                transform .35s ease,
                box-shadow .35s ease;
        }


        .place-card:hover {

            transform:
                translateY(-8px);

            box-shadow:
                10px 10px 0
                #171717;
        }


        .place-card::before {

            content: "";

            position: absolute;

            width: 270px;
            height: 270px;

            border-radius: 50%;

            right: -100px;
            top: -100px;

            border:
                1px solid
                rgba(23,23,23,.35);

            box-shadow:

                0 0 0 25px
                rgba(23,23,23,.04),

                0 0 0 55px
                rgba(23,23,23,.035),

                0 0 0 85px
                rgba(23,23,23,.025);

            z-index: -1;

            transition:
                transform .5s ease;
        }


        .place-card:hover::before {

            transform:
                rotate(18deg)
                scale(1.08);
        }


        .place-card::after {

            content: "";

            position: absolute;

            left: 0;
            right: 0;

            bottom: 0;

            height: 42%;

            background:
                linear-gradient(
                    transparent,
                    rgba(0,0,0,.12)
                );

            z-index: -1;

            pointer-events: none;
        }


        /* ==================================================
           CAFE CARD
        ================================================== */

        .place-card.cafe {

            background:

                radial-gradient(
                    circle at 80% 20%,
                    rgba(255,255,255,.25),
                    transparent 30%
                ),

                linear-gradient(
                    145deg,
                    #d8bd98,
                    #a98663
                );

            color: #171717;
        }


        .place-card.cafe::before {

            border-color:
                rgba(255,255,255,.35);
        }


        /* ==================================================
           HERITAGE CARD
        ================================================== */

        .place-card.heritage {

            background:

                radial-gradient(
                    circle at 80% 20%,
                    rgba(255,255,255,.2),
                    transparent 30%
                ),

                linear-gradient(
                    145deg,
                    #30241d,
                    #17120f
                );

            color: #f5eee3;
        }


        .place-card.heritage::before {

            border-color:
                rgba(245,238,227,.25);
        }


        .place-card.heritage::after {

            background:
                linear-gradient(
                    transparent,
                    rgba(0,0,0,.4)
                );
        }


        /* ==================================================
           CARD NUMBER
        ================================================== */

        .place-number {

            position: absolute;

            top: 25px;

            left: 30px;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: 2px;

            padding-bottom: 8px;

            border-bottom:
                1px solid currentColor;

            opacity: .85;
        }


        .place-index {

            position: absolute;

            top: 25px;

            right: 30px;

            font-size: 55px;

            line-height: 1;

            font-weight: 900;

            letter-spacing: -5px;

            opacity: .08;
        }


        /* ==================================================
           CARD CONTENT
        ================================================== */

        .place-card .eyebrow {

            margin-bottom: 15px;

            font-size: 9px;
        }


        .place-card h2 {

            font-size:
                clamp(
                    43px,
                    5vw,
                    68px
                );

            line-height: .85;

            letter-spacing: -5px;

            margin-bottom: 20px;
        }


        .place-card p {

            max-width: 440px;

            font-size: 13px;

            line-height: 1.7;

            margin-bottom: 25px;
        }


        /* ==================================================
           TAGS
        ================================================== */

        .tags {

            display: flex;

            flex-wrap: wrap;

            gap: 7px;

            margin-bottom: 28px;
        }


        .tag {

            padding:
                7px 10px;

            border:
                1px solid currentColor;

            font-size: 8px;

            font-weight: 900;

            letter-spacing: 1px;

            text-transform: uppercase;

            background:
                rgba(255,255,255,.04);
        }


        /* ==================================================
           BUTTON
        ================================================== */

        .button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: fit-content;

            min-width: 160px;

            padding:
                13px 18px;

            border:
                1px solid currentColor;

            background:
                #171717;

            color:
                #f5f3ee;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 1px;

            transition: .25s ease;
        }


        .button:hover {

            background:
                transparent;

            color:
                currentColor;
        }


        .heritage .button {

            background:
                #f5eee3;

            color:
                #171717;
        }


        .heritage .button:hover {

            background:
                transparent;

            color:
                #f5eee3;
        }


        /* ==================================================
           CATEGORY FOOTNOTE
        ================================================== */

        .category-note {

            margin-top: 18px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;

            opacity: .65;
        }


        /* ==================================================
           MAP INTRO
        ================================================== */

        .map-section {

            margin-top: 90px;

            padding:
                55px;

            background:

                radial-gradient(
                    circle at 85% 15%,
                    rgba(255,255,255,.08),
                    transparent 20%
                ),

                linear-gradient(
                    135deg,
                    #34251c,
                    #1c1511
                );

            color:
                #f2e8d7;

            border:
                1px solid #171717;

            display: flex;

            justify-content:
                space-between;

            align-items:
                flex-end;

            gap: 40px;

            position: relative;

            overflow: hidden;
        }


        .map-section::before {

            content: "";

            position: absolute;

            width: 420px;

            height: 420px;

            right: -120px;

            bottom: -250px;

            border:
                1px solid
                rgba(242,232,215,.18);

            border-radius: 50%;

            box-shadow:

                0 0 0 45px
                rgba(242,232,215,.04),

                0 0 0 90px
                rgba(242,232,215,.03),

                0 0 0 135px
                rgba(242,232,215,.02);
        }


        .map-section::after {

            content:
                "SURABAYA / MAP";

            position: absolute;

            top: 25px;

            right: 30px;

            font-size: 8px;

            font-weight: 900;

            letter-spacing: 2px;

            opacity: .5;
        }


        .map-section > div {

            position: relative;

            z-index: 2;
        }


        .map-section h2 {

            font-size:
                clamp(
                    45px,
                    6vw,
                    75px
                );

            line-height: .85;

            letter-spacing: -5px;

            margin-bottom: 20px;
        }


        .map-section p {

            max-width: 500px;

            font-size: 14px;

            line-height: 1.7;

            opacity: .8;
        }


        .map-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 190px;

            padding:
                16px 22px;

            background:
                #f2e8d7;

            color:
                #171717;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: 1px;

            white-space: nowrap;

            position: relative;

            z-index: 2;

            transition: .25s ease;
        }


        .map-button:hover {

            background:
                #c7aa83;

            transform:
                translateY(-3px);
        }


        /* ==================================================
           INFO
        ================================================== */

        .info-section {

            margin-top: 80px;

            padding-top: 35px;

            border-top:
                1px solid #171717;

            display: grid;

            grid-template-columns:
                1fr 1fr 1fr;

            gap: 30px;
        }


        .info-item {

            padding-right: 25px;

            border-right:
                1px solid #c7c2ba;

            position: relative;
        }


        .info-item:last-child {

            border-right: none;
        }


        .info-number {

            font-size: 10px;

            font-weight: 900;

            letter-spacing: 2px;

            margin-bottom: 15px;

            display: inline-flex;

            align-items: center;

            gap: 7px;
        }


        .info-number::before {

            content: "";

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background:
                #171717;
        }


        .info-item h3 {

            font-size: 21px;

            letter-spacing: -.5px;

            margin-bottom: 10px;
        }


        .info-item p {

            font-size: 13px;

            line-height: 1.6;

            color:
                #625c54;
        }


        /* ==================================================
           FOOTER
        ================================================== */

        footer {

            padding:
                70px 7%;

            background:
                #171717;

            color:
                #f5f3ee;

            position: relative;

            overflow: hidden;
        }


        footer::after {

            content: "?";

            position: absolute;

            right: 5%;

            top: -70px;

            font-size: 250px;

            font-weight: 900;

            line-height: 1;

            color:
                rgba(255,255,255,.035);
        }


        footer h2 {

            font-size:
                clamp(
                    45px,
                    7vw,
                    75px
                );

            letter-spacing: -5px;

            margin-bottom: 8px;

            position: relative;

            z-index: 2;
        }


        footer p {

            font-size: 13px;

            color:
                #aaa39a;

            position: relative;

            z-index: 2;
        }


        /* ==================================================
           MOBILE
        ================================================== */

        @media (max-width: 800px) {


            nav {

                height: 68px;

                padding:
                    0 5%;
            }


            .logo {

                font-size: 22px;
            }


            .nav-menu {

                gap: 15px;

                font-size: 9px;
            }


            .page {

                padding:
                    55px 5% 75px;
            }


            .hero {

                min-height: 400px;
            }


            .hero::before {

                font-size: 100px;

                right: -30px;

                top: 45px;
            }


            .hero::after {

                width: 90px;

                height: 90px;

                right: 10px;

                bottom: 45px;
            }


            h1 {

                font-size:
                    clamp(
                        62px,
                        17vw,
                        100px
                    );

                letter-spacing: -5px;
            }


            .intro {

                max-width: 100%;

                font-size: 14px;
            }


            .hero-meta {

                display: none;
            }


            .places-grid {

                grid-template-columns:
                    1fr;

                gap: 15px;
            }


            .place-card {

                min-height: 440px;

                padding: 28px;
            }


            .place-card h2 {

                font-size:
                    clamp(
                        48px,
                        14vw,
                        68px
                    );
            }


            .place-index {

                font-size: 45px;
            }


            .map-section {

                display: block;

                padding: 35px 28px;
            }


            .map-section h2 {

                font-size:
                    clamp(
                        50px,
                        14vw,
                        70px
                    );
            }


            .map-button {

                display: inline-flex;

                margin-top: 28px;
            }


            .info-section {

                grid-template-columns:
                    1fr;

                gap: 0;
            }


            .info-item {

                border-right: none;

                border-bottom:
                    1px solid #c7c2ba;

                padding:
                    25px 0;
            }


            .info-item:first-child {

                padding-top: 0;
            }


            .info-item:last-child {

                border-bottom: none;
            }


            footer {

                padding:
                    55px 5%;
            }

        }


        /* ==================================================
           SMALL MOBILE
        ================================================== */

        @media (max-width: 500px) {


            .nav-menu {

                gap: 10px;

                font-size: 8px;
            }


            .logo {

                font-size: 19px;
            }


            .page {

                padding-top: 45px;
            }


            .hero {

                min-height: 430px;
            }


            .hero::before {

                opacity: .7;

                font-size: 85px;
            }


            .place-card {

                min-height: 470px;
            }


            .place-number {

                left: 22px;

                top: 22px;
            }


            .place-index {

                right: 22px;

                top: 22px;
            }


            .button {

                width: 100%;
            }


            .category-note {

                display: none;
            }


            .map-section {

                margin-top: 65px;
            }

        }

    </style>

</head>


<body>


<!-- ==================================================
     NAVBAR
================================================== -->

<nav>

    <a
        href="<?= base_url('/') ?>"
        class="logo"
    >
        NANG ENDI?
    </a>


    <ul class="nav-menu">

        <li>

            <a href="<?= base_url('/') ?>">
                Home
            </a>

        </li>


        <li>

            <a href="<?= base_url('events') ?>">
                Events
            </a>

        </li>


        <li>

            <a href="<?= base_url('places') ?>">
                Places
            </a>

        </li>


        <li>

            <a href="<?= base_url('map') ?>">
                Map
            </a>

        </li>

    </ul>

</nav>


<!-- ==================================================
     MAIN
================================================== -->

<main class="page">


    <!-- ==================================================
         HERO
    ================================================== -->

    <section class="hero">


        <div class="eyebrow">
            EXPLORE PLACES / SURABAYA
        </div>


        <h1>

            FIND<br>

            SOMEWHERE.

        </h1>


        <p class="intro">

            Surabaya punya banyak tempat untuk dijelajahi.

            Pilih sesuai kebutuhanmu — mau cari tempat

            buat kerja sambil ngopi, atau mengenal lebih

            dekat sejarah dan budaya Kota Pahlawan.

        </p>


        <div class="hero-meta">

            <span class="hero-dot"></span>

            <span>
                02 DESTINATIONS
            </span>

        </div>


    </section>


    <!-- ==================================================
         CATEGORY GRID
    ================================================== -->

    <div class="places-grid">


        <!-- ==================================================
             CAFE
        ================================================== -->

        <a
            href="<?= base_url('places/cafe') ?>"
            class="place-card cafe"
        >


            <div class="place-number">
                01 / CAFÉ
            </div>


            <div class="place-index">
                01
            </div>


            <div class="eyebrow">
                CAFÉ & COFFEE
            </div>


            <h2>

                NGOPI<br>

                DI SINI.

            </h2>


            <p>

                Cari café di Surabaya berdasarkan

                karakter dan kebutuhanmu. Mau

                WFC, tempat yang sudah legend,

                atau café yang punya suasana kalcer,

                semuanya bisa kamu filter.

            </p>


            <div class="tags">


                <span class="tag">
                    WFC
                </span>


                <span class="tag">
                    LEGEND
                </span>


                <span class="tag">
                    KALCER
                </span>


            </div>


            <span class="button">
                EXPLORE CAFÉ →
            </span>


            <div class="category-note">

                <span>
                    WORK / HANGOUT / COFFEE
                </span>

                <span>
                    01
                </span>

            </div>


        </a>


        <!-- ==================================================
             HERITAGE & CULTURE
        ================================================== -->

        <a
            href="<?= base_url('places/heritage-culture') ?>"
            class="place-card heritage"
        >


            <div class="place-number">
                02 / GLAM
            </div>


            <div class="place-index">
                02
            </div>


            <div class="eyebrow">
                HERITAGE & CULTURE
            </div>


            <h2>

                KENALI<br>

                KOTANYA.

            </h2>


            <p>

                Jelajahi tempat bersejarah dan

                budaya Surabaya dengan pendekatan

                GLAM — Gallery, Library, Archive,

                dan Museum.

            </p>


            <div class="tags">


                <span class="tag">
                    GALLERY
                </span>


                <span class="tag">
                    LIBRARY
                </span>


                <span class="tag">
                    ARCHIVE
                </span>


                <span class="tag">
                    MUSEUM
                </span>


            </div>


            <span class="button">
                EXPLORE GLAM →
            </span>


            <div class="category-note">

                <span>
                    HISTORY / CULTURE / CITY
                </span>

                <span>
                    02
                </span>

            </div>


        </a>


    </div>


    <!-- ==================================================
         MAP CONNECTION
    ================================================== -->

    <section class="map-section">


        <div>


            <div class="eyebrow">
                FIND IT ON MAP
            </div>


            <h2>

                WHERE<br>

                TO GO?

            </h2>


            <p>

                Sudah menemukan tempat yang kamu suka?

                Lihat lokasi lengkapnya melalui peta

                Surabaya. Café dan tempat heritage

                yang ada di NANG ENDI? nantinya

                terhubung langsung dengan Map.

            </p>


        </div>


        <a
            href="<?= base_url('map') ?>"
            class="map-button"
        >

            OPEN SURABAYA MAP →

        </a>


    </section>


    <!-- ==================================================
         INFO
    ================================================== -->

    <section class="info-section">


        <div class="info-item">


            <div class="info-number">
                01
            </div>


            <h3>
                FILTER YOUR PLACE
            </h3>


            <p>

                Pilih kategori tempat sesuai

                kebutuhan. Café dapat difilter

                berdasarkan WFC, Legend,

                atau Kalcer. Heritage & Culture

                dapat dijelajahi berdasarkan

                kategori GLAM.

            </p>


        </div>


        <div class="info-item">


            <div class="info-number">
                02
            </div>


            <h3>
                LOKASI LENGKAP
            </h3>


            <p>

                Setiap tempat nantinya dilengkapi

                alamat lengkap sehingga pengguna

                dapat mengetahui lokasi tempat

                sebelum berkunjung.

            </p>


        </div>


        <div class="info-item">


            <div class="info-number">
                03
            </div>


            <h3>
                CONNECTED TO MAP
            </h3>


            <p>

                Setiap café dan tempat heritage

                dapat ditemukan kembali melalui

                Map untuk membantu pengguna

                menentukan tujuan perjalanan.

            </p>


        </div>


    </section>


</main>


<!-- ==================================================
     FOOTER
================================================== -->

<footer>

    <h2>
        NANG ENDI?
    </h2>


    <p>
        Discover Surabaya differently.
    </p>

</footer>


</body>

</html>