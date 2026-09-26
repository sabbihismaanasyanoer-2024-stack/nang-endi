<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Heritage & Culture — NANG ENDI?</title>

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

        .eyebrow {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: clamp(55px, 8vw, 100px);
            line-height: .85;
            letter-spacing: -5px;
            margin-bottom: 25px;
        }

        .intro {
            max-width: 650px;
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 50px;
        }

        /* =========================
           SEARCH & FILTER
        ========================= */

        .filter-area {
            border-top: 1px solid #171717;
            border-bottom: 1px solid #171717;
            padding: 25px 0;
            margin-bottom: 45px;
        }

        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .search-box input {
            flex: 1;
            height: 52px;
            padding: 0 17px;
            border: 1px solid #171717;
            background: #fff;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .search-box input:focus {
            box-shadow: 0 0 0 1px #171717;
        }

        .search-button {
            height: 52px;
            padding: 0 25px;
            border: 1px solid #171717;
            background: #171717;
            color: #fff;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
        }

        .search-button:hover {
            opacity: .8;
        }

        .filter-label {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .filter-button {
            display: inline-block;
            padding: 10px 15px;
            border: 1px solid #171717;
            background: transparent;
            font-family: inherit;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
            transition: all .2s ease;
        }

        .filter-button:hover,
        .filter-button.active {
            background: #171717;
            color: #fff;
        }

        /* =========================
           RESULT
        ========================= */

        .result-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 25px;
        }

        .result-header h2 {
            font-size: 30px;
            letter-spacing: -2px;
        }

        .result-count {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* =========================
           GRID
        ========================= */

        .heritage-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .heritage-card {
            background: #fff;
            border: 1px solid #171717;
            display: flex;
            flex-direction: column;
            transition: transform .3s ease;
            overflow: hidden;
        }

        .heritage-card:hover {
            transform: translateY(-6px);
        }

        .heritage-image {
            height: 220px;
            background: #c7aa83;
            overflow: hidden;
        }

        .heritage-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .heritage-placeholder {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
        }

        .heritage-content {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .heritage-name {
            font-size: 27px;
            line-height: 1;
            letter-spacing: -1.5px;
            margin-bottom: 15px;
        }

        .heritage-description {
            font-size: 13px;
            line-height: 1.6;
            color: #625c54;
            margin-bottom: 20px;
        }

        .heritage-info {
            border-top: 1px solid #d0ccc5;
            padding-top: 15px;
            margin-top: auto;
        }

        .info-row {
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 9px;
        }

        .info-label {
            display: block;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #625c54;
            margin-bottom: 2px;
        }

        .heritage-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-top: 18px;
        }

        .action-button {
            padding: 12px 8px;
            border: 1px solid #171717;
            text-align: center;
            font-size: 10px;
            font-weight: 800;
        }

        .action-button.primary {
            background: #171717;
            color: #fff;
        }

        .action-button:hover {
            opacity: .75;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty-state {
            border: 1px solid #171717;
            padding: 60px 30px;
            text-align: center;
            background: #ebe7df;
        }

        .empty-state h3 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .empty-state p {
            font-size: 13px;
            color: #625c54;
        }

        /* =========================
           MAP CTA
        ========================= */

        .map-cta {
            margin-top: 70px;
            padding: 40px;
            background: #2d2119;
            color: #f2e8d7;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 30px;
        }

        .map-cta h2 {
            font-size: 45px;
            line-height: .9;
            letter-spacing: -3px;
            margin-bottom: 15px;
        }

        .map-cta p {
            max-width: 500px;
            font-size: 13px;
            line-height: 1.7;
            opacity: .75;
        }

        .map-button {
            padding: 15px 20px;
            background: #f2e8d7;
            color: #171717;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .map-button:hover {
            opacity: .8;
        }

        /* =========================
           FOOTER
        ========================= */

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
        ========================= */

        @media (max-width: 950px) {

            .heritage-grid {
                grid-template-columns: repeat(2, 1fr);
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
                padding: 60px 5% 80px;
            }

            .heritage-grid {
                grid-template-columns: 1fr;
            }

            .search-box {
                display: block;
            }

            .search-button {
                width: 100%;
                margin-top: 8px;
            }

            .result-header {
                display: block;
            }

            .result-count {
                margin-top: 8px;
            }

            .map-cta {
                display: block;
                padding: 30px;
            }

            .map-button {
                display: inline-block;
                margin-top: 25px;
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

    <div class="eyebrow">
        HERITAGE & CULTURE / SURABAYA
    </div>

    <h1>
        JELAJAH<br>
        SEJARAH.
    </h1>

    <p class="intro">
        Kenali sisi lain Surabaya melalui tempat-tempat
        bersejarah dan ruang budaya yang menyimpan
        cerita tentang kota ini.
    </p>


    <!-- =========================
         SEARCH & FILTER
    ========================= -->

    <section class="filter-area">

        <!-- SEARCH -->

        <form
            method="get"
            action="<?= base_url('places/heritage-culture') ?>"
            class="search-box"
        >

            <input
                type="text"
                name="search"
                value="<?= esc($search ?? '') ?>"
                placeholder="Cari tempat atau lokasi..."
            >

            <button
                type="submit"
                class="search-button"
            >
                SEARCH →
            </button>

        </form>


        <!-- FILTER -->

        <div class="filter-label">
            PILIH TIPE TEMPAT
        </div>

        <div class="filter-buttons">

            <!-- SEMUA -->

            <a
                href="<?= base_url('places/heritage-culture') ?>"
                class="filter-button <?= empty($category) || $category === 'all' ? 'active' : '' ?>"
            >
                SEMUA
            </a>


            <!-- MUSEUM -->

            <a
                href="<?= base_url('places/heritage-culture?category=museum') ?>"
                class="filter-button <?= ($category ?? '') === 'museum' ? 'active' : '' ?>"
            >
                MUSEUM
            </a>


            <!-- HERITAGE -->

            <a
                href="<?= base_url('places/heritage-culture?category=heritage') ?>"
                class="filter-button <?= ($category ?? '') === 'heritage' ? 'active' : '' ?>"
            >
                HERITAGE
            </a>


            <!-- CULTURE -->

            <a
                href="<?= base_url('places/heritage-culture?category=culture') ?>"
                class="filter-button <?= ($category ?? '') === 'culture' ? 'active' : '' ?>"
            >
                CULTURE
            </a>

        </div>

    </section>


    <!-- =========================
         RESULT HEADER
    ========================= -->

    <div class="result-header">

        <h2>
            HERITAGE PICKS
        </h2>

        <div class="result-count">
            <?= !empty($places) ? count($places) : 0 ?> TEMPAT DITEMUKAN
        </div>

    </div>


    <!-- =========================
         HERITAGE LIST
    ========================= -->

    <?php if (!empty($places)): ?>

        <div class="heritage-grid">

            <?php foreach ($places as $place): ?>

                <article class="heritage-card">

                    <!-- IMAGE -->

                    <div class="heritage-image">

                        <?php if (!empty($place['image'])): ?>

                            <img
                                src="<?= esc($place['image']) ?>"
                                alt="<?= esc($place['name']) ?>"
                            >

                        <?php else: ?>

                            <div class="heritage-placeholder">
                                🏛️
                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- CONTENT -->

                    <div class="heritage-content">

                        <h3 class="heritage-name">
                            <?= esc($place['name']) ?>
                        </h3>


                        <?php if (!empty($place['description'])): ?>

                            <p class="heritage-description">
                                <?= esc($place['description']) ?>
                            </p>

                        <?php endif; ?>


                        <div class="heritage-info">

                            <!-- ALAMAT -->

                            <?php if (!empty($place['address'])): ?>

                                <div class="info-row">

                                    <span class="info-label">
                                        ALAMAT
                                    </span>

                                    <?= esc($place['address']) ?>

                                </div>

                            <?php endif; ?>


                            <!-- JAM BUKA -->

                            <?php if (!empty($place['opening_hours'])): ?>

                                <div class="info-row">

                                    <span class="info-label">
                                        JAM BUKA
                                    </span>

                                    <?= esc($place['opening_hours']) ?>

                                </div>

                            <?php endif; ?>


                            <!-- TELEPON -->

                            <?php if (!empty($place['phone'])): ?>

                                <div class="info-row">

                                    <span class="info-label">
                                        TELEPON
                                    </span>

                                    <?= esc($place['phone']) ?>

                                </div>

                            <?php endif; ?>


                            <!-- INSTAGRAM -->

                            <?php if (!empty($place['instagram'])): ?>

                                <div class="info-row">

                                    <span class="info-label">
                                        INSTAGRAM
                                    </span>

                                    <?= esc($place['instagram']) ?>

                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- ACTION -->

                        <div class="heritage-actions">

                            <a
                                href="<?= base_url('places/heritage-culture/' . esc($place['slug'])) ?>"
                                class="action-button primary"
                            >
                                VIEW DETAIL
                            </a>


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
                                    class="action-button"
                                >
                                    VIEW ON MAP
                                </a>

                            <?php else: ?>

                                <a
                                    href="<?= base_url('map') ?>"
                                    class="action-button"
                                >
                                    VIEW ON MAP
                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="empty-state">

            <h3>
                BELUM ADA HERITAGE.
            </h3>

            <p>
                Belum ada tempat heritage atau culture
                yang sesuai dengan pencarianmu.
            </p>

        </div>

    <?php endif; ?>


    <!-- =========================
         MAP CTA
    ========================= -->

    <section class="map-cta">

        <div>

            <div class="eyebrow">
                SURABAYA ON MAP
            </div>

            <h2>
                SUDAH<br>
                TAHU MAU KE MANA?
            </h2>

            <p>
                Lihat berbagai tempat heritage dan budaya
                di Surabaya melalui Map NANG ENDI? dan
                tentukan tempat yang ingin kamu kunjungi.
            </p>

        </div>


        <a
            href="<?= base_url('map') ?>"
            class="map-button"
        >
            OPEN MAP →
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