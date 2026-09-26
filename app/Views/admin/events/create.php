<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Event — NANG ENDI?</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            background: #f4f1ea;
            color: #111;
            font-family: Arial, Helvetica, sans-serif;
        }


        .container {
            width: min(1100px, 92%);
            margin: 40px auto 80px;
        }


        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }


        .back {
            color: #111;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }


        h1 {
            font-size: clamp(40px, 7vw, 80px);
            line-height: .9;
            margin: 0;
            letter-spacing: -4px;
        }


        .subtitle {
            margin-top: 12px;
            font-size: 14px;
        }


        .form-card {
            background: #ebe7df;
            border: 1px solid #111;
            box-shadow: 6px 6px 0 #111;
            padding: 30px;
        }


        .section-title {
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 30px 0 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #111;
        }


        .section-title:first-child {
            margin-top: 0;
        }


        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }


        .full {
            grid-column: 1 / -1;
        }


        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 7px;
        }


        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #111;
            background: #f8f6f0;
            color: #111;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }


        input:focus,
        textarea:focus,
        select:focus {
            box-shadow: 3px 3px 0 #111;
        }


        textarea {
            min-height: 150px;
            resize: vertical;
        }


        .hint {
            margin-top: 5px;
            font-size: 11px;
            color: #555;
        }


        .errors {
            background: #111;
            color: white;
            padding: 15px 18px;
            margin-bottom: 25px;
        }


        .errors strong {
            display: block;
            margin-bottom: 8px;
        }


        .errors ul {
            margin: 0;
            padding-left: 20px;
        }


        .actions {
            display: flex;
            gap: 12px;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid #111;
        }


        .btn {
            display: inline-block;
            padding: 14px 24px;
            border: 1px solid #111;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }


        .btn-primary {
            background: #111;
            color: white;
        }


        .btn-secondary {
            background: transparent;
            color: #111;
        }


        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }


        .checkbox-row input {
            width: auto;
        }


        .image-preview {
            margin-top: 15px;
            display: none;
        }


        .image-preview img {
            display: block;
            width: 100%;
            max-width: 500px;
            max-height: 300px;
            object-fit: cover;
            border: 1px solid #111;
        }


        @media (max-width: 700px) {

            .grid {
                grid-template-columns: 1fr;
            }


            .full {
                grid-column: auto;
            }


            .form-card {
                padding: 20px;
                box-shadow: 4px 4px 0 #111;
            }


            .actions {
                flex-direction: column;
            }


            .btn {
                text-align: center;
            }

        }

    </style>

</head>


<body>


<div class="container">


    <!-- =========================
         TOP BAR
    ========================== -->

    <div class="topbar">

        <div>

            <h1>
                CREATE<br>
                EVENT.
            </h1>

            <div class="subtitle">
                Tambahkan event baru ke NANG ENDI?
            </div>

        </div>


        <a
            href="<?= site_url('admin/events') ?>"
            class="back"
        >
            ← KEMBALI
        </a>

    </div>



    <!-- =========================
         ERRORS
    ========================== -->

    <?php if (session()->getFlashdata('errors')): ?>

        <div class="errors">

            <strong>
                ADA YANG PERLU DIBENERIN:
            </strong>


            <ul>

                <?php foreach (
                    session()->getFlashdata('errors')
                    as $error
                ): ?>

                    <li>
                        <?= esc($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>



    <!-- =========================
         FORM
    ========================== -->

    <form
        action="<?= site_url('admin/events/store') ?>"
        method="POST"
        enctype="multipart/form-data"
    >

        <?= csrf_field() ?>


        <div class="form-card">


            <!-- =========================
                 BASIC INFO
            ========================== -->

            <div class="section-title">
                BASIC INFO
            </div>


            <div class="grid">


                <!-- TITLE -->

                <div class="full">

                    <label for="title">
                        Judul Event *
                    </label>


                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="<?= old('title') ?>"
                        placeholder="Contoh: ARTSUBS 2026"
                        required
                    >

                </div>



                <!-- SLUG -->

                <div>

                    <label for="slug">
                        Slug *
                    </label>


                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="<?= old('slug') ?>"
                        placeholder="artsubs-2026"
                        required
                    >


                    <div class="hint">
                        Contoh: art-subs-2026
                    </div>

                </div>



                <!-- CATEGORY -->

                <div>

                    <label for="category_id">
                        Kategori *
                    </label>


                    <select
                        name="category_id"
                        id="category_id"
                        required
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>


                        <option
                            value="1"
                            <?= old('category_id') == '1'
                                ? 'selected'
                                : '' ?>
                        >
                            Music
                        </option>


                        <option
                            value="2"
                            <?= old('category_id') == '2'
                                ? 'selected'
                                : '' ?>
                        >
                            Art &amp; Exhibition
                        </option>


                        <option
                            value="3"
                            <?= old('category_id') == '3'
                                ? 'selected'
                                : '' ?>
                        >
                            Food &amp; Culinary
                        </option>


                        <option
                            value="4"
                            <?= old('category_id') == '4'
                                ? 'selected'
                                : '' ?>
                        >
                            Culture &amp; Heritage
                        </option>


                        <option
                            value="5"
                            <?= old('category_id') == '5'
                                ? 'selected'
                                : '' ?>
                        >
                            Education
                        </option>


                        <option
                            value="6"
                            <?= old('category_id') == '6'
                                ? 'selected'
                                : '' ?>
                        >
                            Sport
                        </option>


                        <option
                            value="7"
                            <?= old('category_id') == '7'
                                ? 'selected'
                                : '' ?>
                        >
                            Festival
                        </option>


                        <option
                            value="8"
                            <?= old('category_id') == '8'
                                ? 'selected'
                                : '' ?>
                        >
                            Community
                        </option>


                        <!--
                        |--------------------------------------------------------------------------
                        | WORKSHOP
                        |--------------------------------------------------------------------------
                        | ID 16 = Workshop
                        | Jangan gunakan ID 9 karena ID 9
                        | adalah Culture & Heritage untuk Places.
                        |--------------------------------------------------------------------------
                        -->

                        <option
                            value="16"
                            <?= old('category_id') == '16'
                                ? 'selected'
                                : '' ?>
                        >
                            Workshop
                        </option>


                    </select>


                    <div class="hint">
                        Kategori disimpan berdasarkan category_id database.
                    </div>

                </div>



                <!-- DESCRIPTION -->

                <div class="full">

                    <label for="description">
                        Deskripsi
                    </label>


                    <textarea
                        id="description"
                        name="description"
                        placeholder="Ceritakan event ini..."
                    ><?= old('description') ?></textarea>

                </div>


            </div>



            <!-- =========================
                 IMAGE
            ========================== -->

            <div class="section-title">
                EVENT IMAGE
            </div>


            <div class="grid">


                <div class="full">

                    <label for="image">
                        Gambar Event
                    </label>


                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="
                            image/jpeg,
                            image/png,
                            image/webp,
                            image/gif
                        "
                    >


                    <div class="hint">
                        Format JPG, JPEG, PNG, WEBP, atau GIF.
                        Maksimal 5 MB.
                    </div>


                    <div
                        class="image-preview"
                        id="imagePreview"
                    >

                        <img
                            id="previewImage"
                            src=""
                            alt="Preview gambar event"
                        >

                    </div>

                </div>


            </div>



            <!-- =========================
                 DATE & TIME
            ========================== -->

            <div class="section-title">
                DATE &amp; TIME
            </div>


            <div class="grid">


                <!-- DATE START -->

                <div>

                    <label for="date_start">
                        Tanggal Mulai *
                    </label>


                    <input
                        type="date"
                        id="date_start"
                        name="date_start"
                        value="<?= old('date_start') ?>"
                        required
                    >

                </div>



                <!-- DATE END -->

                <div>

                    <label for="date_end">
                        Tanggal Selesai
                    </label>


                    <input
                        type="date"
                        id="date_end"
                        name="date_end"
                        value="<?= old('date_end') ?>"
                    >

                </div>



                <!-- TIME START -->

                <div>

                    <label for="time_start">
                        Jam Mulai
                    </label>


                    <input
                        type="time"
                        id="time_start"
                        name="time_start"
                        value="<?= old('time_start') ?>"
                    >

                </div>



                <!-- TIME END -->

                <div>

                    <label for="time_end">
                        Jam Selesai
                    </label>


                    <input
                        type="time"
                        id="time_end"
                        name="time_end"
                        value="<?= old('time_end') ?>"
                    >

                </div>


            </div>



            <!-- =========================
                 LOCATION
            ========================== -->

            <div class="section-title">
                LOCATION
            </div>


            <div class="grid">


                <!-- LOCATION NAME -->

                <div class="full">

                    <label for="location_name">
                        Nama Lokasi *
                    </label>


                    <input
                        type="text"
                        id="location_name"
                        name="location_name"
                        value="<?= old('location_name') ?>"
                        placeholder="Contoh: Balai Pemuda Surabaya"
                        required
                    >

                </div>



                <!-- ADDRESS -->

                <div class="full">

                    <label for="address">
                        Alamat
                    </label>


                    <textarea
                        id="address"
                        name="address"
                        style="min-height: 90px;"
                        placeholder="Alamat lengkap venue..."
                    ><?= old('address') ?></textarea>

                </div>



                <!-- LATITUDE -->

                <div>

                    <label for="latitude">
                        Latitude
                    </label>


                    <input
                        type="text"
                        id="latitude"
                        name="latitude"
                        value="<?= old('latitude') ?>"
                        placeholder="-7.2622"
                    >

                </div>



                <!-- LONGITUDE -->

                <div>

                    <label for="longitude">
                        Longitude
                    </label>


                    <input
                        type="text"
                        id="longitude"
                        name="longitude"
                        value="<?= old('longitude') ?>"
                        placeholder="112.7447"
                    >

                </div>


            </div>



            <!-- =========================
                 TICKET
            ========================== -->

            <div class="section-title">
                TICKET &amp; REGISTRATION
            </div>


            <div class="grid">


                <!-- PRICE -->

                <div>

                    <label for="price">
                        Harga Tiket
                    </label>


                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="<?= old('price', 0) ?>"
                        min="0"
                        placeholder="0"
                    >


                    <div class="hint">
                        Isi 0 jika gratis.
                    </div>

                </div>



                <!-- REGISTRATION URL -->

                <div>

                    <label for="registration_url">
                        Link Tiket / Registrasi / Info
                    </label>


                    <input
                        type="url"
                        id="registration_url"
                        name="registration_url"
                        value="<?= old('registration_url') ?>"
                        placeholder="https://..."
                    >


                    <div class="hint">
                        Gunakan link resmi event.
                    </div>

                </div>


            </div>



            <!-- =========================
                 ORGANIZER
            ========================== -->

            <div class="section-title">
                ORGANIZER
            </div>


            <div class="grid">


                <!-- ORGANIZER NAME -->

                <div>

                    <label for="organizer_name">
                        Nama Organizer
                    </label>


                    <input
                        type="text"
                        id="organizer_name"
                        name="organizer_name"
                        value="<?= old('organizer_name') ?>"
                        placeholder="Nama penyelenggara"
                    >

                </div>



                <!-- ORGANIZER CONTACT -->

                <div>

                    <label for="organizer_contact">
                        Kontak Organizer
                    </label>


                    <input
                        type="text"
                        id="organizer_contact"
                        name="organizer_contact"
                        value="<?= old('organizer_contact') ?>"
                        placeholder="Email / WhatsApp"
                    >

                </div>


            </div>



            <!-- =========================
                 PUBLISH
            ========================== -->

            <div class="section-title">
                PUBLISH
            </div>


            <div class="grid">


                <!-- STATUS -->

                <div>

                    <label for="status">
                        Status
                    </label>


                    <select
                        name="status"
                        id="status"
                    >

                        <option
                            value="draft"
                            <?= old(
                                'status',
                                'draft'
                            ) === 'draft'
                                ? 'selected'
                                : '' ?>
                        >
                            Draft
                        </option>


                        <option
                            value="published"
                            <?= old(
                                'status'
                            ) === 'published'
                                ? 'selected'
                                : '' ?>
                        >
                            Published
                        </option>


                    </select>

                </div>



                <!-- PARTNER -->

                <div>

                    <label>
                        Partner Event
                    </label>


                    <div class="checkbox-row">

                        <input
                            type="checkbox"
                            id="is_partner"
                            name="is_partner"
                            value="1"
                            <?= old('is_partner')
                                ? 'checked'
                                : '' ?>
                        >


                        <label
                            for="is_partner"
                            style="
                                margin:0;
                                font-weight:normal;
                            "
                        >
                            Event partner NANG ENDI?
                        </label>

                    </div>

                </div>


            </div>



            <!-- =========================
                 ACTIONS
            ========================== -->

            <div class="actions">


                <a
                    href="<?= site_url(
                        'admin/events'
                    ) ?>"
                    class="btn btn-secondary"
                >
                    BATAL
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    SIMPAN EVENT →
                </button>


            </div>


        </div>

    </form>

</div>



<script>

    /*
    |--------------------------------------------------------------------------
    | AUTO SLUG
    |--------------------------------------------------------------------------
    */

    const titleInput =
        document.getElementById('title');


    const slugInput =
        document.getElementById('slug');


    if (titleInput && slugInput) {

        titleInput.addEventListener(
            'input',
            function () {

                /*
                 * Kalau user sudah mengedit slug
                 * secara manual, jangan ditimpa.
                 */

                if (
                    slugInput.dataset.edited ===
                    'true'
                ) {
                    return;
                }


                slugInput.value =
                    this.value
                        .toLowerCase()
                        .trim()
                        .replace(
                            /[^a-z0-9\s-]/g,
                            ''
                        )
                        .replace(
                            /\s+/g,
                            '-'
                        )
                        .replace(
                            /-+/g,
                            '-'
                        );

            }
        );


        slugInput.addEventListener(
            'input',
            function () {

                this.dataset.edited =
                    'true';

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | IMAGE PREVIEW
    |--------------------------------------------------------------------------
    */

    const imageInput =
        document.getElementById('image');


    const imagePreview =
        document.getElementById(
            'imagePreview'
        );


    const previewImage =
        document.getElementById(
            'previewImage'
        );


    if (
        imageInput &&
        imagePreview &&
        previewImage
    ) {

        imageInput.addEventListener(
            'change',
            function () {

                const file =
                    this.files &&
                    this.files[0];


                if (!file) {

                    imagePreview.style.display =
                        'none';

                    previewImage.src =
                        '';

                    return;

                }


                const reader =
                    new FileReader();


                reader.onload =
                    function (event) {

                        previewImage.src =
                            event.target.result;

                        imagePreview.style.display =
                            'block';

                    };


                reader.readAsDataURL(file);

            }
        );

    }

</script>


</body>
</html>