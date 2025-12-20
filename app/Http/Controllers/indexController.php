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

    public function getJadwalDokter()
    {
        // ===== TANGGAL (locale id bila tersedia, fallback manual jika tidak) =====
        try {
            // isoFormat membutuhkan ext-intl, jika ada gunakan ini (nama hari & bulan ID)
            $tanggalSekarang = Carbon::now('Asia/Jakarta')
                ->locale('id')
                ->isoFormat('dddd, D MMMM YYYY'); // e.g. "Jumat, 12 Desember 2025"
        } catch (\Throwable $e) {
            // fallback manual tanpa intl
            $now = Carbon::now('Asia/Jakarta');
            $months = [
                1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',
                7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
            ];
            $hariMap = [
                'Monday'=>'Senin','Tuesday'=>'Selasa','Wednesday'=>'Rabu','Thursday'=>'Kamis',
                'Friday'=>'Jumat','Saturday'=>'Sabtu','Sunday'=>'Minggu'
            ];
            $bulan = $months[(int)$now->format('n')];
            $hariId = $hariMap[$now->format('l')] ?? $now->format('l');
            $tanggalSekarang = $hariId . ', ' . $now->format('d') . ' ' . $bulan . ' ' . $now->format('Y');
        }

        // ===== AMBIL DATA JADWAL =====
        $query = JadwalDokter::with(['pegawai', 'ruangan'])
            ->orderBy('ruangan_fk')
            ->orderBy('hari')
            ->orderBy('jam_mulai');

        // jika ada kolom statusenabled, filter yang aktif
        if (Schema::hasColumn((new JadwalDokter)->getTable(), 'statusenabled')) {
            $query->where('statusenabled', 1);
        }

        $jadwals = $query->get();

        // ===== GROUPING per nama ruangan (fallback 'Umum') =====
        $grouped = [];
        foreach ($jadwals as $j) {
            $namaRuangan = $j->ruangan->namaruangan ?? 'Umum';
            $namaDokter = $j->pegawai->namapegawai ?? 'Dokter';

            $jamMulai = $j->jam_mulai ?? '';
            $jamSelesai = $j->jam_selesai ?? '';
            $jamText = trim($jamMulai . ($jamMulai && $jamSelesai ? ' - ' : '') . $jamSelesai);
            if ($jamText === '') {
                $jamText = '—';
            }

            $grouped[$namaRuangan][] = [
                'nama' => $namaDokter,
                'jam' => $jamText,
                // tambahkan field lain jika dibutuhkan: 'hari'=>$j->hari, 'id'=>$j->id, dsb.
            ];
        }

        // Membentuk array yang view harapkan: tiap item punya 'spesialis' (header) dan 'dokter' (list)
        $viewJadwal = [];
        foreach ($grouped as $ruangan => $dokters) {
            $viewJadwal[] = [
                'spesialis' => $ruangan,
                'dokter' => $dokters,
            ];
        }

        // RETURN VIEW (tanggal selalu dikirim, jadi akan tampil walau jadwal kosong)
        return view('dokter.jadwal-dokter', [
            'jadwal' => $viewJadwal,
            'tanggal' => $tanggalSekarang,
        ]);
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
            'nip' => 'required|string',
            'tanda_tangan' => 'required'
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
