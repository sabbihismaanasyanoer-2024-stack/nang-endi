<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Places — NANG ENDI?</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            background: #f5f3ee;
            color: #171717;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        a {
            color: inherit;
            text-decoration: none;
        }


        /* =========================
           NAV
        ========================= */

        nav {
            height: 80px;

            padding: 0 5%;

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


        .nav-right {
            display: flex;
            align-items: center;

            gap: 25px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .nav-right a:hover {
            text-decoration: underline;
        }


        /* =========================
           PAGE
        ========================= */

        .page {
            width: 100%;

            max-width: 1500px;

            margin: 0 auto;

            padding: 70px 40px 100px;
        }


        /* =========================
           TOP SECTION
        ========================= */

        .top-section {
            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 40px;

            margin-bottom: 30px;
        }


        .eyebrow {
            margin-bottom: 18px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        h1 {
            font-size: clamp(70px, 9vw, 120px);

            line-height: .85;

            letter-spacing: -7px;
        }


        .btn-add {
            display: inline-block;

            padding: 16px 22px;

            border: 1px solid #171717;

            background: #171717;

            color: #fff;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;

            white-space: nowrap;

            transition: .2s ease;
        }


        .btn-add:hover {
            background: #fff;

            color: #171717;
        }


        /* =========================
           SUBCATEGORY FILTER
        ========================= */

        .category-filter {
            display: flex;

            flex-wrap: wrap;

            gap: 8px;

            margin-bottom: 35px;

            padding-bottom: 5px;
        }


        .category-filter a {
            display: inline-block;

            padding: 10px 14px;

            border: 1px solid #171717;

            background: transparent;

            color: #171717;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;

            transition: .15s ease;
        }


        .category-filter a:hover,
        .category-filter a.active {
            background: #171717;

            color: #fff;
        }


        /* =========================
           TABLE
        ========================= */

        .table-container {
            width: 100%;

            overflow-x: auto;

            border-top: 1px solid #171717;
        }


        table {
            width: 100%;

            min-width: 1050px;

            border-collapse: collapse;

            background: #fff;

            font-size: 11px;

            table-layout: fixed;
        }


        thead {
            background: #171717;

            color: #fff;
        }


        th {
            padding: 14px 14px;

            text-align: left;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        td {
            padding: 16px 14px;

            border-bottom: 1px solid #d5d2cc;

            vertical-align: middle;
        }


        tbody tr {
            transition: .15s ease;
        }


        tbody tr:hover {
            background: #f5f3ee;
        }


        /* =========================
           COLUMN WIDTH
        ========================= */

        th:nth-child(1),
        td:nth-child(1) {
            width: 90px;
        }


        th:nth-child(2),
        td:nth-child(2) {
            width: 22%;
        }


        th:nth-child(3),
        td:nth-child(3) {
            width: 17%;
        }


        th:nth-child(4),
        td:nth-child(4) {
            width: 24%;
        }


        th:nth-child(5),
        td:nth-child(5) {
            width: 15%;
        }


        th:nth-child(6),
        td:nth-child(6) {
            width: 190px;
        }


        /* =========================
           IMAGE
        ========================= */

        .place-image {
            width: 62px;
            height: 52px;

            object-fit: cover;

            display: block;

            border: 1px solid #171717;

            background: #d1b18a;
        }


        /* =========================
           PLACE
        ========================= */

        .place-name {
            font-size: 13px;

            font-weight: 800;

            line-height: 1.15;

            margin-bottom: 5px;
        }


        .place-slug {
            font-size: 8px;

            color: #777;

            letter-spacing: .3px;

            word-break: break-word;
        }


        /* =========================
           SUBCATEGORY BADGE
        ========================= */

        .subcategory-list {
            display: flex;

            flex-wrap: wrap;

            gap: 5px;
        }


        .badge {
            display: inline-block;

            padding: 6px 8px;

            border: 1px solid #171717;

            background: #fff;

            font-size: 8px;

            font-weight: 800;

            text-transform: uppercase;

            white-space: nowrap;
        }


        /* =========================
           ADDRESS
        ========================= */

        .address {
            max-width: 100%;

            line-height: 1.45;
        }


        /* =========================
           HOURS
        ========================= */

        .hours {
            line-height: 1.45;
        }


        /* =========================
           ACTIONS
        ========================= */

        .actions {
            display: flex;

            flex-wrap: wrap;

            align-items: center;

            gap: 6px;

            min-width: 150px;
        }


        .actions form {
            display: inline-block;

            margin: 0;

            padding: 0;
        }


        .btn-action {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 7px 10px;

            min-height: 28px;

            border: 1px solid #171717;

            background: #fff;

            color: #171717;

            font-family: inherit;

            font-size: 8px;

            font-weight: 800;

            letter-spacing: .5px;

            text-transform: uppercase;

            text-decoration: none;

            cursor: pointer;

            transition: .15s ease;
        }


        .btn-action:hover {
            background: #171717;

            color: #fff;
        }


        .btn-delete {
            background: #eee5e2;
        }


        .btn-delete:hover {
            background: #171717;

            color: #fff;
        }


        /* =========================
           EMPTY
        ========================= */

        .empty {
            padding: 60px 20px;

            text-align: center;

            font-size: 12px;

            color: #777;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            nav {
                padding: 0 5%;
            }


            .page {
                padding: 55px 25px 80px;
            }


            .top-section {
                align-items: flex-start;

                flex-direction: column;
            }


            .btn-add {
                margin-top: 5px;
            }

        }


        @media (max-width: 700px) {

            nav {
                height: 70px;
            }


            .logo {
                font-size: 22px;
            }


            .nav-right {
                gap: 12px;

                font-size: 8px;
            }


            .nav-right span {
                display: none;
            }


            .page {
                padding: 50px 18px 70px;
            }


            h1 {
                font-size: 70px;

                letter-spacing: -5px;
            }


            .category-filter {
                gap: 6px;
            }


            .category-filter a {
                padding: 9px 11px;

                font-size: 8px;
            }


            .table-container {
                overflow-x: auto;
            }


            table {
                min-width: 1050px;
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


    <div class="nav-right">

        <span>
            ADMIN / PLACES
        </span>


        <a href="<?= base_url('admin') ?>">
            ← DASHBOARD
        </a>

    </div>

</nav>



<main class="page">


    <!-- =========================
         HEADER
    ========================= -->

    <div class="top-section">


        <div>

            <div class="eyebrow">
                ADMINISTRATION / PLACES
            </div>


            <h1>
                PLACES.
            </h1>

        </div>


        <a
            href="<?= base_url('admin/places/create') ?>"
            class="btn-add"
        >
            + Tambah Place
        </a>


    </div>



    <!-- =========================
         SUBCATEGORY FILTER
    ========================= -->

    <div class="category-filter">


        <a
            href="<?= base_url('admin/places?subcategory=all') ?>"
            class="<?= (
                empty($subcategory) ||
                strtoupper($subcategory) === 'ALL'
            ) ? 'active' : '' ?>"
        >
            SEMUA
        </a>


        <?php if (!empty($subcategories)): ?>

            <?php foreach ($subcategories as $item): ?>

                <a
                    href="<?= base_url(
                        'admin/places?subcategory=' .
                        urlencode($item)
                    ) ?>"
                    class="<?= (
                        strtoupper($subcategory) ===
                        strtoupper($item)
                    ) ? 'active' : '' ?>"
                >
                    <?= esc($item) ?>
                </a>

            <?php endforeach; ?>

        <?php endif; ?>


    </div>



    <!-- =========================
         TABLE
    ========================= -->

    <div class="table-container">


        <table>


            <thead>

                <tr>

                    <th>
                        Gambar
                    </th>

                    <th>
                        Place
                    </th>

                    <th>
                        Subcategory
                    </th>

                    <th>
                        Alamat
                    </th>

                    <th>
                        Jam Buka
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>



            <tbody>


                <?php if (!empty($places)): ?>


                    <?php foreach ($places as $place): ?>


                        <tr>


                            <!-- GAMBAR -->

                            <td>

                                <?php if (!empty($place['image'])): ?>

                                    <img
                                        src="<?= base_url(
                                            $place['image']
                                        ) ?>"
                                        alt="<?= esc(
                                            $place['name']
                                        ) ?>"
                                        class="place-image"
                                    >

                                <?php else: ?>

                                    <div class="place-image"></div>

                                <?php endif; ?>

                            </td>



                            <!-- PLACE -->

                            <td>

                                <div class="place-name">

                                    <?= esc(
                                        $place['name']
                                    ) ?>

                                </div>


                                <div class="place-slug">

                                    <?= esc(
                                        $place['slug']
                                    ) ?>

                                </div>

                            </td>



                            <!-- SUBCATEGORY -->

                            <td>

                                <?php

                                    $subcategoryNames =
                                        $place['subcategory_names']
                                        ?? [];

                                ?>


                                <?php if (!empty($subcategoryNames)): ?>

                                    <div class="subcategory-list">

                                        <?php foreach (
                                            $subcategoryNames
                                            as $subcategory
                                        ): ?>

                                            <span class="badge">

                                                <?= esc(
                                                    strtoupper(
                                                        $subcategory
                                                    )
                                                ) ?>

                                            </span>

                                        <?php endforeach; ?>

                                    </div>

                                <?php elseif (
                                    !empty(
                                        $place['subcategory']
                                    )
                                ): ?>

                                    <span class="badge">

                                        <?= esc(
                                            strtoupper(
                                                $place['subcategory']
                                            )
                                        ) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="badge">
                                        -
                                    </span>

                                <?php endif; ?>

                            </td>



                            <!-- ALAMAT -->

                            <td>

                                <div class="address">

                                    <?= esc(
                                        $place['address']
                                        ?? '-'
                                    ) ?>

                                </div>

                            </td>



                            <!-- JAM BUKA -->

                            <td>

                                <div class="hours">

                                    <?php if (
                                        !empty(
                                            $place['opening_hours']
                                        )
                                    ): ?>

                                        <?= esc(
                                            $place['opening_hours']
                                        ) ?>

                                    <?php elseif (
                                        !empty(
                                            $place['open_time']
                                        ) ||
                                        !empty(
                                            $place['close_time']
                                        )
                                    ): ?>

                                        <?= esc(
                                            $place['open_time']
                                            ?? '-'
                                        ) ?>

                                        -

                                        <?= esc(
                                            $place['close_time']
                                            ?? '-'
                                        ) ?>

                                    <?php else: ?>

                                        -

                                    <?php endif; ?>

                                </div>

                            </td>



                            <!-- AKSI -->

                            <td>

                                <div class="actions">


                                    <!-- EDIT -->

                                    <a
                                        href="<?= base_url(
                                            'admin/places/edit/' .
                                            $place['id']
                                        ) ?>"
                                        class="btn-action"
                                    >
                                        Edit
                                    </a>


                                    <!-- VIEW -->

                                    <a
                                        href="<?= base_url(
                                            'admin/places/view/' .
                                            $place['id']
                                        ) ?>"
                                        class="btn-action"
                                    >
                                        View
                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        action="<?= site_url(
                                            'admin/places/delete/' .
                                            $place['id']
                                        ) ?>"
                                        method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Yakin ingin menghapus <?= esc($place['name'], 'js') ?>?');"
                                    >

                                        <?= csrf_field() ?>

                                        <button
                                            type="submit"
                                            class="btn-action btn-delete"
                                        >
                                            Hapus
                                        </button>

                                    </form>


                                </div>

                            </td>


                        </tr>


                    <?php endforeach; ?>


                <?php else: ?>


                    <tr>

                        <td
                            colspan="6"
                            class="empty"
                        >
                            Tidak ada place dalam filter ini.
                        </td>

                    </tr>


                <?php endif; ?>


            </tbody>


        </table>


    </div>


</main>


</body>

</html>