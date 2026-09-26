<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Checkout Tiket — NANG ENDI?
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

        main {
            padding: 70px 7% 100px;
        }

        .back {
            display: inline-block;
            margin-bottom: 40px;
            font-size: 14px;
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
            margin-bottom: 60px;
        }

        .checkout-layout {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 60px;
            align-items: start;
        }

        .form-box,
        .summary {
            border: 1px solid #171717;
            background: #e5ddd0;
            padding: 35px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 900;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 1px solid #171717;
            background: #f5f3ee;
            color: #171717;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-width: 2px;
        }

        .quantity-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .quantity-wrap input {
            width: 120px;
        }

        .event-name {
            font-size: 28px;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 30px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 15px 0;
            border-top: 1px solid #171717;
            font-size: 14px;
        }

        .summary-row:last-of-type {
            border-bottom: 1px solid #171717;
        }

        .total {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding-top: 25px;
            font-size: 22px;
            font-weight: 900;
        }

        .submit-button {
            width: 100%;
            margin-top: 15px;
            padding: 18px;
            border: 1px solid #171717;
            background: #171717;
            color: #f5f3ee;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
        }

        .submit-button:hover {
            background: transparent;
            color: #171717;
        }

        .error {
            margin-bottom: 25px;
            padding: 15px;
            border: 1px solid #171717;
            background: #f0d8d0;
            font-size: 14px;
        }

        .note {
            margin-top: 25px;
            font-size: 12px;
            line-height: 1.6;
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

        @media (max-width: 800px) {

            nav {
                padding: 0 5%;
            }

            main {
                padding: 60px 5% 80px;
            }

            .checkout-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            h1 {
                font-size: 55px;
            }

            .form-box,
            .summary {
                padding: 25px;
            }
        }

    </style>

</head>

<body>


<nav>

    <a href="/" class="logo">
        NANG ENDI?
    </a>

</nav>


<main>

    <a href="/events/<?= esc($event['slug']) ?>" class="back">
        ← KEMBALI KE EVENT
    </a>


    <div class="eyebrow">
        TICKET CHECKOUT
    </div>


    <h1>
        BELI<br>
        TIKET.
    </h1>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <div class="checkout-layout">


        <!-- FORM PEMBELI -->

        <form
            action="/tickets/order"
            method="post"
            class="form-box"
        >

            <?= csrf_field() ?>

            <input
                type="hidden"
                name="event_id"
                value="<?= esc($event['id']) ?>"
            >


            <div class="section-title">
                DATA PEMBELI
            </div>


            <div class="form-group">

                <label for="name">
                    NAMA LENGKAP
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?= old('name') ?>"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <div class="form-group">

                <label for="email">
                    EMAIL
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= old('email') ?>"
                    placeholder="nama@email.com"
                    required
                >

            </div>


            <div class="form-group">

                <label for="phone">
                    NOMOR TELEPON
                </label>

                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="<?= old('phone') ?>"
                    placeholder="08xxxxxxxxxx"
                    required
                >

            </div>


            <div class="form-group">

                <label for="quantity">
                    JUMLAH TIKET
                </label>

                <div class="quantity-wrap">

                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        value="<?= old('quantity', 1) ?>"
                        min="1"
                        max="10"
                        required
                    >

                    <span>
                        tiket
                    </span>

                </div>

            </div>


            <button
                type="submit"
                class="submit-button"
            >
                LANJUTKAN PEMBELIAN →
            </button>


            <div class="note">
                Maksimal pembelian 10 tiket dalam satu pesanan.
            </div>

        </form>


        <!-- RINGKASAN -->

        <aside class="summary">

            <div class="section-title">
                RINGKASAN
            </div>


            <div class="event-name">
                <?= esc($event['title']) ?>
            </div>


            <div class="summary-row">

                <span>
                    Harga tiket
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


            <div class="summary-row">

                <span>
                    Jumlah
                </span>

                <strong id="summaryQuantity">
                    1 tiket
                </strong>

            </div>


            <div class="total">

                <span>
                    TOTAL
                </span>

                <span id="totalPrice">
                    Rp <?= number_format(
                        $event['price'],
                        0,
                        ',',
                        '.'
                    ) ?>
                </span>

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

    const summaryQuantity =
        document.getElementById('summaryQuantity');

    const ticketPrice =
        <?= (float) $event['price'] ?>;


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


        totalPrice.textContent =
            'Rp ' +
            total.toLocaleString('id-ID');


        summaryQuantity.textContent =
            quantity +
            ' tiket';

    }


    quantityInput.addEventListener(
        'input',
        updateTotal
    );


    updateTotal();

</script>


</body>
</html>