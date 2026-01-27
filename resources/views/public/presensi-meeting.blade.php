<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Daftar Hadir Rapat</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: whitesmoke;
        }

        .wrapper {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 40px 40px;
            border-radius: 6px;
        }

        h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .subtitle {
            text-align: center;
            color: #5f6fb3;
            margin-bottom: 30px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 14px;
        }

        label span {
            color: red;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .signature-box {
            border: 1px solid #3f51b5;
            border-radius: 4px;
            height: 100%;
            width: 100%;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }

        .clear-btn {
            position: absolute;
            right: 8px;
            bottom: 8px;
            width: 26px;
            height: 26px;
            border: 1px solid #999;
            border-radius: 6px;
            background: #fff;
            cursor: pointer;
            font-size: 14px;
            line-height: 24px;
        }

        .clear-btn:hover {
            background: #f2f2f2;
        }

        canvas {
            width: 100%;
            height: 100%;
            cursor: crosshair;
        }

        .btn-submit {
            display: block;
            margin: 0 auto;
            background: #d84b4b;
            color: #fff;
            border: none;
            padding: 10px 30px;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        .suggestion-box {
            border: 1px solid #ccc;
            padding: 10px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            position: relative;
            background: #fff;
            width: 100%;
            z-index: 1000;
            margin-top: -20px;
            margin-bottom: 20px;
        }

        .suggestion-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>DAFTAR HADIR RAPAT MEETING ROOM</h1>
        <div class="subtitle">Isilah Data Berikut Dengan Baik dan Benar</div>

        <form id="formHadir">
            <label>TANGGAL <span>*</span></label>
            <input type="date" id="tanggalrapat" name="tanggalrapat" required />

            <label for="meeting_fk">Nama Rapat <span>*</span></label>
            <input type="hidden" id="meeting_fk" name="meeting_fk">

            <input type="text" id="meeting_search" class="form-control" placeholder="Cari judul / tanggal meeting"
                autocomplete="off">

            <div id="meeting_suggestion" class="suggestion-box"></div>

            <label>NAMA LENGKAP <span>*</span></label>
            <input type="text" id="namalengkap" required />

            <label>JABATAN <span>*</span></label>
            <input type="text" id="jabatan" required />

            <label>NIP <span>*</span></label>
            <input type="text" id="nip" required />

            <label>TANDA TANGAN (Opsional)</label>
            <div class="signature-box">
                <button type="button" class="clear-btn" onclick="clearSignature()">✕</button>
                <canvas id="signature"></canvas>
            </div>

            <button type="submit" class="btn-submit">Submit</button>
        </form>
        <div class="subtitle" style="margin-top: 20px">Made By: IT RS Sarkies 'Aisyiyah Kudus</div>
    </div>

    <script>
        const canvas = document.getElementById('signature');
        const ctx = canvas.getContext('2d');
        let drawing = false;

        function resizeCanvas() {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        canvas.addEventListener('mousedown', () => drawing = true);
        canvas.addEventListener('mouseup', () => drawing = false);
        canvas.addEventListener('mouseleave', () => drawing = false);

        canvas.addEventListener('mousemove', e => {
            if (!drawing) return;
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.strokeStyle = '#000';

            const rect = canvas.getBoundingClientRect();
            ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
        });

        function clearSignature() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.beginPath();
        }

        $('#meeting_search').on('focus click', function() {
            let keyword = $(this).val();

            // if (keyword.length < 2) {
            //     $('#meeting_suggestion').hide();
            //     return;
            // }

            $.ajax({
                url: '/meeting/search',
                type: 'GET',
                data: {
                    q: keyword
                },
                success: function(res) {
                    let html = '';

                    res.forEach(item => {
                        html += `
                  <div class="suggestion-item"
                       data-id="${item.id}"
                       data-text="${item.nama_meeting}">
                       ${item.nama_meeting}
                  </div>`;
                    });

                    $('#meeting_suggestion').html(html).show();
                }
            });
        });

        // klik suggestion
        $(document).on('click', '.suggestion-item', function() {
            $('#meeting_fk').val($(this).data('id'));
            $('#meeting_search').val($(this).data('text'));
            $('#meeting_suggestion').hide();
        });

        // klik di luar → tutup
        $(document).click(function(e) {
            if (!$(e.target).closest('#meeting_search, #meeting_suggestion').length) {
                $('#meeting_suggestion').hide();
            }
        });


        $('#formHadir').on('submit', function(e) {
            e.preventDefault();

            if (!$('#meeting_fk').val()) {
                alert('Silakan pilih meeting dari daftar');
                return;
            }

            // ambil tanda tangan dari canvas
            const signatureData = canvas.toDataURL('image/png');

            const data = {
                tanggal: $('#tanggalrapat').val(),
                meeting_fk: $('#meeting_fk').val(),
                nama_lengkap: $('#namalengkap').val(),
                jabatan: $('#jabatan').val(),
                nip: $('#nip').val(),
                tanda_tangan: signatureData,
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: 'presensi-meeting/submit',
                method: 'POST',
                data: data,
                success: function(res) {
                    alert(res.message);
                    clearSignature();
                    $('#formHadir')[0].reset();
                },
                error: function(err) {
                    alert('Gagal menyimpan data');
                    console.error(err);
                }
            });
        });
    </script>
</body>

</html>
