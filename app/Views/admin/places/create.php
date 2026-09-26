<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Place — NANG ENDI?</title>

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
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }


        /* =========================
           HEADER
        ========================== */

        .admin-header {
            height: 78px;
            padding: 0 5%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #171717;
            color: #f5f3ee;
        }

        .admin-logo {
            font-size: 25px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .admin-logo span {
            font-weight: 400;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-button {
            padding: 11px 16px;

            border: 1px solid #f5f3ee;

            font-size: 10px;
            font-weight: 800;

            text-transform: uppercase;
        }

        .header-button:hover {
            background: #f5f3ee;
            color: #171717;
        }


        /* =========================
           PAGE
        ========================== */

        .page {
            width: 100%;
            max-width: 1500px;

            margin: 0 auto;

            padding: 60px 40px 100px;
        }

        .back-link {
            display: inline-block;

            margin-bottom: 25px;

            font-size: 11px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .back-link:hover {
            opacity: .6;
        }

        .eyebrow {
            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;

            margin-bottom: 14px;
        }

        h1 {
            font-size: clamp(55px, 7vw, 100px);

            line-height: .85;
            letter-spacing: -6px;

            margin-bottom: 20px;
        }

        .intro {
            max-width: 700px;

            color: #625c54;

            font-size: 14px;
            line-height: 1.7;

            margin-bottom: 45px;
        }


        /* =========================
           FORM
        ========================== */

        .form-wrapper {
            width: 100%;

            background: #fff;

            border: 1px solid #171717;
        }

        .form-section {
            padding: 35px;

            border-bottom: 1px solid #d0ccc5;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 12px;
            font-weight: 900;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            margin-bottom: 28px;
        }

        .form-grid {
            display: grid;

            grid-template-columns: repeat(2, minmax(0, 1fr));

            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;

            gap: 8px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }

        input,
        textarea,
        select {
            width: 100%;

            border: 1px solid #171717;

            background: #f9f8f5;

            padding: 13px 14px;

            font-family: inherit;
            font-size: 13px;

            color: #171717;

            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            background: #fff;

            box-shadow: 0 0 0 1px #171717;
        }

        textarea {
            min-height: 150px;

            resize: vertical;

            line-height: 1.6;
        }

        .field-help {
            font-size: 10px;

            color: #777066;

            line-height: 1.5;
        }


        /* =========================
           SUBCATEGORY
        ========================== */

        .subcategory-box {
            border: 1px solid #171717;

            background: #f9f8f5;

            padding: 16px;
        }

        .subcategory-grid {
            display: flex;

            flex-wrap: wrap;

            gap: 8px;
        }

        .subcategory-option {
            position: relative;
        }

        .subcategory-option input {
            position: absolute;

            opacity: 0;

            pointer-events: none;
        }

        .subcategory-option label {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 90px;

            padding: 11px 14px;

            border: 1px solid #171717;

            background: #fff;

            cursor: pointer;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .7px;

            transition: .15s ease;
        }

        .subcategory-option label:hover {
            background: #e9e5de;
        }

        .subcategory-option input:checked + label {
            background: #171717;

            color: #fff;
        }


        /* =========================
           ERRORS
        ========================== */

        .errors {
            margin-bottom: 25px;

            padding: 18px 20px;

            background: #f7e4df;

            border: 1px solid #8f3024;

            color: #6c2118;
        }

        .errors strong {
            display: block;

            margin-bottom: 8px;

            font-size: 12px;
        }

        .errors ul {
            padding-left: 18px;

            font-size: 12px;

            line-height: 1.7;
        }


        /* =========================
           ACTIONS
        ========================== */

        .actions {
            padding: 25px 35px;

            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 15px;

            background: #f5f3ee;

            border-top: 1px solid #171717;
        }

        .cancel-button,
        .save-button {
            display: inline-block;

            padding: 15px 22px;

            border: 1px solid #171717;

            font-size: 11px;
            font-weight: 900;

            text-transform: uppercase;

            cursor: pointer;
        }

        .cancel-button {
            background: transparent;
        }

        .save-button {
            background: #171717;

            color: #fff;
        }

        .cancel-button:hover {
            background: #e8e4dc;
        }

        .save-button:hover {
            opacity: .8;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            .page {
                padding: 50px 25px 80px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

        }


        @media (max-width: 700px) {

            .admin-header {
                padding: 0 5%;
            }

            .admin-logo {
                font-size: 21px;
            }

            .header-button {
                padding: 9px 11px;
            }

            .page {
                padding: 40px 18px 70px;
            }

            h1 {
                font-size: 65px;

                letter-spacing: -5px;
            }

            .form-section {
                padding: 22px;
            }

            .actions {
                padding: 20px 22px;

                display: block;
            }

            .cancel-button,
            .save-button {
                display: block;

                width: 100%;

                text-align: center;
            }

            .save-button {
                margin-top: 10px;
            }

            .subcategory-grid {
                display: grid;

                grid-template-columns: repeat(2, 1fr);
            }

            .subcategory-option label {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<header class="admin-header">

    <a
        href="<?= base_url('admin') ?>"
        class="admin-logo"
    >
        NANG ENDI? <span>— ADMIN</span>
    </a>


    <div class="header-actions">

        <a
            href="<?= base_url('/') ?>"
            class="header-button"
            target="_blank"
        >
            Lihat Website
        </a>


        <a
            href="<?= base_url('admin/logout') ?>"
            class="header-button"
        >
            Logout
        </a>

    </div>

</header>



<main class="page">


    <a
        href="<?= base_url('admin/places') ?>"
        class="back-link"
    >
        ← Kembali ke Places
    </a>


    <div class="eyebrow">
        ADMIN / PLACES / CREATE
    </div>


    <h1>
        ADD PLACE.
    </h1>


    <p class="intro">
        Tambahkan tempat baru ke NANG ENDI?.
        Isi informasi tempat, pilih satu atau beberapa
        subkategori, lalu simpan.
    </p>



    <?php if (session()->getFlashdata('errors')): ?>

        <div class="errors">

            <strong>
                Ada kesalahan pada data:
            </strong>

            <ul>

                <?php foreach (session()->getFlashdata('errors') as $error): ?>

                    <li>
                        <?= esc($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>



    <form
        action="<?= base_url('admin/places/store') ?>"
        method="post"
        enctype="multipart/form-data"
        class="form-wrapper"
    >

        <?= csrf_field() ?>


        <!-- =========================
             01 — BASIC INFORMATION
        ========================== -->

        <section class="form-section">

            <div class="section-title">
                01 — Informasi Utama
            </div>


            <div class="form-grid">


                <!-- CATEGORY -->

                <div class="form-group">

                    <label for="category_id">
                        Kategori
                    </label>


                    <select
                        name="category_id"
                        id="category_id"
                    >

                        <option value="">
                            — Pilih Kategori —
                        </option>


                        <option value="15">
                            Café
                        </option>


                        <option value="9">
                            Culture & Heritage
                        </option>


                        <option value="10">
                            Food & Culinary
                        </option>


                        <option value="11">
                            Café & Hangout
                        </option>


                        <option value="12">
                            Creative Space
                        </option>


                        <option value="13">
                            Outdoor
                        </option>


                        <option value="14">
                            Shopping
                        </option>

                    </select>

                </div>



                <!-- SUBCATEGORY -->

                <div class="form-group">

                    <label>
                        Subkategori
                    </label>


                    <div class="subcategory-box">

                        <div class="subcategory-grid">


                            <?php

                                $subcategoryOptions = [
                                    'WFC'      => 'WFC',
                                    'LEGEND'   => 'Legend',
                                    'KALCER'   => 'Kalcer',
                                    'MUSEUM'   => 'Museum',
                                    'HERITAGE' => 'Heritage',
                                    'CULTURE'  => 'Culture'
                                ];

                            ?>


                            <?php foreach ($subcategoryOptions as $value => $label): ?>

                                <div class="subcategory-option">

                                    <input
                                        type="checkbox"
                                        name="subcategories[]"
                                        id="subcategory_<?= strtolower($value) ?>"
                                        value="<?= esc($value) ?>"
                                        <?= in_array(
                                            $value,
                                            old('subcategories', []),
                                            true
                                        ) ? 'checked' : '' ?>
                                    >


                                    <label
                                        for="subcategory_<?= strtolower($value) ?>"
                                    >
                                        <?= esc($label) ?>
                                    </label>

                                </div>

                            <?php endforeach; ?>


                        </div>


                        <div
                            class="field-help"
                            style="margin-top:12px;"
                        >
                            Bisa memilih lebih dari satu subkategori.
                            Contoh: HERITAGE + CULTURE.
                        </div>

                    </div>

                </div>



                <!-- NAME -->

                <div class="form-group full">

                    <label for="name">
                        Nama Place
                    </label>


                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="<?= old('name') ?>"
                        required
                    >

                </div>



                <!-- SLUG -->

                <div class="form-group full">

                    <label for="slug">
                        Slug
                    </label>


                    <input
                        type="text"
                        name="slug"
                        id="slug"
                        value="<?= old('slug') ?>"
                        required
                    >


                    <div class="field-help">
                        Digunakan sebagai alamat URL detail place.
                        Contoh: galeri-merah-putih.
                    </div>

                </div>



                <!-- DESCRIPTION -->

                <div class="form-group full">

                    <label for="description">
                        Deskripsi
                    </label>


                    <textarea
                        name="description"
                        id="description"
                    ><?= old('description') ?></textarea>

                </div>

            </div>

        </section>



        <!-- =========================
             02 — LOCATION
        ========================== -->

        <section class="form-section">

            <div class="section-title">
                02 — Lokasi & Jam Operasional
            </div>


            <div class="form-grid">


                <!-- ADDRESS -->

                <div class="form-group full">

                    <label for="address">
                        Alamat
                    </label>


                    <textarea
                        name="address"
                        id="address"
                        style="min-height:100px;"
                    ><?= old('address') ?></textarea>

                </div>



                <!-- OPENING HOURS -->

                <div class="form-group full">

                    <label for="opening_hours">
                        Jam Buka
                    </label>


                    <input
                        type="text"
                        name="opening_hours"
                        id="opening_hours"
                        value="<?= old('opening_hours') ?>"
                        placeholder="Contoh: 08:00 - 22:00"
                    >

                </div>



                <!-- LATITUDE -->

                <div class="form-group">

                    <label for="latitude">
                        Latitude
                    </label>


                    <input
                        type="text"
                        name="latitude"
                        id="latitude"
                        value="<?= old('latitude') ?>"
                        placeholder="-7.25..."
                    >


                    <div class="field-help">
                        Contoh: -7.2575
                    </div>

                </div>



                <!-- LONGITUDE -->

                <div class="form-group">

                    <label for="longitude">
                        Longitude
                    </label>


                    <input
                        type="text"
                        name="longitude"
                        id="longitude"
                        value="<?= old('longitude') ?>"
                        placeholder="112.75..."
                    >


                    <div class="field-help">
                        Contoh: 112.7521
                    </div>

                </div>

            </div>

        </section>



        <!-- =========================
             03 — CONTACT
        ========================== -->

        <section class="form-section">

            <div class="section-title">
                03 — Kontak & Informasi Tambahan
            </div>


            <div class="form-grid">


                <!-- PHONE -->

                <div class="form-group">

                    <label for="phone">
                        Telepon
                    </label>


                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        value="<?= old('phone') ?>"
                    >

                </div>



                <!-- PRICE -->

                <div class="form-group">

                    <label for="price">
                        Harga
                    </label>


                    <input
                        type="number"
                        name="price"
                        id="price"
                        value="<?= old('price', 0) ?>"
                        min="0"
                    >


                    <div class="field-help">
                        Isi 0 jika gratis.
                    </div>

                </div>



                <!-- WEBSITE -->

                <div class="form-group">

                    <label for="website">
                        Website
                    </label>


                    <input
                        type="text"
                        name="website"
                        id="website"
                        value="<?= old('website') ?>"
                        placeholder="https://..."
                    >

                </div>



                <!-- INSTAGRAM -->

                <div class="form-group">

                    <label for="instagram">
                        Instagram
                    </label>


                    <input
                        type="text"
                        name="instagram"
                        id="instagram"
                        value="<?= old('instagram') ?>"
                        placeholder="@username"
                    >

                </div>

            </div>

        </section>



        <!-- =========================
             04 — IMAGE
        ========================== -->

        <section class="form-section">

            <div class="section-title">
                04 — Gambar
            </div>


            <div class="form-grid">


                <div class="form-group full">

                    <label for="image">
                        Upload Gambar
                    </label>


                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/jpeg,image/png,image/webp"
                    >


                    <div class="field-help">
                        Format JPG, JPEG, PNG, atau WEBP.
                        Maksimal 5 MB.
                    </div>

                </div>

            </div>

        </section>



        <!-- =========================
             ACTION
        ========================== -->

        <div class="actions">

            <a
                href="<?= base_url('admin/places') ?>"
                class="cancel-button"
            >
                Batal
            </a>


            <button
                type="submit"
                class="save-button"
            >
                TAMBAH PLACE →
            </button>

        </div>


    </form>


</main>

</body>

</html>