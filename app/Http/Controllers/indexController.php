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
    //invitation
    public function invitation($slug)
    {
        // dd($nama);
        $invitations = [

            'Dr-Apt-Salmah-Orbayinah-M-Kes' => ['nama' => 'Dr. Apt. Salmah Orbayinah, M. Kes'],
            'Dr-Enny-WinaryatiM-Pd' => ['nama' => 'Dr. Enny Winaryati M.Pd'],
            'Din-Nurusyifa-S-KM-M-Kes' => ['nama' => 'Din Nurusyifa, S.KM., M.Kes'],

            'pdm-kudus' => ['nama' => 'Pimpinan Daerah Muhammadiyah Kabupaten Kudus'],
            'pda-kudus' => ['nama' => "Pimpinan Daerah 'Aisyiyah Kabupaten Kudus"],
            'majelis-kesehatan-pda-kudus' => ['nama' => "Majelis Kesehatan PDA Kabupaten Kudus"],
            'bph-rsa-group-kudus' => ['nama' => "Badan Pembina Harian RS 'Aisyiyah Group Kudus"],
            'direktur-holding-rsa-group-kudus' => ['nama' => "Direktur Holding RS 'Aisyiyah Group Kudus"],
            'anggota-holding-rsa-group-kudus' => ['nama' => "Anggota Holding RS 'Aisyiyah Group Kudus"],

            'keluarga-besar-rs-aisyiyah' => ['nama' => "Direktur & Keluarga Besar RS 'Aisyiyah Kudus"],
            'keluarga-besar-rs-sarkies' => ['nama' => "Direktur & Keluarga Besar RS Sarkies 'Aisyiyah Kudus"],

            'pca-kota-1' => ['nama' => 'Ketua PCA Kota 1'],
            'pca-kota-3' => ['nama' => 'Ketua PCA Kota 3'],
            'pcm-kota-1' => ['nama' => 'Ketua PCM Kota 1'],
            'pcm-kota-3' => ['nama' => 'Ketua PCM Kota 3'],

            'pra-mlati-lor' => ['nama' => 'Ketua PRA Mlati Lor'],
            'pra-mlatinorowito' => ['nama' => 'Ketua PRA Mlatinorowito'],
            'pra-purwosari-1' => ['nama' => 'Ketua PRA Purwosari 1'],

            'prm-mlati-lor' => ['nama' => 'Ketua PRM Mlati Lor'],
            'prm-mlatinorowito' => ['nama' => 'Ketua PRM Mlatinorowito'],
            'prm-purwosari-1' => ['nama' => 'Ketua PRM Purwosari 1'],

            'imm-kab-kudus' => ['nama' => 'Ketua PC IMM Kabupaten Kudus'],
            'ipm-kab-kudus' => ['nama' => 'Ketua PD IPM Kabupaten Kudus'],
            'na-kab-kudus' => ['nama' => "Ketua PD Nasyiatul 'Aisyiyah Kabupaten Kudus"],
            'pdpm-kab-kudus' => ['nama' => 'Ketua PD Pemuda Muhammadiyah Kabupaten Kudus'],
            'hw-kab-kudus' => ['nama' => 'Ketua Kwarda Hizbul Wathan Kabupaten Kudus'],
            'tpsm-kab-kudus' => ['nama' => 'Ketua TPSM Kabupaten Kudus'],

            'panti-asuhan-yatim-aisyiyah' => ['nama' => "Kepala Panti Asuhan Yatim 'Aisyiyah Kudus"],
            'wisma-lansia-aisyiyah-kudus' => ['nama' => "Kepala Wisma Lansia 'Aisyiyah Kudus"],

            'bank-bukopin-syariah' => ['nama' => 'Pimpinan PT. Bank Bukopin Syariah'],

            'babinsa' => ['nama' => 'Bapak Temu Babinsa'],
            'bhabinkamtibmas' => ['nama' => 'Bapak Rozaq Bhabinkamtibmas'],
            'babinsa-mlati' => ['nama' => 'Babinsa Mlatinorowito'],
            'bhabinkamtibmas-mlati' => ['nama' => 'Babinkamtibmas Mlatinorowito'],

            'lazismu-kab-kudus' => ['nama' => 'Ketua LAZISMU Kabupaten Kudus'],

            'rektor-umku' => ['nama' => 'Rektor Universitas Muhammadiyah Kudus'],
            'wakil-rektor-1-umku' => ['nama' => 'Wakil Rektor I Universitas Muhammadiyah Kudus'],
            'wakil-rektor-2-umku' => ['nama' => 'Wakil Rektor II Universitas Muhammadiyah Kudus'],

            'direktur-pku-mayong' => ['nama' => 'Direktur RS PKU Muhammadiyah Mayong'],
            'direktur-pku-jepara' => ['nama' => "Direktur RS PKU 'Aisyiyah Jepara"],
            'direktur-pku-pati' => ['nama' => 'Direktur RS PKU Muhammadiyah Fastabiq Sehat Pati'],
            'direktur-pku-gubug' => ['nama' => 'Direktur RS PKU Muhammadiyah Gubug'],
            'direktur-pku-pamotan' => ['nama' => 'Direktur RS PKU Muhammadiyah Pamotan'],
            'direktur-pku-demak' => ['nama' => 'Direktur RS PKU Muhammadiyah Hj. Fatimah Sulhan Demak'],

            'klinik-pratama-asyifa-wates' => ['nama' => 'Kepala Klinik Pratama Asy Syifa Wates Undaan'],
            'klinik-pratama-asyifa-kudus' => ['nama' => 'Kepala Klinik Pratama Muhammadiyah Asy Syifa Kudus'],
            'klinik-pratama-pasuruhan' => ['nama' => 'Kepala Klinik Pratama Muhammadiyah Pasuruhan Kudus'],
            'klinik-pratama-getassrabi' => ['nama' => 'Kepala Klinik Pratama PKU Muhammadiyah Getassrabi'],

            'kepala-dinkes-kab-kudus' => ['nama' => 'Kepala Dinas Kesehatan Kabupaten Kudus'],
            'bpjs-kc-kudus' => ['nama' => 'Kepala BPJS Kesehatan KC Kudus'],
            'pda-jepara' => ['nama' => "Ketua Pimpinan Daerah 'Aisyiyah Jepara"],
            'dinas-kesehatan-kab-jepara' => ['nama' => 'Kepala Dinas Kesehatan Kabupaten Jepara'],

        ];

        if (!array_key_exists($slug, $invitations)) {
            return abort(404, 'Undangan tidak ditemukan');
        }

        $data = $invitations[$slug];

        return view('invitations.invite', compact('data', 'slug'));
    }
    public function submitInvitation(Request $request, $slug)
    {
        try {
            $request->validate([
                'nama' => 'required|string',
                'kehadiran' => 'required|string',
                'diwakilkan' => 'nullable|string'
            ]);

            DB::table('kehadiraninvitation_t')->insert([
                'nama' => $request->nama,
                'kehadiran' => $request->kehadiran,
                'diwakilkan' => $request->kehadiran === 'diwakilkan' ? $request->diwakilkan : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
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
