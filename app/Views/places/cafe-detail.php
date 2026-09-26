<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($cafe['name']) ?> — NANG ENDI?</title>

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

        .page {
            max-width: 1200px;
            margin: auto;
            padding: 70px 7% 100px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 45px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 50px;
            align-items: start;
        }

        .hero-image {
            width: 100%;
            height: 520px;
            background: #c7aa83;
            border: 1px solid #171717;
            overflow: hidden;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 100px;
        }

        .eyebrow {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        h1 {
            font-size: clamp(50px, 7vw, 90px);
            line-height: .88;
            letter-spacing: -5px;
            margin-bottom: 25px;
        }

        .description {
            font-size: 15px;
            line-height: 1.8;
            color: #625c54;
            margin-bottom: 35px;
        }

        .info-box {
            border-top: 1px solid #171717;
        }

        .info-row {
            padding: 18px 0;
            border-bottom: 1px solid #d0ccc5;
        }

        .info-label {
            display: block;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #625c54;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 14px;
            line-height: 1.6;
        }

        .instagram-link {
            font-weight: 700;
            text-decoration: underline;
        }

        .instagram-link:hover {
            opacity: .6;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 30px;
        }

        .action-button {
            padding: 14px 20px;
            border: 1px solid #171717;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .action-button.primary {
            background: #171717;
            color: #fff;
        }

        .action-button:hover {
            opacity: .75;
        }

        .map-section {
            margin-top: 70px;
            padding: 40px;
            background: #2d2119;
            color: #f2e8d7;
        }

        .map-section h2 {
            font-size: 42px;
            line-height: .95;
            letter-spacing: -3px;
            margin-bottom: 15px;
        }

        .map-section p {
            max-width: 600px;
            font-size: 13px;
            line-height: 1.7;
            opacity: .8;
            margin-bottom: 25px;
        }

        .map-button {
            display: inline-block;
            padding: 14px 20px;
            background: #f2e8d7;
            color: #171717;
            font-size: 10px;
            font-weight: 800;
        }

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

        @media (max-width: 800px) {

            .nav-menu {
                display: none;
            }

            .page {
                padding: 50px 5% 80px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .hero-image {
                height: 380px;
            }

            h1 {
                letter-spacing: -3px;
            }

            .map-section {
                padding: 30px;
            }
        }
    </style>
</head>

<body>

<nav>

    <a href="<?= base_url('/') ?>" class="logo">
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

    <a
        href="<?= base_url('places/cafe') ?>"
        class="back-link"
    >
        ← Kembali ke Café
    </a>


    <div class="detail-grid">

        <!-- IMAGE -->

        <div class="hero-image">

            <?php if (!empty($cafe['image'])): ?>

                <img
                    src="<?= esc($cafe['image']) ?>"
                    alt="<?= esc($cafe['name']) ?>"
                >

            <?php else: ?>

                <div class="placeholder">
                    ☕
                </div>

            <?php endif; ?>

        </div>


        <!-- DETAIL -->

        <div>

            <div class="eyebrow">
                CAFÉ / SURABAYA
            </div>

            <h1>
                <?= esc($cafe['name']) ?>
            </h1>


            <?php if (!empty($cafe['description'])): ?>

                <p class="description">
                    <?= esc($cafe['description']) ?>
                </p>

            <?php endif; ?>


            <div class="info-box">

                <!-- CATEGORY -->

                <?php if (!empty($cafe['subcategory'])): ?>

                    <div class="info-row">

                        <span class="info-label">
                            CATEGORY
                        </span>

                        <div class="info-value">
                            <?= esc(
                                ucwords(
                                    str_replace(
                                        '-',
                                        ' ',
                                        $cafe['subcategory']
                                    )
                                )
                            ) ?>
                        </div>

                    </div>

                <?php endif; ?>


                <!-- ALAMAT -->

                <?php if (!empty($cafe['address'])): ?>

                    <div class="info-row">

                        <span class="info-label">
                            ALAMAT
                        </span>

                        <div class="info-value">
                            <?= esc($cafe['address']) ?>
                        </div>

                    </div>

                <?php endif; ?>


                <!-- JAM BUKA -->

                <?php if (!empty($cafe['opening_hours'])): ?>

                    <div class="info-row">

                        <span class="info-label">
                            JAM BUKA
                        </span>

                        <div class="info-value">
                            <?= esc($cafe['opening_hours']) ?>
                        </div>

                    </div>

                <?php endif; ?>


                <!-- TELEPON -->

                <?php if (!empty($cafe['phone'])): ?>

                    <div class="info-row">

                        <span class="info-label">
                            TELEPON
                        </span>

                        <div class="info-value">
                            <?= esc($cafe['phone']) ?>
                        </div>

                    </div>

                <?php endif; ?>


                <!-- HARGA -->

                <?php if (!empty($cafe['price']) && $cafe['price'] > 0): ?>

                    <div class="info-row">

                        <span class="info-label">
                            HARGA
                        </span>

                        <div class="info-value">
                            Rp <?= number_format(
                                $cafe['price'],
                                0,
                                ',',
                                '.'
                            ) ?>
                        </div>

                    </div>

                <?php endif; ?>


                <!-- INSTAGRAM -->

                <?php if (!empty($cafe['instagram'])): ?>

                    <?php
                        $instagram = trim($cafe['instagram']);

                        if (strpos($instagram, 'http://') === 0 || strpos($instagram, 'https://') === 0) {
                            $instagramUrl = $instagram;
                        } else {
                            $instagramUsername = ltrim($instagram, '@');
                            $instagramUrl = 'https://www.instagram.com/' . $instagramUsername . '/';
                        }
                    ?>

                    <div class="info-row">

                        <span class="info-label">
                            INSTAGRAM
                        </span>

                        <div class="info-value">

                            <a
                                href="<?= esc($instagramUrl) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="instagram-link"
                            >
                                <?= esc($instagram) ?>
                            </a>

                        </div>

                    </div>

                <?php endif; ?>


                <!-- WEBSITE -->

                <?php if (!empty($cafe['website'])): ?>

                    <?php
                        $website = trim($cafe['website']);

                        if (
                            strpos($website, 'http://') !== 0 &&
                            strpos($website, 'https://') !== 0
                        ) {
                            $websiteUrl = 'https://' . $website;
                        } else {
                            $websiteUrl = $website;
                        }
                    ?>

                    <div class="info-row">

                        <span class="info-label">
                            WEBSITE
                        </span>

                        <div class="info-value">

                            <a
                                href="<?= esc($websiteUrl) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="instagram-link"
                            >
                                <?= esc($website) ?>
                            </a>

                        </div>

                    </div>

                <?php endif; ?>

            </div>


            <!-- ACTIONS -->

            <div class="actions">

                <?php if (
                    !empty($cafe['latitude']) &&
                    !empty($cafe['longitude'])
                ): ?>

                    <a
                        href="<?= base_url(
                            'map?lat=' .
                            urlencode($cafe['latitude']) .
                            '&lng=' .
                            urlencode($cafe['longitude'])
                        ) ?>"
                        class="action-button primary"
                    >
                        View on Map →
                    </a>

                <?php else: ?>

                    <a
                        href="<?= base_url('map') ?>"
                        class="action-button primary"
                    >
                        Open Map →
                    </a>

                <?php endif; ?>


                <!-- INSTAGRAM BUTTON -->

                <?php if (!empty($cafe['instagram'])): ?>

                    <a
                        href="<?= esc($instagramUrl) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="action-button"
                    >
                        Instagram →
                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>


    <!-- MAP CTA -->

    <section class="map-section">

        <div class="eyebrow">
            FIND YOUR WAY
        </div>

        <h2>
            MAU<br>
            KE SINI?
        </h2>

        <p>
            Lihat lokasi café ini di Map NANG ENDI?
            dan temukan rute menuju tempatnya.
        </p>


        <?php if (
            !empty($cafe['latitude']) &&
            !empty($cafe['longitude'])
        ): ?>

            <a
                href="<?= base_url(
                    'map?lat=' .
                    urlencode($cafe['latitude']) .
                    '&lng=' .
                    urlencode($cafe['longitude'])
                ) ?>"
                class="map-button"
            >
                VIEW LOCATION →
            </a>

        <?php else: ?>

            <a
                href="<?= base_url('map') ?>"
                class="map-button"
            >
                OPEN MAP →
            </a>

        <?php endif; ?>

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