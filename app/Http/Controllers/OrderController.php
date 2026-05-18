<?php

namespace App\Http\Controllers;

use App\Models\WalletTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Team;
use App\Models\User;
use App\Models\Writer;
use App\Models\Status;
use App\Models\Formatting;
use App\Models\Services;
use App\Models\Writting;
use App\Models\Paper;
use App\Models\Payment;
use App\Models\Feedback;
use App\Models\College;
use App\Models\multipleswiter;
use App\Models\Leads;
use App\Models\Ordercall;
use App\Models\ProjectStatusCount;
use App\Models\FollowUpComment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderComplete;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ExportOrdersJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;


class OrderController extends Controller
{
    public function myOrder()
    {
        $data['title'] = 'Assignment Writing Help in London,UK | Assignment Writing Service in UK';
        $data['description'] = '';
        $data['keyword'] = '';

        $user = Auth::user();

        $orders = Order::where('uid', $user->id)->orderBy('created_at', 'desc')->get();

        $leads = Leads::where('emp_id', $user->id)->get();
        return view('frontend.my-orders', compact('data', 'orders', 'leads'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'policy' => 'nullable|boolean',

            // optional fields
            'countryCode' => 'nullable|string',
            'deadline' => 'nullable|string', // can be numeric days OR date string
            'pages' => 'nullable|integer|min:1',
            'service' => 'nullable|string',
            'subject' => 'nullable|string',

            'message' => 'nullable|string',
            'delivery_time' => 'nullable|string',
            'tech' => 'nullable|string',
            'resit' => 'nullable|string',

            'finalPrice' => 'nullable|numeric',
            'estimatedPrice' => 'nullable|numeric',
            'discount' => 'nullable',
        ]);

        // ✅ sanitize phone (for USER table only)
        $phoneDigits = preg_replace('/\D+/', '', (string) $request->phone);
        $cc = $request->filled('countryCode')
            ? preg_replace('/\D+/', '', (string) $request->countryCode)
            : null;

        // Generate Order ID
        $latestOrder = Order::orderByDesc('id')->first();
        $newOrderNumber = $latestOrder ? (intval(substr($latestOrder->order_id, 3)) + 1) : 1;
        $newOrderId = 'UKS' . str_pad($newOrderNumber, 3, '0', STR_PAD_LEFT);

        // Find/Create user
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile_no' => $phoneDigits,
                'countrycode' => $cc,
                'password' => Hash::make('user@123'),
            ]);
        } else {
            // optional: update missing info
            $dirty = false;

            if (empty($user->mobile_no) && $phoneDigits) {
                $user->mobile_no = $phoneDigits;
                $dirty = true;
            }
            if (empty($user->countrycode) && $cc) {
                $user->countrycode = $cc;
                $dirty = true;
            }
            if (empty($user->name) && $request->name) {
                $user->name = $request->name;
                $dirty = true;
            }

            if ($dirty)
                $user->save();
        }

        // ✅ Lead data: keep minimal + store only required new fields
        $leadData = [
            'order_id' => $newOrderId,
            'emp_id' => $user->id,
            'create_at' => now(),
            'frontendorder' => 1,
        ];

        // ✅ show in leads table
        if ($request->filled('service'))
            $leadData['service_type'] = $request->service;
        if ($request->filled('subject'))
            $leadData['project_title'] = $request->subject;
        if ($request->filled('pages'))
            $leadData['pages'] = (int) $request->pages;

        // ✅ deadline normalize for blade (numeric days OR date string)
        if ($request->filled('deadline')) {
            $deadline = trim((string) $request->deadline);

            if (is_numeric($deadline)) {
                $days = max(1, (int) $deadline);
                $leadData['deadline'] = now()->addDays($days)->toDateString(); // YYYY-MM-DD (blade safe)
                $leadData['delivery_time'] = $days . ' Day' . ($days > 1 ? 's' : '');
            } else {
                try {
                    $leadData['deadline'] = Carbon::parse($deadline)->toDateString();
                } catch (\Exception $e) {
                    // fallback avoid blade crash
                    $leadData['deadline'] = now()->addDays(1)->toDateString();
                    $leadData['delivery_time'] = '1 Day';
                }
            }
        }

        // optional extras (if you want later)
        if ($request->filled('message'))
            $leadData['message'] = $request->message;
        if ($request->filled('tech'))
            $leadData['tech'] = $request->tech;
        if ($request->filled('resit'))
            $leadData['resit'] = $request->resit;

        // price (optional)
        if ($request->filled('finalPrice')) {
            $leadData['price'] = $request->finalPrice;
        } elseif ($request->filled('estimatedPrice')) {
            $leadData['price'] = $request->estimatedPrice;
        }

        $lead = Leads::create($leadData);

        Order::create([
            'order_id' => $newOrderId,
            'projectstatus' => 'Pending',
            'lead_id' => $lead->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Quote submitted successfully!',
            'order_id' => $newOrderId,
        ]);
    }

    public function submitWithOrderNowPage(Request $request)
    {
        // Validation rules
        $rules = [
            'name'    => 'required|string',
            'service' => 'required|string',
            'workType' => 'required|string',
            'country'  => 'required|string',
            'subject' => 'required|string',
            'urgency' => 'required|string',
            'wordCount' => 'required|integer|min:250',
            'topic' => 'required|string',
            'requirements' => 'required|string',
            'fileUpload.*' => 'nullable|file|max:10240',
        ];

        if (!Auth::check()) {
            $rules = array_merge($rules, [
                'email' => 'required|email',
                'mobile' => 'required|string',
                'countrycode' => 'required|string',
            ]);
        }

        $request->validate($rules);


        // Calculate Delivery Date
        $today = now();
        $urgencyDays = $request->input('urgency');
        if (is_numeric($urgencyDays)) {
            $deliveryDate = $today->copy()->addDays($urgencyDays);
        } elseif ($urgencyDays === '16 to 20') {
            $deliveryDate = $today->copy()->addDays(16);
        } elseif ($urgencyDays === '21+') {
            $deliveryDate = $today->copy()->addDays(21);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid urgency selected.']);
        }

        // Generate Order ID
        $latestOrder = Order::orderByDesc('id')->first();
        $newOrderNumber = $latestOrder ? (intval(substr($latestOrder->order_id, 3)) + 1) : 1;
        $newOrderId = 'UKS' . str_pad($newOrderNumber, 3, '0', STR_PAD_LEFT);

        // Handle User
        if (Auth::check()) {
            $user = Auth::user();
            if (empty($user->country) && $request->filled('country')) {
                $user->country = $request->input('country');
                $user->save();
            }
        } else {
            $user = User::where('email', $request->input('email'))->first();
            if ($user) {
                if (empty($user->country) && $request->filled('country')) {
                    $user->country = $request->input('country');
                    $user->save();
                }
            }

            if (!$user) {
                $user = User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'mobile_no' => $request->input('mobile'),
                    'countrycode' => $request->input('countrycode'),
                    'country' => $request->input('country'),
                    'password' => Hash::make('user@123'),
                    'role_id' => 2
                ]);
            }
        }

        $uploadedFiles = [];
        if ($request->hasFile('fileUpload')) {
            foreach ($request->file('fileUpload') as $file) {
                $destinationPath = base_path('images/orders');  // base_path points to project root

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);  // Create directory if doesn't exist
                }

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $fileName);

                $uploadedFiles[] = 'images/orders/' . $fileName;
            }
        }

        // Leads
        $leads = Leads::create([
            'order_id' => $newOrderId,
            'emp_id' => $user->id,
            'deadline' => $deliveryDate->format('Y-m-d'),
            'create_at' => now(),
            'message' => $request->input('requirements'),
            'email' => $user->email,
            'user_name' => $user->name,
            'countrycode' => $user->countrycode,
            'mobile' => $user->mobile_no,
            'frontendorder' => 1,
            'project_title' => $request->input('service'),
            'pages' => $request->input('wordCount'),
            'price' => $request->input('finalPrice'),
            'service_type' => str_replace('FirstClass', 'First Class Work', $request->input('workType')),
            'page_url' =>  $request->source_page ?? null,
        ]);

        // Order
        Order::create([
            'order_id' => $newOrderId,
            'projectstatus' => 'Pending',
            'lead_id' => $leads->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!',
            'order_id' => $newOrderId,
        ]);
    }


    public function submitMiniQuote(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'email'       => 'required|email',
            'phone'       => 'required|string',
            'policy'      => 'nullable|boolean',

            // mini-form fields
            'countryCode' => 'nullable|string',
            'countryIso'  => 'nullable|string',
            'deadline'    => 'nullable|string', // numeric days OR date string
            'words'       => 'nullable|integer|min:1', // ✅ will be stored in pages
            'service'     => 'nullable|string',        // ✅ will be stored in typeofpaper
            'subject'     => 'nullable|string',        // ✅ will be stored in project_title

            // optional
            'message'        => 'nullable|string',
            'delivery_time'  => 'nullable|string',
            'tech'           => 'nullable|string',
            'resit'          => 'nullable|string',

            'finalPrice'     => 'nullable|numeric',
            'estimatedPrice' => 'nullable|numeric',
            'discount'       => 'nullable',
            'source_page'    => 'nullable|string', // ✅ new field (page url)
        ]);

        // ✅ sanitize phone (for USER table only)
        $phoneDigits = preg_replace('/\D+/', '', (string) $request->phone);

        // ✅ keep countryCode same as your current logic
        $cc = $request->filled('countryCode')
            ? preg_replace('/\D+/', '', (string) $request->countryCode)
            : null;

        // ✅ Generate Order ID
        $latestOrder = Order::orderByDesc('id')->first();
        $newOrderNumber = $latestOrder ? (intval(substr($latestOrder->order_id, 3)) + 1) : 1;
        $newOrderId = 'UKS' . str_pad($newOrderNumber, 3, '0', STR_PAD_LEFT);

        // ✅ Find/Create user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'name'       => $request->name,
                'email'      => $request->email,
                'mobile_no'  => $phoneDigits,
                'countrycode' => $cc,
                'password'   => Hash::make('user@123'),
            ]);
        } else {
            // optional update missing info
            $dirty = false;

            if (empty($user->mobile_no) && $phoneDigits) {
                $user->mobile_no = $phoneDigits;
                $dirty = true;
            }
            if (empty($user->countrycode) && $cc) {
                $user->countrycode = $cc;
                $dirty = true;
            }
            if (empty($user->name) && $request->name) {
                $user->name = $request->name;
                $dirty = true;
            }

            if ($dirty) $user->save();
        }

        // ✅ Lead data
        $leadData = [
            'order_id'       => $newOrderId,
            'emp_id'         => $user->id,
            'create_at'      => now(),
            'frontendorder'  => 1,
        ];

        // ✅ Mapping changes
        // subject -> project_title
        if ($request->filled('subject')) {
            $leadData['project_title'] = $request->subject;
        }

        // service -> typeofpaper
        if ($request->filled('service')) {
            $leadData['typeofpaper'] = $request->service;
        }

        // words -> pages (as you asked)
        if ($request->filled('words')) {
            $leadData['pages'] = (int) $request->words;
        }

        // ✅ source page (new)
        // If frontend sends source_page, take it. Otherwise auto from referer/url.
        $leadData['page_url'] = $request->filled('source_page')
            ? $request->source_page
            : ($request->headers->get('referer') ?? $request->fullUrl());

        // ✅ deadline normalize (numeric days OR date string)
        if ($request->filled('deadline')) {
            $deadline = trim((string) $request->deadline);

            if (is_numeric($deadline)) {
                $days = max(1, (int) $deadline);
                $leadData['deadline'] = now()->addDays($days)->toDateString();
                $leadData['delivery_time'] = $days . ' Day' . ($days > 1 ? 's' : '');
            } else {
                try {
                    $leadData['deadline'] = Carbon::parse($deadline)->toDateString();
                } catch (\Exception $e) {
                    $leadData['deadline'] = now()->addDays(1)->toDateString();
                    $leadData['delivery_time'] = '1 Day';
                }
            }
        }

        // optional extras
        if ($request->filled('message')) $leadData['message'] = $request->message;
        if ($request->filled('tech'))    $leadData['tech'] = $request->tech;
        if ($request->filled('resit'))   $leadData['resit'] = $request->resit;

        // price (optional)
        if ($request->filled('finalPrice')) {
            $leadData['price'] = $request->finalPrice;
        } elseif ($request->filled('estimatedPrice')) {
            $leadData['price'] = $request->estimatedPrice;
        }

        $lead = Leads::create($leadData);

        Order::create([
            'order_id'      => $newOrderId,
            'projectstatus' => 'Pending',
            'lead_id'       => $lead->id,
        ]);

        return response()->json([
            'success'  => true,
            'message'  => 'Quote submitted successfully!',
            'order_id' => $newOrderId,
        ]);
    }
}
