<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background-image: url('{{asset("assets/BackgroundMockupAnjungan.png")}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Form Container - Responsive */
        .form-container {
            width: min(90%, 800px);
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: clamp(20px, 4vw, 40px);
            margin: 20px auto;
            border: 3px solid rgba(0, 0, 0, 0.3);
            border-radius: clamp(20px, 5vw, 60px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .container {
            width: min(90%, 1000px);
            padding: clamp(20px, 5vw, 80px);
            margin: 0 auto;
            border-radius: 10px;
        }

        ul {
            line-height: 1.75;
            padding-left: 20px;
        }

        h1 {
            text-align: center;
            font-size: clamp(20px, 4vw, 28px);
            margin-bottom: 15px;
            color: #333;
        }

        h3 {
            text-align: center;
            margin-bottom: 25px;
            font-size: clamp(16px, 3vw, 20px);
            color: #444;
        }

        .form-group {
            margin: clamp(15px, 3vw, 25px) 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            font-size: clamp(14px, 2.5vw, 16px);
        }

        .form-group input {
            width: 100%;
            padding: clamp(8px, 2vw, 12px);
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: clamp(14px, 2.5vw, 16px);
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #ff9900;
            box-shadow: 0 0 0 3px rgba(255, 153, 0, 0.1);
        }

        .form-group input[type="number"] {
            width: min(100px, 30%);
        }

        /* Header - Fully Responsive */
        .header {
            text-align: center;
            padding: clamp(15px, 3vw, 25px);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 20px;
        }

        .header h2 {
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: clamp(16px, 4vw, 28px);
            font-weight: 700;
            color: #333;
            text-shadow:
                2px 2px 0 white,
                -1px 1px 0 white,
                1px -1px 0 white,
                -1px -1px 0 white,
                3px 3px 6px rgba(0, 0, 0, 0.2);
            line-height: 1.3;
            max-width: 95%;
            margin: 0 auto;
        }

        /* Page Content - Responsive Video Container */
        .page-content {
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: center;
            /* padding: clamp(10px, 3vw, 10px); */
            min-height: 60vh;
        }

        /* Responsive Video Container */
        .video-wrapper {
            position: relative;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            border: 3px solid rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background: rgba(0, 0, 0, 0.1);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
        }

        /* Fallback for non-iframe content */
        .video-container p {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: clamp(16px, 3vw, 24px);
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        /* Button Container - Horizontal Scroll */
        .button-container {
            display: flex;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            gap: clamp(10px, 2vw, 20px);
            padding: clamp(15px, 3vw, 25px);
            max-width: 95%;
            margin: 0 auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 153, 0, 0.5) transparent;
            position: relative;
            bottom: 20px;
        }

        .button-container a {
            padding: 30px 120px;
            font-size: 20px;
        }

        .button-container::-webkit-scrollbar {
            height: 6px;
        }

        .button-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .button-container::-webkit-scrollbar-thumb {
            background: rgba(255, 153, 0, 0.6);
            border-radius: 3px;
        }

        .button-container::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 153, 0, 0.8);
        }

        .scroll-hint {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            animation: bounceLeft 1.5s infinite;
            font-size: clamp(18px, 3vw, 24px);
            color: rgba(255, 255, 255, 0.8);
            z-index: 2;
            pointer-events: none;
        }

        .lapak-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: clamp(20px, 4vw, 35px);
            padding: clamp(20px, 4vw, 50px);
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Enhanced Lapak Card */
        .lapak-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 153, 0, 0.2);
            border-radius: 25px;
            padding: 0;
            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.08),
                0 4px 12px rgba(255, 153, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transform: translateY(0);
        }

        .lapak-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ff9900, #ff8c00, #ffaa00);
            border-radius: 25px 25px 0 0;
            z-index: 1;
        }

        .lapak-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.15),
                0 8px 30px rgba(255, 153, 0, 0.25),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border-color: rgba(255, 153, 0, 0.4);
        }

        /* Enhanced Image Placeholder */
        .lapak-image-placeholder {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #ff9900, #ff8c00, #ffaa00);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 25px 25px 0 0;
            position: relative;
            overflow: hidden;
        }

        .lapak-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 25px 25px 0 0;
            transition: transform 0.4s ease;
        }

        .lapak-card:hover .lapak-image {
            transform: scale(1.05);
        }

        .no-image-placeholder {
            text-align: center;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .no-image-placeholder span {
            font-size: clamp(40px, 8vw, 60px);
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.3));
        }

        .no-image-placeholder p {
            font-size: clamp(14px, 3vw, 18px);
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            margin: 0;
        }

        /* Enhanced Card Content */
        .lapak-card-content {
            padding: clamp(25px, 5vw, 30px);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .lapak-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 5px;
        }

        .lapak-nama {
            font-size: clamp(18px, 4vw, 24px);
            font-weight: 700;
            color: #333;
            margin: 0;
            line-height: 1.3;
            flex: 1;
            text-align: left;
            background: linear-gradient(135deg, #333, #555);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .lapak-kategori {
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: clamp(11px, 2.5vw, 13px);
            font-weight: 600;
            white-space: nowrap;
            box-shadow: 0 4px 12px rgba(255, 153, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .lapak-kategori::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .lapak-card:hover .lapak-kategori::before {
            left: 100%;
        }

        .lapak-deskripsi {
            color: #666;
            font-size: clamp(14px, 3vw, 16px);
            line-height: 1.6;
            margin: 0;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-align: left;
            min-height: 48px;
        }

        .lapak-harga {
            font-size: clamp(22px, 5vw, 28px);
            font-weight: 800;
            background: linear-gradient(135deg, #ff9900, #ff6600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 5px 0;
            text-shadow: 0 2px 4px rgba(255, 153, 0, 0.2);
            position: relative;
        }

        /* Enhanced Actions */
        .lapak-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: auto;
            padding-top: 10px;
        }

        .lapak-btn {
            flex: 1;
            min-width: 110px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 14px 20px;
            border: none;
            border-radius: 15px;
            font-weight: 600;
            font-size: clamp(13px, 2.8vw, 15px);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .lapak-btn span {
            font-size: 16px;
            transition: transform 0.3s ease;
        }

        .lapak-btn:hover span {
            transform: scale(1.2);
        }

        .lapak-btn-detail {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            border: 2px solid transparent;
        }

        .lapak-btn-detail:hover {
            background: linear-gradient(135deg, #5f4fcf, #8b7ff0);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 92, 231, 0.4);
        }

        .lapak-btn-primary {
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            border: 2px solid transparent;
        }

        .lapak-btn-primary:hover {
            background: linear-gradient(135deg, #ff8c00, #ff7700);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 153, 0, 0.4);
        }

        .lapak-btn-secondary {
            background: rgba(255, 255, 255, 0.9);
            color: #ff9900;
            border: 2px solid #ff9900;
        }

        .lapak-btn-secondary:hover {
            background: #ff9900;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 153, 0, 0.3);
        }

        /* Enhanced Owner */
        .lapak-owner {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid rgba(255, 153, 0, 0.15);
            font-size: clamp(13px, 2.5vw, 15px);
            color: #666;
            font-weight: 500;
        }

        .lapak-owner-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(255, 153, 0, 0.3);
        }

        /* Enhanced Empty State */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: clamp(60px, 10vw, 100px);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .empty-state-icon {
            font-size: clamp(60px, 12vw, 100px);
            filter: drop-shadow(4px 4px 8px rgba(0, 0, 0, 0.3));
            animation: bounce 2s infinite;
        }

        .empty-state h2 {
            font-size: clamp(24px, 6vw, 36px);
            margin: 0;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
            font-weight: 700;
        }

        .empty-state p {
            font-size: clamp(16px, 3.5vw, 20px);
            opacity: 0.9;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            margin: 0;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        /* Modal Styles */
        .modal {
            display: flex;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            animation: modalFadeIn 0.3s ease-out;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-content {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.95));
            backdrop-filter: blur(20px);
            margin: auto;
            padding: 0;
            border: 3px solid rgba(255, 153, 0, 0.3);
            border-radius: 25px;
            width: min(90%, 600px);
            max-height: 90vh;
            overflow-y: auto;
            box-shadow:
                0 25px 80px rgba(0, 0, 0, 0.2),
                0 10px 40px rgba(255, 153, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            animation: modalSlideIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ff9900, #ff8c00, #ffaa00);
            border-radius: 25px 25px 0 0;
            z-index: 1;
        }

        .modal-header {
            padding: 30px 30px 20px;
            border-bottom: 2px solid rgba(255, 153, 0, 0.1);
            position: relative;
            background: linear-gradient(135deg, rgba(255, 153, 0, 0.05), rgba(255, 140, 0, 0.02));
        }

        .modal-header h2 {
            margin: 0;
            font-size: clamp(22px, 5vw, 28px);
            font-weight: 700;
            color: #333;
            background: linear-gradient(135deg, #333, #555);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
        }

        .close {
            color: #aaa;
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 32px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .close:hover,
        .close:focus {
            color: #ff9900;
            background: rgba(255, 153, 0, 0.1);
            transform: scale(1.1);
        }

        .modal-body {
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .modal-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            margin-bottom: 10px;
        }

        .modal-no-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            margin-bottom: 10px;
            box-shadow: 0 10px 30px rgba(255, 153, 0, 0.3);
        }

        .modal-no-image span {
            font-size: 60px;
            margin-bottom: 10px;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.3));
        }

        .modal-no-image p {
            font-size: 18px;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            margin: 0;
        }

        .modal-info {
            display: grid;
            gap: 15px;
        }

        .modal-info-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .modal-info-label {
            font-weight: 700;
            color: #ff9900;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .modal-info-value {
            font-size: 16px;
            color: #333;
            line-height: 1.5;
        }

        .modal-info-value.price {
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(135deg, #ff9900, #ff6600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .modal-info-value.kategori {
            display: inline-block;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(255, 153, 0, 0.3);
            width: fit-content;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid rgba(255, 153, 0, 0.1);
        }

        .modal-btn {
            flex: 1;
            min-width: 140px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 16px 24px;
            border: none;
            border-radius: 15px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-btn span {
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .modal-btn:hover span {
            transform: scale(1.2);
        }

        .modal-btn-primary {
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
        }

        .modal-btn-primary:hover {
            background: linear-gradient(135deg, #ff8c00, #ff7700);
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 153, 0, 0.4);
        }

        .modal-btn-secondary {
            background: rgba(255, 255, 255, 0.9);
            color: #ff9900;
            border: 2px solid #ff9900;
        }

        .modal-btn-secondary:hover {
            background: #ff9900;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 153, 0, 0.3);
        }

        .modal-owner {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: rgba(255, 153, 0, 0.05);
            border-radius: 15px;
            border: 2px solid rgba(255, 153, 0, 0.1);
            margin-top: 10px;
        }

        .modal-owner-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(255, 153, 0, 0.3);
        }

        .modal-owner span {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Mobile Optimizations */
        @media (max-width: 768px) {
            .lapak-container {
                grid-template-columns: 1fr;
                padding: 15px;
                gap: 25px;
            }

            .lapak-card-content {
                padding: 20px;
            }

            .lapak-image,
            .lapak-image-placeholder {
                height: 200px;
            }

            .lapak-actions {
                flex-direction: column;
            }

            .lapak-btn {
                min-width: auto;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .modal-header,
            .modal-body {
                padding: 20px;
            }

            .modal-actions {
                flex-direction: column;
            }

            .modal-btn {
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
            .lapak-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .lapak-kategori {
                align-self: flex-end;
            }

            .lapak-image,
            .lapak-image-placeholder {
                height: 180px;
            }

            .modal-image,
            .modal-no-image {
                height: 200px;
            }
        }

        @keyframes bounceLeft {

            0%,
            100% {
                transform: translateY(-50%) translateX(0);
                opacity: 0.6;
            }

            50% {
                transform: translateY(-50%) translateX(-8px);
                opacity: 1;
            }
        }

        /* Responsive Buttons */
        .button {
            flex: 0 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            padding: 10px 100px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: clamp(12px, 2.5vw, 16px);
            line-height: 1.3;
            letter-spacing: 0.5px;
            min-height: clamp(40px, 8vw, 50px);
            max-width: clamp(100px, 20vw, 140px);
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 153, 0, 0.3);
        }

        .button:hover {
            background: linear-gradient(135deg, #ff8c00, #ff9900);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 153, 0, 0.4);
        }

        /* Agenda Container */
        .agenda-container {
            display: flex;
            overflow-x: auto;
            justify-content: center;
            align-items: flex-end;
            padding: clamp(15px, 3vw, 25px);
            gap: clamp(15px, 3vw, 30px);
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 153, 0, 0.5) transparent;
        }

        .agenda-container .button {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 2px solid #ff9900;
            color: white;
        }

        .agenda-container .button.active {
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
        }

        /* Footer Section */
        .footer-tentang-desa {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: clamp(150px, 25vh, 200px);
            color: white;
            text-align: center;
            padding: clamp(20px, 4vw, 40px);
        }

        .footer-button {
            display: flex;
            opacity: 0.7;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            padding: clamp(8px, 2vw, 12px) clamp(20px, 4vw, 35px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: clamp(12px, 2.5vw, 16px);
            line-height: 1.3;
            letter-spacing: 0.5px;
            min-height: clamp(40px, 8vw, 50px);
            max-width: clamp(100px, 20vw, 140px);
            transition: all 0.3s ease;
        }

        .footer-button.active {
            opacity: 1;
            box-shadow: 0 4px 15px rgba(255, 153, 0, 0.4);
        }

        .button-container-tentang-desa {
            display: flex;
            overflow-x: auto;
            align-items: end;
            justify-content: space-between;
            padding: clamp(15px, 3vw, 25px) 0;
            gap: clamp(15px, 3vw, 25px);
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 153, 0, 0.5) transparent;
        }

        .back-button {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            padding: clamp(15px, 3vw, 25px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: clamp(14px, 3vw, 18px);
            line-height: 1.3;
            letter-spacing: 0.5px;
            min-height: clamp(80px, 15vw, 120px);
            max-width: clamp(140px, 25vw, 200px);
            width: 100%;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(255, 153, 0, 0.3);
        }

        .back-button:hover {
            background: linear-gradient(135deg, #ff8c00, #ff9900);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 153, 0, 0.4);
        }

        .footer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: clamp(120px, 20vh, 150px);
            color: white;
            text-align: center;
            padding-bottom: 60px;
        }

        .footer h3 {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin-bottom: clamp(15px, 3vw, 25px);
            font-size: clamp(16px, 3vw, 20px);
            text-shadow:
                2px 2px 0 rgba(255, 255, 255, 0.8),
                -1px 1px 0 rgba(255, 255, 255, 0.8),
                1px -1px 0 rgba(255, 255, 255, 0.8),
                -1px -1px 0 rgba(255, 255, 255, 0.8),
                3px 3px 6px rgba(0, 0, 0, 0.3);
        }

        .credit {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: clamp(25px, 5vw, 35px);
            font-size: clamp(10px, 2vw, 12px);
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            z-index: 1000;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Mobile Specific Adjustments */
        @media (max-width: 768px) {
            body {
                background-attachment: scroll;
            }

            .header h2 {
                font-size: clamp(14px, 5vw, 22px);
                line-height: 1.4;
            }

            .page-content {
                padding: 15px;
                min-height: 50vh;
            }

            .video-container {
                border-width: 2px;
                border-radius: 10px;
            }

            .button-container {
                gap: 12px;
                padding: 15px 10px;
            }

            .button {
                min-width: 90px;
                font-size: 12px;
                padding: 10px 15px;
            }

            .agenda-container {
                gap: 15px;
                padding: 15px 10px;
            }

            .footer {
                padding-bottom: 50px;
                /* Space for credit bar */
            }
        }

        /* Small Mobile */
        @media (max-width: 480px) {
            .header {
                padding: 10px 5px;
            }

            .header h2 {
                font-size: clamp(12px, 6vw, 18px);
            }

            .page-content {
                padding: 10px;
            }

            .button-container {
                padding: 10px 5px;
                gap: 8px;
            }

            .button {
                min-width: 80px;
                font-size: 11px;
                padding: 8px 12px;
                min-height: 35px;
            }

            .back-button {
                font-size: 12px;
                min-height: 70px;
                max-width: 120px;
            }
        }

        /* Large Desktop */
        @media (min-width: 1400px) {
            .video-container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .button {
                max-width: 160px;
                font-size: 18px;
            }
        }

        /* Landscape Mobile */
        @media (max-height: 500px) and (orientation: landscape) {
            .header {
                padding: 8px;
            }

            .header h2 {
                font-size: 16px;
            }

            .page-content {
                min-height: 40vh;
                padding: 10px;
            }

            .footer {
                min-height: 80px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>
            @yield('header')
        </h2>
    </div>

    <div class="page-content">
        @yield('content')
    </div>

    @yield('form-container')
    @yield('back-button')
    @yield('footer')

    <div class="credit">
        <p>&copy; 2025 Trisna Wahyu Mukti, Raihan Darmawan Pringgodigdo, Fakultas Ilmu Komputer
            Universitas Pembangunan Nasional "Veteran" Jakarta</p>
    </div>
</body>

</html>