<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        $aliases = [
            'teknik-ve-makine-destegi' => 'teknik-survey-bakim-onarim',
        ];

        $targetSlug = $aliases[$slug] ?? $slug;

        $service = Service::where('slug', $targetSlug)->where('is_active', true)->first();

        if (!$service) {
            $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        }

        $services = Service::where('is_active', true)->get();
        return view('services.show', compact('service', 'services'));
    }
}
