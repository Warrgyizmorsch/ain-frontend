<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\Blog;
use App\Models\Add;
use Illuminate\Support\Facades\Storage; 
use App\Models\Order;
use App\Models\User;
use App\Models\Leads;
use App\Models\FeedbackOrder;
use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Support\Str;
use App\Models\Review;
use App\Models\Experts;
use Illuminate\Support\Facades\Cache;
use App\Services\SchemaService;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function BreadcrumbList(array $breadcrumbs): string
    {
        $breadcrumbSchema = [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => []
        ];

        foreach ($breadcrumbs as $position => $breadcrumb) {
            $breadcrumbSchema['itemListElement'][] = [
                "@type" => "ListItem",
                "position" => $position + 1,
                "name" => $breadcrumb['name'],
                "item" => $breadcrumb['url']
            ];
        }

        // Return as a JSON string
        return json_encode($breadcrumbSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function artical($title, $description, $pdalishDate, $updalishDate)
    {
        return json_encode([
            "@context" => "http://schema.org",
            "@type" => "Article",
            "image" => "https://www.assignnmentinneed.com/assets/media/layout/assignment_logo.webp",


            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id" => env('CANONICAL_URL', url()->current()) ?? ""
            ],
            "headline" => $title ?? "",
            "datePublished" => $pdalishDate ?? "",
            "dateModified" => $updalishDate ?? "",
            "author" => [
                "@type" => "Organization",
                "name" => "Assignmenntinneed",
                "url" => "https://www.assignnmentinneed.com",
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => 'Assignmenntinneed',

            ],
            "description" => $description
        ], JSON_UNESCAPED_SLASHES);
    }

    function generateOrganizationSchema()
    {
        return json_encode([
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => "Assignment In Need",
            "url" => "https://www.assignnmentinneed.com",
            "logo" => "https://www.assignnmentinneed.com/assets/media/avatars/assignment_logo.png",
            "contactPoint" => [
                "@type" => "ContactPoint",
                "telephone" => "+44 7435256433",
                "contactType" => "Customer Service",
                "availableLanguage" => ["English"]
            ],
            "sameAs" => [
                "https://www.facebook.com/assignmentinneed",
                "https://www.instagram.com/p/CXN_t7ALYGH/",
                "https://twitter.com/assignment_in"
            ]
        ]);
    }
    function generateFaqSchema(array $faqEntries): string
    {
        $mainEntity = array_map(fn($entry) => [
            "@type" => "Question",
            "name" => $entry['question'],
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => $entry['answer']
            ]
        ], $faqEntries);

        return json_encode([
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => $mainEntity
        ]);
    }


    public function conversionRatioData(Request $request)
{
    $filter = $request->input('filter', 'current_month');
    $from = $request->input('from');
    $to = $request->input('to');

    $query = DB::table('leads');

    if ($filter == 'last_month') {
        $startDate = \Carbon\Carbon::now()->subMonth()->startOfMonth();
        $endDate = \Carbon\Carbon::now()->subMonth()->endOfMonth();
    } elseif ($filter == 'last_week') {
        $startDate = \Carbon\Carbon::now()->subWeek()->startOfWeek();
        $endDate = \Carbon\Carbon::now()->subWeek()->endOfWeek();
    } elseif ($filter == 'custom' && $from && $to) {
        $startDate = \Carbon\Carbon::parse($from)->startOfDay();
        $endDate = \Carbon\Carbon::parse($to)->endOfDay();
    } else {
        $startDate = \Carbon\Carbon::now()->startOfMonth();
        $endDate = \Carbon\Carbon::now()->endOfMonth();
    }

    $totalLeads = (clone $query)
        ->whereBetween('create_at', [$startDate, $endDate])
        ->count();

    $convertedLeads = DB::table('leads')
        ->whereBetween('create_at', [$startDate, $endDate])
        ->where('is_converted', 1)
        ->count();

    $notConvertedLeads = DB::table('leads')
        ->whereBetween('create_at', [$startDate, $endDate])
        ->where('is_converted', 0)
        ->count();

    $conversionRatio = $totalLeads > 0
        ? round(($convertedLeads / $totalLeads) * 100, 1)
        : 0;

    return response()->json([
        'total_leads' => $totalLeads,
        'converted_leads' => $convertedLeads,
        'not_converted_leads' => $notConvertedLeads,
        'conversion_ratio' => $conversionRatio,
    ]);
}
    // country wise user count
    public function getCountryWiseUsers()
    {
        // 1. DUNIYA BHAR KI COUNTRIES KI MASTER LIST
        $globalCountries = [
            'India' => ['+91', '91', '091'],
            'USA/Canada' => ['+1', '1'],
            'UK' => ['+44', '44'],
            'Australia' => ['+61', '61'],
            'UAE' => ['+971', '971'],
            'Pakistan' => ['+92', '92'],
            'Bangladesh' => ['+880', '880'],
            'Sri Lanka' => ['+94', '94'],
            'Nepal' => ['+977', '977'],
            'Azerbaijan' => ['+994', '994'],
            'Romania' => ['+40', '40'],
            'New Zealand' => ['+64', '64'],
            'Ghana' => ['+233', '233'],
            'Denmark' => ['+45', '45'],
            'Germany' => ['+49', '49'],
            'Nigeria' => ['+234', '234'],
            'Saudi Arabia' => ['+966', '966'],
            'South Africa' => ['+27', '27'],
            'Singapore' => ['+65', '65'],
            'Malaysia' => ['+60', '60'],
            'Ireland' => ['+353', '353'],
            'Oman' => ['+968', '968'],
            'Qatar' => ['+974', '974'],
            'Kuwait' => ['+965', '965'],
            'Bahrain' => ['+973', '973'],
            'France' => ['+33', '33'],
            'Italy' => ['+39', '39'],
            'Spain' => ['+34', '34'],
            'Netherlands' => ['+31', '31'],
            'Sweden' => ['+46', '46'],
            'Switzerland' => ['+41', '41'],
            'China' => ['+86', '86'],
            'Japan' => ['+81', '81'],
            'South Korea' => ['+82', '82'],
            'Russia' => ['+7', '7'],
            'Brazil' => ['+55', '55'],
            'Mexico' => ['+52', '52'],
            'Egypt' => ['+20', '20'],
            'Kenya' => ['+254', '254'],
            'Uganda' => ['+256', '256'],
            'Turkey' => ['+90', '90'],
            'Iran' => ['+98', '98'],
            'Ukraine' => ['+380', '380'],
            'Bulgaria' => ['+359', '359'],
            'Guinea' => ['+224', '224'],
            'Malta' => ['+356', '356'],
            'Liberia' => ['+231', '231'],
            'Mauritius' => ['+230', '230'],
            'Greece' => ['+30', '30'],
            'Austria' => ['+43', '43'],
            'Iraq' => ['+964', '964'],
            'Cameroon' => ['+237', '237'],
            'Albania' => ['+355', '355'],
            'Belgium' => ['+32', '32'],
            'Israel' => ['+972', '972'],
            'Zambia' => ['+260', '260'],
            'Latvia' => ['+371', '371']
        ];

        // 2. Fetch required columns directly (Super fast process)
        $users = \Illuminate\Support\Facades\DB::table('users')
            ->where('flag', 0)
            ->select('countrycode', 'mobile_no')
            ->get();

        $knownCountriesCount = [];
        $totalOthers = 0; // Jinka kuch bhi match nahi hoga, sab isi me plus honge

        // 3. Match CountryCode OR Mobile No Prefix
        foreach ($users as $user) {
            $matched = false;
            $uCode = trim($user->countrycode);
            $uMobile = trim($user->mobile_no);

            foreach ($globalCountries as $countryName => $codes) {

                // Condition A: Kya 'countrycode' exactly list me hai?
                if (in_array($uCode, $codes)) {
                    $knownCountriesCount[$countryName] = ($knownCountriesCount[$countryName] ?? 0) + 1;
                    $matched = true;
                    break;
                }

                // Condition B: Agar countrycode match nahi hua, to mobile_no check karo
                if (!$matched && !empty($uMobile)) {
                    foreach ($codes as $code) {
                        if (str_starts_with($uMobile, $code)) {
                            $knownCountriesCount[$countryName] = ($knownCountriesCount[$countryName] ?? 0) + 1;
                            $matched = true;
                            break 2;
                        }
                    }
                }
            }

            // Condition C: Agar na countrycode mila aur na mobile_no start hua, to Other me dalo
            if (!$matched) {
                $totalOthers++;
            }
        }

        arsort($knownCountriesCount);

        $finalStats = [];
        foreach ($knownCountriesCount as $country => $count) {
            $finalStats["$country ($count)"] = $count;
        }

        // Yahan dhyan dein: Agar ghalat code h, to sirf 1 baar add hoga "Other / Unknown" naam se
        if ($totalOthers > 0) {
            $finalStats["Other / Unknown ($totalOthers)"] = $totalOthers;
        }

        return [
            'labels' => array_keys($finalStats),
            'data' => array_values($finalStats)
        ];
    }

    public function write_advertisement()
    {
        // Retrieve all advertisements from the database
        $advertisements = Add::all();

        // Pass the advertisements to the view
        return view('blog-sample.advertisement', compact('advertisements'));
    }
    public function advertisement_store(Request $request)
    {
        // Create a new instance of the Add model
        $add = new Add();

        // Set the created_by field to the name of the authenticated user
        $add->created_by = auth()->user()->name;

        if ($request->hasFile('photo')) {
            $uploadedFile = $request->file('photo');

            // Generate a unique filename based on the original file name
            $fileName = uniqid() . '_' . $uploadedFile->getClientOriginalName();

            // Define the destination path
            $destinationPath = public_path('assets/media/blogthumbnail');

            // Move the uploaded file to the destination path
            $uploadedFile->move($destinationPath, $fileName);

            // Update the user's photo field with the file path
            $add->Images = 'assets/media/blogthumbnail/' . $fileName;
        } else {
            // If no photo is uploaded, set a default value
            $add->Images = 'assets/media/avatars/demo.png';
        }

        // Save the advertisement
        $add->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Add submitted successfully');
    }
    public function destroyAdvertisement($id)
    {
        // Logic to delete the blog entry
        $add = Add::find($id);
        $add->delete();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'entry deleted successfully');
    }

    public function blog(Request $request)
    {
        $blogs = Blog::where('type', 'blog')
            ->orderByDesc('id') // Ordering by 'dest' column in descending order
            ->paginate(5);

        $data['title'] = 'Assignment In Need- Assignment Writing Help Services Blogs';
        $data['description'] = 'Read insightful blogs on assignment writing help services at Assignment In Need. Discover tips, expert advice, and guidance to help you excel in your academic work.';
        $data['keyword'] = '';

        if ($request->has('page')) {
            $data['canonicalPage'] = 'https://www.assignnmentinneed.com/blog?page=' . $request->input('page');
        } else {
            $data['canonical'] = 'https://www.assignnmentinneed.com/blog'; // Adjust this route name as per your routes file
        }

        return view('frontend.header.blog', compact('blogs', 'data'));
    }
    public function write_blog()
    {
         $authors = DB::table('author')
        ->orderBy('name', 'asc')
        ->get();
        return view('blog-sample.blog', compact('authors'));
    }
    public function blog_list(Request $request)
    {
        // Retrieve the filter parameters from the request
        $title = $request->input('title');
        $type = $request->input('type');

        // Initialize the query builder for the Blog model
        $query = Blog::query();

        // Apply the title filter if provided
        if ($title) {
            $query->where('tittle', 'like', '%' . $title . '%');
        }

        // Apply the type filter if provided
        if ($type) {
            $query->where('type', $type);
        }

        // Order the results by creation date and paginate
        $data['blog'] = $query->orderBy('created_at', 'desc')->paginate(20);

        // Pass the filtered blog list to the view
        return view("blog-sample.blog-list", compact('data'));
    }

    public function blogEdit(Request $request, $id)
    {
        $data = [
            'blog' => Blog::find($id)
        ];

        // Decode FAQ data if it exists, otherwise set it as an empty array
        $faqData = !empty($data['blog']->faq) ? json_decode($data['blog']->faq, true) : [];
        $authors = DB::table('author')
        ->orderBy('name', 'asc')
        ->get();

        return view("blog-sample.blog-edit", compact('data', 'faqData', 'authors'));
    }


    public function getBlogBySlug($slug)
    {
        // $data['blog'] = Blog::find($id);

        $data['blog'] = Blog::where('slug', $slug)->first();
            if (!$data['blog']) {
                abort(404);
            }

        $data['author'] = DB::table('author')->where('id', $data['blog']->author_id)->first();
        $data['recent_post'] = Blog::where('type', 'blog')->latest()->take(5)->get();

        // Check if the blog exists
        if (!$data['blog']) {
            abort(404); // Or handle the case where the blog with the given slug is not found
        }


        $data['title'] = $data['blog']->meta_title;
        $data['description'] = $data['blog']->meta_discribtion;
        $data['keyword'] = $data['blog']->meta_tag;
        $data['canonical'] = 'https://www.assignnmentinneed.com/blog/' . $data['blog']->slug;
        if ($data['blog']->faq) {

            $faqs = json_decode($data['blog']->faq, true);
            $data['Faqschema'] = $this->generateFaqSchema($faqs);


        } else {
            $data['Faqschema'] = $data['blog']->schema;
        }
        $canonical = 'https://www.assignnmentinneed.com/uk/' . $data['blog']->slug;


        $data['artical'] = $this->Artical($data['blog']->tittle, $data['description'], $data['blog']->created_at, $data['blog']->updated_at);
        $data['org'] = $this->generateOrganizationSchema();

        $data['BreadcrumbList'] = $this->BreadcrumbList([
            ['name' => 'Home', 'url' => 'https://www.assignmentinneed.com/'],
            ['name' => 'Assignment In Need- Assignment Writing Help Services Blogs', 'url' => 'https://www.assignmentinneed.com/blog'],
            ['name' => $data['blog']->tittle, 'url' => 'https://www.assignmentinneed.com/blog/' . $slug]
        ]);
        
        return view("frontend.header.blog-detail", compact('data'));
    }

    public function blog_store(Request $request)
    {
        if ($request->input('type') === "blog") {
            // Validate the request data
            $request->validate([
                'blogTitle' => 'required',
                'blogContent' => 'required',
                'MetaTag' => 'required',
                'Metadescription' => 'required',

            ]);

            // Check if the title already exists
            $existingBlog = Blog::where('tittle', $request->input('blogTitle'))->first();
            if ($existingBlog) {
                return redirect()->back()->with('error', 'Blog with this title already exists.');
            }

            // Generate a unique slug for the blog title
            $slug = Str::slug($request->input('blogTitle'), '-');
            $existingSlugCount = Blog::where('slug', $slug)->count();
            if ($existingSlugCount > 0) {
                $slug .= '-' . ($existingSlugCount + 1);
            }

            $blog = new Blog;
            $blogContent = $request['blogContent'];

            // Process Base64 images in <img> tags within the content
            if (strpos($blogContent, '<img') !== false) {
                preg_match_all('/<img[^>]+src="([^">]+)"/', $blogContent, $matches);

                foreach ($matches[1] as $imageSrc) {
                    // Check if the image source is Base64
                    if (preg_match('/^data:image\/(\w+);base64,/', $imageSrc, $base64Matches)) {
                        $imageType = $base64Matches[1]; // Extract image type (e.g., png, jpeg)
                        $base64Data = substr($imageSrc, strpos($imageSrc, ',') + 1); // Remove metadata
                        $decodedImage = base64_decode($base64Data);

                        if ($decodedImage !== false) {
                            $destinationPath = base_path('blogs/blog-content-images/');
                            if (!file_exists($destinationPath)) {
                                mkdir($destinationPath, 0755, true);
                            }

                            // Use the blog title as the image name, sanitized and with the appropriate extension
                            $fileName = Str::slug($request->input('blogTitle'), '-') . '.' . $imageType;
                            $fullPath = $destinationPath . '/' . $fileName;

                            file_put_contents($fullPath, $decodedImage); // Save the decoded image

                            // Replace the Base64 image source with the file path in the blog content
                            $relativePath = 'blogs/blog-content-images/' . $fileName;
                            $blogContent = str_replace($imageSrc, $relativePath, $blogContent);
                        }
                    }
                }
            }

            // Set blog properties
            $blog->tittle = $request['blogTitle'];
            $blog->content = $blogContent;
            $blog->type = $request['type'];
            $blog->slug = $slug;
            $blog->FAQ = $request['faq_data'];
            $blog->meta_title = $request['MetaTag'];
            $blog->meta_discribtion = $request['Metadescription'];
            $blog->author_id = $request['author_id'];

            // Handle main photo upload
            if ($request->hasFile('photo')) {
                $uploadedFile = $request->file('photo');

                // Use the blog title as the image name (if title is too long, truncate it for safety)
                $fileExtension = $uploadedFile->getClientOriginalExtension();
                $fileName = $slug . '.' . $fileExtension;
                $destinationPath = base_path('assets/media/blogthumbnail');

                // Ensure the directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Move the uploaded file to the destination path
                $uploadedFile->move($destinationPath, $fileName);

                // Save the relative path in the database
                $blog->Images = 'assets/media/blogthumbnail/' . $fileName;
            } else {
                // Set default image if no photo is uploaded
                $blog->Images = 'assets/media/avatars/demo.png';
            }

            // Save the blog entry
            $blog->save();
            return redirect()->back()->with('success', 'Blog submitted successfully');
        }
    }


    public function blog_edit(Request $request, $id)
    {
        // dd( $request);

        $blog = Blog::find($id);
        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found');
        }



        // $blogContent = $request->input('blogContent');
        $blogContent = $this->cleanBlogContent($request->input('blogContent'));

        // Process Base64 images in <img> tags within the content
        if (strpos($blogContent, '<img') !== false) {
            preg_match_all('/<img[^>]+src="([^">]+)"/', $blogContent, $matches);

            foreach ($matches[1] as $imageSrc) {
                // Check if the image source is Base64
                if (preg_match('/^data:image\/(\w+);base64,/', $imageSrc, $base64Matches)) {
                    $imageType = $base64Matches[1]; // Extract image type (e.g., png, jpeg)
                    $base64Data = substr($imageSrc, strpos($imageSrc, ',') + 1); // Remove metadata
                    $decodedImage = base64_decode($base64Data);

                    if ($decodedImage !== false) {
                        $destinationPath = base_path('blogs/blog-content-images/');
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0755, true);
                        }

                        // Use the blog title as the image name, sanitized and with the appropriate extension
                        $fileName = Str::slug($request->input('blogTitle'), '-') . '.' . $imageType;
                        $fullPath = $destinationPath . '/' . $fileName;

                        file_put_contents($fullPath, $decodedImage); // Save the decoded image

                        // Replace the Base64 image source with the file path in the blog content
                        $relativePath = 'blogs/blog-content-images/' . $fileName;
                        $blogContent = str_replace($imageSrc, $relativePath, $blogContent);
                    }
                }
            }
        }

        // Update the blog attributes
        $blog->tittle = $request->input('blogTitle');
        $blog->slug = Str::slug($request->input('blogTitle'), '-');
        $blog->content = $blogContent;
        $blog->FAQ = $request->input('faq_data');
        $blog->meta_title = $request->input('MetaTag');
        $blog->meta_discribtion = $request->input('Metadescription');
        $blog->author_id = $request->input('author_id');
        // dd($blog->meta_title );
        // Handle main photo upload if provided
        if ($request->hasFile('photo')) {
            $uploadedFile = $request->file('photo');
            $extension = $uploadedFile->getClientOriginalExtension(); // Get file extension
            $fileName = $blog->slug . '.' . $extension; // Use slug as filename
            $destinationPath = base_path('assets/media/blogthumbnail');
            $fullPath = $destinationPath . '/' . $fileName;

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Delete existing image with the same slug name
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }

            // Save the new uploaded photo
            $uploadedFile->move($destinationPath, $fileName);

            // Save image path in the database
            $blog->Images = 'assets/media/blogthumbnail/' . $fileName;
        }

        // Save the updated blog entry
        $blog->save();

        return redirect()->back()->with('success', 'Blog updated successfully');
    }


    public function destroyBlog($id)
    {
        // Logic to delete the blog entry
        $blog = Blog::find($id);
        $blog->delete();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Blog entry deleted successfully');
    }

    public function sample()
    {
        $samples = Blog::where('type', 'sample')->paginate(3);
        $data['title'] = 'Free Assignment and Homework and More Sample- Assignment In Need';
        $data['description'] = 'Free samples For Assignments, essays, research papers, homework, and dissertations on Assignment In Need. Support we provide to help you achieve academic success.';
        $data['keyword'] = '';
        $data['canonical'] = 'https://www.assignnmentinneed.com/samples';
        return view('frontend/header/samples', compact('samples', 'data'));
        // return view('frontend/header/samples');
    }
    public function sample_store(Request $request)
    {
        if ($request->input('type') === "sample") {
            // Validate the request data
            $request->validate([
                'blogTitle' => 'required',
                'blogContent' => 'required',
            ]);

            // Check if the title already exists
            $existingBlog = Blog::where('tittle', $request->input('blogTitle'))->first();
            if ($existingBlog) {
                return redirect()->back()->with('error', 'Sample with this title already exists.');
            }

            // Generate slug
            $slug = Str::slug($request->input('blogTitle'), '-');

            // Check if the slug is unique
            $existingSlugCount = Blog::where('slug', $slug)->count();
            if ($existingSlugCount > 0) {
                // If the slug already exists, append a unique identifier
                $slug .= '-' . ($existingSlugCount + 1);
            }

            $blog = new Blog;
            $blogContent = $request['blogContent'];
            $images = [];

            // Check if the blog content contains any <img> tags
            if (strpos($blogContent, '<img') !== false) {
                // Use regular expression to extract image URLs from <img> tags
                preg_match_all('/<img[^>]+src="([^">]+)"/', $blogContent, $matches);

                // Iterate through each matched image URL
                foreach ($matches[1] as $image) {
                    // Extract image URL
                    $imageUrl = $image;

                    // Generate a unique filename based on the image URL
                    $fileName = basename($imageUrl); // Extracts the filename from the URL

                    // Download image from URL
                    $imageContents = file_get_contents($imageUrl);

                    // Check if image download was successful
                    if ($imageContents !== false) {
                        // Define the destination directory where the image will be saved
                        $destinationPath = 'assets/media/blogthumbnail';

                        // Save the image to the storage disk
                        $saved = public_path('assets/media/blogthumbnail');

                        // Check if image was successfully saved
                        if ($saved) {
                            // Construct the public URL for the saved image
                            $publicUrl = public_path('assets/media/blogthumbnail');

                            // Store the public URL for later use
                            $images[] = $publicUrl;
                        } else {
                            // Handle error if image could not be saved
                            // (e.g., log the error, display a message to the user)
                        }
                    } else {
                        // Handle error if image could not be downloaded
                        // (e.g., log the error, display a message to the user)
                    }
                }
            }
            $blog->tittle = $request['blogTitle'];
            $blog->content = $request['blogContent'];
            $blog->type = $request['type'];

            $blog->slug = Str::slug($request->input('blogTitle'), '-');

            if ($request->hasFile('photo')) {
                $uploadedFile = $request->file('photo');

                // Generate a unique filename based on the original file name
                $fileName = uniqid() . '_' . $uploadedFile->getClientOriginalName();

                // Define the destination path
                $destinationPath = public_path('assets/media/blogthumbnail');

                // Move the uploaded file to the destination path
                $uploadedFile->move($destinationPath, $fileName);

                // Update the user's photo field with the file path
                $blog->Images = 'assets/media/blogthumbnail/' . $fileName;
            } else {
                // If no photo is uploaded, set a default value
                $blog->Images = 'assets/media/avatars/demo.png';
            }

            // echo '<pre>'; print_r($blog); exit;

            $blog->save();
            return redirect()->back()->with('success', 'Sample submitted successfully');


        }

    }
    public function getSampleBySlug($slug)
    {
        // $data['blog'] = Blog::find($id);
        $data['blog'] = Blog::where('slug', $slug)->first();
        // Check if the blog exists
        if (!$data['blog']) {
            abort(404); // Or handle the case where the blog with the given slug is not found
        }

        $data['recent_post'] = Blog::where('type', 'sample')->latest()->take(5)->get();
        $data['title'] = $slug;
        $data['description'] = '';
        $data['keyword'] = '';



        return view("frontend.header.sample-detail", compact('data'));
    }
    public function create_sample()
    {

        return view('blog-sample.sample');
    }
    public function sample_list()
    {

        $data = [
            'blog' => Blog::where('type', 'sample')->orderBy('created_at', 'desc')->get(),
        ];

        return view("blog-sample.sample-list", compact('data'));
    }
    public function destroySample($id)
    {
        // Logic to delete the blog entry
        $blog = Blog::find($id);
        $blog->delete();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Sample entry deleted successfully');
    }
    public function pricing()
    {
        $data['title'] = 'Affordable Prices For All Assignment Help 40% Off & Free CV- Assignment In Need';
        $data['description'] = 'Assignment In Need offers affordable prices for all assignment help services, ensuring that you get professional academic assistance without breaking the bank.';
        $data['keyword'] = '';
        return view("frontend.pricing", compact('data'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }

    public function review()
    {
        
        $data['review'] = Review::orderBy('created_at', 'desc')->take(9)->get(); // Load only first 9
        $data['expert'] = Experts::distinct('service', 'subject') // Avoid repeated subjects
            ->take(10) // Limit to 10 experts
            ->get();
        $data['title'] = 'Read Uk Students Reviews About Us - Assignment In Need';
        $data['description'] = 'Read genuine student reviews about our assignment writing help uk. Discover why learners from London, Manchester, Glasgow & Cardiff trust Assignment In Need';

        return view('review.review', compact('data'));
    }

    public function loadMoreReviews(Request $request)
    {
        $offset = $request->input('offset', 0);
        $reviews = Review::orderBy('created_at', 'desc')->skip($offset)->take(90)->get();
        return response()->json(['reviews' => $reviews]);
    }

    public function review_create()
    {

        return view('review.create-review');
    }
    public function store(Request $request)
    {


        $review = new Review();
        $review->name = $request['name'];
        $review->deadline = $request['deadline'];
        $review->submission_date = $request['submission_date'];
        $review->services_type = $request['services_type'];
        $review->location = $request['location'];
        $review->customer_rating = $request['customer_rating'];
        $review->description = $request['description'];
        $review->review_reply = $request['review_reply'];

        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function update(Request $request, $id)
    {

        $review = Review::findOrFail($id);
        $review->name = $request['name'];
        $review->deadline = $request['deadline'];
        $review->submission_date = $request['submission_date'];
        $review->services_type = $request['services_type'];
        $review->location = $request['location'];
        $review->customer_rating = $request['customer_rating'];
        $review->description = $request['description'];
        $review->review_reply = $request['review_reply'];
        $review->save();

        return redirect('/review-list')->with('success', 'Review updated successfully!');
    }

    public function review_list()
    {
        $data['review'] = Review::orderBy('created_at', 'desc')->get(); // Load only first 9
        return view('review.review_list', compact('data'));
    }

    public function review_edit(Request $request, $id)
    {
        $review = Review::find($id);
        return view('review.create-review', compact('review'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id); // or however your model is named
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }

    public function pillar()
    {
        // Extract slug from the request URL
        $slug = request()->segment(1);

        // Cache the meta and schema data for 60 minutes
        $cached = Cache::remember("pillar_{$slug}_meta_data", 60, function () use ($slug) {
            $schemaService = new SchemaService();
            $pillarConfig = config("dataload.pillar_pages.{$slug}");

            // Validate configuration exists
            if (!$pillarConfig) {
                abort(404, 'Pillar page not found');
            }

            return [
                'title' => $pillarConfig['meta']['title'] ?? '',
                'description' => $pillarConfig['meta']['description'] ?? '',
                'canonical' => $pillarConfig['meta']['canonical'] ?? '',
                'keyword' => $pillarConfig['meta']['keyword'] ?? '',
                'website' => $schemaService->generateWebsiteSchema(),
                'org' => $schemaService->generateOrganizationSchema(),
                'artical' => $schemaService->generateArticleSchema(
                    $pillarConfig['article']['headline'] ?? '',
                    $pillarConfig['article']['description'] ?? '',
                    $pillarConfig['article']['image'] ?? '',
                    $pillarConfig['article']['url'] ?? ''
                ),
                'Faqschema' => $schemaService->generateFaqSchema($pillarConfig['faqs'] ?? []),
                'flag' => $schemaService->hrefFlagUrl(), // Include hreflang tags if needed
            ];
        });

        // Pass data to the corresponding view
        $view = "pillar-pages.{$slug}";
        $data = $cached;

        // Verify view exists
        if (!view()->exists($view)) {
            abort(404, 'Pillar page view not found');
        }

        return view($view, compact('data'));
    }

}
