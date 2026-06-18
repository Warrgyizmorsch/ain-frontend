@extends('frontend-layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<main class="w-full font-sans text-gray-800 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-sm text-gray-500">
        Home <span class="mx-2">&gt;</span> <span class="text-gray-900">Samples</span>
    </div>

    <section class="relative overflow-hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4 lg:pb-6 pt-2 flex flex-col lg:flex-row items-center justify-between">
        <!-- Mobile Background Image -->
        <div class="absolute inset-0 z-0 lg:hidden flex justify-center items-center opacity-10 pointer-events-none">
            <img src="public\new-sample-img\hero1.png" alt="" class="w-[150%] max-w-none h-auto object-contain" style="-webkit-mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%); mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);">
        </div>
        <div class="lg:w-1/2 relative z-20">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-purple-50 border border-purple-100 text-purple-700 text-sm font-semibold mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                100% Free Samples
            </div>
            
            <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                Free Assignment <br>
                <span class="text-purple-700">Samples</span>
            </h1>
            
            <p class="text-gray-600 text-lg mb-8 max-w-lg">
                Access high-quality assignment examples written by academic experts. Explore 10,000+ samples across 150+ subjects to understand structure, referencing and writing style.
            </p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-purple-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-gray-700 font-medium">100% Free Access</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-purple-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-gray-700 font-medium">Subject-Wise Samples</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-purple-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-gray-700 font-medium">Distinction-Level Quality</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-purple-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-gray-700 font-medium">10,000+ Free Samples</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-purple-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-gray-700 font-medium">UK Referencing Formats</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-purple-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-gray-700 font-medium">Updated Every Week</span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 lg:hidden">
                <a href="#" class="bg-purple-700 text-white text-center px-6 py-3 rounded-lg font-bold hover:bg-purple-800 transition flex-1">Browse Samples &rarr;</a>
                <a href="#" class="bg-white text-purple-700 border-2 border-purple-200 text-center px-6 py-3 rounded-lg font-bold hover:bg-purple-50 transition flex-1">Get Expert Help &rarr;</a>
            </div>
        </div>
        <div class="hidden lg:flex lg:w-1/2 mt-12 lg:mt-0 relative justify-center z-10">
            <img src="public\new-sample-img\hero1.png" alt="Free Samples Illustration" class="w-[120%] lg:w-[130%] max-w-none h-auto object-contain scale-110 lg:scale-125 -translate-x-8 lg:-translate-x-16" style="-webkit-mask-image: linear-gradient(to right, transparent 0%, black 10%, black 70%, transparent 100%); mask-image: linear-gradient(to right, transparent 0%, black 10%, black 70%, transparent 100%);">
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Popular Categories</h2>
        <p class="text-gray-500 mb-8">Explore samples from our most popular subjects</p>
        
        <div class="relative flex items-center justify-center">
            <button class="hidden lg:flex w-10 h-10 items-center justify-center rounded-full bg-white border border-gray-200 shadow-sm text-gray-400 hover:text-purple-700 absolute left-0 z-10">&lt;</button>
            
            <div class="flex overflow-x-auto gap-4 py-2 px-2 hide-scrollbar w-full lg:w-11/12 snap-x">
                <div class="flex-shrink-0 border border-gray-200 rounded-xl px-4 py-3 flex items-center gap-3 bg-white hover:border-purple-300 hover:shadow-md cursor-pointer transition-all duration-300 hover:-translate-y-1 group snap-start min-w-[160px]">
                    <div class="w-10 h-10 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center font-bold text-lg group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">A</div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-purple-700 transition-colors">Accounting</h4>
                        <p class="text-xs text-gray-500">1,250</p>
                    </div>
                </div>
                <div class="flex-shrink-0 border border-gray-200 rounded-xl px-4 py-3 flex items-center gap-3 bg-white hover:border-purple-300 hover:shadow-md cursor-pointer transition-all duration-300 hover:-translate-y-1 group snap-start min-w-[160px]">
                    <div class="w-10 h-10 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-lg group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-briefcase"></i></div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-purple-700 transition-colors">Business</h4>
                        <p class="text-xs text-gray-500">980</p>
                    </div>
                </div>
                <div class="flex-shrink-0 border border-gray-200 rounded-xl px-4 py-3 flex items-center gap-3 bg-white hover:border-purple-300 hover:shadow-md cursor-pointer transition-all duration-300 hover:-translate-y-1 group snap-start min-w-[160px]">
                    <div class="w-10 h-10 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-lg group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-scale-balanced"></i></div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-purple-700 transition-colors">Law</h4>
                        <p class="text-xs text-gray-500">750</p>
                    </div>
                </div>
                <div class="flex-shrink-0 border border-gray-200 rounded-xl px-4 py-3 flex items-center gap-3 bg-white hover:border-purple-300 hover:shadow-md cursor-pointer transition-all duration-300 hover:-translate-y-1 group snap-start min-w-[160px]">
                    <div class="w-10 h-10 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-lg group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-stethoscope"></i></div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-purple-700 transition-colors">Nursing</h4>
                        <p class="text-xs text-gray-500">620</p>
                    </div>
                </div>
                <div class="flex-shrink-0 border border-gray-200 rounded-xl px-4 py-3 flex items-center gap-3 bg-white hover:border-purple-300 hover:shadow-md cursor-pointer transition-all duration-300 hover:-translate-y-1 group snap-start min-w-[160px]">
                    <div class="w-10 h-10 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-lg group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-chart-simple"></i></div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-purple-700 transition-colors">Marketing</h4>
                        <p class="text-xs text-gray-500">540</p>
                    </div>
                </div>
                <div class="flex-shrink-0 border border-gray-200 rounded-xl px-4 py-3 flex items-center gap-3 bg-white hover:border-purple-300 hover:shadow-md cursor-pointer transition-all duration-300 hover:-translate-y-1 group snap-start min-w-[160px]">
                    <div class="w-10 h-10 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-lg group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-brain"></i></div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-purple-700 transition-colors">Psychology</h4>
                        <p class="text-xs text-gray-500">420</p>
                    </div>
                </div>
                <div class="flex-shrink-0 border border-gray-200 rounded-xl px-4 py-3 flex items-center gap-3 bg-white hover:border-purple-300 hover:shadow-md cursor-pointer transition-all duration-300 hover:-translate-y-1 group snap-start min-w-[160px]">
                    <div class="w-10 h-10 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-lg group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-gear"></i></div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-purple-700 transition-colors">Engineering</h4>
                        <p class="text-xs text-gray-500">380</p>
                    </div>
                </div>
                <div class="flex-shrink-0 border border-gray-200 rounded-xl px-4 py-3 flex items-center gap-3 bg-white hover:border-purple-300 hover:shadow-md cursor-pointer transition-all duration-300 hover:-translate-y-1 group snap-start min-w-[160px]">
                    <div class="w-10 h-10 bg-purple-50 text-purple-700 rounded-lg flex items-center justify-center text-lg group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-laptop-code"></i></div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-purple-700 transition-colors">Computer Science</h4>
                        <p class="text-xs text-gray-500">340</p>
                    </div>
                </div>
            </div>
            
            <button class="hidden lg:flex w-10 h-10 items-center justify-center rounded-full bg-white border border-gray-200 shadow-sm text-gray-400 hover:text-purple-700 absolute right-0 z-10">&gt;</button>
        </div>
        <style>
            .hide-scrollbar::-webkit-scrollbar { display: none; }
            .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        </style>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 lg:py-5 bg-[#fafaff] rounded-3xl">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Browse Samples By Subject</h2>
            <p class="text-gray-500">Find free assignment samples by subject area</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative group cursor-pointer">
                <div class="w-12 h-12 bg-purple-700 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4 group-hover:-translate-y-1 group-hover:shadow-lg transition-all">A</div>
                <div class="absolute top-[40%] -translate-y-1/2 right-6 w-14 h-14 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-calculator"></i></div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-800 transition-colors">Accounting</h3>
                <span class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded mt-2">152 Samples</span>
                <a href="#" class="mt-6 pt-4 border-t border-purple-200 flex items-center justify-between font-bold text-purple-700 hover:text-purple-800 w-full">View Samples <span class="group-hover:translate-x-1 transition-transform">&rarr;</span></a>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative group cursor-pointer">
                <div class="w-12 h-12 bg-purple-700 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4 group-hover:-translate-y-1 group-hover:shadow-lg transition-all">B</div>
                <div class="absolute top-[40%] -translate-y-1/2 right-6 w-14 h-14 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-briefcase"></i></div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-800 transition-colors">Business</h3>
                <span class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded mt-2">87 Samples</span>
                <a href="#" class="mt-6 pt-4 border-t border-purple-200 flex items-center justify-between font-bold text-purple-700 hover:text-purple-800 w-full">View Samples <span class="group-hover:translate-x-1 transition-transform">&rarr;</span></a>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative group cursor-pointer">
                <div class="w-12 h-12 bg-purple-700 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4 group-hover:-translate-y-1 group-hover:shadow-lg transition-all">E</div>
                <div class="absolute top-[40%] -translate-y-1/2 right-6 w-14 h-14 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-chart-line"></i></div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-800 transition-colors">Economics</h3>
                <span class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded mt-2">45 Samples</span>
                <a href="#" class="mt-6 pt-4 border-t border-purple-200 flex items-center justify-between font-bold text-purple-700 hover:text-purple-800 w-full">View Samples <span class="group-hover:translate-x-1 transition-transform">&rarr;</span></a>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative group cursor-pointer">
                <div class="w-12 h-12 bg-purple-700 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4 group-hover:-translate-y-1 group-hover:shadow-lg transition-all">L</div>
                <div class="absolute top-[40%] -translate-y-1/2 right-6 w-14 h-14 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-book-open"></i></div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-800 transition-colors">Law</h3>
                <span class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded mt-2">60 Samples</span>
                <a href="#" class="mt-6 pt-4 border-t border-purple-200 flex items-center justify-between font-bold text-purple-700 hover:text-purple-800 w-full">View Samples <span class="group-hover:translate-x-1 transition-transform">&rarr;</span></a>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative group cursor-pointer">
                <div class="w-12 h-12 bg-purple-700 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4 group-hover:-translate-y-1 group-hover:shadow-lg transition-all">M</div>
                <div class="absolute top-[40%] -translate-y-1/2 right-6 w-14 h-14 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-bullhorn"></i></div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-800 transition-colors">Marketing</h3>
                <span class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded mt-2">65 Samples</span>
                <a href="#" class="mt-6 pt-4 border-t border-purple-200 flex items-center justify-between font-bold text-purple-700 hover:text-purple-800 w-full">View Samples <span class="group-hover:translate-x-1 transition-transform">&rarr;</span></a>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative group cursor-pointer">
                <div class="w-12 h-12 bg-purple-700 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4 group-hover:-translate-y-1 group-hover:shadow-lg transition-all">N</div>
                <div class="absolute top-[40%] -translate-y-1/2 right-6 w-14 h-14 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-heart-pulse"></i></div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-800 transition-colors">Nursing</h3>
                <span class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded mt-2">74 Samples</span>
                <a href="#" class="mt-6 pt-4 border-t border-purple-200 flex items-center justify-between font-bold text-purple-700 hover:text-purple-800 w-full">View Samples <span class="group-hover:translate-x-1 transition-transform">&rarr;</span></a>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative group cursor-pointer">
                <div class="w-12 h-12 bg-purple-700 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4 group-hover:-translate-y-1 group-hover:shadow-lg transition-all">P</div>
                <div class="absolute top-[40%] -translate-y-1/2 right-6 w-14 h-14 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-solid fa-brain"></i></div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-800 transition-colors">Psychology</h3>
                <span class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded mt-2">81 Samples</span>
                <a href="#" class="mt-6 pt-4 border-t border-purple-200 flex items-center justify-between font-bold text-purple-700 hover:text-purple-800 w-full">View Samples <span class="group-hover:translate-x-1 transition-transform">&rarr;</span></a>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative group cursor-pointer">
                <div class="w-12 h-12 bg-purple-700 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4 group-hover:-translate-y-1 group-hover:shadow-lg transition-all">H</div>
                <div class="absolute top-[40%] -translate-y-1/2 right-6 w-14 h-14 bg-purple-50 text-purple-700 rounded-full flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"><i class="fa-regular fa-clock"></i></div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-800 transition-colors">History</h3>
                <span class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded mt-2">30 Samples</span>
                <a href="#" class="mt-6 pt-4 border-t border-purple-200 flex items-center justify-between font-bold text-purple-700 hover:text-purple-800 w-full">View Samples <span class="group-hover:translate-x-1 transition-transform">&rarr;</span></a>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="#" class="inline-flex items-center font-bold text-purple-700 hover:text-purple-900">View All Subjects <span class="ml-2">&rarr;</span></a>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 lg:py-5 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Why Students Use Our Samples</h2>
        <p class="text-gray-500 mb-12">Our samples help you learn, understand and achieve better results</p>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 lg:gap-8">
            <div class="flex flex-col items-center bg-purple-50 rounded-2xl p-2 lg:p-5 border border-purple-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-purple-600 text-2xl mb-4 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"><i class="fa-solid fa-bullseye"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 text-sm lg:text-base group-hover:text-purple-800">Understand Structure</h4>
                <p class="text-xs text-gray-500 leading-relaxed px-2 group-hover:text-gray-700">Learn the perfect format and structure for your assignments.</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 rounded-2xl p-2 lg:p-5 border border-purple-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-purple-600 text-2xl mb-4 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"><i class="fa-solid fa-book-open"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 text-sm lg:text-base group-hover:text-purple-800">Learn Referencing</h4>
                <p class="text-xs text-gray-500 leading-relaxed px-2 group-hover:text-gray-700">See how proper referencing is done in academic writing.</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 rounded-2xl p-2 lg:p-5 border border-purple-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-purple-600 text-2xl mb-4 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"><i class="fa-solid fa-pencil"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 text-sm lg:text-base group-hover:text-purple-800">Improve Writing Style</h4>
                <p class="text-xs text-gray-500 leading-relaxed px-2 group-hover:text-gray-700">Enhance your writing style and academic expression.</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 rounded-2xl p-2 lg:p-5 border border-purple-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-purple-600 text-2xl mb-4 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"><i class="fa-solid fa-stopwatch"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 text-sm lg:text-base group-hover:text-purple-800">Save Research Time</h4>
                <p class="text-xs text-gray-500 leading-relaxed px-2 group-hover:text-gray-700">Get a clear idea and save hours of research and effort.</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 rounded-2xl p-2 lg:p-5 border border-purple-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-purple-600 text-2xl mb-4 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"><i class="fa-solid fa-graduation-cap"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 text-sm lg:text-base group-hover:text-purple-800">Better Understanding</h4>
                <p class="text-xs text-gray-500 leading-relaxed px-2 group-hover:text-gray-700">Improve your subject knowledge with real examples.</p>
            </div>
            <div class="flex flex-col items-center bg-purple-50 rounded-2xl p-2 lg:p-5 border border-purple-100 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group cursor-pointer hover:bg-purple-100">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-purple-600 text-2xl mb-4 shadow-sm group-hover:bg-purple-600 group-hover:text-black group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"><i class="fa-solid fa-download"></i></div>
                <h4 class="font-bold text-gray-900 mb-2 text-sm lg:text-base group-hover:text-purple-800">100% Free Access</h4>
                <p class="text-xs text-gray-500 leading-relaxed px-2 group-hover:text-gray-700">All samples are completely free to download and access.</p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 lg:py-5 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Student Success Stories</h2>
        <p class="text-gray-500 mb-12">Loved by thousands of students across the UK</p>

        <div class="relative flex items-center justify-center">
            <button class="hidden lg:flex w-12 h-12 items-center justify-center rounded-full bg-white border border-gray-200 shadow-md text-gray-400 hover:text-purple-700 absolute -left-6 z-10">&lt;</button>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <div class="bg-[#fafaff] border border-gray-100 rounded-2xl p-4 text-left shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group cursor-pointer">
                    <div>
                        <div class="text-purple-600 text-3xl mb-4 opacity-80 group-hover:text-purple-800 group-hover:scale-110 transform origin-left transition-all duration-300"><i class="fa-solid fa-quote-left"></i></div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4 group-hover:text-gray-800 transition-colors">The assignment samples helped me understand the structure and referencing style perfectly. I scored 72% in my assignment!</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah M." class="w-12 h-12 rounded-full object-cover bg-gray-200 shadow-sm border border-gray-100 group-hover:ring-2 ring-purple-400 transition-all">
                        <div>
                            <h5 class="font-bold text-gray-900 text-sm">Sarah M.</h5>
                            <p class="text-xs text-gray-500">University of Leeds</p>
                            <div class="text-yellow-400 text-xs mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#fafaff] border border-gray-100 rounded-2xl p-4 text-left shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group cursor-pointer">
                    <div>
                        <div class="text-purple-600 text-3xl mb-4 opacity-80 group-hover:text-purple-800 group-hover:scale-110 transform origin-left transition-all duration-300"><i class="fa-solid fa-quote-left"></i></div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4 group-hover:text-gray-800 transition-colors">The samples are well-written and easy to understand. They really improved my academic writing and confidence.</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="James T." class="w-12 h-12 rounded-full object-cover bg-gray-200 shadow-sm border border-gray-100 group-hover:ring-2 ring-purple-400 transition-all">
                        <div>
                            <h5 class="font-bold text-gray-900 text-sm">James T.</h5>
                            <p class="text-xs text-gray-500">University of Manchester</p>
                            <div class="text-yellow-400 text-xs mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#fafaff] border border-gray-100 rounded-2xl p-4 text-left shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group cursor-pointer">
                    <div>
                        <div class="text-purple-600 text-3xl mb-4 opacity-80 group-hover:text-purple-800 group-hover:scale-110 transform origin-left transition-all duration-300"><i class="fa-solid fa-quote-left"></i></div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4 group-hover:text-gray-800 transition-colors">I found exactly what I needed for my subject. The examples are updated and of high quality. Thank you!</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emily R." class="w-12 h-12 rounded-full object-cover bg-gray-200 shadow-sm border border-gray-100 group-hover:ring-2 ring-purple-400 transition-all">
                        <div>
                            <h5 class="font-bold text-gray-900 text-sm">Emily R.</h5>
                            <p class="text-xs text-gray-500">King's College London</p>
                            <div class="text-yellow-400 text-xs mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="hidden lg:flex w-12 h-12 items-center justify-center rounded-full bg-white border border-gray-200 shadow-md text-gray-400 hover:text-purple-700 absolute -right-6 z-10">&gt;</button>
        </div>

        <div class="flex justify-center gap-2 mt-8">
            <span class="w-2.5 h-2.5 rounded-full bg-purple-700"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
        </div>
    </section>
        <section class="py-8">
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
        document.querySelectorAll('.faq-item').forEach(item => {
            const header = item.querySelector('.faq-header');
            header.addEventListener('click', () => {
                const answer = item.querySelector('.faq-answer');
                const icon = item.querySelector('.faq-icon');
                const isHidden = answer.classList.contains('hidden');
                
                // Close all other FAQs
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
