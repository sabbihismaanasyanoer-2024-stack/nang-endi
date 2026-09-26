<?php

$placeName = $place['name'] ?? 'Place Detail';
$image = $place['image'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= esc($placeName) ?> — Admin
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f4f1;
            color: #29231f;
        }

        .page {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 24px 60px;
        }


        /* HEADER */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 28px;
        }

        .eyebrow {
            display: block;
            margin-bottom: 8px;

            font-size: 12px;
            font-weight: 700;
            letter-spacing: .12em;

            color: #8b5e3c;
        }

        h1 {
            margin: 0 0 8px;

            font-size: 34px;
            line-height: 1.2;
        }

        .subtitle {
            margin: 0;

            color: #777;
            font-size: 15px;
        }


        /* BUTTON */

        .actions {
            display: flex;
            gap: 10px;
            flex-shrink: 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 42px;
            padding: 0 18px;

            border-radius: 10px;

            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            transition: .2s ease;
        }

        .btn-primary {
            background: #8b5e3c;
            color: #fff;
        }

        .btn-primary:hover {
            background: #744a2e;
        }

        .btn-secondary {
            background: #e9e1da;
            color: #4d4037;
        }

        .btn-secondary:hover {
            background: #ddd2c8;
        }


        /* CARD */

        .card {
            background: #fff;

            border: 1px solid #e8ded5;
            border-radius: 20px;

            padding: 30px;

            box-shadow:
                0 10px 35px rgba(60, 40, 20, .07);
        }


        /* IMAGE */

        .image-wrapper {
            margin-bottom: 30px;
        }

        .place-image {
            display: block;

            width: 100%;
            max-width: 760px;
            height: 420px;

            object-fit: cover;

            border-radius: 16px;
        }

        .no-image {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100%;
            max-width: 760px;
            height: 300px;

            background: #f1ece7;

            border-radius: 16px;

            color: #999;
            font-size: 14px;
        }


        /* DETAIL */

        .detail-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 24px;

            padding-top: 5px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;

            gap: 7px;
        }

        .detail-full {
            grid-column: 1 / -1;
        }

        .label {
            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .08em;

            color: #91857b;
        }

        .value {
            font-size: 15px;

            line-height: 1.6;

            color: #29231f;

            word-break: break-word;
        }


        /* LINKS */

        .value-link {
            color: #8b5e3c;

            text-decoration: none;

            word-break: break-all;
        }

        .value-link:hover {
            text-decoration: underline;
        }


        /* DESCRIPTION */

        .description {
            margin-top: 30px;

            padding-top: 30px;

            border-top: 1px solid #eee5dd;
        }

        .description-text {
            margin-top: 10px;

            font-size: 15px;

            line-height: 1.8;

            color: #4b433d;
        }


        /* FOOTER */

        .bottom-actions {
            display: flex;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 24px;
        }


        /* RESPONSIVE */

        @media (max-width: 768px) {

            .page {
                padding: 24px 16px 40px;
            }

            .header {
                flex-direction: column;
            }

            h1 {
                font-size: 28px;
            }

            .actions {
                width: 100%;
            }

            .btn {
                flex: 1;
            }

            .card {
                padding: 20px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-full {
                grid-column: auto;
            }

            .place-image {
                height: 280px;
            }

        }

    </style>

</head>


<body>

    <main class="page">


        <!-- HEADER -->

        <div class="header">

            <div>

                <span class="eyebrow">
                    PLACE DETAIL
                </span>

                <h1>
                    <?= esc($placeName) ?>
                </h1>

                <p class="subtitle">
                    Detail informasi place yang tersimpan di database.
                </p>

            </div>


            <div class="actions">

                <a
                    href="<?= base_url('admin/places/edit/' . $place['id']) ?>"
                    class="btn btn-primary"
                >
                    Edit
                </a>

                <a
                    href="<?= base_url('admin/places') ?>"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </div>

        </div>


        <!-- CONTENT CARD -->

        <div class="card">


            <!-- IMAGE -->

            <div class="image-wrapper">

                <?php if (!empty($image)): ?>

                    <img
                        src="<?= base_url($image) ?>"
                        alt="<?= esc($placeName) ?>"
                        class="place-image"
                    >

                <?php else: ?>

                    <div class="no-image">
                        Tidak ada gambar
                    </div>

                <?php endif; ?>

            </div>


            <!-- INFORMATION -->

            <div class="detail-grid">


                <!-- NAME -->

                <div class="detail-item">

                    <span class="label">
                        Nama
                    </span>

                    <span class="value">
                        <?= esc($place['name'] ?? '-') ?>
                    </span>

                </div>


                <!-- SLUG -->

                <div class="detail-item">

                    <span class="label">
                        Slug
                    </span>

                    <span class="value">
                        <?= esc($place['slug'] ?? '-') ?>
                    </span>

                </div>


                <!-- CATEGORY ID -->

                <div class="detail-item">

                    <span class="label">
                        Category ID
                    </span>

                    <span class="value">
                        <?= esc($place['category_id'] ?? '-') ?>
                    </span>

                </div>


                <!-- SUBCATEGORY -->

                <div class="detail-item">

                    <span class="label">
                        Subcategory
                    </span>

                    <span class="value">
                        <?= esc($place['subcategory'] ?? '-') ?>
                    </span>

                </div>


                <!-- ADDRESS -->

                <div class="detail-item detail-full">

                    <span class="label">
                        Alamat
                    </span>

                    <span class="value">
                        <?= esc($place['address'] ?? '-') ?>
                    </span>

                </div>


                <!-- OPENING HOURS -->

                <div class="detail-item">

                    <span class="label">
                        Jam Buka
                    </span>

                    <span class="value">
                        <?= esc($place['opening_hours'] ?? '-') ?>
                    </span>

                </div>


                <!-- PRICE -->

                <div class="detail-item">

                    <span class="label">
                        Harga
                    </span>

                    <span class="value">
                        <?= esc($place['price'] ?? '-') ?>
                    </span>

                </div>


                <!-- PHONE -->

                <div class="detail-item">

                    <span class="label">
                        Telepon
                    </span>

                    <span class="value">
                        <?= esc($place['phone'] ?? '-') ?>
                    </span>

                </div>


                <!-- INSTAGRAM -->

                <div class="detail-item">

                    <span class="label">
                        Instagram
                    </span>

                    <?php if (!empty($place['instagram'])): ?>

                        <a
                            href="<?= esc($place['instagram']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="value value-link"
                        >
                            <?= esc($place['instagram']) ?>
                        </a>

                    <?php else: ?>

                        <span class="value">
                            -
                        </span>

                    <?php endif; ?>

                </div>


                <!-- WEBSITE -->

                <div class="detail-item detail-full">

                    <span class="label">
                        Website
                    </span>

                    <?php if (!empty($place['website'])): ?>

                        <a
                            href="<?= esc($place['website']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="value value-link"
                        >
                            <?= esc($place['website']) ?>
                        </a>

                    <?php else: ?>

                        <span class="value">
                            -
                        </span>

                    <?php endif; ?>

                </div>


                <!-- LATITUDE -->

                <div class="detail-item">

                    <span class="label">
                        Latitude
                    </span>

                    <span class="value">
                        <?= esc($place['latitude'] ?? '-') ?>
                    </span>

                </div>


                <!-- LONGITUDE -->

                <div class="detail-item">

                    <span class="label">
                        Longitude
                    </span>

                    <span class="value">
                        <?= esc($place['longitude'] ?? '-') ?>
                    </span>

                </div>


            </div>


            <!-- DESCRIPTION -->

            <div class="description">

                <span class="label">
                    Deskripsi
                </span>

                <div class="description-text">

                    <?php if (!empty($place['description'])): ?>

                        <?= nl2br(esc($place['description'])) ?>

                    <?php else: ?>

                        Tidak ada deskripsi.

                    <?php endif; ?>

                </div>

            </div>


        </div>


        <!-- BOTTOM BUTTON -->

        <div class="bottom-actions">

            <a
                href="<?= base_url('admin/places') ?>"
                class="btn btn-secondary"
            >
                ← Kembali ke Places
            </a>

            <a
                href="<?= base_url('admin/places/edit/' . $place['id']) ?>"
                class="btn btn-primary"
            >
                Edit Place
            </a>

        </div>


    </main>

</body>

</html>