<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Silaturahim Syawalan — Holding RS Aisyiyah Group Kudus</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Cinzel:wght@400;600;700&family=Nunito:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Logo_RSSA.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/Logo_RSSA.png') }}">
    <style>
        :root {
            --biru: #84B7ED;
            --biru-muda: #B3D1F5;
            --biru-terang: #D6E9FB;
            --biru-gelap: #3A78C9;
            --biru-tua: #1A3F6E;
            --biru-tua2: #0D2444;
            --emas: #C9A84C;
            --emas-muda: #E2C778;
            --emas-terang: #F0DFA0;
            --putih: #FFFFFF;
            --krem: #F8FBFF;
            --abu: #6B7E9A;
            --teks: #0D2444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: "Nunito", sans-serif;
            background: #84B7ED;
            color: var(--teks);
            overflow-x: hidden
        }

        ::-webkit-scrollbar {
            width: 4px
        }

        ::-webkit-scrollbar-track {
            background: var(--biru)
        }

        ::-webkit-scrollbar-thumb {
            background: var(--biru);
            border-radius: 2px
        }

        /* ============================
   1. COVER
============================ */
        #cover {
            min-height: 100vh;
            background: linear-gradient(160deg, var(--biru) 0%, #102d5a 50%, #0a1e3a 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 36px 20px;
            position: relative;
            overflow: hidden;
        }

        #cover::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse 80% 50% at 50% 0%, rgba(132, 183, 237, 0.18) 0%, transparent 70%),
                radial-gradient(ellipse 50% 40% at 20% 80%, rgba(201, 168, 76, 0.10) 0%, transparent 60%),
                radial-gradient(ellipse 50% 40% at 80% 80%, rgba(132, 183, 237, 0.10) 0%, transparent 60%);
            pointer-events: none;
        }

        #cover::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(0deg, transparent, transparent 59px, rgba(132, 183, 237, 0.04) 59px, rgba(132, 183, 237, 0.04) 60px),
                repeating-linear-gradient(90deg, transparent, transparent 59px, rgba(132, 183, 237, 0.04) 59px, rgba(132, 183, 237, 0.04) 60px);
            pointer-events: none;
        }

        .cover-inner {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 440px;
            width: 100%;
        }

        /* 3 logos */
        .logos-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            margin-bottom: 28px;
        }

        .logo-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .logo-circle {
            border-radius: 50%;
            border: 1.5px solid rgba(132, 183, 237, 0.4);
            background: rgba(255, 255, 255, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 0 20px rgba(132, 183, 237, 0.15);
        }

        .logo-circle:hover {
            border-color: var(--biru);
            box-shadow: 0 0 30px rgba(132, 183, 237, 0.4);
            transform: scale(1.06);
        }

        .logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 6px;
        }

        .logo-circle.sm {
            width: 64px;
            height: 64px;
        }

        .logo-circle.lg {
            width: 82px;
            height: 82px;
            border-color: rgba(201, 168, 76, 0.6);
            box-shadow: 0 0 30px rgba(201, 168, 76, 0.25);
        }

        .logo-circle.lg:hover {
            border-color: var(--emas-muda);
            box-shadow: 0 0 40px rgba(201, 168, 76, 0.45);
        }

        .logo-name {
            font-size: 8px;
            color: rgba(255, 255, 255, 0.45);
            letter-spacing: 1.5px;
            font-weight: 700;
            text-transform: uppercase;
            max-width: 72px;
            text-align: center;
            line-height: 1.3
        }

        .logo-sep {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, transparent, rgba(132, 183, 237, 0.35), transparent);
            flex-shrink: 0;
        }

        .ornament-row {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin-bottom: 16px;
        }

        .ornament-row::before,
        .ornament-row::after {
            content: '';
            flex: 1;
            max-width: 55px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(132, 183, 237, 0.6), transparent);
        }

        .ornament-row span {
            color: var(--biru-muda);
            font-size: 13px;
        }

        .arabic-cover {
            font-family: "Cormorant Garamond", serif;
            font-size: 19px;
            color: var(--biru-terang);
            letter-spacing: 5px;
            line-height: 1.6;
            margin-bottom: 12px;
            opacity: 0;
            animation: fadeUp 1s ease 0.3s forwards;
        }

        .cover-tag {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.45);
            letter-spacing: 4px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 8px;
            opacity: 0;
            animation: fadeUp 1s ease 0.5s forwards;
        }

        .cover-title {
            font-family: "Cinzel", serif;
            font-size: clamp(26px, 7vw, 38px);
            color: var(--putih);
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: 2px;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.4);
            opacity: 0;
            animation: fadeUp 1s ease 0.7s forwards;
        }

        .cover-sub {
            font-family: "Cormorant Garamond", serif;
            font-style: italic;
            font-size: 16px;
            color: var(--biru-muda);
            letter-spacing: 4px;
            margin-top: 6px;
            opacity: 0;
            animation: fadeUp 1s ease 0.9s forwards;
        }

        .cover-tahun {
            display: inline-block;
            margin: 12px auto 0;
            padding: 5px 18px;
            border: 1px solid rgba(132, 183, 237, 0.35);
            border-radius: 50px;
            font-size: 11px;
            color: var(--biru-muda);
            letter-spacing: 4px;
            font-weight: 700;
            opacity: 0;
            animation: fadeUp 1s ease 1.1s forwards;
        }

        .kepada-box {
            margin-top: 24px;
            padding: 16px 20px;
            background: rgba(132, 183, 237, 0.07);
            border: 1px solid rgba(132, 183, 237, 0.2);
            border-radius: 8px;
            opacity: 0;
            animation: fadeUp 1s ease 1.3s forwards;
        }

        .kepada-label {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.4);
            letter-spacing: 3px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .kepada-nama {
            font-family: "Cormorant Garamond", serif;
            font-size: 20px;
            color: var(--putih);
            font-weight: 600;
            letter-spacing: 1px;
        }

        .kepada-sub {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 3px;
        }

        .btn-buka {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 24px;
            padding: 14px 32px;
            background: linear-gradient(135deg, var(--biru-gelap), var(--biru), var(--biru-muda));
            color: var(--biru-tua2);
            font-family: "Cinzel", serif;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 30px rgba(132, 183, 237, 0.4);
            transition: all 0.3s;
            opacity: 0;
            animation: fadeUp 1s ease 1.5s forwards;
            text-decoration: none;
        }

        .btn-buka:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 40px rgba(132, 183, 237, 0.55);
        }

        /* particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0;
            animation: floatP linear infinite;
        }

        @keyframes floatP {
            0% {
                opacity: 0;
                transform: translateY(0)
            }

            10% {
                opacity: .8
            }

            90% {
                opacity: .2
            }

            100% {
                opacity: 0;
                transform: translateY(-110px) translateX(15px)
            }
        }

        /* ============================
   SECTION BASE
============================ */
        section {
            padding: 56px 22px;
            position: relative;
        }

        .section-inner {
            max-width: 520px;
            margin: 0 auto;
        }

        .sec-label {
            font-size: 10px;
            color: var(--biru);
            letter-spacing: 4px;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 5px;
        }

        .sec-title {
            font-family: "Cinzel", serif;
            font-size: clamp(20px, 5vw, 26px);
            color: var(--biru-tua);
            text-align: center;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 18px;
        }

        .sec-title.white {
            color: var(--putih);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin-bottom: 22px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            max-width: 70px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--biru), transparent);
        }

        .divider span {
            color: var(--biru);
            font-size: 13px;
        }

        .divider.gold::before,
        .divider.gold::after {
            background: linear-gradient(90deg, transparent, var(--emas), transparent);
        }

        .divider.gold span {
            color: var(--emas-muda);
        }

        /* ============================
   2. HALAMAN INTI
============================ */
        #inti {
            background: var(--krem);
            padding-top: 64px;
        }

        .inti-logo-center {
            display: flex;
            justify-content: center;
            margin-bottom: 22px;
        }

        .logo-big-inti {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            border: 2px solid rgba(201, 168, 76, 0.5);
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(132, 183, 237, 0.25), 0 0 0 6px rgba(132, 183, 237, 0.08);
        }

        .logo-big-inti img {
            width: 90%;
            height: 90%;
            object-fit: contain;
            padding: 4px;
        }

        .inti-arabic {
            font-family: "Cormorant Garamond", serif;
            font-size: clamp(20px, 5vw, 26px);
            color: var(--biru-tua);
            letter-spacing: 5px;
            text-align: center;
            margin-bottom: 8px;
        }

        .inti-main-title {
            font-family: "Cinzel", serif;
            font-size: clamp(22px, 6vw, 32px);
            color: var(--biru-tua);
            font-weight: 700;
            text-align: center;
            letter-spacing: 2px;
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .inti-sub {
            font-family: "Cormorant Garamond", serif;
            font-style: italic;
            font-size: 16px;
            color: var(--biru-gelap);
            letter-spacing: 4px;
            text-align: center;
            margin-bottom: 16px;
        }

        .date-chip {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 24px;
            background: linear-gradient(135deg, var(--biru-tua2), var(--biru-tua));
            border-radius: 50px;
            font-family: "Cinzel", serif;
            font-size: 13px;
            color: var(--biru-terang);
            letter-spacing: 2px;
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(13, 36, 68, 0.25);
        }

        /* ============================
   3. SAMBUTAN
============================ */
        #sambutan {
            background: linear-gradient(160deg, var(--biru-tua2) 0%, #0f2d58 60%, #0a1e3a 100%);
            padding: 56px 22px;
        }

        #sambutan::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(ellipse 70% 60% at 50% 50%, rgba(132, 183, 237, 0.07) 0%, transparent 70%);
            pointer-events: none;
        }

        .sambutan-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .logo-sambutan {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid rgba(201, 168, 76, 0.4);
            background: rgba(255, 255, 255, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(201, 168, 76, 0.2);
        }

        .logo-sambutan img {
            width: 90%;
            height: 90%;
            object-fit: contain;
            padding: 4px;
        }

        .sambutan-text {
            font-family: "Cormorant Garamond", serif;
            font-size: clamp(15px, 4vw, 18px);
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.95;
            text-align: center;
            font-style: italic;
            margin-bottom: 24px;
            padding: 0 6px;
            position: relative;
            z-index: 1;
        }

        .sambutan-text em {
            color: var(--biru-muda);
            font-style: normal;
            font-weight: 600;
        }

        /* Foto direksi group */
        .direksi-photo-wrap {
            position: relative;
            z-index: 1;
            border-radius: 16px;
            overflow: hidden;
            border: 1.5px solid rgba(132, 183, 237, 0.25);
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.4);
        }

        .direksi-photo-wrap img {
            width: 100%;
            display: block;
            object-fit: cover;
        }

        .direksi-caption {
            background: linear-gradient(to top, rgba(13, 36, 68, 0.95) 0%, rgba(13, 36, 68, 0.7) 60%, transparent 100%);
            padding: 24px 16px 18px;
            text-align: center;
            position: relative;
            z-index: 1;
            margin-top: -4px;
        }

        .direksi-caption-title {
            font-family: "Cinzel", serif;
            font-size: 13px;
            color: var(--biru-muda);
            letter-spacing: 3px;
            margin-bottom: 4px;
        }

        .direksi-caption-sub {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.45);
            letter-spacing: 1.5px;
        }

        /* ============================
   4. WAKTU TEMPAT + COUNTDOWN
============================ */
        #waktu {
            background: var(--krem);
            padding: 56px 22px;
        }

        .waktu-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 22px;
        }

        .waktu-card {
            background: #fff;
            border: 1px solid rgba(132, 183, 237, 0.3);
            border-radius: 10px;
            padding: 18px 12px;
            text-align: center;
            box-shadow: 0 4px 16px rgba(132, 183, 237, 0.1);
            transition: all 0.3s;
        }

        .waktu-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(132, 183, 237, 0.2);
            border-color: var(--biru);
        }

        .waktu-icon {
            font-size: 26px;
            margin-bottom: 8px;
            display: block;
        }

        .waktu-label {
            font-size: 9px;
            color: var(--abu);
            letter-spacing: 3px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .waktu-val {
            font-family: "Cinzel", serif;
            font-size: clamp(13px, 3.5vw, 16px);
            color: var(--biru-tua);
            font-weight: 600;
            line-height: 1.3;
        }

        .waktu-detail {
            font-size: 11px;
            color: var(--abu);
            margin-top: 4px;
        }

        .countdown-section {
            background: linear-gradient(135deg, var(--biru-tua2), var(--biru-tua));
            border-radius: 14px;
            padding: 24px 14px;
            box-shadow: 0 12px 40px rgba(13, 36, 68, 0.3);
        }

        .cd-label {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.45);
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 700;
            text-align: center;
            margin-bottom: 16px;
        }

        .cd-boxes {
            display: flex;
            gap: 8px;
            justify-content: center;
            align-items: flex-start;
        }

        .cd-unit-box {
            flex: 1;
            max-width: 72px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(132, 183, 237, 0.2);
            border-radius: 10px;
            padding: 14px 6px 10px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cd-unit-box::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--biru-muda), transparent);
        }

        .cd-n {
            font-family: "Cinzel", serif;
            font-size: clamp(22px, 6vw, 30px);
            color: var(--biru-terang);
            font-weight: 700;
            display: block;
            line-height: 1;
        }

        .cd-u {
            font-size: 9px;
            color: rgba(255, 255, 255, 0.4);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 5px;
            display: block;
        }

        .cd-sep {
            font-family: "Cinzel", serif;
            font-size: 26px;
            color: var(--biru);
            line-height: 1;
            align-self: flex-start;
            margin-top: 12px;
        }

        /* ============================
   5. RUNDOWN
============================ */
        #rundown {
            background: #fff;
            padding: 56px 22px;
        }

        .rundown-list {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .rundown-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 15px 0;
            border-bottom: 1px solid rgba(132, 183, 237, 0.15);
        }

        .rundown-item:last-child {
            border-bottom: none;
        }

        .rundown-time {
            font-family: "Cinzel", serif;
            font-size: 12px;
            color: var(--biru-gelap);
            font-weight: 700;
            letter-spacing: 1px;
            white-space: nowrap;
            min-width: 65px;
            padding-top: 2px;
        }

        .rundown-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--biru);
            flex-shrink: 0;
            margin-top: 4px;
            position: relative;
            box-shadow: 0 0 8px rgba(132, 183, 237, 0.6);
        }

        .rundown-dot::after {
            content: '';
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translateX(-50%);
            width: 1px;
            height: calc(100% + 28px);
            background: linear-gradient(to bottom, var(--biru), transparent);
        }

        .rundown-item:last-child .rundown-dot::after {
            display: none;
        }

        .rundown-kegiatan {
            flex: 1;
        }

        .rundown-nama {
            font-family: "Cormorant Garamond", serif;
            font-size: clamp(14px, 4vw, 17px);
            color: var(--biru-tua);
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 2px;
        }

        .rundown-desc {
            font-size: 12px;
            color: var(--abu);
            line-height: 1.5;
        }

        .rundown-badge {
            padding: 2px 10px;
            border-radius: 50px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            background: rgba(132, 183, 237, 0.12);
            color: var(--biru-gelap);
            display: inline-block;
            margin-top: 3px;
        }

        /* ============================
   6. GEDUNG
============================ */
        #gedung {
            padding: 0;
            position: relative;
            overflow: hidden;
            background: var(--putih);
        }

        .gedung-img-wrap {
            position: relative;
        }

        .gedung-img-wrap img {
            width: 100%;
            display: block;
            object-fit: cover;
            max-height: 320px;
            filter: brightness(0.85);
        }

        .gedung-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px 22px 22px;
            background: linear-gradient(to top, var(--krem) 0%, transparent 100%);
        }

        .gedung-name {
            font-family: "Cinzel", serif;
            font-size: clamp(16px, 4.5vw, 22px);
            color: var(--biru-gelap);
            font-weight: 700;
            letter-spacing: 2px;
        }

        .gedung-sub {
            font-size: 12px;
            /* color: rgba(255, 255, 255, 0.55); */
            colo: var(--biru)
            margin-top: 4px;
            letter-spacing: 1px;
        }

        /* ============================
   7. MAPS
============================ */
        #maps {
            background: var(--krem);
            padding: 56px 22px;
        }

        .maps-frame {
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid rgba(132, 183, 237, 0.3);
            box-shadow: 0 10px 40px rgba(132, 183, 237, 0.15);
            aspect-ratio: 4/3;
        }

        .maps-frame iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
        }

        .maps-address {
            margin-top: 16px;
            padding: 14px 16px;
            background: #fff;
            border-radius: 10px;
            border-left: 3px solid var(--biru);
            display: flex;
            align-items: flex-start;
            gap: 12px;
            box-shadow: 0 4px 16px rgba(132, 183, 237, 0.12);
        }

        .maps-address-icon {
            font-size: 20px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .maps-address-name {
            font-family: "Cormorant Garamond", serif;
            font-size: 17px;
            color: var(--biru-tua);
            font-weight: 600;
            margin-bottom: 2px;
        }

        .maps-address-detail {
            font-size: 12px;
            color: var(--abu);
            line-height: 1.6;
        }

        .btn-maps-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 14px;
            padding: 12px 22px;
            background: linear-gradient(135deg, var(--biru-tua2), var(--biru-tua));
            color: var(--biru-terang);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            border-radius: 50px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-family: "Nunito", sans-serif;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-maps-link:hover {
            background: linear-gradient(135deg, var(--biru-tua), var(--biru-gelap));
            transform: translateY(-2px);
        }

        /* ============================
   8. TERIMA KASIH
============================ */
        #terima {
            background: linear-gradient(160deg, var(--biru-tua2) 0%, #0f2d58 60%, #0a1e3a 100%);
            padding: 60px 22px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        #terima::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(132, 183, 237, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .terima-arabic {
            font-family: "Cormorant Garamond", serif;
            font-size: clamp(22px, 6vw, 30px);
            color: var(--biru-muda);
            letter-spacing: 5px;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .terima-title {
            font-family: "Cinzel", serif;
            font-size: clamp(18px, 5vw, 24px);
            color: var(--putih);
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
        }

        .terima-text {
            font-family: "Cormorant Garamond", serif;
            font-size: clamp(15px, 4vw, 18px);
            color: rgba(255, 255, 255, 0.78);
            line-height: 1.9;
            font-style: italic;
            max-width: 370px;
            margin: 0 auto 24px;
            position: relative;
            z-index: 1;
            padding: 0 6px;
        }

        .ttd-box {
            display: inline-block;
            padding: 18px 28px;
            background: rgba(132, 183, 237, 0.08);
            border: 1px solid rgba(132, 183, 237, 0.25);
            border-radius: 10px;
            position: relative;
            z-index: 1;
        }

        .ttd-logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 1px solid rgba(201, 168, 76, 0.4);
            background: rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0 auto 10px;
        }

        .ttd-logo img {
            width: 90%;
            height: 90%;
            object-fit: contain;
            padding: 3px;
        }

        .ttd-dari {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.35);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .ttd-nama {
            font-family: "Cinzel", serif;
            font-size: clamp(13px, 4vw, 17px);
            color: var(--biru-terang);
            font-weight: 700;
            letter-spacing: 1px;
        }

        .minal {
            margin-top: 22px;
            position: relative;
            z-index: 1;
        }

        .minal-text {
            font-family: "Cormorant Garamond", serif;
            font-size: 18px;
            color: rgba(255, 255, 255, 0.45);
            letter-spacing: 4px;
            font-style: italic;
        }

        .minal-sub {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.25);
            margin-top: 5px;
            letter-spacing: 2px;
        }

        /* ============================
   9. FOOTER
============================ */
        #footer {
            background: #050f1e;
            padding: 32px 22px;
            text-align: center;
            border-top: 1px solid rgba(132, 183, 237, 0.1);
        }

        .footer-logos {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .footer-logo-sm {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(132, 183, 237, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .footer-logo-sm img {
            width: 90%;
            height: 90%;
            object-fit: contain;
            padding: 3px;
        }

        .footer-divider {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin-bottom: 16px;
        }

        .footer-divider::before,
        .footer-divider::after {
            content: '';
            flex: 1;
            max-width: 50px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(132, 183, 237, 0.3), transparent);
        }

        .footer-divider span {
            color: rgba(132, 183, 237, 0.4);
            font-size: 11px;
        }

        .footer-panitia {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.3);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .footer-org {
            font-family: "Cinzel", serif;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .footer-created {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.2);
            letter-spacing: 1.5px;
        }

        .footer-created span {
            color: rgba(132, 183, 237, 0.45);
            font-weight: 700;
        }

        .footer-copy {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.1);
            margin-top: 6px;
            letter-spacing: 1px;
        }

        /* ============================
   REVEAL & ANIM
============================ */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        @media(max-width:380px) {
            .waktu-grid {
                grid-template-columns: 1fr;
            }

            .logos-row {
                gap: 10px;
            }

            .logo-circle.sm {
                width: 56px;
                height: 56px;
            }

            .logo-circle.lg {
                width: 72px;
                height: 72px;
            }
        }
    </style>
</head>

<audio id="bgMusic" loop>
    <source src="{{ asset('assets/music/mars aisyiyah.mp3') }}" type="audio/mpeg">
</audio>

<body>

    <!-- 1. COVER -->
    <section id="cover">
        <div class="cover-inner">
            <div class="logos-row">
                <div class="logo-wrap">
                    <div class="logo-circle lg">
                        <img src="{{ asset('assets/img/logo_sarkies.png') }}" alt="Logo RSSA">
                    </div>
                    <div class="logo-name">RS Sarkies Aisyiyah</div>
                </div>
                <div class="logo-sep"></div>
                <div class="logo-wrap">
                    <div class="logo-circle lg">
                        <img src="{{ asset('assets/img/holding.png') }}" alt="Logo Holding RSA Group">
                    </div>
                    <div class="logo-name" style="color:rgba(255,255,255,0.7)">Holding RSA Group</div>
                </div>
                <div class="logo-sep"></div>
                <div class="logo-wrap">
                    <div class="logo-circle lg">
                        <img src="{{ asset('assets/img/logo_RSA.png') }}" alt="Logo RSA">
                    </div>
                    <div class="logo-name">RS Aisyiyah Kudus</div>
                </div>
            </div>

            <div class="ornament-row" style="opacity:0;animation:fadeUp 1s ease 0.1s forwards"><span>✦</span></div>
            <div class="arabic-cover">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</div>
            <div class="cover-tag">Mengundang Kehadiran</div>
            <div class="cover-title">Silaturahim<br>SYAWALAN</div>
            <div class="cover-sub">Holding RS Aisyiyah Group Kudus</div>
            <div class="cover-tahun">4 APRIL 2026 &nbsp;·&nbsp; KUDUS</div>

            <div class="kepada-box">
                <div class="kepada-label">Kepada Yang Terhormat</div>
                <div class="kepada-nama">Muhammad Abdul Wahab</div>
                <div class="kepada-sub">Keluarga Besar Holding RS Aisyiyah Group Kudus</div>
            </div>

            <a class="btn-buka" href="#inti" id=btnBuka>
                Buka Undangan &nbsp;↓
            </a>
        </div>
    </section>

    <!-- 2. HALAMAN INTI -->
    <section id="inti">
        <div class="section-inner">
            <div class="inti-logo-center reveal">
                <div class="logo-big-inti">
                    <img src="{{ asset('assets/img/holding.png') }}" alt="Holding RSA Group">
                </div>
            </div>
            <div class="inti-arabic reveal">مِنَ الْعَائِدِيْنَ وَالْفَائِزِيْنَ</div>
            <div class="divider reveal"><span>✦</span></div>
            <div class="inti-main-title reveal">Silaturahim<br>SYAWALAN</div>
            <div class="inti-sub reveal">Holding RS Aisyiyah Group Kudus</div>
            <div class="reveal" style="text-align:center">
                <div class="date-chip">📅 &nbsp; Sabtu, 4 April 2026</div>
            </div>
            <div class="divider reveal" style="margin-top:24px"><span>☽</span></div>
            <p class="reveal"
                style="text-align:center;font-family:'Cormorant Garamond',serif;font-size:clamp(15px,4vw,18px);color:var(--abu);line-height:1.95;font-style:italic;padding:0 8px">
                Dengan penuh rasa syukur dan kebahagiaan, kami mengundang seluruh keluarga besar Holding RS Aisyiyah
                Group Kudus untuk hadir bersama dalam acara yang penuh makna, kehangatan, dan keberkahan ini.
            </p>
        </div>
    </section>

    <!-- 3. SAMBUTAN & FOTO DIREKSI -->
    <section id="sambutan">
        <div class="section-inner">
            <div class="sambutan-logo reveal">
                <div class="logo-sambutan">
                    <img src="{{ asset('assets/img/holding.png') }}" alt="Holding RSA Group">
                </div>
            </div>
            <div class="divider gold reveal"><span>✦</span></div>
            <div class="sec-title white reveal">Sambutan Jajaran Direksi</div>

            <div class="sambutan-text reveal">
                Assalamu'alaikum Warahmatullahi Wabarakatuh.<br><br>
                Mewakili seluruh jajaran pimpinan <em>Holding RS Aisyiyah Group Kudus</em>, kami mengucapkan <em>Selamat
                    Hari Raya Idul Fitri 1447 H</em> — Minal 'Aidin wal Faizin, mohon maaf lahir dan batin.<br><br>
                Semoga momentum silaturahim ini senantiasa mempererat kebersamaan kita sebagai satu keluarga besar yang
                penuh kasih dan semangat dalam pelayanan.
            </div>

            <!-- Foto Direksi Group -->
            <div class="direksi-photo-wrap reveal">
                <img src="{{ asset('assets/img/direksi_dan_bod.png') }}"
                    alt="Jajaran Direksi Holding RS Aisyiyah Group">
            </div>
            <div class="direksi-caption reveal">
                <div class="direksi-caption-title">Jajaran Direksi</div>
                <div class="direksi-caption-sub">Holding RS Aisyiyah Group Kudus</div>
            </div>
        </div>
    </section>

    <!-- 4. WAKTU & TEMPAT + COUNTDOWN -->
    <section id="waktu">
        <div class="section-inner">
            <div class="sec-label reveal">Detail Acara</div>
            <div class="sec-title reveal">Waktu &amp; Tempat</div>
            <div class="divider reveal"><span>✦</span></div>

            <div class="waktu-grid reveal">
                <div class="waktu-card">
                    <span class="waktu-icon">📅</span>
                    <div class="waktu-label">Hari &amp; Tanggal</div>
                    <div class="waktu-val">Sabtu<br>4 April 2026</div>
                    <div class="waktu-detail">16 Syawal 1447 H</div>
                </div>
                <div class="waktu-card">
                    <span class="waktu-icon">🕗</span>
                    <div class="waktu-label">Waktu</div>
                    <div class="waktu-val">08.00 — 11.00</div>
                    <div class="waktu-detail">WIB · Mohon tepat waktu</div>
                </div>
                <div class="waktu-card">
                    <span class="waktu-icon">🏛️</span>
                    <div class="waktu-label">Gedung</div>
                    <div class="waktu-val">Crystal Building<br>UMKU</div>
                    <div class="waktu-detail">Universitas Muhammadiyah Kudus</div>
                </div>
                <div class="waktu-card">
                    <span class="waktu-icon">📍</span>
                    <div class="waktu-label">Alamat</div>
                    <div class="waktu-val">Jl. Ganesha I<br>Kudus</div>
                    <div class="waktu-detail">Jawa Tengah 59316</div>
                </div>
            </div>

            <div class="countdown-section reveal">
                <div class="cd-label">Menghitung Mundur Menuju Hari H</div>
                <div class="cd-boxes">
                    <div class="cd-unit-box"><span class="cd-n" id="cdH">00</span><span
                            class="cd-u">Hari</span></div>
                    <div class="cd-sep">:</div>
                    <div class="cd-unit-box"><span class="cd-n" id="cdJ">00</span><span
                            class="cd-u">Jam</span></div>
                    <div class="cd-sep">:</div>
                    <div class="cd-unit-box"><span class="cd-n" id="cdM">00</span><span
                            class="cd-u">Menit</span></div>
                    <div class="cd-sep">:</div>
                    <div class="cd-unit-box"><span class="cd-n" id="cdD">00</span><span
                            class="cd-u">Detik</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. RUNDOWN -->
    <section id="rundown">
        <div class="section-inner">
            <div class="sec-label reveal">Susunan Acara</div>
            <div class="sec-title reveal">Rundown Kegiatan</div>
            <div class="divider reveal"><span>✦</span></div>

            <div class="rundown-list">
                <div class="rundown-item reveal">
                    <div class="rundown-time">07.30 - 08.00</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Registrasi Undangan</div>
                        {{-- <div class="rundown-desc">Pendaftaran kehadiran dan penyambutan oleh panitia</div>
                        <span class="rundown-badge">Pra-Acara</span> --}}
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">08.00 - 08.30</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Pra Acara</div>
                        {{-- <div class="rundown-desc">MC, tilawah Al-Qur'an, dan lagu kebangsaan</div>
                        <span class="rundown-badge">Seremonial</span> --}}
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">08.30 - 08.40</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Pembukaan</div>
                        {{-- <div class="rundown-desc">Ucapan Idul Fitri dan arahan dari Direktur Utama Holding RSA Group
                        </div>
                        <span class="rundown-badge">Sambutan</span> --}}
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">08.40 - 08.45</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Pembacaan Ayat Suci Al-Quran</div>
                        {{-- <div class="rundown-desc">Hikmah Syawal: mempererat silaturahmi dan semangat baru</div>
                        <span class="rundown-badge">Religi</span> --}}
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">08.45 - 09.00 </div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Menyanyikan Lagu-lagu:</div>
                        <div class="rundown-desc">1. Indonesia Raya <br>
                        2. Sang Surya <br> 
                        3. Mars 'Aisyiyah</div>
                        {{-- <span class="rundown-badge">Inti</span> --}}
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">09.00 - 09.05</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Sambutan Direktur Holding RSA Group Kudus</div>
                        <div class="rundown-badge">dr. Hilal Ariadi, M.Kes, FISQua
                        </div>
                        {{-- <span class="rundown-badge">Hiburan</span> --}}
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">09.05 - 09.10</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Sambutan Ketua PDA Kabupaten Kudus</div>
                        <div class="rundown-badge">Eny Alifah Kurnia, S.Pd.,M.Pd.I</div>
                        {{-- <span class="rundown-badge">Penutup</span> --}}
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">09.10 - 09.15</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Sambutan Ketua PDM Kabupaten Kudus</div>
                        <div class="rundown-badge">KH. Noor Muslikhan, S.Sos</div>
                        {{-- <span class="rundown-badge">Selesai</span> --}}
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">09.15 - 10.20</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Tausiyah & Doa</div>
                        <div class="rundown-desc">Ketua Umum Pimpinan Pusat Aisyiyah</div>
                        <span class="rundown-badge">(Dr. apt. Salmah Orbayinah,  M.Kes)</span>
                    </div>
                </div>
                <div class="rundown-item reveal">
                    <div class="rundown-time">10.20 - 11.00</div>
                    <div class="rundown-dot"></div>
                    <div class="rundown-kegiatan">
                        <div class="rundown-nama">Ramah Tamah & Penutup</div>
                        {{-- <div class="rundown-desc"></div>
                        <span class="rundown-badge">(Dr. apt. Salmah Orbayinah,  M.Kes)</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. GEDUNG CRYSTAL BUILDING -->
    <section id="gedung" style="padding:0;">
        <div class="gedung-img-wrap">
            <img src="{{ asset('assets/img/Royal_building_UMKU.png') }}" alt="Crystal Building UMKU">
            <div class="gedung-overlay">
                <div class="gedung-name">Crystal Building UMKU</div>
                <div class="gedung-sub">Universitas Muhammadiyah Kudus &nbsp;·&nbsp; Kudus, Jawa Tengah</div>
            </div>
        </div>
    </section>

    <!-- 7. MAPS -->
    <section id="maps">
        <div class="section-inner">
            <div class="sec-label reveal">Lokasi Acara</div>
            <div class="sec-title reveal">Temukan Kami di Sini</div>
            <div class="divider reveal"><span>📍</span></div>

            <div class="maps-frame reveal">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.371!2d110.834!3d-6.802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e709ab7b3c33333%3A0x1234567890abcdef!2sCrystal%20Building%20UMKU!5e0!3m2!1sid!2sid!4v1680000000000!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="maps-address reveal">
                <div class="maps-address-icon">🏛️</div>
                <div>
                    <div class="maps-address-name">Crystal Building UMKU</div>
                    <div class="maps-address-detail">Universitas Muhammadiyah Kudus<br>Jl. Ganesha I No.1, Purwosari,
                        Kec. Kota Kudus<br>Kabupaten Kudus, Jawa Tengah 59316</div>
                </div>
            </div>

            <a class="btn-maps-link reveal" href="https://maps.app.goo.gl/2qbqu6xdzLYdo2YE6" target="_blank">
                🗺️ &nbsp; Buka di Google Maps
            </a>
        </div>
    </section>

    <!-- 8. UCAPAN TERIMA KASIH -->
    <section id="terima">
        <div class="section-inner">
            <div class="divider gold reveal"><span>✦</span></div>
            <div class="terima-arabic reveal">تَقَبَّلَ اللهُ مِنَّا وَمِنْكُمْ</div>
            <div class="terima-title reveal">Terima Kasih atas<br>Kehadiran Anda</div>
            <div class="divider reveal"><span style="color:var(--biru-muda)">☽</span></div>
            <div class="terima-text reveal">
                Kehadiran Bapak/Ibu/Saudara/i adalah kehormatan terbesar bagi kami. Semoga silaturahmi yang terjalin
                hari ini membawa keberkahan, mempererat persaudaraan, dan menjadi ladang pahala bagi kita semua dalam
                naungan ridho Allah SWT.
            </div>
            <div class="ttd-box reveal">
                <div class="ttd-logo">
                    <img src="{{ asset('assets/img/holding.png') }}" alt="Holding RSA Group">
                </div>
                <div class="ttd-dari">Dengan penuh rasa hormat,</div>
                <div class="ttd-nama">Keluarga Besar<br>Holding RS Aisyiyah Group Kudus</div>
            </div>
            <div class="minal reveal">
                <div class="minal-text">Minal 'Aidin wal Faizin</div>
                <div class="minal-sub">Mohon Maaf Lahir dan Batin · 1447 H</div>
            </div>
        </div>
    </section>

    <!-- 9. FOOTER -->
    <footer id="footer">
        <div class="footer-logos">
            <div class="footer-logo-sm"><img src="{{ asset('assets/img/rssarkies/Logo RSSA white logo.png') }}" alt="RSSA"></div>
            <div class="footer-logo-sm" style="width:52px;height:52px;border-color:rgba(201,168,76,0.25)"><img
                    src="{{ asset('assets/img/holding.png') }}" alt="Holding"></div>
            <div class="footer-logo-sm"><img src="{{ asset('assets/img/rssarkies/Logo RSA white.png') }}" alt="RSA"></div>
        </div>
        <div class="footer-divider"><span>✦</span></div>
        <div class="footer-panitia">Panitia Pelaksana</div>
        <div class="footer-org">Silaturahim Syawalan Holding RSA Group 2026</div>
        <div class="footer-divider" style="margin-bottom:12px"><span>·</span></div>
        <div class="footer-created">Created with ❤️ by &nbsp;<span>IT RS Sarkies Aisyiyah Kudus</span></div>
        <div class="footer-copy">&copy; 2026 Holding RS Aisyiyah Group Kudus · All Rights Reserved</div>
    </footer>

    <script>
        const music = document.getElementById('bgMusic');
        const btn = document.getElementById('btnBuka');

        btn.addEventListener('click', () => {
            music.volume = 0;
            music.play();

            let vol = 0;
            const fade = setInterval(() => {
                if (vol < 1) {
                    vol += 0.05;
                    music.volume = vol;
                } else {
                    clearInterval(fade);
                }
            }, 200);
        });
        /* COUNTDOWN */
        const target = new Date('2026-04-04T08:00:00');

        function tick() {
            const now = new Date(),
                diff = target - now;
            if (diff <= 0) {
                ['cdH', 'cdJ', 'cdM', 'cdD'].forEach(id => document.getElementById(id).textContent = '00');
                return;
            }
            document.getElementById('cdH').textContent = String(Math.floor(diff / 86400000)).padStart(2, '0');
            document.getElementById('cdJ').textContent = String(Math.floor((diff % 86400000) / 3600000)).padStart(2, '0');
            document.getElementById('cdM').textContent = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
            document.getElementById('cdD').textContent = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
        }
        tick();
        setInterval(tick, 1000);

        /* REVEAL */
        const obs = new IntersectionObserver((entries) => {
            entries.forEach((e, i) => {
                if (e.isIntersecting) {
                    setTimeout(() => e.target.classList.add('show'), i * 65);
                    obs.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px -20px 0px'
        });
        document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

        /* SMOOTH SCROLL */
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                const t = document.querySelector(a.getAttribute('href'));
                if (t) {
                    e.preventDefault();
                    t.scrollIntoView({
                        behavior: 'smooth'
                    })
                }
            });
        });
    </script>
</body>

</html>
