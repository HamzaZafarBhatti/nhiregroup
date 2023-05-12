<!-- start: sidebar -->
<div class="sidebar p-2 py-md-3">
    <div class="container-fluid">
        <!-- sidebar: title-->
        <div class="title-text d-flex align-items-center mb-4 mt-1">
            @if (empty($settings->site_logo))
                <h4 class="sidebar-title mb-0 flex-grow-1"><span class="sm-txt">L</span><span>UNO Admin</span></h4>
            @else
                <img src="{{ asset($settings->getLogoPath() . $settings->site_logo) }}" alt="">
            @endif
        </div>
        <!-- sidebar: menu list -->
        <div class="main-menu flex-grow-1 mt-3 mt-xl-0">
            <ul class="menu-list">
                {{-- <li class="divider py-2 lh-sm"><span class="small">MAIN</span><br> <small class="text-muted">Unique
                        dashboard designs </small></li> --}}

                @if (in_array($user->role, ['Admin', 'Sub-Admin']))
                    <li>
                        <a class="m-link @if (Route::is('admin.dashboard')) active @endif"
                            href="{{ route('admin.dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Dashboard</span>
                        </a>
                    </li>
                @else
                    <li class="collapsed">
                        <a class="m-link @if (Route::is('user.dashboard.*', 'user.')) active @endif" data-bs-toggle="collapse"
                            data-bs-target="#packages" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Dashboard</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse @if (Route::is('user.dashboard.*', 'user.')) show @endif" id="packages">
                            <li><a class="ms-link @if (Route::is('user.dashboard.main', 'user.')) active @endif"
                                    href="{{ route('user.dashboard.main') }}">Main Dashboard</a></li>
                            <li><a class="ms-link @if (Route::is('user.dashboard.salary')) active @endif"
                                    href="{{ route('user.dashboard.salary') }}">Salary Dashboard</a></li>
                        </ul>
                    </li>
                @endif
                @if ($user->role === 'Admin')
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
                                    href="{{ route('admin.packages.index') }}">List Packages</a></li>
                            <li><a class="ms-link @if (Route::is('admin.packages.create')) active @endif"
                                    href="{{ route('admin.packages.create') }}">Add Package</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link @if (Route::is('admin.timeslots.*')) active @endif" data-bs-toggle="collapse"
                            data-bs-target="#timeslots" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Time Slots</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse @if (Route::is('admin.timeslots.*')) show @endif" id="timeslots">
                            <li><a class="ms-link @if (Route::is('admin.timeslots.index')) active @endif"
                                    href="{{ route('admin.timeslots.index') }}">List Time Slots</a></li>
                            <li><a class="ms-link @if (Route::is('admin.timeslots.create')) active @endif"
                                    href="{{ route('admin.timeslots.create') }}">Add Time Slot</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link @if (Route::is('admin.subadmins.*')) active @endif" data-bs-toggle="collapse"
                            data-bs-target="#subadmins" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Subadmins</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse @if (Route::is('admin.subadmins.*')) show @endif" id="subadmins">
                            <li><a class="ms-link @if (Route::is('admin.subadmins.index')) active @endif"
                                    href="{{ route('admin.subadmins.index') }}">List Subadmins</a></li>
                            <li><a class="ms-link @if (Route::is('admin.subadmins.create')) active @endif"
                                    href="{{ route('admin.subadmins.create') }}">Add Subadmin</a></li>
                        </ul>
                    </li>
                @endif
                @if (in_array($user->role, ['Admin', 'Sub-Admin']))
                    <li class="collapsed">
                        <a class="m-link @if (Route::is('admin.salary_profile_requests.*')) active @endif" data-bs-toggle="collapse"
                            data-bs-target="#salary_profile_requests" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Salary Profile Requests</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse @if (Route::is('admin.salary_profile_requests.*')) show @endif"
                            id="salary_profile_requests">
                            <li><a class="ms-link @if (Route::is('admin.salary_profile_requests.index')) active @endif"
                                    href="{{ route('admin.salary_profile_requests.index') }}">All</a></li>
                            <li><a class="ms-link @if (Route::is('admin.salary_profile_requests.pending')) active @endif"
                                    href="{{ route('admin.salary_profile_requests.pending') }}">Pending</a></li>
                            <li><a class="ms-link @if (Route::is('admin.salary_profile_requests.accepted')) active @endif"
                                    href="{{ route('admin.salary_profile_requests.accepted') }}">Accepted</a></li>
                            <li><a class="ms-link @if (Route::is('admin.salary_profile_requests.rejected')) active @endif"
                                    href="{{ route('admin.salary_profile_requests.rejected') }}">Rejected</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link @if (Route::is('admin.salary_withdrawal_requests.*')) active @endif" data-bs-toggle="collapse"
                            data-bs-target="#salary_withdrawal_requests" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Salary Withdrawal Requests</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse @if (Route::is('admin.salary_withdrawal_requests.*')) show @endif"
                            id="salary_withdrawal_requests">
                            <li><a class="ms-link @if (Route::is('admin.salary_withdrawal_requests.index')) active @endif"
                                    href="{{ route('admin.salary_withdrawal_requests.index') }}">All</a></li>
                            <li><a class="ms-link @if (Route::is('admin.salary_withdrawal_requests.pending')) active @endif"
                                    href="{{ route('admin.salary_withdrawal_requests.pending') }}">Pending</a></li>
                            <li><a class="ms-link @if (Route::is('admin.salary_withdrawal_requests.accepted')) active @endif"
                                    href="{{ route('admin.salary_withdrawal_requests.accepted') }}">Accepted</a></li>
                            <li><a class="ms-link @if (Route::is('admin.salary_withdrawal_requests.rejected')) active @endif"
                                    href="{{ route('admin.salary_withdrawal_requests.rejected') }}">Rejected</a></li>
                        </ul>
                    </li>
                @endif
                @if ($user->role === 'Admin')
                    <li>
                        <a class="m-link @if (Route::is('admin.epins.index')) active @endif"
                            href="{{ route('admin.epins.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">E-Pins</span>
                        </a>
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
                @if ($user->role === 'User')
                    <li class="collapsed">
                        <a class="m-link @if (Route::is('user.referrals.*')) active @endif" data-bs-toggle="collapse"
                            data-bs-target="#referrals" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">My Referrals</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse @if (Route::is('user.referrals.*')) show @endif" id="referrals">
                            <li><a class="ms-link @if (Route::is('user.referrals.direct')) active @endif"
                                    href="{{ route('user.referrals.direct') }}">Direct Referrals</a></li>
                            <li><a class="ms-link @if (Route::is('user.referrals.indirect')) active @endif"
                                    href="{{ route('user.referrals.indirect') }}">Indirect Referrals</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
