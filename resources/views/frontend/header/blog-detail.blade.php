@extends('frontend-layouts.app')

@section('content')

<style>
    a {
        text-decoration: none;
        cursor: pointer;
        color: #007bff;
    }

    .form-header h3 {
        color: white;
        font-size: 30px !important;
    }

    .sidebar-page-container.style-two {
        padding-top: 35px;
    }

    h1,
    h2,
    h3 {
        font-weight: 600;
        color: #000;
    }

    h1 {
        font-size: 38px;
        font-weight: 700;
        line-height: 1.25;
        color: #000;
    }

    h2 {
        font-size: 30px !important;
        line-height: 1.35;
        color: #000;
    }

    h3 {
        font-size: 25px !important;
        color: #000;
    }

    h4 {
        font-size: 18px;
    }

    h2 span {
        font-size: 25px;
        font-weight: 500;
        margin: 20px 0;
        color: blue;
    }

    h3 span {
        font-size: 20px !important;
    }

    p {
        text-align: justify;
    }

    .place-order {
        background: #d7f0fd;
        color: black;
        padding: 10px 20px;
        border-radius: 5%;
        margin: 10px;
    }

    .place-order:hover {
        background: #7e89dd;
        color: white;
    }

    .section h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
    }

    .links {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .links a {
        background: #0056b3;
        color: #fff;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 16px;
        transition: background 0.3s, transform 0.3s;
    }

    .links a:hover {
        background: #0056b3;
        transform: translateY(-2px);
    }

    .links a:active {
        background: #004080;
        transform: translateY(0);
    }

    .image {
        width: 100%;
        height: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

    .image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        display: block;
        border-radius: 10px;
        box-shadow:
            rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset,
            rgba(50, 50, 93, 0.25) 0px 30px 60px -20px,
            rgba(0, 0, 0, 0.25) 0px 20px 40px -25px;
    }

    .blog-detail-banner-section {
        position: relative;
        overflow: hidden;
        padding-bottom: 34px;
        background-color: #f3fef9;
    }

    .blog-detail-banner-section .content-box {
        position: relative;
        max-width: 100%;
    }

    .blog-content ul {
        list-style: disc outside !important;
        padding-left: 28px !important;
        margin: 12px 0 20px !important;
    }

    .blog-content ol {
        list-style: decimal outside !important;
        padding-left: 28px !important;
        margin: 12px 0 20px !important;
    }

    .blog-content li {
        display: list-item !important;
        list-style-position: outside !important;
        margin-bottom: 8px !important;
    }

    .banner-section-three .content-column .inner-column {
        padding-top: 0;
    }

    .sticky-top {
        z-index: 1;
        top: 170px;
    }

    .popular-tags {
        background: #f5f5f5 !important;
        padding: 15px !important;
        border-radius: 15px !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
    }

    .popular-tags .sidebar-title h4 {
        font-size: 20px !important;
        font-weight: 600 !important;
        margin-bottom: 10px !important;
        color: #3F26A6 !important;
        border-bottom: 2px solid #3F26A6 !important;
        padding-bottom: 5px !important;
    }

    .popular-tags .widget-content {
        flex-wrap: wrap !important;
        gap: 8px !important;
        display: inline-block !important;
    }

    .popular-tags a {
        display: inline-block !important;
        padding: 8px 14px !important;
        font-size: 14px !important;
        font-weight: bold !important;
        text-decoration: none !important;
        color: white !important;
        background: #3F26A6 !important;
        border-radius: 15px !important;
        border: none !important;
        transition: all 0.3s ease-in-out !important;
    }

    .popular-tags a:hover {
        background: rgb(34, 20, 90) !important;
        transform: scale(1.05) !important;
    }

    .popular-tags a:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    .links-widget {
        padding: 15px !important;
        border-radius: 15px !important;
    }

    .links-widget .sidebar-title h4 {
        font-size: 20px !important;
        margin-bottom: 10px !important;
        font-weight: 600 !important;
        color: #3F26A6 !important;
        border-bottom: 2px solid #3F26A6 !important;
        padding-bottom: 5px !important;
    }

    .blog-cat {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .blog-cat li {
        margin-bottom: 8px !important;
    }

    .blog-cat a {
        display: block !important;
        padding: 8px 12px !important;
        font-size: 14px !important;
        font-weight: bold !important;
        text-decoration: none !important;
        color: #3F26A6 !important;
        background: transparent !important;
        border-radius: 10px !important;
        transition: all 0.3s ease-in-out !important;
        border: 2px solid #3F26A6 !important;
    }

    .blog-cat a:hover {
        background: #3F26A6 !important;
        color: #fff !important;
    }

    .banner-img {
        width: 100%;
        border-radius: 10px;
        box-shadow:
            rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset,
            rgba(50, 50, 93, 0.25) 0px 30px 60px -20px,
            rgba(0, 0, 0, 0.25) 0px 20px 40px -25px;
    }

    /* .sidebar-sticky-box {
    position: sticky;
    top: 120px;
    z-index: 10;
}

@media only screen and (max-width: 991px) {
    .sidebar-sticky-box {
        position: static;
    }
} */
</style>

<div class="row clearfix">
    <div class="content-column col-lg-12 col-md-12 col-sm-12">
        <div class="inner-column">
            <div class="icon-layer" style="background-image: url(images/icons/icon-2.png)"></div>

            <div class="sidebar-page-container style-two mb-0 pb-0">
                <div class="auto-container mt-3">
                    <div class="row clearfix">

                        <div class="content-side col-lg-8 col-md-12 col-sm-12">

                            <h1>{{$data['blog']['tittle']}}</h1>

                            <div class="blog-detail">
                                <div class="inner-box">
                                    <div class="blockquote-box">
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="inner-column">
                                                    <div class="image">
                                                        <img src="{{ config('app.backend_url') . '/' . ltrim($data['blog']['images'], '/') }}"
                                                            alt="{{ $data['blog']['tittle'] }}" />
                                                    </div>

                                                    <span class="blog-date">
                                                        {{ \Carbon\Carbon::parse($data['blog']['created_at'])->format('F j, Y') }}
                                                    </span>
                                                    <span class="blog-author">
                                                        by {{ $data['author']->name ?? 'Admin' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bold-text">
                                        <div class="blog-content">
                                            {!! $data['blog']['content'] !!}
                                        </div>

                                        @if (!empty($data['blog']['faq']))
                                            <h2>
                                                <strong style="color: rgb(0, 0, 0); background-color: transparent;">
                                                    Frequently Asked Questions
                                                </strong>
                                            </h2>

                                            @php
                                                $faqs = json_decode($data['blog']['faq'], true);
                                            @endphp

                                            @foreach ($faqs as $index => $faq)
                                                <h3><b>Q{{ $index + 1 }}. {{ $faq['question'] }}</b></h3>
                                                <p style="color: rgb(0, 0, 0);">{{ $faq['answer'] }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                            <div class="sidebar-sticky-box">
                                @include('components.pricing-card')
                                    <div class="sidebar-widget links-widget">
                                        <a href="https://api.whatsapp.com/send/?phone=%2B447826233106&text&type=phone_number&app_absent=0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <img class="banner-img" src="{{ asset('/images/whatsapp-order-now.webp') }}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="sidebar-widget links-widget">
                                    <div class="sidebar-title">
                                        <h4>Our Popular Subjects</h4>
                                    </div>

                                    <ul class="blog-cat">
                                        <li><a href="/homework-writing-help-services">Homework Help</a></li>
                                        <li><a href="/assignment-writing-help-services">Assignment Help</a></li>
                                        <li><a href="/essay-writing-help-services">Essay Writing Help</a></li>
                                        <li><a href="/research-paper-writing-services">Research Paper Writing Help</a></li>
                                        <li><a href="/dissertation-writing-help-services">Dissertation Writing Help</a></li>
                                    </ul>
                                </div>

                                <div class="sidebar-widget links-widget">
                                    <div class="sidebar-title">
                                        <h4>Our Popular Subjects</h4>
                                    </div>

                                    <ul class="blog-cat">
                                        <li><a href="/math-assignment-help">Math Assignment Help</a></li>
                                        <li><a href="/economic-assignment-writing-help">Economic Assignment Help</a></li>
                                        <li><a href="/english-assignment-writing-help">English Assignment Help</a></li>
                                        <li><a href="/history-assignment-writing-help">History Assignment Help</a></li>
                                        <li><a href="/geography-assignment-writing-help">Geography Assignment Help</a></li>
                                        <li><a href="/law-assignment-writing-help">Law Assignment Help</a></li>
                                        <li><a href="/linguistic-assignment-help">Linguistic Assignment Help</a></li>
                                        <li><a href="/physics-assignment-help">Physics Assignment Help</a></li>
                                        <li><a href="/sociology-assignment-help">Sociology Assignment Help</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('components.quote-form-modal')

@endsection