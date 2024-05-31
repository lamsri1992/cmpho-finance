<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>CMPHO FINANCIAL - ระบบงานการเงิน สำนักงานสาธารณสุขจังหวัดเชียงใหม่</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
    <style>
         * {
            font-family: "Prompt", sans-serif;
            font-weight: 300;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('bootstrap/sign-in/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img class="mb-4" src="{{ asset('img/logo_cmpho.png') }}" width="50%">
            <div class="form-floating">
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="">
                <label for="">อีเมล์ผู้ใช้งาน</label>
            </div>
            <div class="form-floating">
                <input type="password" id="password" name="password" class="form-control" placeholder="">
                <label for="">ระบุรหัสผ่าน</label>
            </div>
            <button class="w-100 btn btn-success" type="submit">ลงชื่อเข้าใช้งาน</button>
            <p class="mt-5 mb-3 text-muted">
                <small>สำนักงานสาธารณสุขจังหวัดเชียงใหม่</small>
            </p>
        </form>
    </main>
</body>

</html>