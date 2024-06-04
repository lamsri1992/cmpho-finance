@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h4">
            <i class="fa-solid fa-chart-line"></i>
            Dashboard - หน้าแสดงรายงานข้อมูล
        </h1>
    </div>
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="card mb-3">
                <div class="card-body">
                    <h1><i class="fa-solid fa-users text-primary"></i></h1>
                    <h5 class="card-title text-muted">
                        จำนวนเจ้าหน้าที่ทั้งหมด
                    </h5>
                    <h2 class="card-text">
                        {{ number_format($emp) }}
                    </h2>
                    <small class="text-muted">คน</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card mb-3">
                <div class="card-body">
                    <h1><i class="fa-solid fa-money-check text-info"></i></h1>
                    <h5 class="card-title text-muted">
                        บัญชีธนาคารทั้งหมด
                    </h5>
                    <h2 class="card-text">
                        {{ number_format($acc) }}
                    </h2>
                    <small class="text-muted">รายการ</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card mb-3">
                <div class="card-body">
                    <h1><i class="fa-regular fa-paste text-success"></i></h1>
                    <h5 class="card-title text-muted">
                        จำนวนฏีกาทั้งหมด
                    </h5>
                    <h2 class="card-text">N/A</h2>
                    <small class="text-muted">รายการ</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card mb-3">
                <div class="card-body">
                    <h1><i class="fa-solid fa-comments-dollar text-danger"></i></h1>
                    <h5 class="card-title text-muted">
                        ยอดเงินโอนทั้งหมด
                    </h5>
                    <h2 class="card-text">N/A</h2>
                    <small class="text-muted">บาท</small>
                </div>
            </div>
        </div>
    </div>
</main>    
@endsection
@section('script')
    
@endsection
