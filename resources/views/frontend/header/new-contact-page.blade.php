@extends('frontend-layouts.app')

@push('styles')
    <style>
        /* Hide the old global header and footer for the new page */
        .main-header,
        .main-footer {
            display: none !important;
        }

        .znw-contact-wrapper {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #fcfbfe;
            padding: 2.5rem 1rem;
        }

        .znw-contact-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 2.5rem;
        }

        /* Left Side */
        .znw-contact-left {
            flex: 1;
            min-width: 300px;
            animation: znwFadeUp 0.6s ease-out forwards;
        }

        .znw-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #f3efff;
            color: #6d28d9;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .znw-contact-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1a1530;
            line-height: 1.3;
            margin-bottom: 1.5rem;
            letter-spacing: -0.5px;
        }

        .znw-text-purple {
            color: #6d28d9;
        }

        .znw-text-gradient {
            background: linear-gradient(90deg, #db2777, #ea580c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .znw-contact-desc {
            font-size: 1.05rem;
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 3rem;
            font-weight: 500;
        }

        .znw-subheading {
            font-size: 1.15rem;
            font-weight: 700;
            color: #1a1530;
            margin-bottom: 1.5rem;
        }

        /* Contact Cards */
        .znw-contact-cards {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .znw-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            border: 1px solid #f9fafb;
            transition: transform 0.3s ease;
        }

        .znw-card:hover {
            transform: translateY(-2px);
        }

        .znw-icon-box {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .znw-icon-whatsapp {
            background: #dcfce7;
            color: #22c55e;
        }

        .znw-icon-phone {
            background: #f3efff;
            color: #6d28d9;
        }

        .znw-icon-email {
            background: #ffedd5;
            color: #f97316;
        }

        .znw-icon-box svg {
            width: 26px;
            height: 26px;
        }

        .znw-card-content {
            flex: 1;
        }

        .znw-card-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1a1530;
            margin: 0 0 0.3rem 0;
        }

        .znw-card-text {
            font-size: 0.85rem;
            color: #6b7280;
            margin: 0;
            line-height: 1.4;
            font-weight: 500;
        }

        .znw-card-btn {
            padding: 0.5rem 1.25rem;
            border-radius: 5px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .znw-btn-whatsapp {
            background: #ffffff;
            color: #16a34a;
            border: 1px solid #86efac;
        }

        .znw-btn-whatsapp:hover {
            background: #f0fdf4;
        }

        .znw-btn-phone {
            background: #f3efff;
            color: #6d28d9;
            border: 1px solid #ddd6fe;
        }

        .znw-btn-phone:hover {
            background: #ede9fe;
        }

        .znw-btn-email {
            background: #fff7ed;
            color: #ea580c;
            border: 1px solid #fed7aa;
        }

        .znw-btn-email:hover {
            background: #ffedd5;
        }

        /* Social Icons */
        .znw-socials {
            display: flex;
            gap: 1rem;
        }

        @keyframes bubblePop {
            0% {
                transform: scale(1) translateY(0);
            }

            30% {
                transform: scale(1.15) translateY(-5px);
            }

            50% {
                transform: scale(0.95) translateY(2px);
            }

            70% {
                transform: scale(1.1) translateY(-2px);
            }

            100% {
                transform: scale(1.1) translateY(-2px);
            }
        }

        .znw-social-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-decoration: none;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .znw-social-icon:hover {
            animation: bubblePop 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
            color: #ffffff;
        }

        .znw-social-facebook {
            background: #1877f2;
        }

        .znw-social-x {
            background: #000000;
        }

        .znw-social-pinterest {
            background: #E60023;
        }

        .znw-social-instagram {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        }

        .znw-social-youtube {
            background: #FF0000;
        }

        /* Right Side - Form */
        .znw-contact-right {
            flex: 1;
            min-width: 350px;
            background: #ffffff;
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
            animation: znwFadeUp 0.6s ease-out 0.2s forwards;
            opacity: 0;
            /* for animation */
        }

        @keyframes znwFadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .znw-form-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: #1a1530;
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
        }

        .znw-form-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            height: 3px;
            width: 45px;
            background: linear-gradient(90deg, #6d28d9, #ea580c);
            border-radius: 2px;
        }

        .znw-form-group {
            margin-bottom: 1.25rem;
        }

        .znw-form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .znw-form-label span {
            color: #ef4444;
        }

        .znw-form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #f3f4f6;
            border-radius: 8px;
            font-size: 0.9rem;
            color: #1f2937;
            background: #ffffff;
            transition: all 0.3s ease;
            outline: none;
            font-family: inherit;
        }

        .znw-form-control:focus {
            border-color: #6d28d9;
            box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.1);
        }

        .znw-form-control::placeholder {
            color: #9ca3af;
        }

        select.znw-form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2em;
        }

        textarea.znw-form-control {
            resize: vertical;
            min-height: 120px;
        }

        .znw-submit-btn {
            width: 100%;
            background: #5b21b6;
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background 0.3s ease;
            margin-top: 1rem;
        }

        .znw-submit-btn:hover {
            background: #4c1d95;
        }

        .znw-secure-text {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            font-size: 0.8rem;
            font-weight: 500;
            color: #6b7280;
        }

        .znw-secure-text svg {
            color: #10b981;
            width: 16px;
            height: 16px;
        }

        @media (max-width: 992px) {
            .znw-contact-container {
                flex-direction: column;
            }

            .znw-contact-right {
                padding: 2rem;
            }
        }

        @media (max-width: 576px) {
            .znw-card {
                display: grid;
                grid-template-columns: auto 1fr;
                gap: 0.5rem 1rem;
                padding: 1.25rem;
                align-items: start;
                text-align: left;
            }

            .znw-icon-box {
                grid-column: 1;
                grid-row: 1;
                width: 45px;
                height: 45px;
            }

            .znw-icon-box svg {
                width: 22px;
                height: 22px;
            }

            .znw-card-content {
                grid-column: 2;
                grid-row: 1;
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
            }

            .znw-card-title {
                font-size: 1rem;
                margin-top: 0.25rem;
            }

            .znw-card-text {
                font-size: 0.85rem;
                line-height: 1.4;
            }

            .znw-card-btn {
                grid-column: 2;
                grid-row: 2;
                justify-self: flex-start;
                margin-top: 0.25rem;
                padding: 0.5rem 0.75rem;
                font-size: 0.8rem;
                white-space: normal;
                word-break: break-all;
            }

            .znw-contact-title {
                font-size: 1.8rem;
            }

            .znw-contact-right {
                padding: 1.5rem;
            }
        }

        /* Map Section */
        .znw-map-section {
            background-color: #fcfbfe;
            text-align: center;
        }

        .znw-map-header {
            margin-bottom: 2rem;
        }

        .znw-map-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1a1530;
            margin: 0;
        }

        .znw-map-line {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #6d28d9, #ea580c);
            margin: 0.5rem auto 0 auto;
            border-radius: 2px;
        }

        .znw-map-container {
            max-width: 100%;
            margin: 0 auto;
            height: 550px;
            border-radius: 0;
            overflow: hidden;
            position: relative;
            box-shadow: none;
            border: none;
            border-top: 1px solid #f3f4f6;
            animation: znwFadeUp 0.6s ease-out forwards;
        }

        .znw-map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            filter: hue-rotate(10deg) saturate(1.2);
        }

        .znw-map-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
            /* allows clicking through overlay if needed, but we intercept below */
        }

        .znw-map-card {
            position: absolute;
            top: 50%;
            left: max(3rem, calc((100vw - 1200px) / 2 + 1rem));
            transform: translateY(-50%);
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            z-index: 2;
            width: 320px;
            text-align: left;
        }

        .znw-map-card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .znw-map-icon {
            width: 40px;
            height: 40px;
            background: #f3efff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6d28d9;
        }

        .znw-map-card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a1530;
            margin: 0;
        }

        .znw-map-card-address {
            font-size: 0.95rem;
            color: #6b7280;
            line-height: 1.5;
            margin: 0 0 1.5rem 0;
        }

        .znw-map-direction {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #6d28d9;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .znw-map-direction:hover {
            color: #4c1d95;
        }

        .znw-map-direction svg {
            width: 18px;
            height: 18px;
            transition: transform 0.3s ease;
        }

        .znw-map-direction:hover svg {
            transform: translateX(3px);
        }

        /* Center Pin */
        .znw-map-center-pin {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }

        .znw-pin-wrapper {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            text-decoration: none;
            animation: bouncePin 2s infinite ease-in-out;
        }

        @keyframes bouncePin {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .znw-pin-tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(0px);
            background: #1a1530;
            color: #ffffff;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-weight: 600;
        }

        .znw-pin-tooltip span {
            display: block;
            font-size: 0.8rem;
            font-weight: 400;
            color: #d1d5db;
            margin-top: 0.2rem;
        }

        .znw-pin-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 6px;
            border-style: solid;
            border-color: #1a1530 transparent transparent transparent;
        }

        .znw-pin-wrapper:hover .znw-pin-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(-15px);
        }

        @media (max-width: 768px) {
            .znw-map-card {
                position: absolute;
                top: auto;
                bottom: 1.5rem;
                left: 50%;
                transform: translateX(-50%);
                width: calc(100% - 2rem);
                margin: 0;
            }

            .znw-map-container {
                height: 600px;
                display: block;
                background: transparent;
                box-shadow: none;
                border: none;
            }

            .znw-map-overlay {
                display: none;
            }

            .znw-map-container iframe {
                height: 100%;
                border-radius: 0;
            }

            .znw-map-center-pin {
                display: block;
            }
        }
    </style>
@endpush

@section('content')
    <div class="znw-contact-wrapper">
        <div class="znw-contact-container">

            <!-- Left Side -->
            <div class="znw-contact-left">
                <div class="znw-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" style="width: 16px; height: 16px;">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    Get In Touch
                </div>

                <h1 class="znw-contact-title">
                    We're Here to Help You<br>
                    <span class="znw-text-purple">Anytime,</span> <span class="znw-text-gradient">Anywhere!</span>
                </h1>

                <p class="znw-contact-desc">
                    Have a question or need assistance with your assignment? <br>
                    Fill out the form, and our support team will get back to you <br>
                    as soon as possible.
                </p>

                <h3 class="znw-subheading">In Case of Enquiry, Reach Us On</h3>

                <div class="znw-contact-cards">
                    <!-- WhatsApp -->
                    <div class="znw-card">
                        <div class="znw-icon-box znw-icon-whatsapp">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
                            </svg>
                        </div>
                        <div class="znw-card-content">
                            <h4 class="znw-card-title">WhatsApp Support</h4>
                            <p class="znw-card-text">Chat with us on WhatsApp for instant<br>assistance 24/7.</p>
                        </div>
                        <a href="https://wa.me/447300640066" target="_blank" class="znw-card-btn znw-btn-whatsapp">Chat Now
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width: 14px; height: 14px;">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                            </svg></a>
                    </div>

                    <!-- Phone -->
                    <div class="znw-card">
                        <div class="znw-icon-box znw-icon-phone">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </div>
                        <div class="znw-card-content">
                            <h4 class="znw-card-title">Phone Support</h4>
                            <p class="znw-card-text">Speak to our experts anytime.<br>We're here to help!</p>
                        </div>
                        <a href="tel:+447300640066" class="znw-card-btn znw-btn-phone">+44 7300 640066</a>
                    </div>

                    <!-- Email -->
                    <div class="znw-card">
                        <div class="znw-icon-box znw-icon-email">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="znw-card-content">
                            <h4 class="znw-card-title">Email Support</h4>
                            <p class="znw-card-text">Drop us an email and we'll<br>get back to you soon.</p>
                        </div>
                        <a href="mailto:support@assignmentinneed.com"
                            class="znw-card-btn znw-btn-email">support@assignmentinneed.com</a>
                    </div>
                </div>

                <h3 class="znw-subheading">Connect With Us</h3>
                <div class="znw-socials">
                    <a href="https://www.facebook.com/profile.php?id=61564613120071" target="_blank"
                        class="znw-social-icon znw-social-facebook">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="https://twitter.com/assignment_in" target="_blank" class="znw-social-icon znw-social-x">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/assignmentinneedofficial/" target="_blank"
                        class="znw-social-icon znw-social-instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" style="width: 20px; height: 20px;">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="https://in.pinterest.com/assignnmentinneed66/" target="_blank"
                        class="znw-social-icon znw-social-pinterest">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;">
                            <path
                                d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.168 0 7.41 2.967 7.41 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.367 18.592 0 12.017 0z" />
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/@assignmentinneed1169" target="_blank"
                        class="znw-social-icon znw-social-youtube">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;">
                            <path
                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.377.55a3.016 3.016 0 0 0-2.122 2.136C0 8.07 0 12 0 12s0 3.93.501 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.55 9.377.55 9.377.55s7.505 0 9.377-.55a3.016 3.016 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Side (Form) -->
            <div class="znw-contact-right">
                <h2 class="znw-form-title">Send Us an Enquiry</h2>

                @if(session('success'))
                    <div class="alert alert-success"
                        style="background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0; font-size: 0.9rem;">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger"
                        style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #fecaca; font-size: 0.9rem;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="countrycode" id="country_c" />

                    <div class="znw-form-group">
                        <label class="znw-form-label">Full Name <span>*</span></label>
                        <input type="text" name="name" class="znw-form-control" placeholder="Enter your full name" required>
                    </div>

                    <div class="znw-form-group">
                        <label class="znw-form-label">Email Address <span>*</span></label>
                        <input type="email" name="email" class="znw-form-control" placeholder="Enter your email address"
                            required>
                    </div>

                    <div class="znw-form-group">
                        <label class="znw-form-label">Phone Number</label>
                        <input type="tel" name="mobile" class="znw-form-control" placeholder="Enter your phone number">
                    </div>

                    <div class="znw-form-group">
                        <label class="znw-form-label">Subject <span>*</span></label>
                        <select name="subject" class="znw-form-control" required>
                            <option value="" disabled selected>Select a subject</option>
                            <option value="Assignment Help">Assignment Help</option>
                            <option value="Dissertation Help">Dissertation Help</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="znw-form-group">
                        <label class="znw-form-label">Inquiry Type <span>*</span></label>
                        <select name="inquiry_type" class="znw-form-control" required>
                            <option value="" disabled selected>Select inquiry type</option>
                            <option value="New Order">New Order</option>
                            <option value="Existing Order">Existing Order</option>
                            <option value="Payment Issue">Payment Issue</option>
                            <option value="Feedback">Feedback</option>
                        </select>
                    </div>

                    <div class="znw-form-group">
                        <label class="znw-form-label">Message <span>*</span></label>
                        <textarea name="message" class="znw-form-control" placeholder="Type your message here..."
                            required></textarea>
                    </div>

                    <button type="submit" class="znw-submit-btn">
                        Send Message
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" style="width: 18px; height: 18px;">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>

                    <div class="znw-secure-text">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z">
                            </path>
                        </svg>
                        Your information is 100% secure and confidential.
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="znw-map-section">
        <div class="znw-map-header">
            <h2 class="znw-map-title">Our Location</h2>
            <div class="znw-map-line"></div>
        </div>
        <div class="znw-map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2482.7214691459424!2d-0.14640108422964645!3d51.51834297963695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1680000000000"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <div class="znw-map-overlay"></div>

            <!-- Custom Card on the left -->
            <div class="znw-map-card">
                <div class="znw-map-card-header">
                    <div class="znw-map-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                    </div>
                    <h4 class="znw-map-card-title">Assignment In Need</h4>
                </div>
                <p class="znw-map-card-address">
                    77 Great Portland Street,<br>
                    London, W1W 6PQ, UK
                </p>
                <a href="https://www.google.com/maps/dir//77+Great+Portland+St,+London+W1W+6PQ,+UK" target="_blank"
                    class="znw-map-direction">
                    Get Directions
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>

            <!-- Center Custom Pin -->
            <div class="znw-map-center-pin">
                <a href="https://www.google.com/maps/dir//77+Great+Portland+St,+London+W1W+6PQ,+UK" target="_blank"
                    class="znw-pin-wrapper">
                    <svg viewBox="0 0 24 24" fill="#6d28d9"
                        style="width: 45px; height: 45px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));">
                        <path
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                    </svg>
                    <div class="znw-pin-tooltip">
                        Assignment In Need<br>
                        <span>77 Great Portland Street, London, W1W 6PQ, UK</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

<script>
    function initContactFormRestrictions() {
        const form = document.querySelector('.znw-contact-right form');
        if (form) {
            const bindFilter = function(inputEl, regex) {
                if (!inputEl) return;
                const filter = function() {
                    this.value = this.value.replace(regex, '');
                };
                inputEl.addEventListener('input', filter);
                inputEl.addEventListener('keyup', filter);
                inputEl.addEventListener('change', filter);
                inputEl.addEventListener('paste', function() {
                    setTimeout(() => { this.value = this.value.replace(regex, ''); }, 0);
                });
            };

            // 1. Full Name: Only allow letters and spaces
            bindFilter(form.querySelector('input[name="name"]'), /[^a-zA-Z\s]/g);

            // 2. Email Address: Only allow standard email characters
            bindFilter(form.querySelector('input[name="email"]'), /[^a-zA-Z0-9@._+-]/g);

            // 3. Phone Number: Only allow digits
            bindFilter(form.querySelector('input[name="mobile"]'), /[^0-9]/g);

            // 4. Message: Block HTML/scripting and other dangerous special characters (< > / ? ; : ' " \ etc.)
            bindFilter(form.querySelector('textarea[name="message"]'), /[<>\/?[\]{}|\\;:'"`~^+=*]/g);
        } else {
            setTimeout(initContactFormRestrictions, 100);
        }
    }
    initContactFormRestrictions();
</script>

@endsection