<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vessel;
use App\Models\News;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Fetch Services (Safe query against missing columns)
        $serviceQuery = Service::query();
        if (Schema::hasTable('services')) {
            if (Schema::hasColumn('services', 'is_active')) {
                $serviceQuery->where('is_active', true);
            }
            if (Schema::hasColumn('services', 'sort_order')) {
                $serviceQuery->orderBy('sort_order');
            }
            $services = $serviceQuery->take(6)->get();
        } else {
            $services = collect();
        }

        // 2. Fetch Vessels (Safe query)
        $vessels = Schema::hasTable('vessels') ? Vessel::latest()->take(4)->get() : collect();

        // 3. Fetch News (Safe query)
        $newsQuery = News::query();
        if (Schema::hasTable('news')) {
            if (Schema::hasColumn('news', 'is_published')) {
                $newsQuery->where('is_published', true);
            }
            if (Schema::hasColumn('news', 'published_at')) {
                $newsQuery->latest('published_at');
            } else {
                $newsQuery->latest();
            }
            $news = $newsQuery->take(3)->get();
        } else {
            $news = collect();
        }

        $stats = [
            'vessels_handled' => 1450,
            'strait_passages' => 3800,
            'bunkering_tons' => '250.000+',
            'years_experience' => 18,
        ];

        return view('home', compact('services', 'vessels', 'news', 'stats'));
    }

    public function about()
    {
        return view('about');
    }

    public function straitsAndPorts()
    {
        return view('straits-ports');
    }
}
