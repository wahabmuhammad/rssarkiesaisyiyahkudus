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

    public function contact(){
        return view('public.contact');
    }

    public function cariDokter(){
        return view('public.cari-dokter');
    }

    public function karir(){
        return view('public.karir');
    }

    public function jadwalDokter(){
        return view('dokter.jadwal-dokter');
    }

    public function painCenter(){
        return view('coe.pain-center');
    }

    public function orthopedicCenter(){
        return view('coe.orthopedic-center');
    }

    public function klinikKandungan(){
        return view('coe.klinik-kandungan');
    }

    public function diagnosticCenter(){
        return view('fasilitas.diagnostic-center');
    }

    public function intensiveCare(){
        return view('fasilitas.intensive-care');
    }

    public function rawatInap(){
        return view('fasilitas.rawat-inap');
    }

    public function rehabilitasi(){
        return view('fasilitas.rehabilitasi');
    }

    public function farmasi(){
        return view('fasilitas.farmasi');
    }

    public function emergency(){
        return view('fasilitas.emergency');
    }

    public function fasilitas(){
        return view('public.fasilitas');
    }

    public function kamar(){
        return view('public.kamar');
    }

    public function authModal()
    {
        return view('auth.auth-modal');
    }

}
