@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-muted">
                        <i class="fa-solid fa-users"></i>
                        เจ้าหน้าที่ทั้งหมด
                    </h5>
                    <h2 class="card-text">
                        {{ number_format($emp) }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-muted">
                        <i class="fa-solid fa-money-check"></i>
                        บัญชีทั้งหมด
                    </h5>
                    <h2 class="card-text">
                        {{ number_format($acc) }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-muted">
                        <i class="fa-regular fa-paste"></i>
                        จำนวนฏีกาทั้งหมด
                    </h5>
                    <h2 class="card-text">N/A</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-muted">
                        <i class="fa-solid fa-comments-dollar"></i>
                        ยอดเงินโอนทั้งหมด
                    </h5>
                    <h2 class="card-text">N/A</h2>
                </div>
            </div>
        </div>
    </div>
</main>    
@endsection
@section('script')
    
@endsection
