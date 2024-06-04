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
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#" style="color: #fff;">
                <i class="fa-solid fa-user-circle"></i>
                @if(Auth::guest())
                    <script>
                        window.location = "/";
                    </script>
                @else
                    {{ Auth::user()->name }}
                @endif
            </a>
        </div>
    </div>
</nav>
