<!-- start: sidebar -->
<div class="sidebar p-2 py-md-3">
    <div class="container-fluid">
        <!-- sidebar: title-->
        <div class="title-text d-flex align-items-center mb-4 mt-1">
            @if (empty($settings->site_favicon))
                <h4 class="sidebar-title mb-0 flex-grow-1"><span class="sm-txt">L</span><span>UNO Admin</span></h4>
            @else
                <img src="{{ asset('assets/uploads/logo/' . $settings->site_favicon) }}" alt="">
            @endif
        </div>
        <!-- sidebar: menu list -->
        <div class="main-menu flex-grow-1 mt-3 mt-xl-0">
            <ul class="menu-list">
                {{-- <li class="divider py-2 lh-sm"><span class="small">MAIN</span><br> <small class="text-muted">Unique
                        dashboard designs </small></li> --}}
                <li>
                    @if ($role === 'Admin')
                        <a class="m-link @if (Route::is('admin.dashboard')) active @endif"
                            href="{{ route('admin.dashboard') }}">
                        @else
                            <a class="m-link @if (Route::is('user.dashboard')) active @endif"
                                href="{{ route('user.dashboard') }}">
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path class="var(--secondary-color)" fill-rule="evenodd"
                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                    <span class="ms-2">Dashboard</span>
                    </a>
                </li>
                @if ($role === 'Admin')
                    <li class="collapsed">
                        <a class="m-link @if (Route::is('admin.packages.*')) active @endif" data-bs-toggle="collapse"
                            data-bs-target="#packages" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Packages</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse @if (Route::is('admin.packages.*')) show @endif" id="packages">
                            <li><a class="ms-link @if (Route::is('admin.packages.index')) active @endif"
                                    href="{{ route('admin.packages.index') }}">List Package</a></li>
                            <li><a class="ms-link @if (Route::is('admin.packages.create')) active @endif"
                                    href="{{ route('admin.packages.create') }}">Add Package</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="m-link @if (Route::is('admin.settings.edit')) active @endif"
                            href="{{ route('admin.settings.edit') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Settings</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
