@extends('frontend-layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<main class="w-full font-sans text-gray-800 bg-[#fbfcff]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-sm text-gray-500">
        Home <span class="mx-2">&gt;</span> <span class="text-gray-900">Pricing</span>
    </div>

    <section style="padding-top: 0px;" class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-5 flex flex-col lg:flex-row gap-12 items-start justify-between">
        <!-- Faded Background Image for Mobile -->
        <div class="absolute inset-0 z-0 lg:hidden pointer-events-none" style="background-image: url('public/new-pricingimg/hero.png'); background-repeat: no-repeat; background-position: center; background-size: cover; opacity: 0.15;"></div>

        <div class="lg:w-1/2 pt-4 relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-purple-50 text-purple-700 text-xs font-bold uppercase tracking-wide mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Get Instant Quote
            </div>
            
            <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                Get The Perfect Help <br>
                <span class="text-purple-700">For Your Assignments</span>
            </h1>
            
            <p class="text-gray-600 text-base mb-8 max-w-lg">
                Fill out the form with your requirements and our academic experts will provide you with a tailored solution and price. No hidden charges, 100% transparency.
            </p>
            
            <div class="grid grid-cols-5 gap-2 lg:flex lg:flex-wrap lg:gap-8 mb-10">
                <div class="flex flex-col items-center text-center group cursor-pointer hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 shadow-sm border border-gray-100 mb-1 lg:mb-2 text-base lg:text-2xl group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:shadow-purple-200 transition-all duration-300"><i class="fa-solid fa-award"></i></div>
                    <span class="text-[9px] lg:text-xs font-bold text-gray-900 leading-tight">100% Original<br>Work</span>
                </div>
                <div class="flex flex-col items-center text-center group cursor-pointer hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 shadow-sm border border-gray-100 mb-1 lg:mb-2 text-base lg:text-2xl group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:shadow-purple-200 transition-all duration-300"><i class="fa-regular fa-clock"></i></div>
                    <span class="text-[9px] lg:text-xs font-bold text-gray-900 leading-tight">On-Time<br>Delivery</span>
                </div>
                <div class="flex flex-col items-center text-center group cursor-pointer hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 shadow-sm border border-gray-100 mb-1 lg:mb-2 text-base lg:text-2xl group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:shadow-purple-200 transition-all duration-300"><i class="fa-solid fa-user-graduate"></i></div>
                    <span class="text-[9px] lg:text-xs font-bold text-gray-900 leading-tight">Expert<br>Writers</span>
                </div>
                <div class="flex flex-col items-center text-center group cursor-pointer hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 shadow-sm border border-gray-100 mb-1 lg:mb-2 text-base lg:text-2xl group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:shadow-purple-200 transition-all duration-300"><i class="fa-solid fa-headset"></i></div>
                    <span class="text-[9px] lg:text-xs font-bold text-gray-900 leading-tight">24/7<br>Support</span>
                </div>
                <div class="flex flex-col items-center text-center group cursor-pointer hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 shadow-sm border border-gray-100 mb-1 lg:mb-2 text-base lg:text-2xl group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:shadow-purple-200 transition-all duration-300"><i class="fa-solid fa-shield-halved"></i></div>
                    <span class="text-[9px] lg:text-xs font-bold text-gray-900 leading-tight">Money Back<br>Guarantee</span>
                </div>
            </div>

            <div class="hidden lg:block relative w-full max-w-2xl lg:w-[115%] lg:max-w-none mt-6 lg:mt-0 lg:-ml-8">
                <img src="public\new-pricingimg\hero.png" alt="Pricing Assets" class="w-full h-auto drop-shadow-2xl">
            </div>
        </div>

        <div class="lg:w-1/2 w-full relative z-10">
            <div class="znw-contact-right" style="background: #ffffff; border-radius: 16px; padding: 2.5rem; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04); width: 100%;">
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
                        <input type="email" name="email" class="znw-form-control" placeholder="Enter your email address" required>
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
                        <textarea name="message" class="znw-form-control" placeholder="Type your message here..." required></textarea>
                    </div>

                    <button type="submit" class="znw-submit-btn">
                        Send Message
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 18px; height: 18px;">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>

                    <div class="znw-secure-text">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"></path>
                        </svg>
                        Your information is 100% secure and confidential.
                    </div>
                </form>
            </div>

            <style>
                .znw-form-title { font-size: 1.6rem; font-weight: 800; color: #1a1530; margin-bottom: 2rem; position: relative; display: inline-block; }
                .znw-form-title::after { content: ''; position: absolute; left: 0; bottom: -8px; height: 3px; width: 45px; background: linear-gradient(90deg, #6d28d9, #ea580c); border-radius: 2px; }
                .znw-form-group { margin-bottom: 1.25rem; }
                .znw-form-label { display: block; font-size: 0.9rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem; }
                .znw-form-label span { color: #ef4444; }
                .znw-form-control { width: 100%; padding: 0.8rem 1rem; border: 1px solid #f3f4f6; border-radius: 8px; font-size: 0.9rem; color: #1f2937; background: #ffffff; transition: all 0.3s ease; outline: none; font-family: inherit; }
                .znw-form-control:focus { border-color: #6d28d9; box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.1); }
                .znw-form-control::placeholder { color: #9ca3af; }
                select.znw-form-control { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.2em; }
                textarea.znw-form-control { resize: vertical; min-height: 120px; }
                .znw-submit-btn { width: 100%; background: #5b21b6; color: #ffffff; font-weight: 600; font-size: 1rem; padding: 1rem; border: none; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 0.5rem; transition: background 0.3s ease; margin-top: 1rem; }
                .znw-submit-btn:hover { background: #4c1d95; }
                .znw-secure-text { display: flex; align-items: center; justify-content: center; gap: 0.5rem; margin-top: 1.5rem; font-size: 0.8rem; font-weight: 500; color: #6b7280; }
                .znw-secure-text svg { color: #10b981; width: 16px; height: 16px; }
            </style>
        </div>
    </section>

   


    <section class="bg-white py-4 md:py-8 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-purple-50 text-purple-700 text-xs font-bold uppercase tracking-wide mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                What's Included
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-10 max-w-xl leading-snug">Everything You Get With Assignment In Need</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 lg:gap-6 w-full">
                <div class="bg-[#fbfcff] p-4 lg:p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group lg:col-span-1">
                    <div class="flex items-center gap-3 mb-1 lg:mb-3">
                        <div class="w-12 h-12 flex-shrink-0 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-xl lg:text-2xl group-hover:bg-purple-700 group-hover:text-white transition-colors duration-300 group-hover:rotate-6"><i class="fa-regular fa-file-lines"></i></div>
                        <h4 class="font-bold text-gray-900 text-sm lg:text-[13px] xl:text-sm leading-tight">100% Original<span class="hidden lg:inline"><br></span><span class="lg:hidden"> </span>Content</h4>
                    </div>
                    <div class="ml-[60px] lg:ml-0">
                        <p class="text-[11px] lg:text-xs text-gray-500 leading-relaxed">Plagiarism-free content that is 100% original and authentic.</p>
                    </div>
                </div>
                <div class="bg-[#fbfcff] p-4 lg:p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group lg:col-span-1">
                    <div class="flex items-center gap-3 mb-1 lg:mb-3">
                        <div class="w-12 h-12 flex-shrink-0 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-xl lg:text-2xl group-hover:bg-purple-700 group-hover:text-white transition-colors duration-300 group-hover:rotate-6"><i class="fa-solid fa-user-tie"></i></div>
                        <h4 class="font-bold text-gray-900 text-sm lg:text-[13px] xl:text-sm leading-tight">Expert<span class="hidden lg:inline"><br></span><span class="lg:hidden"> </span>Writers</h4>
                    </div>
                    <div class="ml-[60px] lg:ml-0">
                        <p class="text-[11px] lg:text-xs text-gray-500 leading-relaxed">Top 1% academic writers with advanced degrees.</p>
                    </div>
                </div>
                <div class="bg-[#fbfcff] p-4 lg:p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group lg:col-span-1">
                    <div class="flex items-center gap-3 mb-1 lg:mb-3">
                        <div class="w-12 h-12 flex-shrink-0 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-xl lg:text-2xl group-hover:bg-purple-700 group-hover:text-white transition-colors duration-300 group-hover:rotate-6"><i class="fa-solid fa-stopwatch"></i></div>
                        <h4 class="font-bold text-gray-900 text-sm lg:text-[13px] xl:text-sm leading-tight">On-Time<span class="hidden lg:inline"><br></span><span class="lg:hidden"> </span>Delivery</h4>
                    </div>
                    <div class="ml-[60px] lg:ml-0">
                        <p class="text-[11px] lg:text-xs text-gray-500 leading-relaxed">Timely delivery before your deadline, every time.</p>
                    </div>
                </div>
                <div class="bg-[#fbfcff] p-4 lg:p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group lg:col-span-1">
                    <div class="flex items-center gap-3 mb-1 lg:mb-3">
                        <div class="w-12 h-12 flex-shrink-0 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-xl lg:text-2xl group-hover:bg-purple-700 group-hover:text-white transition-colors duration-300 group-hover:rotate-6"><i class="fa-solid fa-arrows-rotate"></i></div>
                        <h4 class="font-bold text-gray-900 text-sm lg:text-[13px] xl:text-sm leading-tight">Unlimited<span class="hidden lg:inline"><br></span><span class="lg:hidden"> </span>Revisions</h4>
                    </div>
                    <div class="ml-[60px] lg:ml-0">
                        <p class="text-[11px] lg:text-xs text-gray-500 leading-relaxed">Unlimited revisions until you are completely satisfied.</p>
                    </div>
                </div>
                <div class="bg-[#fbfcff] p-4 lg:p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group lg:col-span-1">
                    <div class="flex items-center gap-3 mb-1 lg:mb-3">
                        <div class="w-12 h-12 flex-shrink-0 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-xl lg:text-2xl group-hover:bg-purple-700 group-hover:text-white transition-colors duration-300 group-hover:rotate-6"><i class="fa-solid fa-headset"></i></div>
                        <h4 class="font-bold text-gray-900 text-sm lg:text-[13px] xl:text-sm leading-tight">24/7 Customer<span class="hidden lg:inline"><br></span><span class="lg:hidden"> </span>Support</h4>
                    </div>
                    <div class="ml-[60px] lg:ml-0">
                        <p class="text-[11px] lg:text-xs text-gray-500 leading-relaxed">Our support team is available 24/7 to assist you.</p>
                    </div>
                </div>
                <div class="bg-[#fbfcff] p-4 lg:p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group lg:col-span-1">
                    <div class="flex items-center gap-3 mb-1 lg:mb-3">
                        <div class="w-12 h-12 flex-shrink-0 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-xl lg:text-2xl group-hover:bg-purple-700 group-hover:text-white transition-colors duration-300 group-hover:rotate-6"><i class="fa-solid fa-shield-halved"></i></div>
                        <h4 class="font-bold text-gray-900 text-sm lg:text-[13px] xl:text-sm leading-tight">Money Back<span class="hidden lg:inline"><br></span><span class="lg:hidden"> </span>Guarantee</h4>
                    </div>
                    <div class="ml-[60px] lg:ml-0">
                        <p class="text-[11px] lg:text-xs text-gray-500 leading-relaxed">100% money back guarantee if you're not satisfied.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 md:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-12">
            <div class="lg:w-5/12">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-purple-100 text-purple-700 text-xs font-bold uppercase tracking-wide mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Why Students Choose Us
                </div>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4 leading-snug">Why Students <br><span class="text-purple-700">Choose</span> <br><span class="text-orange-500">Assignment In Need?</span></h2>
                <p class="text-gray-500 text-sm leading-relaxed">We are committed to helping students achieve academic excellence by providing reliable, high-quality, and affordable assignment help.</p>
            </div>
            
            <div class="lg:w-7/12 grid grid-cols-1 md:grid-cols-2 gap-4 lg:pl-1">
                <div class="flex gap-4 group p-3 rounded-xl hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                    <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600 shadow-sm text-xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-shield-halved"></i></div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1 group-hover:text-purple-700 transition-colors">Trusted by Thousands</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Thousands of students across the UK and worldwide trust us for their academic needs.</p>
                    </div>
                </div>
                <div class="flex gap-4 group p-3 rounded-xl hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                    <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600 shadow-sm text-xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-tag"></i></div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1 group-hover:text-purple-700 transition-colors">Affordable Pricing</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Get premium quality help at prices that fit your budget.</p>
                    </div>
                </div>
                <div class="flex gap-4 group p-3 rounded-xl hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                    <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600 shadow-sm text-xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-award"></i></div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1 group-hover:text-purple-700 transition-colors">Quality You Can Rely On</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">We follow strict quality control to deliver the best results.</p>
                    </div>
                </div>
                <div class="flex gap-4 group p-3 rounded-xl hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                    <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600 shadow-sm text-xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-lock"></i></div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1 group-hover:text-purple-700 transition-colors">Confidential & Secure</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Your privacy and information are 100% protected with us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-4 md:py-8 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-12 items-center">
            <div class="lg:w-1/4">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-purple-50 text-purple-700 text-xs font-bold uppercase tracking-wide mb-4">
                    Student Success Stories
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-6 leading-snug">See What Our Students Have To Say</h2>
                <div class="flex items-end gap-3 mb-2">
                    <span class="text-4xl font-black text-purple-800">4.8/5</span>
                    <span class="text-yellow-400 text-xl mb-1">★★★★★</span>
                </div>
                <p class="text-sm text-gray-500 font-medium">Based on 2,500+ Reviews</p>
            </div>

            <div class="lg:w-3/4 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 xl:gap-6 w-full">
                    <div class="w-full bg-[#fbfcff] p-4 xl:p-4 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                        <div>
                            <div class="text-purple-600 text-3xl mb-4 opacity-80 group-hover:text-purple-800 transition-colors duration-300 group-hover:scale-110 transform origin-left"><i class="fa-solid fa-quote-left"></i></div>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 group-hover:text-gray-800 transition-colors">The assignment was well-researched, perfectly written, and delivered on time. It helped me score an A+. Highly recommend!</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Emma Taylor" class="w-10 h-10 rounded-full object-cover bg-gray-200 group-hover:ring-2 ring-purple-400 transition-all">
                            <div>
                                <h5 class="font-bold text-gray-900 text-sm">Emma Taylor</h5>
                                <p class="text-[10px] text-gray-500">University of Manchester</p>
                                <div class="text-yellow-400 text-[10px] mt-0.5">★★★★★</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-[#fbfcff] p-4 xl:p-4 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                        <div>
                            <div class="text-purple-600 text-3xl mb-4 opacity-80 group-hover:text-purple-800 transition-colors duration-300 group-hover:scale-110 transform origin-left"><i class="fa-solid fa-quote-left"></i></div>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 group-hover:text-gray-800 transition-colors">Excellent work! The writer followed all instructions and provided original content. Will definitely use your services again.</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Liam O'Connor" class="w-10 h-10 rounded-full object-cover bg-gray-200 group-hover:ring-2 ring-purple-400 transition-all">
                            <div>
                                <h5 class="font-bold text-gray-900 text-sm">Liam O'Connor</h5>
                                <p class="text-[10px] text-gray-500">University of Leeds</p>
                                <div class="text-yellow-400 text-[10px] mt-0.5">★★★★★</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-[#fbfcff] p-4 xl:p-4 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                        <div>
                            <div class="text-purple-600 text-3xl mb-4 opacity-80 group-hover:text-purple-800 transition-colors duration-300 group-hover:scale-110 transform origin-left"><i class="fa-solid fa-quote-left"></i></div>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 group-hover:text-gray-800 transition-colors">Amazing experience from start to finish. Support team was helpful and the quality of the work was outstanding!</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Olivia Bennett" class="w-10 h-10 rounded-full object-cover bg-gray-200 group-hover:ring-2 ring-purple-400 transition-all">
                            <div>
                                <h5 class="font-bold text-gray-900 text-sm">Olivia Bennett</h5>
                                <p class="text-[10px] text-gray-500">King's College London</p>
                                <div class="text-yellow-400 text-[10px] mt-0.5">★★★★★</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-2 mt-4">
                    <span class="w-2 h-2 rounded-full bg-purple-700"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                </div>
            </div>
            <style>
                .hide-scrollbar::-webkit-scrollbar { display: none; }
                .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
            </style>
        </div>
    </section>

    <section class="py-4 md:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-12 items-start">
            <div class="lg:w-1/3">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-purple-100 text-purple-700 text-xs font-bold uppercase tracking-wide mb-4">
                    Frequently Asked Questions
                </div>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4 leading-snug">Find Answers To <span class="text-purple-700">Common Questions</span></h2>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">If you have any other questions, feel free to contact our support team.</p>
                <a href="#" class="inline-flex items-center justify-center bg-white border-2 border-purple-200 text-purple-700 font-bold px-6 py-3 rounded-lg hover:bg-purple-50 transition">
                    Contact Us &rarr;
                </a>
            </div>

            <div class="lg:w-2/3 w-full space-y-4">
                <div class="faq-item bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md hover:border-purple-200 transition-all duration-300 group hover:-translate-y-1">
                    <div class="faq-header flex items-center justify-between p-3 cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-lg group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300 group-hover:rotate-12"><i class="fa-solid fa-certificate"></i></div>
                            <span class="font-bold text-gray-900 text-sm md:text-base group-hover:text-purple-700 transition-colors">Is the work you provide 100% original?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-transform duration-300 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                    <div class="faq-answer hidden px-4 pb-4 pt-1 border-t border-gray-50">
                        <p class="text-xs text-gray-500 leading-relaxed">Yes, all assignments we deliver are 100% original and written from scratch by our experts. We also provide a free plagiarism report to guarantee uniqueness.</p>
                    </div>
                </div>
                <div class="faq-item bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md hover:border-purple-200 transition-all duration-300 group hover:-translate-y-1">
                    <div class="faq-header flex items-center justify-between p-3 cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-lg group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300 group-hover:rotate-12"><i class="fa-solid fa-cart-plus"></i></div>
                            <span class="font-bold text-gray-900 text-sm md:text-base group-hover:text-purple-700 transition-colors">How do I place an order?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-transform duration-300 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                    <div class="faq-answer hidden px-4 pb-4 pt-1 border-t border-gray-50">
                        <p class="text-xs text-gray-500 leading-relaxed">You can place an order by filling out our quick order/quote form, specifying your requirements, academic level, and deadline, or you can directly chat with us for assistance.</p>
                    </div>
                </div>
                <div class="faq-item bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md hover:border-purple-200 transition-all duration-300 group hover:-translate-y-1">
                    <div class="faq-header flex items-center justify-between p-3 cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-lg group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300 group-hover:rotate-12"><i class="fa-solid fa-arrows-rotate"></i></div>
                            <span class="font-bold text-gray-900 text-sm md:text-base group-hover:text-purple-700 transition-colors">Can I request revisions?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-transform duration-300 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                    <div class="faq-answer hidden px-4 pb-4 pt-1 border-t border-gray-50">
                        <p class="text-xs text-gray-500 leading-relaxed">Absolutely! We offer unlimited free revisions within 14-30 days of delivery if the final document does not meet your initial requirements.</p>
                    </div>
                </div>
                <div class="faq-item bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md hover:border-purple-200 transition-all duration-300 group hover:-translate-y-1">
                    <div class="faq-header flex items-center justify-between p-3 cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-lg group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300 group-hover:rotate-12"><i class="fa-solid fa-bolt"></i></div>
                            <span class="font-bold text-gray-900 text-sm md:text-base group-hover:text-purple-700 transition-colors">What if I need my order urgently?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-transform duration-300 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                    <div class="faq-answer hidden px-4 pb-4 pt-1 border-t border-gray-50">
                        <p class="text-xs text-gray-500 leading-relaxed">No problem! We have express experts who can tackle urgent tasks and deliver high-quality assignments in as little as 3 to 6 hours.</p>
                    </div>
                </div>
                <div class="faq-item bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md hover:border-purple-200 transition-all duration-300 group hover:-translate-y-1">
                    <div class="faq-header flex items-center justify-between p-3 cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-lg group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300 group-hover:rotate-12"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                            <span class="font-bold text-gray-900 text-sm md:text-base group-hover:text-purple-700 transition-colors">Do you offer refunds?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-transform duration-300 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                    <div class="faq-answer hidden px-4 pb-4 pt-1 border-t border-gray-50">
                        <p class="text-xs text-gray-500 leading-relaxed">Yes, we have a clear refund policy. If we fail to deliver within the deadline or if the work fails to meet acceptable academic standards, you can request a refund.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4 md:pb-8">
        <div class="bg-[#240e60] rounded-xl px-6 py-4 flex flex-col md:flex-row items-center justify-between shadow-lg">
        <div class="flex flex-col md:flex-row items-center gap-6 text-center md:text-left">
            <img src="public\new-pricingimg\barimg.png" alt="Graduation Cap on Books" class="w-20 md:w-24 h-auto object-contain drop-shadow-md">
            <div>
                <h2 class="text-white text-xl md:text-2xl font-bold mb-1">Ready To Get Started?</h2>
                <p class="text-purple-200 text-xs md:text-sm">Fill out the form above and get a customized quote for your assignment.</p>
            </div>
        </div>
        <div class="mt-6 md:mt-0 flex-shrink-0">
            <a href="#" class="bg-[#ff6b00] hover:bg-[#e66000] text-white font-bold py-2.5 px-6 rounded text-sm inline-flex items-center gap-2 transition-colors shadow-md">
                Get Instant Quote &rarr;
            </a>
        </div>
    </div>
    </section>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('.faq-item').forEach(item => {
            const header = item.querySelector('.faq-header');
            header.addEventListener('click', () => {
                const answer = item.querySelector('.faq-answer');
                const icon = item.querySelector('.faq-icon');
                const isHidden = answer.classList.contains('hidden');
                
                document.querySelectorAll('.faq-item').forEach(otherItem => {
                    otherItem.querySelector('.faq-answer').classList.add('hidden');
                    otherItem.querySelector('.faq-icon').classList.remove('rotate-180');
                });
                
                if (isHidden) {
                    answer.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                } else {
                    answer.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            });
        });
    });
    </script>
</main>
@endsection
