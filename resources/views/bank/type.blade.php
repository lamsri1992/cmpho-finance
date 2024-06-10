@extends('layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 4rem;">
    <div class="d-flex justify-content-start">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ระบบฐานข้อมูล</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-list"></i>
                    ข้อมูลประเภทบัญชี
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-list"></i>
            ข้อมูลประเภทบัญชี
        </div>
        <div class="card-body">
            <table id="table-type" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>ประเภทบัญชี</th>
                        <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $res)
                        <tr>
                            <td class="text-center">{{ $res->type_id }}</td>
                            <td>{{ $res->type_name }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-secondary btn-sm">
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
@endsection
@section('script')
    <script>
        new DataTable('#table-type');
    </script>
@endsection
