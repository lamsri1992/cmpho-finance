@extends('layouts.app')
@section('content')
<style>
    .form-check-input:checked {
        background-color: #198754;
        border-color: #198754;
    }
</style>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-end">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ระบบฐานข้อมูล</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-users"></i>
                    ข้อมูลบุคลากร
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <i class="fa-solid fa-users"></i>
            ข้อมูลบุคลากร
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addEmployee">
                    <i class="fa-solid fa-user-plus"></i>
                    เพิ่มข้อมูลบุคลากร
                </button>
            </div>
            <table id="table-income" class="table table-striped" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="">คำนำหน้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th class="text-center">
                            <i class="fa-solid fa-id-card"></i>
                            CID
                        </th>
                        <th class="text-center">ประเภทบุคลากร</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th colspan="5"></th>
                        <th class="text-center">ประเภทบุคลากร</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<!-- Modal Add Employee -->
<div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('emp.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEmployeeLabel">
                        <i class="fa-solid fa-user-plus"></i>
                        เพิ่มข้อมูลบุคลากร
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">คำนำหน้า</label>
                            <select name="prefix" class="form-select">
                                <option value="">-- กรุณาระบุข้อมูล --</option>
                                @foreach ($prefix as $res)
                                <option value="{{ $res->pre_id }}">{{ $res->pre_name }}</option>
                                @endforeach
                            </select>
                        </div>
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
                            <label for="" class="form-label">CID (หมายเลข 13 หลัก)</label>
                            <input type="text" name="emp_cid" class="form-control" placeholder="ระบุหมายเลขประจำตัวประชาชน"
                                maxlength="13" minlength="13" value="{{ old('emp_cid') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">ประเภทบุคลากร</label>
                            <select name="emp_type_id" class="select_type">
                                <option></option>
                                @foreach ($emp_type as $res)
                                <option value="{{ $res->emp_type_id }}">
                                    {{ $res->emp_type_name }}
                                </option>
                                @endforeach
                            </select>
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
                            title: 'เพิ่มข้อมูลบุคลากรใหม่ ?',
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
                        เพิ่มข้อมูลบุคลากร
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
    ajax: {
        url: '/api/employee/',
        dataSrc: ''
    },
        columns: [
            { data: 'emp_id', className: 'text-center'  },
            { data: 'pre_name' },
            { data: 'emp_name' },
            { data: 'emp_lname' },
            { data: 'emp_cid', className: 'text-center' },
            { data: 'emp_type_name', className: 'text-center' },
            { data: 'stat_id', className: 'text-center',
                render: function (data, type, row) {
                    if(row.stat_id == 1){
                        var check = 'checked';
                    }else{
                        var check = '';
                    }
                    return "<div class='form-check form-switch d-flex justify-content-center'>" +
                                "<input class='form-check-input switchClick' type='checkbox' role='switch'"
                                + " data-id='"+ row.emp_id +"' "
                                + " data-name='"+ row.emp_name +" "+ row.emp_lname +"' " + check + ">" +
                            "</div>";
                },
            },
            { data: null, className: 'text-center',
                render: function (data, type, row) {
                    return "<a href='employee/" + btoa(row.emp_id) + "' class='btn btn-sm btn-primary'><i class='fa-solid fa-search'></i> รายละเอียด</a>";
                },
            },
        ],
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
    initComplete: function () {
        this.api()
            .columns([5])
            .every(function () {
                var column = this;
                var select = $('<select class="form-select" style="width:100%;"><option value="">ทั้งหมด</option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = DataTable.util.escapeRegex($(this).val());
                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.append(
                            '<option class="form-select" value="' + d + '">' + d + '</option>'
                        );
                    });
            });
        }
    });
    $(document).ready(function() {
        $('.select_bank').select2({
            width: '100%',
            placeholder: 'เลือกบัญชีธนาคาร',
            dropdownParent: $("#addEmployee"),
            templateResult: formatState
        });

        $('.select_type').select2({
            width: '100%',
            placeholder: 'กรุณาเลือก',
            dropdownParent: $("#addEmployee")
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
