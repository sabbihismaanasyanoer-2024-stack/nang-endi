<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Ticket — <?= esc($order['event_title']) ?> — NANG ENDI?</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            border-bottom: 1px solid #171717;
        }

        .logo {
            font-size: 28px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .success-page {
            max-width: 1000px;
            margin: 0 auto;
            padding: 70px 7% 100px;
        }

        .eyebrow {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: clamp(55px, 8vw, 95px);
            line-height: .85;
            letter-spacing: -5px;
            margin-bottom: 25px;
        }

        .success-message {
            max-width: 650px;
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 45px;
        }

        /* E-TICKET */

        .ticket {
            background: #fff;
            border: 2px solid #171717;
            max-width: 720px;
            margin: 0 auto;
            box-shadow: 10px 10px 0 #171717;
        }

        .ticket-top {
            padding: 30px;
            background: #c7aa83;
            border-bottom: 2px solid #171717;
        }

        .ticket-brand {
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .ticket-title {
            font-size: 38px;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -2px;
        }

        .ticket-body {
            display: grid;
            grid-template-columns: 1fr 150px;
            gap: 30px;
            padding: 30px;
        }

        .ticket-info {
            display: flex;
            flex-direction: column;
        }

        .ticket-row {
            padding: 13px 0;
            border-bottom: 1px solid #d0ccc5;
        }

        .ticket-row:last-child {
            border-bottom: none;
        }

        .ticket-label {
            display: block;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            margin-bottom: 5px;
            color: #625c54;
        }

        .ticket-value {
            font-size: 16px;
            font-weight: 700;
        }

        .ticket-code {
            font-size: 22px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .qr-ticket {
            display: flex;
            align-items: center;
            justify-content: center;
            border-left: 1px dashed #171717;
            padding-left: 25px;
        }

        .qr-ticket img {
            width: 120px;
            height: 120px;
            object-fit: contain;
        }

        .ticket-bottom {
            padding: 20px 30px;
            border-top: 2px dashed #171717;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .paid {
            display: inline-block;
            padding: 10px 14px;
            background: #171717;
            color: #fff;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .paid-date {
            font-size: 12px;
            color: #625c54;
            text-align: right;
        }

        /* BUTTONS */

        .actions {
            max-width: 720px;
            margin: 40px auto 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .button {
            display: block;
            padding: 17px 20px;
            background: #171717;
            color: #f5f3ee;
            border: 1px solid #171717;
            text-align: center;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
        }

        .button.secondary {
            background: transparent;
            color: #171717;
        }

        .button:hover {
            opacity: .8;
        }

        .note {
            max-width: 720px;
            margin: 30px auto 0;
            font-size: 13px;
            line-height: 1.7;
            color: #625c54;
        }

        footer {
            padding: 60px 7%;
            border-top: 1px solid #171717;
        }

        footer h2 {
            font-size: 50px;
            letter-spacing: -3px;
            margin-bottom: 8px;
        }

        /* =========================
           PRINT / PDF
        ========================= */

        @media print {

            @page {
                size: 80mm 120mm;
                margin: 0;
            }

            body {
                background: #fff;
            }

            nav,
            .success-page > .eyebrow,
            .success-page > h1,
            .success-message,
            .actions,
            .note,
            footer {
                display: none !important;
            }

            .success-page {
                padding: 0;
                margin: 0;
                max-width: none;
            }

            .ticket {
                width: 80mm;
                max-width: none;
                margin: 0;
                border: 1px solid #171717;
                box-shadow: none;
            }

            .ticket-top {
                padding: 15px;
            }

            .ticket-title {
                font-size: 25px;
            }

            .ticket-body {
                grid-template-columns: 1fr 75px;
                gap: 12px;
                padding: 15px;
            }

            .ticket-row {
                padding: 7px 0;
            }

            .ticket-label {
                font-size: 7px;
                margin-bottom: 3px;
            }

            .ticket-value {
                font-size: 10px;
            }

            .ticket-code {
                font-size: 13px;
            }

            .qr-ticket {
                padding-left: 10px;
            }

            .qr-ticket img {
                width: 65px;
                height: 65px;
            }

            .ticket-bottom {
                padding: 10px 15px;
            }

            .paid {
                padding: 6px 8px;
                font-size: 8px;
            }

            .paid-date {
                font-size: 8px;
            }
        }

        @media (max-width: 700px) {

            .success-page {
                padding: 60px 5% 80px;
            }

            .ticket-body {
                grid-template-columns: 1fr;
            }

            .qr-ticket {
                border-left: none;
                border-top: 1px dashed #171717;
                padding-left: 0;
                padding-top: 20px;
            }

            .actions {
                grid-template-columns: 1fr;
            }

            .ticket {
                box-shadow: 6px 6px 0 #171717;
            }
        }

    </style>

</head>

<body>

<nav>

    <div class="logo">
        NANG ENDI?
    </div>

</nav>


<main class="success-page">

    <div class="eyebrow">
        PEMBAYARAN BERHASIL
    </div>

    <h1>
        TIKET<br>
        KAMU SIAP.
    </h1>

    <p class="success-message">
        Pembayaran berhasil dikonfirmasi.
        Simpan E-Ticket ini dan tunjukkan QR Code
        saat melakukan check-in di lokasi acara.
    </p>


    <!-- =========================
         E-TICKET
    ========================= -->

    <div class="ticket" id="ticket">

        <div class="ticket-top">

            <div class="ticket-brand">
                NANG ENDI? — E-TICKET
            </div>

            <div class="ticket-title">
                <?= esc($order['event_title']) ?>
            </div>

        </div>


        <div class="ticket-body">

            <div class="ticket-info">

                <div class="ticket-row">

                    <span class="ticket-label">
                        KODE TIKET
                    </span>

                    <span class="ticket-value ticket-code">
                        <?= esc($order['order_code']) ?>
                    </span>

                </div>


                <div class="ticket-row">

                    <span class="ticket-label">
                        NAMA PEMESAN
                    </span>

                    <span class="ticket-value">
                        <?= esc($order['name']) ?>
                    </span>

                </div>


                <div class="ticket-row">

                    <span class="ticket-label">
                        EMAIL
                    </span>

                    <span class="ticket-value">
                        <?= esc($order['email']) ?>
                    </span>

                </div>


                <div class="ticket-row">

                    <span class="ticket-label">
                        JUMLAH TIKET
                    </span>

                    <span class="ticket-value">
                        <?= esc($order['quantity']) ?> tiket
                    </span>

                </div>


                <div class="ticket-row">

                    <span class="ticket-label">
                        TOTAL PEMBAYARAN
                    </span>

                    <span class="ticket-value">
                        Rp <?= number_format(
                            $order['total'],
                            0,
                            ',',
                            '.'
                        ) ?>
                    </span>

                </div>


                <div class="ticket-row">

                    <span class="ticket-label">
                        STATUS
                    </span>

                    <span class="ticket-value">
                        LUNAS
                    </span>

                </div>

            </div>


            <!-- QR TIKET -->

            <div class="qr-ticket">

                <img
                    src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?= urlencode($order['order_code']) ?>"
                    alt="QR Ticket <?= esc($order['order_code']) ?>"
                >

            </div>

        </div>


        <div class="ticket-bottom">

            <span class="paid">
                PEMBAYARAN LUNAS
            </span>

            <span class="paid-date">

                <?= !empty($order['paid_at'])
                    ? date('d M Y, H:i', strtotime($order['paid_at']))
                    : date('d M Y, H:i')
                ?>

            </span>

        </div>

    </div>


    <!-- =========================
         ACTIONS
    ========================= -->

    <div class="actions">

        <button
            type="button"
            class="button"
            onclick="window.print()"
        >
            CETAK / SIMPAN E-TICKET
        </button>

        <a
            href="<?= base_url('events') ?>"
            class="button secondary"
        >
            KEMBALI KE EVENTS
        </a>

    </div>


    <p class="note">
        <strong>Tips:</strong> saat memilih "Cetak / Simpan E-Ticket",
        pilih opsi <strong>Save as PDF</strong> pada printer.
        Ukuran tiket sudah dibuat kecil agar hasil PDF tidak
        memenuhi satu halaman besar.
    </p>

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