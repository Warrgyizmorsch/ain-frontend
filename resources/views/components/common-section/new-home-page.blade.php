@extends('frontend-layouts.app')
@section('content')
    @props(['title' => 'Assignment Help UK That Helps You', 'subtitle' => 'Score Higher Grades'])

    <style>
        /* Hide the old global header on the new home page */
        .main-header {
            display: none !important;
        }
    </style>

    <section class="znh-new-bg-hero">
        <div class="znh-new-container-section">
            <div class="znh-new-hero-content">
                <!-- Left Content Column -->
                <div class="znh-new-content-column">
                    <div class="znh-rating-badge">
                        <div class="znh-znh-stars">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="znh-star">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <svg viewBox="0 0 24 24" fill="currentColor" class="znh-star">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <svg viewBox="0 0 24 24" fill="currentColor" class="znh-star">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <svg viewBox="0 0 24 24" fill="currentColor" class="znh-star">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <svg viewBox="0 0 24 24" fill="currentColor" class="znh-star">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                        </div>
                        <span>Rated 4.9/5 by 25,000+ UK Students</span>
                    </div>

                    <h1 class="znh-new-main-heading">
                        {!! str_replace(' UK ', ' UK <br class="znh-mobile-break">', $title) !!}<br>
                        <span class="znh-gradient-text">{{ $subtitle }}</span>
                    </h1>

                    <div class="znh-new-content-paragraph">
                        <p>Get expert academic support for essays, reports, dissertations, case studies and more—crafted by
                            subject specialists to help you achieve your academic goals.</p>
                    </div>

                    <div class="znh-stats-row">
                        <div class="znh-stat-item">
                            <div class="znh-stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                </svg>
                            </div>
                            <div class="znh-stat-text">
                                <strong>25,000+</strong>
                                <span>Assignments<br>Delivered</span>
                            </div>
                        </div>
                        <div class="znh-stat-item">
                            <div class="znh-stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                            <div class="znh-stat-text">
                                <strong>150+</strong>
                                <span>Subject<br>Experts</span>
                            </div>
                        </div>
                        <div class="znh-stat-item">
                            <div class="znh-stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                            </div>
                            <div class="znh-stat-text">
                                <strong>4.9/5</strong>
                                <span>Student<br>Rating</span>
                            </div>
                        </div>
                        <div class="znh-stat-item">
                            <div class="znh-stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                </svg>
                            </div>
                            <div class="znh-stat-text">
                                <strong>98%</strong>
                                <span>On-Time<br>Delivery</span>
                            </div>
                        </div>
                    </div>

                    <div class="znh-action-buttons">
                        <a href="/upload-your-assignment" class="znh-btn-primary">Get Free Quote &rarr;</a>
                        <a href="/writers" class="znh-btn-secondary">View Our Experts &rarr;</a>
                    </div>
                </div>

                <!-- Middle Image Column -->
                <div class="znh-new-image-column">
                    <div class="znh-image-wrapper">
                        <!-- Replace with your actual image path -->
                        <!-- Image moved to section background -->

                        <!-- Floating Badges -->
                        <div class="znh-floating-badge znh-badge-1">
                            <div class="znh-badge-icon znh-purple-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                    <polyline points="9 12 11 14 15 10" />
                                </svg>
                            </div>
                            <div class="znh-badge-text">
                                <strong>100%</strong>
                                <span>Plagiarism Free</span>
                            </div>
                        </div>

                        <div class="znh-floating-badge znh-badge-2">
                            <div class="znh-badge-icon znh-orange-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 4 23 10 17 10" />
                                    <polyline points="1 20 1 14 7 14" />
                                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />
                                </svg>
                            </div>
                            <div class="znh-badge-text">
                                <strong>Unlimited</strong>
                                <span>Revisions</span>
                            </div>
                        </div>

                        <div class="znh-floating-badge znh-badge-3">
                            <div class="znh-badge-icon znh-orange-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 18v-6a9 9 0 0 1 18 0v6" />
                                    <path
                                        d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z" />
                                </svg>
                            </div>
                            <div class="znh-badge-text">
                                <strong>24/7</strong>
                                <span>Live Support</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Form Column -->
                <div class="znh-new-form-column">
                    @include('components.common-section.new-hero-form')
                </div>
            </div>
        </div>

        <style>
            .znh-mobile-break {
                display: none;
            }

            .znh-new-bg-hero {
                background-image: url('/public/new-home-page-images/ain-hero-bg.webp');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                /* Optional: Add abstract blob background images here */
                padding: 3rem 2rem 4rem 2rem;
                /* Increased top padding to avoid header overlap */
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                overflow: hidden;
                position: relative;
            }

            .znh-new-container-section {
                max-width: 1400px;
                margin: auto;
                padding: 0 1rem;
            }

            .znh-new-hero-content {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                gap: 2rem;
            }

            /* --- LEFT COLUMN --- */
            .znh-new-content-column {
                flex: 1;
                max-width: 650px;
                z-index: 2;
            }

            .znh-rating-badge {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                background: transparent;
                padding: 0;
                margin-bottom: 1.5rem;
                font-size: 0.85rem;
                font-weight: 600;
                color: #1f2937;
            }

            .znh-rating-badge .znh-znh-stars {
                display: flex;
                background: #166534;
                padding: 4px 8px;
                border-radius: 4px;
                gap: 2px;
            }

            .znh-rating-badge .znh-star {
                width: 14px;
                height: 14px;
                color: white;
            }

            .znh-new-main-heading {
                font-size: 2.4rem;
                font-weight: 800;
                line-height: 1.3;
                color: #111827;
                margin-bottom: 1.5rem;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .znh-gradient-text {
                background: linear-gradient(to right, #6b21a8, #ea580c);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                display: block;
                margin-top: 0.25rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .znh-new-content-paragraph p {
                font-size: 1.1rem;
                color: #4b5563;
                line-height: 1.6;
                margin-bottom: 2rem;
            }

            .znh-stats-row {
                display: flex;
                flex-wrap: wrap;
                gap: 1.5rem;
                margin-bottom: 2.5rem;
            }

            .znh-stat-item {
                display: flex;
                gap: 8px;
            }

            .znh-stat-icon {
                width: 24px;
                height: 24px;
                color: #6b7280;
            }

            .znh-stat-text {
                display: flex;
                flex-direction: column;
                font-size: 0.8rem;
                color: #4b5563;
            }

            .znh-stat-text strong {
                font-size: 1rem;
                color: #111827;
                font-weight: 700;
            }

            .znh-action-buttons {
                display: flex;
                gap: 1rem;
                flex-wrap: wrap;
            }

            .znh-btn-primary {
                background: #7c3aed;
                color: white;
                padding: 12px 24px;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                transition: all 0.3s ease;
                border: 1px solid transparent;
            }

            .znh-btn-primary:hover {
                background: #6d28d9;
                color: white !important;
                border-color: transparent;
                transform: translateY(-2px);
            }

            .znh-btn-secondary {
                background: white;
                color: #111827;
                padding: 12px 24px;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                border: 1px solid #e5e7eb;
                transition: all 0.3s ease;
            }

            .znh-btn-secondary:hover {
                background: #f9fafb;
                color: #111827 !important;
                transform: translateY(-2px);
            }

            /* --- MIDDLE IMAGE COLUMN --- */
            .znh-new-image-column {
                flex: 1;
                display: flex;
                justify-content: center;
                position: relative;
                z-index: 1;
            }

            .znh-image-wrapper {
                position: relative;
                width: 100%;
                max-width: 450px;
                min-height: 400px;
            }

            .znh-main-student-image {
                width: 100%;
                height: auto;
                border-radius: 20px;
                /* Placeholder styles if image is missing */
                min-height: 400px;
                object-fit: cover;
                background: transparent;
            }

            .znh-floating-badge {
                position: absolute;
                background: white;
                padding: 12px 16px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                gap: 12px;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
                animation: float 6s ease-in-out infinite;
            }

            .znh-floating-badge.znh-badge-1 {
                top: 10%;
                left: -10%;
                animation-delay: 0s;
            }

            .znh-floating-badge.znh-badge-2 {
                bottom: 30%;
                left: -15%;
                animation-delay: 2s;
            }

            .znh-floating-badge.znh-badge-3 {
                bottom: 10%;
                right: -5%;
                animation-delay: 4s;
            }

            .znh-badge-icon {
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
            }

            .znh-badge-icon svg {
                width: 18px;
                height: 18px;
            }

            .znh-purple-icon {
                background: #f3e8ff;
                color: #7c3aed;
            }

            .znh-orange-icon {
                background: #ffedd5;
                color: #ea580c;
            }

            .znh-badge-text {
                display: flex;
                flex-direction: column;
                font-size: 0.75rem;
                color: #6b7280;
            }

            .znh-badge-text strong {
                font-size: 0.95rem;
                color: #111827;
                font-weight: 700;
            }

            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }

                100% {
                    transform: translateY(0px);
                }
            }


            /* --- RIGHT FORM COLUMN --- */
            .znh-new-form-column {
                flex: 0 0 420px;
                z-index: 2;
            }

            .znh-quote-card {
                background: white;
                border-radius: 16px;
                padding: 1.1rem 1.5rem;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
                position: relative;
            }

            .znh-quote-header {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                margin-bottom: 0.6rem;
            }

            .znh-quote-header h3 {
                font-size: 1.15rem;
                font-weight: 700;
                color: #111827;
                margin: 0;
            }

            .znh-quote-form {
                display: flex;
                flex-direction: column;
                gap: 0.15rem;
            }

            .znh-form-group-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 0.6rem;
                gap: 15px;
            }

            .znh-input-label-group {
                display: flex;
                align-items: center;
                gap: 12px;
                flex: 1;
            }

            .znh-input-label-group label {
                font-size: 0.85rem;
                font-weight: 700;
                color: #1f2937;
                margin: 0;
                white-space: nowrap;
            }

            .znh-input-icon {
                width: 32px;
                height: 32px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .znh-input-icon svg {
                width: 16px;
                height: 16px;
            }

            .znh-purple-bg {
                background: #f3e8ff;
                color: #7c3aed;
            }

            .znh-red-bg {
                background: #fee2e2;
                color: #ef4444;
            }

            .znh-pink-bg {
                background: #fce7f3;
                color: #ec4899;
            }

            .znh-blue-bg {
                background: #dbeafe;
                color: #3b82f6;
            }

            .znh-select-box {
                flex: 1;
                max-width: 210px;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 6px 12px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02);
            }

            .znh-select-box select {
                width: 100%;
                border: none;
                background: transparent;
                font-size: 0.8rem;
                color: #6b7280;
                outline: none;
                cursor: pointer;
                appearance: none;
                font-weight: 500;
                white-space: nowrap;
                background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%234b5563' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
                background-repeat: no-repeat;
                background-position: right center;
                background-size: 14px;
                padding-right: 16px;
            }

            .znh-form-group-full {
                display: flex;
                flex-direction: column;
                gap: 6px;
                margin-top: 0.5rem;
            }

            .znh-form-group-full label {
                font-size: 0.85rem;
                font-weight: 700;
                color: #1f2937;
            }

            .znh-form-group-full input {
                width: 100%;
                padding: 10px 14px;
                border: none;
                border-radius: 6px;
                font-size: 0.85rem;
                background: #f9fafb;
                outline: none;
                box-sizing: border-box;
                font-weight: 500;
            }

            .znh-form-group-full input:focus {
                background: #f3f4f6;
            }

            .znh-btn-submit {
                background: #f97316;
                color: white;
                border: none;
                padding: 12px;
                border-radius: 8px;
                font-size: 0.95rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                width: 100%;
                box-shadow: 0 4px 14px rgba(249, 115, 22, 0.3);
            }

            .znh-btn-submit:hover {
                background: #ea580c;
                color: white !important;
                transform: translateY(-1px);
                box-shadow: 0 6px 18px rgba(249, 115, 22, 0.4);
            }

            .znh-form-features {
                display: flex;
                justify-content: space-between;
                margin-top: 0.5rem;
                font-size: 0.75rem;
                color: #6b7280;
            }

            .znh-form-features span {
                display: flex;
                align-items: center;
                gap: 4px;
            }

            .znh-form-features svg {
                width: 12px;
                height: 12px;
            }

            /* --- RESPONSIVE --- */
            @media (max-width: 1200px) {
                .znh-new-hero-content {
                    flex-wrap: wrap;
                    justify-content: center;
                }

                .znh-new-content-column {
                    min-width: 100%;
                    text-align: center;
                }

                .znh-action-buttons,
                .znh-stats-row,
                .znh-rating-badge {
                    justify-content: center;
                }

                .znh-new-content-paragraph p {
                    text-align: center;
                }

                .znh-new-image-column {
                    order: 2;
                    margin-top: 2rem;
                }

                .znh-new-form-column {
                    order: 3;
                    margin-top: 2rem;
                }
            }

            @media (max-width: 768px) {
                .znh-mobile-break {
                    display: block;
                }

                .znh-new-bg-hero {
                    padding: 2rem 1rem;
                }

                .znh-new-content-column {
                    text-align: left;
                    align-items: flex-start;
                }

                .znh-rating-badge {
                    justify-content: flex-start;
                    flex-wrap: nowrap;
                    white-space: nowrap;
                }

                .znh-new-main-heading {
                    font-size: 2.1rem;
                    text-align: left;
                }

                .znh-new-content-paragraph p {
                    text-align: left;
                    font-size: 1rem;
                }

                .znh-action-buttons {
                    display: none !important;
                }

                .znh-stats-row {
                    justify-content: space-between;
                    gap: 4px;
                    width: 100%;
                    flex-wrap: nowrap;
                }

                .znh-stat-item {
                    display: grid;
                    grid-template-columns: auto auto;
                    grid-template-rows: auto auto;
                    column-gap: 4px;
                    row-gap: 2px;
                    align-items: center;
                    justify-content: center;
                }

                .znh-stat-icon {
                    grid-column: 1;
                    grid-row: 1;
                    width: 16px;
                    height: 16px;
                    margin: 0;
                }

                .znh-stat-text {
                    display: contents;
                }

                .znh-stat-text strong {
                    grid-column: 2;
                    grid-row: 1;
                    font-size: 0.85rem;
                    white-space: nowrap;
                    text-align: left;
                }

                .znh-stat-text span {
                    grid-column: 1 / -1;
                    grid-row: 2;
                    font-size: 0.65rem;
                    text-align: center;
                    line-height: 1.2;
                }

                .znh-floating-badge {
                    padding: 6px 10px;
                    gap: 8px;
                    transform: scale(0.9);
                }

                .znh-floating-badge.znh-badge-1 {
                    left: -5%;
                    top: 5%;
                }

                .znh-floating-badge.znh-badge-2 {
                    left: -10%;
                    bottom: 35%;
                }

                .znh-floating-badge.znh-badge-3 {
                    right: -10%;
                    bottom: 5%;
                }

                .znh-new-form-column {
                    width: 100%;
                    flex: 1;
                }

                .znh-quote-card {
                    padding: 1.2rem;
                }

                .znh-form-group-row {
                    gap: 10px;
                }

                .znh-select-box {
                    min-width: 0;
                }

                .znh-select-box select {
                    text-overflow: ellipsis;
                    overflow: hidden;
                    white-space: nowrap;
                }
            }

            @media (max-width: 480px) {
                .znh-rating-badge {
                    font-size: 0.75rem;
                }

                .znh-rating-badge span {
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                .znh-rating-badge .znh-znh-stars {
                    padding: 2px 4px;
                }

                .znh-rating-badge .znh-star {
                    width: 12px;
                    height: 12px;
                }

                .znh-stats-row {
                    gap: 2px;
                }

                .znh-stat-text strong {
                    font-size: 0.75rem;
                }

                .znh-stat-icon {
                    width: 14px;
                    height: 14px;
                }

                .znh-stat-text span {
                    font-size: 0.55rem;
                }

                .znh-new-main-heading {
                    font-size: 1.8rem;
                }

                .znh-quote-card {
                    padding: 1rem 0.8rem;
                }

                .znh-form-group-row {
                    gap: 6px;
                }

                .znh-input-label-group {
                    gap: 6px;
                }

                .znh-input-icon {
                    width: 26px;
                    height: 26px;
                }

                .znh-input-icon svg {
                    width: 13px;
                    height: 13px;
                }

                .znh-input-label-group label {
                    font-size: 0.75rem;
                }

                .znh-select-box {
                    max-width: 150px;
                    padding: 5px 8px;
                }

                .znh-select-box select {
                    font-size: 0.75rem;
                    padding-right: 12px;
                    background-size: 12px;
                }

                .znh-form-features {
                    flex-direction: row;
                    justify-content: space-between;
                    font-size: 0.65rem;
                }
            }

            /* --- HERO MARQUEE ATTACHED --- */
            .znh-hero-marquee-container {
                width: 100%;
                display: flex;
                justify-content: center;
                position: relative;
                margin-top: 2rem;
                z-index: 10;
                padding: 0 1rem;
            }

            .znh-hero-marquee-banner {
                background: white;
                border-radius: 30px;
                box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
                max-width: 1400px;
                width: 100%;
                padding: 1rem 2rem;
                display: flex;
                flex-direction: column;
                align-items: center;
                overflow: hidden;
                border: 1px solid rgba(255, 255, 255, 0.5);
            }

            .znh-hero-marquee-title {
                font-size: 0.9rem;
                font-weight: 700;
                color: #111827;
                margin: 0 0 1rem 0;
                text-align: center;
            }

            .znh-znh-hero-marquee-wrapper-outer {
                display: flex;
                align-items: center;
                width: 100%;
                position: relative;
                gap: 1rem;
            }

            .znh-marquee-arrow {
                background: none;
                border: none;
                cursor: pointer;
                color: #7c3aed;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 5px;
                border-radius: 50%;
                transition: all 0.3s ease;
                flex-shrink: 0;
                z-index: 2;
            }

            .znh-marquee-arrow:hover {
                background: #f3e8ff;
            }

            .znh-marquee-arrow svg {
                width: 24px;
                height: 24px;
            }

            .znh-hero-marquee-wrapper {
                width: 100%;
                overflow-x: auto;
                scroll-behavior: smooth;
                /* Hide scrollbar */
                -ms-overflow-style: none;
                scrollbar-width: none;
                /* Fade effect on edges */
                mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
                -webkit-mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
            }

            .znh-hero-marquee-wrapper::-webkit-scrollbar {
                display: none;
            }

            .znh-hero-marquee-track {
                display: flex;
                align-items: center;
                gap: 4rem;
                width: max-content;
                animation: scrollMarquee 25s linear infinite;
            }

            /* When interacting, pause animation */
            .znh-hero-marquee-wrapper:hover .znh-hero-marquee-track,
            .znh-hero-marquee-wrapper.user-scrolling .znh-hero-marquee-track {
                animation-play-state: paused;
            }

            .znh-hero-logo {
                height: 40px;
                width: auto;
                object-fit: contain;
                transition: all 0.3s ease;
                flex-shrink: 0;
            }

            .znh-hero-logo:hover {
                transform: scale(1.05);
            }

            @keyframes scrollMarquee {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(calc(-50% - 2rem));
                }
            }

            @keyframes scrollMarqueeMobile {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(calc(-50% - 0.75rem));
                }
            }

            @media (max-width: 768px) {
                .znh-hero-logo {
                    height: 25px;
                    margin: 0;
                }

                /* Hide the 7th and 14th logo to make it 12 logos total, 
                                                                                                                                                           which perfectly splits into 2 rows and 6 columns for seamless scrolling */
                .znh-hero-marquee-track img:nth-child(7),
                .znh-hero-marquee-track img:nth-child(14) {
                    display: none;
                }

                .znh-hero-marquee-track {
                    display: grid;
                    grid-template-rows: 1fr 1fr;
                    grid-auto-flow: column;
                    gap: 1rem 1.5rem;
                    width: max-content;
                    animation: scrollMarqueeMobile 20s linear infinite !important;
                }

                .znh-hero-marquee-wrapper {
                    overflow: hidden;
                    padding: 0 1.5rem;
                }

                .znh-marquee-arrow {
                    display: flex !important;
                    position: absolute;
                    width: 28px;
                    height: 28px;
                    padding: 2px;
                    z-index: 10;
                    background: transparent;
                }

                .znh-left-arrow {
                    left: -5px;
                    top: 75%;
                    transform: translateY(-50%);
                }

                .znh-right-arrow {
                    right: -5px;
                    top: 25%;
                    transform: translateY(-50%);
                }
            }

            @media (max-width: 480px) {

                /* Form Select2 Overflow Fix */
                .znh-select-box {
                    max-width: 135px;
                    min-width: 0;
                    padding: 4px 8px;
                }

                .select2-container {
                    width: 100% !important;
                    max-width: 100%;
                }

                .select2-container .select2-selection--single .select2-selection__rendered {
                    font-size: 0.75rem !important;
                    text-overflow: ellipsis !important;
                    overflow: hidden !important;
                    white-space: nowrap !important;
                    padding-right: 12px !important;
                }
            }
        </style>

        <script>
            function scrollMarqueeLeft() {
                const wrapper = document.getElementById('marqueeWrapper');
                wrapper.classList.add('user-scrolling');
                wrapper.scrollBy({ left: -200, behavior: 'smooth' });
                setTimeout(() => wrapper.classList.remove('user-scrolling'), 1000);
            }

            function scrollMarqueeRight() {
                const wrapper = document.getElementById('marqueeWrapper');
                wrapper.classList.add('user-scrolling');
                wrapper.scrollBy({ left: 200, behavior: 'smooth' });
                setTimeout(() => wrapper.classList.remove('user-scrolling'), 1000);
            }
        </script>
    </section>

    <!-- University Marquee Attached to Hero -->
    <div class="znh-hero-marquee-container">
        <div class="znh-hero-marquee-banner">
            <h4 class="znh-hero-marquee-title">Trusted by Students from Top UK Universities</h4>
            <div class="znh-znh-hero-marquee-wrapper-outer">
                <button class="znh-marquee-arrow znh-left-arrow" onclick="scrollMarqueeLeft()">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                </button>

                <div class="znh-hero-marquee-wrapper" id="marqueeWrapper">
                    <div class="znh-hero-marquee-track" id="marqueeTrack">
                        <!-- Logos -->
                        <img src="/assets/media/layout/university/oxford.jpg" alt="University of Oxford"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/cambridge.png" alt="University of Cambridge"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/ucl.png" alt="UCL" class="znh-hero-logo">
                        <img src="/assets/media/layout/university/manchester.jpg" alt="University of Manchester"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/birmingham.png" alt="University of Birmingham"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/kingslondon.png" alt="King's College London"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/leedsuni.png" alt="University of Leeds"
                            class="znh-hero-logo">

                        <!-- Repeat for Infinite Loop -->
                        <img src="/assets/media/layout/university/oxford.jpg" alt="University of Oxford"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/cambridge.png" alt="University of Cambridge"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/ucl.png" alt="UCL" class="znh-hero-logo">
                        <img src="/assets/media/layout/university/manchester.jpg" alt="University of Manchester"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/birmingham.png" alt="University of Birmingham"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/kingslondon.png" alt="King's College London"
                            class="znh-hero-logo">
                        <img src="/assets/media/layout/university/leedsuni.png" alt="University of Leeds"
                            class="znh-hero-logo">
                    </div>
                </div>

                <button class="znh-marquee-arrow znh-right-arrow" onclick="scrollMarqueeRight()">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Popular Services Section -->
    <section class="znh-popular-services-section">
        <div class="znh-services-container">
            <h2 class="znh-services-main-title">Our Most Popular Services</h2>

            <div class="znh-services-wrapper">
                <!-- Large Card (Main) -->
                <div class="znh-service-card znh-large-card znh-purple-theme">
                    <div class="znh-service-content">
                        <h3>Assignment Help</h3>
                        <p>All types of assignments on any subject</p>
                        <div class="znh-service-stats">
                            <span class="znh-price">From £12</span>
                            <span class="znh-orders">12,500+ Orders</span>
                        </div>
                    </div>
                    <!-- User will replace src with actual image -->
                    <img src="/public/new-home-page-images/Assignment-Help.webp" alt="Assignment Help"
                        class="znh-service-image">
                </div>

                <!-- Right Side Container -->
                <div class="znh-services-right">
                    <!-- Top Row (3 Cards) -->
                    <div class="znh-services-row-3">
                        <div class="znh-service-card znh-orange-theme">
                            <div class="znh-service-content">
                                <h3>Essay Writing</h3>
                                <p>Well-researched, plagiarism-free essays</p>
                                <div class="znh-service-stats">
                                    <span class="znh-price">From £12</span>
                                    <span class="znh-orders">18,600+ Orders</span>
                                </div>
                            </div>
                            <img src="/public/new-home-page-images/Essay-Writing.webp" alt="Essay Writing"
                                class="znh-service-image">
                        </div>

                        <div class="znh-service-card znh-purple-light-theme">
                            <div class="znh-service-content">
                                <h3>Dissertation Help</h3>
                                <p>Expert assistance for Master's & PhD</p>
                                <div class="znh-service-stats">
                                    <span class="znh-price">From £25</span>
                                    <span class="znh-orders">8,900+ Orders</span>
                                </div>
                            </div>
                            <img src="/public/new-home-page-images/Disseratation-Help.webp" alt="Dissertation Help"
                                class="znh-service-image">
                        </div>

                        <div class="znh-service-card znh-rose-theme">
                            <div class="znh-service-content">
                                <h3>Case Study Help</h3>
                                <p>In-depth case analysis and solutions</p>
                                <div class="znh-service-stats">
                                    <span class="znh-price">From £15</span>
                                    <span class="znh-orders">6,200+ Orders</span>
                                </div>
                            </div>
                            <img src="/public/new-home-page-images/Case-Study-Help.webp" alt="Case Study Help"
                                class="znh-service-image">
                        </div>
                    </div>

                    <!-- Bottom Row (4 Cards) -->
                    <div class="znh-services-row-4">
                        <div class="znh-service-card znh-blue-theme">
                            <div class="znh-service-content">
                                <h3>Report Writing</h3>
                                <p>Detailed and structured reports</p>
                                <div class="znh-service-stats">
                                    <span class="znh-price">From £15</span>
                                    <span class="znh-orders">7,800+ Orders</span>
                                </div>
                            </div>
                            <img src="/public/new-home-page-images/Report-Writing.webp" alt="Report Writing"
                                class="znh-service-image">
                        </div>

                        <div class="znh-service-card znh-gray-theme">
                            <div class="znh-service-content">
                                <h3>Coursework Help</h3>
                                <p>Error-free coursework done on time</p>
                                <div class="znh-service-stats">
                                    <span class="znh-price">From £12</span>
                                    <span class="znh-orders">9,100+ Orders</span>
                                </div>
                            </div>
                            <img src="/public/new-home-page-images/Coursework-Help.webp" alt="Coursework Help"
                                class="znh-service-image">
                        </div>

                        <div class="znh-service-card znh-pink-theme">
                            <div class="znh-service-content">
                                <h3>Proofreading</h3>
                                <p>Perfect grammar, zero errors</p>
                                <div class="znh-service-stats">
                                    <span class="znh-price">From £8</span>
                                    <span class="znh-orders">11,200+ Orders</span>
                                </div>
                            </div>
                            <img src="/public/new-home-page-images/Proofreading.webp" alt="Proofreading"
                                class="znh-service-image">
                        </div>

                        <div class="znh-service-card znh-teal-theme">
                            <div class="znh-service-content">
                                <h3>Editing & Formatting</h3>
                                <p>References, citations and formatting</p>
                                <div class="znh-service-stats">
                                    <span class="znh-price">From £10</span>
                                    <span class="znh-orders">5,600+ Orders</span>
                                </div>
                            </div>
                            <img src="/public/new-home-page-images/Editing.webp" alt="Editing & Formatting"
                                class="znh-service-image">
                        </div>
                    </div>
                </div>
            </div>

            <a href="/services" class="znh-view-all-services-btn-mobile">View All Services &rarr;</a>
        </div>

        <style>
            .znh-popular-services-section {
                padding: 5rem 2rem;
                background-color: #ffffff;
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            }

            .znh-services-container {
                max-width: 1400px;
                margin: auto;
            }

            .znh-services-main-title {
                text-align: center;
                font-size: 2rem;
                font-weight: 800;
                color: #111827;
                margin-bottom: 3rem;
            }

            /* Flex Wrapper */
            .znh-services-wrapper {
                display: flex;
                gap: 1.5rem;
                align-items: stretch;
            }

            .znh-services-right {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
                flex: 1;
                /* Takes remaining width */
            }

            .znh-services-row-3 {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 1.5rem;
                flex: 1;
                /* Makes rows equal height */
            }

            .znh-services-row-4 {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 1.5rem;
                flex: 1;
                /* Makes rows equal height */
            }

            .znh-service-card {
                border-radius: 20px;
                padding: 1.5rem;
                position: relative;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                min-height: 200px;
            }

            .znh-service-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
            }

            /* Main Large Card */
            .znh-large-card {
                width: 25%;
                /* Fix width for the main card */
                flex-shrink: 0;
            }

            .znh-service-content {
                position: relative;
                z-index: 2;
            }

            .znh-service-card h3 {
                font-size: 1.2rem;
                font-weight: 700;
                color: #111827;
                margin: 0 0 0.5rem 0;
            }

            .znh-service-card p {
                font-size: 0.85rem;
                color: #4b5563;
                margin: 0 0 1.5rem 0;
                line-height: 1.4;
                max-width: 60%;
                position: relative;
                z-index: 2;
            }

            .znh-large-card p {
                max-width: 90%;
            }

            .znh-service-stats {
                display: flex;
                flex-direction: column;
                gap: 4px;
            }

            .znh-service-stats .znh-price {
                font-size: 0.85rem;
                color: #4b5563;
                font-weight: 500;
            }

            .znh-service-stats .znh-orders {
                font-size: 0.85rem;
                color: #6b7280;
            }

            .znh-service-image {
                position: absolute;
                bottom: -15px;
                right: -15px;
                width: 65%;
                height: auto;
                max-height: 85%;
                object-fit: contain;
                z-index: 1;
                transform-origin: bottom right;
                transition: transform 0.3s ease;
            }

            .znh-large-card .znh-service-image {
                width: 110%;
                max-height: 75%;
                bottom: -5%;
                right: -5%;
            }

            .znh-service-card:hover .znh-service-image {
                transform: scale(1.05);
            }

            /* Theme Colors */
            .znh-purple-theme {
                background: linear-gradient(135deg, #ffffff 0%, #f3e8ff 100%);
            }

            .znh-orange-theme {
                background: linear-gradient(135deg, #ffffff 0%, #fff7ed 100%);
            }

            .znh-purple-light-theme {
                background: linear-gradient(135deg, #ffffff 0%, #faf5ff 100%);
            }

            .znh-rose-theme {
                background: linear-gradient(135deg, #ffffff 0%, #fff1f2 100%);
            }

            .znh-blue-theme {
                background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
            }

            .znh-gray-theme {
                background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            }

            .znh-pink-theme {
                background: linear-gradient(135deg, #ffffff 0%, #fdf4ff 100%);
            }

            .znh-teal-theme {
                background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
            }

            @media (max-width: 1200px) {
                .znh-services-row-4 {
                    grid-template-columns: repeat(2, 1fr);
                }

                .znh-services-row-3 {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 992px) {
                .znh-services-wrapper {
                    flex-direction: column;
                }

                .znh-large-card {
                    width: 100%;
                    min-height: 250px;
                }

                .znh-large-card .znh-service-image {
                    width: 40%;
                    right: 0;
                }
            }

            @media (max-width: 768px) {

                .znh-services-wrapper,
                .znh-services-right,
                .znh-services-row-3,
                .znh-services-row-4 {
                    display: contents !important;
                }

                .znh-popular-services-section {
                    padding: 3rem 1rem;
                }

                .znh-popular-services-section .znh-services-container {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 8px;
                }

                .znh-services-main-title {
                    grid-column: 1 / -1;
                    text-align: center;
                    font-size: 1.1rem;
                    margin-bottom: 1.5rem;
                    white-space: nowrap;
                }

                .znh-service-card {
                    background: #ffffff !important;
                    border: 1px solid #f3f4f6;
                    border-radius: 12px;
                    padding: 12px 4px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    min-height: auto;
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
                }

                .znh-service-card .znh-service-content {
                    display: contents;
                }

                .znh-service-card h3 {
                    order: 2;
                    font-size: 0.65rem;
                    text-align: center;
                    margin: 0 0 2px 0;
                    line-height: 1.2;
                }

                .znh-service-stats {
                    order: 3;
                    align-items: center;
                }

                .znh-price {
                    font-size: 0.55rem !important;
                    color: #6b7280;
                }

                .znh-service-card p,
                .znh-orders {
                    display: none !important;
                }

                .znh-service-image {
                    position: static !important;
                    width: 32px !important;
                    height: 32px !important;
                    margin: 0 auto 6px auto !important;
                    object-fit: contain;
                    border-radius: 50%;
                    padding: 6px;
                    order: 1;
                    transform: none !important;
                }

                /* Mobile View All Button */
                .znh-view-all-services-btn-mobile {
                    display: flex;
                    grid-column: 1 / -1;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    padding: 10px;
                    margin-top: 10px;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 8px;
                    color: #4f46e5;
                    font-size: 0.8rem;
                    font-weight: 600;
                    text-decoration: none;
                    transition: all 0.3s ease;
                }

                .znh-view-all-services-btn-mobile:hover {
                    background: #f3f4f6;
                    color: #3730a3 !important;
                }

                /* Mobile Icon Backgrounds based on theme */
                .znh-purple-theme .znh-service-image {
                    background: #e0f2fe;
                }

                .znh-orange-theme .znh-service-image {
                    background: #ffedd5;
                }

                .znh-purple-light-theme .znh-service-image {
                    background: #e0e7ff;
                }

                .znh-rose-theme .znh-service-image {
                    background: #ffe4e6;
                }

                .znh-blue-theme .znh-service-image {
                    background: #e0f2fe;
                }

                .znh-gray-theme .znh-service-image {
                    background: #f3e8ff;
                }

                .znh-pink-theme .znh-service-image {
                    background: #fee2e2;
                }

                .znh-teal-theme .znh-service-image {
                    background: #dcfce7;
                }
            }

            /* Hide mobile button on desktop */
            @media (min-width: 769px) {
                .znh-view-all-services-btn-mobile {
                    display: none;
                }
            }
        </style>
    </section>

    <!-- Explore Subjects Section -->
    <section class="znh-explore-subjects-section">
        <div class="znh-subjects-container">
            <div class="znh-subjects-header">
                <div class="znh-subjects-title-area">
                    <h2>Explore Subjects</h2>
                    <p>Expert help in 150+ subjects</p>
                </div>
                <a href="{{ url('services') }}" class="znh-view-all-link znh-hide-on-mobile">View All Subjects &rarr;</a>
            </div>

            <div class="znh-subjects-slider-container">
                <button class="znh-subject-arrow znh-left-arrow" onclick="znhSlideSubjects(-1)">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                </button>

                <div class="znh-subjects-track-wrapper" id="znhSubjectsTrackWrapper">
                    <div class="znh-subjects-track">
                        <a href="{{ url('business-assignment-writing-help') }}" class="znh-subject-card">
                            <div class="znh-subject-icon znh-icon-purple">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="7" height="7" />
                                    <rect x="14" y="3" width="7" height="7" />
                                    <rect x="14" y="14" width="7" height="7" />
                                    <rect x="3" y="14" width="7" height="7" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>Business</h4>
                                <span>12,500+ Orders</span>
                            </div>
                        </a>
                        <a href="{{ url('law-assignment-writing-help') }}" class="znh-subject-card">
                            <div class="znh-subject-icon znh-icon-orange">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>Law</h4>
                                <span>8,600+ Orders</span>
                            </div>
                        </a>
                        <a href="{{ url('nursing-assignment-writing-help') }}" class="znh-subject-card">
                            <div class="znh-subject-icon znh-icon-green">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>Nursing</h4>
                                <span>9,800+ Orders</span>
                            </div>
                        </a>
                        <a href="{{ url('psychology-assignment-help-uk') }}" class="znh-subject-card">
                            <div class="znh-subject-icon znh-icon-red">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 16v-4" />
                                    <path d="M12 8h.01" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>Psychology</h4>
                                <span>6,300+ Orders</span>
                            </div>
                        </a>
                        <a href="{{ url('engineering-assignment-writing-help') }}" class="znh-subject-card">
                            <div class="znh-subject-icon znh-icon-blue">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="3" />
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>Engineering</h4>
                                <span>8,000+ Orders</span>
                            </div>
                        </a>

                        <!-- Mobile ONLY 6th Card "More Subjects" -->
                        <a href="{{ url('services') }}" class="znh-subject-card znh-mobile-more-subjects">
                            <div class="znh-subject-icon znh-icon-red">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>More Subjects</h4>
                                <span>View All</span>
                            </div>
                        </a>

                        <a href="{{ url('it-assignment-help-uk') }}" class="znh-subject-card">
                            <div class="znh-subject-icon znh-icon-teal">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2" />
                                    <line x1="8" y1="21" x2="16" y2="21" />
                                    <line x1="12" y1="17" x2="12" y2="21" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>Computer Science</h4>
                                <span>7,900+ Orders</span>
                            </div>
                        </a>
                        <a href="{{ url('accounting-assignment-writing-help') }}" class="znh-subject-card">
                            <div class="znh-subject-icon znh-icon-yellow">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>Accounting</h4>
                                <span>7,600+ Orders</span>
                            </div>
                        </a>
                        <a href="{{ url('marketing-assignment-writing-help') }}" class="znh-subject-card">
                            <div class="znh-subject-icon znh-icon-purple">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                                </svg>
                            </div>
                            <div class="znh-subject-info">
                                <h4>Marketing</h4>
                                <span>5,500+ Orders</span>
                            </div>
                        </a>
                    </div>
                </div>

                <button class="znh-subject-arrow znh-right-arrow" onclick="znhSlideSubjects(1)">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </button>
            </div>

            <a href="{{ url('services') }}" class="znh-view-all-subjects-btn-mobile">View All Subjects &rarr;</a>
        </div>

        <style>
            .znh-explore-subjects-section {
                padding: 4rem 2rem;
                background-color: #faf5ff;
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                border-top: 1px solid rgba(243, 232, 255, 0.5);
                border-bottom: 1px solid rgba(243, 232, 255, 0.5);
            }

            .znh-subjects-container {
                max-width: 1400px;
                margin: auto;
            }

            .znh-subjects-header {
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                margin-bottom: 2rem;
                padding: 0 1rem;
            }

            .znh-subjects-title-area h2 {
                font-size: 1.8rem;
                font-weight: 800;
                color: #1e1b4b;
                margin: 0 0 0.5rem 0;
            }

            .znh-subjects-title-area p {
                font-size: 0.95rem;
                color: #4b5563;
                margin: 0;
                font-weight: 500;
            }

            .znh-view-all-link {
                font-size: 0.95rem;
                font-weight: 700;
                color: #4f46e5;
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                transition: color 0.3s ease;
            }

            .znh-view-all-link:hover {
                color: #3730a3 !important;
            }

            .znh-subjects-slider-container {
                position: relative;
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .znh-subject-arrow {
                background: white;
                border: 1px solid #e5e7eb;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
                cursor: pointer;
                color: #4f46e5;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 45px;
                height: 45px;
                border-radius: 50%;
                transition: all 0.3s ease;
                flex-shrink: 0;
                z-index: 2;
            }

            .znh-subject-arrow:hover {
                background: #f3e8ff;
                border-color: #d8b4fe;
            }

            .znh-subject-arrow svg {
                width: 20px;
                height: 20px;
            }

            .znh-subjects-track-wrapper {
                width: 100%;
                overflow-x: auto;
                scroll-behavior: smooth;
                -ms-overflow-style: none;
                scrollbar-width: none;
                padding: 1rem 0;
                mask-image: linear-gradient(to right, transparent, black 2%, black 98%, transparent);
                -webkit-mask-image: linear-gradient(to right, transparent, black 2%, black 98%, transparent);
            }

            .znh-subjects-track-wrapper::-webkit-scrollbar {
                display: none;
            }

            .znh-subjects-track {
                display: flex;
                gap: 1.5rem;
                width: max-content;
                padding: 0 10px;
            }

            .znh-subject-card {
                background: white;
                border-radius: 16px;
                padding: 1.25rem 1.5rem;
                display: flex;
                align-items: center;
                gap: 1.25rem;
                min-width: 250px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
                text-decoration: none;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border: 1px solid transparent;
            }

            .znh-subject-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                border-color: #f3e8ff;
            }

            .znh-subject-icon {
                width: 45px;
                height: 45px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .znh-subject-icon svg {
                width: 22px;
                height: 22px;
            }

            .znh-subject-info {
                display: flex;
                flex-direction: column;
                gap: 4px;
            }

            .znh-subject-info h4 {
                margin: 0;
                font-size: 1rem;
                font-weight: 700;
                color: #111827;
            }

            .znh-subject-info span {
                font-size: 0.8rem;
                color: #6b7280;
                font-weight: 500;
            }

            /* Icon Colors */
            .znh-icon-purple {
                background: #f3e8ff;
                color: #7e22ce;
            }

            .znh-icon-orange {
                background: #ffedd5;
                color: #ea580c;
            }

            .znh-icon-green {
                background: #dcfce7;
                color: #16a34a;
            }

            .znh-icon-red {
                background: #fee2e2;
                color: #dc2626;
            }

            .znh-icon-blue {
                background: #dbeafe;
                color: #2563eb;
            }

            .znh-icon-teal {
                background: #ccfbf1;
                color: #0d9488;
            }

            .znh-icon-yellow {
                background: #fef3c7;
                color: #d97706;
            }

            .znh-mobile-more-subjects {
                display: none !important;
            }

            .znh-view-all-subjects-btn-mobile {
                display: none;
            }

            @media (max-width: 768px) {
                .znh-explore-subjects-section {
                    padding: 1rem 1rem;
                }

                .znh-subjects-header {
                    margin-bottom: 1.5rem;
                }

                .znh-subjects-title-area h2 {
                    font-size: 1.5rem;
                    text-align: center;
                }

                .znh-subjects-title-area p {
                    text-align: center;
                    font-size: 0.9rem;
                }

                .znh-hide-on-mobile {
                    display: none !important;
                }

                .znh-subject-arrow {
                    display: none;
                }

                .znh-subjects-track-wrapper {
                    padding: 0;
                    overflow: visible;
                    mask-image: none;
                    -webkit-mask-image: none;
                }

                .znh-subjects-track {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 8px;
                    width: 100%;
                    padding: 0;
                }

                /* Show only the first 5 cards + the new 'More Subjects' card */
                .znh-subject-card:nth-child(n+7) {
                    display: none !important;
                }

                .znh-mobile-more-subjects {
                    display: flex !important;
                }

                .znh-subject-card {
                    min-width: 0;
                    padding: 12px 4px;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    gap: 8px;
                    border-radius: 12px;
                    background: #ffffff;
                }

                .znh-subject-icon {
                    width: 36px;
                    height: 36px;
                    border-radius: 50%;
                }

                .znh-subject-icon svg {
                    width: 18px;
                    height: 18px;
                }

                .znh-subject-info {
                    align-items: left;
                    gap: 2px;
                }

                .znh-subject-info h4 {
                    font-size: 0.65rem;
                    text-align: center;
                    white-space: nowrap;
                }

                .znh-subject-info span {
                    font-size: 0.55rem;
                    text-align: left;
                }

                .znh-view-all-subjects-btn-mobile {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    padding: 12px;
                    margin-top: 20px;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 8px;
                    color: #4f46e5;
                    font-size: 0.8rem;
                    font-weight: 600;
                    text-decoration: none;
                    transition: all 0.3s ease;
                }

                .znh-view-all-subjects-btn-mobile:hover {
                    background: #f3f4f6;
                    color: #3730a3 !important;
                }
            }
        </style>

        <script>
            function znhSlideSubjects(direction) {
                const wrapper = document.getElementById('znhSubjectsTrackWrapper');
                const scrollAmount = 280 * direction;

                if (direction === 1 && (wrapper.scrollLeft + wrapper.clientWidth >= wrapper.scrollWidth - 10)) {
                    wrapper.scrollTo({ left: 0, behavior: 'smooth' });
                    return;
                }

                if (direction === -1 && wrapper.scrollLeft <= 10) {
                    wrapper.scrollTo({ left: wrapper.scrollWidth, behavior: 'smooth' });
                    return;
                }

                wrapper.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        </script>
    </section>

    <!-- Discount & Free Features Banner -->
    <section class="znh-discount-banner-section">
        <div class="znh-discount-container">
            <div class="znh-discount-banner">
                <div class="znh-offer-content">
                    <span class="znh-offer-subtitle">GET UP TO</span>
                    <h2 class="znh-offer-title">30% OFF</h2>
                    <span class="znh-offer-desc">ON YOUR FIRST ORDER</span>
                    <div class="znh-offer-code">Use Code: <strong>AIN30</strong></div>
                    <p class="znh-offer-note">Hurry! Offer valid for limited time only.</p>
                </div>

                <div class="znh-freebies-content">
                    <div class="znh-freebies-header">
                        <span class="znh-sparkle">✦</span>
                        <h3>All These, Absolutely FREE!</h3>
                    </div>

                    <div class="znh-freebies-grid">
                        <div class="znh-freebie-card">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <circle cx="10" cy="13" r="2" />
                                <line x1="11.41" y1="14.41" x2="13.5" y2="16.5" />
                            </svg>
                            <span>Plagiarism<br>Report</span>
                        </div>
                        <div class="znh-freebie-card">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 3v2M17 19v2M3 17h2M19 17h2M3 7h2M19 7h2M7 3v2M7 19v2" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <span>Rewriting &<br>Paraphrasing</span>
                        </div>
                        <div class="znh-freebie-card">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="9" y1="15" x2="15" y2="15" />
                                <line x1="9" y1="11" x2="11" y2="11" />
                            </svg>
                            <span>Title Page</span>
                        </div>
                        <div class="znh-freebie-card">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                            </svg>
                            <span>Bibliography</span>
                        </div>
                        <div class="znh-freebie-card">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="21" y1="6" x2="3" y2="6" />
                                <line x1="21" y1="12" x2="9" y2="12" />
                                <line x1="21" y1="18" x2="7" y2="18" />
                            </svg>
                            <span>Formatting</span>
                        </div>
                        <div class="znh-freebie-card">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.59-9.21l3.25 1.64" />
                            </svg>
                            <span>Unlimited<br>Revisions</span>
                        </div>
                        <div class="znh-freebie-card">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                <circle cx="12" cy="11" r="3" />
                            </svg>
                            <span>24/7<br>Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .znh-discount-banner-section {
                padding: 3rem 2rem;
                background-color: #ffffff;
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                display: flex;
                justify-content: center;
            }

            .znh-discount-container {
                max-width: 1400px;
                width: 100%;
            }

            .znh-discount-banner {
                background: linear-gradient(to right, #2e1065, #4c1d95, #3b0764);
                border-radius: 24px;
                padding: 2.5rem 3rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: white;
                box-shadow: 0 20px 40px -10px rgba(76, 29, 149, 0.4);
                position: relative;
                overflow: hidden;
                gap: 3rem;
            }

            /* Subtle glowing background effect */
            .znh-discount-banner::before {
                content: '';
                position: absolute;
                top: -50%;
                right: -10%;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle, rgba(216, 180, 254, 0.2) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }

            .znh-offer-content {
                display: flex;
                flex-direction: column;
                gap: 0.2rem;
                z-index: 2;
                flex-shrink: 0;
                min-width: 250px;
            }

            .znh-offer-subtitle {
                font-size: 1rem;
                font-weight: 600;
                letter-spacing: 1px;
                color: #e5e7eb;
            }

            .znh-offer-title {
                font-size: 3.5rem;
                font-weight: 900;
                color: #fbbf24;
                /* Yellow/Orange */
                margin: 0;
                line-height: 1;
                text-shadow: 2px 2px 0 rgba(0, 0, 0, 0.2);
            }

            .znh-offer-desc {
                font-size: 1.1rem;
                font-weight: 700;
                letter-spacing: 0.5px;
                margin-bottom: 0.5rem;
            }

            .znh-offer-code {
                background: white;
                color: #4c1d95;
                display: inline-block;
                padding: 0.5rem 1rem;
                border-radius: 50px;
                font-size: 0.9rem;
                font-weight: 600;
                margin: 0.5rem 0;
                width: max-content;
            }

            .znh-offer-note {
                font-size: 0.75rem;
                color: #d1d5db;
                margin: 0;
            }

            .znh-freebies-content {
                display: flex;
                flex-direction: column;
                gap: 1.2rem;
                z-index: 2;
                flex: 1;
            }

            .znh-freebies-header {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .znh-freebies-header h3 {
                font-size: 1.2rem;
                font-weight: 700;
                margin: 0;
                color: #ffffff;
                letter-spacing: 0.5px;
            }

            .znh-freebies-header .znh-sparkle {
                font-size: 1.1rem;
                color: #d8b4fe;
                opacity: 0.8;
            }

            .znh-freebies-grid {
                display: flex;
                gap: 0.8rem;
                width: 100%;
                justify-content: space-between;
            }

            .znh-freebie-card {
                background: white;
                border-radius: 14px;
                padding: 1rem 0.5rem;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 0.6rem;
                flex: 1;
                max-width: 110px;
                min-height: 110px;
                text-align: center;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            }

            .znh-freebie-card:hover {
                transform: translateY(-5px);
            }

            .znh-freebie-card svg {
                width: 26px;
                height: 26px;
                color: #5b21b6;
            }

            .znh-freebie-card span {
                font-size: 0.65rem;
                font-weight: 700;
                color: #1f2937;
                line-height: 1.3;
            }

            @media (max-width: 1200px) {
                .znh-freebies-grid {
                    flex-wrap: wrap;
                    justify-content: center;
                }

                .znh-freebie-card {
                    min-width: 90px;
                }
            }

            @media (max-width: 992px) {
                .znh-discount-banner {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 2rem;
                }

                .znh-freebies-grid {
                    justify-content: flex-start;
                }
            }

            @media (max-width: 768px) {
                .znh-discount-banner-section {
                    padding: 2rem 1rem;
                }

                .znh-discount-banner {
                    padding: 2rem 1rem;
                    align-items: center;
                    text-align: center;
                    border-radius: 20px;
                }

                .znh-offer-content {
                    align-items: center;
                    gap: 0.5rem;
                }

                .znh-offer-title {
                    font-size: 3rem;
                }

                .znh-freebies-header {
                    justify-content: center;
                    margin-bottom: 1rem;
                }

                .znh-freebies-header h3 {
                    font-size: 1.1rem;
                }

                .znh-freebies-grid {
                    display: grid !important;
                    grid-template-columns: repeat(3, 1fr) !important;
                    gap: 8px !important;
                    width: 100%;
                }

                .znh-freebie-card {
                    max-width: 100% !important;
                    min-width: 0 !important;
                    padding: 12px 4px !important;
                    border-radius: 12px;
                    gap: 8px;
                    min-height: 90px !important;
                }

                .znh-freebie-card svg {
                    width: 32px !important;
                    height: 32px !important;
                    background: #f5f3ff;
                    border-radius: 50%;
                    padding: 6px;
                    color: #5b21b6;
                }

                .znh-freebie-card span {
                    font-size: 0.55rem !important;
                    white-space: normal;
                }

                /* Center the 7th item (24/7 Support) */
                .znh-freebie-card:nth-child(7) {
                    grid-column: 2;
                    /* places it in the middle column of the 3-column grid */
                }
            }

            @media (max-width: 480px) {
                /* Inherit 3-column grid */
            }
        </style>
    </section>

    <!-- Assignment Samples Section -->
    <section class="znh-samples-section">
        <div class="znh-samples-container">
            <div class="znh-samples-header">
                <h2 class="znh-samples-title">Assignment Samples</h2>
                <p class="znh-samples-desc">High-quality work samples to get an idea of our writing quality.</p>
                <a href="{{ url('free-samples') }}" class="znh-btn-view-samples znh-hide-on-mobile">View All Samples</a>
            </div>

            <div class="znh-samples-slider-container">
                <a href="{{ url('samples') }}" class="znh-samples-floating-icon" title="View all samples">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                        <polyline points="14 2 14 8 20 8" />
                        <line x1="9" y1="15" x2="15" y2="15" />
                        <line x1="9" y1="11" x2="11" y2="11" />
                    </svg>
                </a>

                <div class="znh-samples-track-wrapper" id="znh-samplesTrackWrapper">
                    <div class="znh-samples-track">
                        <a href="{{ url('samples') }}" class="znh-sample-card">
                            <div class="znh-sample-img-wrapper">
                                <img src="/public/new-home-page-images/Business-Report.webp" alt="Business Report"
                                    class="znh-sample-image">
                            </div>
                            <div class="znh-sample-info">
                                <h4>Business Report</h4>
                                <span>Management</span>
                                <div class="znh-pdf-badge">PDF</div>
                            </div>
                        </a>
                        <a href="{{ url('samples') }}" class="znh-sample-card">
                            <div class="znh-sample-img-wrapper">
                                <img src="/public/new-home-page-images/Essay-Writing.webp" alt="Nursing Essay"
                                    class="znh-sample-image">
                            </div>
                            <div class="znh-sample-info">
                                <h4>Nursing Essay</h4>
                                <span>Nursing</span>
                                <div class="znh-pdf-badge">PDF</div>
                            </div>
                        </a>
                        <a href="{{ url('samples') }}" class="znh-sample-card">
                            <div class="znh-sample-img-wrapper">
                                <img src="/public/new-home-page-images/Law-Case-Study.webp" alt="Law Case Study"
                                    class="znh-sample-image">
                            </div>
                            <div class="znh-sample-info">
                                <h4>Law Case Study</h4>
                                <span>Law</span>
                                <div class="znh-pdf-badge">PDF</div>
                            </div>
                        </a>
                        <a href="{{ url('samples') }}" class="znh-sample-card">
                            <div class="znh-sample-img-wrapper">
                                <img src="/public/new-home-page-images/Report-Writing.webp" alt="Marketing Plan"
                                    class="znh-sample-image">
                            </div>
                            <div class="znh-sample-info">
                                <h4>Marketing Plan</h4>
                                <span>Marketing</span>
                                <div class="znh-pdf-badge">PDF</div>
                            </div>
                        </a>
                        <a href="{{ url('samples') }}" class="znh-sample-card">
                            <div class="znh-sample-img-wrapper">
                                <img src="/public/new-home-page-images/Case-Study-Help.webp" alt="Computer Science"
                                    class="znh-sample-image">
                            </div>
                            <div class="znh-sample-info">
                                <h4>Computer Science</h4>
                                <span>Computer Science</span>
                                <div class="znh-pdf-badge">PDF</div>
                            </div>
                        </a>
                        <a href="{{ url('samples') }}" class="znh-sample-card">
                            <div class="znh-sample-img-wrapper">
                                <img src="/public/new-home-page-images/Reseacrh-Proposal.webp" alt="Research Proposal"
                                    class="znh-sample-image">
                            </div>
                            <div class="znh-sample-info">
                                <h4>Research Proposal</h4>
                                <span>PhD Proposal</span>
                                <div class="znh-pdf-badge">PDF</div>
                            </div>
                        </a>
                    </div>
                </div>

                <button class="znh-samples-arrow znh-right-arrow" onclick="znhSlideSamples(1)">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </button>
            </div>

            <a href="{{ url('samples') }}" class="znh-view-all-samples-btn-mobile">View All Samples &rarr;</a>
        </div>

        <style>
            .znh-samples-section {
                padding: 3rem 2rem;
                background-color: #fafaff;
                /* Very faint blue/purple tint */
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                border-bottom: 1px solid rgba(243, 232, 255, 0.5);
                display: flex;
                justify-content: center;
                overflow: hidden;
            }

            .znh-samples-container {
                max-width: 1400px;
                width: 100%;
                display: flex;
                align-items: center;
                gap: 2.5rem;
            }

            .znh-samples-header {
                width: 260px;
                flex-shrink: 0;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .znh-samples-title {
                font-size: 1.8rem;
                font-weight: 800;
                color: #1e1b4b;
                margin: 0;
                line-height: 1.2;
            }

            .znh-samples-desc {
                font-size: 0.95rem;
                color: #4b5563;
                margin: 0;
                line-height: 1.5;
            }

            .znh-btn-view-samples {
                background: #7c3aed;
                color: white;
                text-decoration: none;
                padding: 0.75rem 1.25rem;
                border-radius: 8px;
                font-size: 0.9rem;
                font-weight: 600;
                text-align: center;
                width: max-content;
                transition: background 0.3s ease, transform 0.2s ease;
                margin-top: 0.5rem;
            }

            .znh-btn-view-samples:hover {
                background: #6d28d9;
                color: white !important;
                transform: translateY(-2px);
            }

            .znh-samples-slider-container {
                flex: 1;
                position: relative;
                display: flex;
                align-items: center;
                gap: 1rem;
                min-width: 0;
                /* Important for flex child to not overflow */
            }

            .znh-samples-track-wrapper {
                width: 100%;
                overflow-x: auto;
                scroll-behavior: smooth;
                -ms-overflow-style: none;
                scrollbar-width: none;
                padding: 1rem 0;
                /* Fade effect on right edge */
                mask-image: linear-gradient(to right, black 85%, transparent);
                -webkit-mask-image: linear-gradient(to right, black 85%, transparent);
            }

            .znh-samples-track-wrapper::-webkit-scrollbar {
                display: none;
            }

            .znh-samples-track {
                display: flex;
                gap: 1.25rem;
                width: max-content;
            }

            .znh-sample-card {
                background: white;
                border-radius: 16px;
                display: flex;
                flex-direction: column;
                width: 220px;
                flex-shrink: 0;
                text-decoration: none;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
                border: 1px solid #f3f4f6;
            }

            .znh-sample-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
            }

            .znh-sample-img-wrapper {
                width: 100%;
                height: 130px;
                background: #f3f4f6;
                overflow: hidden;
            }

            .znh-sample-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .znh-sample-card:hover .znh-sample-image {
                transform: scale(1.08);
            }

            .znh-sample-info {
                padding: 1rem;
                position: relative;
                display: flex;
                flex-direction: column;
                gap: 4px;
            }

            .znh-sample-info h4 {
                margin: 0;
                font-size: 0.95rem;
                font-weight: 700;
                color: #111827;
            }

            .znh-sample-info span {
                font-size: 0.75rem;
                color: #6b7280;
                font-weight: 500;
            }

            .znh-pdf-badge {
                position: absolute;
                bottom: 1rem;
                right: 1rem;
                background: #7c3aed;
                color: white;
                font-size: 0.65rem;
                font-weight: 800;
                padding: 0.3rem 0.6rem;
                border-radius: 6px;
                letter-spacing: 0.5px;
            }

            .znh-samples-floating-icon {
                position: absolute;
                top: -45px;
                /* Creates a gap from the cards below */
                right: 20px;
                /* Slight margin from the edge */
                width: 48px;
                height: 48px;
                background: #faf5ff;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #6d28d9;
                box-shadow: 0 4px 10px rgba(109, 40, 217, 0.05);
                z-index: 5;
                text-decoration: none;
                transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                border: 1px solid rgba(109, 40, 217, 0.1);
            }

            .znh-samples-floating-icon:hover {
                transform: translateY(-5px) scale(1.05) rotate(5deg);
                box-shadow: 0 8px 15px rgba(109, 40, 217, 0.15);
                background: #f3e8ff;
            }

            .znh-samples-floating-icon svg {
                width: 22px;
                height: 22px;
            }

            .znh-samples-arrow {
                background: white;
                border: 1px solid #e5e7eb;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
                cursor: pointer;
                color: #6b7280;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 45px;
                height: 45px;
                border-radius: 50%;
                transition: all 0.3s ease;
                flex-shrink: 0;
                z-index: 2;
            }

            .znh-samples-arrow:hover {
                background: #f9fafb;
                color: #111827;
                border-color: #d1d5db;
            }

            .znh-samples-arrow svg {
                width: 20px;
                height: 20px;
            }

            @media (max-width: 992px) {
                .znh-samples-container {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1.5rem;
                }

                .znh-samples-header {
                    width: 100%;
                    flex-direction: row;
                    align-items: center;
                    justify-content: space-between;
                }

                .znh-samples-desc {
                    display: none;
                    /* Hide on small screens to save space */
                }
            }

            .znh-view-all-samples-btn-mobile {
                display: none;
            }

            @media (max-width: 768px) {
                .znh-samples-section {
                    padding: 1rem 1rem;
                    flex-direction: column;
                }

                .znh-samples-container {
                    flex-direction: column;
                    gap: 1rem;
                }

                .znh-samples-header {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .znh-samples-title {
                    font-size: 1.4rem;
                }

                .znh-samples-desc {
                    display: block !important;
                    font-size: 0.85rem;
                }

                .znh-hide-on-mobile {
                    display: none !important;
                }

                .znh-samples-arrow,
                .znh-samples-floating-icon {
                    display: none;
                }

                .znh-samples-slider-container {
                    width: 100%;
                }

                .znh-samples-track-wrapper {
                    mask-image: none;
                    -webkit-mask-image: none;
                    padding: 0.5rem 0;
                }

                .znh-samples-track {
                    gap: 0.5rem;
                }

                /* Make cards smaller to fit multiple on screen */
                .znh-sample-card {
                    width: 120px;
                    border-radius: 12px;
                }

                .znh-sample-img-wrapper {
                    height: 80px;
                }

                .znh-sample-info {
                    padding: 0.5rem;
                }

                .znh-sample-info h4 {
                    font-size: 0.65rem;
                    white-space: normal;
                    line-height: 1.2;
                }

                .znh-sample-info span {
                    font-size: 0.55rem;
                }

                .znh-pdf-badge {
                    font-size: 0.5rem;
                    padding: 0.2rem 0.4rem;
                    bottom: 0.5rem;
                    right: 0.5rem;
                }

                .znh-view-all-samples-btn-mobile {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    padding: 12px;
                    margin-top: 10px;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 8px;
                    color: #7c3aed;
                    font-size: 0.8rem;
                    font-weight: 600;
                    text-decoration: none;
                    transition: all 0.3s ease;
                }

                .znh-view-all-samples-btn-mobile:hover {
                    background: #f3f4f6;
                    color: #6d28d9 !important;
                }
            }
        </style>

        <script>
            function znhSlideSamples(direction) {
                const wrapper = document.getElementById('znh-samplesTrackWrapper');
                const card = wrapper.querySelector('.znh-sample-card');
                const cardWidth = card ? card.offsetWidth : 220;
                const gap = window.innerWidth <= 768 ? 8 : 20;
                const scrollAmount = (cardWidth + gap) * direction;

                // Loop back to start smoothly
                if (direction === 1 && (wrapper.scrollLeft + wrapper.clientWidth >= wrapper.scrollWidth - 10)) {
                    wrapper.scrollTo({ left: 0, behavior: 'smooth' });
                    return;
                }

                wrapper.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }

            // Auto-slide every 3 seconds for infinite loop
            setInterval(() => {
                znhSlideSamples(1);
            }, 3000);
        </script>
    </section>

    <!-- Dual Features Section: Success & Tools -->
    <section class="znh-dual-features-section">
        <div class="znh-dual-container">

            <div class="znh-feature-box znh-success-box">
                <div class="znh-feature-header">
                    <h2>Real Results. Real Success.</h2>
                    <p>See how we help students improve their grades.</p>
                </div>

                <div class="znh-success-cards-row">
                    <div class="znh-success-card">
                        <div class="znh-grade-stats">
                            <div class="znh-grade-before">
                                <span class="znh-percent znh-text-orange">68%</span>
                                <span class="znh-label">Before</span>
                            </div>
                            <div class="znh-grade-arrow">➔</div>
                            <div class="znh-grade-after">
                                <span class="znh-percent znh-text-green">82%</span>
                                <span class="znh-label">After</span>
                            </div>
                        </div>
                        <div class="znh-subject-info">
                            <strong>Business Management</strong>
                            <span>University of Manchester</span>
                        </div>
                        <div class="znh-student-profile">
                            <img src="/assets/media/layout/testimonial/testimonial4.webp" alt="James T.">
                            <span>James T.</span>
                        </div>
                    </div>

                    <div class="znh-success-card">
                        <div class="znh-grade-stats">
                            <div class="znh-grade-before">
                                <span class="znh-percent znh-text-orange">64%</span>
                                <span class="znh-label">Before</span>
                            </div>
                            <div class="znh-grade-arrow">➔</div>
                            <div class="znh-grade-after">
                                <span class="znh-percent znh-text-green">78%</span>
                                <span class="znh-label">After</span>
                            </div>
                        </div>
                        <div class="znh-subject-info">
                            <strong>Nursing Case Study</strong>
                            <span>King's College London</span>
                        </div>
                        <div class="znh-student-profile">
                            <img src="/assets/media/layout/testimonial/testimonial5.webp" alt="Olivia D.">
                            <span>Olivia D.</span>
                        </div>
                    </div>

                    <div class="znh-success-card">
                        <div class="znh-grade-stats">
                            <div class="znh-grade-before">
                                <span class="znh-percent znh-text-orange">59%</span>
                                <span class="znh-label">Before</span>
                            </div>
                            <div class="znh-grade-arrow">➔</div>
                            <div class="znh-grade-after">
                                <span class="znh-percent znh-text-green">74%</span>
                                <span class="znh-label">After</span>
                            </div>
                        </div>
                        <div class="znh-subject-info">
                            <strong>Law Essay</strong>
                            <span>University of Birmingham</span>
                        </div>
                        <div class="znh-student-profile">
                            <img src="/assets/media/layout/testimonial/testimonial6.webp" alt="William K.">
                            <span>William K.</span>
                        </div>
                    </div>
                </div>

                <div class="znh-feature-link znh-align-right">
                    <a href="#">View More Success Stories ➔</a>
                </div>
            </div>

            <div class="znh-feature-box znh-tools-box">
                <div class="znh-feature-header">
                    <h2>Academic Tools & Resources</h2>
                    <p>Free tools designed to support your academic journey.</p>
                </div>

                <div class="znh-tools-grid-row">
                    <a href="#" class="znh-tool-square">
                        <div class="znh-tool-icon znh-bg-gray">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <circle cx="10" cy="13" r="2" />
                                <line x1="11.41" y1="14.41" x2="13.5" y2="16.5" />
                            </svg>
                        </div>
                        <span class="znh-desktop-tool-title">Grade<br>Calculator</span>
                        <div class="znh-tool-text znh-mobile-tool-content">
                            <strong>Grade Calculator</strong>
                            <span>Calculate your target grade</span>
                        </div>
                    </a>

                    <a href="#" class="znh-tool-square">
                        <div class="znh-tool-icon znh-text-orange znh-bg-orange">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <path d="M16 13H8" />
                                <path d="M16 17H8" />
                                <path d="M10 9H8" />
                            </svg>
                        </div>
                        <span class="znh-desktop-tool-title">Reference<br>Generator</span>
                        <div class="znh-tool-text znh-mobile-tool-content">
                            <strong>Reference Generator</strong>
                            <span>APA, Harvard, MLA & more</span>
                        </div>
                    </a>

                    <a href="#" class="znh-tool-square">
                        <div class="znh-tool-icon znh-text-green znh-bg-green">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2">
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                                <line x1="12" y1="22.08" x2="12" y2="12" />
                            </svg>
                        </div>
                        <span class="znh-desktop-tool-title">Plagiarism<br>Checker</span>
                        <div class="znh-tool-text znh-mobile-tool-content">
                            <strong>Plagiarism Checker</strong>
                            <span>Check originality of your work</span>
                        </div>
                    </a>

                    <a href="#" class="znh-tool-square">
                        <div class="znh-tool-icon znh-bg-indigo">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2" />
                                <line x1="8" y1="21" x2="16" y2="21" />
                                <line x1="12" y1="17" x2="12" y2="21" />
                            </svg>
                        </div>
                        <span class="znh-desktop-tool-title">Word<br>Counter</span>
                        <div class="znh-tool-text znh-mobile-tool-content">
                            <strong>Word Counter</strong>
                            <span>Count words instantly</span>
                        </div>
                    </a>
                </div>

                <div class="znh-feature-link znh-align-left">
                    <a href="#">Explore All Tools ➔</a>
                </div>
            </div>

        </div>

        <style>
            .znh-dual-features-section {
                padding: 2rem 2rem;
                background-color: #ffffff;
                font-family: 'Inter', -apple-system, sans-serif;
                display: flex;
                justify-content: center;
            }

            .znh-dual-container {
                max-width: 1400px;
                width: 100%;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }

            .znh-feature-box {
                border-radius: 20px;
                padding: 1.2rem;
                display: flex;
                flex-direction: column;
                gap: 2rem;
            }

            .znh-success-box {
                background-color: #fdfdfd;
                border: 1px solid #f3f4f6;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            }

            .znh-tools-box {
                background-color: #faf5ff;
                /* Very light purple/pink background */
                border: 1px solid #f3e8ff;
            }

            .znh-feature-header h2 {
                font-size: 1.5rem;
                font-weight: 800;
                color: #111827;
                margin: 0 0 0.5rem 0;
                letter-spacing: -0.5px;
            }

            .znh-feature-header p {
                font-size: 0.95rem;
                color: #6b7280;
                margin: 0;
                line-height: 1.4;
            }

            /* Success Cards */
            .znh-success-cards-row {
                display: flex;
                gap: 1rem;
                width: 100%;
                overflow-x: auto;
                padding-bottom: 0.5rem;
            }

            .znh-success-cards-row::-webkit-scrollbar {
                display: none;
            }

            .znh-success-card {
                background: #ffffff;
                border-radius: 16px;
                padding: 1.5rem 1rem;
                min-width: 180px;
                flex: 1;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
                border: 1px solid #f9fafb;
                display: flex;
                flex-direction: column;
                gap: 1rem;
                transition: transform 0.3s ease;
            }

            .znh-success-card:hover {
                transform: translateY(-5px);
            }

            .znh-grade-stats {
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-bottom: 1px solid #f3f4f6;
                padding-bottom: 0.8rem;
            }

            .znh-grade-before,
            .znh-grade-after {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .znh-percent {
                font-size: 1.5rem;
                font-weight: 800;
            }

            .znh-text-orange {
                color: #f97316;
            }

            .znh-text-green {
                color: #10b981;
            }

            .znh-grade-before .znh-label,
            .znh-grade-after .znh-label {
                font-size: 0.65rem;
                font-weight: 600;
                color: #9ca3af;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .znh-grade-arrow {
                color: #4b5563;
                font-size: 1rem;
                font-weight: bold;
            }

            .znh-subject-info {
                display: flex;
                flex-direction: column;
                gap: 2px;
            }

            .znh-subject-info strong {
                font-size: 0.8rem;
                color: #1f2937;
            }

            .znh-subject-info span {
                font-size: 0.7rem;
                color: #6b7280;
            }

            .znh-student-profile {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                margin-top: auto;
                /* Push to bottom */
                padding-top: 0.5rem;
            }

            .znh-student-profile img {
                width: 24px;
                height: 24px;
                border-radius: 50%;
                background: #e5e7eb;
                transition: transform 0.3s ease;
            }

            .znh-student-profile img:hover {
                transform: scale(1.3);
            }

            .znh-student-profile span {
                font-size: 0.75rem;
                font-weight: 600;
                color: #374151;
            }

            /* Tools Grid */
            .znh-tools-grid-row {
                display: flex;
                gap: 1rem;
                flex-wrap: nowrap;
                /* Ensure they stay in one line */
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 0.5rem;
            }

            .znh-tools-grid-row::-webkit-scrollbar {
                display: none;
            }

            .znh-tool-square {
                background: #ffffff;
                border-radius: 14px;
                padding: 1.4rem 0.8rem;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 0.8rem;
                flex: 1;
                min-width: 110px;
                max-width: 140px;
                text-align: center;
                text-decoration: none;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .znh-tool-square:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(109, 40, 217, 0.08);
            }

            .znh-tool-icon svg {
                width: 28px;
                height: 28px;
            }

            .znh-desktop-tool-title {
                display: block;
                font-size: 0.8rem;
                font-weight: 700;
                color: #1f2937;
                line-height: 1.3;
            }

            .znh-mobile-tool-content {
                display: none !important;
            }

            /* Links */
            .znh-feature-link a {
                color: #6d28d9;
                font-size: 0.85rem;
                font-weight: 700;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .znh-feature-link a:hover {
                color: #4c1d95;
                text-decoration: underline;
            }

            .znh-align-right {
                text-align: right;
            }

            .znh-align-left {
                text-align: left;
            }

            @media (max-width: 1100px) {
                .znh-dual-container {
                    grid-template-columns: 1fr;
                    /* Stack vertically on smaller screens */
                }

                .znh-feature-link.znh-align-right {
                    text-align: left;
                    /* Reset alignment when stacked */
                }
            }

            @media (max-width: 768px) {
                .znh-dual-features-section {
                    padding: 2rem 1rem;
                    background-color: #fafaff;
                }

                .znh-feature-box {
                    padding: 0;
                    background: transparent !important;
                    border: none !important;
                    box-shadow: none !important;
                    gap: 1.25rem;
                }

                .znh-success-card,
                .znh-tool-square {
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                    border: 1px solid #f3f4f6;
                }

                .znh-success-cards-row {
                    flex-direction: column;
                    gap: 1rem;
                }

                .znh-feature-link.znh-align-right a {
                    display: block;
                    width: 100%;
                    text-align: center;
                    padding: 12px;
                    margin-top: 10px;
                    background: #ffffff;
                    border: 1px solid #e5e7eb;
                    border-radius: 8px;
                    color: #6d28d9;
                    font-size: 0.85rem;
                    text-decoration: none;
                }

                .znh-feature-link.znh-align-left a {
                    display: block;
                    width: 100%;
                    text-align: center;
                    padding: 12px;
                    margin-top: 10px;
                    background: #ffffff;
                    border: 1px solid #e5e7eb;
                    border-radius: 8px;
                    color: #6d28d9;
                    font-size: 0.85rem;
                    text-decoration: none;
                }

                .znh-tools-grid-row {
                    flex-direction: column;
                    background: white;
                    border-radius: 16px;
                    padding: 1.5rem 1rem;
                    gap: 1.5rem;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
                }

                .znh-tool-square {
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: flex-start;
                    gap: 1rem;
                    padding: 0;
                    box-shadow: none !important;
                    border: none !important;
                    min-width: 0;
                    max-width: 100%;
                    background: transparent;
                }

                .znh-tool-icon {
                    width: 40px;
                    height: 40px;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }

                .znh-tool-icon svg {
                    width: 20px;
                    height: 20px;
                }

                .znh-desktop-tool-title {
                    display: none !important;
                }

                .znh-mobile-tool-content {
                    display: flex !important;
                }

                .znh-bg-gray {
                    background-color: #f3f4f6;
                }

                .znh-bg-orange {
                    background-color: #fff7ed;
                }

                .znh-bg-green {
                    background-color: #f0fdf4;
                }

                .znh-bg-indigo {
                    background-color: #eef2ff;
                }

                .znh-tool-text {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    text-align: left;
                    gap: 2px;
                }

                .znh-tool-text strong {
                    font-size: 0.85rem;
                    color: #111827;
                }

                .znh-tool-text span {
                    font-size: 0.75rem;
                    color: #6b7280;
                    font-weight: 500;
                }
            }
        </style>
    </section>

    @php
        // Provide dummy data for both desktop and mobile if real data is missing on this route
        $expertsData = isset($data['expert']) && count($data['expert']) > 0 ? $data['expert'] : collect([
            (object) ['image' => '/assets/media/layout/testimonial/testimonial5.webp', 'name' => 'Dr. Laura Baker', 'subject' => 'Business Management', 'service' => 'Essay Writing', 'content' => 'Expert in business management and strategy.'],
            (object) ['image' => '/assets/media/layout/testimonial/testimonial6.webp', 'name' => 'Prof. Oliver Bennett', 'subject' => 'Law Expert', 'service' => 'Dissertation', 'content' => 'Expert in international and corporate law.'],
            (object) ['image' => '/assets/media/layout/testimonial/testimonial1.webp', 'name' => 'Dr. Sophia Adams', 'subject' => 'Nursing Expert', 'service' => 'Coursework', 'content' => 'Specializes in clinical nursing and healthcare.'],
            (object) ['image' => '/assets/media/layout/testimonial/testimonial2.webp', 'name' => 'Dr. Daniel Carter', 'subject' => 'Computer Science', 'service' => 'Assignment', 'content' => 'Expert in algorithms, data structures, and AI.']
        ]);
    @endphp


    <style>
        .znh-desktop-experts {
            display: block;
        }

        .znh-mobile-experts {
            display: none;
            padding: 2rem 1.5rem;
            background-color: #fafaff;
            font-family: 'Inter', -apple-system, sans-serif;
        }

        @media (max-width: 768px) {
            .znh-desktop-experts {
                display: none !important;
            }

            .znh-mobile-experts {
                display: flex;
                flex-direction: column;
            }

            .znh-experts-header h2 {
                font-size: 1.4rem;
                font-weight: 800;
                color: #111827;
                margin: 0 0 0.4rem 0;
            }

            .znh-experts-header p {
                font-size: 0.85rem;
                color: #4b5563;
                margin: 0 0 1.5rem 0;
            }

            .znh-expert-mobile-card {
                background: #ffffff;
                border-radius: 12px;
                padding: 1.2rem 1rem;
                display: flex;
                align-items: center;
                gap: 1rem;
                margin-bottom: 0.8rem;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
                border: 1px solid #f9fafb;
            }

            .znh-expert-mobile-avatar {
                width: 65px;
                height: 65px;
                border-radius: 50%;
                object-fit: cover;
                background: #f3f4f6;
            }

            .znh-expert-mobile-info {
                display: flex;
                flex-direction: column;
                flex: 1;
            }

            .znh-expert-mobile-name {
                font-size: 0.95rem;
                font-weight: 700;
                color: #111827;
                margin: 0 0 0.2rem 0;
            }

            .znh-expert-mobile-subject {
                font-size: 0.75rem;
                color: #6b7280;
                margin: 0 0 0.3rem 0;
            }

            .znh-expert-mobile-exp {
                font-size: 0.75rem;
                color: #4b5563;
                font-weight: 600;
                margin: 0 0 0.4rem 0;
            }

            .znh-expert-mobile-rating {
                display: flex;
                align-items: center;
                gap: 0.4rem;
                font-size: 0.8rem;
                color: #4b5563;
                font-weight: 600;
            }

            .znh-expert-mobile-rating i {
                color: #f59e0b;
                font-style: normal;
                font-size: 1rem;
            }

            .znh-expert-mobile-arrow {
                color: #d1d5db;
                font-size: 1.5rem;
                padding-left: 0.5rem;
            }

            .znh-mobile-experts .znh-view-more-link a {
                display: block;
                width: 100%;
                text-align: center;
                padding: 12px;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                color: #6d28d9;
                font-size: 0.85rem;
                font-weight: 700;
                text-decoration: none;
            }
        }
    </style>

    <!-- Reviews and FAQ Section -->
    <section class="znh-reviews-faq-section">
        <div class="znh-reviews-faq-container">

            <div class="znh-reviews-column">
                <div class="znh-section-header">
                    <h2>What Students Say <span class="znh-text-blue">About Us</span></h2>
                </div>

                <!-- Swiper CSS & JS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

                <div class="swiper znhReviewsSwiper">
                    <div class="swiper-wrapper">
                        @php
                            $studentReviews = [
                                [
                                    'name' => 'Liam S.',
                                    'meta' => 'Liverpool, Programming',
                                    'text' => 'The step-by-step guidance helped me organise my thoughts clearly. I felt confident submitting my assignment on time.',
                                    'image' => '/assets/media/layout/testimonial/testimonial1.webp',
                                ],
                                [
                                    'name' => 'Emma W.',
                                    'meta' => 'Oxford, Law',
                                    'text' => 'The personalised feedback was excellent-it taught me how to analyse my work rather than just correct mistakes critically.',
                                    'image' => '/assets/media/layout/testimonial/testimonial2.webp',
                                ],
                                [
                                    'name' => 'Amelia C.',
                                    'meta' => 'Sheffield, Computer Science',
                                    'text' => 'I struggled with referencing styles before. Their guidance made it straightforward and saved me hours of stress.',
                                    'image' => '/assets/media/layout/testimonial/testimonial3.webp',
                                ],
                                [
                                    'name' => 'Chloe D.',
                                    'meta' => 'Bristol, Nursing',
                                    'text' => 'The suggestions were practical and easy to implement. It felt like having a personal tutor on hand.',
                                    'image' => '/assets/media/layout/testimonial/testimonial4.webp',
                                ],
                                [
                                    'name' => 'Oliver M.',
                                    'meta' => 'Glasgow, Engineering',
                                    'text' => 'I was worried about my dissertation writing skills. Their constructive feedback helped me improve structure and clarity.',
                                    'image' => '/assets/media/layout/testimonial/testimonial5.webp',
                                ],
                                [
                                    'name' => 'Sophia R.',
                                    'meta' => 'Edinburgh, Marketing',
                                    'text' => 'They didn’t just correct mistakes-they explained why. It really enhanced my understanding of academic writing',
                                    'image' => '/assets/media/layout/testimonial/testimonial6.webp',
                                ],
                            ];
                        @endphp

                        @foreach($studentReviews as $r)
                            <div class="swiper-slide">
                                <div class="znh-review-card" style="height: 100%;">
                                    <div class="znh-review-user">
                                        <img src="{{ $r['image'] }}" alt="{{ $r['name'] }}">
                                        <div class="znh-user-info">
                                            <strong>{{ $r['name'] }}</strong>
                                            <span>{{ $r['meta'] }}</span>
                                        </div>
                                    </div>
                                    <div class="znh-review-stars">
                                        ★★★★★
                                    </div>
                                    <p class="znh-review-text">{{ $r['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="znh-reviews-pagination"></div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        new Swiper(".znhReviewsSwiper", {
                            slidesPerView: 3,
                            spaceBetween: 20,
                            speed: 600,
                            loop: true,
                            autoplay: {
                                delay: 2500,
                                disableOnInteraction: false,
                                pauseOnMouseEnter: true
                            },
                            pagination: {
                                el: ".znh-reviews-pagination",
                                clickable: true,
                            },
                            breakpoints: {
                                0: { slidesPerView: 1, spaceBetween: 16 },
                                768: { slidesPerView: 2, spaceBetween: 20 },
                                1024: { slidesPerView: 3, spaceBetween: 20 },
                            }
                        });
                    });
                </script>
                <div class="znh-view-more-link znh-align-right">
                    <a href="#">View More Reviews &rarr;</a>
                </div>
            </div>

            <div class="znh-faq-column">
                <div class="znh-section-header">
                    <h2>Frequently Asked Questions</h2>
                </div>

                <div class="znh-faq-accordion">
                    <div class="znh-faq-item">
                        <button class="znh-faq-question">
                            <span>Is assignment help legal in the UK?</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <div class="znh-faq-answer">
                            <p>Yes, seeking assignment help is completely legal. Our services are designed to provide
                                research assistance, model papers, and academic guidance to help you understand your topic
                                better and improve your own writing.</p>
                        </div>
                    </div>

                    <div class="znh-faq-item">
                        <button class="znh-faq-question">
                            <span>How fast can you deliver my order?</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <div class="znh-faq-answer">
                            <p>We offer flexible delivery options ranging from standard delivery (few days) to urgent
                                delivery within 24 hours or even less, depending on the complexity of the task.</p>
                        </div>
                    </div>

                    <div class="znh-faq-item">
                        <button class="znh-faq-question">
                            <span>Will my assignment be plagiarism-free?</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <div class="znh-faq-answer">
                            <p>Absolutely. Every paper is written from scratch by our experts. We also provide a free
                                plagiarism report with your completed order to guarantee its originality.</p>
                        </div>
                    </div>

                    <div class="znh-faq-item">
                        <button class="znh-faq-question">
                            <span>Can I communicate with my expert?</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <div class="znh-faq-answer">
                            <p>Yes, you can easily communicate with your assigned expert through our secure messaging portal
                                to track progress, provide additional materials, or ask questions.</p>
                        </div>
                    </div>

                    <div class="znh-faq-item">
                        <button class="znh-faq-question">
                            <span>Do you offer unlimited revisions?</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <div class="znh-faq-answer">
                            <p>Yes, we offer unlimited free revisions within a specified timeframe to ensure you are 100%
                                satisfied with the final work delivered.</p>
                        </div>
                    </div>
                </div>

                <div class="znh-view-more-link znh-align-left" style="margin-top: 1rem;">
                    <a href="#">View All FAQs &rarr;</a>
                </div>
            </div>

        </div>

        <style>
            .znh-reviews-faq-section {
                padding: 2rem 2rem;
                background-color: #fafaff;
                /* Very light background to differentiate from pure white above */
                font-family: 'Inter', -apple-system, sans-serif;
                display: flex;
                justify-content: center;
                border-top: 1px solid #f3f4f6;
            }

            .znh-reviews-faq-container {
                max-width: 1400px;
                width: 100%;
                display: grid;
                grid-template-columns: 1.3fr 0.9fr;
                /* Left side slightly wider */
                gap: 4rem;
            }

            .znh-section-header h2 {
                font-size: 1.6rem;
                font-weight: 800;
                color: #111827;
                margin: 0 0 1.5rem 0;
                letter-spacing: -0.5px;
            }

            .znh-text-blue {
                color: #3b82f6;
            }

            /* Reviews Grid */
            .znh-reviews-column {
                display: flex;
                flex-direction: column;
            }

            .znh-reviews-column {
                display: flex;
                flex-direction: column;
                overflow: hidden;
                /* Prevent swiper spill */
            }

            .znhReviewsSwiper {
                width: 100%;
                padding-bottom: 2.5rem;
                /* Space for pagination */
            }

            .znh-reviews-pagination {
                text-align: center;
                margin-top: 1rem;
            }

            .znh-reviews-pagination .swiper-pagination-bullet {
                background: #6d28d9;
                opacity: 0.3;
            }

            .znh-reviews-pagination .swiper-pagination-bullet-active {
                opacity: 1;
            }

            .znh-review-card {
                background: #ffffff;
                border-radius: 16px;
                padding: 1.5rem 1.25rem;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
                border: 1px solid #f9fafb;
                display: flex;
                flex-direction: column;
                gap: 0.8rem;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .znh-review-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            }

            .znh-review-user {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .znh-review-user img {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #f3f4f6;
                object-fit: cover;
                border: 2px solid #e5e7eb;
            }

            .znh-user-info {
                display: flex;
                flex-direction: column;
            }

            .znh-user-info strong {
                font-size: 0.85rem;
                color: #111827;
                line-height: 1.2;
            }

            .znh-user-info span {
                font-size: 0.75rem;
                color: #6b7280;
            }

            .znh-review-stars {
                color: #f59e0b;
                /* Golden Yellow */
                font-size: 1.1rem;
                letter-spacing: 2px;
            }

            .znh-review-text {
                font-size: 0.85rem;
                color: #4b5563;
                line-height: 1.5;
                margin: 0;
            }

            /* View More Links */
            .znh-view-more-link a {
                color: #6d28d9;
                font-size: 0.85rem;
                font-weight: 700;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .znh-view-more-link a:hover {
                color: #4c1d95 !important;
                text-decoration: underline;
            }

            /* FAQ Accordion */
            .znh-faq-column {
                display: flex;
                flex-direction: column;
            }

            .znh-faq-accordion {
                display: flex;
                flex-direction: column;
                gap: 0;
                /* Items flush together with bottom borders */
                border-top: 1px solid #f3f4f6;
            }

            .znh-faq-item {
                border-bottom: 1px solid #f3f4f6;
            }

            .znh-faq-question {
                width: 100%;
                text-align: left;
                background: none;
                border: none;
                padding: 1.25rem 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                cursor: pointer;
                font-size: 0.95rem;
                font-weight: 600;
                color: #1f2937;
                transition: color 0.2s ease;
                font-family: inherit;
            }

            .znh-faq-question:hover {
                color: #4f46e5;
            }

            .znh-faq-question svg {
                width: 18px;
                height: 18px;
                color: #6d28d9;
                transition: transform 0.3s ease;
                flex-shrink: 0;
                margin-left: 1rem;
            }

            .znh-faq-item.znh-active .znh-faq-question svg {
                transform: rotate(180deg);
            }

            .znh-faq-item.znh-active .znh-faq-question {
                color: #4f46e5;
            }

            .znh-faq-answer {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.4s ease-out;
            }

            .znh-faq-answer p {
                padding: 0 0 1.25rem 0;
                margin: 0;
                font-size: 0.9rem;
                color: #4b5563;
                line-height: 1.6;
            }

            /* Responsive */
            @media (max-width: 1200px) {
                .znh-reviews-faq-container {
                    grid-template-columns: 1fr;
                    /* Stack vertically */
                    gap: 3rem;
                }

                .znhReviewsSwiper {
                    /* Smooth fade on right edge can be applied to swiper if wanted */
                    mask-image: linear-gradient(to right, black 90%, transparent);
                    -webkit-mask-image: linear-gradient(to right, black 90%, transparent);
                }

                .znh-review-card {
                    min-width: 0;
                    /* Ensure cards don't shrink too much when scrolling */
                }
            }

            @media (max-width: 768px) {
                .znhReviewsSwiper {
                    mask-image: none;
                    -webkit-mask-image: none;
                }

                .znh-review-card {
                    min-width: 0;
                    width: 100%;
                }

                .znh-reviews-faq-section {
                    padding: 2rem 1rem;
                }

                .znh-view-more-link a {
                    display: block !important;
                    width: 100% !important;
                    text-align: center !important;
                    padding: 12px !important;
                    margin-top: 10px !important;
                    background: #ffffff !important;
                    border: 1px solid #e5e7eb !important;
                    border-radius: 8px !important;
                    color: #6d28d9 !important;
                    font-size: 0.85rem !important;
                    text-decoration: none !important;
                }

                .znh-faq-accordion {
                    gap: 0.8rem;
                    border-top: none;
                }

                .znh-faq-item {
                    background: #ffffff;
                    border-radius: 12px;
                    border: none;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
                    padding: 0 1rem;
                }

                .znh-faq-question {
                    padding: 1rem 0;
                }
            }
        </style>

        <script>
            // Simple Vanilla JS for FAQ Accordion
            document.addEventListener('DOMContentLoaded', function () {
                const faqQuestions = document.querySelectorAll('.znh-faq-question');

                faqQuestions.forEach(question => {
                    question.addEventListener('click', () => {
                        const item = question.parentNode;
                        const answer = item.querySelector('.znh-faq-answer');
                        const isActive = item.classList.contains('znh-active');

                        // Close all others (optional: remove this if you want multiple open)
                        document.querySelectorAll('.znh-faq-item').forEach(otherItem => {
                            otherItem.classList.remove('znh-active');
                            otherItem.querySelector('.znh-faq-answer').style.maxHeight = null;
                        });

                        // If it wasn't active, open it
                        if (!isActive) {
                            item.classList.add('znh-active');
                            answer.style.maxHeight = answer.scrollHeight + "px";
                        }
                    });
                });
            });
        </script>
    </section>
    <!-- CTA Banner Section -->
    <section class="znh-cta-banner-section">
        <div class="znh-cta-banner-container">
            <div class="znh-cta-bg-shapes"></div>
            <img src="/public/new-home-page-images/Cta-New.webp" alt="Student" class="znh-cta-student-img">

            <div class="znh-cta-content">
                <h2>Stuck On Your Assignment?</h2>
                <p>Get expert help and improve your grades with confidence.</p>

                <div class="znh-cta-features">
                    <div class="znh-cta-feature">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            <path d="M12 11v-4" />
                            <path d="M12 15h.01" />
                        </svg>
                        <div class="znh-feature-text">
                            <strong>24/7 Support</strong>
                            <span>We're here anytime</span>
                        </div>
                    </div>
                    <div class="znh-cta-feature">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        <div class="znh-feature-text">
                            <strong>Expert Writers</strong>
                            <span>Subject specialists</span>
                        </div>
                    </div>
                    <div class="znh-cta-feature">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                            <path d="M12 2v2" />
                        </svg>
                        <div class="znh-feature-text">
                            <strong>On-Time Delivery</strong>
                            <span>Before your deadline</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="znh-cta-action">
                <a href="/upload-your-assignment" class="znh-cta-btn">Get Free Quote Now &rarr;</a>
                <div class="znh-cta-social-proof">
                    <div class="znh-avatars">
                        <img src="/assets/media/layout/testimonial/testimonial1.webp" alt="Student">
                        <img src="/assets/media/layout/testimonial/testimonial2.webp" alt="Student">
                        <img src="/assets/media/layout/testimonial/testimonial3.webp" alt="Student">
                        <img src="/assets/media/layout/testimonial/testimonial4.webp" alt="Student">
                    </div>
                    <span>Join 25,000+ Happy<br>Students</span>
                </div>
            </div>
        </div>

        <style>
            .znh-cta-banner-section {
                padding: 1rem 1rem 2rem 1rem;
                display: flex;
                justify-content: center;
                background-color: #fafaff;
                font-family: 'Inter', -apple-system, sans-serif;
            }

            .znh-cta-banner-container {
                max-width: 1400px;
                width: 100%;
                /* Purple to peach gradient matching image */
                background: linear-gradient(to right, #241468 0%, #461f8d 40%, #b23b8c 75%, #db6161 100%);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 2.5rem 3rem 2.5rem 380px;
                position: relative;
                color: white;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                overflow: visible;
            }

            .znh-cta-bg-shapes {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                width: 400px;
                overflow: hidden;
                border-radius: 0 12px 12px 0;
                pointer-events: none;
                z-index: 1;
            }

            .znh-cta-bg-shapes::before,
            .znh-cta-bg-shapes::after {
                content: '';
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.06);
            }

            .znh-cta-bg-shapes::before {
                width: 300px;
                height: 300px;
                top: -100px;
                right: -50px;
            }

            .znh-cta-bg-shapes::after {
                width: 250px;
                height: 250px;
                bottom: -80px;
                right: 150px;
            }

            .znh-cta-student-img {
                position: absolute;
                left: -4rem;
                bottom: 0;
                height: 130%;
                max-width: 450px;
                z-index: 2;
                pointer-events: none;
                object-fit: contain;
                object-position: bottom left;
            }

            .znh-cta-content {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
                flex: 1;
                z-index: 2;
            }

            .znh-cta-content h2 {
                font-size: 2rem;
                font-weight: 700;
                margin: 0;
                letter-spacing: -0.5px;
            }

            .znh-cta-content p {
                font-size: 1rem;
                color: rgba(255, 255, 255, 0.9);
                margin: 0 0 1.5rem 0;
            }

            .znh-cta-features {
                display: flex;
                gap: 2rem;
                align-items: center;
            }

            .znh-cta-feature {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .znh-cta-feature svg {
                width: 26px;
                height: 26px;
                opacity: 0.9;
                color: #e5e7eb;
            }

            .znh-cta-feature .znh-feature-text {
                display: flex;
                flex-direction: column;
            }

            .znh-cta-feature strong {
                font-size: 0.95rem;
                line-height: 1.2;
                font-weight: 700;
            }

            .znh-cta-feature span {
                font-size: 0.8rem;
                color: rgba(255, 255, 255, 0.75);
            }

            .znh-cta-action {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 1.2rem;
                min-width: 280px;
                margin-left: 2rem;
                z-index: 2;
            }

            .znh-cta-btn {
                background: linear-gradient(to right, #ff8b49, #fa6830);
                color: white;
                font-weight: 700;
                font-size: 1.1rem;
                padding: 1rem 2rem;
                border-radius: 8px;
                text-decoration: none;
                box-shadow: 0 10px 20px rgba(250, 104, 48, 0.3);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                width: 100%;
                text-align: center;
                border: none;
            }

            .znh-cta-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 25px rgba(250, 104, 48, 0.4);
                color: white !important;
            }

            .znh-cta-social-proof {
                display: flex;
                align-items: center;
                gap: 0.8rem;
                width: 100%;
            }

            .znh-cta-social-proof .znh-avatars {
                display: flex;
            }

            .znh-cta-social-proof .znh-avatars img {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                border: 2px solid #241468;
                margin-left: -10px;
                background: #f3f4f6;
                transition: transform 0.3s ease, z-index 0.3s ease;
                position: relative;
                z-index: 1;
            }

            .znh-cta-social-proof .znh-avatars img:hover {
                transform: scale(1.4);
                z-index: 10;
                border-color: #ff8b49;
            }

            .znh-cta-social-proof .znh-avatars img:first-child {
                margin-left: 0;
            }

            .znh-cta-social-proof span {
                font-size: 0.85rem;
                font-weight: 500;
                line-height: 1.3;
                color: rgba(255, 255, 255, 0.95);
            }

            @media (max-width: 1200px) {
                .znh-cta-banner-container {
                    padding: 2.5rem 2rem 2.5rem 260px;
                }

                .znh-cta-student-img {
                    left: 1rem;
                    height: 110%;
                }
            }

            @media (max-width: 992px) {
                .znh-cta-banner-container {
                    padding: 3rem 2rem;
                    flex-direction: column;
                    text-align: center;
                    gap: 2.5rem;
                    overflow: hidden;
                }

                .znh-cta-student-img {
                    display: none;
                }

                .znh-cta-content,
                .znh-cta-action {
                    display: contents;
                    /* Allow flex reordering on main container */
                }

                .znh-cta-banner-container>* {
                    width: 100%;
                }

                .znh-cta-banner-container h2 {
                    order: 1;
                    margin: 0;
                }

                .znh-cta-banner-container p {
                    order: 2;
                    margin: 0;
                }

                .znh-cta-btn {
                    order: 3;
                    width: 100% !important;
                    max-width: 400px;
                    display: block;
                }

                .znh-cta-features {
                    order: 4;
                    justify-content: center;
                    flex-wrap: wrap;
                    margin-bottom: 1rem;
                }

                .znh-cta-social-proof {
                    order: 5;
                    justify-content: center;
                    margin: 0 auto;
                    width: max-content;
                }
            }

            @media (max-width: 768px) {
                .znh-cta-features {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 0.5rem;
                    width: 100%;
                }

                .znh-cta-feature {
                    flex-direction: column;
                    text-align: center;
                    gap: 0.5rem;
                }

                .znh-cta-feature svg {
                    width: 28px;
                    height: 28px;
                    margin: 0 auto;
                    background: rgba(255, 255, 255, 0.1);
                    padding: 4px;
                    border-radius: 50%;
                }

                .znh-cta-feature strong {
                    font-size: 0.75rem;
                    line-height: 1.1;
                }

                .znh-cta-feature span {
                    font-size: 0.65rem;
                    line-height: 1.1;
                }

                .znh-cta-banner-container {
                    padding: 2.5rem 1rem;
                    gap: 1.5rem;
                }
            }
        </style>
    </section>
    <style>
        /* Hide the global default footer for this specific page so the new one replaces it */
        .main-footer {
            display: none !important;
        }
    </style>
@endsection