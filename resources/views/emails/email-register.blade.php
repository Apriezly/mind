<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil</title>
</head>
<body class="email-text">
    <p>Hai, {{ $data['name'] }} &#128075;</p>
    <p>Akun Anda berhasil terdaftar di Aplikasi Mind pada <strong>{{ date('Y-m-d H:i:s') }}</strong>, dengan detail:</p>
    <p>
        &#128204;<strong> Nama:</strong> {{ $data['name'] }}<br>
        &#128231;<strong> Email:</strong> {{ $data['email'] }}<br>
        &#128222;<strong> Nomor HP:</strong> {{ $data['nomor'] }}
    </p>
    <p>&#128161;Hubungi Admin: https://bit.ly/adminMind</p>
    <p>
        Selalu lupa jadwal penting? Tenang, ada <span style="color:#19A177;font-weight:700">Mind</span>! &#128526;<br>
        Aplikasi reminder yang siap mengingatkan Anda kapan saja dan di mana saja. Yuk, coba sekarang~
    </p>
    <p>
        Salam,<br>
        Admin <span style="color:#19A177;font-weight:700">Mind</span>
    </p>
</body>
</html>