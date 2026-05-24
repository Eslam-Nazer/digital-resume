<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index(): View
    {
        $data = Cache::remember("cv-data", now()->addMinutes(30), function () {
            return json_decode(Storage::get("cv.json"), true);
        });
        return view("cv", compact("data"));
    }
}
