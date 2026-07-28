<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 200px;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .otp-code {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            letter-spacing: 5px;
            margin: 20px 0;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    {{-- <div class="header">
       <img src="{{ asset(env('GLOBAL_LOGO')) }}" alt="Logo BPR" class="logo" style="height: 20px; width: 20px;">

    </div> --}}
    
    <div class="content">
        <h2>Kode Verifikasi OTP</h2>
        <p>Terima kasih telah mendaftar di {{ env(('APP_NAME')) }}. Untuk menyelesaikan proses pendaftaran, silakan masukkan kode OTP berikut:</p>
        
        <div class="otp-code">{{ $otpCode }}</div>
        
        <p>Kode ini akan kadaluarsa dalam 15 menit. Jangan bagikan kode ini dengan siapa pun.</p>
    </div>
    
    <div class="footer">
        <p>&copy; {{ env(('APP_NAME')) }} {{ date('Y') }} . All rights reserved.</p>
        <p >Jika Anda tidak melakukan pendaftaran, abaikan email ini.</p>
    </div>
</body>
</html>