@extends('frontend-layouts.app')

@section('content')
<style>
@keyframes twinkle {
  0%, 100% { opacity: 0; transform: scale(0.5) rotate(0deg); }
  50% { opacity: 1; transform: scale(1.2) rotate(15deg); }
}
.star {
  position: absolute;
  animation: twinkle 3s infinite ease-in-out;
}
</style>
<script src="https://cdn.tailwindcss.com"></script>
<main class="w-full font-sans text-gray-800">
    <section class="relative overflow-hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-8 flex flex-col lg:flex-row items-center justify-between">
        <!-- Mobile Background Image -->
        <div class="absolute inset-0 z-0 lg:hidden flex justify-center items-center opacity-10 pointer-events-none">
            <img src="public\new-about-us-img\hero1.png" alt="" class="w-[150%] max-w-none h-auto object-contain" style="-webkit-mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%); mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);">
        </div>
        <div class="lg:w-1/2 relative z-20">
            <span class="text-xs font-bold text-purple-600 bg-purple-100 px-3 py-1 rounded-full uppercase tracking-wider">About Assignment In Need</span>
            <h1 class="mt-6 text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-gray-900">
                Empowering Students <br>
                Through Expert <span class="text-purple-700">Academic</span><br>
                <span class="text-red-500">Support & Guidance</span>
            </h1>
            <p class="mt-4 text-gray-600 text-lg max-w-lg">
                We connect students with professional academic experts who help them achieve their goals with confidence, quality and integrity.
            </p>
            
            <div class="flex flex-wrap gap-4 sm:gap-6 mt-8">
                <div class="flex items-center gap-3 group cursor-pointer hover:-translate-y-1 hover:bg-purple-50 p-2 rounded-lg transition-all duration-300 border border-transparent hover:border-purple-100">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold group-hover:bg-purple-600 group-hover:text-white group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-graduation-cap"></i></div>
                    <div><p class="font-bold text-gray-900 group-hover:text-purple-700 transition-colors"><span class="stat-counter" data-target="25000" data-suffix="+">20000</span></p><p class="text-xs text-gray-500">Students Supported</p></div>
                </div>
                <div class="flex items-center gap-3 group cursor-pointer hover:-translate-y-1 hover:bg-purple-50 p-2 rounded-lg transition-all duration-300 border border-transparent hover:border-purple-100">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold group-hover:bg-purple-600 group-hover:text-white group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-users"></i></div>
                    <div><p class="font-bold text-gray-900 group-hover:text-purple-700 transition-colors"><span class="stat-counter" data-target="150" data-suffix="+">70</span></p><p class="text-xs text-gray-500">Subject Experts</p></div>
                </div>
                <div class="flex items-center gap-3 group cursor-pointer hover:-translate-y-1 hover:bg-purple-50 p-2 rounded-lg transition-all duration-300 border border-transparent hover:border-purple-100">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold group-hover:bg-purple-600 group-hover:text-white group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-medal"></i></div>
                    <div><p class="font-bold text-gray-900 group-hover:text-purple-700 transition-colors"><span class="stat-counter" data-target="98" data-suffix="%">50</span></p><p class="text-xs text-gray-500">On-Time Delivery</p></div>
                </div>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="#" class="bg-purple-700 text-white px-6 py-3 rounded-md font-semibold hover:bg-purple-800 transition shadow-lg flex justify-center items-center gap-2">Meet Our Experts &rarr;</a>
                <a href="#" class="bg-white text-purple-700 border border-purple-200 px-6 py-3 rounded-md font-semibold hover:bg-purple-50 transition shadow-sm flex justify-center items-center gap-2">Get Free Quote &rarr;</a>
            </div>
        </div>
        <div class="hidden lg:flex lg:w-1/2 mt-12 lg:mt-0 justify-center relative z-10">
            <img src="public\new-about-us-img\hero1.png" alt="Academic Illustration" class="w-[110%] lg:w-[120%] max-w-none h-auto object-contain scale-110 lg:scale-125" style="-webkit-mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%); mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%);">
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-8 flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-1/2">
            <img src="public\new-about-us-img\test1.png" alt="Students studying" class="rounded-2xl shadow-xl object-cover w-full h-[400px]">
        </div>
        <div class="lg:w-1/2">
            <h3 class="text-purple-600 font-bold tracking-wider text-sm uppercase">Who We Are</h3>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-4">About Assignment In Need</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Assignment In Need was founded with a simple goal - to provide students with accessible, reliable and high-quality academic support. We understand the challenges students face, which is why we've built a platform that connects you with the best academic experts who deliver top-notch assistance tailored to your needs.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 group cursor-pointer hover:translate-x-2 transition-transform duration-300">
                    <svg class="w-6 h-6 text-purple-600 flex-shrink-0 group-hover:text-purple-800 group-hover:scale-110 transition-all duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="text-gray-700 font-medium group-hover:text-purple-700 transition-colors">Trusted by students across the UK and worldwide</span>
                </li>
                <li class="flex items-start gap-3 group cursor-pointer hover:translate-x-2 transition-transform duration-300">
                    <svg class="w-6 h-6 text-purple-600 flex-shrink-0 group-hover:text-purple-800 group-hover:scale-110 transition-all duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="text-gray-700 font-medium group-hover:text-purple-700 transition-colors">A team of qualified academic experts</span>
                </li>
                <li class="flex items-start gap-3 group cursor-pointer hover:translate-x-2 transition-transform duration-300">
                    <svg class="w-6 h-6 text-purple-600 flex-shrink-0 group-hover:text-purple-800 group-hover:scale-110 transition-all duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="text-gray-700 font-medium group-hover:text-purple-700 transition-colors">Commitment to quality, originality and confidentiality</span>
                </li>
            </ul>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 md:py-4">
        <div class="bg-[#1e105a] rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between text-white relative overflow-hidden">
            <!-- Stars -->
            <div class="absolute inset-0 pointer-events-none">
                <i class="star fa-solid fa-star text-white opacity-80" style="top: 15%; left: 10%; font-size: 6px; animation-duration: 2s;"></i>
                <i class="star fa-solid fa-star text-white opacity-60" style="top: 30%; left: 5%; font-size: 8px; animation-duration: 3.5s; animation-delay: 1s;"></i>
                <i class="star fa-solid fa-star text-yellow-200 opacity-90" style="top: 10%; left: 30%; font-size: 7px; animation-duration: 2.5s; animation-delay: 0.5s;"></i>
                <i class="star fa-solid fa-star text-white opacity-70" style="top: 70%; left: 15%; font-size: 9px; animation-duration: 4s; animation-delay: 1.2s;"></i>
                
                <i class="star fa-solid fa-star text-white opacity-60" style="top: 25%; right: 40%; font-size: 7px; animation-duration: 3.8s; animation-delay: 0.3s;"></i>
                <i class="star fa-solid fa-star text-white opacity-90" style="top: 15%; right: 15%; font-size: 10px; animation-duration: 2.5s; animation-delay: 1.5s;"></i>
                <i class="star fa-solid fa-star text-white opacity-50" style="top: 60%; right: 25%; font-size: 8px; animation-duration: 3s; animation-delay: 2.1s;"></i>
                <i class="star fa-solid fa-star text-yellow-100 opacity-60" style="top: 75%; right: 10%; font-size: 9px; animation-duration: 3.5s; animation-delay: 1.8s;"></i>
            </div>
            <div class="w-full text-center absolute top-4 left-0 right-0">
                <h3 class="text-xl font-semibold">Numbers Speak of Our Success Story</h3>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 w-full mt-12 gap-0 text-center lg:text-left">
                <!-- Item 1 -->
                <div class="flex flex-col md:flex-row items-center gap-3 p-6 md:p-0 mx-auto lg:mx-0 w-full justify-center md:justify-start border-b border-r border-purple-800/50 md:border-none">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 text-xl md:text-2xl shadow-md flex-shrink-0"><i class="fa-solid fa-envelope-open-text"></i></div>
                    <div><p class="text-lg md:text-3xl font-bold">182,532+</p><p class="text-[10px] md:text-sm text-gray-300">Orders Delivered</p></div>
                </div>
                <!-- Item 2 -->
                <div class="flex flex-col md:flex-row items-center gap-3 p-6 md:p-0 mx-auto lg:mx-0 w-full justify-center md:justify-start border-b border-purple-800/50 md:border-none">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 text-xl md:text-2xl shadow-md flex-shrink-0"><i class="fa-solid fa-user-check"></i></div>
                    <div><p class="text-lg md:text-3xl font-bold">30,000+</p><p class="text-[10px] md:text-sm text-gray-300">Happy Clients</p></div>
                </div>
                <!-- Item 3 -->
                <div class="flex flex-col md:flex-row items-center gap-3 p-6 md:p-0 mx-auto lg:mx-0 w-full justify-center md:justify-start border-r border-purple-800/50 md:border-none">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 text-xl md:text-2xl shadow-md flex-shrink-0"><i class="fa-solid fa-star"></i></div>
                    <div><p class="text-lg md:text-3xl font-bold">4.8/5</p><p class="text-[10px] md:text-sm text-gray-300">Client Rating</p></div>
                </div>
                <!-- Item 4 -->
                <div class="flex flex-col md:flex-row items-center gap-3 p-6 md:p-0 mx-auto lg:mx-0 w-full justify-center md:justify-start">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-white rounded-full flex items-center justify-center text-purple-600 text-xl md:text-2xl shadow-md flex-shrink-0"><i class="fa-solid fa-graduation-cap"></i></div>
                    <div><p class="text-lg md:text-3xl font-bold">4,500+</p><p class="text-[10px] md:text-sm text-gray-300">PhD Experts</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-12">How It Works</h2>
        <div class="bg-white md:bg-transparent rounded-2xl md:rounded-none  p-6 md:p-0 flex flex-col md:flex-row justify-between items-center gap-0 md:gap-4 w-full ">
            
            <!-- Step 1 -->
            <div class="flex flex-row md:flex-row items-center md:items-center w-full md:flex-1 text-left md:text-left">
                <div class="flex-shrink-0 w-16 h-16 md:w-14 md:h-14 bg-purple-50 rounded-full flex items-center justify-center relative mr-6 md:mr-5 md:mb-0">
                    <span class="absolute -left-2 top-1/2 -translate-y-1/2 md:translate-y-0 md:-top-1 md:-left-2 bg-purple-700 text-white w-6 h-6 md:w-5 md:h-5 rounded-full text-xs md:text-[10px] flex items-center justify-center border-2 border-white z-10">1</span>
                    <span class="text-2xl md:text-xl text-purple-600"><i class="fa-solid fa-file-lines"></i></span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 text-sm md:text-sm">Submit Requirements</h4>
                    <p class="text-xs text-gray-500 mt-1 md:mt-1">Share your assignment<br class="hidden md:block lg:hidden">details with us.</p>
                </div>
            </div>

            <div class="hidden md:flex items-center justify-center text-purple-600 text-3xl"><i class="fa-solid fa-arrow-right-long"></i></div>
            <div class="md:hidden w-full relative py-4 flex justify-center">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-100"></div></div>
                <div class="relative bg-white px-2 text-purple-500 text-sm"><i class="fa-solid fa-arrow-down"></i></div>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-row md:flex-row items-center md:items-center w-full md:flex-1 text-left md:text-left">
                <div class="flex-shrink-0 w-16 h-16 md:w-14 md:h-14 bg-purple-50 rounded-full flex items-center justify-center relative mr-6 md:mr-5 md:mb-0">
                    <span class="absolute -left-2 top-1/2 -translate-y-1/2 md:translate-y-0 md:-top-1 md:-left-2 bg-purple-700 text-white w-6 h-6 md:w-5 md:h-5 rounded-full text-xs md:text-[10px] flex items-center justify-center border-2 border-white z-10">2</span>
                    <span class="text-2xl md:text-xl text-purple-600"><i class="fa-solid fa-user-check"></i></span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 text-sm md:text-sm">Choose Expert</h4>
                    <p class="text-xs text-gray-500 mt-1 md:mt-1">We match you with the<br class="hidden md:block lg:hidden">best expert for your topic.</p>
                </div>
            </div>

            <div class="hidden md:flex items-center justify-center text-purple-600 text-3xl"><i class="fa-solid fa-arrow-right-long"></i></div>
            <div class="md:hidden w-full relative py-4 flex justify-center">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-100"></div></div>
                <div class="relative bg-white px-2 text-purple-500 text-sm"><i class="fa-solid fa-arrow-down"></i></div>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-row md:flex-row items-center md:items-center w-full md:flex-1 text-left md:text-left">
                <div class="flex-shrink-0 w-16 h-16 md:w-14 md:h-14 bg-purple-50 rounded-full flex items-center justify-center relative mr-6 md:mr-5 md:mb-0">
                    <span class="absolute -left-2 top-1/2 -translate-y-1/2 md:translate-y-0 md:-top-1 md:-left-2 bg-purple-700 text-white w-6 h-6 md:w-5 md:h-5 rounded-full text-xs md:text-[10px] flex items-center justify-center border-2 border-white z-10">3</span>
                    <span class="text-2xl md:text-xl text-purple-600"><i class="fa-solid fa-laptop-file"></i></span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 text-sm md:text-sm">Track Progress</h4>
                    <p class="text-xs text-gray-500 mt-1 md:mt-1">Track progress and stay<br class="hidden md:block lg:hidden">updated at every step.</p>
                </div>
            </div>

            <div class="hidden md:flex items-center justify-center text-purple-600 text-3xl"><i class="fa-solid fa-arrow-right-long"></i></div>
            <div class="md:hidden w-full relative py-4 flex justify-center">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-100"></div></div>
                <div class="relative bg-white px-2 text-purple-500 text-sm"><i class="fa-solid fa-arrow-down"></i></div>
            </div>

            <!-- Step 4 -->
            <div class="flex flex-row md:flex-row items-center md:items-center w-full md:flex-1 text-left md:text-left">
                <div class="flex-shrink-0 w-16 h-16 md:w-14 md:h-14 bg-purple-50 rounded-full flex items-center justify-center relative mr-6 md:mr-5 md:mb-0">
                    <span class="absolute -left-2 top-1/2 -translate-y-1/2 md:translate-y-0 md:-top-1 md:-left-2 bg-purple-700 text-white w-6 h-6 md:w-5 md:h-5 rounded-full text-xs md:text-[10px] flex items-center justify-center border-2 border-white z-10">4</span>
                    <span class="text-2xl md:text-xl text-purple-600"><i class="fa-solid fa-inbox"></i></span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 text-sm md:text-sm">Receive Assignment</h4>
                    <p class="text-xs text-gray-500 mt-1 md:mt-1">Get your assignment<br class="hidden md:block lg:hidden">on time, every time.</p>
                </div>
            </div>

            <div class="hidden md:flex items-center justify-center text-purple-600 text-3xl"><i class="fa-solid fa-arrow-right-long"></i></div>
            <div class="md:hidden w-full relative py-4 flex justify-center">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-100"></div></div>
                <div class="relative bg-white px-2 text-purple-500 text-sm"><i class="fa-solid fa-arrow-down"></i></div>
            </div>

            <!-- Step 5 -->
            <div class="flex flex-row md:flex-row items-center md:items-center w-full md:flex-1 text-left md:text-left">
                <div class="flex-shrink-0 w-16 h-16 md:w-14 md:h-14 bg-purple-50 rounded-full flex items-center justify-center relative mr-6 md:mr-5 md:mb-0">
                    <span class="absolute -left-2 top-1/2 -translate-y-1/2 md:translate-y-0 md:-top-1 md:-left-2 bg-purple-700 text-white w-6 h-6 md:w-5 md:h-5 rounded-full text-xs md:text-[10px] flex items-center justify-center border-2 border-white z-10">5</span>
                    <span class="text-2xl md:text-xl text-purple-600"><i class="fa-solid fa-award"></i></span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 text-sm md:text-sm">Achieve Better Grades</h4>
                    <p class="text-xs text-gray-500 mt-1 md:mt-1">Submit with confidence<br class="hidden md:block lg:hidden">and achieve success.</p>
                </div>
            </div>

        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 md:py-5">
        <div class="bg-purple-50 rounded-2xl p-10 flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2">
                <span class="text-xs font-bold text-purple-600 uppercase tracking-wider bg-white px-3 py-1 rounded-full shadow-sm">Our Mission</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-4 mb-4">We're On A Mission<br>To Make A Difference</h2>
                <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                    Our mission is to empower students by providing expert academic support that enhances learning, builds confidence, and helps them achieve their full potential.
                </p>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We believe every student deserves the right guidance to succeed.
                </p>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="public\new-about-us-img\replace1.png" alt="Mission Target" class="w-full max-w-md lg:scale-110 object-contain drop-shadow-xl">
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">More Than A Writing Platform</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-3xl mb-4 group-hover:bg-purple-600 group-hover:text-white group-hover:rotate-6 group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-book-open"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 group-hover:text-purple-700 transition-colors">Academic Guidance</h4>
                <p class="text-xs text-gray-500 leading-relaxed">Get expert help for assignments, essays, dissertations and more tailored to your needs.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                <div class="w-16 h-16 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center text-3xl mb-4 group-hover:bg-orange-500 group-hover:text-white group-hover:rotate-6 group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-comments"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 group-hover:text-orange-500 transition-colors">Referencing Assistance</h4>
                <p class="text-xs text-gray-500 leading-relaxed">Accurate referencing in APA, Harvard, MLA, OSCOLA and other major styles.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mb-4 group-hover:bg-green-600 group-hover:text-white group-hover:rotate-6 group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-chalkboard-user"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">Expert Consultation</h4>
                <p class="text-xs text-gray-500 leading-relaxed">Connect with subject specialists for clarification and in-depth understanding.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                <div class="w-16 h-16 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center text-3xl mb-4 group-hover:bg-blue-500 group-hover:text-white group-hover:rotate-6 group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-folder-open"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 group-hover:text-blue-500 transition-colors">Student Resources</h4>
                <p class="text-xs text-gray-500 leading-relaxed">Access samples, guides, writing tips and tools to improve your academic skills.</p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 md:py-5">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Why Students Trust Us</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 sm:gap-6 text-center">
            <div class="flex flex-col items-center bg-purple-50 p-4 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-purple-100 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-purple-600 text-3xl mb-3 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-shield-halved"></i></div>
                <p class="font-bold text-gray-900 text-sm group-hover:text-purple-800"><span class="stat-counter" data-target="100" data-suffix="%">0</span></p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700">Original Work</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 p-4 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-purple-100 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-purple-600 text-3xl mb-3 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-infinity"></i></div>
                <p class="font-bold text-gray-900 text-sm group-hover:text-purple-800">Unlimited</p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700">Revisions</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 p-4 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-purple-100 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-purple-600 text-3xl mb-3 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-headset"></i></div>
                <p class="font-bold text-gray-900 text-sm group-hover:text-purple-800"><span class="stat-counter" data-target="24" data-suffix="/7">0</span></p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700">Support</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 p-4 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-purple-100 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-purple-600 text-3xl mb-3 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-lock"></i></div>
                <p class="font-bold text-gray-900 text-sm group-hover:text-purple-800">Confidential</p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700">Service</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 p-4 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-purple-100 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-purple-600 text-3xl mb-3 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-user-tie"></i></div>
                <p class="font-bold text-gray-900 text-sm group-hover:text-purple-800">Subject</p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700">Experts</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 p-4 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-purple-100 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-purple-600 text-3xl mb-3 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 transition-all duration-300"><i class="fa-solid fa-stopwatch"></i></div>
                <p class="font-bold text-gray-900 text-sm group-hover:text-purple-800">On-Time</p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700">Delivery</p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Meet Our Academic Experts</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Expert 1 -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Sophia Adams" class="w-20 h-20 rounded-full object-cover group-hover:ring-4 ring-purple-400 transition-all mb-4">
                <h5 class="font-bold text-base text-gray-900 group-hover:text-purple-700 transition-colors">Sophia Adams</h5>
                <p class="text-xs text-purple-600 font-semibold mb-2">Marketing Expert</p>
                <div class="text-yellow-400 text-xs mb-3">★★★★★ <span class="text-gray-500 ml-1">4.9</span></div>
                <p class="text-xs text-gray-500 leading-relaxed mb-6">Specializes in digital strategy, branding, and market research with 5+ years of academic writing experience.</p>
                <a href="#" class="mt-auto w-full py-2 bg-purple-700 hover:bg-purple-800 text-white rounded-lg text-xs font-bold transition shadow-sm text-center">Hire Now &rarr;</a>
            </div>
            
            <!-- Expert 2 -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. James Wilson" class="w-20 h-20 rounded-full object-cover group-hover:ring-4 ring-purple-400 transition-all mb-4">
                <h5 class="font-bold text-base text-gray-900 group-hover:text-purple-700 transition-colors">Dr. James Wilson</h5>
                <p class="text-xs text-purple-600 font-semibold mb-2">Finance Expert</p>
                <div class="text-yellow-400 text-xs mb-3">★★★★★ <span class="text-gray-500 ml-1">4.8</span></div>
                <p class="text-xs text-gray-500 leading-relaxed mb-6">Expert in corporate finance, investment analysis, and auditing with a PhD in Financial Management.</p>
                <a href="#" class="mt-auto w-full py-2 bg-purple-700 hover:bg-purple-800 text-white rounded-lg text-xs font-bold transition shadow-sm text-center">Hire Now &rarr;</a>
            </div>
            
            <!-- Expert 3 -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Olivia Bennett" class="w-20 h-20 rounded-full object-cover group-hover:ring-4 ring-purple-400 transition-all mb-4">
                <h5 class="font-bold text-base text-gray-900 group-hover:text-purple-700 transition-colors">Olivia Bennett</h5>
                <p class="text-xs text-purple-600 font-semibold mb-2">Management Expert</p>
                <div class="text-yellow-400 text-xs mb-3">★★★★★ <span class="text-gray-500 ml-1">4.9</span></div>
                <p class="text-xs text-gray-500 leading-relaxed mb-6">Focuses on strategic planning, organizational behavior, and HR management assignment guidance.</p>
                <a href="#" class="mt-auto w-full py-2 bg-purple-700 hover:bg-purple-800 text-white rounded-lg text-xs font-bold transition shadow-sm text-center">Hire Now &rarr;</a>
            </div>
            
            <!-- Expert 4 -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer">
                <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Dr. Daniel Harris" class="w-20 h-20 rounded-full object-cover group-hover:ring-4 ring-purple-400 transition-all mb-4">
                <h5 class="font-bold text-base text-gray-900 group-hover:text-purple-700 transition-colors">Dr. Daniel Harris</h5>
                <p class="text-xs text-purple-600 font-semibold mb-2">Economics Expert</p>
                <div class="text-yellow-400 text-xs mb-3">★★★★<span class="text-gray-300">★</span> <span class="text-gray-500 ml-1">4.7</span></div>
                <p class="text-xs text-gray-500 leading-relaxed mb-6">Specializes in microeconomics, macroeconomics, and econometric modeling with over 8 years of mentoring.</p>
                <a href="#" class="mt-auto w-full py-2 bg-purple-700 hover:bg-purple-800 text-white rounded-lg text-xs font-bold transition shadow-sm text-center">Hire Now &rarr;</a>
            </div>
        </div>
        <div class="flex justify-center mt-8">
            <a href="#" class="inline-flex items-center gap-2 bg-purple-50 hover:bg-purple-600 text-purple-700 hover:text-white border border-purple-100 px-6 py-3 rounded-lg font-bold text-sm transition-all duration-300 shadow-sm hover:shadow-md">
                View All Experts &rarr;
            </a>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4 md:pb-8">
        <div class="bg-[#2d1b7a] rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between relative overflow-hidden text-white shadow-2xl">
            <!-- Stars -->
            <div class="absolute inset-0 pointer-events-none">
                <i class="star fa-solid fa-star text-white opacity-80" style="top: 20%; left: 15%; font-size: 7px; animation-duration: 3s; animation-delay: 0.5s;"></i>
                <i class="star fa-solid fa-star text-yellow-100 opacity-60" style="top: 50%; left: 5%; font-size: 9px; animation-duration: 4s; animation-delay: 1.2s;"></i>
                <i class="star fa-solid fa-star text-white opacity-70" style="top: 80%; left: 20%; font-size: 6px; animation-duration: 2.5s; animation-delay: 0.8s;"></i>
                <i class="star fa-solid fa-star text-white opacity-50" style="top: 10%; left: 35%; font-size: 8px; animation-duration: 3.5s; animation-delay: 2.1s;"></i>
                
                <i class="star fa-solid fa-star text-white opacity-80" style="top: 15%; right: 25%; font-size: 10px; animation-duration: 4s; animation-delay: 1.8s;"></i>
                <i class="star fa-solid fa-star text-yellow-100 opacity-70" style="top: 45%; right: 10%; font-size: 7px; animation-duration: 2.8s; animation-delay: 0.7s;"></i>
                <i class="star fa-solid fa-star text-white opacity-50" style="top: 70%; right: 15%; font-size: 9px; animation-duration: 3.5s; animation-delay: 0.2s;"></i>
                <i class="star fa-solid fa-star text-yellow-200 opacity-80" style="top: 85%; right: 35%; font-size: 6px; animation-duration: 2.5s; animation-delay: 1.1s;"></i>
            </div>
            <div class="hidden md:block absolute left-0 top-1/2 -translate-y-1/2 w-48">
                <img src="public\new-about-us-img\barimg.png" alt="Books" class="w-full h-auto object-cover opacity-90">
            </div>
            <div class="md:ml-56 text-center md:text-left z-10">
                <h2 class="text-2xl md:text-3xl font-bold mb-2">Need Expert Academic Support?</h2>
                <p class="text-gray-300 text-sm max-w-md">Join 25,000+ students who trust Assignment In Need for quality, reliability and academic success.</p>
            </div>
            <div class="mt-6 md:mt-0 z-10">
                <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-md font-bold transition shadow-lg inline-flex items-center gap-2">
                    Get Free Quote &rarr;
                </a>
            </div>
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
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // FAQ Accordion logic
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

        const counters = document.querySelectorAll(".stat-counter");
        
        const animateCounter = (counter) => {
            const target = +counter.getAttribute("data-target");
            const duration = 4000;
            const increment = target / (duration / 16);
            const isFloat = target % 1 !== 0;
            
            let current = 0;
            
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.innerText = (isFloat ? current.toFixed(1) : Math.ceil(current)).toLocaleString() + (counter.getAttribute("data-suffix") || "");
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerText = (isFloat ? target.toFixed(1) : target).toLocaleString() + (counter.getAttribute("data-suffix") || "");
                }
            };
            
            updateCounter();
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => {
            observer.observe(counter);
        });
    });
    </script>
</main>
@endsection

