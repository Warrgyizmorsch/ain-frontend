<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicServicePageController;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\HomeController;
use App\Models\Add;
use App\Models\Blog;
use App\Models\User;
use App\Models\Sample;
use App\Models\FeedbackOrder;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\FaqUrlController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Experts;
use App\Models\Review;
use App\Models\WhatsappMessage;
use App\Events\MessageSent;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Services\SchemaService;
use App\Http\Controllers\UkAssignmentController;
use Illuminate\Support\Facades\DB;

Route::post('/takeover-confirm', [AuthenticatedSessionController::class, 'doTakeover'])->name('do-takeover');

Route::get('/new-home', function () {
    return view('components.common-section.new-home-page');
});

Route::get('/load-more-blogs', [BlogController::class, 'loadMore']);
Route::post('/contact-us/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/click2call', function () {
    return view('api.clic2call');
});
Route::get('/test-broadcast', function () {


    $msg = WhatsappMessage::create([
        'name' => 'yash',
        'phone' => '919664100138',
        'message' => 'Test Real-time Broadcast',
        'direction' => 'inbound',
        'wa_message_id' => '!dsfsdfklsdhflsjkdhf9876',
    ]);

    event(new MessageSent($msg));
    return 'Broadcast triggered';
});



Route::post('/sendsms', [ChatController::class, 'send'])->name('send-whatsapp');
Route::get('/chat/{phone?}', [ChatController::class, 'showChat'])->name('chat');
Route::post('/writer-login', [UserController::class, 'Login']);
Route::post('/neworder-fromhome', [LeadsController::class, 'FrontEndLeads'])->name('neworder.create');
Route::post('/placeNewOrder', [LeadsController::class, 'FrontEndLeadsNew']);
Route::get('/get-files-by-order', [LeadsController::class, 'findfiles'])->name('get-files-by-order');
Route::get('thank-you', [HomeController::class, 'thankyou'])->name('thank-you');


// Pillar Pages
Route::get('/academic-integrity', [HomeController::class, 'pillar'])->name('pillar.academic-integrity');
Route::get('/referencing-citation-guide', [HomeController::class, 'pillar'])->name('pillar.referencing-citation-guide');
Route::get('/uk-university-grading-system', [HomeController::class, 'pillar'])->name('pillar.uk-university-grading-system');
Route::get('/critical-thinking-guide', [HomeController::class, 'pillar'])->name('pillar.critical-thinking-guide');
Route::get('/academic-research-strategies', [HomeController::class, 'pillar'])->name('pillar.academic-research-strategies');
Route::get('/student-productivity-guide', [HomeController::class, 'pillar'])->name('pillar.student-productivity-guide');
Route::get('/academic-english-writing', [HomeController::class, 'pillar'])->name('pillar.academic-english-writing');
Route::get('/academic-stress-management', [HomeController::class, 'pillar'])->name('pillar.academic-stress-management');
Route::get('/assignment-feedback-guide', [HomeController::class, 'pillar'])->name('pillar.assignment-feedback-guide');
Route::get('/effective-study-environment', [HomeController::class, 'pillar'])->name('pillar.effective-study-environment');

Route::get('/wallet', [WalletController::class, 'show'])->name('wallet.show');
Route::post('/wallet/verify', [WalletController::class, 'verify'])->name('wallet.verify');
Route::prefix('admin/wallet')->group(function () {
    Route::get('/bulk-credit', [WalletController::class, 'showAdminCreditForm'])
        ->name('admin.wallet.bulk-credit.form');

    Route::post('/bulk-credit', [WalletController::class, 'adminBulkCredit'])
        ->name('admin.wallet.bulk-credit.store');
});


Route::get('/', function () {

    $cached = Cache::remember('home_meta_data', 60, function () {
        $meta = config('dataload.home.meta');
        $priceRanges = config('dataload.home.price_ranges');
        $faqs = config('dataload.home.faqs');
        $videoConfig = config('dataload.home.video');
        $schemaService = new SchemaService();

        return [
            'title' => $meta['title'] ?? '',
            'description' => $meta['description'] ?? '',
            'canonical' => $meta['canonical'] ?? '',
            'keyword' => $meta['keyword'] ?? '',
            'website' => $schemaService->generateWebsiteSchema(),
            'org' => $schemaService->generateOrganizationSchema(),
            'schema' => $schemaService->generateSchema(
                $meta['title'],
                $meta['description'],
                $meta['canonical'],
                $priceRanges
            ),
            'Faqschema' => $schemaService->generateFaqSchema($faqs),
            'videoSchema' => $schemaService->reviewSchemaVideo($videoConfig),
        ];
    });
    $customContents = [
        'short-but-impactful-choosing-and-delivering-the-perfect-2-minute-speech-topics' => "Discover how to choose a compelling 2-minute speech topic and deliver it with confidence. This blog shares practical tips to structure your ideas clearly, engage your audience instantly, and leave a strong impression-perfect for academic presentations and class assessments.",
        'best-sports-speech-topics-for-students-professionals' => "Looking for the perfect sports speech topic? This blog covers trending, motivational, and academically friendly ideas to help students and professionals create powerful presentations with ease.",
        'math-dissertation-and-thesis-topics-ideas-for-students' => "Choosing the right topic is the foundation of a successful maths dissertation or thesis. This blog explores well-researched, trending, and practical mathematics topic ideas to help students build strong, high-scoring academic work with confidence.",
        'top-research-topics-idea-for-students-compelling-history-research-paper' => "Explore engaging and well-structured history research paper ideas that help students choose compelling topics with confidence. This blog highlights unique, relevant, and academically strong research themes to make history assignments more impactful and easier to approach.",
    ];
    $data['blog'] = Blog::query()
        ->where('type', 'blog')
        ->whereIn('slug', array_keys($customContents))
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($post) use ($customContents) {
            $post->custom_content = $customContents[$post->slug] ?? '';
            return $post;
        });
    $headingMap = [
        'a-review-of-mental-health-policies-in-the-nhs-a-uk-perspective' => 'Review of Mental Health Policies in the NHS (UK)',
        'exploring-british-identity-in-post-brexit-literature' => 'British Identity in Post-Brexit Literature',
        'marketing-strategy-analysis-of-tesco-plc-in-the-uk-retail-sector' => 'Tesco Marketing Strategy in UK Retail',
    ];
    $data["sample"] = Sample::with('categotyData', 'type')
        ->whereIn('slug', array_keys($headingMap))
        ->get()
        ->map(function ($item) use ($headingMap) {
            $item->custom_heading = $headingMap[$item->slug] ?? Str::title(str_replace('-', ' ', $item->slug));
            return $item;
        });
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    $data = array_merge($cached, $data);

    return view('home.index', compact('data'));
});

// Route::get('/', function () {
//    return redirect('/login');
// });


Route::get(
    '/Offers',
    function () {
        $data['title'] = 'Offers - Assignment In Need';
        $data['description'] = '';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/Offers';
        return view('frontend.offers', compact('data'));
    }
);

Route::get(
    '/PrivacyPolicy',
    function () {
        $data['title'] = 'Privacy Policy | Assignment In Need | Secure UK Student Data';
        $data['description'] = 'Read the official Privacy Policy of Assignment In Need. We ensure 100% confidentiality and UK GDPR compliance. Your academic data and identity are always protected.';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/PrivacyPolicy';
        return view('Policy.PrivacyPolicy', compact('data'));
    }
);
Route::get(
    '/Terms-Conditions',
    function () {
        $data['title'] = 'Terms and Conditions | Assignment In Need | Official Service Terms';
        $data['description'] = 'View the official Terms and Conditions for Assignment In Need. Understand your rights, our service obligations, and the legal framework for our UK academic assistance.';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/Terms-Conditions';
        return view('Policy.Terms&Conditions', compact('data'));
    }
);
Route::get(
    '/RefundPolicy',
    function () {
        $data['title'] = 'Refund Policy | Assignment In Need | Our Money-Back Guarantee';
        $data['description'] = 'Transparent and fair Refund Policy for UK students. Learn about our money-back guarantee, eligibility criteria, and how we protect your payments at Assignment In Need.';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/RefundPolicy';
        return view('Policy.RefundPolicy', compact('data'));
    }
);
Route::get(
    '/GuaranteedPolicy',
    function () {
        $data['title'] = 'Guaranteed Policy | Assignment In Need | Quality & Success Assured';
        $data['description'] = 'Discover our service guarantees. From plagiarism-free reports to timely delivery, learn how Assignment In Need guarantees high-quality results for every UK student.';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/GuaranteedPolicy';
        return view('Policy.GuaranteedPolicy', compact('data'));
    }
);
Route::get(
    '/CancellationPolicy',
    function () {
        $data['title'] = 'Cancellation Policy | Assignment In Need | Order Update Rules';
        $data['description'] = 'Need to cancel an order? Read the Assignment In Need Cancellation Policy to understand timelines, refund eligibility, and how to manage your UK assignment requests.';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/CancellationPolicy';
        return view('Policy.CancellationPolicy', compact('data'));
    }
);

Route::get('/MyOrders', [OrderController::class, 'myOrder'])->middleware(['auth'])->name('MyOrders');

// header pages
// Route::get('/about', function () {
//     $data = [
//         'title' => '',
//         'description' => '',
//         'keyword' => '',
//         'canonical' => '',
//     ];
//     return view('frontend/header/company/about', compact('data'));

// });
// Route::get('/what-we-are', function () {
//     $data = [
//         'title' => 'About Assignment in Need | Your Assignment Help Uk Partner',
//         'description' => 'Learn about our Services writers, why choose us, and why Assignment In Need is trusted for quality assignment help  services for UK students, plagiarism-free and AI-free assignment help',
//         'keyword' => '',
//         'canonical' => 'https://www.assignnmentinneed.com/what-we-are',
//     ];
// 
//     $data['expert'] = Experts::distinct('service', 'subject') // Avoid repeated subjects
//         ->take(10) // Limit to 10 experts
//         ->get();
// 
//     return view('frontend.header.company.what-we-are', compact('data'));
// });

Route::get('/what-we-are', function () {
    $data = [
        'title' => 'About Assignment in Need | Your Assignment Help Uk Partner',
        'description' => 'Learn about our Services writers, why choose us, and why Assignment In Need is trusted for quality assignment help  services for UK students, plagiarism-free and AI-free assignment help',
        'keyword' => '',
        'canonical' => 'https://www.assignnmentinneed.com/what-we-are',
    ];

    $data['expert'] = Experts::distinct('service', 'subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();

    return view('frontend.header.company.aboutusnew', compact('data'));
});

// Route::get('/aboutusnew', function () {
//     $data = [
//         'title' => 'About Us - New Demo',
//         'description' => 'Demo About Us Page',
//         'keyword' => '',
//         'canonical' => 'https://www.assignnmentinneed.com/aboutusnew',
//     ];
//     return view('frontend.header.company.aboutusnew', compact('data'));
// });

Route::get('free-samples', function () {
    $data = [
        'title' => 'Sample New Demo',
        'description' => 'Demo Sample Page',
        'keyword' => '',
        'canonical' => 'https://www.assignnmentinneed.com/free-samples',
    ];
    return view('frontend.header.company.samplenew', compact('data'));
})->name('free-samples');

// Route::get('/samplenew', function () {
//     $data = [
//         'title' => 'Sample New Demo',
//         'description' => 'Demo Sample Page',
//         'keyword' => '',
//         'canonical' => 'https://www.assignnmentinneed.com/samplenew',
//     ];
//     return view('frontend.header.company.samplenew', compact('data'));
// });

Route::get('/pricing', function () {
    $data = [
        'title' => 'Pricing New Demo',
        'description' => 'Demo Pricing Page',
        'keyword' => '',
        'canonical' => 'https://www.assignnmentinneed.com/pricing',
    ];
    return view('frontend.header.company.pricingnew', compact('data'));
})->name('pricing');

// Route::get('/pricingnew', function () {
//     $data = [
//         'title' => 'Pricing New Demo',
//         'description' => 'Demo Pricing Page',
//         'keyword' => '',
//         'canonical' => 'https://www.assignnmentinneed.com/pricingnew',
//     ];
//     return view('frontend.header.company.pricingnew', compact('data'));
// });


Route::get('/assignment-help-expert-uk', function () {
    return redirect()->to('https://www.assignnmentinneed.com/what-we-are', 301);
});


Route::get('/why-choose-us', function () {
    $data = config('dataload.why-choose-us.meta');
    $schemaService = new SchemaService();
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.why-choose-us.faqs'));
    return view('frontend.header.company.why-choose-us', compact('data'));
});

route::get('/benefits-of-assignments', function () {
    $data = config('dataload.benefits-of-assignments.meta');
    $schemaService = new SchemaService();
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.benefits-of-assignments.faqs'));
    $data['expert'] = Experts::distinct('service', 'subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.company.benefits', compact('data'));
});

Route::get('/assignment-writing-help-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.assignment-writing-help-services.meta');
    $priceRanges = config('dataload.assignment-writing-help-services.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.assignment-writing-help-services.faqs'));
    $data['expert'] = Experts::where('service', 'Assignment')
        ->distinct('subject')
        ->take(10)
        ->get();
    return view('frontend.header.services.assignment-writing', compact('data'));
});

route::redirect('assignment-writing-uk', 'assignment-writing-help-services', 301);

Route::get('/chemistry-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.chemistry-assignment-writing-help.meta');
    $priceRanges = config('dataload.chemistry-assignment-writing-help.price_ranges');
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.chemistry-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get();
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['expert'] = Experts::
        where('subject', 'chemistry')
        ->distinct('service')
        ->take(10)
        ->get();
    return view('frontend.header.services.sub.chemistry', compact('data'));
});

Route::get('/math-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.math-assignment-help.meta');
    $priceRanges = config('dataload.math-assignment-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.math-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'math')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();

    return view('frontend.header.services.sub.math', compact('data'));
});
//04//12/24 made new page of Calculus Assignment Help
Route::get('/calculus-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.calculus-assignment-help.meta');
    $priceRanges = config('dataload.calculus-assignment-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.calculus-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'math')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.calculus-assignment-help', compact('data'));
});

//05/12/24 made new page of Geometry Assignment Help
Route::get('/geometry-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.geometry-assignment-help.meta');
    $priceRanges = config('dataload.geometry-assignment-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.geometry-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'math')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.geometry-assignment-help', compact('data'));
});
//05/12/24 made new page of Trigonometry Assignment Help
Route::get('/trigonometry-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.trigonometry-assignment-help.meta');
    $priceRanges = config('dataload.trigonometry-assignment-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.trigonometry-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'math')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.trigonometry-assignment-help', compact('data'));
});

//05/12/24 made new page of Linear Algebra Assignment Help
Route::get('/linear-algebra-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.linear-algebra-assignment-help.meta');
    $priceRanges = config('dataload.linear-algebra-assignment-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.linear-algebra-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'math')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.linear-algebra-assignment-help', compact('data'));
});

//05/12/24/ made new page of Probability Assignment Help
Route::get('/probability-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.probability-assignment-help.meta');
    $priceRanges = config('dataload.probability-assignment-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.probability-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'math')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.probability-assignment-help', compact('data'));
});
//04//12/24 made new page of Algebra Assignment Help
Route::get('/algebra-assigment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.algebra-assigment-help.meta');
    $priceRanges = config('dataload.algebra-assigment-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.algebra-assigment-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'Math')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();

    return view('frontend.header.services.sub.algebra-assigment-help', compact('data'));

});

Route::get('/economic-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.economic-assignment-writing-help.meta');
    $priceRanges = config('dataload.economic-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.economic-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'economic')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.eco', compact('data'));
});

Route::get('/english-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.english-assignment-writing-help.meta');
    $priceRanges = config('dataload.english-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.english-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'english')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.english', compact('data'));
});

Route::get('/history-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.history-assignment-writing-help.meta');
    $priceRanges = config('dataload.history-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.history-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'history')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.history', compact('data'));
});

Route::get('/geography-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.geography-assignment-writing-help.meta');
    $priceRanges = config('dataload.geography-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.geography-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();

    $data['expert'] = Experts::
        where('subject', 'geography')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    //  echo'<pre>'; print_r( $data['expert']); exit;
    return view('frontend.header.services.sub.geography', compact('data'));
});

Route::get('/law-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.law-assignment-writing-help.meta');
    $priceRanges = config('dataload.law-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.law-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'law')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.law', compact('data'));
});

Route::get('/linguistic-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.linguistic-assignment-writing-help.meta');
    $priceRanges = config('dataload.linguistic-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.linguistic-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'linguistic')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.linguistic', compact('data'));
});

Route::get('/physics-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.physics-assignment-writing-help.meta');
    $priceRanges = config('dataload.physics-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.physics-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::where('subject', 'physics')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.physics', compact('data'));
});

Route::get('/sociology-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.sociology-assignment-writing-help.meta');
    $priceRanges = config('dataload.sociology-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.sociology-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::where('subject', 'sociology')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.sociology', compact('data'));
});

// 29-aug-24 update for new pages
// nursing page
Route::get('/nursing-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.nursing-assignment-writing-help.meta');
    $priceRanges = config('dataload.nursing-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.nursing-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'nursing')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.nursing', compact('data'));
});
// philosophy page
Route::get('/philosophy-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.philosophy-assignment-writing-help.meta');
    $priceRanges = config('dataload.philosophy-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.philosophy-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'philosophy')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.philosophy', compact('data'));

});

// statistics page
Route::get('/statistics-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.statistics-assignment-writing-help.meta');
    $priceRanges = config('dataload.statistics-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.statistics-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'statistics')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.statistics', compact('data'));
});
// accounting page
Route::get('/accounting-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.accounting-assignment-writing-help.meta');
    $priceRanges = config('dataload.accounting-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.accounting-assignment-writing-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'account')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(3) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.accounting', compact('data'));
});

// marketing page
Route::get('/marketing-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.marketing-assignment-writing-help.meta');
    $priceRanges = config('dataload.marketing-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.marketing-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'marketing')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.marketing', compact('data'));
});
// cscience page
Route::get('/computer-science-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.computer-science-assignment-writing-help.meta');
    $priceRanges = config('dataload.computer-science-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.computer-science-assignment-writing-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Computer Science')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.cscience', compact('data'));
});

// finance page

Route::get('/finance-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.finance-assignment-writing-help.meta');
    $priceRanges = config('dataload.finance-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.finance-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'Finance')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.finance', compact('data'));
});
// programming page
Route::get('/programming-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.programming-assignment-writing-help.meta');
    $priceRanges = config('dataload.programming-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.programming-assignment-writing-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Programming')
        ->distinct('service') // Avoid repeated subjects
        ->take(5) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(3) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.programming', compact('data'));
});

Route::get('/management-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.management-assignment-writing-help.meta');
    $priceRanges = config('dataload.management-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.management-assignment-writing-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Management')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.management-assignment-writing-help', compact('data'));
});

// 28//11/24 made new page of Business Assignment Writing Help in subject by navneet
Route::get('/business-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.business-assignment-writing-help.meta');
    $priceRanges = config('dataload.business-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.business-assignment-writing-help.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::
        where('subject', 'Business')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.business-assignment-writing-help', compact('data'));
});


// Route::get('/engineering-assignment-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload.engineering-assignment-writing-help.meta');
//     $priceRanges = config('dataload.engineering-assignment-writing-help.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.engineering-assignment-writing-help.faqs'));
//     $data["sample"] = Sample::with('categotyData')
//         ->orderBy('created_at', 'desc') // Order by the most recent records
//         ->take(2) // Limit the results to 2 records
//         ->get();
//     $data['expert'] = Experts::
//         where('subject', 'Engineering')
//         ->distinct('service') // Avoid repeated subjects
//         ->take(10) // Limit to 10 experts
//         ->get();
//     return view('frontend.header.services.sub.engineering-assignment-writing-help', compact('data'));
// });

Route::get('/engineering-assignment-writing-help', [DynamicServicePageController::class, 'show']);

// Demo route for renovated subject page
// Route::get('/new-subjectpage', function () {
//     $schemaService = new SchemaService();
//     // Using engineering meta as demo data
//     $data = config('dataload.engineering-assignment-writing-help.meta');
//     $priceRanges = config('dataload.engineering-assignment-writing-help.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.engineering-assignment-writing-help.faqs'));
//     $data["sample"] = Sample::with('categotyData')
//         ->orderBy('created_at', 'desc')
//         ->take(2)
//         ->get();
//     $data['expert'] = Experts::
//         where('subject', 'Engineering')
//         ->distinct('service')
//         ->take(10)
//         ->get();
//     return view('frontend.header.services.sub.nik-new-subject', compact('data'));
// });

// cheap page
Route::get('/cheap-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.cheap-assignment-writing-help.meta');
    $priceRanges = config('dataload.cheap-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.cheap-assignment-writing-help.faqs'));
    $data['expert'] = Experts::where('service', 'Assignment')
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.cheap', compact('data'));
});

// 31-aug-24 made new page  helpwith by navneet, live on-05-sept-24
Route::get('/help-with-assignment-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.help-with-assignment-online.meta');
    $priceRanges = config('dataload.help-with-assignment-online.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.help-with-assignment-online.faqs'));
    $data['expert'] = Experts::where('service', 'assignment')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.help-with-assignment-online', compact('data'));
});
// 29-aug-24 update for new pages
// 17-sep-24 update for new pages start
Route::get('/expert-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.expert-assignment-writing-help.meta');
    $priceRanges = config('dataload.expert-assignment-writing-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.expert-assignment-writing-help.faqs'));
    $data['expert'] = Experts::where('service', 'assignment')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.expert-assignment-writing-help', compact('data'));
});

Route::get('/assignment-helper', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.assignment-helper.meta');
    $priceRanges = config('dataload.assignment-helper.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.assignment-helper.faqs'));
    $data['expert'] = Experts::where('service', 'assignment')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.assignment-helper-writing-help', compact('data'));
});


Route::get('/pay-for-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.pay-for-assignment-help.meta');
    $priceRanges = config('dataload.pay-for-assignment-help.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.pay-for-assignment-help.faqs'));
    $data['expert'] = Experts::where('service', 'assignment')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.pay-for-assignment-help', compact('data'));
});

// 17-sep-24 update for new pages end
Route::get('/best-online-assignment-writing-service', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.best-online-assignment-writing-service.meta');
    $priceRanges = config('dataload.best-online-assignment-writing-service.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.best-online-assignment-writing-service.faqs'));
    $data['expert'] = Experts::where('service', 'assignment')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.best-online-assignment-writing-service', compact('data'));
});

///25-10-24 made new page of Do my Assignment for me by navneet
Route::get('/do-my-assignment-for-me', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.do-my-assignment-for-me.meta');
    $priceRanges = config('dataload.do-my-assignment-for-me.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.do-my-assignment-for-me.faqs'));
    $data['expert'] = Experts::where('service', 'assignment')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.do-my-assignment-for-me', compact('data'));
});

/// 25-10--24 made new page of Academic Assignment Writing Help Service by navneet
Route::get('academic-assignment-writing-help-service', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.academic-assignment-writing-help-service.meta');
    $priceRanges = config('dataload.academic-assignment-writing-help-service.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.academic-assignment-writing-help-service.faqs'));
    $data['expert'] = Experts::where('service', 'assignment')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.academic-assignment-writing-help-service', compact('data'));
});

/// 25-10-25 made new page of Top Assignment Writing Help Service by navneet
Route::get('top-assignment-writing-help-service', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.top-assignment-writing-help-service.meta');
    $priceRanges = config('dataload.top-assignment-writing-help-service.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.top-assignment-writing-help-service.faqs'));
    $data['expert'] = Experts::where('service', 'assignment')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.top-assignment-writing-help-service', compact('data'));

});


Route::get('/dissertation-writing-help-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.dissertation-writing-services.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.dissertation-writing-services.faqs'));
    $data['expert'] = Experts::where('service', 'dissertation')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.dissertation-writing-services', compact('data'));
});

route::redirect('dissertation-writing-services-uk', 'dissertation-writing-help-services', 301);


Route::get('/essay-writing-help-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.essay-writing-help-services.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.essay-writing-help-services.faqs'));
    $data['expert'] = Experts::where('service', 'essay')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->get()->take(3);
    return view('frontend.header.services.essay-writing-help', compact('data'));
});
route::redirect('essay-writing-help-uk', 'essay-writing-help-services', 301);


Route::get('/research-paper-writing-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.research-paper-writing-services.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.research-paper-writing-services.faqs'));

    $data['expert'] = Experts::where('service', 'research paper')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.research-paper-writing', compact('data'));
});

route::redirect('research-paper-writing-uk', 'research-paper-writing-services', 301);



Route::get('/homework-writing-help-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.homework-writing-help-services.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.homework-writing-help-services.faqs'));
    $data['expert'] = Experts::where('service', 'homework')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    // Return the view with the data
    return view('frontend.header.services.homework-writing-help', compact('data'));
});


route::redirect('homework-writing-help-uk', 'homework-writing-help-services', 301);


Route::get('/thesis-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.thesis-writing-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.thesis-writing-help.faqs'));
    $data['expert'] = Experts::where('service', 'Thesis')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.thesis-writing-help', compact('data'));
});

//28/11/24 made new page of Summary writing help in subject by navneet
Route::get('/summary-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.summary-writing-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.summary-writing-help.faqs'));
    $data['expert'] = Experts::
        where('service', 'Summary')
        ->where('subject', '!=', 'NULL')

        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();

    return view('frontend.header.services.sub.summary-writing-help', compact('data'));
});
//28/11/24 made new page of Term writing help in subject by navneet
Route::get('/term-paper-writing-help', function () {

    $schemaService = new SchemaService();
    $data = config('dataload.term-paper-writing-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.term-paper-writing-help.faqs'));
    $data['expert'] = Experts::
        where('service', 'Term Paper')
        ->where('subject', '!=', 'NULL')

        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.term-paper-writing-help', compact('data'));

});

//29/11/24 made new page of Personal Statement writing help in subject by dheeraj
Route::get('/personal-statement-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.personal-statement-writing-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.personal-statement-writing-help.faqs'));
    $data['expert'] = Experts::where('service', 'Assignment')

        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.personal-statement-writing-help', compact('data'));
});


//29/11/24 made new page of Personal Statement writing help in subject by dheeraj
Route::get('/university-assignment-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.university-assignment-writing-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.university-assignment-writing-help.faqs'));
    $data['expert'] = Experts::where('service', 'Assignment')

        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.university-assignment-writing-help', compact('data'));
});
Route::get('/my-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.my-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.my-assignment-help.faqs'));
    $data['expert'] = Experts::where('service', 'Assignment')

        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.my-assignment-help', compact('data'));
});

// 27-11-2024 for instant assignment Help page
Route::get('/instant-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.instant-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.instant-assignment-help.faqs'));

    $data['expert'] = Experts::where('service', 'Assignment')

        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.instant-assignment-help', compact('data'));
});


//06/12/24 made new page Organic Chemistry Assignment Help
Route::get('/organic-chemistry-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.organic-chemistry-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.organic-chemistry-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'chemistry')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.organic-chemistry-assignment-help', compact('data'));

});

//06/12/24 made new page biochemistry-assignment-help
Route::get('/biochemistry-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.biochemistry-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.biochemistry-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'chemistry')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.biochemistry-assignment-help', compact('data'));

});


//06/12/24 made new page Microeconomics Assignment Help
Route::get('/microeconomics-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.microeconomics-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.microeconomics-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Economics')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.microeconomics-assignment-help', compact('data'));

});

//06/12/24 made new page Macroeconomics Assignment Help
Route::get('/macroeconomics-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.macroeconomics-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.macroeconomics-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Economics')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.macroeconomics-assignment-help', compact('data'));

});

//07/12/24 made new page econometrics assignment help
Route::get('/econometrics-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.econometrics-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.econometrics-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Economics')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.econometrics-assignment-help', compact('data'));
});

//07/12/24 made new page physical geography help
Route::get('/physical-geography-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.physical-geography-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.physical-geography-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Geography')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.physical-geography-help', compact('data'));
});


//07/12/24 made new page Criminal Law Assignment Help
Route::get('/criminal-law-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.criminal-law-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.criminal-law-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Law')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.criminal-law-assignment-help', compact('data'));
});

//07/12/24 made new page Civil Law Assignment Help
Route::get('/civil-law-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.civil-law-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.civil-law-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Law')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.civil-law-assignment-help', compact('data'));
});

//07/12/24 made new page Corporate Law Assignment Help
Route::get('/corporate-law-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.corporate-law-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.corporate-law-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Law')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.corporate-law-assignment-help', compact('data'));
});


//16/12/24 made new page taxation law assignment help
Route::get('/taxation-law-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.taxation-law-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.taxation-law-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Law')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.taxation-law-assignment-help', compact('data'));
});

//16/12/24 made new page constitutional law assignment help
Route::get('/constitutional-law-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.constitutional-law-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.constitutional-law-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Law')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.constitutional-law-assignment-help', compact('data'));
});

//16/12/24 made new page International Law Assignment Help
Route::get('/international-law-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.international-law-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.international-law-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Law')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.international-law-assignment-help', compact('data'));
});

//16/12/24 made new page administrative law assignment help
Route::get('/administrative-law-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.administrative-law-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.administrative-law-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Law')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.administrative-law-assignment-help', compact('data'));
});

//16/12/24 made new page pharmacology assignment help
Route::get('/pharmacology-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.pharmacology-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.pharmacology-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Nusrsing')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    // dd($data['expert']);

    return view('frontend.header.services.sub.pharmacology-assignment-help', compact('data'));
});


//17/12/24 made new page thermodynamics assignment help
Route::get('/thermodynamics-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.thermodynamics-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.thermodynamics-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'Physics')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.thermodynamics-assignment-help', compact('data'));
});

//17/12/24 made new page fluid mechanics assignment help
Route::get('/fluid-mechanics-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.fluid-mechanics-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.fluid-mechanics-assignment-help.faqs'));

    $data['expert'] = Experts::
        where('subject', 'physics')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.fluid-mechanics-assignment-help', compact('data'));
});

//17/12/24 made new page Ethics Assignment Help
Route::get('/ethics-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.ethics-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.ethics-assignment-help.faqs'));

    $data['expert'] = Experts::
        where('subject', 'philosophy')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.ethics-assignment-help', compact('data'));
});

//17/12/24 made new page Political Philosophy Assignment Help
Route::Get('/political-philosophy-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.political-philosophy-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.political-philosophy-assignment-help.faqs'));

    $data['expert'] = Experts::
        where('subject', 'philosophy')

        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.sub.political-philosophy-assignment-help', compact('data'));
});

//17/12/24 made new page logic homework help
Route::Get('/logic-homework-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.logic-homework-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.logic-homework-help.faqs'));

    $data['expert'] = Experts::
        where('subject', 'philosophy')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.logic-homework-help', compact('data'));
});

//17/12/24 made new page financial accounting assignment help
Route::get('/financial-accounting-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.financial-accounting-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.financial-accounting-assignment-help.faqs'));

    $data['expert'] = Experts::
        where('subject', 'accounting')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.financial-accounting-assignment-help', compact('data'));
});

//17/12/24 made new page managerial accounting assignment help
Route::get('/managerial-accounting-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.managerial-accounting-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.managerial-accounting-assignment-help.faqs'));

    $data['expert'] = Experts::
        where('subject', 'accounting')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.managerial-accounting-assignment-help', compact('data'));
});




// 27-11-2024 for coursework writing Help page
Route::get('/coursework-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.coursework-writing-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.coursework-writing-help.faqs'));

    $data['expert'] = Experts::where('service', 'coursework')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->distinct('subject') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    return view('frontend.header.services.coursework-writing-help', compact('data'));
});

route::get('/cost-accounting-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.cost-accounting-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.cost-accounting-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'accounting')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.cost-accounting-assignment', compact('data'));
});

route::get('/tax-accounting-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.tax-accounting-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.tax-accounting-assignment-help.faqs'));
    $data['expert'] = Experts::
        where('subject', 'accounting')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.tax-accounting-assignment-help', compact('data'));
});

route::get('/auditing-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.auditing-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.auditing-assignment-help.faqs'));

    $data['expert'] = Experts::
        where('subject', 'accounting')
        ->distinct('service') // Avoid repeated subjects
        ->take(10) // Limit to 10 experts
        ->get();
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    return view('frontend.header.services.sub.auditing-assignment-help', compact('data'));
});
route::get('/digital-marketing-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.digital-marketing-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.digital-marketing-assignment-help.faqs'));

    $data['expert'] = Experts::
        where('service', 'Dissertation')
        ->get();

    return view('frontend.header.services.sub.digital-marketing-assignment-help', compact('data'));
});

route::get('/consumer-behavior-assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.consumer-behavior-assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.consumer-behavior-assignment-help.faqs'));


    $data['expert'] = Experts::
        where('service', 'Dissertation')
        ->get();

    return view('frontend.header.services.sub.consumer-behavior-assignment-help', compact('data'));
});


Route::get('uk/birmingham/assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.uk/birmingham/assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.uk/birmingham/assignment-help.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::where('location', 'birmingham')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->where('service', '!=', 'NULL')
        ->distinct('subject') // Avoid repeated subjects
        ->distinct('service')

        ->get();
    return view('frontend.header.country.birmingham', compact('data'));
});


Route::redirect('assignment-help-in-birmingham', 'uk/birmingham/assignment-help', 301);



Route::get('/uk/manchester/assignment-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/manchester/assignment-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.uk/birmingham/assignment-help.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::where('location', 'manchester')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->where('service', '!=', 'NULL')
        ->distinct('subject') // Avoid repeated subjects
        ->distinct('service')

        ->get();
    return view('frontend.header.country.manchester', compact('data'));
});


Route::redirect('best-assignment-writing-help-in-manchester', 'uk/manchester/assignment-help', 301);

route::get('/uk/london', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/london.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/london.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::where('location', 'london')
        ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
        ->where('service', '!=', 'NULL')
        ->distinct('subject') // Avoid repeated subjects
        ->distinct('service')

        ->get();
    return view('frontend.header.country.london', compact('data'));
});


//  uk page
// route::get('/uk', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//       $data['expert'] = Experts::where('location', 'uk')
//         ->where('subject' , '!=' , 'NULL') // Exclude rows where 'subject' is NULL
//         ->where('service' , '!=' , 'NULL')
//         ->distinct('subject') // Avoid repeated subjects
//         ->distinct('service')

//         ->get()->take(10);
//     return view('frontend.header.country.uk', compact('data'));
// });


//05/11/24 new page in uk country homework help service
// route::get('/uk/homework-help-service', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/homework-help-service.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/homework-help-service.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//      $data['expert'] = Experts::where('location', 'uk')
//         ->where('subject' , '!=' , 'NULL') // Exclude rows where 'subject' is NULL
//         ->where('service' , '!=' , 'Homework')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.homework-help-service', compact('data'));
// });

/// 06/11/24 new page in uk country reseach paper writing help
// route::get('/uk/reseach-paper-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/reseach-paper-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/reseach-paper-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//          $data['expert'] = Experts::
//        where('location' ,  'UK')
//         ->where('service' ,  'Research Paper')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.reseach-paper-writing-help', compact('data'));

// });

// 06/11/24 new page in uk country essay writing help
// route::get('/uk/essay-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/essay-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/essay-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::

//       where('location' ,  'UK')
//         ->where('service' , 'Essay')
//         ->distinct('subject') // Avoid repeated subjects
//         ->get();
//     return view('frontend.header.country.uk.essay-writing-help', compact('data'));
// });

// 07/11/24 new page in uk country university assignment writing help
// route::get('/uk/university-assignment-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/essay-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/essay-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//      $data['expert'] = Experts::
//          where('location' ,  'UK')
//         ->where('service' , 'University')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.university-assignment-writing-help', compact('data'));
// });

//07/11/24 new page in uk country university coursework writing help
// route::get('/uk/coursework-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/essay-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/essay-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::
//         where('subject' , '!=' , 'NULL') // Exclude rows where 'subject' is NULL
//         ->where('service' ,  'Coursework')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.coursework-writing-help', compact('data'));
// });

//07/11/24 new page in uk country university proofreading and editing writing help
// route::get('/uk/proofreading-and-editing-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/proofreading-and-editing-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/proofreading-and-editing-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//      $data['expert'] = Experts::
//         where('location' ,  'UK') // Exclude rows where 'subject' is NULL
//         ->where('service' , 'Proofreading And Writing')
//         ->distinct('subject') // Avoid repeated subjects
//         ->get();
//     return view('frontend.header.country.uk.proofreading-and-editing-writing-help', compact('data'));
// });

//07/11/24 new page in uk country university cheap assignment writing help
// route::get('/uk/cheap-assignment-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/cheap-assignment-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/cheap-assignment-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::
//         where('location' ,  'uk') // Exclude rows where 'subject' is NULL
//         ->where('service' ,  'assignment')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.cheap-assignment-writing-help', compact('data'));
// });


//08/11/24 newpage in uk country instant assignment writing help
// route::get('/uk/instant-assignment-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/instant-assignment-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/instant-assignment-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('service',  'assignment')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.instant-assignment-writing-help', compact('data'));
// });

//08/11/24 new page in uk country pay someone to do my assignment writing help
// route::get('/uk/pay-someone-to-do-my-assignment-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/pay-someone-to-do-my-assignment-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/pay-someone-to-do-my-assignment-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('service',  'assignment')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.pay-someone-to-do-my-assignment-writing-help', compact('data'));
// });
//08/11/24 new page in uk country Do My assignment for me
// route::get('/uk/do-my-assignment-for-me', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/do-my-assignment-for-me.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/do-my-assignment-for-me.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
//         ->where('service', 'assignment')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.do-my-assignment-for-me', compact('data'));
// });

//08/11/24 new page in uk country thesis assignment writing help
// route::get('/uk/thesis-assignment-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/thesis-assignment-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/thesis-assignment-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
//         ->where('service', 'thesis')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.thesis-assignment-writing-help', compact('data'));
// });
//08/11/24 new page in uk country case study writitng help
// route::get('/uk/case-study-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/case-study-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/case-study-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('service', 'Case Study')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.case-study-writing-help', compact('data'));
// });


//08/11/24/new page in uk country Dissertation writing help online
// route::get('/uk/dissertation-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/dissertation-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/dissertation-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Dissertation')
//         ->distinct('subject') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.dissertation-writing-help-online', compact('data'));
// });

//08/11/24/ new page in uk country online math assignment helper
// route::get('/uk/online-math-assignment-helper', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/online-math-assignment-helper.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/online-math-assignment-helper.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Math')
//         ->distinct('service') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.online-math-assignment-helper', compact('data'));
// });

//08//11/24 new page in uk country chemistry writing help services
// route::get('/uk/chemistry-writing-help-services', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/chemistry-writing-help-services.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/chemistry-writing-help-services.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Chemistry')
//         ->distinct('service') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.chemistry-writing-help-services', compact('data'));
// });


//13/11/24 new page in uk country law assignment Writing Help Online
// route::get('/uk/law-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/law-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/law-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject', 'Law')
//         ->distinct('service') // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.law-assignment-writing-help-online', compact('data'));
// });
// 13//11/24 new page in uk country nursing assignment Writing Help Online
// route::get('/uk/nursing-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/nursing-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/nursing-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject', 'Nursing')
//         ->get();
//     return view('frontend.header.country.uk.nursing-assignment-writing-help-online', compact('data'));
// });

//13//11/24 new page in uk country english assignment Writing Help Online
// route::get('/uk/english-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/english-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/english-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'English')
//         // Avoid repeated subjects
//         ->get();
//     return view('frontend.header.country.uk.english-assignment-writing-help-online ', compact('data'));
// });

//13/11/24 new page in uk country computer science assignment Writing Help Online
// route::get('/uk/computer-science-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/computer-science-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/computer-science-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Computer Science')
//         // Avoid repeated subjects

//         ->get();
//     return view('frontend.header.country.uk.computer-science-assignment-writing-help-online ', compact('data'));
// });

//13/11/24 new page in uk country accounting assignment Writing Help Online
// route::get('/uk/accounting-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/accounting-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/accounting-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Account')
//         // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.accounting-assignment-writing-help-online ', compact('data'));
// });

//14/11/24 new page in uk country management assignment Writing Help Online
// route::get('/uk/management-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/management-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/management-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Management')
//         // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.management-assignment-writing-help-online', compact('data'));
// });

//14/11/24 new page in uk country business assignment  Writing Help Online
// route::get('/uk/business-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/business-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/business-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Business')
//         // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.business-assignment-writing-help-online', compact('data'));
// });

//14/11/24 new page in uk country programming assignment help Writing Help Online
// route::get('/uk/programming-assignment-help-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/programming-assignment-help-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/programming-assignment-help-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Programming')
//         // Avoid repeated subjects

//         ->get();
//     return view('frontend.header.country.uk.programming-assignment-help-writing-help-online', compact('data'));
// });

//14/11/24 new page in uk country marketing Assignment Writing Help Online
// route::get('/uk/marketing-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/marketing-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/marketing-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Marketing')
//         // Avoid repeated subjects


//         ->get();
//     return view('frontend.header.country.uk.marketing-assignment-writing-help-online', compact('data'));
// });

//14//11//24 new page in uk country science Assignment Writing Help Online
// route::get('/uk/science-assignment-writing-help-online', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./uk/science-assignment-writing-help-online.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/science-assignment-writing-help-online.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'uk') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Science')
//         ->get();
//     return view('frontend.header.country.uk.science-assignment-writing-help-online', compact('data'));
// });

//14//11//24 new page in uk country Dissertation Methodology Writing Help Online
route::get('/uk/dissertation-methodology-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/dissertation-methodology-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/dissertation-methodology-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();
    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Dissertation')

        ->get();
    return view('frontend.header.country.uk.dissertation-methodology-writing-help-online', compact('data'));
});

//14/11/24 new page in uk country Dissertation Discussion Writing Help Online
route::get('/uk/dissertation-discussion-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/dissertation-methodology-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/dissertation-methodology-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Dissertation')

        ->get();
    return view('frontend.header.country.uk.dissertation-discussion-writing-help-online', compact('data'));
});

//14/11/24 new page in uk country Literature Review Writing Help Online
route::get('/uk/literature-review-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/literature-review-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/literature-review-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Literature Review')

        ->get();
    return view('frontend.header.country.uk.literature-review-writing-help-online', compact('data'));
});


//22/11/24 new page in uk country Dissertation Proposal Writing Services
route::get('/uk/dissertation-proposal-writing-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/dissertation-proposal-writing-services.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/dissertation-proposal-writing-services.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();
    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Dissertation')

        ->get();
    return view('frontend.header.country.uk.dissertation-proposal-writing-services', compact('data'));
});

//22/11/24 new page in uk country Law Dissertation Writing Services
route::get('/uk/law-dissertation-writing-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/law-dissertation-writing-services.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/law-dissertation-writing-services.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Dissertation')


        ->get();
    return view('frontend.header.country.uk.law-dissertation-writing-services', compact('data'));
});

//22/11/24 new page in uk country Phd Dissertation Writing Services
route::get('/uk/phd-dissertation-writing-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/phd-dissertation-writing-services.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/phd-dissertation-writing-services.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Dissertation')


        ->get();
    return view('frontend.header.country.uk.phd-dissertation-writing-services', compact('data'));
});

//23/11/24 new page in uk country Undergraduatence Dissertation Writing Services
route::get('/uk/undergraduatence-dissertation-writing-services', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/undergraduatence-dissertation-writing-services.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/undergraduatence-dissertation-writing-services.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Dissertation')
        ->get();
    return view('frontend.header.country.uk.undergraduatence-dissertation-writing-services', compact('data'));
});

//23/11/24 new page in uk country critical essay writing help online
route::get('/uk/critical-essay-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/critical-essay-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/critical-essay-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')

        ->get();
    return view('frontend.header.country.uk.critical-essay-writing-help-online', compact('data'));
});

//23/11/24 new page in uk country expository essay writing help online
route::get('/uk/expository-essay-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/expository-essay-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/expository-essay-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')

        ->get();
    return view('frontend.header.country.uk.expository-essay-writing-help-online', compact('data'));
});

//23/11/24 new page in uk country narrative essay writing help online Services
route::get('/uk/narrative-essay-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/narrative-essay-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/narrative-essay-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')


        ->get();
    return view('frontend.header.country.uk.narrative-essay-writing-help-online', compact('data'));
});

//23/11/24 new page in uk country compare and contrast essay writing help by navneet
route::get('/uk/compare-and-contrast-essay-writing-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/compare-and-contrast-essay-writing-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/compare-and-contrast-essay-writing-help.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')


        ->get();
    return view('frontend.header.country.uk.compare-and-contrast-essay-writing-help', compact('data'));
});

//29/11/24 new page in uk country write my essay for me
route::get('/uk/write-my-essay-for-me', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/write-my-essay-for-me.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/write-my-essay-for-me.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')


        ->get();
    return view('frontend.header.country.uk.write-my-essay-for-me', compact('data'));
});

//29/11/24 new page in uk country online essay helper
route::get('/uk/online-essay-helper', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/online-essay-helper.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/online-essay-helper.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')
        ->get();
    return view('frontend.header.country.uk.online-essay-helper', compact('data'));
});

//29/11/24 new page in uk country scholarship-essay-writing-help-online
route::get('/uk/scholarship-essay-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/scholarship-essay-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/scholarship-essay-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')


        ->get();
    return view('frontend.header.country.uk.scholarship-essay-writing-help-online', compact('data'));
});

//30/11/24 new page in uk country response essay writing help online
route::get('/uk/response-essay-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/response-essay-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/response-essay-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();
    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')


        ->get();
    return view('frontend.header.country.uk.response-essay-writing-help-online', compact('data'));
});

//30/11/24 new page in uk country for custom essay help online
route::get('/uk/custom-essay-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/custom-essay-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/custom-essay-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')


        ->get();
    return view('frontend.header.country.uk.custom-essay-writing-help-online', compact('data'));
});

//30/11/24 new page in uk country economics Reseach Paper writing help online
route::get('/uk/economics-reseach-paper-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/economics-reseach-paper-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/economics-reseach-paper-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Research Paper')


        ->get();
    return view('frontend.header.country.uk.economics-reseach-paper-writing-help-online', compact('data'));
});

//30/11/24 new page in uk country criminology research paper writing help online
route::get('/uk/criminology-research-paper-writing-help-online', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/criminology-research-paper-writing-help-online.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/criminology-research-paper-writing-help-online.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Research Paper')


        ->get();
    return view('frontend.header.country.uk.criminology-research-paper-writing-help-online', compact('data'));
});

// 02/12/24 new page in uk country political science research paper
route::get('/uk/political-science-research-paper', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/political-science-research-paper.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/political-science-research-paper.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Research Paper')


        ->get();
    return view('frontend.header.country.uk.political-science-research-paper', compact('data'));
});


// 02/12/24 new page in uk country primary homework help
route::get('/uk/primary-homework-help', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/primary-homework-help.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/primary-homework-help.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Homework')


        ->get();
    return view('frontend.header.country.uk.primary-homework-help', compact('data'));
});


// 02/12/24 new page in uk country write my assignment for me
route::get('/uk/write-my-assignment-for-me', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./uk/write-my-assignment-for-me.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./uk/write-my-assignment-for-me.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();

    $data['expert'] = Experts::where('location', 'uk') // Exclude rows where 'subject' is NULL
        ->where('service', 'Assignment')


        ->get();
    return view('frontend.header.country.uk.write-my-assignment-for-me', compact('data'));
});

// Route::get('/au/sydney/assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/sydney/assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/sydney/assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'Sydney')
//         ->get();

//     return view('frontend/header/country/sydney', compact('data'));
// });

// Route::redirect('assignment-writing-help-in-sydney', '/au/sydney/assignment-help', 301);

// Route::get('/au/melbourne/assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/melbourne/assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/melbourne/assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'melbourne')
//         ->get();
//     return view('frontend/header/country/melbourne', compact('data'));
// });


// Route::redirect('assignment-writing-help-in-melbourne', 'au/melbourne/assignment-help', 301);


// Route::get('/my', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./my.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./my.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'Malaysia')->get();
//     return view('frontend/header/country/malaysia', compact('data'));
// });

// Route::redirect('assignment-writing-malaysia', '/my', 301);



// Route::get('/es/barcelona/assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./es/barcelona/assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./es/barcelona/assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'Barcelona')->get();
//     return view('frontend/header/country/barcelona', compact('data'));
// });

// Route::redirect('assignment-in-need-barcelona', '/es/barcelona/assignment-help', 301);


// Route::get('/ae', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./ae.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./ae.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'UAE')->get();
//     return view('frontend/header/country/uae', compact('data'));
// });

// Route::redirect('best-assignment-help-uae', 'ae', 301);


// Route::get('/au', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'au')
//         ->where('subject', '!=', 'NULL') // Exclude rows where 'subject' is NULL
//         ->where('service', '!=', 'NULL')
//         ->distinct('subject') // Avoid repeated subjects
//         ->distinct('service')

//         ->get();
//     return view('frontend/header/country/assignment-writing-australia', compact('data'));
// });

// Route::redirect('assignment-writing-australia', '/au', 301);


//24/12/2024 dissertation help
// Route::get('/au/dissertation-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/dissertation-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/dissertation-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     return view('frontend/header/country/au/dissertation-help', compact('data'));
// });

//24/12/2024 homework help
// Route::get('/au/homework-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/homework-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/homework-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Homework')
//         ->get();
//     return view('frontend/header/country/au/homework-help', compact('data'));
// });

//24/12/2024 research paper help
// Route::get('/au/research-paper-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/research-paper-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/research-paper-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Research Paper')
//         ->get();
//     return view('frontend/header/country/au/research-paper-help', compact('data'));
// });

//24/12/2024 essay help
// Route::get('/au/essay-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/essay-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/essay-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Essay')
//         ->get();
//     return view('frontend/header/country/au/essay-help', compact('data'));
// });

//27/12/2024 university help
// Route::get('/au/university-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/university-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/university-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'University')
//         ->get();
//     return view('frontend/header/country/au/university-help', compact('data'));
// });

//27/12/2024 coursework-help
// Route::get('/au/coursework-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/coursework-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/coursework-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Coursework')
//         ->get();
//     return view('frontend/header/country/au/coursework-help', compact('data'));
// });

//27/12/2024 proofreading-and-editing-help
// Route::get('/au/proofreading-and-editing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/proofreading-and-editing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/proofreading-and-editing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Proofreading And Editing')
//         ->get();
//     return view('frontend/header/country/au/proofreading-and-editing-help', compact('data'));
// });

//27/12/2024 cheap-assignment-help
// Route::get('/au/cheap-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/cheap-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/cheap-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Assignment')
//         ->get();
//     return view('frontend/header/country/au/cheap-assignment-help', compact('data'));
// });

//27/12/2024 instant-assignment-help
// Route::get('/au/instant-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/instant-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/instant-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Assignment')
//         ->get();
//     return view('frontend/header/country/au/instant-assignment-help', compact('data'));
// });


//28/12/2024 pay someone to do my assignment
// Route::get('/au/pay-someone-to-do-my-assignment', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/pay-someone-to-do-my-assignment.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/pay-someone-to-do-my-assignment.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Assignment')
//         ->get();
//     return view('frontend/header/country/au/pay-someone-to-do-my-assignment', compact('data'));
// });

//28/12/2024 Do My assignment
// Route::get('/au/do-my-assignment', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/do-my-assignment.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/do-my-assignment.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Assignment')
//         ->get();
//     return view('frontend/header/country/au/do-my-assignment ', compact('data'));
// });

//28/12/2024 thesis writing help
// Route::get('/au/thesis-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/thesis-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/thesis-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Thesis')
//         ->get();
//     return view('frontend/header/country/au/thesis-writing-help ', compact('data'));
// });


//30/12/2024  case study wriitng help
// Route::get('/au/case-study-wriitng-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/case-study-wriitng-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/case-study-wriitng-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Case Study')
//         ->get();
//     return view('frontend/header/country/au/case-study-wriitng-help', compact('data'));
// });

//30/12/2024 write my assignment for me
// Route::get('/au/write-my-assignment-for-me', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/write-my-assignment-for-me.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/write-my-assignment-for-me.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Assignment')
//         ->get();
//     return view('frontend/header/country/au/write-my-assignment-for-me', compact('data'));
// });
//31/12/2024 mathematics assignment help
// Route::get('/au/mathematics-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/mathematics-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/mathematics-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Math')
//         ->get();
//     return view('frontend/header/country/au/mathematics-assignment-help', compact('data'));
// });

//31/12/2024 chemistry assignment help
// Route::get('/au/chemistry-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/chemistry-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/chemistry-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Chemistry')
//         ->get();
//     return view('frontend/header/country/au/chemistry-assignment-help', compact('data'));
// });

//31/12/2024 law assignment help
// Route::get('/au/law-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/law-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/law-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Law')
//         ->get();
//     return view('frontend/header/country/au/law-assignment-help', compact('data'));
// });

//31/12/2024 nursing assignment help
// Route::get('/au/nursing-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/nursing-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/nursing-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Nursing')
//         ->get();
//     return view('frontend/header/country/au/nursing-assignment-help', compact('data'));
// });

//31/12/2024 english assignment help
// Route::get('/au/english-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/english-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/english-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'English')
//         ->get();
//     return view('frontend/header/country/au/english-assignment-help', compact('data'));
// });



//04//01/2025 management assignment help
// Route::get('/au/management-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/management-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/management-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Management')
//         ->get();
//     return view('frontend/header/country/au/management-assignment-help', compact('data'));
// });


//04//01/2025 business assignment help
// Route::get('/au/business-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/business-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/business-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Business')
//         ->get();
//     return view('frontend/header/country/au/business-assignment-help', compact('data'));
// });

//04/01/2025 programming assignment help
// Route::get('/au/programming-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/programming-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/programming-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Programming')
//         ->get();
//     return view('frontend/header/country/au/programming-assignment-help', compact('data'));
// });

//04/01/2025 marketing assignment help
// Route::get('/au/marketing-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/marketing-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/marketing-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Marketing')
//         ->get();
//     return view('frontend/header/country/au/marketing-assignment-help', compact('data'));
// });

//04/01/2025 science assignment help
// Route::get('/au/science-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/science-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/science-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Science')
//         ->get();
//     return view('frontend/header/country/au/science-assignment-help', compact('data'));
// });

//04/01/2025 Economic assignment help
// Route::get('/au/economic-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/economic-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/economic-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Economics')
//         ->get();
//     return view('frontend/header/country/au/economic-assignment-help', compact('data'));
// });

//03//01/2025 computer science assignment help
// Route::get('/au/computer-science-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/computer-science-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/computer-science-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Computer Science')
//         ->get();
//     return view('frontend/header/country/au/computer-science-assignment-help', compact('data'));
// });

//03//01/2025 accounting assignment help
// Route::get('/au/accounting-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/accounting-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/accounting-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Account')
//         ->get();
//     return view('frontend/header/country/au/accounting-assignment-help', compact('data'));
// });

// Route::get('/au/history-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/history-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/history-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'History')
//         ->get();
//     return view('frontend/header/country/au/history', compact('data'));
// });

// Route::get('/au/engineering-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/engineering-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/engineering-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Engineering')
//         ->get();
//     return view('frontend/header/country/au/engineering', compact('data'));
// });

// Route::get('/au/finance-assignment-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/finance-assignment-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/finance-assignment-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('subject',  'Finance')
//         ->get();
//     return view('frontend/header/country/au/finance', compact('data'));
// });



// 15/01/25 new page in au  dissertation-methodology-writing-help
// route::get('/au/dissertation-methodology-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/dissertation-methodology-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/dissertation-methodology-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Dissertation')
//         ->get();

//     return view('frontend.header.country.au.dissertation-methodology-writing-help', compact('data'));
// });

// 15/01/25 new page in au country dissertation-discussion-writing-help
// route::get('/au/literature-review-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/literature-review-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/literature-review-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU') // Exclude rows where 'subject' is NULL
//         ->where('service',  'Dissertation')
//         ->get();

//     return view('frontend.header.country.au.dissertation-discussion-writing-help', compact('data'));
// });

// Route::get('/au/dissertation-proposal-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/dissertation-proposal-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/dissertation-proposal-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();


//     $data['expert'] = Experts::where('location',  'AU')
//         ->where('service',  'dissertation')
//         ->get();
//     return view('frontend/header/country/au/dissertation-proposal', compact('data'));
// });

// Route::get('/au/phd-dissertation-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/phd-dissertation-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/phd-dissertation-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location',  'AU')
//         ->where('service',  'dissertation')
//         ->get();
//     return view('frontend/header/country/au/phd-dissertation', compact('data'));
// });

// route::get('/au/critical-essay-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/critical-essay-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/critical-essay-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'AU') // Exclude rows where 'subject' is NULL
//         ->where('service', 'Dissertation')
//         ->get();

//     return view('frontend.header.country.au.critical-essay', compact('data'));
// });

// route::get('/au/expository-essay-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/expository-essay-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/expository-essay-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'AU') // Exclude rows where 'subject' is NULL
//         ->where('service', 'Dissertation')
//         ->get();

//     return view('frontend.header.country.au.expository-essay', compact('data'));
// });

// route::get('/au/narrative-essay-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/narrative-essay-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/narrative-essay-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'AU') // Exclude rows where 'subject' is NULL
//         ->where('service', 'Essay')
//         ->get();

//     return view('frontend.header.country.au.narrative-essay', compact('data'));
// });

route::get('/au/write-my-essay-for-me', function () {
    $schemaService = new SchemaService();
    $data = config('dataload./au/write-my-essay-for-me.meta');
    $priceRanges = config('dataload.common.price_ranges');
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/write-my-essay-for-me.faqs'));
    $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();
    $data['flag'] = $schemaService->hrefFlagUrl();
    $data['expert'] = Experts::where('location', 'AU') // Exclude rows where 'subject' is NULL
        ->where('service', 'Essay')
        ->get();

    return view('frontend.header.country.au.write-my-essay', compact('data'));
});

// route::get('/au/scholarship-essay-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/scholarship-essay-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/scholarship-essay-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'AU') // Exclude rows where 'subject' is NULL
//         ->where('service', 'Dissertation')
//         ->get();

//     return view('frontend.header.country.au.scholarship-essay-writing-help', compact('data'));
// });
// route::get('/au/online-essay-helper', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/online-essay-helper.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/online-essay-helper.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'AU') // Exclude rows where 'subject' is NULL
//         ->where('service', 'Dissertation')
//         ->get();

//     return view('frontend.header.country.au.online-essay-helper', compact('data'));
// });
// route::get('/au/custom-essay-writing-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/custom-essay-writing-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/custom-essay-writing-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::where('location', 'AU') // Exclude rows where 'subject' is NULL
//         ->where('service', 'Dissertation')
//         ->get();

//     return view('frontend.header.country.au.custom-essay-writing-help', compact('data'));
// });
// route::get('/au/primary-homework-help', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./au/primary-homework-help.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./au/primary-homework-help.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();
//     $data['expert'] = Experts::where('location', 'AU') // Exclude rows where 'subject' is NULL
//         ->where('service', 'Dissertation')
//         ->get();

//     return view('frontend.header.country.au.primary-homework-help', compact('data'));
// });

// Route::get('/es', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./es.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./es.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'Spain')->get();

//     return view('frontend/header/country/best-assignment-help-spain', compact('data'));
// });


// Route::redirect('best-assignment-help-spain', 'es', 301);

// Route::get('/canada', function () {
//     $schemaService = new SchemaService();
//     $data = config('dataload./canada.meta');
//     $priceRanges = config('dataload.common.price_ranges');
//     $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
//     $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload./canada.faqs'));
//     $data['website'] = $schemaService->generateWebsiteSchema();
//     $data['org'] = $schemaService->generateOrganizationSchema();
//     $data['flag'] = $schemaService->hrefFlagUrl();

//     $data['expert'] = Experts::where('location', 'Canada')->get();
//     return view('frontend/header/country/canada', compact('data'));
// });

route::get('/nz', function () {
    return view('frontend.header.country.nz');
});






// Route::get('/samples', function () {return view('frontend/header/samples');});
Route::get(
    '/upload-your-assignment',
    function () {
        $data['title'] = 'Order Now- Assignment Help- 40% Off & Free CV- Assignment In Need';
        $data['description'] = 'Get expert assignment help by placing your order now at Assignment In Need. We provide reliable and top-quality academic support for students in all Subjects.';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/upload-your-assignment';

        $countries = DB::table('countries')->orderBy('name')->get();
        return view('frontend/header/order-now-2', compact('data', 'countries'));
    }
);
Route::post('/upload-new-order', [OrderController::class, 'submit'])->name('upload-new-order');
Route::post('/mini-new-order', [OrderController::class, 'submitMiniQuote'])->name('mini-new-order');

Route::post('/upload-from-order-now', [OrderController::class, 'submitWithOrderNowPage'])->name('upload-from-order-now');

Route::get(
    'contact-us',
    function () {
        $data['title'] = 'Contact us Today For All Types Of Assignment- Assignment In Need';
        $data['description'] = 'Contact Assignment In Need today for expert assistance with all types of assignments. Our experienced team is ready to provide high-quality academic Support.';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/contact-us';
        // return view('frontend/header/contact-us', compact('data'));
        return view('frontend/header/new-contact-page', compact('data'));
    }
);

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'getBlogBySlug']);
Route::get('/blog-sitemap', [SitemapController::class, 'blogSitemap'])->name('blog-sitemap');
Route::get('/sample-sitemap', [SitemapController::class, 'freeSampleSitemap'])->name('sample-sitemap');
// Route::get('free-samples', [SampleController::class, 'indexpage'])->name('free-samples');
Route::get('free-samples/{title}', [SampleController::class, 'categoryDeatails'])->name('free-samples/title');
Route::get('free-samples/{title}/{subject}', [SampleController::class, 'sampleDeatails'])->name('free-samples/title/subject');
Route::get('downloads-sample/{slug}', [SampleController::class, 'downloadSample'])->name('downloads-sample/slug');
// Route::get('/faqs/{slug}', [FaqUrlController::class, 'getfaqBySlug']);

Route::get('/faqs', [FaqUrlController::class, 'faqs']);
Route::get('/review', [HomeController::class, 'review']);
Route::get('/reviews/load-more', [HomeController::class, 'loadMoreReviews']);
Route::get('/writers', [ExpertController::class, 'expert'])->name('writers');
Route::get('/writers/{slug}', [ExpertController::class, 'expertProfile'])->name('writers.profile');
Route::get('/load-experts', [ExpertController::class, 'loadExperts']);
// Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
// Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');



Route::get('/fetch-team-members', function () {
    try {
        $roleId = request()->get('role_id');
        $teamMembers = User::where('role_id', $roleId)->get();
        return response()->json(['teamMembers' => $teamMembers]);
    } catch (\Exception $e) {
        \Log::error('Error fetching team members: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
});

Route::get('/fetchFeedback', function () {
    $feedback = FeedbackOrder::all();
    return response()->json($feedback);
})->name('fetchFeedback');

Route::post('/myordersFeedback', function (Request $request) {
    $content = $request->input('content');
    $userId = auth()->id();
    $orderId = $request->input('order_id');
    $feedbackOrder = new FeedbackOrder();
    $feedbackOrder->feedback = $content;
    $feedbackOrder->uid = $userId;
    $feedbackOrder->order_Id = $orderId;
    $feedbackOrder->save();
    return response()->json(['message' => 'Feedback saved successfully'], 200);
})->name('myordersFeedback');
Route::get(
    'myProfile',
    function () {
        $user = Auth::user();
        if ($user) {
            $userData = [
                'name' => $user->name,
                'email' => $user->email,
                'address' => $user->address,
                'mobile_no' => $user->mobile_no,
                'photo' => $user->photo,
                'Id' => $user->id,
            ];
        } else {
            $userData = null;
        }
        $data['title'] = 'My Profile | Online Essay, Research Paper writers UK';
        $data['description'] = 'If you are looking for Online Assignment Help UK then Assignment In Need is one of the best Online Essay, Research Paper writers UK.';
        $data['keyword'] = '';
        return view('frontend.myProfile', compact('data', 'userData'));
    }
);
Route::post('/change-user-password', function () {
    $userId = Auth::id();
    $payload = request()->all();
    $user = User::find($userId);
    if (empty($payload['current_password']) || empty($payload['new_password']) || empty($payload['new_password_confirmation'])) {
        return Redirect::back()->with('error', 'password cannot be empty');
    }
    if ($payload['new_password'] !== $payload['new_password_confirmation']) {
        return Redirect::back()->with('error', 'New password and confirmation do not match');
    }
    if (Hash::check($payload['current_password'], $user->password)) {
        $hashedNewPassword = Hash::make($payload['new_password']);
        $user->update(['password' => $hashedNewPassword]);
        return Redirect::back()->with('success', 'Password updated successfully');
    } else {
        return Redirect::back()->with('error', 'Current password is incorrect');
    }
})->name('postChangeUserPassword');

Route::post('/userProfile/{id}', function ($id, Request $request) {
    try {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile_no = $request->input('phone');
        $user->address = $request->input('address');
        if ($request->hasFile('photo')) {
            $uploadedFile = $request->file('photo');
            $fileName = uniqid() . '_' . $uploadedFile->getClientOriginalName();
            $destinationPath = public_path('assets/media/avatars');
            $uploadedFile->move($destinationPath, $fileName);
            $user->photo = 'assets/media/avatars/' . $fileName;
        } else {
            $user->photo = 'assets/media/avatars/blank.png';
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
})->name('userProfile.update');

Route::get(
    '/uk/assignment-help-{city}',
    [UkAssignmentController::class, 'show']
);
Route::get('/analytical-essay-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['analytical-essay-help-uk']['meta'] ?? [];
    $faqs = $dataload['analytical-essay-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.analytical-essay-help-uk', compact('data'));
});

Route::get('/argumentative-essay-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['argumentative-essay-help-uk']['meta'] ?? [];
    $faqs = $dataload['argumentative-essay-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.argumentative-essay-help-uk', compact('data'));
});

Route::get('/reflective-essay-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['reflective-essay-help-uk']['meta'] ?? [];
    $faqs = $dataload['reflective-essay-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.reflective-essay-help-uk', compact('data'));
});

Route::get('/literature-review-essay-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['literature-review-essay-help-uk']['meta'] ?? [];
    $faqs = $dataload['literature-review-essay-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.literature-review-essay-help-uk', compact('data'));
});

Route::get('/descriptive-essay-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['descriptive-essay-help-uk']['meta'] ?? [];
    $faqs = $dataload['descriptive-essay-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.descriptive-essay-help-uk', compact('data'));
});

Route::get('/personal-statement-essay-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['personal-statement-essay-help-uk']['meta'] ?? [];
    $faqs = $dataload['personal-statement-essay-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.personal-statement-essay-help-uk', compact('data'));
});

Route::get('/extended-essay-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['extended-essay-help-uk']['meta'] ?? [];
    $faqs = $dataload['extended-essay-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.extended-essay-help-uk', compact('data'));
});

Route::get('/essay-proofreading-and-editing-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['essay-proofreading-and-editing-help-uk']['meta'] ?? [];
    $faqs = $dataload['essay-proofreading-and-editing-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.essay-proofreading-and-editing-help-uk', compact('data'));
});

Route::get('/persuasive-essay-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['persuasive-essay-help-uk']['meta'] ?? [];
    $faqs = $dataload['persuasive-essay-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.persuasive-essay-help-uk', compact('data'));
});





Route::get('/phd-research-paper-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['phd-research-paper-help-uk']['meta'] ?? [];
    $faqs = $dataload['phd-research-paper-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.phd-research-paper-help-uk', compact('data'));
});
Route::get('/masters-research-paper-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['masters-research-paper-help-uk']['meta'] ?? [];
    $faqs = $dataload['masters-research-paper-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.masters-research-paper-help-uk', compact('data'));
});
Route::get('/custom-research-paper-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['custom-research-paper-help-uk']['meta'] ?? [];
    $faqs = $dataload['custom-research-paper-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.custom-research-paper-help-uk', compact('data'));
});
Route::get('/dissertation-editing-and-proofreading-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['dissertation-editing-and-proofreading-help-uk']['meta'] ?? [];
    $faqs = $dataload['dissertation-editing-and-proofreading-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.dissertation-editing-and-proofreading-help-uk', compact('data'));
});
Route::get('/case-study-dissertation-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['case-study-dissertation-help-uk']['meta'] ?? [];
    $faqs = $dataload['case-study-dissertation-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.case-study-dissertation-help-uk', compact('data'));
});
Route::get('/masters-dissertation-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['masters-dissertation-help-uk']['meta'] ?? [];
    $faqs = $dataload['masters-dissertation-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.masters-dissertation-help-uk', compact('data'));
});
Route::get('/dissertation-topic-selection-service-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['dissertation-topic-selection-service-help-uk']['meta'] ?? [];
    $faqs = $dataload['dissertation-topic-selection-service-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.dissertation-topic-selection-service-help-uk', compact('data'));
});
Route::get('/dissertation-results-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['dissertation-results-help-uk']['meta'] ?? [];
    $faqs = $dataload['dissertation-results-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.dissertation-results-help-uk', compact('data'));
});
Route::get('/dissertation-findings-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['dissertation-findings-help-uk']['meta'] ?? [];
    $faqs = $dataload['dissertation-findings-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.dissertation-findings-help-uk', compact('data'));
});
Route::get('/dissertation-literature-review-help-uk', function () {

    $data = [];

    // Load full dataload config
    $dataload = config('dataload');

    // Extract meta & faqs
    $meta = $dataload['dissertation-literature-review-help-uk']['meta'] ?? [];
    $faqs = $dataload['dissertation-literature-review-help-uk']['faqs'] ?? [];

    // Schema service
    $schemaService = new SchemaService();
    $priceRanges = config('dataload.common.price_ranges');

    // Base data from meta
    $data = $meta;
    $data['faqs'] = $faqs;

    // Schemas
    $data['schema'] = $schemaService->generateSchema(
        $meta['title'] ?? '',
        $meta['description'] ?? '',
        $meta['canonical'] ?? '',
        $priceRanges
    );

    $data['Faqschema'] = !empty($faqs)
        ? $schemaService->generateFaqSchema($faqs)
        : null;

    // $data['website'] = $schemaService->generateWebsiteSchema();
    $data['org'] = $schemaService->generateOrganizationSchema();

    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    return view('frontend.header.services.dissertation-literature-review-help-uk', compact('data'));
});

Route::get('/school-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.school-assignment-help-uk.meta');
    $priceRanges = config('dataload.school-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.school-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.school-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.school-assignment-help-uk', compact('data'));
});

// today's new pages 8 Jan

Route::get('/college-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.college-assignment-help-uk.meta');
    $priceRanges = config('dataload.college-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.college-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.college-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.college-assignment-help-uk', compact('data'));
});

Route::get('/custom-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.custom-assignment-help-uk.meta');
    $priceRanges = config('dataload.custom-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.custom-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.custom-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.custom-assignment-help-uk', compact('data'));
});

Route::get('/conclusion-writing-service-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.conclusion-writing-service-uk.meta');
    $priceRanges = config('dataload.conclusion-writing-service-uk.price_ranges');
    $data['faqs'] = config('dataload.conclusion-writing-service-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.conclusion-writing-service-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.conclusion-writing-service-uk', compact('data'));
});

Route::get('/athe-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.athe-assignment-help-uk.meta');
    $priceRanges = config('dataload.athe-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.athe-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.athe-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.athe-assignment-help-uk', compact('data'));
});

Route::get('/btec-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.btec-assignment-help-uk.meta');
    $priceRanges = config('dataload.btec-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.btec-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.btec-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.btec-assignment-help-uk', compact('data'));
});

Route::get('/hnd-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.hnd-assignment-help-uk.meta');
    $priceRanges = config('dataload.hnd-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.hnd-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.hnd-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.hnd-assignment-help-uk', compact('data'));
});

Route::get('/work-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.work-assignment-help-uk.meta');
    $priceRanges = config('dataload.work-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.work-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.work-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.work-assignment-help-uk', compact('data'));
});

Route::get('/mba-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.mba-assignment-help-uk.meta');
    $priceRanges = config('dataload.mba-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.mba-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.mba-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.mba-assignment-help-uk', compact('data'));
});

Route::get('/it-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.it-assignment-help-uk.meta');
    $priceRanges = config('dataload.it-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.it-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.it-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.it-assignment-help-uk', compact('data'));
});

Route::get('/java-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.java-assignment-help-uk.meta');
    $priceRanges = config('dataload.java-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.java-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.java-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.java-assignment-help-uk', compact('data'));
});

Route::get('/psychology-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.psychology-assignment-help-uk.meta');
    $priceRanges = config('dataload.psychology-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.psychology-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.psychology-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.psychology-assignment-help-uk', compact('data'));
});

Route::get('mechanical-engineering-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.mechanical-engineering-assignment-help-uk.meta');
    $priceRanges = config('dataload.mechanical-engineering-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.mechanical-engineering-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.mechanical-engineering-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.mechanical-engineering-assignment-help-uk', compact('data'));
});

Route::get('civil-engineering-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.civil-engineering-assignment-help-uk.meta');
    $priceRanges = config('dataload.civil-engineering-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.civil-engineering-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.civil-engineering-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.civil-engineering-assignment-help-uk', compact('data'));
});

Route::get('database-management-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.database-management-assignment-help-uk.meta');
    $priceRanges = config('dataload.database-management-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.database-management-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.database-management-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.database-management-assignment-help-uk', compact('data'));
});

Route::get('biology-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.biology-assignment-help-uk.meta');
    $priceRanges = config('dataload.biology-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.biology-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.biology-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.biology-assignment-help-uk', compact('data'));
});

Route::get('sas-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.sas-assignment-help-uk.meta');
    $priceRanges = config('dataload.sas-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.sas-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.sas-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.sas-assignment-help-uk', compact('data'));
});

Route::get('autocad-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.autocad-assignment-help-uk.meta');
    $priceRanges = config('dataload.autocad-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.autocad-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.autocad-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.autocad-assignment-help-uk', compact('data'));
});

Route::get('solidworks-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.solidworks-assignment-help-uk.meta');
    $priceRanges = config('dataload.solidworks-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.solidworks-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.solidworks-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.solidworks-assignment-help-uk', compact('data'));
});

Route::get('electrical-engineering-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.electrical-engineering-assignment-help-uk.meta');
    $priceRanges = config('dataload.electrical-engineering-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.electrical-engineering-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.electrical-engineering-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.electrical-engineering-assignment-help-uk', compact('data'));
});

Route::get('/web-design-development-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.web-design-development-assignment-help-uk.meta');
    $priceRanges = config('dataload.web-design-development-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.web-design-development-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.web-design-development-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.web-design-development-assignment-help-uk', compact('data'));
});
Route::get('/construction-technology-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.construction-technology-assignment-help-uk.meta');
    $priceRanges = config('dataload.construction-technology-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.construction-technology-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.construction-technology-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.construction-technology-assignment-help-uk', compact('data'));
});
Route::get('/cybersecurity-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.cybersecurity-assignment-help-uk.meta');
    $priceRanges = config('dataload.cybersecurity-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.cybersecurity-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.cybersecurity-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.cybersecurity-assignment-help-uk', compact('data'));
});
Route::get('/cloud-computing-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.cloud-computing-assignment-help-uk.meta');
    $priceRanges = config('dataload.cloud-computing-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.cloud-computing-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.cloud-computing-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.cloud-computing-assignment-help-uk', compact('data'));
});
Route::get('/machine-learning-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.machine-learning-assignment-help-uk.meta');
    $priceRanges = config('dataload.machine-learning-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.machine-learning-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.machine-learning-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.machine-learning-assignment-help-uk', compact('data'));
});
Route::get('/cisco-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.cisco-assignment-help-uk.meta');
    $priceRanges = config('dataload.cisco-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.cisco-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.cisco-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.cisco-assignment-help-uk', compact('data'));
});

Route::get('/matlab-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.matlab-assignment-help-uk.meta');
    $priceRanges = config('dataload.matlab-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.matlab-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.matlab-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.matlab-assignment-help-uk', compact('data'));
});

Route::get('/computer-network-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.computer-network-assignment-help-uk.meta');
    $priceRanges = config('dataload.computer-network-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.computer-network-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.computer-network-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.computer-network-assignment-help-uk', compact('data'));
});

Route::get('/data-mining-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.data-mining-assignment-help-uk.meta');
    $priceRanges = config('dataload.data-mining-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.data-mining-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.data-mining-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.data-mining-assignment-help-uk', compact('data'));
});

Route::get('/business-intelligence-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.business-intelligence-assignment-help-uk.meta');
    $priceRanges = config('dataload.business-intelligence-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.business-intelligence-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.business-intelligence-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.business-intelligence-assignment-help-uk', compact('data'));
});

Route::get('/python-programming-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.python-programming-assignment-help-uk.meta');
    $priceRanges = config('dataload.python-programming-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.python-programming-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.python-programming-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.python-programming-assignment-help-uk', compact('data'));
});

Route::get('/sql-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.sql-assignment-help-uk.meta');
    $priceRanges = config('dataload.sql-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.sql-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.sql-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.sql-assignment-help-uk', compact('data'));
});

Route::get('/ghostwriting-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.ghostwriting-assignment-help-uk.meta');
    $priceRanges = config('dataload.ghostwriting-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.ghostwriting-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.ghostwriting-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.ghostwriting-assignment-help-uk', compact('data'));
});

Route::get('/hrm-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.hrm-assignment-help-uk.meta');
    $priceRanges = config('dataload.hrm-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.hrm-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.hrm-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.hrm-assignment-help-uk', compact('data'));
});

Route::get('/r-studio-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.r-studio-assignment-help-uk.meta');
    $priceRanges = config('dataload.r-studio-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.r-studio-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.r-studio-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.r-studio-assignment-help-uk', compact('data'));
});

Route::get('/humanities-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.humanities-assignment-help-uk.meta');
    $priceRanges = config('dataload.humanities-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.humanities-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.humanities-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.humanities-assignment-help-uk', compact('data'));
});
Route::get('/cardiff-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.cardiff-assignment-help-uk.meta');
    $priceRanges = config('dataload.cardiff-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.cardiff-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.cardiff-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.cardiff-assignment-help-uk', compact('data'));
});
Route::get('/artificial-intelligence-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.artificial-intelligence-assignment-help-uk.meta');
    $priceRanges = config('dataload.artificial-intelligence-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.artificial-intelligence-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.artificial-intelligence-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.artificial-intelligence-assignment-help-uk', compact('data'));
});
Route::get('/media-studies-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.media-studies-assignment-help-uk.meta');
    $priceRanges = config('dataload.media-studies-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.media-studies-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.media-studies-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.media-studies-assignment-help-uk', compact('data'));
});
Route::get('/strategic-management-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.strategic-management-assignment-help-uk.meta');
    $priceRanges = config('dataload.strategic-management-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.strategic-management-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.strategic-management-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.strategic-management-assignment-help-uk', compact('data'));
});
Route::get('/spss-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.spss-assignment-help-uk.meta');
    $priceRanges = config('dataload.spss-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.spss-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.spss-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.spss-assignment-help-uk', compact('data'));
});
Route::get('/operating-system-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.operating-system-assignment-help-uk.meta');
    $priceRanges = config('dataload.operating-system-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.operating-system-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.operating-system-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.operating-system-assignment-help-uk', compact('data'));
});

Route::get('/project-management-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.project-management-assignment-help-uk.meta');
    $priceRanges = config('dataload.project-management-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.project-management-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.project-management-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.project-management-assignment-help-uk', compact('data'));
});

Route::get('/entrepreneurship-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.entrepreneurship-assignment-help-uk.meta');
    $priceRanges = config('dataload.entrepreneurship-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.entrepreneurship-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.entrepreneurship-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.entrepreneurship-assignment-help-uk', compact('data'));
});

Route::get('/business-environment-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.business-environment-assignment-help-uk.meta');
    $priceRanges = config('dataload.business-environment-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.business-environment-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.business-environment-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.business-environment-assignment-help-uk', compact('data'));
});

Route::get('/electronics-engineering-assignment-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.electronics-engineering-assignment-help-uk.meta');
    $priceRanges = config('dataload.electronics-engineering-assignment-help-uk.price_ranges');
    $data['faqs'] = config('dataload.electronics-engineering-assignment-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.electronics-engineering-assignment-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.electronics-engineering-assignment-help-uk', compact('data'));
});

Route::get('/psychology-dissertation-help-uk', function () {
    $schemaService = new SchemaService();
    $data = config('dataload.psychology-dissertation-help-uk.meta');
    $priceRanges = config('dataload.psychology-dissertation-help-uk.price_ranges');
    $data['faqs'] = config('dataload.psychology-dissertation-help-uk.faqs') ?? [];
    $data['schema'] = $schemaService->generateSchema($data['title'], $data['description'], $data['canonical'], $priceRanges);
    $data['Faqschema'] = $schemaService->generateFaqSchema(config('dataload.psychology-dissertation-help-uk.faqs'));
    $data["sample"] = Sample::with('categotyData')
        ->orderBy('created_at', 'desc') // Order by the most recent records
        ->take(2) // Limit the results to 2 records
        ->get();
    $data['expert'] = Experts::distinct('service', 'subject')
        ->take(5)
        ->get();
    $data['review'] = Review::orderBy('created_at', 'desc')->take(10)->get();
    return view('frontend.header.services.sub.psychology-dissertation-help-uk', compact('data'));
});

Route::get('/feedbacks', function () {
    return view('feedbacks');
});

require __DIR__ . '/auth.php';

// Keep this last: existing static routes win; published CMS slugs resolve dynamically.
Route::get('/{slug}', [DynamicServicePageController::class, 'show'])
    ->where('slug', '[a-z0-9-/]+')
    ->name('dynamic-service-page');
