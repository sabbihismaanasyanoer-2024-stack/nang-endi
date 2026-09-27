<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= esc($event['title']) ?> — NANG ENDI?
    </title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f5f3ee;

            color: #171717;
        }


        a {
            color: inherit;
            text-decoration: none;
        }


        nav {
            min-height: 80px;

            padding: 0 7%;

            display: flex;

            justify-content: space-between;

            align-items: center;

            border-bottom: 1px solid #171717;

            background: #f5f3ee;
        }


        .logo {
            font-size: 28px;

            font-weight: 900;

            letter-spacing: -1px;

            white-space: nowrap;
        }


        .nav-menu {
            display: flex;

            gap: 30px;

            font-size: 14px;

            font-weight: 700;
        }


        .nav-menu a:hover {
            text-decoration: underline;
        }


        .detail {
            padding: 65px 7% 100px;
        }


        .back {
            display: inline-block;

            margin-bottom: 40px;

            font-size: 12px;

            font-weight: 800;

            letter-spacing: .5px;

            text-decoration: underline;
        }


        .layout {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                minmax(0, 1fr);

            gap: 60px;

            align-items: start;
        }


        .image {
            width: 100%;

            height: 560px;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            border: 1px solid #171717;

            background: #d6d1c7;
        }


        .image img {
            width: 100%;

            height: 100%;

            display: block;

            object-fit: cover;
        }


        .image-placeholder {
            font-size: 100px;
        }


        .tag {
            margin-bottom: 20px;

            font-size: 11px;

            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        h1 {
            max-width: 700px;

            margin-bottom: 38px;

            font-size:
                clamp(
                    50px,
                    6.5vw,
                    100px
                );

            line-height: .85;

            letter-spacing: -5px;
        }


        .info {
            padding: 25px 0;

            margin-bottom: 30px;

            border-top: 1px solid #171717;

            border-bottom: 1px solid #171717;

            font-size: 14px;

            line-height: 1.7;
        }


        .info-row {
            display: flex;

            align-items: flex-start;

            gap: 10px;

            margin-bottom: 10px;
        }


        .info-row:last-child {
            margin-bottom: 0;
        }


        .info-icon {
            width: 24px;

            flex-shrink: 0;
        }


        .info-text {
            min-width: 0;

            word-break: break-word;
        }


        .info-link {
            text-decoration: underline;
        }


        .info-link:hover {
            opacity: .65;
        }


        .description {
            margin-bottom: 35px;

            font-size: 16px;

            line-height: 1.75;
        }


        .ticket-area {
            margin-top: 30px;

            padding-top: 25px;

            border-top: 1px solid #171717;
        }


        .ticket-label {
            margin-bottom: 12px;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .ticket-button,
        .free-button,
        .ticket-info-button {
            width: 100%;

            min-height: 52px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 14px 20px;

            border: 1px solid #171717;

            font-size: 11px;

            font-weight: 800;

            letter-spacing: .7px;

            text-align: center;

            transition: .2s ease;
        }


        .ticket-button {
            background: #171717;

            color: #f5f3ee;
        }


        .ticket-button:hover {
            background: transparent;

            color: #171717;
        }


        .free-button {
            background: #d1cbc1;

            color: #171717;

            cursor: default;
        }


        .ticket-info-button {
            background: transparent;

            color: #171717;

            cursor: default;
        }


        .ticket-note {
            margin-top: 10px;

            font-size: 11px;

            line-height: 1.5;

            color: #625c54;
        }


        .location-button {
            width: 100%;

            min-height: 48px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-top: 10px;

            padding: 12px 20px;

            border: 1px solid #171717;

            background: transparent;

            color: #171717;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: .7px;

            transition: .2s ease;
        }


        .location-button:hover {
            background: #171717;

            color: #fff;
        }


        footer {
            padding: 60px 7%;

            border-top: 1px solid #171717;
        }


        footer h2 {
            margin-bottom: 8px;

            font-size: 50px;

            letter-spacing: -3px;
        }


        footer p {
            font-size: 14px;
        }


        @media (max-width: 900px) {

            nav {
                padding: 0 5%;
            }


            .nav-menu {
                gap: 15px;

                font-size: 11px;
            }


            .detail {
                padding: 55px 5% 80px;
            }


            .layout {
                grid-template-columns: 1fr;

                gap: 45px;
            }


            .image {
                height: 450px;
            }


            h1 {
                font-size:
                    clamp(
                        50px,
                        13vw,
                        80px
                    );
            }

        }


        @media (max-width: 600px) {

            nav {
                min-height: 70px;
            }


            .logo {
                font-size: 21px;
            }


            .nav-menu {
                gap: 10px;

                font-size: 9px;
            }


            .detail {
                padding: 45px 5% 70px;
            }


            .back {
                margin-bottom: 30px;
            }


            .image {
                height: 330px;
            }


            .image-placeholder {
                font-size: 70px;
            }


            h1 {
                margin-bottom: 30px;

                font-size:
                    clamp(
                        48px,
                        15vw,
                        72px
                    );

                letter-spacing: -4px;
            }


            .info {
                padding: 20px 0;

                font-size: 13px;
            }


            .description {
                font-size: 15px;
            }


            footer {
                padding: 45px 5%;
            }


            footer h2 {
                font-size: 40px;
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


    <div class="nav-menu">

        <a href="<?= base_url('/') ?>">
            HOME
        </a>

        <a href="<?= base_url('events') ?>">
            EVENTS
        </a>

        <a href="<?= base_url('places') ?>">
            PLACES
        </a>

        <a href="<?= base_url('map') ?>">
            MAP
        </a>

    </div>

</nav>


<main class="detail">


    <a
        href="<?= base_url('events') ?>"
        class="back"
    >
        ← BACK TO EVENTS
    </a>


    <div class="layout">


        <!-- IMAGE -->

        <div class="image">

            <?php
                $imagePath = trim($event['image'] ?? '');

                $imagePath = str_replace(
                    '\\',
                    '/',
                    $imagePath
                );

                $imagePath = preg_replace(
                    '#^public/#i',
                    '',
                    $imagePath
                );

                $imagePath = ltrim(
                    $imagePath,
                    '/'
                );

                $imageUrl = '';

                if ($imagePath !== '') {
                    $imageUrl = base_url($imagePath);
                }
            ?>


            <?php if ($imageUrl !== ''): ?>

                <img
                    src="<?= esc($imageUrl) ?>"
                    alt="<?= esc($event['title'] ?? 'Event') ?>"
                    loading="eager"
                    onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'image-placeholder\'>🎪</div>';"
                >

            <?php else: ?>

                <div class="image-placeholder">
                    🎪
                </div>

            <?php endif; ?>

        </div>


        <!-- CONTENT -->

        <div>


            <div class="tag">
                EVENT
            </div>


            <h1>
                <?= esc($event['title']) ?>
            </h1>


            <div class="info">


                <div class="info-row">

                    <span class="info-icon">
                        📅
                    </span>


                    <span class="info-text">

                        <?php if (!empty($event['date_start'])): ?>

                            <?= date(
                                'd M Y',
                                strtotime($event['date_start'])
                            ) ?>

                        <?php else: ?>

                            Tanggal belum tersedia

                        <?php endif; ?>


                        <?php if (!empty($event['date_end'])): ?>

                            —

                            <?= date(
                                'd M Y',
                                strtotime($event['date_end'])
                            ) ?>

                        <?php endif; ?>

                    </span>

                </div>


                <div class="info-row">

                    <span class="info-icon">
                        ⏰
                    </span>


                    <span class="info-text">

                        <?php if (!empty($event['time_start'])): ?>

                            <?= date(
                                'H:i',
                                strtotime($event['time_start'])
                            ) ?>

                        <?php else: ?>

                            -

                        <?php endif; ?>


                        <?php if (!empty($event['time_end'])): ?>

                            —

                            <?= date(
                                'H:i',
                                strtotime($event['time_end'])
                            ) ?>

                        <?php endif; ?>

                    </span>

                </div>


                <div class="info-row">

                    <span class="info-icon">
                        📍
                    </span>


                    <span class="info-text">

                        <?= esc(
                            $event['location_name'] ?? '-'
                        ) ?>


                        <?php if (!empty($event['address'])): ?>

                            <br>

                            <?= esc(
                                $event['address']
                            ) ?>

                        <?php endif; ?>

                    </span>

                </div>


                <div class="info-row">

                    <span class="info-icon">
                        💸
                    </span>


                    <span class="info-text">

                        <?php

                            $price = (float) (
                                $event['price'] ?? 0
                            );

                        ?>


                        <?php if ($price <= 0): ?>

                            FREE

                        <?php else: ?>

                            Rp
                            <?= number_format(
                                $price,
                                0,
                                ',',
                                '.'
                            ) ?>

                        <?php endif; ?>

                    </span>

                </div>


                <?php if (!empty($event['organizer_name'])): ?>

                    <div class="info-row">

                        <span class="info-icon">
                            👤
                        </span>


                        <span class="info-text">

                            <?= esc(
                                $event['organizer_name']
                            ) ?>

                        </span>

                    </div>

                <?php endif; ?>


            </div>


            <?php if (!empty($event['description'])): ?>

                <div class="description">

                    <?= nl2br(
                        esc(
                            $event['description']
                        )
                    ) ?>

                </div>

            <?php endif; ?>


            <?php

                $isPartner =
                    (int) (
                        $event['is_partner']
                        ?? 0
                    ) === 1;


                $price =
                    (float) (
                        $event['price']
                        ?? 0
                    );


                $isFree =
                    $price <= 0;


                $externalTicketUrl =
                    trim(
                        $event['registration_url']
                        ?? ''
                    );

            ?>


            <div class="ticket-area">


                <div class="ticket-label">
                    TICKET / REGISTRATION
                </div>


                <?php if ($isFree): ?>

                    <div class="free-button">
                        FREE EVENT
                    </div>


                    <div class="ticket-note">
                        Event ini tidak memerlukan
                        pembelian tiket.
                    </div>


                <?php elseif ($isPartner): ?>

                    <a
                        href="<?= base_url(
                            'checkout/' .
                            $event['slug']
                        ) ?>"
                        class="ticket-button"
                    >
                        🎟 BELI TIKET →
                    </a>


                    <div class="ticket-note">
                        Tiket tersedia melalui
                        NANG ENDI?.
                    </div>


                <?php elseif (!empty($externalTicketUrl)): ?>

                    <a
                        href="<?= esc(
                            $externalTicketUrl
                        ) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="ticket-button"
                    >
                        🎟 BELI TIKET →
                    </a>


                    <div class="ticket-note">
                        Kamu akan diarahkan ke
                        platform penjualan tiket.
                    </div>


                <?php else: ?>

                    <div class="ticket-info-button">
                        INFO TIKET BELUM TERSEDIA
                    </div>


                    <div class="ticket-note">
                        Informasi pembelian tiket
                        belum tersedia.
                    </div>

                <?php endif; ?>


            </div>


            <?php

                $latitude =
                    $event['latitude'] ?? '';


                $longitude =
                    $event['longitude'] ?? '';

            ?>


            <?php if (
                $latitude !== '' &&
                $longitude !== ''
            ): ?>


                <?php

                    $mapUrl =
                        'https://www.google.com/maps/search/?api=1&query=' .
                        rawurlencode(
                            $latitude . ',' . $longitude
                        );

                ?>


                <a
                    href="<?= esc($mapUrl) ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="location-button"
                >
                    📍 LIHAT LOKASI DI MAPS →
                </a>


            <?php endif; ?>


        </div>


    </div>


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