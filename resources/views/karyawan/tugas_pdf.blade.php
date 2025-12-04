<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Tugas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h3 { text-align: center; margin-bottom: 20px; }
        p { margin: 4px 0; }
    </style>
</head>
<body>

    <h3>Data Tugas Karyawan</h3>

    <p><b>Nama</b> : {{ $user->nama }}</p>
    <p><b>Email</b> : {{ $user->email }}</p>
    <p><b>Tugas</b> : {{ $tugas->tugas }}</p>
    <p><b>Tanggal Mulai</b> : {{ $tugas->tgl_mulai }}</p>
    <p><b>Tanggal Selesai</b> : {{ $tugas->tgl_selesai }}</p>

</body>
</html>
