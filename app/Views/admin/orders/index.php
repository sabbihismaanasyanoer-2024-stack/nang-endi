<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Orders — Admin NANG ENDI?</title>


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
            max-width: 1400px;

            margin: auto;

            padding: 70px 7% 100px;
        }


        .eyebrow {
            margin-bottom: 18px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        h1 {
            margin-bottom: 50px;

            font-size: clamp(60px, 9vw, 110px);

            line-height: .85;

            letter-spacing: -7px;
        }


        .table-wrapper {
            overflow-x: auto;

            border: 1px solid #171717;

            background: #fff;
        }


        table {
            width: 100%;

            min-width: 950px;

            border-collapse: collapse;
        }


        th {
            padding: 16px 14px;

            background: #171717;

            color: #fff;

            text-align: left;

            font-size: 9px;
            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        td {
            padding: 18px 14px;

            border-bottom: 1px solid #d5d2ca;

            font-size: 12px;

            vertical-align: top;
        }


        tr:last-child td {
            border-bottom: none;
        }


        .buyer-name {
            font-weight: 800;

            margin-bottom: 4px;
        }


        .buyer-contact {
            font-size: 11px;

            line-height: 1.5;
        }


        .order-code {
            font-weight: 800;

            letter-spacing: .5px;
        }


        .event-name {
            font-weight: 800;
        }


        .amount {
            font-weight: 800;

            white-space: nowrap;
        }


        .status {
            display: inline-block;

            padding: 7px 9px;

            border: 1px solid #171717;

            font-size: 9px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .empty {
            padding: 60px 30px;

            text-align: center;

            font-size: 13px;
        }


        @media (max-width: 700px) {

            .page {
                padding: 50px 5% 80px;
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
            ADMIN / ORDERS
        </span>


        <a href="<?= base_url('admin') ?>">
            ← DASHBOARD
        </a>

    </div>

</nav>



<main class="page">


    <div class="eyebrow">
        ADMINISTRATION / ORDERS
    </div>


    <h1>
        ORDERS.
    </h1>


    <div class="table-wrapper">

        <?php if (empty($orders)): ?>

            <div class="empty">
                Belum ada data pembelian tiket.
            </div>

        <?php else: ?>

            <table>

                <thead>

                    <tr>

                        <th>
                            ORDER
                        </th>

                        <th>
                            PEMBELI
                        </th>

                        <th>
                            EVENT
                        </th>

                        <th>
                            TIKET
                        </th>

                        <th>
                            TOTAL
                        </th>

                        <th>
                            PEMBAYARAN
                        </th>

                        <th>
                            STATUS
                        </th>

                        <th>
                            TANGGAL
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php foreach ($orders as $order): ?>

                        <tr>

                            <td>

                                <div class="order-code">
                                    <?= esc($order['order_code']) ?>
                                </div>

                            </td>


                            <td>

                                <div class="buyer-name">
                                    <?= esc($order['buyer_name']) ?>
                                </div>

                                <div class="buyer-contact">

                                    <?= esc($order['buyer_email']) ?>

                                    <br>

                                    <?= esc($order['buyer_phone']) ?>

                                </div>

                            </td>


                            <td>

                                <div class="event-name">
                                    <?= esc($order['event_title']) ?>
                                </div>

                            </td>


                            <td>
                                -
                            </td>


                            <td>

                                <div class="amount">

                                    Rp <?= number_format(
                                        (float) $order['total_amount'],
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </div>

                            </td>


                            <td>

                                <?= esc(
                                    strtoupper(
                                        str_replace(
                                            '_',
                                            ' ',
                                            $order['payment_method']
                                        )
                                    )
                                ) ?>

                            </td>


                            <td>

                                <span class="status">

                                    <?= esc(
                                        strtoupper(
                                            str_replace(
                                                '_',
                                                ' ',
                                                $order['payment_status']
                                            )
                                        )
                                    ) ?>

                                </span>

                            </td>


                            <td>

                                <?= esc(
                                    date(
                                        'd/m/Y H:i',
                                        strtotime($order['created_at'])
                                    )
                                ) ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php endif; ?>

    </div>


</main>


</body>

</html>