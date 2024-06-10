@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-start">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ระบบฐานข้อมูล</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">จัดการข้อมูลผู้ใช้งาน</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $data->name }}
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <i class="fa-solid fa-edit"></i>
            ข้อมูลผู้ใช้งาน - {{ $data->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('users.update',$data->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">ชื่อผู้ใช้งาน</label>
                        <input type="text" name="name" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน" value="{{ old('name',$data->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="ระบุ Email" value="{{ old('email',$data->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">สิทธิ์การใช้งาน</label>
                        <select name="role" class="form-select">
                            <option value="">-- กรุณาระบุข้อมูล --</option>
                            @foreach ($role as $res)
                            <option value="{{ $res->role_id }}"
                                {{ $res->role_id == $data->role ? 'SELECTED':'' }}>
                                {{ $res->role_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="">
                    <button type="button" class="btn btn-success"
                        onclick="Swal.fire({
                            title: 'แก้ไขข้อมูลผู้ใช้งาน ?',
                            showCancelButton: true,
                            confirmButtonText: `<i class='fa-solid fa-check-circle'></i> แก้ไข`,
                            cancelButtonText: `<i class='fa-solid fa-times-circle'></i> ยกเลิก`,
                            icon: 'warning',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            } else if (result.isDenied) {
                                form.reset();
                            }
                        })"  
                    >
                        <i class="fa-solid fa-save"></i>
                        แก้ไขข้อมูลผู้ใช้งาน
                    </button>
                    <a href="#" class="btn btn-outline-danger">
                        <i class="fa-solid fa-unlock"></i>
                        Reset รหัสผ่าน
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
@section('script')

@endsection
