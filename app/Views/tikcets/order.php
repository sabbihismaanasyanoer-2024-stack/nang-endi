<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Pesanan Berhasil — NANG ENDI?
    </title>

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

        main {
            padding: 80px 7% 100px;
            max-width: 1000px;
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
            margin-bottom: 55px;
        }

        .success {
            border: 1px solid #171717;
            background: #e5ddd0;
            padding: 35px;
            max-width: 700px;
        }

        .success-title {
            font-size: 30px;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .order-code {
            display: inline-block;
            margin: 15px 0 30px;
            padding: 10px 15px;
            border: 1px solid #171717;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .event-title {
            font-size: 25px;
            font-weight: 900;
            margin-bottom: 25px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            padding: 15px 0;
            border-top: 1px solid #171717;
            font-size: 14px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            border-top: 2px solid #171717;
            margin-top: 10px;
            padding-top: 20px;
            font-size: 22px;
            font-weight: 900;
        }

        .status {
            margin-top: 30px;
            padding: 18px;
            border: 1px solid #171717;
            background: #f5f3ee;
            line-height: 1.6;
        }

        .back {
            display: inline-block;
            margin-top: 30px;
            font-weight: 700;
            text-decoration: underline;
        }

        footer {
            margin-top: 80px;
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

            main {
                padding: 60px 5% 80px;
            }

            .success {
                padding: 25px;
            }

            .row {
                flex-direction: column;
                gap: 5px;
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


<main>

    <div class="eyebrow">
        ORDER BERHASIL
    </div>


    <h1>
        PESANAN<br>
        DIBUAT.
    </h1>


    <div class="success">

        <div class="success-title">
            🎟️ Tiket kamu sudah dipesan.
        </div>


        <p>
            Simpan kode pesanan berikut untuk melihat
            detail pembelian kamu.
        </p>


        <div class="order-code">
            <?= esc($orderCode) ?>
        </div>


        <div class="event-title">
            <?= esc($event['title']) ?>
        </div>


        <div class="row">

            <span>
                Nama
            </span>

            <strong>
                <?= esc($name) ?>
            </strong>

        </div>


        <div class="row">

            <span>
                Email
            </span>

            <strong>
                <?= esc($email) ?>
            </strong>

        </div>


        <div class="row">

            <span>
                Nomor Telepon
            </span>

            <strong>
                <?= esc($phone) ?>
            </strong>

        </div>


        <div class="row">

            <span>
                Jumlah Tiket
            </span>

            <strong>
                <?= esc($quantity) ?> tiket
            </strong>

        </div>


        <div class="row">

            <span>
                Harga / Tiket
            </span>

            <strong>
                Rp <?= number_format(
                    $event['price'],
                    0,
                    ',',
                    '.'
                ) ?>
            </strong>

        </div>


        <div class="total">

            <span>
                TOTAL
            </span>

            <span>
                Rp <?= number_format(
                    $total,
                    0,
                    ',',
                    '.'
                ) ?>
            </span>

        </div>


        <div class="status">

            <strong>
                STATUS PEMBAYARAN: PENDING
            </strong>

            <br>

            Pesanan sudah tersimpan.
            Tahap berikutnya adalah memilih metode
            pembayaran dan menyelesaikan pembayaran.

        </div>

    </div>


    <a href="/events" class="back">
        ← KEMBALI KE EVENTS
    </a>

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