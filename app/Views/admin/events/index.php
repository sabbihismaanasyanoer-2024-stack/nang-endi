<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Events — NANG ENDI?</title>


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


        .page {
            max-width: 1200px;

            margin: auto;

            padding: 70px 7% 100px;
        }


        .top {
            display: flex;

            align-items: flex-end;
            justify-content: space-between;

            gap: 30px;

            margin-bottom: 50px;
        }


        .eyebrow {
            margin-bottom: 15px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        h1 {
            font-size: clamp(55px, 8vw, 100px);

            line-height: .85;

            letter-spacing: -6px;
        }


        .add-button {
            display: inline-block;

            padding: 16px 22px;

            border: 1px solid #171717;

            background: #171717;

            color: #fff;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .add-button:hover {
            background: #fff;

            color: #171717;
        }


        .message {
            margin-bottom: 30px;

            padding: 15px 18px;

            border: 1px solid #171717;

            background: #fff;

            font-size: 13px;
        }


        .table-wrapper {
            overflow-x: auto;

            border-top: 1px solid #171717;
        }


        table {
            width: 100%;

            border-collapse: collapse;

            background: #fff;
        }


        th {
            padding: 18px 15px;

            border-bottom: 1px solid #171717;

            text-align: left;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        td {
            padding: 20px 15px;

            border-bottom: 1px solid #ccc;

            vertical-align: middle;

            font-size: 13px;
        }


        tbody tr:hover {
            background: #f0eee8;
        }


        .event-title {
            font-weight: 800;

            font-size: 15px;
        }


        .event-location {
            margin-top: 5px;

            color: #666;

            font-size: 11px;
        }


        .status {
            display: inline-block;

            padding: 6px 9px;

            border: 1px solid #171717;

            font-size: 9px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .actions {
            display: flex;

            gap: 10px;

            align-items: center;
        }


        .action {
            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .action:hover {
            text-decoration: underline;
        }


        .delete-form {
            display: inline;
        }


        .delete-button {
            border: none;

            padding: 0;

            background: none;

            color: #171717;

            cursor: pointer;

            font-family: inherit;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .delete-button:hover {
            text-decoration: underline;
        }


        .empty {
            padding: 50px 20px;

            text-align: center;

            font-size: 13px;
        }


        .back-section {
            margin-top: 40px;

            padding-top: 25px;

            border-top: 1px solid #171717;
        }


        .back-link {
            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .back-link:hover {
            text-decoration: underline;
        }


        @media (max-width: 700px) {

            .page {
                padding: 50px 5% 80px;
            }


            .top {
                flex-direction: column;

                align-items: flex-start;
            }


            h1 {
                letter-spacing: -4px;
            }


            .nav-right {
                gap: 12px;
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
            ADMIN / EVENTS
        </span>


        <a href="<?= base_url('admin') ?>">
            ← DASHBOARD
        </a>

    </div>

</nav>



<main class="page">


    <div class="top">

        <div>

            <div class="eyebrow">
                ADMINISTRATION / EVENTS
            </div>


            <h1>
                EVENTS.
            </h1>

        </div>


        <a
            href="<?= base_url('admin/events/create') ?>"
            class="add-button"
        >
            + Tambah Event
        </a>

    </div>



    <?php if (session()->getFlashdata('success')): ?>

        <div class="message">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="message">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>



    <div class="table-wrapper">

        <?php if (!empty($events)): ?>

            <table>

                <thead>

                    <tr>

                        <th>
                            Event
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Lokasi
                        </th>

                        <th>
                            Harga
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php foreach ($events as $event): ?>

                        <tr>

                            <td>

                                <div class="event-title">
                                    <?= esc($event['title']) ?>
                                </div>

                                <div class="event-location">
                                    <?= esc($event['slug']) ?>
                                </div>

                            </td>


                            <td>

                                <?= esc($event['date_start'] ?? '-') ?>

                                <?php if (!empty($event['date_end'])): ?>

                                    <br>
                                    s/d
                                    <?= esc($event['date_end']) ?>

                                <?php endif; ?>

                            </td>


                            <td>

                                <?= esc($event['location_name'] ?? '-') ?>

                            </td>


                            <td>

                                Rp <?= number_format(
                                    (float) ($event['price'] ?? 0),
                                    0,
                                    ',',
                                    '.'
                                ) ?>

                            </td>


                            <td>

                                <span class="status">

                                    <?= esc(
                                        $event['status'] ?? 'draft'
                                    ) ?>

                                </span>

                            </td>


                            <td>

                                <div class="actions">

                                    <a
                                        href="<?= base_url(
                                            'admin/events/edit/' . $event['id']
                                        ) ?>"
                                        class="action"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="<?= base_url(
                                            'admin/events/delete/' . $event['id']
                                        ) ?>"
                                        method="post"
                                        class="delete-form"
                                        onsubmit="return confirm('Yakin ingin menghapus event ini?');"
                                    >

                                        <?= csrf_field() ?>

                                        <button
                                            type="submit"
                                            class="delete-button"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php else: ?>

            <div class="empty">

                Belum ada event yang tersedia.

            </div>

        <?php endif; ?>

    </div>



    <div class="back-section">

        <a
            href="<?= base_url('admin') ?>"
            class="back-link"
        >
            ← Kembali ke Menu
        </a>

    </div>


</main>


</body>

</html>