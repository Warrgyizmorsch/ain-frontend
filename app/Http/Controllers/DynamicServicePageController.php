<?php

namespace App\Http\Controllers;

use App\Models\ServicePage;
use App\Services\SchemaService;

class DynamicServicePageController extends Controller
{
    public function show(?string $slug = null)
    {
        $slug = $slug ?: request()->segment(1);
        $page = ServicePage::with('subject')->where('slug',$slug)->where('is_published',true)->firstOrFail();
        $data = [
            'title' => $page->meta_title,
            'description' => $page->meta_description,
            'canonical' => url('/'.$page->slug),
            'expert' => $page->selectedExperts(),
            'reviews' => $page->selectedReviews(),
            'faqs' => $page->faqs ?: [],
        ];
        $schema = new SchemaService();
        $data['Faqschema'] = $schema->generateFaqSchema($data['faqs']);
        return view('frontend.header.services.sub.dynamic-subject', compact('page','data'));
    }
}
