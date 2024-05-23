@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-end">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ข้อมูลเงินโอนเข้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-money-bills"></i>
                    รายละเอียดการโอนเงิน
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <i class="fa-solid fa-money-bills"></i>
            รายละเอียดการโอนเงิน
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addList">
                    <i class="fa-solid fa-folder-plus"></i>
                    เพิ่มข้อมูลฏีกา / เอกสารอ้างอิง
                </button>
            </div>
            <table id="table-income" class="table table-striped" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">วันที่</th>
                        <th class="text-center">ฏีกา / เอกสารอ้างอิง</th>
                        <th>รายการ</th>
                        <th class="text-end">รับ</th>
                        <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $res)
                    <tr>
                        <td class="text-center">{{ date("d/m/Y", strtotime($res->list_date)); }}</td>
                        <td class="text-center">{{ $res->list_no }}</td>
                        <td>{{ $res->list_name }}</td>
                        <td class="text-end">{{ number_format($res->list_amount,2) }}</td>
                        <td class="text-center">
                            <a href="{{ route('inc.show',$res->list_id) }}" class="btn btn-success btn-sm">
                                <i class="fa-solid fa-search"></i>
                                รายละเอียด
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-dark">
                    <tr>
                        <td colspan="3" class="text-center">รวม</td>
                        <td class="text-end"><b>xx,xxx.xx</b></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="addList" tabindex="-1" aria-labelledby="addListLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('inc.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addListLabel">
                        <i class="fa-solid fa-folder-plus"></i>
                        เพิ่มข้อมูลฏีกา / เอกสารอ้างอิง
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label"><i class="fa-regular fa-calendar"></i> วันที่</label>
                        <input type="text" name="list_date" class="form-control flatpickr" placeholder="ระบุวันที่" @readonly(true)>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><i class="fa-regular fa-file"></i> ฏีกา / หมายเลขเอกสารอ้างอิง</label>
                        <input type="text" name="list_no" class="form-control" placeholder="ระบุข้อมูล">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ชื่อรายการ</label>
                        <input type="text" name="list_name" class="form-control" placeholder="ระบุชื่อรายการ">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ยอดเงิน</label>
                        <input type="text" name="list_amount" class="form-control" placeholder="ระบุยอดเงิน">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-success"
                        onclick="Swal.fire({
                            title: 'เพิ่มข้อมูลฏีกา / เอกสารอ้างอิงใหม่ ?',
                            showCancelButton: true,
                            confirmButtonText: `<i class='fa-solid fa-check-circle'></i> เพิ่มใหม่`,
                            cancelButtonText: `<i class='fa-solid fa-times-circle'></i> ยกเลิก`,
                            icon: 'warning',
                            width: '40%'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            } else if (result.isDenied) {
                                form.reset();
                            }
                        })"  
                    >
                        <i class="fa-solid fa-folder-plus"></i>
                        สร้างฏีกา / เอกสารอ้างอิง
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

</script>
@endsection
