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
            font-family: Arial, Helvetica, sans-serif;
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
        }

        .logo {
            font-size: 28px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .nav-right {
            display: flex;
            gap: 25px;
            align-items: center;
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

        .back {
            display: inline-block;
            margin-bottom: 35px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .back:hover {
            text-decoration: underline;
        }

        .eyebrow {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        h1 {
            font-size: clamp(55px, 8vw, 100px);
            line-height: .85;
            letter-spacing: -6px;
            margin-bottom: 40px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .button {
            display: inline-block;
            padding: 14px 20px;
            border: 1px solid #171717;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .button.primary {
            background: #171717;
            color: #fff;
        }

        .button:hover {
            opacity: .75;
        }

        .message {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #171717;
            font-size: 12px;
        }

        .table-wrap {
            overflow-x: auto;
            border-top: 1px solid #171717;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 18px 12px;
            border-bottom: 1px solid #d0ccc5;
            text-align: left;
            font-size: 12px;
        }

        th {
            font-size: 9px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .title {
            font-weight: 800;
        }

        .status {
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .action {
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .action:hover {
            text-decoration: underline;
        }

        .delete {
            border: 0;
            background: none;
            cursor: pointer;
            font: inherit;
        }

        @media (max-width: 700px) {
            .page {
                padding: 50px 5% 80px;
            }

            .top-bar {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            h1 {
                letter-spacing: -4px;
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

        <a href="<?= base_url('admin') ?>">
            ← DASHBOARD
        </a>

        <a href="<?= base_url('admin/logout') ?>">
            LOGOUT
        </a>

    </div>

</nav>


<main class="page">

    <a
        href="<?= base_url('admin') ?>"
        class="back"
    >
        ← Kembali ke Dashboard
    </a>


    <div class="eyebrow">
        ADMINISTRATION / EVENTS
    </div>

    <h1>
        EVENTS.
    </h1>


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


    <div class="top-bar">

        <div>
            Kelola seluruh event NANG ENDI?
        </div>

        <a
            href="<?= base_url('admin/events/create') ?>"
            class="button primary"
        >
            + Tambah Event
        </a>

    </div>


    <div class="table-wrap">

        <table>

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Event</th>

                    <th>Tanggal</th>

                    <th>Lokasi</th>

                    <th>Harga</th>

                    <th>Status</th>

                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody>

                <?php if (!empty($events)): ?>

                    <?php foreach ($events as $event): ?>

                        <tr>

                            <td>
                                <?= esc($event['id']) ?>
                            </td>

                            <td class="title">
                                <?= esc($event['title']) ?>
                            </td>

                            <td>
                                <?= esc($event['date_start']) ?>
                            </td>

                            <td>
                                <?= esc($event['location_name']) ?>
                            </td>

                            <td>
                                Rp <?= number_format(
                                    (float) ($event['price'] ?? 0),
                                    0,
                                    ',',
                                    '.'
                                ) ?>
                            </td>

                            <td class="status">
                                <?= esc($event['status']) ?>
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="<?= base_url(
                                            'admin/events/edit/' .
                                            $event['id']
                                        ) ?>"
                                        class="action"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="<?= base_url(
                                            'admin/events/delete/' .
                                            $event['id']
                                        ) ?>"
                                        method="post"
                                        onsubmit="return confirm('Hapus event ini?')"
                                    >

                                        <?= csrf_field() ?>

                                        <button
                                            type="submit"
                                            class="action delete"
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
                            colspan="7"
                            style="text-align:center;padding:40px;"
                        >
                            Belum ada event.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</main>

</body>
</html>