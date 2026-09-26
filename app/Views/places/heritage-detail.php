<?php

    // ==========================================
    // SUBCATEGORY
    // ==========================================

    $subcategoryNames = [];

    if (!empty($subcategories)) {

        $subcategoryNames = array_map(
            'strtoupper',
            array_column($subcategories, 'subcategory')
        );

    }

    // Fallback ke kolom subcategory lama
    if (
        empty($subcategoryNames) &&
        !empty($place['subcategory'])
    ) {

        $subcategoryNames = [
            strtoupper($place['subcategory'])
        ];

    }


    // ==========================================
    // MUSEUM CHECK
    // Hanya museum yang menggunakan sistem tiket
    // ==========================================

    $isMuseum = in_array(
        'MUSEUM',
        $subcategoryNames,
        true
    );


    // ==========================================
    // TUTORIAL RESMI
    // ==========================================

    $tutorialUrl =
        'https://tiketwisata.surabaya.go.id/info/tutorial';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= esc($place['name']) ?> — NANG ENDI?
    </title>


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
            font-family: Arial, Helvetica, sans-serif;

            background: #f5f3ee;

            color: #171717;
        }


        a {
            color: inherit;

            text-decoration: none;
        }


        /* =========================
           NAV
        ========================== */

        nav {
            height: 80px;

            padding: 0 7%;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom: 1px solid #171717;

            background: #f5f3ee;
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

            border-bottom: 1px solid transparent;
        }


        .nav-menu a:hover {
            border-bottom-color: #171717;
        }


        /* =========================
           PAGE
        ========================== */

        .page {
            max-width: 1200px;

            margin: auto;

            padding: 55px 7% 100px;
        }


        .back-link {
            display: inline-block;

            font-size: 11px;

            font-weight: 800;

            letter-spacing: 1px;

            margin-bottom: 45px;
        }


        .back-link:hover {
            opacity: .6;
        }


        /* =========================
           HERO
        ========================== */

        .detail-hero {
            display: grid;

            grid-template-columns: 1.15fr .85fr;

            gap: 40px;

            align-items: stretch;

            margin-bottom: 70px;
        }


        .detail-image {
            min-height: 500px;

            background: #c7aa83;

            border: 1px solid #171717;

            overflow: hidden;
        }


        .detail-image img {
            width: 100%;

            height: 100%;

            min-height: 500px;

            object-fit: cover;

            display: block;
        }


        .detail-placeholder {
            min-height: 500px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 80px;
        }


        .detail-intro {
            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .detail-type {
            font-size: 10px;

            font-weight: 800;

            letter-spacing: 2px;

            margin-bottom: 20px;

            line-height: 1.7;
        }


        .detail-title {
            font-size: clamp(48px, 6vw, 82px);

            line-height: .88;

            letter-spacing: -4px;

            margin-bottom: 25px;
        }


        .detail-description {
            max-width: 520px;

            font-size: 15px;

            line-height: 1.75;

            color: #625c54;
        }


        /* =========================
           INFO
        ========================== */

        .info-section {
            border-top: 1px solid #171717;

            border-bottom: 1px solid #171717;

            padding: 35px 0;

            margin-bottom: 70px;
        }


        .section-label {
            font-size: 10px;

            font-weight: 800;

            letter-spacing: 2px;

            margin-bottom: 25px;
        }


        .info-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 30px;
        }


        .info-item {
            border-top: 1px solid #d0ccc5;

            padding-top: 15px;
        }


        .info-label {
            display: block;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1.5px;

            color: #625c54;

            margin-bottom: 7px;
        }


        .info-value {
            font-size: 14px;

            line-height: 1.6;
        }


        /* =========================
           TICKET / VISIT INFO
        ========================== */

        .ticket-section {
            margin-bottom: 70px;
        }


        .ticket-card {
            padding: 35px;

            border: 1px solid #171717;

            background: #171717;

            color: #f5f3ee;
        }


        .ticket-label {
            font-size: 10px;

            font-weight: 800;

            letter-spacing: 2px;

            margin-bottom: 15px;
        }


        .ticket-price {
            font-size: 42px;

            font-weight: 900;

            letter-spacing: -2px;

            margin-bottom: 10px;
        }


        .ticket-note {
            font-size: 12px;

            line-height: 1.6;

            opacity: .7;

            margin-bottom: 25px;

            max-width: 700px;
        }


        .ticket-button {
            display: inline-block;

            padding: 14px 20px;

            background: #f5f3ee;

            color: #171717;

            border: 1px solid #f5f3ee;

            font-size: 10px;

            font-weight: 800;
        }


        .ticket-button:hover {
            opacity: .75;
        }


        /* =========================
           HOW TO BOOK
        ========================== */

        .tutorial-section {
            margin-bottom: 70px;
        }


        .tutorial-header {
            margin-bottom: 25px;
        }


        .tutorial-header h2 {
            font-size: 42px;

            letter-spacing: -2.5px;

            margin-bottom: 10px;
        }


        .tutorial-header p {
            max-width: 650px;

            font-size: 13px;

            line-height: 1.7;

            color: #625c54;
        }


        .tutorial-steps {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            border-top: 1px solid #171717;

            border-bottom: 1px solid #171717;
        }


        .step {
            padding: 25px;

            border-right: 1px solid #171717;
        }


        .step:last-child {
            border-right: none;
        }


        .step-number {
            font-size: 11px;

            font-weight: 900;

            margin-bottom: 25px;
        }


        .step h3 {
            font-size: 18px;

            letter-spacing: -1px;

            margin-bottom: 10px;
        }


        .step p {
            font-size: 12px;

            line-height: 1.6;

            color: #625c54;
        }


        .official-note {
            margin-top: 20px;

            padding: 18px 20px;

            background: #ebe7df;

            border-left: 3px solid #171717;

            font-size: 11px;

            line-height: 1.7;
        }


        .tutorial-button {
            display: inline-block;

            margin-top: 20px;

            padding: 14px 20px;

            background: #171717;

            color: #fff;

            border: 1px solid #171717;

            font-size: 10px;

            font-weight: 800;
        }


        .tutorial-button:hover {
            opacity: .75;
        }


        /* =========================
           LOCATION
        ========================== */

        .location-section {
            margin-bottom: 70px;
        }


        .location-box {
            border: 1px solid #171717;

            padding: 35px;

            background: #fff;

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            gap: 30px;
        }


        .location-box h2 {
            font-size: 42px;

            letter-spacing: -2.5px;

            margin-bottom: 12px;
        }


        .location-address {
            font-size: 13px;

            line-height: 1.7;

            color: #625c54;

            max-width: 600px;
        }


        .map-button {
            display: inline-block;

            padding: 15px 20px;

            background: #171717;

            color: #fff;

            font-size: 10px;

            font-weight: 800;

            white-space: nowrap;
        }


        .map-button:hover {
            opacity: .75;
        }


        /* =========================
           BOTTOM CTA
        ========================== */

        .bottom-cta {
            padding: 45px;

            background: #2d2119;

            color: #f2e8d7;

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            gap: 30px;
        }


        .bottom-cta h2 {
            font-size: 48px;

            line-height: .9;

            letter-spacing: -3px;

            margin-bottom: 15px;
        }


        .bottom-cta p {
            max-width: 550px;

            font-size: 13px;

            line-height: 1.7;

            opacity: .75;
        }


        .back-button {
            padding: 15px 20px;

            background: #f2e8d7;

            color: #171717;

            font-size: 10px;

            font-weight: 800;

            white-space: nowrap;
        }


        .back-button:hover {
            opacity: .8;
        }


        /* =========================
           FOOTER
        ========================== */

        footer {
            padding: 60px 7%;

            background: #171717;

            color: #f5f3ee;
        }


        footer h2 {
            font-size: 50px;

            letter-spacing: -3px;

            margin-bottom: 8px;
        }


        footer p {
            font-size: 13px;

            color: #aaa39a;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            .detail-hero {
                grid-template-columns: 1fr;
            }


            .detail-image,
            .detail-image img,
            .detail-placeholder {
                min-height: 400px;
            }


            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }


            .tutorial-steps {
                grid-template-columns: repeat(2, 1fr);
            }


            .step:nth-child(2) {
                border-right: none;
            }


            .step:nth-child(1),
            .step:nth-child(2) {
                border-bottom: 1px solid #171717;
            }

        }


        @media (max-width: 700px) {

            nav {
                padding: 0 5%;
            }


            .nav-menu {
                display: none;
            }


            .page {
                padding: 45px 5% 80px;
            }


            .detail-title {
                font-size: 50px;
            }


            .info-grid {
                grid-template-columns: 1fr;
            }


            .tutorial-steps {
                grid-template-columns: 1fr;
            }


            .step {
                border-right: none;

                border-bottom: 1px solid #171717;
            }


            .step:last-child {
                border-bottom: none;
            }


            .location-box {
                display: block;
            }


            .map-button {
                display: inline-block;

                margin-top: 25px;
            }


            .bottom-cta {
                display: block;

                padding: 30px;
            }


            .back-button {
                display: inline-block;

                margin-top: 25px;
            }

        }

    </style>

</head>


<body>


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



<main class="page">


    <!-- BACK -->

    <a
        href="<?= base_url('places/heritage-culture') ?>"
        class="back-link"
    >
        ← BACK TO HERITAGE & CULTURE
    </a>



    <!-- =========================
         HERO
    ========================== -->

    <section class="detail-hero">


        <div class="detail-image">

            <?php if (!empty($place['image'])): ?>

                <img
                    src="<?= base_url($place['image']) ?>"
                    alt="<?= esc($place['name']) ?>"
                >

            <?php else: ?>

                <div class="detail-placeholder">
                    🏛️
                </div>

            <?php endif; ?>

        </div>



        <div class="detail-intro">


            <div class="detail-type">

                HERITAGE & CULTURE /

                <?php if (!empty($subcategoryNames)): ?>

                    <?= esc(implode(' / ', $subcategoryNames)) ?>

                <?php else: ?>

                    PLACE

                <?php endif; ?>

            </div>



            <h1 class="detail-title">
                <?= esc($place['name']) ?>
            </h1>



            <?php if (!empty($place['description'])): ?>

                <p class="detail-description">
                    <?= esc($place['description']) ?>
                </p>

            <?php endif; ?>


        </div>

    </section>



    <!-- =========================
         INFO
    ========================== -->

    <section class="info-section">


        <div class="section-label">
            VISIT INFORMATION
        </div>


        <div class="info-grid">


            <?php if (!empty($place['address'])): ?>

                <div class="info-item">

                    <span class="info-label">
                        ALAMAT
                    </span>

                    <div class="info-value">
                        <?= esc($place['address']) ?>
                    </div>

                </div>

            <?php endif; ?>



            <?php if (!empty($place['opening_hours'])): ?>

                <div class="info-item">

                    <span class="info-label">
                        JAM BUKA
                    </span>

                    <div class="info-value">
                        <?= esc($place['opening_hours']) ?>
                    </div>

                </div>

            <?php endif; ?>



            <div class="info-item">

                <span class="info-label">

                    <?= $isMuseum ? 'TIKET' : 'BIAYA' ?>

                </span>


                <div class="info-value">


                    <?php if (
                        isset($place['price']) &&
                        $place['price'] !== null
                    ): ?>


                        <?php if ((int) $place['price'] === 0): ?>

                            GRATIS

                        <?php else: ?>

                            Rp
                            <?= number_format(
                                (int) $place['price'],
                                0,
                                ',',
                                '.'
                            ) ?>

                        <?php endif; ?>


                    <?php else: ?>

                        CEK INFORMASI

                    <?php endif; ?>


                </div>

            </div>



            <?php if (!empty($place['phone'])): ?>

                <div class="info-item">

                    <span class="info-label">
                        TELEPON
                    </span>

                    <div class="info-value">
                        <?= esc($place['phone']) ?>
                    </div>

                </div>

            <?php endif; ?>



            <?php if (!empty($place['instagram'])): ?>

                <div class="info-item">

                    <span class="info-label">
                        INSTAGRAM
                    </span>

                    <div class="info-value">
                        <?= esc($place['instagram']) ?>
                    </div>

                </div>

            <?php endif; ?>


        </div>

    </section>



    <!-- =========================
         MUSEUM TICKET
    ========================== -->

    <?php if ($isMuseum): ?>


        <section class="ticket-section">


            <div class="ticket-card">


                <div class="ticket-label">
                    🎟 TIKET RESMI
                </div>


                <div class="ticket-price">


                    <?php if (
                        isset($place['price']) &&
                        $place['price'] !== null
                    ): ?>


                        <?php if ((int) $place['price'] === 0): ?>

                            GRATIS

                        <?php else: ?>

                            Rp
                            <?= number_format(
                                (int) $place['price'],
                                0,
                                ',',
                                '.'
                            ) ?>

                        <?php endif; ?>


                    <?php else: ?>

                        CEK RESMI

                    <?php endif; ?>


                </div>


                <div class="ticket-note">

                    Cek jadwal, ketersediaan, dan informasi tiket
                    terbaru melalui kanal resmi Tiket Wisata Surabaya.

                </div>


                <?php if (!empty($place['website'])): ?>

                    <a
                        href="<?= esc($place['website']) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="ticket-button"
                    >
                        PESAN TIKET RESMI →
                    </a>

                <?php endif; ?>


            </div>

        </section>



        <!-- =========================
             HOW TO BOOK
        ========================== -->

        <section class="tutorial-section">


            <div class="tutorial-header">


                <div class="section-label">
                    HOW TO BOOK
                </div>


                <h2>
                    CARA PESAN TIKET.
                </h2>


                <p>

                    Untuk museum yang menggunakan sistem tiket wisata
                    Pemkot, lakukan pemesanan melalui kanal resmi
                    sebelum datang. Pastikan jadwal dan ketersediaan
                    kuota sudah sesuai.

                </p>


            </div>



            <div class="tutorial-steps">


                <div class="step">

                    <div class="step-number">
                        01
                    </div>

                    <h3>
                        PILIH TEMPAT
                    </h3>

                    <p>
                        Pilih museum yang ingin kamu kunjungi
                        dan cek informasi kunjungannya.
                    </p>

                </div>



                <div class="step">

                    <div class="step-number">
                        02
                    </div>

                    <h3>
                        PILIH JADWAL
                    </h3>

                    <p>
                        Pilih tanggal dan jadwal kunjungan
                        yang tersedia pada sistem resmi.
                    </p>

                </div>



                <div class="step">

                    <div class="step-number">
                        03
                    </div>

                    <h3>
                        ISI DATA
                    </h3>

                    <p>
                        Lengkapi data pengunjung sesuai
                        informasi yang diminta pada halaman
                        pemesanan.
                    </p>

                </div>



                <div class="step">

                    <div class="step-number">
                        04
                    </div>

                    <h3>
                        SIMPAN BUKTI
                    </h3>

                    <p>
                        Setelah pemesanan selesai, simpan bukti
                        atau tiket sesuai petunjuk dari sistem resmi.
                    </p>

                </div>


            </div>



            <div class="official-note">

                <strong>INFO:</strong>

                NANG ENDI? hanya membantu kamu menemukan tempat
                dan mengarahkan ke kanal resmi. Pemesanan tiket
                dilakukan melalui sistem resmi Tiket Wisata Surabaya.

            </div>



            <a
                href="<?= esc($tutorialUrl) ?>"
                target="_blank"
                rel="noopener noreferrer"
                class="tutorial-button"
            >
                LIHAT PANDUAN RESMI CARA PESAN →
            </a>


        </section>


    <?php else: ?>


        <!-- =========================
             HERITAGE / CULTURE INFO
        ========================== -->

        <section class="ticket-section">


            <div class="ticket-card">


                <div class="ticket-label">
                    INFO KUNJUNGAN
                </div>


                <div class="ticket-price">


                    <?php if (
                        isset($place['price']) &&
                        $place['price'] !== null &&
                        (int) $place['price'] === 0
                    ): ?>

                        GRATIS

                    <?php elseif (
                        isset($place['price']) &&
                        $place['price'] !== null
                    ): ?>

                        Rp
                        <?= number_format(
                            (int) $place['price'],
                            0,
                            ',',
                            '.'
                        ) ?>

                    <?php else: ?>

                        CEK INFO

                    <?php endif; ?>


                </div>


                <div class="ticket-note">

                    Cek jadwal kegiatan dan informasi kunjungan
                    sebelum datang. Untuk tempat budaya atau
                    heritage, jadwal dapat mengikuti kegiatan
                    atau agenda yang sedang berlangsung.

                </div>


            </div>

        </section>


    <?php endif; ?>



    <!-- =========================
         LOCATION
    ========================== -->

    <section class="location-section">


        <div class="section-label">
            LOCATION
        </div>


        <div class="location-box">


            <div>


                <h2>
                    NANG ENDI?
                </h2>


                <?php if (!empty($place['address'])): ?>

                    <div class="location-address">
                        <?= esc($place['address']) ?>
                    </div>

                <?php else: ?>

                    <div class="location-address">
                        Lokasi belum tersedia.
                    </div>

                <?php endif; ?>


            </div>



            <?php if (
                !empty($place['latitude']) &&
                !empty($place['longitude'])
            ): ?>


                <a
                    href="<?= base_url(
                        'map?lat=' .
                        urlencode($place['latitude']) .
                        '&lng=' .
                        urlencode($place['longitude'])
                    ) ?>"
                    class="map-button"
                >
                    VIEW ON MAP →
                </a>


            <?php else: ?>


                <a
                    href="<?= base_url('map') ?>"
                    class="map-button"
                >
                    OPEN MAP →
                </a>


            <?php endif; ?>


        </div>

    </section>



    <!-- =========================
         BOTTOM CTA
    ========================== -->

    <section class="bottom-cta">


        <div>


            <div class="section-label">
                MORE SURABAYA
            </div>


            <h2>
                MASIH MAU<br>
                JELAJAH?
            </h2>


            <p>
                Temukan tempat heritage, museum, ruang budaya,
                dan berbagai sudut Surabaya lainnya di NANG ENDI?
            </p>


        </div>



        <a
            href="<?= base_url('places/heritage-culture') ?>"
            class="back-button"
        >
            BACK TO HERITAGE →
        </a>


    </section>


</main>



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