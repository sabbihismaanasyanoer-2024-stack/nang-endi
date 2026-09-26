<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard — NANG ENDI?</title>


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

            padding: 80px 7% 100px;
        }


        .eyebrow {
            margin-bottom: 18px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        h1 {
            margin-bottom: 60px;

            font-size: clamp(65px, 9vw, 120px);

            line-height: .85;

            letter-spacing: -7px;
        }


        .dashboard-grid {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 20px;
        }


        .dashboard-card {
            min-height: 240px;

            padding: 35px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            border: 1px solid #171717;

            background: #fff;

            transition:
                background .2s ease,
                color .2s ease;
        }


        .dashboard-card:hover {
            background: #171717;
            color: #fff;
        }


        .card-number {
            font-size: 11px;
            font-weight: 800;

            letter-spacing: 1px;
        }


        .card-title {
            font-size: 42px;
            font-weight: 900;

            line-height: .9;

            letter-spacing: -3px;
        }


        .card-description {
            max-width: 400px;

            font-size: 13px;

            line-height: 1.6;
        }


        .card-link {
            margin-top: 20px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .logout-section {
            margin-top: 50px;

            padding-top: 25px;

            border-top: 1px solid #171717;
        }


        .logout {
            display: inline-block;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .logout:hover {
            text-decoration: underline;
        }


        @media (max-width: 700px) {

            .page {
                padding: 50px 5% 80px;
            }


            .dashboard-grid {
                grid-template-columns: 1fr;
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
            ADMIN / DASHBOARD
        </span>


        <a href="<?= base_url('/') ?>">
            ← PORTAL
        </a>

    </div>

</nav>



<main class="page">


    <div class="eyebrow">
        ADMINISTRATION / DASHBOARD
    </div>


    <h1>
        DASHBOARD.
    </h1>



    <div class="dashboard-grid">


        <!-- =========================
             PLACES
        ========================== -->

        <a
            href="<?= base_url('admin/places') ?>"
            class="dashboard-card"
        >

            <div class="card-number">
                01
            </div>


            <div>

                <div class="card-title">
                    PLACES.
                </div>


                <div class="card-description">
                    Kelola data café,
                    heritage, dan tempat
                    lainnya di NANG ENDI?
                </div>

            </div>


            <div class="card-link">
                Kelola Places →
            </div>

        </a>



        <!-- =========================
             EVENTS
        ========================== -->

        <a
            href="<?= base_url('admin/events') ?>"
            class="dashboard-card"
        >

            <div class="card-number">
                02
            </div>


            <div>

                <div class="card-title">
                    EVENTS.
                </div>


                <div class="card-description">
                    Kelola event,
                    informasi kegiatan,
                    tiket, dan status publikasi.
                </div>

            </div>


            <div class="card-link">
                Kelola Events →
            </div>

        </a>



        <!-- =========================
             ORDERS
        ========================== -->

        <a
            href="<?= base_url('admin/orders') ?>"
            class="dashboard-card"
        >

            <div class="card-number">
                03
            </div>


            <div>

                <div class="card-title">
                    ORDERS.
                </div>


                <div class="card-description">
                    Lihat dan lacak data
                    pembelian tiket,
                    pembeli, jumlah tiket,
                    dan status pembayaran.
                </div>

            </div>


            <div class="card-link">
                Lihat Orders →
            </div>

        </a>



        <!-- =========================
             PORTAL
        ========================== -->

        <a
            href="<?= base_url('/') ?>"
            class="dashboard-card"
        >

            <div class="card-number">
                04
            </div>


            <div>

                <div class="card-title">
                    PORTAL.
                </div>


                <div class="card-description">
                    Kembali ke halaman
                    utama NANG ENDI?
                </div>

            </div>


            <div class="card-link">
                Kembali ke Portal →
            </div>

        </a>


    </div>



    <!-- =========================
         LOGOUT
    ========================== -->

    <div class="logout-section">

        <a
            href="<?= base_url('admin/logout') ?>"
            class="logout"
        >
            Logout Admin →
        </a>

    </div>


</main>


</body>

</html>