@include('public.header')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .doctor-card {
            background: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 15px;
        }
        .doctor-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
        }
        .schedule-link {
            color: #007b5e;
            font-weight: 500;
            text-decoration: none;
        }
        .schedule-link:hover {
            text-decoration: underline;
        }
        /* Tambahkan jarak dari atas kalau header fixed */
        body {
            padding-top: 100px; /* Sesuaikan tinggi header */
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-4">
    <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mb-3">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cari Dokter</li>
            </ol>
        </nav>
    <h3 class="mb-4">Daftar Dokter</h3>

    <!-- Filter -->
    <div class="row mb-4">
        <div class="col-md-3 mb-2">
            <select class="form-select">
                <option>Pilih Hari</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
                <option>Minggu</option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <select class="form-select">
                <option>Pilih Rumah Sakit</option>
                <option>RS Pondok Indah - Pondok Indah</option>
                <option>RS Pondok Indah - Puri Indah</option>
                <option>RS Pondok Indah - Bintaro Jaya</option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <select class="form-select">
                <option>Pilih Spesialisasi</option>
                <option>Spesialis Anak</option>
                <option>Spesialis Bedah</option>
                <option>Spesialis Kandungan</option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <input type="text" class="form-control" placeholder="Cari nama dokter">
        </div>
    </div>

    <!-- Card Dokter -->
    <div class="doctor-card d-flex align-items-center">
        <img src="https://via.placeholder.com/70" alt="Foto Dokter" class="doctor-img me-3">
        <div>
            <h5 class="mb-1">dr. A. A. A. Putu Indah Pratiwi, Sp.A</h5>
            <small class="text-muted">Spesialis Anak</small><br>
            <a href="#" class="schedule-link">Lihat Jadwal</a>
        </div>
    </div>

    <div class="doctor-card d-flex align-items-center">
        <img src="https://via.placeholder.com/70" alt="Foto Dokter" class="doctor-img me-3">
        <div>
            <h5 class="mb-1">dr. A. Budi Marjono, Sp.OG, Ph.D</h5>
            <small class="text-muted">Spesialis Obstetri dan Ginekologi</small><br>
            <a href="#" class="schedule-link">Lihat Jadwal</a>
        </div>
    </div>

    <div class="doctor-card d-flex align-items-center">
        <img src="https://via.placeholder.com/70" alt="Foto Dokter" class="doctor-img me-3">
        <div>
            <h5 class="mb-1">dr. A. Budi Marjono, Sp.OG, Ph.D</h5>
            <small class="text-muted">Spesialis Obstetri dan Ginekologi</small><br>
            <a href="#" class="schedule-link">Lihat Jadwal</a>
        </div>
    </div>

    <div class="doctor-card d-flex align-items-center">
        <img src="https://via.placeholder.com/70" alt="Foto Dokter" class="doctor-img me-3">
        <div>
            <h5 class="mb-1">dr. A. Budi Marjono, Sp.OG, Ph.D</h5>
            <small class="text-muted">Spesialis Obstetri dan Ginekologi</small><br>
            <a href="#" class="schedule-link">Lihat Jadwal</a>
        </div>
    </div>

    <div class="doctor-card d-flex align-items-center">
        <img src="https://via.placeholder.com/70" alt="Foto Dokter" class="doctor-img me-3">
        <div>
            <h5 class="mb-1">dr. A. Budi Marjono, Sp.OG, Ph.D</h5>
            <small class="text-muted">Spesialis Obstetri dan Ginekologi</small><br>
            <a href="#" class="schedule-link">Lihat Jadwal</a>
        </div>
    </div>

    <div class="doctor-card d-flex align-items-center">
        <img src="https://via.placeholder.com/70" alt="Foto Dokter" class="doctor-img me-3">
        <div>
            <h5 class="mb-1">dr. A. Budi Marjono, Sp.OG, Ph.D</h5>
            <small class="text-muted">Spesialis Obstetri dan Ginekologi</small><br>
            <a href="#" class="schedule-link">Lihat Jadwal</a>
        </div>
    </div>

</div>

</body>
</html>

@include('public.footer')