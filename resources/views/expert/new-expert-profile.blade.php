@extends('frontend-layouts.app')

@section('content')

    @php
        $reviews = is_string($expert->customer_review) ? json_decode($expert->customer_review, true) : ($expert->customer_review ?? []);
        $totalReviews = count($reviews);
        $averageRating = $totalReviews > 0 ? round(array_sum(array_column($reviews, 'rating')) / $totalReviews, 1) : 0;

        // Skills and Helps with
        $skills = is_string($expert->skills) ? json_decode($expert->skills, true) : ($expert->skills ?? []);
        $helpus = is_string($expert->helpus) ? json_decode($expert->helpus, true) : ($expert->helpus ?? []);
    @endphp

    <style>
        .zep-wrapper {
            background-color: #fcfcfc;
            /* Light subtle background for the whole page */
            padding: 20px 20px;
            font-family: 'Inter', sans-serif;
            /* Standard modern font */
        }

        .zep-container {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        /* Common Card Styles */
        .zep-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
            border: 1px solid rgba(0, 0, 0, 0.03);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .zep-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered entrance for columns */
        .zep-left-col .zep-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .zep-left-col .zep-card:nth-child(2) {
            animation-delay: 0.3s;
        }

        .zep-right-col>div:nth-child(1) {
            animation-delay: 0.2s;
            animation: fadeInUp 0.8s ease-out 0.2s forwards;
            opacity: 0;
        }

        .zep-right-col>div:nth-child(2) {
            animation-delay: 0.4s;
            animation: fadeInUp 0.8s ease-out 0.4s forwards;
            opacity: 0;
        }

        .zep-right-col>div:nth-child(3) {
            animation-delay: 0.6s;
            animation: fadeInUp 0.8s ease-out 0.6s forwards;
            opacity: 0;
        }

        /* === LEFT COLUMN: PROFILE CARD === */
        .zep-profile-top {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 30px;
        }

        .zep-profile-image-wrapper {
            position: relative;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            padding: 4px;
            background: linear-gradient(135deg, #4A17A3, #9d65ff);
        }

        .zep-profile-image-wrapper img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ffffff;
            transition: transform 0.5s ease;
        }

        .zep-profile-image-wrapper:hover img {
            transform: scale(1.08) rotate(5deg);
        }

        .zep-profile-info h1 {
            font-size: 32px;
            font-weight: 800;
            color: #1a1530;
            margin: 0 0 5px 0;
        }

        .zep-profile-title {
            font-size: 16px;
            color: #4A17A3;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .zep-stars-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .zep-stars {
            color: #fbbf24;
            font-size: 16px;
        }

        .zep-rating-text {
            font-weight: 700;
            color: #1a1530;
            font-size: 15px;
        }

        .zep-review-count {
            color: #718096;
            font-size: 14px;
            font-weight: 500;
        }

        /* Stats Box */
        .zep-stats-box {
            background: #f9f6ff;
            border-radius: 12px;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .zep-stat-item {
            text-align: center;
            position: relative;
            flex: 1;
            transition: transform 0.3s ease;
        }

        .zep-stat-item:hover {
            transform: translateY(-3px) scale(1.05);
        }

        .zep-stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 15%;
            height: 70%;
            width: 1px;
            background: rgba(74, 23, 163, 0.15);
        }

        .zep-stat-value {
            font-size: 22px;
            font-weight: 800;
            color: #4A17A3;
            margin-bottom: 5px;
        }

        .zep-stat-label {
            font-size: 13px;
            color: #4a5568;
            font-weight: 500;
        }

        /* Tags Sections */
        .zep-tags-section {
            margin-bottom: 30px;
        }

        .zep-section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .zep-icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .zep-section-header:hover .zep-icon-circle {
            transform: rotate(-15deg) scale(1.1);
        }

        .zep-icon-circle.purple {
            background: #f4eeff;
            color: #4A17A3;
        }

        .zep-icon-circle.blue {
            background: #eef6ff;
            color: #2b6cb0;
        }

        .zep-section-title {
            font-size: 20px;
            font-weight: 700;
            color: #1a1530;
        }

        .zep-tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .zep-tag {
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: default;
        }

        .zep-tag:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .zep-tag.purple-tag {
            background: #f9f6ff;
            color: #6b46c1;
            border: 1px solid rgba(107, 70, 193, 0.1);
        }

        .zep-tag.purple-tag:hover {
            background: #6b46c1;
            color: #ffffff;
            border-color: #6b46c1;
            animation: pulsePurple 0.5s ease;
        }

        .zep-tag.blue-tag {
            background: #f0f7ff;
            color: #3182ce;
            border: 1px solid rgba(49, 130, 206, 0.1);
        }

        .zep-tag.blue-tag:hover {
            background: #3182ce;
            color: #ffffff;
            border-color: #3182ce;
            animation: pulseBlue 0.5s ease;
        }

        @keyframes pulsePurple {
            0% {
                box-shadow: 0 0 0 0 rgba(107, 70, 193, 0.4);
            }

            70% {
                box-shadow: 0 0 0 8px rgba(107, 70, 193, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(107, 70, 193, 0);
            }
        }

        @keyframes pulseBlue {
            0% {
                box-shadow: 0 0 0 0 rgba(49, 130, 206, 0.4);
            }

            70% {
                box-shadow: 0 0 0 8px rgba(49, 130, 206, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(49, 130, 206, 0);
            }
        }

        /* About Section */
        .zep-about-title {
            font-size: 24px;
            font-weight: 800;
            color: #1a1530;
            margin-bottom: 25px;
            position: relative;
        }

        .zep-about-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 40px;
            height: 4px;
            background: #4A17A3;
            border-radius: 2px;
        }

        .zep-about-content {
            font-size: 15px;
            line-height: 1.8;
            color: #4a5568;
            margin-bottom: 40px;
        }

        .zep-about-content p {
            margin-bottom: 15px;
        }

        .zep-read-more-wrapper {
            display: none;
        }

        .zep-about-footer {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding-top: 30px;
            border-top: 1px solid #edf2f7;
        }

        .zep-footer-item {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 12px;
        }

        .zep-footer-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #f9f6ff;
            color: #4A17A3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .zep-footer-item:hover .zep-footer-icon {
            background: #4A17A3;
            color: #ffffff;
            transform: translateY(-3px);
        }

        .zep-footer-title {
            font-weight: 700;
            color: #1a1530;
            font-size: 15px;
        }

        .zep-footer-subtitle {
            color: #718096;
            font-size: 13px;
            line-height: 1.4;
        }

        /* === RIGHT COLUMN === */

        /* Why Choose Card */
        .zep-why-card {
            background: #f5f0ff;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 25px;
        }

        .zep-why-title {
            font-size: 20px;
            font-weight: 800;
            color: #1a1530;
            margin-bottom: 20px;
        }

        .zep-why-list {
            list-style: none;
            padding: 0;
            margin: 0 0 25px 0;
        }

        .zep-why-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 14px;
            color: #2d3748;
            font-weight: 500;
        }

        .zep-why-list li i {
            color: #38a169;
            font-size: 18px;
            background: #e6fffa;
            border-radius: 50%;
            padding: 2px;
            transition: transform 0.3s ease;
        }

        .zep-why-list li:hover i {
            transform: scale(1.2);
        }

        .zep-btn-hire {
            display: block;
            width: 100%;
            background: #4A17A3;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .zep-btn-hire:hover {
            background: #37107c;
            transform: translateY(-2px);
            color: #ffffff;
        }

        .zep-promo-card {
            background: linear-gradient(180deg, #f9f6ff 0%, #f4eeff 100%);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .zep-promo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(107, 70, 193, 0.15);
        }

        .zep-promo-title {
            font-size: 24px;
            font-weight: 900;
            color: #2b1174;
            line-height: 1.3;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .zep-promo-title span {
            color: #2b1174;
        }

        .zep-promo-subtitle {
            font-size: 12px;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .zep-promo-list {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
            position: relative;
            z-index: 2;
        }

        .zep-promo-list li {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #1a1530;
            margin-bottom: 1px;
            font-weight: 600;
        }

        .zep-promo-list li i {
            color: #48bb78;
            font-size: 15px;
        }

        .zep-promo-discount {
            position: relative;
            z-index: 2;
        }

        .zep-promo-free {
            display: inline-block;
            background: #ffc107;
            color: #000;
            font-weight: 900;
            font-size: 12px;
            padding: 6px 12px;
            border-radius: 4px;
            margin-top: 5px;
        }

        .zep-promo-image {
            position: absolute;
            right: -10px;
            bottom: 10px;
            width: 290px;
            height: 200px;
            z-index: 1;
            animation: carAlarmTada 3s infinite ease-in-out;
            transform-origin: center center;
            filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.15));
            transition: filter 0.3s ease;
        }

        .zep-promo-card:hover .zep-promo-image {
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
        }

        @keyframes carAlarmTada {
            0% {
                transform: scale(1) rotate(0);
            }

            5% {
                transform: scale(0.95) rotate(-4deg);
            }

            10% {
                transform: scale(1.08) rotate(4deg);
            }

            15% {
                transform: scale(1.08) rotate(-4deg);
            }

            20% {
                transform: scale(1.08) rotate(4deg);
            }

            25% {
                transform: scale(1) rotate(0);
            }

            100% {
                transform: scale(1) rotate(0);
            }
        }

        /* Bottom Banner Section */
        .zep-bottom-banner {
            max-width: 1300px;
            margin: 20px auto 50px auto;
            /* 50px gap from footer */
            background: linear-gradient(135deg, #2A106D 0%, #5E1F9A 100%);
            border-radius: 16px;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            box-shadow: 0 10px 30px rgba(42, 16, 109, 0.3);
            animation: fadeInUp 0.8s ease-out 0.8s forwards;
            opacity: 0;
        }

        .zep-banner-left {
            flex: 1;
            padding-right: 40px;
        }

        .zep-banner-title {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .zep-banner-desc {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 25px;
            line-height: 1.6;
            max-width: 450px;
        }

        .zep-banner-btn {
            display: inline-block;
            background: #FF6B00;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .zep-banner-btn:hover {
            background: #e66000;
            transform: translateY(-2px);
            color: white;
        }

        .zep-banner-right {
            display: flex;
            gap: 30px;
            border-left: 1px solid rgba(255, 255, 255, 0.15);
            padding-left: 30px;
        }

        .zep-banner-stat {
            display: flex;
            align-items: center;
            gap: 15px;
            transition: transform 0.3s ease;
            cursor: default;
        }

        .zep-banner-stat:hover {
            transform: translateY(-5px);
        }

        .zep-banner-stat:not(:last-child) {
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            padding-right: 30px;
        }

        .zep-banner-icon {
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5E1F9A;
            font-size: 20px;
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275), background-color 0.3s ease, color 0.3s ease;
        }

        .zep-banner-stat:hover .zep-banner-icon {
            transform: scale(1.15) rotate(10deg);
            background: #FF6B00;
            color: white;
            box-shadow: 0 5px 15px rgba(255, 107, 0, 0.4);
        }

        .zep-banner-val {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 2px;
        }

        .zep-banner-label {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .zep-bottom-banner {
                flex-direction: column;
                padding: 30px;
                gap: 30px;
            }

            .zep-banner-left {
                padding-right: 0;
                text-align: center;
            }

            .zep-banner-desc {
                margin: 0 auto 25px auto;
            }

            .zep-banner-right {
                border-left: none;
                padding-left: 0;
                border-top: 1px solid rgba(255, 255, 255, 0.15);
                padding-top: 30px;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .zep-banner-stat:not(:last-child) {
                border-right: none;
                padding-right: 0;
            }
        }

        .zep-reviews-card {
            background: #fdfdfd;
            border-radius: 16px;
            padding: 10px;
            border: 1px solid #edf2f7;
        }

        .zep-reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .zep-reviews-title-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .zep-reviews-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #f4eeff;
            color: #4A17A3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .zep-reviews-title {
            font-size: 18px;
            font-weight: 800;
            color: #1a1530;
        }

        .zep-reviews-rating {
            font-size: 14px;
            font-weight: 700;
            color: #1a1530;
        }

        .zep-reviews-rating span {
            color: #718096;
            font-weight: 500;
        }

        .zep-reviews-list {
            position: relative;
            overflow: hidden;
            min-height: 180px;
        }

        .zep-review-item {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 0;
            display: none;
            animation: fadeSlide 0.5s ease-out forwards;
        }

        .zep-review-item.active {
            display: block;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .zep-review-quote {
            font-size: 13px;
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 15px;
            position: relative;
        }

        .zep-review-quote::before {
            content: '"';
            font-size: 30px;
            color: #cbd5e0;
            font-family: serif;
            position: absolute;
            left: -10px;
            top: -10px;
            line-height: 1;
        }

        .zep-review-author {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .zep-review-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #edf2f7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #4A17A3;
            font-size: 14px;
            flex-shrink: 0;
            margin-top: -2px;
        }

        .zep-author-info h4 {
            margin: 0 0 2px 0;
            font-size: 14px;
            font-weight: 700;
            color: #1a1530;
        }

        .zep-author-info p {
            margin: 0 0 5px 0;
            font-size: 11px;
            color: #718096;
        }

        .zep-author-stars {
            color: #fbbf24;
            font-size: 10px;
        }

        .zep-btn-outline {
            display: block;
            width: 100%;
            text-align: center;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            color: #4A17A3;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .zep-btn-outline:hover {
            border-color: #4A17A3;
            background: #f9f6ff;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .zep-container {
                grid-template-columns: 1fr;
            }

            .zep-about-footer {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .zep-card {
                padding: 20px;
            }

            .zep-profile-top {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .zep-profile-info h1 {
                font-size: 26px;
                margin-bottom: 5px;
            }

            .zep-profile-title {
                margin-bottom: 12px;
            }

            .zep-stars-row {
                justify-content: center;
            }

            .zep-stats-box {
                flex-direction: row;
                flex-wrap: wrap;
                background: linear-gradient(135deg, #7848ff 0%, #3178ff 100%);
                padding: 0;
                border-radius: 12px;
                gap: 0;
            }

            .zep-stat-item {
                width: 50%;
                flex: none;
                padding: 16px 10px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            }

            .zep-stat-item:nth-child(odd) {
                border-right: 1px solid rgba(255, 255, 255, 0.2);
            }

            .zep-stat-item:nth-child(5) {
                border-bottom: none;
            }

            .zep-stat-item:not(:last-child)::after {
                display: none;
            }

            .zep-stat-value {
                color: #ffffff;
                font-size: 20px;
            }

            .zep-stat-label {
                color: #ffffff;
                opacity: 0.9;
                font-size: 13px;
                font-weight: 500;
            }

            .zep-tag.purple-tag {
                background: #6b46c1;
                color: #ffffff;
                border-color: #6b46c1;
            }

            .zep-tag.blue-tag {
                background: #3182ce;
                color: #ffffff;
                border-color: #3182ce;
            }

            .zep-tags-container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .zep-tag {
                width: 100%;
                box-sizing: border-box;
                text-align: center;
                padding: 8px 10px;
                /* slightly smaller padding for mobile grid */
                font-size: 12px;
            }

            .zep-about-content {
                max-height: 180px;
                overflow: hidden;
                position: relative;
                transition: max-height 0.3s ease;
            }

            .zep-about-content::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 60px;
                background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
                pointer-events: none;
            }

            .zep-about-content.expanded {
                max-height: 2000px;
            }

            .zep-about-content.expanded::after {
                display: none;
            }

            .zep-read-more-wrapper {
                display: flex;
                justify-content: center;
                margin-top: -10px;
                margin-bottom: 30px;
                position: relative;
                z-index: 2;
            }

            .zep-read-more-btn {
                background: none;
                border: none;
                color: #4A17A3;
                font-weight: 700;
                font-size: 14px;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .zep-about-footer {
                display: flex;
                flex-direction: column;
                gap: 0;
                background: #ffffff;
                border: 1px solid #edf2f7;
                border-radius: 12px;
                padding: 0 15px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            }

            .zep-footer-icon {
                width: 38px;
                height: 38px;
                font-size: 16px;
            }

            .zep-footer-item {
                display: grid;
                grid-template-columns: 38px 75px 1fr;
                gap: 10px;
                align-items: start;
                padding: 15px 0;
                border-bottom: 1px solid #edf2f7;
            }

            .zep-footer-item:last-child {
                border-bottom: none;
            }

            .zep-footer-item>div:last-child {
                display: contents;
            }

            .zep-footer-title {
                margin-top: 10px;
                font-size: 13px;
            }

            .zep-footer-subtitle {
                margin-top: 10px;
                text-align: left;
                color: #2d3748;
                font-size: 12px;
                line-height: 1.4;
            }

            /* Bottom Banner Mobile Match */
            .zep-bottom-banner {
                padding: 30px 15px;
            }

            .zep-banner-left {
                text-align: center;
                padding-bottom: 25px;
            }

            .zep-banner-title {
                font-size: 22px;
            }

            .zep-banner-desc {
                font-size: 13px;
                margin-bottom: 20px;
            }

            .zep-banner-right {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 0;
                padding-top: 0;
                border-top: 1px solid rgba(255, 255, 255, 0.2);
                width: 100%;
            }

            .zep-banner-stat {
                padding: 20px 10px;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: flex-start;
                gap: 8px;
            }

            .zep-banner-stat:not(:last-child) {
                border-right: none;
                padding-right: 10px;
            }

            .zep-banner-stat:nth-child(1) {
                border-right: 1px solid rgba(255, 255, 255, 0.2) !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
            }

            .zep-banner-stat:nth-child(2) {
                border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
            }

            .zep-banner-stat:nth-child(3) {
                border-right: 1px solid rgba(255, 255, 255, 0.2) !important;
            }

            .zep-bottom-banner .zep-banner-icon {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }

            .zep-bottom-banner .zep-banner-val {
                font-size: 15px;
            }

            .zep-bottom-banner .zep-banner-label {
                font-size: 11px;
                text-transform: capitalize;
            }

            /* Promo Card Mobile */
            .zep-promo-card {
                padding: 25px 20px;
            }

            .zep-promo-content-wrapper {
                max-width: 100% !important;
            }

            .zep-promo-list,
            .zep-promo-discount {
                max-width: 60%;
            }

            .zep-promo-title {
                font-size: 21px;
            }

            .zep-promo-image {
                width: 160px;
                height: auto;
                bottom: 20px;
                right: -10px;
            }
        }
    </style>

    <div class="zep-wrapper">
        <div class="zep-container">

            <!-- LEFT COLUMN -->
            <div class="zep-left-col">

                <!-- Main Profile Card -->
                <div class="zep-card">
                    <div class="zep-profile-top">
                        <div class="zep-profile-image-wrapper">
                            <img src="{{ $expert->image ?? '/assets/media/avatars/blank.png' }}" alt="{{ $expert->name }}">
                        </div>
                        <div class="zep-profile-info">
                            <h1>{{ $expert->name }}</h1>
                            <div class="zep-profile-title">{{ $expert->service ?? 'Expert Writer' }}</div>
                            <div class="zep-stars-row">
                                <div class="zep-stars">
                                    @php
                                        $fullStars = floor($averageRating);
                                        $halfStar = ($averageRating - $fullStars) >= 0.5 ? true : false;
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $fullStars)
                                            <i class="fas fa-star"></i>
                                        @elseif ($halfStar && $i == $fullStars + 1)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="zep-rating-text">{{ $averageRating }} <span
                                        class="zep-review-count">({{ $totalReviews }} Reviews)</span></span>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Box -->
                    <div class="zep-stats-box">
                        <div class="zep-stat-item">
                            <div class="zep-stat-value">{{ $expert->finish_order ?? '0' }}+</div>
                            <div class="zep-stat-label">Orders</div>
                        </div>
                        <div class="zep-stat-item">
                            <div class="zep-stat-value">{{ $expert->inprogress_order ?? '0' }}</div>
                            <div class="zep-stat-label">In Progress</div>
                        </div>
                        <div class="zep-stat-item">
                            <div class="zep-stat-value">{{ $totalReviews }}</div>
                            <div class="zep-stat-label">Reviews</div>
                        </div>
                        <div class="zep-stat-item">
                            <div class="zep-stat-value">{{ $expert->location ?? 'UK' }}</div>
                            <div class="zep-stat-label">Location</div>
                        </div>
                        <div class="zep-stat-item">
                            <div class="zep-stat-value">{{ $expert->success ?? '98' }}%</div>
                            <div class="zep-stat-label">Success Rate</div>
                        </div>
                    </div>

                    <!-- Skills & Expertise -->
                    <div class="zep-tags-section">
                        <div class="zep-section-header">
                            <div class="zep-icon-circle purple">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="zep-section-title">Skills & Expertise</div>
                        </div>
                        <div class="zep-tags-container">
                            @forelse($skills as $skill)
                                <span class="zep-tag purple-tag">{{ $skill }}</span>
                            @empty
                                <span class="zep-tag purple-tag">Academic Writing</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- Helps With -->
                    <div class="zep-tags-section" style="margin-bottom: 0;">
                        <div class="zep-section-header">
                            <div class="zep-icon-circle blue">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="zep-section-title">Helps With</div>
                        </div>
                        <div class="zep-tags-container">
                            @forelse($helpus as $help)
                                <span class="zep-tag blue-tag">{{ $help }}</span>
                            @empty
                                <span class="zep-tag blue-tag">Assignments</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- About Card -->
                <div class="zep-card">
                    <h2 class="zep-about-title">About {{ $expert->name }}</h2>
                    <div class="zep-about-content" id="aboutContentMobile">
                        {!! $expert->content !!}
                    </div>
                    <div class="zep-read-more-wrapper">
                        <button class="zep-read-more-btn" id="readMoreBtn">Read More <i
                                class="fas fa-chevron-down"></i></button>
                    </div>

                    <!-- Static Footer details as per design -->
                    <div class="zep-about-footer">
                        <div class="zep-footer-item">
                            <div class="zep-footer-icon"><i class="fas fa-graduation-cap"></i></div>
                            <div>
                                <div class="zep-footer-title">Degree</div>
                                <div class="zep-footer-subtitle">Master's or Higher<br>Verified University</div>
                            </div>
                        </div>
                        <div class="zep-footer-item">
                            <div class="zep-footer-icon"><i class="fas fa-briefcase"></i></div>
                            <div>
                                <div class="zep-footer-title">Experience</div>
                                <div class="zep-footer-subtitle">7+ Years<br>Academic Writing</div>
                            </div>
                        </div>
                        <div class="zep-footer-item">
                            <div class="zep-footer-icon"><i class="fas fa-bullseye"></i></div>
                            <div>
                                <div class="zep-footer-title">Expertise</div>
                                <div class="zep-footer-subtitle">{{ $expert->service ?? 'Subject Specialist' }}</div>
                            </div>
                        </div>
                        <div class="zep-footer-item">
                            <div class="zep-footer-icon"><i class="fas fa-university"></i></div>
                            <div>
                                <div class="zep-footer-title">Education</div>
                                <div class="zep-footer-subtitle">UK Based<br>Premium Institutes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="zep-right-col">

                <!-- Why Choose Card -->
                <div class="zep-why-card">
                    <h3 class="zep-why-title">Why Choose {{ explode(' ', trim($expert->name))[0] }}?</h3>
                    <ul class="zep-why-list">
                        <li><i class="fas fa-check-circle"></i> Qualified & Experienced Writers</li>
                        <li><i class="fas fa-check-circle"></i> Quality Writing with Zero AI</li>
                        <li><i class="fas fa-check-circle"></i> Plagiarism Report</li>
                        <li><i class="fas fa-check-circle"></i> Unlimited Revisions & Reworks</li>
                        <li><i class="fas fa-check-circle"></i> On-Time Delivery Guaranteed</li>
                        <li><i class="fas fa-check-circle"></i> 24/7 Support</li>
                    </ul>
                    <a href="/upload-your-assignment" class="zep-btn-hire">Hire {{ explode(' ', trim($expert->name))[0] }}
                        Now <i class="fas fa-arrow-right" style="margin-left: 8px;"></i></a>
                </div>

                <!-- Promo Card -->
                <div class="zep-promo-card">
                    <div class="zep-promo-content-wrapper" style="position: relative; z-index: 2; max-width: 65%;">
                        <h3 class="zep-promo-title">TOP-QUALITY,<br>100% ORIGINAL<br>ASSIGNMENTS</h3>
                        <div class="zep-promo-subtitle">DELIVERED IN JUST A FEW HOURS!</div>
                        <ul class="zep-promo-list">
                            <li><i class="fas fa-check-circle"></i> Lightning-Fast Delivery</li>
                            <li><i class="fas fa-check-circle"></i> Guaranteed Originality</li>
                            <li><i class="fas fa-check-circle"></i> Subject Experts</li>
                            <li><i class="fas fa-check-circle"></i> Always Available</li>
                        </ul>
                        <div class="zep-promo-discount">
                            <div style="font-size: 12px; font-weight: 800; color: #4a5568; margin-bottom: 2px;">UP TO</div>
                            <div style="display: flex; align-items: center; gap: 4px; margin-bottom: 8px;">
                                <span style="font-size: 48px; font-weight: 900; color: #f03e3e; line-height: 0.8;">40</span>
                                <div
                                    style="display: flex; flex-direction: column; justify-content: center; line-height: 1;">
                                    <span style="font-size: 18px; font-weight: 900; color: #f03e3e;">%</span>
                                    <span style="font-size: 18px; font-weight: 900; color: #f03e3e;">OFF</span>
                                </div>
                            </div>
                            <div style="font-size: 11px; font-weight: 800; color: #1a1530; margin-bottom: 12px;">ON YOUR
                                FIRST ORDER</div>
                            <div class="zep-promo-free">FREE CV</div>
                        </div>
                    </div>
                    <!-- You can change the src path below to point to your car image -->
                    <img src="/public/new-home-page-images/Writer-Watch.webp" alt="Promo Image" class="zep-promo-image">
                </div>

                <!-- Student Reviews Card -->
                <div class="zep-reviews-card">
                    <div class="zep-reviews-header">
                        <div class="zep-reviews-title-wrap">
                            <div class="zep-reviews-icon"><i class="far fa-star"></i></div>
                            <div class="zep-reviews-title">Student Reviews</div>
                        </div>
                        <div class="zep-reviews-rating">{{ $averageRating }} <span>({{ $totalReviews }} Reviews)</span>
                        </div>
                    </div>

                    <div class="zep-reviews-list" id="zepReviewsSlider">
                        @forelse($reviews as $index => $review)
                            <div class="zep-review-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="zep-review-quote">{{ $review['review'] }}</div>
                                <div class="zep-review-author">
                                    <div class="zep-review-avatar">{{ substr($review['name'] ?? 'U', 0, 1) }}</div>
                                    <div class="zep-author-info">
                                        <h4>{{ $review['name'] }}</h4>
                                        <p>University Student</p>
                                        <div class="zep-author-stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= ($review['rating'] ?? 5) ? '' : 'text-muted' }}"
                                                    style="{{ $i > ($review['rating'] ?? 5) ? 'color: #e2e8f0;' : '' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="zep-review-item active">
                                <p class="text-center text-muted">No reviews yet.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($totalReviews > 3)
                        <a href="#" class="zep-btn-outline">View All Reviews <i class="fas fa-arrow-right"
                                style="margin-left: 8px;"></i></a>
                    @endif
                </div>

            </div>
        </div>

        <!-- Bottom Banner Section -->
        <div class="zep-bottom-banner">
            <div class="zep-banner-left">
                <h2 class="zep-banner-title">Need Expert Help With Your Assignments?</h2>
                <p class="zep-banner-desc">Our professional academic writers are here to deliver high-quality,
                    plagiarism-free assignments tailored to your requirements.</p>
                <a href="/upload-your-assignment" class="zep-banner-btn">Get Free Quote Now <i class="fas fa-arrow-right"
                        style="margin-left: 8px;"></i></a>
            </div>
            <div class="zep-banner-right">
                <div class="zep-banner-stat">
                    <div class="zep-banner-icon"><i class="fas fa-clipboard-check"></i></div>
                    <div>
                        <div class="zep-banner-val">182532+</div>
                        <div class="zep-banner-label">Orders<br>Delivered</div>
                    </div>
                </div>
                <div class="zep-banner-stat">
                    <div class="zep-banner-icon"><i class="fas fa-smile"></i></div>
                    <div>
                        <div class="zep-banner-val">30000+</div>
                        <div class="zep-banner-label">Happy<br>Clients</div>
                    </div>
                </div>
                <div class="zep-banner-stat">
                    <div class="zep-banner-icon"><i class="fas fa-star"></i></div>
                    <div>
                        <div class="zep-banner-val">4.8/5+</div>
                        <div class="zep-banner-label">Clients<br>Rating</div>
                    </div>
                </div>
                <div class="zep-banner-stat">
                    <div class="zep-banner-icon"><i class="fas fa-user-graduate"></i></div>
                    <div>
                        <div class="zep-banner-val">4500+</div>
                        <div class="zep-banner-label">Ph.D Experts</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sliderContainer = document.getElementById('zepReviewsSlider');
            if (!sliderContainer) return;

            const reviews = sliderContainer.querySelectorAll('.zep-review-item');
            if (reviews.length <= 1) return; // No need to slide if 1 or 0 reviews

            let currentIndex = 0;
            let sliderInterval;

            function startSlider() {
                sliderInterval = setInterval(() => {
                    // Remove active class from current
                    reviews[currentIndex].classList.remove('active');

                    // Increment index
                    currentIndex = (currentIndex + 1) % reviews.length;

                    // Add active class to new current
                    reviews[currentIndex].classList.add('active');
                }, 4000); // 4 seconds per slide
            }

            function stopSlider() {
                clearInterval(sliderInterval);
            }

            // Start the slider initially
            startSlider();

            // Pause on hover
            sliderContainer.addEventListener('mouseenter', stopSlider);

            // Resume on mouse leave
            sliderContainer.addEventListener('mouseleave', startSlider);

            // Read More toggle for mobile
            const readMoreBtn = document.getElementById('readMoreBtn');
            const aboutContent = document.getElementById('aboutContentMobile');
            if (readMoreBtn && aboutContent) {
                readMoreBtn.addEventListener('click', function () {
                    aboutContent.classList.toggle('expanded');
                    if (aboutContent.classList.contains('expanded')) {
                        readMoreBtn.innerHTML = 'Read Less <i class="fas fa-chevron-up"></i>';
                    } else {
                        readMoreBtn.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
                    }
                });
            }
        });
    </script>

@endsection