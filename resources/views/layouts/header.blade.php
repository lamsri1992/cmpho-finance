<nav class="navbar navbar-expand-md navbar-cmpho fixed-top bg-cmpho">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style="font-size: 16px;color: #fff;">
        <img src="{{ asset('img/logo_cmpho.png') }}" width="10%">
        สาธารณสุขจังหวัดเชียงใหม่
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">&nbsp;</a>
            </li>
        </ul>
    </div>
    @if(Auth::guest())
        <script>window.location = "/";</script>
    @else
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color: #fff;">
                            สวัสดีคุณ , {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-regular fa-edit"></i>
                                    แก้ไขข้อมูลส่วนตัว
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {!! '<i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ' !!}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            <i class="fa-solid fa-user-circle text-light"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</nav>
