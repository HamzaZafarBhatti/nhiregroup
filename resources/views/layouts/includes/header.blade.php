<!-- start: page header -->
<header class="page-header sticky-top px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
    <div class="container-fluid">
        <nav class="navbar">
            <!-- start: toggle btn -->
            <div class="d-flex">
                {{-- <button type="button" class="btn btn-link d-none d-xl-block sidebar-mini-btn p-0 text-primary">
                    <span class="hamburger-icon">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                </button> --}}
                <button type="button" class="btn btn-link d-block d-xl-none menu-toggle p-0 text-gold">
                    <span class="hamburger-icon">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                </button>
            </div>
            <!-- start: search area -->
            {{-- <div class="header-left flex-grow-1 d-none d-md-block">
                <div class="main-search px-3 flex-fill">
                    <input class="form-control" type="text" placeholder="Enter your search key word">
                    <div class="card shadow rounded-4 search-result slidedown">
                        <div class="card-body">
                            <small class="text-uppercase text-muted">Recent searches</small>
                            <div class="d-flex flex-wrap align-items-start mt-2 mb-4">
                                <a class="small rounded py-1 px-2 m-1 fw-normal bg-primary text-white"
                                    href="#">HRMS Admin</a>
                                <a class="small rounded py-1 px-2 m-1 fw-normal bg-secondary text-white"
                                    href="#">Hospital Admin</a>
                                <a class="small rounded py-1 px-2 m-1 fw-normal bg-info text-white"
                                    href="./app-project.html">Project</a>
                                <a class="small rounded py-1 px-2 m-1 fw-normal bg-dark text-white"
                                    href="./app-social.html">Social App</a>
                                <a class="small rounded py-1 px-2 m-1 fw-normal bg-danger text-white"
                                    href="#">University Admin</a>
                            </div>
                            <small class="text-uppercase text-muted">Suggestions</small>
                            <div class="card list-group list-group-flush list-group-custom mt-2">
                                <a class="list-group-item list-group-item-action text-truncate"
                                    href=".//docs/doc-helperclass.html">
                                    <div class="fw-bold">Helper Class</div>
                                    <small class="text-muted">Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry.</small>
                                </a>
                                <a class="list-group-item list-group-item-action text-truncate"
                                    href=".//docs/element-daterange.html">
                                    <div class="fw-bold">Date Range Picker</div>
                                    <small class="text-muted">There are many variations of passages of Lorem
                                        Ipsum available</small>
                                </a>
                                <a class="list-group-item list-group-item-action text-truncate"
                                    href=".//docs/element-imageinput.html">
                                    <div class="fw-bold">Image Input</div>
                                    <small class="text-muted">It is a long established fact that a reader will
                                        be distracted</small>
                                </a>
                                <a class="list-group-item list-group-item-action text-truncate"
                                    href=".//docs/plugin-table.html">
                                    <div class="fw-bold">DataTables for jQuery</div>
                                    <small class="text-muted">Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry.</small>
                                </a>
                                <a class="list-group-item list-group-item-action text-truncate"
                                    href=".//docs/doc-setup.html">
                                    <div class="fw-bold">Development Setup</div>
                                    <small class="text-muted">Contrary to popular belief, Lorem Ipsum is not
                                        simply random text.</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- start: link -->
            <ul class="header-right justify-content-end d-flex align-items-center mb-0">
                
                <!-- start: quick light dark -->
                <li>
                    <a class="nav-link quick-light-dark" href="javascript:void(0)">
                        <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                            <path class="fill-secondary"
                                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                        </svg>
                    </a>
                </li>
                <!-- start: notifications dropdown-menu -->
                @if ($user->role == 'User')
                    <li>
                    <div class="dropdown morphing scale-left notifications">
                        <a class="nav-link dropdown-toggle after-none notify-nav" href="#" role="button"
                            data-bs-toggle="dropdown" style="padding-top: 0.2rem;">
                            <span class="me-1 position-relative">
                                <svg width="30px" height="30px" viewBox="-2 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="ringBell">
                                    <defs>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
                                            <stop stop-color="#FFC923" offset="0%"></stop>
                                            <stop stop-color="#FFAD41" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-2">
                                            <stop stop-color="#FE9F15" offset="0%"></stop>
                                            <stop stop-color="#FFB03C" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-3">
                                            <stop stop-color="#FFB637" offset="0%"></stop>
                                            <stop stop-color="#FFBE2F" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-4">
                                            <stop stop-color="#FFC226" offset="0%"></stop>
                                            <stop stop-color="#FFE825" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-5">
                                            <stop stop-color="#EB2E2E" offset="0%"></stop>
                                            <stop stop-color="#D71919" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="ui-gambling-website-lined-icnos-casinoshunter" transform="translate(-1385.000000, -1904.000000)" fill-rule="nonzero">
                                            <g id="4" transform="translate(50.000000, 1871.000000)">
                                                <g id="notification" transform="translate(1335.000000, 33.000000)">
                                                    <path d="M26,24.6895899 L26,14 C26,7.92486775 21.0751322,3 15,3 C8.92486775,3 4,7.92486775 4,14 L4,24.6895899 L6,24.6895899 C8.6862915,24.6895899 11.6862915,24.6895899 15,24.6895899 C18.3137085,24.6895899 21.3137085,24.6895899 24,24.6895899 L26,24.6895899 Z" id="Path" fill="url(#linearGradient-1)">

                                                    </path>
                                                    <path d="M26.5,23 C28.4329966,23 30,24.5670034 30,26.5 C30,28.4329966 28.4329966,30 26.5,30 L3.5,30 C1.56700338,30 0,28.4329966 0,26.5 C0,24.5670034 1.56700338,23 3.5,23 L26.5,23 Z" id="Path" fill="url(#linearGradient-2)">

                                                    </path>
                                                    <path d="M21,34 C21,30.6862915 18.3137085,28 15,28 C11.6862915,28 9,30.6862915 9,34 L21,34 Z" id="Oval" fill="url(#linearGradient-3)" transform="translate(15.000000, 31.000000) rotate(-180.000000) translate(-15.000000, -31.000000) ">

                                                    </path>
                                                    <path d="M17,2.13162821e-14 L13,2.13162821e-14 L11,2.13162821e-14 L11,1.56280256 C11,3.49579918 12.5670034,5.06280256 14.5,5.06280256 L15.5,5.06280256 C17.4329966,5.06280256 19,3.49579918 19,1.56280256 L19,2.13162821e-14 L17,2.13162821e-14 Z" id="Rectangle-Copy-11" fill="url(#linearGradient-4)" transform="translate(15.000000, 2.531401) rotate(-180.000000) translate(-15.000000, -2.531401) ">

                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                                <div class="position-absolute rounded-circle text-white" style="width: 12px; height: 12px;top:-2px;right: 5px;text-align: center;font-size: 12px;font-weight: bold;  @if ($user->employed == 1) background-color: #ff3535; @endif">

                                </div>
                            </span>

                        </a>

                    </div>
                </li>
                @endif
                <!-- start: User dropdown-menu -->
                <li>
                    <div class="dropdown morphing scale-left user-profile mx-lg-3 mx-2">
                        <a class="nav-link dropdown-toggle rounded-circle after-none p-0" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <img class="avatar img-thumbnail rounded-circle shadow"
                                src="{{ asset('assets/img/profile_av.png') }}" alt="">
                        </a>
                        <div class="dropdown-menu border-0 rounded-4 shadow p-0">
                            <div class="card border-0 w240">
                                <div class="card-body border-bottom d-flex">
                                    <div class="flex-fill">
                                        <h6 class="card-title mb-0">{{ $user->name }}</h6>
                                        <span class="text-muted">{{ $user->email }}</span>
                                    </div>
                                </div>
                                @if ($user->role === 'Admin')
                                    <div class="list-group m-2 mb-3">
                                        <a class="list-group-item list-group-item-action border-0"
                                            href="{{ route('admin.profile.edit') }}"><i class="w30 fa fa-user"></i>My
                                            Profile</a>
                                    </div>
                                    <a href="{{ route('admin.logout') }}"
                                        class="btn bg-gold text-light text-uppercase rounded-0"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Sign
                                        out</a>
                                    <form method="POST" action="{{ route('admin.logout') }}" id="logoutform">
                                        @csrf
                                    </form>
                                @else
                                    <div class="list-group m-2 mb-3">
                                        <a class="list-group-item list-group-item-action border-0"
                                            href="{{ route('user.profile.edit') }}"><i class="w30 fa fa-user"></i>My
                                            Profile</a>
                                    </div>
                                    <a href="{{ route('user.logout') }}"
                                        class="btn bg-gold text-light text-uppercase rounded-0"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Sign
                                        out</a>
                                    <form method="POST" action="{{ route('user.logout') }}" id="logoutform">
                                        @csrf
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
