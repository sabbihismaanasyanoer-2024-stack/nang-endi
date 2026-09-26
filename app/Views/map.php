<!DOCTYPE html>

<html lang="id">


<head>

    <meta charset="UTF-8">


    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >


    <title>Map — NANG ENDI?</title>


    <!-- =========================================
         LEAFLET CSS
    ========================================== -->

    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    >


    <style>

        * {
            box-sizing: border-box;
        }


        html,
        body {
            margin: 0;
            padding: 0;

            width: 100%;
            height: 100%;
        }


        body {
            overflow: hidden;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        /* =========================================
           MAP
        ========================================== */

        #map {
            width: 100%;
            height: 100vh;
        }


        /* =========================================
           HEADER
        ========================================== */

        .map-header {

            position: absolute;

            top: 20px;
            left: 20px;

            z-index: 1000;

            background: white;

            border: 1px solid #111;

            box-shadow:
                4px 4px 0 #111;

            padding: 14px 18px;
        }


        .map-header h1 {

            margin: 0;

            font-size: 22px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .map-header p {

            margin: 4px 0 0;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        /* =========================================
           BACK BUTTON
        ========================================== */

        .back-button {

            position: absolute;

            top: 20px;
            right: 20px;

            z-index: 1001;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 11px 16px;

            background: #fff;

            color: #111;

            border: 1px solid #111;

            box-shadow:
                4px 4px 0 #111;

            text-decoration: none;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            transition: .2s ease;
        }


        .back-button:hover {

            background: #111;

            color: #fff;
        }


        /* =========================================
           MAP LEGEND
        ========================================== */

        .map-legend {

            position: absolute;

            right: 20px;

            bottom: 25px;

            z-index: 1000;

            background: #fff;

            border: 1px solid #111;

            box-shadow:
                4px 4px 0 #111;

            padding: 14px 16px;

            min-width: 180px;
        }


        .legend-title {

            margin-bottom: 12px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .legend-item {

            display: flex;

            align-items: center;

            gap: 9px;

            margin-bottom: 8px;

            font-size: 10px;

            font-weight: 700;
        }


        .legend-item:last-child {

            margin-bottom: 0;
        }


        .legend-icon {

            width: 28px;

            height: 28px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #111;

            color: #fff;

            border: 2px solid #fff;

            outline: 1px solid #111;

            font-size: 14px;
        }


        /* =========================================
           CUSTOM MARKER
        ========================================== */

        .custom-marker {

            width: 38px;

            height: 38px;

            background: #111;

            border: 3px solid white;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            font-size: 17px;

            font-weight: 900;

            box-shadow:
                0 2px 8px rgba(0, 0, 0, 0.35);
        }


        .custom-marker.cafe {

            font-size: 17px;
        }


        .custom-marker.heritage {

            font-size: 16px;
        }


        .custom-marker.default {

            font-size: 19px;
        }


        /* =========================================
           POPUP
        ========================================== */

        .popup-category {

            display: inline-block;

            margin-bottom: 8px;

            padding: 5px 7px;

            border: 1px solid #111;

            font-size: 8px;

            font-weight: 900;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .popup-title {

            margin: 0 0 8px;

            font-size: 18px;

            font-weight: 900;
        }


        .popup-description {

            margin: 0 0 12px;

            font-size: 13px;

            line-height: 1.5;
        }


        .popup-address {

            margin: 0 0 14px;

            font-size: 12px;

            line-height: 1.5;

            color: #666;
        }


        .popup-link {

            display: inline-block;

            padding: 9px 13px;

            background: #111;

            color: white;

            text-decoration: none;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .popup-link:hover {

            opacity: 0.75;
        }


        /* =========================================
           MOBILE
        ========================================== */

        @media (max-width: 700px) {

            .map-header {

                top: 15px;

                left: 15px;

                padding: 12px 14px;
            }


            .map-header h1 {

                font-size: 19px;
            }


            .back-button {

                top: 15px;

                right: 15px;

                padding: 10px 13px;

                box-shadow:
                    3px 3px 0 #111;

                font-size: 9px;
            }


            .map-legend {

                right: 15px;

                bottom: 20px;

                padding: 12px 14px;

                min-width: 165px;
            }

        }


    </style>

</head>


<body>


    <!-- =========================================
         BACK BUTTON
    ========================================== -->

    <a
        href="javascript:history.back()"
        class="back-button"
        aria-label="Kembali ke halaman sebelumnya"
    >
        ← KEMBALI
    </a>


    <!-- =========================================
         HEADER
    ========================================== -->

    <div class="map-header">

        <h1>
            NANG ENDI?
        </h1>

        <p>
            Explore Surabaya
        </p>

    </div>


    <!-- =========================================
         MAP
    ========================================== -->

    <div id="map"></div>


    <!-- =========================================
         LEGEND
    ========================================== -->

    <div class="map-legend">

        <div class="legend-title">
            MAP LEGEND
        </div>


        <div class="legend-item">

            <div class="legend-icon">
                ☕
            </div>

            <span>
                Café
            </span>

        </div>


        <div class="legend-item">

            <div class="legend-icon">
                🏛
            </div>

            <span>
                Heritage / Culture
            </span>

        </div>


        <div class="legend-item">

            <div class="legend-icon">
                +
            </div>

            <span>
                Other Places
            </span>

        </div>

    </div>


    <!-- =========================================
         LEAFLET JS
    ========================================== -->

    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    ></script>


    <script>


        // ==========================================
        // MAP SURABAYA
        // ==========================================

        const map = L.map('map').setView(

            [-7.2575, 112.7521],

            13

        );


        // ==========================================
        // OPEN STREET MAP
        // ==========================================

        L.tileLayer(

            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

            {

                maxZoom: 19,

                attribution:
                    '&copy; OpenStreetMap contributors'

            }

        ).addTo(map);


        // ==========================================
        // DATA PLACE DARI DATABASE
        // ==========================================

        const places = <?= json_encode(

            $places ?? [],

            JSON_UNESCAPED_UNICODE |

            JSON_UNESCAPED_SLASHES |

            JSON_HEX_TAG |

            JSON_HEX_AMP |

            JSON_HEX_APOS |

            JSON_HEX_QUOT

        ) ?>;


        // ==========================================
        // TARGET KOORDINAT DARI URL
        // ==========================================

        const targetLat =
            <?= json_encode($lat ?? null) ?>;


        const targetLng =
            <?= json_encode($lng ?? null) ?>;


        // ==========================================
        // BUAT ICON BERDASARKAN KATEGORI
        // ==========================================

        function createMarkerIcon(place) {

            const categoryId =
                String(place.category_id || '');


            const categoryName =
                String(

                    place.category_name ||

                    place.category ||

                    ''

                ).toLowerCase();


            // --------------------------------------
            // CAFÉ
            // --------------------------------------

            if (

                categoryId === '15' ||

                categoryId === '11' ||

                categoryName.includes('café') ||

                categoryName.includes('cafe')

            ) {

                return L.divIcon({

                    className: '',

                    html:
                        '<div class="custom-marker cafe">☕</div>',

                    iconSize: [
                        38,
                        38
                    ],

                    iconAnchor: [
                        19,
                        19
                    ],

                    popupAnchor: [
                        0,
                        -20
                    ]

                });

            }


            // --------------------------------------
            // HERITAGE / CULTURE
            // --------------------------------------

            if (

                categoryId === '9' ||

                categoryName.includes('heritage') ||

                categoryName.includes('culture')

            ) {

                return L.divIcon({

                    className: '',

                    html:
                        '<div class="custom-marker heritage">🏛</div>',

                    iconSize: [
                        38,
                        38
                    ],

                    iconAnchor: [
                        19,
                        19
                    ],

                    popupAnchor: [
                        0,
                        -20
                    ]

                });

            }


            // --------------------------------------
            // DEFAULT
            // --------------------------------------

            return L.divIcon({

                className: '',

                html:
                    '<div class="custom-marker default">+</div>',

                iconSize: [
                    38,
                    38
                ],

                iconAnchor: [
                    19,
                    19
                ],

                popupAnchor: [
                    0,
                    -20
                ]

            });

        }


        // ==========================================
        // AMBIL NAMA KATEGORI
        // ==========================================

        function getCategoryLabel(place) {

            const categoryId =
                String(place.category_id || '');


            const categoryName =
                String(

                    place.category_name ||

                    place.category ||

                    ''

                ).toLowerCase();


            if (

                categoryId === '15' ||

                categoryId === '11' ||

                categoryName.includes('café') ||

                categoryName.includes('cafe')

            ) {

                return 'Café';

            }


            if (

                categoryId === '9' ||

                categoryName.includes('heritage') ||

                categoryName.includes('culture')

            ) {

                return 'Heritage / Culture';

            }


            return 'Place';

        }


        // ==========================================
        // TAMBAHKAN SEMUA PLACE KE MAP
        // ==========================================

        places.forEach(function(place) {


            // --------------------------------------
            // LATITUDE
            // --------------------------------------

            const latitude =
                parseFloat(place.latitude);


            // --------------------------------------
            // LONGITUDE
            // --------------------------------------

            const longitude =
                parseFloat(place.longitude);


            // --------------------------------------
            // KOORDINAT TIDAK VALID
            // --------------------------------------

            if (

                Number.isNaN(latitude) ||

                Number.isNaN(longitude)

            ) {

                return;

            }


            // ======================================
            // BUAT ICON
            // ======================================

            const markerIcon =
                createMarkerIcon(place);


            // ======================================
            // BUAT MARKER
            // ======================================

            const marker = L.marker(

                [

                    latitude,

                    longitude

                ],

                {

                    icon: markerIcon

                }

            ).addTo(map);


            // ======================================
            // DATA DESCRIPTION
            // ======================================

            const description =

                place.description

                ? place.description

                : 'Tidak ada deskripsi.';


            // ======================================
            // DATA ADDRESS
            // ======================================

            const address =

                place.address

                ? place.address

                : 'Alamat belum tersedia.';


            // ======================================
            // CATEGORY
            // ======================================

            const categoryLabel =

                getCategoryLabel(place);


            // ======================================
            // GOOGLE MAPS ROUTE
            // ======================================

            const routeUrl =

                'https://www.google.com/maps/dir/?api=1&destination=' +

                encodeURIComponent(

                    latitude + ',' + longitude

                );


            // ======================================
            // POPUP MARKER
            // ======================================

            marker.bindPopup(`

                <div>

                    <div class="popup-category">

                        ${escapeHtml(categoryLabel)}

                    </div>


                    <h3 class="popup-title">

                        ${escapeHtml(

                            place.name || 'Place'

                        )}

                    </h3>


                    <p class="popup-description">

                        ${escapeHtml(

                            description

                        )}

                    </p>


                    <p class="popup-address">

                        ${escapeHtml(

                            address

                        )}

                    </p>


                    <a

                        href="${routeUrl}"

                        target="_blank"

                        rel="noopener noreferrer"

                        class="popup-link"

                    >

                        Lihat Tempat →

                    </a>


                </div>

            `);


        });


        // ==========================================
        // FOKUS KE KOORDINAT DARI URL
        // ==========================================

        if (

            targetLat !== null &&

            targetLat !== '' &&

            targetLng !== null &&

            targetLng !== ''

        ) {


            const lat =
                parseFloat(targetLat);


            const lng =
                parseFloat(targetLng);


            if (

                !Number.isNaN(lat) &&

                !Number.isNaN(lng)

            ) {

                map.setView(

                    [

                        lat,

                        lng

                    ],

                    17

                );

            }

        }


        // ==========================================
        // ESCAPE HTML
        // ==========================================

        function escapeHtml(value) {

            return String(value)

                .replace(

                    /&/g,

                    '&amp;'

                )

                .replace(

                    /</g,

                    '&lt;'

                )

                .replace(

                    />/g,

                    '&gt;'

                )

                .replace(

                    /"/g,

                    '&quot;'

                )

                .replace(

                    /'/g,

                    '&#039;'

                );

        }


    </script>


</body>

</html>