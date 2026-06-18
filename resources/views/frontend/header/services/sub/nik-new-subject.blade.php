@extends('frontend-layouts.app')

@section('content')

<!-- Added Tailwind CDN & Fonts for EXACT Demo UI matching without needing npm run dev -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        },
        colors: {
          brand: {
            purple: '#3f159a',
            dark: '#0f1b3d',
            orange: '#ea580c'
          }
        }
      }
    }
  }
</script>

<!-- Font/Style Overrides if needed to match perfectly -->
<style>
  .custom-gradient-bg {
    background: linear-gradient(135deg, #fbfaff 0%, #f4f2ff 100%);
  }
  .promo-gradient {
    background: linear-gradient(90deg, #2b0c61 0%, #461b9b 100%);
  }
  
  /* Hide scrollbar for slider */
  .hide-scrollbar::-webkit-scrollbar {
    display: none;
  }
  .hide-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
  }
</style>

<div class="font-sans text-[#111827]">

  <!-- HERO SECTION -->
  <section class="bg-gradient-to-r from-white to-[white] pt-0 pb-3 lg:pb-6 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative">
        
        <!-- Left Content (5 cols) -->
        <div class="lg:col-span-5 relative z-20">
          
          <!-- Breadcrumb -->
          <div class="text-[11px] text-gray-500 mb-7 font-medium tracking-wide">
            Home <span class="mx-1">></span> Subjects <span class="mx-1">></span> <span class="text-gray-400">Accounting Assignment Help</span>
          </div>

          <!-- Rating Badge -->
          <div class="flex items-center space-x-2 mb-6">
            <div class="bg-[#22c55e] text-white flex items-center px-1.5 py-0.5 rounded-sm text-[10px]">
              <i class="fas fa-star mr-0.5"></i><i class="fas fa-star mr-0.5"></i><i class="fas fa-star mr-0.5"></i><i class="fas fa-star mr-0.5"></i><i class="fas fa-star"></i>
            </div>
            <span class="text-[11px] font-bold text-gray-600">Rated 4.9/5 by 25,000+ UK Students</span>
          </div>

          <h1 class="text-[40px] md:text-[46px] leading-[1.15] font-extrabold text-[#0f1b3d] mb-4 tracking-tight">
            Expert Accounting<br/>
            Assignment Help<br/>
            <span class="text-[#ea580c]">You Can Rely On</span>
          </h1>

          <p class="text-[12px] md:text-[13px] text-gray-600 mb-6 lg:mb-8 leading-relaxed lg:pr-10 font-medium">
            Get accurate, well-researched and plagiarism-free accounting assignments<br class="hidden lg:block"/>helped by qualified experts to achieve top grades.
          </p>

          <!-- MOBILE IMAGE (Hidden on lg, visible on mobile) -->
          <div class="block lg:hidden w-full h-[220px] mb-8 relative rounded-2xl overflow-hidden mt-6">
             <img src="{{ asset('public/new-subject-sectionimg/herosubject.png') }}" alt="Student" class="w-full h-full object-cover object-top" style="-webkit-mask-image: linear-gradient(to right, transparent 0%, black 20%); mask-image: linear-gradient(to right, transparent 0%, black 20%);" />
             <!-- Floating Badge -->
             <div class="absolute bottom-4 right-4 bg-white rounded-xl shadow-lg p-2.5 flex items-center space-x-2 border border-gray-100">
                <i class="fas fa-headset text-[#ea580c] text-2xl"></i>
                <div class="flex flex-col">
                  <span class="font-extrabold text-[#0f1b3d] text-[11px] leading-tight">24/7</span>
                  <span class="text-[9px] text-gray-500 font-bold tracking-wide">Live Support</span>
                </div>
             </div>
          </div>

          <!-- Stats Grid -->
          <div class="grid grid-cols-2 gap-y-5 gap-x-4 lg:flex lg:items-center lg:space-x-8 lg:gap-y-0 mb-8 lg:mb-10">
            <div class="flex flex-col">
              <div class="flex items-center text-[#0f1b3d] font-bold text-[14px] mb-1">
                <i class="far fa-check-circle text-[#0f1b3d] mr-1.5 text-base opacity-80"></i> 25,000+
              </div>
              <span class="text-[10px] text-gray-500 font-semibold leading-tight">Assignments<br/>Delivered</span>
            </div>
            <div class="flex flex-col">
              <div class="flex items-center text-[#0f1b3d] font-bold text-[14px] mb-1">
                <i class="far fa-user-circle text-[#0f1b3d] mr-1.5 text-base opacity-80"></i> 150+
              </div>
              <span class="text-[10px] text-gray-500 font-semibold leading-tight">Subject<br/>Experts</span>
            </div>
            <div class="flex flex-col">
              <div class="flex items-center text-[#0f1b3d] font-bold text-[14px] mb-1">
                <i class="far fa-star text-yellow-500 mr-1.5 text-base"></i> 4.9/5
              </div>
              <span class="text-[10px] text-gray-500 font-semibold leading-tight">Student<br/>Rating</span>
            </div>
            <div class="flex flex-col">
              <div class="flex items-center text-[#0f1b3d] font-bold text-[14px] mb-1">
                <i class="far fa-heart text-[#0f1b3d] mr-1.5 text-base opacity-80"></i> 98%
              </div>
              <span class="text-[10px] text-gray-500 font-semibold leading-tight">On-Time<br/>Delivery</span>
            </div>
          </div>

          <!-- Buttons -->
          <div class="flex flex-col space-y-3 lg:flex-row lg:items-center lg:space-y-0 lg:space-x-4">
            <button class="w-full lg:w-auto bg-[#3f159a] hover:bg-[#2b0c61] text-white font-bold py-3.5 px-8 rounded-lg text-[13px] transition shadow-md flex items-center justify-center">
              Talk To An Expert <i class="fas fa-arrow-right ml-2"></i>
            </button>
            <button class="w-full lg:w-auto bg-white hover:bg-gray-50 text-[#0f1b3d] border border-gray-200 font-bold py-3.5 px-8 rounded-lg text-[13px] transition shadow-sm flex items-center justify-center">
              View Samples <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </div>

        <!-- Center Image Overlay Background -->

        <!-- Center Image (Absolute/Overlapping) -->
        <div class="hidden lg:block absolute right-[28%] bottom-0 h-[100%] w-auto z-10 pointer-events-none">
          <div class="relative h-full w-full flex items-end justify-center">
            <img src="{{ asset('public/new-subject-sectionimg/herosubject.png') }}" alt="Student studying" class="h-full object-cover object-center max-w-[500px]" style="-webkit-mask-image: linear-gradient(to right, transparent 0%, black 30%); mask-image: linear-gradient(to right, transparent 0%, black 30%);" />
            
            <!-- Floating Badge -->
            <div class="absolute top-1/2 right-12 bg-white rounded-xl shadow-[0_8px_30px_rgba(0,0,0,0.08)] p-3.5 flex items-center space-x-3 border border-gray-100 pointer-events-auto z-30">
                <i class="fas fa-headset text-lg" style="font-size:35px; color:#ea580c"></i>
              
              <div class="flex flex-col pr-2">
                <span class="font-extrabold text-[#0f1b3d] text-xs leading-tight">24/7</span>
                <span class="text-[9px] text-gray-500 font-semibold tracking-wide">Live Support</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Form (4 cols) -->
        <div class="lg:col-span-4 lg:col-start-9 relative z-20 pt-4">
          <div class="bg-white rounded-3xl shadow-[0_15px_60px_rgba(0,0,0,0.06)] p-4 border border-gray-100">
            <div class="flex items-center justify-center space-x-2 mb-3">
              <span class="text-[#facc15] text-lg">✨</span>
              <h2 class="text-[19px] font-extrabold text-[#0f1b3d]">Get Instant Quote</h2>
              <span class="text-[#facc15] text-lg opacity-70">✨</span>
            </div>
            
            <form id="quoteForm" class="space-y-2.5">
              <!-- Academic Level -->
              <div class="flex items-center p-2.5 border border-gray-100 rounded-xl bg-white shadow-sm mini-field">
                <div class="w-9 h-9 rounded-lg bg-purple-50 text-[#7e22ce] flex items-center justify-center text-lg shrink-0 mr-3">
                  <i class="fas fa-user-graduate"></i>
                </div>
                <div class="flex-1">
                  <label class="block text-[10px] font-extrabold text-[#0f1b3d] mb-0.5">Academic Level</label>
                  <select id="q_level" name="level" class="w-full bg-transparent text-gray-600 text-[11px] font-bold outline-none cursor-pointer appearance-none">
                    <option value="">Select Level</option>
                    <option value="Undergraduate">Undergraduate</option>
                    <option value="Postgraduate">Postgraduate</option>
                    <option value="PhD">PhD</option>
                  </select>
                </div>
                <i class="fas fa-chevron-down text-gray-300 text-[10px] ml-2"></i>
              </div>

              <!-- Subject -->
              <div class="flex items-center p-2.5 border border-gray-100 rounded-xl bg-white shadow-sm mini-field">
                <div class="w-9 h-9 rounded-lg bg-orange-50 text-[#ea580c] flex items-center justify-center text-lg shrink-0 mr-3">
                  <i class="fas fa-book-open"></i>
                </div>
                <div class="flex-1">
                  <label class="block text-[10px] font-extrabold text-[#0f1b3d] mb-0.5">Subject</label>
                  <input type="text" id="q_subject" name="subject" placeholder="e.g., Accounting" class="w-full bg-transparent text-gray-600 text-[11px] font-bold outline-none focus:text-[#3f159a]">
                </div>
              </div>

              <!-- Assignment Type -->
              <div class="flex items-center p-2.5 border border-gray-100 rounded-xl bg-white shadow-sm mini-field">
                <div class="w-9 h-9 rounded-lg bg-red-50 text-red-500 flex items-center justify-center text-lg shrink-0 mr-3">
                  <i class="fas fa-file-alt"></i>
                </div>
                <div class="flex-1">
                  <label class="block text-[10px] font-extrabold text-[#0f1b3d] mb-0.5">Assignment Type</label>
                  <select id="q_service" name="service" class="w-full bg-transparent text-gray-600 text-[11px] font-bold outline-none cursor-pointer appearance-none">
                    <option value="">Select Type</option>
                    <option value="Assignment">Assignment</option>
                    <option value="Dissertation">Dissertation</option>
                    <option value="Essay">Essay</option>
                    <option value="SOP">SOP</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <i class="fas fa-chevron-down text-gray-300 text-[10px] ml-2"></i>
              </div>

              <!-- Deadline -->
              <div class="flex items-center p-2.5 border border-gray-100 rounded-xl bg-white shadow-sm mini-field">
                <div class="w-9 h-9 rounded-lg bg-pink-50 text-pink-500 flex items-center justify-center text-lg shrink-0 mr-3">
                  <i class="far fa-clock"></i>
                </div>
                <div class="flex-1">
                  <label class="block text-[10px] font-extrabold text-[#0f1b3d] mb-0.5">Deadline</label>
                  <select id="q_deadline" name="deadline" class="w-full bg-transparent text-gray-600 text-[11px] font-bold outline-none cursor-pointer appearance-none">
                    <option value="">Select Deadline</option>
                    <option value="1">1 Day</option>
                    <option value="2">2 Days</option>
                    <option value="3">3 Days</option>
                    <option value="4">4 Days</option>
                    <option value="5">5 Days</option>
                    <option value="7">7 Days</option>
                    <option value="10">10 Days</option>
                    <option value="14">14 Days</option>
                    <option value="21">21+ Days</option>
                  </select>
                </div>
                <i class="fas fa-chevron-down text-gray-300 text-[10px] ml-2"></i>
              </div>

              <!-- Word Count / Pages -->
              <div class="flex items-center p-2.5 border border-gray-100 rounded-xl bg-white shadow-sm mini-field mini-field--pages">
                <div class="w-9 h-9 rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center text-lg shrink-0 mr-3">
                  <i class="fas fa-file-word"></i>
                </div>
                <div class="flex-1 flex justify-between items-center pr-1">
                  <div>
                    <label class="block text-[10px] font-extrabold text-[#0f1b3d] mb-0.5">Pages / Words</label>
                    <span id="wordVal" class="text-[10px] text-gray-500 font-bold">250 Words</span>
                  </div>
                  <!-- Stepper -->
                  <div class="flex items-center justify-between bg-gray-50 border border-gray-100 rounded-md overflow-hidden h-[26px] w-[90px]">
                    <button type="button" class="w-6 h-full hover:bg-gray-200 font-extrabold text-gray-600 flex items-center justify-center transition" id="pgMinus">−</button>
                    <div class="flex-1 flex items-center justify-center space-x-1">
                      <span id="pgVal" class="text-[10px] font-bold text-[#0f1b3d]">1</span>
                    </div>
                    <button type="button" class="w-6 h-full hover:bg-gray-200 font-extrabold text-gray-600 flex items-center justify-center transition" id="pgPlus">+</button>
                  </div>
                </div>
                <input type="hidden" name="pages" id="pagesHidden" value="1">
                <input type="hidden" name="words" id="wordsHidden" value="250">
                <i class="fas fa-chevron-down text-gray-300 text-[10px] ml-2"></i>
              </div>

              <!-- Name & Email -->
              <div class="grid grid-cols-2 gap-2 mt-1">
                <div class="flex flex-col p-2.5 border border-gray-100 rounded-xl bg-[#f8fafc] shadow-sm mini-field">
                  <label class="block text-[10px] font-extrabold text-[#0f1b3d] mb-1">Your Name</label>
                  <input type="text" id="q_name" name="name" placeholder="Enter name" class="w-full bg-transparent text-[11px] font-bold text-gray-700 outline-none focus:text-[#3f159a]">
                </div>
                <div class="flex flex-col p-2.5 border border-gray-100 rounded-xl bg-[#f8fafc] shadow-sm mini-field">
                  <label class="block text-[10px] font-extrabold text-[#0f1b3d] mb-1">Email Address</label>
                  <input type="email" id="q_email" name="email" placeholder="Enter email" class="w-full bg-transparent text-[11px] font-bold text-gray-700 outline-none focus:text-[#3f159a]">
                </div>
              </div>

              <!-- Phone with Country Code -->
              <div class="flex items-center p-2 border border-gray-100 rounded-xl bg-[#f8fafc] shadow-sm mini-field relative phone-field mt-2" id="phoneField">
                <button type="button" class="cc-btn bg-gray-100 rounded-lg px-2 py-1.5 flex items-center justify-center text-[11px] font-bold text-gray-700 min-w-[70px] mr-2" id="ccBtn">
                    <span class="cc-flag mr-1" id="ccFlag">🇬🇧</span>
                    <span class="cc-code" id="ccCode">+44</span>
                </button>
                <div class="flex-1 flex flex-col">
                  <label class="block text-[10px] font-extrabold text-[#0f1b3d] mb-0.5">Phone Number</label>
                  <input type="tel" id="q_phone" name="phone" placeholder="Numbers only*" class="w-full bg-transparent text-[11px] font-bold text-gray-700 outline-none focus:text-[#3f159a]" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="cc-menu hidden absolute bottom-[100%] left-0 w-[220px] bg-white border border-gray-100 rounded-lg shadow-[0_-5px_20px_rgba(0,0,0,0.1)] z-[999] mb-1" id="ccMenu">
                  <div class="p-2 border-b border-gray-50">
                    <input type="text" id="ccSearch" class="w-full bg-gray-50 border border-gray-100 rounded px-2 py-1.5 text-[11px] outline-none" placeholder="Search country...">
                  </div>
                  <div class="cc-list max-h-40 overflow-y-auto" id="ccList"></div>
                </div>
                <input type="hidden" id="countryCodeHidden" name="countryCode" value="+44">
                <input type="hidden" id="countryIsoHidden" name="countryIso" value="GB">
              </div>

              <!-- Hidden Policy (Form expects it) -->
              <input type="hidden" id="policy" name="policy" value="true" checked>

              <button type="submit" id="submitBtn" class="w-full bg-[#ea580c] hover:bg-orange-600 text-white font-extrabold py-3.5 rounded-xl text-[13px] transition mt-3 flex items-center justify-center shadow-md">
                <span id="btnText">Get Price Now <i class="fas fa-arrow-right ml-2 font-normal text-sm"></i></span>
                <span id="spinner" class="hidden"><i class="fas fa-spinner fa-spin text-lg"></i></span>
              </button>

              <!-- Features bottom -->
              <div class="flex justify-between items-center text-[9px] text-gray-500 font-bold px-1 pt-2">
                <div class="flex items-center"><i class="fas fa-check text-[#22c55e] mr-1 text-[10px]"></i> It's free</div>
                <div class="flex items-center"><i class="fas fa-check text-[#22c55e] mr-1 text-[10px]"></i> No obligation</div>
                <div class="flex items-center"><i class="fas fa-check text-[#22c55e] mr-1 text-[10px]"></i> Quick response</div>
              </div>
            </form>
          </div>
        </div>

      </div>
  <!-- Features Grid (Why Students Choose) -->
  <section class="py-4 lg:py-6 bg-white">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-[22px] font-extrabold text-[#0f1b3d] text-center mb-5 mt-5">Why Students Choose Our Accounting Assignment Help?</h2>
      
      <div class="grid grid-cols-2 lg:grid-cols-6 gap-x-4 gap-y-8">
        
        <!-- Feature 1 -->
        <div class="flex flex-col">
          <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-full bg-[#f4f2ff] flex items-center justify-center text-[#3f159a] shrink-0 border border-purple-50">
              <i class="fas fa-users-cog text-xl"></i>
            </div>
            <h3 class="text-[11px] font-extrabold text-[#0f1b3d] leading-tight">Qualified<br/>Accounting Experts</h3>
          </div>
          <p class="text-[10px] text-gray-500 font-medium leading-[1.6]">Professional accountants<br/>and academic writers.</p>
        </div>

        <!-- Feature 2 -->
        <div class="flex flex-col">
          <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-full bg-[#f4f2ff] flex items-center justify-center text-[#3f159a] shrink-0 border border-purple-50">
              <i class="far fa-file-alt text-xl"></i>
            </div>
            <h3 class="text-[11px] font-extrabold text-[#0f1b3d] leading-tight">100% Original<br/>& Plagiarism Free</h3>
          </div>
          <p class="text-[10px] text-gray-500 font-medium leading-[1.6]">Every assignment is<br/>unique and verified.</p>
        </div>

        <!-- Feature 3 -->
        <div class="flex flex-col">
          <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-full bg-[#f4f2ff] flex items-center justify-center text-[#3f159a] shrink-0 border border-purple-50">
              <i class="far fa-clock text-xl"></i>
            </div>
            <h3 class="text-[11px] font-extrabold text-[#0f1b3d] leading-tight">On-Time<br/>Delivery</h3>
          </div>
          <p class="text-[10px] text-gray-500 font-medium leading-[1.6]">We value your time and<br/>always meet deadlines.</p>
        </div>

        <!-- Feature 4 -->
        <div class="flex flex-col">
          <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-full bg-[#f4f2ff] flex items-center justify-center text-[#3f159a] shrink-0 border border-purple-50">
              <i class="fas fa-headset text-xl"></i>
            </div>
            <h3 class="text-[11px] font-extrabold text-[#0f1b3d] leading-tight">24/7<br/>Support</h3>
          </div>
          <p class="text-[10px] text-gray-500 font-medium leading-[1.6]">Our support team is<br/>available anytime.</p>
        </div>

        <!-- Feature 5 -->
        <div class="flex flex-col">
          <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-full bg-[#f4f2ff] flex items-center justify-center text-[#3f159a] shrink-0 border border-purple-50">
              <i class="fas fa-map-marker-alt text-xl"></i>
            </div>
            <h3 class="text-[11px] font-extrabold text-[#0f1b3d] leading-tight">UK-Based<br/>Accountants</h3>
          </div>
          <p class="text-[10px] text-gray-500 font-medium leading-[1.6]">Writers familiar with UK<br/>academic standards.</p>
        </div>

        <!-- Feature 6 -->
        <div class="flex flex-col">
          <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-full bg-[#f4f2ff] flex items-center justify-center text-[#3f159a] shrink-0 border border-purple-50">
              <i class="fas fa-tags text-xl"></i>
            </div>
            <h3 class="text-[11px] font-extrabold text-[#0f1b3d] leading-tight">Affordable<br/>Pricing</h3>
          </div>
          <p class="text-[10px] text-gray-500 font-medium leading-[1.6]">Premium quality help<br/>within your budget.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- EXPERTS SECTION -->
  <section class="py-4 lg:py-8 bg-[white] ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center mb-12 relative">
        <h2 class="text-2xl lg:text-3xl font-extrabold text-[#0f1b3d] mb-3">Our Accounting Assignment Experts</h2>
        <p class="text-sm text-gray-500 font-medium">Learn from the best. Our experts are here to help you achieve top grades.</p>
        <a href="#" class="absolute right-0 bottom-0 text-xs font-extrabold text-[#3f159a] hidden md:flex items-center hover:underline uppercase tracking-wide">
          View All Experts <i class="fas fa-arrow-right ml-2 text-sm"></i>
        </a>
      </div>

      <div class="flex overflow-x-auto pb-6 -mx-4 px-4 snap-x snap-mandatory hide-scrollbar lg:grid lg:grid-cols-5 lg:gap-6 lg:overflow-visible lg:pb-0 lg:mx-0 lg:px-0 gap-4 relative">
        <!-- Next Button floating right -->
        <button class="absolute -right-5 top-1/2 -translate-y-1/2 w-10 h-10 bg-white rounded-full shadow-lg border border-gray-100 flex items-center justify-center text-gray-400 hover:text-[#3f159a] z-10 hidden lg:flex">
          <i class="fas fa-chevron-right text-sm"></i>
        </button>

        <!-- Expert 1 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] flex-none w-[85%] sm:w-[45%] lg:w-auto snap-center">
          <div class="h-44 bg-gray-100 relative">
            <img src="https://images.unsplash.com/photo-1590650153855-d9e808231d41?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Emma Taylor" class="w-full h-full object-cover object-center" />
          </div>
          <div class="p-3">
            <h3 class="font-bold text-[#0f1b3d] text-sm mb-1">Emma Taylor</h3>
            <p class="text-[11px] text-gray-500 mb-2 font-medium">Accounting Expert</p>
            <div class="space-y-1.5 mb-3">
              <p class="text-xs font-semibold text-[#0f1b3d]">MSc Accounting & Finance</p>
              <p class="text-[11px] text-gray-500 font-medium">8+ Years Exp.</p>
            </div>
            <div class="flex items-center justify-between text-xs mb-2">
              <div class="flex items-center font-bold text-yellow-500"><i class="fas fa-star mr-1.5"></i> 4.9</div>
              <div class="text-gray-400 text-[10px] font-medium">(1200+ Orders)</div>
            </div>
            <button class="w-full py-2.5 border-2 border-[#f4f2ff] text-[#3f159a] bg-white rounded-md text-xs font-bold hover:bg-[#f4f2ff] hover:border-[#3f159a] transition">
              Hire Expert
            </button>
          </div>
        </div>

        <!-- Expert 2 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] flex-none w-[85%] sm:w-[45%] lg:w-auto snap-center">
          <div class="h-44 bg-gray-100 relative">
            <img src="https://images.unsplash.com/photo-1590650153855-d9e808231d41?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Daniel Harris" class="w-full h-full object-cover object-center" />
          </div>
          <div class="p-3">
            <h3 class="font-bold text-[#0f1b3d] text-sm mb-1">Daniel Harris</h3>
            <p class="text-[11px] text-gray-500 mb-2 font-medium">Accounting Expert</p>
            <div class="space-y-1.5 mb-3">
              <p class="text-xs font-semibold text-[#0f1b3d]">ACCA, MBA</p>
              <p class="text-[11px] text-gray-500 font-medium">10+ Years Exp.</p>
            </div>
            <div class="flex items-center justify-between text-xs mb-2">
              <div class="flex items-center font-bold text-yellow-500"><i class="fas fa-star mr-1.5"></i> 4.9</div>
              <div class="text-gray-400 text-[10px] font-medium">(1900+ Orders)</div>
            </div>
            <button class="w-full py-2.5 border-2 border-[#f4f2ff] text-[#3f159a] bg-white rounded-md text-xs font-bold hover:bg-[#f4f2ff] hover:border-[#3f159a] transition">
              Hire Expert
            </button>
          </div>
        </div>

        <!-- Expert 3 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] flex-none w-[85%] sm:w-[45%] lg:w-auto snap-center">
          <div class="h-44 bg-gray-100 relative">
            <img src="https://images.unsplash.com/photo-1590650153855-d9e808231d41?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sophia Martinez" class="w-full h-full object-cover object-center" />
          </div>
          <div class="p-3">
            <h3 class="font-bold text-[#0f1b3d] text-sm mb-1">Sophia Martinez</h3>
            <p class="text-[11px] text-gray-500 mb-2 font-medium">Accounting Expert</p>
            <div class="space-y-1.5 mb-3">
              <p class="text-xs font-semibold text-[#0f1b3d]">PhD Accounting</p>
              <p class="text-[11px] text-gray-500 font-medium">7+ Years Exp.</p>
            </div>
            <div class="flex items-center justify-between text-xs mb-2">
              <div class="flex items-center font-bold text-yellow-500"><i class="fas fa-star mr-1.5"></i> 4.8</div>
              <div class="text-gray-400 text-[10px] font-medium">(980+ Orders)</div>
            </div>
            <button class="w-full py-2.5 border-2 border-[#f4f2ff] text-[#3f159a] bg-white rounded-md text-xs font-bold hover:bg-[#f4f2ff] hover:border-[#3f159a] transition">
              Hire Expert
            </button>
          </div>
        </div>

        <!-- Expert 4 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] flex-none w-[85%] sm:w-[45%] lg:w-auto snap-center">
          <div class="h-44 bg-gray-100 relative">
            <img src="https://images.unsplash.com/photo-1590650153855-d9e808231d41?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Olivia Bennett" class="w-full h-full object-cover object-center" />
          </div>
          <div class="p-3">
            <h3 class="font-bold text-[#0f1b3d] text-sm mb-1">Olivia Bennett</h3>
            <p class="text-[11px] text-gray-500 mb-2 font-medium">Accounting Expert</p>
            <div class="space-y-1.5 mb-3">
              <p class="text-xs font-semibold text-[#0f1b3d]">MSc Finance</p>
              <p class="text-[11px] text-gray-500 font-medium">6+ Years Exp.</p>
            </div>
            <div class="flex items-center justify-between text-xs mb-2">
              <div class="flex items-center font-bold text-yellow-500"><i class="fas fa-star mr-1.5"></i> 4.8</div>
              <div class="text-gray-400 text-[10px] font-medium">(860+ Orders)</div>
            </div>
            <button class="w-full py-2.5 border-2 border-[#f4f2ff] text-[#3f159a] bg-white rounded-md text-xs font-bold hover:bg-[#f4f2ff] hover:border-[#3f159a] transition">
              Hire Expert
            </button>
          </div>
        </div>
        
        <!-- Expert 5 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] flex-none w-[85%] sm:w-[45%] lg:w-auto snap-center">
          <div class="h-44 bg-gray-100 relative">
            <img src="https://images.unsplash.com/photo-1590650153855-d9e808231d41?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="James Wilson" class="w-full h-full object-cover object-center" />
          </div>
          <div class="p-3">
            <h3 class="font-bold text-[#0f1b3d] text-sm mb-1">James Wilson</h3>
            <p class="text-[11px] text-gray-500 mb-2 font-medium">Accounting Expert</p>
            <div class="space-y-1.5 mb-3">
              <p class="text-xs font-semibold text-[#0f1b3d]">BSc Accounting</p>
              <p class="text-[11px] text-gray-500 font-medium">5+ Years Exp.</p>
            </div>
            <div class="flex items-center justify-between text-xs mb-2">
              <div class="flex items-center font-bold text-yellow-500"><i class="fas fa-star mr-1.5"></i> 4.7</div>
              <div class="text-gray-400 text-[10px] font-medium">(500+ Orders)</div>
            </div>
            <button class="w-full py-2.5 border-2 border-[#f4f2ff] text-[#3f159a] bg-white rounded-md text-xs font-bold hover:bg-[#f4f2ff] hover:border-[#3f159a] transition">
              Hire Expert
            </button>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- PROMO BANNER -->
  <section class="py-4 lg:py-6 bg-white">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-gradient-to-br from-[#1a0b3f] to-[#3f159a] rounded-2xl overflow-hidden relative shadow-xl p-5 md:p-8 flex flex-col lg:flex-row lg:items-center lg:justify-between">
        
        <!-- Top Half (Mobile), Left Half (Desktop) -->
        <div class="flex justify-between items-start lg:items-center mb-8 lg:mb-0 relative z-10 lg:w-[35%]">
          <!-- Text -->
          <div class="text-white flex-1 pt-1">
            <p class="text-[11px] lg:text-xs font-extrabold tracking-widest mb-1 text-white opacity-90">UP TO</p>
            <h2 class="text-[36px] lg:text-5xl font-extrabold mb-1 leading-none tracking-tight whitespace-nowrap">
              <span class="text-[#ea580c]">30%</span> <span class="text-white">OFF</span>
            </h2>
            <p class="text-[10px] lg:text-xs font-bold uppercase mb-4 text-white opacity-90">ON YOUR FIRST ORDER</p>
            <button class="bg-white text-[#3f159a] font-extrabold py-2 px-5 rounded-md md:py-3 md:px-6 md:text-sm text-[11px] transition shadow-md">
              Use Code: AIN30
            </button>
          </div>
          
          <!-- Image (Mobile Top Right) -->
          <div class="w-28 h-28 relative flex-shrink-0 flex items-center justify-center lg:hidden -mr-2 -mt-2">
             <i class="fas fa-gift text-[100px] text-[#ea580c] drop-shadow-xl translate-y-2 -rotate-6 opacity-90"></i>
          </div>
        </div>

        <!-- Icons Grid (Mobile Bottom, Desktop Middle) -->
        <div class="grid grid-cols-4 lg:flex lg:flex-nowrap gap-y-8 gap-x-2 relative z-10 text-center lg:flex-1 lg:justify-end lg:pr-[150px] lg:divide-x lg:divide-white/20">
          
          <!-- Item 1 -->
          <div class="flex flex-col items-center px-1 lg:px-6">
            <div class="h-8 lg:h-10 flex items-center justify-center mb-2 lg:mb-3">
              <i class="fas fa-file-signature text-2xl lg:text-[32px] text-white opacity-95"></i>
            </div>
            <span class="text-[10px] lg:text-[11px] uppercase font-extrabold text-white leading-tight tracking-wide">Plagiarism<br/>Report</span>
          </div>

          <!-- Item 2 -->
          <div class="flex flex-col items-center px-1 lg:px-6">
            <div class="h-8 lg:h-10 flex items-center justify-center mb-2 lg:mb-3">
              <i class="fas fa-robot text-2xl lg:text-[32px] text-white opacity-95"></i>
            </div>
            <span class="text-[10px] lg:text-[11px] uppercase font-extrabold text-white leading-tight tracking-wide">AI Report</span>
          </div>

          <!-- Item 3 -->
          <div class="flex flex-col items-center px-1 lg:px-6">
            <div class="h-8 lg:h-10 flex items-center justify-center mb-2 lg:mb-3">
              <i class="fas fa-file-alt text-2xl lg:text-[32px] text-white opacity-95"></i>
            </div>
            <span class="text-[10px] lg:text-[11px] uppercase font-extrabold text-white leading-tight tracking-wide">Title<br/>Page</span>
          </div>

          <!-- Item 4 -->
          <div class="flex flex-col items-center px-1 lg:px-6">
            <div class="h-8 lg:h-10 flex items-center justify-center mb-2 lg:mb-3">
              <i class="fas fa-book text-2xl lg:text-[32px] text-white opacity-95"></i>
            </div>
            <span class="text-[10px] lg:text-[11px] uppercase font-extrabold text-white leading-tight tracking-wide">Bibliography</span>
          </div>

          <!-- Item 5 -->
          <div class="flex flex-col items-center px-1 lg:px-6 col-span-1 lg:col-span-auto">
            <div class="h-8 lg:h-10 flex items-center justify-center mb-2 lg:mb-3">
              <i class="fas fa-sync-alt text-2xl lg:text-[32px] text-white opacity-95"></i>
            </div>
            <span class="text-[10px] lg:text-[11px] uppercase font-extrabold text-white leading-tight tracking-wide">Unlimited<br/>Revisions</span>
          </div>

          <!-- Item 6 -->
          <div class="flex flex-col items-center px-1 lg:px-6 col-span-1 lg:col-span-auto">
            <div class="h-8 lg:h-10 flex items-center justify-center mb-2 lg:mb-3">
              <i class="fas fa-align-left text-2xl lg:text-[32px] text-white opacity-95"></i>
            </div>
            <span class="text-[10px] lg:text-[11px] uppercase font-extrabold text-white leading-tight tracking-wide">Formatting</span>
          </div>

          <!-- Item 7 -->
          <div class="flex flex-col items-center px-1 lg:px-6 col-span-2 lg:col-span-auto lg:col-start-auto">
            <div class="h-8 lg:h-10 flex items-center justify-center mb-2 lg:mb-3">
              <i class="fas fa-user-clock text-2xl lg:text-[32px] text-white opacity-95"></i>
            </div>
            <span class="text-[10px] lg:text-[11px] uppercase font-extrabold text-white leading-tight tracking-wide">24/7<br/>Support</span>
          </div>

        </div>

        <!-- Desktop Gift Image -->
        <div class="hidden lg:flex absolute right-4 bottom-0 z-0">
          <i class="fas fa-gift text-[170px] text-[#ea580c] drop-shadow-2xl translate-y-6 -rotate-6"></i>
        </div>

      </div>
    </div>
  </section>

  <!-- TESTIMONIALS SECTION -->
  <section class="py-4 lg:py-8 bg-[white]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center mb-16">
        <h2 class="text-3xl font-extrabold text-[#0f1b3d] mb-2">What Our Students <span class="text-[#3f159a]">Say</span></h2>
        <p class="text-sm text-gray-500 font-medium">Trusted by thousands of students across the UK and worldwide.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Card 1 -->
        <div class="bg-[#f4f2ff] rounded-2xl p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] relative flex flex-col justify-between">
          <i class="fas fa-quote-left text-4xl text-[#3f159a] absolute top-6 left-6"></i>
          <p class="text-sm text-gray-600 leading-loose mb-10 relative z-10 pt-8 font-medium">
            "The accounting assignment was perfect! Well-structured, accurate, and delivered before the deadline. Got an A+."
          </p>
          <div class="flex items-center relative z-10">
            <div class="w-12 h-12 rounded-full bg-gray-200 mr-4 overflow-hidden border-2 border-white shadow-sm">
              <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="w-full h-full object-cover" />
            </div>
            <div>
              <h4 class="font-bold text-xs text-[#0f1b3d] mb-0.5">Liam O'Connor</h4>
              <p class="text-[11px] text-gray-500 mb-1.5">University of Manchester</p>
              <div class="flex text-yellow-500 text-[15px] space-x-0.5">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 (Active/Purple) -->
        <div class="bg-[#3f159a] rounded-2xl p-8 shadow-2xl relative flex flex-col justify-between transform md:-translate-y-4">
          <i class="fas fa-quote-left text-4xl text-[white] absolute top-6 left-6"></i>
          <p class="text-sm text-white leading-loose mb-10 relative z-10 pt-8 font-medium">
            "Excellent work on my financial accounting assignment. The expert followed all the instructions and provided great insights."
          </p>
          <div class="flex items-center relative z-10">
            <div class="w-12 h-12 rounded-full bg-purple-300 mr-4 overflow-hidden border-2 border-[#5123b3] shadow-sm">
               <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="w-full h-full object-cover" />
            </div>
            <div>
              <h4 class="font-bold text-xs text-white mb-0.5">Emily Johnson</h4>
              <p class="text-[11px] text-purple-200 mb-1.5">University of Leeds</p>
              <div class="flex text-yellow-400 text-[15px] space-x-0.5">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-[#f4f2ff] rounded-2xl p-8 shadow-[0_8px_30px_rgba(0,0,0,0.04)] relative flex flex-col justify-between">
          <i class="fas fa-quote-left text-4xl text-[#3f159a] absolute top-6 left-6"></i>
          <p class="text-sm text-gray-600 leading-loose mb-10 relative z-10 pt-8 font-medium">
            "Amazing experience! The calculations were 100% correct and the report was very professional."
          </p>
          <div class="flex items-center relative z-10">
            <div class="w-12 h-12 rounded-full bg-gray-200 mr-4 overflow-hidden border-2 border-white shadow-sm">
               <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="w-full h-full object-cover" />
            </div>
            <div>
              <h4 class="font-bold text-xs text-[#0f1b3d] mb-0.5">Noah Williams</h4>
              <p class="text-[11px] text-gray-500 mb-1.5">King's College London</p>
              <div class="flex text-yellow-500 text-[15px] space-x-0.5">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </div>
        </div>

      </div>
      
      <!-- Dots -->
      <div class="flex justify-center space-x-3 mt-12">
        <div class="w-2 h-2 rounded-full bg-gray-300"></div>
        <div class="w-2 h-2 rounded-full bg-[#3f159a]"></div>
        <div class="w-2 h-2 rounded-full bg-gray-300"></div>
      </div>
    </div>
  </section>

  <!-- FEATURES DETAILED SECTION -->
  <section class="py-4 lg:py-8 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
      <h2 class="text-2xl lg:text-3xl font-extrabold text-[#0f1b3d] mb-6">Why Choose Accounting Assignment Help From Us?</h2>
      <p class="text-[13px] text-gray-600 leading-relaxed font-medium">
        Well, the answer to your question is simple! When students seek accounting assignment help from us, they get several benefits that add value to their service. So, do you want to know such valuable benefits that explain why seeking our assistance is the right decision to make? Continue reading to learn about it!
      </p>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-12">
      
      <div class="flex items-start">
        <div class="w-12 h-12 rounded-2xl bg-[#f4f2ff] text-[#3f159a] flex items-center justify-center shrink-0 mr-5 shadow-sm">
          <i class="fas fa-medal text-xl"></i>
        </div>
        <div class="pt-1">
          <h3 class="text-sm font-bold text-[#0f1b3d] mb-2">Quality Assistance</h3>
          <p class="text-xs text-gray-500 leading-relaxed font-medium">With experienced accounting professionals, our team is equipped with the latest tools and technologies that enable us to offer quality accounting help for students.</p>
        </div>
      </div>

      <div class="flex items-start">
        <div class="w-12 h-12 rounded-2xl bg-[#f4f2ff] text-[#3f159a] flex items-center justify-center shrink-0 mr-5 shadow-sm">
          <i class="fas fa-layer-group text-xl"></i>
        </div>
        <div class="pt-1">
          <h3 class="text-sm font-bold text-[#0f1b3d] mb-2">Customized Solutions</h3>
          <p class="text-xs text-gray-500 leading-relaxed font-medium">When you seek our online accounting assignment help, you get personalized and tailor-made support that fulfills all your needs and demands.</p>
        </div>
      </div>

      <div class="flex items-start">
        <div class="w-12 h-12 rounded-2xl bg-[#f4f2ff] text-[#3f159a] flex items-center justify-center shrink-0 mr-5 shadow-sm">
          <i class="fas fa-bullseye text-xl"></i>
        </div>
        <div class="pt-1">
          <h3 class="text-sm font-bold text-[#0f1b3d] mb-2">Accuracy and Precision</h3>
          <p class="text-xs text-gray-500 leading-relaxed font-medium">Our experts aim to deliver accurate and error-free solutions. We have a committed team that adheres to accounting standards and provides precise work.</p>
        </div>
      </div>

      <div class="flex items-start">
        <div class="w-12 h-12 rounded-2xl bg-[#f4f2ff] text-[#3f159a] flex items-center justify-center shrink-0 mr-5 shadow-sm">
          <i class="fas fa-shield-alt text-xl"></i>
        </div>
        <div class="pt-1">
          <h3 class="text-sm font-bold text-[#0f1b3d] mb-2">100% Confidentiality</h3>
          <p class="text-xs text-gray-500 leading-relaxed font-medium">We maintain a policy where your personal information remains 100% secure. Your confidentiality and privacy are our top priorities.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- BOTTOM CTA BANNER -->
  <section class="py-4 lg:py-8 bg-[white]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-white shadow-[0_8px_30px_rgba(0,0,0,0.06)] rounded-3xl p-4 md:p-7 flex flex-col md:flex-row items-center justify-between">
        
        <div class="flex flex-col md:flex-row items-center md:items-center text-center md:text-left mb-6 md:mb-0 w-full">
          <div class="w-20 h-20 mb-4 md:mb-0 md:mr-8 shrink-0 flex items-center justify-center">
            <!-- Cap and Books illustration placeholder -->
            <div class="relative w-full h-full flex items-center justify-center">
               <i class="fas fa-graduation-cap text-6xl text-[#3f159a] drop-shadow-md"></i>
            </div>
          </div>
          <div class="pt-2">
            <p class="text-[#0f1b3d] text-sm font-semibold leading-relaxed">
              Accounting is a crucial subject that requires precision and analytical thinking.<br class="hidden md:block"/>
              Our experts are here to help you excel in your assignments!
            </p>
          </div>
        </div>

        <button class="bg-[#3f159a] hover:bg-[#2b0c61] text-white font-bold py-4 px-8 rounded-lg text-xs whitespace-nowrap shadow-lg transition shrink-0 uppercase tracking-wide">
          Get Free Quote Now <i class="fas fa-arrow-right ml-2"></i>
        </button>

      </div>
    </div>
  </section>
      <section class="py-4 lg:py-8">
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
</div>

<!-- Toast notification -->
<div class="toast fixed top-5 right-5 px-3 py-2 bg-red-500 text-white rounded-lg hidden z-[10000] text-xs shadow-lg" id="toastMessage"></div>

<style>
    .mini-error {
        margin-top: 4px;
        font-size: 10px;
        color: #ef4444;
        font-weight: 600;
        line-height: 1.2;
    }
    .has-error input,
    .has-error select,
    .has-error .phone-field {
        border-color: #ef4444 !important;
    }
    .toast.success {
        background-color: #22c55e !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const COUNTRIES = [
            { n: "Afghanistan", i: "AF", d: "+93" },
            { n: "Albania", i: "AL", d: "+355" },
            { n: "Algeria", i: "DZ", d: "+213" },
            { n: "Andorra", i: "AD", d: "+376" },
            { n: "Angola", i: "AO", d: "+244" },
            { n: "Argentina", i: "AR", d: "+54" },
            { n: "Australia", i: "AU", d: "+61" },
            { n: "Austria", i: "AT", d: "+43" },
            { n: "Bahrain", i: "BH", d: "+973" },
            { n: "Bangladesh", i: "BD", d: "+880" },
            { n: "Belgium", i: "BE", d: "+32" },
            { n: "Brazil", i: "BR", d: "+55" },
            { n: "Canada", i: "CA", d: "+1" },
            { n: "China", i: "CN", d: "+86" },
            { n: "Colombia", i: "CO", d: "+57" },
            { n: "Cyprus", i: "CY", d: "+357" },
            { n: "Czech Republic", i: "CZ", d: "+420" },
            { n: "Denmark", i: "DK", d: "+45" },
            { n: "Egypt", i: "EG", d: "+20" },
            { n: "Finland", i: "FI", d: "+358" },
            { n: "France", i: "FR", d: "+33" },
            { n: "Germany", i: "DE", d: "+49" },
            { n: "Greece", i: "GR", d: "+30" },
            { n: "Hong Kong", i: "HK", d: "+852" },
            { n: "India", i: "IN", d: "+91" },
            { n: "Indonesia", i: "ID", d: "+62" },
            { n: "Ireland", i: "IE", d: "+353" },
            { n: "Israel", i: "IL", d: "+972" },
            { n: "Italy", i: "IT", d: "+39" },
            { n: "Japan", i: "JP", d: "+81" },
            { n: "Kuwait", i: "KW", d: "+965" },
            { n: "Malaysia", i: "MY", d: "+60" },
            { n: "Mexico", i: "MX", d: "+52" },
            { n: "Netherlands", i: "NL", d: "+31" },
            { n: "New Zealand", i: "NZ", d: "+64" },
            { n: "Nigeria", i: "NG", d: "+234" },
            { n: "Norway", i: "NO", d: "+47" },
            { n: "Oman", i: "OM", d: "+968" },
            { n: "Pakistan", i: "PK", d: "+92" },
            { n: "Philippines", i: "PH", d: "+63" },
            { n: "Poland", i: "PL", d: "+48" },
            { n: "Portugal", i: "PT", d: "+351" },
            { n: "Qatar", i: "QA", d: "+974" },
            { n: "Russia", i: "RU", d: "+7" },
            { n: "Saudi Arabia", i: "SA", d: "+966" },
            { n: "Singapore", i: "SG", d: "+65" },
            { n: "South Africa", i: "ZA", d: "+27" },
            { n: "South Korea", i: "KR", d: "+82" },
            { n: "Spain", i: "ES", d: "+34" },
            { n: "Sri Lanka", i: "LK", d: "+94" },
            { n: "Sweden", i: "SE", d: "+46" },
            { n: "Switzerland", i: "CH", d: "+41" },
            { n: "Taiwan", i: "TW", d: "+886" },
            { n: "Thailand", i: "TH", d: "+66" },
            { n: "Turkey", i: "TR", d: "+90" },
            { n: "United Arab Emirates", i: "AE", d: "+971" },
            { n: "United Kingdom", i: "GB", d: "+44" },
            { n: "United States", i: "US", d: "+1" },
            { n: "Vietnam", i: "VN", d: "+84" }
        ];

        const ccBtn = document.getElementById('ccBtn');
        const ccMenu = document.getElementById('ccMenu');
        const ccList = document.getElementById('ccList');

        function getFlag(iso) { return iso.toUpperCase().replace(/./g, char => String.fromCodePoint(char.charCodeAt(0) + 127397)); }

        function renderCountries(list = COUNTRIES) {
            ccList.innerHTML = list.map(c => `<div class="cc-item flex items-center gap-2 p-2 cursor-pointer text-[11px] border-b border-gray-50 hover:bg-gray-50" data-name="${c.n.toLowerCase()}" data-iso="${c.i}" data-dial="${c.d}"><span>${getFlag(c.i)}</span><span>${c.n}</span><span class="ml-auto font-bold">${c.d}</span></div>`).join('');
        }

        function selectCountry(iso, dial) {
            document.getElementById('ccFlag').textContent = getFlag(iso);
            document.getElementById('ccCode').textContent = dial;
            document.getElementById('countryCodeHidden').value = dial;
            document.getElementById('countryIsoHidden').value = iso;
            ccMenu.classList.add('hidden');
        }

        ccList.addEventListener('click', (e) => {
            const item = e.target.closest('.cc-item');
            if (!item) return;
            selectCountry(item.dataset.iso, item.dataset.dial);
        });

        ccBtn.onclick = (e) => { e.stopPropagation(); ccMenu.classList.toggle('hidden'); };
        document.onclick = () => ccMenu.classList.add('hidden');

        const ccSearch = document.getElementById('ccSearch');
        if (ccSearch) {
            ccSearch.addEventListener('input', () => {
                const q = ccSearch.value.toLowerCase().trim();
                if (!q) return renderCountries(COUNTRIES);
                renderCountries(COUNTRIES.filter(c => c.n.toLowerCase().includes(q)));
            });
        }

        renderCountries();

        // Pages Stepper
        const pgVal = document.getElementById('pgVal');
        const wordVal = document.getElementById('wordVal');
        const pagesHidden = document.getElementById('pagesHidden');
        const wordsHidden = document.getElementById('wordsHidden');

        function updatePages(step) {
            let val = parseInt(pagesHidden.value || "1", 10) + step;
            if (val < 1) val = 1;
            pagesHidden.value = val;
            wordsHidden.value = String(val * 250);
            if (pgVal) pgVal.textContent = val;
            if (wordVal) wordVal.textContent = (val * 250) + " Words";
        }

        document.getElementById('pgPlus').onclick = () => updatePages(1);
        document.getElementById('pgMinus').onclick = () => updatePages(-1);

        // Validation & Submission
        const toast = document.getElementById('toastMessage');
        function showToast(msg, ok = false) {
            toast.textContent = msg;
            toast.className = `toast fixed top-5 right-5 px-3 py-2 text-white rounded-lg z-[10000] text-xs shadow-lg ${ok ? 'bg-[#22c55e]' : 'bg-[#ef4444]'}`;
            toast.style.display = 'block';
            setTimeout(() => { toast.style.display = 'none'; }, 2500);
        }

        function clearErrors() {
            document.querySelectorAll('.mini-error').forEach(el => el.remove());
            document.querySelectorAll('.mini-field').forEach(el => el.classList.remove('has-error'));
        }

        function setFieldError(el, message) {
            if (!el) return;
            const fieldWrap = el.closest('.mini-field') || el;
            fieldWrap.classList.add('has-error');
            const existing = fieldWrap.querySelector('.mini-error');
            if (existing) existing.remove();
            const div = document.createElement('div');
            div.className = 'mini-error';
            div.textContent = message;
            
            // Append error div appropriately
            if(fieldWrap.classList.contains('phone-field')) {
                fieldWrap.parentElement.appendChild(div);
            } else {
                fieldWrap.appendChild(div);
            }
        }

        function validatePayload(payload) {
            clearErrors();
            let ok = true;
            if (!payload.name) { ok = false; setFieldError(document.getElementById('q_name'), 'Name is required.'); }
            if (!payload.email) { ok = false; setFieldError(document.getElementById('q_email'), 'Email is required.'); } else {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!re.test(payload.email)) { ok = false; setFieldError(document.getElementById('q_email'), 'Enter a valid email.'); }
            }
            if (!payload.deadline) { ok = false; setFieldError(document.getElementById('q_deadline'), 'Please select deadline.'); }
            if (!payload.phone) { ok = false; setFieldError(document.getElementById('q_phone'), 'Phone number is required.'); }
            if (!payload.service) { ok = false; setFieldError(document.getElementById('q_service'), 'Please select service.'); }
            if (!payload.subject) { ok = false; setFieldError(document.getElementById('q_subject'), 'Subject is required.'); }
            if (!payload.policy) { ok = false; setFieldError(document.getElementById('policy'), 'You must agree to Privacy Policy & T&C.'); }
            return ok;
        }

        const form = document.getElementById('quoteForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const spinner = document.getElementById('spinner');

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const payload = {
                name: document.getElementById('q_name').value.trim(),
                email: document.getElementById('q_email').value.trim(),
                deadline: document.getElementById('q_deadline').value,
                phone: document.getElementById('q_phone').value.trim(),
                countryCode: document.getElementById('countryCodeHidden').value.trim(),
                countryIso: document.getElementById('countryIsoHidden').value.trim(),
                service: document.getElementById('q_service').value,
                subject: document.getElementById('q_subject').value.trim(),
                pages: document.getElementById('pagesHidden').value,
                words: document.getElementById('wordsHidden').value,
                policy: document.getElementById('policy').checked,
                level: document.getElementById('q_level').value,
                source_page: window.location.href
            };

            if (!validatePayload(payload)) return;
            submitBtn.disabled = true;
            btnText.classList.add("hidden");
            spinner.classList.remove("hidden");

            fetch("{{ route('mini-new-order') }}", {
                method: "POST",
                headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                body: JSON.stringify(payload)
            })
                .then(async (res) => {
                    const data = await res.json().catch(() => ({}));
                    if (res.status === 422 && data && data.errors) {
                        Object.keys(data.errors).forEach((key) => {
                            const msg = data.errors[key]?.[0] || 'Invalid value.';
                            const map = { name: 'q_name', email: 'q_email', deadline: 'q_deadline', phone: 'q_phone', service: 'q_service', subject: 'q_subject', policy: 'policy', countryCode: 'q_phone', words: 'pagesHidden', pages: 'pagesHidden' };
                            const id = map[key] || null;
                            if (id) setFieldError(document.getElementById(id), msg);
                        });
                        throw { message: "Please fix the highlighted fields." };
                    }
                    if (!res.ok) throw data;
                    return data;
                })
                .then((data) => {
                    if (data && data.success) {
                        form.reset();
                        selectCountry("GB", "+44");
                        pagesHidden.value = "1";
                        wordsHidden.value = "250";
                        if (pgVal) pgVal.textContent = "1";
                        if (wordVal) wordVal.textContent = "250 Words";
                        clearErrors();
                        window.location.href = "/thank-you?order=" + encodeURIComponent(data.order_id || "");
                    } else {
                        Swal.fire({ icon: "error", title: "Submission Failed", text: (data && data.message) ? data.message : "Submission failed.", confirmButtonColor: "#3F159A" });
                    }
                })
                .catch((err) => {
                    const msg = (err && err.message) ? err.message : "Something went wrong. Try again later.";
                    console.error(err);
                    Swal.fire({ icon: "error", title: "Error", text: msg, confirmButtonColor: "#3F159A" });
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    btnText.classList.remove("hidden");
                    spinner.classList.add("hidden");
                });
        });

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
    });
</script>
@endsection
