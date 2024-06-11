@extends('layouts.app')
@section('content')
<style>
    .form-check-input:checked {
        background-color: #198754;
        border-color: #198754;
    }
</style>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-start">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ระบบฐานข้อมูล</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-users"></i>
                    ข้อมูลหน่วยบริการ
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <i class="fa-solid fa-users"></i>
            ข้อมูลหน่วยบริการ
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addHospital">
                    <i class="fa-solid fa-user-plus"></i>
                    เพิ่มข้อมูลหน่วยบริการ
                </button>
            </div>
            <table id="table-income" class="table table-striped" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">รหัสหน่วยบริการ</th>
                        <th class="text-center">ชื่อหน่วยบริการ</th>
                        <th class="text-center">บัญชีธนาคาร</th>
                        <th class="text-center">ชื่อบัญชีธนาคาร</th>
                        <th class="text-center">เลขบัญชีธนาคาร</th>
                        <th class="text-center">ประเภทบัญชี</th>
                        <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $res)
                        <tr>
                            <td class="text-center">{{ $res->hos_id }}</td>
                            <td class="text-center">{{ $res->hos_code }}</td>
                            <td class="text-center">{{ $res->hos_name }}</td>
                            <td class="text-center">
                                <img src="{{ asset('img/bank/'.$res->bank_icon) }}" class="img" width="8%">
                                {{ $res->bank_name }}
                            </td>
                            <td class="text-center">{{ $res->hos_bank_name }}</td>
                            <td class="text-center">{{ $res->hos_bank_code }}</td>
                            <td class="text-center">{{ $res->hos_type_name }}</td>
                            <td class="text-center">
                                <a href="#" class='btn btn-sm btn-primary'>
                                    <i class='fa-solid fa-search'></i>
                                    รายละเอียด
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="8">
                            <div class="row" style="color:gray;">
                                <div class="col-md-12 d-flex justify-content-start">
                                    <div class='form-check form-switch d-flex justify-content-center'>
                                        <input class='form-check-input' type='checkbox' checked @disabled(true)>
                                        &nbsp;เปิดใช้งาน
                                    </div>
                                    &nbsp;&nbsp;&nbsp;
                                    <div class='form-check form-switch d-flex justify-content-center'>
                                        <input class='form-check-input' type='checkbox' @disabled(true)>
                                        &nbsp;ปิดใช้งาน
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<!-- Modal Add Employee -->
<div class="modal fade" id="addHospital" tabindex="-1" aria-labelledby="addHospitalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('emp.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addHospitalLabel">
                        <i class="fa-solid fa-user-plus"></i>
                        เพิ่มข้อมูลหน่วยบริการ
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">ชื่อ</label>
                                <input type="text" name="emp_name" class="form-control" placeholder="ระบุชื่อ" value="{{ old('emp_name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">นามสกุล</label>
                                <input type="text" name="emp_lname" class="form-control" placeholder="ระบุนามสกุล" value="{{ old('emp_lname') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">บัญชีธนาคาร</label>
                            <select name="acc_bank_id" class="select_bank">
                                <option></option>
                                @foreach ($bank as $res)
                                <option value="{{ $res->bank_id }}">
                                    <img src="{{ asset('img/bank/'.$res->bank_icon) }}">
                                    {{ $res->bank_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">เลขบัญชีธนาคาร</label>
                            <input type="text" name="acc_code" class="form-control" placeholder="ระบุเลขบัญชีธนาคาร" value="{{ old('acc_code') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">ชื่อบัญชีธนาคาร</label>
                            <input type="text" name="acc_name" class="form-control" placeholder="ระบุชื่อบัญชีธนาคาร" value="{{ old('acc_name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">สาขา</label>
                            <input type="text" name="acc_branch" class="form-control" placeholder="ระบุสาขาบัญชีธนาคาร" value="{{ old('acc_branch') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-success"
                        onclick="Swal.fire({
                            title: 'เพิ่มข้อมูลหน่วยบริการใหม่ ?',
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
                        เพิ่มข้อมูลหน่วยบริการ
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
    function formatState (state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "{{ asset('/img/bank/') }}";
        var $state = $(
            '<span>' + 
                '<img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" width="4%" /> ' 
                + state.text + 
            '</span>'
        );
        return $state;
    };

    new DataTable('#table-income', {
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
        },
    });
    
    $(document).ready(function() {
        $('.select_bank').select2({
            width: '100%',
            placeholder: 'เลือกบัญชีธนาคาร',
            dropdownParent: $("#addHospital"),
            templateResult: formatState
        });

        $('.select_type').select2({
            width: '100%',
            placeholder: 'กรุณาเลือก',
            dropdownParent: $("#addHospital")
        });
    });

    $(document).on('change', '.switchClick', function(e) {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var token = "{{ csrf_token() }}";
        
        e.preventDefault();

        var Toast = Swal.mixin({
            position: 'top-end',
            toast: true,
            showConfirmButton: false,
            timer: 3000
        });
        $.ajax({
            url: "{{ route('emp.changed') }}",
            method: "GET",
            data: {
                id: id,
                _token: token
            },
            success: function (data) {
                Toast.fire({
                    icon: 'success',
                    title: 'ปรับปรุงสถานะ\n'+name,
                });
            }
        });
    });
</script>
@endsection
