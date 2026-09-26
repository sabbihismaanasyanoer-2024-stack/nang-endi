<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran — <?= esc($order['event_title']) ?> — NANG ENDI?</title>

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

        .payment-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 70px 7% 100px;
        }

        .back {
            display: inline-block;
            margin-bottom: 45px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: underline;
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
            margin-bottom: 50px;
        }

        .payment-layout {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 60px;
            align-items: start;
        }

        /* QRIS */

        .qris-box {
            border: 1px solid #171717;
            background: #ebe7df;
            padding: 35px;
            text-align: center;
        }

        .qris-title {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .qris-description {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .qris-image {
            width: 320px;
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border: 1px solid #171717;
            background: #fff;
        }

        .qris-instruction {
            margin-top: 25px;
            font-size: 14px;
            line-height: 1.7;
        }

        .payment-total {
            border-top: 1px solid #171717;
            margin-top: 30px;
            padding-top: 25px;
        }

        .payment-total-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .payment-total-price {
            font-size: 42px;
            font-weight: 900;
            letter-spacing: -2px;
        }

        /* ORDER */

        .order-box {
            background: #c7aa83;
            border: 1px solid #171717;
            padding: 30px;
            position: sticky;
            top: 30px;
        }

        .order-box h2 {
            font-size: 32px;
            line-height: 1;
            margin-bottom: 25px;
        }

        .order-info {
            border-top: 1px solid #171717;
            padding-top: 20px;
        }

        .order-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 13px 0;
            border-bottom: 1px solid #171717;
            font-size: 14px;
        }

        .order-row strong {
            text-align: right;
        }

        .order-code {
            font-size: 16px;
            font-weight: 800;
        }

        .total-row {
            margin-top: 10px;
            padding-top: 20px;
            border-top: 2px solid #171717;
            font-size: 24px;
            font-weight: 900;
        }

        .status {
            margin-top: 25px;
            padding: 14px 16px;
            background: #171717;
            color: #f5f3ee;
            text-align: center;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .note {
            margin-top: 25px;
            font-size: 13px;
            line-height: 1.6;
            color: #625c54;
        }

        .button {
            width: 100%;
            display: block;
            margin-top: 25px;
            padding: 17px 20px;
            background: #171717;
            color: #f5f3ee;
            border: 1px solid #171717;
            text-align: center;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
        }

        .button:hover {
            background: transparent;
            color: #171717;
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

        @media (max-width: 800px) {
            nav {
                padding: 0 5%;
            }

            .payment-page {
                padding: 60px 5% 80px;
            }

            .payment-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .order-box {
                position: static;
            }

            h1 {
                font-size: clamp(55px, 15vw, 80px);
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

<main class="payment-page">

    <a href="<?= base_url('events') ?>" class="back">
        ← KEMBALI KE EVENTS
    </a>

    <div class="eyebrow">
        PEMBAYARAN TIKET
    </div>

    <h1>
        BAYAR<br>
        SEKARANG.
    </h1>

    <div class="payment-layout">

        <!-- QRIS -->
        <div class="qris-box">

            <div class="qris-title">
                BAYAR DENGAN QRIS
            </div>

            <p class="qris-description">
                Scan QRIS di bawah menggunakan aplikasi
                pembayaran yang mendukung QRIS.
            </p>

            <img
                src="<?= base_url('assets/images/qris.jpg') ?>"
                alt="QRIS Pembayaran NANG ENDI?"
                class="qris-image"
            >

            <p class="qris-instruction">
                Silakan lakukan pembayaran sesuai dengan
                <strong>total pembayaran</strong> yang tertera
                di halaman ini.
            </p>

            <div class="payment-total">

                <div class="payment-total-label">
                    TOTAL PEMBAYARAN
                </div>

                <div class="payment-total-price">
                    Rp <?= number_format(
                        $order['total'],
                        0,
                        ',',
                        '.'
                    ) ?>
                </div>

            </div>

        </div>

        <!-- DETAIL PESANAN -->
        <aside>

            <div class="order-box">

                <div class="eyebrow">
                    DETAIL PESANAN
                </div>

                <h2>
                    <?= esc($order['event_title']) ?>
                </h2>

                <div class="order-info">

                    <div class="order-row">
                        <span>KODE PESANAN</span>

                        <strong class="order-code">
                            <?= esc($order['order_code']) ?>
                        </strong>
                    </div>

                    <div class="order-row">
                        <span>PEMESAN</span>

                        <strong>
                            <?= esc($order['name']) ?>
                        </strong>
                    </div>

                    <div class="order-row">
                        <span>EMAIL</span>

                        <strong>
                            <?= esc($order['email']) ?>
                        </strong>
                    </div>

                    <div class="order-row">
                        <span>JUMLAH TIKET</span>

                        <strong>
                            <?= esc($order['quantity']) ?> tiket
                        </strong>
                    </div>

                    <div class="order-row">
                        <span>HARGA / TIKET</span>

                        <strong>
                            Rp <?= number_format(
                                $order['price'],
                                0,
                                ',',
                                '.'
                            ) ?>
                        </strong>
                    </div>

                    <div class="order-row">
                        <span>METODE PEMBAYARAN</span>

                        <strong>
                            QRIS
                        </strong>
                    </div>

                    <div class="order-row total-row">
                        <span>TOTAL</span>

                        <strong>
                            Rp <?= number_format(
                                $order['total'],
                                0,
                                ',',
                                '.'
                            ) ?>
                        </strong>
                    </div>

                </div>

                <div class="status">
                    MENUNGGU PEMBAYARAN
                </div>

                <p class="note">
                    Silakan scan QRIS dan lakukan pembayaran
                    sesuai nominal total di atas. Setelah
                    pembayaran selesai, klik tombol di bawah.
                </p>

                <form
                    action="<?= base_url('checkout/confirm-payment') ?>"
                    method="post"
                >

                    <?= csrf_field() ?>

                    <button
                        type="submit"
                        class="button"
                    >
                        SAYA SUDAH BAYAR →
                    </button>

                </form>

            </div>

        </aside>

    </div>

</main>

<footer>

    <h2>NANG ENDI?</h2>

    <p>
        Discover Surabaya differently.
    </p>

</footer>

</body>
</html>