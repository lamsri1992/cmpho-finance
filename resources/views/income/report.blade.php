@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-end">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ข้อมูลเงินโอนเข้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-print"></i>
                    ระบบรายงานข้อมูล
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <i class="fa-solid fa-print"></i>
            ระบบรายงานข้อมูล
        </div>
        <div class="card-body">
            <table id="table-income" class="table table-striped" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">ลำดับ</th>
                        <th class="text-center">คำนำหน้า</th>
                        <th>ชื่อ สกุล</th>
                        <th class="text-center">001 <br> ค่าล่วงเวลาเจ้าหน้าที่</th>
                        <th class="text-center">002 <br> ค่าล่วงเวลาเจ้าหน้าที่</th>
                        <th class="text-center">003 <br> ค่าล่วงเวลาเจ้าหน้าที่</th>
                        <th class="text-center">รวม</th>
                        <th class="text-center">ภาษี หัก ณ ที่จ่าย</th>
                        <th class="text-center">คงเหลือ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">นาย</td>
                        <td>ทดสอบ ระบบ</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">xxx.xx</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">นาย</td>
                        <td>ทดสอบ ระบบ</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">xxx.xx</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">นาย</td>
                        <td>ทดสอบ ระบบ</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">xxx.xx</td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">นาย</td>
                        <td>ทดสอบ ระบบ</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">xxx.xx</td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">นาย</td>
                        <td>ทดสอบ ระบบ</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">xxx.xx</td>
                    </tr>
                </tbody>
                <tfoot class="table-dark">
                     <tr>
                        <td colspan="3" class="text-center">รวม</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">x,xxx.xx</td>
                        <td class="text-end">-</td>
                        <td class="text-end">x,xxx.xx</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>
@endsection
@section('script')
<script>
    new DataTable('#table-income');
</script>
@endsection
