@extends('frontend-layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Page - Assignment In Need</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Segoe UI', sans-serif;
            font-size: 15px;
            color: #333;
            background: #f4f6fb;
            line-height: 1.7;
        }

        a { text-decoration: none; cursor: pointer; color: #007bff; }

        h1, h2, h3 { font-weight: 500; color: black; }
        h1 { font-size: 45px; font-weight: bolder; }
        h4 { font-size: 16px; }
        h2 { font-size: 31px !important; }
        h3 { font-size: 20px !important; }

        @media only screen and (max-width: 479px) {
            h1 { font-size: 24px !important; line-height: 1.4em; font-weight: bolder; }
            h2 { font-size: 25px !important; }
        }

        h2 span { font-size: 25px; font-weight: 500; margin: 20px 0; color: blue; }
        h3 span { font-size: 20px !important; }

        p { text-align: justify; }

        /* ===== Layout ===== */
        .auto-container { max-width: 1200px; margin: 0 auto; padding: 0 15px; }
        .row { display: flex; flex-wrap: wrap; margin: 0 -15px; }
        .col-lg-8 { flex: 0 0 66.666%; max-width: 66.666%; padding: 0 15px; }
        .col-lg-4 { flex: 0 0 33.333%; max-width: 33.333%; padding: 0 15px; }

        @media (max-width: 991px) {
            .col-lg-8, .col-lg-4 { flex: 0 0 100%; max-width: 100%; }
        }

        /* ===== Banner ===== */
        .blog-detail-banner-section {
            padding: 15px 10px 34px;
            position: relative;
            overflow: hidden;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .content-box {
            background: linear-gradient(135deg, #2e40ad, #0776c6);
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            color: white;
            margin-bottom: 40px;
            padding: 30px 20px;
        }

        .content-box h1 {
            color: #fff;
            font-size: 2.0rem;
            font-weight: 100;
            margin: 0;
            line-height: 1.3;
            letter-spacing: 0.5px;
        }

        @media (max-width: 479px) {
            .content-box h1 { font-size: 1.3rem !important; }
        }

        /* ===== Meta Table ===== */
        .tablePractice {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.07);
            margin: 0 0 30px;
        }

        .tablePractice .table-title {
            font-size: 1.2rem;
            color: #2e40ad;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
        }

        .tablePractice ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 12px;
        }

        .tablePractice li {
            background-color: #f5f9ff;
            border: 1px solid #dde6f3;
            border-left: 4px solid #1e67bd;
            border-right: 4px solid #1e67bd;
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 14px;
        }

        .tablePractice li span {
            color: #2e40ad;
            font-weight: 600;
            margin-right: 8px;
        }

        /* ===== Intro ===== */
        .intro-section {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            font-size: 1rem;
            line-height: 1.8;
            color: #333;
            margin-top: 12px;
        }

        .intro-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 25px;
        }

        /* ===== Social ===== */
        .social-section {
            padding-top: 2.5rem;
            border-radius: 12px;
            text-align: center;
        }

        .social-heading {
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
            color: #333;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 10px 0;
        }

        .social-icons a {
            font-size: 0.9rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 0.9;
        }

        .social-icons a:hover { transform: scale(1.1); opacity: 1; }
        .facebook { color: #1877f2; }
        .instagram { color: #e4405f; }
        .twitter { color: #1da1f2; }
        .pinterest { color: #bd081c; }
        .youtube { color: #ff0000; }

        /* ===== Guidance Section ===== */
        .sample-guidance-section {
            background: linear-gradient(white, white) padding-box,
                linear-gradient(135deg, #6e40c9, #007fff) border-box;
            border: 3px solid transparent;
            padding: 2rem;
            margin-top: 1.5rem;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
        }

        .sample-guidance-section h2 {
            font-size: 1.5rem !important;
            font-weight: 700;
            text-align: left;
            color: #3a3a5a !important;
            margin-bottom: .5rem;
        }

        .sample-description {
            font-size: 1rem;
            line-height: 1.7;
            color: #444;
            text-align: justify;
            margin-bottom: 1rem;
        }

        .sample-description em { color: #6e40c9; font-style: italic; font-weight: 400; }
        .sample-description strong { color: #1a73e8; }

        /* ===== Sidebar ===== */
        .sidebar { position: sticky; top: 20px; }

        .sidebar-widget { margin-bottom: 20px; }

        /* Pricing Card */
        .pricing-card {
            background: linear-gradient(135deg, #2e40ad, #0776c6);
            border-radius: 14px;
            padding: 24px;
            color: #fff;
            margin-bottom: 20px;
            box-shadow: 0 6px 18px rgba(46,64,173,0.25);
        }

        .pricing-card h3 { color: #fff; font-size: 18px; margin-bottom: 6px; font-weight: 500; }
        .pricing-card .price { font-size: 40px; font-weight: 700; margin: 8px 0; }
        .pricing-card .price span { font-size: 16px; font-weight: 400; opacity: .8; }

        .pricing-features { list-style: none; margin: 14px 0; padding: 0; }
        .pricing-features li {
            font-size: 14px;
            padding: 5px 0;
            opacity: .92;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }
        .pricing-features li:last-child { border-bottom: none; }
        .pricing-features li::before { content: '✓'; font-weight: 700; color: #7ff5c0; }

        .order-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background: #fff;
            color: #2e40ad;
            border-radius: 8px;
            text-align: center;
            font-size: 15px;
            font-weight: 600;
            margin-top: 14px;
            border: none;
            cursor: pointer;
            transition: background .2s;
        }
        .order-btn:hover { background: #e8f0fe; }

        /* Popular Subjects */
        .links-widget {
            background: #f5f5f5;
            padding: 15px !important;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .links-widget .sidebar-title h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #3F26A6;
            border-bottom: 2px solid #3F26A6;
            padding-bottom: 5px;
        }

        .blog-cat { list-style: none; padding: 0; margin: 0; }
        .blog-cat li { margin-bottom: 8px; }

        .blog-cat a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: bold;
            color: #3F26A6;
            background: transparent;
            border-radius: 10px;
            border: 2px solid #3F26A6;
            transition: all 0.3s;
        }

        .blog-cat a:hover { background: #1365c0; color: #fff; }

        .total-sample {
            background-color: #1e3a8a;
            color: white;
            font-size: 11px;
            font-weight: bold;
            padding: 2px 9px;
            border-radius: 22px;
            display: inline-block;
        }

        /* ===== Swiper Section ===== */
        .sample-section {
            margin: 30px 0;
            padding: 4rem 2rem;
            background: #f9f9f9;
            border-radius: 12px;
        }

        .sample-section .section-title {
            font-size: 1.5rem !important;
            margin-bottom: 1.5rem;
            color: #2e40ad;
        }

        .swiper-slide {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            height: auto;
        }

        .swiper-slide h4 { font-size: 1.05rem; color: #222; margin-bottom: 1rem; }

        .swiper-slide p {
            flex-grow: 1;
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .swiper-slide .link {
            color: #5e2ced;
            font-weight: bold;
            font-size: 14px;
            transition: color 0.3s;
        }

        .swiper-slide .link:hover { color: #0056b3; }

        .swiper-button-next, .swiper-button-prev { color: #5e2ced; }

        .swiper-pagination-bullet { background: #ccc; opacity: 1; }
        .swiper-pagination-bullet-active { background: #5e2ced; }

        /* ===== Page Wrapper ===== */
        .sidebar-page-container { padding-top: 35px; }

        /* ===== Responsive ===== */
        @media (max-width: 767px) {
            .sample-section { padding: 2rem 1rem; }
            .intro-section { padding: 18px; }
            .pricing-card { padding: 18px; }
        }
    </style>
</head>
<body>

<div class="auto-container mt-3" style="margin-top: 20px;">
    <div class="row">

        <!-- ===== Main Content ===== -->
        <div class="col-lg-8">
            <div class="blog-detail-banner-section">

                <!-- Banner Title -->
                <div class="content-box">
                    <h1>Geography-Climate Change, Sustainability, and Ecosystem Services</h1>
                </div>

                <!-- Meta Table -->
                <div class="tablePractice">
                    <p class="table-title"><span>University</span></p>
                    <ul>
                        <li><span>Unit No:</span> 0</li>
                        <li><span>Level:</span> High School</li>
                        <li><span>Pages:</span> 1569</li>
                        <li><span>Paper type:</span> 9</li>
                        <li><span>Course Code:</span> -</li>
                        <li><span>Downloads:</span> 63,838</li>
                    </ul>
                </div>

                <!-- Introduction -->
                <div class="intro-section mt-3">
                    <h2 class="intro-title">
                        <span style="background-color: #fff; color: #06142d;">Introduction</span>
                    </h2>
                    <p>
                        This book helps understand these complex interlinkages of climate change, sustainability, and ecosystem services, which forms the basis and necessity for a world today. You can either be a student, an environmental activist, or just a person interested in knowing how all this impacts your world; this book forms an inclusive guide to take you through critical topics on semi-professional language, yet quite conversational and not too academic. If you don’t want take any stress about Geography Assignment then go and take help from <span><a href="https://www.assignnmentinneed.com/geography-assignment-writing-help">Geography Assignment Help</a></span>.
                    </p>
                    {{-- <br>
                    <p>
                        Rising temperatures, shifting precipitation patterns, and increasing frequency of extreme weather events
                        are fundamentally altering the conditions under which crops are grown, livestock is raised, and food is
                        distributed globally. This essay explores the multifaceted relationship between climate change and food
                        security, drawing on scientific evidence and policy analysis to assess current and future risks...
                    </p> --}}
                </div>

                <!-- Social Share -->
                <div class="social-section">
                    <h4 class="social-heading">Share with Your Friends</h4>
                    <div class="social-icons py-2">
                        <a href="https://www.facebook.com/" target="_blank" class="facebook">
                            <i class="fab fa-facebook-square"></i> Facebook
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="instagram">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                        <a href="https://x.com/" target="_blank" class="twitter">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://in.pinterest.com/" target="_blank" class="pinterest">
                            <i class="fab fa-pinterest"></i> Pinterest
                        </a>
                        <a href="https://www.youtube.com/" target="_blank" class="youtube">
                            <i class="fab fa-youtube"></i> YouTube
                        </a>
                    </div>
                </div>

                <!-- Guidance Section -->
                <section class="sample-guidance-section">
                    <h2>Struggling with Assignments? Our Free Samples Can Guide You!</h2>
                    <p class="sample-description">
                        It's common for students to feel overwhelmed and wonder,
                        <a href="https://www.assignnmentinneed.com/do-my-assignment-for-me"><em>"Can someone do my assignment for me?"</em></a>
                        That's exactly why we've built this sample section — to give you a clear look at the
                        quality we deliver through real, all subject-specific examples. From
                        <a href="https://www.assignnmentinneed.com/essay-writing-help-services"><strong>essays help</strong></a> and <a href="https://www.assignnmentinneed.com/uk/case-study-writing-help"><strong>case studies</strong></a>,
                        to <a href="https://www.assignnmentinneed.com/dissertation-writing-help-services"><strong>dissertation help</strong></a>, project reports,
                        <a href="https://www.assignnmentinneed.com/research-paper-writing-services"><strong>research paper help</strong></a>, and
                        <a href="https://www.assignnmentinneed.com/homework-writing-help-services"><strong>homework help</strong></a>, our work showcases depth, clarity, and expert precision.
                    </p>
                    <p class="sample-description">
                        At <a href="https://www.assignnmentinneed.com/"><strong>Assignment In Need</strong></a>, we go beyond basic writing services with
                        plagiarism-free content, timely submissions, qualified experts, 24/7 support, affordable prices,
                        and free unlimited revisions. These samples aren't just academic models — they're proof of the
                        excellence we bring to every project.
                    </p>
                </section>

            </div>
        </div>

        <!-- ===== Sidebar ===== -->
        <div class="col-lg-4">
            <aside class="sidebar">

                <!-- Pricing Card -->
                {{-- <div class="pricing-card">
                    <h3>Get your assignment done</h3>
                    <div class="price">£9<span>/page</span></div>
                    <ul class="pricing-features">
                        <li>Plagiarism-free content</li>
                        <li>On-time delivery</li>
                        <li>Free unlimited revisions</li>
                        <li>24/7 expert support</li>
                        <li>Any subject covered</li>
                        <li>Qualified academic writers</li>
                    </ul>
                    <a href="#" class="order-btn">Place an Order →</a>
                </div> --}}

                @include('components.pricing-card')

                <!-- Popular Subjects -->
                <div class="sidebar-widget links-widget">
                    <div class="sidebar-title">
                        <h4>Our Popular Subjects</h4>
                    </div>
                    <ul class="blog-cat">
                        <li>
                            <a href="https://www.assignnmentinneed.com/homework-writing-help-services">
                                <p style="margin-bottom:0;">Nursing &amp; Healthcare</p>
                                <p class="total-sample">482</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.assignnmentinneed.com/homework-writing-help-services">
                                <p style="margin-bottom:0;">Business Management</p>
                                <p class="total-sample">374</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.assignnmentinneed.com/homework-writing-help-services">
                                <p style="margin-bottom:0;">Law</p>
                                <p class="total-sample">291</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.assignnmentinneed.com/homework-writing-help-services">
                                <p style="margin-bottom:0;">Computer Science</p>
                                <p class="total-sample">258</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.assignnmentinneed.com/homework-writing-help-services">
                                <p style="margin-bottom:0;">Engineering</p>
                                <p class="total-sample">203</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.assignnmentinneed.com/homework-writing-help-services">
                                <p style="margin-bottom:0;">Psychology</p>
                                <p class="total-sample">187</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.assignnmentinneed.com/homework-writing-help-services">
                                <p style="margin-bottom:0;">Finance &amp; Accounting</p>
                                <p class="total-sample">164</p>
                            </a>
                        </li>
                    </ul>
                </div>

            </aside>
        </div>

    </div><!-- /.row -->

    <!-- ===== Related Samples Swiper ===== -->
    <section class="sample-section">
        <div class="auto-container">
            <h2 class="section-title">Latest Related Free Samples (1000+ Free Samples)</h2>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <h4>Geographical Information Syste...</h4>
                        <h3><b>What is GIS?</b></h3>
                        <p>A Definition: Geographical Information System (GIS) Definition A technological system of acquiring, analyzing, and representi...</p>
                        <a href="https://www.assignnmentinneed.com/free-samples/Geography/geographical-information-systems-gis-data-analysis-and-mapping-techniques" class="link">View or Download →</a>
                    </div>

                    <div class="swiper-slide">
                        <h4>Geography-Climate Change, Sust...</h4>
                        <p>This book helps understand these complex interlinkages of climate change, sustainability, and ecosystem services, which forms the basis and necessity for a world today. You can either be a student, an environmental activist, or jus...</p>
                        <a href="https://www.assignnmentinneed.com/free-samples/Geography/geography-climate-change-sustainability-and-ecosystem-services" class="link">View or Download →</a>
                    </div>

                    {{-- <div class="swiper-slide">
                        <h4>Water Scarcity and Irrigation Policy</h4>
                        <p>A policy-focused review of global water scarcity trends and the role of government regulation in ensuring equitable irrigation access for farmers.</p>
                        <a href="#" class="link">View or Download →</a>
                    </div>

                    <div class="swiper-slide">
                        <h4>Renewable Energy and Carbon Neutrality</h4>
                        <p>Explores the transition from fossil fuels to renewable energy sources and its projected impact on global carbon emission targets by 2050.</p>
                        <a href="#" class="link">View or Download →</a>
                    </div>

                    <div class="swiper-slide">
                        <h4>Urban Heat Islands and Public Health</h4>
                        <p>Investigates how urban heat islands exacerbate health inequalities in densely populated cities, with case studies from London and Mumbai.</p>
                        <a href="#" class="link">View or Download →</a>
                    </div>

                    <div class="swiper-slide">
                        <h4>Ocean Acidification and Marine Ecosystems</h4>
                        <p>A scientific review of the biological and chemical consequences of rising ocean acidity on coral reefs and commercially important fish species.</p>
                        <a href="#" class="link">View or Download →</a>
                    </div> --}}

                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

</div><!-- /.auto-container -->

<!-- ===== Scripts ===== -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640:  { slidesPerView: 1 },
            768:  { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
</script>

</body>
</html>
@endsection