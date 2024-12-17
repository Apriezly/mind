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
        <strong>Nama&emsp;:&emsp;</strong> {{ $data['name'] }}<br>
        <strong>Email&emsp;:&emsp;</strong> {{ $data['email'] }}<br>
        <strong>Nomor HP&emsp;:&emsp;</strong> {{ $data['nomor'] }}
    </p>
    <p>
        Salam,
        Admin <span style="color:#19A177;font-weight:700">Mind</span>
    </p>
</body>
</html>