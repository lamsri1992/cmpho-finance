@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-end">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ข้อมูลเงินโอนเข้า</a></li>
                <li class="breadcrumb-item"><a href="{{ route('inc.index') }}">รายละเอียดการโอนเงิน</a></li>
                <li class="breadcrumb-item active" aria-current="page">เอกสารอ้างอิง 001</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <i class="fa-regular fa-clipboard"></i>
            เอกสารอ้างอิง 001
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addList">
                    <i class="fa-solid fa-user-plus"></i>
                    เพิ่มรายการโอน
                </button>
            </div>
            <table id="table-income" class="table table-striped" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">ลำดับ</th>
                        <th>คำนำหน้า</th>
                        <th>ชื่อ - สกุล</th>
                        <th class="text-end">ยอดเงินโอน</th>
                        <th class="text-end">รวม</th>
                        <th class="text-end">ภาษีหัก ณ ที่จ่าย</th>
                        <th class="text-end">คงเหลือ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>นาย</td>
                        <td>ทดสอบ ระบบ</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">x,xxx.xx</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>นาย</td>
                        <td>ระบบ สสจ.</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">x,xxx.xx</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>นางสาว</td>
                        <td>ทดสอบ ข้อมูล</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">x,xxx.xx</td>
                    </tr>
                </tbody>
                <tfoot class="table-dark">
                    <tr>
                        <td colspan="3" class="text-center">รวม</td>
                        <td class="text-end"><b>xx,xxx.xx</b></td>
                        <td class="text-end"><b>xx,xxx.xx</b></td>
                        <td class="text-end"><b>-</b></td>
                        <td class="text-end"><b>xx,xxx.xx</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<!-- Modal Add List -->
<div class="modal fade" id="addList" aria-labelledby="addListLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addListLabel">
                        <i class="fa-solid fa-user-plus"></i>
                        เพิ่มรายการโอน
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            <i class="fa-solid fa-search"></i>
                            ชื่อ - สกุล
                        </label>
                        <select class="select_name">
                            <option></option>
                            <option value="1">นายทดสอบ ระบบ1 : XXX-X-XXX-01</option>
                            <option value="2">นายทดสอบ ระบบ2 : XXX-X-XXX-02</option>
                            <option value="3">นายทดสอบ ระบบ3 : XXX-X-XXX-03</option>
                            <option value="4">นายทดสอบ ระบบ4 : XXX-X-XXX-04</option>
                            <option value="5">นายทดสอบ ระบบ5 : XXX-X-XXX-05</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ยอดเงิน</label>
                        <input type="text" class="form-control" placeholder="จำนวนเงิน">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ภาษีหัก ณ ที่จ่าย</label>
                        <input type="text" class="form-control" placeholder="จำนวนเงิน">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-success"
                        onclick="Swal.fire({
                            title: 'ยืนยันการเพิ่มรายการโอน ?',
                            text: 'เอกสารอ้างอิง : 001',
                            showCancelButton: true,
                            confirmButtonText: `<i class='fa-solid fa-check-circle'></i> ยืนยัน`,
                            cancelButtonText: `<i class='fa-solid fa-times-circle'></i> ยกเลิก`,
                            icon: 'warning',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // form.submit();
                                Swal.fire('Submit Confirm','','success');
                            } else if (result.isDenied) {
                                // form.reset();
                            }
                        })"    
                        >
                        <i class="fa-solid fa-plus-circle"></i>
                        เพิ่มรายการโอน
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
    new DataTable('#table-income');
    $(document).ready(function() {
        $('.select_name').select2({
            width: '100%',
            placeholder: 'ค้นหาจากชื่อ สกุล',
            dropdownParent: $("#addList")
        });
    });
</script>
@endsection
