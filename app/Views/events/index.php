<?php
/*
|--------------------------------------------------------------------------
| EVENTS — NANG ENDI?
|--------------------------------------------------------------------------
*/
?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Events — NANG ENDI?</title>


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


        button,
        input {
            font-family: inherit;
        }


        /* ==================================================
           NAVBAR
        ================================================== */

        nav {

            min-height: 70px;

            padding: 0 7%;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom: 1px solid #171717;

            background: #f5f3ee;
        }


        .logo {

            font-size: 24px;

            font-weight: 900;

            letter-spacing: -1px;

            white-space: nowrap;
        }


        .nav-menu {

            display: flex;

            align-items: center;

            gap: 28px;

            font-size: 11px;

            font-weight: 800;
        }


        .nav-menu a:hover {
            text-decoration: underline;
        }


        /* ==================================================
           MAIN CONTAINER
        ================================================== */

        .page {

            width: min(
                810px,
                86%
            );

            margin: 0 auto;
        }


        /* ==================================================
           HERO
        ================================================== */

        .hero {

            padding:
                60px
                0
                45px;
        }


        .eyebrow {

            margin-bottom: 20px;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        .hero h1 {

            font-size:
                clamp(
                    70px,
                    11vw,
                    105px
                );

            line-height: .82;

            letter-spacing: -6px;

            font-weight: 900;
        }


        .intro {

            max-width: 650px;

            margin-top: 28px;

            font-size: 15px;

            line-height: 1.6;
        }


        /* ==================================================
           FILTER
        ================================================== */

        .filter-section {

            padding:
                0
                0
                22px;

            border-bottom:
                1px solid #171717;
        }


        .search-wrapper {

            display: flex;

            width: 100%;

            gap: 9px;
        }


        .search-input {

            flex: 1;

            min-width: 0;

            height: 45px;

            padding:
                0 14px;

            border:
                1px solid #171717;

            background: #fff;

            color: #171717;

            font-size: 12px;

            outline: none;
        }


        .search-input:focus {

            box-shadow:
                inset
                0
                0
                0
                1px
                #171717;
        }


        .search-button {

            height: 45px;

            padding:
                0 22px;

            border:
                1px solid #171717;

            background: #171717;

            color: #fff;

            font-size: 10px;

            font-weight: 800;

            cursor: pointer;

            white-space: nowrap;
        }


        .search-button:hover {

            background: transparent;

            color: #171717;
        }


        .categories {

            display: flex;

            flex-wrap: wrap;

            gap: 7px;

            margin-top: 12px;
        }


        .category-button {

            padding:
                9px 14px;

            border:
                1px solid #171717;

            background: transparent;

            color: #171717;

            font-size: 9px;

            font-weight: 800;

            cursor: pointer;

            transition: .15s ease;
        }


        .category-button:hover,
        .category-button.active {

            background: #171717;

            color: #fff;
        }


        /* ==================================================
           EVENTS
        ================================================== */

        .events-section {

            padding:
                38px
                0
                80px;
        }


        .section-heading {

            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;
        }


        .section-heading h2 {

            font-size:
                clamp(
                    42px,
                    6vw,
                    62px
                );

            line-height: .84;

            letter-spacing: -4px;

            font-weight: 900;
        }


        .result-count {

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1px;

            white-space: nowrap;
        }


        /* ==================================================
           EVENT GRID
        ================================================== */

        .events-grid {

            display: grid;

            grid-template-columns:
                repeat(
                    3,
                    minmax(0, 1fr)
                );

            gap: 14px;
        }


        /* ==================================================
           EVENT CARD
        ================================================== */

        .event-card {

            display: flex;

            flex-direction: column;

            min-width: 0;

            border:
                1px solid #171717;

            background: #fff;

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }


        .event-card:hover {

            transform:
                translateY(-3px);

            box-shadow:
                5px 5px 0 #171717;
        }


        /* ==================================================
           IMAGE
        ================================================== */

        .event-image {

            width: 100%;

            height: 190px;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            background: #ded8ce;

            border-bottom:
                1px solid #171717;
        }


        .event-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;
        }


        .event-placeholder {

            font-size: 50px;
        }


        /* ==================================================
           CONTENT
        ================================================== */

        .event-content {

            padding: 17px;

            display: flex;

            flex-direction: column;

            flex: 1;
        }


        .event-tag {

            display: inline-flex;

            align-self: flex-start;

            margin-bottom: 10px;

            padding:
                5px 7px;

            border:
                1px solid #171717;

            font-size: 7px;

            font-weight: 900;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .event-title {

            font-size: 20px;

            line-height: 1;

            margin-bottom: 15px;

            font-weight: 900;
        }


        .event-info {

            font-size: 11px;

            line-height: 1.7;
        }


        .event-info-row {

            display: flex;

            align-items: flex-start;

            gap: 7px;
        }


        .event-info-icon {

            width: 15px;

            flex-shrink: 0;

            font-size: 10px;
        }


        /* ==================================================
           BUTTONS
        ================================================== */

        .event-actions {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 7px;

            margin-top: auto;

            padding-top: 17px;

            border-top:
                1px solid #171717;
        }


        .event-button {

            min-height: 36px;

            display: flex;

            align-items: center;

            justify-content: center;

            border:
                1px solid #171717;

            font-size: 8px;

            font-weight: 900;

            text-align: center;

            transition: .2s ease;
        }


        .detail-button {

            background: transparent;

            color: #171717;
        }


        .detail-button:hover {

            background: #171717;

            color: #fff;
        }


        .ticket-button {

            background: #171717;

            color: #fff;
        }


        .ticket-button:hover {

            background: #c4a47e;

            color: #171717;
        }


        /* ==================================================
           EMPTY
        ================================================== */

        .empty {

            padding:
                50px 0;

            font-size: 14px;

            line-height: 1.6;
        }


        /* ==================================================
           FOOTER
        ================================================== */

        footer {

            width: min(
                810px,
                86%
            );

            margin:
                0 auto;

            padding:
                45px 0
                60px;

            border-top:
                1px solid #171717;
        }


        footer h2 {

            font-size: 40px;

            letter-spacing: -3px;

            font-weight: 900;
        }


        footer p {

            margin-top: 5px;

            font-size: 12px;
        }


        /* ==================================================
           TABLET
        ================================================== */

        @media (max-width: 900px) {

            .page,
            footer {

                width: 90%;
            }


            .events-grid {

                grid-template-columns:
                    repeat(
                        2,
                        minmax(0, 1fr)
                    );
            }

        }


        /* ==================================================
           MOBILE
        ================================================== */

        @media (max-width: 700px) {

            nav {

                min-height: 65px;

                padding:
                    0 5%;
            }


            .logo {

                font-size: 20px;
            }


            .nav-menu {

                gap: 12px;

                font-size: 9px;
            }


            .page,
            footer {

                width: 90%;
            }


            .hero {

                padding:
                    48px
                    0
                    38px;
            }


            .hero h1 {

                font-size:
                    clamp(
                        65px,
                        18vw,
                        95px
                    );

                letter-spacing: -5px;
            }


            .intro {

                margin-top: 23px;

                font-size: 14px;
            }


            .search-wrapper {

                flex-direction: column;
            }


            .search-input,
            .search-button {

                width: 100%;
            }


            .categories {

                gap: 6px;
            }


            .category-button {

                padding:
                    9px 11px;
            }


            .events-section {

                padding:
                    38px
                    0
                    65px;
            }


            .section-heading {

                align-items: flex-start;

                flex-direction: column;

                gap: 10px;
            }


            .section-heading h2 {

                font-size: 50px;
            }


            .events-grid {

                grid-template-columns: 1fr;

                gap: 15px;
            }


            .event-image {

                height: 220px;
            }


            .event-title {

                font-size: 24px;
            }


            footer {

                padding:
                    40px
                    0
                    50px;
            }

        }


        /* ==================================================
           SMALL MOBILE
        ================================================== */

        @media (max-width: 450px) {

            .nav-menu {

                gap: 8px;

                font-size: 8px;
            }


            .logo {

                font-size: 18px;
            }


            .event-actions {

                grid-template-columns: 1fr;
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


<!-- ==================================================
     PAGE
================================================== -->

<main class="page">


    <!-- ==================================================
         HERO
    ================================================== -->

    <header class="hero">

        <div class="eyebrow">
            EVENTS / SURABAYA
        </div>


        <h1>
            WHAT'S<br>
            ON?
        </h1>


        <p class="intro">
            Cari tahu apa yang lagi terjadi di Surabaya.
            Dari musik, pameran, festival, workshop,
            sampai kegiatan komunitas.
        </p>

    </header>


    <!-- ==================================================
         SEARCH + FILTER
    ================================================== -->

    <section class="filter-section">


        <div class="search-wrapper">

            <input
                type="text"
                id="eventSearch"
                class="search-input"
                placeholder="Cari event atau lokasi..."
                autocomplete="off"
            >


            <button
                type="button"
                id="searchButton"
                class="search-button"
            >
                SEARCH →
            </button>

        </div>


        <!--
        ==================================================
        KATEGORI TETAP SEPERTI VERSI LAMA
        ==================================================
        -->

        <div class="categories">


            <button
                type="button"
                class="category-button active"
                data-category="all"
            >
                ALL
            </button>


            <button
                type="button"
                class="category-button"
                data-category="music-festival"
            >
                MUSIC & FESTIVAL
            </button>


            <button
                type="button"
                class="category-button"
                data-category="art"
            >
                ART
            </button>


            <button
                type="button"
                class="category-button"
                data-category="food"
            >
                FOOD
            </button>


            <button
                type="button"
                class="category-button"
                data-category="community"
            >
                COMMUNITY
            </button>


            <button
                type="button"
                class="category-button"
                data-category="workshop"
            >
                WORKSHOP
            </button>


        </div>


    </section>


    <!-- ==================================================
         EVENT LIST
    ================================================== -->

    <section class="events-section">


        <div class="section-heading">


            <h2>
                EVENTS.
            </h2>


            <div
                class="result-count"
                id="resultCount"
            >
                <?= count($events) ?> EVENT
            </div>


        </div>


        <?php if (!empty($events)): ?>


            <div
                class="events-grid"
                id="eventsGrid"
            >


                <?php foreach ($events as $event): ?>


                    <?php

                    /*
                    |--------------------------------------------------------------------------
                    | CATEGORY MAP
                    |--------------------------------------------------------------------------
                    | Tetap mengikuti kategori Events lama.
                    |
                    | 1  = MUSIC
                    | 7  = FESTIVAL
                    | 2  = ART
                    | 3  = FOOD
                    | 8  = COMMUNITY
                    | 16 = WORKSHOP
                    |--------------------------------------------------------------------------
                    */

                    $categoryMap = [

                        1 => [
                            'slug'  => 'music-festival',
                            'label' => 'MUSIC'
                        ],

                        2 => [
                            'slug'  => 'art',
                            'label' => 'ART & EXHIBITION'
                        ],

                        3 => [
                            'slug'  => 'food',
                            'label' => 'FOOD & CULINARY'
                        ],

                        4 => [
                            'slug'  => 'culture',
                            'label' => 'CULTURE & HERITAGE'
                        ],

                        5 => [
                            'slug'  => 'education',
                            'label' => 'EDUCATION'
                        ],

                        6 => [
                            'slug'  => 'sport',
                            'label' => 'SPORT'
                        ],

                        7 => [
                            'slug'  => 'music-festival',
                            'label' => 'FESTIVAL'
                        ],

                        8 => [
                            'slug'  => 'community',
                            'label' => 'COMMUNITY'
                        ],

                        16 => [
                            'slug'  => 'workshop',
                            'label' => 'WORKSHOP'
                        ],

                    ];


                    $categoryId =
                        (int) (
                            $event['category_id']
                            ?? 0
                        );


                    $category =
                        $categoryMap[$categoryId]
                        ?? [
                            'slug'  => 'other',
                            'label' => 'EVENT'
                        ];


                    $eventCategory =
                        $category['slug'];


                    $eventCategoryLabel =
                        $category['label'];


                    /*
                    |--------------------------------------------------------------------------
                    | SEARCH DATA
                    |--------------------------------------------------------------------------
                    */

                    $title =
                        strtolower(
                            $event['title']
                            ?? ''
                        );


                    $description =
                        strtolower(
                            $event['description']
                            ?? ''
                        );


                    $location =
                        strtolower(
                            $event['location_name']
                            ?? ''
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | PARTNER
                    |--------------------------------------------------------------------------
                    */

                    $isPartner =
                        (int) (
                            $event['is_partner']
                            ?? 0
                        ) === 1;


                    /*
                    |--------------------------------------------------------------------------
                    | EXTERNAL TICKET
                    |--------------------------------------------------------------------------
                    */

                    $externalTicketUrl =
                        !empty(
                            $event['registration_url']
                        )
                            ? trim(
                                $event['registration_url']
                            )
                            : '';

                    ?>


                    <article
                        class="event-card"

                        data-title="<?= esc($title) ?>"

                        data-description="<?= esc($description) ?>"

                        data-location="<?= esc($location) ?>"

                        data-category="<?= esc($eventCategory) ?>"
                    >


                        <!-- IMAGE -->

                        <div class="event-image">


                            <?php if (!empty($event['image'])): ?>

                                <img
                                    src="<?= base_url($event['image']) ?>"
                                    alt="<?= esc($event['title']) ?>"
                                >


                            <?php else: ?>

                                <div class="event-placeholder">
                                    🎪
                                </div>

                            <?php endif; ?>


                        </div>


                        <!-- CONTENT -->

                        <div class="event-content">


                            <div class="event-tag">

                                <?= esc(
                                    $eventCategoryLabel
                                ) ?>

                            </div>


                            <h3 class="event-title">

                                <?= esc(
                                    $event['title']
                                ) ?>

                            </h3>


                            <div class="event-info">


                                <!-- DATE -->

                                <div class="event-info-row">

                                    <span class="event-info-icon">
                                        📅
                                    </span>


                                    <span>

                                        <?php if (
                                            !empty(
                                                $event['date_start']
                                            )
                                        ): ?>

                                            <?= date(
                                                'd M Y',
                                                strtotime(
                                                    $event['date_start']
                                                )
                                            ) ?>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>


                                        <?php if (
                                            !empty(
                                                $event['date_end']
                                            )
                                        ): ?>

                                            —
                                            <?= date(
                                                'd M Y',
                                                strtotime(
                                                    $event['date_end']
                                                )
                                            ) ?>

                                        <?php endif; ?>

                                    </span>

                                </div>


                                <!-- TIME -->

                                <div class="event-info-row">

                                    <span class="event-info-icon">
                                        ⏰
                                    </span>


                                    <span>

                                        <?php if (
                                            !empty(
                                                $event['time_start']
                                            )
                                        ): ?>

                                            <?= date(
                                                'H:i',
                                                strtotime(
                                                    $event['time_start']
                                                )
                                            ) ?>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>


                                        <?php if (
                                            !empty(
                                                $event['time_end']
                                            )
                                        ): ?>

                                            —
                                            <?= date(
                                                'H:i',
                                                strtotime(
                                                    $event['time_end']
                                                )
                                            ) ?>

                                        <?php endif; ?>

                                    </span>

                                </div>


                                <!-- LOCATION -->

                                <div class="event-info-row">

                                    <span class="event-info-icon">
                                        📍
                                    </span>


                                    <span>

                                        <?= esc(
                                            $event['location_name']
                                            ?? '-'
                                        ) ?>

                                    </span>

                                </div>


                                <!-- PRICE -->

                                <div class="event-info-row">

                                    <span class="event-info-icon">
                                        💸
                                    </span>


                                    <span>

                                        <?php if (
                                            empty(
                                                $event['price']
                                            )
                                        ): ?>

                                            FREE

                                        <?php else: ?>

                                            Rp
                                            <?= number_format(
                                                (int)
                                                $event['price'],
                                                0,
                                                ',',
                                                '.'
                                            ) ?>

                                        <?php endif; ?>

                                    </span>

                                </div>


                            </div>


                            <!-- ACTIONS -->

                            <div class="event-actions">


                                <!-- DETAIL -->

                                <a
                                    href="<?= base_url(
                                        'events/' .
                                        $event['slug']
                                    ) ?>"
                                    class="event-button detail-button"
                                >
                                    DETAIL
                                </a>


                                <!-- TICKET -->

                                <?php if ($isPartner): ?>


                                    <a
                                        href="<?= base_url(
                                            'checkout/' .
                                            $event['slug']
                                        ) ?>"
                                        class="event-button ticket-button"
                                    >
                                        BELI TIKET →
                                    </a>


                                <?php elseif (
                                    !empty(
                                        $externalTicketUrl
                                    )
                                ): ?>


                                    <a
                                        href="<?= esc(
                                            $externalTicketUrl
                                        ) ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="event-button ticket-button"
                                    >
                                        BELI TIKET →
                                    </a>


                                <?php else: ?>


                                    <a
                                        href="<?= base_url(
                                            'events/' .
                                            $event['slug']
                                        ) ?>"
                                        class="event-button ticket-button"
                                    >
                                        LIHAT TIKET →
                                    </a>


                                <?php endif; ?>


                            </div>


                        </div>


                    </article>


                <?php endforeach; ?>


            </div>


            <!-- EMPTY SEARCH -->

            <div
                id="emptySearch"
                class="empty"
                style="display:none;"
            >
                Event yang kamu cari tidak ditemukan.
            </div>


        <?php else: ?>


            <p class="empty">
                Belum ada event yang tersedia.
            </p>


        <?php endif; ?>


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


<!-- ==================================================
     JAVASCRIPT
================================================== -->

<script>

    const searchInput =
        document.getElementById(
            'eventSearch'
        );


    const searchButton =
        document.getElementById(
            'searchButton'
        );


    const eventCards =
        document.querySelectorAll(
            '.event-card'
        );


    const resultCount =
        document.getElementById(
            'resultCount'
        );


    const emptySearch =
        document.getElementById(
            'emptySearch'
        );


    const categoryButtons =
        document.querySelectorAll(
            '.category-button'
        );


    let activeCategory = 'all';


    function filterEvents() {


        const keyword =
            searchInput.value
                .toLowerCase()
                .trim();


        let visibleCount = 0;


        eventCards.forEach(
            function(card) {


                const title =
                    card.dataset.title || '';


                const description =
                    card.dataset.description || '';


                const location =
                    card.dataset.location || '';


                const category =
                    card.dataset.category || '';


                const matchesSearch =

                    keyword === ''

                    ||

                    title.includes(keyword)

                    ||

                    description.includes(keyword)

                    ||

                    location.includes(keyword);


                const matchesCategory =

                    activeCategory === 'all'

                    ||

                    category === activeCategory;


                if (
                    matchesSearch &&
                    matchesCategory
                ) {

                    card.style.display = '';

                    visibleCount++;

                } else {

                    card.style.display = 'none';

                }

            }
        );


        resultCount.textContent =
            visibleCount + ' EVENT';


        if (emptySearch) {

            emptySearch.style.display =

                visibleCount === 0
                    ? 'block'
                    : 'none';

        }

    }


    /* ==================================================
       LIVE SEARCH
    ================================================== */

    if (searchInput) {

        searchInput.addEventListener(
            'input',
            filterEvents
        );

    }


    /* ==================================================
       SEARCH BUTTON
    ================================================== */

    if (searchButton) {

        searchButton.addEventListener(
            'click',
            filterEvents
        );

    }


    /* ==================================================
       CATEGORY FILTER
    ================================================== */

    categoryButtons.forEach(
        function(button) {

            button.addEventListener(
                'click',
                function() {


                    categoryButtons.forEach(
                        function(btn) {

                            btn.classList.remove(
                                'active'
                            );

                        }
                    );


                    button.classList.add(
                        'active'
                    );


                    activeCategory =
                        button.dataset.category;


                    filterEvents();

                }
            );

        }
    );


</script>


</body>

</html>