<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NANG ENDI? — Surabaya City Guide</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background: #e9dfcf;
            color: #241b15;
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* =========================================
           NAVBAR
        ========================================= */

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 82px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;

            color: white;

            transition:
                background .4s ease,
                color .4s ease,
                box-shadow .4s ease;
        }

        .navbar.scrolled {
            background: rgba(233, 223, 207, .94);
            color: #241b15;
            backdrop-filter: blur(12px);
            box-shadow: 0 1px 0 rgba(36, 27, 21, .15);
        }

        .logo {
            font-family: "Space Grotesk", sans-serif;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .logo span {
            font-weight: 400;
        }

        .nav-menu {
            display: flex;
            gap: 38px;
            list-style: none;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .nav-menu a {
            position: relative;
        }

        .nav-menu a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -7px;
            width: 0;
            height: 1px;
            background: currentColor;
            transition: width .3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        /* =========================================
           HERO
        ========================================= */

        .hero {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            padding: 0 7% 100px;
            color: white;
            isolation: isolate;
        }

        .hero-bg {
            position: absolute;
            inset: -8%;
            z-index: -3;

            background-image:
                url("/assets/images/hero-surabaya.jpg");

            background-size: cover;
            background-position: center;

            transform: scale(1.08);
            will-change: transform;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            z-index: -2;

            background:
                linear-gradient(
                    180deg,
                    rgba(25, 17, 11, .45) 0%,
                    rgba(25, 17, 11, .15) 35%,
                    rgba(25, 17, 11, .78) 100%
                );
        }

        .hero-content {
            max-width: 900px;
            position: relative;
            z-index: 2;
        }

        .eyebrow {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .hero-title {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(80px, 13vw, 190px);
            line-height: .78;
            letter-spacing: -9px;
            font-weight: 700;
            margin-bottom: 42px;
        }

        .hero-title em {
            font-style: italic;
            font-weight: 400;
        }

        .hero-description {
            max-width: 460px;
            font-size: 17px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;
            gap: 18px;
            background: #241b15;
            color: white;
            padding: 16px 22px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            transition: .3s ease;
        }

        .hero-button:hover {
            background: #5a3d28;
            transform: translateY(-3px);
        }

        .scroll-label {
            position: absolute;
            right: 7%;
            bottom: 40px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            writing-mode: vertical-rl;
        }

        /* =========================================
           INTRO STRIP
        ========================================= */

        .intro-strip {
            position: relative;
            z-index: 3;
            margin-top: -1px;
            background: #b99b78;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-bottom: 1px solid rgba(36, 27, 21, .45);
        }

        .intro-item {
            padding: 38px 30px 42px;
            border-right: 1px solid rgba(36, 27, 21, .25);
            transition: background .35s ease, transform .35s ease;
        }

        .intro-item:hover {
            background: rgba(255, 255, 255, .08);
            transform: translateY(-4px);
        }

        .intro-item:last-child {
            border-right: none;
        }

        .intro-number {
            font-family: "Space Grotesk", sans-serif;
            font-size: 14px;
            margin-bottom: 14px;
        }

        .intro-item h3 {
            font-family: "Space Grotesk", sans-serif;
            font-size: 19px;
            margin-bottom: 8px;
        }

        .intro-item p {
            font-size: 13px;
            line-height: 1.5;
            opacity: .75;
        }

        /* =========================================
           GENERAL SECTION
        ========================================= */

        .section {
            padding: 125px 7%;
            border-bottom: 1px solid rgba(36, 27, 21, .45);
        }

        #events {
            position: relative;
            background:
                radial-gradient(circle at 92% 8%, rgba(185, 155, 120, .28), transparent 28%),
                #e9dfcf;
        }

        #events::before {
            content: "";
            position: absolute;
            top: 0;
            left: 7%;
            right: 7%;
            height: 1px;
            background: rgba(36, 27, 21, .25);
        }

        .section-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 55px;
            gap: 40px;
        }

        .section-title {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(55px, 8vw, 110px);
            line-height: .82;
            letter-spacing: -5px;
            max-width: 820px;
        }

        .section-subtitle {
            max-width: 300px;
            font-size: 14px;
            line-height: 1.6;
        }

        .view-all {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 1px solid currentColor;
            padding-bottom: 5px;
        }

        /* =========================================
           EVENTS
        ========================================= */

        .event-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .event-card {
            min-height: 430px;
            background: #f3ecdf;
            border: 1px solid rgba(36, 27, 21, .75);
            display: flex;
            flex-direction: column;
            transition: transform .35s ease;
            overflow: hidden;
        }

        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(36, 27, 21, .12);
        }

        .event-image {
            height: 210px;
            background: #9c8062;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 55px;
        }

        .event-content {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .event-category {
            font-size: 10px;
            letter-spacing: 2px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .event-title {
            font-family: "Space Grotesk", sans-serif;
            font-size: 25px;
            line-height: 1;
            margin-bottom: auto;
        }

        .event-info {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid rgba(36,27,21,.3);
            font-size: 12px;
            line-height: 1.7;
        }

        /* =========================================
           PLACES
        ========================================= */

        .places-section {
            background: #2d2119;
            color: #f2e8d7;
        }

        .places-section .section-heading {
            border-bottom: 1px solid rgba(242,232,215,.3);
            padding-bottom: 35px;
        }

        .place-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .place-card {
            min-height: 370px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(242,232,215,.4);
            display: flex;
            align-items: flex-end;
            padding: 30px;
            background: #604936;
            transition: transform .35s ease;
        }

        .place-card:hover {
            transform: scale(.985);
        }

        .place-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    180deg,
                    transparent 30%,
                    rgba(0,0,0,.75) 100%
                );
        }

        .place-card-content {
            position: relative;
            z-index: 2;
        }

        .place-category {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 18px;
    opacity: .75;
}

.place-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
    margin-top: 25px;
}

.place-tags span {
    display: inline-block;
    padding: 7px 10px;
    border: 1px solid rgba(242,232,215,.5);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1px;
}

        .place-card h3 {
            font-family: "Space Grotesk", sans-serif;
            font-size: 38px;
            line-height: .95;
            margin-bottom: 12px;
        }

        .place-card p {
            font-size: 13px;
            max-width: 300px;
            opacity: .8;
        }

        /* =========================================
           MAP
        ========================================= */

        .map-section {
            min-height: 720px;
            position: relative;
            overflow: hidden;
            isolation: isolate;
            background:
                radial-gradient(circle at 78% 45%, rgba(245,229,199,.96) 0 8%, rgba(223,198,161,.82) 24%, transparent 52%),
                linear-gradient(120deg, #d6c2a0 0%, #eadcc6 46%, #c8a77c 100%);
        }

        .map-section::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            opacity: .42;
            background-image:
                linear-gradient(rgba(36,27,21,.075) 1px, transparent 1px),
                linear-gradient(90deg, rgba(36,27,21,.075) 1px, transparent 1px);
            background-size: 52px 52px;
            mask-image: linear-gradient(90deg, transparent 0%, #000 35%, #000 100%);
            animation: mapGridMove 18s linear infinite;
        }

        .map-section::after {
            content: "";
            position: absolute;
            z-index: 1;
            width: 760px;
            height: 760px;
            right: -170px;
            top: -20px;
            border-radius: 50%;
            border: 1px solid rgba(36,27,21,.12);
            box-shadow:
                0 0 0 70px rgba(36,27,21,.035),
                0 0 0 140px rgba(36,27,21,.028),
                0 0 0 210px rgba(36,27,21,.022);
            animation: mapOrbit 20s ease-in-out infinite;
        }

        .map-content {
            position: relative;
            z-index: 7;
            max-width: 500px;
            padding-top: 55px;
        }

        .map-content::before {
            content: "SURABAYA • 07°15'S 112°45'E";
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
            padding: 9px 13px;
            border: 1px solid rgba(36,27,21,.32);
            background: rgba(245,236,220,.42);
            backdrop-filter: blur(8px);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .map-title {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(60px, 8vw, 110px);
            line-height: .8;
            letter-spacing: -5px;
            margin-bottom: 30px;
            text-shadow: 0 12px 35px rgba(36,27,21,.10);
        }

        .map-description {
            max-width: 350px;
            line-height: 1.6;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .map-background {
            position: absolute;
            z-index: 2;
            right: -5%;
            top: 4%;
            width: 67%;
            height: 92%;
            opacity: .72;
            transform: rotate(-8deg);
            background:
                repeating-linear-gradient(
                    25deg,
                    transparent 0,
                    transparent 45px,
                    rgba(36,27,21,.16) 46px,
                    transparent 47px
                ),
                repeating-linear-gradient(
                    115deg,
                    transparent 0,
                    transparent 70px,
                    rgba(36,27,21,.14) 71px,
                    transparent 72px
                );
            clip-path: polygon(9% 8%, 93% 0, 100% 91%, 19% 100%, 0 50%);
            animation: mapDrift 12s ease-in-out infinite alternate;
        }

        .map-background::before,
        .map-background::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(36,27,21,.20);
            border-radius: 50%;
        }

        .map-background::before {
            width: 330px;
            height: 210px;
            right: 13%;
            top: 21%;
            transform: rotate(24deg);
        }

        .map-background::after {
            width: 470px;
            height: 290px;
            right: 4%;
            top: 34%;
            transform: rotate(-14deg);
        }

        .map-pin {
            position: absolute;
            z-index: 8;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #241b15;
            border: 4px solid #f0e5d2;
            box-shadow: 0 0 0 5px rgba(36,27,21,.16), 0 8px 25px rgba(36,27,21,.18);
            animation: pinPulse 2.4s ease-in-out infinite;
            cursor: pointer;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .map-pin:hover {
            transform: scale(1.55);
            box-shadow: 0 0 0 9px rgba(36,27,21,.10), 0 10px 28px rgba(36,27,21,.25);
        }

        .map-pin::after {
            content: "";
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #d9b37d;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .pin-one {
            right: 35%;
            top: 32%;
        }

        .pin-two {
            right: 48%;
            top: 58%;
            animation-delay: .5s;
        }

        .pin-three {
            right: 24%;
            top: 63%;
            animation-delay: 1s;
        }

        .map-pin.pin-one::before,
        .map-pin.pin-two::before,
        .map-pin.pin-three::before {
            position: absolute;
            left: 25px;
            top: -5px;
            white-space: nowrap;
            padding: 6px 9px;
            border: 1px solid rgba(36,27,21,.25);
            background: rgba(245,236,220,.78);
            backdrop-filter: blur(7px);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 1.5px;
            opacity: 0;
            transform: translateX(-6px);
            transition: opacity .25s ease, transform .25s ease;
        }

        .map-pin.pin-one::before { content: "HERITAGE"; }
        .map-pin.pin-two::before { content: "CAFÉ"; }
        .map-pin.pin-three::before { content: "EVENTS"; }

        .map-pin:hover::before {
            opacity: 1;
            transform: translateX(0);
        }

        .map-route {
            position: absolute;
            z-index: 5;
            right: 19%;
            top: 28%;
            width: 390px;
            height: 300px;
            pointer-events: none;
            opacity: .65;
        }

        .map-route::before {
            content: "";
            position: absolute;
            inset: 0;
            border-top: 2px dashed rgba(36,27,21,.36);
            border-right: 2px dashed rgba(36,27,21,.30);
            border-radius: 52% 48% 58% 42%;
            transform: rotate(20deg);
            animation: routeDash 7s linear infinite;
        }

        .map-route::after {
            content: "✦";
            position: absolute;
            right: 4px;
            bottom: 34px;
            font-size: 20px;
            animation: routeStar 2.2s ease-in-out infinite;
        }

        .map-section .hero-button {
            position: relative;
            z-index: 9;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 14px 30px rgba(36,27,21,.18);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .map-section .hero-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 38px rgba(36,27,21,.24);
        }

        @keyframes mapGridMove {
            from { transform: translate(0, 0); }
            to { transform: translate(52px, 52px); }
        }

        @keyframes mapOrbit {
            0%, 100% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(7deg) scale(1.03); }
        }

        @keyframes mapDrift {
            from { transform: rotate(-8deg) translate3d(0,0,0); }
            to { transform: rotate(-5deg) translate3d(-18px,10px,0); }
        }

        @keyframes pinPulse {
            0%, 100% { box-shadow: 0 0 0 5px rgba(36,27,21,.16), 0 8px 25px rgba(36,27,21,.18); }
            50% { box-shadow: 0 0 0 12px rgba(36,27,21,.04), 0 10px 28px rgba(36,27,21,.22); }
        }

        @keyframes routeDash {
            to { transform: rotate(20deg) translate(18px, -8px); }
        }

        @keyframes routeStar {
            0%, 100% { transform: scale(.8) rotate(0deg); opacity: .55; }
            50% { transform: scale(1.2) rotate(90deg); opacity: 1; }
        }

        /* =========================================
           CTA
        ========================================= */

        .cta {
            padding: 140px 7%;
            background: #c5a37a;
            text-align: center;
        }

        .cta h2 {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(60px, 10vw, 140px);
            line-height: .8;
            letter-spacing: -6px;
            margin-bottom: 35px;
        }

        .cta p {
            max-width: 500px;
            margin: 0 auto 35px;
            line-height: 1.6;
        }

        /* =========================================
           FOOTER
        ========================================= */

        footer {
            background: #241b15;
            color: #e9dfcf;
            padding: 70px 7% 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 50px;
            padding-bottom: 70px;
        }

        .footer-logo {
            font-family: "Space Grotesk", sans-serif;
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .footer-description {
            max-width: 280px;
            font-size: 13px;
            line-height: 1.6;
            opacity: .65;
        }

        .footer-column h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .footer-column a {
            display: block;
            font-size: 13px;
            margin-bottom: 10px;
            opacity: .65;
        }

        .footer-column a:hover {
            opacity: 1;
        }

        .copyright {
            border-top: 1px solid rgba(233,223,207,.2);
            padding-top: 25px;
            font-size: 11px;
            opacity: .5;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 900px) {

            .intro-strip {
                grid-template-columns: repeat(2, 1fr);
            }

            .intro-item:nth-child(2) {
                border-right: none;
            }

            .intro-item:nth-child(-n+2) {
                border-bottom: 1px solid rgba(36, 27, 21, .25);
            }

            .nav-menu {
                gap: 15px;
            }

            .hero-title {
                letter-spacing: -5px;
            }

            .intro-strip {
                grid-template-columns: repeat(2, 1fr);
            }

            .intro-item:nth-child(2) {
                border-right: none;
            }

            .event-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 0 5%;
            }

            .nav-menu {
                display: none;
            }

            .hero {
                padding: 0 5% 70px;
            }

            .hero-title {
                font-size: 75px;
                letter-spacing: -5px;
            }

            .section {
                padding: 80px 5%;
            }

            .section-heading {
                display: block;
            }

            .section-subtitle {
                margin-top: 25px;
            }

            .event-grid,
            .place-grid {
                grid-template-columns: 1fr;
            }

            .intro-strip {
                grid-template-columns: 1fr;
            }

            .intro-item {
                border-right: none;
                border-bottom: 1px solid rgba(36,27,21,.3);
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .map-background {
                width: 100%;
                right: -20%;
            }
        }



        /* =========================================================
           NANG ENDI? — WOAH MOTION LAYER
           Semua efek hanya untuk HOME; struktur MAP tetap aman.
        ========================================================= */
        :root {
            --cream: #e9dfcf;
            --paper: #f3ecdf;
            --brown: #b99b78;
            --dark: #241b15;
            --line: rgba(36,27,21,.28);
        }

        body { cursor: default; }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background:
                radial-gradient(circle at 72% 28%, rgba(255,245,220,.16), transparent 22%),
                radial-gradient(circle at 20% 80%, rgba(0,0,0,.18), transparent 28%);
            mix-blend-mode: screen;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            right: -120px;
            top: 16%;
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 50%;
            box-shadow:
                0 0 0 70px rgba(255,255,255,.045),
                0 0 0 140px rgba(255,255,255,.03),
                0 0 0 210px rgba(255,255,255,.02);
            z-index: 1;
            pointer-events: none;
            animation: orbitFloat 12s ease-in-out infinite alternate;
        }

        @keyframes orbitFloat {
            from { transform: translate3d(0,0,0) rotate(-3deg) scale(1); }
            to { transform: translate3d(-45px,28px,0) rotate(7deg) scale(1.06); }
        }

        .hero-bg {
            animation: heroZoom 14s ease-in-out infinite alternate;
            filter: saturate(.82) contrast(1.06);
        }

        @keyframes heroZoom {
            from { transform: scale(1.08); }
            to { transform: scale(1.15); }
        }

        .hero-overlay {
            background:
                linear-gradient(90deg, rgba(22,15,10,.74) 0%, rgba(22,15,10,.28) 52%, rgba(22,15,10,.46) 100%),
                linear-gradient(180deg, rgba(25,17,11,.25) 0%, rgba(25,17,11,.05) 42%, rgba(25,17,11,.82) 100%);
        }

        .hero-content {
            animation: heroEnter 1.05s cubic-bezier(.2,.8,.2,1) both;
        }

        @keyframes heroEnter {
            from { opacity: 0; transform: translate3d(0,70px,0); }
            to { opacity: 1; transform: translate3d(0,0,0); }
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            position: relative;
            padding-left: 28px;
        }

        .eyebrow::before {
            content: "";
            position: absolute;
            left: 0;
            width: 16px;
            height: 1px;
            background: currentColor;
            animation: linePulse 1.7s ease-in-out infinite;
        }

        @keyframes linePulse {
            0%,100% { width: 16px; opacity: .5; }
            50% { width: 34px; opacity: 1; }
        }

        .hero-title {
            position: relative;
            display: inline-block;
            text-shadow: 0 12px 35px rgba(0,0,0,.18);
            animation: titleFloat 5s ease-in-out infinite;
        }

        @keyframes titleFloat {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-7px); }
        }

        .hero-title em {
            position: relative;
            display: inline-block;
            animation: endiGlitch 4.8s steps(1,end) infinite;
        }

        .hero-title em::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 72%;
            height: 4px;
            background: currentColor;
            transform-origin: left;
            animation: titleLine 2.8s ease-in-out infinite;
        }

        @keyframes titleLine {
            0%,100% { transform: scaleX(.2); opacity: .2; }
            50% { transform: scaleX(1); opacity: .9; }
        }

        @keyframes endiGlitch {
            0%, 76%, 100% { opacity: 1; transform: translateX(0); }
            78% { opacity: .65; transform: translateX(3px); }
            79% { opacity: 1; transform: translateX(-2px); }
            80% { opacity: .82; transform: translateX(1px); }
            81% { opacity: 1; transform: translateX(0); }
        }

        .hero-description {
            animation: copyReveal 1s .28s cubic-bezier(.2,.8,.2,1) both;
        }

        @keyframes copyReveal {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-button {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            box-shadow: 0 12px 28px rgba(0,0,0,.18);
        }

        .hero-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 80%;
            height: 100%;
            background: linear-gradient(100deg, transparent, rgba(255,255,255,.28), transparent);
            transform: skewX(-20deg);
            transition: left .6s ease;
            z-index: -1;
        }

        .hero-button:hover::before { left: 135%; }

        .hero-button span {
            display: inline-block;
            transition: transform .35s ease;
        }

        .hero-button:hover span { transform: translateX(7px); }

        .scroll-label {
            animation: scrollBob 1.8s ease-in-out infinite;
        }

        @keyframes scrollBob {
            0%,100% { transform: translateY(0); opacity: .6; }
            50% { transform: translateY(9px); opacity: 1; }
        }

        /* Running ticker */
        .motion-ticker {
            position: relative;
            z-index: 10;
            overflow: hidden;
            background: var(--dark);
            color: var(--paper);
            border-top: 1px solid rgba(242,232,215,.25);
            border-bottom: 1px solid rgba(242,232,215,.25);
            white-space: nowrap;
        }

        .motion-track {
            display: inline-flex;
            min-width: max-content;
            align-items: center;
            gap: 0;
            animation: tickerMove 24s linear infinite;
        }

        .motion-ticker:hover .motion-track { animation-play-state: paused; }

        .motion-track span {
            display: inline-flex;
            align-items: center;
            gap: 24px;
            padding: 15px 26px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.8px;
            text-transform: uppercase;
        }

        .motion-track span::after {
            content: "✦";
            font-size: 12px;
            animation: starBlink 1.3s ease-in-out infinite;
        }

        @keyframes tickerMove {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }

        @keyframes starBlink {
            0%,100% { transform: rotate(0) scale(.7); opacity: .35; }
            50% { transform: rotate(45deg) scale(1.2); opacity: 1; }
        }

        /* Intro cards feel interactive */
        .intro-item {
            position: relative;
            overflow: hidden;
        }

        .intro-item::before {
            content: "";
            position: absolute;
            width: 130px;
            height: 130px;
            border: 1px solid rgba(36,27,21,.16);
            border-radius: 50%;
            right: -60px;
            top: -60px;
            transition: transform .6s ease;
        }

        .intro-item:hover::before { transform: scale(2.2); }

        .intro-number {
            transition: transform .35s ease;
        }

        .intro-item:hover .intro-number {
            transform: translateX(7px);
        }

        /* Scroll reveal */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(45px);
            transition: opacity .8s ease, transform .8s cubic-bezier(.2,.8,.2,1);
        }

        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .event-card,
        .place-card {
            position: relative;
        }

        .event-card::after,
        .place-card::after {
            content: "VIEW →";
            position: absolute;
            right: 16px;
            top: 16px;
            padding: 8px 10px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            background: rgba(36,27,21,.9);
            color: #f3ecdf;
            opacity: 0;
            transform: translateY(-8px);
            transition: .35s ease;
            pointer-events: none;
        }

        .event-card:hover::after,
        .place-card:hover::after {
            opacity: 1;
            transform: translateY(0);
        }

        .event-image img {
            transition: transform .7s cubic-bezier(.2,.8,.2,1), filter .7s ease;
        }

        .event-card:hover .event-image img {
            transform: scale(1.08);
            filter: saturate(1.15) contrast(1.05);
        }

        .section-title {
            transition: letter-spacing .5s ease;
        }

        .section-title:hover { letter-spacing: -7px; }


        .hero::before {
            background:
                radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 45%), rgba(255,245,220,.14), transparent 18%),
                radial-gradient(circle at 72% 28%, rgba(255,245,220,.12), transparent 22%),
                radial-gradient(circle at 20% 80%, rgba(0,0,0,.18), transparent 28%);
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }
        }

        @media (max-width: 600px) {
            .hero::after { width: 300px; height: 300px; right: -120px; top: 18%; }
            .motion-track span { padding: 13px 18px; font-size: 9px; letter-spacing: 2px; }
            .hero-title em::after { height: 3px; bottom: -4px; }
        }

    

        /* =========================================================
           PLACES V2 — SCOPED ONLY TO #places
           The approved Hero / Events / Ticker / Map are untouched.
        ========================================================= */
        .woah-places-v2 {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            background:
                radial-gradient(circle at 18% 18%, rgba(190,151,111,.18), transparent 25%),
                radial-gradient(circle at 82% 75%, rgba(105,70,48,.38), transparent 34%),
                linear-gradient(120deg, #211711 0%, #3b291f 48%, #17100c 100%);
        }

        .woah-places-v2 .places-v2-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        .woah-places-v2 .places-v2-bg::before {
            content: "";
            position: absolute;
            inset: -20%;
            background-image:
                linear-gradient(rgba(242,232,215,.075) 1px, transparent 1px),
                linear-gradient(90deg, rgba(242,232,215,.075) 1px, transparent 1px);
            background-size: 55px 55px;
            transform: rotate(-7deg);
            animation: placesV2Grid 16s linear infinite;
            opacity: .65;
        }

        .woah-places-v2 .places-v2-bg::after {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            left: -190px;
            bottom: -300px;
            border: 1px solid rgba(242,232,215,.13);
            border-radius: 50%;
            box-shadow:
                0 0 0 70px rgba(242,232,215,.025),
                0 0 0 140px rgba(242,232,215,.02),
                0 0 0 210px rgba(242,232,215,.015);
            animation: placesV2Breath 5s ease-in-out infinite;
        }

        .woah-places-v2 .places-v2-orbit {
            position: absolute;
            border: 1px solid rgba(242,232,215,.16);
            border-radius: 50%;
            transform-origin: center;
            animation: placesV2Spin 18s linear infinite;
        }

        .woah-places-v2 .orbit-a { width: 330px; height: 330px; right: 4%; top: 14%; }
        .woah-places-v2 .orbit-b { width: 220px; height: 220px; right: 11%; top: 24%; animation-duration: 12s; animation-direction: reverse; }
        .woah-places-v2 .orbit-c { width: 105px; height: 105px; right: 18%; top: 37%; animation-duration: 7s; }

        .woah-places-v2 .places-v2-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #f2e8d7;
            box-shadow: 0 0 0 7px rgba(242,232,215,.09), 0 0 22px rgba(242,232,215,.38);
            animation: placesV2Pulse 2s ease-in-out infinite;
        }
        .woah-places-v2 .dot-a { right: 20%; top: 18%; }
        .woah-places-v2 .dot-b { right: 7%; top: 55%; animation-delay: .65s; }
        .woah-places-v2 .dot-c { left: 48%; bottom: 10%; animation-delay: 1.2s; }

        .woah-places-v2 .places-v2-word {
            position: absolute;
            right: 3%;
            bottom: -35px;
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(110px, 17vw, 245px);
            line-height: .72;
            font-weight: 700;
            letter-spacing: -12px;
            color: rgba(242,232,215,.035);
            transform: rotate(-8deg);
            animation: placesV2Float 6s ease-in-out infinite;
        }

        .woah-places-v2 > .section-heading,
        .woah-places-v2 > .place-grid {
            position: relative;
            z-index: 3;
        }

        .woah-places-v2 .section-title {
            text-shadow: 0 12px 30px rgba(0,0,0,.28);
        }

        .woah-places-v2 .place-grid {
            gap: 18px;
        }

        .woah-places-v2 .place-card {
            min-height: 430px;
            background:
                linear-gradient(140deg, rgba(255,240,216,.13), transparent 35%),
                linear-gradient(155deg, #70513a 0%, #4b3427 52%, #17100c 100%);
            border-color: rgba(242,232,215,.48);
            box-shadow: 0 18px 50px rgba(0,0,0,.22);
            transition: transform .55s cubic-bezier(.2,.85,.2,1), box-shadow .55s ease, border-color .35s ease;
        }

        .woah-places-v2 .place-card::before {
            background:
                radial-gradient(circle at 78% 20%, rgba(255,242,218,.18), transparent 20%),
                linear-gradient(180deg, rgba(0,0,0,0) 10%, rgba(0,0,0,.82) 100%);
        }

        .woah-places-v2 .place-card::after {
            content: "EXPLORE →";
            background: rgba(20,13,9,.92);
            border: 1px solid rgba(242,232,215,.32);
        }

        .woah-places-v2 .place-card:hover {
            transform: translateY(-16px) rotate(-.6deg) scale(1.018);
            border-color: rgba(242,232,215,.9);
            box-shadow: 0 32px 75px rgba(0,0,0,.42);
        }

        .woah-places-v2 .place-card:nth-child(2):hover {
            transform: translateY(-16px) rotate(.6deg) scale(1.018);
        }

        .woah-places-v2 .place-card-content {
            width: 100%;
            transition: transform .55s cubic-bezier(.2,.85,.2,1);
        }

        .woah-places-v2 .place-card:hover .place-card-content {
            transform: translateY(-7px);
        }

        .woah-places-v2 .place-card h3 {
            transition: transform .45s ease, letter-spacing .45s ease;
        }

        .woah-places-v2 .place-card:hover h3 {
            transform: translateX(7px);
            letter-spacing: -1px;
        }

        .woah-places-v2 .place-tags span {
            transition: transform .3s ease, background .3s ease, color .3s ease;
        }

        .woah-places-v2 .place-card:hover .place-tags span {
            transform: translateY(-4px);
        }

        .woah-places-v2 .place-tags span:nth-child(2) { transition-delay: .04s; }
        .woah-places-v2 .place-tags span:nth-child(3) { transition-delay: .08s; }
        .woah-places-v2 .place-tags span:nth-child(4) { transition-delay: .12s; }

        .woah-places-v2 .place-tags span:hover {
            background: #f2e8d7;
            color: #2d2119;
        }

        @keyframes placesV2Grid {
            from { transform: rotate(-7deg) translate3d(0,0,0); }
            to { transform: rotate(-7deg) translate3d(55px,55px,0); }
        }
        @keyframes placesV2Spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @keyframes placesV2Pulse {
            0%,100% { transform: scale(.75); opacity: .45; }
            50% { transform: scale(1.35); opacity: 1; }
        }
        @keyframes placesV2Breath {
            0%,100% { transform: scale(.96); opacity: .55; }
            50% { transform: scale(1.05); opacity: 1; }
        }
        @keyframes placesV2Float {
            0%,100% { transform: rotate(-8deg) translateY(0); }
            50% { transform: rotate(-5deg) translateY(-18px); }
        }

        @media (max-width: 700px) {
            .woah-places-v2 .places-v2-word { right: -20px; bottom: 20px; font-size: 100px; }
            .woah-places-v2 .orbit-a { width: 230px; height: 230px; right: -70px; }
            .woah-places-v2 .orbit-b { right: -20px; }
            .woah-places-v2 .place-card { min-height: 360px; }
        }



        /* =========================================================
           FOOTER V3 — ONLY FOOTER
           Semua style di bawah ini scoped ke footer.
           Bagian HERO / EVENTS / PLACES / MAP tidak disentuh.
        ========================================================= */
        footer {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 82% 18%, rgba(190,151,111,.22), transparent 24%),
                radial-gradient(circle at 15% 82%, rgba(108,72,48,.24), transparent 28%),
                linear-gradient(135deg, #120b08 0%, #241711 45%, #160e0a 100%);
            color: #f3ecdf;
            padding: 0 7% 28px;
            isolation: isolate;
        }

        footer::before {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            right: -170px;
            top: -270px;
            border: 1px solid rgba(243,236,223,.12);
            border-radius: 50%;
            box-shadow:
                0 0 0 70px rgba(243,236,223,.035),
                0 0 0 140px rgba(243,236,223,.025),
                0 0 0 210px rgba(243,236,223,.018);
            animation: footerOrbit 14s ease-in-out infinite alternate;
            pointer-events: none;
        }

        footer::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .22;
            background-image:
                linear-gradient(rgba(243,236,223,.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(243,236,223,.06) 1px, transparent 1px);
            background-size: 70px 70px;
            mask-image: linear-gradient(to bottom, transparent, black 30%, black 75%, transparent);
            animation: footerGrid 18s linear infinite;
        }

        .footer-marquee {
            position: relative;
            z-index: 3;
            margin: 0 -7%;
            overflow: hidden;
            white-space: nowrap;
            border-top: 1px solid rgba(243,236,223,.16);
            border-bottom: 1px solid rgba(243,236,223,.16);
        }

        .footer-marquee-track {
            display: inline-flex;
            min-width: max-content;
            animation: footerMarquee 22s linear infinite;
        }

        .footer-marquee span {
            display: inline-flex;
            align-items: center;
            gap: 22px;
            padding: 16px 28px;
            font-family: "Space Grotesk", sans-serif;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .footer-marquee span::after {
            content: "✦";
            font-size: 13px;
            animation: footerSpark 1.4s ease-in-out infinite;
        }

        .footer-inner {
            position: relative;
            z-index: 3;
            padding-top: 78px;
        }

        .footer-topline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 52px;
        }

        .footer-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            opacity: .7;
        }

        .footer-kicker::before {
            content: "";
            width: 28px;
            height: 1px;
            background: currentColor;
            animation: footerLinePulse 1.8s ease-in-out infinite;
        }

        .footer-backtop {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border: 1px solid rgba(243,236,223,.28);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: .35s ease;
        }

        .footer-backtop span {
            display: inline-block;
            transition: transform .35s ease;
        }

        .footer-backtop:hover {
            background: #f3ecdf;
            color: #241b15;
            transform: translateY(-4px);
        }

        .footer-backtop:hover span {
            transform: translateY(-4px);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2.2fr 1fr 1fr 1fr;
            gap: 50px;
            padding-bottom: 76px;
        }

        .footer-brand {
            position: relative;
        }

        .footer-logo {
            position: relative;
            display: inline-block;
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(54px, 7vw, 96px);
            line-height: .78;
            letter-spacing: -6px;
            font-weight: 700;
            margin-bottom: 28px;
        }

        .footer-logo::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -13px;
            width: 62%;
            height: 3px;
            background: #f3ecdf;
            transform-origin: left;
            animation: footerLogoLine 3s ease-in-out infinite;
        }

        .footer-description {
            max-width: 350px;
            font-size: 14px;
            line-height: 1.7;
            opacity: .62;
        }

        .footer-column {
            position: relative;
        }

        .footer-column h4 {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            margin-bottom: 23px;
            opacity: .55;
        }

        .footer-column h4::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #f3ecdf;
            box-shadow: 0 0 12px rgba(243,236,223,.65);
            animation: footerDot 1.8s ease-in-out infinite;
        }

        .footer-column a {
            position: relative;
            display: block;
            width: fit-content;
            font-size: 14px;
            margin-bottom: 13px;
            opacity: .62;
            transition: .3s ease;
        }

        .footer-column a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0;
            height: 1px;
            background: currentColor;
            transition: width .3s ease;
        }

        .footer-column a:hover {
            opacity: 1;
            transform: translateX(6px);
        }

        .footer-column a:hover::after {
            width: 100%;
        }

        .footer-bottom {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            border-top: 1px solid rgba(243,236,223,.18);
            padding-top: 25px;
        }

        .copyright {
            border-top: 0;
            padding-top: 0;
            font-size: 11px;
            opacity: .45;
        }

        .footer-status {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            opacity: .48;
        }

        .footer-status i {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #f3ecdf;
            box-shadow: 0 0 0 5px rgba(243,236,223,.07), 0 0 16px rgba(243,236,223,.55);
            animation: footerDot 1.5s ease-in-out infinite;
        }

        @keyframes footerOrbit {
            from { transform: translate3d(0,0,0) rotate(0deg) scale(1); }
            to { transform: translate3d(-35px,35px,0) rotate(9deg) scale(1.08); }
        }

        @keyframes footerGrid {
            from { transform: translate3d(0,0,0); }
            to { transform: translate3d(70px,70px,0); }
        }

        @keyframes footerMarquee {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }

        @keyframes footerSpark {
            0%,100% { opacity: .3; transform: rotate(0) scale(.75); }
            50% { opacity: 1; transform: rotate(45deg) scale(1.25); }
        }

        @keyframes footerLinePulse {
            0%,100% { width: 18px; opacity: .4; }
            50% { width: 36px; opacity: 1; }
        }

        @keyframes footerLogoLine {
            0%,100% { transform: scaleX(.35); opacity: .3; }
            50% { transform: scaleX(1); opacity: 1; }
        }

        @keyframes footerDot {
            0%,100% { transform: scale(.7); opacity: .45; }
            50% { transform: scale(1.35); opacity: 1; }
        }

        @media (max-width: 900px) {
            .footer-grid { grid-template-columns: 2fr 1fr 1fr; }
            .footer-brand { grid-column: 1 / -1; }
        }

        @media (max-width: 600px) {
            footer { padding-left: 5%; padding-right: 5%; }
            .footer-marquee { margin-left: -5%; margin-right: -5%; }
            .footer-inner { padding-top: 55px; }
            .footer-topline { margin-bottom: 40px; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 38px 25px; padding-bottom: 50px; }
            .footer-brand { grid-column: 1 / -1; }
            .footer-logo { font-size: 62px; letter-spacing: -4px; }
            .footer-bottom { display: block; }
            .footer-status { margin-top: 14px; }
        }

        @media (prefers-reduced-motion: reduce) {
            footer *, footer::before, footer::after { animation: none !important; }
        }



        /* =========================================================
           FINAL VISUAL PATCH — EVENTS + MAP ONLY
           Tidak mengubah HERO / NAVBAR / PLACES.
        ========================================================= */

        /* ---------- EVENTS: richer background ---------- */
        #events {
            overflow: hidden;
            background:
                radial-gradient(circle at 8% 18%, rgba(255,255,255,.72) 0 7%, transparent 27%),
                radial-gradient(circle at 92% 12%, rgba(191,153,111,.30) 0 4%, transparent 25%),
                radial-gradient(circle at 76% 88%, rgba(184,146,104,.18), transparent 30%),
                linear-gradient(135deg, #eee4d3 0%, #e8dcc8 44%, #f2e9da 72%, #dfccb0 100%);
        }

        #events::before {
            content: "";
            position: absolute;
            inset: 0;
            left: 0;
            right: 0;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            background-image:
                linear-gradient(115deg, transparent 0 47%, rgba(36,27,21,.045) 47.1%, transparent 47.3%),
                linear-gradient(25deg, transparent 0 62%, rgba(36,27,21,.035) 62.1%, transparent 62.3%),
                radial-gradient(circle at 50% 50%, rgba(255,255,255,.30) 0 1px, transparent 1.5px);
            background-size: 380px 380px, 460px 460px, 28px 28px;
            opacity: .8;
            animation: eventTexture 24s linear infinite;
        }

        #events::after {
            content: "EVENTS  •  SURABAYA  •  2026";
            position: absolute;
            right: 7%;
            top: 135px;
            z-index: 0;
            font-family: "Space Grotesk", sans-serif;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 4px;
            opacity: .22;
            transform: rotate(90deg) translateX(100%);
            transform-origin: right top;
        }

        #events > * { position: relative; z-index: 2; }

        .event-grid {
            position: relative;
            z-index: 3;
        }

        .event-card {
            position: relative;
            border-radius: 2px;
            background: rgba(247,240,228,.92);
            box-shadow: 0 12px 35px rgba(67,47,30,.08);
            transition: transform .45s cubic-bezier(.2,.8,.2,1), box-shadow .45s ease, border-color .45s ease;
        }

        .event-card::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 3;
            pointer-events: none;
            background: linear-gradient(120deg, transparent 25%, rgba(255,255,255,.24) 48%, transparent 68%);
            transform: translateX(-130%);
            transition: transform .8s ease;
        }

        .event-card:hover::before { transform: translateX(130%); }

        .event-card:hover {
            transform: translateY(-12px) rotate(-.4deg);
            border-color: rgba(36,27,21,.95);
            box-shadow: 0 25px 55px rgba(67,47,30,.18);
        }

        .event-image {
            position: relative;
            overflow: hidden;
            height: 220px;
            background:
                radial-gradient(circle at 50% 48%, rgba(255,231,188,.95) 0 3%, transparent 4%),
                radial-gradient(circle at 50% 48%, rgba(255,224,170,.18) 0 13%, transparent 14%),
                linear-gradient(135deg, #8b6c4e 0%, #b79a76 46%, #72543b 100%);
        }

        .event-card:nth-child(2) .event-image {
            background:
                radial-gradient(circle at 68% 32%, rgba(255,224,170,.85), transparent 16%),
                linear-gradient(135deg, #59483a, #a78967 55%, #46362b);
        }

        .event-card:nth-child(3) .event-image {
            background:
                radial-gradient(circle at 30% 60%, rgba(255,208,133,.75), transparent 13%),
                radial-gradient(circle at 72% 34%, rgba(255,231,183,.62), transparent 10%),
                linear-gradient(135deg, #6d4c35, #b99569 48%, #543724);
        }

        .event-card:nth-child(4) .event-image {
            background:
                radial-gradient(circle at 50% 22%, rgba(255,224,170,.8), transparent 14%),
                linear-gradient(135deg, #80654a, #c0a57e 48%, #5b4634);
        }

        .event-image::before {
            content: "✦";
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            transform: translate(-50%,-50%);
            color: rgba(255,245,222,.92);
            font-size: 46px;
            text-shadow: 0 0 30px rgba(255,220,165,.55);
            animation: eventSpark 2.8s ease-in-out infinite;
        }

        .event-image img {
            position: relative;
            z-index: 2;
            filter: saturate(.78) sepia(.12) contrast(.98);
            transition: transform .8s cubic-bezier(.2,.8,.2,1), filter .5s ease;
        }

        .event-card:hover .event-image img { transform: scale(1.07); filter: saturate(.95) sepia(.08) contrast(1.03); }
        .event-card:hover .event-image::before { opacity: .25; }

        .event-content { background: linear-gradient(180deg, rgba(247,240,228,.98), rgba(241,231,215,.94)); }

        .event-title { transition: transform .35s ease; }
        .event-card:hover .event-title { transform: translateX(4px); }

        @keyframes eventTexture { from { background-position: 0 0, 0 0, 0 0; } to { background-position: 380px 180px, -460px 240px, 28px 28px; } }
        @keyframes eventSpark { 0%,100% { opacity:.55; transform:translate(-50%,-50%) scale(.82) rotate(0); } 50% { opacity:1; transform:translate(-50%,-50%) scale(1.12) rotate(45deg); } }

        /* ---------- MAP: actual visual map composition ---------- */
        .map-section {
            min-height: 760px;
            padding-top: 105px;
            padding-bottom: 105px;
            color: #f6ead7;
            background:
                radial-gradient(circle at 68% 44%, rgba(190,140,83,.26), transparent 24%),
                radial-gradient(circle at 92% 80%, rgba(227,182,116,.14), transparent 28%),
                linear-gradient(135deg, #241914 0%, #35251b 42%, #17110d 100%);
        }

        .map-section::before {
            opacity: .28;
            background-image:
                linear-gradient(rgba(236,206,161,.09) 1px, transparent 1px),
                linear-gradient(90deg, rgba(236,206,161,.09) 1px, transparent 1px);
            background-size: 54px 54px;
            mask-image: linear-gradient(90deg, transparent 0%, #000 18%, #000 100%);
        }

        .map-section::after {
            right: -120px;
            top: 30px;
            width: 680px;
            height: 680px;
            border-color: rgba(234,200,151,.13);
            box-shadow:
                0 0 0 70px rgba(234,200,151,.025),
                0 0 0 140px rgba(234,200,151,.018),
                0 0 0 210px rgba(234,200,151,.012);
        }

        .map-content { max-width: 430px; padding-top: 40px; }

        .map-content::before {
            content: "EXPLORE SURABAYA  •  07°15'S 112°45'E";
            color: #f0d3a2;
            border-color: rgba(235,204,160,.30);
            background: rgba(24,17,13,.42);
            box-shadow: inset 0 0 25px rgba(231,186,117,.05);
        }

        .map-title {
            color: #f7ead8;
            text-shadow: 0 10px 35px rgba(0,0,0,.35);
        }

        .map-description { color: rgba(247,234,216,.78); }

        .map-background {
            right: 2%;
            top: 7%;
            width: 66%;
            height: 86%;
            opacity: .95;
            transform: rotate(-4deg);
            clip-path: none;
            border: 1px solid rgba(236,205,159,.12);
            background:
                linear-gradient(rgba(205,166,113,.035), rgba(205,166,113,.035)),
                repeating-linear-gradient(18deg, transparent 0 31px, rgba(223,194,151,.12) 32px, transparent 34px),
                repeating-linear-gradient(108deg, transparent 0 47px, rgba(223,194,151,.09) 48px, transparent 50px);
            box-shadow: inset 0 0 100px rgba(0,0,0,.25), 0 20px 60px rgba(0,0,0,.16);
        }

        .map-background::before {
            width: 65%; height: 34%; right: 13%; top: 24%;
            border-color: rgba(231,198,149,.18);
            border-radius: 42% 58% 47% 53%;
        }

        .map-background::after {
            width: 78%; height: 46%; right: 2%; top: 39%;
            border-color: rgba(231,198,149,.12);
            border-radius: 51% 49% 42% 58%;
        }

        /* extra street network generated by CSS */
        .map-background {
            --street: rgba(234,202,157,.14);
            --street2: rgba(234,202,157,.08);
            background-image:
                linear-gradient(22deg, transparent 0 11%, var(--street) 11.1% 11.3%, transparent 11.4% 30%, var(--street2) 30.1% 30.3%, transparent 30.4% 100%),
                linear-gradient(76deg, transparent 0 24%, var(--street) 24.1% 24.3%, transparent 24.4% 62%, var(--street2) 62.1% 62.3%, transparent 62.4% 100%),
                repeating-linear-gradient(16deg, transparent 0 36px, rgba(234,202,157,.08) 37px, transparent 39px),
                repeating-linear-gradient(104deg, transparent 0 52px, rgba(234,202,157,.065) 53px, transparent 55px);
        }

        .map-background > * { position: absolute; }

        .map-route {
            right: 18%;
            top: 25%;
            width: 430px;
            height: 350px;
            opacity: .85;
        }

        .map-route::before {
            border-color: rgba(237,193,125,.55);
            border-width: 1px;
            border-style: dashed;
            filter: drop-shadow(0 0 7px rgba(237,193,125,.20));
        }

        .map-route::after { color: #e8bd7c; }

        .map-pin {
            width: 20px;
            height: 20px;
            background: #f1c27f;
            border: 4px solid #2b1d15;
            box-shadow: 0 0 0 5px rgba(238,190,119,.17), 0 0 28px rgba(238,190,119,.45);
        }

        .map-pin::after { background: #fff0d0; }

        .map-pin.pin-one { right: 34%; top: 31%; }
        .map-pin.pin-two { right: 48%; top: 60%; }
        .map-pin.pin-three { right: 22%; top: 57%; }

        .map-pin.pin-one::before,
        .map-pin.pin-two::before,
        .map-pin.pin-three::before {
            color: #f4e4cd;
            background: rgba(29,20,15,.90);
            border-color: rgba(236,197,145,.35);
            padding: 8px 11px;
            font-size: 9px;
            box-shadow: 0 8px 25px rgba(0,0,0,.25);
        }

        .map-section .hero-button {
            background: #f1d3a0;
            color: #241812;
            border: 1px solid rgba(255,239,207,.65);
        }

        .map-section .hero-button:hover { background: #ffe3b8; }

        /* glowing map lights */
        .map-section .map-pin {
            animation: mapPinGlow 2.5s ease-in-out infinite;
        }

        @keyframes mapPinGlow {
            0%,100% { box-shadow: 0 0 0 4px rgba(238,190,119,.12), 0 0 18px rgba(238,190,119,.28); }
            50% { box-shadow: 0 0 0 12px rgba(238,190,119,.035), 0 0 35px rgba(238,190,119,.62); }
        }

        @media (max-width: 900px) {
            .map-section { min-height: 820px; }
            .map-background { width: 100%; right: -18%; opacity: .55; }
            .map-content { max-width: 560px; }
        }

        @media (max-width: 600px) {
            .map-section { min-height: 760px; }
            .map-background { width: 125%; right: -38%; top: 24%; height: 65%; }
            .map-route { right: 12%; top: 43%; transform: scale(.72); transform-origin: center; }
            .map-pin.pin-one { right: 25%; top: 51%; }
            .map-pin.pin-two { right: 53%; top: 67%; }
            .map-pin.pin-three { right: 17%; top: 68%; }
        }

    

/* =========================================================
   FINAL VISUAL POLISH — EVENTS + MAP ONLY
   The existing HERO / NAVBAR / PLACES styles are untouched.
========================================================= */

/* EVENTS — richer background, depth, motion */
#events {
    position: relative;
    overflow: hidden;
    isolation: isolate;
    background:
        radial-gradient(circle at 8% 18%, rgba(196,157,111,.30), transparent 24%),
        radial-gradient(circle at 92% 20%, rgba(255,247,231,.70), transparent 28%),
        linear-gradient(125deg, #e4d6bf 0%, #f1e7d7 48%, #d7c09f 100%);
}

#events::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: .38;
    background-image:
        linear-gradient(115deg, transparent 0 49%, rgba(61,43,30,.08) 50%, transparent 51%),
        linear-gradient(25deg, transparent 0 49%, rgba(61,43,30,.055) 50%, transparent 51%);
    background-size: 150px 150px, 210px 210px;
    animation: eventTexture 24s linear infinite;
}

#events::after {
    content: "EVENTS • MUSIC • ART • FOOD • HERITAGE";
    position: absolute;
    right: -30px;
    top: 135px;
    z-index: -1;
    font-size: clamp(40px, 6vw, 90px);
    font-weight: 900;
    letter-spacing: .08em;
    color: rgba(36,27,21,.035);
    white-space: nowrap;
    transform: rotate(-90deg) translateY(-50%);
    transform-origin: right top;
}

.section-heading { position: relative; z-index: 2; }

.event-grid { position: relative; z-index: 2; }

.event-card {
    position: relative;
    min-height: 430px;
    border-radius: 2px;
    background: rgba(247,239,226,.94);
    box-shadow: 0 12px 35px rgba(54,39,27,.08);
    transition: transform .45s cubic-bezier(.2,.8,.2,1), box-shadow .45s ease, border-color .45s ease;
}

.event-card::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 3;
    pointer-events: none;
    background: linear-gradient(120deg, transparent 25%, rgba(255,255,255,.42) 50%, transparent 75%);
    transform: translateX(-120%);
    transition: transform .8s ease;
}

.event-card:hover {
    transform: translateY(-12px) rotate(-.35deg);
    box-shadow: 0 28px 55px rgba(54,39,27,.20);
    border-color: rgba(36,27,21,.95);
}

.event-card:hover::before { transform: translateX(120%); }

.event-image {
    position: relative;
    height: 210px;
    overflow: hidden;
    background:
        radial-gradient(circle at 50% 42%, rgba(255,236,190,.85) 0 3%, transparent 4%),
        radial-gradient(circle at 50% 42%, rgba(255,222,160,.28) 0 12%, transparent 13%),
        linear-gradient(135deg, #79563d 0%, #ad8964 48%, #60432f 100%);
}

.event-image::before {
    content: "";
    position: absolute;
    inset: -20%;
    background:
        repeating-linear-gradient(90deg, transparent 0 42px, rgba(255,245,220,.08) 43px, transparent 44px),
        linear-gradient(160deg, transparent 25%, rgba(255,239,204,.20) 50%, transparent 75%);
    transform: rotate(-8deg);
    animation: eventImageDrift 10s ease-in-out infinite alternate;
}

.event-image::after {
    content: "✦";
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    font-size: 54px;
    color: rgba(36,27,21,.92);
    text-shadow: 0 0 25px rgba(255,226,172,.30);
    animation: eventSpark 2.8s ease-in-out infinite;
}

.event-content { position: relative; z-index: 4; }

.event-category {
    color: #6b4b31;
    position: relative;
}

.event-title { transition: letter-spacing .35s ease; }
.event-card:hover .event-title { letter-spacing: -.4px; }

.event-info {
    position: relative;
}

.event-info::before {
    content: "";
    position: absolute;
    left: 0;
    top: -1px;
    width: 42px;
    height: 2px;
    background: #6b4429;
    transform-origin: left;
    transform: scaleX(0);
    transition: transform .4s ease;
}
.event-card:hover .event-info::before { transform: scaleX(1); }

/* MAP — make it feel like an actual interactive discovery panel */
.map-section {
    min-height: 720px;
    position: relative;
    overflow: hidden;
    isolation: isolate;
    background:
        radial-gradient(circle at 70% 48%, rgba(235,208,169,.34), transparent 28%),
        radial-gradient(circle at 18% 65%, rgba(214,169,112,.20), transparent 30%),
        linear-gradient(135deg, #2c211a 0%, #4b3525 42%, #1e1713 100%);
    color: #f5ead8;
}

.map-section::before {
    content: "";
    position: absolute;
    inset: -15%;
    z-index: 0;
    background:
        linear-gradient(rgba(235,208,169,.11) 1px, transparent 1px),
        linear-gradient(90deg, rgba(235,208,169,.11) 1px, transparent 1px),
        repeating-linear-gradient(28deg, transparent 0 85px, rgba(235,208,169,.055) 86px 87px, transparent 88px);
    background-size: 54px 54px, 54px 54px, 180px 180px;
    transform: rotate(-6deg) scale(1.15);
    animation: mapDrift 30s linear infinite;
}

.map-section::after {
    content: "";
    position: absolute;
    width: 760px;
    height: 760px;
    right: -260px;
    top: -110px;
    border-radius: 50%;
    border: 1px solid rgba(245,224,190,.17);
    box-shadow:
        0 0 0 65px rgba(245,224,190,.035),
        0 0 0 130px rgba(245,224,190,.025),
        0 0 0 195px rgba(245,224,190,.018);
    animation: mapOrbit 18s ease-in-out infinite;
}

.map-content {
    position: relative;
    z-index: 8;
    max-width: 440px;
    padding-top: 65px;
}

.map-content::before {
    content: "SURABAYA • DISCOVERY MAP";
    display: inline-block;
    margin-bottom: 24px;
    padding: 8px 12px;
    border: 1px solid rgba(245,224,190,.28);
    background: rgba(255,240,211,.07);
    backdrop-filter: blur(8px);
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 2px;
}

.map-title {
    color: #f5ead8;
    text-shadow: 0 14px 35px rgba(0,0,0,.30);
}

.map-description { color: rgba(245,234,216,.82); }

.map-background {
    position: absolute;
    z-index: 2;
    right: -4%;
    top: 5%;
    width: 68%;
    height: 90%;
    opacity: .78;
    transform: rotate(-7deg);
    background:
        repeating-linear-gradient(22deg, transparent 0 44px, rgba(245,224,190,.12) 45px, transparent 47px),
        repeating-linear-gradient(112deg, transparent 0 68px, rgba(245,224,190,.10) 69px, transparent 71px),
        radial-gradient(circle at 40% 35%, rgba(245,224,190,.11), transparent 22%);
    filter: drop-shadow(0 20px 30px rgba(0,0,0,.15));
}

.map-background::before,
.map-background::after {
    content: "";
    position: absolute;
    border: 1px solid rgba(245,224,190,.12);
    border-radius: 50%;
}
.map-background::before { width: 320px; height: 320px; left: 22%; top: 14%; }
.map-background::after { width: 160px; height: 160px; left: 48%; top: 48%; }

.map-route {
    position: absolute;
    z-index: 4;
    right: 16%;
    top: 28%;
    width: 43%;
    height: 38%;
    border: 2px dashed rgba(239,193,125,.52);
    border-left-color: transparent;
    border-bottom-color: transparent;
    border-radius: 48% 55% 35% 60%;
    transform: rotate(14deg);
    filter: drop-shadow(0 0 8px rgba(239,193,125,.25));
    animation: routeMove 5s linear infinite;
}

.map-route::after {
    content: "";
    position: absolute;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #f2c987;
    box-shadow: 0 0 0 7px rgba(242,201,135,.10), 0 0 18px rgba(242,201,135,.8);
    right: 2%;
    bottom: 12%;
    animation: routeDot 2s ease-in-out infinite;
}

.map-pin {
    z-index: 9;
    width: 20px;
    height: 20px;
    background: #f0c47f;
    border: 4px solid #2b2019;
    box-shadow: 0 0 0 6px rgba(240,196,127,.13), 0 0 30px rgba(240,196,127,.42);
}

.map-pin::after {
    background: #fff0d1;
    width: 7px;
    height: 7px;
}

.map-pin::before {
    color: #2a1e17;
    background: rgba(245,234,216,.96);
    border-color: rgba(36,27,21,.18);
    box-shadow: 0 10px 25px rgba(0,0,0,.16);
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .8px;
}

/* give the three existing pins distinct labels without changing markup */
.map-pin.pin-one::before { content: "HERITAGE • KOTA LAMA"; }
.map-pin.pin-two::before { content: "EVENTS • SURABAYA EXPO"; }
.map-pin.pin-three::before { content: "CAFÉ • TUNJUNGAN"; }

.map-pin:hover {
    transform: scale(1.6);
    background: #fff0d1;
}

.map-pin:hover::before { transform: translateY(-2px); }

@keyframes eventTexture {
    from { background-position: 0 0, 0 0; }
    to { background-position: 150px 150px, -210px 210px; }
}
@keyframes eventImageDrift {
    from { transform: rotate(-8deg) translate3d(-12px,0,0) scale(1.05); }
    to { transform: rotate(-4deg) translate3d(12px,-8px,0) scale(1.12); }
}
@keyframes eventSpark {
    0%,100% { transform: translate(-50%,-50%) scale(.88); opacity: .72; }
    50% { transform: translate(-50%,-50%) scale(1.12); opacity: 1; }
}
@keyframes mapDrift {
    from { transform: rotate(-6deg) translate3d(0,0,0) scale(1.15); }
    to { transform: rotate(-6deg) translate3d(54px,28px,0) scale(1.15); }
}
@keyframes mapOrbit {
    0%,100% { transform: translate3d(0,0,0) scale(1); }
    50% { transform: translate3d(-18px,12px,0) scale(1.035); }
}
@keyframes routeMove {
    to { stroke-dashoffset: -100px; }
}
@keyframes routeDot {
    0%,100% { transform: scale(.8); opacity: .7; }
    50% { transform: scale(1.4); opacity: 1; }
}

@media (max-width: 900px) {
    .map-section { min-height: 760px; }
    .map-background { width: 100%; right: -20%; top: 30%; opacity: .48; }
    .map-route { right: 8%; top: 49%; width: 78%; }
    .map-pin.pin-one { right: 30%; top: 48%; }
    .map-pin.pin-two { right: 54%; top: 67%; }
    .map-pin.pin-three { right: 16%; top: 70%; }
}

@media (prefers-reduced-motion: reduce) {
    #events::before,
    .event-image::before,
    .event-image::after,
    .map-section::before,
    .map-section::after,
    .map-route,
    .map-pin { animation: none !important; }
}

</style>
</head>

<body>

<!-- =========================================
     NAVBAR
========================================= -->

<nav class="navbar" id="navbar">

    <a href="/" class="logo">
        NANG ENDI?<span> — Surabaya City Guide</span>
    </a>

    <ul class="nav-menu">
        <li><a href="#home">Home</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="#places">Places</a></li>
        <li><a href="#map">Map</a></li>
    </ul>

</nav>


<!-- =========================================
     HERO
========================================= -->

<section class="hero" id="home">

    <div class="hero-bg" id="heroBg"></div>

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <div class="eyebrow">
            Discover Surabaya Differently
        </div>

        <h1 class="hero-title">
            NANG<br>
            <em>ENDI?</em>
        </h1>

        <p class="hero-description">
    Tempat buat cari tahu ada apa di Surabaya.
    Temukan event, café, dan cerita heritage
    & culture dalam satu tempat.
</p>

        <a href="#events" class="hero-button">
            Explore Surabaya
            <span>→</span>
        </a>

    </div>

    <div class="scroll-label">
        Scroll to explore ↓
    </div>

</section>

<!-- =========================================
     MOTION TICKER
========================================= -->
<div class="motion-ticker" aria-label="Surabaya moving highlights">
    <div class="motion-track">
        <span>NANG ENDI?</span><span>SURABAYA IS CALLING</span><span>GO EXPLORE</span><span>EVENTS</span><span>CAFÉ</span><span>HERITAGE</span><span>CULTURE</span><span>HIDDEN GEMS</span>
        <span>NANG ENDI?</span><span>SURABAYA IS CALLING</span><span>GO EXPLORE</span><span>EVENTS</span><span>CAFÉ</span><span>HERITAGE</span><span>CULTURE</span><span>HIDDEN GEMS</span>
    </div>
</div>

<!-- =========================================
     QUICK INFO
========================================= -->

<section class="intro-strip">

    <div class="intro-item reveal-on-scroll">
        <div class="intro-number">01</div>
        <h3>Event Terbaru</h3>
        <p>
            Temukan event seru yang sedang
            dan akan berlangsung di Surabaya.
        </p>
    </div>

    <div class="intro-item reveal-on-scroll">
        <div class="intro-number">02</div>
        <h3>Explore Places</h3>

<p>
    Temukan café sesuai gaya kamu
    dan jelajahi heritage & culture
    Surabaya melalui GLAM.
</p>
    </div>

    <div class="intro-item reveal-on-scroll">
        <div class="intro-number">03</div>
        <h3>Surabaya on Map</h3>
        <p>
            Jelajahi event dan tempat
            melalui peta interaktif.
        </p>
    </div>

    <div class="intro-item reveal-on-scroll">
        <div class="intro-number">04</div>
        <h3>Local Community</h3>
        <p>
            Ruang untuk menemukan,
            berbagi, dan ikut meramaikan Surabaya.
        </p>
    </div>

</section>


<!-- =========================================
     EVENTS
========================================= -->

<section class="section reveal-on-scroll" id="events">

    <div class="section-heading">

        <div>
            <h2 class="section-title">
                WHAT'S<br>
                HAPPENING?
            </h2>
        </div>

        <div class="section-subtitle">
            <p>
                Event yang sedang dan akan
                happening di Surabaya.
            </p>

            <br>

            <a href="/events" class="view-all">
                See all events →
            </a>
        </div>

    </div>


    <div class="event-grid">

        <?php if (!empty($events)): ?>

            <?php foreach (array_slice($events, 0, 4) as $event): ?>

                <a
                    href="/events/<?= esc($event['slug']) ?>"
                    class="event-card reveal-on-scroll"
                >

                    <div class="event-image">
                        <?php if (!empty($event['image'])): ?>

                            <img
                                src="<?= esc($event['image']) ?>"
                                alt="<?= esc($event['title']) ?>"
                                style="
                                    width:100%;
                                    height:100%;
                                    object-fit:cover;
                                "
                            >

                        <?php else: ?>

                            ✦

                        <?php endif; ?>
                    </div>

                    <div class="event-content">

                        <div class="event-category">
                            EVENT
                        </div>

                        <h3 class="event-title">
                            <?= esc($event['title']) ?>
                        </h3>

                        <div class="event-info">

                            <?php if (!empty($event['date_start'])): ?>
                                📅
                                <?= date('d M Y', strtotime($event['date_start'])) ?>
                                <br>
                            <?php endif; ?>

                            <?php if (!empty($event['location'])): ?>
                                📍
                                <?= esc($event['location']) ?>
                            <?php endif; ?>

                        </div>

                    </div>

                </a>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="event-card">
                <div class="event-image">✦</div>
                <div class="event-content">
                    <div class="event-category">EVENT</div>
                    <h3 class="event-title">
                        Belum ada event
                    </h3>
                </div>
            </div>

        <?php endif; ?>

    </div>

</section>

<!-- =========================================
     PLACES
========================================= -->

<section class="section places-section woah-places-v2 reveal-on-scroll" id="places">

    <div class="places-v2-bg" aria-hidden="true">
        <span class="places-v2-orbit orbit-a"></span>
        <span class="places-v2-orbit orbit-b"></span>
        <span class="places-v2-orbit orbit-c"></span>
        <span class="places-v2-dot dot-a"></span>
        <span class="places-v2-dot dot-b"></span>
        <span class="places-v2-dot dot-c"></span>
        <span class="places-v2-word">GO<br>OUT</span>
    </div>

    <div class="section-heading">

        <h2 class="section-title">
            EXPLORE<br>
            PLACES
        </h2>

        <div class="section-subtitle">
            Temukan tempat yang bisa kamu
            kunjungi untuk nongkrong,
            bekerja, atau mengenal sejarah Surabaya.

            <br><br>

            <a href="/places" class="view-all">
                See all places →
            </a>
        </div>

    </div>


    <div class="place-grid">

        <!-- =========================
             CAFE
        ========================== -->

        <a href="/places/cafe" class="place-card reveal-on-scroll">

            <div class="place-card-content">

                <div class="place-category">
                    CAFÉ & COFFEE
                </div>

                <h3>
                    Café<br>
                    & Coffee
                </h3>

                <p>
                    Cari café sesuai kebutuhanmu —
                    mulai dari tempat nyaman untuk WFC,
                    café legendaris, sampai tempat
                    yang cocok buat anak kalcer.
                </p>

                <div class="place-tags">

                    <span>WFC</span>
                    <span>LEGEND</span>
                    <span>KALCER</span>

                </div>

            </div>

        </a>


        <!-- =========================
             HERITAGE & CULTURE
        ========================== -->

        <a href="/places/heritage-culture" class="place-card reveal-on-scroll">

            <div class="place-card-content">

                <div class="place-category">
                    HERITAGE & CULTURE
                </div>

                <h3>
                    Heritage<br>
                    & Culture
                </h3>

                <p>
                    Kenali sejarah dan budaya Surabaya
                    melalui museum, galeri, perpustakaan,
                    dan arsip dalam ekosistem GLAM.
                </p>

                <div class="place-tags">

                    <span>GALLERY</span>
                    <span>LIBRARY</span>
                    <span>ARCHIVE</span>
                    <span>MUSEUM</span>

                </div>

            </div>

        </a>

    </div>

</section>


<!-- =========================================
     MAP
========================================= -->

<section class="section map-section" id="map">

    <div class="map-background"></div>

    <div class="map-route" aria-hidden="true"></div>

    <div class="map-pin pin-one"></div>
    <div class="map-pin pin-two"></div>
    <div class="map-pin pin-three"></div>

    <div class="map-content">

        <h2 class="map-title">
            SURABAYA<br>
            ON MAP
        </h2>

        <p class="map-description">
            Lihat event dan tempat menarik
            di Surabaya dalam satu peta.
            Cari tahu apa yang ada di sekitar kamu.
        </p>

        <a href="/map" class="hero-button">
            Open Map →
        </a>

    </div>

</section>


<!-- =========================================
     CTA REMOVED
     Footer follows directly after the Map section.
========================================= -->

<!-- =========================================
     FOOTER — WOW VERSION
========================================= -->
<footer>

    <div class="footer-marquee" aria-hidden="true">
        <div class="footer-marquee-track">
            <span>NANG ENDI?</span>
            <span>SURABAYA IS CALLING</span>
            <span>KEEP EXPLORING</span>
            <span>EVENTS</span>
            <span>PLACES</span>
            <span>HERITAGE</span>
            <span>CULTURE</span>
            <span>NANG ENDI?</span>
            <span>SURABAYA IS CALLING</span>
            <span>KEEP EXPLORING</span>
            <span>EVENTS</span>
            <span>PLACES</span>
            <span>HERITAGE</span>
            <span>CULTURE</span>
        </div>
    </div>

    <div class="footer-inner">

        <div class="footer-topline">
            <div class="footer-kicker">See you around Surabaya</div>
            <a href="#home" class="footer-backtop">Back to top <span>↑</span></a>
        </div>

        <div class="footer-grid">

            <div class="footer-brand">
                <div class="footer-logo">NANG<br>ENDI?</div>
                <p class="footer-description">
                    Surabaya City Guide untuk menemukan event, café,
                    tempat, dan cerita heritage &amp; culture di Kota Pahlawan.
                </p>
            </div>

            <div class="footer-column">
                <h4>Explore</h4>
                <a href="/events">Events</a>
                <a href="/places">Places</a>
                <a href="/map">Map</a>
            </div>

            <div class="footer-column">
    <h4>About</h4>
    <a href="#home">Tentang Kami</a>
    <a href="mailto:nang_endi@gmail.com">nang_endi@gmail.com</a>
    <a href="/admin/login">
        Portal Admin
    </a>

</div>

            <div class="footer-column">

        </div>

        <div class="footer-bottom">
            <div class="copyright">© 2026 NANG ENDI? — Surabaya City Guide</div>
            <div class="footer-status"><i></i> Surabaya • Always worth exploring</div>
        </div>

    </div>

</footer>


<!-- =========================================
     PARALLAX SCRIPT
========================================= -->

<script>

    const heroBg = document.getElementById("heroBg");
    const navbar = document.getElementById("navbar");

    let ticking = false;

    function updatePageOnScroll() {
        const scrollY = window.scrollY || window.pageYOffset;

        if (heroBg) {
            const hero = document.querySelector(".hero");
            const heroHeight = hero ? hero.offsetHeight : window.innerHeight;
            const parallaxY = Math.min(scrollY * 0.16, heroHeight * 0.16);
            heroBg.style.transform =
                `translate3d(0, ${parallaxY}px, 0) scale(1.12)`;
        }

        if (navbar) {
            navbar.classList.toggle("scrolled", scrollY > 60);
        }

        ticking = false;
    }

    window.addEventListener("scroll", () => {
        if (!ticking) {
            window.requestAnimationFrame(updatePageOnScroll);
            ticking = true;
        }
    }, { passive: true });

    updatePageOnScroll();

    // Elements appear naturally as the visitor explores the page.
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("is-visible");
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll(".reveal-on-scroll").forEach((el, index) => {
        el.style.transitionDelay = `${Math.min((index % 6) * 70, 350)}ms`;
        revealObserver.observe(el);
    });

    // Tiny cursor-follow light on desktop for a more alive hero.
    const hero = document.querySelector(".hero");
    if (hero && window.matchMedia("(pointer:fine)").matches) {
        hero.addEventListener("pointermove", (event) => {
            const rect = hero.getBoundingClientRect();
            const x = ((event.clientX - rect.left) / rect.width) * 100;
            const y = ((event.clientY - rect.top) / rect.height) * 100;
            hero.style.setProperty("--mouse-x", `${x}%`);
            hero.style.setProperty("--mouse-y", `${y}%`);
        });
    }

</script>

</body>
</html>