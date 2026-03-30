<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class indexController extends Controller
{
    public function index()
    {
        return view('public.index');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function cariDokter()
    {
        return view('public.cari-dokter');
    }

    public function karir()
    {
        return view('public.karir');
    }

    public function jadwalDokter()
    {
        return view('dokter.jadwal-dokter');
    }

    public function painCenter()
    {
        return view('coe.pain-center');
    }

    public function orthopedicCenter()
    {
        return view('coe.orthopedic-center');
    }

    public function klinikKandungan()
    {
        return view('coe.klinik-kandungan');
    }

    public function diagnosticCenter()
    {
        return view('fasilitas.diagnostic-center');
    }

    public function intensiveCare()
    {
        return view('fasilitas.intensive-care');
    }

    public function rawatInap()
    {
        return view('fasilitas.rawat-inap');
    }

    public function rehabilitasi()
    {
        return view('fasilitas.rehabilitasi');
    }

    public function farmasi()
    {
        return view('fasilitas.farmasi');
    }

    public function emergency()
    {
        return view('fasilitas.emergency');
    }

    public function fasilitas()
    {
        return view('public.fasilitas');
    }

    public function kamar()
    {
        return view('public.kamar');
    }

    public function authModal()
    {
        return view('auth.auth-modal');
    }

    public function vipA()
    {
        return view('ranap.vip-a');
    }

    public function awards()
    {
        return view('public.awards');
    }

    public function asuransi()
    {
        return view('public.asuransi');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    //PRESENSI METTING
    public function presensiMetting()
    {
        return view('public.presensi-meeting');
    }

    public function getMeetingSuggestions(Request $request)
    {
        $keyword = $request->input('keyword');

        $meetings = DB::table('meeting_t')
            ->where('statusenabled', '=', 'true')
            ->limit(5)
            ->get();

        return response()->json($meetings);
    }

    //submit presensi metting
    public function submitPresensiMeeting(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'meeting_fk' => 'required|string',
            'nama_lengkap' => 'required|string',
            'jabatan' => 'required|string',
            'instansi' => 'required|string',
            'nip' => 'required|string',
            'tanda_tangan' => 'nullable'
        ]);

        // ambil base64 tanda tangan
        $signature = $request->tanda_tangan;
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = base64_decode($signature);

        // nama file tanda tangan
        $fileName = 'ttd_' . Str::uuid() . '.png';

        // simpan ke storage/app/public/ttd
        Storage::disk('public')->put('ttd/' . $fileName, $signature);

        // simpan ke database (contoh)
        DB::table('presensi_meeting_t')->insert([
            'meeting_fk' => $request->meeting_fk,
            'namalengkap' => $request->nama_lengkap,
            'instansi' => $request->instansi,
            'jabatan' => $request->jabatan,
            'tanggal' => $request->tanggal,
            'nip' => $request->nip,
            'ttd' => $fileName,
            'created_at' => now()
        ]);

        return response()->json([
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
