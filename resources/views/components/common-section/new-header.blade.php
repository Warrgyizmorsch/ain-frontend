<style>
    /* Scoped classes for the new header to avoid conflicts */
    .znh-header-wrapper {
        font-family: 'Inter', sans-serif;
        background-color: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 9999;
        width: 100%;
    }

    .znh-header-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .znh-logo img {
        height: 50px;
        transition: transform 0.3s ease;
    }

    .znh-logo img:hover {
        transform: scale(1.05);
    }

    .znh-nav {
        display: flex;
        align-items: center;
        gap: 25px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .znh-nav-item {
        position: relative;
    }

    .znh-nav-link {
        text-decoration: none;
        color: #2D2D2D;
        font-weight: 600;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 10px 0;
        transition: color 0.3s ease;
    }

    .znh-nav-link i {
        font-size: 10px;
        transition: transform 0.3s ease;
    }

    .znh-nav-link:hover,
    .znh-nav-item:hover>.znh-nav-link {
        color: #F06A33;
    }

    .znh-nav-item:hover .znh-nav-link i {
        transform: rotate(180deg);
    }

    /* First Level Dropdown */
    .znh-dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        background: #ffffff;
        min-width: 240px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 10px 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 100;
        list-style: none;
        margin: 0;
    }

    /* Apply scroll only to dropdowns that need it and don't have popout submenus */
    .znh-dropdown-scrollable {
        max-height: 70vh;
        overflow-y: auto;
        overflow-x: hidden;
    }

    /* Custom scrollbar for dropdowns */
    .znh-dropdown-scrollable::-webkit-scrollbar,
    .znh-submenu::-webkit-scrollbar {
        width: 6px;
    }

    .znh-dropdown-scrollable::-webkit-scrollbar-track,
    .znh-submenu::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .znh-dropdown-scrollable::-webkit-scrollbar-thumb,
    .znh-submenu::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }

    .znh-dropdown-scrollable::-webkit-scrollbar-thumb:hover,
    .znh-submenu::-webkit-scrollbar-thumb:hover {
        background: #F06A33;
    }

    .znh-nav-item:hover .znh-dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .znh-dropdown-item {
        position: relative;
    }

    .znh-dropdown-link {
        text-decoration: none;
        color: #4A4A4A;
        font-size: 14px;
        font-weight: 500;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        transition: all 0.2s ease;
    }

    .znh-dropdown-link:hover {
        background-color: #FDF3F0;
        color: #F06A33;
        padding-left: 25px;
    }

    /* Second Level Dropdown (Sub-menu) */
    .znh-submenu {
        position: absolute;
        top: 0;
        left: 100%;
        background: #ffffff;
        min-width: 260px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 10px 0;
        opacity: 0;
        visibility: hidden;
        transform: translateX(10px);
        transition: all 0.3s ease;
        list-style: none;
        margin: 0;
        max-height: 60vh;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .znh-submenu::-webkit-scrollbar {
        width: 6px;
    }

    .znh-submenu::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .znh-submenu::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }

    .znh-submenu::-webkit-scrollbar-thumb:hover {
        background: #F06A33;
    }

    .znh-dropdown-item:hover>.znh-submenu {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
    }

    .znh-right-actions {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .znh-contact-widget {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
    }

    .znh-contact-icon {
        background-color: #F4EEFF;
        color: #4A17A3;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    .znh-contact-widget:hover .znh-contact-icon {
        background-color: #4A17A3;
        color: #ffffff;
        transform: rotate(15deg) scale(1.1);
    }

    .znh-contact-text {
        display: flex;
        flex-direction: column;
    }

    .znh-contact-number {
        color: #2D2D2D;
        font-weight: 700;
        font-size: 16px;
        line-height: 1.2;
    }

    .znh-contact-label {
        color: #777777;
        font-size: 12px;
        font-weight: 500;
    }

    .znh-btn-quote {
        background: linear-gradient(135deg, #F06A33, #E85A20);
        color: #ffffff;
        text-decoration: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        box-shadow: 0 4px 15px rgba(240, 106, 51, 0.3);
        transition: all 0.3s ease;
        display: inline-block;
    }

    .znh-btn-quote:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(240, 106, 51, 0.4);
        color: #ffffff;
    }

    /* Mobile Menu (Hidden on desktop) */
    .znh-mobile-toggle {
        display: none;
        font-size: 24px;
        color: #2D2D2D;
        cursor: pointer;
    }

    .znh-mobile-close,
    .znh-mobile-only,
    .znh-mobile-overlay {
        display: none;
    }

    @media (max-width: 1024px) {

        .znh-contact-text,
        .znh-btn-quote.desktop-only {
            display: none;
        }

        .znh-contact-widget {
            display: flex;
            align-items: center;
        }

        .znh-right-actions {
            gap: 15px;
        }

        .znh-mobile-toggle {
            display: block;
        }

        /* Mobile Sidebar Menu */
        .znh-nav {
            position: fixed;
            top: 0;
            right: -320px;
            width: 300px;
            height: 100vh;
            background: linear-gradient(145deg, #1A1530 0%, #0F0C1B 100%);
            flex-direction: column;
            align-items: flex-start;
            padding: 80px 20px 20px 20px;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.6);
            transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1);
            z-index: 10001;
            overflow-y: auto;
            gap: 0px;
        }

        .znh-nav.active {
            right: 0;
        }

        /* Mobile Overlay */
        .znh-mobile-overlay.active {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
        }

        .znh-mobile-close {
            display: block;
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 28px;
            color: #ffffff;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .znh-mobile-close:hover {
            transform: rotate(90deg);
            color: #F06A33;
        }

        .znh-mobile-only {
            display: block;
            width: 100%;
        }

        /* Adjust dropdowns for mobile */
        .znh-dropdown-menu,
        .znh-submenu {
            position: static;
            transform: none;
            box-shadow: none;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 8px;
            padding: 0;
            margin: 0;
            min-width: 100%;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transition: max-height 0.4s ease, opacity 0.4s ease, margin 0.4s ease;
            display: block;
        }

        .znh-submenu {
            padding-left: 15px;
            background: transparent;
        }

        .znh-dropdown-menu.active,
        .znh-submenu.active {
            max-height: 2000px;
            opacity: 1;
            visibility: visible;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .znh-nav-item:hover .znh-dropdown-menu {
            /* Disable desktop hover on mobile */
            max-height: 0;
            opacity: 0;
            visibility: hidden;
            margin: 0;
        }

        .znh-nav-item .znh-dropdown-menu.active,
        .znh-nav-item:hover .znh-dropdown-menu.active {
            max-height: 2000px;
            opacity: 1;
            visibility: visible;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .znh-dropdown-item:hover>.znh-submenu {
            max-height: 0;
            opacity: 0;
            visibility: hidden;
            margin: 0;
        }

        .znh-dropdown-item .znh-submenu.active,
        .znh-dropdown-item:hover>.znh-submenu.active {
            max-height: 2000px;
            opacity: 1;
            visibility: visible;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .znh-nav-item,
        .znh-dropdown-item {
            width: 100%;
        }

        .znh-nav-link,
        .znh-dropdown-link {
            width: 100%;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            color: #e2e8f0;
        }

        .znh-dropdown-link {
            padding: 12px 15px;
        }

        .znh-nav-link i,
        .znh-dropdown-link i {
            transition: transform 0.3s ease;
            color: #a0aec0;
        }

        .znh-nav-link:hover,
        .znh-dropdown-link:hover,
        .znh-nav-item:hover>.znh-nav-link,
        .znh-dropdown-item:hover>.znh-dropdown-link {
            color: #F06A33;
            background-color: transparent;
            padding-left: 0;
        }

        .znh-dropdown-link:hover {
            padding-left: 15px;
            /* keep original padding for dropdown items */
        }
    }
</style>

<!-- FontAwesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<header class="znh-header-wrapper">
    <div class="znh-header-container">

        <!-- Logo -->
        <a href="/" class="znh-logo">
            <img src="/assets/media/layout/assignment_logo.webp" alt="Assignment In Need Logo">
        </a>

        <!-- Main Navigation -->
        <div class="znh-mobile-overlay" id="znhMobileOverlay"></div>
        <ul class="znh-nav" id="znhNav">
            <div class="znh-mobile-close" id="znhMobileClose"><i class="fas fa-times"></i></div>

            <!-- Services Dropdown -->
            <li class="znh-nav-item">
                <a href="#" class="znh-nav-link">Services <i class="fas fa-chevron-down"></i></a>
                <ul class="znh-dropdown-menu">

                    <!-- Assignment Writing -->
                    <li class="znh-dropdown-item">
                        <a href="/assignment-writing-uk" class="znh-dropdown-link">Assignment <i
                                class="fas fa-chevron-right"></i></a>
                        <ul class="znh-submenu">
                            <li><a href="/english-assignment-writing-help" class="znh-dropdown-link">English</a></li>
                            <li><a href="/economic-assignment-writing-help" class="znh-dropdown-link">Economics</a></li>
                            <li><a href="/chemistry-assignment-writing-help" class="znh-dropdown-link">Chemistry</a>
                            </li>
                            <li><a href="/history-assignment-writing-help" class="znh-dropdown-link">History</a></li>
                            <li><a href="/law-assignment-writing-help" class="znh-dropdown-link">Law</a></li>
                            <li><a href="/linguistic-assignment-writing-help" class="znh-dropdown-link">Linguistic</a>
                            </li>
                            <li><a href="/nursing-assignment-writing-help" class="znh-dropdown-link">Nursing</a></li>
                            <li><a href="/physics-assignment-writing-help" class="znh-dropdown-link">Physics</a></li>
                            <li><a href="/sociology-assignment-writing-help" class="znh-dropdown-link">Sociology</a>
                            </li>
                            <li><a href="/philosophy-assignment-writing-help" class="znh-dropdown-link">Philosophy</a>
                            </li>
                            <li><a href="/statistics-assignment-writing-help" class="znh-dropdown-link">Statistics</a>
                            </li>
                            <li><a href="/accounting-assignment-writing-help" class="znh-dropdown-link">Accounting</a>
                            </li>
                            <li><a href="/marketing-assignment-writing-help" class="znh-dropdown-link">Marketing</a>
                            </li>
                            <li><a href="/computer-science-assignment-writing-help" class="znh-dropdown-link">Computer
                                    Science</a></li>
                            <li><a href="/engineering-assignment-writing-help" class="znh-dropdown-link">Engineering</a>
                            </li>
                            <li><a href="/finance-assignment-writing-help" class="znh-dropdown-link">Finance</a></li>
                            <li><a href="/programming-assignment-writing-help" class="znh-dropdown-link">Programming</a>
                            </li>
                            <li><a href="/management-assignment-writing-help" class="znh-dropdown-link">Management</a>
                            </li>
                            <li><a href="/business-assignment-writing-help" class="znh-dropdown-link">Business</a></li>
                            <li><a href="/math-assignment-help" class="znh-dropdown-link">Maths</a></li>
                            <li><a href="/geography-assignment-writing-help" class="znh-dropdown-link">Geography</a>
                            </li>
                            <li><a href="/psychology-assignment-help-uk" class="znh-dropdown-link">Psychology</a></li>
                            <li><a href="/biology-assignment-help-uk" class="znh-dropdown-link">Biology</a></li>
                            <li><a href="/entrepreneurship-assignment-help-uk"
                                    class="znh-dropdown-link">Entrepreneurship</a></li>
                            <li><a href="/artificial-intelligence-assignment-help-uk"
                                    class="znh-dropdown-link">Artificial Intelligence</a></li>
                            <li><a href="/machine-learning-assignment-help-uk" class="znh-dropdown-link">Machine
                                    Learning</a></li>
                            <li><a href="/cybersecurity-assignment-help-uk" class="znh-dropdown-link">Cybersecurity</a>
                            </li>
                            <li><a href="/humanities-assignment-help-uk" class="znh-dropdown-link">Humanities</a></li>
                        </ul>
                    </li>

                    <!-- Dissertation -->
                    <li class="znh-dropdown-item">
                        <a href="/dissertation-writing-help-services" class="znh-dropdown-link">Dissertation <i
                                class="fas fa-chevron-right"></i></a>
                        <ul class="znh-submenu">
                            <li><a href="/dissertation-literature-review-help-uk" class="znh-dropdown-link">Literature
                                    Review Dissertation</a></li>
                            <li><a href="/dissertation-findings-help-uk" class="znh-dropdown-link">Findings
                                    Dissertation</a></li>
                            <li><a href="/dissertation-results-help-uk" class="znh-dropdown-link">Results
                                    Dissertation</a></li>
                            <li><a href="/dissertation-topic-selection-service-help-uk" class="znh-dropdown-link">Topic
                                    Selection Service</a></li>
                            <li><a href="/masters-dissertation-help-uk" class="znh-dropdown-link">Masters
                                    Dissertation</a></li>
                            <li><a href="/case-study-dissertation-help-uk" class="znh-dropdown-link">Case Study
                                    Dissertation</a></li>
                            <li><a href="/dissertation-editing-and-proofreading-help-uk"
                                    class="znh-dropdown-link">Editing & Proofreading</a></li>
                        </ul>
                    </li>

                    <!-- Essay Writing -->
                    <li class="znh-dropdown-item">
                        <a href="/essay-writing-help-services" class="znh-dropdown-link">Essay Writing <i
                                class="fas fa-chevron-right"></i></a>
                        <ul class="znh-submenu">
                            <li><a href="/argumentative-essay-help-uk" class="znh-dropdown-link">Argumentative Essay</a>
                            </li>
                            <li><a href="/analytical-essay-help-uk" class="znh-dropdown-link">Analytical Essay</a></li>
                            <li><a href="/reflective-essay-help-uk" class="znh-dropdown-link">Reflective Essay</a></li>
                            <li><a href="/literature-review-essay-help-uk" class="znh-dropdown-link">Literature Review
                                    Essay</a></li>
                            <li><a href="/descriptive-essay-help-uk" class="znh-dropdown-link">Descriptive Essay</a>
                            </li>
                            <li><a href="/personal-statement-essay-help-uk" class="znh-dropdown-link">Personal
                                    Statement</a></li>
                            <li><a href="/extended-essay-help-uk" class="znh-dropdown-link">Extended Essay</a></li>
                            <li><a href="/essay-proofreading-and-editing-help-uk" class="znh-dropdown-link">Proofreading
                                    And Editing</a></li>
                            <li><a href="/persuasive-essay-help-uk" class="znh-dropdown-link">Persuasive Essay</a></li>
                        </ul>
                    </li>

                    <!-- Research Paper -->
                    <li class="znh-dropdown-item">
                        <a href="/research-paper-writing-services" class="znh-dropdown-link">Research Paper <i
                                class="fas fa-chevron-right"></i></a>
                        <ul class="znh-submenu">
                            <li><a href="/custom-research-paper-help-uk" class="znh-dropdown-link">Custom Research
                                    Paper</a></li>
                            <li><a href="/masters-research-paper-help-uk" class="znh-dropdown-link">Masters Research
                                    Paper</a></li>
                            <li><a href="/phd-research-paper-help-uk" class="znh-dropdown-link">Phd Research Paper</a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="/homework-writing-help-services" class="znh-dropdown-link">Homework Writing</a></li>
                    <li><a href="/thesis-writing-help" class="znh-dropdown-link">Thesis Writing</a></li>
                    <li><a href="/summary-writing-help" class="znh-dropdown-link">Summary Writing</a></li>
                    <li><a href="/personal-statement-writing-help" class="znh-dropdown-link">Personal Statement
                            Writing</a></li>
                    <li><a href="/coursework-writing-help" class="znh-dropdown-link">Coursework Writing</a></li>
                    <li><a href="/term-paper-writing-help" class="znh-dropdown-link">Term Paper Writing</a></li>
                </ul>
            </li>

            <!-- Subjects Dropdown -->
            <li class="znh-nav-item">
                <a href="#" class="znh-nav-link">Subjects <i class="fas fa-chevron-down"></i></a>
                <ul class="znh-dropdown-menu znh-dropdown-scrollable">
                    <li><a href="/math-assignment-help" class="znh-dropdown-link">Maths</a></li>
                    <li><a href="/english-assignment-writing-help" class="znh-dropdown-link">English</a></li>
                    <li><a href="/economic-assignment-writing-help" class="znh-dropdown-link">Economics</a></li>
                    <li><a href="/chemistry-assignment-writing-help" class="znh-dropdown-link">Chemistry</a></li>
                    <li><a href="/history-assignment-writing-help" class="znh-dropdown-link">History</a></li>
                    <li><a href="/law-assignment-writing-help" class="znh-dropdown-link">Law</a></li>
                    <li><a href="/linguistic-assignment-writing-help" class="znh-dropdown-link">Linguistic</a></li>
                    <li><a href="/nursing-assignment-writing-help" class="znh-dropdown-link">Nursing</a></li>
                    <li><a href="/physics-assignment-writing-help" class="znh-dropdown-link">Physics</a></li>
                    <li><a href="/sociology-assignment-writing-help" class="znh-dropdown-link">Sociology</a></li>
                    <li><a href="/philosophy-assignment-writing-help" class="znh-dropdown-link">Philosophy</a></li>
                    <li><a href="/statistics-assignment-writing-help" class="znh-dropdown-link">Statistics</a></li>
                    <li><a href="/accounting-assignment-writing-help" class="znh-dropdown-link">Accounting</a></li>
                    <li><a href="/programming-assignment-writing-help" class="znh-dropdown-link">Programming</a></li>
                    <li><a href="/marketing-assignment-writing-help" class="znh-dropdown-link">Marketing</a></li>
                    <li><a href="/computer-science-assignment-writing-help" class="znh-dropdown-link">Computer
                            Science</a></li>
                    <li><a href="/engineering-assignment-writing-help" class="znh-dropdown-link">Engineering</a></li>
                    <li><a href="/finance-assignment-writing-help" class="znh-dropdown-link">Finance</a></li>
                    <li><a href="/management-assignment-writing-help" class="znh-dropdown-link">Management</a></li>
                    <li><a href="/business-assignment-writing-help" class="znh-dropdown-link">Business</a></li>
                    <li><a href="/geography-assignment-writing-help" class="znh-dropdown-link">Geography</a></li>
                    <li><a href="/psychology-assignment-help-uk" class="znh-dropdown-link">Psychology</a></li>
                    <li><a href="/biology-assignment-help-uk" class="znh-dropdown-link">Biology</a></li>
                    <li><a href="/entrepreneurship-assignment-help-uk" class="znh-dropdown-link">Entrepreneurship</a>
                    </li>
                    <li><a href="/artificial-intelligence-assignment-help-uk" class="znh-dropdown-link">Artificial
                            Intelligence</a></li>
                    <li><a href="/machine-learning-assignment-help-uk" class="znh-dropdown-link">Machine Learning</a>
                    </li>
                    <li><a href="/cybersecurity-assignment-help-uk" class="znh-dropdown-link">Cybersecurity</a></li>
                    <li><a href="/humanities-assignment-help-uk" class="znh-dropdown-link">Humanities</a></li>
                </ul>
            </li>

            <!-- Experts -->
            <li class="znh-nav-item">
                <a href="/writers" class="znh-nav-link">Experts</a>
            </li>

            <!-- Samples -->
            <li class="znh-nav-item">
                <a href="/free-samples" class="znh-nav-link">Samples</a>
            </li>

            <!-- Resources Dropdown -->
            <li class="znh-nav-item">
                <a href="#" class="znh-nav-link">Resources <i class="fas fa-chevron-down"></i></a>
                <ul class="znh-dropdown-menu">
                    <li><a href="/blog" class="znh-dropdown-link">Blog</a></li>
                    <li><a href="/pricing" class="znh-dropdown-link">Pricing</a></li>
                    <li><a href="/review" class="znh-dropdown-link">Reviews</a></li>
                </ul>
            </li>

            <!-- About Us -->
            <li class="znh-nav-item">
                <a href="/what-we-are" class="znh-nav-link">About Us</a>
            </li>

            <!-- Contact -->
            <li class="znh-nav-item">
                <a href="/contact-us" class="znh-nav-link">Contact</a>
            </li>

            <!-- Mobile Only Quote Button -->
            <li class="znh-mobile-only" style="margin-top: 15px;">
                <a href="/upload-your-assignment" class="znh-btn-quote"
                    style="display: block; text-align: center; width: 100%;">Get Free Quote</a>
            </li>

        </ul>

        <!-- Right Side Actions -->
        <div class="znh-right-actions">
            <a href="tel:+447300640066" class="znh-contact-widget">
                <div class="znh-contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="znh-contact-text">
                    <span class="znh-contact-number">+44 7300 640066</span>
                    <span class="znh-contact-label">24/7 Support</span>
                </div>
            </a>
            <a href="/upload-your-assignment" class="znh-btn-quote desktop-only">Get Free Quote</a>

            <!-- Mobile Toggle Icon -->
            <div class="znh-mobile-toggle" id="znhMobileToggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>

    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('znhMobileToggle');
        const closeBtn = document.getElementById('znhMobileClose');
        const nav = document.getElementById('znhNav');
        const overlay = document.getElementById('znhMobileOverlay');

        function toggleMenu() {
            nav.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
        }

        if (toggleBtn) toggleBtn.addEventListener('click', toggleMenu);
        if (closeBtn) closeBtn.addEventListener('click', toggleMenu);
        if (overlay) overlay.addEventListener('click', toggleMenu);

        // Mobile dropdown toggle
        const dropdownLinks = document.querySelectorAll('.znh-nav-link, .znh-dropdown-link');
        dropdownLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                if (window.innerWidth <= 1024) {
                    const dropdown = this.nextElementSibling;
                    if (dropdown && (dropdown.classList.contains('znh-dropdown-menu') || dropdown.classList.contains('znh-submenu'))) {
                        e.preventDefault();
                        dropdown.classList.toggle('active');
                        // Rotate arrow if exists
                        const icon = this.querySelector('i');
                        if (icon) {
                            icon.style.transform = dropdown.classList.contains('active') ? 'rotate(180deg)' : '';
                        }
                    }
                }
            });
        });
    });
</script>