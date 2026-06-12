@extends('frontend-layouts.app')

@push('styles')
    <style>
        /* Hide the old global header and footer for the new page */
        .main-header,
        .main-footer {
            display: none !important;
        }

        /* Include Select2 styling inside our scope */
        @import url("https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css");

        /* Zudio New Writers (znw) Styles */
        .znw-page-wrapper {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #fdfcff;
        }

        .znw-hero-section {
            padding: 1rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 0;
            position: relative;
        }

        .znw-hero-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .znw-hero-content {
            flex: 1;
            max-width: 750px;
        }

        .znw-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #f3efff;
            color: #4b23b3;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .znw-hero-badge svg {
            width: 18px;
            height: 18px;
        }

        .znw-hero-title {
            font-size: 2.4rem;
            font-weight: 800;
            color: #1a1530;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            letter-spacing: -0.5px;
        }

        .znw-br-mobile {
            display: none;
        }

        @media (min-width: 993px) {
            .znw-desktop-nowrap {
                white-space: nowrap;
            }
        }

        .znw-hero-title .znw-text-purple {
            color: #6d28d9;
        }

        .znw-hero-title .znw-text-gradient {
            background: linear-gradient(90deg, #db2777, #ea580c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .znw-hero-desc {
            font-size: 1.1rem;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .znw-hero-image-wrapper {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            position: relative;
        }

        .znw-hero-image-wrapper img {
            max-width: 100%;
            height: auto;
            position: relative;
            z-index: 1;
            /* Balanced size so it's not too small, but doesn't create huge top/bottom gaps */
            max-height: 420px;
            object-fit: contain;
        }

        /* Filters Section */
        .znw-filters-container {
            background: #ffffff;
            border-radius: 16px;
            padding: 1.5rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            display: flex;
            align-items: center;
            gap: 0;
            margin-top: -2rem; /* Pull up to cover extra space smoothly */
            position: relative;
            z-index: 10;
        }

        .znw-filter-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex: 1;
            padding: 0 1rem;
        }

        .znw-filter-icon {
            width: 20px;
            height: 20px;
            color: #6b7280;
            flex-shrink: 0;
            display: none;
        }

        .znw-filter-icon svg {
            width: 100%;
            height: 100%;
        }

        .znw-filter-content {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            flex: 1;
            min-width: 0;
        }

        .znw-filter-divider {
            width: 1px;
            height: 40px;
            background: #e5e7eb;
            flex-shrink: 0;
            display: none;
        }

        .znw-filter-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #1a1530;
        }

        .znw-filter-select {
            width: 100%;
        }

        /* Select2 Custom Styles to match UI */
        .select2-container--default .select2-selection--single {
            background-color: #ffffff;
            border: 1px solid #f3f4f6;
            border-radius: 8px;
            height: 46px;
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 0.95rem;
            color: #4b5563;
            padding-left: 1rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px;
            right: 10px;
        }

        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #6d28d9;
            box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.1);
        }

        .select2-dropdown {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .select2-search--dropdown .select2-search__field {
            border-radius: 4px;
            border: 1px solid #e5e7eb;
            padding: 6px 10px;
        }

        .select2-results__option--highlighted[aria-selected] {
            background-color: #6d28d9 !important;
        }

        @media (max-width: 992px) {
            .znw-hero-top {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }

            .znw-hero-content {
                margin: 0 auto;
            }

            .znw-hero-image-wrapper {
                justify-content: center;
            }

            .znw-filters-container {
                grid-template-columns: repeat(4, 1fr);
                gap: 0.5rem;
                padding: 1rem;
                margin-top: -2rem; /* Less negative margin on smaller screens */
            }
        }

        @media (max-width: 576px) {
            .znw-hero-section {
                padding: 1rem 0.75rem;
                gap: 1.5rem;
            }

            .znw-hero-top {
                flex-direction: column;
                text-align: left;
                gap: 1.5rem;
            }

            .znw-hero-content {
                margin: 0;
            }

            .znw-hero-title {
                font-size: 1.6rem;
                font-weight: 700;
                white-space: normal !important;
                line-height: 1.3;
            }

            .znw-br-mobile {
                display: block;
            }

            .znw-hero-desc {
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
            }

            .znw-hero-badge {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
                margin-bottom: 1rem;
            }

            .znw-hero-image-wrapper {
                justify-content: center;
                max-width: 80%;
                margin: 0 auto;
            }

            /* Filters mobile: show icons */
            .znw-filter-icon {
                display: block;
                width: 32px;
                height: 32px;
                color: #4b23b3;
            }

            .znw-filter-divider {
                display: none;
            }

            .znw-filters-container {
                padding: 1.5rem 0.5rem 1.5rem;
                border-radius: 16px;
                gap: 0;
                background: #f8f7fc;
                overflow: hidden;
                margin-top: -1rem; /* Adjust for mobile */
            }

            .znw-filter-group {
                flex-direction: column;
                align-items: center;
                gap: 0.4rem;
                padding: 0 0.15rem;
                text-align: center;
            }

            .znw-filter-content {
                align-items: center;
                width: 100%;
            }

            .znw-filter-label {
                font-size: 0.75rem !important;
                color: #6b7280 !important;
                font-weight: 500 !important;
            }

            /* Hide Select2 on mobile, show native select */
            .select2-container {
                display: none !important;
            }

            .znw-filter-select {
                display: block !important;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background: transparent;
                border: none;
                outline: none;
                font-size: 0.78rem;
                font-weight: 700;
                color: #111827;
                text-align: center;
                text-overflow: ellipsis;
                overflow: hidden;
                white-space: nowrap;
                width: 80px;
                margin: 0 auto;
                padding: 0;
                cursor: pointer;
            }
        }
    </style>
@endpush

@section('content')

    <div class="znw-page-wrapper">
        <!-- Hero Section -->
        <section class="znw-hero-section">
            <div class="znw-hero-top">
                <div class="znw-hero-content">
                    <div class="znw-hero-badge">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                        </svg>
                        Our Writers
                    </div>
                    <h1 class="znw-hero-title">
                        <span class="znw-desktop-nowrap">Meet Our Top <br class="znw-br-mobile">Academic Writers</span><br>
                        <span>
                            <span class="znw-text-purple">Experts</span>
                            <span class="znw-text-gradient">You Can Rely On</span>
                        </span>
                    </h1>
                    <p class="znw-hero-desc">
                        Our team of highly qualified academic writers is dedicated to helping you <br>
                        achieve top grades with original, well-researched, and high-quality content.
                    </p>
                </div>
                <div class="znw-hero-image-wrapper">
                    <!-- Placeholder: User will add the image later -->
                    <img src="/public/new-home-page-images/Writer-Hero-bg.webp" alt="Academic Writers" />
                </div>
            </div>

            <!-- Filters Section -->
            @php
                $subjects = $expert->pluck('subject')->unique()->filter()->sort();
            @endphp
            <div class="znw-filters-container">
                <div class="znw-filter-group">
                    <div class="znw-filter-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                    </div>
                    <div class="znw-filter-content">
                        <label class="znw-filter-label">Subject</label>
                        <select class="znw-filter-select znw-select2">
                            <option value="">All Subjects</option>
                            @foreach($subjects as $subj)
                                <option value="{{ $subj }}">{{ $subj }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <span class="znw-filter-divider"></span>
                <div class="znw-filter-group">
                    <div class="znw-filter-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                    </div>
                    <div class="znw-filter-content">
                        <label class="znw-filter-label">Qualification</label>
                        <select class="znw-filter-select znw-select2">
                            <option value="">All Qualifications</option>
                            <option value="phd">Ph.D.</option>
                            <option value="masters">Master's Degree</option>
                            <option value="bachelors">Bachelor's Degree</option>
                        </select>
                    </div>
                </div>
                <span class="znw-filter-divider"></span>
                <div class="znw-filter-group">
                    <div class="znw-filter-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="znw-filter-content">
                        <label class="znw-filter-label">Experience</label>
                        <select class="znw-filter-select znw-select2">
                            <option value="">All Experience</option>
                            <option value="1-3">1 - 3 Years</option>
                            <option value="3-5">3 - 5 Years</option>
                            <option value="5-10">5 - 10 Years</option>
                            <option value="10+">10+ Years</option>
                        </select>
                    </div>
                </div>
                <span class="znw-filter-divider"></span>
                <div class="znw-filter-group">
                    <div class="znw-filter-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="4" y1="21" x2="4" y2="14"></line>
                            <line x1="4" y1="10" x2="4" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="3"></line>
                            <line x1="20" y1="21" x2="20" y2="16"></line>
                            <line x1="20" y1="12" x2="20" y2="3"></line>
                            <line x1="1" y1="14" x2="7" y2="14"></line>
                            <line x1="9" y1="8" x2="15" y2="8"></line>
                            <line x1="17" y1="16" x2="23" y2="16"></line>
                        </svg>
                    </div>
                    <div class="znw-filter-content">
                        <label class="znw-filter-label">Sort By</label>
                        <select class="znw-filter-select znw-select2">
                            <option value="most_rated">Most Rated</option>
                            <option value="highest_rated">Highest Rated</option>
                            <option value="newest">Newest Experts</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <!-- New Data Expert List Section -->
        <section class="expert-section">
            <div class="expert-container">
                <div class="znw-experts-grid">
                    @foreach ($expert as $expert_item)
                        @include('expert._new_expert_card', ['expert' => $expert_item])
                    @endforeach
                </div>

                <div class="znw-pagination-wrapper">
                    {{ $expert->links('expert.custom-pagination') }}
                </div>
            </div>
        </section>

        <!-- New Stats Banner Section -->
        <section class="znw-stats-section">
            <div class="expert-container">
                <div class="znw-stats-banner">
                    <div class="znw-banner-left">
                        <h2 style="white-space: nowrap;">
                            <span style="display: block;">Need Expert Help With</span>
                            <span style="display: block;">Your Assignments?</span>
                        </h2>
                        <p>Our professional academic writers are here to deliver high-quality, plagiarism-free assignments
                            tailored to your requirements.</p>
                        <a href="#" class="znw-quote-btn">Get Free Quote Now &rarr;</a>
                    </div>

                    <div class="znw-banner-divider"></div>

                    <div class="znw-banner-right">
                        <div class="znw-stat-box">
                            <div class="znw-stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                    </path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                    <path d="M9 14h6"></path>
                                    <path d="M9 10h6"></path>
                                    <path d="M9 18h6"></path>
                                </svg>
                            </div>
                            <div class="znw-stat-content">
                                <span class="znw-stat-num">182532 +</span>
                                <span class="znw-stat-label">Orders<br>Delivered</span>
                            </div>
                        </div>

                        <div class="znw-stat-box">
                            <div class="znw-stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <div class="znw-stat-content">
                                <span class="znw-stat-num">30000 +</span>
                                <span class="znw-stat-label">Happy<br>Clients</span>
                            </div>
                        </div>

                        <div class="znw-stat-box">
                            <div class="znw-stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                            </div>
                            <div class="znw-stat-content">
                                <span class="znw-stat-num">4.8/5 +</span>
                                <span class="znw-stat-label">Clients<br>Rating</span>
                            </div>
                        </div>

                        <div class="znw-stat-box">
                            <div class="znw-stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                </svg>
                            </div>
                            <div class="znw-stat-content">
                                <span class="znw-stat-num">4500 +</span>
                                <span class="znw-stat-label">PH.D<br>Experts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Only initialize Select2 on desktop (576px+)
            if (typeof jQuery !== 'undefined' && window.innerWidth > 576) {
                $('.znw-select2').select2({
                    width: '100%',
                    dropdownAutoWidth: true
                });
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        /* Card Grid */
        .znw-experts-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            padding: 1rem 0;
        }

        /* Expert Card */
        .znw-expert-card {
            background: #ffffff;
            border: 1px solid #f3f4f6;
            border-radius: 12px;
            padding: 1.25rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .znw-expert-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(109, 40, 217, 0.15);
            border-color: #6d28d9;
        }

        .znw-card-header {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .znw-avatar-wrapper {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            background: #f3f4f6;
            flex-shrink: 0;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .znw-expert-card:hover .znw-avatar-wrapper {
            border-color: #6d28d9;
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(109, 40, 217, 0.25);
        }

        .znw-avatar-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .znw-header-info {
            flex: 1;
        }

        .znw-expert-name {
            font-size: 1.05rem;
            font-weight: 700;
            color: #111827;
        }

        .znw-expert-role {
            font-size: 0.8rem;
            color: #6b7280;
            margin: 0 0 0.4rem 0;
        }

        .znw-expert-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .znw-stars {
            color: #e5e7eb;
            font-size: 0.9rem;
            line-height: 1;
        }

        .znw-star.filled {
            color: #fbbf24;
        }

        .znw-rating-number {
            font-size: 0.85rem;
            font-weight: 600;
            color: #374151;
        }

        .znw-card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
        }

        .znw-orders-stat {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .znw-icon {
            width: 30px;
            height: 30px;
            color: #f97316;
            background: #fff7ed;
            padding: 6px;
            border-radius: 8px;
            flex-shrink: 0;
        }

        .znw-orders-count {
            font-weight: 700;
            color: #111827;
            font-size: 0.95rem;
        }

        .znw-orders-text {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .znw-info-section {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .znw-info-title {
            font-size: 0.8rem;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }

        .znw-info-text {
            font-size: 0.9rem;
            color: #374151;
            font-weight: 500;
            line-height: 1.4;
            margin: 0;
        }

        .znw-card-footer {
            padding-top: 0.75rem;
            border-top: 1px solid #f3f4f6;
        }

        .znw-hire-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.8rem 1rem;
            background: #f3efff;
            color: #4b23b3;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .znw-hire-btn:hover {
            background: #4b23b3;
            color: #ffffff;
        }

        .znw-btn-arrow {
            transition: transform 0.3s ease;
        }

        .znw-hire-btn:hover .znw-btn-arrow {
            transform: translateX(4px);
        }

        /* Modern Pagination */
        .znw-pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 1.5rem;
        }

        .znw-pagination-wrapper nav ul.pagination {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .znw-pagination-wrapper nav ul.pagination li.page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: none;
            background: transparent;
            color: #6b7280;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .znw-pagination-wrapper nav ul.pagination li.page-item.active .page-link,
        .znw-pagination-wrapper nav ul.pagination li.page-item.active span.page-link {
            background: #4b23b3;
            color: #ffffff;
        }

        .znw-pagination-wrapper nav ul.pagination li.page-item .page-link:hover:not(.active) {
            background: #f3efff;
            color: #4b23b3;
        }

        .znw-pagination-wrapper nav ul.pagination li.page-item a[rel="next"],
        .znw-pagination-wrapper nav ul.pagination li.page-item a[rel="prev"] {
            border: 1px solid #e5e7eb;
            color: #4b23b3;
            font-size: 1.2rem;
        }

        .znw-pagination-wrapper nav ul.pagination li.page-item.disabled .page-link,
        .znw-pagination-wrapper nav ul.pagination li.page-item.disabled span.page-link {
            color: #9ca3af;
            cursor: not-allowed;
            background: transparent;
        }

        /* Keep wrapper styling */
        .expert-section {
            padding: 0rem 0px 0px 0px;
            margin: auto;
        }

        .expert-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px 20px;
        }

        /* Stats Banner Section */
        .znw-stats-section {
            padding: 1rem 0 1rem;
        }

        .znw-stats-banner {
            background: linear-gradient(135deg, #2b1771, #1e0d4a);
            border-radius: 16px;
            padding: 3.5rem 4rem;
            display: flex;
            align-items: stretch;
            gap: 4rem;
            box-shadow: 0 15px 40px rgba(30, 13, 74, 0.3);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        /* Add a subtle texture/pattern if desired */
        .znw-stats-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at top right, rgba(255, 255, 255, 0.05), transparent 50%);
            pointer-events: none;
        }

        .znw-banner-left {
            flex: 1.2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            z-index: 1;
        }

        .znw-banner-left h2 {
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
            color: #ffffff;
        }

        .znw-banner-left p {
            font-size: 0.95rem;
            color: #d1c4e9;
            line-height: 1.6;
            margin-bottom: 2rem;
            max-width: 90%;
        }

        .znw-quote-btn {
            background: #ff6b00;
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.85rem 1.8rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 0, 0.4);
        }

        .znw-quote-btn:hover {
            background: #e65a00;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.6);
            color: #ffffff;
        }

        .znw-banner-divider {
            width: 1px;
            background: rgba(255, 255, 255, 0.15);
            margin: 0 1rem;
        }

        .znw-banner-right {
            flex: 1.8;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem 3rem;
            align-items: center;
            z-index: 1;
            position: relative;
        }

        .znw-banner-right::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-50%);
        }

        .znw-banner-right::after {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            width: 1px;
            height: 100%;
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(-50%);
        }

        .znw-stat-box {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            position: relative;
            z-index: 2;
        }

        .znw-stat-icon {
            width: 65px;
            height: 65px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2b1771;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5), inset 0 0 10px rgba(255, 255, 255, 0.8);
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .znw-stat-box:hover .znw-stat-icon {
            transform: scale(1.1);
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.7);
        }

        .znw-stat-icon svg {
            width: 30px;
            height: 30px;
        }

        .znw-stat-content {
            display: flex;
            flex-direction: column;
        }

        .znw-stat-num {
            font-size: 1.6rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.1;
            margin-bottom: 0.3rem;
        }

        .znw-stat-label {
            font-size: 0.85rem;
            color: #d1c4e9;
            line-height: 1.3;
            font-weight: 500;
        }

        @media (max-width: 1100px) {
            .znw-experts-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .znw-stats-banner {
                flex-direction: column;
                gap: 2.5rem;
                padding: 3rem 2.5rem;
            }

            .znw-banner-divider {
                width: 100%;
                height: 1px;
                margin: 0;
            }

            .znw-banner-left p {
                max-width: 100%;
            }
        }

        @media (max-width: 850px) {
            .znw-experts-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .znw-experts-grid {
                grid-template-columns: 1fr;
            }

            .znw-stats-banner {
                padding: 2rem 1.25rem;
                border-radius: 12px;
            }

            .znw-banner-left {
                align-items: center;
                text-align: center;
            }

            .znw-banner-left h2 {
                white-space: normal !important;
                font-size: 1.45rem;
                line-height: 1.3;
                margin: 0 auto 0.75rem;
                max-width: 280px;
            }

            .znw-banner-left p {
                font-size: 0.85rem;
                margin-bottom: 1.25rem;
            }

            .znw-quote-btn {
                font-size: 0.9rem;
                padding: 0.75rem 1.5rem;
                border-radius: 8px;
            }

            .znw-banner-divider {
                display: none;
            }

            .znw-banner-right {
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem 0.5rem;
                padding-top: 1.5rem;
                border-top: 1px solid rgba(255, 255, 255, 0.15);
            }

            .znw-banner-right::before {
                top: 50%;
                width: 100%;
                background: rgba(255, 255, 255, 0.15);
            }

            .znw-banner-right::after {
                height: 100%;
                top: 1.5rem;
                /* Vertical middle line */
            }

            .znw-stat-box {
                gap: 0.5rem;
            }

            .znw-stat-icon {
                width: 45px;
                height: 45px;
            }

            .znw-stat-icon svg {
                width: 20px;
                height: 20px;
            }

            .znw-stat-num {
                font-size: 1.05rem;
                margin-bottom: 0.15rem;
            }

            .znw-stat-label {
                font-size: 0.7rem;
            }
        }
    </style>
@endpush