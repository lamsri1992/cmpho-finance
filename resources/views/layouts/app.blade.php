<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMPHO FINANCIAL - ระบบงานการเงิน สำนักงานสาธารณสุขจังหวัดเชียงใหม่</title>
    <link href="{{ asset('bootstrap/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/dashboard/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/sidebars/sidebars.css') }}" rel="stylesheet">
    <link href="{{ asset('custom/toggle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<style>
    * {
        font-family: "Prompt", sans-serif;
        font-weight: 300;
    }

    .select2-selection__rendered {
        line-height: 38px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 39px !important;
    }
</style>

<body>
    @include('layouts.header')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
            @yield('content')
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/f97e59eabd.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/th.js"></script>
<script>
    flatpickr(".flatpickr",{
        "locale": "th",
        "dateFormat": "m/d/Y"
    });
</script>

@if($message = Session::get('success'))
<script>
    $(function() {
        var Toast = Swal.mixin({
            position: 'top-end',
            toast: true,
            showConfirmButton: false,
            timer: 5000
        });
            Toast.fire({
            icon: 'success',
            title: '{{ $message }}'
        })
    });
</script>
@endif

@if($errors->any())
<script>
    Swal.fire({
        title: 'พบข้อผิดพลาด',
        icon: 'warning',
        html: '<div class="text-start">'+
                '<ul>'+
                    '@foreach ($errors->all() as $error)' +
                        '<li>{{ $error }}</li>' +
                        '@endforeach'+
                    '</ul>'+
                '</div>'
            })
</script>
@endif

@section('script')
@show

</html>
