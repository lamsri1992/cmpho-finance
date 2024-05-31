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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ระบบฐานข้อมูล</a></li>
                <li class="breadcrumb-item"><a href="{{ route('emp.index') }}">ข้อมูลบุคลากร</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-regular fa-folder-open"></i>
                    {{ $emp->pre_name.$emp->emp_name." ".$emp->emp_lname }}
                </li>
            </ol>
        </nav>
    </div>
    <div class="accordion" id="accordionEmployee">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button">
                    <i class="fa-solid fa-user-circle nav-icon"></i>&nbsp;
                    ข้อมูลบุคลากร
                </button>
            </h2>
            <div id="personal" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionEmployee">
                <div class="accordion-body">
                    <form action="{{ route('emp.update',$emp->emp_id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">คำนำหน้า</label>
                                    <select name="prefix" class="form-select">
                                        <option value="">-- กรุณาระบุข้อมูล --</option>
                                        @foreach ($prefix as $res)
                                        <option value="{{ $res->pre_id }}"
                                            {{ $res->pre_id == $emp->emp_prefix_id ? 'SELECTED':'' }}>
                                            {{ $res->pre_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="" class="form-label">ชื่อ</label>
                                    <input type="text" name="emp_name" class="form-control" placeholder="ระบุชื่อ" value="{{ old('emp_name',$emp->emp_name) }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="" class="form-label">นามสกุล</label>
                                    <input type="text" name="emp_lname" class="form-control" placeholder="ระบุนามสกุล" value="{{ old('emp_name',$emp->emp_lname) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">CID (หมายเลข 13 หลัก)</label>
                                    <input type="text" name="emp_cid" class="form-control" placeholder="ระบุหมายเลขประจำตัวประชาชน"
                                        maxlength="13" minlength="13" value="{{ old('emp_cid',$emp->emp_cid) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">ประเภทบุคลากร</label>
                                    <select name="emp_type_id" class="select_emp_type">
                                        <option></option>
                                        @foreach ($emp_type as $res)
                                        <option value="{{ $res->emp_type_id }}"
                                            {{ $res->emp_type_id == $emp->emp_type_id ? 'SELECTED':'' }}>
                                            {{ $res->emp_type_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success"
                                    onclick="Swal.fire({
                                        title: 'แก้ไขข้อมูล ?',
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
                                    แก้ไขข้อมูล
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button" type="button">
                    <i class="fa-solid fa-money-check nav-icon"></i>&nbsp;
                    ข้อมูลบัญชีธนาคาร
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                data-bs-parent="#accordionEmployee">
                <div class="accordion-body">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addAccount">
                                <i class="fa-solid fa-folder-plus"></i>
                                เพิ่มบัญชีธนาคาร
                            </button>
                        </div>
                        <table id="table-income" class="table table-striped" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-start">เลขบัญชีธนาคาร</th>
                                    <th>ชื่อบัญชีธนาคาร</th>
                                    <th class="text-start">ธนาคาร</th>
                                    <th class="text-start">สาขา</th>
                                    <th class="text-start">ประเภทบัญชี</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">
                                        <i class="fa-solid fa-bars"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $res)
                                @if ($res->acc_status == 1)
                                    @php $check = 'checked' @endphp
                                @else
                                    @php $check = '' @endphp
                                @endif
                                    <tr>
                                        <td class="text-center">{{ $res->acc_id }}</td>
                                        <td class="text-start">{{ $res->acc_code }}</td>
                                        <td class="text-start">{{ $res->acc_name }}</td>
                                        <td class="text-start">
                                            <img src="{{ asset('img/bank/'.$res->bank_icon) }}" class="img" width="6%">
                                            {{ $res->bank_name }}
                                        </td>
                                        <td>{{ $res->acc_branch }}</td>
                                        <td class="text-start">{{ $res->type_name }}</td>
                                        <td class="text-center">
                                            <div class='form-check form-switch d-flex justify-content-center'>
                                                <input class='form-check-input switchClick' type='checkbox'
                                                data-id="{{ $res->acc_id }}" data-name="{{ $res->acc_name }}"
                                                role='switch' {{ $check }}>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('emp.account',base64_encode($res->acc_id)) }}" class="btn btn-sm btn-secondary">
                                                <i class="fa-solid fa-edit"></i>
                                                แก้ไขข้อมูล
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
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
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal Add Account -->
<div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="addAccountLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('emp.store.account') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addAccountLabel">
                        <i class="fa-solid fa-user-plus"></i>
                        เพิ่มข้อมูลบัญชีธนาคาร
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
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
                            <input type="text" name="emp_id" class="form-control" value="{{ $emp->emp_id }}" hidden>
                            <input type="text" name="emp_cid" class="form-control" value="{{ $emp->emp_cid }}" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">ชื่อบัญชีธนาคาร</label>
                            <input type="text" name="acc_name" class="form-control" placeholder="ระบุชื่อบัญชีธนาคาร" value="{{ old('acc_name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">สาขา</label>
                            <input type="text" name="acc_branch" class="form-control" placeholder="ระบุสาขาบัญชีธนาคาร" value="{{ old('acc_branch') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">ประเภทบัญชี</label><br>
                            <select name="acc_type_id" class="select_type">
                                <option></option>
                                @foreach ($type as $res)
                                <option value="{{ $res->type_id }}">
                                    {{ $res->type_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-success"
                        onclick="Swal.fire({
                            title: 'เพิ่มข้อบัญชีธนาคารใหม่ ?',
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
                        เพิ่มข้อบัญชีธนาคาร
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "{{ asset('/img/bank/') }}";
        var $state = $(
            '<span>' +
            '<img src="' + baseUrl + '/' + state.element.value.toLowerCase() +
            '.png" class="img-flag" width="4%" /> ' + state.text +
            '</span>'
        );
        return $state;
    };

    new DataTable('#table-income',{
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
    
    $(document).ready(function () {
        $('.select_emp_type').select2({
            width: '100%',
            placeholder: 'เลือกประเภทบุคลากร',
        });

        $('.select_type').select2({
            width: '100%',
            placeholder: 'เลือกประเภทบัญชี',
            dropdownParent: $("#addAccount"),
        });

        $('.select_bank').select2({
            width: '100%',
            placeholder: 'เลือกบัญชีธนาคาร',
            dropdownParent: $("#addAccount"),
            templateResult: formatState
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
            url: "{{ route('acc.changed') }}",
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
