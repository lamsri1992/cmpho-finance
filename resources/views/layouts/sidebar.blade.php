<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <div class="text-center" style="margin-bottom: 1.7rem;">
            <a href="/" class="align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <h1><i class="fa-solid fa-piggy-bank text-warning fw-bold"></i></h1>
                <h5>CMPHO e-Financial</h5>
            </a>
        </div>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#dashboard-collapse" aria-expanded="true">
                    หน้าหลัก
                </button>
                <div class="collapse {{ request()->is('/') ? 'show':'' }}" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ url('/') }}" class="link-nav rounded {{ request()->is('/') ? 'side-active':'' }}">
                                <i class="fa-solid fa-chart-line icon-nav"></i>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#income-collapse" aria-expanded="true">
                    ข้อมูลการโอนเงิน
                </button>
                <div class="collapse {{ request()->is('income*') ? 'show':'' }}" id="income-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('inc.index') }}" class="link-nav rounded {{ request()->is('income/list*') ? 'side-active':'' }}">
                                <i class="fa-solid fa-money-bills icon-nav"></i>
                                รายละเอียดการโอนเงิน
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('inc.report') }}" class="link-nav rounded {{ request()->is('income/report*') ? 'side-active':'' }}">
                                <i class="fa-solid fa-print icon-nav"></i>
                                ระบบรายงานข้อมูล
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#data-collapse" aria-expanded="true">
                    ฐานข้อมูลบัญชีธนาคาร
                </button>
                <div class="collapse {{ request()->is('data*') ? 'show':'' }}" id="data-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('emp.index') }}" 
                                class="link-nav rounded {{ request()->is('data/employee*') ? 'side-active':'' }}">
                                <i class="fa-solid fa-users icon-nav"></i>
                                ข้อมูลบุคลากร
                            </a>
                        </li>
                        <li>
                            <a href="#" class="link-nav rounded">
                                <i class="fa-solid fa-hospital icon-nav"></i>
                                ข้อมูลหน่วยบริการ
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('bank.index') }}" 
                                class="link-nav rounded {{ request()->is('data/bank*') ? 'side-active':'' }}">
                                <i class="fa-solid fa-money-check icon-nav"></i>
                                ข้อมูลธนาคาร
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('bank.type') }}" 
                                class="link-nav rounded {{ request()->is('data/type*') ? 'side-active':'' }}">
                                <i class="fa-solid fa-list icon-nav"></i>
                                ข้อมูลประเภทบัญชี
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#setting-collapse" aria-expanded="true">
                    ตั้งค่าระบบ
                </button>
                <div class="collapse {{ request()->is('setting*') ? 'show':'' }}" id="setting-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('users.index') }}" 
                                class="link-nav rounded {{ request()->is('setting/user*') ? 'side-active':'' }}">
                                <i class="fa-solid fa-user-lock icon-nav"></i>
                                จัดการผู้ใช้งาน
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
