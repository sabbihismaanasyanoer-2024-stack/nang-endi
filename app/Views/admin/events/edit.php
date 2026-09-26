<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Event — NANG ENDI?</title>


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
            max-width: 1000px;

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

            letter-spacing: -6px;
        }


        .form-container {
            border-top: 1px solid #171717;
        }


        .form-group {
            padding: 25px 0;

            border-bottom: 1px solid #171717;
        }


        label {
            display: block;

            margin-bottom: 10px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        input,
        textarea,
        select {
            width: 100%;

            padding: 15px;

            border: 1px solid #171717;

            background: #fff;

            color: #171717;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            font-size: 14px;

            outline: none;
        }


        input:focus,
        textarea:focus,
        select:focus {
            background: #f5f3ee;
        }


        textarea {
            min-height: 150px;

            resize: vertical;
        }


        .form-row {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 20px;
        }


        .checkbox-group {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .checkbox-group input {
            width: auto;
        }


        .checkbox-group label {
            margin: 0;
        }


        /* =========================
           IMAGE
        ========================== */

        .current-image {
            margin-bottom: 20px;
        }


        .current-image-label {
            display: block;

            margin-bottom: 10px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .current-image img {
            display: block;

            width: 100%;
            max-width: 500px;

            height: 280px;

            object-fit: cover;

            border: 1px solid #171717;

            background: #fff;
        }


        .no-image {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 100%;
            max-width: 500px;

            height: 280px;

            border: 1px solid #171717;

            background: #fff;

            font-size: 50px;
        }


        .image-note {
            margin-top: 10px;

            font-size: 12px;

            line-height: 1.5;
        }


        .file-input {
            padding: 12px;

            background: #fff;

            cursor: pointer;
        }


        .actions {
            display: flex;

            align-items: center;

            gap: 20px;

            margin-top: 35px;
        }


        .btn {
            display: inline-block;

            padding: 16px 25px;

            border: 1px solid #171717;

            background: #171717;

            color: #fff;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            cursor: pointer;
        }


        .btn:hover {
            background: #fff;

            color: #171717;
        }


        .btn-secondary {
            background: transparent;

            color: #171717;
        }


        .btn-secondary:hover {
            background: #171717;

            color: #fff;
        }


        .errors {
            margin-bottom: 25px;

            padding: 20px;

            border: 1px solid #171717;

            background: #fff;
        }


        .errors-title {
            margin-bottom: 10px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .errors ul {
            padding-left: 20px;

            font-size: 13px;

            line-height: 1.7;
        }


        .success {
            margin-bottom: 25px;

            padding: 20px;

            border: 1px solid #171717;

            background: #fff;

            font-size: 13px;
        }


        @media (max-width: 700px) {

            .page {
                padding: 50px 5% 80px;
            }


            .form-row {
                grid-template-columns: 1fr;
            }


            .nav-right {
                gap: 12px;
            }


            h1 {
                letter-spacing: -4px;
            }


            .actions {
                flex-direction: column;

                align-items: stretch;
            }


            .btn {
                text-align: center;
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


        <a href="<?= base_url('admin/events') ?>">
            ← EVENTS
        </a>

    </div>

</nav>



<main class="page">


    <div class="eyebrow">
        ADMINISTRATION / EVENTS / EDIT
    </div>


    <h1>
        EDIT EVENT.
    </h1>



    <?php if (session()->getFlashdata('errors')): ?>

        <div class="errors">

            <div class="errors-title">
                Terjadi Kesalahan
            </div>


            <ul>

                <?php foreach (session()->getFlashdata('errors') as $error): ?>

                    <li>
                        <?= esc($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('success')): ?>

        <div class="success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>



    <form
        action="<?= base_url('admin/events/update/' . $event['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >

        <?= csrf_field() ?>


        <div class="form-container">


            <!-- =========================
                 IMAGE
            ========================== -->

            <div class="form-group">

                <label>
                    Gambar Event
                </label>


                <div class="current-image">

                    <span class="current-image-label">
                        Gambar Saat Ini
                    </span>


                    <?php if (!empty($event['image'])): ?>

                        <img
                            src="<?= base_url($event['image']) ?>"
                            alt="<?= esc($event['title']) ?>"
                        >

                    <?php else: ?>

                        <div class="no-image">
                            🎪
                        </div>

                    <?php endif; ?>

                </div>


                <label for="image">
                    Ubah Gambar
                </label>


                <input
                    type="file"
                    id="image"
                    name="image"
                    class="file-input"
                    accept="image/jpeg,image/png,image/webp,image/gif"
                >


                <p class="image-note">
                    Pilih gambar baru jika ingin mengganti gambar event.
                    Jika tidak memilih gambar, gambar lama tetap digunakan.
                    Format: JPG, PNG, WEBP, atau GIF. Maksimal 5 MB.
                </p>

            </div>



            <!-- =========================
                 CATEGORY
            ========================== -->

            <div class="form-group">

                <label for="category_id">
                    Kategori Event *
                </label>

                <?php
                    $selectedCategory = old(
                        'category_id',
                        $event['category_id'] ?? ''
                    );
                ?>

                <select
                    id="category_id"
                    name="category_id"
                    required
                >

                    <option value="">
                        — Pilih Kategori —
                    </option>

                    <option
                        value="1"
                        <?= (string) $selectedCategory === '1' ? 'selected' : '' ?>
                    >
                        Music
                    </option>

                    <option
                        value="2"
                        <?= (string) $selectedCategory === '2' ? 'selected' : '' ?>
                    >
                        Art & Exhibition
                    </option>

                    <option
                        value="3"
                        <?= (string) $selectedCategory === '3' ? 'selected' : '' ?>
                    >
                        Food & Culinary
                    </option>

                    <option
                        value="4"
                        <?= (string) $selectedCategory === '4' ? 'selected' : '' ?>
                    >
                        Culture & Heritage
                    </option>

                    <option
                        value="5"
                        <?= (string) $selectedCategory === '5' ? 'selected' : '' ?>
                    >
                        Education
                    </option>

                    <option
                        value="6"
                        <?= (string) $selectedCategory === '6' ? 'selected' : '' ?>
                    >
                        Sport
                    </option>

                    <option
                        value="7"
                        <?= (string) $selectedCategory === '7' ? 'selected' : '' ?>
                    >
                        Festival
                    </option>

                    <option
                        value="8"
                        <?= (string) $selectedCategory === '8' ? 'selected' : '' ?>
                    >
                        Community
                    </option>

                    <option
                        value="16"
                        <?= (string) $selectedCategory === '16' ? 'selected' : '' ?>
                    >
                        Workshop
                    </option>

                </select>

            </div>



            <!-- =========================
                 TITLE
            ========================== -->

            <div class="form-group">

                <label for="title">
                    Judul Event *
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?= old('title', $event['title'] ?? '') ?>"
                    required
                >

            </div>



            <!-- =========================
                 SLUG
            ========================== -->

            <div class="form-group">

                <label for="slug">
                    Slug *
                </label>

                <input
                    type="text"
                    id="slug"
                    name="slug"
                    value="<?= old('slug', $event['slug'] ?? '') ?>"
                    required
                >

            </div>



            <!-- =========================
                 DESCRIPTION
            ========================== -->

            <div class="form-group">

                <label for="description">
                    Deskripsi
                </label>

                <textarea
                    id="description"
                    name="description"
                ><?= old('description', $event['description'] ?? '') ?></textarea>

            </div>



            <!-- =========================
                 DATE
            ========================== -->

            <div class="form-group">

                <div class="form-row">


                    <div>

                        <label for="date_start">
                            Tanggal Mulai *
                        </label>

                        <input
                            type="date"
                            id="date_start"
                            name="date_start"
                            value="<?= old('date_start', $event['date_start'] ?? '') ?>"
                            required
                        >

                    </div>



                    <div>

                        <label for="date_end">
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            id="date_end"
                            name="date_end"
                            value="<?= old('date_end', $event['date_end'] ?? '') ?>"
                        >

                    </div>


                </div>

            </div>



            <!-- =========================
                 TIME
            ========================== -->

            <div class="form-group">

                <div class="form-row">


                    <div>

                        <label for="time_start">
                            Waktu Mulai
                        </label>

                        <input
                            type="time"
                            id="time_start"
                            name="time_start"
                            value="<?= old('time_start', $event['time_start'] ?? '') ?>"
                        >

                    </div>



                    <div>

                        <label for="time_end">
                            Waktu Selesai
                        </label>

                        <input
                            type="time"
                            id="time_end"
                            name="time_end"
                            value="<?= old('time_end', $event['time_end'] ?? '') ?>"
                        >

                    </div>


                </div>

            </div>



            <!-- =========================
                 LOCATION
            ========================== -->

            <div class="form-group">

                <label for="location_name">
                    Nama Lokasi *
                </label>

                <input
                    type="text"
                    id="location_name"
                    name="location_name"
                    value="<?= old('location_name', $event['location_name'] ?? '') ?>"
                    required
                >

            </div>



            <!-- =========================
                 ADDRESS
            ========================== -->

            <div class="form-group">

                <label for="address">
                    Alamat
                </label>

                <textarea
                    id="address"
                    name="address"
                    style="min-height: 100px;"
                ><?= old('address', $event['address'] ?? '') ?></textarea>

            </div>



            <!-- =========================
                 COORDINATES
            ========================== -->

            <div class="form-group">

                <div class="form-row">


                    <div>

                        <label for="latitude">
                            Latitude
                        </label>

                        <input
                            type="text"
                            id="latitude"
                            name="latitude"
                            value="<?= old('latitude', $event['latitude'] ?? '') ?>"
                        >

                    </div>



                    <div>

                        <label for="longitude">
                            Longitude
                        </label>

                        <input
                            type="text"
                            id="longitude"
                            name="longitude"
                            value="<?= old('longitude', $event['longitude'] ?? '') ?>"
                        >

                    </div>


                </div>

            </div>



            <!-- =========================
                 PRICE
            ========================== -->

            <div class="form-group">

                <label for="price">
                    Harga
                </label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    min="0"
                    value="<?= old('price', $event['price'] ?? 0) ?>"
                >

            </div>



            <!-- =========================
                 REGISTRATION URL
            ========================== -->

            <div class="form-group">

                <label for="registration_url">
                    Registration URL
                </label>

                <input
                    type="url"
                    id="registration_url"
                    name="registration_url"
                    value="<?= old('registration_url', $event['registration_url'] ?? '') ?>"
                >

            </div>



            <!-- =========================
                 ORGANIZER
            ========================== -->

            <div class="form-group">

                <div class="form-row">


                    <div>

                        <label for="organizer_name">
                            Nama Organizer
                        </label>

                        <input
                            type="text"
                            id="organizer_name"
                            name="organizer_name"
                            value="<?= old('organizer_name', $event['organizer_name'] ?? '') ?>"
                        >

                    </div>



                    <div>

                        <label for="organizer_contact">
                            Kontak Organizer
                        </label>

                        <input
                            type="text"
                            id="organizer_contact"
                            name="organizer_contact"
                            value="<?= old('organizer_contact', $event['organizer_contact'] ?? '') ?>"
                        >

                    </div>


                </div>

            </div>



            <!-- =========================
                 STATUS
            ========================== -->

            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                >

                    <option
                        value="draft"
                        <?= old('status', $event['status'] ?? '') === 'draft' ? 'selected' : '' ?>
                    >
                        Draft
                    </option>

                    <option
                        value="published"
                        <?= old('status', $event['status'] ?? '') === 'published' ? 'selected' : '' ?>
                    >
                        Published
                    </option>

                </select>

            </div>



            <!-- =========================
                 PARTNER
            ========================== -->

            <div class="form-group">

                <div class="checkbox-group">

                    <input
                        type="checkbox"
                        id="is_partner"
                        name="is_partner"
                        value="1"
                        <?= old('is_partner', $event['is_partner'] ?? 0) ? 'checked' : '' ?>
                    >

                    <label for="is_partner">
                        Event Partner
                    </label>

                </div>

            </div>


        </div>



        <!-- =========================
             ACTIONS
        ========================== -->

        <div class="actions">

            <button
                type="submit"
                class="btn"
            >
                Simpan Perubahan →
            </button>


            <a
                href="<?= base_url('admin/events') ?>"
                class="btn btn-secondary"
            >
                Batal
            </a>

        </div>


    </form>


</main>


</body>

</html>