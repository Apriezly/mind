<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="email-text">
    <p>Hai, {{ $dokumen->user->name }} &#128075;</p>
    <p>
        Data <b>{{ $dokumen->kegiatan }}</b> akan kadaluarsa pada <b>{{ $dokumen->expiration_date }}</b>. Jangan sampai terlewat ya&#129321;
</p>
    <p>Terimakasih telah menggunakan Aplikasi Mind sebagai pengingatmu.</p>
    <p><span style="color:#19A177;font-weight:700">Mind</span>, sahabat setiamu!</p>
</body>
</html>





