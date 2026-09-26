<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout — <?= esc($event['title']) ?> — NANG ENDI?</title>

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
            justify-content: space-between;
            align-items: center;
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
            font-size: 14px;
            font-weight: 700;
        }

        .nav-menu a:hover {
            text-decoration: underline;
        }

        .checkout {
            padding: 70px 7% 100px;
        }

        .back {
            display: inline-block;
            margin-bottom: 45px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: underline;
        }

        .checkout-layout {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 60px;
            max-width: 1200px;
            margin: 0 auto;
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
            margin-bottom: 45px;
        }

        .form-box {
            border-top: 1px solid #171717;
            padding-top: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        input {
            width: 100%;
            padding: 16px;
            border: 1px solid #171717;
            background: #ebe7df;
            font-family: inherit;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            background: #fff;
        }

        .quantity-input {
            max-width: 150px;
        }

        /* PAYMENT */

        .payment-box {
            margin-top: 30px;
        }

        .payment-box h3 {
            font-size: 14px;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            border: 1px solid #171717;
            padding: 18px;
            background: #f5f3ee;
            cursor: pointer;
        }

        .payment-option:hover {
            background: #fff;
        }

        .payment-option input {
            width: auto;
            margin-right: 12px;
        }

        .payment-description {
            margin-top: 10px;
            font-size: 12px;
            line-height: 1.6;
            color: #625c54;
        }

        /* BUTTON */

        .submit-button {
            width: 100%;
            margin-top: 30px;
            padding: 18px;
            border: 1px solid #171717;
            background: #171717;
            color: #f5f3ee;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: all .2s ease;
        }

        .submit-button:hover {
            background: transparent;
            color: #171717;
        }

        /* EVENT CARD */

        .ticket-card {
            background: #c7aa83;
            border: 1px solid #171717;
            padding: 30px;
            position: sticky;
            top: 30px;
        }

        .ticket-card h2 {
            font-size: 32px;
            line-height: 1;
            margin-bottom: 25px;
        }

        .ticket-info {
            border-top: 1px solid #171717;
            padding-top: 20px;
            line-height: 1.8;
            font-size: 14px;
        }

        .summary {
            border-top: 1px solid #171717;
            margin-top: 30px;
            padding-top: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 12px;
            font-size: 15px;
        }

        .summary-row.total {
            border-top: 1px solid #171717;
            padding-top: 20px;
            margin-top: 20px;
            font-size: 22px;
            font-weight: 800;
        }

        .error-message {
            max-width: 1200px;
            margin: 0 auto 25px;
            background: #171717;
            color: white;
            padding: 15px;
            font-size: 14px;
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

            .nav-menu {
                gap: 15px;
                font-size: 12px;
            }

            .checkout {
                padding-left: 5%;
                padding-right: 5%;
            }

            .checkout-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .ticket-card {
                position: static;
            }

            h1 {
                font-size: 65px;
            }

        }

    </style>

</head>


<body>


<nav>

    <a href="/" class="logo">
        NANG ENDI?
    </a>

    <div class="nav-menu">
        <a href="/">HOME</a>
        <a href="/events">EVENTS</a>
        <a href="/places">PLACES</a>
        <a href="/map">MAP</a>
    </div>

</nav>


<main class="checkout">


    <a href="/events" class="back">
        ← KEMBALI KE EVENTS
    </a>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="error-message">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <div class="checkout-layout">


        <!-- =========================
             FORM PEMBELIAN
        ========================= -->

        <div>

            <div class="eyebrow">
                CHECKOUT — EVENT COLLAB
            </div>


            <h1>
                BELI<br>
                TIKET.
            </h1>


            <form
                action="<?= base_url('checkout/process') ?>"
                method="post"
                class="form-box"
            >

                <?= csrf_field() ?>


                <input
                    type="hidden"
                    name="event_id"
                    value="<?= esc($event['id']) ?>"
                >


                <!-- NAMA -->

                <div class="form-group">

                    <label for="name">
                        NAMA LENGKAP
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="<?= esc(old('name')) ?>"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        EMAIL
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= esc(old('email')) ?>"
                        placeholder="nama@email.com"
                        required
                    >

                </div>


                <!-- TELEPON -->

                <div class="form-group">

                    <label for="phone">
                        NOMOR TELEPON
                    </label>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        value="<?= esc(old('phone')) ?>"
                        placeholder="08xxxxxxxxxx"
                        required
                    >

                </div>


                <!-- JUMLAH TIKET -->

                <div class="form-group">

                    <label for="quantity">
                        JUMLAH TIKET
                    </label>

                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        class="quantity-input"
                        value="<?= old('quantity', 1) ?>"
                        min="1"
                        max="10"
                        required
                    >

                </div>


                <!-- =========================
                     METODE PEMBAYARAN
                ========================= -->

                <div class="form-group payment-box">

                    <h3>
                        METODE PEMBAYARAN
                    </h3>


                    <label class="payment-option">

                        <input
                            type="radio"
                            name="payment_method"
                            value="qris"
                            checked
                            required
                        >

                        <strong>QRIS</strong>

                    </label>


                    <p class="payment-description">
                        Pembayaran dilakukan menggunakan QRIS.
                        QRIS akan ditampilkan pada halaman pembayaran
                        setelah kamu melanjutkan checkout.
                    </p>

                </div>


                <button
                    type="submit"
                    class="submit-button"
                >
                    LANJUTKAN KE PEMBAYARAN →
                </button>


            </form>

        </div>


        <!-- =========================
             RINGKASAN EVENT
        ========================= -->

        <aside>

            <div class="ticket-card">

                <div class="eyebrow">
                    EVENT COLLAB
                </div>


                <h2>
                    <?= esc($event['title']) ?>
                </h2>


                <div class="ticket-info">

                    📅
                    <?= date(
                        'd M Y',
                        strtotime($event['date_start'])
                    ) ?>

                    <?php if (!empty($event['date_end'])): ?>

                        —
                        <?= date(
                            'd M Y',
                            strtotime($event['date_end'])
                        ) ?>

                    <?php endif; ?>

                    <br>


                    ⏰
                    <?= !empty($event['time_start'])
                        ? date('H:i', strtotime($event['time_start']))
                        : '-' ?>

                    <?php if (!empty($event['time_end'])): ?>

                        —
                        <?= date(
                            'H:i',
                            strtotime($event['time_end'])
                        ) ?>

                    <?php endif; ?>

                    <br>


                    📍
                    <?= esc($event['location_name'] ?? '-') ?>

                </div>


                <div class="summary">


                    <div class="summary-row">

                        <span>
                            Harga tiket
                        </span>

                        <span>
                            Rp <?= number_format(
                                $event['price'] ?? 0,
                                0,
                                ',',
                                '.'
                            ) ?>
                        </span>

                    </div>


                    <div class="summary-row">

                        <span>
                            Jumlah
                        </span>

                        <span id="quantitySummary">
                            1 tiket
                        </span>

                    </div>


                    <div class="summary-row total">

                        <span>
                            TOTAL
                        </span>

                        <span id="totalPrice">
                            Rp <?= number_format(
                                $event['price'] ?? 0,
                                0,
                                ',',
                                '.'
                            ) ?>
                        </span>

                    </div>


                </div>


            </div>

        </aside>


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


<script>

    const quantityInput =
        document.getElementById('quantity');

    const totalPrice =
        document.getElementById('totalPrice');

    const quantitySummary =
        document.getElementById('quantitySummary');

    const ticketPrice =
        <?= (float) ($event['price'] ?? 0) ?>;


    function updateTotal() {

        let quantity =
            parseInt(quantityInput.value) || 1;


        if (quantity < 1) {

            quantity = 1;
            quantityInput.value = 1;

        }


        if (quantity > 10) {

            quantity = 10;
            quantityInput.value = 10;

        }


        const total =
            ticketPrice * quantity;


        quantitySummary.textContent =
            quantity + ' tiket';


        totalPrice.textContent =
            'Rp ' + total.toLocaleString('id-ID');

    }


    quantityInput.addEventListener(
        'input',
        updateTotal
    );


    updateTotal();

</script>


</body>
</html>