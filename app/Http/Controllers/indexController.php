<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class indexController extends Controller
{
    public function index()
    {
        return view('public.index');
    }
}
