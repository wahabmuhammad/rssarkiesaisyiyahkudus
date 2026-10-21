@include('public.header')

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">

<style>
    /* Custom modern input */
    .datepicker-modern {
        border: 1px solid #dbe7ff;
        border-radius: 10px;
        padding: 10px 14px;
        font-weight: 500;
        color: #0d6efd;
        background-color: #f8fbff;
        cursor: pointer;
    }

    .datepicker-modern:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.15);
        border-color: #0d6efd;
    }

    .datepicker-wrapper {
        position: relative;
        max-width: 260px;
    }

    .datepicker-icon {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #0d6efd;
        pointer-events: none;
    }
</style>

<section class="py-5" style="background-color: #ffffff;">
    <div class="container">

        <!-- Judul + Date Picker -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Jadwal Dokter</h2>
            <h5 class="text-muted">Rumah Sakit Sarkies 'Aisyiyah Kudus</h5>

            <!-- Date Picker Modern -->
            <div class="d-flex justify-content-center mt-4">
                <form method="GET" action="{{ url()->current() }}">
                    <div class="datepicker-wrapper">
                        <input
                            type="text"
                            id="tanggal"
                            class="form-control datepicker-modern text-center"
                            placeholder="Pilih tanggal"
                            readonly
                        >
                        <input
                            type="hidden"
                            name="tanggal"
                            id="tanggal_value"
                            value="{{ request('tanggal') }}"
                        >
                        <i class="bi bi-calendar3 datepicker-icon"></i>
                    </div>
                </form>
            </div>
        </div>

        <!-- Grid Jadwal -->
        <div class="row">
            @if(isset($jadwal) && count($jadwal) > 0)
                @foreach($jadwal as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-primary text-white fw-bold">
                                {{ strtoupper($item['spesialis'] ?? 'UMUM') }}
                            </div>
                            <div class="card-body">
                                @foreach($item['dokter'] ?? [] as $d)
                                    <div class="d-flex align-items-center mb-3">
                                        <div style="width:60px; height:60px;">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center fw-bold text-primary"
                                                 style="width:60px; height:60px;">
                                                {{ strtoupper(substr($d['nama'] ?? 'Dr',0,2)) }}
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">{{ $d['nama'] }}</h6>
                                            <small class="text-muted">
                                                <i class="bi bi-clock"></i> {{ $d['jam'] ?? '—' }}
                                            </small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">
                            <h5>Belum ada data jadwal</h5>
                            <p class="text-muted mb-0">
                                Silakan cek kembali nanti atau hubungi bagian administrasi.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
</section>

@include('public.footer')

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#tanggal", {
        locale: "id",
        altInput: true,
        altFormat: "d F Y",        // 👉 12 Januari 2025
        dateFormat: "Y-m-d",       // format aman ke backend
        defaultDate: "{{ request('tanggal') ?? now()->format('Y-m-d') }}",
        onChange: function(selectedDates, dateStr, instance) {
            document.getElementById('tanggal_value').value = dateStr;
            instance.input.closest('form').submit();
        }
    });
});
</script>
