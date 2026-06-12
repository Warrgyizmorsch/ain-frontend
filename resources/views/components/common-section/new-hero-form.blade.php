<div class="znh-quote-card">
    <div class="znh-quote-header">
        <span class="znh-sparkle" style="font-size: 1.2rem; filter: grayscale(100%) opacity(0.6);">✨</span>
        <h3 style="margin: 0 0.5rem; text-transform: capitalize; line-height: 1.4; white-space: nowrap;">Get Instant
            Quote</h3>
        <span class="znh-sparkle" style="font-size: 1.2rem; filter: grayscale(100%) opacity(0.6);">✨</span>
    </div>

    <!-- Submits to the old form's action -->
    <form action="/placeNewOrder" method="POST" class="znh-quote-form" id="placeOrder" enctype="multipart/form-data">
        @csrf

        <div class="znh-form-group-row">
            <div class="znh-input-label-group">
                <span class="znh-input-icon znh-purple-bg">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                    </svg>
                </span>
                <label style="white-space: nowrap;">Academic Level</label>
            </div>
            <div class="znh-select-box">
                <select name="service" class="znh-choices-select" required
                    style="width: 100%; border: none; background: transparent; outline: none; font-size: 0.95rem; color: #1e293b; padding: 0.2rem 0; cursor: pointer;">
                    <option value="">Select Level</option>
                    <option value="Assignment">Assignment</option>
                    <option value="Dissertation">Dissertation</option>
                    <option value="Thesis">Thesis</option>
                    <option value="Research Project">Research Project</option>
                </select>
            </div>
        </div>

        <div class="znh-form-group-row">
            <div class="znh-input-label-group">
                <span class="znh-input-icon znh-red-bg">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                    </svg>
                </span>
                <label style="white-space: nowrap;">Subject</label>
            </div>
            <div class="znh-select-box">
                <select name="subject" class="znh-choices-select" required
                    style="width: 100%; border: none; background: transparent; outline: none; font-size: 0.95rem; color: #1e293b; padding: 0.2rem 0; cursor: pointer;">
                    <option value="">Select Subject</option>
                    <option value="Matlab">Matlab</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Engineering">Engineering</option>
                    <option value="App Development">App Development</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Exam">Exam</option>
                    <option value="Public Health">Public Health</option>
                    <option value="Presentation">Presentation (PPT)</option>
                    <option value="Portfolio">Portfolio</option>
                    <option value="Research Report">Research Report</option>
                    <option value="Business Management">Business Management</option>
                    <option value="Project Management">Project Management</option>
                    <option value="Essay">Essay</option>
                    <option value="HRM">HRM</option>
                    <option value="Economic">Economic</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <div class="znh-form-group-row">
            <div class="znh-input-label-group">
                <span class="znh-input-icon znh-pink-bg">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                </span>
                <label style="white-space: nowrap;">Deadline</label>
            </div>
            <div class="znh-select-box">
                <select name="urgency" class="znh-choices-select" required
                    style="width: 100%; border: none; background: transparent; outline: none; font-size: 0.95rem; color: #1e293b; padding: 0.2rem 0; cursor: pointer;">
                    <option value="">Select Deadline</option>
                    @for ($i = 1; $i <= 15; $i++)
                        <option value="{{ $i }}">{{ $i }} Day{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                    <option value="16 to 20">16-20 Days</option>
                    <option value="21+">21+ Days</option>
                </select>
            </div>
        </div>

        <div class="znh-form-group-row">
            <div class="znh-input-label-group">
                <span class="znh-input-icon znh-blue-bg">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                        <polyline points="14 2 14 8 20 8" />
                        <line x1="16" y1="13" x2="8" y2="13" />
                        <line x1="16" y1="17" x2="8" y2="17" />
                        <polyline points="10 9 9 9 8 9" />
                    </svg>
                </span>
                <label style="white-space: nowrap;">Word Count / Pages</label>
            </div>
            <div class="znh-select-box">
                <select name="wordCount" class="znh-choices-select" required
                    style="width: 100%; border: none; background: transparent; outline: none; font-size: 0.95rem; color: #1e293b; padding: 0.2rem 0; cursor: pointer;">
                    <option value="">Select Word Count</option>
                    <option value="250">250 Words / 1 Page</option>
                    <option value="500">500 Words / 2 Pages</option>
                    <option value="1000">1000 Words / 4 Pages</option>
                    <option value="1500">1500 Words / 6 Pages</option>
                    <option value="2000">2000 Words / 8 Pages</option>
                    <option value="2500">2500 Words / 10 Pages</option>
                    <option value="3000">3000 Words / 12 Pages</option>
                    <option value="4000">4000 Words / 16 Pages</option>
                    <option value="5000">5000+ Words</option>
                </select>
            </div>
        </div>

        <div class="znh-form-group-full">
            <label>Email Address</label>
            <input type="email" name="email" required placeholder="Enter your email">
        </div>

        <!-- Hidden inputs required by placeNewOrder -->
        <input type="hidden" name="workType" value="Standard">
        <input type="hidden" name="topic" value="Ordered from New Hero Form">
        <input type="hidden" name="requirements" value="Please refer to subject and service level.">
        <input type="hidden" name="estimatedPrice" value="0">
        <input type="hidden" name="discount" value="0">
        <input type="hidden" name="finalPrice" value="0">
        <input type="hidden" name="mobile" value="0000000000">

        <div style="margin-top: 15px; margin-bottom: 15px; display: flex; justify-content: center;">
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                style="transform:scale(0.85);-webkit-transform:scale(0.85);transform-origin:0 0;-webkit-transform-origin:0 0;">
            </div>
        </div>

        <button type="submit" class="znh-btn-submit" style="white-space: nowrap;">Get Price Now &rarr;</button>

        <div class="znh-form-features">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="3">
                    <polyline points="20 6 9 17 4 12" />
                </svg> It's free</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="3">
                    <polyline points="20 6 9 17 4 12" />
                </svg> No obligation</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="3">
                    <polyline points="20 6 9 17 4 12" />
                </svg> Quick response</span>
        </div>
    </form>
</div>

<!-- Select2 for Smooth Searchable Dropdowns -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function initSelect2() {
        if (window.jQuery && window.jQuery.fn && window.jQuery.fn.select2) {
            window.jQuery('.znh-choices-select').select2({
                width: '100%',
                dropdownCssClass: 'znh-smooth-dropdown',
                minimumResultsForSearch: 0 // Always show search bar
            });
        } else {
            setTimeout(initSelect2, 100);
        }
    }
    initSelect2();
</script>

<style>
    /* Smooth Email Field Focus */
    .znh-form-group-full input:focus {
        border-color: #7c3aed !important;
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1) !important;
    }

    /* Custom styling for Select2 to fit the minimalist theme */
    .select2-container--default .select2-selection--single {
        background-color: transparent;
        border: none;
        height: 32px;
        display: flex;
        align-items: center;
        outline: none !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #1e293b;
        font-size: 0.95rem;
        font-weight: 500;
        padding-left: 0;
        line-height: normal;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100%;
        top: 0;
        right: 0;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #64748b transparent transparent transparent;
        border-width: 5px 5px 0 5px;
    }

    .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border-color: transparent transparent #64748b transparent;
        border-width: 0 5px 5px 5px;
    }

    /* Dropdown UI */
    .znh-smooth-dropdown {
        border: 1px solid #e2e8f0 !important;
        border-radius: 8px !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        padding: 5px !important;
        margin-top: 5px !important;
        z-index: 9999 !important;
    }

    .select2-search--dropdown {
        padding: 5px !important;
    }

    .select2-search--dropdown .select2-search__field {
        border: 1px solid #cbd5e1 !important;
        border-radius: 6px !important;
        padding: 8px 12px !important;
        outline: none !important;
        font-family: inherit !important;
    }

    .select2-search--dropdown .select2-search__field:focus {
        border-color: #7c3aed !important;
        box-shadow: 0 0 0 2px rgba(124, 58, 237, 0.1) !important;
    }

    .select2-results__option {
        padding: 8px 12px !important;
        font-size: 0.9rem !important;
        color: #334155 !important;
        border-radius: 6px !important;
        margin-bottom: 2px !important;
        transition: background-color 0.2s ease, color 0.2s ease !important;
    }

    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
        background-color: #f1f5f9 !important;
        color: #0f172a !important;
    }

    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: #e0e7ff !important;
        color: #4f46e5 !important;
        font-weight: 600 !important;
    }
</style>