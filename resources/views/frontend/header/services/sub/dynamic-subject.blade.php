@extends('frontend-layouts.app')
@section('content')
<style>
.dsp,*{box-sizing:border-box}.dsp{font-family:'Poppins',sans-serif;color:#101838}.dsp-wrap{max-width:1240px;margin:auto;padding:0 22px}.dsp-hero{background:linear-gradient(115deg,#fff 48%,#faf8ff);padding:36px 0 30px}.dsp-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:56px;align-items:center}.dsp-crumb,.dsp-rating{font-size:12px;color:#667085;margin-bottom:24px}.dsp-stars{background:#22b96b;color:#fff;padding:4px 8px;border-radius:4px;margin-right:8px}.dsp h1{font-size:48px;line-height:1.08;font-weight:800;margin:0 0 16px}.dsp-orange{color:#f05a0d}.dsp-copy{color:#2f2f2f;line-height:1.7em;font-size:14px}.dsp-hero-left{position:relative}.dsp-hero-photo{position:absolute;right:-130px;bottom:-30px;width:330px;max-height:360px;object-fit:cover;z-index:0;opacity:.95}.dsp-hero-left>*:not(.dsp-hero-photo){position:relative;z-index:1}.dsp-stats{display:flex;gap:26px;margin:30px 0}.dsp-stat strong{font-size:15px}.dsp-stat small{display:block;color:#707686;margin-top:4px}.dsp-buttons{display:flex;gap:12px}.dsp-button{padding:13px 23px;border-radius:7px;font-weight:700;font-size:13px;border:1px solid #371486;text-decoration:none}.dsp-primary{background:#4218a3;color:#fff}.dsp-secondary{color:#161d3d;background:#fff}.dsp-quote{position:relative;z-index:2;background:#fff;border:1px solid #eee;border-radius:22px;padding:25px;box-shadow:0 15px 55px #26105a14}.dsp-quote h2{text-align:center;font-size:20px}.dsp-field{display:grid;grid-template-columns:36px 1fr;align-items:center;border:1px solid #ece9f1;border-radius:9px;padding:9px;margin:9px 0;font-size:12px}.dsp-field i{color:#4a18a8}.dsp-field label{font-weight:700;display:block}.dsp-field input,.dsp-field select{width:100%;border:0;outline:0;color:#697080;background:#fff;font-size:12px}.dsp-submit{width:100%;border:0;background:#f05a08;color:#fff;border-radius:8px;padding:14px;font-weight:700}.dsp-features{padding:30px 0}.dsp-title{text-align:center;font-size:25px;font-weight:800}.dsp-feature-grid{display:grid;grid-template-columns:repeat(6,1fr);gap:20px}.dsp-feature{text-align:center;font-size:12px;color:#606778}.dsp-icon{width:48px;height:48px;margin:auto;border-radius:50%;display:grid;place-items:center;background:#f1ebff;color:#4a19a8;font-size:19px}.dsp-experts{padding:24px 0}.dsp-cards{display:grid;grid-template-columns:repeat(5,1fr);gap:16px}.dsp-card{border:1px solid #e9e6ef;border-radius:9px;overflow:hidden;background:#fff}.dsp-photo{height:145px;background:#f2f0f6;display:flex;align-items:end;justify-content:center}.dsp-photo img{width:100%;height:100%;object-fit:cover}.dsp-card-body{padding:14px}.dsp-card-body p{font-size:12px;margin:5px 0}.dsp-hire{display:block;border:1px solid #d8ceef;text-align:center;padding:8px;color:#4218a3;font-size:12px;font-weight:700;text-decoration:none}.dsp-promo{background:linear-gradient(100deg,#2e0d70,#6324c4);color:#fff;padding:25px 0;margin:35px 0;font-size:13px}.dsp-reviews{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}.dsp-review{border:1px solid #e7e4ed;border-radius:8px;padding:22px;min-height:175px}.dsp-review:nth-child(2){background:#5b28bd;color:#fff}.dsp-content{padding:45px 0}.dsp-content-grid{display:grid;grid-template-columns:1fr 1fr;gap:50px}.dsp-content p,.dsp-content li{line-height:1.7em;color:#2f2f2f;font-size:14px}

/* New FAQ Section layout & CSS styling */
.dsp-faq-section {
    padding: 60px 0;
    background: #fdfdfd;
    border-top: 1px solid #f3f1f7;
}
.dsp-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 50px;
    align-items: start;
}
.dsp-faq-left {
    position: sticky;
    top: 20px;
}
.dsp-faq-badge {
    background: #f5efff;
    color: #6e39c8;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.8px;
    padding: 6px 14px;
    border-radius: 20px;
    display: inline-block;
    margin-bottom: 20px;
}
.dsp-faq-heading {
    font-size: 32px !important;
    font-weight: 800 !important;
    color: #101838 !important;
    line-height: 1.2 !important;
    margin: 0 0 16px !important;
    letter-spacing: -0.8px;
}
.dsp-faq-purple {
    color: #6e39c8;
}
.dsp-faq-desc {
    color: #2f2f2f;
    font-size: 14px;
    line-height: 1.7em;
    margin-bottom: 24px;
}
.dsp-faq-contact-btn {
    border: 1px solid #6e39c8;
    color: #6e39c8;
    font-size: 12px;
    font-weight: 700;
    padding: 12px 28px;
    border-radius: 30px;
    text-decoration: none !important;
    display: inline-block;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-faq-contact-btn:hover {
    background: #6e39c8;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(110, 57, 200, 0.25);
    transform: translateY(-1px);
}
.dsp-faq-card {
    background: #fff;
    border: 1px solid #eef0f5;
    border-radius: 12px;
    padding: 18px 20px;
    margin-bottom: 16px;
    box-shadow: 0 4px 12px rgba(38, 16, 90, 0.02);
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-faq-card:hover {
    box-shadow: 0 8px 24px rgba(38, 16, 90, 0.06);
    border-color: #dcdfea;
}
.dsp-faq-card.active {
    border-color: #6e39c8;
    box-shadow: 0 8px 24px rgba(110, 57, 200, 0.05);
}
.dsp-faq-question-wrapper {
    display: flex;
    align-items: center;
    width: 100%;
}
.dsp-faq-icon-box {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: #f5efff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6e39c8;
    font-size: 14px;
    margin-right: 16px;
    flex-shrink: 0;
    transition: all 0.3s ease;
}
.dsp-faq-card:hover .dsp-faq-icon-box {
    background: #6e39c8;
    color: #fff;
}
.dsp-faq-question {
    font-weight: 700;
    color: #101838;
    font-size: 14px;
    flex-grow: 1;
    line-height: 1.7em;
}
.dsp-faq-arrow {
    color: #a0a5b5;
    font-size: 12px;
    margin-left: 12px;
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    flex-shrink: 0;
}
.dsp-faq-card.active .dsp-faq-arrow {
    transform: rotate(180deg);
    color: #6e39c8;
}
.dsp-faq-answer-wrapper {
    overflow: hidden;
}
.dsp-faq-answer-content {
    padding: 16px 0 0 52px;
    color: #2f2f2f;
    font-size: 14px;
    line-height: 1.7em;
}
.dsp-faq-answer-content p {
    margin: 0;
}

/* Micro animations for other sections (hover actions only, UI untouched) */
.dsp-button {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-primary:hover {
    background: #301076;
    border-color: #301076;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(66,24,163,0.25);
}
.dsp-secondary:hover {
    background: #f5f3ff;
    border-color: #371486;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.dsp-stat {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-stat:hover {
    transform: translateY(-3px);
}
.dsp-quote {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-quote:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 65px rgba(38,17,90,0.18);
}
.dsp-feature {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-feature:hover {
    transform: translateY(-5px);
}
.dsp-icon {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-feature:hover .dsp-icon {
    transform: rotate(10deg) scale(1.1);
    background: #e9ddff;
}
.dsp-card {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(38,16,90,0.08);
}
.dsp-hire {
    transition: background 0.3s ease, color 0.3s ease;
}
.dsp-hire:hover {
    background: #4218a3;
    color: #fff !important;
}
.dsp-review {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.dsp-review:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(38,16,90,0.08);
}

@media(max-width:900px){.dsp-grid,.dsp-content-grid{grid-template-columns:1fr}.dsp-hero-photo{display:none}.dsp-feature-grid{grid-template-columns:repeat(2,1fr)}.dsp-cards{grid-template-columns:repeat(2,1fr)}.dsp-reviews{grid-template-columns:1fr}.dsp h1{font-size:37px}.dsp-stats{display:grid;grid-template-columns:1fr 1fr}.dsp-faq-grid{grid-template-columns:1fr;gap:30px}.dsp-faq-left{position:static;text-align:center}.dsp-faq-heading{font-size:26px !important}}

/* Long Content styling & lists */
.dsp-long-content-inner p {
    margin-bottom: 18px;
    font-size: 15px;
    color: #4a5264;
    line-height: 1.8;
}
.dsp-long-content-inner h2, .dsp-long-content-inner h3, .dsp-long-content-inner h4 {
    color: #101838;
    font-weight: 800;
    margin-top: 28px;
    margin-bottom: 14px;
}
.dsp-long-content-inner h2 { font-size: 24px !important; }
.dsp-long-content-inner h3 { font-size: 20px !important; }
.dsp-long-content-inner ul, .dsp-long-content-inner ol {
    margin-left: 20px;
    margin-bottom: 18px;
    padding-left: 10px;
}
.dsp-long-content-inner li {
    margin-bottom: 8px;
    font-size: 15px;
    color: #4a5264;
    line-height: 1.8;
}
.dsp-long-content-fade {
    background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%) !important;
}
.dsp-load-more-btn:hover {
    background: #6e39c8 !important;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(110, 57, 200, 0.25);
    transform: translateY(-1px);
}

.dsp-faq-answer-content-p {
    padding: 0px 0 0 5px;
    /* color: #2f2f2f; */
    font-size: 13px !important;
    /* line-height: 1.7em; */
}
</style>
<style>
/* Reference-image proportions; scoped to avoid legacy theme overrides. */
.dsp-hero{padding:25px 0 24px}.dsp-grid{grid-template-columns:minmax(0,1.15fr) minmax(390px,.85fr);gap:70px;min-height:545px}.dsp-crumb,.dsp-rating{font-size:11px;margin-bottom:20px}.dsp h1{max-width:560px;font-size:44px!important;line-height:1.08!important;letter-spacing:-1.1px}.dsp-copy{max-width:510px;font-size:15px;line-height:1.75}.dsp-hero-photo{right:-105px;bottom:-70px;width:310px;height:330px;max-height:none;object-position:center}.dsp-stats{gap:25px;margin:26px 0}.dsp-stat{min-width:82px}.dsp-stat strong{font-size:13px}.dsp-stat small{font-size:10px;line-height:1.35}.dsp-button{padding:12px 22px;font-size:12px}.dsp-quote{border-radius:20px;padding:18px 20px}.dsp-quote h2{font-size:18px!important;margin:0 0 12px}.dsp-field{grid-template-columns:30px 1fr;height:56px;padding:7px 10px;margin:7px 0;font-size:11px}.dsp-field i{font-style:normal}.dsp-field label{font-size:10px!important;line-height:1.1!important;margin:0 0 2px!important}.dsp-field input,.dsp-field select{height:22px!important;min-height:0!important;padding:0!important;border:0!important;font-size:10px!important;box-shadow:none!important}.dsp-submit{padding:12px;font-size:11px;margin-top:4px}.dsp-features{padding:26px 0;border-top:1px solid #f3f1f7}.dsp-title{font-size:21px!important;line-height:1.25!important;margin:0 0 12px!important}.dsp-feature-grid{gap:26px;margin-top:22px}.dsp-feature{display:grid;grid-template-columns:39px 1fr;align-items:center;column-gap:9px;text-align:left;font-size:10px}.dsp-feature h3{font-size:11px!important;line-height:1.25!important;font-weight:800!important;margin:0!important;color:#111936}.dsp-feature p{grid-column:1/-1;font-size:10px!important;line-height:1.55!important;margin:9px 0 0!important}.dsp-icon{width:39px;height:39px;margin:0;font-size:15px}.dsp-content h2{font-size:22px!important}.dsp-content p,.dsp-content li{font-size:15px;line-height:1.8}.dsp-promo{padding:22px 0;margin:32px 0;font-size:12px}
@media(max-width:900px){.dsp-grid{grid-template-columns:1fr;min-height:0;gap:28px}.dsp h1{font-size:36px!important}.dsp-quote{margin-top:10px}.dsp-feature-grid{gap:18px}}
@media(min-width:901px) and (max-width:1100px){.dsp-wrap{padding:0 35px}.dsp-grid{grid-template-columns:1.1fr 400px;gap:35px}.dsp h1{font-size:37px!important}.dsp-hero-photo{right:-70px;width:250px}.dsp-stats{gap:12px}.dsp-feature-grid{gap:12px}}
</style>
<main class="dsp">
@include('frontend.header.services.sub.partials.dynamic-features-experts')
@include('frontend.header.services.sub.partials.dynamic-slider-controls')
@include('frontend.header.services.sub.partials.dynamic-why-choose')
@include('frontend.header.services.sub.partials.dynamic-final-cta')
<section class="dsp-hero"><div class="dsp-wrap dsp-grid"><div class="dsp-hero-left"><div class="dsp-crumb">Home &nbsp;›&nbsp; Dynamic Page &nbsp;›&nbsp; {{ $page->subject->name }} Assignment Help</div><div class="dsp-rating"><span class="dsp-stars">★★★★★</span> Rated 4.9/5 by 25,000+ UK Students</div><h1>{{ $page->hero_heading }}<br><span class="dsp-orange">{{ $page->hero_highlight }}</span></h1><p class="dsp-copy">{{ $page->hero_content }}</p><img class="dsp-hero-photo" src="{{ asset('public/new-subject-sectionimg/herosubject.png') }}" alt="{{ $page->subject->name }} assignment expert">
<div class="dsp-stats"><div class="dsp-stat"><strong>◉ 25,000+</strong><small>Assignments Delivered</small></div><div class="dsp-stat"><strong>◎ 150+</strong><small>Subject Experts</small></div><div class="dsp-stat"><strong>☆ 4.9/5</strong><small>Student Rating</small></div><div class="dsp-stat"><strong>♡ 98%</strong><small>On-Time Delivery</small></div></div><div class="dsp-buttons"><a class="dsp-button dsp-primary" href="/order-now">Talk To An Expert →</a><a class="dsp-button dsp-secondary" href="/free-samples">View Samples →</a></div></div>
<aside class="dsp-quote"><h2>✨ Get Instant Quote ✨</h2><form><div class="dsp-field"><i>▣</i><div><label>Academic Level</label><select><option>Select Level</option><option>Undergraduate</option><option>Postgraduate</option></select></div></div><div class="dsp-field"><i>▤</i><div><label>Subject</label><input value="{{ $page->subject->name }}"></div></div><div class="dsp-field"><i>▧</i><div><label>Assignment Type</label><select><option>Select Type</option><option>Assignment</option><option>Essay</option><option>Dissertation</option></select></div></div><div class="dsp-field"><i>◷</i><div><label>Deadline</label><input type="date"></div></div><div class="dsp-field"><i>▱</i><div><label>Word Count / Pages</label><select><option>Select Word Count</option><option>1000 words</option><option>2000 words</option></select></div></div><div class="dsp-field"><i>@</i><div><label>Email Address</label><input type="email" placeholder="Enter your email"></div></div><button type="button" class="dsp-submit">Get Price Now →</button></form></aside></div></section>
<section class="dsp-features"><div class="dsp-wrap"><h2 class="dsp-title">Why Students Choose Our {{ $page->subject->name }} Assignment Help?</h2><div class="dsp-feature-grid">@foreach([['♙','Qualified Experts'],['✓','100% Original & Plagiarism Free'],['◷','On-Time Delivery'],['☏','24/7 Support'],['⌖','UK-Based Experts'],['£','Affordable Pricing']] as $feature)<div class="dsp-feature"><div class="dsp-icon">{{ $feature[0] }}</div><h3>{{ $feature[1] }}</h3><p>Professional academic support you can rely on.</p></div>@endforeach</div></div></section>
@if($data['expert']->isNotEmpty())<section class="dsp-experts"><div class="dsp-wrap"><h2 class="dsp-title">Our {{ $page->subject->name }} Assignment Experts</h2><p style="text-align:center;color:#6b7280">Learn from the best. Our experts are here to help you achieve top grades.</p><div class="dsp-cards">@foreach($data['expert']->take(5) as $expert)<article class="dsp-card"><div class="dsp-photo">@if($expert->image)<img src="{{ asset($expert->image) }}" alt="{{ $expert->name }}">@else<span style="font-size:55px">👤</span>@endif</div><div class="dsp-card-body"><strong>{{ $expert->name }}</strong><p>{{ $expert->subject ?: $page->subject->name }} Expert</p><p>★ 4.9 · {{ $expert->finish_order ?: 800 }}+ Orders</p><a class="dsp-hire" href="/writers/{{ $expert->slug }}">Hire Expert</a></div></article>@endforeach</div></div></section>@endif
<section class="dsp-promo"><div class="dsp-wrap"><strong>UP TO 30% OFF ON YOUR FIRST ORDER</strong> &nbsp; · &nbsp; Plagiarism Report &nbsp; · &nbsp; AI Report &nbsp; · &nbsp; Title Page &nbsp; · &nbsp; Bibliography &nbsp; · &nbsp; Unlimited Revisions &nbsp; · &nbsp; 24/7 Support</div></section>
@if($data['reviews']->isNotEmpty())<section><div class="dsp-wrap"><h2 class="dsp-title">What Our Students Say</h2><p style="text-align:center;color:#6b7280">Trusted by thousands of students across the UK and worldwide.</p><div class="dsp-reviews">@foreach($data['reviews']->take(3) as $review)<article class="dsp-review"><p>“{{ $review->description }}”</p><strong>{{ $review->name }}</strong><br><small>{{ $review->location }} · {{ str_repeat('★',(int)($review->customer_rating ?: 5)) }}</small></article>@endforeach</div></div></section>@endif
@if($page->section_two_heading || $page->section_two_content || $page->section_three_heading || $page->section_three_content)
<section class="dsp-content"><div class="dsp-wrap dsp-content-grid">@if($page->section_two_heading || $page->section_two_content)<article><h2>{{ $page->section_two_heading }}</h2>{!! $page->section_two_content !!}</article>@endif @if($page->section_three_heading || $page->section_three_content)<article><h2>{{ $page->section_three_heading }}</h2>{!! $page->section_three_content !!}</article>@endif</div></section>
@endif
@if($data['faqs'])
<section class="dsp-faq-section">
    <div class="dsp-wrap dsp-faq-grid">
        <div class="dsp-faq-left">
            <span class="dsp-faq-badge">FREQUENTLY ASKED QUESTIONS</span>
            <h2 class="dsp-faq-heading">Find Answers To <br><span class="dsp-faq-purple">Common Questions</span></h2>
            <p class="dsp-faq-desc">If you have any other questions, feel free to contact our support team.</p>
            <a href="/contact-us" class="dsp-faq-contact-btn">Contact Us →</a>
        </div>
        <div class="dsp-faq-right">
            @php
                $faqIcons = [
                    'fas fa-star',
                    'fas fa-shopping-cart',
                    'fas fa-sync-alt',
                    'fas fa-bolt',
                    'fas fa-hand-holding-usd'
                ];
            @endphp
            @foreach($data['faqs'] as $index => $faq)
                <div class="dsp-faq-card">
                    <div class="dsp-faq-question-wrapper">
                        <div class="dsp-faq-icon-box">
                            <i class="{{ $faqIcons[$index % count($faqIcons)] }}"></i>
                        </div>
                        <span class="dsp-faq-question">{{ $faq['question'] }}</span>
                        <span class="dsp-faq-arrow"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="dsp-faq-answer-wrapper" style="display: none;">
                        <div class="dsp-faq-answer-content">
                            <p class="dsp-faq-answer-content-p">{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($page->long_content)
<section class="dsp-long-content-section" style="padding: 60px 0; background: #fff; border-top: 1px solid #f3f1f7;">
    <div class="dsp-wrap">
        <div class="dsp-long-content-wrapper" style="position: relative; max-height: 380px; overflow: hidden; transition: max-height 0.5s ease;">
            <div class="dsp-long-content-inner" style="color: #3f4452; font-size: 14px; line-height: 1.75;">
                {!! $page->long_content !!}
            </div>
            <div class="dsp-long-content-fade" style="position: absolute; bottom: 0; left: 0; right: 0; height: 120px; background: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1)); pointer-events: none;"></div>
        </div>
        <div style="text-align: center; margin-top: 24px;">
            <button type="button" class="dsp-load-more-btn" style="border: 1px solid #6e39c8; color: #6e39c8; background: transparent; font-size: 12px; font-weight: 700; padding: 10px 30px; border-radius: 30px; cursor: pointer; transition: all 0.3s ease; outline: none;">Load More</button>
        </div>
    </div>
</section>
@endif
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof jQuery !== 'undefined') {
        $('.dsp-faq-question-wrapper').click(function() {
            var card = $(this).parent('.dsp-faq-card');
            var answer = card.find('.dsp-faq-answer-wrapper');
            var arrow = $(this).find('.dsp-faq-arrow i');
            
            $('.dsp-faq-card').not(card).removeClass('active').find('.dsp-faq-answer-wrapper').slideUp(250);
            $('.dsp-faq-card').not(card).find('.dsp-faq-arrow i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            
            card.toggleClass('active');
            answer.slideToggle(250);
            
            if(card.hasClass('active')) {
                arrow.removeClass('fa-chevron-down').addClass('fa-chevron-up');
            } else {
                arrow.removeClass('fa-chevron-up').addClass('fa-chevron-down');
            }
        });
    } else {
        const questions = document.querySelectorAll('.dsp-faq-question-wrapper');
        questions.forEach(q => {
            q.addEventListener('click', function() {
                const card = this.parentElement;
                const answer = card.querySelector('.dsp-faq-answer-wrapper');
                const arrow = this.querySelector('.dsp-faq-arrow i');
                
                document.querySelectorAll('.dsp-faq-card').forEach(c => {
                    if (c !== card) {
                        c.classList.remove('active');
                        c.querySelector('.dsp-faq-answer-wrapper').style.display = 'none';
                        const a = c.querySelector('.dsp-faq-arrow i');
                        a.className = 'fas fa-chevron-down';
                    }
                });
                
                card.classList.toggle('active');
                if (card.classList.contains('active')) {
                    answer.style.display = 'block';
                    arrow.className = 'fas fa-chevron-up';
                } else {
                    answer.style.display = 'none';
                    arrow.className = 'fas fa-chevron-down';
                }
            });
        });
    }

    // Long Content Load More
    const loadMoreBtn = document.querySelector('.dsp-load-more-btn');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const wrapper = document.querySelector('.dsp-long-content-wrapper');
            const fade = document.querySelector('.dsp-long-content-fade');
            if (wrapper.style.maxHeight !== 'none') {
                wrapper.style.maxHeight = 'none';
                fade.style.display = 'none';
                this.textContent = 'Read Less';
            } else {
                wrapper.style.maxHeight = '380px';
                fade.style.display = 'block';
                this.textContent = 'Load More';
                wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    }
});
</script>
@endsection
