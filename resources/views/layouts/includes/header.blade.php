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
                <!-- start: notifications dropdown-menu -->
                {{-- <li>
                    <div class="dropdown morphing scale-left notifications">
                        <a class="nav-link dropdown-toggle after-none" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <span class="d-none d-xl-block me-2">Notification</span>
                            <svg class="d-inline-block d-xl-none" viewBox="0 0 16 16" width="18px" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 1.91802L7.203 2.07902C6.29896 2.26322 5.48633 2.75412 4.90265 3.46864C4.31897 4.18316 4.0001 5.07741 4 6.00002C4 6.62802 3.866 8.19702 3.541 9.74202C3.381 10.509 3.165 11.308 2.878 12H13.122C12.835 11.308 12.62 10.51 12.459 9.74202C12.134 8.19702 12 6.62802 12 6.00002C11.9997 5.07758 11.6807 4.18357 11.097 3.46926C10.5134 2.75494 9.70087 2.26419 8.797 2.08002L8 1.91802ZM14.22 12C14.443 12.447 14.701 12.801 15 13H1C1.299 12.801 1.557 12.447 1.78 12C2.68 10.2 3 6.88002 3 6.00002C3 3.58002 4.72 1.56002 7.005 1.09902C6.99104 0.959974 7.00638 0.819547 7.05003 0.686794C7.09368 0.554041 7.16467 0.43191 7.25842 0.328279C7.35217 0.224647 7.4666 0.141815 7.59433 0.085125C7.72206 0.028435 7.86026 -0.000854492 8 -0.000854492C8.13974 -0.000854492 8.27794 0.028435 8.40567 0.085125C8.5334 0.141815 8.64783 0.224647 8.74158 0.328279C8.83533 0.43191 8.90632 0.554041 8.94997 0.686794C8.99362 0.819547 9.00896 0.959974 8.995 1.09902C10.1253 1.32892 11.1414 1.94238 11.8712 2.83552C12.6011 3.72866 12.9999 4.84659 13 6.00002C13 6.88002 13.32 10.2 14.22 12Z" />
                                <path class="fill-secondary"
                                    d="M9.41421 15.4142C9.03914 15.7893 8.53043 16 8 16C7.46957 16 6.96086 15.7893 6.58579 15.4142C6.21071 15.0391 6 14.5304 6 14H10C10 14.5304 9.78929 15.0391 9.41421 15.4142Z"
                                    fill="black" />
                            </svg>
                        </a>
                        <div id="NotificationsDiv" class="dropdown-menu shadow rounded-4 border-0 p-0 m-0">
                            <div class="card w380">
                                <div class="card-header p-3">
                                    <h6 class="card-title mb-0">Notifications Center</h6>
                                    <span class="badge bg-danger text-light">14</span>
                                </div>
                                <ul class="nav nav-tabs tab-card d-flex text-center" role="tablist">
                                    <li class="nav-item flex-fill"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#Noti-tab-Message" role="tab">Message</a></li>
                                    <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab"
                                            href="#Noti-tab-Events" role="tab">Events</a></li>
                                    <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab"
                                            href="#Noti-tab-Logs" role="tab">Logs</a></li>
                                </ul>
                                <div class="tab-content card-body custom_scroll">
                                    <div class="tab-pane fade show active" id="Noti-tab-Message" role="tabpanel">
                                        <ul class="list-unstyled list mb-0">
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="./assets/img/xs/avatar5.jpg" alt="">
                                                    <div class="flex-fill ms-3">
                                                        <p class="d-flex justify-content-between mb-0">
                                                            <span>Olive Tree</span> <small>13MIN</small>
                                                        </p>
                                                        <span>making it over 2000 years old</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="./assets/img/xs/avatar6.jpg" alt="">
                                                    <div class="flex-fill ms-3">
                                                        <p class="d-flex justify-content-between mb-0">
                                                            <span>Del Phineum</span> <small>1HR</small>
                                                        </p>
                                                        <span>There are many variations of passages</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="./assets/img/xs/avatar1.jpg" alt="">
                                                    <div class="flex-fill ms-3">
                                                        <p class="d-flex justify-content-between mb-0">
                                                            <span>Rose Bush</span> <small>2MIN</small>
                                                        </p>
                                                        <span>changed an issue from "In Progress" to <span
                                                                class="badge bg-success">Review</span></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <div class="avatar rounded-circle no-thumbnail">PT</div>
                                                    <div class="flex-fill ms-3">
                                                        <p class="d-flex justify-content-between mb-0">
                                                            <span>Pat Thettick</span> <small>13MIN</small>
                                                        </p>
                                                        <span>It is a long established fact that a reader will
                                                            be distracted</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="./assets/img/xs/avatar3.jpg" alt="">
                                                    <div class="flex-fill ms-3">
                                                        <p class="d-flex justify-content-between mb-0">
                                                            <span>Eileen Dover</span> <small>1HR</small>
                                                        </p>
                                                        <span>There are many variations of passages</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="./assets/img/xs/avatar4.jpg" alt="">
                                                    <div class="flex-fill ms-3">
                                                        <p class="d-flex justify-content-between mb-0">
                                                            <span>Carmen Goh</span> <small>1DAY</small>
                                                        </p>
                                                        <span>Contrary to popular belief <span
                                                                class="badge bg-danger">Code</span></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="./assets/img/xs/avatar7.jpg" alt="">
                                                    <div class="flex-fill ms-3">
                                                        <p class="d-flex justify-content-between mb-0">
                                                            <span>Karen Onnabit</span> <small>1DAY</small>
                                                        </p>
                                                        <span>The generated Lorem Ipsum</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="Noti-tab-Events" role="tabpanel">
                                        <ul class="list-unstyled list mb-0">
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <div class="avatar rounded-circle no-thumbnail"><i
                                                            class="fa fa-thumbs-up fa-lg"></i></div>
                                                    <div class="flex-fill ms-3">
                                                        <p class="mb-0">Your New Campaign <strong
                                                                class="text-primary">Holiday Sale</strong> is
                                                            approved.</p>
                                                        <small>11:30 AM Today</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <div class="avatar rounded-circle no-thumbnail"><i
                                                            class="fa fa-pie-chart fa-lg"></i></div>
                                                    <div class="flex-fill ms-3">
                                                        <p class="mb-0">Website visits from Twitter is
                                                            <strong class="text-danger">27% higher</strong>
                                                            than last week.
                                                        </p>
                                                        <small>04:00 PM Today</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <div class="avatar rounded-circle no-thumbnail"><i
                                                            class="fa fa-info-circle fa-lg"></i></div>
                                                    <div class="flex-fill ms-3">
                                                        <p class="mb-0">Campaign <strong
                                                                class="text-primary">Holiday Sale</strong> is
                                                            nearly reach budget limit.</p>
                                                        <small>10:00 AM Today</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <div class="avatar rounded-circle no-thumbnail"><i
                                                            class="fa fa-warning fa-lg"></i></div>
                                                    <div class="flex-fill ms-3">
                                                        <p class="mb-0"><strong class="text-warning">Error</strong>
                                                            on website
                                                            analytics configurations</p>
                                                        <small>Yesterday</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="Noti-tab-Logs" role="tabpanel">
                                        <h4 class="color-400">No Logs right now!</h4>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary text-light rounded-0">View all
                                    notifications</a>
                            </div>
                        </div>
                    </div>
                </li> --}}
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
                                        class="btn bg-secondary text-light text-uppercase rounded-0"
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
                                        class="btn bg-secondary text-light text-uppercase rounded-0"
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
