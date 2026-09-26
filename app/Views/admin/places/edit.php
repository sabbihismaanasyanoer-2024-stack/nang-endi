<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Place — NANG ENDI?</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f2ed;
            color: #171717;
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        nav {
            min-height: 75px;
            padding: 0 6%;
            border-bottom: 1px solid #171717;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f4f2ed;
        }

        .logo {
            font-size: 24px;
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
            max-width: 1100px;
            margin: 0 auto;
            padding: 70px 5% 100px;
        }

        .eyebrow {
            margin-bottom: 12px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0 0 45px;
            font-size: clamp(55px, 9vw, 100px);
            line-height: .85;
            letter-spacing: -6px;
        }

        .errors,
        .success {
            margin-bottom: 25px;
            padding: 18px 20px;
            border: 1px solid #171717;
            background: #fff;
        }

        .errors-title {
            margin-bottom: 8px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .errors ul {
            margin: 0;
            padding-left: 20px;
            font-size: 13px;
            line-height: 1.7;
        }

        .success {
            font-size: 13px;
        }

        .form-container {
            display: grid;
            gap: 28px;
        }

        .form-group {
            padding: 25px;
            border: 1px solid #171717;
            background: #fff;
        }

        .form-group > label {
            display: block;
            margin-bottom: 10px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 14px;
            border: 1px solid #171717;
            border-radius: 0;
            background: #f4f2ed;
            color: #171717;
            font: inherit;
            font-size: 13px;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
            line-height: 1.6;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: 2px solid #171717;
            outline-offset: 2px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field-label {
            display: block;
            margin-bottom: 9px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }

        .subcategory-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
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
            display: block;
            padding: 14px;
            border: 1px solid #171717;
            background: #f4f2ed;
            cursor: pointer;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-align: center;
            text-transform: uppercase;
        }

        .subcategory-option input:checked + label {
            background: #171717;
            color: #fff;
        }

        .subcategory-note {
            margin-top: 12px;
            color: #555;
            font-size: 11px;
            line-height: 1.5;
        }

        .current-image {
            margin-bottom: 20px;
            border: 1px solid #171717;
            background: #f4f2ed;
            overflow: hidden;
        }

        .current-image img {
            display: block;
            width: 100%;
            max-height: 420px;
            object-fit: cover;
        }

        .no-image {
            padding: 60px 20px;
            text-align: center;
            font-size: 35px;
        }

        .image-info {
            padding: 12px 15px;
            border-top: 1px solid #171717;
            font-size: 11px;
        }

        .delete-image {
            margin-top: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .delete-image input {
            width: 16px;
            height: 16px;
        }

        .delete-image label {
            margin: 0;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .image-note {
            margin: 10px 0 0;
            color: #555;
            font-size: 11px;
            line-height: 1.5;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            padding: 15px 22px;
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

        @media (max-width: 700px) {

            nav {
                padding: 0 5%;
            }

            .nav-right span {
                display: none;
            }

            .page {
                padding: 50px 5% 80px;
            }

            h1 {
                letter-spacing: -4px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .subcategory-grid {
                grid-template-columns: 1fr 1fr;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

        }

        @media (max-width: 450px) {

            .subcategory-grid {
                grid-template-columns: 1fr;
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
            ADMIN / PLACES
        </span>

        <a href="<?= base_url('admin/places') ?>">
            ← PLACES
        </a>

    </div>

</nav>


<main class="page">


    <div class="eyebrow">
        ADMINISTRATION / PLACES / EDIT
    </div>


    <h1>
        EDIT PLACE.
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
        action="<?= base_url('admin/places/update/' . $place['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >

        <?= csrf_field() ?>


        <div class="form-container">


            <!-- =========================
                 BASIC INFORMATION
            ========================== -->

            <div class="form-group">

                <div class="field">

                    <label
                        for="name"
                        class="field-label"
                    >
                        Nama Place
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="<?= old('name', $place['name'] ?? '') ?>"
                        required
                    >

                </div>


                <div class="field">

                    <label
                        for="slug"
                        class="field-label"
                    >
                        Slug
                    </label>

                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="<?= old('slug', $place['slug'] ?? '') ?>"
                        required
                    >

                </div>


                <div class="field">

                    <label
                        for="description"
                        class="field-label"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                    ><?= old('description', $place['description'] ?? '') ?></textarea>

                </div>

            </div>


            <!-- =========================
                 CATEGORY
            ========================== -->

            <div class="form-group">

                <label
                    for="category_id"
                >
                    Kategori Place
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    required
                >

                    <option value="">
                        — Pilih Kategori —
                    </option>

                    <option
                        value="9"
                        <?= (string) old('category_id', $place['category_id'] ?? '') === '9' ? 'selected' : '' ?>
                    >
                        Culture & Heritage
                    </option>

                    <option
                        value="10"
                        <?= (string) old('category_id', $place['category_id'] ?? '') === '10' ? 'selected' : '' ?>
                    >
                        Food & Culinary
                    </option>

                    <option
                        value="11"
                        <?= (string) old('category_id', $place['category_id'] ?? '') === '11' ? 'selected' : '' ?>
                    >
                        Cafe & Hangout
                    </option>

                    <option
                        value="12"
                        <?= (string) old('category_id', $place['category_id'] ?? '') === '12' ? 'selected' : '' ?>
                    >
                        Creative Space
                    </option>

                    <option
                        value="13"
                        <?= (string) old('category_id', $place['category_id'] ?? '') === '13' ? 'selected' : '' ?>
                    >
                        Outdoor
                    </option>

                    <option
                        value="14"
                        <?= (string) old('category_id', $place['category_id'] ?? '') === '14' ? 'selected' : '' ?>
                    >
                        Shopping
                    </option>

                    <option
                        value="15"
                        <?= (string) old('category_id', $place['category_id'] ?? '') === '15' ? 'selected' : '' ?>
                    >
                        Café
                    </option>

                </select>

            </div>


            <!-- =========================
                 SUBCATEGORY
            ========================== -->

            <div class="form-group">

                <label>
                    Subcategory
                </label>


                <?php
                    $selectedSubcategories = old(
                        'subcategories',
                        $selectedSubcategories ?? []
                    );

                    if (!is_array($selectedSubcategories)) {
                        $selectedSubcategories = [];
                    }

                    $selectedSubcategories = array_map(
                        'strtoupper',
                        $selectedSubcategories
                    );
                ?>


                <div class="subcategory-grid">


                    <?php
                    $subcategoryOptions = [
                        'WFC',
                        'LEGEND',
                        'KALCER',
                        'MUSEUM',
                        'HERITAGE',
                        'CULTURE'
                    ];
                    ?>


                    <?php foreach ($subcategoryOptions as $subcategory): ?>

                        <div class="subcategory-option">

                            <input
                                type="checkbox"
                                id="subcategory_<?= strtolower($subcategory) ?>"
                                name="subcategories[]"
                                value="<?= esc($subcategory) ?>"
                                <?= in_array($subcategory, $selectedSubcategories, true) ? 'checked' : '' ?>
                            >

                            <label
                                for="subcategory_<?= strtolower($subcategory) ?>"
                            >
                                <?= esc($subcategory) ?>
                            </label>

                        </div>

                    <?php endforeach; ?>

                </div>


                <div class="subcategory-note">
                    Bisa pilih lebih dari satu subcategory.
                </div>

            </div>


            <!-- =========================
                 LOCATION
            ========================== -->

            <div class="form-group">

                <div class="field">

                    <label
                        for="address"
                        class="field-label"
                    >
                        Alamat
                    </label>

                    <textarea
                        id="address"
                        name="address"
                    ><?= old('address', $place['address'] ?? '') ?></textarea>

                </div>


                <div class="field">

                    <label
                        for="opening_hours"
                        class="field-label"
                    >
                        Jam Buka
                    </label>

                    <textarea
                        id="opening_hours"
                        name="opening_hours"
                        style="min-height:100px;"
                    ><?= old('opening_hours', $place['opening_hours'] ?? '') ?></textarea>

                </div>


                <div class="form-row">

                    <div class="field">

                        <label
                            for="latitude"
                            class="field-label"
                        >
                            Latitude
                        </label>

                        <input
                            type="text"
                            id="latitude"
                            name="latitude"
                            value="<?= old('latitude', $place['latitude'] ?? '') ?>"
                        >

                    </div>


                    <div class="field">

                        <label
                            for="longitude"
                            class="field-label"
                        >
                            Longitude
                        </label>

                        <input
                            type="text"
                            id="longitude"
                            name="longitude"
                            value="<?= old('longitude', $place['longitude'] ?? '') ?>"
                        >

                    </div>

                </div>

            </div>


            <!-- =========================
                 CONTACT & PRICE
            ========================== -->

            <div class="form-group">

                <div class="form-row">

                    <div class="field">

                        <label
                            for="price"
                            class="field-label"
                        >
                            Harga
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            min="0"
                            value="<?= old('price', $place['price'] ?? 0) ?>"
                        >

                    </div>


                    <div class="field">

                        <label
                            for="phone"
                            class="field-label"
                        >
                            Telepon
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            value="<?= old('phone', $place['phone'] ?? '') ?>"
                        >

                    </div>

                </div>


                <div class="field">

                    <label
                        for="website"
                        class="field-label"
                    >
                        Website
                    </label>

                    <input
                        type="text"
                        id="website"
                        name="website"
                        value="<?= old('website', $place['website'] ?? '') ?>"
                    >

                </div>


                <div class="field">

                    <label
                        for="instagram"
                        class="field-label"
                    >
                        Instagram
                    </label>

                    <input
                        type="text"
                        id="instagram"
                        name="instagram"
                        value="<?= old('instagram', $place['instagram'] ?? '') ?>"
                    >

                </div>

            </div>


            <!-- =========================
                 IMAGE
            ========================== -->

            <div class="form-group">

                <label>
                    Gambar Place
                </label>


                <div class="current-image">

                    <?php if (!empty($place['image'])): ?>

                        <img
                            src="<?= base_url(ltrim($place['image'], '/')) ?>"
                            alt="<?= esc($place['name']) ?>"
                        >

                        <div class="image-info">
                            Gambar saat ini:
                            <?= esc(basename($place['image'])) ?>
                        </div>

                    <?php else: ?>

                        <div class="no-image">
                            🖼️
                        </div>

                    <?php endif; ?>

                </div>


                <label
                    for="image"
                >
                    Ganti Gambar
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/jpeg,image/jpg,image/png,image/webp"
                >


                <?php if (!empty($place['image'])): ?>

                    <div class="delete-image">

                        <input
                            type="checkbox"
                            id="delete_image"
                            name="delete_image"
                            value="1"
                        >

                        <label for="delete_image">
                            Hapus gambar saat ini
                        </label>

                    </div>

                <?php endif; ?>


                <p class="image-note">
                    Pilih gambar baru jika ingin mengganti gambar.
                    Jika tidak memilih gambar, gambar lama tetap digunakan.
                    Format JPG, PNG, atau WEBP. Maksimal 5 MB.
                </p>

            </div>


        </div>


        <!-- =========================
             ACTIONS
        ========================== -->

        <div class="actions">

            <a
                href="<?= base_url('admin/places') ?>"
                class="btn btn-secondary"
            >
                BATAL
            </a>


            <button
                type="submit"
                class="btn"
            >
                SIMPAN PERUBAHAN →
            </button>

        </div>


    </form>


</main>


</body>

</html>