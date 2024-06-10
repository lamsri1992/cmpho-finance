@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-start">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ระบบฐานข้อมูล</a></li>
                <li class="breadcrumb-item"><a href="{{ route('emp.index') }}">ข้อมูลบุคลากร</a></li>
                <li class="breadcrumb-item"><a href="{{ route('emp.show',base64_encode($data->emp_id)) }}">{{ $data->pre_name.$data->emp_name." ".$data->emp_lname }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-money-check"></i>
                    {{ $data->acc_code }}
                </li>
            </ol>
        </nav>
    </div>
    <div class="accordion" id="accordionEmployee">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button" type="button">
                    <i class="fa-solid fa-money-check nav-icon"></i>&nbsp;
                    ข้อมูลบัญชีธนาคาร : {{ $data->acc_code }}
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                data-bs-parent="#accordionEmployee">
                <div class="accordion-body">
                    <div class="card-body">
                        <form action="{{ route('emp.acc_update',$data->acc_id) }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="" class="form-label">บัญชีธนาคาร</label>
                                            <select name="acc_bank_id" class="select_bank">
                                                <option></option>
                                                @foreach ($bank as $res)
                                                <option value="{{ $res->bank_id }}"
                                                    {{ $res->bank_id == $data->acc_bank_id ? 'SELECTED':'' }}>
                                                    <img src="{{ asset('img/bank/'.$res->bank_icon) }}">
                                                    {{ $res->bank_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">เลขบัญชีธนาคาร</label>
                                            <input type="text" name="acc_code" class="form-control" placeholder="ระบุเลขบัญชีธนาคาร" value="{{ old('acc_code',$data->acc_code) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">ชื่อบัญชีธนาคาร</label>
                                            <input type="text" name="acc_name" class="form-control" placeholder="ระบุชื่อบัญชีธนาคาร" value="{{ old('acc_name',$data->acc_name) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">สาขา</label>
                                            <input type="text" name="acc_branch" class="form-control" placeholder="ระบุสาขาบัญชีธนาคาร" value="{{ old('acc_branch',$data->acc_branch) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">ประเภทบัญชี</label><br>
                                            <select name="acc_type_id" class="select_type">
                                                <option></option>
                                                @foreach ($type as $res)
                                                <option value="{{ $res->type_id }}"
                                                    {{ $res->type_id == $data->acc_type_id ? 'SELECTED':'' }}>
                                                    {{ $res->type_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-start">
                                    <button type="button" class="btn btn-success"
                                        onclick="Swal.fire({
                                            title: 'แก้ไขข้อมูล ?',
                                            text: '{{ $data->acc_name }}',
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
                                        บันทึกข้อมูล
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

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
            '.png" class="img-flag" width="2%" /> ' + state.text +
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
        });

        $('.select_bank').select2({
            width: '100%',
            placeholder: 'เลือกบัญชีธนาคาร',
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
