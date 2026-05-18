<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Leads;
use App\Models\Calls;
use App\Models\User;
use App\Models\Order;
use App\Models\Services;
use App\Models\Paper;
use Illuminate\Support\Facades\Hash;
use App\Mail\LeadsConvertMail;
use Mail;
use App\Models\Files;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http; //add this for captcha
use App\Mail\OrderConfirmation;
use App\Events\LeadFilterApplied;
use App\Events\LeadUpdated;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ExportLeadsJob;
use App\Models\Source;

class LeadsController extends Controller
{
    public function FrontEndLeads(Request $request)
    {
        // Validate the reCAPTCHA token
        $recaptchaResponse = $request->input('g-recaptcha-response');
        if (!$recaptchaResponse) {
            return redirect()->back()->with('warning', 'This feature has been temporarily disabled for security reasons. Please contact us via WhatsApp for assistance.');
        }
        $recaptchaSecret = config('services.recaptcha.secret_key');
        $recaptchaVerification = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse,
        ]);

        if (!$recaptchaVerification->json('success')) {
            return redirect()->back()->withErrors(['captcha' => 'ReCAPTCHA verification failed.']);
        }
        //date validation
        $deliveryDate = $request->input('delivery_date');
        $today = date('Y-m-d'); // Get today's date
        // echo  $deliveryDate, "",$today; exit;
        // Check if the delivery date is before today        
        if ($deliveryDate < $today) {
            // Redirect back with an error message if the date is invalid
            return redirect()->back()->withErrors(['delivery_date' => 'Assignment Deadline cannot be before today.']);
        }

        // Validate the incoming request
        $request->validate([
            'doc.*' => 'file|max:102400', // Example validation for file uploads
        ]);

        // Get the latest order to generate a new order ID
        $latestOrder = Order::orderByDesc('id')->first();
        $newOrderNumber = $latestOrder ? (intval(substr($latestOrder->order_id, 3)) + 1) : 1;
        $newOrderId = 'UKS' . $newOrderNumber;

        if (Auth::user()) {
            $user = Auth::user();

            // Create a new Leads instance
            $leads = new Leads;
            $leads->order_id = $newOrderId;
            $leads->emp_id = $user->id;

            $leads->deadline = $request->input('delivery_date');

            $leads->message = $request->input('message');

            $leads->email = $user->email;
            $leads->user_name = $user->name;
            $leads->countrycode = $user->countrycode;
            $leads->mobile = $user->mobile_no;
            $leads->frontendorder = 1;
            $leads->project_title = $request->input('topic');



            $leads->save();
            $leadsId = $leads->id;

            $order = new Order;
            $order->uid = 0;
            $order->order_id = $newOrderId;
            $order->lead_id = $leadsId;
            $order->u_email = $user->email;
            $order->uname = $user->name;

            $order->message = $request->input('message');
            $order->order_date =  Carbon::now();

            $order->delivery_date = $request->input('delivery_date');
            $order->save();

            if ($request->file('doc')) {
                // Loop through each uploaded file
                foreach ($request->file('doc') as $file) {
                    // Generate a unique file name to prevent conflicts
                    $fileName = $newOrderId . '_' . $file->getClientOriginalName();

                    // Move the uploaded file to the public/files directory
                    $file->move(public_path('files'), $fileName);

                    // Store the file metadata in the database
                    $newFile = new Files;
                    $newFile->file_data = 'files/' . $fileName; // Store file path relative to public directory
                    $newFile->order_id = $newOrderId;
                    $newFile->file_name = $fileName; // Store the unique file name
                    $newFile->file_type = $file->getClientMimeType();
                    $newFile->save();
                }
            }
        }
        if (!Auth::user()) {
            $user = User::where('email', $request->input('email'))->first();

            if (!$user) {
                $user = new User;
                $user->email = $request->input('email') ?: 'user' . $request->input('mobile') . '@gmail.com';
                $user->mobile_no = $request->input('mobile');
                $user->name = $request->input('user_name') ?: 'user' . $request->input('mobile');
                $user->countrycode = $request->input('countrycode');
                $user->password = Hash::make('user@123');
                $user->role_id = 2;
                $user->save();

                $userId = $user->id;
                $name = $user->name;
                $email = $user->email;
            }

            // Create a new Leads instance
            $leads = new Leads;
            $leads->order_id = $newOrderId;
            $leads->emp_id = $user->id;

            $leads->deadline = $request->input('delivery_date');

            $leads->message = $request->input('message');

            $leads->email = $user->email ?? $request->input('email');
            $leads->user_name = $user->name ?? $request->input('user_name');
            $leads->countrycode = $user->countrycode ?? $request->input('countrycode');
            $leads->mobile = $user->mobile_no ?? $request->input('mobile');
            $leads->frontendorder = 1;
            $leads->project_title = $request->input('topic');


            $leads->save();
            $leadsId = $leads->id;

            $order = new Order;
            $order->uid = 0;
            $order->order_id = $newOrderId;
            $order->lead_id = $leadsId;
            $order->u_email = $user->email ?? $request->input('email');
            $order->uname = $user->name ?? $request->input('user_name');

            $order->message = $request->input('message');
            $order->order_date =  Carbon::now();

            $order->delivery_date = $request->input('delivery_date');
            $order->save();

            if ($request->file('doc')) {
                // Loop through each uploaded file
                foreach ($request->file('doc') as $file) {
                    // Generate a unique file name to prevent conflicts
                    $fileName = $newOrderId . '_' . $file->getClientOriginalName();
                    // Move the uploaded file to the public/files directory
                    $file->move(public_path('files'), $fileName);

                    // Store the file metadata in the database
                    $newFile = new Files;
                    $newFile->file_data = 'files/' . $fileName; // Store file path relative to public directory
                    $newFile->order_id = $newOrderId;
                    $newFile->file_name = $fileName; // Store the unique file name
                    $newFile->file_type = $file->getClientMimeType();
                    $newFile->save();
                }
            }
        }

        // return redirect('/MyOrders')->with('success', 'Your Order Place');
        return redirect('/thank-you')->with([
            'success' => 'Your order has been placed successfully!',
            'email' => $request->input('email'), // Pass the email to the session
        ]);
    }

    public function findfiles(Request $request)
    {
        $orderId = $request->input('order_id');

        // Fetch files by order ID
        $files = Files::where('order_id', $orderId)->pluck('file_data')->toArray();

        // Return file URLs
        $fileUrls = [];
        foreach ($files as $file) {
            $fileUrls[] = asset($file); // Assuming files are stored in the public/files directory
        }

        return response()->json($fileUrls);
    }

    public function FrontEndLeadsNew(Request $request)
    {
        // Validate the reCAPTCHA token
        $recaptchaResponse = $request->input('g-recaptcha-response');
        if (!$recaptchaResponse) {
            return redirect()->back()->with('warning', 'This feature has been temporarily disabled for security reasons. Please contact us via WhatsApp for assistance.');
        }
        $recaptchaSecret = config('services.recaptcha.secret_key');
        $recaptchaVerification = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse,
        ]);

        if (!$recaptchaVerification->json('success')) {
            return redirect()->back()->withErrors(['captcha' => 'ReCAPTCHA verification failed.']);
        }

        //date validation

        $urgencyDays = $request->input('urgency');
        $today = now();
        $deliveryDate = $today->copy();
        if (is_numeric($urgencyDays)) {
            // For numeric urgency (1 to 15 days)
            $deliveryDate = $today->addDays($urgencyDays)->format('Y-m-d');
        } elseif ($urgencyDays === '16 to 20') {
            // For '16 to 20 Days' urgency
            $deliveryDate = $today->addDays(16)->format('Y-m-d');
        } elseif ($urgencyDays === '21+') {
            // For '21+ Days' urgency
            $deliveryDate = $today->addDays(21)->format('Y-m-d');
        } else {
            // Handle any unexpected values
            return redirect()->back()->withErrors(['urgency' => 'Invalid urgency selected.']);
        }

        // Additional logic to check if delivery date is before today
        if ($deliveryDate < $today->format('Y-m-d')) {
            return redirect()->back()->withErrors(['delivery_date' => 'Assignment Deadline cannot be before today.']);
        }


        // Validate the incoming request
        $request->validate([
            'fileUpload.*' => 'file|max:102400', // Example validation for file uploads
        ]);

        // Get the latest order to generate a new order ID
        $latestOrder = Order::orderByDesc('id')->first();
        $newOrderNumber = $latestOrder ? (intval(substr($latestOrder->order_id, 3)) + 1) : 1;
        $newOrderId = 'UKS' . $newOrderNumber;

        if (Auth::user()) {
            $user = Auth::user();

            // Create a new Leads instance
            $leads = new Leads;
            $leads->order_id = $newOrderId;
            $leads->emp_id = $user->id;

            $leads->deadline = $deliveryDate;

            $leads->message = $request->input('requirements');

            $leads->email = $user->email;
            $leads->user_name = $user->name;
            $leads->countrycode = $user->countrycode;
            $leads->mobile = $user->mobile_no;
            $leads->frontendorder = 1;
            $leads->project_title = $request->input('service');
            $leads->pages = $request->input('wordCount');
            $leads->price = $request->input('finalPrice');

            $workType = $request->input('workType');
            if (strpos($workType, 'FirstClass') !== false) {
                $workType = str_replace('FirstClass', 'First Class Work', $workType);
            }

            $leads->service_type = $workType;




            $leads->save();
            $leadsId = $leads->id;

            $order = new Order;
            $order->uid = 0;
            $order->order_id = $newOrderId;
            $order->lead_id = $leadsId;
            $order->u_email = $user->email;
            $order->uname = $user->name;

            $order->message = $request->input('requirements');
            $order->order_date =  Carbon::now();

            $order->delivery_date = $deliveryDate;
            $order->save();

            if ($request->file('fileUpload')) {
                // Loop through each uploaded file
                foreach ($request->file('fileUpload') as $file) {
                    // Generate a unique file name to prevent conflicts
                    $fileName = $newOrderId . '_' . $file->getClientOriginalName();

                    // Move the uploaded file to the public/files directory
                    $file->move(public_path('files'), $fileName);

                    // Store the file metadata in the database
                    $newFile = new Files;
                    $newFile->file_data = 'files/' . $fileName; // Store file path relative to public directory
                    $newFile->order_id = $newOrderId;
                    $newFile->file_name = $fileName; // Store the unique file name
                    $newFile->file_type = $file->getClientMimeType();
                    $newFile->save();
                }
            }
        }
        if (!Auth::user()) {
            $user = User::where('email', $request->input('email'))->first();

            if (!$user) {
                $user = new User;
                $user->email = $request->input('email') ?: 'user' . $request->input('mobile') . '@gmail.com';
                $user->mobile_no = $request->input('mobile');
                $user->name = 'user' . $request->input('mobile');
                $user->countrycode = $request->input('countrycode');
                $user->password = Hash::make('user@123');
                $user->role_id = 2;
                $user->save();

                $userId = $user->id;
                $name = $user->name;
                $email = $user->email;
            }

            // Create a new Leads instance
            $leads = new Leads;
            $leads->order_id = $newOrderId;
            $leads->emp_id = $user->id;

            $leads->deadline = $deliveryDate;

            $leads->message = $request->input('requirements');

            $leads->email = $user->email ?? $request->input('email');
            $leads->user_name = $user->name ?? 'user' . $request->input('mobile');
            $leads->countrycode = $user->countrycode ?? $request->input('countrycode');
            $leads->mobile = $user->mobile_no ?? $request->input('mobile');
            $leads->frontendorder = 1;
            $leads->project_title = $request->input('service');
            $leads->pages = $request->input('wordCount');
            $leads->price = $request->input('finalPrice');

            $workType = $request->input('workType');
            if (strpos($workType, 'FirstClass') !== false) {
                $workType = str_replace('FirstClass', 'First Class Work', $workType);
            }

            $leads->service_type = $workType;

            $leads->save();
            $leadsId = $leads->id;

            $order = new Order;
            $order->uid = 0;
            $order->order_id = $newOrderId;
            $order->lead_id = $leadsId;
            $order->u_email = $user->email ?? $request->input('email');
            $order->uname = $user->name ?? 'user' . $request->input('mobile');

            $order->message = $request->input('requirements');
            $order->order_date =  Carbon::now();

            $order->delivery_date = $deliveryDate;
            $order->save();

            if ($request->file('fileUpload')) {
                // Loop through each uploaded file
                foreach ($request->file('fileUpload') as $file) {
                    // Generate a unique file name to prevent conflicts
                    $fileName = $newOrderId . '_' . $file->getClientOriginalName();
                    // Move the uploaded file to the public/files directory
                    $file->move(public_path('files'), $fileName);

                    // Store the file metadata in the database
                    $newFile = new Files;
                    $newFile->file_data = 'files/' . $fileName; // Store file path relative to public directory
                    $newFile->order_id = $newOrderId;
                    $newFile->file_name = $fileName; // Store the unique file name
                    $newFile->file_type = $file->getClientMimeType();
                    $newFile->save();
                }
            }
        }

        //email
        $requestDetails = [
            'orderCode' => $newOrderId,
            'service' => $request->input('service'),
            'workType' => $request->input('workType'),
            'subject' => $request->input('subject'),
            'urgency' => $request->input('urgency'),
            'wordCount' => $request->input('wordCount'),
            'topic' => $request->input('topic'),
            'estimatedPrice' => $request->input('estimatedPrice'),
            'discount' => $request->input('discount'),
            'finalPrice' => $request->input('finalPrice'),
            'requirements-msg' => $request->input('requirements'),
            'email' => $request->input('email') ?: (Auth::user() ? Auth::user()->email : 'default@example.com'),
            'mobile' => $request->input('mobile') ?: (Auth::user() ? Auth::user()->mobile_no : '0000000000'),
            'countrycode' => $request->input('countrycode') ?: (Auth::user() ? Auth::user()->countrycode : '00'),
            'deliveryDate' => $deliveryDate,
            'files' => $request->file('fileUpload') ? array_map(function ($file) use ($newOrderId) {
                return [
                    'name' => $file->getClientOriginalName(),
                    'path' => 'files/' . $newOrderId . '_' . $file->getClientOriginalName(),
                ];
            }, $request->file('fileUpload')) : []
        ];

        // Send email with the request details
        Mail::to('order@assignnmentinneed.com')->send(new OrderConfirmation($requestDetails));
        return redirect('/MyOrders')->with('success', 'Your Order Place');
    }
}
