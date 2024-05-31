@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-start">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ระบบฐานข้อมูล</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    จัดการข้อมูลผู้ใช้งาน
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <i class="fa-solid fa-user-lock"></i>
            ข้อมูลผู้ใช้งาน
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addUsers">
                    <i class="fa-solid fa-user-plus"></i>
                    เพิ่มข้อมูลผู้ใช้งาน
                </button>
            </div>
            <table id="table-users" class="table table-striped" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">ID</th>
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>Email</th>
                        <th>สิทธิ์การใช้งาน</th>
                        <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $res)
                    <tr>
                        <td class="text-center">{{ $res->id }}</td>
                        <td>{{ $res->name }}</td>
                        <td>{{ $res->email }}</td>
                        <td>{{ $res->role_name }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.show',$res->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fa-solid fa-edit"></i>
                                แก้ไขข้อมูล
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal Add Employee -->
<div class="modal fade" id="addUsers" tabindex="-1" aria-labelledby="addUsers" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUsers">
                        <i class="fa-solid fa-user-plus"></i>
                        เพิ่มข้อมูลผู้ใช้งาน
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" name="name" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="ระบุ Email" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">สิทธิ์การใช้งาน</label>
                            <select name="role" class="form-select">
                                <option value="">-- กรุณาระบุข้อมูล --</option>
                                @foreach ($role as $res)
                                <option value="{{ $res->role_id }}">{{ $res->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-success"
                        onclick="Swal.fire({
                            title: 'เพิ่มข้อมูลผู้ใช้งานใหม่ ?',
                            showCancelButton: true,
                            confirmButtonText: `<i class='fa-solid fa-check-circle'></i> เพิ่มใหม่`,
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
                        <i class="fa-solid fa-plus-circle"></i>
                        เพิ่มข้อมูลผู้ใช้งาน
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>

new DataTable('#table-users', {
    oLanguage: {
        oPaginate: {
            sFirst: '<small>หน้าแรก</small>',
            sLast: '<small>หน้าสุดท้าย</small>',
            sNext: '<small>ถัดไป</small>',
            sPrevious: '<small>กลับ</small>'
        },
        sSearch: '<small><i class="fa fa-search"></i> ค้นหา</small>',
        sInfo: '<small>ทั้งหมด _TOTAL_ รายการ</small>',
        sLengthMenu: '<small>แสดง _MENU_ รายการ</small>',
        sInfoEmpty: '<small>ไม่มีข้อมูล</small>'
    }
});
</script>
@endsection
