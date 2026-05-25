<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class CvController extends Controller
{
    public function index(): View
    {
        $data = Cache::remember("cv-data", now()->addMinutes(30), function () {
            return json_decode(Storage::get("cv.json"), true);
        });
        return view("cv", compact("data"));
    }

    public function download(): Response
    {
        $html = view('cv', ['data' => json_decode(Storage::get("cv.json"), true)])->render();

        $pdf = Browsershot::html($html)->pdf();

        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Eslam_CV.pdf"');
    }
}
